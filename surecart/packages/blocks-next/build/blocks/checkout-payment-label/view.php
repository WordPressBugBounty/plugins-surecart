<?php
/** The payment section label + the test-mode badge. */

$label = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Payment', 'surecart' );

// `$is_test` / `$can_edit_posts` come from the controller; re-derive if absent.
if ( ! isset( $is_test ) ) {
	$product = get_query_var( 'surecart_current_product' );
	$is_test = ! empty( $product ) && empty( $product->error ) && ! is_wp_error( $product )
		&& 'test' === $product->buyLink()->getMode();
}
if ( ! isset( $can_edit_posts ) ) {
	$can_edit_posts = current_user_can( 'edit_posts' );
}

if ( isset( $show_label ) && ! $show_label ) : ?>
	<div id="sc-checkout-payment-label" class="sc-screen-reader-text"><?php echo esc_html( $label ); ?></div>
	<?php
	return;
endif;
?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => 'sc-checkout-payment__label' ) ) ); ?>>
	<?php // Fixed id: the payment block names its methods group with it. ?>
	<div id="sc-checkout-payment-label" class="sc-form-label"><?php echo esc_html( $label ); ?></div>
	<?php if ( $is_test ) : ?>
		<?php // Test-mode badge. Editors get the info popover; visitors get a plain tag. ?>
		<?php if ( $can_edit_posts ) : ?>
			<details class="sc-test-mode-info">
				<summary
					class="sc-tag sc-tag--warning sc-tag--small sc-test-mode-info__trigger"
					tabindex="0"
					aria-label="<?php esc_attr_e( 'Test Mode Info, Press Enter to open the Information Popover', 'surecart' ); ?>"
				>
					<?php esc_html_e( 'Test Mode', 'surecart' ); ?>
					<span class="sc-test-mode-info__suffix" aria-hidden="true"><?php echo wp_kses( SureCart::svg()->get( 'info' ), sc_allowed_svg_html() ); ?></span>
				</summary>
				<div class="sc-test-mode-info__panel" role="dialog" aria-modal="false">
					<div class="sc-test-mode-info__title"><?php esc_html_e( 'How to switch from Test to Live mode', 'surecart' ); ?></div>
					<div class="sc-test-mode-info__content">
						<ol>
							<li>
								<?php esc_html_e( 'From the Admin Bar', 'surecart' ); ?>
								<ul>
									<li><?php esc_html_e( 'Select any product & proceed to its checkout page.', 'surecart' ); ?></li>
									<li><?php esc_html_e( 'Access the dropdown menu & select the live mode.', 'surecart' ); ?></li>
								</ul>
								<img src="<?php echo esc_url( trailingslashit( SureCart::core()->assets()->getUrl() ) . 'images/change-from-adminbar.png' ); ?>" alt="<?php esc_attr_e( 'Screenshot showing how to change mode from the admin bar', 'surecart' ); ?>" />
							</li>
							<li>
								<?php esc_html_e( 'From the Editor', 'surecart' ); ?>
								<ul>
									<li><?php esc_html_e( 'Navigate to the custom Forms section under SureCart.', 'surecart' ); ?></li>
									<li><?php esc_html_e( 'Select the checkout form.', 'surecart' ); ?></li>
									<li><?php esc_html_e( 'Select "Live" from the dropdown. Hit Update!', 'surecart' ); ?></li>
								</ul>
								<img src="<?php echo esc_url( trailingslashit( SureCart::core()->assets()->getUrl() ) . 'images/change-from-editor.png' ); ?>" alt="<?php esc_attr_e( 'Screenshot showing how to change mode from the editor', 'surecart' ); ?>" />
							</li>
						</ol>
					</div>
					<div class="sc-test-mode-info__footer">
						<a class="sc-test-mode-info__link" target="_blank" rel="noopener noreferrer" href="https://surecart.com/docs/how-to-make-test-payments/">
							<?php esc_html_e( 'Documentation', 'surecart' ); ?> <?php echo wp_kses( SureCart::svg()->get( 'external-link' ), sc_allowed_svg_html() ); ?>
						</a>
						<a class="sc-test-mode-info__link" target="_blank" rel="noopener noreferrer" href="https://surecart.com/contact-us/">
							<?php esc_html_e( 'Open a ticket', 'surecart' ); ?> <?php echo wp_kses( SureCart::svg()->get( 'external-link' ), sc_allowed_svg_html() ); ?>
						</a>
					</div>
				</div>
			</details>
		<?php else : ?>
			<span class="sc-tag sc-tag--warning sc-tag--small"><?php esc_html_e( 'Test Mode', 'surecart' ); ?></span>
		<?php endif; ?>
	<?php endif; ?>
</div>
