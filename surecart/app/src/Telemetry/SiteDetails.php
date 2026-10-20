<?php

namespace SureCart\Telemetry;

/**
 * Builds and records the site_details_synced event.
 */
class SiteDetails {
	/**
	 * Hash of the last recorded properties.
	 *
	 * @var string
	 */
	const HASH_OPTION = 'surecart_telemetry_site_hash';

	/**
	 * Throttles the change check to once a day.
	 *
	 * @var string
	 */
	const CHECKED_TRANSIENT = 'surecart_telemetry_site_checked';

	/**
	 * Install sources the platform accepts. Must match ProvisionalAccount::SOURCES there.
	 *
	 * @var string[]
	 */
	const SOURCES = [ 'astra', 'starter_templates', 'surecart_wp', 'zipwp' ];

	/**
	 * Our companion plugins, by wordpress.org slug.
	 *
	 * @var string[]
	 */
	const COMPANION_PLUGINS = [
		'astra-sites',
		'astra-widgets',
		'astra-bulk-edit',
		'astra-hooks',
		'astra-import-export',
		'reset-astra-customizer',
		'custom-fonts',
		'custom-typekit-fonts',
		'sidebar-manager',
		'fullwidth-templates',
		'ultimate-addons-for-gutenberg',
		'spectra-blocks',
		'sureforms',
		'surerank',
		'suremails',
		'surecontact',
		'surecookie',
		'suredash',
		'suredonation',
		'suremembers-core',
		'surefeedback-cloud',
		'projecthuddle-child-site',
		'suretriggers',
		'presto-player',
		'latepoint',
		'cartflows',
		'woo-cart-abandonment-recovery',
		'modern-cart',
		'power-coupons',
		'variation-swatches-woo',
		'header-footer-elementor',
		'ultimate-addons-for-beaver-builder-lite',
		'all-in-one-schemaorg-rich-snippets',
		'sigmize',
		'zip-ai',
	];

	/**
	 * Page builder signals, by slug. Any matching signal counts.
	 *
	 * Constants and classes are defined when the plugin is included, and
	 * get_template() is the parent theme folder, which survives white-labelling.
	 *
	 * @var array<string, array<string, string>>
	 */
	const PAGE_BUILDERS = [
		'avada'            => [
			'template' => 'Avada',
			'constant' => 'FUSION_BUILDER_VERSION',
		],
		'beaver_builder'   => [ 'constant' => 'FL_BUILDER_VERSION' ],
		'breakdance'       => [ 'constant' => '__BREAKDANCE_VERSION' ],
		'bricks'           => [
			'template' => 'bricks',
			'constant' => 'BRICKS_VERSION',
		],
		'brizy'            => [ 'constant' => 'BRIZY_VERSION' ],
		'divi'             => [
			'template' => 'Divi',
			'constant' => 'ET_BUILDER_PLUGIN_ACTIVE',
		],
		'elementor'        => [ 'constant' => 'ELEMENTOR_VERSION' ],
		'generateblocks'   => [ 'constant' => 'GENERATEBLOCKS_VERSION' ],
		'kadence_blocks'   => [ 'constant' => 'KADENCE_BLOCKS_VERSION' ],
		'otter'            => [ 'constant' => 'OTTER_BLOCKS_VERSION' ],
		'oxygen'           => [ 'constant' => 'CT_VERSION' ],
		'seedprod'         => [ 'constant' => 'SEEDPROD_VERSION' ],
		'spectra'          => [ 'constant' => 'UAGB_VER' ],
		'thrive_architect' => [ 'constant' => 'TVE_VERSION' ],
		'visual_composer'  => [ 'constant' => 'VCV_VERSION' ],
		'wpbakery'         => [ 'constant' => 'WPB_VC_VERSION' ],
		'zion'             => [ 'class' => 'ZionBuilder\\Plugin' ],
	];

	/**
	 * Page cache plugin signals, by slug. Optimisers like Autoptimize and
	 * Perfmatters are left out on purpose.
	 *
	 * @var array<string, array<string, string>>
	 */
	const CACHE_PLUGINS = [
		'breeze'               => [ 'constant' => 'BREEZE_VERSION' ],
		'cache_enabler'        => [ 'constant' => 'CACHE_ENABLER_VERSION' ],
		'comet_cache'          => [ 'constant' => 'WebSharks\\CometCache\\VERSION' ],
		'flying_press'         => [ 'constant' => 'FLYING_PRESS_VERSION' ],
		'hummingbird'          => [ 'constant' => 'WPHB_VERSION' ],
		'litespeed_cache'      => [ 'constant' => 'LSCWP_V' ],
		'nitropack'            => [ 'constant' => 'NITROPACK_VERSION' ],
		'siteground_optimizer' => [ 'constant' => 'SiteGround_Optimizer\\VERSION' ],
		'swift_performance'    => [ 'constant' => 'SWIFT_PERFORMANCE_VER' ],
		'w3_total_cache'       => [ 'constant' => 'W3TC' ],
		'wp_fastest_cache'     => [
			'constant' => 'WPFC_WP_PLUGIN_DIR',
			'class'    => 'WpFastestCache',
		],
		// Its page cache is optional, so this only says the plugin is active.
		'wp_optimize'          => [ 'constant' => 'WPO_VERSION' ],
		'wp_rocket'            => [ 'constant' => 'WP_ROCKET_VERSION' ],
		// Not WPCACHEHOME: it stays in wp-config.php after deactivation.
		'wp_super_cache'       => [ 'constant' => 'WPSC_VERSION_ID' ],
	];

	/**
	 * The telemetry service.
	 *
	 * @var \SureCart\Telemetry\TelemetryService
	 */
	protected $telemetry;

	/**
	 * Constructor.
	 *
	 * @param \SureCart\Telemetry\TelemetryService $telemetry The telemetry service.
	 */
	public function __construct( TelemetryService $telemetry ) {
		$this->telemetry = $telemetry;
	}

	/**
	 * Record the site details now.
	 *
	 * @return bool Whether the event was stored.
	 */
	public function sync(): bool {
		$properties = $this->properties();

		if ( ! $this->telemetry->record( 'site_details_synced', $properties ) ) {
			return false;
		}

		update_option( self::HASH_OPTION, $this->hash( $properties ), false );

		return true;
	}

	/**
	 * Record the site details if they changed, checking at most once a day.
	 *
	 * @return bool Whether the event was stored.
	 */
	public function maybeSync(): bool {
		if ( true !== $this->telemetry->consent() ) {
			return false;
		}

		if ( false !== get_transient( self::CHECKED_TRANSIENT ) ) {
			return false;
		}

		set_transient( self::CHECKED_TRANSIENT, 1, DAY_IN_SECONDS );

		if ( get_option( self::HASH_OPTION ) === $this->hash( $this->properties() ) ) {
			return false;
		}

		return $this->sync();
	}

	/**
	 * Get the event properties.
	 *
	 * Leaves out source_version, which the plugin can't know, and the
	 * reachability checks, which aren't built yet.
	 *
	 * @return array
	 */
	public function properties(): array {
		$home       = $this->telemetry->homeUrl();
		$properties = [
			'url'                      => $home,
			'wordpress_plugin_version' => \SureCart::plugin()->version(),
			'wordpress_version'        => get_bloginfo( 'version' ),
			'php_version'              => PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION,
			'environment_type'         => wp_get_environment_type(),
			'locale'                   => get_locale(),
			'active_theme'             => get_stylesheet(),
			'page_builders'            => $this->pageBuilders(),
			'active_companion_plugins' => $this->companionPlugins(),
			'woocommerce_active'       => class_exists( 'WooCommerce' ),
			'in_multisite_network'     => is_multisite(),
			// Not is_ssl(): that describes the current request, and is always false in cron.
			'https_enabled'            => 'https' === wp_parse_url( $home, PHP_URL_SCHEME ),
		];

		if ( $properties['woocommerce_active'] ) {
			$properties['woocommerce_product_count'] = (int) ( wp_count_posts( 'product' )->publish ?? 0 );
		}

		$source = $this->source();
		if ( null !== $source ) {
			$properties['source'] = $source;
		}

		// An empty list says nothing, so leave it out.
		$cache_plugins = $this->cachePlugins();
		if ( ! empty( $cache_plugins ) ) {
			$properties['cache_plugins'] = $cache_plugins;
		}

		return $properties;
	}

	/**
	 * Get the partner that installed SureCart.
	 *
	 * The plan rejects the whole event for a value outside its enum, so an
	 * unknown source is left out rather than sent.
	 *
	 * @return string|null
	 */
	public function source(): ?string {
		$source = sanitize_key( get_option( 'surecart_source', 'surecart_wp' ) );

		return in_array( $source, self::SOURCES, true ) ? $source : null;
	}

	/**
	 * Get the page builders in use.
	 *
	 * Always includes gutenberg: the block editor is available on every site
	 * and block content commonly sits alongside a visual builder.
	 *
	 * @return string[] Sorted slugs.
	 */
	public function pageBuilders(): array {
		return $this->sorted( array_merge( [ 'gutenberg' ], $this->detect( self::PAGE_BUILDERS ) ) );
	}

	/**
	 * Get the active page cache plugins.
	 *
	 * @return string[] Sorted slugs.
	 */
	public function cachePlugins(): array {
		return $this->detect( self::CACHE_PLUGINS );
	}

	/**
	 * Get the slugs whose signals match.
	 *
	 * Uses constants and classes rather than is_plugin_active(), since
	 * plugin.php isn't loaded in cron or Action Scheduler.
	 *
	 * @param array<string, array<string, string>> $signals Signal specs by slug.
	 *
	 * @return string[] Sorted slugs.
	 */
	public function detect( array $signals ): array {
		$template = get_template();
		$matches  = [];

		foreach ( $signals as $slug => $spec ) {
			if ( $this->matches( $spec, $template ) ) {
				$matches[] = (string) $slug;
			}
		}

		return $this->sorted( $matches );
	}

	/**
	 * Whether any signal in the spec matches.
	 *
	 * @param array<string, string> $spec     The constant, class and/or template to look for.
	 * @param string                $template The parent theme folder.
	 *
	 * @return bool
	 */
	protected function matches( array $spec, string $template ): bool {
		if ( isset( $spec['constant'] ) && defined( $spec['constant'] ) ) {
			return true;
		}

		if ( isset( $spec['class'] ) && class_exists( $spec['class'] ) ) {
			return true;
		}

		return isset( $spec['template'] ) && $spec['template'] === $template;
	}

	/**
	 * Sort and dedupe slugs so the change hash stays stable.
	 *
	 * @param string[] $slugs The slugs.
	 *
	 * @return string[]
	 */
	protected function sorted( array $slugs ): array {
		$slugs = array_values( array_unique( $slugs ) );
		sort( $slugs );

		return $slugs;
	}

	/**
	 * Get the active companion plugins.
	 *
	 * Reads the active plugin options directly so it works in cron
	 * without loading plugin.php.
	 *
	 * @return string[] Sorted wordpress.org slugs.
	 */
	public function companionPlugins(): array {
		$plugins = (array) get_option( 'active_plugins', [] );

		if ( is_multisite() ) {
			$plugins = array_merge( $plugins, array_keys( (array) get_site_option( 'active_sitewide_plugins', [] ) ) );
		}

		$folders = array_map(
			function ( $plugin ) {
				return dirname( (string) $plugin );
			},
			$plugins
		);

		$active = array_values( array_unique( array_intersect( self::COMPANION_PLUGINS, $folders ) ) );
		sort( $active );

		return $active;
	}

	/**
	 * Hash the properties for change detection.
	 *
	 * @param array $properties The properties.
	 *
	 * @return string
	 */
	protected function hash( array $properties ): string {
		return md5( (string) wp_json_encode( $properties ) );
	}
}
