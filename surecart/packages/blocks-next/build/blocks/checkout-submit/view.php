<?php
$text                = ! empty( $attributes['text'] ) ? $attributes['text'] : __( 'Purchase', 'surecart' );
$show_total          = ! empty( $attributes['showTotal'] );
$show_icon           = ! isset( $attributes['showIcon'] ) || ! empty( $attributes['showIcon'] );
$full                = ! isset( $attributes['full'] ) || ! empty( $attributes['full'] );
$size                = sanitize_html_class( $attributes['size'] ?? 'large' );
$show_secure_notice  = ! isset( $attributes['showSecureNotice'] ) || ! empty( $attributes['showSecureNotice'] );
$secure_notice_text  = ! empty( $attributes['secureNoticeText'] ) ? $attributes['secureNoticeText'] : __( 'This is a secure, encrypted payment.', 'surecart' );

$wrapper_classes = trim(
	'sc-checkout-submit is-size-' . $size . ( $full ? ' is-full' : '' )
);
$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => $wrapper_classes ) );
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<?php // Native submit button — hidden whenever PayPal is the selected processor. ?>
	<div data-wp-bind--hidden="state.isPayPalSelected">
		<button
			type="submit"
			class="sc-checkout-submit__button <?php echo ! empty( $styles['classnames'] ) ? esc_attr( $styles['classnames'] ) : ''; ?>"
			style="<?php echo ! empty( $styles['css'] ) ? esc_attr( $styles['css'] ) : ''; ?>"
			data-wp-bind--disabled="state.submitDisabled"
			<?php // Disabled swallows clicks; aria-disabled is the screen-reader cue. ?>
			data-wp-bind--aria-disabled="state.submitDisabled"
			data-wp-bind--aria-busy="state.isBusy"
		>
			<?php if ( $show_icon ) : ?>
				<svg class="sc-checkout-submit__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
					<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
					<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
				</svg>
			<?php endif; ?>
			<span class="sc-checkout-submit__text">
				<span><?php echo esc_html( $text ); ?></span>
				<?php if ( $show_total ) : ?>
					<span class="sc-checkout-submit__total" data-wp-text="state.submitTotalDisplay"></span>
				<?php endif; ?>
				<span class="sc-screen-reader-text"><?php esc_html_e( 'Press enter to purchase', 'surecart' ); ?></span>
			</span>
		</button>
	</div>

	<?php
	/*
	 * PayPal buttons mount. The wrapper carries the visibility bind and the watch that
	 * mounts the SDK buttons when PayPal is selected.
	 */
	?>
	<div
		class="sc-paypal-buttons-wrapper"
		data-wp-bind--hidden="!state.isPayPalSelected"
		data-wp-watch="callbacks.watchPayPal"
	>
		<div class="sc-paypal-buttons-skeleton" aria-hidden="true"></div>
		<div class="sc-paypal-buttons-mount"></div>
	</div>

	<?php if ( $show_secure_notice ) : ?>
		<p class="sc-checkout-submit__secure sc-secure-notice"><?php echo esc_html( $secure_notice_text ); ?></p>
	<?php endif; ?>
</div>
