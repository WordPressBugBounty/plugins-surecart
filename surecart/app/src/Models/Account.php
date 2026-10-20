<?php

namespace SureCart\Models;

/**
 * Holds the data of the current account.
 */
class Account extends Model {
	/**
	 * Rest API endpoint
	 *
	 * @var string
	 */
	protected $endpoint = 'account';

	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object_name = 'account';

	/**
	 * Does an update clear account cache?
	 *
	 * @var boolean
	 */
	protected $clears_account_cache = true;

	/**
	 * Get the account ID.
	 *
	 * @return string
	 */
	public function getIsConnectedAttribute() {
		return ! empty( ApiToken::get() ) && ! empty( $this->id );
	}

	/**
	 * Get the claim expired attribute.
	 *
	 * @return bool
	 */
	public function getClaimExpiredAttribute() {
		return ! empty( $this->claim_window_ends_at ) && time() > $this->claim_window_ends_at;
	}

	/**
	 * Queue the platform's demo seeding (`POST account/seed`).
	 *
	 * The platform answers with an empty body and seeds in the background, setting
	 * `seeded_at` when done. It answers 422 (`already_seeded`) once the account was ever seeded.
	 *
	 * @return $this|\WP_Error
	 */
	protected function seed() {
		// Products only: seeded orders would tick the guide's test order step.
		$seeded = $this->makeRequest(
			[
				'method' => 'POST',
				'body'   => [ $this->object_name => [ 'seedables' => [ 'products' ] ] ],
			],
			$this->endpoint . '/seed'
		);

		if ( $this->isError( $seeded ) ) {
			return $seeded;
		}

		return $this;
	}
}
