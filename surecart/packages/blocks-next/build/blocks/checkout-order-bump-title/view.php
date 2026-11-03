<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-order-bump__title' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-text="state.bumpTitle"
></div>
