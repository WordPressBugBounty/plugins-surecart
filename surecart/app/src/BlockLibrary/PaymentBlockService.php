<?php

namespace SureCart\BlockLibrary;

/**
 * Renders the shared instant-checkout payment accordion markup.
 */
class PaymentBlockService {
	/**
	 * Render a single accordion row.
	 *
	 * @param array  $args {
	 *     Row arguments.
	 *
	 *     @type string $row_id         DOM id for the row body (the header gets `-header`).
	 *     @type string $body_html      Inner body HTML (mount div / placeholder / instructions).
	 *     @type string $summary_html   The summary content (icon + label).
	 *     @type string $open_getter    Reactive getter that is true when this row is selected/open.
	 *     @type string $select_action  Store action to run on click/Enter/Space.
	 *     @type string $hidden_getter  Optional getter that is true when this row is hidden.
	 *     @type array  $context        data-wp-context payload identifying this row.
	 *     @type bool   $is_card        Whether the row is a radio accordion (radio + chevron).
	 * }
	 * @param string $chevron_svg The chevron SVG markup.
	 * @return string
	 */
	public function row( array $args, $chevron_svg ): string {
		return \SureCart::view( 'blocks/checkout-payment-row' )
			->with(
				array(
					'args'        => $args,
					'chevron_svg' => $chevron_svg,
				)
			)
			->toString();
	}

	/**
	 * Build the "Another step will appear…" placeholder card body.
	 *
	 * The label is static unless $label_bind is set (mollie/razorpay tiles read `context.method`).
	 *
	 * @param string $icon_html         Escaped icon markup. Empty skips the icon row.
	 * @param string $label             Static "X selected for check out." label.
	 * @param string $label_bind        Optional `data-wp-text` getter for reactive tiles.
	 * @param string $instructions_html Optional escaped instructions (manual methods).
	 * @return string
	 */
	public function selectedBody( $icon_html, $label = '', $label_bind = '', $instructions_html = '' ): string {
		return \SureCart::view( 'blocks/checkout-payment-selected-body' )
			->with(
				array(
					'icon_html'         => $icon_html,
					'label'             => $label,
					'label_bind'        => $label_bind,
					'instructions_html' => $instructions_html,
				)
			)
			->toString();
	}

	/**
	 * Render a `data-wp-each` method-tile template (mollie / razorpay per-method rows).
	 *
	 * @param array  $args {
	 *     Tile arguments.
	 *
	 *     @type string $each_source        The `state.*Methods` getter iterated by data-wp-each.
	 *     @type string $open_getter        Getter true when this method's row is open.
	 *     @type string $select_action      Store action fired on click/Enter/Space.
	 *     @type string $row_hidden_getter  Optional getter hiding the row (razorpay only).
	 *     @type string $header_icon_html   Pre-built icon markup for the toggle header summary.
	 *     @type string $body_icon_html     Pre-built icon markup for the placeholder card.
	 *     @type string $label_expr         `context.method.*` path for the label binds.
	 * }
	 * @param string $chevron_svg The chevron SVG markup.
	 * @return string
	 */
	public function methodTile( array $args, $chevron_svg ): string {
		return \SureCart::view( 'blocks/checkout-payment-method-tile' )
			->with(
				array(
					'args'        => $args,
					'chevron_svg' => $chevron_svg,
				)
			)
			->toString();
	}
}
