<?php

namespace SureCart\Controllers\Rest;

/**
 * Setup guide status and actions.
 */
class SetupGuideController {
	/**
	 * Current progress. `refresh=1` drops the cached account first; `include=next` adds the next-step signals.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response
	 */
	public function status( \WP_REST_Request $request ) {
		return rest_ensure_response(
			\SureCart::setupGuide()->status(
				rest_sanitize_boolean( $request->get_param( 'refresh' ) ),
				in_array( 'next', wp_parse_list( $request->get_param( 'include' ) ?? '' ), true )
			)
		);
	}

	/**
	 * Merge onboarding answers and dismissals into the option; anything else in the body is ignored.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return \WP_REST_Response
	 */
	public function update( \WP_REST_Request $request ) {
		return rest_ensure_response( \SureCart::setupGuide()->update( array_intersect_key( $request->get_params(), array_flip( [ 'onboarding', 'dismissed' ] ) ) ) );
	}

	/**
	 * Put the default checkout form live.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function launch() {
		$launched = \SureCart::setupGuide()->launch();
		if ( is_wp_error( $launched ) ) {
			return $launched;
		}

		return rest_ensure_response( $launched );
	}

	/**
	 * Add the platform's demo products.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function seed() {
		$account = \SureCart::setupGuide()->seed();
		if ( is_wp_error( $account ) ) {
			return $account;
		}

		return rest_ensure_response( $account->toArray() );
	}
}
