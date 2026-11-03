<?php

namespace SureCart\WordPress;

use SureCartCore\ServiceProviders\ServiceProviderInterface;

/**
 * Register translations.
 */
class TranslationsServiceProvider implements ServiceProviderInterface {
	/**
	 * Traduttore language pack API on translate.surecart.com (same response shape as wordpress.org).
	 */
	const LANGUAGE_PACKS_API = 'https://translate.surecart.com/translations/api/translations/surecart/';

	/**
	 * Only packages served from here are offered; core extracts them into WP_LANG_DIR.
	 */
	const LANGUAGE_PACKS_ORIGIN = 'https://translate.surecart.com/';

	/**
	 * Site transient caching the language pack list.
	 */
	const LANGUAGE_PACKS_CACHE = 'surecart_language_packs';

	/**
	 * WP_Scripts instances that already printed the catalog, keyed by spl_object_id.
	 * Holding the instance keeps PHP from reusing its id mid-request.
	 *
	 * @var \WP_Scripts[]
	 */
	protected $catalog_printed_for = [];

	/**
	 * Register all dependencies in the IoC container.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * Bootstrap the service.
	 *
	 * @param \Pimple\Container $container Service container.
	 * @return void
	 */
	public function bootstrap( $container ) {
		add_filter( 'loco_compile_single_json', [ $this, 'compileSingleJSON' ], 999, 2 );
		add_filter( 'load_script_translation_file', [ $this, 'loadSingleTranslationFile' ], 999, 3 );
		add_filter( 'pre_load_script_translations', [ $this, 'skipPrintedCatalog' ], 10, 4 );
		add_filter( 'load_script_translations', [ $this, 'layerBundledCatalog' ], 5, 4 );
		add_filter( 'load_script_translations', [ $this, 'markCatalogPrinted' ], 10, 4 );
		add_action( 'init', [ $this, 'loadPluginTextDomain' ], 0 );
		add_filter( 'pre_set_site_transient_update_plugins', [ $this, 'addLanguagePacks' ] );
		add_action( 'init', [ $this, 'registerScriptModuleTranslations' ] );
		add_filter( 'script_module_loader_src', [ $this, 'enqueueScriptModuleTranslations' ], 10, 2 );
		add_action( 'wp_print_footer_scripts', [ $this, 'attachScriptModuleCatalog' ], 1 );
	}

	/**
	 * Offer translate.surecart.com language packs through core's translation updater.
	 *
	 * Core then installs only the site's own languages into WP_LANG_DIR/plugins, so the plugin zip
	 * doesn't have to bundle every locale. For locales we provide, the wordpress.org pack is dropped:
	 * both install to the same filenames and would overwrite each other.
	 *
	 * @param mixed $transient The update_plugins site transient being saved.
	 *
	 * @return mixed
	 */
	public function addLanguagePacks( $transient ) {
		if ( ! is_object( $transient ) ) {
			return $transient;
		}

		$locales = (array) apply_filters( 'plugins_update_check_locales', array_values( get_available_languages() ) );

		// English-only sites have nothing to install, so skip the remote lookup entirely.
		if ( empty( $locales ) ) {
			return $transient;
		}

		$installed = wp_get_installed_translations( 'plugins' )['surecart'] ?? [];
		$provided  = [];
		$updates   = [];

		foreach ( $this->getLanguagePacks() as $pack ) {
			$locale = $pack['language'] ?? '';
			if (
				! $locale
				|| empty( $pack['updated'] )
				|| ! is_string( $pack['package'] ?? null )
				|| 0 !== strpos( $pack['package'], self::LANGUAGE_PACKS_ORIGIN )
				|| ! in_array( $locale, $locales, true )
			) {
				continue;
			}
			$provided[] = $locale;

			$installed_at = $installed[ $locale ]['PO-Revision-Date'] ?? '';
			if ( $installed_at && strtotime( $installed_at ) >= strtotime( $pack['updated'] ) ) {
				continue;
			}

			$updates[] = [
				'type'       => 'plugin',
				'slug'       => 'surecart',
				'language'   => $locale,
				'version'    => $pack['version'] ?? '',
				'updated'    => $pack['updated'],
				'package'    => $pack['package'],
				'autoupdate' => true,
			];
		}

		$others = array_filter(
			(array) ( $transient->translations ?? [] ),
			function ( $translation ) use ( $provided ) {
				return 'surecart' !== ( $translation['slug'] ?? '' ) || ! in_array( $translation['language'] ?? '', $provided, true );
			}
		);

		$transient->translations = array_merge( array_values( $others ), $updates );

		return $transient;
	}

	/**
	 * Language packs available on translate.surecart.com, cached.
	 *
	 * Core saves the update transient more than once per check, so the list is cached rather than
	 * fetched each time. Failures are cached briefly so an outage doesn't add a request per save.
	 *
	 * @return array[]
	 */
	protected function getLanguagePacks() {
		$packs = get_site_transient( self::LANGUAGE_PACKS_CACHE );
		if ( is_array( $packs ) ) {
			return $packs;
		}

		$body  = json_decode( wp_remote_retrieve_body( wp_safe_remote_get( self::LANGUAGE_PACKS_API, [ 'timeout' => 5 ] ) ), true );
		$packs = is_array( $body['translations'] ?? null ) ? $body['translations'] : [];

		set_site_transient( self::LANGUAGE_PACKS_CACHE, $packs, $packs ? 6 * HOUR_IN_SECONDS : HOUR_IN_SECONDS );

		return $packs;
	}

	/**
	 * Register a handle that carries the surecart JS catalog for script modules.
	 *
	 * Script modules can't take translations, so the next-gen ones read `wp.i18n`, which only had the
	 * catalog when the legacy components script was on the page.
	 *
	 * @return void
	 */
	public function registerScriptModuleTranslations() {
		wp_register_script( 'surecart-i18n', false, [ 'wp-i18n' ], \SureCart::plugin()->version(), true );
	}

	/**
	 * Attach the catalog to the handle, just before footer scripts print.
	 *
	 * Inline, not wp_set_script_translations(): WP skips translations for a handle without a src,
	 * yet still marks the catalog printed, so every later handle would skip it too.
	 *
	 * @return void
	 */
	public function attachScriptModuleCatalog() {
		if ( ! wp_script_is( 'surecart-i18n', 'enqueued' ) || wp_script_is( 'surecart-i18n', 'done' ) ) {
			return;
		}
		// The legacy components script prints the same whole-domain catalog; one copy is enough.
		if ( wp_script_is( 'surecart-components', 'enqueued' ) || wp_script_is( 'surecart-components', 'done' ) ) {
			return;
		}

		// Not marked as printed: footer scripts printed before surecart-i18n still need their own copy.
		// Not load_script_textdomain(): on WP 6.8–6.9 it warns for a handle without a src.
		remove_filter( 'load_script_translations', [ $this, 'markCatalogPrinted' ], 10 );
		$json = load_script_translations( false, 'surecart-i18n', 'surecart' );
		add_filter( 'load_script_translations', [ $this, 'markCatalogPrinted' ], 10, 4 );
		if ( ! $json ) {
			return;
		}

		// The same call WP_Scripts::print_translations() makes.
		wp_add_inline_script(
			'surecart-i18n',
			sprintf(
				'( function( domain, translations ) { var localeData = translations.locale_data[ domain ] || translations.locale_data.messages; localeData[""].domain = domain; wp.i18n.setLocaleData( localeData, domain ); } )( "surecart", %s );',
				$json
			)
		);
	}

	/**
	 * Load the catalog whenever a SureCart script module is printed, whoever enqueued it
	 * (blocks, the cart drawer, page builders).
	 *
	 * Modules print before the footer scripts (wp_head or wp_footer at 10), so this is in time.
	 *
	 * @param string $src Module URL.
	 * @param string $id  Module id.
	 *
	 * @return string
	 */
	public function enqueueScriptModuleTranslations( $src, $id ) {
		if ( ! is_admin() && ( 0 === strpos( $id, '@surecart/' ) || 0 === strpos( $id, 'surecart/' ) ) ) {
			wp_enqueue_script( 'surecart-i18n' );
		}
		return $src;
	}

	/**
	 * Print the surecart JS catalog once per document instead of once per script handle.
	 *
	 * Every handle shares the same whole-domain JSON, so the block editor was inlining it ~150
	 * times (~40 MB). The editor canvas iframe is its own document with its own WP_Scripts, so
	 * the check is per instance rather than per request.
	 *
	 * @param string|false|null $translations Short-circuit value.
	 * @param string|false      $file         Translation file path.
	 * @param string            $handle       Script handle.
	 * @param string            $domain       Text domain.
	 *
	 * @return string|false|null
	 */
	public function skipPrintedCatalog( $translations, $file, $handle, $domain ) {
		if ( 'surecart' === $domain && isset( $this->catalog_printed_for[ spl_object_id( wp_scripts() ) ] ) ) {
			return false;
		}
		return $translations;
	}

	/**
	 * Remember that this WP_Scripts instance has printed the catalog.
	 *
	 * Runs after a successful file read on purpose: WP retries a missed path with $file = false,
	 * and marking on the first attempt would swallow that retry.
	 *
	 * @param string       $translations JSON catalog.
	 * @param string|false $file         Translation file path.
	 * @param string       $handle       Script handle.
	 * @param string       $domain       Text domain.
	 *
	 * @return string
	 */
	public function markCatalogPrinted( $translations, $file, $handle, $domain ) {
		if ( 'surecart' === $domain && $translations ) {
			$scripts = wp_scripts();

			$this->catalog_printed_for[ spl_object_id( $scripts ) ] = $scripts;
		}
		return $translations;
	}

	/**
	 * Fill a merchant JS catalog (Loco) with our installed language pack's and bundled strings.
	 *
	 * WP reads one JSON file per handle, so without this a merchant override hides every string it
	 * lacks, including strings added in later releases. Merchant entries still win.
	 *
	 * @param string|false $translations JSON catalog that was read.
	 * @param string       $file         Translation file path that was read.
	 * @param string       $handle       Script handle.
	 * @param string       $domain       Text domain.
	 *
	 * @return string|false
	 */
	public function layerBundledCatalog( $translations, $file, $handle, $domain ) {
		if ( 'surecart' !== $domain || ! $translations ) {
			return $translations;
		}

		$override = json_decode( $translations, true );
		// load_script_textdomain() accepts messages under the domain key or "messages".
		$key           = isset( $override['locale_data'][ $domain ] ) ? $domain : 'messages';
		$override_msgs = $override['locale_data'][ $key ] ?? null;
		if ( ! is_array( $override_msgs ) ) {
			return $translations;
		}

		$locale = apply_filters( 'plugin_locale', determine_locale(), 'surecart' );
		$layers = [
			WP_LANG_DIR . '/plugins/surecart-' . $locale . '.json',
			SURECART_LANGUAGE_DIR . '/surecart-' . $locale . '.json',
		];
		$merged = $override_msgs;
		foreach ( $layers as $layer ) {
			if ( ! is_readable( $layer ) || realpath( $file ) === realpath( $layer ) ) {
				continue;
			}
			$base      = json_decode( (string) file_get_contents( $layer ), true );
			$base_msgs = $base['locale_data'][ $domain ] ?? $base['locale_data']['messages'] ?? null;
			if ( is_array( $base_msgs ) ) {
				// Union, not array_merge: it keeps numeric-looking msgids and lets earlier layers win.
				$merged += $base_msgs;
			}
		}

		if ( $merged === $override_msgs ) {
			return $translations;
		}
		$override['locale_data'][ $key ] = $merged;

		// Slashes stay escaped so a "</script>" inside a string can't close the inline tag.
		return wp_json_encode( $override, JSON_UNESCAPED_UNICODE );
	}

	/**
	 * Compile javascript translations as a single file.
	 * We need to do this since we lazy load a lot of our scripts.
	 *
	 * @param string $path Path for the json file.
	 * @param string $po_path Path of the po.
	 *
	 * @return string
	 */
	public function compileSingleJSON( $path, $po_path ) {
		$info = pathinfo( $po_path );
		if ( 'surecart' === substr( $info['filename'], 0, 8 ) ) {
			$path = $info['dirname'] . '/' . $info['filename'] . '.json';
		}
		return $path;
	}

	/**
	 * Load the single translation file when the domain loads.
	 *
	 * @param string $file The file.
	 * @param string $handle The script handle.
	 * @param string $domain The domain.
	 *
	 * @return string
	 */
	public function loadSingleTranslationFile( $file, $handle, $domain ) {
		if ( 'surecart' === $domain ) {
			$locale = apply_filters( 'plugin_locale', determine_locale(), 'surecart' );

			if ( ! file_exists( $file ) && file_exists( WP_LANG_DIR . '/loco/plugins/surecart-' . $locale . '.json' ) ) {
				return WP_LANG_DIR . '/loco/plugins/surecart-' . $locale . '.json';
			}
			if ( file_exists( WP_LANG_DIR . '/plugins/surecart-' . $locale . '.json' ) ) {
				return WP_LANG_DIR . '/plugins/surecart-' . $locale . '.json';
			}
			if ( is_string( $file ) ) {
				if ( false !== strpos( $file, SURECART_PLUGIN_DIR_NAME . '/languages/' ) ) {
					$first_part = substr( $file, 0, strpos( $file, SURECART_PLUGIN_DIR_NAME . '/languages/' ) );
					$file       = $first_part . SURECART_PLUGIN_DIR_NAME . '/languages/surecart-' . $locale . '.json';
				} else {
					$first_part = substr( $file, 0, strpos( $file, 'plugins/surecart-' ) );
					$file       = $first_part . 'plugins/surecart-' . $locale . '.json';
				}
			}

			if ( false === $file ) {
				$file = SURECART_LANGUAGE_DIR . '/surecart-' . $locale . '.json';
			}
		}
		return $file;
	}

	/**
	 * This is needed for Loco translate to work properly.
	 */
	public function loadPluginTextDomain() {
		// Default languages directory for SureCart.
		$lang_dir = trailingslashit( SURECART_LANGUAGE_DIR );

		/**
		 * Filters the languages directory path to use for SureCart.
		 *
		 * @param string $lang_dir The languages directory path.
		 */
		$lang_dir = apply_filters( 'surecart_languages_directory', $lang_dir );

		// Use determine_locale() which returns user locale in admin, site locale on frontend.
		// Allow plugins/themes to override via 'plugin_locale' filter.
		$locale = apply_filters( 'plugin_locale', determine_locale(), 'surecart' );
		$mofile = sprintf( '%1$s-%2$s.mo', 'surecart', $locale );

		// Setup paths to current locale file.
		$mofile_local  = $lang_dir . $mofile;
		$mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;

		// Load both: the first file loaded wins per string, so the global (merchant) file overrides
		// and the bundled one fills strings it lacks, including ones added in later releases.
		$loaded = false;
		foreach ( [ $mofile_global, $mofile_local ] as $file ) {
			if ( file_exists( $file ) ) {
				$loaded = load_textdomain( 'surecart', $file ) || $loaded;
			}
		}

		if ( ! $loaded ) {
			load_plugin_textdomain( 'surecart', false, $lang_dir );
		}
	}
}
