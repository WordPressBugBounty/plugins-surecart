<?php

namespace SureCart\Rest;

use SureCart\Controllers\Rest\SavedItemsController;
use SureCart\Models\SavedItem;
use SureCart\Models\SavedList;
use SureCart\Rest\RestServiceInterface;

/**
 * Service provider for saved item (wishlist) REST requests.
 */
class SavedItemsRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Cookie that tells the browser store to ask the server where the list lives again.
	 *
	 * @var string
	 */
	const RESYNC_COOKIE = 'sc_saved_items_resync';

	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'saved_items';

	/**
	 * Rest Controller
	 *
	 * @var string
	 */
	protected $controller = SavedItemsController::class;

	/**
	 * Methods allowed for the model. Create is registered in registerRoutes() so it gets validation args.
	 *
	 * @var array
	 */
	protected $methods = [ 'index', 'delete' ];

	/**
	 * Bootstrap routes and the resync signal.
	 *
	 * @param \Pimple\Container $container Service Container.
	 *
	 * @return void
	 */
	public function bootstrap( $container ) {
		if ( ! \SureCart::saved_items()->enabled() ) {
			return;
		}

		parent::bootstrap( $container );

		// Pages are often cached, so the browser can't tell when the user or their customer changes.
		add_action( 'set_logged_in_cookie', [ $this, 'signalResync' ] );
		add_action( 'clear_auth_cookie', [ $this, 'signalResync' ] );
		add_action( 'added_user_meta', [ $this, 'signalResyncOnCustomerLink' ], 10, 3 );
		add_action( 'updated_user_meta', [ $this, 'signalResyncOnCustomerLink' ], 10, 3 );
		// The browser skips the server while this cookie is absent (guests), so logged-in users must have it.
		add_action( 'init', [ $this, 'ensureResyncCookie' ] );
	}

	/**
	 * Give a logged-in user the resync cookie if they lack it (session cookie gone, or logged in before it existed).
	 *
	 * @return void
	 */
	public function ensureResyncCookie() {
		if ( ! wp_doing_cron() && is_user_logged_in() && empty( $_COOKIE[ self::RESYNC_COOKIE ] ) ) {
			$this->signalResync();
		}
	}

	/**
	 * Register REST Routes
	 *
	 * @return void
	 */
	public function registerRoutes() {
		$item_args = [
			'product'                   => [
				'type'     => 'string',
				'format'   => 'uuid',
				'required' => true,
			],
			'price'                     => [
				'type'   => [ 'string', 'null' ],
				'format' => 'uuid',
			],
			'variant'                   => [
				'type'   => [ 'string', 'null' ],
				'format' => 'uuid',
			],
			// Bundle picks: component product id => variant id, as on a line item.
			'bundle_component_variants' => [
				'type'                 => 'object',
				'maxProperties'        => 50,
				'additionalProperties' => [
					'type'   => 'string',
					'format' => 'uuid',
				],
			],
		];

		// Null is the default list.
		$list_arg = [
			'type'   => [ 'string', 'null' ],
			'format' => 'uuid',
		];

		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint,
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'create' ),
				'permission_callback' => [ $this, 'create_item_permissions_check' ],
				'args'                => array_merge(
					$item_args,
					[
						'saved_list' => $list_arg,
						'quantity'   => [
							'type'    => 'integer',
							'minimum' => 1,
							'maximum' => 999,
						],
					]
				),
			]
		);

		$name_arg = [
			'type'              => 'string',
			'required'          => true,
			'minLength'         => 1,
			'maxLength'         => SavedList::MAX_NAME_LENGTH,
			'sanitize_callback' => 'sanitize_text_field',
		];

		register_rest_route(
			"$this->name/v$this->version",
			'saved_lists',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'createList' ),
				'permission_callback' => [ $this, 'create_item_permissions_check' ],
				'args'                => [ 'name' => $name_arg ],
			]
		);

		register_rest_route(
			"$this->name/v$this->version",
			'saved_lists/(?P<id>[\w-]+)',
			[
				[
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => $this->callback( $this->controller, 'editList' ),
					'permission_callback' => [ $this, 'update_list_permissions_check' ],
					'args'                => [ 'name' => $name_arg ],
				],
				[
					'methods'             => \WP_REST_Server::DELETABLE,
					'callback'            => $this->callback( $this->controller, 'deleteList' ),
					'permission_callback' => [ $this, 'delete_list_permissions_check' ],
				],
			]
		);

		$items_args = [
			'items' => [
				'type'     => 'array',
				'required' => true,
				'minItems' => 1,
				// A guest's browser list is one list, capped like any list on the platform.
				'maxItems' => SavedItem::MAX_PER_LIST,
				'items'    => [
					'type'       => 'object',
					'properties' => $item_args,
				],
			],
		];

		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/merge',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'merge' ),
				'permission_callback' => [ $this, 'create_item_permissions_check' ],
				'args'                => $items_args,
			]
		);

		// POST only because the list can be too long for a URL; nothing is written.
		// Public: one bounded catalog query over published products, like any product page.
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/rows',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'rows' ),
				'permission_callback' => '__return_true',
				'args'                => $items_args,
			]
		);

		// The Saved Items page's data for the list it shows, so it can refresh in place.
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/page',
			[
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => $this->callback( $this->controller, 'page' ),
				'permission_callback' => 'is_user_logged_in',
				'args'                => [
					'saved_list' => [
						'type'   => 'string',
						'format' => 'uuid',
					],
					'saved_page' => [
						'type'    => 'integer',
						'minimum' => 1,
					],
				],
			]
		);

		// Save a cart line item for later; the platform moves it out of the checkout.
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/line_items/(?P<line_item_id>[\w-]+)',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'saveLineItem' ),
				'permission_callback' => [ $this, 'create_item_permissions_check' ],
				'args'                => [ 'saved_list' => $list_arg ],
			]
		);

		// Move a saved item into the cart; the platform deletes the saved item.
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/(?P<id>[\w-]+)/line_item',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => $this->callback( $this->controller, 'moveToCheckout' ),
				'permission_callback' => [ $this, 'move_item_permissions_check' ],
				'args'                => [
					'checkout' => [
						'type'     => 'string',
						'format'   => 'uuid',
						'required' => true,
					],
					// The platform checks these belong to the item's product.
					'price'    => [
						'type'   => [ 'string', 'null' ],
						'format' => 'uuid',
					],
					'variant'  => [
						'type'   => [ 'string', 'null' ],
						'format' => 'uuid',
					],
				],
			]
		);

		// After merge/rows/line_items: EDITABLE includes POST, and the first matching route wins.
		register_rest_route(
			"$this->name/v$this->version",
			$this->endpoint . '/(?P<id>[\w-]+)',
			[
				'methods'             => \WP_REST_Server::EDITABLE,
				'callback'            => $this->callback( $this->controller, 'edit' ),
				'permission_callback' => [ $this, 'update_item_permissions_check' ],
				// Price and variant can be set but not cleared: the model drops null relations.
				'args'                => [
					'saved_list' => $list_arg,
					'price'      => [
						'type'   => 'string',
						'format' => 'uuid',
					],
					'variant'    => [
						'type'   => 'string',
						'format' => 'uuid',
					],
				],
			]
		);
	}

	/**
	 * Anyone may ask; guests are told to keep the list locally.
	 *
	 * Safe only because SavedItemsController::index() scopes the query to the current user's
	 * customer and ignores request filters — keep it that way.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return true
	 */
	public function get_items_permissions_check( $request ) {
		return true;
	}

	/**
	 * Create and merge permissions. The customer is resolved from the current user.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function create_item_permissions_check( $request ) {
		return is_user_logged_in() && $this->canUseList( $request );
	}

	/**
	 * A named list in the request must be the current user's; null is the default list.
	 *
	 * Checked here rather than trusting the platform to reject another customer's list.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	protected function canUseList( $request ) {
		$list_id = $request['saved_list'] ?? null;
		return empty( $list_id ) || current_user_can( 'edit_sc_saved_list', $list_id );
	}

	/**
	 * Move-to-cart permissions. The platform then refuses any checkout but the item's customer's.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function move_item_permissions_check( $request ) {
		return current_user_can( 'edit_sc_saved_item', $request['id'] );
	}

	/**
	 * Delete permissions.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function delete_item_permissions_check( $request ) {
		return current_user_can( 'delete_sc_saved_item', $request['id'] );
	}

	/**
	 * Move or change-options permissions.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function update_item_permissions_check( $request ) {
		return current_user_can( 'edit_sc_saved_item', $request['id'] ) && $this->canUseList( $request );
	}

	/**
	 * Rename list permissions.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function update_list_permissions_check( $request ) {
		return current_user_can( 'edit_sc_saved_list', $request['id'] );
	}

	/**
	 * Delete list permissions.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 * @return boolean
	 */
	public function delete_list_permissions_check( $request ) {
		return current_user_can( 'delete_sc_saved_list', $request['id'] );
	}

	/**
	 * Set a new resync token for the browser store.
	 *
	 * @return void
	 */
	public function signalResync() {
		sc_setcookie( self::RESYNC_COOKIE, wp_generate_password( 12, false ), 0, is_ssl(), false );
	}

	/**
	 * Signal a resync when the current user is linked to a customer (e.g. their first save or checkout).
	 *
	 * @param int    $meta_id   Meta id.
	 * @param int    $user_id   User id.
	 * @param string $meta_key  Meta key.
	 *
	 * @return void
	 */
	public function signalResyncOnCustomerLink( $meta_id, $user_id, $meta_key ) {
		if ( 'sc_customer_ids' === $meta_key && get_current_user_id() === (int) $user_id ) {
			$this->signalResync();
		}
	}
}
