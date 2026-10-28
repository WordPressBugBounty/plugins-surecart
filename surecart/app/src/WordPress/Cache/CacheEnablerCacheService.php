<?php

namespace SureCart\WordPress\Cache;

/**
 * Cache Enabler Cache Service.
 *
 * Cache Enabler is page-cache only (no JS defer/combine) and already honors
 * DONOTCACHEPAGE (set by DoNotCachePageService) before storing a page, so only
 * stock-change purging needs its own API.
 */
class CacheEnablerCacheService extends CacheService {
	/**
	 * Hook stock-change purging.
	 *
	 * Does not call parent::registerHooks() — the shared page-cache hooks
	 * are covered by DONOTCACHEPAGE via DoNotCachePageService instead.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		add_action( 'surecart/product_stock_adjusted', [ $this, 'purgeProductCacheOnStockAdjustment' ] );
	}

	/**
	 * Check if the Cache Enabler plugin is active.
	 *
	 * Not a constant — its advanced-cache.php drop-in can outlive deactivation
	 * and only loads the engine class, never Cache_Enabler itself.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return class_exists( 'Cache_Enabler' );
	}

	/**
	 * Purge Cache Enabler's cache for a single post via its public action.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		if ( has_action( 'cache_enabler_clear_page_cache_by_post' ) ) {
			do_action( 'cache_enabler_clear_page_cache_by_post', $post_id );
		}
	}
}
