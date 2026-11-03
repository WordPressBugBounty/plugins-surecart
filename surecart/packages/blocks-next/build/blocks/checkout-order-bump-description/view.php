<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-order-bump__description' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!context.bump.metadata.description"
	hidden
>
	<span data-wp-bind--innerHTML="context.bump.rendered_description"></span>
</div>
