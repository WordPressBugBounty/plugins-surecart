<?php

namespace SureCart\Controllers\Admin\Onboarding;

use SureCart\Models\ApiToken;

/**
 * Handles onboarding http requests.
 */
class OnboardingController {
	/**
	 * Show the onboarding page.
	 *
	 * @return string
	 */
	public function show() {
		add_action( 'admin_enqueue_scripts', \SureCart::closure()->method( OnboardingScriptsController::class, 'enqueue' ) );

		// return view.
		return '<div id="app"></div>';
	}

	/**
	 * The hosted signup used to return here with a token form; connected stores go to the setup guide, the rest to onboarding.
	 *
	 * @return \SureCartCore\Responses\RedirectResponse
	 */
	public function completeSignup() {
		if ( ApiToken::get() ) {
			return \SureCart::redirect()->to( esc_url_raw( \SureCart::routeUrl( 'setup_guide.show' ) ) );
		}

		return \SureCart::redirect()->to( esc_url_raw( \SureCart::routeUrl( 'onboarding.show' ) ) );
	}
}
