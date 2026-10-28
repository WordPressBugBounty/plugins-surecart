<?php

namespace SureCart\Controllers\Admin\Onboarding;

use SureCart\Support\Scripts\AdminModelEditController;

/**
 * Onboarding Page
 */
class OnboardingScriptsController extends AdminModelEditController {
	/**
	 * Script handle.
	 *
	 * @var string
	 */
	protected $handle = 'surecart/scripts/admin/onboarding';

	/**
	 * Script path.
	 *
	 * @var string
	 */
	protected $path = 'admin/onboarding';

	/**
	 * Include supported currencies.
	 *
	 * @var array
	 */
	protected $with_data = [ 'supported_currencies' ];

	/**
	 * Add additional data.
	 *
	 * @return void
	 */
	public function enqueue() {
		$this->data['user_email']      = is_user_logged_in() ? wp_get_current_user()->user_email : '';
		$this->data['setup_guide_url'] = esc_url_raw( admin_url( 'admin.php?page=sc-setup-guide&from=after_onboarding' ) );
		// True, false, or null when unanswered. wp_localize_script() stringifies the booleans.
		$this->data['telemetry_consent']     = \SureCart::telemetry()->consent();
		$this->data['telemetry_privacy_url'] = \SureCart\Telemetry\TelemetryService::PRIVACY_URL;
		$this->data['surecart_terms_url']    = 'https://surecart.com/terms';
		$this->data['suggested_store_name']  = $this->suggestedStoreName();

		parent::enqueue();
	}

	/**
	 * The site title to prefill the store name with, unless it is WordPress's default.
	 *
	 * Not `site_name`: the parent sets that after this runs, HTML-escaped.
	 *
	 * @return string
	 */
	protected function suggestedStoreName(): string {
		$name = trim( wp_specialchars_decode( get_bloginfo( 'name', 'raw' ), ENT_QUOTES ) );

		$defaults = [
			'My WordPress Website',
			__( 'My WordPress Website', 'surecart' ),
		];

		return in_array( $name, $defaults, true ) ? '' : $name;
	}
}
