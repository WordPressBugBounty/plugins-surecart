<?php

namespace SureCart\WordPress\Cache;

/**
 * Breeze (Cloudways) Cache Service.
 *
 * Breeze's page cache already honors DONOTCACHEPAGE (set by DoNotCachePageService)
 * and never caches REST requests. Its JS group/delay, however, moves core scripts
 * like wp-i18n/wp-api-fetch into a deferred bundle that runs after the Interactivity
 * API modules that read them ("wp is not defined"). Breeze never touches
 * `type="module"` scripts, so only classic core scripts need protecting.
 */
class BreezeCacheService extends CacheService {
	/**
	 * Hook Breeze's per-page opt-outs, delay exclusions and purge API.
	 *
	 * Does not call parent::registerHooks() — the shared page-cache hooks
	 * are covered by DONOTCACHEPAGE via DoNotCachePageService instead.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		// breeze_filter_js_exclude can't be used: Breeze 2.6's ismergeable() still merges tags it matches.
		add_filter( 'script_loader_tag', [ $this, 'wrapCriticalScriptsInNoptimize' ], 10, 3 );
		add_filter( 'breeze_filter_js_noptimize', [ $this, 'maybeSkipJsOptimization' ] );

		// The delay-without-minify path has no per-page opt-out of its own. Hook name is misspelled upstream (verified on Breeze 2.6.1).
		add_filter( 'default_scripts_gnore_from_delay', [ $this, 'excludeScriptsFromDelay' ] );

		add_action( 'surecart/product_stock_adjusted', [ $this, 'purgeProductCacheOnStockAdjustment' ] );
	}

	/**
	 * Check if the Breeze plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'BREEZE_VERSION' );
	}

	/**
	 * Wrap critical core scripts in Breeze's noptimize markers so every Breeze pass leaves them in place.
	 *
	 * The tag WordPress passes here already includes the script's translations and
	 * inline -before/-after data, so those stay with it too.
	 *
	 * @param string $tag    Script tag HTML.
	 * @param string $handle Script handle.
	 * @param string $src    Script source URL.
	 * @return string
	 */
	public function wrapCriticalScriptsInNoptimize( $tag, $handle, $src = '' ) {
		if ( is_admin() || ! is_string( $tag ) || ! $this->isCriticalScript( $handle, $src ) ) {
			return $tag;
		}

		return '<!--noptimize-->' . $tag . '<!--/noptimize-->';
	}

	/**
	 * Skip Breeze's JS optimization on dynamic SureCart pages.
	 *
	 * Uses the JS-level filter rather than breeze_filter_noptimize, which runs at
	 * wp_loaded — before the main query, so page checks can't work there yet.
	 *
	 * @param bool $noptimize Whether Breeze should skip JS optimization.
	 * @return bool
	 */
	public function maybeSkipJsOptimization( $noptimize ) {
		return $noptimize || $this->shouldExcludeFromCache();
	}

	/**
	 * Keep critical scripts out of Breeze's delay-JS, and every script on dynamic pages.
	 *
	 * Breeze substring-matches these against each full script tag; '<script' matches all
	 * of them, which is the only per-page opt-out this path offers.
	 *
	 * @param array $patterns Patterns Breeze leaves undelayed.
	 * @return array
	 */
	public function excludeScriptsFromDelay( $patterns ) {
		$patterns = $this->getMergedJsDeferExcludes( $patterns );

		if ( $this->shouldExcludeFromCache() ) {
			$patterns[] = '<script';
		}

		return $patterns;
	}

	/**
	 * Purge Breeze's cache for a single post via its public purge action.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		if ( has_action( 'purge_post_cache' ) ) {
			do_action( 'purge_post_cache', $post_id );
		}
	}
}
