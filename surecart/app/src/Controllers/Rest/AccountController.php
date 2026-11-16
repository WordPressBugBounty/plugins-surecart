<?php

namespace SureCart\Controllers\Rest;

use SureCart\Models\Account;

/**
 * Handle coupon requests through the REST API
 */
class AccountController {
	/**
	 * Account fields a user with only `manage_sc_shop_settings` may change (the Store Settings tab).
	 *
	 * @var string[]
	 */
	const SHOP_FIELDS = [ 'object', 'name', 'url', 'slug', 'time_zone', 'currency', 'locale' ];

	/**
	 * Find account.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function find( \WP_REST_Request $request ) {
		return $this->withoutAccountOnlyFields( Account::find() );
	}

	/**
	 * Edit model.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function edit( \WP_REST_Request $request ) {
		$params = (array) $request->get_json_params();

		if ( ! current_user_can( 'manage_sc_account_settings' ) && array_diff( array_keys( $params ), self::SHOP_FIELDS ) ) {
			return new \WP_Error(
				'rest_forbidden',
				__( 'Sorry, you are not allowed to change this setting.', 'surecart' ),
				[ 'status' => rest_authorization_required_code() ]
			);
		}

		return $this->withoutAccountOnlyFields( Account::update( $params ) );
	}

	/**
	 * Drop the store-ownership claim link for users who can't manage the account.
	 *
	 * @param \SureCart\Models\Account|\WP_Error $account Account.
	 *
	 * @return \SureCart\Models\Account|\WP_Error
	 */
	protected function withoutAccountOnlyFields( $account ) {
		if ( ! is_wp_error( $account ) && ! current_user_can( 'manage_sc_account_settings' ) ) {
			unset( $account->claim_url );
		}

		return $account;
	}
}
