<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__title' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<span data-wp-text="context.line_item.price.product.name"></span>
	<span
		class="sc-product-line-item__title-count"
		aria-hidden="true"
		data-wp-bind--hidden="!state.lineItemBundleCount"
		data-wp-text="state.lineItemBundleCount"
		hidden
	></span>
	<span
		class="sc-screen-reader-text"
		data-wp-bind--hidden="!state.lineItemBundleCount"
		data-wp-text="state.bundleComponentsLabel"
		hidden
	></span>
</div>
