<?php
$columns            = $attributes['columns'] ?? 'two';
$show_order_summary = ! isset( $attributes['showOrderSummary'] ) || ! empty( $attributes['showOrderSummary'] );
$classes            = trim(
	'sc-instant-checkout-form is-columns-' . sanitize_html_class( $columns )
		. ( $show_order_summary ? '' : ' is-summary-hidden' )
);

$wrapper_attrs = get_block_wrapper_attributes( array( 'class' => $classes ) );
// `$form_context` is set by controller.php, which runs in this same scope.
$context_payload = wp_interactivity_data_wp_context(
	$form_context ?? array(
		'mode'   => 'live',
		'formId' => 'instant-checkout',
	)
);
$success_title_id = wp_unique_id( 'sc-instant-checkout-success-title-' );
// `---id` (three hyphens): WP 7.1 drops `--id` unique IDs; WP 6.8 reads `---id` as an ignored suffix.
?>
<form
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	<?php echo wp_kses_data( $context_payload ); ?>
	data-wp-init="callbacks.init"
	data-wp-watch="callbacks.watchFormState"
	data-wp-watch---stripe-elements="callbacks.watchStripeElements"
	data-wp-watch---razorpay-methods="callbacks.watchRazorpayMethods"
	data-wp-watch---mollie-methods="callbacks.watchMollieMethods"
	data-wp-on-window--storage="callbacks.syncTabs"
	data-wp-on-window--beforeunload="callbacks.beforeUnload"
	data-wp-on-window--pageshow="callbacks.pageShow"
	data-wp-on--submit="actions.submitForm"
	method="post"
>
	<?php if ( ! empty( $show_not_published ) ) : ?>
		<div class="sc-instant-checkout-not-published"><?php esc_html_e( 'Not Published', 'surecart' ); ?></div>
	<?php endif; ?>

	<input
		type="text"
		name="get_feedback"
		tabindex="-1"
		autocomplete="off"
		aria-hidden="true"
		style="position:absolute;left:-99999px;width:1px;height:1px;overflow:hidden;"
	/>

	<?php
	// Rendered before $content: a nested <form> from any inner block would make the parser close
	// this <form> early and hoist whatever follows out of the interactive region.
	?>
	<?php
	// Success dialog: a fixed overlay above the form, hidden until `state.isComplete`. The copy and
	// links resolve from seeded state. tabindex="-1" lets JS move focus here on completion.
	?>
	<div
		class="sc-instant-checkout-form__success"
		role="dialog"
		aria-modal="true"
		aria-labelledby="<?php echo esc_attr( $success_title_id ); ?>"
		tabindex="-1"
		data-wp-bind--hidden="!state.isComplete"
	>
		<div class="sc-instant-checkout-form__success-card">
			<div class="sc-instant-checkout-form__success-icon" aria-hidden="true">
				<svg viewBox="0 0 24 24" width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</div>
			<h2 class="sc-instant-checkout-form__success-title" id="<?php echo esc_attr( $success_title_id ); ?>" data-wp-text="state.successTitle"></h2>
			<p class="sc-instant-checkout-form__success-description" data-wp-text="state.successDescription"></p>

			<?php
			// innerHTML on purpose: the getter reads the wp_kses_post'd seed copy, since the
			// Interactivity API does not sanitize innerHTML.
			?>
			<div
				class="sc-instant-checkout-form__success-instructions"
				data-wp-bind--hidden="!state.hasSuccessManualInstructions"
				data-wp-bind--innerHTML="state.successManualInstructions"
			></div>

			<a
				class="sc-instant-checkout-form__success-button"
				data-wp-bind--href="state.successContinueUrl"
				data-wp-text="state.successButtonText"
			></a>
		</div>
	</div>

	<?php
	// Before $content for the same reason as the success panel above. The light dim covers API ops
	// (coupon/quantity/bump); the centered spinner+text covers the submit-through-redirect flow.
	?>
	<div class="sc-block-ui" data-wp-bind--hidden="state.hideLoadingOverlay" hidden></div>
	<div class="sc-instant-checkout-form__busy" data-wp-bind--hidden="!state.isProcessing" aria-live="polite" hidden>
		<div class="sc-instant-checkout-form__busy-content">
			<span class="sc-spinner" aria-hidden="true"></span>
			<span class="sc-instant-checkout-form__busy-text" data-wp-text="state.loadingMessage"></span>
		</div>
	</div>

	<?php // Stays rendered on completion; the dialog overlays it and it goes inert. ?>
	<div class="sc-instant-checkout-form__body" data-wp-bind--inert="state.isComplete">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner-block HTML, escaped per-block via get_block_wrapper_attributes / esc_*. ?>
	</div>
</form>
