<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__price-amount' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<span
		class="sc-product-line-item__scratch-price"
		data-wp-bind--hidden="!state.lineItemHasScratchAmount"
		data-wp-text="context.line_item.scratch_display_amount"
		hidden
	></span>
	<span data-wp-text="context.line_item.subtotal_display_amount"></span>
	<span
		class="sc-product-line-item__price-description"
		data-wp-bind--hidden="!context.line_item.price.short_interval_text"
		data-wp-text="context.line_item.price.short_interval_text"
		hidden
	></span>
	<span
		class="sc-product-line-item__price-description"
		data-wp-bind--hidden="!context.line_item.price.short_interval_count_text"
		data-wp-text="context.line_item.price.short_interval_count_text"
		hidden
	></span>
</div>
