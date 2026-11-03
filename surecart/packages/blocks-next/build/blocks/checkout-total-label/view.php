<?php
$title_text = ! empty( $attributes['description'] ) ? $attributes['description'] : __( 'Total', 'surecart' );
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => 'sc-line-item__title' ) ) ); ?>><?php echo esc_html( $title_text ); ?></div>
