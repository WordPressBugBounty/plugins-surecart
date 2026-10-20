<?php

namespace SureCart\WordPress\PostTypes;

/**
 * Switches a checkout form between test and live mode.
 */
class FormModeService {
	/**
	 * Write the mode onto the form's first `surecart/form` block, wherever it sits in the content.
	 *
	 * @param int    $form_id Form post id.
	 * @param string $mode    `live` or `test`.
	 * @return int|\WP_Error The form post id, or an error for an unknown mode or a missing form or form block.
	 */
	public static function set( int $form_id, string $mode ) {
		if ( ! in_array( $mode, [ 'live', 'test' ], true ) ) {
			return new \WP_Error( 'sc_form_mode_invalid', __( 'Checkout form mode must be live or test.', 'surecart' ), [ 'status' => 422 ] );
		}

		$form = get_post( $form_id );
		if ( empty( $form ) ) {
			return new \WP_Error( 'sc_form_not_found', __( 'Checkout form not found.', 'surecart' ), [ 'status' => 404 ] );
		}

		$blocks = parse_blocks( $form->post_content );
		if ( ! self::setFirstFormMode( $blocks, $mode ) ) {
			return new \WP_Error( 'sc_form_block_missing', __( 'There is no checkout form block on this form.', 'surecart' ), [ 'status' => 422 ] );
		}

		return wp_update_post(
			[
				'ID'           => $form->ID,
				// wp_update_post() unslashes, which would strip the \u0026-style escapes in serialized attributes.
				'post_content' => wp_slash( serialize_blocks( $blocks ) ),
			],
			true
		);
	}

	/**
	 * Set the mode on the first `surecart/form` block in a parsed tree, in place.
	 *
	 * Walks innerBlocks too, and leaves every other block as parsed so siblings and wrappers survive the save.
	 *
	 * @param array  $blocks Parsed blocks.
	 * @param string $mode   `live` or `test`.
	 * @return bool Whether a form block was found.
	 */
	protected static function setFirstFormMode( array &$blocks, string $mode ): bool {
		foreach ( $blocks as &$block ) {
			if ( 'surecart/form' === ( $block['blockName'] ?? null ) ) {
				$block['attrs']['mode'] = $mode;
				return true;
			}

			if ( ! empty( $block['innerBlocks'] ) && self::setFirstFormMode( $block['innerBlocks'], $mode ) ) {
				return true;
			}
		}

		return false;
	}
}
