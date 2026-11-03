<?php

namespace SureCart\BlockLibrary;

/**
 * Renders the shared shipping/billing address field markup.
 */
class AddressBlockService {
	/**
	 * Render the address field stack for one address kind.
	 *
	 * @param string $kind Address kind: 'shipping' or 'billing'.
	 * @param array  $args Optional per-block flags: 'show_name', 'require_name'.
	 * @return string The rendered markup, or '' for an unknown kind.
	 */
	public function render( $kind, $args = array() ) {
		if ( ! in_array( $kind, array( 'shipping', 'billing' ), true ) ) {
			return '';
		}

		return \SureCart::view( 'blocks/checkout-address-fields' )
			->with(
				array(
					'kind'         => $kind,
					'show_name'    => ! empty( $args['show_name'] ),
					'require_name' => ! empty( $args['require_name'] ),
					'has_maps'     => ! empty( \SureCart::googleMaps()->getApiKey() ),
				)
			)
			->toString();
	}
}
