<?php
// Saving moves the item out of the cart, so it follows the same rule as Remove.
$removable = $block->context['removable'] ?? true;

if ( empty( $removable ) ) {
	return null;
}

$label = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Save for later', 'surecart' );

\SureCart::saved_items()->requireUi();

return 'file:./view.php';
