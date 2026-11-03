<?php
$product = sc_get_product();

if ( empty( $product->id ) ) {
	return '';
}

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Save for later', 'surecart' );
$saved_label = ! empty( $attributes['saved_label'] ) ? $attributes['saved_label'] : __( 'Saved', 'surecart' );

// Scoped to this instance via a CSS var, so two buttons on a page can differ.
$wrapper_style = ! empty( $attributes['saved_color'] )
	? safecss_filter_attr( '--sc-product-save-button-saved-color:' . $attributes['saved_color'] )
	: '';

$show_change_list = $attributes['show_change_list'] ?? true;

// The "Button" style renders full buy-button markup; the others are a bare <button>.
$is_button = false !== strpos( $attributes['className'] ?? '', 'is-style-button' );

\SureCart::saved_items()->seedState();
\SureCart::saved_items()->requireUi();

return 'file:./view.php';
