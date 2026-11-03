<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__trial' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!context.line_item.price.trial_text"
	data-wp-text="context.line_item.price.trial_text"
	hidden
></div>
