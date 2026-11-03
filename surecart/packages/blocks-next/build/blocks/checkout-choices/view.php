<?php
/** Merchant radio group — the wrapper around the `surecart/checkout-choice` inner blocks. */

use SureCart\Support\Blocks\CheckoutCustomFieldService;

$label      = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Select an option', 'surecart' );
$help       = $attributes['help'] ?? '';
$required   = ! empty( $attributes['required'] );
$show_label = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );

// One id root for the label, the error and every option's `aria-describedby`; options add a
// value suffix for their input ids.
$input_id = CheckoutCustomFieldService::inputId( $key );
$label_id = $input_id . '-label';
$error_id = $input_id . '-error';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--custom sc-checkout-field--choices' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( wp_interactivity_data_wp_context( array( 'scFieldKey' => $key ) ) ); ?>
>
	<?php if ( $show_label ) : ?>
		<span id="<?php echo esc_attr( $label_id ); ?>" class="sc-form-label">
			<?php echo esc_html( $label ); ?>
			<?php if ( $required ) : ?><span class="sc-form-label__required" aria-hidden="true">*</span><?php endif; ?>
		</span>
	<?php endif; ?>
	<div
		class="sc-checkout-choices__options"
		role="radiogroup"
		<?php if ( $show_label ) : ?>
			aria-labelledby="<?php echo esc_attr( $label_id ); ?>"
		<?php else : ?>
			<?php // A hidden label leaves no visible text, so name it. ?>
			aria-label="<?php echo esc_attr( $label ); ?>"
		<?php endif; ?>
		<?php echo $required ? 'aria-required="true"' : ''; ?>
		aria-describedby="<?php echo esc_attr( $error_id ); ?>"
		data-wp-bind--aria-invalid="state.hasCustomFieldError"
	>
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner-block HTML, escaped per-block via get_block_wrapper_attributes / esc_*. ?>
	</div>
	<?php if ( $help ) : ?>
		<p class="sc-form-help" data-wp-bind--hidden="state.hasCustomFieldError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="<?php echo esc_attr( $error_id ); ?>" class="sc-form-error" data-wp-bind--hidden="!state.hasCustomFieldError" data-wp-text="state.customFieldError" hidden></p>
</div>
