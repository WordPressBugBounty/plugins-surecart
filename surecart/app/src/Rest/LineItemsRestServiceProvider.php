<?php

namespace SureCart\Rest;

use SureCart\Rest\RestServiceInterface;
use SureCart\Controllers\Rest\LineItemsController;
use SureCart\Support\PublicCatalogData;

/**
 * Service provider for Price Rest Requests
 */
class LineItemsRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'line_items';

	/**
	 * Rest Controller
	 *
	 * @var string
	 */
	protected $controller = LineItemsController::class;

	/**
	 * Whether the rest service provider converts currency.
	 *
	 * @var boolean
	 */
	protected $converts_currency = true;

	/**
	 * Methods allowed for the model.
	 *
	 * @var array
	 */
	protected $methods = [ 'index', 'edit', 'create', 'find', 'delete' ];

	/**
	 * Filter index list items by schema context.
	 *
	 * @var boolean
	 */
	protected $filters_list_items = true;

	/**
	 * Register REST Routes.
	 *
	 * @return void
	 */
	public function registerRoutes() {
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/upsell/',
			[
				[
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => $this->callback( $this->controller, 'upsell' ),
					'permission_callback' => [ $this, 'update_item_permissions_check' ],
				],
				// Register our schema callback.
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/(?P<id>\S+)/swap/',
			[
				[
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => $this->callback( $this->controller, 'swap' ),
					'permission_callback' => [ $this, 'update_item_permissions_check' ],
				],
				// Register our schema callback.
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/(?P<id>\S+)/unswap/',
			[
				[
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => $this->callback( $this->controller, 'unswap' ),
					'permission_callback' => [ $this, 'update_item_permissions_check' ],
				],
				// Register our schema callback.
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
	}

	/**
	 * Get our sample schema for a post.
	 *
	 * @return array The sample schema for a post
	 */
	public function get_item_schema() {
		if ( $this->schema ) {
			// Since WordPress 5.3, the schema can be cached in the $schema property.
			return $this->schema;
		}

		$this->schema = [
			// This tells the spec of JSON Schema we are using which is draft 4.
			'$schema'    => 'http://json-schema.org/draft-04/schema#',
			// The title property marks the identity of the resource.
			'title'      => $this->endpoint,
			'type'       => 'object',
			// In JSON Schema you can specify object properties in the properties attribute.
			'properties' => [
				'id'       => [
					'description' => esc_html__( 'Unique identifier for the object.', 'surecart' ),
					'type'        => 'string',
					'context'     => [ 'view', 'edit', 'embed' ],
					'readonly'    => true,
				],
				'checkout' => [
					'description' => esc_html__( 'The checkout for the line item.', 'surecart' ),
					'type'        => 'object',
					'context'     => [ 'view', 'edit', 'embed' ],
					'properties'  => [
						'customer' => [
							'description' => esc_html__( 'The customer associated with the checkout.', 'surecart' ),
							'type'        => 'object',
							'context'     => [ 'edit' ], // customer is only available in the edit context.
						],
					],
				],
			],
		];

		return $this->schema;
	}

	/**
	 * Get the collection params.
	 *
	 * @return array
	 */
	public function get_collection_params() {
		return [
			'page'     => [
				'description' => esc_html__( 'The page of items you want returned.', 'surecart' ),
				'type'        => 'integer',
			],
			'per_page' => [
				'description' => esc_html__( 'A limit on the number of items to be returned, between 1 and 100.', 'surecart' ),
				'type'        => 'integer',
			],
		];
	}

	/**
	 * Anyone can get a specific price.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access to create items, WP_Error object otherwise.
	 */
	public function get_item_permissions_check( $request ) {
		return $this->forbidEditContextWithout( $request, 'edit_sc_prices' );
	}

	/**
	 * Who can list checkouts
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access to create items, WP_Error object otherwise.
	 */
	public function get_items_permissions_check( $request ) {
		// edit context skips the per-item strip in callback().
		$check = $this->forbidEditContextWithout( $request, 'edit_sc_prices' );
		if ( is_wp_error( $check ) ) {
			return $check;
		}

		// if not listing based on a single checkout, the person must be able to list prices.
		if ( empty( $request['checkout_ids'] ) || count( $request['checkout_ids'] ) > 1 ) {
			return current_user_can( 'read_sc_prices' );
		}

		return true;
	}

	/**
	 * Anyone can create line items.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access to create items, WP_Error object otherwise.
	 */
	public function create_item_permissions_check( $request ) {
		return true;
	}

	/**
	 * Update model.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access to create items, WP_Error object otherwise.
	 */
	public function update_item_permissions_check( $request ) {
		return true;
	}

	/**
	 * Delete model.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true|\WP_Error True if the request has access to create items, WP_Error object otherwise.
	 */
	public function delete_item_permissions_check( $request ) {
		return true;
	}

	/**
	 * Strip private catalog data expanded onto line items for guests.
	 *
	 * Decided by capability, not the requested context: the write routes are
	 * open to guests too and don't gate `context=edit`.
	 *
	 * @param array|\WP_REST_Response $data    Response data to filter.
	 * @param string                  $context Context defined in the schema.
	 *
	 * @return array Filtered response.
	 */
	public function filter_response_by_context( $data, $context ) {
		if ( current_user_can( 'edit_sc_prices' ) ) {
			return parent::filter_response_by_context( $data, $context );
		}

		$data = is_a( $data, 'WP_REST_Response' ) ? $data->get_data() : $data;

		return parent::filter_response_by_context( PublicCatalogData::response( $data ), 'view' );
	}
}
