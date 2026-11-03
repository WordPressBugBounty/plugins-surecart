<?php
$subtotal_label = ! empty( $attributes['description'] ) ? $attributes['description'] : __( 'Subtotal', 'surecart' );
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => 'sc-line-item__description' ) ) ); ?>><?php echo esc_html( $subtotal_label ); ?></div>
