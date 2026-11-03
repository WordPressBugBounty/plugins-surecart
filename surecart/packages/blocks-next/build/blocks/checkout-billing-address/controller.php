<?php
$label        = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Billing Address', 'surecart' );
$toggle_label = ! empty( $attributes['toggleLabel'] ) ? $attributes['toggleLabel'] : __( 'Billing address is same as shipping', 'surecart' );
$show_label   = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$show_name    = ! empty( $attributes['showName'] );
$require_name = ! empty( $attributes['requireName'] );

// Surfaced to the store via the `data-show-line-2` wrapper attribute.
$show_line_2     = ! empty( $attributes['showLine2'] );
$default_country = $attributes['defaultCountry'] ?? '';

$wrapper_attrs      = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-billing-address' )
);
$legend_id          = wp_unique_id( 'sc-checkout-billing-address-legend-' );
$block_requirements = array(
	'show_name'    => $show_name,
	'require_name' => $require_name,
);

return 'file:./view.php';
