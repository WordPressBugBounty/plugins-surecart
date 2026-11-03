<?php
/**
 * Phone input — pure HTML wired to `surecart/checkout-form::actions.setPhone` (debounced) and
 * `actions.flushPhone` on blur.
 */

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Phone', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Your phone number', 'surecart' );
$help        = $attributes['help'] ?? '';
$required    = ! empty( $attributes['required'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$is_auto         = 'auto' === ( $attributes['visibility'] ?? 'auto' );
$static_required = ! $is_auto && $required;
$size            = $attributes['size'] ?? 'medium';

// Prefill from logged-in user meta if present — common WooCommerce key first,
// then a generic `phone` fallback. Empty string when no user / no meta.
$initial_phone = '';
$current_user  = wp_get_current_user();
if ( $current_user && $current_user->ID ) {
	$billing_phone = get_user_meta( $current_user->ID, 'billing_phone', true );
	if ( ! empty( $billing_phone ) ) {
		$initial_phone = $billing_phone;
	} else {
		$generic_phone = get_user_meta( $current_user->ID, 'phone', true );
		if ( ! empty( $generic_phone ) ) {
			$initial_phone = $generic_phone;
		}
	}
}

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--phone is-size-' . esc_attr( $size ) )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php if ( $is_auto ) : ?>
		data-wp-bind--hidden="!state.phoneRequired"
		hidden
	<?php endif; ?>
>
	<?php // Hidden, not omitted: the placeholder alone is not a reliable name. ?>
	<label for="sc-checkout-phone" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php // Auto mode only shows the field when required. ?>
		<?php if ( $is_auto || $required ) : ?>
			<span class="sc-form-label__required" aria-hidden="true">*</span>
		<?php else : ?>
			<span class="sc-form-label__required" aria-hidden="true" data-wp-bind--hidden="!state.phoneRequired" hidden>*</span>
		<?php endif; ?>
	</label>
	<input
		id="sc-checkout-phone"
		type="tel"
		name="phone"
		class="sc-form-control"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		autocomplete="tel"
		inputmode="tel"
		pattern="<?php echo esc_attr( apply_filters( 'surecart/sc-phone-input/pattern', '[-s#0-9_+/().]*' ) ); ?>"
		value="<?php echo esc_attr( $initial_phone ); ?>"
		data-wp-bind--value="state.customerPhone"
		<?php if ( $static_required ) : ?>
			required
		<?php else : ?>
			data-wp-bind--required="state.phoneRequired"
		<?php endif; ?>
		data-wp-bind--aria-invalid="state.hasPhoneError"
		aria-describedby="sc-checkout-phone-error<?php echo $help ? ' sc-checkout-phone-help' : ''; ?>"
		data-wp-on--keyup="actions.setPhone"
		data-wp-on--change="actions.setPhone"
		data-wp-on--blur="actions.flushPhone"
	/>
	<?php if ( $help ) : ?>
		<p id="sc-checkout-phone-help" class="sc-form-help" data-wp-bind--hidden="state.hasPhoneError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-phone-error" class="sc-form-error" data-wp-bind--hidden="!state.hasPhoneError" data-wp-text="state.errorFieldErrors.phone" hidden></p>
</div>
