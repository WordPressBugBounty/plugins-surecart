<?php
use SureCart\Support\Blocks\CheckoutStateSeedService;

$product = get_query_var( 'surecart_current_product' );
if ( empty( $product ) || ! empty( $product->error ) || is_wp_error( $product ) ) {
	return '';
}

// The default processor floats to the front (sortProcessors) so the rendered rows and the seeded
// `state.processors` agree, and the client picks it via `availableProcessorTypes[0]`.
$default_processor = $attributes['defaultProcessor'] ?? 'stripe';
if ( ! in_array( $default_processor, array( 'stripe', 'paypal', 'paystack', 'razorpay', 'mollie', 'manual' ), true ) ) {
	$default_processor = '';
}
if ( $default_processor ) {
	wp_interactivity_state( 'surecart/checkout-form', array( 'defaultProcessor' => $default_processor ) );
}

// Seeded too, so the form seed drops unchecked methods and the client can never select one.
$disabled_methods = array_values( array_map( 'strval', (array) ( $attributes['disabledMethods'] ?? array() ) ) );
if ( $disabled_methods ) {
	wp_interactivity_state( 'surecart/checkout-form', array( 'disabledMethods' => $disabled_methods ) );
}

// Same catalog builder as the form seed so the store and the rendered accordion never drift.
$catalog        = CheckoutStateSeedService::resolveProcessorCatalog( $product, $default_processor, $disabled_methods );
$processors     = $catalog['processors'];
$manual_methods = $catalog['manualPaymentMethods'];

// Admin no-processor copy gate (manage_sc_shop_settings → link to settings).
$can_manage_settings = current_user_can( 'manage_sc_shop_settings' );

// Mollie exclusivity: when a mollie processor is available, render ONLY mollie
// (suppress all other processors AND manual methods AND the no-processor alert).
$has_mollie = false;
foreach ( $processors as $processor ) {
	if ( 'mollie' === ( $processor['type'] ?? '' ) ) {
		$has_mollie = true;
		break;
	}
}

return 'file:./view.php';
