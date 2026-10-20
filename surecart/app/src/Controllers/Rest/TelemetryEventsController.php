<?php

namespace SureCart\Controllers\Rest;

/**
 * Records telemetry events sent from the admin JS.
 */
class TelemetryEventsController {
	/**
	 * Record an event.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response
	 */
	public function create( \WP_REST_Request $request ) {
		return rest_ensure_response(
			[
				'recorded' => \SureCart::telemetry()->record(
					$request->get_param( 'event' ),
					(array) ( $request->get_param( 'properties' ) ?? [] )
				),
			]
		);
	}
}
