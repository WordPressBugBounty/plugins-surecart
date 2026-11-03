<?php
$tax_label = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Tax', 'surecart' );
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => 'sc-line-item__description' ) ) ); ?>><?php echo esc_html( $tax_label ); ?>
<?php if ( ! empty( $attributes['estimatedLabel'] ) ) : ?>
<span data-wp-bind--hidden="!state.isTaxEstimated"> <?php echo esc_html( $attributes['estimatedLabel'] ); ?></span><span data-wp-bind--hidden="!state.checkout.tax_label" data-wp-text="state.taxSuffix"></span><?php else : // The translatable "Estimated %s" phrase is composed client-side from the checkout's tax status. ?>
<span data-wp-text="state.taxDetail"></span><?php endif; ?>
</div>
