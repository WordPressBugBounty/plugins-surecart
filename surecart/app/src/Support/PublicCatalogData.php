<?php

namespace SureCart\Support;

use SureCart\Concerns\StripsPrivateCatalogFields;

/**
 * Strips private catalog fields from anything an anonymous visitor can read.
 *
 * Storefront and checkout pages serialize catalog models into component data
 * scripts and the `#sc-store-data` initial state, and the guest checkout routes
 * return products expanded onto line items. This runs the same strip as the
 * anonymous catalog REST routes on all of them, so the paths cannot drift apart.
 *
 * Nothing enforces this at the output boundary yet: a new serialization of a
 * product, price or variant into page HTML is unprotected until it is routed
 * through here.
 *
 * @see \SureCart\Concerns\StripsPrivateCatalogFields Field lists and the
 *      `surecart/rest/private_catalog_fields` filter.
 */
class PublicCatalogData {
	use StripsPrivateCatalogFields;

	/**
	 * Fields the storefront renders from, kept at this boundary only.
	 *
	 * - available_stock: sold-out gates, in-stock variant selection and
	 *   quantity caps (sc-product-quantity, sc-line-items, the price/variant
	 *   selectors and the bundle component picker).
	 * - purchase_limit: quantity caps (getMaxStockQuantity).
	 * - archived: render gates (sc-price-choice, product store getters).
	 *
	 * The catalog REST providers keep stripping these — the storefront renders
	 * stock state server-side. The checkout and line item routes go through
	 * response() and keep them: the cart caps quantities from them.
	 *
	 * @return array
	 */
	protected function preservedCatalogFields() {
		return array(
			'product' => array( 'available_stock', 'purchase_limit', 'archived' ),
			'variant' => array( 'available_stock' ),
		);
	}

	/**
	 * Get product data safe to serialize into public page HTML.
	 *
	 * @param \SureCart\Models\Product|array|object|null $product The product model or its array/object form.
	 *
	 * @return array|mixed The stripped product array. Non-object/array input passes through untouched.
	 */
	public static function product( $product ) {
		return ( new self() )->stripPrivateProductFields( self::toDataArray( $product ) );
	}

	/**
	 * Get price data safe to serialize into public page HTML.
	 *
	 * Also strips an expanded product on the price.
	 *
	 * @param \SureCart\Models\Price|array|object|null $price The price model or its array/object form.
	 *
	 * @return array|mixed The stripped price array. Non-object/array input passes through untouched.
	 */
	public static function price( $price ) {
		return ( new self() )->stripPrivatePriceFields( self::toDataArray( $price ) );
	}

	/**
	 * Get variant data safe to serialize into public page HTML.
	 *
	 * @param \SureCart\Models\Variant|array|object|null $variant The variant model or its array/object form.
	 *
	 * @return array|mixed The stripped variant array. Non-object/array input passes through untouched.
	 */
	public static function variant( $variant ) {
		return ( new self() )->stripPrivateVariantFields( self::toDataArray( $variant ) );
	}

	/**
	 * Get variant option data safe to serialize into public page HTML.
	 *
	 * @param \SureCart\Models\VariantOption|array|object|null $option The variant option model or its array/object form.
	 *
	 * @return array|mixed The stripped variant option array. Non-object/array input passes through untouched.
	 */
	public static function variantOption( $option ) {
		return ( new self() )->stripPrivateVariantOptionFields( self::toDataArray( $option ) );
	}

	/**
	 * Strip every catalog object expanded anywhere in a guest-facing response.
	 *
	 * The checkout and line item routes accept anonymous callers by design
	 * (guest checkout), and the platform applies `price.product` / `variant.product`
	 * to every price or variant in the response — line items, swaps, bundle
	 * components, bumps, upsells, the upsell funnel. Matching on `object` instead
	 * of known paths means a new expandable relation can't reopen the leak.
	 *
	 * @param array|mixed $data Response data. Anything else passes through untouched.
	 *
	 * @return array|mixed
	 */
	public static function response( $data ) {
		return ( new self() )->stripCatalogTree( $data );
	}

	/**
	 * Depth-first strip of catalog objects, keyed by their `object` type.
	 *
	 * @param array|mixed $data Response data.
	 *
	 * @return array|mixed
	 */
	private function stripCatalogTree( $data ) {
		// accessor values can still be raw objects after Model::toArray; keep their JSON shape.
		if ( $data instanceof \stdClass ) {
			return (object) $this->stripCatalogTree( (array) $data );
		}

		if ( ! is_array( $data ) ) {
			return $data;
		}

		foreach ( $data as $key => $value ) {
			$data[ $key ] = $this->stripCatalogTree( $value );
		}

		// keyed by each model's $object_name — a new catalog model with private fields must be added here.
		$strippers = array(
			'product'            => 'stripPrivateProductFields',
			'price'              => 'stripPrivatePriceFields',
			'variant'            => 'stripPrivateVariantFields',
			'variant_option'     => 'stripPrivateVariantOptionFields',
			'bundle_item'        => 'stripPrivateBundleItemFields',
			'product_collection' => 'stripPrivateCollectionFields',
			'review'             => 'stripPrivateReviewFields',
		);

		$type = is_string( $data['object'] ?? null ) ? $data['object'] : '';

		return isset( $strippers[ $type ] ) ? $this->{$strippers[ $type ]}( $data ) : $data;
	}

	/**
	 * Normalize a model/object to the exact array shape wp_json_encode outputs,
	 * so stripping sees what would have been serialized.
	 *
	 * @param mixed $data The data to normalize.
	 *
	 * @return array|mixed
	 */
	private static function toDataArray( $data ) {
		if ( null === $data || is_scalar( $data ) ) {
			return $data;
		}

		return json_decode( wp_json_encode( $data ), true );
	}
}
