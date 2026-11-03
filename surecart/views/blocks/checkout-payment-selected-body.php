<?php
/**
 * The "selected for check out" placeholder card body, rendered via PaymentBlockService::selectedBody().
 *
 * Variables: $icon_html, $label, $label_bind, $instructions_html.
 */

// phpcs:disable Generic.WhiteSpace.ScopeIndent -- indentation is intentional so the rendered HTML whitespace stays stable.
		$label_bind_attr = $label_bind ? ' data-wp-text="' . esc_attr( $label_bind ) . '"' : '';
		?>
		<div class="sc-payment-selected">
			<?php if ( $icon_html || $label_bind ) : ?>
				<div class="sc-payment-selected__icon" aria-hidden="true"><?php echo $icon_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- pre-built by caller. ?></div>
			<?php endif; ?>
			<div class="sc-payment-selected__label"<?php echo $label_bind_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from esc_attr above. ?>><?php echo $label_bind ? '' : esc_html( $label ); ?></div>
			<div class="sc-payment-selected__divider" aria-hidden="true"></div>
			<div class="sc-payment-selected__instructions">
				<svg viewBox="0 0 48 40" fill="var(--sc-color-gray-500)" xmlns="http://www.w3.org/2000/svg" role="presentation" aria-hidden="true">
					<path opacity=".6" fill-rule="evenodd" clip-rule="evenodd" d="M43 5a4 4 0 00-4-4H17a4 4 0 00-4 4v11a1 1 0 102 0V5a2 2 0 012-2h22a2 2 0 012 2v30a2 2 0 01-2 2H17a2 2 0 01-2-2v-9a1 1 0 10-2 0v9a4 4 0 004 4h22a4 4 0 004-4V5zM17.992 16.409L21.583 20H6a1 1 0 100 2h15.583l-3.591 3.591a1 1 0 101.415 1.416l5.3-5.3a1 1 0 000-1.414l-5.3-5.3a1 1 0 10-1.415 1.416zM17 6a1 1 0 011-1h15a1 1 0 011 1v2a1 1 0 01-1 1H18a1 1 0 01-1-1V6zm21-1a1 1 0 100 2 1 1 0 000-2z"></path>
				</svg>
				<div class="sc-payment-selected__instructions-text">
					<?php if ( $instructions_html ) : ?>
						<?php echo $instructions_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_kses_post()'d by caller. ?>
					<?php else : ?>
						<?php esc_html_e( 'Another step will appear after submitting your order to complete your purchase details.', 'surecart' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
