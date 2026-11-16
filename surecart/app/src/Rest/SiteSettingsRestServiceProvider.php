<?php

namespace SureCart\Rest;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Exposes SureCart's WordPress options to users below `manage_options`.
 *
 * Core's /wp/v2/settings is hardcoded to `manage_options`, which would also let a
 * user change siteurl, admin_email, etc. This endpoint reuses core's controller but
 * only serves options registered with a `capability` arg the current user has.
 */
class SiteSettingsRestServiceProvider extends \WP_REST_Settings_Controller implements ServiceProviderInterface {
	/**
	 * Whether get_registered_options() should skip the current-user check.
	 *
	 * @var bool
	 */
	private $building_schema = false;

	/**
	 * Set the SureCart namespace and base.
	 */
	public function __construct() {
		$this->namespace = 'surecart/v1';
		$this->rest_base = 'site_settings';
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param \Pimple\Container $container Service Container.
	 *
	 * @return void
	 */
	public function register( $container ) {
		// nothing to register.
	}

	/**
	 * Register the routes after settings are registered, mirroring core's priority 99.
	 *
	 * @param \Pimple\Container $container Service Container.
	 *
	 * @return void
	 */
	public function bootstrap( $container ) {
		add_action( 'rest_api_init', [ $this, 'register_routes' ], 99 );
	}

	/**
	 * Allow anyone who can manage shop settings; per-option access is enforced in get_registered_options().
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 *
	 * @return bool
	 */
	public function get_item_permissions_check( $request ) {
		return current_user_can( 'manage_sc_shop_settings' );
	}

	/**
	 * Schema covering every capability-tagged option, independent of the current user.
	 *
	 * Route args are built from this at rest_api_init and cached on the instance, so a
	 * user-filtered schema would validate a later request against the wrong user's options.
	 *
	 * @return array
	 */
	public function get_item_schema() {
		$this->building_schema = true;
		try {
			return parent::get_item_schema();
		} finally {
			$this->building_schema = false;
		}
	}

	/**
	 * SureCart options registered with a `capability` arg that the current user has.
	 *
	 * Core reads this for both get_item() and update_item(), so anything filtered
	 * out here can be neither read nor written through this endpoint.
	 *
	 * @return array
	 */
	protected function get_registered_options() {
		$registered = get_registered_settings();

		return array_filter(
			parent::get_registered_options(),
			function ( $args ) use ( $registered ) {
				$capability = $registered[ $args['option_name'] ]['capability'] ?? '';

				if ( ! is_string( $capability ) || '' === $capability || 0 !== strpos( $args['option_name'], 'surecart_' ) ) {
					return false;
				}

				return $this->building_schema || current_user_can( $capability );
			}
		);
	}
}
