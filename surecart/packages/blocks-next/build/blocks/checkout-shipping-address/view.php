<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	data-wp-bind--hidden="state.shippingAddressHidden"
	data-sc-address-kind="shipping"
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
		<div class="sc-form-label sc-checkout-shipping-address__legend" id="<?php echo esc_attr( $legend_id ); ?>">
			<span
				<?php if ( $label_is_default ) : ?>
					data-wp-text="state.shippingLegendText"
				<?php endif; ?>
			><?php echo esc_html( $label ); ?></span><?php // Reactive required marker (asterisk + SR-only "required"). ?><span
				class="sc-checkout-shipping-address__legend-required"
				aria-hidden="true"
				data-wp-bind--hidden="!state.shippingAddressInputsRequired"
				hidden
			> *</span><span
				class="sc-screen-reader-text"
				data-wp-bind--hidden="!state.shippingAddressInputsRequired"
				hidden
			><?php esc_html_e( 'required', 'surecart' ); ?></span>
		</div>
	<?php endif; ?>

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

	<div class="sc-checkout-shipping-address__control" data-wp-bind--hidden="!state.addressFieldsReady" hidden>
		<?php echo \SureCart::addressBlock()->render( 'shipping', $block_requirements ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
</div>
