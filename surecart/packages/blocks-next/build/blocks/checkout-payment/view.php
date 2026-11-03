<?php
/** Payment accordion — pure Interactivity API (no `<sc-payment>` Stencil island). */

$paypal_present = false;
$has_other_cc   = false; // any CC processor that is NOT paypal/mock (stripe, paystack, razorpay).
foreach ( $processors as $p ) {
	$type = $p['type'] ?? '';
	if ( 'paypal' === $type ) {
		$paypal_present = true;
	}
	if ( ! in_array( $type, array( 'paypal', 'mock' ), true ) ) {
		$has_other_cc = true;
	}
}

$choice_count = count( $manual_methods );
foreach ( $processors as $p ) {
	$type = $p['type'] ?? '';
	if ( 'paypal' === $type ) {
		// paypal row + the conditional "Credit Card" fallback row.
		$choice_count += $has_other_cc ? 1 : 2;
	} else {
		++$choice_count;
	}
}

// `sc-card` accordion when multiple choices OR paypal is selected/present.
$is_card_wrapper = ( $choice_count > 1 ) ? true : $paypal_present;

// Per-row "(Stripe)" / "(Paystack)" suffix decision.
$has_other_cc_than = function ( $type ) use ( $processors ) {
	foreach ( $processors as $p ) {
		$t = $p['type'] ?? '';
		if ( $t === $type ) {
			continue;
		}
		if ( ! in_array( $t, array( 'paypal', 'mock' ), true ) ) {
			return true;
		}
	}
	return false;
};

// The label inner block renders above `__form-control`; the accordion, processor tiles and SDK mounts stay inline below.
$label_html = '';
foreach ( $block->inner_blocks ?? array() as $inner_block ) {
	$label_html .= $inner_block->render();
}

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-payment' )
);

$chevron_svg = SureCart::svg()->get( 'chevron-right', array( 'class' => 'sc-payment-toggle__chevron-icon' ) );

$icon_credit_card = SureCart::svg()->get( 'credit-card', array( 'class' => 'sc-payment-toggle__icon' ) );
$icon_paypal      = SureCart::svg()->get( 'paypal', array( 'class' => 'sc-payment-toggle__icon sc-payment-toggle__icon--paypal' ) );
$icon_razorpay    = SureCart::svg()->get( 'razorpay', array( 'class' => 'sc-payment-toggle__icon' ) );
$icon_upi         = SureCart::svg()->get( 'upi', array( 'class' => 'sc-payment-toggle__icon' ) );
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!state.paymentMethodRequired"
>
	<div
		class="sc-checkout-payment__form-control"
		<?php if ( false !== strpos( $label_html, 'id="sc-checkout-payment-label"' ) ) : ?>
			role="group"
			aria-labelledby="sc-checkout-payment-label"
		<?php endif; ?>
	>
		<?php // Label + test-mode badge — routed from the -payment-label leaf (top slot). ?>
		<?php echo $label_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner-block (payment-label) markup. ?>

		<?php
		// Suppress all other processors, manual methods, and the no-processor alert.
		if ( $has_mollie ) :
			$mollie = null;
			foreach ( $processors as $p ) {
				if ( 'mollie' === ( $p['type'] ?? '' ) ) {
					$mollie = $p;
					break;
				}
			}
			?>
			<?php
			// Mollie redirects: one tile per available payment_method_type, fetched
			// client-side into state.methods.
			?>
			<div class="sc-payment-accordion sc-payment-accordion--card sc-payment-accordion--mollie" data-sc-processor-id="<?php echo esc_attr( $mollie['id'] ?? '' ); ?>">

				<?php // Loading skeleton — shown until the first methods fetch settles. ?>
				<div class="sc-payment-mount-skeleton sc-payment-accordion--mollie__skeleton" data-wp-bind--hidden="!state.mollieMethodsLoading" aria-hidden="true">
					<div class="sc-payment-mount-skeleton__line"></div>
					<div class="sc-payment-mount-skeleton__line"></div>
					<div class="sc-payment-mount-skeleton__line"></div>
				</div>

				<?php // Empty-state — shown once a fetch settles with zero methods. ?>
				<div class="sc-alert sc-alert__alert--warning" role="status" data-wp-bind--hidden="!state.mollieMethodsEmpty">
					<div class="sc-alert__body"><?php esc_html_e( 'No available payment methods', 'surecart' ); ?></div>
				</div>

				<?php
				// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
				echo \SureCart::paymentBlock()->methodTile(
					array(
						'each_source'      => 'state.mollieMethods',
						'open_getter'      => 'state.isMollieMethodRowSelected',
						'select_action'    => 'actions.selectMollieMethod',
						'header_icon_html' => '<img class="sc-payment-toggle__icon sc-payment-toggle__icon--mollie" data-wp-bind--src="context.method.image" data-wp-bind--hidden="!context.method.image" alt="" aria-hidden="true" />',
						'body_icon_html'   => '<img class="sc-payment-selected__image" data-wp-bind--src="context.method.image" data-wp-bind--hidden="!context.method.image" alt="" />',
						'label_expr'       => 'context.method.description',
					),
					$chevron_svg
				);
				// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		<?php else : ?>
			<?php // Card wrapper when multiple choices / paypal. ?>
			<div
				class="sc-payment-accordion<?php echo $is_card_wrapper ? ' sc-payment-accordion--card' : ''; ?>"
				data-wp-class--sc-payment-accordion--card="state.hasMultipleMethodChoices"
			>

				<?php // Admins see a settings link, visitors a contact line. ?>
				<?php if ( empty( $processors ) && empty( $manual_methods ) ) : ?>
					<div class="sc-alert sc-alert__alert--primary" role="status">
						<div class="sc-alert__body">
							<?php if ( $can_manage_settings ) : ?>
								<?php
								esc_html_e( 'You do not have any processors enabled for this mode and cart. ', 'surecart' );
								$settings_link = add_query_arg(
									array(
										'page' => 'sc-settings',
										'tab'  => 'processors',
									),
									admin_url( 'admin.php' )
								);
								?>
								<a href="<?php echo esc_url( $settings_link ); ?>" style="color: var(--sc-color-gray-700);"><?php esc_html_e( 'Please configure your processors', 'surecart' ); ?></a>.
							<?php else : ?>
								<?php esc_html_e( 'Please contact us for payment.', 'surecart' ); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php
				// Seed order is already sorted server-side.
				foreach ( $processors as $processor ) :
					$type         = $processor['type'] ?? '';
					$processor_id = $processor['id'] ?? '';

					switch ( $type ) {
						case 'stripe':
							// "(Stripe)" suffix only beside another card processor.
							$title   = $has_other_cc_than( 'stripe' ) ? __( 'Credit Card (Stripe)', 'surecart' ) : __( 'Credit Card', 'surecart' );
							$summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_credit_card, sc_allowed_svg_html() ) . '<span>' . esc_html( $title ) . '</span></span>';
							$body    = '<div class="sc-payment-mount" data-sc-processor="stripe" data-sc-processor-id="' . esc_attr( $processor_id ) . '"></div>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->row(
								array(
									'row_id'        => 'sc-payment-row-stripe',
									'summary_html'  => $summary,
									'body_html'     => $body,
									'open_getter'   => 'state.isStripeRowSelected',
									'select_action' => 'actions.selectPaymentRow',
									'hidden_getter' => 'state.isPaymentRowHidden',
									'context'       => array(
										'processorType' => 'stripe',
										'processorId'   => $processor_id,
										'methodId'      => '',
									),
									'is_card'       => $is_card_wrapper,
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
							break;

						case 'paypal':
							// PayPal logo row (visually-hidden text label).
							$summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_paypal, sc_allowed_svg_html() ) . '<span class="sc-screen-reader-text">' . esc_html__( 'PayPal', 'surecart' ) . '</span></span>';
							$body    = '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody( wp_kses( $icon_paypal, sc_allowed_svg_html() ), __( 'PayPal selected for check out.', 'surecart' ) ) . '</div>'
								. '<div class="sc-payment-mount" data-sc-processor="paypal" data-sc-processor-id="' . esc_attr( $processor_id ) . '"></div>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->row(
								array(
									'row_id'        => 'sc-payment-row-paypal',
									'summary_html'  => $summary,
									'body_html'     => $body,
									'open_getter'   => 'state.isPaypalRowSelected',
									'select_action' => 'actions.selectPaymentRow',
									'hidden_getter' => 'state.isPaymentRowHidden',
									'context'       => array(
										'processorType' => 'paypal',
										'processorId'   => $processor_id,
										'methodId'      => '',
									),
									'is_card'       => $is_card_wrapper,
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped

							// "Credit Card" row only when no other card processor.
							if ( ! $has_other_cc ) :
								$cc_summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_credit_card, sc_allowed_svg_html() ) . '<span>' . esc_html__( 'Credit Card', 'surecart' ) . '</span></span>';
								$cc_body    = '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody( wp_kses( $icon_credit_card, sc_allowed_svg_html() ), __( 'Credit Card selected for check out.', 'surecart' ) ) . '</div>'
									. '<div class="sc-payment-mount" data-sc-processor="paypal" data-sc-method="card" data-sc-processor-id="' . esc_attr( $processor_id ) . '"></div>';
								// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
								echo \SureCart::paymentBlock()->row(
									array(
										'row_id'        => 'sc-payment-row-paypal-card',
										'summary_html'  => $cc_summary,
										'body_html'     => $cc_body,
										'open_getter'   => 'state.isPaypalCardRowSelected',
										'select_action' => 'actions.selectPaymentRow',
										'hidden_getter' => 'state.isPaymentRowHidden',
										'context'       => array(
											'processorType' => 'paypal',
											'processorId' => $processor_id,
											'methodId'    => 'card',
										),
										'is_card'       => $is_card_wrapper,
									),
									$chevron_svg
								);
								// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
							endif;
							break;

						case 'paystack':
							// "(Paystack)" suffix only beside another card processor.
							$title   = $has_other_cc_than( 'paystack' ) ? __( 'Credit Card (Paystack)', 'surecart' ) : __( 'Credit Card', 'surecart' );
							$summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_credit_card, sc_allowed_svg_html() ) . '<span>' . esc_html( $title ) . '</span></span>';
							$body    = '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody( wp_kses( $icon_credit_card, sc_allowed_svg_html() ), __( 'Credit Card selected for check out.', 'surecart' ) ) . '</div>'
								. '<div class="sc-payment-mount" data-sc-processor="paystack" data-sc-processor-id="' . esc_attr( $processor_id ) . '"></div>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->row(
								array(
									'row_id'        => 'sc-payment-row-paystack',
									'summary_html'  => $summary,
									'body_html'     => $body,
									'open_getter'   => 'state.isPaystackRowSelected',
									'select_action' => 'actions.selectPaymentRow',
									// Paystack additionally hides when its currency is unsupported.
									'hidden_getter' => 'state.isPaystackRowHidden',
									'context'       => array(
										'processorType' => 'paystack',
										'processorId'   => $processor_id,
										'methodId'      => '',
										'supportedCurrencies' => $processor['supported_currencies'] ?? array(),
									),
									'is_card'       => $is_card_wrapper,
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
							break;

						case 'razorpay':
							// Combined tile for one-time checkouts, or recurring with
							// no method types.
							$summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_razorpay, sc_allowed_svg_html() ) . '<span>' . esc_html__( 'Cards, Netbanking, Wallet & UPI', 'surecart' ) . '</span></span>';
							$body    = '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody( wp_kses( $icon_razorpay, sc_allowed_svg_html() ), __( 'Cards, Netbanking, Wallet & UPI selected for check out.', 'surecart' ) ) . '</div>'
								. '<div class="sc-payment-mount" data-sc-processor="razorpay" data-sc-processor-id="' . esc_attr( $processor_id ) . '"></div>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->row(
								array(
									'row_id'        => 'sc-payment-row-razorpay',
									'summary_html'  => $summary,
									'body_html'     => $body,
									'open_getter'   => 'state.isRazorpayRowSelected',
									'select_action' => 'actions.selectPaymentRow',
									'hidden_getter' => '!state.showRazorpayCombinedRow',
									'context'       => array(
										'processorType' => 'razorpay',
										'processorId'   => $processor_id,
										'methodId'      => '',
										'supportedCurrencies' => $processor['supported_currencies'] ?? array(),
									),
									'is_card'       => $is_card_wrapper,
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped

							// Recurring: one row per enabled payment_method_type.
							$razorpay_method_icon = '<span data-wp-bind--hidden="context.method.isUpi">' . wp_kses( $icon_razorpay, sc_allowed_svg_html() ) . '</span> <span data-wp-bind--hidden="!context.method.isUpi">' . wp_kses( $icon_upi, sc_allowed_svg_html() ) . '</span>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->methodTile(
								array(
									'each_source'       => 'state.razorpayMethods',
									'open_getter'       => 'state.isRazorpayMethodRowSelected',
									'select_action'     => 'actions.selectRazorpayMethod',
									'row_hidden_getter' => 'state.isRazorpayRowHidden',
									'header_icon_html'  => $razorpay_method_icon,
									'body_icon_html'    => $razorpay_method_icon,
									'label_expr'        => 'context.method.label',
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
							break;

						case 'mock':
							$summary = '<span class="sc-payment-toggle-summary">' . wp_kses( $icon_credit_card, sc_allowed_svg_html() ) . '<span>' . esc_html__( 'Test Processor', 'surecart' ) . '</span></span>';
							$body    = '<div class="sc-payment-mount" data-sc-processor="mock" data-sc-processor-id="' . esc_attr( $processor_id ) . '">'
								. '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody(
									wp_kses( $icon_credit_card, sc_allowed_svg_html() ),
									__( 'Test processor selected for check out.', 'surecart' ),
									'',
									esc_html__( 'This is a test payment processor used to simulate test transactions. It is only available in test mode.', 'surecart' )
								) . '</div></div>';
							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
							echo \SureCart::paymentBlock()->row(
								array(
									'row_id'        => 'sc-payment-row-mock',
									'summary_html'  => $summary,
									'body_html'     => $body,
									'open_getter'   => 'state.isMockRowSelected',
									'select_action' => 'actions.selectPaymentRow',
									'hidden_getter' => 'state.isPaymentRowHidden',
									'context'       => array(
										'processorType' => 'mock',
										'processorId'   => $processor_id,
										'methodId'      => '',
									),
									'is_card'       => $is_card_wrapper,
								),
								$chevron_svg
							);
							// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
							break;
					}
				endforeach;

				// Manual methods. Hidden when a reusable method is required and this
				// one isn't (client getter).
				foreach ( $manual_methods as $method ) :
					$method_id = $method['id'] ?? '';
					$name      = $method['name'] ?? '';
					$desc      = $method['instructions'] ?? '';
					$summary   = '<span class="sc-payment-toggle-summary">' . esc_html( $name ) . '</span>';

					$manual_body = '<div class="sc-payment-inner-card">' . \SureCart::paymentBlock()->selectedBody(
						'',
						sprintf(
							/* translators: %s: Manual payment method name. */
							__( '%s selected for check out.', 'surecart' ),
							$name
						),
						'',
						wp_kses_post( $desc )
					) . '</div>';

					// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the partial.
					echo \SureCart::paymentBlock()->row(
						array(
							'row_id'        => 'sc-payment-row-manual-' . sanitize_html_class( $method_id ),
							'summary_html'  => $summary,
							'body_html'     => $manual_body,
							'open_getter'   => 'state.isManualRowSelected',
							'select_action' => 'actions.selectManualRow',
							'hidden_getter' => 'state.isManualRowHidden',
							'context'       => array(
								'processorType' => 'manual',
								'processorId'   => '',
								'methodId'      => $method_id,
							),
							'is_card'       => $is_card_wrapper,
						),
						$chevron_svg
					);
					// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
				endforeach;
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
