<?php

namespace SureCart\Middleware\Concerns;

use SureCartCore\Requests\RequestInterface;

/**
 * Carries the redirect request's checkout id and promotion code over to the destination url.
 */
trait AddsCheckoutQueryArgs {
	/**
	 * Add the request's checkout id and promotion code (as `coupon`) to the url.
	 *
	 * @param string           $url The destination url.
	 * @param RequestInterface $request Request.
	 * @return string
	 */
	public function buildUrl( $url, RequestInterface $request ) {
		if ( empty( $url ) ) {
			return $url;
		}

		$id = $request->query( 'checkout_id' );
		if ( $id && is_string( $id ) ) {
			$url = add_query_arg( [ 'checkout_id' => $id ], $url );
		}

		$promotion_code = $request->query( 'promotion_code' );
		if ( $promotion_code && is_string( $promotion_code ) ) {
			$url = add_query_arg( [ 'coupon' => $promotion_code ], $url );
		}

		return $url;
	}
}
