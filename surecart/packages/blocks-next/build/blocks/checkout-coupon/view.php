<?php
/**
 * Coupon form adapted from `surecart/slide-out-cart-coupon`, bound to the checkout-form store's
 * own coupon actions (the cart's coupon operates on a different session).
 */

$collapsed = ! empty( $attributes['collapsed'] );
// A merchant `text` attribute wins in both.
$label       = ! empty( $attributes['text'] ) ? $attributes['text'] : ( $collapsed ? __( 'Add Coupon Code', 'surecart' ) : __( 'Coupon Code', 'surecart' ) );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Enter coupon code', 'surecart' );
$button_text = ! empty( $attributes['button_text'] ) ? $attributes['button_text'] : __( 'Apply', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-coupon' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( wp_interactivity_data_wp_context( array( 'discountInputOpen' => ! $collapsed ) ) ); ?>
	data-wp-on-document--click="surecart/checkout-form::actions.closeCouponOnClickOutside"
>
	<?php /* Applied discount UI — pill with code + remove button. */ ?>
	<div
		class="sc-line-item__item sc-coupon-form"
		data-wp-bind--hidden="!state.isDiscountApplied"
		hidden
	>
		<div class="sc-line-item__text">
			<div class="sc-line-item__description">
				<?php esc_html_e( 'Discount', 'surecart' ); ?>
				<div
					class="sc-tag"
					data-wp-class--sc-tag--success="state.discountIsRedeemable"
				>
					<span data-wp-text="state.checkout.discount.promotion.code"></span>
					<button
						type="button"
						class="sc-tag__remove sc-button-reset sc-button-unstyled"
						data-wp-on--click="surecart/checkout-form::actions.removeDiscount"
						aria-label="<?php esc_attr_e( 'Remove discount', 'surecart' ); ?>"
						title="<?php esc_attr_e( 'Remove discount', 'surecart' ); ?>"
					>
						<?php echo wp_kses( SureCart::svg()->get( 'x', array( 'class' => '' ) ), sc_allowed_svg_html() ); ?>
					</button>
				</div>
			</div>
		</div>
		<div class="sc-line-item__end">
			<div class="sc-line-item__price-text">
				<div class="sc-line-item__price-description" data-wp-bind--hidden="!state.discountIsRedeemable">
					<span data-wp-text="state.checkout.human_discount_with_duration"></span>
				</div>
				<div class="sc-line-item__price" data-wp-bind--hidden="!state.discountIsRedeemable" data-wp-text="state.checkout.discount_display_amount"></div>
				<div class="sc-line-item__price-description" data-wp-bind--hidden="state.discountIsRedeemable">
					<div class="sc-coupon__status">
						<?php echo wp_kses( SureCart::svg()->get( 'alert-triangle', array( 'class' => '' ) ), sc_allowed_svg_html() ); ?>
						<span data-wp-text="state.checkout.discount.redeemable_display_status"></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php /* Empty-state UI — collapsed trigger or expanded input form. */ ?>
	<div class="sc-coupon-form" data-wp-bind--hidden="state.isDiscountApplied">
		<?php if ( $collapsed ) : ?>
			<button
				type="button"
				class="trigger sc-button-reset sc-button-unstyled"
				data-wp-bind--hidden="context.discountInputOpen"
				hidden
				aria-controls="sc-checkout-coupon-panel"
				data-wp-bind--aria-expanded="context.discountInputOpen"
				data-wp-on--click="surecart/checkout-form::actions.toggleDiscountInput"
			><?php echo esc_html( $label ); ?></button>
			<div id="sc-checkout-coupon-panel" data-wp-bind--hidden="!context.discountInputOpen" hidden>
				<div class="sc-input-group sc-coupon-form__input-group">
					<input
						type="text"
						class="sc-form-control sc-coupon-form__input"
						aria-label="<?php esc_attr_e( 'Coupon code', 'surecart' ); ?>"
						aria-describedby="sc-checkout-coupon-error"
						data-wp-bind--aria-invalid="state.hasCouponError"
						placeholder="<?php echo esc_attr( $placeholder ); ?>"
						data-wp-bind--value="state.promotionCode"
						data-wp-on--keydown="surecart/checkout-form::actions.maybeApplyDiscountOnKeyChange"
						data-wp-on--input="surecart/checkout-form::actions.setPromotionCode"
					/>
					<span class="sc-input-group-text">
						<button type="button" class="sc-button-reset" data-wp-bind--hidden="!state.promotionCode" data-wp-on--click="surecart/checkout-form::actions.applyDiscount">
							<?php echo esc_html( $button_text ); ?>
						</button>
					</span>
				</div>
				<?php
				// Unqualified bindings on purpose: `!ns::path` never re-evaluates. role="alert" so
				// a rejection is announced.
				?>
				<p id="sc-checkout-coupon-error" class="sc-form-error" role="alert" data-wp-bind--hidden="!state.couponError" data-wp-text="state.couponError" hidden></p>
			</div>
		<?php else : ?>
			<label class="sc-coupon-input-label sc-form-label" for="sc-checkout-coupon-input">
				<?php echo esc_html( $label ); ?>
			</label>
			<div>
				<div class="sc-input-group sc-coupon-form__input-group">
					<input
						type="text"
						id="sc-checkout-coupon-input"
						class="sc-form-control sc-coupon-form__input"
						aria-describedby="sc-checkout-coupon-error"
						data-wp-bind--aria-invalid="state.hasCouponError"
						placeholder="<?php echo esc_attr( $placeholder ); ?>"
						data-wp-bind--value="state.promotionCode"
						data-wp-on--keydown="surecart/checkout-form::actions.maybeApplyDiscountOnKeyChange"
						data-wp-on--input="surecart/checkout-form::actions.setPromotionCode"
					/>
					<span class="sc-input-group-text">
						<button type="button" class="sc-button-reset" data-wp-bind--hidden="!state.promotionCode" data-wp-on--click="surecart/checkout-form::actions.applyDiscount">
							<?php echo esc_html( $button_text ); ?>
						</button>
					</span>
				</div>
				<p id="sc-checkout-coupon-error" class="sc-form-error" role="alert" data-wp-bind--hidden="!state.couponError" data-wp-text="state.couponError" hidden></p>
			</div>
		<?php endif; ?>
	</div>
</div>
