<?php

namespace SureCart\Middleware;

use Closure;
use SureCart\Models\Checkout;
use SureCart\Models\Product;
use SureCartCore\Requests\RequestInterface;
use SureCartCore\Responses\RedirectResponse;

/**
 * Send an abandoned-checkout recovery link back to the page the checkout started on.
 */
class CheckoutRedirectMiddleware {
	/**
	 * Redirect to the checkout's originating page, falling back to the checkout page.
	 *
	 * @param RequestInterface $request Request.
	 * @param Closure          $next Next.
	 * @return function
	 */
	public function handle( RequestInterface $request, Closure $next ) {
		$id = $request->query( 'checkout_id' );

		// no checkout id, next request.
		if ( empty( $id ) ) {
			return $next( $request );
		}

		$checkout = Checkout::find( $id );

		// an unknown checkout still lands on the default checkout page below.
		$metadata = ( ! is_wp_error( $checkout ) && ! empty( $checkout ) ) ? $checkout->metadata : (object) [];

		// get checkout from page id.
		if ( ! empty( $metadata->buy_page_product_id ) ) {
			$product = Product::find( $metadata->buy_page_product_id );
			// handle error.
			if ( is_wp_error( $product ) ) {
				wp_die( esc_html( $product->get_error_message() ) );
			}

			// buy link disabled and person cannot view.
			if ( ! $product->buyLink()->isEnabled() && ! current_user_can( 'edit_sc_products' ) ) {
				wp_die( esc_html__( 'This product is not available for purchase.', 'surecart' ) );
			}

			$url = $product->buyLink()->url();
			if ( $url ) {
				return ( new RedirectResponse( $request ) )->to(
					esc_url_raw( $this->buildUrl( $url, $request ) )
				);
			}
		}

		// get checkout from page id.
		if ( ! empty( $metadata->page_id ) ) {
			$url = get_permalink( (int) $metadata->page_id );
			if ( $url ) {
				return ( new RedirectResponse( $request ) )->to(
					esc_url_raw( $this->buildUrl( $url, $request ) )
				);
			}
		}

		// get checkout from page_url. Anyone can write this key, so keep it on-site.
		$page_url = $metadata->page_url ?? '';
		$page_url = is_string( $page_url ) ? wp_validate_redirect( $page_url, '' ) : '';
		if ( ! empty( $page_url ) ) {
			return ( new RedirectResponse( $request ) )->to(
				esc_url_raw( $this->buildUrl( $page_url, $request ) )
			);
		}

		// these don't exist, use the default checkout page.
		if ( ! empty( \SureCart::pages()->url( 'checkout' ) ) ) {
			return ( new RedirectResponse( $request ) )->to(
				esc_url_raw( $this->buildUrl( \SureCart::pages()->url( 'checkout' ), $request ) )
			);
		}

		// cannot find checkout page.
		return $next( $request );
	}

	/**
	 * Build the url.
	 *
	 * @param string           $url Destination url.
	 * @param RequestInterface $request Request.
	 * @return string
	 */
	public function buildUrl( $url, RequestInterface $request ) {
		if ( empty( $url ) ) {
			return $url;
		}

		// add checkout id.
		$id = $request->query( 'checkout_id' );
		if ( $id ) {
			$url = add_query_arg(
				[
					'checkout_id' => $id,
				],
				$url
			);
		}

		$promotion_code = $request->query( 'promotion_code' );
		if ( $promotion_code ) {
			$url = add_query_arg(
				[
					'coupon' => $promotion_code,
				],
				$url
			);
		}

		return $url;
	}
}
