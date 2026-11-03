<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-order-bump__price' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-class--sc-order-bump__price--has-discount="state.bumpHasDiscount"
>
	<span
		class="sc-order-bump__original-price"
		data-wp-bind--hidden="!state.bumpHasDiscount"
		hidden
	><span class="sc-screen-reader-text"><?php esc_html_e( 'Original price:', 'surecart' ); ?> </span><span data-wp-text="context.bump.subtotal_display_amount"></span></span>
	<span class="sc-order-bump__new-price"><span class="sc-screen-reader-text" data-wp-bind--hidden="!state.bumpHasDiscount" hidden><?php esc_html_e( 'Sale price:', 'surecart' ); ?> </span><span data-wp-text="state.bumpPriceDisplay"></span></span>
	<span
		class="sc-order-bump__interval"
		data-wp-bind--hidden="!context.bump.price.short_interval_text"
		data-wp-text="context.bump.price.short_interval_text"
		hidden
	></span>
</div>
