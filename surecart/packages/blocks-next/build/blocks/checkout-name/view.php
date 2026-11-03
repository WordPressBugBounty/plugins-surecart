<?php
/**
 * Name input: `actions.setName` (debounced) on input, `actions.flushName` on blur.
 */

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Name', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Your name', 'surecart' );
$help        = $attributes['help'] ?? '';
// Static `required` for first paint; the bind lifts it once init finds a first/last-name pair
// on the form.
$required   = ! isset( $attributes['required'] ) || ! empty( $attributes['required'] );
$show_label = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size       = $attributes['size'] ?? 'medium';

// Same resolution as the seeded `customerName` (first+last, then display_name)
// so this input and the logged-in identity card can never show different names.
$initial_name = \SureCart\Support\Blocks\CheckoutStateSeedService::resolveCustomerName( wp_get_current_user() );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--name is-size-' . esc_attr( $size ) )
);
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<label for="sc-checkout-name" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php if ( $required ) : ?>
			<span class="sc-form-label__required" aria-hidden="true" data-wp-bind--hidden="state.hasSplitNameBlocks">*</span>
		<?php endif; ?>
	</label>
	<input
		id="sc-checkout-name"
		type="text"
		name="name"
		class="sc-form-control"
		placeholder="<?php echo esc_attr( $placeholder ); ?>"
		autocomplete="name"
		value="<?php echo esc_attr( $initial_name ); ?>"
		<?php if ( $required ) : ?>
			required
			data-wp-bind--required="!state.hasSplitNameBlocks"
		<?php endif; ?>
		data-wp-bind--value="state.customerName"
		data-wp-bind--aria-invalid="state.hasNameError"
		aria-describedby="sc-checkout-name-error"
		data-wp-on--keyup="actions.setName"
		data-wp-on--change="actions.setName"
		data-wp-on--blur="actions.flushName"
	/>
	<?php if ( $help ) : ?>
		<p class="sc-form-help" data-wp-bind--hidden="state.hasNameError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-name-error" class="sc-form-error" data-wp-bind--hidden="!state.hasNameError" data-wp-text="state.errorFieldErrors.name" hidden></p>
</div>
