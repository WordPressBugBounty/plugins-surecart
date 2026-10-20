<?php

namespace SureCart\Telemetry;

/**
 * Records telemetry events into the outbox, gated by consent.
 */
class TelemetryService {
	/**
	 * Consent option: missing (not answered), 'yes' or 'no'.
	 *
	 * @var string
	 */
	const CONSENT_OPTION = 'surecart_telemetry_consent';

	/**
	 * Install identity option: { id, site }, where site is a hash of siteKey().
	 *
	 * @var string
	 */
	const INSTALL_OPTION = 'surecart_telemetry_install';

	/**
	 * Every event in the platform's tracking plan, with the property keys it accepts.
	 *
	 * Any other key is dropped before storing, so unknown or personal data never leaves the site.
	 *
	 * @var array<string, string[]>
	 */
	const EVENTS = [
		'consent_changed'              => [ 'telemetry_consented', 'screen' ],
		'plugin_deactivated'           => [ 'reason', 'reason_comment' ],
		'onboarding_started'           => [],
		'onboarding_step_exited'       => [ 'step', 'outcome' ],
		'onboarding_answers_submitted' => [ 'built_for', 'planned_product_types', 'business_country', 'currency', 'ended_by', 'account_setup', 'skipped_at_step' ],
		'onboarding_skipped'           => [ 'skipped_at_step' ],
		'onboarding_resumed'           => [ 'step' ],
		'onboarding_completed'         => [ 'account_setup' ],
		'setup_guide_viewed'           => [ 'steps_completed', 'opened_from' ],
		'setup_guide_step_completed'   => [ 'step', 'completed_by' ],
		'setup_guide_action_clicked'   => [ 'action' ],
		'setup_guide_completed'        => [],
		'templates_banner_clicked'     => [],
		'support_contacted'            => [ 'screen' ],
		'growth_feature_clicked'       => [ 'feature' ],
		'product_import_started'       => [ 'origin', 'products_attempted' ],
		'product_import_completed'     => [ 'origin', 'products_imported', 'products_failed' ],
		'product_import_failed'        => [ 'origin', 'stage', 'error_code' ],
		'test_order_attempted'         => [],
		'test_order_failed'            => [ 'blocker', 'error_code' ],
		'site_details_synced'          => [
			'url',
			'wordpress_plugin_version',
			'source',
			'source_version',
			'wordpress_version',
			'php_version',
			'environment_type',
			'locale',
			'active_theme',
			'page_builders',
			'cache_plugins',
			'active_companion_plugins',
			'woocommerce_active',
			'woocommerce_product_count',
			'in_multisite_network',
			'https_enabled',
			'webhooks_deliverable',
			'storefront_publicly_reachable',
		],
		'environment_check_failed'     => [ 'check', 'reason' ],
	];

	/**
	 * Events recorded server-side only; the admin JS may record every other event.
	 *
	 * @var string[]
	 */
	const SERVER_EVENTS = [
		'consent_changed',
		'site_details_synced',
		'plugin_deactivated',
		'onboarding_answers_submitted',
		'product_import_started',
		'product_import_completed',
		'product_import_failed',
		'setup_guide_step_completed',
		'setup_guide_completed',
	];

	/**
	 * Seconds a newly recorded event waits before it may be sent.
	 *
	 * The platform rejects any occurred_at after its own clock, so this
	 * absorbs a site clock running ahead of it.
	 *
	 * @var int
	 */
	const KICK_DELAY = 60;

	/**
	 * Linked from the consent notice and the settings toggle.
	 *
	 * @var string
	 */
	const PRIVACY_URL = 'https://surecart.com/privacy';

	/**
	 * Events the platform accepts without consent.
	 *
	 * @var string[]
	 */
	const CONSENT_EXEMPT_EVENTS = [
		'consent_changed',
		'plugin_deactivated',
		'onboarding_answers_submitted',
	];

	/**
	 * The outbox.
	 *
	 * @var \SureCart\Telemetry\TelemetryQueue
	 */
	protected $queue;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Telemetry\TelemetryQueue $queue The outbox.
	 */
	public function __construct( TelemetryQueue $queue ) {
		$this->queue = $queue;
	}

	/**
	 * Events the admin JS may record through the REST route.
	 *
	 * @return string[]
	 */
	public static function clientEvents(): array {
		return array_values( array_diff( array_keys( self::EVENTS ), self::SERVER_EVENTS ) );
	}

	/**
	 * Record an event for delivery.
	 *
	 * Never throws: telemetry must not break the request that records it.
	 *
	 * @param string $event      The event name.
	 * @param array  $properties The event properties.
	 *
	 * @return bool Whether the event was stored.
	 */
	public function record( string $event, array $properties = [] ): bool {
		try {
			if ( ! isset( self::EVENTS[ $event ] ) ) {
				return false;
			}

			$consented = true === $this->consent();
			if ( ! $consented && ! in_array( $event, self::CONSENT_EXEMPT_EVENTS, true ) ) {
				return false;
			}

			$occurred_at = time();
			$payload     = wp_json_encode(
				[
					'id'                  => wp_generate_uuid4(),
					'install_id'          => $this->installId(),
					'event'               => $event,
					'occurred_at'         => $occurred_at,
					'telemetry_consented' => $consented,
					// The platform rejects null values, and [] would encode as a list instead of {}.
					'properties'          => (object) array_filter(
						array_intersect_key( $properties, array_flip( self::EVENTS[ $event ] ) ),
						function ( $value ) {
							return null !== $value;
						}
					),
				]
			);

			if ( false === $payload ) {
				return false;
			}

			if ( ! $this->queue->insert( $event, $payload, $occurred_at, $occurred_at + self::KICK_DELAY ) ) {
				return false;
			}

			// Resolved here, not injected: the sender depends on this service.
			\SureCart::telemetrySender()->kick();

			return true;
		} catch ( \Throwable $e ) {
			self::log( $e->getMessage() );
			return false;
		}
	}

	/**
	 * Get the consent state.
	 *
	 * @return bool|null Null when the merchant hasn't answered.
	 */
	public function consent(): ?bool {
		$consent = get_option( self::CONSENT_OPTION, null );

		if ( 'yes' === $consent ) {
			return true;
		}

		if ( 'no' === $consent ) {
			return false;
		}

		return null;
	}

	/**
	 * Change the consent state.
	 *
	 * @param bool   $consented Whether the merchant opted in.
	 * @param string $screen    Where the merchant chose.
	 *
	 * @return bool Whether the state changed.
	 */
	public function setConsent( bool $consented, string $screen ): bool {
		if ( $consented === $this->consent() ) {
			return false;
		}

		update_option( self::CONSENT_OPTION, $consented ? 'yes' : 'no' );

		$this->record(
			'consent_changed',
			[
				'telemetry_consented' => $consented,
				'screen'              => $screen,
			]
		);

		if ( $consented ) {
			\SureCart::telemetrySiteDetails()->sync();
		} else {
			$this->queue->purgeConsentRequired( self::CONSENT_EXEMPT_EVENTS );
		}

		// Only opted-in sites run the daily sweep. Action Scheduler's API isn't usable before this fires.
		if ( did_action( 'action_scheduler_init' ) ) {
			if ( $consented ) {
				\SureCart::telemetrySender()->scheduleSweep();
			} else {
				\SureCart::telemetrySender()->unscheduleSweep();
			}
		}

		return true;
	}

	/**
	 * Get this install's id.
	 *
	 * Keyed on a hash rather than the URL, so search-replace on a staging
	 * clone can't rewrite the stored value to match and keep prod's id.
	 *
	 * @return string
	 */
	public function installId(): string {
		$site    = md5( $this->siteKey() );
		$install = get_option( self::INSTALL_OPTION, false );

		if ( is_array( $install ) && ! empty( $install['id'] ) && ( $install['site'] ?? '' ) === $site ) {
			return $install['id'];
		}

		$value = [
			'id'   => strtolower( wp_generate_uuid4() ),
			'site' => $site,
		];

		if ( false !== $install ) {
			update_option( self::INSTALL_OPTION, $value, false );
			return $value['id'];
		}

		if ( add_option( self::INSTALL_OPTION, $value, '', false ) ) {
			return $value['id'];
		}

		// Another request wrote it first. add_option() upserts, so a concurrent first write can still win; benign, a few early events carry the other id.
		$install = get_option( self::INSTALL_OPTION, false );

		return is_array( $install ) && ! empty( $install['id'] ) ? $install['id'] : $value['id'];
	}

	/**
	 * Get the key that identifies this site for the install id.
	 *
	 * Host without a leading www., plus path. The scheme is left out so an
	 * http to https switch keeps the id.
	 *
	 * @return string
	 */
	public function siteKey(): string {
		$home = (string) get_option( 'home' );
		$host = preg_replace( '/^www\./', '', strtolower( (string) wp_parse_url( $home, PHP_URL_HOST ) ) );
		$path = untrailingslashit( (string) wp_parse_url( $home, PHP_URL_PATH ) );

		return $host . $path;
	}

	/**
	 * Get the stored home URL.
	 *
	 * Not home_url(): it switches to https whenever the current request is,
	 * so admin and cron would report different site details.
	 *
	 * @return string
	 */
	public function homeUrl(): string {
		return untrailingslashit( (string) get_option( 'home' ) );
	}

	/**
	 * Log to the debug log, never the payload.
	 *
	 * Static so callers that can't rely on the container, like activation, share it.
	 *
	 * @param string $message The message.
	 *
	 * @return void
	 */
	public static function log( string $message ) {
		if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
			error_log( 'SureCart telemetry: ' . $message ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		}
	}
}
