<?php
use SureCart\Support\Blocks\CheckoutCustomFieldService;

$key = CheckoutCustomFieldService::resolveKey( $attributes['name'] ?? '' );

// No key, or a key that collides with a checkout param or platform metadata: render and seed
// nothing.
if ( ! CheckoutCustomFieldService::isRenderable( $key ) ) {
	return '';
}

CheckoutCustomFieldService::seed( $key, ! empty( $attributes['required'] ) );

return 'file:./view.php';
