<?php

declare(strict_types=1);

namespace SureCart\Controllers\Web;

use SureCart\WordPress\PostTypes\FormModeService;

/**
 * Handles Checkout related routes.
 */
class CheckoutFormsController {

	/**
	 * Toggle the checkout form between test and live mode.
	 */
	public function changeMode() {
		$form_post_id       = get_query_var( 'sc_checkout_change_mode' );
		$checkout_post_id   = get_query_var( 'sc_checkout_post' );
		$form_post          = get_post( $form_post_id );
		$checkout_page_post = get_post( $checkout_post_id );

		if ( empty( $form_post ) || empty( $checkout_page_post ) ) {
			wp_die( esc_html__( 'Invalid request.', 'surecart' ) );
		}

		$form_block = \SureCart::post()->getFormBlock( $checkout_page_post );
		if ( ! $form_block ) {
			wp_die( esc_html__( 'There is no checkout form block on this page.', 'surecart' ) );
		}

		// Flip the mode.
		$mode    = $form_block['attrs']['mode'] ?? 'live';
		$updated = FormModeService::set( (int) $form_post_id, 'test' === $mode ? 'live' : 'test' );
		if ( is_wp_error( $updated ) ) {
			wp_die( esc_html( $updated->get_error_message() ) );
		}

		// Redirect to the checkout page.
		return \SureCart::redirect()->to( get_permalink( $checkout_post_id ) );
	}
}
