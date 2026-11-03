<?php
/**
 * Last-name input: `actions.setLastName` (debounced) on input, `actions.flushLastName` on blur.
 */

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Last Name', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Your last name', 'surecart' );
$help        = $attributes['help'] ?? '';
$required    = ! empty( $attributes['required'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size        = $attributes['size'] ?? 'medium';

// Prefill from the logged-in user's profile — init's DOM-attr fallback path
// restores this into the buffer if hydration wipes the value.
$current_user  = wp_get_current_user();
$initial_value = ! empty( $current_user->ID ) ? $current_user->last_name : '';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--last-name is-size-' . esc_attr( $size ) )
);
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<label for="sc-checkout-last-name" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php if ( $required ) : ?>
			<span class="sc-form-label__required" aria-hidden="true">*</span>
		<?php endif; ?>
	</label>
	<input
		id="sc-checkout-last-name"
		type="text"
		name="last_name"
		class="sc-form-control"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		autocomplete="family-name"
		value="<?php echo esc_attr( $initial_value ); ?>"
		<?php echo $required ? 'required' : ''; ?>
		data-wp-bind--value="state.customerLastName"
		data-wp-bind--aria-invalid="state.hasLastNameError"
		aria-describedby="sc-checkout-last-name-error"
		data-wp-on--keyup="actions.setLastName"
		data-wp-on--change="actions.setLastName"
		data-wp-on--blur="actions.flushLastName"
	/>
	<?php if ( $help ) : ?>
		<p class="sc-form-help" data-wp-bind--hidden="state.hasLastNameError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-last-name-error" class="sc-form-error" data-wp-bind--hidden="!state.hasLastNameError" data-wp-text="state.errorFieldErrors.last_name" hidden></p>
</div>
