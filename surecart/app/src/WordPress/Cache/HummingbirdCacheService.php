<?php

namespace SureCart\WordPress\Cache;

/**
 * Hummingbird (WPMU DEV) Cache Service.
 *
 * Hummingbird's page cache already honors DONOTCACHEPAGE (set by DoNotCachePageService)
 * and never stores REST responses. Its Asset Optimization combines/defers classic
 * scripts per handle, and its (Pro) Delay JS also delays `type="module"` scripts, so
 * core scripts and the Interactivity API/blocks-next modules both need excluding.
 * Mirrors Hummingbird's own WooCommerce integration for cart/checkout.
 */
class HummingbirdCacheService extends CacheService {
	/**
	 * Hook Hummingbird's asset, delay-JS and purge APIs.
	 *
	 * Does not call parent::registerHooks() — the shared page-cache hooks
	 * are covered by DONOTCACHEPAGE via DoNotCachePageService instead.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		// Late: Hummingbird's own per-file filters return true for listed handles regardless of the incoming value.
		add_filter( 'wphb_combine_resource', [ $this, 'excludeCriticalScripts' ], 99, 4 );
		add_filter( 'wphb_defer_resource', [ $this, 'excludeCriticalScripts' ], 99, 4 );

		add_filter( 'wphb_delay_js_exclusions', [ $this, 'getMergedJsDeferExcludes' ] );
		add_filter( 'wphb_delay_js_exclusions', [ $this, 'excludeProductMediaFromDelay' ] );

		// Dynamic pages: no asset optimization, delay or critical CSS at all.
		add_action( 'wp', [ $this, 'maybeDisableMinifyOnDynamicPages' ] );
		add_filter( 'wphb_should_delay_js', [ $this, 'maybeDisableOnDynamicPages' ] );
		add_filter( 'wphb_should_add_critical_css', [ $this, 'maybeDisableOnDynamicPages' ] );

		add_action( 'surecart/product_stock_adjusted', [ $this, 'purgeProductCacheOnStockAdjustment' ] );
	}

	/**
	 * Check if the Hummingbird plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'WPHB_VERSION' );
	}

	/**
	 * Keep critical core scripts out of combined groups and never defer them.
	 *
	 * Deferred, they would run after the modules that read them.
	 *
	 * @param bool   $value  Whether to combine/defer the resource.
	 * @param string $handle Resource handle.
	 * @param string $type   'scripts' or 'styles'.
	 * @param string $url    Resource URL.
	 * @return bool
	 */
	public function excludeCriticalScripts( $value, $handle, $type, $url = '' ) {
		if ( 'scripts' === $type && $this->isCriticalScript( $handle, $url ) ) {
			return false;
		}

		return $value;
	}

	/**
	 * Turn Hummingbird's Asset Optimization off on dynamic SureCart pages.
	 *
	 * Runs on 'wp', the earliest point page checks work — the same hook and module filter
	 * Hummingbird's WooCommerce integration uses for cart/checkout.
	 *
	 * @return void
	 */
	public function maybeDisableMinifyOnDynamicPages() {
		if ( $this->shouldExcludeFromCache() ) {
			add_filter( 'wp_hummingbird_is_active_module_minify', '__return_false' );
		}
	}

	/**
	 * Disable delay-JS and critical CSS on dynamic SureCart pages.
	 *
	 * @param bool $enabled Whether the optimization runs on this page.
	 * @return bool
	 */
	public function maybeDisableOnDynamicPages( $enabled ) {
		return $this->shouldExcludeFromCache() ? false : $enabled;
	}

	/**
	 * Purge Hummingbird's page cache for a single post.
	 *
	 * Guards the ID: wphb_clear_page_cache with no post ID clears the whole site cache.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		if ( $post_id > 0 && has_action( 'wphb_clear_page_cache' ) ) {
			do_action( 'wphb_clear_page_cache', $post_id );
		}
	}
}
