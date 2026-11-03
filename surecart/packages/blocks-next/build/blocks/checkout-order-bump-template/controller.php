<?php
$is_modern = 'modern' === get_option( 'surecart_order_bump_design', 'modern' );

// `showControl` is owned by the orchestrator and passed down via providesContext
// (attributes do not propagate to InnerBlocks). Default to showing the control.
$context      = isset( $block ) && isset( $block->context ) ? $block->context : array();
$show_control = ! isset( $context['surecart/showControl'] ) || ! empty( $context['surecart/showControl'] );

return 'file:./view.php';
