<?php
/**
 * Merchant text field: `actions.setCustomField` (debounced) on input, `actions.flushCustomField`
 * on blur.
 */

use SureCart\Support\Blocks\CheckoutCustomFieldService;

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Text Field', 'surecart' );
$placeholder = $attributes['placeholder'] ?? '';
$help        = $attributes['help'] ?? '';
$required    = ! empty( $attributes['required'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size        = $attributes['size'] ?? 'medium';

// One id for the input, the label's `for`, the `aria-describedby` and the error
// element — derived from the key so several fields can coexist on one form.
$input_id = CheckoutCustomFieldService::inputId( $key );
$error_id = $input_id . '-error';
$help_id  = $input_id . '-help';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--custom is-size-' . esc_attr( $size ) )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( wp_interactivity_data_wp_context( array( 'scFieldKey' => $key ) ) ); ?>
>
	<?php // Hidden, not omitted: the label is the input's only reliable name. ?>
	<label for="<?php echo esc_attr( $input_id ); ?>" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php if ( $required ) : ?><span class="sc-form-label__required" aria-hidden="true">*</span><?php endif; ?>
	</label>
	<input
		id="<?php echo esc_attr( $input_id ); ?>"
		type="text"
		name="<?php echo esc_attr( $key ); ?>"
		class="sc-form-control"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		<?php echo $required ? 'required' : ''; ?>
		data-wp-bind--value="state.customFieldValue"
		data-wp-bind--aria-invalid="state.hasCustomFieldError"
		aria-describedby="<?php echo esc_attr( $error_id . ( $help ? ' ' . $help_id : '' ) ); ?>"
		data-wp-on--keyup="actions.setCustomField"
		data-wp-on--change="actions.setCustomField"
		data-wp-on--blur="actions.flushCustomField"
	/>
	<?php if ( $help ) : ?>
		<p id="<?php echo esc_attr( $help_id ); ?>" class="sc-form-help" data-wp-bind--hidden="state.hasCustomFieldError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="<?php echo esc_attr( $error_id ); ?>" class="sc-form-error" data-wp-bind--hidden="!state.hasCustomFieldError" data-wp-text="state.customFieldError" hidden></p>
</div>
