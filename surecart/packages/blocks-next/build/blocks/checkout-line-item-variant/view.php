<?php
$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-product-line-item__description sc-product-line-item__price-variant' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!state.hasLineItemVariantContent"
	hidden
>
	<div
		data-wp-bind--hidden="!context.line_item.variant_display_options"
		data-wp-text="context.line_item.variant_display_options"
		hidden
	></div>
	<template
		data-wp-each--bundle_component="state.bundleComponents"
		data-wp-each-key="context.bundle_component.id"
	>
		<div class="sc-product-line-item__bundle-item">
			<span
				class="sc-product-line-item__bundle-qty"
				data-wp-bind--hidden="!state.lineItemBundleComponentQty"
				data-wp-text="state.lineItemBundleComponentQty"
				hidden
			></span>
			<span
				class="sc-product-line-item__bundle-name"
				data-wp-text="state.lineItemBundleComponentName"
			></span>
			<span
				class="sc-product-line-item__bundle-variant"
				data-wp-bind--hidden="!state.lineItemBundleComponentVariant"
				data-wp-text="state.lineItemBundleComponentVariant"
				hidden
			></span>
		</div>
	</template>
</div>
