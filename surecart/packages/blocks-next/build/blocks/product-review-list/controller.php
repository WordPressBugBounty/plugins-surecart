<?php
$product = sc_get_product();

// no product.
if ( empty( $product ) ) {
	return;
}

// reviews are not enabled.
if ( ! apply_filters( 'surecart/review_form/enabled', $product->reviews_enabled ) ) {
	return;
}

// return the view.
return 'file:./view.php';
