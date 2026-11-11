<?php

namespace SureCart\WordPress\Cache;

/**
 * NitroPack Cache Service.
 *
 * NitroPack ignores DONOTCACHEPAGE: whether a page may be optimized and cached is decided
 * on 'wp' by nitropack_passes_page_requirements(), which only knows WooCommerce's
 * cart/checkout/account pages. Its only per-request extension point is the
 * `nitropack_passes_cookie_requirements` filter checked alongside it; failing it
 * sends `X-Nitro-Disabled`, so no beacon fires and NitroPack never builds a cached copy.
 */
class NitroPackCacheService extends CacheService {
	/**
	 * Hook NitroPack's cacheability check and purge API.
	 *
	 * Does not call parent::registerHooks() — NitroPack has no per-page nocache call to make there.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		add_filter( 'nitropack_passes_cookie_requirements', [ $this, 'maybeDisableOnDynamicPages' ] );
		add_action( 'surecart/product_stock_adjusted', [ $this, 'purgeProductCacheOnStockAdjustment' ] );
	}

	/**
	 * Check if the NitroPack plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'NITROPACK_VERSION' );
	}

	/**
	 * Mark dynamic SureCart pages as not cacheable for NitroPack.
	 *
	 * NitroPack also runs this filter before the main query, where page checks
	 * can't work yet, so it's left alone until 'wp'.
	 *
	 * @param bool $passes Whether NitroPack may cache the request.
	 * @return bool
	 */
	public function maybeDisableOnDynamicPages( $passes ) {
		if ( ! $passes || ! did_action( 'wp' ) ) {
			return $passes;
		}

		return ! $this->shouldExcludeFromCache();
	}

	/**
	 * Invalidate NitroPack's cache for a single post.
	 *
	 * Same call NitroPack makes for WooCommerce stock changes.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		$post = get_post( $post_id );

		if ( $post && function_exists( 'nitropack_clean_post_cache' ) ) {
			nitropack_clean_post_cache( $post, null, false, sprintf( 'SureCart stock change on product "%s"', $post->post_title ) );
		}
	}
}
