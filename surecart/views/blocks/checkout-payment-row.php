<?php
/**
 * One instant-checkout payment accordion row, rendered via PaymentBlockService::row().
 *
 * Variables: $args (see PaymentBlockService::row()), $chevron_svg.
 */

// phpcs:disable Generic.WhiteSpace.ScopeIndent -- indentation is intentional so the rendered HTML whitespace stays stable.
		$open_getter   = $args['open_getter'];
		$select_action = $args['select_action'];
		$hidden_getter = $args['hidden_getter'] ?? '';
		$context_attr  = wp_interactivity_data_wp_context( $args['context'] );
		$is_card       = ! empty( $args['is_card'] );
		$row_id        = $args['row_id'];
		$hidden_attr   = $hidden_getter ? ' data-wp-bind--hidden="' . esc_attr( $hidden_getter ) . '"' : '';
		?>
		<div
			class="sc-payment-toggle"
			<?php echo wp_kses_data( $context_attr ); ?>
			data-wp-class--sc-payment-toggle--open="<?php echo esc_attr( $open_getter ); ?>"
			<?php echo $hidden_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from esc_attr above. ?>
		>
			<?php if ( $is_card ) : ?>
				<header
					class="sc-payment-toggle__header"
					role="button"
					tabindex="0"
					id="<?php echo esc_attr( $row_id ); ?>-header"
					aria-controls="<?php echo esc_attr( $row_id ); ?>"
					data-wp-bind--aria-expanded="<?php echo esc_attr( $open_getter ); ?>"
					data-wp-on--click="<?php echo esc_attr( $select_action ); ?>"
					data-wp-on--keydown="<?php echo esc_attr( $select_action ); ?>"
				>
					<span class="sc-payment-toggle__radio" aria-hidden="true">
						<svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="3.42857143" fill="currentColor"></circle></svg>
					</span>
					<div class="sc-payment-toggle__summary">
						<?php echo $args['summary_html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from svg() + esc_html below. ?>
					</div>
					<span class="sc-payment-toggle__chevron" aria-hidden="true">
						<?php echo wp_kses( $chevron_svg, sc_allowed_svg_html() ); ?>
					</span>
				</header>
			<?php endif; ?>

			<?php // A class toggle, not [hidden], so the SDK mount div survives while closed. ?>
			<div
				class="sc-payment-toggle__body"
				<?php if ( $is_card ) : ?>
					data-wp-class--sc-payment-toggle__body--shown="<?php echo esc_attr( $open_getter ); ?>"
					id="<?php echo esc_attr( $row_id ); ?>"
					role="region"
					aria-labelledby="<?php echo esc_attr( $row_id ); ?>-header"
				<?php endif; ?>
			>
				<div class="sc-payment-toggle__content">
					<?php echo $args['body_html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- mount div (static) or wp_kses'd instructions. ?>
				</div>
			</div>
		</div>
