<?php

namespace SureCart\WordPress\Cache;

/**
 * Asset CleanUp (Page Speed Booster) Cache Service.
 *
 * Asset CleanUp has no page cache. Its "Combine loaded JS" moves core scripts like
 * wp-i18n/wp-api-fetch into a combined BODY file (deferred when "defer" is on), so the
 * Interactivity API modules that read them run first ("wp is not defined"). It never
 * combines `type="module"` scripts, so only classic core scripts need protecting.
 *
 * Asset CleanUp reuses each page's combined-file list for up to a day without
 * re-checking its settings, so pages combined before this ran pick it up once that expires.
 */
class AssetCleanUpCacheService extends CacheService {
	/**
	 * Hook Asset CleanUp's settings and per-page opt-out filters.
	 *
	 * Does not call parent::registerHooks() — Asset CleanUp does no page caching.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		add_filter( 'wpacu_settings', [ $this, 'excludeScriptsFromCombine' ] );
		add_filter( 'wpacu_prevent_any_frontend_optimization', [ $this, 'maybeSkipOptimization' ] );
	}

	/**
	 * Check if the Asset CleanUp plugin (Lite or Pro) is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'WPACU_PLUGIN_VERSION' );
	}

	/**
	 * Keep critical core scripts out of Asset CleanUp's combined JS files.
	 *
	 * Excluded files are left exactly where WordPress printed them. The filter returns the
	 * settings for the current request only; it's skipped in wp-admin so the settings form
	 * never saves SureCart's patterns into the user's own list.
	 *
	 * @param mixed $settings Asset CleanUp settings.
	 * @return mixed
	 */
	public function excludeScriptsFromCombine( $settings ) {
		if ( is_admin() || ! is_array( $settings ) ) {
			return $settings;
		}

		// Rules are newline-separated; plain ones are substring-matched against each script's src.
		$exceptions                               = isset( $settings['combine_loaded_js_exceptions'] ) ? trim( (string) $settings['combine_loaded_js_exceptions'] ) : '';
		$settings['combine_loaded_js_exceptions'] = trim( $exceptions . "\n" . implode( "\n", $this->getJsDeferExcludes() ) );

		return $settings;
	}

	/**
	 * Skip all of Asset CleanUp's front-end optimization on dynamic SureCart pages.
	 *
	 * Asset CleanUp also asks before the main query, where page checks can't work yet,
	 * so those calls are left alone — it only caches a "don't skip" answer from 'wp' on.
	 *
	 * @param bool $prevent Whether to skip optimization on this page.
	 * @return bool
	 */
	public function maybeSkipOptimization( $prevent ) {
		if ( $prevent || ! did_action( 'wp' ) ) {
			return $prevent;
		}

		return $this->shouldExcludeFromCache();
	}
}
