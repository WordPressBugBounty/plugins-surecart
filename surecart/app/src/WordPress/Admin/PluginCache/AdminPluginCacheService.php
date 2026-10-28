<?php

namespace SureCart\WordPress\Admin\PluginCache;

/**
 * Admin plugin cache service.
 */
class AdminPluginCacheService {
	/**
	 * Default documentation URL for cache plugins.
	 */
	private const DEFAULT_DOCS_URL = 'https://surecart.com/docs/caching/';

	/**
	 * Bootstrap related hooks.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_action( 'admin_notices', [ $this, 'showNotice' ] );
	}

	/**
	 * Get list of cache plugins.
	 *
	 * @return array
	 */
	public function getCachePlugins(): array {
		return apply_filters(
			'surecart_cache_plugins',
			[
				// 'w3-total-cache/w3-total-cache.php', // we added support for this in the plugin
				// 'litespeed-cache/litespeed-cache.php', // we added support for this in the plugin
				// 'sg-cachepress/sg-cachepress.php', // we added support for this in the plugin
				// 'wp-fastest-cache/wpFastestCache.php', // we added support for this in the plugin
				// 'wp-rocket/wp-rocket.php', // we added support for this in the plugin
				// 'wp-super-cache/wp-cache.php', // we added support for this in the plugin
				// 'autoptimize/autoptimize.php', // we added support for this in the plugin
				// 'cache-enabler/cache-enabler.php', // we added support for this in the plugin
				// 'breeze/breeze.php', // we added support for this in the plugin
				// 'perfmatters/perfmatters.php', // we added support for this in the plugin
				// 'hummingbird-performance/wp-hummingbird.php', // we added support for this in the plugin
				'swift-performance-lite/performance.php',
				'wp-optimize/wp-optimize.php',
				'nitropack/main.php',
				'wp-asset-clean-up/wpacu.php',
				'flying-pages/flying-pages.php',
				'fast-velocity-minify/fvm.php',
				'wp-performance-score-booster/wp-performance-score-booster.php',
				'clearfy/clearfy.php',
				'psn-pagespeed-ninja/pagespeedninja.php',
			]
		);
	}

	/**
	 * Show the plugin cache notice.
	 *
	 * @return void
	 */
	public function showNotice(): void {
		$cache_plugins = $this->getCachePlugins();

		// Loop through each cache plugin.
		foreach ( $cache_plugins as $plugin ) {
			// If the plugin is not active, skip it.
			if ( ! is_plugin_active( $plugin ) ) {
				continue;
			}

			// Get the plugin data.
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );

			// If the plugin data is not found, skip it.
			if ( empty( $plugin_data['Name'] ) ) {
				continue;
			}

			// Render the notice.
			echo wp_kses_post(
				\SureCart::notices()->render(
					[
						'name'  => 'sc_plugin_cache_notice_' . sanitize_title( $plugin ),
						'type'  => 'warning',
						'title' => sprintf(
							/* translators: 1: plugin name, 2: plugin version */
							esc_html__( 'Action Required: Configure %s for SureCart', 'surecart' ),
							$plugin_data['Name']
						),
						'text'  => sprintf(
							/* translators: 1: plugin name, 2: plugin version */
							'<p>' . esc_html__( '%1$s (%2$s) detected. To ensure optimal performance with SureCart, configure the plugin properly.', 'surecart' ) . '</p>',
							$plugin_data['Name'],
							$plugin_data['Version']
						)
						.
						'<p><a href="' . esc_url( self::DEFAULT_DOCS_URL ) . '" target="_blank">' . esc_html__( 'Review Configuration Guide', 'surecart' ) . '</a></p>',
					]
				)
			);
		}
	}
}
