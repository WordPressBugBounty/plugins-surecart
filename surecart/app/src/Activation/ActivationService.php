<?php
namespace SureCart\Activation;

use SureCart\AgentCatalog\AgentCatalogService;
use SureCart\MCP\AIConnectionsService;
use SureCart\Integrations\NpsSurvey\NpsSurveyNotice;
use SureCart\Models\ApiToken;
use SureCart\Models\RegisteredWebhook;
use SureCart\SetupGuide\SetupGuideService;
use SureCart\WordPress\Admin\AdminPageRegistry;
use SureCart\Telemetry\ConsentNotice;
use SureCart\Telemetry\SiteDetails;
use SureCart\Telemetry\TelemetrySender;
use SureCart\Telemetry\TelemetryService;

/**
 * Service for plugin activation.
 */
class ActivationService {
	/**
	 * One-shot flag set on activation and consumed by the next interactive admin request.
	 *
	 * @var string
	 */
	const REDIRECT_TRANSIENT = 'surecart_activation_redirect';

	/**
	 * Holds the roles service.
	 *
	 * @var \SureCart\Permissions\RolesService
	 */
	protected $roles = null;

	/**
	 * Holds the roles service.
	 *
	 * @var \SureCart\WordPress\Pages\PageSeeder
	 */
	protected $seeder = null;

	/**
	 * Holds the salt service.
	 *
	 * @var \SureCart\Permissions\SureCartSaltService
	 */
	protected $salt = null;

	/**
	 * Get dependencies for this service.
	 *
	 * @param \SureCart\Permissions\RolesService        $roles Roles service.
	 * @param \SureCart\WordPress\Pages\PageSeeder      $seeder Seeder service.
	 * @param \SureCart\Permissions\SureCartSaltService $salt Salt service.
	 */
	public function __construct( \SureCart\Permissions\RolesService $roles, \SureCart\WordPress\Pages\PageSeeder $seeder, \SureCart\Permissions\SureCartSaltService $salt ) {
		$this->roles  = $roles;
		$this->seeder = $seeder;
		$this->salt   = $salt;
	}

	/**
	 * Bootstrap.
	 *
	 * @return void
	 */
	public function bootstrap() {
		register_activation_hook( SURECART_PLUGIN_FILE, [ $this, 'activate' ] );
		register_deactivation_hook( SURECART_PLUGIN_FILE, [ $this, 'deactivate' ] );
		add_action( 'admin_init', [ $this, 'maybeRedirect' ] );
	}

	/**
	 * Create roles on plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		// Create roles.
		$this->roles->create();

		// Seed pages and forms.
		$this->seeder->seed();

		// Add the encryption key to the wp-config.php file.
		$this->salt->write();

		// Always set; where to send the user is decided on the next admin request, once the token state is known.
		set_transient( self::REDIRECT_TRANSIENT, 1, 30 );

		// Report site details on (re)activation for opted-in sites. Telemetry must never block activation.
		try {
			if ( true === \SureCart::telemetry()->consent() ) {
				\SureCart::telemetrySiteDetails()->sync();
			}
		} catch ( \Throwable $e ) {
			TelemetryService::log( $e->getMessage() );
		}
	}

	/**
	 * On deactivation logic.
	 *
	 * @return void
	 */
	public function deactivate() {
		// clear webhooks.
		RegisteredWebhook::delete();

		// Drop the cached rules so WordPress rebuilds them without our post types on
		// the next request. Flushing here would just re-save them, since our post
		// types are still registered in the request doing the deactivating.
		delete_option( 'rewrite_rules' );

		delete_transient( self::REDIRECT_TRANSIENT );

		// Stop the telemetry sweep, kick and retry. Queued events wait for reactivation.
		try {
			\SureCart::telemetrySender()->unschedule();
		} catch ( \Throwable $e ) {
			TelemetryService::log( $e->getMessage() );
		}
	}

	/**
	 * Send a freshly activated plugin to onboarding or the setup guide, once.
	 *
	 * Background and non-interactive requests keep the flag for the next real
	 * admin request; bulk activation and the target pages themselves drop it.
	 *
	 * @return void
	 */
	public function maybeRedirect() {
		if ( ! get_transient( self::REDIRECT_TRANSIENT ) ) {
			return;
		}

		if ( $this->shouldPostponeRedirect() ) {
			return;
		}

		delete_transient( self::REDIRECT_TRANSIENT );

		if ( $this->shouldCancelRedirect() ) {
			return;
		}

		$url = $this->redirectUrl();
		if ( empty( $url ) ) {
			return;
		}

		$this->redirect( $url );
	}

	/**
	 * Requests that can't show a page; the flag survives for the next one that can.
	 *
	 * @return bool
	 */
	protected function shouldPostponeRedirect() {
		if ( wp_doing_ajax() ) {
			return true;
		}
		if ( wp_doing_cron() ) {
			return true;
		}
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return true;
		}
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			return true;
		}
		// Action Scheduler's async runner.
		if ( 'as_async_request_queue_runner' === ( $_REQUEST['action'] ?? '' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}
		// admin-post.php runs an action and redirects itself, even on GET; redirecting it would drop the action.
		if ( 'admin-post.php' === ( $GLOBALS['pagenow'] ?? '' ) ) {
			return true;
		}
		// A form POST (e.g. options.php) redirects itself; keep the flag for the GET that follows.
		if ( 'GET' !== strtoupper( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) ) ) ) {
			return true;
		}
		if ( is_network_admin() ) {
			return true;
		}
		return ! current_user_can( 'manage_options' );
	}

	/**
	 * Requests where the redirect is dropped for good.
	 *
	 * @return bool
	 */
	protected function shouldCancelRedirect() {
		if ( isset( $_GET['activate-multi'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		/**
		 * Whether activation redirects to onboarding or the setup guide.
		 *
		 * @param bool $redirect Defaults to true.
		 */
		if ( ! apply_filters( 'surecart/activation/redirect', true ) ) {
			return true;
		}

		return in_array( AdminPageRegistry::currentSlug(), [ 'sc-getting-started', 'sc-setup-guide' ], true );
	}

	/**
	 * Onboarding without a token, the setup guide until the store is past setup, nowhere after.
	 *
	 * @return string URL, or '' for no redirect.
	 */
	protected function redirectUrl() {
		if ( ! ApiToken::get() ) {
			return admin_url( 'admin.php?page=sc-getting-started' );
		}

		// The guide owns "past setup", so the redirect agrees with the bar and the menu badge.
		$status = \SureCart::setupGuide()->status();

		return ! empty( $status['remaining'] ) ? admin_url( 'admin.php?page=sc-setup-guide' ) : '';
	}

	/**
	 * Redirect and stop.
	 *
	 * @param string $url Target URL.
	 * @return void
	 */
	protected function redirect( $url ) {
		wp_safe_redirect( $url );
		exit;
	}

	/**
	 * Remove roles and all data.
	 *
	 * @return void
	 */
	public function uninstall() {
		// Tell the platform about the opt-out while the token and outbox still exist. Never block uninstall.
		try {
			if ( true === \SureCart::telemetry()->consent() ) {
				\SureCart::telemetry()->setConsent( false, 'uninstall' );
				\SureCart::telemetrySender()->flush();
			}
		} catch ( \Throwable $e ) {
			TelemetryService::log( $e->getMessage() );
		}

		// remove roles.
		$this->roles->delete();
		// remove pages that were automatically seeded.
		$this->seeder->delete();
		\SureCart::saved_items()->uninstall();
		// remove all forms.
		$this->removeFormPosts();
		// remove all options from the options table.
		$this->removeOptions();
		// remove all tables.
		$this->removeTables();
	}

	/**
	 * Remove all tables.
	 *
	 * @return void
	 */
	public function removeTables() {
		// Delete the integration table.
		$integrations = new \SureCart\Database\Tables\Integrations( new \SureCart\Database\Table() );
		$integrations->uninstall();

		// Delete the telemetry outbox.
		$telemetry_events = new \SureCart\Database\Tables\TelemetryEvents( new \SureCart\Database\Table() );
		$telemetry_events->uninstall();
	}

	/**
	 * Remove all posts from our post type.
	 *
	 * @return void
	 */
	public function removeFormPosts() {
		// remove all form posts.
		$form_ids = get_posts(
			[
				'post_type'   => 'sc_form',
				'numberposts' => -1,
				'fields'      => 'ids',
			]
		);
		foreach ( $form_ids as $form_id ) {
			wp_delete_post( $form_id, true );
		}
	}

	/**
	 * Remove all our options from the options table.
	 *
	 * @return void
	 */
	public function removeOptions() {
		delete_option( 'surecart_registered_webhook' );
		delete_option( 'surecart_previous_webhook' );
		delete_option( 'surecart_order-confirmation_page_id' );
		delete_option( 'surecart_dashboard_page_id' );
		delete_option( 'surecart_checkout_sc_form_id' );
		delete_option( 'surecart_use_esm_loader' );
		delete_option( 'surecart_checkout_page_id' );
		delete_option( 'sc_api_token' );
		delete_option( 'sc_previous_account' );
		delete_option( 'sc_uninstall' );
		delete_option( 'surecart_order_bump_design' );
		delete_option( NpsSurveyNotice::LAST_SUBMITTED_OPTION );
		delete_option( NpsSurveyNotice::NPS_SURVEY_ID );
		delete_option( 'surecart_mcp_abilities_enabled' );
		delete_option( 'surecart_mcp_edit_abilities_enabled' );
		delete_option( 'surecart_mcp_delete_abilities_enabled' );
		delete_option( AgentCatalogService::ENABLED_OPTION );
		delete_option( AgentCatalogService::CACHE_VERSION_OPTION );
		\SureCart::agentCatalog()->deleteCache();
		delete_metadata( 'user', 0, AIConnectionsService::META_KEY, '', true );
		delete_option( SetupGuideService::OPTION );
		delete_option( SetupGuideService::REPORTED_OPTION );

		delete_option( TelemetryService::CONSENT_OPTION );
		delete_option( TelemetryService::INSTALL_OPTION );
		delete_option( ConsentNotice::AFTER_OPTION );
		\SureCart::notices()->reset( ConsentNotice::NAME );
		delete_option( SiteDetails::HASH_OPTION );
		delete_transient( SiteDetails::CHECKED_TRANSIENT );
		delete_option( TelemetrySender::LAST_RUN_OPTION );
	}
}
