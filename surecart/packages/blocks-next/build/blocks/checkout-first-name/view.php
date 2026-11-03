<?php
/**
 * First-name input: `actions.setFirstName` (debounced) on input, `actions.flushFirstName` on blur.
 */

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'First Name', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Your first name', 'surecart' );
$help        = $attributes['help'] ?? '';
$required    = ! empty( $attributes['required'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size        = $attributes['size'] ?? 'medium';

// Prefill from the logged-in user's profile — init's DOM-attr fallback path
// restores this into the buffer if hydration wipes the value.
$current_user  = wp_get_current_user();
$initial_value = ! empty( $current_user->ID ) ? $current_user->first_name : '';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--first-name is-size-' . esc_attr( $size ) )
);
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<label for="sc-checkout-first-name" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php if ( $required ) : ?>
			<span class="sc-form-label__required" aria-hidden="true">*</span>
		<?php endif; ?>
	</label>
	<input
		id="sc-checkout-first-name"
		type="text"
		name="first_name"
		class="sc-form-control"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		autocomplete="given-name"
		value="<?php echo esc_attr( $initial_value ); ?>"
		<?php echo $required ? 'required' : ''; ?>
		data-wp-bind--value="state.customerFirstName"
		data-wp-bind--aria-invalid="state.hasFirstNameError"
		aria-describedby="sc-checkout-first-name-error"
		data-wp-on--keyup="actions.setFirstName"
		data-wp-on--change="actions.setFirstName"
		data-wp-on--blur="actions.flushFirstName"
	/>
	<?php if ( $help ) : ?>
		<p class="sc-form-help" data-wp-bind--hidden="state.hasFirstNameError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-first-name-error" class="sc-form-error" data-wp-bind--hidden="!state.hasFirstNameError" data-wp-text="state.errorFieldErrors.first_name" hidden></p>
</div>
