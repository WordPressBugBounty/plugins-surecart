<?php

namespace SureCart\WordPress\Cache;

/**
 * WP Super Cache Service.
 *
 * WP Super Cache is page-cache only (no JS defer/combine) and already honors
 * DONOTCACHEPAGE (set by DoNotCachePageService) and skips REST responses
 * itself, so only stock-change purging needs its own API.
 */
class WpSuperCacheService extends CacheService {
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
	 * Check if the WP Super Cache plugin is active.
	 *
	 * Not WPCACHEHOME — WP Super Cache writes that into wp-config.php, so it
	 * can outlive the plugin's deactivation.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return function_exists( 'wpsc_delete_post_cache' );
	}

	/**
	 * Purge WP Super Cache's cached files for a single post.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		if ( function_exists( 'wpsc_delete_post_cache' ) ) {
			wpsc_delete_post_cache( $post_id );
		}
	}
}
