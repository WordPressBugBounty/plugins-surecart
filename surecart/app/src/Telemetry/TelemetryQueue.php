<?php

namespace SureCart\Telemetry;

use SureCart\Database\Tables\TelemetryEvents;

/**
 * Durable outbox of telemetry events waiting to be sent.
 *
 * Raw $wpdb on purpose: claiming needs an atomic UPDATE ... LIMIT,
 * which DatabaseModel's read-then-write update can't do.
 *
 * phpcs:disable WordPress.DB.DirectDatabaseQuery
 */
class TelemetryQueue {
	/**
	 * The outbox table.
	 *
	 * @var \SureCart\Database\Tables\TelemetryEvents
	 */
	protected $table;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Database\Tables\TelemetryEvents $table The outbox table.
	 */
	public function __construct( TelemetryEvents $table ) {
		$this->table = $table;
	}

	/**
	 * Get the outbox table.
	 *
	 * @return \SureCart\Database\Tables\TelemetryEvents
	 */
	public function table(): TelemetryEvents {
		return $this->table;
	}

	/**
	 * Add an event to the outbox.
	 *
	 * @param string $event        The event name.
	 * @param string $payload      The encoded envelope.
	 * @param int    $occurred_at  When the event happened (unix seconds).
	 * @param int    $available_at When the row may first be claimed (unix seconds).
	 *
	 * @return bool
	 */
	public function insert( string $event, string $payload, int $occurred_at, int $available_at = 0 ): bool {
		return (bool) $this->run(
			function ( $wpdb ) use ( $event, $payload, $occurred_at, $available_at ) {
				return $wpdb->insert(
					$this->table->getName(),
					[
						'event'        => $event,
						'payload'      => $payload,
						'occurred_at'  => $occurred_at,
						'available_at' => $available_at,
					],
					[ '%s', '%s', '%d', '%d' ]
				);
			}
		);
	}

	/**
	 * Lease the next ready rows to a claim token.
	 *
	 * A row is ready once available_at has passed, which also covers
	 * rows whose previous lease expired without an ack.
	 *
	 * @param string $token        The claim token.
	 * @param int    $limit        Max rows to claim.
	 * @param int    $lease        Lease length in seconds.
	 * @param bool   $ignore_delay Also claim unleased rows that aren't ready yet. Only for a last-chance flush.
	 *
	 * @return array Rows with id, event, payload, occurred_at and attempts.
	 */
	public function claim( string $token, int $limit = 100, int $lease = 300, bool $ignore_delay = false ): array {
		$rows = $this->run(
			function ( $wpdb ) use ( $token, $limit, $lease, $ignore_delay ) {
				$now     = time();
				$claimed = $wpdb->query(
					$wpdb->prepare(
						'UPDATE %i SET claim_token = %s, available_at = %d WHERE available_at <= %d OR ( 1 = %d AND claim_token IS NULL ) ORDER BY id LIMIT %d',
						$this->table->getName(),
						$token,
						$now + $lease,
						$now,
						$ignore_delay ? 1 : 0,
						$limit
					)
				);

				if ( empty( $claimed ) ) {
					return [];
				}

				return $wpdb->get_results(
					$wpdb->prepare(
						'SELECT id, event, payload, occurred_at, attempts FROM %i WHERE claim_token = %s ORDER BY id',
						$this->table->getName(),
						$token
					)
				);
			}
		);

		return is_array( $rows ) ? $rows : [];
	}

	/**
	 * Delete claimed rows.
	 *
	 * @param int[]  $ids   Row ids.
	 * @param string $token The claim token they were leased to.
	 *
	 * @return int Rows deleted.
	 */
	public function ack( array $ids, string $token ): int {
		$ids = $this->ids( $ids );
		if ( empty( $ids ) ) {
			return 0;
		}

		return (int) $this->run(
			function ( $wpdb ) use ( $ids, $token ) {
				return $wpdb->query(
					$wpdb->prepare( // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.ReplacementsWrongNumber -- IN() placeholders are built from count( $ids ).
						'DELETE FROM %i WHERE claim_token = %s AND id IN (' . implode( ',', array_fill( 0, count( $ids ), '%d' ) ) . ')', // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
						$this->table->getName(),
						$token,
						...$ids
					)
				);
			}
		);
	}

	/**
	 * Count an attempt on claimed rows and hold them until a later retry.
	 *
	 * @param int[]  $ids   Row ids.
	 * @param string $token The claim token they were leased to.
	 * @param int    $delay Seconds until the rows are ready again.
	 *
	 * @return int Rows updated.
	 */
	public function backoff( array $ids, string $token, int $delay ): int {
		$ids = $this->ids( $ids );
		if ( empty( $ids ) ) {
			return 0;
		}

		return (int) $this->run(
			function ( $wpdb ) use ( $ids, $token, $delay ) {
				return $wpdb->query(
					$wpdb->prepare( // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.ReplacementsWrongNumber -- IN() placeholders are built from count( $ids ).
						'UPDATE %i SET attempts = attempts + 1, available_at = %d, claim_token = NULL WHERE claim_token = %s AND id IN (' . implode( ',', array_fill( 0, count( $ids ), '%d' ) ) . ')', // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
						$this->table->getName(),
						time() + $delay,
						$token,
						...$ids
					)
				);
			}
		);
	}

	/**
	 * Release a lease without counting an attempt.
	 *
	 * @param string $token The claim token.
	 *
	 * @return int Rows released.
	 */
	public function release( string $token ): int {
		return (int) $this->run(
			function ( $wpdb ) use ( $token ) {
				return $wpdb->query(
					$wpdb->prepare(
						'UPDATE %i SET claim_token = NULL, available_at = %d WHERE claim_token = %s',
						$this->table->getName(),
						time(),
						$token
					)
				);
			}
		);
	}

	/**
	 * Get when the next row becomes ready.
	 *
	 * Includes leased rows, whose available_at is the lease expiry, so a crashed
	 * run's rows are retried when the lease runs out instead of at the next sweep.
	 *
	 * @return int|null Unix seconds, or null when the outbox is empty.
	 */
	public function nextAvailableAt(): ?int {
		$next = $this->run(
			function ( $wpdb ) {
				return $wpdb->get_var(
					$wpdb->prepare(
						'SELECT MIN(available_at) FROM %i',
						$this->table->getName()
					)
				);
			}
		);

		return is_numeric( $next ) ? (int) $next : null;
	}

	/**
	 * Summarise the outbox for Site Health.
	 *
	 * @return array{pending: int, oldest_occurred_at: int|null, max_attempts: int}
	 */
	public function stats(): array {
		$row = $this->run(
			function ( $wpdb ) {
				return $wpdb->get_row(
					$wpdb->prepare(
						'SELECT COUNT(*) AS pending, MIN(occurred_at) AS oldest_occurred_at, MAX(attempts) AS max_attempts FROM %i',
						$this->table->getName()
					)
				);
			}
		);

		return [
			'pending'            => (int) ( $row->pending ?? 0 ),
			'oldest_occurred_at' => is_numeric( $row->oldest_occurred_at ?? null ) ? (int) $row->oldest_occurred_at : null,
			'max_attempts'       => (int) ( $row->max_attempts ?? 0 ),
		];
	}

	/**
	 * Delete rows the platform would reject as too old.
	 *
	 * The platform accepts events from the start of the previous UTC month.
	 *
	 * @return int Rows deleted.
	 */
	public function purgeExpired(): int {
		$cutoff = gmmktime( 0, 0, 0, (int) gmdate( 'n' ) - 1, 1, (int) gmdate( 'Y' ) );

		return (int) $this->run(
			function ( $wpdb ) use ( $cutoff ) {
				return $wpdb->query(
					$wpdb->prepare(
						'DELETE FROM %i WHERE occurred_at < %d ORDER BY id LIMIT 500',
						$this->table->getName(),
						$cutoff
					)
				);
			}
		);
	}

	/**
	 * Keep only the newest rows.
	 *
	 * @param int $max Max rows to keep.
	 *
	 * @return int Rows deleted.
	 */
	public function enforceCap( int $max = 5000 ): int {
		return (int) $this->run(
			function ( $wpdb ) use ( $max ) {
				$oldest_over_cap = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT id FROM %i ORDER BY id DESC LIMIT 1 OFFSET %d',
						$this->table->getName(),
						$max
					)
				);

				if ( null === $oldest_over_cap ) {
					return 0;
				}

				return $wpdb->query(
					$wpdb->prepare(
						'DELETE FROM %i WHERE id <= %d',
						$this->table->getName(),
						(int) $oldest_over_cap
					)
				);
			}
		);
	}

	/**
	 * Delete every row except the given events.
	 *
	 * @param string[] $exempt_events Events to keep.
	 *
	 * @return int Rows deleted.
	 */
	public function purgeConsentRequired( array $exempt_events ): int {
		$exempt_events = array_values( array_filter( $exempt_events, 'is_string' ) );
		if ( empty( $exempt_events ) ) {
			return 0;
		}

		return (int) $this->run(
			function ( $wpdb ) use ( $exempt_events ) {
				return $wpdb->query(
					$wpdb->prepare( // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.ReplacementsWrongNumber -- IN() placeholders are built from count( $exempt_events ).
						'DELETE FROM %i WHERE event NOT IN (' . implode( ',', array_fill( 0, count( $exempt_events ), '%s' ) ) . ')', // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
						$this->table->getName(),
						...$exempt_events
					)
				);
			}
		);
	}

	/**
	 * Normalize a list of row ids.
	 *
	 * @param array $ids Row ids.
	 *
	 * @return int[]
	 */
	protected function ids( array $ids ): array {
		return array_values( array_unique( array_filter( array_map( 'intval', $ids ) ) ) );
	}

	/**
	 * Run a query without printing or logging database errors.
	 *
	 * A missing table must not surface notices on the request that records an event.
	 *
	 * @param callable $callback Receives $wpdb.
	 *
	 * @return mixed The callback result, or false on failure.
	 */
	protected function run( callable $callback ) {
		global $wpdb;

		$suppressed = $wpdb->suppress_errors( true );

		try {
			return $callback( $wpdb );
		} catch ( \Throwable $e ) {
			return false;
		} finally {
			$wpdb->suppress_errors( $suppressed );
		}
	}
}
