<?php
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__image' ) );

$layout            = $attributes['style']['layout'] ?? array();
$placeholder_style = ( 'fixed' === ( $layout['selfStretch'] ?? '' ) && ! empty( $layout['flexSize'] ) )
	? safecss_filter_attr( 'flex-basis:' . $layout['flexSize'] )
	: '';
$placeholder_attrs = get_block_wrapper_attributes(
	array(
		'class' => 'sc-product-line-item__image sc-product-line-item__image-placeholder',
		'style' => $placeholder_style,
	)
);
?>
<img
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!context.line_item.image.src"
	data-wp-bind--src="context.line_item.image.src"
	data-wp-bind--alt="context.line_item.image.alt"
	data-wp-bind--srcset="context.line_item.image.srcset"
	data-wp-bind--sizes="context.line_item.image.sizes"
	loading="lazy"
	alt=""
	hidden
/>
<div
	<?php echo wp_kses_data( $placeholder_attrs ); ?>
	data-wp-bind--hidden="context.line_item.image.src"
	aria-hidden="true"
	hidden
></div>
