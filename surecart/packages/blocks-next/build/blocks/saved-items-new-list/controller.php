<?php
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'New list name', 'surecart' );
$button_text = ! empty( $attributes['button_text'] ) ? $attributes['button_text'] : __( 'Create', 'surecart' );

return 'file:./view.php';
