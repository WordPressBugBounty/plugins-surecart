<?php

namespace SureCart\Controllers\Rest;

use SureCart\Models\SavedItem;
use SureCart\Models\SavedList;
use SureCart\Models\User;
use SureCart\SavedItems\SavedItemRows;
use SureCart\SavedItems\SavedItemsList;

/**
 * Handle saved item (wishlist) and saved list requests through the REST API.
 *
 * The customer is always resolved from the current user, never from the request. The browser
 * calls the default list `null` (a guest's single list has no record either), so this
 * controller translates between `null` and the customer's default list id.
 */
class SavedItemsController extends RestController {
	/**
	 * Class to make the requests.
	 *
	 * @var string
	 */
	protected $class = SavedItem::class;

	/**
	 * Seconds a merge may spend on writes before handing the rest back to the browser.
	 *
	 * The platform has no bulk create, so each item is its own request; this keeps a long
	 * guest list well inside PHP's time limit.
	 *
	 * @var int
	 */
	const MERGE_SECONDS = 15;

	/**
	 * Each customer's lists, read at most once per request.
	 *
	 * @var array
	 */
	protected $lists_cache = [];

	/**
	 * List the current user's saved items and lists, or tell a guest's browser to keep its own list.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function index( \WP_REST_Request $request ) {
		if ( ! is_user_logged_in() ) {
			return $this->respond( 'local' );
		}

		// Reads never create a customer; the first save (or merge) does.
		return \SureCart::saved_items()->readForCustomer(
			fn( $customer_id ) => $customer_id ? $this->remote( $customer_id ) : $this->respond( 'remote' )
		);
	}

	/**
	 * Save an item for the current user's customer.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return array|\WP_Error
	 */
	public function create( \WP_REST_Request $request ) {
		return $this->withCustomer(
			function ( $customer_id ) use ( $request ) {
				$default = SavedList::defaultIdFor( $customer_id );
				if ( is_wp_error( $default ) ) {
					return $default;
				}

				$item = SavedItem::create(
					array_merge(
						// Ownership of a named list is checked in the route's permission callback (canUseList).
						[ 'saved_list' => ! empty( $request['saved_list'] ) ? $request['saved_list'] : $default ],
						$this->itemFields( $request->get_params() ),
						// Only an Undo sends one, to restore what was removed. Adds to an existing item's quantity.
						$request['quantity'] ? [ 'quantity' => (int) $request['quantity'] ] : []
					)
				);

				return is_wp_error( $item ) ? $item : $this->toClient( $item, $default );
			}
		);
	}

	/**
	 * Move an item to another list, or change its price/variant.
	 *
	 * Moving onto an identical item merges it into the moved one, which takes the summed quantity.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return array|\WP_Error
	 */
	public function edit( \WP_REST_Request $request ) {
		$fields = array_intersect_key( $request->get_params(), array_flip( [ 'saved_list', 'price', 'variant' ] ) );
		if ( empty( $fields ) ) {
			return new \WP_Error( 'surecart_nothing_to_update', __( 'Nothing to update.', 'surecart' ), [ 'status' => 400 ] );
		}

		// No withCustomer(): the permission check proved this item is in one of the user's lists, so
		// their customer exists, and a fallback customer couldn't own the item anyway.
		$default = SavedList::defaultIdFor( \SureCart::saved_items()->customerId() );
		if ( is_wp_error( $default ) ) {
			return $default;
		}

		if ( array_key_exists( 'saved_list', $fields ) ) {
			$fields['saved_list'] = ! empty( $fields['saved_list'] ) ? $fields['saved_list'] : $default;
		}

		$item = ( new SavedItem( [ 'id' => $request['id'] ] ) )->update( $fields );
		return is_wp_error( $item ) ? $item : $this->toClient( $item, $default );
	}

	/**
	 * Merge the browser's list into the current user's default list.
	 *
	 * Items already saved there are skipped: saving again would add to their quantity.
	 * `pending` holds the items not reached within MERGE_SECONDS, for the browser to send again.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function merge( \WP_REST_Request $request ) {
		return $this->withCustomer(
			function ( $customer_id ) use ( $request ) {
				$default = SavedList::defaultIdFor( $customer_id );
				$saved   = is_wp_error( $default ) ? $default : SavedItem::forCustomer( $customer_id );
				if ( is_wp_error( $saved ) ) {
					return $saved;
				}

				$items    = array_map( fn( $item ) => $this->toClient( $item, $default ), $saved );
				$keys     = array_map( fn( $item ) => $this->key( $item ), $items );
				$inputs   = array_values( (array) $request['items'] );
				$pending  = [];
				$failed   = 0;
				$deadline = microtime( true ) + static::MERGE_SECONDS;
				foreach ( $inputs as $index => $input ) {
					if ( microtime( true ) > $deadline ) {
						$pending = array_slice( $inputs, $index );
						break;
					}
					$fields = $this->itemFields( $input );
					$key    = $this->key( $this->toClient( (object) $fields, $default ) );
					if ( in_array( $key, $keys, true ) ) {
						continue;
					}
					$created = SavedItem::create( array_merge( [ 'saved_list' => $default ], $fields ) );
					// One bad item (e.g. a product deleted since, or a full list) shouldn't block the rest;
					// it's counted so the browser can tell the shopper, not resent.
					if ( is_wp_error( $created ) ) {
						++$failed;
						continue;
					}
					$items[] = $this->toClient( $created, $default );
					$keys[]  = $key;
				}

				// Built from the writes, not read back: the platform's list can lag a fresh save.
				$lists = $this->lists( $customer_id );
				return is_wp_error( $lists ) ? $lists : $this->respond( 'remote', $items, $lists['named'], $pending, $failed );
			}
		);
	}

	/**
	 * Move a saved item into the shopper's checkout (cart).
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function moveToCheckout( \WP_REST_Request $request ) {
		// The platform only accepts an unpaid checkout of the list's customer, which the permission check made ours.
		$moved = SavedItem::moveToCheckout(
			$request['id'],
			$request['checkout'],
			[
				'price'   => $request['price'],
				'variant' => $request['variant'],
			]
		);
		return is_wp_error( $moved ) ? $moved : rest_ensure_response( [ 'moved' => true ] );
	}

	/**
	 * Save a cart line item for later, then return the refreshed list.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function saveLineItem( \WP_REST_Request $request ) {
		return $this->withCustomer(
			function ( $customer_id ) use ( $request ) {
				$default = SavedList::defaultIdFor( $customer_id );
				if ( is_wp_error( $default ) ) {
					return $default;
				}

				// The platform refuses a list that isn't the line item's checkout customer's, so only our own cart moves.
				$saved = SavedItem::saveLineItem( $request['line_item_id'], ! empty( $request['saved_list'] ) ? $request['saved_list'] : $default );
				return is_wp_error( $saved ) ? $saved : $this->remote( $customer_id );
			}
		);
	}

	/**
	 * Rows for a guest's browser list, built from the published catalog only.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response
	 */
	public function rows( \WP_REST_Request $request ) {
		$items = array_map( [ $this, 'itemFields' ], (array) $request['items'] );
		return rest_ensure_response( ( new SavedItemRows() )->forGuestItems( $items ) );
	}

	/**
	 * The Saved Items page's data for the list it shows, so the page can refresh in place.
	 *
	 * Reads the same `saved_list` / `saved_page` query args as the page itself.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function page( \WP_REST_Request $request ) {
		$data = \SureCart::saved_items()->readForCustomer( [ new SavedItemsList(), 'full' ] );
		return is_wp_error( $data ) ? $data : rest_ensure_response( $data );
	}

	/**
	 * Create a named list for the current user's customer.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \SureCart\Models\Model|\WP_Error
	 */
	public function createList( \WP_REST_Request $request ) {
		return $this->withCustomer(
			fn( $customer_id ) => SavedList::create(
				[
					'customer' => $customer_id,
					'name'     => $request['name'],
				]
			)
		);
	}

	/**
	 * Rename a list. The platform refuses the default one.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \SureCart\Models\Model|\WP_Error
	 */
	public function editList( \WP_REST_Request $request ) {
		return ( new SavedList( [ 'id' => $request['id'] ] ) )->update( [ 'name' => $request['name'] ] );
	}

	/**
	 * Delete a list and its items. The platform refuses the default one.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return object|\WP_Error
	 */
	public function deleteList( \WP_REST_Request $request ) {
		return SavedList::delete( $request['id'] );
	}

	/**
	 * Whitelist the fields a shopper may set on a saved item.
	 *
	 * The schema only checks types, so anything else (e.g. `quantity`, `saved_list`) is dropped here.
	 *
	 * @param array $input Raw item from the request.
	 *
	 * @return array
	 */
	protected function itemFields( $input ) {
		return [
			'product'                   => $input['product'] ?? null,
			'price'                     => $input['price'] ?? null,
			'variant'                   => $input['variant'] ?? null,
			// Empty map rather than null keeps the platform's "no choices" case uniform.
			'bundle_component_variants' => (object) ( $input['bundle_component_variants'] ?? [] ),
		];
	}

	/**
	 * The customer's default list id and named lists, memoised for this request.
	 *
	 * @param string|null $customer_id Customer id.
	 *
	 * @return array|\WP_Error `default` id and `named` lists.
	 */
	protected function lists( $customer_id ) {
		if ( ! isset( $this->lists_cache[ $customer_id ] ) ) {
			$this->lists_cache[ $customer_id ] = SavedList::splitForCustomer( $customer_id );
		}
		return $this->lists_cache[ $customer_id ];
	}

	/**
	 * A saved item as the browser store keeps it.
	 *
	 * @param object      $item       Saved item.
	 * @param string|null $default_id The customer's default list id.
	 *
	 * @return array
	 */
	protected function toClient( $item, $default_id ) {
		return SavedItemRows::clientItem( $item, $default_id );
	}

	/**
	 * What makes two saved items the same item in a list, as the platform merges them.
	 *
	 * @param array $client Item as toClient() shapes it.
	 *
	 * @return string
	 */
	protected function key( $client ) {
		$picks = (array) $client['bundle_component_variants'];
		ksort( $picks );
		return wp_json_encode( [ $client['saved_list'], $client['product'], $client['price'], $client['variant'], $picks ] );
	}

	/**
	 * The current user's customer id, creating and linking a live customer if they have none.
	 *
	 * Same approach as reviews: saving shouldn't wait for a first purchase. An existing test
	 * customer is reused; only users with neither get a live one.
	 *
	 * @return string|\WP_Error
	 */
	protected function customerIdOrCreate() {
		$customer_id = \SureCart::saved_items()->customerId();
		if ( empty( $customer_id ) ) {
			$customer_id = User::current()->getOrCreateLiveCustomerId();
		}
		// A WP_Error isn't empty, so it passes through as is.
		if ( empty( $customer_id ) ) {
			return new \WP_Error( 'surecart_no_customer', __( 'Could not set up your account for saved items. Please try again.', 'surecart' ), [ 'status' => 500 ] );
		}
		return $customer_id;
	}

	/**
	 * Run a write for the current user's customer, unlinking ones the platform no longer has
	 * (e.g. the store was reconnected to another account) until a live one is created.
	 *
	 * @param callable $write Receives the customer id; returns the result or a WP_Error.
	 *
	 * @return mixed|\WP_Error
	 */
	protected function withCustomer( callable $write ) {
		$service = \SureCart::saved_items();

		// At most a gone live and a gone test customer, then a fresh live one.
		for ( $tries = 0; $tries < 3; $tries++ ) {
			$customer_id = $this->customerIdOrCreate();
			if ( is_wp_error( $customer_id ) ) {
				return $customer_id;
			}

			$was_cached = SavedList::hasCachedDefault( $customer_id );
			$result     = $write( $customer_id );

			// A cached default list hides a customer the platform no longer knows; read it fresh once,
			// so a gone customer surfaces as `customer.invalid`.
			if ( is_wp_error( $result ) && $was_cached ) {
				SavedList::forgetDefault( $customer_id );
				$result = $write( $customer_id );
			}

			if ( ! $service->forgetGoneCustomer( $result, $customer_id ) ) {
				break;
			}
		}

		// A test customer the platform still has but can't save for: save on a live one, keeping the test link.
		$user = User::current();
		if ( $service->isInvalidCustomer( $result ) && $user->customerId( 'live' ) !== $customer_id ) {
			$live_id = $user->getOrCreateLiveCustomerId();
			if ( $live_id && ! is_wp_error( $live_id ) ) {
				return $write( $live_id );
			}
		}

		return $result;
	}

	/**
	 * The customer's whole saved state for the browser store.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	protected function remote( $customer_id ) {
		$lists = $this->lists( $customer_id );
		$items = is_wp_error( $lists ) ? $lists : SavedItem::forCustomer( $customer_id );
		if ( is_wp_error( $items ) ) {
			return $items;
		}

		return $this->respond(
			'remote',
			array_map( fn( $item ) => $this->toClient( $item, $lists['default'] ), $items ),
			$lists['named']
		);
	}

	/**
	 * Shape the response the browser store expects.
	 *
	 * @param string $storage Where the browser should keep the list: `local` or `remote`.
	 * @param array  $items   Saved items, as toClient() shapes them.
	 * @param array  $lists   Named lists as `{ id, name }`.
	 * @param array  $pending Merge only: browser items to keep and send again.
	 * @param int    $failed  Merge only: browser items the platform refused.
	 *
	 * @return \WP_REST_Response
	 */
	protected function respond( $storage, $items = [], $lists = [], $pending = [], $failed = 0 ) {
		return rest_ensure_response(
			[
				'storage' => $storage,
				'items'   => array_values( $items ),
				'lists'   => array_values( $lists ),
				'pending' => array_values( $pending ),
				'failed'  => (int) $failed,
			]
		);
	}
}
