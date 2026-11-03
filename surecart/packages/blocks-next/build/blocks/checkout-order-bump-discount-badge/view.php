<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-order-bump__tag sc-tag sc-tag--primary' ) );
?>
<span
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!state.bumpHasDiscount"
	data-wp-text="state.bumpSaveText"
	hidden
></span>
