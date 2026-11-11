<?php

namespace SureCart\WordPress\Cache;

/**
 * Flying Pages Cache Service.
 *
 * Flying Pages has no cache or JS optimization — it prefetches the HTML of links in
 * the viewport or on hover. Dynamic SureCart pages are never cached, so each prefetch
 * runs a full uncached render (with SureCart API calls) that the visitor may never
 * open. Its default ignore list only covers WooCommerce's "/checkout" and "/cart".
 */
class FlyingPagesCacheService extends CacheService {
	/**
	 * Hook the ignore-keywords option.
	 *
	 * Does not call parent::registerHooks() — Flying Pages does no page caching.
	 *
	 * @return void
	 */
	protected function registerHooks(): void {
		// Filtered on read, so the list follows page/permalink changes without being saved.
		add_filter( 'option_flying_pages_config_ignore_keywords', [ $this, 'excludePagesFromPrefetch' ] );
	}

	/**
	 * Check if the Flying Pages plugin is active.
	 *
	 * @return bool
	 */
	protected function isCachePluginActive(): bool {
		return defined( 'FLYING_PAGES_VERSION' );
	}

	/**
	 * Add dynamic SureCart page paths to the keywords Flying Pages never prefetches.
	 *
	 * Keywords are substring-matched against each link's full URL, so a similar URL
	 * (/checkout-guide) only loses its prefetch. Left alone in wp-admin,
	 * where the settings form would otherwise save them into the user's own list.
	 *
	 * @param mixed $keywords Saved ignore keywords.
	 * @return mixed
	 */
	public function excludePagesFromPrefetch( $keywords ) {
		if ( is_admin() || ! is_array( $keywords ) ) {
			return $keywords;
		}

		$paths = $this->getDynamicPagePaths();

		$buy_base = $this->getBuyPageBasePath();
		if ( $buy_base ) {
			$paths[] = $buy_base . '/';
		}

		return array_values( array_unique( array_merge( $keywords, $paths ) ) );
	}
}
