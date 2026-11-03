<?php
/**
 * Line item quantity: the `.sc-quantity-selector` stepper plus the read-only "Qty: N" fallback.
 * `state.lineItemIsEditable` shows exactly one of them per row.
 */

// The Line Items block's "Allow editing quantity" toggle; off renders the read-only count only.
if ( isset( $block->context['editable'] ) && ! $block->context['editable'] ) :
	?>
	<span <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => 'sc-product-line-item__description' ) ) ); ?>>
		<?php esc_html_e( 'Qty:', 'surecart' ); ?>
		<span data-wp-text="context.line_item.quantity"></span>
	</span>
	<?php
	return;
endif;

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-input-group sc-input-group-sm sc-quantity-selector' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-class--quantity--disabled="state.isQuantityDisabled"
	data-wp-bind--hidden="!state.lineItemIsEditable"
	hidden
>
	<?php
	// Static aria-labels: the checkout-form store has no product-aware label getters like the
	// cart's `decreaseQuantityAriaLabel` yet.
	?>
	<button
		type="button"
		class="sc-input-group-text sc-quantity-selector__decrease sc-button-reset sc-button-unstyled"
		aria-label="<?php esc_attr_e( 'Decrease quantity', 'surecart' ); ?>"
		data-wp-on--click="actions.onQuantityDecrease"
		data-wp-bind--aria-disabled="state.isQuantityDecreaseDisabled"
		data-wp-class--button--disabled="state.isQuantityDecreaseDisabled"
	>−</button>
	<input
		type="number"
		class="sc-form-control sc-quantity-selector__control"
		aria-label="<?php esc_attr_e( 'Quantity', 'surecart' ); ?>"
		data-wp-bind--value="context.line_item.quantity"
		data-wp-on--change="actions.onQuantityChange"
		data-wp-bind--min="context.line_item.min"
		data-wp-bind--max="context.line_item.max"
		data-wp-bind--disabled="state.checkoutLoading"
		step="1"
		autocomplete="off"
	/>
	<button
		type="button"
		class="sc-input-group-text sc-quantity-selector__increase sc-button-reset sc-button-unstyled"
		aria-label="<?php esc_attr_e( 'Increase quantity', 'surecart' ); ?>"
		data-wp-on--click="actions.onQuantityIncrease"
		data-wp-bind--aria-disabled="state.isQuantityIncreaseDisabled"
		data-wp-class--button--disabled="state.isQuantityIncreaseDisabled"
	>+</button>
</div>
<span
	class="sc-product-line-item__description"
	data-wp-bind--hidden="state.lineItemIsEditable"
	hidden
>
	<?php esc_html_e( 'Qty:', 'surecart' ); ?>
	<span data-wp-text="context.line_item.quantity"></span>
</span>
