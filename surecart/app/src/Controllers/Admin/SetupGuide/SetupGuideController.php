<?php

namespace SureCart\Controllers\Admin\SetupGuide;

use SureCart\Controllers\Admin\AdminController;

/**
 * Handles setup guide admin page requests.
 */
class SetupGuideController extends AdminController {

	/**
	 * Render the setup guide shell; the app boots into it from the localized status.
	 *
	 * @return \SureCartCore\View\ViewInterface
	 */
	public function index() {
		// don't show admin notices on the setup guide page.
		remove_all_actions( 'admin_notices' );

		// add header.
		$this->withHeader(
			[
				'breadcrumbs' => [
					[
						'title' => __( 'Setup guide', 'surecart' ),
					],
				],
				// The guide draws its own header; still rendered so a client-side swap away can reveal it.
				'hidden'      => true,
			]
		);

		// enqueue needed script.
		add_action( 'admin_enqueue_scripts', \SureCart::closure()->method( SetupGuideScriptsController::class, 'enqueue' ) );

		// return view.
		return \SureCart::view( 'admin/setup-guide-page' );
	}
}
