<?php

namespace SureCart\Telemetry;

use SureCart\Models\ApiToken;

/**
 * Delivers the outbox to the platform. Runs as an Action Scheduler action.
 */
class TelemetrySender {
	/**
	 * Action Scheduler hook.
	 *
	 * @var string
	 */
	const HOOK = 'surecart/telemetry/send';

	/**
	 * Group for the kick after an event is recorded and the retry after a run.
	 *
	 * @var string
	 */
	const GROUP = 'surecart-telemetry';

	/**
	 * Group for the daily sweep, so a pending sweep never stands in for a kick or retry.
	 *
	 * @var string
	 */
	const SWEEP_GROUP = 'surecart-telemetry-sweep';

	/**
	 * Soonest a retry is scheduled after a run, in seconds.
	 *
	 * @var int
	 */
	const MIN_RETRY_DELAY = 60;

	/**
	 * Soonest a retry is scheduled while there's no API token, in seconds.
	 *
	 * Connecting a store can take days, and sites without consent have no
	 * sweep, so this is their only wake-up; a minute would just spin.
	 *
	 * @var int
	 */
	const NO_TOKEN_RETRY_DELAY = HOUR_IN_SECONDS;

	/**
	 * Outcome of the last run that reached the platform, for Site Health.
	 *
	 * @var string
	 */
	const LAST_RUN_OPTION = 'surecart_telemetry_last_run';

	/**
	 * Rejections the platform may accept later: only occurred_at was in its future.
	 *
	 * Younger than this, the site clock is likely just ahead; older, it never will be.
	 *
	 * @var int
	 */
	const FUTURE_REJECTION_WINDOW = 600;

	/**
	 * Events per request. The platform accepts at most 100.
	 *
	 * @var int
	 */
	const BATCH_SIZE = 100;

	/**
	 * Max batches per run.
	 *
	 * @var int
	 */
	const MAX_BATCHES = 5;

	/**
	 * Max seconds per run before starting another batch.
	 *
	 * @var int
	 */
	const MAX_SECONDS = 20;

	/**
	 * Lease length for claimed rows, in seconds.
	 *
	 * @var int
	 */
	const LEASE = 300;

	/**
	 * Longest backoff, in seconds.
	 *
	 * @var int
	 */
	const MAX_BACKOFF = 21600;

	/**
	 * Wait after a 426 (plugin too old), in seconds.
	 *
	 * @var int
	 */
	const UPGRADE_BACKOFF = 86400;

	/**
	 * The outbox.
	 *
	 * @var \SureCart\Telemetry\TelemetryQueue
	 */
	protected $queue;

	/**
	 * The telemetry service.
	 *
	 * @var \SureCart\Telemetry\TelemetryService
	 */
	protected $telemetry;

	/**
	 * The site details builder.
	 *
	 * @var \SureCart\Telemetry\SiteDetails
	 */
	protected $site_details;

	/**
	 * Outcome of the current run, or null until it makes a request.
	 *
	 * @var array|null
	 */
	protected $report = null;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Telemetry\TelemetryQueue   $queue        The outbox.
	 * @param \SureCart\Telemetry\TelemetryService $telemetry    The telemetry service.
	 * @param \SureCart\Telemetry\SiteDetails      $site_details The site details builder.
	 */
	public function __construct( TelemetryQueue $queue, TelemetryService $telemetry, SiteDetails $site_details ) {
		$this->queue        = $queue;
		$this->telemetry    = $telemetry;
		$this->site_details = $site_details;
	}

	/**
	 * Schedule the daily sweep on admin and cron requests, for opted-in sites.
	 *
	 * @return void
	 */
	public function schedule() {
		// Keep the scheduled-action lookup off storefront and AJAX requests.
		if ( ! ( ( is_admin() && ! wp_doing_ajax() ) || wp_doing_cron() ) ) {
			return;
		}

		// The sweep's only unique job is the site details sync, which needs consent.
		if ( true !== $this->telemetry->consent() ) {
			return;
		}

		$this->scheduleSweep();
	}

	/**
	 * Schedule the daily sweep if it isn't already.
	 *
	 * @return void
	 */
	public function scheduleSweep() {
		if ( \SureCart::queue()->isScheduled( self::HOOK, [], self::SWEEP_GROUP ) ) {
			return;
		}

		\SureCart::queue()->scheduleRecurring( time(), DAY_IN_SECONDS, self::HOOK, [], self::SWEEP_GROUP, true );
	}

	/**
	 * Unschedule the daily sweep, leaving any kick or retry for consent-exempt events.
	 *
	 * @return void
	 */
	public function unscheduleSweep() {
		\SureCart::queue()->cancelAll( self::HOOK, [], self::SWEEP_GROUP );
	}

	/**
	 * Schedule a send for when a newly recorded row is ready.
	 *
	 * The row waits KICK_DELAY so a site clock slightly ahead of the platform's
	 * doesn't send events it reads as from the future. During plugin activation
	 * Action Scheduler may not be ready yet; the next run picks the row up then.
	 *
	 * @return void
	 */
	public function kick() {
		if ( ! did_action( 'action_scheduler_init' ) ) {
			return;
		}

		$this->scheduleOnce( time() + TelemetryService::KICK_DELAY );
	}

	/**
	 * Unschedule the sweep, kick and retry.
	 *
	 * No group: Action Scheduler then cancels the hook in every group.
	 *
	 * @return void
	 */
	public function unschedule() {
		\SureCart::queue()->cancelAll( self::HOOK );
	}

	/**
	 * Send the outbox.
	 *
	 * @return void
	 */
	public function run() {
		$this->queue->purgeExpired();
		$this->queue->enforceCap();

		// No store yet: rows wait without counting an attempt.
		if ( empty( ApiToken::get() ) ) {
			$this->scheduleRetry();
			return;
		}

		$this->site_details->maybeSync();

		$this->report = null;
		$started      = microtime( true );

		for ( $batch = 0; $batch < self::MAX_BATCHES; $batch++ ) {
			if ( microtime( true ) - $started >= self::MAX_SECONDS ) {
				break;
			}

			if ( ! $this->sendBatch() ) {
				break;
			}
		}

		$this->saveReport();
		$this->scheduleRetry();
	}

	/**
	 * Send one batch now, inline, for when Action Scheduler won't get another chance.
	 *
	 * Best effort: never throws, and anything left waits for the next run.
	 * Short by default because a user is waiting on it; RequestService retries a 409 once,
	 * so the worst case is about two seconds.
	 * It claims the oldest unleased rows, so a backlog of 100+ can leave the newest event out.
	 * It skips the clock-skew delay on new rows.
	 *
	 * @param int $timeout Request timeout in seconds.
	 *
	 * @return void
	 */
	public function flush( int $timeout = 1 ) {
		try {
			if ( empty( ApiToken::get() ) ) {
				return;
			}

			$this->report = null;
			$this->sendBatch( $timeout, true );
			$this->saveReport();
		} catch ( \Throwable $e ) {
			$this->log( $e->getMessage() );
		}
	}

	/**
	 * Schedule one retry for when the next waiting row is ready.
	 *
	 * @return void
	 */
	protected function scheduleRetry() {
		if ( ! did_action( 'action_scheduler_init' ) ) {
			return;
		}

		$next = $this->queue->nextAvailableAt();
		if ( null === $next ) {
			return;
		}

		// No store yet, or a 401 during the run cleared the token: check back later rather than never.
		$delay = empty( ApiToken::get() ) ? self::NO_TOKEN_RETRY_DELAY : self::MIN_RETRY_DELAY;

		$this->scheduleOnce( max( $next, time() + $delay ) );
	}

	/**
	 * Schedule a send at a time, unless one is already pending by then.
	 *
	 * Checks for a pending action instead of using the unique flag, which also
	 * counts running actions and would block this when called from a run.
	 * A rare duplicate is harmless: the lease keeps two runs off the same rows.
	 *
	 * @param int $at Unix timestamp.
	 *
	 * @return void
	 */
	protected function scheduleOnce( int $at ) {
		$pending = \SureCart::queue()->search(
			[
				'hook'         => self::HOOK,
				'group'        => self::GROUP,
				'status'       => 'pending', // ActionScheduler_Store::STATUS_PENDING.
				'date'         => $at,
				'date_compare' => '<=',
				'per_page'     => 1,
				'orderby'      => 'none',
			],
			'ids'
		);

		if ( ! empty( $pending ) ) {
			return;
		}

		\SureCart::queue()->scheduleSingle( $at, self::HOOK, [], self::GROUP );
	}

	/**
	 * Claim, send and settle one batch.
	 *
	 * Claim, send and ack are separate statements; nothing is held open across the request.
	 *
	 * @param int  $timeout      Request timeout in seconds.
	 * @param bool $ignore_delay Also send unleased rows that aren't ready yet.
	 *
	 * @return bool Whether to send another batch.
	 */
	protected function sendBatch( int $timeout = 10, bool $ignore_delay = false ): bool {
		$token = wp_generate_uuid4();
		$rows  = $this->queue->claim( $token, self::BATCH_SIZE, self::LEASE, $ignore_delay );

		if ( empty( $rows ) ) {
			return false;
		}

		$events  = [];
		$by_id   = [];
		$corrupt = [];

		foreach ( $rows as $row ) {
			// Objects, not arrays, so empty properties stay {}.
			$event = json_decode( $row->payload );

			if ( ! is_object( $event ) || empty( $event->id ) || ! is_string( $event->id ) ) {
				$corrupt[] = $row->id;
				continue;
			}

			$events[]            = $event;
			$by_id[ $event->id ] = $row;
		}

		if ( ! empty( $corrupt ) ) {
			$this->queue->ack( $corrupt, $token );
			$this->log( sprintf( 'Deleted %d corrupt event(s).', count( $corrupt ) ) );
		}

		if ( empty( $events ) ) {
			return true;
		}

		// Uncached: makeRequest() would store every receipt in the object cache, keyed by the whole body.
		$response = \SureCart::requests()->makeUncachedRequest(
			'telemetry_events',
			[
				'method'  => 'POST',
				'body'    => [ 'events' => $events ],
				'timeout' => $timeout,
			]
		);

		if ( is_wp_error( $response ) ) {
			return $this->handleError( $response, $by_id, $token );
		}

		// Keep draining: rows recorded during this run are claimed on the next pass.
		return $this->handleReceipt( $response, $by_id, $token );
	}

	/**
	 * Settle a batch from the platform's receipt.
	 *
	 * @param mixed  $receipt The decoded response body.
	 * @param array  $by_id   Claimed rows keyed by event id.
	 * @param string $token   The claim token.
	 *
	 * @return bool Whether every row was settled.
	 */
	protected function handleReceipt( $receipt, array $by_id, string $token ): bool {
		if ( ! is_object( $receipt ) || ! is_array( $receipt->accepted ?? null ) || ! is_array( $receipt->rejected ?? null ) ) {
			$this->report( 'error:invalid_receipt' );
			$this->backoff( $by_id, $token );
			return false;
		}

		$settled  = [];
		$accepted = 0;
		$rejected = 0;
		$fields   = null;

		foreach ( $receipt->accepted as $id ) {
			if ( is_string( $id ) && isset( $by_id[ $id ] ) ) {
				$settled[ $id ] = $by_id[ $id ]->id;
				++$accepted;
			}
		}

		foreach ( $receipt->rejected as $rejection ) {
			$id = $rejection->id ?? null;
			if ( ! is_string( $id ) || ! isset( $by_id[ $id ] ) ) {
				continue;
			}

			$event  = $by_id[ $id ]->event;
			$errors = $rejection->errors ?? null;
			$fields = array_map( 'strval', array_keys( (array) $errors ) );
			++$rejected;

			// Left unsettled, so it backs off and is resent with the same id and occurred_at.
			if ( $this->isRetryableRejection( $fields, $by_id[ $id ] ) ) {
				continue;
			}

			$settled[ $id ] = $by_id[ $id ]->id;

			/**
			 * Fires when the platform permanently rejects an event.
			 *
			 * @param string $event  The event name.
			 * @param mixed  $errors The platform's errors, by field.
			 */
			do_action( 'surecart/telemetry/rejected', $event, $errors );

			$this->log( sprintf( '%s rejected: %s', $event, wp_json_encode( $errors ) ) );
		}

		$this->report( 'ok', $accepted, $rejected, $fields );
		$this->queue->ack( array_values( $settled ), $token );

		// Unlisted rows are safe to resend; the platform dedupes on id.
		$unsettled = array_diff_key( $by_id, $settled );
		if ( ! empty( $unsettled ) ) {
			$this->backoff( $unsettled, $token );
			return false;
		}

		return true;
	}

	/**
	 * Whether a rejection only says the event is from the platform's future, and is recent.
	 *
	 * The site clock is ahead of the platform's, so a later resend will be accepted.
	 *
	 * @param string[] $fields The rejected field names.
	 * @param object   $row    The claimed row.
	 *
	 * @return bool
	 */
	protected function isRetryableRejection( array $fields, $row ): bool {
		return [ 'occurred_at' ] === $fields && time() - (int) $row->occurred_at < self::FUTURE_REJECTION_WINDOW;
	}

	/**
	 * Settle a batch after a failed request.
	 *
	 * @param \WP_Error $error The request error.
	 * @param array     $by_id Claimed rows keyed by event id.
	 * @param string    $token The claim token.
	 *
	 * @return bool Whether to send another batch.
	 */
	protected function handleError( \WP_Error $error, array $by_id, string $token ): bool {
		$data   = $error->get_error_data();
		$status = is_array( $data ) ? (int) ( $data['status'] ?? 0 ) : 0;

		$this->report( 'error:' . ( $error->get_error_code() ? $error->get_error_code() : $status ) );

		// RequestService maps 401 to invalid_token (and clears the token), and returns missing_token without calling.
		if ( in_array( $error->get_error_code(), [ 'missing_token', 'invalid_token' ], true ) || 401 === $status ) {
			$this->queue->release( $token );
			return false;
		}

		// The platform will answer this batch the same way every time. Any other 400,
		// say from a WAF or proxy in front of it, says nothing about the events.
		if ( 400 === $status && 'malformed_json' === $error->get_error_code() ) {
			$this->queue->ack( wp_list_pluck( $by_id, 'id' ), $token );
			$this->log( sprintf( 'Dropped a batch of %d event(s) after a 400: %s', count( $by_id ), $error->get_error_message() ) );
			return true;
		}

		if ( 426 === $status ) {
			$this->queue->backoff( wp_list_pluck( $by_id, 'id' ), $token, self::UPGRADE_BACKOFF );
			return false;
		}

		// Timeouts, 409, 413, 5xx and anything unexpected.
		$this->backoff( $by_id, $token );
		return false;
	}

	/**
	 * Hold rows for a retry, based on the most-attempted row.
	 *
	 * @param array  $rows  Claimed rows.
	 * @param string $token The claim token.
	 *
	 * @return void
	 */
	protected function backoff( array $rows, string $token ) {
		$attempts = max( array_map( 'intval', wp_list_pluck( $rows, 'attempts' ) ) );
		$this->queue->backoff( wp_list_pluck( $rows, 'id' ), $token, $this->delay( $attempts ) );
	}

	/**
	 * Get the retry delay: exponential from a minute, capped at 6 hours, plus up to 25% jitter.
	 *
	 * @param int $attempts Attempts already made.
	 *
	 * @return int Seconds.
	 */
	public function delay( int $attempts ): int {
		$base = (int) min( 60 * ( 2 ** min( max( $attempts, 0 ), 9 ) ), self::MAX_BACKOFF );
		return $base + wp_rand( 0, intdiv( $base, 4 ) );
	}

	/**
	 * Note the outcome of a request in this run.
	 *
	 * @param string        $status   'ok' or 'error:<code|status>'.
	 * @param int           $accepted Events accepted.
	 * @param int           $rejected Events rejected.
	 * @param string[]|null $fields   Field names from the last rejection, or null to keep the previous.
	 *
	 * @return void
	 */
	protected function report( string $status, int $accepted = 0, int $rejected = 0, ?array $fields = null ) {
		$previous = $this->report ?? [
			'accepted'        => 0,
			'rejected'        => 0,
			'rejected_fields' => [],
		];

		$this->report = [
			'time'            => time(),
			'status'          => $status,
			'accepted'        => $previous['accepted'] + $accepted,
			'rejected'        => $previous['rejected'] + $rejected,
			'rejected_fields' => $fields ?? $previous['rejected_fields'],
		];
	}

	/**
	 * Store the run's outcome, if it made a request.
	 *
	 * @return void
	 */
	protected function saveReport() {
		if ( null === $this->report ) {
			return;
		}

		update_option( self::LAST_RUN_OPTION, $this->report, false );
		$this->report = null;
	}

	/**
	 * Log to the debug log, never the payload.
	 *
	 * @param string $message The message.
	 *
	 * @return void
	 */
	protected function log( string $message ) {
		TelemetryService::log( $message );
	}
}
