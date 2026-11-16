<?php

namespace SureCart\Middleware;

use Closure;
use SureCart\Middleware\Concerns\AddsCheckoutQueryArgs;
use SureCartCore\Requests\RequestInterface;
use SureCartCore\Responses\RedirectResponse;

/**
 * Redirects a customer link to a same-site path.
 */
class PathRedirectMiddleware {
	use AddsCheckoutQueryArgs;

	/**
	 * Redirect to the requested path when it stays on this site.
	 *
	 * @param RequestInterface $request Request.
	 * @param Closure          $next Next.
	 * @return mixed
	 */
	public function handle( RequestInterface $request, Closure $next ) {
		$path             = $request->query( 'path' );
		$customer_link_id = $request->query( 'customer_link_id' );

		// need a path and a customer link id.
		if ( empty( $path ) || empty( $customer_link_id ) ) {
			return $next( $request );
		}

		if ( ! is_string( $customer_link_id ) ) {
			return $next( $request );
		}

		if ( ! $this->isSafePath( $path ) ) {
			return $next( $request );
		}

		if ( $this->isSelfReference( $path, $request ) ) {
			return $next( $request );
		}

		$url = esc_url_raw( $this->buildUrl( untrailingslashit( get_home_url() ) . $path, $request ) );

		// the path is appended to the home url, so the result must still be on this host.
		if ( empty( wp_validate_redirect( $url, '' ) ) ) {
			return $next( $request );
		}

		if ( wp_parse_url( $url, PHP_URL_HOST ) !== wp_parse_url( home_url(), PHP_URL_HOST ) ) {
			return $next( $request );
		}

		return ( new RedirectResponse( $request ) )->to( $url );
	}

	/**
	 * Is this a site-relative path that cannot change the host once appended to the home url?
	 *
	 * @param mixed $path The path query parameter.
	 * @return bool
	 */
	protected function isSafePath( $path ): bool {
		if ( ! is_string( $path ) ) {
			return false;
		}

		// a single leading slash only: "@example.com" becomes userinfo and "//example.com" is protocol relative.
		if ( '/' !== substr( $path, 0, 1 ) ) {
			return false;
		}

		if ( '/' === substr( $path, 1, 1 ) ) {
			return false;
		}

		// browsers treat a backslash as a forward slash.
		if ( false !== strpos( $path, '\\' ) ) {
			return false;
		}

		// browsers strip tab/CR/LF from urls ("/\t/evil.com" becomes "//evil.com") and CR/LF allow header injection.
		return ! preg_match( '/[\x00-\x1f\x7f]/', $path );
	}

	/**
	 * Does the path point back at the current request?
	 *
	 * Some servers inject the request's own uri as `path`; redirecting there would drop the other params.
	 *
	 * @param string           $path The path query parameter.
	 * @param RequestInterface $request Request.
	 * @return bool
	 */
	protected function isSelfReference( $path, RequestInterface $request ): bool {
		$request_path = $this->normalizePath( $request->getUri()->getPath() );

		// on the home url a query string is a real destination, unless it is this redirect request again.
		if ( '' === $request_path && false !== strpos( $path, '?' ) ) {
			wp_parse_str( (string) wp_parse_url( $path, PHP_URL_QUERY ), $query );
			return array_key_exists( 'sc_redirect', $query );
		}

		return $this->normalizePath( (string) wp_parse_url( $path, PHP_URL_PATH ) ) === $request_path;
	}

	/**
	 * Normalize a path the way the server does before injecting it: decoded, slashes merged.
	 *
	 * @param string $path A url path.
	 * @return string
	 */
	protected function normalizePath( $path ): string {
		return untrailingslashit( (string) preg_replace( '#/+#', '/', rawurldecode( (string) $path ) ) );
	}
}
