<?php

namespace SureCart\Rest;

use SureCart\AgentCatalog\AgentCatalogService;
use SureCart\Controllers\Rest\AgentCatalogController;

/**
 * Public, read-only product manifest for external AI shopping agents.
 *
 * While the merchant has it off the route is not registered, so the store is invisible
 * to agents looking for it. The discovery link lives in the AgentCatalogService.
 */
class AgentCatalogRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'agent-catalog';

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
		if ( ! \SureCart::agentCatalog()->isEnabled() ) {
			return;
		}

		register_rest_route(
			"$this->name/v$this->version",
			"$this->endpoint",
			[
				[
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => $this->callback( AgentCatalogController::class, 'index' ),
					'permission_callback' => '__return_true',
					'args'                => [
						'page'     => [
							'description' => esc_html__( 'Page of the catalog to return.', 'surecart' ),
							'type'        => 'integer',
							'default'     => 1,
							'minimum'     => 1,
						],
						'per_page' => [
							'description' => esc_html__( 'Products per page.', 'surecart' ),
							'type'        => 'integer',
							// one request covers most stores; image lookups scale per item, so the default is also the cap.
							'default'     => AgentCatalogService::DEFAULT_PER_PAGE,
							'minimum'     => 1,
							'maximum'     => AgentCatalogService::DEFAULT_PER_PAGE,
						],
					],
				],
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
	}
}
