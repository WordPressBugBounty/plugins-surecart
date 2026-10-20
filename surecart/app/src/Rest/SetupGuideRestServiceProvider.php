<?php

namespace SureCart\Rest;

use SureCart\Controllers\Rest\SetupGuideController;

/**
 * Setup guide status, option updates and actions. Site-admin only.
 */
class SetupGuideRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'setup_guide';

	/**
	 * Rest Controller
	 *
	 * @var string
	 */
	protected $controller = SetupGuideController::class;

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
			$this->endpoint,
			[
				[
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => $this->callback( $this->controller, 'status' ),
					'permission_callback' => [ $this, 'get_item_permissions_check' ],
					'args'                => [
						'refresh' => [
							'description' => esc_html__( 'Drop the cached account before computing status.', 'surecart' ),
							'type'        => 'boolean',
						],
						'include' => [
							'description' => esc_html__( 'Extra sections to compute, e.g. `next`.', 'surecart' ),
							'type'        => 'string',
						],
					],
				],
				[
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => $this->callback( $this->controller, 'update' ),
					'permission_callback' => [ $this, 'update_item_permissions_check' ],
					'args'                => [
						'onboarding' => [
							'description' => esc_html__( 'Onboarding answers to merge.', 'surecart' ),
							'type'        => 'object',
						],
						'dismissed'  => [
							'description' => esc_html__( 'Guide sections to dismiss or restore.', 'surecart' ),
							'type'        => 'object',
						],
					],
				],
			]
		);
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/launch',
			[
				[
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => $this->callback( $this->controller, 'launch' ),
					'permission_callback' => [ $this, 'create_item_permissions_check' ],
				],
			]
		);
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/seed',
			[
				[
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => $this->callback( $this->controller, 'seed' ),
					'permission_callback' => [ $this, 'create_item_permissions_check' ],
				],
			]
		);
	}

	/**
	 * Read status.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access, WP_Error object otherwise.
	 */
	public function get_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Update the option.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access, WP_Error object otherwise.
	 */
	public function update_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Launch or seed.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access, WP_Error object otherwise.
	 */
	public function create_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}
}
