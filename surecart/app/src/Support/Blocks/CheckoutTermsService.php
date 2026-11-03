<?php

namespace SureCart\Support\Blocks;

/**
 * Builds the "I agree to the Terms / Privacy Policy" checkout copy from the
 * account's customer portal protocol.
 */
class CheckoutTermsService {
	/**
	 * The terms html, or '' when the account has neither a terms nor a privacy URL.
	 *
	 * @return string
	 */
	public static function text(): string {
		$terms_url   = \SureCart::account()->customer_portal_protocol->terms_url;
		$privacy_url = \SureCart::account()->customer_portal_protocol->privacy_url;

		if ( ! empty( $terms_url ) && ! empty( $privacy_url ) ) {
			return sprintf(
				// translators: %1$1s is the store name, %2$2s is the opening anchor tag, %3$3s is the closing anchor tag, %4$4s is the opening anchor tag, %5$5s is the closing anchor tag.
				__( "I agree to %1$1s's %2$2sTerms%3$3s and %4$4sPrivacy Policy%5$5s", 'surecart' ),
				esc_html( \SureCart::account()->name ),
				'<a href="' . esc_url( $terms_url ) . '" target="_blank">',
				'</a>',
				'<a href="' . esc_url( $privacy_url ) . '" target="_blank">',
				'</a>'
			);
		}

		if ( $terms_url ) {
			return sprintf(
				// translators: %1$1s is the store name, %2$2s is the opening anchor tag, %3$3s is the closing anchor tag.
				__( "I agree to %1$1s's %2$2sTerms%3$3s", 'surecart' ),
				esc_html( \SureCart::account()->name ),
				'<a href="' . esc_url( $terms_url ) . '" target="_blank">',
				'</a>'
			);
		}

		if ( $privacy_url ) {
			return sprintf(
				// translators: %1$1s is the store name, %2$2s is the opening anchor tag, %3$3s is the closing anchor tag.
				__( "I agree to %1$1s's %2$2sPrivacy Policy%3$3s", 'surecart' ),
				esc_html( \SureCart::account()->name ),
				'<a href="' . esc_url( $privacy_url ) . '" target="_blank">',
				'</a>'
			);
		}

		return '';
	}
}
