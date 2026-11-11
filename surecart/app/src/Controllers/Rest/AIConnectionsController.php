<?php

namespace SureCart\Controllers\Rest;

/**
 * Lists the current user's connected AI assistants.
 */
class AIConnectionsController extends RestController {
	/**
	 * List connections, with the server time so the client can compare without clock skew.
	 *
	 * @param \WP_REST_Request $request The REST request.
	 *
	 * @return \WP_REST_Response
	 */
	public function index( \WP_REST_Request $request ) {
		$response = rest_ensure_response(
			[
				'now'         => time(),
				'connections' => \SureCart::aiConnections()->connections( get_current_user_id() ),
			]
		);

		// polled while the setup wizard waits for the AI, so never cache it.
		$response->header( 'Cache-Control', 'no-store' );

		return $response;
	}
}
