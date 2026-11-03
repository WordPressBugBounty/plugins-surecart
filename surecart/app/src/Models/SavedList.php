<?php

namespace SureCart\Models;

use SureCart\Models\Traits\HasCustomer;

/**
 * A customer's list of saved items. Every customer has one default list, which can't be renamed or deleted.
 */
class SavedList extends Model {
	use HasCustomer;

	/**
	 * Rest API endpoint
	 *
	 * @var string
	 */
	protected $endpoint = 'saved_lists';

	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object_name = 'saved_list';

	/**
	 * The platform's cap on lists per customer, the default one included; one page holds them all.
	 *
	 * @var int
	 */
	const MAX_PER_CUSTOMER = 20;

	/**
	 * Longest list name, in characters; the store's default list name follows it too.
	 *
	 * @var int
	 */
	const MAX_NAME_LENGTH = 40;

	/**
	 * A customer's lists, oldest first, the default one included. Call statically (`SavedList::forCustomer()`).
	 *
	 * The platform creates the default list on the first read, so this always holds at least that one.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return static[]|\WP_Error
	 */
	protected function forCustomer( $customer_id ) {
		$lists = $this->where( [ 'customer_ids' => [ $customer_id ] ] )
			->paginate(
				[
					'per_page' => self::MAX_PER_CUSTOMER,
					'page'     => 1,
				]
			);
		return is_wp_error( $lists ) ? $lists : array_values( $lists->data ?? [] );
	}

	/**
	 * A customer's default list id, and their other lists as `{ id, name }` in the order made.
	 *
	 * Call statically (`SavedList::splitForCustomer()`). No default list means the platform doesn't
	 * know the customer (e.g. a stale id from a reconnected store).
	 *
	 * @param string|null $customer_id Customer id.
	 *
	 * @return array|\WP_Error `default` id and `named` lists.
	 */
	protected function splitForCustomer( $customer_id ) {
		$lists = $customer_id ? $this->forCustomer( $customer_id ) : [];
		if ( is_wp_error( $lists ) ) {
			return $lists;
		}

		usort( $lists, fn( $a, $b ) => ( $a->created_at ?? 0 ) <=> ( $b->created_at ?? 0 ) );

		$default = null;
		$named   = [];
		foreach ( $lists as $list ) {
			if ( ! empty( $list->default ) ) {
				$default = $list->id;
				continue;
			}
			$named[] = [
				'id'   => $list->id,
				'name' => $list->name,
			];
		}

		if ( ! $default ) {
			return new \WP_Error( 'saved_list.customer.invalid', __( 'Could not find your saved items. Please try again.', 'surecart' ), [ 'status' => 422 ] );
		}

		// Only write when it changes: without an object cache every set is two option writes.
		if ( get_transient( self::defaultCacheKey( $customer_id ) ) !== $default ) {
			set_transient( self::defaultCacheKey( $customer_id ), $default, DAY_IN_SECONDS );
		}

		return [
			'default' => $default,
			'named'   => $named,
		];
	}

	/**
	 * A customer's default list id. Call statically (`SavedList::defaultIdFor()`).
	 *
	 * It never changes (the default list can't be deleted), so it's cached: most writes then
	 * need no extra request to turn the browser's `null` into an id.
	 *
	 * @param string|null $customer_id Customer id.
	 *
	 * @return string|\WP_Error
	 */
	protected function defaultIdFor( $customer_id ) {
		$cached = $customer_id ? get_transient( self::defaultCacheKey( $customer_id ) ) : false;
		if ( $cached ) {
			return $cached;
		}
		$split = $this->splitForCustomer( $customer_id );
		return is_wp_error( $split ) ? $split : $split['default'];
	}

	/**
	 * Whether the customer's default list id is cached. Call statically.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return bool
	 */
	protected function hasCachedDefault( $customer_id ) {
		return $customer_id && false !== get_transient( self::defaultCacheKey( $customer_id ) );
	}

	/**
	 * Drop the cached default list id, e.g. when it may belong to a store's previous account. Call statically.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return void
	 */
	protected function forgetDefault( $customer_id ) {
		delete_transient( self::defaultCacheKey( $customer_id ) );
	}

	/**
	 * Transient key for a customer's default list id.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return string
	 */
	protected static function defaultCacheKey( $customer_id ) {
		return 'surecart_default_saved_list_' . md5( $customer_id );
	}
}
