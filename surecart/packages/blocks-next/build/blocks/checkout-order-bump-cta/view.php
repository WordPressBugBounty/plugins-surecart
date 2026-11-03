<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-order-bump__cta' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!context.bump.metadata.cta"
	data-wp-text="context.bump.metadata.cta"
	hidden
></div>
