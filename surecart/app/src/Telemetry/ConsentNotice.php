<?php

namespace SureCart\Telemetry;

/**
 * Asks once, on SureCart admin screens, whether the merchant shares usage data.
 */
class ConsentNotice {
	/**
	 * Notice name, also the dismissal key.
	 *
	 * @var string
	 */
	const NAME = 'telemetry_consent';

	/**
	 * When the notice may first show (unix seconds).
	 *
	 * @var string
	 */
	const AFTER_OPTION = 'surecart_telemetry_notice_after';

	/**
	 * Wait before the first showing, so new and updated stores aren't asked straight away.
	 *
	 * @var int
	 */
	const DELAY = 3 * DAY_IN_SECONDS;

	/**
	 * Nonce action for the Allow / No thanks links.
	 *
	 * @var string
	 */
	const NONCE_ACTION = 'surecart_telemetry_consent';

	/**
	 * Full-screen flows the notice would interrupt.
	 *
	 * @var string[]
	 */
	const EXCLUDED_PAGES = [ 'sc-getting-started', 'sc-setup-guide' ];

	/**
	 * The telemetry service.
	 *
	 * @var \SureCart\Telemetry\TelemetryService
	 */
	protected $telemetry;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Telemetry\TelemetryService $telemetry The telemetry service.
	 */
	public function __construct( TelemetryService $telemetry ) {
		$this->telemetry = $telemetry;
	}

	/**
	 * Bootstrap.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_action( 'current_screen', [ $this, 'maybeShow' ] );
		add_action( 'admin_init', [ $this, 'handle' ] );
	}

	/**
	 * Add the notice when it should show.
	 *
	 * @return void
	 */
	public function maybeShow() {
		if ( ! $this->shouldShow() ) {
			return;
		}

		\SureCart::notices()->add(
			[
				'name'  => self::NAME,
				'type'  => 'info',
				'title' => __( 'SureCart', 'surecart' ),
				'text'  => $this->text(),
			]
		);
	}

	/**
	 * Whether the notice should show on this request.
	 *
	 * Cheapest checks first: the delay option is only read on SureCart screens.
	 *
	 * @return bool
	 */
	public function shouldShow(): bool {
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		if ( null !== $this->telemetry->consent() ) {
			return false;
		}

		if ( ! $this->isSureCartScreen() ) {
			return false;
		}

		if ( \SureCart::notices()->isDismissed( self::NAME ) ) {
			return false;
		}

		return time() >= $this->showAfter();
	}

	/**
	 * Save the merchant's answer from the notice links.
	 *
	 * @return void
	 */
	public function handle() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Verified below, after the cheap bail.
		if ( ! isset( $_GET['surecart_action'] ) || 'telemetry_consent' !== sanitize_text_field( wp_unslash( $_GET['surecart_action'] ) ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $nonce, self::NONCE_ACTION ) ) {
			return;
		}

		$consent = isset( $_GET['consent'] ) ? sanitize_key( wp_unslash( $_GET['consent'] ) ) : '';
		if ( ! in_array( $consent, [ 'yes', 'no' ], true ) ) {
			return;
		}

		$this->telemetry->setConsent( 'yes' === $consent, 'admin_notice' );
		\SureCart::notices()->markDismissed( self::NAME );

		wp_safe_redirect( remove_query_arg( [ 'surecart_action', 'consent', '_wpnonce' ] ) );
		exit;
	}

	/**
	 * Whether this is a SureCart admin page the notice may show on.
	 *
	 * Matches on the page slug like AdminMenuPageService, since screen ids
	 * are built from the translated menu title.
	 *
	 * @return bool
	 */
	protected function isSureCartScreen(): bool {
		$page = isset( $_GET['page'] ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		return 0 === strpos( $page, 'sc-' ) && ! in_array( $page, self::EXCLUDED_PAGES, true );
	}

	/**
	 * Get when the notice may first show, starting the clock on the first check.
	 *
	 * @return int Unix seconds.
	 */
	protected function showAfter(): int {
		$after = get_option( self::AFTER_OPTION, false );

		if ( false === $after ) {
			$after = time() + self::DELAY;
			add_option( self::AFTER_OPTION, $after, '', false );
		}

		return (int) $after;
	}

	/**
	 * Get the notice body.
	 *
	 * @return string
	 */
	protected function text(): string {
		$description = sprintf(
			/* translators: %1$s: settings link start, %2$s: link end, %3$s: privacy policy link start, %4$s: link end. */
			__( 'Help us improve SureCart by sharing details about your site setup and how you use SureCart. We never collect customer, order or payment data. You can change this anytime in %1$sSettings → Advanced%2$s. %3$sLearn more%4$s', 'surecart' ),
			'<a href="' . esc_url( admin_url( 'admin.php?page=sc-settings&tab=advanced' ) ) . '">',
			'</a>',
			'<a href="' . esc_url( TelemetryService::PRIVACY_URL ) . '" target="_blank" rel="noopener">',
			'</a>'
		);

		return '<p>' . $description . '</p>'
			. '<p>'
			. '<a class="button button-primary" href="' . esc_url( $this->actionUrl( 'yes' ) ) . '">' . esc_html__( 'Allow', 'surecart' ) . '</a> '
			. '<a class="button" href="' . esc_url( $this->actionUrl( 'no' ) ) . '">' . esc_html__( 'No thanks', 'surecart' ) . '</a>'
			. '</p>';
	}

	/**
	 * Get a nonce'd link that answers the notice.
	 *
	 * @param string $consent 'yes' or 'no'.
	 *
	 * @return string
	 */
	protected function actionUrl( string $consent ): string {
		return add_query_arg(
			[
				'surecart_action' => 'telemetry_consent',
				'consent'         => $consent,
				'_wpnonce'        => wp_create_nonce( self::NONCE_ACTION ),
			]
		);
	}
}
