<?php
/**
 * Bindings are unqualified: the block declares no namespace and inherits the checkout-form
 * store once cloned inside the line-items `<template>`.
 *
 * @var array $attributes
 */

// Off by default (legacy parity): only the Line Items block's "Allow removal" toggle shows it.
if ( empty( $block->context['removable'] ) ) {
	return;
}

$icon          = $attributes['icon'] ?? 'x';
$label         = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Remove item', 'surecart' );
$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-product-line-item__remove-button sc-button-reset sc-button-unstyled' )
);
?>
<button
	type="button"
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-on--click="actions.removeLineItem"
	data-wp-bind--hidden="!state.lineItemIsRemovable"
	aria-label="<?php echo esc_attr( $label ); ?>"
	hidden
>
	<?php if ( 'none' !== $icon ) : ?>
		<?php echo wp_kses( SureCart::svg()->get( $icon, array( 'class' => 'sc-product-line-item__remove' ) ), sc_allowed_svg_html() ); ?>
	<?php endif; ?>
</button>
