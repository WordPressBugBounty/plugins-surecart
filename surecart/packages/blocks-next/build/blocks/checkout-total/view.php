<?php
$split_subtotal_text = ! empty( $attributes['firstPaymentTotalText'] ) ? $attributes['firstPaymentTotalText'] : __( 'Subtotal', 'surecart' );
$split_trial_text    = ! empty( $attributes['freeTrialText'] ) ? $attributes['freeTrialText'] : __( 'Trial', 'surecart' );
$split_due_text      = ! empty( $attributes['dueAmountText'] ) ? $attributes['dueAmountText'] : __( 'Total Due', 'surecart' );
$split_subs_text     = ! empty( $attributes['subscriptionText'] ) ? $attributes['subscriptionText'] : __( 'Total Due Today', 'surecart' );
$payment_total_text  = __( 'Payment Total', 'surecart' );

$size = sanitize_html_class( $attributes['size'] ?? 'large' );

$wrapper_attrs = get_block_wrapper_attributes(
	array(
		'class' => 'sc-checkout-total is-size-' . $size,
	)
);
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>

	<?php /* Simple path: total === amount_due. */ ?>
	<div
		class="sc-line-item sc-checkout-total__row sc-checkout-total__row--single"
		data-wp-bind--hidden="state.totalIsSplit"
	>
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

	<?php /* SPLIT path — total !== amount_due. INLINE. */ ?>
	<div
		class="sc-checkout-total__group"
		data-wp-bind--hidden="!state.totalIsSplit"
	>
		<?php /* Row 1: subtotal-style ("Subtotal" + total_display_amount). */ ?>
		<div class="sc-line-item sc-checkout-total__row sc-checkout-total__row--split-subtotal">
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__description"><?php echo esc_html( $split_subtotal_text ); ?></div>
				</div>
				<div class="sc-line-item__end">
					<span class="sc-line-item__price" data-wp-text="state.checkout.total_display_amount"></span>
				</div>
			</div>
		</div>

		<?php /* Row 2: trial credit (only when trial_amount > 0). */ ?>
		<div
			class="sc-line-item sc-checkout-total__row sc-checkout-total__row--split-trial"
			data-wp-bind--hidden="!state.hasTrialAmount"
		>
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__description"><?php echo esc_html( $split_trial_text ); ?></div>
				</div>
				<div class="sc-line-item__end">
					<span class="sc-line-item__price" data-wp-text="state.checkout.trial_display_amount"></span>
				</div>
			</div>
		</div>

		<?php /* Amount due: "Total Due Today" for subscriptions, else "Total Due". */ ?>
		<div
			class="sc-line-item sc-checkout-total__row sc-checkout-total__row--split-due"
		>
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__title">
						<span data-wp-bind--hidden="!state.totalHasSubscription"><?php echo esc_html( $split_subs_text ); ?></span>
						<span data-wp-bind--hidden="state.totalHasSubscription"><?php echo esc_html( $split_due_text ); ?></span>
					</div>
				</div>
				<div class="sc-line-item__end">
					<span class="sc-line-item__price" data-wp-text="state.checkout.amount_due_display_amount"></span>
				</div>
			</div>
		</div>
	</div>

	<?php /* INLINE. */ ?>
	<div
		class="sc-checkout-total__conversion"
		data-wp-bind--hidden="!state.showConversion"
	>
		<hr class="sc-checkout-total__divider" aria-hidden="true" />
		<div
			class="sc-line-item sc-checkout-total__row sc-checkout-total__row--payment-total"
		>
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div class="sc-line-item__title"><?php echo esc_html( $payment_total_text ); ?></div>
				</div>
				<div class="sc-line-item__end">
					<span
						class="sc-checkout-total__currency-label"
						data-wp-bind--hidden="!state.conversionCurrencyLabel"
						data-wp-text="state.conversionCurrencyLabel"
					></span>
					<span class="sc-line-item__price" data-wp-text="state.checkout.amount_due_default_currency_display_amount"></span>
				</div>
			</div>
		</div>
		<div class="sc-line-item sc-checkout-total__row sc-checkout-total__row--conversion-note">
			<div class="sc-line-item__item">
				<div class="sc-line-item__text">
					<div
						class="sc-line-item__description sc-checkout-total__conversion-description"
						data-wp-text="state.conversionDescription"
					></div>
				</div>
			</div>
		</div>
	</div>
</div>
