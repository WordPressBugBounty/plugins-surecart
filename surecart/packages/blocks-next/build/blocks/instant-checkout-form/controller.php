<?php
/**
 * Seeds `surecart/checkout-form` state from the buy-page product and its buy link.
 */

use SureCart\Support\Blocks\CheckoutStateSeedService;

$product = get_query_var( 'surecart_current_product' );
if ( empty( $product ) || ! empty( $product->error ) || is_wp_error( $product ) ) {
	return '';
}

$buy_link = $product->buyLink();

// Admin-facing affordance only — anonymous visitors on a disabled link 404 at the route.
$show_not_published = ! $buy_link->isEnabled() && current_user_can( 'read_sc_products' );

// Processor data is allowlisted to public fields; anything matching /secret|private/i is dropped.
$seed    = CheckoutStateSeedService::build( $product, $buy_link );
$form_id = 'instant-checkout';

// Its own `state.checkout` slot; the shared `surecart/checkout` store belongs to the cart.
$seed['checkout'] = array(
	'line_items'        => array( 'data' => array() ),
	'recommended_bumps' => array( 'data' => array() ),
);

// Keys the localStorage slot (read via getFormId()).
$seed['formId'] = $form_id;

wp_interactivity_state( 'surecart/checkout-form', $seed );

// On the root's context so `withDefaultData` / `withDefaultQuery` read them via getContext().
// view.php shares this scope.
$form_context = array(
	'mode'   => $seed['mode'],
	'formId' => $form_id,
);

return 'file:./view.php';
