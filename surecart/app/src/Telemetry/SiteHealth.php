<?php

namespace SureCart\Telemetry;

/**
 * Shows the usage data outbox under Tools → Site Health → Info, for support.
 */
class SiteHealth {
	/**
	 * Section key in the Site Health info.
	 *
	 * @var string
	 */
	const SECTION = 'surecart-telemetry';

	/**
	 * The telemetry service.
	 *
	 * @var \SureCart\Telemetry\TelemetryService
	 */
	protected $telemetry;

	/**
	 * The outbox.
	 *
	 * @var \SureCart\Telemetry\TelemetryQueue
	 */
	protected $queue;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Telemetry\TelemetryService $telemetry The telemetry service.
	 * @param \SureCart\Telemetry\TelemetryQueue   $queue     The outbox.
	 */
	public function __construct( TelemetryService $telemetry, TelemetryQueue $queue ) {
		$this->telemetry = $telemetry;
		$this->queue     = $queue;
	}

	/**
	 * Bootstrap.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_filter( 'debug_information', [ $this, 'addSection' ] );
	}

	/**
	 * Add the usage data section.
	 *
	 * @param array $info The Site Health info sections.
	 *
	 * @return array
	 */
	public function addSection( $info ): array {
		$info = is_array( $info ) ? $info : [];

		$exists  = $this->queue->table()->exists();
		$stats   = $exists ? $this->queue->stats() : null;
		$install = get_option( TelemetryService::INSTALL_OPTION, false );

		$info[ self::SECTION ] = [
			'label'  => __( 'SureCart Usage Data', 'surecart' ),
			'fields' => [
				'consent'             => [
					'label' => __( 'Consent', 'surecart' ),
					'value' => $this->consentLabel(),
				],
				'install_id'          => [
					'label'   => __( 'Install ID', 'surecart' ),
					'value'   => is_array( $install ) && ! empty( $install['id'] ) ? $install['id'] : __( 'Not created yet', 'surecart' ),
					'private' => true,
				],
				'table_exists'        => [
					'label' => __( 'Outbox table exists', 'surecart' ),
					'value' => $exists ? __( 'Yes', 'surecart' ) : __( 'No', 'surecart' ),
				],
				'pending_events'      => [
					'label' => __( 'Pending events', 'surecart' ),
					'value' => $stats['pending'] ?? 0,
				],
				'oldest_pending'      => [
					'label' => __( 'Oldest pending event', 'surecart' ),
					'value' => isset( $stats['oldest_occurred_at'] ) ? $this->date( $stats['oldest_occurred_at'] ) : __( 'None', 'surecart' ),
				],
				'max_attempts'        => [
					'label' => __( 'Most send attempts on a pending event', 'surecart' ),
					'value' => $stats['max_attempts'] ?? 0,
				],
				'next_scheduled_send' => [
					'label' => __( 'Next scheduled send', 'surecart' ),
					'value' => $this->nextSend(),
				],
				'last_run'            => [
					'label' => __( 'Last send', 'surecart' ),
					'value' => $this->lastRun(),
				],
			],
		];

		return $info;
	}

	/**
	 * Describe the consent state.
	 *
	 * @return string
	 */
	protected function consentLabel(): string {
		$consent = $this->telemetry->consent();

		if ( null === $consent ) {
			return __( 'Not answered', 'surecart' );
		}

		return $consent ? __( 'Yes', 'surecart' ) : __( 'No', 'surecart' );
	}

	/**
	 * Describe the earliest pending send across the send and sweep groups.
	 *
	 * @return string
	 */
	protected function nextSend(): string {
		if ( ! did_action( 'action_scheduler_init' ) ) {
			return __( 'Unknown', 'surecart' );
		}

		$next = \SureCart::queue()->getNext( TelemetrySender::HOOK );

		if ( true === $next ) {
			return __( 'Running now', 'surecart' );
		}

		return is_int( $next ) ? $this->date( $next ) : __( 'None', 'surecart' );
	}

	/**
	 * Describe the last run that reached the platform.
	 *
	 * @return string
	 */
	protected function lastRun(): string {
		$last = get_option( TelemetrySender::LAST_RUN_OPTION, false );

		if ( ! is_array( $last ) || empty( $last['time'] ) ) {
			return __( 'Never', 'surecart' );
		}

		$summary = sprintf(
			/* translators: 1: date, 2: status such as "ok" or "error:invalid_token", 3: accepted count, 4: rejected count. */
			__( '%1$s: %2$s, %3$d accepted, %4$d rejected', 'surecart' ),
			$this->date( (int) $last['time'] ),
			(string) ( $last['status'] ?? '' ),
			(int) ( $last['accepted'] ?? 0 ),
			(int) ( $last['rejected'] ?? 0 )
		);

		if ( empty( $last['rejected_fields'] ) || ! is_array( $last['rejected_fields'] ) ) {
			return $summary;
		}

		return sprintf(
			/* translators: 1: last run summary, 2: comma-separated field names. */
			__( '%1$s (last rejected fields: %2$s)', 'surecart' ),
			$summary,
			implode( ', ', array_map( 'strval', $last['rejected_fields'] ) )
		);
	}

	/**
	 * Format a unix timestamp as a UTC date.
	 *
	 * @param int $timestamp Unix seconds.
	 *
	 * @return string
	 */
	protected function date( int $timestamp ): string {
		return gmdate( 'Y-m-d H:i:s', $timestamp ) . ' UTC';
	}
}
