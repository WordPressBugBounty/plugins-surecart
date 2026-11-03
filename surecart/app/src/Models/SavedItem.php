<?php

namespace SureCart\Models;

use SureCart\Models\Traits\HasPrice;
use SureCart\Models\Traits\HasProduct;

/**
 * A product a customer saved for later, in one of their saved lists.
 *
 * Saving the same product, price, variant and bundle picks again adds to its quantity: the platform
 * replaces the row (new id), and a move onto an identical row merges into the moved one.
 */
class SavedItem extends Model {
	use HasProduct;
	use HasPrice;

	/**
	 * Rest API endpoint
	 *
	 * @var string
	 */
	protected $endpoint = 'saved_items';

	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object_name = 'saved_item';

	/**
	 * The platform's cap on items per list.
	 *
	 * @var int
	 */
	const MAX_PER_LIST = 100;

	/**
	 * Set the variant attribute.
	 *
	 * @param string|object $value Variant id or object.
	 * @return void
	 */
	public function setVariantAttribute( $value ) {
		$this->setRelation( 'variant', $value, Variant::class );
	}

	/**
	 * Set the saved list attribute.
	 *
	 * @param string|object $value List id or object.
	 * @return void
	 */
	public function setSavedListAttribute( $value ) {
		$this->setRelation( 'saved_list', $value, SavedList::class );
	}

	/**
	 * Items carry no customer; they belong to whoever owns their list.
	 *
	 * @param \WP_User|\SureCart\Models\User|int $user User to check.
	 *
	 * @return bool
	 */
	public function belongsToUser( $user ) {
		$list = is_object( $this->saved_list ) ? $this->saved_list : SavedList::find( $this->saved_list );
		// Fail closed: an API error must not read as ownership.
		return ! is_wp_error( $list ) && ! empty( $list->id ) && (bool) $list->belongsToUser( $user );
	}

	/**
	 * Most pages read for one customer: each list holds up to 100, so a cap keeps a pathological account bounded.
	 *
	 * @var int
	 */
	const MAX_PAGES = 20; // SavedList::MAX_PER_CUSTOMER lists × MAX_PER_LIST items, 100 per page.

	/**
	 * Every saved item of a customer, across lists, newest first. Call statically (`SavedItem::forCustomer()`).
	 *
	 * @param string $customer_id Customer id.
	 * @param array  $with        Relations to expand.
	 *
	 * @return static[]|\WP_Error
	 */
	protected function forCustomer( $customer_id, $with = [] ) {
		$items = [];
		for ( $page = 1; $page <= self::MAX_PAGES; $page++ ) {
			$query  = ( new static() )->where( [ 'customer_ids' => [ $customer_id ] ] );
			$result = ( $with ? $query->with( $with ) : $query )->paginate(
				[
					'per_page' => 100,
					'page'     => $page,
				]
			);
			if ( is_wp_error( $result ) ) {
				return $result;
			}
			$page_items = $result->data ?? [];
			$items      = array_merge( $items, $page_items );
			if ( ! $page_items || count( $items ) >= (int) ( $result->pagination->count ?? 0 ) ) {
				break;
			}
		}
		return $items;
	}

	/**
	 * Move this item into a checkout as a line item. The platform deletes the saved item.
	 *
	 * Call statically (`SavedItem::moveToCheckout()`). The checkout must be an unpaid one of the list's customer.
	 *
	 * @param string $id          Saved item id.
	 * @param string $checkout_id Checkout id.
	 * @param array  $fill        Price/variant that fill in (or replace) the saved ones, e.g. a product-level save's only price.
	 *
	 * @return true|\WP_Error
	 */
	protected function moveToCheckout( $id, $checkout_id, $fill = [] ) {
		$moved = $this->makeRequest(
			[
				'method' => 'POST',
				'body'   => [ $this->object_name => array_merge( array_filter( $fill ), [ 'checkout' => $checkout_id ] ) ],
			],
			$this->endpoint . '/' . $id . '/line_item'
		);
		return is_wp_error( $moved ) ? $moved : true;
	}

	/**
	 * Move a checkout line item into a saved list. The platform removes the line item.
	 *
	 * Call statically (`SavedItem::saveLineItem()`). The list must belong to the checkout's customer.
	 *
	 * @param string $line_item_id Line item id.
	 * @param string $list_id      Saved list id.
	 *
	 * @return true|\WP_Error
	 */
	protected function saveLineItem( $line_item_id, $list_id ) {
		$saved = $this->makeRequest(
			[
				'method' => 'POST',
				'body'   => [ 'line_item' => [ 'saved_list' => $list_id ] ],
			],
			'line_items/' . $line_item_id . '/saved_item'
		);
		return is_wp_error( $saved ) ? $saved : true;
	}
}
