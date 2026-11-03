<?php
$styles = sc_get_block_styles();

// Shadow is not handled by sc_get_block_styles(); resolve the preset/custom
// value the same way the style engine does and append it to the button css.
$shadow_value = $attributes['style']['shadow'] ?? null;
if ( ! empty( $shadow_value ) ) {
	$shadow_styles = wp_style_engine_get_styles(
		array( 'shadow' => array( 'shadow' => $shadow_value ) ),
		array( 'context' => 'block-supports' )
	);
	if ( ! empty( $shadow_styles['css'] ) ) {
		$styles['css'] = trim( ( $styles['css'] ?? '' ) . ';' . $shadow_styles['css'], ';' );
	}
}

// Typography is also outside sc_get_block_styles(). Resolve it the same way so
// merchant font controls reach the button text and beat the scss defaults.
$typography_value = $attributes['style']['typography'] ?? array();
if ( ! empty( $typography_value ) ) {
	$typography_styles = wp_style_engine_get_styles(
		array( 'typography' => $typography_value ),
		array( 'context' => 'block-supports' )
	);
	if ( ! empty( $typography_styles['css'] ) ) {
		$styles['css'] = trim( ( $styles['css'] ?? '' ) . ';' . $typography_styles['css'], ';' );
	}
	if ( ! empty( $typography_styles['classnames'] ) ) {
		$styles['classnames'] = trim( ( $styles['classnames'] ?? '' ) . ' ' . $typography_styles['classnames'] );
	}
}

return 'file:./view.php';
