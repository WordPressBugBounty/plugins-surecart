<?php

namespace SureCart\Models;

/**
 * Provisional Account model
 */
class ProvisionalAccount extends Model {
	/**
	 * Rest API endpoint
	 *
	 * @var string
	 */
	protected $endpoint = 'public/provisional_accounts';

	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object_name = 'provisional_account';

	/**
	 * Make the API request.
	 *
	 * @param array  $args Array of arguments.
	 * @param string $endpoint Optional endpoint override.
	 *
	 * @return Model
	 */
	protected function makeRequest( $args = [], $endpoint = '' ) {
		return \SureCart::unAuthorizedRequest( ...$this->prepareRequest( $args, $endpoint ) );
	}

	/**
	 * Check if the API token is set.
	 *
	 * @return bool
	 */
	protected function hasApiToken() {
		return ! empty( ApiToken::get() );
	}

	/**
	 * Check if the E2E testing is enabled.
	 *
	 * @return bool
	 */
	protected function isTesting() {
		return defined( 'SC_E2E_TESTING' ) ? (bool) SC_E2E_TESTING : false;
	}

	/**
	 * Create a new model
	 *
	 * @param array $attributes Attributes to create.
	 *
	 * @return $this|false
	 */
	protected function create( $attributes = [] ) {
		// we only allow this if the setup is not complete.
		if ( $this->hasApiToken() && ! $this->isTesting() ) {
			return new \WP_Error( 'setup_complete', __( 'You have already set up your store.', 'surecart' ) );
		}

		// set account name as the site name if nothing is provided.
		if ( empty( $attributes['account_name'] ) ) {
			$attributes['account_name'] = $this->defaultAccountName();
		}

		// Prevent minimum 3 character requirement error for account name.
		if ( mb_strlen( $attributes['account_name'] ) < 3 ) {
			return new \WP_Error( 'invalid_account_name', __( 'Store name must be at least 3 characters long. Please choose a different name for your store.', 'surecart' ) );
		}

		// set the account url from the blog url.
		if ( empty( $attributes['account_url'] ) ) {
			$attributes['account_url'] = get_bloginfo( 'url' );
		}

		// set source with fallback to the option.
		$attributes['source'] = isset( $attributes['source'] ) ? sanitize_text_field( wp_unslash( $attributes['source'] ) ) : sanitize_text_field( get_option( 'surecart_source', 'surecart_wp' ) );

		$created = parent::create( $attributes );
		if ( is_wp_error( $created ) ) {
			return $created;
		}

		$import = \SureCart::account()->import( $attributes );
		if ( is_wp_error( $import ) ) {
			return $import;
		}

		return $created;
	}

	/**
	 * Site name, else the site host, padded so the platform's 3-character minimum passes.
	 *
	 * @return string
	 */
	protected function defaultAccountName() {
		$name = get_bloginfo( 'name' );
		if ( empty( $name ) ) {
			$name = (string) wp_parse_url( home_url(), PHP_URL_HOST );
		}
		if ( mb_strlen( $name ) < 3 ) {
			/* translators: %s: site name, or its host when the site has no name. */
			$name = trim( sprintf( _x( '%s Store', 'default store name', 'surecart' ), $name ) );
		}
		return $name;
	}

	/**
	 * Seed the account with products.
	 *
	 * @param array $products The products to seed.
	 *
	 * @return \SureCart\Models\Import|\WP_Error
	 */
	protected function seed( $products = [] ) {
		return \SureCart::account()->seed( $products );
	}
}
