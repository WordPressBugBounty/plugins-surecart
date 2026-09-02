<?php

namespace SureCart\Controllers\Admin\Forms;

use SureCart\Models\Form;

/**
 * Handles checkout form admin actions.
 */
class FormsController {
	/**
	 * Duplicate a checkout form and redirect back to the forms list.
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 *
	 * @return \SureCartCore\Responses\RedirectResponse
	 */
	public function duplicate( $request ) {
		$duplicated = Form::duplicate( (int) $request->query( 'id' ) );

		if ( is_wp_error( $duplicated ) ) {
			wp_die(
				esc_html( $duplicated->get_error_message() ),
				'',
				[ 'response' => (int) ( ( (array) $duplicated->get_error_data() )['status'] ?? 403 ) ]
			);
		}

		return \SureCart::redirect()->to(
			esc_url_raw(
				add_query_arg(
					[
						'post_type'  => \SureCart::forms()->getPostType(),
						'duplicated' => true,
					],
					admin_url( 'edit.php' )
				)
			)
		);
	}
}
