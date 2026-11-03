<?php
/**
 * Merchant switch: a checkbox with role="switch". `actions.setCustomFieldChecked` buffers the
 * `value` attribute when on and '' when off.
 */

use SureCart\Support\Blocks\CheckoutCustomFieldService;

$label      = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Switch', 'surecart' );
$help       = $attributes['help'] ?? '';
$required   = ! empty( $attributes['required'] );
$show_label = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );

// One id for the input, the label's `for`, the `aria-describedby` and the error
// element — derived from the key so several fields can coexist on one form.
$input_id = CheckoutCustomFieldService::inputId( $key );
$error_id = $input_id . '-error';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--custom sc-checkout-field--switch' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( wp_interactivity_data_wp_context( array( 'scFieldKey' => $key ) ) ); ?>
>
	<label for="<?php echo esc_attr( $input_id ); ?>" class="sc-switch">
		<input
			id="<?php echo esc_attr( $input_id ); ?>"
			type="checkbox"
			role="switch"
			class="sc-switch__input"
			name="<?php echo esc_attr( $key ); ?>"
			value="<?php echo esc_attr( $value ); ?>"
			<?php echo $checked ? 'checked' : ''; ?>
			<?php echo $required ? 'required' : ''; ?>
			<?php if ( ! $show_label ) : ?>
				<?php // A hidden label leaves no visible text, so name it. ?>
				aria-label="<?php echo esc_attr( $label ); ?>"
			<?php endif; ?>
			data-wp-bind--checked="state.isCustomFieldChecked"
			data-wp-bind--aria-invalid="state.hasCustomFieldError"
			aria-describedby="<?php echo esc_attr( $error_id ); ?>"
			data-wp-on--change="actions.setCustomFieldChecked"
		/>
		<span class="sc-switch__control" aria-hidden="true">
			<span class="sc-switch__thumb"></span>
		</span>
		<?php if ( $show_label ) : ?>
			<span class="sc-switch__label">
				<?php echo esc_html( $label ); ?>
				<?php if ( $required ) : ?><span class="sc-form-label__required" aria-hidden="true">*</span><?php endif; ?>
			</span>
		<?php endif; ?>
	</label>
	<?php if ( $help ) : ?>
		<p class="sc-form-help" data-wp-bind--hidden="state.hasCustomFieldError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="<?php echo esc_attr( $error_id ); ?>" class="sc-form-error" data-wp-bind--hidden="!state.hasCustomFieldError" data-wp-text="state.customFieldError" hidden></p>
</div>
