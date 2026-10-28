<?php

namespace SureCart\WordPress\Cache;

/**
 * Autoptimize Cache Service.
 *
 * Autoptimize is an asset optimizer with no page cache or delay-JS, and it
 * never aggregates `type="module"` scripts — so only its classic-script
 * aggregate/defer (including inline-script defer) and its per-page opt-out
 * need handling.
 */
class AutoptimizeCacheService extends CacheService {
	/**
	 * Hook Autoptimize's JS exclusion and per-page opt-out filters.
	 *
	 * Does not call parent::registerHooks() — Autoptimize does no page caching.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		add_filter( 'autoptimize_filter_js_exclude', [ $this, 'excludeScriptsFromOptimization' ] );
		add_filter( 'autoptimize_filter_noptimize', [ $this, 'maybeSkipOptimization' ] );
	}

	/**
	 * Check if the Autoptimize plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'AUTOPTIMIZE_PLUGIN_VERSION' );
	}

	/**
	 * Keep critical core scripts, and their inline -before/-after data, out of aggregation and defer.
	 *
	 * Excluded tags are left exactly where WordPress printed them. Without this, Autoptimize's
	 * inline-JS defer runs `wp-api-fetch-js-after` (nonce/root URL middleware) after the
	 * Interactivity API modules that depend on it. Autoptimize accepts either a comma-separated
	 * string or a `[ pattern => flag ]` array here.
	 *
	 * @param string|array $exclude Existing exclusions.
	 * @return string|array
	 */
	public function excludeScriptsFromOptimization( $exclude ) {
		if ( is_array( $exclude ) ) {
			foreach ( $this->getJsDeferExcludes() as $pattern ) {
				if ( ! isset( $exclude[ $pattern ] ) ) {
					$exclude[ $pattern ] = '';
				}
			}

			return $exclude;
		}

		return implode( ', ', array_filter( array_merge( [ trim( (string) $exclude, ', ' ) ], $this->getJsDeferExcludes() ) ) );
	}

	/**
	 * Skip Autoptimize on dynamic SureCart pages.
	 *
	 * Mirrors Autoptimize's own WooCommerce/EDD cart and checkout handling, including its
	 * "Also optimize shop cart/checkout" opt-in.
	 *
	 * @param bool $noptimize Whether Autoptimize should skip this page.
	 * @return bool
	 */
	public function maybeSkipOptimization( $noptimize ) {
		if ( $noptimize || 'on' === get_option( 'autoptimize_optimize_checkout', 'off' ) ) {
			return $noptimize;
		}

		return $this->shouldExcludeFromCache();
	}
}
