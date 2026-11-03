<?php
/**
 * Sole owner of the bump, trial and shipping (+ fees) rows; the subtotal block must not render
 * them too or they double up.
 */

// No block.json defaults on these — a default would be baked in pre-render and
// this `__()` fallback would never run, shipping untranslatable English labels.
$shipping_label = ! empty( $attributes['shippingLabel'] ) ? $attributes['shippingLabel'] : __( 'Shipping', 'surecart' );
$trial_label    = ! empty( $attributes['trialLabel'] ) ? $attributes['trialLabel'] : __( 'Trial', 'surecart' );
$bump_label     = ! empty( $attributes['bumpLabel'] ) ? $attributes['bumpLabel'] : __( 'Bundle Discount', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-summary-extras' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
>
	<div class="sc-line-item" data-wp-bind--hidden="state.hideBump">
		<div class="sc-line-item__item">
			<div class="sc-line-item__text">
				<div class="sc-line-item__description"><?php echo esc_html( $bump_label ); ?></div>
			</div>
			<div class="sc-line-item__end">
				<span class="sc-line-item__price" data-wp-text="state.checkout.bump_display_amount"></span>
			</div>
		</div>
	</div>

	<div class="sc-line-item" data-wp-bind--hidden="state.hideTrial">
		<div class="sc-line-item__item">
			<div class="sc-line-item__text">
				<div class="sc-line-item__description"><?php echo esc_html( $trial_label ); ?></div>
			</div>
			<div class="sc-line-item__end">
				<span class="sc-line-item__price" data-wp-text="state.checkout.trial_display_amount"></span>
			</div>
		</div>
	</div>

	<div class="sc-line-item" data-wp-bind--hidden="state.hideShipping">
		<div class="sc-line-item__item">
			<div class="sc-line-item__text">
				<div class="sc-line-item__description"><?php echo esc_html( $shipping_label ); ?></div>
			</div>
			<div class="sc-line-item__end">
				<span class="sc-line-item__price" data-wp-text="state.checkout.shipping_display_amount"></span>
			</div>
		</div>
	</div>

	<template
		data-wp-each--shipping_fee="state.shippingFeesData"
		data-wp-each-key="context.shipping_fee.id"
	>
		<div class="sc-line-item sc-checkout-summary-extras__shipping-fee">
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__description" data-wp-text="context.shipping_fee.description"></div>
				</div>
				<div class="sc-line-item__end">
					<span class="sc-line-item__price" data-wp-text="context.shipping_fee.display_amount"></span>
				</div>
			</div>
		</div>
	</template>
</div>
