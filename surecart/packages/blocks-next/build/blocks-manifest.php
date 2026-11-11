<?php
// This file is generated. Do not modify it manually.
return array(
	'buy-customer-dropdown' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/buy-customer-dropdown',
		'title' => 'Customer Dropdown',
		'description' => 'Display the logged-in customer avatar with Dashboard and Logout links on the Instant Checkout page.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'inserter' => false,
			'reusable' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => false
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'style' => true,
					'width' => true
				)
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base'
		),
		'style' => 'file:./style-index.css'
	),
	'buy-logo' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/buy-logo',
		'title' => 'Store Logo',
		'description' => 'Display the store brand logo linked to the home page on the Instant Checkout page.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'example' => array(
			
		),
		'attributes' => array(
			'width' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'html' => false,
			'inserter' => false,
			'reusable' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => false
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'style' => true,
					'width' => true
				)
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'file:./style-index.css'
		),
		'style' => 'file:./style-index.css'
	),
	'cart' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart',
		'title' => 'Cart',
		'description' => 'Display SureCart slide out cart',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string',
				'default' => '525px'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'__experimentalDefault' => 'grid',
				'__experimentalDefaultControls' => array(
					'layout' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			),
			'html' => false,
			'multiple' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'currencyConversion' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => false,
				'textAlign' => false
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-drawer',
			'surecart-block-ui',
			'surecart-alert',
			'file:./style-index.css',
			'surecart-theme-base'
		),
		'editorStyle' => array(
			'file:./index.css'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n',
			'wp-a11y'
		),
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/cart'
		)
	),
	'cart-bump-line-item' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-bump-line-item',
		'title' => 'Cart Bump Line Item',
		'description' => 'Display the cart bump line item',
		'category' => 'surecart-cart',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'inserter' => false,
			'currencyConversion' => true
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-line-item',
			'file:./style-index.css'
		)
	),
	'cart-close-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-close-button',
		'title' => 'Close Cart Button',
		'description' => 'Display the close cart button.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => false
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'arrow'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-count' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-count',
		'title' => 'Cart Items Count',
		'description' => 'Display the number of items in the cart.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-coupon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-coupon',
		'title' => 'Cart Coupon',
		'description' => 'Display a coupon form in the cart',
		'keywords' => array(
			'coupon',
			'promo'
		),
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'button_text' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'collapsed' => array(
				'type' => 'boolean',
				'default' => true
			),
			'disabled' => array(
				'type' => 'boolean'
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'inserter' => false,
			'currencyConversion' => true
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-line-item',
			'surecart-coupon-form',
			'surecart-form-control',
			'file:./style-index.css'
		)
	),
	'cart-header' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-header',
		'title' => 'Cart Header',
		'description' => 'Display a cart header',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'inserter' => false
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-tag',
			'file:./style-index.css'
		)
	),
	'cart-icon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-icon',
		'title' => 'Floating Cart Icon',
		'description' => 'The cart icon that shows your cart quantity.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => true
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'__experimentalDefaultControls' => array(
					'width' => true,
					'color' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/checkout'
		)
	),
	'cart-items' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-items',
		'title' => 'Cart Items',
		'description' => 'The slide-out cart items',
		'category' => 'surecart-cart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'removable' => array(
				'type' => 'boolean',
				'default' => true
			),
			'editable' => array(
				'type' => 'boolean',
				'default' => true
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'inserter' => false,
			'currencyConversion' => true
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-line-item',
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/cart'
		)
	),
	'cart-items-submit' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-items-submit',
		'title' => 'Cart Submit Button',
		'description' => 'The cart submit button',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'number',
				'default' => 100
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'align' => false,
			'alignWide' => false,
			'html' => false,
			'multiple' => false,
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link',
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'padding' => array(
					'horizontal',
					'vertical'
				),
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true
			),
			'reusable' => false,
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-wp-buttons',
			'surecart-wp-button',
			'file:./style-index.css',
			'wp-block-button'
		)
	),
	'cart-items-subtotal' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-items-subtotal',
		'title' => 'Cart Subtotal',
		'description' => 'Display the cart subtotal',
		'keywords' => array(
			'cart',
			'subtotal'
		),
		'category' => 'surecart-cart',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'space-between'
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'cart-line-item-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-amount',
		'title' => 'Line item amount',
		'description' => 'Display the product line item amount.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-details' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-details',
		'title' => 'Line item details',
		'description' => 'Collapsible container for the line item\'s extra details (variant, bundle items, note) shown under a cart line item.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'attributes' => array(
			'expanded' => array(
				'type' => 'boolean',
				'default' => false
			),
			'collapseAfter' => array(
				'type' => 'number',
				'default' => 2
			)
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScriptModule' => array(
			'@surecart/line-item-details'
		)
	),
	'cart-line-item-fees' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-fees',
		'title' => 'Line item fees',
		'description' => 'Display the product line item fees.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-image',
		'title' => 'Line Item Image',
		'description' => 'Display the product line item image.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'attributes' => array(
			'sizing' => array(
				'type' => 'string',
				'default' => 'cover'
			),
			'aspectRatio' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'align' => array(
				'left',
				'center',
				'right',
				'wide',
				'full'
			),
			'color' => array(
				'text' => false,
				'background' => false
			),
			'filter' => array(
				'duotone' => true
			),
			'spacing' => array(
				'margin' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-interval' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-interval',
		'title' => 'Line item interval',
		'description' => 'Display the product line item interval.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-note' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-note',
		'title' => 'Line item note',
		'description' => 'Display the product line item note.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScriptModule' => array(
			'@surecart/line-item-note'
		)
	),
	'cart-line-item-price-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-price-name',
		'title' => 'Line item price name',
		'description' => 'Display the product line item price name.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-quantity' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-quantity',
		'title' => 'Line item quantity',
		'description' => 'Display the product line item quantity.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'usesContext' => array(
			'editable'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-remove' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-remove',
		'title' => 'Line item remove',
		'description' => 'Display the product line item remove.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'usesContext' => array(
			'removable'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => true
			),
			'label' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'x'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'cart-line-item-save' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-save',
		'title' => 'Line item save for later',
		'description' => 'Move the line item from the cart to the shopper\'s saved items.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'icon' => 'heart',
		'keywords' => array(
			'wishlist',
			'favorites',
			'saved',
			'heart'
		),
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'usesContext' => array(
			'removable'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => true
			),
			'label' => array(
				'type' => 'string'
			),
			'show_icon' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'style' => array(
			'surecart-saved-items',
			'file:./style-index.css'
		),
		'editorScript' => 'file:./index.js',
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n'
		),
		'viewScriptModule' => array(
			'@surecart/saved-items'
		)
	),
	'cart-line-item-scratch-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-scratch-amount',
		'title' => 'Line item scratch amount',
		'description' => 'Display the product line item scratch amount.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-status' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-status',
		'title' => 'Line item status',
		'description' => 'Display the product line item status.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-title',
		'title' => 'Line Item Title',
		'description' => 'Display the product line item title.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-trial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-trial',
		'title' => 'Line item trial',
		'description' => 'Display the product line item trial.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-item-variant' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-line-item-variant',
		'title' => 'Line item variant',
		'description' => 'Display the product line item variant, or the included items when the product is a bundle.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-line-item-details',
			'surecart/slide-out-cart-items',
			'surecart/slide-out-cart-line-items'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'showAllBundleItems' => array(
				'type' => 'boolean',
				'default' => true
			),
			'separator' => array(
				'type' => 'string',
				'default' => '·'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-line-items' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-line-items',
		'title' => 'Cart Items',
		'description' => 'The cart items',
		'category' => 'surecart-cart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'providesContext' => array(
			'editable' => 'editable',
			'removable' => 'removable'
		),
		'attributes' => array(
			'removable' => array(
				'type' => 'boolean',
				'default' => true
			),
			'editable' => array(
				'type' => 'boolean',
				'default' => true
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'layout' => array(
				'allowSizingOnChildren' => false
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '1.25em'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-line-item',
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'surecart-toggle',
			'file:./style-index.css'
		),
		'editorStyle' => array(
			'file:./index.css'
		),
		'viewScriptModule' => array(
			'@surecart/cart'
		)
	),
	'cart-menu-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-menu-icon-button',
		'title' => 'Cart Toggle Icon',
		'description' => 'The cart menu icon that shows your cart quantity.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'attributes' => array(
			'cart_icon' => array(
				'type' => 'string',
				'default' => 'shopping-bag'
			),
			'cart_menu_always_shown' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => false
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'__experimentalDefaultControls' => array(
					'width' => true,
					'color' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'editorStyle' => array(
			'surecart-choice',
			'file:./index.css'
		),
		'viewScriptModule' => array(
			'@surecart/checkout'
		)
	),
	'cart-message' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-message',
		'title' => 'Cart Message',
		'description' => 'Display a custom message in the cart',
		'category' => 'surecart-cart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-text',
			'file:./style-index.css'
		)
	),
	'cart-order-bump-add-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-add-button',
		'title' => 'Order Bump Add Button',
		'description' => 'Button to add the order bump to cart.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'width' => true
				)
			),
			'spacing' => array(
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-amount',
		'title' => 'Order Bump Amount',
		'description' => 'Display the order bump price.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'keywords' => array(
			'order bump',
			'amount',
			'price'
		),
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'cart-order-bump-cta' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-cta',
		'title' => 'Order Bump CTA',
		'description' => 'Display the order bump call to action text.',
		'version' => '1.0.0',
		'keywords' => array(
			'cta',
			'order bump'
		),
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-description' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-description',
		'title' => 'Order Bump Description',
		'description' => 'Display the order bump description.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'keywords' => array(
			'order bump',
			'description'
		),
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-discount-badge' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-discount-badge',
		'title' => 'Order Bump Discount Badge',
		'description' => 'Display the order bump discount badge.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'width' => true,
				'color' => true,
				'style' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-image',
		'title' => 'Order Bump Image',
		'description' => 'Display the order bump product image.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'attributes' => array(
			'sizing' => array(
				'type' => 'string',
				'default' => 'cover'
			),
			'aspectRatio' => array(
				'type' => 'string',
				'default' => '1'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'align' => array(
				'left',
				'center',
				'right',
				'wide',
				'full'
			),
			'color' => array(
				'text' => false,
				'background' => false
			),
			'filter' => array(
				'duotone' => true
			),
			'spacing' => array(
				'margin' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-pagination' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-pagination',
		'title' => 'Order Bump Pagination',
		'description' => 'Pagination controls for order bumps.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/cart-order-bumps'
		),
		'allowedBlocks' => array(
			'surecart/cart-order-bump-pagination-previous',
			'surecart/cart-order-bump-pagination-next'
		),
		'providesContext' => array(
			'paginationArrow' => 'paginationArrow',
			'paginationArrowSize' => 'paginationArrowSize'
		),
		'attributes' => array(
			'paginationArrow' => array(
				'type' => 'string',
				'default' => 'chevron'
			),
			'paginationArrowSize' => array(
				'type' => 'number',
				'default' => 20
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'center'
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-pagination-next' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-pagination-next',
		'title' => 'Order Bump Next',
		'description' => 'Navigate to the next page of order bumps.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-pagination'
		),
		'usesContext' => array(
			'paginationArrow',
			'paginationArrowSize'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-pagination-previous' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-pagination-previous',
		'title' => 'Order Bump Previous',
		'description' => 'Navigate to the previous page of order bumps.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-pagination'
		),
		'usesContext' => array(
			'paginationArrow',
			'paginationArrowSize'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-scratch-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-scratch-amount',
		'title' => 'Order Bump Scratch Amount',
		'description' => 'Display the order bump original price (strikethrough).',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-template',
		'title' => 'Order Bump Template',
		'description' => 'Template for rendering each order bump item.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bumps'
		),
		'usesContext' => array(
			'surecart/order-bumps/perPage'
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'layout' => array(
				'default' => array(
					'type' => 'grid',
					'columnCount' => 3
				),
				'allowSwitching' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'color' => array(
				'background' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bump-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bump-title',
		'title' => 'Order Bump Title',
		'description' => 'Display the order bump product title.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/cart-order-bump-template'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-order-bumps' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-order-bumps',
		'title' => 'Order Bumps',
		'description' => 'Display recommended order bumps in the cart.',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'hideAddedItems' => array(
				'type' => 'boolean',
				'default' => true
			),
			'style' => array(
				'type' => 'object',
				'default' => array(
					'spacing' => array(
						'margin' => array(
							'bottom' => '1em',
							'top' => '1em'
						),
						'padding' => array(
							'top' => '1.5em',
							'bottom' => '1.5em',
							'left' => '2em',
							'right' => '2em'
						)
					),
					'border' => array(
						'top' => array(
							'color' => '#b0b0b069',
							'width' => '1px'
						)
					)
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'style' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/order-bumps'
		),
		'style' => 'file:./style-index.css'
	),
	'cart-submit' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-submit',
		'title' => 'Cart Submit Button',
		'description' => 'The cart submit button',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'category' => 'surecart-cart',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'border' => array(
				'type' => 'boolean'
			),
			'sectionBackgroundColor' => array(
				'type' => 'string'
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'align' => false,
			'alignWide' => false,
			'html' => false,
			'inserter' => false,
			'multiple' => false,
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link',
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'background' => true,
				'text' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-wp-buttons',
			'surecart-wp-button',
			'file:./style-index.css',
			'wp-block-button'
		)
	),
	'cart-subtotal' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/slide-out-cart-subtotal',
		'title' => 'Cart Subtotal',
		'description' => 'Display the cart subtotal',
		'keywords' => array(
			'cart',
			'subtotal'
		),
		'category' => 'surecart-cart',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'border' => array(
				'type' => 'boolean',
				'default' => true
			),
			'padding' => array(
				'type' => 'object',
				'default' => array(
					'top' => '1.25em',
					'left' => '1.25em',
					'bottom' => '1.25em',
					'right' => '1.25em'
				)
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'inserter' => false,
			'currencyConversion' => true
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-line-item',
			'surecart-product-line-item'
		)
	),
	'cart-subtotal-amount' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-subtotal-amount',
		'title' => 'Cart Subtotal Amount',
		'description' => 'Display the cart subtotal amount',
		'keywords' => array(
			'cart',
			'subtotal',
			'amount'
		),
		'category' => 'surecart-cart',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'cart-subtotal-scratch-amount' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/cart-subtotal-scratch-amount',
		'title' => 'Cart Subtotal Scratch Amount',
		'description' => 'Display the cart subtotal scratch amount (original price before discount).',
		'keywords' => array(
			'cart',
			'subtotal',
			'scratch',
			'discount'
		),
		'category' => 'surecart-cart',
		'textdomain' => 'surecart',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/slide-out-cart'
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'checkout-address' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-address',
		'title' => 'Address',
		'description' => 'Shipping and billing address fields for the checkout form. Inserts both address blocks together.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowEditing' => false,
				'default' => array(
					'type' => 'flow'
				)
			),
			'spacing' => array(
				'margin' => true,
				'blockGap' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'checkout-billing-address' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-billing-address',
		'title' => 'Billing Address',
		'description' => 'Billing address fields, with a \'same as shipping\' toggle.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'toggleLabel' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showName' => array(
				'type' => 'boolean',
				'default' => false
			),
			'requireName' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLine2' => array(
				'type' => 'boolean',
				'default' => false
			),
			'defaultCountry' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-address',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-address',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-checkbox' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-checkbox',
		'title' => 'Checkbox Field',
		'description' => 'A yes/no checkbox saved on the order under the field name you choose.',
		'keywords' => array(
			'custom',
			'field',
			'checkbox',
			'consent',
			'metadata'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string'
			),
			'value' => array(
				'type' => 'string',
				'default' => 'on'
			),
			'checked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-radio-checkbox'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-radio-checkbox'
		)
	),
	'checkout-choice' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-choice',
		'title' => 'Choice',
		'description' => 'One option inside Choices. Its value is saved on the order when the customer picks it.',
		'keywords' => array(
			'custom',
			'field',
			'radio',
			'option',
			'choice'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'parent' => array(
			'surecart/checkout-choices'
		),
		'usesContext' => array(
			'surecart/checkout-choices/name',
			'surecart/checkout-choices/required'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'value' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-label',
			'surecart-radio-checkbox'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-label',
			'surecart-radio-checkbox'
		)
	),
	'checkout-choices' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-choices',
		'title' => 'Choices',
		'description' => 'Let the customer pick one option, saved on the order under the field name you choose.',
		'keywords' => array(
			'custom',
			'field',
			'radio',
			'choice',
			'select',
			'metadata'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'allowedBlocks' => array(
			'surecart/checkout-choice'
		),
		'providesContext' => array(
			'surecart/checkout-choices/name' => 'name',
			'surecart/checkout-choices/required' => 'required'
		),
		'attributes' => array(
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-radio-checkbox'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-radio-checkbox'
		)
	),
	'checkout-coupon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-coupon',
		'title' => 'Coupon',
		'description' => 'Apply a discount code on the instant checkout form.',
		'keywords' => array(
			'coupon',
			'promo',
			'discount'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form',
			'surecart/checkout-totals'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'button_text' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'collapsed' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-line-item',
			'surecart-coupon-form',
			'surecart-form-control',
			'surecart-input-group',
			'surecart-tag',
			'surecart-button-reset',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-line-item',
			'surecart-coupon-form',
			'surecart-form-control',
			'surecart-input-group',
			'surecart-tag',
			'surecart-button-reset',
			'surecart-theme-base'
		)
	),
	'checkout-email' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-email',
		'title' => 'Email',
		'description' => 'Email input field for the instant checkout form.',
		'keywords' => array(
			'email',
			'login',
			'customer'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			),
			'autoFocus' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => array(
			'@surecart/checkout-form',
			'@surecart/checkout-login'
		),
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-button',
			'surecart-button-reset',
			'file:./style-index.css'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'surecart-button',
			'surecart-button-reset',
			'file:./style-index.css'
		)
	),
	'checkout-first-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-first-name',
		'title' => 'First Name',
		'description' => 'Customer first name input for the instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-form-errors' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-form-errors',
		'title' => 'Checkout Errors',
		'description' => 'Displays checkout-level error messages on the instant checkout form.',
		'keywords' => array(
			'error',
			'notice',
			'alert'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true
				)
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-alert'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-alert'
		)
	),
	'checkout-input' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-input',
		'title' => 'Text Field',
		'description' => 'Collect a custom text value at checkout. The value is saved on the order under the field name you choose.',
		'keywords' => array(
			'custom',
			'field',
			'input',
			'text',
			'metadata'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string',
				'default' => ''
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-last-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-last-name',
		'title' => 'Last Name',
		'description' => 'Customer last name input for the instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-line-item-amount' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-amount',
		'title' => 'Line Item Amount',
		'description' => 'Display the line item price, interval and original price.',
		'keywords' => array(
			'line item',
			'price',
			'amount'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-fees' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-fees',
		'title' => 'Line Item Fees',
		'description' => 'Display per-item fee rows (e.g. order-bump fees) for the line item.',
		'keywords' => array(
			'line item',
			'fee',
			'setup'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-image' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-image',
		'title' => 'Line Item Image',
		'description' => 'Display the line item product image.',
		'keywords' => array(
			'line item',
			'product',
			'thumbnail'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'spacing' => array(
				'margin' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-quantity' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-quantity',
		'title' => 'Line Item Quantity',
		'description' => 'Quantity stepper (or a read-only "Qty: N") for a checkout line item.',
		'keywords' => array(
			'line item',
			'quantity',
			'qty'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'usesContext' => array(
			'editable'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'surecart-button-reset',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-remove' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-remove',
		'title' => 'Remove Line Item',
		'description' => 'Remove button for a checkout line item.',
		'keywords' => array(
			'line item',
			'remove',
			'delete'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'usesContext' => array(
			'removable'
		),
		'inserter' => false,
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'x'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-button-reset',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-button-reset',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-title' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-title',
		'title' => 'Line Item Title',
		'description' => 'Display the line item product name.',
		'keywords' => array(
			'line item',
			'product',
			'name'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-trial' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-trial',
		'title' => 'Line Item Trial',
		'description' => 'Display the line item trial text (e.g. "Starting in 120 days").',
		'keywords' => array(
			'line item',
			'trial',
			'subscription'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-item-variant' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-item-variant',
		'title' => 'Line Item Variant',
		'description' => 'Display the line item variant options (e.g. "Small / Red").',
		'keywords' => array(
			'line item',
			'variant',
			'option'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-line-items'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'style' => array(
			'surecart-product-line-item',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-line-items' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-line-items',
		'title' => 'Line Items',
		'description' => 'Display the checkout\'s line items with optional quantity edit and remove.',
		'keywords' => array(
			'line item',
			'cart',
			'products'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-totals'
		),
		'attributes' => array(
			'removable' => array(
				'type' => 'boolean',
				'default' => false
			),
			'editable' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'providesContext' => array(
			'editable' => 'editable',
			'removable' => 'removable'
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-line-item',
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'surecart-theme-base'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-line-item',
			'surecart-product-line-item',
			'surecart-input-group',
			'surecart-quantity-selector',
			'surecart-theme-base'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-name',
		'title' => 'Name',
		'description' => 'Customer name input for the instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-order-bump-cta' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-cta',
		'title' => 'Order Bump CTA',
		'description' => 'Display the order bump call-to-action line. Hidden when the bump has no CTA.',
		'keywords' => array(
			'order bump',
			'upsell',
			'button'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bump-description' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-description',
		'title' => 'Order Bump Description',
		'description' => 'Display the order bump product description.',
		'keywords' => array(
			'order bump',
			'upsell'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bump-discount-badge' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-discount-badge',
		'title' => 'Order Bump Discount Badge',
		'description' => 'Display the order bump savings tag. Hidden when the bump has no discount.',
		'keywords' => array(
			'order bump',
			'upsell',
			'sale'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bump-image' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-image',
		'title' => 'Order Bump Image',
		'description' => 'Display the order bump product image.',
		'keywords' => array(
			'order bump',
			'upsell',
			'thumbnail'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'spacing' => array(
				'margin' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bump-price' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-price',
		'title' => 'Order Bump Price',
		'description' => 'Display the order bump price, original price and interval.',
		'keywords' => array(
			'order bump',
			'upsell',
			'amount'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bump-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-template',
		'title' => 'Order Bump Card',
		'description' => 'The card shown for each recommended add-on.',
		'keywords' => array(
			'order bump',
			'upsell'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bumps'
		),
		'usesContext' => array(
			'surecart/showControl'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'color' => array(
				'background' => true,
				'text' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-button-reset',
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		)
	),
	'checkout-order-bump-title' => array(
		'$schema' => 'https://json.schemastore.org/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bump-title',
		'title' => 'Order Bump Title',
		'description' => 'Display the order bump product name.',
		'keywords' => array(
			'order bump',
			'upsell',
			'name'
		),
		'category' => 'surecart',
		'version' => '1.0.0',
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-order-bump-template'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'reusable' => false,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-spinner'
		),
		'viewScriptModule' => '@surecart/checkout-form'
	),
	'checkout-order-bumps' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-order-bumps',
		'title' => 'Checkout Order Bumps',
		'description' => 'Recommended add-ons for the instant checkout form. Hidden when no bumps are available.',
		'keywords' => array(
			'order bump',
			'upsell',
			'cross-sell'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'allowedBlocks' => array(
			'surecart/checkout-order-bump-template'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showControl' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hideAddedItems' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'providesContext' => array(
			'surecart/showControl' => 'showControl'
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-label',
			'surecart-spinner'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-choice',
			'surecart-tag',
			'surecart-label',
			'surecart-spinner'
		)
	),
	'checkout-password' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-password',
		'title' => 'Password',
		'description' => 'Let a new customer set an account password at checkout. Hidden automatically for a customer who is already logged in.',
		'keywords' => array(
			'password',
			'account',
			'signup',
			'input'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'file:./style-index.css'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label',
			'file:./style-index.css'
		)
	),
	'checkout-payment' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-payment',
		'title' => 'Payment',
		'description' => 'Payment methods for the instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'allowedBlocks' => array(
			'surecart/checkout-payment-label'
		),
		'attributes' => array(
			'defaultProcessor' => array(
				'type' => 'string',
				'default' => 'stripe',
				'enum' => array(
					'stripe',
					'paypal',
					'paystack',
					'razorpay',
					'mollie',
					'manual'
				)
			),
			'disabledMethods' => array(
				'type' => 'array',
				'default' => array(
					
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-tag',
			'surecart-alert',
			'surecart-choice',
			'surecart-label',
			'file:./style-index.css'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-tag',
			'surecart-alert',
			'surecart-choice',
			'surecart-label',
			'file:./style-index.css'
		)
	),
	'checkout-payment-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-payment-label',
		'title' => 'Payment Label',
		'description' => 'The payment section label and the test-mode badge for the instant checkout payment block.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-payment'
		),
		'inserter' => false,
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-tag',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-tag',
			'surecart-label'
		)
	),
	'checkout-phone' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-phone',
		'title' => 'Phone',
		'description' => 'Phone number input. Shown when the checkout requires a phone number.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'visibility' => array(
				'type' => 'string',
				'default' => 'auto',
				'enum' => array(
					'auto',
					'always'
				)
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-shipping-address' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-shipping-address',
		'title' => 'Shipping Address',
		'description' => 'Shipping address fields for the instant checkout form. Hidden when the checkout does not require a shipping address.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showName' => array(
				'type' => 'boolean',
				'default' => false
			),
			'requireName' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLine2' => array(
				'type' => 'boolean',
				'default' => false
			),
			'defaultCountry' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-address',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-address',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-shipping-choices' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-shipping-choices',
		'title' => 'Shipping Choices',
		'description' => 'Shipping method picker for the instant checkout form. Hidden when shipping is not required.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showDescription' => array(
				'type' => 'boolean',
				'default' => true
			),
			'freeLabel' => array(
				'type' => 'string'
			),
			'emptyCountryText' => array(
				'type' => 'string'
			),
			'emptyChoicesText' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-radio-checkbox',
			'surecart-label',
			'surecart-form-control'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-radio-checkbox',
			'surecart-label',
			'surecart-form-control'
		)
	),
	'checkout-submit' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-submit',
		'title' => 'Submit',
		'description' => 'Submit button for the instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'showTotal' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showSecureNotice' => array(
				'type' => 'boolean',
				'default' => true
			),
			'secureNoticeText' => array(
				'type' => 'string',
				'default' => ''
			),
			'showIcon' => array(
				'type' => 'boolean',
				'default' => true
			),
			'full' => array(
				'type' => 'boolean',
				'default' => false
			),
			'size' => array(
				'type' => 'string',
				'default' => 'large',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalSkipSerialization' => true
			),
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalSelector' => '.sc-checkout-submit__button',
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true
			),
			'shadow' => array(
				'__experimentalSkipSerialization' => true
			),
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-secure-notice',
			'file:./style-index.css'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-secure-notice',
			'file:./style-index.css'
		)
	),
	'checkout-subtotal' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-subtotal',
		'title' => 'Subtotal',
		'description' => 'Subtotal line item for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-totals'
		),
		'allowedBlocks' => array(
			'core/group',
			'surecart/checkout-subtotal-label',
			'surecart/checkout-subtotal-amount'
		),
		'attributes' => array(
			'totalPaymentsText' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => true,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item',
			'surecart-tag'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item',
			'surecart-tag'
		)
	),
	'checkout-subtotal-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-subtotal-amount',
		'title' => 'Subtotal Amount',
		'description' => 'The subtotal amount for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-subtotal'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-subtotal-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-subtotal-label',
		'title' => 'Subtotal Label',
		'description' => 'The subtotal row label for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-subtotal'
		),
		'inserter' => false,
		'attributes' => array(
			'description' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-summary-extras' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-summary-extras',
		'title' => 'Discounts & Shipping',
		'description' => 'Discount, trial and shipping rows for the order summary. Empty rows are hidden.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-totals'
		),
		'attributes' => array(
			'bumpLabel' => array(
				'type' => 'string'
			),
			'shippingLabel' => array(
				'type' => 'string'
			),
			'trialLabel' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-switch' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-switch',
		'title' => 'Switch',
		'description' => 'A yes/no toggle saved on the order under the field name you choose.',
		'keywords' => array(
			'custom',
			'field',
			'switch',
			'toggle',
			'metadata'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string'
			),
			'value' => array(
				'type' => 'string',
				'default' => 'on'
			),
			'checked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-tax' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-tax',
		'title' => 'Tax',
		'description' => 'Tax line item for the instant checkout order summary. Hidden when tax is zero.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-totals'
		),
		'allowedBlocks' => array(
			'core/group',
			'surecart/checkout-tax-label',
			'surecart/checkout-tax-amount'
		),
		'attributes' => array(
			'includedLabel' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => true,
			'anchor' => true,
			'layout' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-tax-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-tax-amount',
		'title' => 'Tax Amount',
		'description' => 'The tax amount for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-tax'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-tax-id' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-tax-id',
		'title' => 'Tax ID',
		'description' => 'Tax ID type + number input for the instant checkout form. Hidden until a tax ID is required.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			),
			'taxIdTypes' => array(
				'type' => 'array',
				'default' => array(
					'eu_vat',
					'gb_vat',
					'ca_gst',
					'au_abn',
					'other'
				),
				'items' => array(
					'type' => 'string'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-tax-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-tax-label',
		'title' => 'Tax Label',
		'description' => 'The tax row label for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-tax'
		),
		'inserter' => false,
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'estimatedLabel' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-terms' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-terms',
		'title' => 'Terms',
		'description' => 'Required terms-of-service checkbox shown before the submit button.',
		'keywords' => array(
			'terms',
			'agreement',
			'checkout'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-control'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-form-control'
		)
	),
	'checkout-textarea' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-textarea',
		'title' => 'Text Area',
		'description' => 'Collect a longer custom text value at checkout, such as a gift note. The value is saved on the order under the field name you choose.',
		'keywords' => array(
			'custom',
			'field',
			'textarea',
			'note',
			'metadata'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string',
				'default' => ''
			),
			'help' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'rows' => array(
				'type' => 'number',
				'default' => 4
			),
			'size' => array(
				'type' => 'string',
				'default' => 'medium',
				'enum' => array(
					'small',
					'medium',
					'large'
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-form-group',
			'surecart-form-control',
			'surecart-label'
		)
	),
	'checkout-total' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-total',
		'title' => 'Total',
		'description' => 'Grand total line item for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-totals'
		),
		'allowedBlocks' => array(
			'core/group',
			'surecart/checkout-total-label',
			'surecart/checkout-total-scratch-amount',
			'surecart/checkout-total-amount'
		),
		'attributes' => array(
			'size' => array(
				'type' => 'string',
				'default' => 'large',
				'enum' => array(
					'default',
					'large'
				)
			),
			'subscriptionText' => array(
				'type' => 'string',
				'default' => ''
			),
			'dueAmountText' => array(
				'type' => 'string',
				'default' => ''
			),
			'freeTrialText' => array(
				'type' => 'string',
				'default' => ''
			),
			'firstPaymentTotalText' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => true,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-total-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-total-amount',
		'title' => 'Total Amount',
		'description' => 'The total amount for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-total'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-total-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-total-label',
		'title' => 'Total Label',
		'description' => 'The total row label for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-total'
		),
		'inserter' => false,
		'attributes' => array(
			'description' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-total-scratch-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-total-scratch-amount',
		'title' => 'Original Total',
		'description' => 'The struck-through original total for the instant checkout order summary.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/checkout-total'
		),
		'inserter' => false,
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-line-item'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-line-item'
		)
	),
	'checkout-totals' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/checkout-totals',
		'title' => 'Order Summary',
		'description' => 'Collapsible container for line items, subtotal, tax, and total.',
		'keywords' => array(
			'summary',
			'cart',
			'totals'
		),
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/instant-checkout-form'
		),
		'attributes' => array(
			'orderSummaryText' => array(
				'type' => 'string'
			),
			'collapsible' => array(
				'type' => 'boolean',
				'default' => false
			),
			'collapsedOnMobile' => array(
				'type' => 'boolean',
				'default' => false
			),
			'collapsedOnDesktop' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'shadow' => true,
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'file:./style-index.css',
			'surecart-button-reset',
			'surecart-theme-base'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-button-reset',
			'surecart-theme-base'
		)
	),
	'currency-switcher' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/currency-switcher',
		'title' => 'Currency Switcher',
		'description' => 'Display a currency switcher dropdown.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'example' => array(
			
		),
		'attributes' => array(
			'position' => array(
				'type' => 'string',
				'default' => 'right'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-dropdown',
			'surecart-button',
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/dropdown',
			'file:./view.js'
		)
	),
	'customer-saved-items' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/customer-saved-items',
		'title' => 'Customer Saved Items',
		'description' => 'The shopper\'s saved items: a short overview, or the full list with their lists.',
		'version' => '1.0.0',
		'category' => 'surecart-customer-dashboard',
		'icon' => 'heart',
		'keywords' => array(
			'saved',
			'wishlist',
			'favorites',
			'customer',
			'dashboard'
		),
		'textdomain' => 'surecart',
		'variations' => array(
			array(
				'name' => 'full',
				'title' => 'Saved Items',
				'description' => 'The shopper\'s saved items with their lists. For the Saved Items page or the dashboard\'s Saved tab.',
				'icon' => 'heart',
				'attributes' => array(
					'show_all' => true
				),
				'isActive' => array(
					'show_all'
				),
				'scope' => array(
					'inserter',
					'transform'
				)
			),
			array(
				'name' => 'overview',
				'title' => 'Saved Items Overview',
				'description' => 'A short preview of the shopper\'s saved items with a View all link. For the dashboard home.',
				'icon' => 'heart',
				'attributes' => array(
					'show_all' => false
				),
				'isActive' => array(
					'show_all'
				),
				'scope' => array(
					'inserter',
					'transform'
				)
			)
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string'
			),
			'show_all' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'reusable' => false,
			'html' => false,
			'align' => array(
				'wide',
				'full'
			),
			'color' => array(
				'text' => true,
				'background' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-theme-base',
			'surecart-saved-items',
			'surecart-dropdown',
			'surecart-alert',
			'surecart-tag',
			'wp-block-button',
			'surecart-wp-button',
			'surecart-spinner'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n'
		),
		'viewScriptModule' => array(
			'@surecart/saved-items'
		)
	),
	'icon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/icon',
		'title' => 'Icon',
		'description' => 'Display an icon from the SureCart icon library.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'icon' => 'star-filled',
		'keywords' => array(
			'icon',
			'svg',
			'graphic'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'icon_name' => array(
				'type' => 'string',
				'default' => 'star'
			),
			'size' => array(
				'type' => 'number',
				'default' => 24
			),
			'stroke_width' => array(
				'type' => 'number',
				'default' => 2
			),
			'link_url' => array(
				'type' => 'string'
			),
			'link_target' => array(
				'type' => 'string',
				'default' => '_self'
			),
			'link_rel' => array(
				'type' => 'string'
			),
			'nofollow' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'html' => false,
			'align' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./controller.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'instant-checkout-form' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/instant-checkout-form',
		'title' => 'Instant Checkout Form',
		'description' => 'The instant checkout form.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'example' => array(
			
		),
		'attributes' => array(
			'columns' => array(
				'type' => 'string',
				'default' => 'two',
				'enum' => array(
					'one',
					'two'
				)
			),
			'showOrderSummary' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'align' => array(
				'wide',
				'full'
			),
			'html' => false,
			'multiple' => false,
			'anchor' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowEditing' => true
			),
			'color' => array(
				'background' => true,
				'text' => true,
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'dimensions' => array(
				'minHeight' => true
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'style' => true,
					'width' => true
				)
			),
			'shadow' => true
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => '@surecart/checkout-form',
		'editorStyle' => array(
			'surecart-theme-base',
			'surecart-instant-checkout-form',
			'surecart-block-ui',
			'surecart-spinner'
		),
		'style' => array(
			'surecart-theme-base',
			'surecart-instant-checkout-form',
			'surecart-block-ui',
			'surecart-spinner'
		)
	),
	'price-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-amount',
		'title' => 'Price Amount',
		'description' => 'Displays amount of a price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'icon' => 'money-alt',
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true,
					'textAlign' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'price-interval' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-interval',
		'title' => 'Price Interval',
		'description' => 'Displays the price interval.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true,
					'textAlign' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'price-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-name',
		'title' => 'Price Name',
		'description' => 'Displays the name of a price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price',
			'postId'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'price-scratch-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-scratch-amount',
		'title' => 'Price Scratch Amount',
		'description' => 'Displays scratch amount of a price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true,
					'textAlign' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'price-setup-fee' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-setup-fee',
		'title' => 'Price Setup Fee',
		'description' => 'Displays the setup fee of a price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'price-trial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/price-trial',
		'title' => 'Price Trial',
		'description' => 'Displays trial of a price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'clock',
		'usesContext' => array(
			'surecart/priceId',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-choice-template'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'product-buy-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-buy-button',
		'title' => 'Product Buy Button',
		'description' => 'Display the product buy button.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-buy-buttons'
		),
		'usesContext' => array(
			'surecart/product',
			'postId',
			'providerBlock'
		),
		'attributes' => array(
			'add_to_cart' => array(
				'type' => 'boolean',
				'default' => false
			),
			'show_sticky_purchase_button' => array(
				'type' => 'string',
				'enum' => array(
					'never',
					'in_stock',
					'always'
				),
				'default' => 'never'
			),
			'text' => array(
				'type' => 'string'
			),
			'out_of_stock_text' => array(
				'type' => 'string'
			),
			'unavailable_text' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'number',
				'default' => 100
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'padding' => array(
					'horizontal',
					'vertical'
				),
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link',
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true
			),
			'reusable' => false,
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			),
			'__experimentalStyle' => array(
				'variations' => array(
					'outline' => array(
						'border' => array(
							'color' => 'currentColor',
							'width' => '2px',
							'style' => 'solid'
						),
						'color' => array(
							'text' => 'currentColor',
							'gradient' => 'transparent none'
						)
					)
				)
			)
		),
		'variations' => array(
			array(
				'name' => 'cart',
				'title' => 'Add To Cart Button',
				'icon' => 'cart',
				'description' => 'Add a button to add the product to the cart.',
				'attributes' => array(
					'add_to_cart' => true,
					'text' => 'Add To Cart'
				),
				'isDefault' => true,
				'isActive' => array(
					'add_to_cart'
				),
				'scope' => array(
					'inserter',
					'block',
					'transform'
				)
			),
			array(
				'name' => 'buy',
				'title' => 'Buy Now Button',
				'icon' => 'store',
				'description' => 'Add a button to buy the product.',
				'attributes' => array(
					'add_to_cart' => false,
					'text' => 'Buy Now'
				),
				'isActive' => array(
					'add_to_cart'
				),
				'scope' => array(
					'inserter',
					'block',
					'transform'
				)
			)
		),
		'styles' => array(
			array(
				'name' => 'fill',
				'label' => 'Fill',
				'isDefault' => true
			),
			array(
				'name' => 'outline',
				'label' => 'Outline'
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-wp-button'
		),
		'style' => array(
			'surecart-wp-button',
			'surecart-spinner'
		),
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/cart'
		)
	),
	'product-buy-buttons' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-buy-buttons',
		'title' => 'Buy Buttons',
		'description' => 'Displays product buy and add to cart buttons',
		'category' => 'surecart-product-page',
		'keywords' => array(
			'button',
			'buy',
			'product'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/product-template',
			'surecart/sticky-purchase'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'align' => array(
				'wide',
				'full'
			),
			'html' => false,
			'__experimentalExposeControlsToChildren' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'__experimentalLayout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			)
		),
		'style' => array(
			'surecart-wp-buttons',
			'file:./style-index.css'
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'textdomain' => 'surecart'
	),
	'product-collection-tag' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-collection-tag',
		'title' => 'Tag',
		'description' => 'A product collection tag for a product.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-collection-tags'
		),
		'usesContext' => array(
			'surecart/productCollectionTag/name'
		),
		'attributes' => array(
			'isLink' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				),
				'enableContrastChecker' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'lineHeight' => true,
				'fontSize' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-tag'
		)
	),
	'product-collection-tags' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-collection-tags',
		'title' => 'Collection Tags',
		'description' => 'Displays collection selectors for a product.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'usesContext' => array(
			'postId'
		),
		'attributes' => array(
			'count' => array(
				'type' => 'number',
				'default' => 1
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'color' => array(
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'blockGap' => array(
					'__experimentalDefault' => '3px'
				),
				'margin' => array(
					'top',
					'bottom'
				),
				'padding' => array(
					'horizontal',
					'vertical'
				)
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-description' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-description',
		'title' => 'Product Description',
		'description' => 'Display the product description.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'usesContext' => array(
			'postId'
		),
		'supports' => array(
			'interactivity' => true,
			'reusable' => false,
			'html' => false,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true,
					'link' => true
				)
			),
			'spacing' => array(
				'margin' => array(
					'top',
					'bottom'
				),
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-prose'
		),
		'editorScript' => 'file:./index.js'
	),
	'product-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-image',
		'title' => 'Image',
		'description' => 'Display the product image.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'sizing' => array(
				'type' => 'string',
				'default' => 'cover'
			),
			'aspectRatio' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			),
			'isLink' => array(
				'type' => 'boolean',
				'default' => false
			),
			'rel' => array(
				'type' => 'string',
				'attribute' => 'rel',
				'default' => ''
			),
			'linkTarget' => array(
				'type' => 'string',
				'default' => '_self'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'text' => false,
				'background' => false
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'width' => true,
					'color' => true,
					'radius' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-line-item-note' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-line-item-note',
		'title' => 'Product Note',
		'description' => 'Allow customers to add a note to the product',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template'
		),
		'keywords' => array(
			'note',
			'comment',
			'message',
			'product'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'help_text' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'typography' => array(
				'fontSize' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'gradients' => false,
				'background' => false,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control',
			'file:./style-index.css'
		)
	),
	'product-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list',
		'title' => 'Product List',
		'description' => 'Display a list of products.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			'innerBlocks' => array(
				array(
					'name' => 'surecart/product-list',
					'attributes' => array(
						'metadata' => array(
							'categories' => array(
								'surecart_shop'
							),
							'patternName' => 'surecart-list-standard',
							'name' => 'Standard'
						),
						'align' => 'wide',
						'style' => array(
							'spacing' => array(
								'blockGap' => '10px',
								'margin' => array(
									'left' => '0px',
									'right' => '0px'
								)
							)
						)
					),
					'innerBlocks' => array(
						array(
							'name' => 'core/group',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'margin' => array(
											'bottom' => '10px'
										),
										'padding' => array(
											'top' => '0',
											'bottom' => '0',
											'left' => '0',
											'right' => '0'
										)
									)
								),
								'layout' => array(
									'type' => 'flex',
									'justifyContent' => 'space-between'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'core/group',
									'attributes' => array(
										'style' => array(
											'spacing' => array(
												'padding' => array(
													'top' => '0',
													'bottom' => '0',
													'left' => '0',
													'right' => '0'
												)
											)
										),
										'layout' => array(
											'type' => 'flex',
											'flexWrap' => 'nowrap'
										)
									),
									'innerBlocks' => array(
										array(
											'name' => 'surecart/product-list-sort'
										),
										array(
											'name' => 'surecart/product-list-filter'
										)
									)
								),
								array(
									'name' => 'surecart/product-list-search',
									'attributes' => array(
										'style' => array(
											'layout' => array(
												'selfStretch' => 'fixed',
												'flexSize' => '250px'
											)
										)
									)
								)
							)
						),
						array(
							'name' => 'core/group',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'margin' => array(
											'bottom' => '10px'
										),
										'padding' => array(
											'top' => '0',
											'bottom' => '0',
											'left' => '0',
											'right' => '0'
										)
									)
								),
								'layout' => array(
									'type' => 'flex',
									'flexWrap' => 'nowrap'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'surecart/product-list-filter-tags',
									'innerBlocks' => array(
										array(
											'name' => 'surecart/product-list-filter-tag'
										)
									)
								)
							)
						),
						array(
							'name' => 'surecart/product-template',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'blockGap' => '2rem'
									)
								),
								'layout' => array(
									'type' => 'grid',
									'columnCount' => null,
									'minimumColumnWidth' => '14rem'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'core/group',
									'innerBlocks' => array(
										array(
											'name' => 'core/group',
											'attributes' => array(
												'style' => array(
													'color' => array(
														'background' => '#0000000d'
													),
													'border' => array(
														'radius' => '10px'
													)
												),
												'layout' => array(
													'type' => 'constrained'
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'core/cover',
													'attributes' => array(
														'useFeaturedImage' => true,
														'dimRatio' => 0,
														'isUserOverlayColor' => true,
														'focalPoint' => array(
															'x' => 0.5,
															'y' => 0.5
														),
														'contentPosition' => 'top right',
														'isDark' => false,
														'style' => array(
															'dimensions' => array(
																'aspectRatio' => '3/4'
															),
															'layout' => array(
																'selfStretch' => 'fit',
																'flexSize' => null
															),
															'spacing' => array(
																'margin' => array(
																	'bottom' => '15px'
																)
															),
															'border' => array(
																'radius' => '10px'
															)
														)
													),
													'innerBlocks' => array(
														array(
															'name' => 'surecart/product-sale-badge',
															'attributes' => array(
																'style' => array(
																	'typography' => array(
																		'fontSize' => '12px'
																	),
																	'border' => array(
																		'radius' => '100px'
																	)
																)
															)
														)
													)
												)
											)
										),
										array(
											'name' => 'surecart/product-title',
											'attributes' => array(
												'level' => 2,
												'style' => array(
													'typography' => array(
														'fontSize' => '15px',
														'fontStyle' => 'normal',
														'fontWeight' => '400'
													),
													'spacing' => array(
														'margin' => array(
															'bottom' => '5px',
															'top' => '0px'
														)
													)
												)
											)
										),
										array(
											'name' => 'core/group',
											'attributes' => array(
												'style' => array(
													'spacing' => array(
														'blockGap' => '0.5em',
														'margin' => array(
															'top' => '0px',
															'bottom' => '0px'
														),
														'padding' => array(
															'top' => '0',
															'bottom' => '0',
															'left' => '0',
															'right' => '0'
														)
													),
													'margin' => array(
														'top' => '0px',
														'bottom' => '0px'
													),
													'typography' => array(
														'lineHeight' => '1'
													)
												),
												'layout' => array(
													'type' => 'flex',
													'flexWrap' => 'nowrap'
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'surecart/product-list-price',
													'attributes' => array(
														'style' => array(
															'typography' => array(
																'fontSize' => '18px',
																'fontStyle' => 'normal',
																'fontWeight' => '600'
															),
															'spacing' => array(
																'margin' => array(
																	'top' => '5px',
																	'bottom' => '5px'
																)
															)
														)
													)
												),
												array(
													'name' => 'surecart/product-scratch-price',
													'attributes' => array(
														'style' => array(
															'typography' => array(
																'fontSize' => '18px',
																'fontStyle' => 'normal',
																'fontWeight' => '600'
															),
															'spacing' => array(
																'margin' => array(
																	'top' => '5px',
																	'bottom' => '5px'
																)
															)
														)
													)
												)
											)
										)
									)
								)
							)
						),
						array(
							'name' => 'surecart/product-pagination',
							'attributes' => array(
								'style' => array(
									'elements' => array(
										'link' => array(
											'color' => array(
												'text' => '#000000'
											)
										)
									),
									'spacing' => array(
										'padding' => array(
											'top' => '15px',
											'bottom' => '15px'
										)
									)
								),
								'textColor' => 'black'
							),
							'innerBlocks' => array(
								array(
									'name' => 'surecart/product-pagination-previous'
								),
								array(
									'name' => 'surecart/product-pagination-numbers'
								),
								array(
									'name' => 'surecart/product-pagination-next'
								)
							)
						)
					)
				)
			)
		),
		'providesContext' => array(
			'query' => 'query',
			'surecart/product-list/limit' => 'limit',
			'surecart/product-list/offset' => 'offset',
			'surecart/product-list/type' => 'type',
			'surecart/product-list/ids' => 'ids'
		),
		'attributes' => array(
			'ids' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'type' => array(
				'type' => 'string',
				'default' => 'all'
			),
			'limit' => array(
				'type' => 'number'
			),
			'collection_id' => array(
				'type' => 'string',
				'default' => ''
			),
			'query' => array(
				'type' => 'object',
				'default' => array(
					'perPage' => 15,
					'pages' => 0,
					'offset' => 0,
					'postType' => 'sc_product',
					'order' => 'desc',
					'orderBy' => 'date',
					'author' => '',
					'search' => '',
					'exclude' => array(
						
					),
					'include' => array(
						
					),
					'sticky' => '',
					'inherit' => true,
					'taxQuery' => null,
					'parents' => array(
						
					)
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => true,
			'align' => true,
			'currencyConversion' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-tag',
			'surecart-theme-base'
		)
	),
	'product-list-content' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-content',
		'title' => 'Content',
		'description' => 'Display the product list content.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-list-filter' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter',
		'title' => 'Filter (Dropdown)',
		'description' => 'Display the product filter.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'taxonomy' => array(
				'type' => 'string',
				'default' => 'sc_collection'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-dropdown',
			'surecart-button'
		),
		'viewScriptModule' => '@surecart/dropdown'
	),
	'product-list-filter-checkbox' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-checkbox',
		'title' => 'Checkbox',
		'description' => 'Display the filter checkbox.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'surecart/checkbox/name'
		),
		'ancestor' => array(
			'surecart/product-list-filter-checkboxes-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-radio-checkbox'
		)
	),
	'product-list-filter-checkboxes' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-checkboxes',
		'title' => 'Filter Checkboxes',
		'description' => 'Display the product list filter checkboxes.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'taxonomy' => array(
				'type' => 'string',
				'default' => 'sc_collection'
			)
		),
		'providesContext' => array(
			'taxonomySlug' => 'taxonomy'
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-list-filter-checkboxes-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-checkboxes-label',
		'title' => 'Label',
		'description' => 'Display the product list filter checkboxes label.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-filter-checkboxes'
		),
		'usesContext' => array(
			'taxonomySlug'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-list-filter-checkboxes-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-checkboxes-template',
		'title' => 'Template',
		'description' => 'Display the filter checkboxes.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-filter-checkboxes'
		),
		'usesContext' => array(
			'taxonomySlug'
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'vertical'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'style' => array(
				'spacing' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-list-filter-tag' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-tag',
		'title' => 'Tag',
		'description' => 'Display the filter tag.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'surecart/filterTag/name'
		),
		'ancestor' => array(
			'surecart/product-list-filter-tags-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-checkbox'
		),
		'render' => 'file:./view.php'
	),
	'product-list-filter-tags' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-tags',
		'title' => 'Applied Filters',
		'description' => 'Display the applied filters.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'render' => 'file:./view.php'
	),
	'product-list-filter-tags-clear-all' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-tags-clear-all',
		'title' => 'Clear All',
		'description' => 'Display the product list filter tags clear all link.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-list-filter-tags-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-tags-label',
		'title' => 'Label',
		'description' => 'Display the product list filter tags label',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-list-filter-tags-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-filter-tags-template',
		'title' => 'Template',
		'description' => 'Display the filter tags.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-list-no-products' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-no-products',
		'title' => 'No products',
		'category' => 'surecart',
		'description' => 'Contains the block elements used to render content when no products are found.',
		'ancestor' => array(
			'surecart/product-list'
		),
		'textdomain' => 'surecart',
		'usesContext' => array(
			'query'
		),
		'example' => array(
			'innerBlocks' => array(
				array(
					'name' => 'core/paragraph',
					'attributes' => array(
						'content' => 'No products found.'
					)
				)
			)
		),
		'supports' => array(
			'align' => true,
			'reusable' => false,
			'html' => false,
			'color' => array(
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'interactivity' => array(
				'clientNavigation' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'product-list-related' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-related',
		'title' => 'Related Products',
		'description' => 'Display a list of products related to the current product.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'providesContext' => array(
			'query' => 'query',
			'surecart/product-list/limit' => 'limit'
		),
		'attributes' => array(
			'limit' => array(
				'type' => 'number'
			),
			'query' => array(
				'type' => 'object',
				'default' => array(
					'perPage' => 4,
					'pages' => 3,
					'offset' => 0,
					'postType' => 'sc_product',
					'order' => 'desc',
					'orderBy' => 'date',
					'taxonomy' => 'sc_collection',
					'related' => true,
					'fallback' => true
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => true,
			'align' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-tag',
			'surecart-theme-base'
		)
	),
	'product-list-search' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-search',
		'title' => 'Search',
		'description' => 'Display the product search.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-input-group',
			'surecart-form-label',
			'surecart-form-control',
			'surecart-spinner',
			'file:./index.css'
		)
	),
	'product-list-sidebar' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sidebar',
		'title' => 'Sidebar',
		'description' => 'Display the product list sidebar.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'open' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'usesContext' => array(
			'query'
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'vertical'
				)
			),
			'position' => array(
				'sticky' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-drawer',
			'surecart-block-ui',
			'wp-a11y'
		),
		'render' => 'file:./view.php',
		'viewScriptModule' => array(
			'@surecart/sidebar',
			'wp-a11y'
		)
	),
	'product-list-sidebar-toggle' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sidebar-toggle',
		'title' => 'Sidebar Toggle Button',
		'description' => 'Display the product list sidebar toggle.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'sliders'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'render' => 'file:./view.php',
		'viewScriptModule' => array(
			'@surecart/sidebar'
		)
	),
	'product-list-sort' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sort',
		'title' => 'Sort (Dropdown)',
		'description' => 'Display the product sort.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'usesContext' => array(
			'query'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-dropdown',
			'surecart-button'
		),
		'viewScriptModule' => '@surecart/dropdown'
	),
	'product-list-sort-radio' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sort-radio',
		'title' => 'Radio',
		'description' => 'Display the sort radio.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'surecart/radio/name'
		),
		'ancestor' => array(
			'surecart/product-list-sort-radio-group-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-radio-checkbox'
		)
	),
	'product-list-sort-radio-group' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sort-radio-group',
		'title' => 'Sort (Radio Group)',
		'description' => 'Display the Product List Sort Radio Group.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'style' => array(
				'spacing' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-list-sort-radio-group-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sort-radio-group-label',
		'title' => 'Label',
		'description' => 'Display the product list sort radio group label',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-sort-radio-group'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-list-sort-radio-group-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-sort-radio-group-template',
		'title' => 'Template',
		'description' => 'Display the sort radio group template.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list-sort-radio-group'
		),
		'attributes' => array(
			'taxonomy' => array(
				'type' => 'string',
				'default' => 'sc_collection'
			)
		),
		'usesContext' => array(
			'query'
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'vertical'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'style' => array(
				'spacing' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-media' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-media',
		'title' => 'Product Media',
		'description' => 'A container to display the product media',
		'category' => 'surecart-product-page',
		'keywords' => array(
			'image',
			'media'
		),
		'textdomain' => 'surecart',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/upsell'
		),
		'usesContext' => array(
			'postId'
		),
		'supports' => array(
			'interactivity' => true,
			'reusable' => false,
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'auto_height' => array(
				'type' => 'boolean',
				'default' => true
			),
			'desktop_gallery' => array(
				'type' => 'boolean',
				'default' => false
			),
			'height' => array(
				'type' => 'string',
				'default' => '310px'
			),
			'width' => array(
				'type' => 'string'
			),
			'show_thumbnails' => array(
				'type' => 'boolean',
				'default' => true
			),
			'thumbnails_per_page' => array(
				'type' => 'number',
				'default' => 5
			),
			'hide_empty' => array(
				'type' => 'boolean',
				'default' => false
			),
			'lightbox' => array(
				'type' => 'boolean',
				'default' => true
			),
			'id' => array(
				'type' => 'string'
			)
		),
		'variations' => array(
			array(
				'name' => 'slider',
				'title' => 'Product Media Slider',
				'icon' => 'image-flip-horizontal',
				'description' => 'Display the product media in a slider.',
				'isDefault' => true,
				'attributes' => array(
					'desktop_gallery' => false
				),
				'isActive' => array(
					'desktop_gallery'
				),
				'scope' => array(
					'inserter',
					'block',
					'transform'
				)
			),
			array(
				'name' => 'gallery',
				'title' => 'Product Media Gallery',
				'icon' => 'screenoptions',
				'description' => 'Display the product media in a gallery on desktop devices.',
				'attributes' => array(
					'desktop_gallery' => true
				),
				'isActive' => array(
					'desktop_gallery'
				),
				'scope' => array(
					'inserter',
					'block',
					'transform'
				)
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-image-slider'
		),
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-page' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-page',
		'title' => 'Product Form',
		'description' => 'Display product form.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'providesContext' => array(
			'surecart/product_id' => 'product_id'
		),
		'usesContext' => array(
			'queryId',
			'query',
			'displayLayout',
			'templateSlug',
			'previewPostType',
			'enhancedPagination',
			'postType'
		),
		'attributes' => array(
			'product_id' => array(
				'type' => 'string'
			),
			'product_post_id' => array(
				'type' => 'integer'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'align' => true,
			'layout' => true,
			'currencyConversion' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./editor.css',
		'style' => array(
			'file:./style-index.css',
			'surecart-theme-base',
			'surecart-prose'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n',
			'wp-a11y'
		),
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/product-page'
		)
	),
	'product-pagination' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-pagination',
		'title' => 'Pagination',
		'description' => 'Display the product pagination.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids'
		),
		'ancestor' => array(
			'surecart/product-list',
			'surecart/product-list-related'
		),
		'allowedBlocks' => array(
			'surecart/product-pagination-previous',
			'surecart/product-pagination-numbers',
			'surecart/product-pagination-next'
		),
		'attributes' => array(
			'paginationArrow' => array(
				'type' => 'string',
				'default' => 'arrow'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'providesContext' => array(
			'paginationArrow' => 'paginationArrow',
			'showLabel' => 'showLabel'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'space-between'
				)
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-pagination-next' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-pagination-next',
		'title' => 'Next',
		'description' => 'Display the product pagination next.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids',
			'paginationArrow',
			'showLabel'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-pagination-numbers' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-pagination-numbers',
		'title' => 'Numbers',
		'description' => 'Display the product pagination numbers.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids',
			'paginationArrow',
			'showLabel'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-pagination-previous' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-pagination-previous',
		'title' => 'Previous',
		'description' => 'Display the product pagination previous.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids',
			'paginationArrow',
			'showLabel'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-price' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-list-price',
		'title' => 'Price',
		'description' => 'Display the static product price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'attributes' => array(
			'show_range' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./view.php'
	),
	'product-price-choice-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-price-choice-template',
		'title' => 'Price',
		'description' => 'Displays the price of a product with a choice of options.',
		'version' => '1.0.0',
		'category' => 'widgets',
		'icon' => 'money',
		'usesContext' => array(
			'postId',
			'surecart/product',
			'surecart/price'
		),
		'ancestor' => array(
			'surecart/product-price-chooser'
		),
		'attributes' => array(
			'highlight_border' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			),
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'__experimentalLayout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-choice',
			'file:./style-index.css'
		)
	),
	'product-price-chooser' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-price-chooser',
		'title' => 'Price Selector',
		'description' => 'Displays possible choices for product prices.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'usesContext' => array(
			'postId'
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => false
			),
			'currencyConversion' => true
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'columns' => array(
				'type' => 'number',
				'default' => 1
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-choice',
			'surecart-label',
			'file:./style-index.css'
		)
	),
	'product-quantity' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quantity',
		'title' => 'Product Quantity',
		'description' => 'Display the product quantity selector',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'keywords' => array(
			'quantity',
			'form',
			'product'
		),
		'example' => array(
			'viewportWidth' => 200
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'hidden_label' => array(
				'type' => 'boolean',
				'default' => false
			),
			'id' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'gradients' => false,
				'background' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true,
					'link' => true
				)
			),
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-quantity-selector',
			'surecart-input-group',
			'file:./index.css'
		),
		'style' => array(
			'surecart-quantity-selector',
			'surecart-input-group',
			'file:./style-index.css'
		)
	),
	'product-quantity-control' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quantity-control',
		'title' => 'Control',
		'description' => 'Display the product quantity control',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'ancestor' => array(
			'surecart/product-quantity'
		),
		'keywords' => array(
			'quantity',
			'form',
			'product'
		),
		'attributes' => array(
			'width' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'dimensions' => array(
				'minHeight' => true,
				'width' => true
			),
			'layout' => array(
				'allowSizingOnChildren' => true,
				'allowSwitching' => true,
				'allowInheriting' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'center',
					'horizontalAlignment' => 'space-between',
					'flexWrap' => 'nowrap',
					'justifyContent' => 'space-between'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'shadow' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'color' => true,
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'style' => true,
				'width' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-quantity-input' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quantity-input',
		'title' => 'Input',
		'description' => 'Display the product quantity input',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'ancestor' => array(
			'surecart/product-quantity'
		),
		'keywords' => array(
			'quantity',
			'form',
			'product'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'color' => array(
				'gradients' => false,
				'background' => true,
				'border' => true
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'style' => true,
				'width' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-quantity-input-decrease' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quantity-input-decrease',
		'title' => 'Decrease Quantity',
		'description' => 'Display the product quantity input decrease',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'ancestor' => array(
			'surecart/product-quantity'
		),
		'keywords' => array(
			'quantity',
			'form',
			'product'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'color' => true,
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'style' => true,
				'width' => true
			),
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-quantity-selector',
			'surecart-input-group'
		),
		'style' => array(
			'surecart-quantity-selector',
			'surecart-input-group'
		)
	),
	'product-quantity-input-increase' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quantity-input-increase',
		'title' => 'Increase Quantity',
		'description' => 'Display the product quantity input increase',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'ancestor' => array(
			'surecart/product-quantity'
		),
		'keywords' => array(
			'quantity',
			'form',
			'product'
		),
		'supports' => array(
			'interactivity' => true,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'color' => true,
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'style' => true,
				'width' => true
			),
			'dimensions' => array(
				'minHeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-quantity-selector',
			'surecart-input-group'
		),
		'style' => array(
			'surecart-quantity-selector',
			'surecart-input-group'
		)
	),
	'product-quick-view' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quick-view',
		'title' => 'Product Quick Add',
		'description' => 'Display the product quick add button.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'attributes' => array(
			'alignment' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'inserter' => false,
			'interactivity' => true,
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch'
		),
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/cart',
			'@surecart/product-page',
			'@surecart/product-quick-view',
			'surecart/lightbox'
		),
		'editorStyle' => array(
			'file:./index.css'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-spinner'
		)
	),
	'product-quick-view-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quick-view-button',
		'title' => 'Quick Add Button',
		'description' => 'Display the product quick add to cart button.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			'attributes' => array(
				'quick_view_button_type' => 'both'
			)
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-template'
		),
		'attributes' => array(
			'icon' => array(
				'type' => 'string',
				'default' => 'plus'
			),
			'icon_position' => array(
				'type' => 'string',
				'default' => 'before'
			),
			'label' => array(
				'type' => 'string'
			),
			'quick_view_button_type' => array(
				'type' => 'string',
				'default' => 'both'
			),
			'width' => array(
				'type' => 'number'
			),
			'direct_add_to_cart' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link'
		),
		'styles' => array(
			array(
				'name' => 'default',
				'label' => 'Default',
				'isDefault' => true
			),
			array(
				'name' => 'show-on-hover',
				'label' => 'Show on hover'
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScriptModule' => array(
			'@surecart/checkout',
			'@surecart/product-page',
			'@surecart/product-list',
			'@surecart/product-quick-view'
		),
		'style' => array(
			'surecart-product-quick-view-button',
			'surecart-wp-buttons',
			'surecart-wp-button',
			'wp-block-button'
		)
	),
	'product-quick-view-close' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-quick-view-close',
		'title' => 'Close',
		'description' => 'Display the product quick add close button.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-quick-view'
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-review-add-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-add-button',
		'title' => 'Write a Review Button',
		'description' => 'A button to open the product review form.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			'attributes' => array(
				'button_type' => 'both'
			)
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/product-review-list',
			'surecart/product-review-template',
			'product-review-list-no-reviews',
			'surecart/sticky-purchase'
		),
		'keywords' => array(
			'review',
			'button',
			'write review'
		),
		'attributes' => array(
			'icon' => array(
				'type' => 'string',
				'default' => 'edit-2'
			),
			'icon_position' => array(
				'type' => 'string',
				'default' => 'before'
			),
			'icon_size' => array(
				'type' => 'number',
				'default' => 15
			),
			'label' => array(
				'type' => 'string'
			),
			'button_type' => array(
				'type' => 'string',
				'default' => 'both'
			),
			'width' => array(
				'type' => 'number'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			),
			'__experimentalStyle' => array(
				'variations' => array(
					'outline' => array(
						'border' => array(
							'color' => 'currentColor',
							'width' => '2px',
							'style' => 'solid'
						),
						'color' => array(
							'text' => 'currentColor',
							'gradient' => 'transparent none'
						)
					)
				)
			),
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link'
		),
		'styles' => array(
			array(
				'name' => 'fill',
				'label' => 'Fill',
				'isDefault' => true
			),
			array(
				'name' => 'outline',
				'label' => 'Outline'
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./controller.php',
		'viewScriptModule' => array(
			'@surecart/product-page',
			'@surecart/product-review-form'
		),
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-wp-buttons',
			'surecart-wp-button',
			'wp-block-button',
			'surecart-spinner',
			'file:./style-index.css'
		)
	),
	'product-review-average-rating-stars' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-average-rating-stars',
		'title' => 'Star Rating',
		'description' => 'Display the product average rating stars.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'usesContext' => array(
			'show_value',
			'link_to_reviews'
		),
		'keywords' => array(
			'review',
			'average',
			'rating',
			'stars'
		),
		'attributes' => array(
			'fill_color' => array(
				'type' => 'string',
				'default' => ''
			),
			'size' => array(
				'type' => 'string',
				'default' => '20px'
			),
			'link_to_reviews' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'text' => false,
				'link' => false,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'background' => false,
					'text' => false
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => array(
					'__experimentalDefault' => '2px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-average-rating-value' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-average-rating-value',
		'title' => 'Average Rating',
		'description' => 'Displays the average product rating value.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'keywords' => array(
			'review',
			'average',
			'rating',
			'value'
		),
		'example' => array(
			
		),
		'usesContext' => array(
			'show_value',
			'link_to_reviews'
		),
		'attributes' => array(
			'link_to_reviews' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'styles' => array(
			array(
				'name' => 'none',
				'label' => 'None',
				'isDefault' => true
			),
			array(
				'name' => 'parentheses',
				'label' => 'Parentheses'
			),
			array(
				'name' => 'slash',
				'label' => ' / 5.0'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-breakdown' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-breakdown',
		'title' => 'Review Breakdown',
		'description' => 'Displays a breakdown of product reviews by star rating.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/product-review-list',
			'surecart/product-review-template',
			'surecart/sticky-purchase',
			'surecart/product-review-summary'
		),
		'keywords' => array(
			'review',
			'breakdown',
			'summary'
		),
		'usesContext' => array(
			'postId'
		),
		'attributes' => array(
			'columns' => array(
				'type' => 'number',
				'default' => 1
			),
			'row_gap' => array(
				'type' => 'string'
			),
			'column_gap' => array(
				'type' => 'string'
			),
			'fill_color' => array(
				'type' => 'string'
			),
			'size' => array(
				'type' => 'string'
			),
			'bar_fill_color' => array(
				'type' => 'string'
			),
			'bar_background_color' => array(
				'type' => 'string'
			)
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'left'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-review-confirmation-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-confirmation-template',
		'title' => 'Confirmation',
		'description' => 'Template for the review confirmation content. Shown when editing the confirmation.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'parent' => array(
			'surecart/product-review-form'
		),
		'usesContext' => array(
			'surecart/editingView'
		),
		'supports' => array(
			'inserter' => false,
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'__experimentalLayout' => array(
				'default' => array(
					'type' => 'constrained'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-review-content' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-content',
		'title' => 'Review Content',
		'description' => 'Displays the content of a product review.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'content',
			'details'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'product-review-date' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-date',
		'title' => 'Review Date',
		'description' => 'Displays the date of a product review.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'date'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'attributes' => array(
			'datetime' => array(
				'type' => 'string',
				'role' => 'content'
			),
			'textAlign' => array(
				'type' => 'string'
			),
			'format' => array(
				'type' => 'string'
			)
		),
		'example' => array(
			'viewportWidth' => 350
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'gradients' => true,
				'link' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true,
					'link' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'interactivity' => array(
				'clientNavigation' => true
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'color' => true,
				'width' => true,
				'style' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true,
					'color' => true,
					'width' => true,
					'style' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-review-form' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form',
		'title' => 'Product Review Form',
		'description' => 'Display the product review form.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'attributes' => array(
			'alignment' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			),
			'editingView' => array(
				'type' => 'string',
				'default' => 'form'
			)
		),
		'providesContext' => array(
			'surecart/editingView' => 'editingView'
		),
		'supports' => array(
			'inserter' => false,
			'interactivity' => true,
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScriptModule' => array(
			'@surecart/product-page',
			'@surecart/product-review-form',
			'wp-a11y'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-spinner'
		)
	),
	'product-review-form-close' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-close',
		'title' => 'Review Form Close Button',
		'description' => 'Display the product review form close button.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-form'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'align' => array(
				'left',
				'center',
				'right'
			),
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/product-review-form'
		)
	),
	'product-review-form-content' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-content',
		'title' => 'Review Form Content',
		'description' => 'Provide a content textarea field for product reviews.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'rows' => array(
				'type' => 'number',
				'default' => 4
			),
			'text_align' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control',
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/product-review-form'
		)
	),
	'product-review-form-rating' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-rating',
		'title' => 'Review Form Rating',
		'description' => 'Provide a star rating input for product reviews.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'size' => array(
				'type' => 'string',
				'default' => '20px'
			),
			'fill_color' => array(
				'type' => 'string'
			),
			'text_align' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control',
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/product-review-form'
		)
	),
	'product-review-form-submit-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-submit-button',
		'title' => 'Review Form Submit Button',
		'description' => 'Provide a submit button for the product review form.',
		'version' => '1.0.0',
		'icon' => 'button',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-form'
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'number',
				'default' => 100
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'spacing' => array(
				'__experimentalSkipSerialization' => true,
				'padding' => array(
					'horizontal',
					'vertical'
				),
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'color' => array(
				'__experimentalSkipSerialization' => true,
				'gradients' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'__experimentalSelector' => '.wp-block-button .wp-block-button__link',
			'typography' => array(
				'fontSize' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true
			),
			'reusable' => false,
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalSkipSerialization' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			),
			'__experimentalStyle' => array(
				'variations' => array(
					'outline' => array(
						'border' => array(
							'color' => 'currentColor',
							'width' => '2px',
							'style' => 'solid'
						),
						'color' => array(
							'text' => 'currentColor',
							'gradient' => 'transparent none'
						)
					)
				)
			)
		),
		'styles' => array(
			array(
				'name' => 'fill',
				'label' => 'Fill',
				'isDefault' => true
			),
			array(
				'name' => 'outline',
				'label' => 'Outline'
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'surecart-wp-button'
		),
		'style' => array(
			'surecart-wp-buttons',
			'surecart-wp-button',
			'wp-block-button',
			'surecart-spinner'
		),
		'viewScriptModule' => array(
			'@surecart/product-review-form'
		)
	),
	'product-review-form-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-template',
		'title' => 'Form',
		'description' => 'Template for the review form content. Shown when editing the form.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'parent' => array(
			'surecart/product-review-form'
		),
		'usesContext' => array(
			'surecart/editingView'
		),
		'supports' => array(
			'inserter' => false,
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'__experimentalLayout' => array(
				'default' => array(
					'type' => 'constrained'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-review-form-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-form-title',
		'title' => 'Review Form Title',
		'description' => 'Provide a title input field for product reviews.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-form'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'placeholder' => array(
				'type' => 'string'
			),
			'text_align' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control',
			'file:./style-index.css'
		),
		'viewScriptModule' => array(
			'@surecart/product-review-form'
		)
	),
	'product-review-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list',
		'title' => 'Product Review List',
		'description' => 'Display a list of product reviews.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			'innerBlocks' => array(
				array(
					'name' => 'core/heading',
					'attributes' => array(
						'content' => 'Customer Reviews',
						'level' => 2,
						'className' => 'wp-block-heading',
						'style' => array(
							'spacing' => array(
								'margin' => array(
									'top' => '32px',
									'bottom' => '32px'
								)
							),
							'typography' => array(
								'lineHeight' => '1'
							)
						)
					)
				),
				array(
					'name' => 'surecart/product-reviews',
					'innerBlocks' => array(
						array(
							'name' => 'surecart/product-review-summary',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'margin' => array(
											'bottom' => '15px'
										)
									)
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'core/columns',
									'attributes' => array(
										'style' => array(
											'spacing' => array(
												'blockGap' => array(
													'left' => '20px'
												)
											)
										)
									),
									'innerBlocks' => array(
										array(
											'name' => 'core/column',
											'attributes' => array(
												'verticalAlignment' => 'center',
												'width' => '280px'
											),
											'innerBlocks' => array(
												array(
													'name' => 'core/group',
													'attributes' => array(
														'style' => array(
															'spacing' => array(
																'blockGap' => '14px',
																'padding' => array(
																	'right' => '0px',
																	'left' => '0px'
																),
																'margin' => array(
																	'top' => '0',
																	'bottom' => '0'
																)
															),
															'layout' => array(
																'selfStretch' => 'fill',
																'flexSize' => null
															)
														),
														'layout' => array(
															'type' => 'flex',
															'flexWrap' => 'nowrap',
															'orientation' => 'vertical',
															'verticalAlignment' => 'center'
														)
													),
													'innerBlocks' => array(
														array(
															'name' => 'core/group',
															'attributes' => array(
																'style' => array(
																	'spacing' => array(
																		'blockGap' => '5px',
																		'padding' => array(
																			'right' => '0px',
																			'left' => '0px'
																		),
																		'margin' => array(
																			'top' => '0',
																			'bottom' => '0'
																		)
																	)
																),
																'layout' => array(
																	'type' => 'flex',
																	'flexWrap' => 'nowrap',
																	'verticalAlignment' => 'bottom'
																)
															),
															'innerBlocks' => array(
																array(
																	'name' => 'surecart/product-review-average-rating-value',
																	'attributes' => array(
																		'className' => 'is-style-none',
																		'style' => array(
																			'typography' => array(
																				'fontStyle' => 'normal',
																				'fontWeight' => '600',
																				'lineHeight' => '1',
																				'fontSize' => '24px'
																			)
																		)
																	)
																),
																array(
																	'name' => 'core/paragraph',
																	'attributes' => array(
																		'content' => '/ 5.0',
																		'style' => array(
																			'typography' => array(
																				'lineHeight' => '1.5',
																				'fontSize' => '14px'
																			),
																			'color' => array(
																				'text' => '#4b5563'
																			),
																			'spacing' => array(
																				'padding' => array(
																					'top' => '0',
																					'bottom' => '0',
																					'left' => '0',
																					'right' => '0'
																				),
																				'margin' => array(
																					'top' => '0',
																					'bottom' => '0'
																				)
																			)
																		)
																	)
																)
															)
														),
														array(
															'name' => 'surecart/product-review-average-rating-stars'
														),
														array(
															'name' => 'core/group',
															'attributes' => array(
																'style' => array(
																	'spacing' => array(
																		'blockGap' => '5px',
																		'padding' => array(
																			'right' => '0px',
																			'left' => '0px'
																		),
																		'margin' => array(
																			'top' => '0',
																			'bottom' => '0'
																		)
																	)
																),
																'layout' => array(
																	'type' => 'flex',
																	'flexWrap' => 'nowrap'
																)
															),
															'innerBlocks' => array(
																array(
																	'name' => 'core/paragraph',
																	'attributes' => array(
																		'content' => 'Based on',
																		'style' => array(
																			'typography' => array(
																				'fontSize' => '14px'
																			),
																			'spacing' => array(
																				'padding' => array(
																					'top' => '0',
																					'bottom' => '0',
																					'left' => '0',
																					'right' => '0'
																				),
																				'margin' => array(
																					'top' => '0',
																					'bottom' => '0'
																				)
																			)
																		)
																	)
																),
																array(
																	'name' => 'surecart/product-review-total-rating',
																	'attributes' => array(
																		'link_to_reviews' => false,
																		'className' => 'is-style-default',
																		'style' => array(
																			'spacing' => array(
																				'blockGap' => '4px',
																				'margin' => array(
																					'right' => '0',
																					'left' => '0'
																				),
																				'padding' => array(
																					'right' => '0',
																					'left' => '0'
																				)
																			)
																		)
																	)
																)
															)
														)
													)
												)
											)
										),
										array(
											'name' => 'core/column',
											'attributes' => array(
												'verticalAlignment' => 'center'
											),
											'innerBlocks' => array(
												array(
													'name' => 'surecart/product-review-breakdown',
													'attributes' => array(
														'columns' => 2,
														'className' => 'is-style-default',
														'layout' => array(
															'type' => 'flex',
															'justifyContent' => 'left',
															'orientation' => 'horizontal',
															'verticalAlignment' => 'center'
														)
													)
												)
											)
										)
									)
								)
							)
						),
						array(
							'name' => 'core/group',
							'attributes' => array(
								'metadata' => array(
									'name' => 'Header'
								),
								'layout' => array(
									'type' => 'flex',
									'flexWrap' => 'nowrap',
									'justifyContent' => 'space-between'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'surecart/product-review-list-sidebar-toggle'
								),
								array(
									'name' => 'surecart/product-review-add-button',
									'attributes' => array(
										'width' => 100,
										'className' => 'is-style-fill',
										'style' => array(
											'elements' => array(
												'link' => array(
													'color' => array(
														'text' => 'var:preset|color|white'
													)
												)
											),
											'spacing' => array(
												'blockGap' => '4px'
											)
										),
										'backgroundColor' => 'surecart',
										'textColor' => 'white'
									)
								)
							)
						),
						array(
							'name' => 'core/group',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'padding' => array(
											'right' => '0px',
											'left' => '0px'
										),
										'margin' => array(
											'top' => '0',
											'bottom' => '0'
										)
									)
								),
								'layout' => array(
									'type' => 'flex',
									'flexWrap' => 'nowrap',
									'verticalAlignment' => 'top'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'surecart/product-review-list-sidebar',
									'attributes' => array(
										'style' => array(
											'layout' => array(
												'selfStretch' => 'fixed',
												'flexSize' => '280px'
											),
											'position' => array(
												'type' => 'sticky',
												'top' => '0px'
											),
											'spacing' => array(
												'blockGap' => '30px'
											)
										),
										'layout' => array(
											'type' => 'flex',
											'orientation' => 'vertical'
										)
									),
									'innerBlocks' => array(
										array(
											'name' => 'surecart/product-review-list-filter-tags',
											'attributes' => array(
												'layout' => array(
													'type' => 'flex',
													'orientation' => 'vertical',
													'verticalAlignment' => 'top',
													'flexWrap' => 'nowrap'
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'surecart/product-review-list-filter-tags-label',
													'attributes' => array(
														'style' => array(
															'typography' => array(
																'fontWeight' => '600',
																'fontStyle' => 'normal'
															)
														)
													)
												),
												array(
													'name' => 'surecart/product-review-list-filter-tags-template',
													'attributes' => array(
														'layout' => array(
															'type' => 'flex',
															'orientation' => 'horizontal'
														)
													),
													'innerBlocks' => array(
														array(
															'name' => 'surecart/product-review-list-filter-tag'
														)
													)
												),
												array(
													'name' => 'surecart/product-review-list-filter-tags-clear-all',
													'attributes' => array(
														'style' => array(
															'typography' => array(
																'textDecoration' => 'underline'
															)
														)
													)
												)
											)
										),
										array(
											'name' => 'surecart/product-review-list-filter-checkboxes',
											'attributes' => array(
												'layout' => array(
													'type' => 'flex',
													'orientation' => 'vertical',
													'verticalAlignment' => 'top',
													'flexWrap' => 'nowrap'
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'surecart/product-review-list-filter-checkboxes-label',
													'attributes' => array(
														'style' => array(
															'typography' => array(
																'fontWeight' => '600',
																'fontStyle' => 'normal'
															)
														)
													)
												),
												array(
													'name' => 'surecart/product-review-list-filter-checkboxes-template',
													'attributes' => array(
														'style' => array(
															'spacing' => array(
																'blockGap' => '4px'
															)
														)
													),
													'innerBlocks' => array(
														array(
															'name' => 'surecart/product-review-list-filter-checkbox'
														)
													)
												)
											)
										)
									)
								),
								array(
									'name' => 'core/group',
									'attributes' => array(
										'style' => array(
											'spacing' => array(
												'blockGap' => '0px',
												'padding' => array(
													'right' => '0px',
													'left' => '0px'
												),
												'margin' => array(
													'top' => '0',
													'bottom' => '0'
												)
											),
											'layout' => array(
												'selfStretch' => 'fill',
												'flexSize' => null
											)
										),
										'layout' => array(
											'type' => 'flex',
											'orientation' => 'vertical',
											'justifyContent' => 'stretch'
										)
									),
									'innerBlocks' => array(
										array(
											'name' => 'surecart/product-review-template',
											'attributes' => array(
												'style' => array(
													'spacing' => array(
														'blockGap' => '0px',
														'margin' => array(
															'top' => '0',
															'bottom' => '0'
														),
														'padding' => array(
															'top' => '0',
															'bottom' => '0'
														)
													)
												),
												'layout' => array(
													'type' => 'grid',
													'columnCount' => 1
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'core/group',
													'attributes' => array(
														'style' => array(
															'spacing' => array(
																'blockGap' => '8px',
																'padding' => array(
																	'top' => '24px',
																	'bottom' => '24px',
																	'right' => '0px',
																	'left' => '0px'
																),
																'margin' => array(
																	'top' => '0',
																	'bottom' => '0'
																)
															),
															'border' => array(
																'bottom' => array(
																	'color' => '#e5e7eb',
																	'width' => '1px'
																)
															)
														),
														'layout' => array(
															'type' => 'constrained',
															'contentSize' => '100%'
														)
													),
													'innerBlocks' => array(
														array(
															'name' => 'core/group',
															'attributes' => array(
																'className' => 'sc-review-header-group',
																'style' => array(
																	'spacing' => array(
																		'margin' => array(
																			'top' => '0',
																			'bottom' => '16px'
																		),
																		'padding' => array(
																			'right' => '0px',
																			'left' => '0px'
																		)
																	)
																),
																'layout' => array(
																	'type' => 'flex',
																	'flexWrap' => 'nowrap',
																	'justifyContent' => 'space-between'
																)
															),
															'innerBlocks' => array(
																array(
																	'name' => 'core/group',
																	'attributes' => array(
																		'style' => array(
																			'spacing' => array(
																				'blockGap' => '4px',
																				'padding' => array(
																					'right' => '0px',
																					'left' => '0px'
																				),
																				'margin' => array(
																					'top' => '0',
																					'bottom' => '0'
																				)
																			)
																		),
																		'layout' => array(
																			'type' => 'flex',
																			'flexWrap' => 'nowrap'
																		)
																	),
																	'innerBlocks' => array(
																		array(
																			'name' => 'surecart/product-review-reviewer-name',
																			'attributes' => array(
																				'style' => array(
																					'spacing' => array(
																						'padding' => array(
																							'top' => '0',
																							'bottom' => '0'
																						),
																						'margin' => array(
																							'right' => '8px'
																						)
																					),
																					'typography' => array(
																						'fontStyle' => 'normal',
																						'fontWeight' => '500',
																						'fontSize' => '16px'
																					)
																				)
																			)
																		),
																		array(
																			'name' => 'surecart/product-review-verified-badge',
																			'attributes' => array(
																				'label' => 'Verified Buyer',
																				'style' => array(
																					'typography' => array(
																						'fontStyle' => 'normal',
																						'fontWeight' => '400',
																						'fontSize' => '16px'
																					),
																					'spacing' => array(
																						'blockGap' => '4px'
																					),
																					'layout' => array(
																						'selfStretch' => 'fit',
																						'flexSize' => null
																					)
																				),
																				'layout' => array(
																					'type' => 'flex',
																					'justifyContent' => 'center',
																					'verticalAlignment' => 'center',
																					'orientation' => 'horizontal'
																				)
																			)
																		)
																	)
																),
																array(
																	'name' => 'surecart/product-review-date',
																	'attributes' => array(
																		'datetime' => '2025-10-02T09:37:00.225Z',
																		'format' => 'human-diff',
																		'style' => array(
																			'typography' => array(
																				'fontSize' => '14px'
																			)
																		)
																	)
																)
															)
														),
														array(
															'name' => 'surecart/product-review-rating-stars',
															'attributes' => array(
																'style' => array(
																	'spacing' => array(
																		'margin' => array(
																			'bottom' => '16px'
																		)
																	)
																)
															)
														),
														array(
															'name' => 'surecart/product-review-title',
															'attributes' => array(
																'style' => array(
																	'typography' => array(
																		'fontStyle' => 'normal',
																		'fontWeight' => '700',
																		'fontSize' => '18px'
																	),
																	'spacing' => array(
																		'margin' => array(
																			'bottom' => '8px'
																		)
																	)
																)
															)
														),
														array(
															'name' => 'surecart/product-review-content',
															'attributes' => array(
																'style' => array(
																	'typography' => array(
																		'fontSize' => '16px'
																	)
																)
															)
														)
													)
												)
											)
										),
										array(
											'name' => 'surecart/product-review-pagination',
											'attributes' => array(
												'style' => array(
													'spacing' => array(
														'margin' => array(
															'top' => '30px',
															'bottom' => '30px'
														)
													)
												)
											),
											'innerBlocks' => array(
												array(
													'name' => 'surecart/product-review-pagination-previous'
												),
												array(
													'name' => 'surecart/product-review-pagination-numbers'
												),
												array(
													'name' => 'surecart/product-review-pagination-next'
												)
											)
										)
									)
								)
							)
						)
					)
				),
				array(
					'name' => 'surecart/product-review-list-no-reviews',
					'innerBlocks' => array(
						array(
							'name' => 'core/paragraph',
							'attributes' => array(
								'align' => 'left',
								'content' => 'No reviews yet.'
							)
						),
						array(
							'name' => 'core/group',
							'attributes' => array(
								'style' => array(
									'spacing' => array(
										'padding' => array(
											'right' => '0px',
											'left' => '0px'
										),
										'margin' => array(
											'top' => '0',
											'bottom' => '0'
										)
									)
								),
								'layout' => array(
									'type' => 'flex',
									'flexWrap' => 'nowrap'
								)
							),
							'innerBlocks' => array(
								array(
									'name' => 'surecart/product-review-add-button',
									'attributes' => array(
										'width' => 100,
										'className' => 'is-style-fill',
										'style' => array(
											'elements' => array(
												'link' => array(
													'color' => array(
														'text' => 'var:preset|color|white'
													)
												)
											),
											'spacing' => array(
												'blockGap' => '4px'
											)
										),
										'backgroundColor' => 'surecart',
										'textColor' => 'white'
									)
								)
							)
						)
					)
				)
			)
		),
		'providesContext' => array(
			'query' => 'query',
			'surecart/product-review/limit' => 'limit',
			'surecart/product-review/offset' => 'offset'
		),
		'attributes' => array(
			'query' => array(
				'type' => 'object',
				'default' => array(
					'perPage' => 15,
					'pages' => 0,
					'offset' => 0
				)
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => true,
			'align' => true,
			'currencyConversion' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-tag',
			'surecart-theme-base'
		),
		'viewScriptModule' => array(
			'@surecart/product-review'
		)
	),
	'product-review-list-content' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-content',
		'title' => 'Content',
		'description' => 'Display the product reviews.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => true
			),
			'align' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'link' => true
			),
			'border' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-review-list-filter-checkbox' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-checkbox',
		'title' => 'Checkbox',
		'description' => 'Display the product review filter checkbox.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'usesContext' => array(
			'surecart/checkbox/name'
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-checkboxes-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-radio-checkbox'
		)
	),
	'product-review-list-filter-checkboxes' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-checkboxes',
		'title' => 'Filter Checkboxes',
		'description' => 'Display the product review list filter checkboxes.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-review-list-filter-checkboxes-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-checkboxes-label',
		'title' => 'Label',
		'description' => 'Display the product review list filter checkboxes label.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-checkboxes'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-review-list-filter-checkboxes-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-checkboxes-template',
		'title' => 'Template',
		'description' => 'Display the review filter checkboxes.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-checkboxes'
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'vertical'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'style' => array(
				'spacing' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-review-list-filter-tag' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-tag',
		'title' => 'Tag',
		'description' => 'Display the product review filter tag.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'usesContext' => array(
			'surecart/filterTag/name'
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-tags-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-checkbox'
		),
		'render' => 'file:./view.php'
	),
	'product-review-list-filter-tags' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-tags',
		'title' => 'Applied Filters',
		'description' => 'Display the product review applied filters.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'render' => 'file:./view.php'
	),
	'product-review-list-filter-tags-clear-all' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-tags-clear-all',
		'title' => 'Clear All',
		'description' => 'Display the product review list filter tags clear all link.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-review-list-filter-tags-label' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-tags-label',
		'title' => 'Label',
		'description' => 'Display the product review list filter tags label',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js'
	),
	'product-review-list-filter-tags-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-filter-tags-template',
		'title' => 'Template',
		'description' => 'Display the filter tags.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-filter-tags'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-review-list-no-reviews' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-no-reviews',
		'title' => 'No reviews',
		'category' => 'surecart',
		'description' => 'Contains the block elements used to render content when no reviews are found.',
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'textdomain' => 'surecart',
		'usesContext' => array(
			'query'
		),
		'example' => array(
			'innerBlocks' => array(
				array(
					'name' => 'core/paragraph',
					'attributes' => array(
						'content' => 'No reviews yet, write one now?'
					)
				),
				array(
					'name' => 'surecart/product-review-add-button',
					'attributes' => array(
						
					)
				)
			)
		),
		'supports' => array(
			'align' => true,
			'reusable' => false,
			'html' => false,
			'color' => array(
				'gradients' => true,
				'link' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'interactivity' => array(
				'clientNavigation' => true
			)
		),
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'product-review-list-sidebar' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-sidebar',
		'title' => 'Sidebar',
		'description' => 'Display the product review list sidebar with filters.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'open' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'vertical'
				)
			),
			'position' => array(
				'sticky' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css',
			'surecart-drawer',
			'surecart-block-ui'
		),
		'render' => 'file:./view.php',
		'viewScriptModule' => array(
			'@surecart/sidebar'
		)
	),
	'product-review-list-sidebar-toggle' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-list-sidebar-toggle',
		'title' => 'Sidebar Toggle Button',
		'description' => 'Display the product review list sidebar toggle.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'sliders'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'render' => 'file:./view.php',
		'viewScriptModule' => array(
			'@surecart/sidebar'
		)
	),
	'product-review-pagination' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-pagination',
		'title' => 'Pagination',
		'description' => 'Display the product review pagination.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'usesContext' => array(
			'query',
			'surecart/product-review/limit'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-review-list'
		),
		'allowedBlocks' => array(
			'surecart/product-review-pagination-previous',
			'surecart/product-review-pagination-numbers',
			'surecart/product-review-pagination-next'
		),
		'attributes' => array(
			'paginationArrow' => array(
				'type' => 'string',
				'default' => 'arrow'
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'providesContext' => array(
			'paginationArrow' => 'paginationArrow',
			'showLabel' => 'showLabel'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				),
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'space-between'
				)
			),
			'align' => true
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-pagination-next' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-pagination-next',
		'title' => 'Next',
		'description' => 'Display the product review pagination next.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-review/limit',
			'paginationArrow',
			'showLabel'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-review-pagination-numbers' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-pagination-numbers',
		'title' => 'Numbers',
		'description' => 'Display the product review pagination numbers.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-review/limit',
			'paginationArrow',
			'showLabel'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-review-pagination-previous' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-pagination-previous',
		'title' => 'Previous',
		'description' => 'Display the product review pagination previous.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-pagination'
		),
		'usesContext' => array(
			'query',
			'surecart/product-review/limit',
			'paginationArrow',
			'showLabel'
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'enableContrastChecker' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-review-rating-stars' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-rating-stars',
		'title' => 'Review Rating Stars',
		'description' => 'Displays the rating given by the reviewer for a product review using stars.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'rating',
			'stars'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'attributes' => array(
			'fill_color' => array(
				'type' => 'string',
				'default' => ''
			),
			'size' => array(
				'type' => 'string',
				'default' => '20px'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'text' => false,
				'link' => false,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'background' => false,
					'text' => false
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => array(
					'__experimentalDefault' => '2px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'example' => array(
			
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-reviewer-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-reviewer-name',
		'title' => 'Reviewer Name',
		'description' => 'Displays the name of the reviewer for a product review.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'reviewer',
			'name'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'attributes' => array(
			'format' => array(
				'type' => 'string',
				'default' => 'display_name'
			)
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-review-summary' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-summary',
		'title' => 'Product Review Summary',
		'description' => 'Display the product review summary.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => true,
			'align' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-block-ui',
			'surecart-spinner'
		)
	),
	'product-review-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-template',
		'keywords' => array(
			'product',
			'review',
			'template'
		),
		'title' => 'Template',
		'description' => 'Displays product review template',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list-content'
		),
		'usesContext' => array(
			'query',
			'surecart/product-review/limit'
		),
		'providesContext' => array(
			'reviewId' => 'id',
			'review' => 'review'
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex'
				)
			),
			'align' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '1.25em'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			),
			'color' => array(
				'text' => false,
				'background' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => array(
			'@surecart/product-list',
			'@surecart/product-page'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n',
			'wp-a11y'
		),
		'style' => 'file:./style-index.css',
		'render' => 'file:./view.php'
	),
	'product-review-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-title',
		'title' => 'Review Title',
		'description' => 'Displays the title of a product review.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'title'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-total-rating' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-total-rating',
		'title' => 'Reviews Count',
		'description' => 'Displays the total reviews count for the product.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/product-review-list',
			'surecart/sticky-purchase'
		),
		'usesContext' => array(
			'postId'
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => true
			),
			'show_for_zero_reviews' => array(
				'type' => 'boolean',
				'default' => true
			),
			'link_to_reviews' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'styles' => array(
			array(
				'name' => 'default',
				'label' => 'Default'
			),
			array(
				'name' => 'plus-sign',
				'label' => 'Plus Sign',
				'isDefault' => true
			)
		),
		'example' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-review-verified-badge' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-review-verified-badge',
		'title' => 'Review Verified Badge',
		'description' => 'Displays a verified badge for a product review.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-review-template'
		),
		'keywords' => array(
			'review',
			'verified',
			'badge'
		),
		'usesContext' => array(
			'reviewId',
			'review'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => true
			),
			'label' => array(
				'type' => 'string'
			),
			'icon_size' => array(
				'type' => 'string',
				'default' => '16px'
			),
			'icon_color' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'default' => array(
					'type' => 'flex',
					'justifyContent' => 'center',
					'verticalAlignment' => 'center'
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '4px'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-reviews' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-reviews',
		'title' => 'Review Content',
		'description' => 'Display the product reviews content',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-review-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'layout' => array(
				'allowSwitching' => true
			),
			'align' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'link' => true
			),
			'border' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php'
	),
	'product-sale-badge' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-sale-badge',
		'title' => 'Sale Badge',
		'description' => 'Display a badge if the product is currently on sale',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'tag',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'usesContext' => array(
			'postId'
		),
		'example' => array(
			'attributes' => array(
				'text' => 'Sale'
			)
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true
			),
			'spacing' => array(
				'padding' => true
			),
			'shadow' => true,
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-tag',
			'file:./style-index.css'
		)
	),
	'product-save-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-save-button',
		'title' => 'Save for Later Button',
		'description' => 'Let shoppers save the product for later.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'heart',
		'keywords' => array(
			'wishlist',
			'favorites',
			'saved',
			'heart'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view'
		),
		'usesContext' => array(
			'postId'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => false
			),
			'label' => array(
				'type' => 'string'
			),
			'saved_label' => array(
				'type' => 'string'
			),
			'saved_color' => array(
				'type' => 'string'
			),
			'show_change_list' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'styles' => array(
			array(
				'name' => 'default',
				'label' => 'Default',
				'isDefault' => true
			),
			array(
				'name' => 'overlay',
				'label' => 'Image overlay'
			),
			array(
				'name' => 'button',
				'label' => 'Button'
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-theme-base',
			'surecart-wp-button',
			'surecart-saved-items',
			'file:./style-index.css'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n'
		),
		'viewScriptModule' => array(
			'@surecart/saved-items'
		)
	),
	'product-scratch-price' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-scratch-price',
		'title' => 'Scratch Price',
		'description' => 'Display the product scratch price.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'media-interactive',
		'example' => array(
			
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-template'
		),
		'supports' => array(
			'interactivity' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			),
			'color' => array(
				'text' => true,
				'background' => false,
				'enableContrastChecker' => true
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./view.php'
	),
	'product-selected-price-ad-hoc-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-ad-hoc-amount',
		'title' => 'Selected Price Custom Amount',
		'description' => 'Displays the currently selected price custom amount.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'attributes' => array(
			'label' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string',
				'default' => '100%'
			),
			'lock' => array(
				'type' => 'object',
				'default' => array(
					'move' => false,
					'remove' => true
				)
			)
		),
		'usesContext' => array(
			'surecart/has-ad-hoc-block'
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control',
			'surecart-input-group',
			'file:./style-index.css'
		)
	),
	'product-selected-price-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-amount',
		'title' => 'Selected Price Amount',
		'description' => 'Displays the currently selected price or variant amount.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-selected-price-fees' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-fees',
		'title' => 'Selected Price Fees',
		'description' => 'Displays the currently selected price fees.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-selected-price-interval' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-interval',
		'title' => 'Selected Price Interval',
		'description' => 'Displays the currently selected price interval.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'clock',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-selected-price-scratch-amount' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-scratch-amount',
		'title' => 'Selected Price Scratch Amount',
		'description' => 'Displays the currently selected price scratch amount.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'money-alt',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalTextDecoration' => true
			),
			'currencyConversion' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		)
	),
	'product-selected-price-trial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-price-trial',
		'title' => 'Selected Price Trial',
		'description' => 'Displays the currently selected price trial.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'clock',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-selected-variant' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-variant',
		'title' => 'Selected Variant Display',
		'description' => 'Displays the currently selected variant of a product.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'clock',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'attributes' => array(
			'separator' => array(
				'type' => 'string',
				'default' => ' / '
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => false,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'button' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true
			),
			'currencyConversion' => true
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-selected-variant-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-selected-variant-image',
		'title' => 'Product Selected Variant Image',
		'description' => 'Shows the image for the currently selected product variant.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'icon' => 'tag',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/sticky-purchase',
			'surecart/product-quick-view'
		),
		'example' => array(
			'attributes' => array(
				
			)
		),
		'attributes' => array(
			'sizing' => array(
				'type' => 'string',
				'default' => 'cover'
			),
			'aspectRatio' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			),
			'hide_on_mobile' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'interactivity' => true,
			'anchor' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true
				)
			),
			'color' => array(
				'text' => false,
				'background' => false
			),
			'__experimentalBorder' => array(
				'width' => true,
				'color' => true,
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'width' => true,
					'color' => true,
					'radius' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'product-template' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-template',
		'keywords' => array(
			'product',
			'list'
		),
		'title' => 'Template',
		'description' => 'Displays products list.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			'attributes' => array(
				
			)
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'usesContext' => array(
			'query',
			'surecart/product-list/limit',
			'surecart/product-list/type',
			'surecart/product-list/ids'
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'layout' => array(
				'__experimentalDefault' => 'grid',
				'__experimentalDefaultControls' => array(
					'layout' => true
				)
			),
			'align' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => array(
					'__experimentalDefault' => '1.25em'
				),
				'__experimentalDefaultControls' => array(
					'padding' => true,
					'margin' => true,
					'blockGap' => true
				)
			),
			'color' => array(
				'text' => false,
				'background' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'viewScriptModule' => array(
			'@surecart/product-list',
			'@surecart/product-page'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n',
			'wp-a11y'
		),
		'style' => 'file:./style-index.css',
		'render' => 'file:./view.php'
	),
	'product-template-container' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-template-container',
		'title' => 'Product Template Container',
		'description' => 'Display the Product Template Container.',
		'version' => '1.0.0',
		'category' => 'surecart-product-list',
		'example' => array(
			
		),
		'ancestor' => array(
			'surecart/product-list'
		),
		'attributes' => array(
			
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'align' => array(
				'wide',
				'full'
			),
			'layout' => array(
				'allowSizingOnChildren' => true
			),
			'position' => array(
				'sticky' => true
			),
			'dimensions' => array(
				'minHeight' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'blockGap' => true,
				'default' => array(
					'blockGap' => '0'
				)
			),
			'style' => array(
				'spacing' => array(
					'blockGap' => '0'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./style-index.css'
		),
		'render' => 'file:./view.php'
	),
	'product-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-title',
		'title' => 'Product Title',
		'description' => 'Display the product title.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'example' => array(
			
		),
		'usesContext' => array(
			'postId'
		),
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-template',
			'surecart/product-quick-view',
			'surecart/sticky-purchase'
		),
		'attributes' => array(
			'level' => array(
				'type' => 'number',
				'default' => 1
			),
			'isLink' => array(
				'type' => 'boolean',
				'default' => false
			),
			'rel' => array(
				'type' => 'string',
				'attribute' => 'rel',
				'default' => ''
			),
			'linkTarget' => array(
				'type' => 'string',
				'default' => '_self'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'color' => array(
				'gradients' => true,
				'link' => false,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'textAlign' => true,
				'__experimentalFontFamily' => true,
				'__experimentalFontWeight' => true,
				'__experimentalFontStyle' => true,
				'__experimentalTextTransform' => true,
				'__experimentalTextDecoration' => true,
				'__experimentalLetterSpacing' => true,
				'__experimentalDefaultControls' => array(
					'fontSize' => true,
					'fontAppearance' => true,
					'textTransform' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'style' => 'file:./style-index.css',
		'editorScript' => 'file:./index.js'
	),
	'product-variant-pill' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-variant-pill',
		'title' => 'Pill',
		'description' => 'Displays a product variant choice as a pill.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-variant-pills'
		),
		'usesContext' => array(
			'surecart/productVariantPill/name',
			'surecart/productVariantPill/selected'
		),
		'attributes' => array(
			'highlight_text' => array(
				'type' => 'string'
			),
			'highlight_background' => array(
				'type' => 'string'
			),
			'highlight_border' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'inserter' => false,
			'anchor' => true,
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'width' => true
				)
			),
			'color' => array(
				'gradients' => true,
				'text' => true,
				'background' => true,
				'__experimentalDefaultControls' => array(
					'text' => true,
					'background' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'shadow' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			)
		),
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'surecart-pill',
			'file:./style-index.css'
		)
	),
	'product-variant-pills' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/product-variant-pills',
		'title' => 'Variants Selector',
		'description' => 'Display product variants as pills selector.',
		'version' => '1.0.0',
		'category' => 'surecart-product-page',
		'ancestor' => array(
			'surecart/product-page',
			'surecart/product-quick-view',
			'surecart/product-template',
			'surecart/sticky-purchase',
			'surecart/upsell'
		),
		'usesContext' => array(
			'postId'
		),
		'attributes' => array(
			'show_label' => array(
				'type' => 'boolean',
				'default' => true
			),
			'max_visible_options' => array(
				'type' => 'number',
				'default' => 0
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'anchor' => true,
			'spacing' => array(
				'padding' => true,
				'margin' => array(
					'top',
					'bottom'
				)
			),
			'color' => array(
				'text' => true,
				'background' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			)
		),
		'textdomain' => 'surecart',
		'viewScriptModule' => array(
			'@surecart/product-page'
		),
		'editorScript' => 'file:./index.js',
		'render' => 'file:./view.php',
		'style' => array(
			'file:./style-index.css',
			'surecart-label',
			'surecart-product-variants'
		)
	),
	'saved-items-dialog' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/saved-items-dialog',
		'title' => 'Save to List Dialog',
		'description' => 'The dialog shoppers use to choose which saved-item lists a product is in.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'icon' => 'heart',
		'keywords' => array(
			'saved',
			'wishlist',
			'list'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'width' => array(
				'type' => 'string'
			),
			'done_text' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'inserter' => false,
			'html' => false,
			'multiple' => false,
			'interactivity' => true,
			'color' => array(
				'background' => true,
				'text' => true,
				'__experimentalDefaultControls' => array(
					'background' => true,
					'text' => true
				)
			),
			'spacing' => array(
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			),
			'__experimentalBorder' => array(
				'radius' => true,
				'__experimentalDefaultControls' => array(
					'radius' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-dialog',
			'surecart-form-control',
			'wp-block-button',
			'surecart-wp-button'
		),
		'editorStyle' => array(
			'surecart-saved-items'
		)
	),
	'saved-items-dialog-product-name' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/saved-items-dialog-product-name',
		'title' => 'Save to List Product Name',
		'description' => 'The name of the product being saved.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'icon' => 'products',
		'ancestor' => array(
			'surecart/saved-items-dialog'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'interactivity' => true,
			'color' => array(
				'text' => true,
				'background' => false
			),
			'spacing' => array(
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js'
	),
	'saved-items-icon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/saved-items-icon',
		'title' => 'Saved Items Icon',
		'description' => 'A heart icon linking to the shopper\'s saved items, with an optional count.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'icon' => 'heart',
		'keywords' => array(
			'wishlist',
			'favorites',
			'saved',
			'heart',
			'header'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'show_count' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'interactivity' => true,
			'html' => false,
			'spacing' => array(
				'padding' => true,
				'margin' => true
			),
			'color' => array(
				'text' => true,
				'background' => false
			),
			'typography' => array(
				'fontSize' => true
			)
		),
		'render' => 'file:./view.php',
		'textdomain' => 'surecart',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-theme-base',
			'file:./style-index.css'
		),
		'viewScript' => array(
			'wp-url',
			'wp-api-fetch',
			'wp-i18n'
		),
		'viewScriptModule' => array(
			'@surecart/saved-items'
		)
	),
	'saved-items-list-picker' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/saved-items-list-picker',
		'title' => 'Save to List Choices',
		'description' => 'A checkbox for each of the shopper\'s lists, with how many products each holds.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/saved-items-dialog'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'interactivity' => true,
			'color' => array(
				'text' => true,
				'background' => false
			),
			'spacing' => array(
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-theme-base',
			'surecart-radio-checkbox'
		)
	),
	'saved-items-new-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/saved-items-new-list',
		'title' => 'Save to List New List',
		'description' => 'Lets shoppers create a list and save the product to it. Hidden once they reach the list limit.',
		'version' => '1.0.0',
		'category' => 'surecart',
		'ancestor' => array(
			'surecart/saved-items-dialog'
		),
		'example' => array(
			
		),
		'attributes' => array(
			'placeholder' => array(
				'type' => 'string'
			),
			'button_text' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'interactivity' => true,
			'spacing' => array(
				'margin' => true
			),
			'typography' => array(
				'fontSize' => true
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'style' => array(
			'surecart-form-control'
		)
	),
	'sticky-purchase' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'surecart/sticky-purchase',
		'title' => 'Sticky purchase',
		'description' => 'Display the sticky purchase.',
		'version' => '1.0.0',
		'example' => array(
			
		),
		'category' => 'surecart-cart',
		'usesContext' => array(
			'showStickyPurchaseButton'
		),
		'attributes' => array(
			'width' => array(
				'type' => 'string',
				'default' => '600px'
			)
		),
		'supports' => array(
			'interactivity' => true,
			'multiple' => false,
			'currencyConversion' => true,
			'layout' => array(
				'allowSwitching' => false,
				'allowInheriting' => false,
				'allowSizingOnChildren' => true,
				'default' => array(
					'type' => 'flex',
					'orientation' => 'horizontal',
					'verticalAlignment' => 'top',
					'flexWrap' => 'nowrap',
					'wideSize' => 'full'
				)
			),
			'anchor' => true,
			'color' => array(
				'gradients' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontWeight' => true
			),
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true,
				'__experimentalDefaultControls' => array(
					'color' => true,
					'radius' => true,
					'style' => true,
					'width' => true
				)
			)
		),
		'textdomain' => 'surecart',
		'render' => 'file:./view.php',
		'editorScript' => 'file:./index.js',
		'viewScriptModule' => array(
			'@surecart/product-page',
			'@surecart/sticky-purchase'
		),
		'editorStyle' => array(
			'file:./index.css'
		),
		'style' => array(
			'file:./style-index.css',
			'surecart-block-ui',
			'surecart-spinner'
		)
	)
);
