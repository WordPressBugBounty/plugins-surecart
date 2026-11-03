<?php
/**
 * Checkout-level error alert — pure HTML wired to `surecart/checkout-form::state.hasError` +
 * state.displayErrorTitle + state.errorAdditional[].
 */

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-instant-checkout-errors sc-alert' )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	role="alert"
	aria-live="assertive"
	data-wp-bind--hidden="!state.hasError"
	data-wp-class--sc-alert__alert--warning="state.errorIsWarning"
	data-wp-class--sc-alert__alert--primary="state.errorIsPrimary"
	data-wp-class--sc-alert__alert--danger="state.errorIsDanger"
	hidden
>
	<div class="sc-alert__icon" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<circle cx="12" cy="12" r="10"></circle>
			<line x1="12" y1="8" x2="12" y2="12"></line>
			<line x1="12" y1="16" x2="12.01" y2="16"></line>
		</svg>
	</div>
	<div class="sc-alert__body">
		<div class="sc-alert__title" data-wp-bind--hidden="!state.displayErrorTitle" data-wp-text="state.displayErrorTitle"></div>
		<template data-wp-each--message="state.errorAdditional">
			<div class="sc-alert__message" data-wp-text="context.message"></div>
		</template>
	</div>
</div>
