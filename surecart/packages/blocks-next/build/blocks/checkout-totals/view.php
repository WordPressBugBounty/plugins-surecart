<?php
$order_summary_text     = ! empty( $attributes['orderSummaryText'] ) ? $attributes['orderSummaryText'] : __( 'Summary', 'surecart' );
$collapsible            = ! empty( $attributes['collapsible'] );
$collapsed_on_mobile    = ! empty( $attributes['collapsedOnMobile'] );
$collapsed_on_desktop   = ! empty( $attributes['collapsedOnDesktop'] );
$initially_closed = $collapsed_on_mobile || $collapsed_on_desktop;

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-totals' . ( $collapsible ? ' is-collapsible' : '' ) )
);

$context_payload = wp_interactivity_data_wp_context(
	array(
		'totalsCollapsed'    => $initially_closed,
		'collapsedOnMobile'  => $collapsed_on_mobile,
		'collapsedOnDesktop' => $collapsed_on_desktop,
	)
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	<?php echo wp_kses_data( $context_payload ); ?>
	<?php if ( $collapsible ) : ?>
		data-wp-init="callbacks.initTotalsCollapsed"
	<?php endif; ?>
>
	<?php if ( $collapsible ) : ?>
		<button
			type="button"
			class="sc-checkout-totals__toggle sc-button-reset sc-button-unstyled"
			data-wp-on--click="actions.toggleTotalsCollapsed"
			data-wp-bind--aria-expanded="!context.totalsCollapsed"
		>
			<span class="sc-checkout-totals__title"><?php echo esc_html( $order_summary_text ); ?></span>
			<svg class="sc-checkout-totals__chevron" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
			<span class="sc-checkout-totals__price">
				<span
					class="sc-checkout-totals__scratch"
					data-wp-bind--hidden="!state.headerShowScratchTotal"
					data-wp-text="state.checkout.total_scratch_display_amount"
				></span>
				<span class="sc-checkout-totals__total" data-wp-text="state.headerTotalDisplay"></span>
			</span>
		</button>
	<?php endif; ?>
	<div
		class="sc-checkout-totals__content"
		<?php if ( $collapsible ) : ?>
			data-wp-bind--hidden="context.totalsCollapsed"
		<?php endif; ?>
	>
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP-rendered inner blocks. ?>
	</div>
</div>
