<?php

namespace SureCart\AgentCatalog;

use SureCart\Models\Form;
use SureCart\Models\Price;
use SureCart\Models\Product;
use SureCart\Support\Currency;

/**
 * Builds the public, read-only product manifest for external AI shopping agents.
 *
 * Reads only the locally synced `sc_product` posts — never the platform API — so an
 * anonymous request cannot fan out to api.surecart.com, and webhook re-syncs keep it fresh.
 * Field names follow the OpenAI ACP product feed / Google UCP catalog vocabulary so a later
 * push exporter is a mapping, not a remodel.
 *
 * Items are an explicit allow-list, never a serialized model, so private catalog fields
 * (stock counts, SKUs, downloads — see \SureCart\Support\PublicCatalogData) cannot leak through here.
 */
class AgentCatalogService {
	/**
	 * Manifest schema version. Bump on any breaking change to the output shape.
	 *
	 * @var string
	 */
	const SCHEMA_VERSION = '1.0';

	/**
	 * The option that turns the public catalog on or off (on by default).
	 *
	 * @var string
	 */
	const ENABLED_OPTION = 'surecart_agent_catalog_enabled';

	/**
	 * Default and maximum products per page, and the size of each cached chunk.
	 *
	 * @var int
	 */
	const DEFAULT_PER_PAGE = 100;

	/**
	 * How long a cached chunk is kept server-side, matching the endpoint's Cache-Control max-age.
	 *
	 * @var int
	 */
	const CACHE_TTL = 300;

	/**
	 * Option holding the cache version; bumping it orphans every cached page at once.
	 *
	 * @var string
	 */
	const CACHE_VERSION_OPTION = 'surecart_agent_catalog_cache_version';

	/**
	 * Prefix of every cache row and rebuild lock.
	 *
	 * @var string
	 */
	const CACHE_PREFIX = 'sc_agent_catalog_';

	/**
	 * How long a chunk's row is kept, so an outdated one can still be served while another request rebuilds it.
	 *
	 * @var int
	 */
	const STALE_TTL = DAY_IN_SECONDS;

	/**
	 * Seconds after which a rebuild lock is treated as abandoned (the builder died).
	 *
	 * @var int
	 */
	const LOCK_TIMEOUT = 30;

	/**
	 * Product metadata set to 'true' to hide a product. Synced to post meta, so the query filters it.
	 *
	 * @var string
	 */
	const HIDDEN_META_KEY = 'agent_catalog_hidden';

	/**
	 * Memoized live checkout page URL; null until resolved.
	 *
	 * @var string|null
	 */
	protected $live_checkout_url = null;

	/**
	 * Whether the cache was already invalidated this request.
	 *
	 * @var bool
	 */
	protected $flushed = false;

	/**
	 * Register WordPress hooks.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_action( 'wp_head', array( $this, 'addDiscoveryLink' ) );

		// save_post_sc_product also catches status, password and trash changes made in wp-admin.
		$checkout_option = \SureCart::pages()->getOptionName( 'checkout', 'page' );
		foreach ( array( 'surecart/product/sync/created', 'surecart/product/sync/updated', 'surecart/product_deleted', 'save_post_sc_product', 'surecart/account_updated', "add_option_{$checkout_option}", "update_option_{$checkout_option}" ) as $hook ) {
			add_action( $hook, array( $this, 'flushCache' ) );
		}
		add_action( 'save_post_page', array( $this, 'flushCacheForCheckoutPage' ) );
		add_action( 'save_post_sc_form', array( $this, 'flushCacheForCheckoutForm' ) );
	}

	/**
	 * Invalidate when the checkout form is saved; other forms never reach the manifest.
	 *
	 * @param int $post_id The saved form id.
	 *
	 * @return void
	 */
	public function flushCacheForCheckoutForm( $post_id ) {
		$form = $this->checkoutForm();
		if ( $form && (int) $post_id === (int) $form->ID ) {
			$this->flushCache();
		}
	}

	/**
	 * Invalidate every cached manifest page; repeated calls write once until a chunk is rebuilt.
	 *
	 * @return void
	 */
	public function flushCache() {
		$this->live_checkout_url = null;

		if ( $this->flushed ) {
			return;
		}
		$this->flushed = true;

		update_option( self::CACHE_VERSION_OPTION, (string) microtime( true ), false );
	}

	/**
	 * Invalidate when the checkout page itself is edited (e.g. its form is swapped).
	 *
	 * @param int $post_id The saved page id.
	 *
	 * @return void
	 */
	public function flushCacheForCheckoutPage( $post_id ) {
		if ( (int) $post_id === \SureCart::pages()->getId( 'checkout' ) ) {
			$this->flushCache();
		}
	}

	/**
	 * Is the public manifest enabled for this store?
	 *
	 * @return bool
	 */
	public function isEnabled(): bool {
		return (bool) get_option( self::ENABLED_OPTION, true );
	}

	/**
	 * Advertise the manifest to agents that read page HTML.
	 *
	 * @return void
	 */
	public function addDiscoveryLink() {
		if ( ! $this->isEnabled() ) {
			return;
		}
		printf(
			'<link rel="alternate" type="application/json" title="%s" href="%s" />' . "\n",
			esc_attr__( 'Product catalog for AI agents', 'surecart' ),
			esc_url( $this->url() )
		);
	}

	/**
	 * Get one page of the manifest.
	 *
	 * Pages are sliced from cached fixed-size chunks of the catalog, so any page/per_page an
	 * anonymous caller picks is served from cache, and the number of cache rows is bounded by
	 * the catalog size — not by the inputs.
	 *
	 * @param int $page     1-based page number.
	 * @param int $per_page Products per page, 1 to DEFAULT_PER_PAGE.
	 *
	 * @return array
	 */
	public function page( int $page = 1, int $per_page = self::DEFAULT_PER_PAGE ): array {
		$per_page = max( 1, min( self::DEFAULT_PER_PAGE, $per_page ) );
		$window   = $this->window( $page, $per_page );
		$total    = $window['total'];

		$total_pages = (int) ceil( $total / $per_page );

		return array(
			'schema_version' => self::SCHEMA_VERSION,
			'generated_at'   => gmdate( 'c' ),
			'store'          => $this->store(),
			'products'       => $window['products'],
			'pagination'     => array(
				'page'        => $page,
				'per_page'    => $per_page,
				'total'       => $total,
				'total_pages' => $total_pages,
				'next'        => $page < $total_pages ? add_query_arg(
					array(
						'page'     => $page + 1,
						'per_page' => $per_page,
					),
					$this->url()
				) : null,
			),
		);
	}

	/**
	 * One fixed-size chunk of formatted products. An outdated row is served while one request rebuilds it.
	 *
	 * @param int $index 0-based chunk index.
	 *
	 * @return array{total: int, items: array} Items keep null for posts that aren't quotable.
	 */
	protected function chunk( int $index ): array {
		// plugin version in the key: an update never serves the old output shape.
		$key     = self::CACHE_PREFIX . \SureCart::plugin()->version() . '_' . $index;
		$version = (string) get_option( self::CACHE_VERSION_OPTION, '' );
		$copy    = get_transient( $key );
		$copy    = is_array( $copy ) ? $copy : null;

		if ( $copy && $version === $copy['version'] && $copy['expires'] > time() ) {
			return $copy['chunk'];
		}

		$lock = self::CACHE_PREFIX . 'lock_' . $index;
		if ( $copy && ! $this->acquireLock( $lock ) ) {
			return $copy['chunk'];
		}

		try {
			$chunk = $this->buildChunk( $index );
		} finally {
			if ( $copy ) {
				$this->releaseLock( $lock );
			}
		}

		// a rebuild with identical output (e.g. Test -> Live -> Test) keeps its Last-Modified.
		$hash                = md5( wp_json_encode( array( $chunk, $this->store() ) ) );
		$unchanged           = $copy && ( $copy['hash'] ?? '' ) === $hash;
		$chunk['changed_at'] = $unchanged ? $copy['chunk']['changed_at'] : time();

		// stored even when empty, so a store with nothing listed doesn't query on every hit.
		set_transient(
			$key,
			array(
				'version' => $version,
				'expires' => time() + self::CACHE_TTL,
				'hash'    => $hash,
				'chunk'   => $chunk,
			),
			self::STALE_TTL
		);
		// re-arm flushCache().
		$this->flushed = false;

		return $chunk;
	}

	/**
	 * Query and format one chunk of products.
	 *
	 * @param int $index 0-based chunk index.
	 *
	 * @return array{total: int, items: array}
	 */
	protected function buildChunk( int $index ): array {
		$query = new \WP_Query(
			array_merge(
				$this->listedQueryArgs(),
				array(
					'posts_per_page' => self::DEFAULT_PER_PAGE,
					'offset'         => $index * self::DEFAULT_PER_PAGE,
					// stable order so pages don't shift while an agent walks them.
					'orderby'        => 'ID',
					'order'          => 'ASC',
				)
			)
		);

		return array(
			'total' => (int) $query->found_posts,
			'items' => array_map( array( $this, 'product' ), $query->posts ),
		);
	}

	/**
	 * Take a short-lived rebuild lock. INSERT IGNORE, like WP_Upgrader::create_lock(): add_option() upserts.
	 *
	 * @param string $name Lock option name.
	 *
	 * @return bool Whether this request holds the lock.
	 */
	protected function acquireLock( string $name ): bool {
		global $wpdb;

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( $wpdb->query( $wpdb->prepare( "INSERT IGNORE INTO `$wpdb->options` ( `option_name`, `option_value`, `autoload` ) VALUES ( %s, %s, 'no' )", $name, time() ) ) ) {
			return true;
		}

		// get_option() may hold a cached miss.
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$locked_at = (int) $wpdb->get_var( $wpdb->prepare( "SELECT option_value FROM `$wpdb->options` WHERE option_name = %s", $name ) );

		if ( $locked_at < time() - self::LOCK_TIMEOUT ) {
			$this->releaseLock( $name );
		}

		return false;
	}

	/**
	 * Delete every cache row and lock, for uninstall.
	 *
	 * @return void
	 */
	public function deleteCache() {
		global $wpdb;

		foreach ( array( '_transient_', '_transient_timeout_', '' ) as $type ) {
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			$wpdb->query( $wpdb->prepare( "DELETE FROM `$wpdb->options` WHERE option_name LIKE %s", $wpdb->esc_like( $type . self::CACHE_PREFIX ) . '%' ) );
		}
	}

	/**
	 * Drop a rebuild lock.
	 *
	 * @param string $name Lock option name.
	 *
	 * @return void
	 */
	protected function releaseLock( string $name ) {
		global $wpdb;
		$wpdb->delete( $wpdb->options, array( 'option_name' => $name ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	/**
	 * Query args for the products the catalog may name: published, not password-protected, not hidden.
	 *
	 * @param array $meta_query Extra meta clauses, ANDed with the hidden check.
	 *
	 * @return array
	 */
	protected function listedQueryArgs( array $meta_query = array() ): array {
		return array(
			'post_type'              => 'sc_product',
			'post_status'            => 'publish',
			'has_password'           => false,
			'meta_query'             => array_merge(
				array(
				'relation' => 'AND',
				$this->visibleMetaQuery(),
				),
				$meta_query
			), // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
			'update_post_term_cache' => false,
		);
	}

	/**
	 * Which of these product ids the catalog may name.
	 *
	 * @param string[] $ids Product ids.
	 *
	 * @return string[]
	 */
	protected function listedProductIds( array $ids ): array {
		if ( empty( $ids ) ) {
			return array();
		}

		$posts = get_posts(
			array_merge(
				$this->listedQueryArgs(
					array(
						array(
							'key'     => 'sc_id',
							'value'   => $ids,
							'compare' => 'IN',
						),
					)
				),
				array(
					'posts_per_page' => -1,
					'no_found_rows'  => true,
				)
			)
		);

		return array_map(
			function ( $post ) {
				return (string) get_post_meta( $post->ID, 'sc_id', true );
			},
			$posts
		);
	}

	/**
	 * Products the merchant has not hidden.
	 *
	 * @return array
	 */
	protected function visibleMetaQuery(): array {
		return array(
			'relation' => 'OR',
			array(
				'key'     => self::HIDDEN_META_KEY,
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => self::HIDDEN_META_KEY,
				'value'   => 'true',
				'compare' => '!=',
			),
		);
	}

	/**
	 * How many published products the merchant has hidden. Admin only, never in the manifest.
	 *
	 * @return int
	 */
	public function hiddenCount(): int {
		$query = new \WP_Query(
			array(
				'post_type'              => 'sc_product',
				'post_status'            => 'publish',
				'has_password'           => false,
				'meta_key'               => self::HIDDEN_META_KEY, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value'             => 'true', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'fields'                 => 'ids',
				'posts_per_page'         => 1,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
			)
		);

		return (int) $query->found_posts;
	}

	/**
	 * The public manifest URL.
	 *
	 * @return string
	 */
	public function url(): string {
		return rest_url( 'surecart/v1/agent-catalog' );
	}

	/**
	 * Store-level (seller) information.
	 *
	 * @return array
	 */
	protected function store(): array {
		$account = \SureCart::account();
		$portal  = $account->customer_portal_protocol ?? null;
		$privacy = ! empty( $portal->privacy_url ) ? esc_url_raw( $portal->privacy_url ) : get_privacy_policy_url();

		return array(
			'name'               => get_bloginfo( 'name' ),
			'url'                => home_url( '/' ),
			'currency'           => strtoupper( (string) ( $account->currency ?? '' ) ),
			'terms_url'          => ! empty( $portal->terms_url ) ? esc_url_raw( $portal->terms_url ) : null,
			'privacy_policy_url' => $privacy ? $privacy : null,
		);
	}

	/**
	 * Format one synced product post for agents.
	 *
	 * @param \WP_Post $post The synced product post.
	 *
	 * @return array|null Null when the product cannot be quoted (no model or no active price).
	 */
	public function product( \WP_Post $post ) {
		$product = \SureCart::productPost()->getModel( $post->ID );
		if ( ! $product instanceof Product ) {
			return null;
		}

		$prices = array_values(
			array_filter(
				(array) $product->active_prices,
				function ( $price ) {
					return $price instanceof Price && ! empty( $price->currency );
				}
			)
		);
		if ( empty( $prices ) ) {
			return null;
		}

		// a bundle with variable components needs the buyer's component choices, which a link can't carry.
		$can_link = ! $product->has_variable_components;
		$variants = $this->variants( $product, $prices, $can_link );

		$in_stock = null === $variants ? (bool) $product->in_stock : in_array( 'in_stock', array_column( $variants, 'availability' ), true );
		$in_stock = $in_stock && $this->bundleComponentsAvailable( $product );

		// a variant product needs a variant choice, so only its variants carry links.
		$linkable = $can_link && null === $variants && $in_stock;
		$offers   = array_map(
			function ( $price ) use ( $linkable ) {
				return $this->offer( $price, $linkable );
			},
			$prices
		);

		$item = array(
			'id'           => $product->id,
			'title'        => $product->name,
			'description'  => trim( wp_strip_all_tags( (string) $product->description ) ),
			'url'          => get_permalink( $post ),
			'checkout_url' => ( $in_stock ? $this->instantCheckoutUrl( $product ) : null ) ?? $offers[0]['checkout_url'],
			'image_url'    => $this->imageUrl( $product ),
			'availability' => $in_stock ? 'in_stock' : 'out_of_stock',
			'price'        => array(
				'amount'   => $offers[0]['amount'],
				'currency' => $offers[0]['currency'],
				'display'  => $offers[0]['display'],
			),
			'offers'       => $offers,
			'has_variants' => null !== $variants,
			'variants'     => $variants ?? array(),
			'is_bundle'    => ! empty( $product->bundle ),
			'bundle_items' => $this->bundleItems( $product ),
			'shippable'    => (bool) $product->shipping_enabled,
			'license'      => $product->licensing_enabled ? array(
				'type'             => 'license_key',
				'activation_limit' => $product->license_activation_limit ? (int) $product->license_activation_limit : null,
			) : null,
			'updated_at'   => $product->updated_at ? gmdate( 'c', (int) $product->updated_at ) : null,
		);

		/**
		 * Filter a product as exposed to external AI agents. Return null to leave it out.
		 *
		 * @param array                    $item    The manifest item.
		 * @param Product $product The product model.
		 */
		$item = apply_filters( 'surecart/agent_catalog/product', $item, $product );

		return is_array( $item ) ? $item : null;
	}

	/**
	 * Format a price as an offer.
	 *
	 * @param Price $price    The price.
	 * @param bool  $linkable Whether a price alone can be bought (no variant choice, in stock).
	 *
	 * @return array
	 */
	protected function offer( Price $price, bool $linkable ): array {
		$billing = 'one_time';
		if ( ! empty( $price->recurring_interval ) ) {
			$billing = (int) $price->recurring_period_count > 1 ? 'installments' : 'subscription';
		}

		return array_merge(
			array(
				'id'   => $price->id,
				'name' => $price->name ? $price->name : null,
			),
			$this->money( $this->baseAmount( $price ), $price->currency ),
			array(
				'billing'           => $billing,
				'interval'          => $price->recurring_interval ? $price->recurring_interval : null,
				'interval_count'    => $price->recurring_interval ? (int) $price->recurring_interval_count : null,
				'payments'          => 'installments' === $billing ? (int) $price->recurring_period_count : null,
				'pay_what_you_want' => (bool) $price->ad_hoc,
				'checkout_url'      => $linkable ? $this->checkoutPageUrl( $price ) : null,
			)
		);
	}

	/**
	 * Variants with their own availability and per-price checkout links.
	 *
	 * @param Product $product  The product.
	 * @param Price[] $prices   The quotable prices.
	 * @param bool    $can_link Whether the product can be bought by link at all.
	 *
	 * @return array|null Null when the product has no variants.
	 */
	protected function variants( Product $product, array $prices, bool $can_link ) {
		if ( empty( $product->variants->data ) ) {
			return null;
		}

		// option_1..3 map to the product's variant options in position order.
		$options = $this->byPosition( $product->variant_options->data ?? array() );

		return array_map(
			function ( $variant ) use ( $product, $prices, $options, $can_link ) {
				$values = array_filter( array( $variant->option_1, $variant->option_2, $variant->option_3 ) );

				$in_stock = $this->variantInStock( $variant, $product );

				return array(
					'id'           => $variant->id,
					'title'        => implode( ' / ', $values ),
					'options'      => array_values(
						array_map(
							function ( $value, $slot ) use ( $options ) {
								return array(
									'name'  => $options[ $slot ]->name ?? null,
									'value' => $value,
								);
							},
							$values,
							array_keys( $values )
						)
					),
					'availability' => $in_stock ? 'in_stock' : 'out_of_stock',
					'offers'       => array_map(
						function ( $price ) use ( $variant, $prices, $in_stock, $can_link ) {
							// the product page shows a variant's own amount only when there is a single price.
							$amount = 1 === count( $prices ) && ! empty( $variant->amount ) ? (int) $variant->amount : $this->baseAmount( $price );

							return array_merge(
								array( 'id' => $price->id ),
								$this->money( $amount, $price->currency ),
								array( 'checkout_url' => $can_link && $in_stock ? $this->checkoutPageUrl( $price, $variant->id ) : null )
							);
						},
						$prices
					),
				);
			},
			$product->variants->data
		);
	}

	/**
	 * What a bundle contains and the choices the buyer makes. Component variants belong to other products, so they are not the bundle's `variants`.
	 *
	 * @param Product $product The product.
	 *
	 * @return array Empty for products that are not bundles.
	 */
	protected function bundleItems( Product $product ): array {
		if ( empty( $product->bundle ) ) {
			return array();
		}

		$components = array();
		foreach ( $this->byPosition( $product->bundle_items->data ?? array() ) as $item ) {
			$component = $product->resolveBundleComponent( $item );
			if ( empty( $component->id ) ) {
				$component = is_object( $item->component_product ?? null ) ? $item->component_product : null;
			}
			if ( ! empty( $component->id ) ) {
				$components[] = array( $item, $component );
			}
		}

		// a component left out of the catalog (hidden, draft, archived) is not named through its bundle either.
		$listed = $this->listedProductIds(
			array_map(
				function ( $pair ) {
					return $pair[1]->id;
				},
				$components
			)
		);

		$items = array();
		foreach ( $components as list( $item, $component ) ) {
			if ( ! in_array( $component->id, $listed, true ) ) {
				continue;
			}

			$items[] = array(
				'product_id' => $component->id,
				'title'      => $component->name ?? null,
				'quantity'   => max( 1, (int) ( $item->quantity ?? 1 ) ),
				'options'    => array_map(
					function ( $option ) {
						return array(
							'name'   => $option->name ?? null,
							'values' => array_values( (array) ( $option->values ?? array() ) ),
						);
					},
					$this->byPosition( $component->variant_options->data ?? array() )
				),
			);
		}

		return $items;
	}

	/**
	 * Whether a variant can be bought.
	 *
	 * @param object  $variant The variant.
	 * @param Product $product Its product.
	 *
	 * @return bool
	 */
	protected function variantInStock( $variant, Product $product ): bool {
		// an unset variant stock flag falls back to the product's. Not `??`: Model::__isset skips accessors.
		$unlimited = $variant->has_unlimited_stock;
		if ( null === $unlimited ) {
			$unlimited = $product->has_unlimited_stock;
		}

		return $unlimited || (int) $variant->available_stock > 0;
	}

	/**
	 * Whether every bundle component can be bought, as the product page requires. True for non-bundles.
	 *
	 * @param Product $product The product.
	 *
	 * @return bool
	 */
	protected function bundleComponentsAvailable( Product $product ): bool {
		if ( empty( $product->bundle ) ) {
			return true;
		}

		foreach ( $product->bundle_items->data ?? array() as $item ) {
			$component = $product->resolveBundleComponent( $item );
			if ( ! $component instanceof Product ) {
				continue;
			}

			// "Unavailable for purchase": a false "out of stock" costs a sale, a false "in stock" a failed checkout.
			if ( ! empty( $component->archived ) ) {
				return false;
			}

			$variants = $component->variants->data ?? array();
			$in_stock = empty( $variants )
				? (bool) $component->in_stock
				: ! empty(
					array_filter(
						$variants,
						function ( $variant ) use ( $component ) {
							return $this->variantInStock( $variant, $component );
						}
					)
				);

			if ( ! $in_stock ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Sort records by their `position`, the order the merchant set.
	 *
	 * @param array $records Records with an optional `position`.
	 *
	 * @return array
	 */
	protected function byPosition( $records ): array {
		$records = array_values( (array) $records );
		usort(
			$records,
			function ( $a, $b ) {
				return (int) ( $a->position ?? 0 ) <=> (int) ( $b->position ?? 0 );
			}
		);

		return $records;
	}

	/**
	 * The amount to quote for a price, in minor units.
	 *
	 * @param Price $price The price.
	 *
	 * @return int
	 */
	protected function baseAmount( Price $price ): int {
		return $price->ad_hoc ? (int) $price->ad_hoc_min_amount : (int) $price->amount;
	}

	/**
	 * An amount as the agent-facing `amount`, `currency` and `display` fields.
	 *
	 * @param int    $amount   Amount in minor units.
	 * @param string $currency Currency code.
	 *
	 * @return array
	 */
	protected function money( int $amount, string $currency ): array {
		return array(
			'amount'   => Currency::maybeConvertAmount( $amount, $currency ),
			'currency' => strtoupper( $currency ),
			'display'  => Currency::format( $amount, $currency ),
		);
	}

	/**
	 * Direct-to-checkout link for one price (and variant) — the same URL the Buy Button block builds.
	 *
	 * @param Price       $price      The price.
	 * @param string|null $variant_id The chosen variant, for variant products.
	 *
	 * @return string|null Null when a price can't be bought by link, or the checkout page is missing or not live.
	 */
	protected function checkoutPageUrl( Price $price, $variant_id = null ) {
		$checkout = $this->liveCheckoutPageUrl();

		// a pay-what-you-want price needs the buyer's amount.
		if ( empty( $checkout ) || $price->ad_hoc ) {
			return null;
		}

		return add_query_arg(
			array(
				'line_items' => array(
					array_filter(
						array(
							'price_id'   => $price->id,
							'variant_id' => $variant_id,
							'quantity'   => 1,
						)
					),
				),
				// keep it out of the shopper's persisted cart.
				'no_cart'    => true,
			),
			$checkout
		);
	}

	/**
	 * The checkout page URL, only when its form takes live payments.
	 *
	 * Resolved once per instance: every offer on the page shares it.
	 *
	 * @return string Empty when there is no live checkout page.
	 */
	protected function liveCheckoutPageUrl(): string {
		if ( null !== $this->live_checkout_url ) {
			return $this->live_checkout_url;
		}

		// never send an agent's buyer to a test-mode checkout.
		$this->live_checkout_url = 'live' === $this->checkoutMode() ? (string) get_permalink( \SureCart::pages()->get( 'checkout' ) ) : '';

		return $this->live_checkout_url;
	}

	/**
	 * The checkout form on the store's checkout page.
	 *
	 * @return \WP_Post|null Null when there is no checkout page or it has no form.
	 */
	public function checkoutForm() {
		$page = \SureCart::pages()->get( 'checkout' );
		$form = $page ? \SureCart::post()->getFormPost( $page ) : null;

		return ! empty( $form->ID ) ? $form : null;
	}

	/**
	 * The payment mode of the checkout page, which decides whether offers get checkout links.
	 *
	 * @return string 'live', 'test', or '' when there is no checkout form.
	 */
	public function checkoutMode(): string {
		$form = $this->checkoutForm();

		return $form ? (string) Form::getMode( $form->ID ) : '';
	}

	/**
	 * When a manifest page's content last changed: the newest chunk it reads from.
	 *
	 * @param int $page     1-based page number.
	 * @param int $per_page Products per page.
	 *
	 * @return int Unix timestamp.
	 */
	public function lastModified( int $page, int $per_page ): int {
		return $this->window( $page, max( 1, min( self::DEFAULT_PER_PAGE, $per_page ) ) )['changed_at'];
	}

	/**
	 * The products on one page, sliced from the cached chunks it spans.
	 *
	 * @param int $page     1-based page number.
	 * @param int $per_page Products per page, 1 to DEFAULT_PER_PAGE.
	 *
	 * @return array{total: int, products: array, changed_at: int}
	 */
	protected function window( int $page, int $per_page ): array {
		$offset = ( max( 1, $page ) - 1 ) * $per_page;
		$first  = intdiv( $offset, self::DEFAULT_PER_PAGE );
		$last   = intdiv( $offset + $per_page - 1, self::DEFAULT_PER_PAGE );

		// chunk 0 carries the total, so it is always read.
		$head       = $this->chunk( 0 );
		$changed_at = $head['changed_at'];
		$slots      = array();
		for ( $index = $first; $offset < $head['total'] && $index <= $last; $index++ ) {
			$chunk      = 0 === $index ? $head : $this->chunk( $index );
			$slots      = array_merge( $slots, $chunk['items'] );
			$changed_at = max( $changed_at, $chunk['changed_at'] );
		}

		return array(
			'total'      => $head['total'],
			// slots keep nulls for skipped posts so offsets match the query.
			'products'   => array_values( array_filter( array_slice( $slots, $offset - $first * self::DEFAULT_PER_PAGE, $per_page ) ) ),
			'changed_at' => $changed_at,
		);
	}

	/**
	 * The product's Instant Checkout page, only when published and taking live payments.
	 *
	 * @param Product $product The product.
	 *
	 * @return string|null
	 */
	protected function instantCheckoutUrl( Product $product ) {
		$buy_link = $product->buyLink();

		// never send an agent's buyer to a test-mode checkout.
		if ( ! $buy_link->isEnabled() || 'test' === $buy_link->getMode() ) {
			return null;
		}

		return $buy_link->url();
	}

	/**
	 * The primary product image URL.
	 *
	 * @param Product $product The product.
	 *
	 * @return string|null
	 */
	protected function imageUrl( Product $product ) {
		$image = $product->featured_image;
		if ( empty( $image ) || ! method_exists( $image, 'attributes' ) ) {
			return null;
		}

		$src = $image->attributes( 'large' )->src ?? '';

		return $src ? esc_url_raw( $src ) : null;
	}
}
