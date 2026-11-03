<?php
use SureCart\Support\Blocks\CheckoutTermsService;

$show_label = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );

// Only show terms on the buy page (matches the seeded `termsText`); the template decides placement.
$terms_text  = '';
$product     = get_query_var( 'surecart_current_product' );
$has_product = ! empty( $product ) && empty( $product->error ) && ! is_wp_error( $product );
if ( $has_product ) {
	$terms_text = CheckoutTermsService::text();
}

// A merchant label replaces the copy, but visibility still follows the seeded terms.
if ( ! empty( $terms_text ) && ! empty( $attributes['label'] ) ) {
	$terms_text = $attributes['label'];
}

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-terms' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!state.termsText"
>
	<label class="sc-checkout-terms__label">
		<input
			type="checkbox"
			name="terms"
			class="sc-checkout-terms__checkbox"
			<?php if ( ! $show_label ) : ?>
				<?php // A hidden label leaves no visible text, so name it. ?>
				aria-label="<?php esc_attr_e( 'I agree to the terms', 'surecart' ); ?>"
			<?php endif; ?>
			data-wp-bind--checked="state.agreeToTerms"
			data-wp-bind--aria-invalid="state.hasTermsError"
			aria-describedby="sc-checkout-terms-error"
			data-wp-on--change="actions.toggleTerms"
			required
			data-wp-bind--disabled="!state.termsText"
		/>
		<?php if ( $show_label ) : ?>
			<span class="sc-checkout-terms__text"><?php echo wp_kses_post( $terms_text ); ?></span>
		<?php endif; ?>
	</label>
	<p id="sc-checkout-terms-error" class="sc-form-error" data-wp-bind--hidden="!state.hasTermsError" data-wp-text="state.errorFieldErrors.terms" hidden></p>
</div>
