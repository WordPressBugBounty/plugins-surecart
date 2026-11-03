<?php
$included = ! empty( $attributes['includedLabel'] ) ? $attributes['includedLabel'] : __( 'included', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-tax' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="state.hideTaxRow"
	hidden
>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<span
		class="sc-line-item__price-description"
		data-wp-bind--hidden="!state.hasTaxInclusiveAmount"
		hidden
	>(<span data-wp-text="state.checkout.tax_inclusive_display_amount"></span> <?php echo esc_html( $included ); ?>)</span>
</div>
