<?php
/** One radio option, bound to `actions.setCustomField`. */

use SureCart\Support\Blocks\CheckoutCustomFieldService;

$label    = trim( (string) ( $attributes['label'] ?? '' ) );
$required = ! empty( $block->context['surecart/checkout-choices/required'] );

// The visible text: the label, or the value for a label-less option — never a
// generic fallback, which would render sibling options identically.
$text = '' !== $label ? $label : $value;

// Unique per option (key + value slug); the group's shared error element hangs
// off the plain key id.
$input_id = CheckoutCustomFieldService::choiceInputId( $key, $value );
$error_id = CheckoutCustomFieldService::inputId( $key ) . '-error';

$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => 'sc-checkout-choice' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( wp_interactivity_data_wp_context( array( 'scChoiceValue' => $value ) ) ); ?>
>
	<label for="<?php echo esc_attr( $input_id ); ?>" class="sc-form-check">
		<input
			id="<?php echo esc_attr( $input_id ); ?>"
			type="radio"
			class="sc-check-input"
			name="<?php echo esc_attr( $key ); ?>"
			value="<?php echo esc_attr( $value ); ?>"
			<?php echo $required ? 'required' : ''; ?>
			data-wp-bind--checked="state.isCustomChoiceSelected"
			aria-describedby="<?php echo esc_attr( $error_id ); ?>"
			data-wp-on--change="actions.setCustomField"
		/>
		<span class="sc-form-check__label"><?php echo esc_html( $text ); ?></span>
	</label>
</div>
