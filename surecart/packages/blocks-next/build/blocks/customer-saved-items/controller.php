<?php
use SureCart\SavedItems\SavedItemsList;

// The overview (dashboard home) or the full list (Saved Items page, dashboard "Saved" tab).
$saved_list  = new SavedItemsList();
$show_all    = ! empty( $attributes['show_all'] );
$is_guest    = ! is_user_logged_in();
$customer_id = $is_guest ? null : \SureCart::saved_items()->customerId();

// The overview stays hidden until there's something to preview.
if ( ! $show_all && empty( $customer_id ) ) {
	return '';
}

// Removing and moving rows offer Undo in the toast.
\SureCart::saved_items()->requireUi();

if ( ! $show_all ) {
	$data = $saved_list->preview( $customer_id );
} elseif ( $is_guest ) {
	// The guest's list lives in their browser; rows load after render.
	$data = [ 'rows' => [] ];
} else {
	$data = \SureCart::saved_items()->readForCustomer( [ $saved_list, 'full' ] );
	// A link to a customer the platform no longer has may have just been dropped.
	$customer_id = \SureCart::saved_items()->customerId();
}

$error = is_wp_error( $data ) ? $data->get_error_message() : '';
$data  = is_wp_error( $data ) ? [ 'rows' => [] ] : $data;
$rows  = $data['rows'];

// Lists, bulk actions and the count header: customers on the full list only.
$lists       = $customer_id && isset( $data['lists'] ) ? $data['lists'] : null;
$active      = $data['active'] ?? null;
$counts      = $data['counts'] ?? [];
$total_pages = $data['total_pages'] ?? 1;
$page        = $data['page'] ?? 1;

// On the Saved Items page the page title already says it, so only a set title shows there.
$heading  = ! empty( $attributes['title'] ) ? $attributes['title'] : ( $show_all ? '' : __( 'Saved Items', 'surecart' ) );
$view_all = ! empty( $data['more'] ) ? \SureCart::saved_items()->url() : '';
// Back to the list after signing in, where the guest list is merged into the account.
$login    = $is_guest ? add_query_arg( 'redirect_to', rawurlencode( \SureCart::saved_items()->url() ), \SureCart::pages()->url( 'dashboard' ) ) : '';
$form_id  = \SureCart::forms()->getDefaultId();

$movable = count( array_filter( $rows, fn( $row ) => $row['canMove'] ) );
$count   = (int) ( $counts[ SavedItemsList::listKey( $active ) ] ?? 0 );
$total   = (int) ( $data['total'] ?? 0 );
/* translators: %d: number of items */
$count_label = sprintf( _n( '%d item', '%d items', $count, 'surecart' ), $count );
if ( $total > $count ) {
	/* translators: 1: "4 items", 2: number of products saved across all lists */
	$count_label = sprintf( _n( '%1$s · %2$d saved in total', '%1$s · %2$d saved in total', $total, 'surecart' ), $count_label, $total );
}

// Server values for the store's derived state, so the first paint matches hydration.
// One list per page, so namespace-wide values are safe; per-list counts read context.
wp_interactivity_state(
	'surecart/saved-items',
	[
		'isEmpty'          => ! $is_guest && ! $rows,
		'hasRows'          => (bool) $rows,
		'canMoveAll'       => $movable > 1,
		/* translators: %d: number of items */
		'moveAllLabel'     => sprintf( _n( 'Move %d available item to cart', 'Move %d available items to cart', $movable, 'surecart' ), $movable ),
		'activeCountLabel' => $count_label,
		'selectionLabel'   => __( 'Select all', 'surecart' ),
		'navCount'         => function () {
			$context = wp_interactivity_get_context();
			return (int) ( $context['counts'][ $context['nav'] ?? '' ] ?? 0 );
		},
		'showRowLink'      => function () {
			$row = wp_interactivity_get_context()['row'] ?? [];
			return empty( $row['canMove'] ) && empty( $row['buyUrl'] ) && ! empty( $row['url'] );
		},
		'showBuyNow'       => function () {
			$row = wp_interactivity_get_context()['row'] ?? [];
			return empty( $row['canMove'] ) && ! empty( $row['buyUrl'] );
		},
	]
);

return 'file:./view.php';
