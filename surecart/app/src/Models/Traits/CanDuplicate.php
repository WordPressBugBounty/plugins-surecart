<?php

namespace SureCart\Models\Traits;

/**
 * If the model has an attached customer.
 */
trait CanDuplicate {
	/**
	 * Duplicate the model.
	 *
	 * @param string $id The ID of the model to duplicate.
	 * @return $this|\WP_Error
	 */
	protected function duplicate( $id = '' ) {
		if ( $id && empty( $this->attributes['id'] ) ) {
			$this->attributes['id'] = $id;
		}

		if ( $this->fireModelEvent( 'duplicating' ) === false ) {
			return false;
		}

		if ( empty( $this->attributes['id'] ) ) {
			return new \WP_Error( 'not_saved', 'Please create the model first.' );
		}

		$duplicated = \SureCart::request(
			$this->endpoint . '/' . $this->attributes['id'] . '/duplicate/',
			[
				'method' => 'POST',
				'query'  => $this->query,
			]
		);

		if ( is_wp_error( $duplicated ) ) {
			return $this->duplicateError( $duplicated );
		}

		$this->resetAttributes();

		$this->fill( $duplicated );

		$this->fireModelEvent( 'duplicated' );

		// clear account cache.
		if ( $this->cachable || $this->clears_account_cache ) {
			\SureCart::account()->clearCache();
		}

		return $this;
	}

	/**
	 * Swap the platform's generic validation error for an actionable one when
	 * the record references something that can no longer be purchased.
	 *
	 * @param \WP_Error $error The error returned by the platform.
	 * @return \WP_Error
	 */
	protected function duplicateError( \WP_Error $error ): \WP_Error {
		$codes   = $error->get_error_codes();
		$message = '';

		if ( in_array( 'bump.price.archived', $codes, true ) ) {
			$message = __( 'This order bump uses a price that is no longer available. Edit it and choose a new price before duplicating.', 'surecart' );
		}

		// The platform does not say why the upsells are invalid, so the message can't claim it is the price.
		if ( in_array( 'upsell_funnel.upsells.invalid', $codes, true ) ) {
			$message = __( 'One or more offers in this funnel are no longer valid, for example because their price was archived. Edit the offers and try again.', 'surecart' );
		}

		if ( '' === $message ) {
			return $error;
		}

		// Keep the primary error's data so REST still responds with its status.
		return new \WP_Error( $error->get_error_code(), $message, $error->get_error_data() );
	}
}
