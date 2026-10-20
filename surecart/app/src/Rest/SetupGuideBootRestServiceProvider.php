<?php

namespace SureCart\Rest;

use SureCart\Controllers\Admin\SetupGuide\SetupGuideScriptsController;

/**
 * Boot data for the setup guide screen when the unified admin shell swaps it
 * in client-side — a direct page load localizes the same payload into scData,
 * so this endpoint is only hit on in-app navigation.
 */
class SetupGuideBootRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'admin-boot';

	/**
	 * Methods allowed for the model.
	 *
	 * @var array
	 */
	protected $methods = [];

	/**
	 * Register routes required to work.
	 *
	 * @return void
	 */
	public function registerRoutes() {
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/setup-guide',
			[
				[
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => function () {
						return rest_ensure_response( SetupGuideScriptsController::bootData() );
					},
					// Same capability the setup guide admin route requires.
					'permission_callback' => function () {
						return current_user_can( 'manage_options' );
					},
				],
			]
		);
	}
}
