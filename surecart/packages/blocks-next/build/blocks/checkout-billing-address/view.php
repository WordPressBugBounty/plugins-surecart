<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	data-wp-bind--hidden="state.billingAddressHidden"
	data-sc-address-kind="billing"
	<?php if ( $show_label ) : ?>
		role="group"
		aria-labelledby="<?php echo esc_attr( $legend_id ); ?>"
	<?php endif; ?>
	<?php if ( $default_country ) : ?>
		data-default-country="<?php echo esc_attr( $default_country ); ?>"
	<?php endif; ?>
	<?php if ( $show_line_2 ) : ?>
		data-show-line-2="1"
	<?php endif; ?>
	hidden
>
	<?php if ( $show_label ) : ?>
		<div class="sc-form-label sc-checkout-billing-address__legend" id="<?php echo esc_attr( $legend_id ); ?>">
			<span><?php echo esc_html( $label ); ?></span><?php // Reactive required marker (asterisk + SR-only "required"); hides with the same-as-shipping toggle. ?><span
				class="sc-checkout-billing-address__legend-required"
				aria-hidden="true"
				data-wp-bind--hidden="!state.billingAddressInputsRequired"
				hidden
			> *</span><span
				class="sc-screen-reader-text"
				data-wp-bind--hidden="!state.billingAddressInputsRequired"
				hidden
			><?php esc_html_e( 'required', 'surecart' ); ?></span>
		</div>
	<?php endif; ?>

	<div class="sc-checkout-billing-address__toggle" data-wp-bind--hidden="!state.billingShowSameAsShippingToggle">
		<label class="sc-checkout-billing-address__toggle-label">
			<input
				type="checkbox"
				data-wp-bind--checked="state.billingMatchesShipping"
				data-wp-on--change="actions.toggleBillingMatchesShipping"
			/>
			<span><?php echo esc_html( $toggle_label ); ?></span>
		</label>
	</div>

	<div data-wp-bind--hidden="state.billingFormHidden">
		<?php
		// Skeleton until init resolves the checkout and the country's address format, so the
		// fields never flash compact-then-full.
		?>
		<div class="sc-address-fields-skeleton" data-wp-bind--hidden="state.addressFieldsReady" aria-hidden="true">
			<div class="sc-address-fields-skeleton__line"></div>
			<div class="sc-address-fields-skeleton__line"></div>
			<div class="sc-address-fields-skeleton__line"></div>
			<div class="sc-address-fields-skeleton__line"></div>
		</div>

		<div class="sc-checkout-billing-address__control" data-wp-bind--hidden="!state.addressFieldsReady" hidden>
			<?php echo \SureCart::addressBlock()->render( 'billing', $block_requirements ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</div>
