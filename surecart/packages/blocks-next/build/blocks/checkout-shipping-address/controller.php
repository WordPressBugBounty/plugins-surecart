<?php
// Only the default label gets the reactive "Address" retitle in tax/compact
// mode; a customized label wins and stays static. A cleared field stores "".
$label_is_default = empty( $attributes['label'] );
$label            = $label_is_default ? __( 'Shipping Address', 'surecart' ) : $attributes['label'];
$show_label       = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$show_name        = ! empty( $attributes['showName'] );
$require_name     = ! empty( $attributes['requireName'] );

// Surfaced to the store via the `data-show-line-2` wrapper attribute.
$show_line_2     = ! empty( $attributes['showLine2'] );
$default_country = $attributes['defaultCountry'] ?? '';

$wrapper_attrs      = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-shipping-address' )
);
$legend_id          = wp_unique_id( 'sc-checkout-shipping-address-legend-' );
$block_requirements = array(
	'show_name'    => $show_name,
	'require_name' => $require_name,
);

return 'file:./view.php';
