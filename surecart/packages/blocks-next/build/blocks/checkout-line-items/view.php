<?php
$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-line-items' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	role="list"
>
	<template
		data-wp-each--line_item="state.checkoutLineItems"
		data-wp-each-key="context.line_item.id"
	>
		<div class="sc-product-line-item" role="listitem">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</template>
</div>
