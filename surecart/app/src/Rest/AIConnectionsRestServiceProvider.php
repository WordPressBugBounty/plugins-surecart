<?php

namespace SureCart\Rest;

use SureCart\Controllers\Rest\AIConnectionsController;

/**
 * The current user's connected AI assistants, for the AI Assistants settings page.
 *
 * Read-only: disconnecting revokes the application password through core's
 * `/wp/v2/users/me/application-passwords/{uuid}` route.
 */
class AIConnectionsRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'ai_connections';

	/**
	 * No model CRUD routes; the single read route is registered in registerRoutes().
	 *
	 * @var array
	 */
	protected $methods = [];

	/**
	 * Register REST Routes
	 *
	 * @return void
	 */
	public function registerRoutes() {
		register_rest_route(
			"$this->name/v$this->version",
			"$this->endpoint",
			[
				[
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => $this->callback( AIConnectionsController::class, 'index' ),
					'permission_callback' => [ $this, 'get_items_permissions_check' ],
				],
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
	}

	/**
	 * Same capability as the settings page that shows them.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 *
	 * @return bool
	 */
	public function get_items_permissions_check( $request ) {
		return current_user_can( 'manage_sc_shop_settings' );
	}
}
