<?php
/** Shipping choices — pure HTML radio list. */

$label              = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Shipping', 'surecart' );
$show_label         = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$show_description   = ! isset( $attributes['showDescription'] ) || ! empty( $attributes['showDescription'] );
$free_label         = ! empty( $attributes['freeLabel'] ) ? $attributes['freeLabel'] : __( 'Free', 'surecart' );
$empty_country_text = ! empty( $attributes['emptyCountryText'] ) ? $attributes['emptyCountryText'] : __( 'To check available shipping choices, please provide your shipping country in the address section.', 'surecart' );
$empty_choices_text = ! empty( $attributes['emptyChoicesText'] ) ? $attributes['emptyChoicesText'] : __( 'Sorry, we are not able to ship to your address.', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-shipping-choices' )
);
$label_id      = wp_unique_id( 'sc-checkout-shipping-choices-label-' );
$error_id      = wp_unique_id( 'sc-checkout-shipping-choices-error-' );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	data-wp-bind--hidden="!state.shippingChoiceRequired"
	hidden
>
	<?php if ( $show_label ) : ?>
		<div class="sc-form-label" id="<?php echo esc_attr( $label_id ); ?>"><?php echo esc_html( $label ); ?></div>
	<?php endif; ?>

	<div
		class="sc-checkout-shipping-choices__empty"
		data-wp-bind--hidden="!state.shippingChoicesEmptyCountry"
	>
		<?php echo esc_html( $empty_country_text ); ?>
	</div>

	<div
		class="sc-checkout-shipping-choices__empty"
		data-wp-bind--hidden="!state.shippingChoicesEmptyMethods"
	>
		<?php echo esc_html( $empty_choices_text ); ?>
	</div>

	<div
		class="sc-checkout-shipping-choices__list"
		role="radiogroup"
		<?php if ( $show_label ) : ?>
			aria-labelledby="<?php echo esc_attr( $label_id ); ?>"
		<?php else : ?>
			aria-label="<?php echo esc_attr( $label ); ?>"
		<?php endif; ?>
		aria-describedby="<?php echo esc_attr( $error_id ); ?>"
		data-wp-bind--aria-invalid="state.hasShippingChoiceError"
		data-wp-bind--hidden="state.shippingChoicesEmpty"
	>
		<template
			data-wp-each--choice="state.shippingChoicesList"
			data-wp-each-key="context.choice.id"
		>
			<?php
			// Disabled while an address flush is in flight: the returned checkout can carry
			// different rates, so a click would pick a stale choice.
			?>
			<label
				class="sc-shipping-choice sc-form-check"
				data-wp-class--sc-shipping-choice--disabled="state.addressSyncing"
			>
				<input
					type="radio"
					name="selected_shipping_choice"
					class="sc-check-input sc-shipping-choice__radio"
					data-wp-bind--value="context.choice.id"
					data-wp-bind--checked="state.isShippingChoiceSelected"
					data-wp-bind--disabled="state.addressSyncing"
					data-wp-bind--aria-busy="state.addressSyncing"
					data-wp-on--change="actions.setShippingChoice"
				/>
				<div class="sc-shipping-choice__body">
					<div class="sc-shipping-choice__name" data-wp-text="state.shippingChoiceName"></div>
					<?php if ( $show_description ) : ?>
						<div
							class="sc-shipping-choice__description"
							data-wp-bind--hidden="!context.choice.shipping_method.description"
							data-wp-text="context.choice.shipping_method.description"
						></div>
					<?php endif; ?>
				</div>
				<div class="sc-shipping-choice__price">
					<span data-wp-bind--hidden="!context.choice.display_amount" data-wp-text="context.choice.display_amount"></span>
					<span data-wp-bind--hidden="context.choice.display_amount"><?php echo esc_html( $free_label ); ?></span>
				</div>
			</label>
		</template>
	</div>
	<p id="<?php echo esc_attr( $error_id ); ?>" class="sc-form-error" data-wp-bind--hidden="!state.hasShippingChoiceError" data-wp-text="state.errorFieldErrors.selected_shipping_choice" hidden></p>
</div>
