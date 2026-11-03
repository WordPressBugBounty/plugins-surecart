<?php

namespace SureCart\SavedItems;

use SureCart\Models\SavedItem;
use SureCart\Models\SavedList;

/**
 * What the Saved Items list block renders for the current user: rows, lists, counts and paging.
 *
 * Every list's count comes from one light read of all items; only the shown page is read in full.
 */
class SavedItemsList {
	/**
	 * Rows per page.
	 *
	 * @var int
	 */
	const PER_PAGE = 10;

	/**
	 * Own pagination param: WordPress redirects `?page=N` on pages that aren't split into parts.
	 *
	 * @var string
	 */
	const PAGE_PARAM = 'saved_page';

	/**
	 * Which named list to show; absent means the default list.
	 *
	 * @var string
	 */
	const LIST_PARAM = 'saved_list';

	/**
	 * Rows in the dashboard overview.
	 *
	 * @var int
	 */
	const PREVIEW_COUNT = 4;

	/**
	 * The first few rows, for the dashboard overview.
	 *
	 * @param string $customer_id Customer id.
	 *
	 * @return array|\WP_Error `rows`, and `more` when there are others to see.
	 */
	public function preview( $customer_id ) {
		$items = $this->fetch( [ 'customer_ids' => [ $customer_id ] ], self::PREVIEW_COUNT, 1 );
		if ( is_wp_error( $items ) ) {
			return $items;
		}
		return [
			'rows' => ( new SavedItemRows() )->forItems( $items->data ?? [] ),
			'more' => ( $items->pagination->count ?? 0 ) > self::PREVIEW_COUNT,
		];
	}

	/**
	 * One page of the active list, with every list and its count.
	 *
	 * Lists and counts come from a light read of every item (ids only); only the page shown is
	 * read with what the rows render. The page calls the default list `null`, like the browser.
	 *
	 * @param string|null $customer_id Customer id; none yet means nothing saved yet.
	 *
	 * @return array|\WP_Error
	 */
	public function full( $customer_id ) {
		$lists = [
			[
				'id'   => null,
				'name' => \SureCart::saved_items()->defaultListName(),
			],
		];
		if ( empty( $customer_id ) ) {
			return $this->page( $lists, [], [] );
		}

		$split = SavedList::splitForCustomer( $customer_id );
		$all   = is_wp_error( $split ) ? $split : SavedItem::forCustomer( $customer_id );
		if ( is_wp_error( $all ) ) {
			return $all;
		}
		$lists = array_merge( $lists, $split['named'] );
		$items = array_map( fn( $item ) => SavedItemRows::clientItem( $item, $split['default'] ), $all );

		$active = sanitize_text_field( wp_unslash( $_GET[ self::LIST_PARAM ] ?? '' ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$active = in_array( $active, array_column( $lists, 'id' ), true ) ? $active : null;

		$in_active   = count( $this->inList( $items, $active ) );
		$total_pages = max( 1, (int) ceil( $in_active / self::PER_PAGE ) );
		$page        = min( max( 1, (int) ( $_GET[ self::PAGE_PARAM ] ?? 1 ) ), $total_pages ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$rows = [];
		if ( $in_active ) {
			$shown = $this->fetch( [ 'saved_list_ids' => [ ! empty( $active ) ? $active : $split['default'] ] ], self::PER_PAGE, $page );
			if ( is_wp_error( $shown ) ) {
				return $shown;
			}
			$rows = ( new SavedItemRows() )->forItems( $shown->data ?? [] );
			// Rows go back to the browser, which calls the default list null.
			foreach ( $rows as &$row ) {
				$row['list'] = $row['list'] === $split['default'] ? null : $row['list'];
			}
			unset( $row );
		}

		return array_merge(
			$this->page( $lists, $items, $rows ),
			[
				'active'      => $active,
				'page'        => $page,
				'total_pages' => $total_pages,
			]
		);
	}

	/**
	 * The parts of full() that don't depend on which list is shown.
	 *
	 * @param array $lists Lists as `{ id, name }`, the default (id null) first.
	 * @param array $items Every item, as the browser store keeps them.
	 * @param array $rows  Rows for the page shown.
	 *
	 * @return array
	 */
	protected function page( $lists, $items, $rows ) {
		// Saved entries, like the rows: two options of one product are two items.
		$counts = [];
		foreach ( $lists as $list ) {
			$counts[ self::listKey( $list['id'] ) ] = count( $this->inList( $items, $list['id'] ) );
		}
		return [
			'rows'   => $rows,
			'lists'  => $lists,
			'counts' => $counts,
			'total'  => count( $items ),
			// Every item as ids, so the browser store's counts match this render.
			'items'  => $items,
		];
	}

	/**
	 * Key for a list in the counts map; the default list has no id.
	 *
	 * @param string|null $list_id List id.
	 *
	 * @return string
	 */
	public static function listKey( $list_id ) {
		return $list_id ? $list_id : 'default';
	}

	/**
	 * Link to a list on the current page, back on its first page.
	 *
	 * @param string|null $list_id List id; null for the default list.
	 *
	 * @return string
	 */
	public static function listUrl( $list_id ) {
		$url = remove_query_arg( self::PAGE_PARAM );
		return $list_id ? add_query_arg( self::LIST_PARAM, $list_id, $url ) : remove_query_arg( self::LIST_PARAM, $url );
	}

	/**
	 * Link to a page of the current list.
	 *
	 * @param int $page Page number.
	 *
	 * @return string
	 */
	public static function pageUrl( $page ) {
		return add_query_arg( self::PAGE_PARAM, $page );
	}

	/**
	 * Name for a list id; '' when it isn't among `$lists`.
	 *
	 * @param array       $lists   Lists as `{ id, name }`.
	 * @param string|null $list_id List id.
	 *
	 * @return string
	 */
	public static function listName( $lists, $list_id ) {
		foreach ( $lists as $list ) {
			if ( $list['id'] === $list_id ) {
				return $list['name'];
			}
		}
		return '';
	}

	/**
	 * Items in one list.
	 *
	 * @param array       $items   Items as the browser store keeps them.
	 * @param string|null $list_id List id; null for the default list.
	 *
	 * @return array
	 */
	protected function inList( $items, $list_id ) {
		return array_values( array_filter( $items, fn( $item ) => $item['saved_list'] === $list_id ) );
	}

	/**
	 * A page of saved items, with what the rows render.
	 *
	 * @param array $query    Filters (`customer_ids` or `saved_list_ids`).
	 * @param int   $per_page Items per page.
	 * @param int   $page     Page number.
	 *
	 * @return \SureCart\Models\Collection|\WP_Error
	 */
	protected function fetch( $query, $per_page, $page ) {
		return SavedItem::where( $query )
			->with( [ 'product', 'product.prices', 'product.variants', 'product.featured_product_media', 'product_media.media', 'price', 'variant' ] )
			->paginate(
				[
					'per_page' => $per_page,
					'page'     => $page,
				]
			);
	}
}
