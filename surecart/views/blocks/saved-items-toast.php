<?php
/**
 * Saved items toast, printed once in the footer of any page that can save items.
 *
 * Driven by the `surecart/saved-items` store; the id is what the store looks it up by.
 *
 * @package SureCart
 */

defined( 'ABSPATH' ) || exit;
?>
<div
	id="sc-saved-items-toast"
	class="sc-saved-items-toast"
	popover="manual"
	data-wp-interactive='{ "namespace": "surecart/saved-items" }'
	data-wp-on-document--keydown="actions.onToastShortcut"
	data-wp-on--mouseenter="actions.pauseToast"
	data-wp-on--mouseleave="actions.resumeToast"
	data-wp-on--focusin="actions.pauseToast"
	data-wp-on--focusout="actions.resumeToast"
>
	<?php // Announced through wp.a11y.speak(); a live region inside a hidden popover isn't reliable. ?>
	<span class="sc-saved-items-toast__message" data-wp-text="state.toast.message"></span>
	<button type="button" class="sc-saved-items-toast__action sc-button__link" data-wp-bind--hidden="!state.toast.action" data-wp-class--sc-button__link--busy="state.toast.busy" data-wp-bind--aria-busy="state.toast.busy" data-wp-on--click="actions.runToastAction" hidden>
		<span class="sc-spinner" aria-hidden="true"></span>
		<span class="sc-button__link-text" data-wp-text="state.toast.action"></span>
	</button>
	<button type="button" class="sc-saved-items-toast__close" aria-label="<?php esc_attr_e( 'Dismiss', 'surecart' ); ?>" data-wp-on--click="actions.dismissToast">
		<?php echo wp_kses( SureCart::svg()->get( 'x', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
	</button>
</div>
