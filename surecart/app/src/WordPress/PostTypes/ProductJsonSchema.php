<?php

namespace SureCart\WordPress\PostTypes;

use SureCart\Support\Currency;

/**
 * Builds the product JSON-LD that Google reads for rich results and merchant listings.
 */
class ProductJsonSchema {
	/**
	 * Get the product's JSON-LD, before the surecart/product/json_schema filter runs.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return array
	 */
	public function get( $product ): array {
		$gallery_image_urls = $this->getImageUrls( $product );
		$component          = empty( $product->variants->data ) ? $this->getVariableBundleComponent( $product ) : null;

		if ( ! empty( $product->variants->data ) || $component ) {
			$schema = $this->getProductGroupSchema( $product, $gallery_image_urls, $component );
		} else {
			$schema = array(
				'@context'        => 'https://schema.org',
				'@type'           => 'Product',
				'@id'             => $this->getProductId( $product ),
				'name'            => $product->name,
				'image'           => $gallery_image_urls,
				'description'     => sanitize_text_field( $product->description ),
				'offers'          => $this->getOffersSchema( $product ),
				'aggregateRating' => $this->getAggregateRatingSchema( $product ),
			);

			$sku = $this->getValidSku( $product->sku );
			if ( '' !== $sku ) {
				$schema['sku'] = $sku;
			}
		}

		// Merchant Center's is_bundle, which has no schema.org property for bundle product.
		if ( ! empty( $product->bundle ) ) {
			$schema['additionalProperty'] = array(
				array(
					'@type' => 'PropertyValue',
					'name'  => 'is_bundle',
					'value' => true,
				),
			);
		}

		return $this->withoutEmptyValues( $schema );
	}

	/**
	 * Get the offer for the price the product page preselects, if Google can list it.
	 *
	 * @param \SureCart\Models\Product      $product   The product.
	 * @param \SureCart\Models\Variant|null $variant   The variant the offer is for, if any.
	 * @param string|null                   $url       The offer URL; the product URL when null.
	 * @param \SureCart\Models\Product|null $component For a bundle, the component the variant belongs to.
	 *
	 * @return array
	 */
	public function getOffersSchema( $product, $variant = null, $url = null, $component = null ): array {
		$price = $product->initial_price;

		if ( empty( $price ) || ! empty( $price->recurring_interval ) || ! empty( $price->ad_hoc ) ) {
			return array();
		}

		$currency = strtoupper( (string) $price->currency );
		// Matches the amount the page displays, which is the initial variant's for variant-priced products.
		$amount   = (int) ( $variant ? $price->amount : $product->initial_amount );
		$in_stock = $product->in_stock;

		if ( $variant ) {
			// Matches the page: a variant amount only overrides when the product has a single price.
			// A component's variant amount never changes the bundle's price.
			if ( ! $component && ! empty( $variant->amount ) && 1 === count( (array) $product->active_prices ) ) {
				$amount = (int) $variant->amount;
			}

			$stock_owner = $component ?? $product;
			$in_stock    = ( $variant->has_unlimited_stock ?? $stock_owner->has_unlimited_stock ) || $variant->available_stock > 0;

			if ( $component ) {
				$in_stock = $in_stock && $product->in_stock && $this->otherBundleComponentsInStock( $product, $component );
			}
		}

		// A variant-priced product's price can be $0 while its variants carry the amounts.
		if ( $amount <= 0 ) {
			return array();
		}

		$offer = array(
			'@type'         => 'Offer',
			'url'           => $url ?? $this->getProductUrl( $product ),
			'price'         => Currency::maybeConvertAmount( $amount, $price->currency ),
			'priceCurrency' => $currency,
			'availability'  => $in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
			'itemCondition' => apply_filters( 'surecart/product/json_schema/condition', 'https://schema.org/NewCondition', $product ),
		);

		// The scratch amount belongs to the price, so it only applies when no variant amount overrides it.
		if ( $price->is_on_sale && (int) $price->amount === $amount ) {
			$offer['priceSpecification'] = array(
				'@type'         => 'UnitPriceSpecification',
				'priceType'     => 'https://schema.org/StrikethroughPrice',
				'price'         => Currency::maybeConvertAmount( $price->scratch_amount, $price->currency ),
				'priceCurrency' => $currency,
			);
		}

		if ( empty( $offer['itemCondition'] ) ) {
			unset( $offer['itemCondition'] );
		}

		if ( ! empty( $product->bundle ) ) {
			$contents = $this->getBundleContentsSchema( $product );
			if ( $contents ) {
				$offer['includesObject'] = $contents;
			}
		}

		return array( $offer );
	}

	/**
	 * Get the aggregate rating schema for the product.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return array
	 */
	public function getAggregateRatingSchema( $product ): array {
		if ( empty( $product->total_reviews ) ) {
			return array();
		}

		return array(
			'@type'       => 'AggregateRating',
			'ratingValue' => (string) $product->average_stars,
			'reviewCount' => (int) $product->total_reviews,
			'bestRating'  => 5,
			'worstRating' => 1,
		);
	}

	/**
	 * Drop empty optional values: they're invalid markup, and Google should report them as missing instead.
	 *
	 * @param array $schema A Product or ProductGroup schema.
	 *
	 * @return array
	 */
	protected function withoutEmptyValues( array $schema ): array {
		foreach ( array( 'image', 'offers', 'aggregateRating', 'description' ) as $key ) {
			if ( empty( $schema[ $key ] ) ) {
				unset( $schema[ $key ] );
			}
		}

		return $schema;
	}

	/**
	 * Get the product's gallery image URLs.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return string[]
	 */
	protected function getImageUrls( $product ): array {
		return array_values(
			array_filter(
				array_map(
					function ( $media ) {
						return $media->attributes()->src ?? '';
					},
					(array) ( $product->gallery ?? array() )
				)
			)
		);
	}

	/**
	 * Get the product's linked-data ID, so a bundle can reference it from another page.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return string
	 */
	protected function getProductId( $product ): string {
		return $this->getProductUrl( $product ) . '#product';
	}

	/**
	 * Get the canonical URL a shopper can buy the product from.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return string
	 */
	protected function getProductUrl( $product ): string {
		// Unpublished products have no product page; the buy page is the only public URL.
		return (string) ( $product->is_published ? $product->permalink : $product->buyLink()->url() );
	}

	/**
	 * Get the SKU if Google accepts it — it rejects SKUs containing whitespace.
	 *
	 * @param mixed $sku The SKU.
	 *
	 * @return string The SKU, or an empty string.
	 */
	protected function getValidSku( $sku ): string {
		$sku = (string) $sku;
		return ( '' !== $sku && ! preg_match( '/\s/', $sku ) ) ? $sku : '';
	}

	/**
	 * Get the ProductGroup schema, with one Product per variant.
	 *
	 * @param \SureCart\Models\Product      $product   The product.
	 * @param string[]                      $image     The product image URLs, used when a variant has no image.
	 * @param \SureCart\Models\Product|null $component For a bundle, the component whose variants are the bundle's.
	 *
	 * @return array
	 */
	protected function getProductGroupSchema( $product, $image, $component = null ): array {
		$source    = $component ?? $product;
		$varies_by = $this->getVariesBy( $source );

		$schema = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'ProductGroup',
			'@id'             => $this->getProductId( $product ),
			'name'            => $product->name,
			'image'           => $image,
			'description'     => sanitize_text_field( $product->description ),
			'url'             => $this->getProductUrl( $product ),
			'productGroupID'  => $product->id,
			'hasVariant'      => array_map(
				function ( $variant ) use ( $product, $varies_by, $image, $component ) {
					return $this->getVariantSchema( $product, $variant, $varies_by, $image, $component );
				},
				array_values( $source->variants->data )
			),
			'aggregateRating' => $this->getAggregateRatingSchema( $product ),
		);

		if ( ! empty( $varies_by ) ) {
			$schema['variesBy'] = array_values(
				array_map(
					function ( $property ) {
						return 'https://schema.org/' . $property;
					},
					$varies_by
				)
			);
		}

		return $schema;
	}

	/**
	 * Map the product's variant options to the schema.org properties Google groups variants by.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return array Variant option key (option_1…option_3) => schema.org property.
	 */
	protected function getVariesBy( $product ): array {
		/**
		 * Filters which variant option names map to which schema.org property.
		 *
		 * Only color, size, material and pattern are output: Google needs suggestedAge and
		 * suggestedGender inside a PeopleAudience, which free-text option values can't fill.
		 *
		 * @param array                    $map     sanitize_title() option name (e.g. "farbe") => schema.org property.
		 * @param \SureCart\Models\Product $product The product.
		 */
		// Cast: an object returned by a callback would fatal on array access.
		$map = (array) apply_filters(
			'surecart/product/json_schema/varies_by_map',
			array(
				'color'    => 'color',
				'colour'   => 'color',
				'size'     => 'size',
				'material' => 'material',
				'pattern'  => 'pattern',
			),
			$product
		);

		$supported = array( 'color', 'size', 'material', 'pattern' );
		$varies_by = array();

		foreach ( $this->getVariantOptionNames( $product ) as $option_key => $name ) {
			$property = $map[ $name ] ?? '';
			if ( in_array( $property, $supported, true ) && ! in_array( $property, $varies_by, true ) ) {
				$varies_by[ $option_key ] = $property;
			}
		}

		return $varies_by;
	}

	/**
	 * Get the product's variant option names as slugs, keyed by the variant field that holds their value.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return array Variant option key (option_1…option_3) => sanitize_title() option name.
	 */
	protected function getVariantOptionNames( $product ): array {
		$names = array();

		foreach ( array_values( (array) ( $product->variant_options->data ?? array() ) ) as $index => $option ) {
			$names[ 'option_' . ( $index + 1 ) ] = sanitize_title( $option->name );
		}

		return $names;
	}

	/**
	 * Get the variant's non-empty option values.
	 *
	 * @param \SureCart\Models\Variant $variant The variant.
	 *
	 * @return array Variant option key (option_1…option_3) => value.
	 */
	protected function getVariantOptionValues( $variant ): array {
		return array_filter(
			array(
				'option_1' => $variant->option_1,
				'option_2' => $variant->option_2,
				'option_3' => $variant->option_3,
			),
			function ( $value ) {
				return null !== $value && '' !== $value;
			}
		);
	}

	/**
	 * Get the Product schema for one variant.
	 *
	 * @param \SureCart\Models\Product      $product   The product.
	 * @param \SureCart\Models\Variant      $variant   The variant.
	 * @param array                         $varies_by Variant option key => schema.org property.
	 * @param string[]                      $image     The product image URLs, used when the variant has none.
	 * @param \SureCart\Models\Product|null $component For a bundle, the component the variant belongs to.
	 *
	 * @return array
	 */
	protected function getVariantSchema( $product, $variant, array $varies_by, $image, $component = null ): array {
		$values = $this->getVariantOptionValues( $variant );
		$url    = $this->getVariantUrl( $product, $values, $component );
		// The bundle page keeps showing the bundle's own images whichever component variant is picked.
		$variant_image = $component ? '' : (string) ( $variant->imageAttributes()->src ?? '' );

		$schema = array(
			'@type'                => 'Product',
			// A shared @id makes Google merge variants into one item.
			'@id'                  => $url . '#variant-' . $variant->id,
			'name'                 => $values ? $product->name . ' - ' . implode( ' / ', $values ) : $product->name,
			'sku'                  => $this->getVariantSku( $product, $variant, $component ),
			'inProductGroupWithID' => $product->id,
			'image'                => '' !== $variant_image ? $variant_image : $image,
			'offers'               => $this->getOffersSchema( $product, $variant, $url, $component ),
		);

		foreach ( $varies_by as $option_key => $property ) {
			if ( isset( $values[ $option_key ] ) ) {
				$schema[ $property ] = $values[ $option_key ];
			}
		}

		return $this->withoutEmptyValues( $schema );
	}

	/**
	 * Get a unique SKU for a variant: its own, else the product SKU plus the variant ID, else the variant ID.
	 *
	 * A merchant-set SKU is output as-is, even if duplicated: Merchant Center matches it to their inventory.
	 *
	 * @param \SureCart\Models\Product      $product   The product.
	 * @param \SureCart\Models\Variant      $variant   The variant.
	 * @param \SureCart\Models\Product|null $component For a bundle, the component the variant belongs to.
	 *
	 * @return string
	 */
	protected function getVariantSku( $product, $variant, $component = null ): string {
		// A component variant's SKUs already identify it on the component's own page, so a bundle prefixes its own.
		$sku = $component ? '' : $this->getValidSku( $variant->sku );
		if ( '' !== $sku ) {
			return $sku;
		}

		$product_sku = $this->getValidSku( $product->sku );
		if ( '' === $product_sku && $component ) {
			$product_sku = (string) $product->id;
		}

		return '' !== $product_sku ? $product_sku . '-' . $variant->id : (string) $variant->id;
	}

	/**
	 * Get the URL that preselects a variant, in the format ProductPageBlock::getVariantsQuery() reads.
	 *
	 * @param \SureCart\Models\Product      $product   The product.
	 * @param array                         $values    Variant option key => value.
	 * @param \SureCart\Models\Product|null $component For a bundle, the component the variant belongs to.
	 *
	 * @return string
	 */
	protected function getVariantUrl( $product, array $values, $component = null ): string {
		// Same params service as ProductPageBlock. Block themes render blocks before wp_head,
		// so $sc_query_id may hold another block's ID; the page reads unscoped keys (e.g. color).
		$url_params = \SureCart::block()->urlParams()->setInstanceId( '' );
		$args       = array();
		// Matches ProductPageBlock::findBundleComponentVariantFromUrl(): ?bundle-{slug}-{option}.
		$prefix = $component ? 'bundle-' . ( ! empty( $component->slug ) ? $component->slug : $component->id ) . '-' : '';

		foreach ( $this->getVariantOptionNames( $component ?? $product ) as $option_key => $name ) {
			if ( isset( $values[ $option_key ] ) ) {
				// Encoded like the page's addQueryArgs(): non-Latin slugs are already percent-encoded, and unencoded
				// PHP would decode the key back to raw UTF-8, missing the slug key ProductPageBlock reads.
				$args[ rawurlencode( $url_params->getKey( $prefix . $name ) ) ] = rawurlencode( sanitize_title( $values[ $option_key ] ) );
			}
		}

		return add_query_arg( $args, $this->getProductUrl( $product ) );
	}

	/**
	 * Get the bundle's resolved components, in bundle order.
	 *
	 * @param \SureCart\Models\Product $product The bundle.
	 *
	 * @return array[] Each entry: 'item' (the bundle item) and 'component' (its product).
	 */
	protected function getBundleComponents( $product ): array {
		if ( empty( $product->bundle ) ) {
			return array();
		}

		$items = (array) ( $product->bundle_items->data ?? array() );
		usort(
			$items,
			function ( $a, $b ) {
				return ( $a->position ?? 0 ) <=> ( $b->position ?? 0 );
			}
		);

		$components = array();
		foreach ( $items as $item ) {
			$component = $product->resolveBundleComponent( $item );
			if ( ! empty( $component->id ) ) {
				$components[] = array(
					'item'      => $item,
					'component' => $component,
				);
			}
		}

		return $components;
	}

	/**
	 * Get the bundle's only component with options, whose variants then become the bundle's variants.
	 *
	 * With two or more, the combinations multiply and their attributes clash, so the bundle stays one Product.
	 *
	 * @param \SureCart\Models\Product $product The bundle.
	 *
	 * @return \SureCart\Models\Product|null
	 */
	protected function getVariableBundleComponent( $product ) {
		$variable = array_values(
			array_filter(
				array_column( $this->getBundleComponents( $product ), 'component' ),
				function ( $component ) {
					return ! empty( $component->variant_options->data ) && ! empty( $component->variants->data );
				}
			)
		);

		return 1 === count( $variable ) ? $variable[0] : null;
	}

	/**
	 * Whether every bundle component other than the given one is in stock, as the buy button requires.
	 *
	 * @param \SureCart\Models\Product $product   The bundle.
	 * @param \SureCart\Models\Product $component The variable component, whose stock is checked per variant.
	 *
	 * @return bool
	 */
	protected function otherBundleComponentsInStock( $product, $component ): bool {
		foreach ( $this->getBundleComponents( $product ) as $entry ) {
			if ( $entry['component']->id !== $component->id && ! $entry['component']->in_stock ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Describe what a bundle contains by referencing each component's own page markup.
	 *
	 * @param \SureCart\Models\Product $product The bundle.
	 *
	 * @return array TypeAndQuantityNode entries, in bundle order.
	 */
	protected function getBundleContentsSchema( $product ): array {
		$nodes = array();
		foreach ( $this->getBundleComponents( $product ) as $entry ) {
			$item      = $entry['item'];
			$component = $entry['component'];

			$nodes[] = array(
				'@type'            => 'TypeAndQuantityNode',
				'amountOfThisGood' => max( 1, (int) ( $item->quantity ?? 1 ) ),
				// Untyped on purpose: Google treats every typed Product as a listing that needs its own offer.
				// Bundle-only components have no public page to reference, so they're named instead.
				'typeOfGood'       => $component->is_published || $component->buyLink()->isEnabled()
					? array( '@id' => $this->getProductId( $component ) )
					: array( 'name' => $component->name ),
			);
		}

		return $nodes;
	}
}
