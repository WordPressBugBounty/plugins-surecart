<?php

namespace SureCart\WordPress\Cache;

/**
 * Fast Velocity Minify Cache Service.
 *
 * FVM has no page cache. Its recommended JS settings merge `/wp-includes/` into a
 * deferred bundle, so core scripts like wp-i18n/wp-api-fetch run after the Interactivity
 * API modules that read them ("wp is not defined"). It never touches `type="module"`
 * scripts, so only classic core scripts need protecting.
 *
 * FVM has no filters: it reads its settings from the `$fvm_settings` global when it
 * processes the page buffer, so they are adjusted there in memory for this request
 * only — never saved (verified on FVM 3.5.8). Mirrors FVM's own WooCommerce checkout/account handling.
 */
class FastVelocityMinifyCacheService extends CacheService {
	/**
	 * FVM setting groups that process the page.
	 *
	 * @var string[]
	 */
	private const PROCESSING_GROUPS = [ 'html', 'css', 'js', 'cdn' ];

	/**
	 * Hook the per-request settings adjustment.
	 *
	 * Does not call parent::registerHooks() — FVM does no page caching.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		// 'wp' is the earliest point page checks work; FVM reads its settings later, at output.
		add_action( 'wp', [ $this, 'adjustSettingsForRequest' ] );
	}

	/**
	 * Check if the Fast Velocity Minify plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return function_exists( 'fvm_get_settings' );
	}

	/**
	 * Keep critical scripts out of FVM's merge/defer, and skip FVM on dynamic pages.
	 *
	 * @return void
	 */
	public function adjustSettingsForRequest() {
		global $fvm_settings;

		if ( ! is_array( $fvm_settings ) ) {
			return;
		}

		if ( $this->shouldExcludeFromCache() ) {
			foreach ( self::PROCESSING_GROUPS as $group ) {
				if ( isset( $fvm_settings[ $group ] ) ) {
					$fvm_settings[ $group ]['enable'] = false;
				}
			}
			return;
		}

		// FVM's "Ignore JS files" leaves matching files exactly where WordPress printed them. It splits the list on PHP_EOL.
		$ignore                       = isset( $fvm_settings['js']['ignore'] ) ? trim( (string) $fvm_settings['js']['ignore'] ) : '';
		$fvm_settings['js']['ignore'] = trim( $ignore . PHP_EOL . implode( PHP_EOL, $this->getJsDeferExcludes() ) );
	}
}
