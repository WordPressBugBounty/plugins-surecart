<?php
/** Line item fees leaf — the ONLY display leaf that owns its own nested reactive template. */

$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__fee' ) );
?>
<template
	data-wp-each--line_item_fee="context.line_item.fees.data"
	data-wp-each-key="context.line_item_fee.id"
>
	<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
		<span data-wp-text="context.line_item_fee.display_amount"></span>
		<span data-wp-text="context.line_item_fee.description"></span>
	</div>
</template>
