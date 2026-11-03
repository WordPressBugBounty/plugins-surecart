<?php
use SureCart\Support\Blocks\CheckoutCustomFieldService;

$key = CheckoutCustomFieldService::resolveKey( $block->context['surecart/checkout-choices/name'] ?? '' );

if ( ! CheckoutCustomFieldService::isRenderable( $key ) ) {
	return '';
}

$value = CheckoutCustomFieldService::resolveChoiceValue( $attributes['value'] ?? '', $attributes['label'] ?? '' );

if ( '' === $value ) {
	return '';
}

return 'file:./view.php';
