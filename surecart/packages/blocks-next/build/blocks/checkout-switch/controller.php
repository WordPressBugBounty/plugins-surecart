<?php
use SureCart\Support\Blocks\CheckoutCustomFieldService;

$key   = CheckoutCustomFieldService::resolveKey( $attributes['name'] ?? '' );
$value = CheckoutCustomFieldService::resolveValue( $attributes['value'] ?? '' );

// No key, or a key that collides with a checkout param or platform metadata: render and seed
// nothing.
if ( ! CheckoutCustomFieldService::isRenderable( $key ) ) {
	return '';
}

$checked = ! empty( $attributes['checked'] );

CheckoutCustomFieldService::seed( $key, ! empty( $attributes['required'] ), $checked ? $value : '' );

return 'file:./view.php';
