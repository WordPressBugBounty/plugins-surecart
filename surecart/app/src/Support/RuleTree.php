<?php

namespace SureCart\Support;

/**
 * Rule trees for the platform's `POST /{resource}/filter` endpoints.
 *
 * Shared by the REST list endpoints and the filter abilities so both accept
 * exactly the same shape.
 */
class RuleTree {
	/**
	 * Deepest group nesting accepted.
	 *
	 * @var int
	 */
	const MAX_DEPTH = 10;

	/**
	 * Most conditions accepted in one group.
	 *
	 * @var int
	 */
	const MAX_CONDITIONS = 50;

	/**
	 * Rebuild a clean rule tree from known keys only, or explain why it is invalid.
	 *
	 * @param mixed $rules The raw rule tree (condition or group).
	 * @param int   $depth Current recursion depth, used to bound deeply nested input.
	 *
	 * @return array|\WP_Error Clean rule tree, or WP_Error if structurally invalid.
	 */
	public static function sanitize( $rules, $depth = 0 ) {
		if ( $depth > self::MAX_DEPTH ) {
			return new \WP_Error( 'invalid_filter', __( 'Filter rule tree is too deeply nested.', 'surecart' ), array( 'status' => 400 ) );
		}

		if ( ! is_array( $rules ) || empty( $rules ) ) {
			return new \WP_Error( 'invalid_filter', __( 'The filter must be a condition or group object.', 'surecart' ), array( 'status' => 400 ) );
		}

		$type = sanitize_text_field( $rules['type'] ?? '' );

		if ( 'group' === $type ) {
			$combinator = sanitize_text_field( $rules['combinator'] ?? '' );
			if ( ! in_array( $combinator, array( 'and', 'or' ), true ) ) {
				return new \WP_Error( 'invalid_filter', __( 'A group combinator must be "and" or "or".', 'surecart' ), array( 'status' => 400 ) );
			}

			$conditions = $rules['conditions'] ?? array();
			if ( ! is_array( $conditions ) || empty( $conditions ) ) {
				return new \WP_Error( 'invalid_filter', __( 'A group must have at least one condition.', 'surecart' ), array( 'status' => 400 ) );
			}

			if ( count( $conditions ) > self::MAX_CONDITIONS ) {
				return new \WP_Error(
					'invalid_filter',
					/* translators: %d: maximum number of conditions in one group. */
					sprintf( __( 'A group has too many conditions (max %d).', 'surecart' ), self::MAX_CONDITIONS ),
					array( 'status' => 400 )
				);
			}

			$clean = array();
			// array_values: query-string groups arrive keyed "0","1"… and must serialize as a JSON list.
			foreach ( array_values( $conditions ) as $condition ) {
				$sanitized = self::sanitize( $condition, $depth + 1 );
				if ( is_wp_error( $sanitized ) ) {
					return $sanitized;
				}
				$clean[] = $sanitized;
			}

			return array(
				'type'       => 'group',
				'combinator' => $combinator,
				'conditions' => $clean,
			);
		}

		if ( 'condition' === $type ) {
			$value = $rules['comparison_value'] ?? '';
			// The platform schema types comparison_value as a string; multi-value matching is an or-group.
			if ( ! is_scalar( $value ) ) {
				return new \WP_Error( 'invalid_filter', __( 'A condition comparison_value must be a single value; use an "or" group to match several.', 'surecart' ), array( 'status' => 400 ) );
			}
			return array(
				'type'             => 'condition',
				'attribute_name'   => sanitize_text_field( $rules['attribute_name'] ?? '' ),
				'operator_label'   => sanitize_text_field( $rules['operator_label'] ?? '' ),
				'comparison_value' => sanitize_text_field( (string) $value ),
			);
		}

		return new \WP_Error( 'invalid_filter', __( 'Each rule must have a type of "condition" or "group".', 'surecart' ), array( 'status' => 400 ) );
	}

	/**
	 * REST arg definition for a list endpoint's `filter` param.
	 *
	 * @return array
	 */
	public static function restArg() {
		return array(
			'description'       => esc_html__( 'Rule tree (condition or and/or group) evaluated by the platform filter endpoint. When set, customer_ids is ignored; sort and query still apply.', 'surecart' ),
			'type'              => 'object',
			// Rebuilds and validates in one walk; WP turns a WP_Error here into a 400 before the
			// permission check. A separate validate_callback would walk the same tree twice.
			'sanitize_callback' => function ( $value ) {
				return self::sanitize( $value );
			},
		);
	}
}
