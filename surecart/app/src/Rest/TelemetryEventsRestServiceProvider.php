<?php

namespace SureCart\Rest;

use SureCart\Controllers\Rest\TelemetryEventsController;
use SureCart\Rest\RestServiceInterface;
use SureCart\Telemetry\TelemetryService;

/**
 * Service provider for the telemetry events route.
 */
class TelemetryEventsRestServiceProvider extends RestServiceProvider implements RestServiceInterface {
	/**
	 * Max encoded size of an event's properties, in bytes.
	 *
	 * @var int
	 */
	const MAX_PROPERTIES_BYTES = 4096;

	/**
	 * Endpoint.
	 *
	 * @var string
	 */
	protected $endpoint = 'telemetry_events';

	/**
	 * Rest Controller
	 *
	 * @var string
	 */
	protected $controller = TelemetryEventsController::class;

	/**
	 * Methods allowed for the model.
	 *
	 * @var array
	 */
	protected $methods = [];

	/**
	 * Register REST Routes
	 *
	 * @return void
	 */
	public function registerRoutes() {
		register_rest_route(
			"$this->name/v$this->version",
			"$this->endpoint",
			[
				[
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => $this->callback( $this->controller, 'create' ),
					'permission_callback' => [ $this, 'create_item_permissions_check' ],
					'args'                => [
						'event'      => [
							'type'     => 'string',
							'enum'     => TelemetryService::clientEvents(),
							'required' => true,
						],
						'properties' => [
							'type'              => 'object',
							'default'           => [],
							'validate_callback' => [ $this, 'validateProperties' ],
						],
					],
				],
				'schema' => [ $this, 'get_item_schema' ],
			]
		);
	}

	/**
	 * Properties must be an object and small.
	 *
	 * @param mixed            $value   The properties.
	 * @param \WP_REST_Request $request The request.
	 * @param string           $param   The param name.
	 *
	 * @return true|\WP_Error
	 */
	public function validateProperties( $value, $request, $param ) {
		$valid = rest_validate_request_arg( $value, $request, $param );
		if ( is_wp_error( $valid ) ) {
			return $valid;
		}

		// rest_is_object() accepts any array, so a JSON list would pass as an object.
		if ( ! empty( $value ) && wp_is_numeric_array( $value ) ) {
			return new \WP_Error( 'rest_invalid_type', __( 'Properties must be an object.', 'surecart' ) );
		}

		if ( strlen( (string) wp_json_encode( $value ) ) > self::MAX_PROPERTIES_BYTES ) {
			return new \WP_Error( 'rest_invalid_param', __( 'Properties are too large.', 'surecart' ) );
		}

		return true;
	}

	/**
	 * Only admins record events.
	 *
	 * @param \WP_REST_Request $request Full details about the request.
	 *
	 * @return boolean
	 */
	public function create_item_permissions_check( $request ) {
		return current_user_can( 'manage_options' );
	}
}
