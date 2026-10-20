<?php

namespace SureCart\Controllers\Admin\SetupGuide;

use SureCart\Support\Scripts\AdminModelEditController;

/**
 * Setup guide scripts — boots the unified admin app with the guide's status
 * on top of the shared unified payload.
 */
class SetupGuideScriptsController extends AdminModelEditController {
	/**
	 * Script handle.
	 *
	 * @var string
	 */
	protected $handle = 'surecart/scripts/admin/setup-guide';

	/**
	 * Script path.
	 *
	 * @var string
	 */
	protected $path = self::UNIFIED_SPA_PATH;

	/**
	 * Boot data the setup guide reads beyond the shared unified payload.
	 *
	 * Status costs platform API calls, so it is localized only on this boot
	 * and served from the boot REST endpoint when the unified shell swaps the
	 * screen in client-side — never on every page.
	 *
	 * @return array
	 */
	public static function bootData() {
		// A claim or a new product lands on the platform while the account and its lists stay cached for 15 minutes.
		$status  = \SureCart::setupGuide()->status( true );
		$account = \SureCart::account();
		$brand   = $account->brand;

		return array_merge(
			$status,
			[
				'admin_ajax_url'        => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
				'surecart_app_url'      => defined( 'SURECART_APP_URL' ) ? SURECART_APP_URL : '',
				// The account service has no __isset, so `??` would always fall through.
				'account_id'            => $account->id ?: '',
				'checkout_page_url'     => \SureCart::getUrl()->checkout(),
				'is_woocommerce_active' => class_exists( 'WooCommerce' ),
				// Picks the processor when onboarding saved no country.
				'account_country'       => $brand->address->country ?? '',
				// True, false, or null when unanswered. wp_localize_script() stringifies the booleans.
				'telemetry_consent'     => \SureCart::telemetry()->consent(),
			]
		);
	}

	/**
	 * Enqueue scripts with additional setup guide data.
	 *
	 * @return void
	 */
	public function enqueue() {
		$this->data = array_merge( $this->data, self::bootData() );
		parent::enqueue();
	}
}
