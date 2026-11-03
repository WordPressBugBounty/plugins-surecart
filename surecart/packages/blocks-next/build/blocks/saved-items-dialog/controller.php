<?php
$done_text = ! empty( $attributes['done_text'] ) ? $attributes['done_text'] : __( 'Done', 'surecart' );

// The dialog's own width var, so the theme's max-width rules don't fight it.
$width_style = ! empty( $attributes['width'] ) ? safecss_filter_attr( '--sc-dialog-width:' . $attributes['width'] ) : '';

return 'file:./view.php';
