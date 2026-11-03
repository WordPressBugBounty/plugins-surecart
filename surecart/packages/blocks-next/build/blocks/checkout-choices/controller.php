<?php
use SureCart\Support\Blocks\CheckoutCustomFieldService;

$key = CheckoutCustomFieldService::resolveKey( $attributes['name'] ?? '' );

// No key, or a key that collides with a checkout param or platform metadata: render and seed
// nothing.
if ( ! CheckoutCustomFieldService::isRenderable( $key ) ) {
	return '';
}

// Always starts empty — nothing is selected until the customer picks an option.
CheckoutCustomFieldService::seed( $key, ! empty( $attributes['required'] ) );

return 'file:./view.php';
