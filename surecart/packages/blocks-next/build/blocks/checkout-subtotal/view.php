<?php
$installments_label    = ! empty( $attributes['totalPaymentsText'] ) ? $attributes['totalPaymentsText'] : __( 'Total Installments', 'surecart' );
$installments_discount = __( '(before discounts)', 'surecart' );
$discounts_label       = __( 'Discounts', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-subtotal' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
>
	<?php /* Installment plan row. */ ?>
	<div
		class="sc-line-item sc-checkout-subtotal__installments"
		data-wp-bind--hidden="!state.hasInstallmentPlan"
	>
		<div class="sc-line-item__item">
			<div class="sc-line-item__text">
				<div class="sc-line-item__description">
					<?php echo esc_html( $installments_label ); ?><span data-wp-bind--hidden="!state.installmentHasDiscount"> <?php echo esc_html( $installments_discount ); ?></span>
				</div>
			</div>
			<div class="sc-line-item__end">
				<span class="sc-line-item__price" data-wp-text="state.checkout.full_display_amount"></span>
			</div>
		</div>
	</div>

	<?php
	/* Main subtotal row — whenever a checkout with a currency exists. */
	?>
	<div
		class="sc-line-item sc-checkout-subtotal__row"
		data-wp-bind--hidden="!state.shouldShowSubtotal"
	>
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

	<?php /* Per-fee rows. */ ?>
	<template
		data-wp-each--fee="state.checkoutFees"
		data-wp-each-key="context.fee.id"
	>
		<div class="sc-line-item sc-checkout-subtotal__fee">
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__description" data-wp-text="context.fee.description"></div>
				</div>
				<div class="sc-line-item__end">
					<span class="sc-line-item__price" data-wp-text="context.fee.display_amount"></span>
				</div>
			</div>
		</div>
	</template>

	<?php /* Auto-applied promotion discounts row. */ ?>
	<div
		class="sc-line-item sc-checkout-subtotal__auto-discount"
		data-wp-bind--hidden="!state.hasAutoDiscount"
	>
		<div class="sc-line-item__item">
			<div class="sc-line-item__text">
				<div class="sc-line-item__description"><?php echo esc_html( $discounts_label ); ?></div>
			</div>
			<div class="sc-line-item__end">
				<span class="sc-line-item__price" data-wp-text="state.autoDiscountsDisplay"></span>
			</div>
		</div>
	</div>
</div>
