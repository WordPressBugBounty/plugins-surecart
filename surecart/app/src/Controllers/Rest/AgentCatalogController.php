<?php

namespace SureCart\Controllers\Rest;

/**
 * Serves the public product manifest to external AI agents.
 */
class AgentCatalogController extends RestController {
	/**
	 * How long agents and CDNs may cache a manifest page, in seconds.
	 *
	 * @var int
	 */
	const MAX_AGE = \SureCart\AgentCatalog\AgentCatalogService::CACHE_TTL;

	/**
	 * Get a page of the manifest, or 304 when the agent's copy is still current.
	 *
	 * @param \WP_REST_Request $request The REST request.
	 *
	 * @return \WP_REST_Response
	 */
	public function index( \WP_REST_Request $request ) {
		$catalog = \SureCart::agentCatalog();
		$page    = $catalog->page( (int) $request->get_param( 'page' ), (int) $request->get_param( 'per_page' ) );

		// generated_at changes every response, so it is left out of the hash.
		$etag          = 'W/"' . md5( wp_json_encode( array_diff_key( $page, array( 'generated_at' => true ) ) ) ) . '"';
		$last_modified = $catalog->lastModified( (int) $request->get_param( 'page' ), (int) $request->get_param( 'per_page' ) );

		$response = $this->isNotModified( $request, $etag, $last_modified )
			? new \WP_REST_Response( null, 304 )
			: rest_ensure_response( $page );

		// overrides CacheService's no-cache Expires; page caches stay off this route.
		$response->header( 'Cache-Control', 'public, max-age=' . self::MAX_AGE );
		$response->header( 'Expires', gmdate( 'D, d M Y H:i:s', time() + self::MAX_AGE ) . ' GMT' );
		$response->header( 'ETag', $etag );
		$response->header( 'Last-Modified', gmdate( 'D, d M Y H:i:s', $last_modified ) . ' GMT' );

		return $response;
	}

	/**
	 * Does the request's validator still match? If-None-Match wins over If-Modified-Since (RFC 9110 13.2.2).
	 *
	 * @param \WP_REST_Request $request       The REST request.
	 * @param string           $etag          The current ETag.
	 * @param int              $last_modified The current Last-Modified timestamp.
	 *
	 * @return bool
	 */
	protected function isNotModified( \WP_REST_Request $request, string $etag, int $last_modified ): bool {
		$if_none_match = $request->get_header( 'If-None-Match' );
		if ( null !== $if_none_match ) {
			$tags = array_map( array( $this, 'opaqueTag' ), explode( ',', $if_none_match ) );

			return in_array( '*', $tags, true ) || in_array( $this->opaqueTag( $etag ), $tags, true );
		}

		$since = strtotime( (string) $request->get_header( 'If-Modified-Since' ) );

		return $since && $last_modified <= $since;
	}

	/**
	 * An entity tag for weak comparison: no W/ prefix, and no -gzip/-br suffix that Apache's mod_deflate/mod_brotli append.
	 *
	 * @param string $tag Entity tag as sent.
	 *
	 * @return string
	 */
	protected function opaqueTag( string $tag ): string {
		return preg_replace( array( '#^W/#', '#-(gzip|br)"$#' ), array( '', '"' ), trim( $tag ) );
	}
}
