<?php

namespace SureCart\Middleware;

use Closure;
use SureCart\Models\Account;
use SureCartCore\Requests\RequestInterface;

/**
 * Middleware for handling model archiving.
 */
class AccountClaimMiddleware {
	/**
	 * Handle the middleware.
	 *
	 * @param RequestInterface $request Request.
	 * @param Closure          $next Next.
	 * @param string           $model_name Model name.
	 * @return function
	 */
	public function handle( RequestInterface $request, Closure $next ) {
		$account = Account::find();

		$guide = esc_url_raw( \SureCart::routeUrl( 'setup_guide.show' ) );

		// Sending the merchant to the claim url would loop back here; the guide explains what's left.
		if ( is_wp_error( $account ) ) {
			return \SureCart::redirect()->to( esc_url_raw( add_query_arg( 'claim_error', 1, $guide ) ) );
		}

		if ( $account->claimed ) {
			// clear the account cache.
			\SureCart::account()->clearCache();
			// back to the setup guide, which picks the claim up on load.
			return \SureCart::redirect()->to( $guide );
		}

		// An expired claim can only be finished by support, which the guide points to.
		if ( $account->claim_expired ) {
			return \SureCart::redirect()->to( $guide );
		}

		if ( empty( $account->claim_url ) ) {
			return \SureCart::redirect()->to( esc_url_raw( add_query_arg( 'claim_error', 1, $guide ) ) );
		}

		// redirect back here to handle invalidating cache.
		return \SureCart::redirect()->to( esc_url_raw( add_query_arg( [ [ 'onboarding' => [ 'return_url' => \SureCart::routeUrl( 'account.claim' ) ] ] ], $account->claim_url ) ) );
	}
}
