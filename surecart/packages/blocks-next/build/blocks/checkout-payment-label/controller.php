<?php
// Hidden labels still render for screen readers: the payment block names its methods group with them.
$show_label = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );

// Test-mode badge follows the buy link; no product (editor/REST preview)
// degrades to a plain label.
$product = get_query_var( 'surecart_current_product' );
$is_test = ! empty( $product ) && empty( $product->error ) && ! is_wp_error( $product )
	&& 'test' === $product->buyLink()->getMode();

// Editors get the info popover; anonymous visitors get a plain tag.
$can_edit_posts = current_user_can( 'edit_posts' );

$label = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Payment', 'surecart' );

return 'file:./view.php';
