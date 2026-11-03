<?php
$product = get_query_var( 'surecart_current_product' );
if ( empty( $product ) || ! empty( $product->error ) || is_wp_error( $product ) ) {
	return '';
}

return 'file:./view.php';
