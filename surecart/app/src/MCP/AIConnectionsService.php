<?php

namespace SureCart\MCP;

/**
 * Knows which application passwords belong to connected AI assistants.
 *
 * Every AI client (MCP clients and ChatGPT's Abilities REST action) signs in with an
 * application password, so the first authenticated request to an AI route is the
 * "connected" signal and the first tool call is the "answered a question" signal.
 * Listing and revoking reuse core's application passwords; only the AI-specific
 * timestamps are stored here, in user meta keyed by application password uuid.
 */
class AIConnectionsService {
	/**
	 * User meta holding `{ uuid: { connected_at, last_used_at, first_question_at } }`.
	 *
	 * @var string
	 */
	const META_KEY = 'surecart_ai_connections';

	/**
	 * Minimum seconds between `last_used_at` writes, so a chatty session isn't a write per request.
	 *
	 * @var int
	 */
	const TOUCH_INTERVAL = 60;

	/**
	 * Register WordPress hooks.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_filter( 'rest_request_before_callbacks', array( $this, 'track' ), 10, 3 );
		add_action( 'wp_delete_application_password', array( $this, 'forget' ), 10, 2 );
	}

	/**
	 * Record AI use of an application password. Passes the response through untouched.
	 *
	 * @param mixed            $response Response to replace the requested version with.
	 * @param array            $handler  Route handler.
	 * @param \WP_REST_Request $request  The request.
	 *
	 * @return mixed
	 */
	public function track( $response, $handler, $request ) {
		if ( is_wp_error( $response ) || ! function_exists( 'rest_get_authenticated_app_password' ) ) {
			return $response;
		}

		$uuid = rest_get_authenticated_app_password();
		$kind = $uuid ? $this->requestKind( $request ) : null;
		if ( $kind ) {
			$this->record( get_current_user_id(), $uuid, 'question' === $kind );
		}

		return $response;
	}

	/**
	 * Is this request an AI connecting, or an AI running a tool?
	 *
	 * @param \WP_REST_Request $request The request.
	 *
	 * @return string|null 'question', 'connect', or null when it isn't an AI route.
	 */
	protected function requestKind( \WP_REST_Request $request ) {
		$route = $request->get_route();

		// MCP adapter servers (JSON-RPC: a tool call is the AI answering something).
		if ( 0 === strpos( $route, '/mcp/' ) ) {
			$body = $request->get_json_params();
			return 'tools/call' === ( $body['method'] ?? '' ) ? 'question' : 'connect';
		}

		// Core Abilities REST API, used by the ChatGPT custom GPT action.
		if ( 0 === strpos( $route, '/wp-abilities/' ) ) {
			return '/run' === substr( $route, -4 ) ? 'question' : 'connect';
		}

		return null;
	}

	/**
	 * Store the timestamps for one application password.
	 *
	 * @param int    $user_id     The user the password belongs to.
	 * @param string $uuid        Application password uuid.
	 * @param bool   $is_question Whether this request ran a tool.
	 *
	 * @return void
	 */
	public function record( int $user_id, string $uuid, bool $is_question ) {
		$all   = $this->stored( $user_id );
		$now   = time();
		$entry = $all[ $uuid ] ?? array(
			'connected_at'      => $now,
			'last_used_at'      => 0,
			'first_question_at' => null,
		);

		$touch    = $now - (int) $entry['last_used_at'] >= self::TOUCH_INTERVAL;
		$question = $is_question && empty( $entry['first_question_at'] );
		if ( ! $touch && ! $question && isset( $all[ $uuid ] ) ) {
			return;
		}

		$entry['last_used_at'] = $now;
		if ( $question ) {
			$entry['first_question_at'] = $now;
		}

		$all[ $uuid ] = $entry;
		update_user_meta( $user_id, self::META_KEY, $all );
	}

	/**
	 * Drop the timestamps when core deletes the application password.
	 *
	 * @param int   $user_id The user id.
	 * @param array $item    The deleted application password.
	 *
	 * @return void
	 */
	public function forget( $user_id, $item ) {
		$all = $this->stored( (int) $user_id );
		if ( isset( $item['uuid'], $all[ $item['uuid'] ] ) ) {
			unset( $all[ $item['uuid'] ] );
			update_user_meta( (int) $user_id, self::META_KEY, $all );
		}
	}

	/**
	 * The user's AI connections, most recently used first.
	 *
	 * Only application passwords that still exist and have been used by an AI are listed.
	 *
	 * @param int $user_id The user id.
	 *
	 * @return array<int, array{uuid: string, name: string, connected_at: int, last_used_at: int, first_question_at: int|null}>
	 */
	public function connections( int $user_id ): array {
		$stored = $this->stored( $user_id );
		$list   = array();

		foreach ( \WP_Application_Passwords::get_user_application_passwords( $user_id ) as $password ) {
			if ( empty( $stored[ $password['uuid'] ] ) ) {
				continue;
			}
			$entry  = $stored[ $password['uuid'] ];
			$list[] = array(
				'uuid'              => $password['uuid'],
				'name'              => $password['name'],
				'connected_at'      => (int) $entry['connected_at'],
				'last_used_at'      => (int) $entry['last_used_at'],
				'first_question_at' => $entry['first_question_at'] ? (int) $entry['first_question_at'] : null,
			);
		}

		usort(
			$list,
			function ( $a, $b ) {
				return $b['last_used_at'] <=> $a['last_used_at'];
			}
		);

		return $list;
	}

	/**
	 * The raw stored timestamps.
	 *
	 * @param int $user_id The user id.
	 *
	 * @return array
	 */
	protected function stored( int $user_id ): array {
		$all = get_user_meta( $user_id, self::META_KEY, true );
		return is_array( $all ) ? $all : array();
	}
}
