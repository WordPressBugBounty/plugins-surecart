<?php
/**
 * A `data-wp-each` payment method tile template (mollie / razorpay), rendered via PaymentBlockService::methodTile().
 *
 * Variables: $args (see PaymentBlockService::methodTile()), $chevron_svg.
 */

// phpcs:disable Generic.WhiteSpace.ScopeIndent -- indentation is intentional so the rendered HTML whitespace stays stable.
		$open_getter       = $args['open_getter'];
		$select_action     = $args['select_action'];
		$row_hidden_getter = $args['row_hidden_getter'] ?? '';
		$label_expr        = $args['label_expr'];
		$row_hidden_attr   = $row_hidden_getter ? ' data-wp-bind--hidden="' . esc_attr( $row_hidden_getter ) . '"' : '';
		?>
		<template
			data-wp-each--method="<?php echo esc_attr( $args['each_source'] ); ?>"
			data-wp-each-key="context.method.id"
		>
			<div
				class="sc-payment-toggle"
				<?php echo $row_hidden_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from esc_attr above. ?>
				data-wp-class--sc-payment-toggle--open="<?php echo esc_attr( $open_getter ); ?>"
			>
				<header
					class="sc-payment-toggle__header"
					role="button"
					tabindex="0"
					data-wp-bind--aria-controls="context.method.domId"
					data-wp-bind--aria-expanded="<?php echo esc_attr( $open_getter ); ?>"
					data-wp-on--click="<?php echo esc_attr( $select_action ); ?>"
					data-wp-on--keydown="<?php echo esc_attr( $select_action ); ?>"
				>
					<span class="sc-payment-toggle__radio" aria-hidden="true">
						<svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="3.42857143" fill="currentColor"></circle></svg>
					</span>
					<div class="sc-payment-toggle__summary">
						<span class="sc-payment-toggle-summary">
							<?php echo $args['header_icon_html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- pre-built by caller. ?>
							<span data-wp-text="<?php echo esc_attr( $label_expr ); ?>"></span>
						</span>
					</div>
					<span class="sc-payment-toggle__chevron" aria-hidden="true">
						<?php echo wp_kses( $chevron_svg, sc_allowed_svg_html() ); ?>
					</span>
				</header>

				<div
					class="sc-payment-toggle__body"
					data-wp-class--sc-payment-toggle__body--shown="<?php echo esc_attr( $open_getter ); ?>"
					role="region"
					data-wp-bind--id="context.method.domId"
					data-wp-bind--aria-label="<?php echo esc_attr( $label_expr ); ?>"
				>
					<div class="sc-payment-toggle__content">
						<?php echo \SureCart::paymentBlock()->selectedBody( $args['body_icon_html'], '', $label_expr ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built by PaymentBlockService::selectedBody(). ?>
					</div>
				</div>
			</div>
		</template>
