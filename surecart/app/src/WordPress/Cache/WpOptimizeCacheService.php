<?php

namespace SureCart\WordPress\Cache;

/**
 * WP-Optimize Cache Service.
 *
 * WP-Optimize's page cache already honors DONOTCACHEPAGE (set by DoNotCachePageService).
 * Its Minify merges and defers core scripts like wp-i18n/wp-api-fetch, and its Delay JS
 * holds back every script — including the Interactivity API and blocks-next modules —
 * until first interaction, so modules run before the globals they read ("wp is not defined").
 * Mirrors WP-Optimize's own WooCommerce handling, which skips Minify on checkout.
 */
class WpOptimizeCacheService extends CacheService {
	/**
	 * Attribute WP-Optimize's Delay JS leaves untouched.
	 *
	 * @var string
	 */
	private const NO_DELAY_ATTRIBUTE = 'data-no-delay-js';

	/**
	 * Hook WP-Optimize's Minify, Delay JS and purge APIs.
	 *
	 * Does not call parent::registerHooks() — the shared page-cache hooks
	 * are covered by DONOTCACHEPAGE via DoNotCachePageService instead.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		// The default exclusions list is what Minify checks before both merging and deferring a script.
		add_filter( 'wp-optimize-minify-default-exclusions', [ $this, 'getMergedJsDeferExcludes' ] );
		add_filter( 'wpo_minify_run_on_page', [ $this, 'maybeSkipMinify' ] );

		// Delay JS has no exclusion filter, only the per-tag attribute, so it's added to the page HTML just before Delay JS runs.
		add_filter( 'wp_optimize_buffer', [ $this, 'excludeScriptsFromDelay' ] );

		add_action( 'surecart/product_stock_adjusted', [ $this, 'purgeProductCacheOnStockAdjustment' ] );
	}

	/**
	 * Check if the WP-Optimize plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'WPO_VERSION' );
	}

	/**
	 * Skip WP-Optimize's Minify on dynamic SureCart pages.
	 *
	 * Runs on 'wp', where page checks already work.
	 *
	 * @param bool $run Whether Minify runs on this page.
	 * @return bool
	 */
	public function maybeSkipMinify( $run ) {
		return $run && ! $this->shouldExcludeFromCache();
	}

	/**
	 * Opt critical scripts out of Delay JS, and every script on dynamic pages.
	 *
	 * Patterns are substring-matched against the whole tag, so a core script's inline
	 * -before/-after data (id="wp-api-fetch-js-after") is matched along with it.
	 *
	 * @param string $html Page HTML.
	 * @return string
	 */
	public function excludeScriptsFromDelay( $html ) {
		if ( ! is_string( $html ) || false === stripos( $html, '<script' ) || ! $this->isDelayJsEnabled() ) {
			return $html;
		}

		// preg_replace*() return null on a backtrack-limit failure; never blank the page.
		if ( $this->shouldExcludeFromCache() ) {
			$result = preg_replace( '/<script\b(?![^>]*' . self::NO_DELAY_ATTRIBUTE . ')/i', '<script ' . self::NO_DELAY_ATTRIBUTE, $html );
			return null === $result ? $html : $result;
		}

		$patterns = $this->getDelayJsExcludes();

		$result = preg_replace_callback(
			'/<script\b[^>]*>.*?<\/script>/is',
			function ( $matches ) use ( $patterns ) {
				$tag = $matches[0];

				if ( false !== stripos( $tag, self::NO_DELAY_ATTRIBUTE ) || ! $this->tagMatchesAny( $tag, $patterns ) ) {
					return $tag;
				}

				return substr_replace( $tag, '<script ' . self::NO_DELAY_ATTRIBUTE, 0, strlen( '<script' ) );
			},
			$html
		);

		return null === $result ? $html : $result;
	}

	/**
	 * Whether WP-Optimize's Delay JS is turned on; the page HTML is left alone when it isn't.
	 *
	 * @return bool
	 */
	protected function isDelayJsEnabled(): bool {
		return function_exists( 'wp_optimize_minify_config' ) && (bool) wp_optimize_minify_config()->get( 'enable_delay_js' );
	}

	/**
	 * Script patterns that must run on page load.
	 *
	 * Adds blocks-next's inline `window.scFetchData` (REST root + nonce), which the
	 * api-fetch module reads at evaluation time.
	 *
	 * @return string[]
	 */
	protected function getDelayJsExcludes(): array {
		return $this->excludeProductMediaFromDelay(
			array_merge( $this->getJsDeferExcludes(), [ 'window.scFetchData' ] )
		);
	}

	/**
	 * Whether a script tag contains any of the patterns.
	 *
	 * @param string   $tag      Full script tag.
	 * @param string[] $patterns Substrings to look for.
	 * @return bool
	 */
	private function tagMatchesAny( string $tag, array $patterns ): bool {
		foreach ( $patterns as $pattern ) {
			if ( '' !== $pattern && false !== strpos( $tag, $pattern ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Purge WP-Optimize's page cache for a single post.
	 *
	 * @param int $post_id Post ID.
	 * @return void
	 */
	protected function purgeCachedPost( int $post_id ): void {
		if ( class_exists( 'WPO_Page_Cache' ) && method_exists( 'WPO_Page_Cache', 'delete_single_post_cache' ) ) {
			\WPO_Page_Cache::delete_single_post_cache( $post_id );
		}
	}
}
