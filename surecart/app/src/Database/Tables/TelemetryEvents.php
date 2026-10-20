<?php

namespace SureCart\Database\Tables;

use SureCart\Database\Table;

/**
 * The telemetry events outbox table.
 */
class TelemetryEvents {
	/**
	 * Holds the table instance.
	 *
	 * @var \SureCart\Database\Table
	 */
	protected $table;

	/**
	 * Version number for the table.
	 * Change this to update the table.
	 *
	 * @var integer
	 */
	protected $version = 1;

	/**
	 * Table name.
	 *
	 * @var string
	 */
	protected $name = 'surecart_telemetry_events';

	/**
	 * Get the table dependency.
	 *
	 * @param \SureCart\Database\Table $table The table dependency.
	 */
	public function __construct( Table $table ) {
		$this->table = $table;
	}

	/**
	 * Get the table name.
	 *
	 * @return string
	 */
	public function getName(): string {
		global $wpdb;
		return $wpdb->prefix . $this->name;
	}

	/**
	 * Create the outbox table.
	 *
	 * Timestamps are unix integers to match the wire format.
	 * available_at doubles as the lease expiry and the next retry time.
	 *
	 * @return mixed
	 */
	public function install() {
		return $this->table->create(
			$this->name,
			'
			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
			event varchar(64) NOT NULL,
			payload longtext NOT NULL,
			occurred_at int(10) unsigned NOT NULL,
			attempts smallint(5) unsigned NOT NULL DEFAULT 0,
			available_at int(10) unsigned NOT NULL DEFAULT 0,
			claim_token char(36) NULL,
			PRIMARY KEY  (id),
			KEY available_at (available_at)
			',
			$this->version
		);
	}

	/**
	 * Drop the table and its version option.
	 *
	 * @return boolean
	 */
	public function uninstall(): bool {
		return $this->table->drop( $this->getName() );
	}

	/**
	 * Does the table exist?
	 *
	 * @return boolean
	 */
	public function exists(): bool {
		return $this->table->exists( $this->name );
	}
}
