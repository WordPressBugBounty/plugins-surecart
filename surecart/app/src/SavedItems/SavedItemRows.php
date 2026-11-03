<?php

namespace SureCart\SavedItems;

/**
 * Turns saved items into the rows the Saved Items list renders.
 *
 * One shape for a customer's items (from the platform) and a guest's (from their browser), so
 * both look and behave the same. Used by the page/dashboard module and the guest `rows` endpoint.
 */
class SavedItemRows {
	/**
	 * Whether the cart is on, read once since every row asks.
	 *
	 * @var bool|null
	 */
	protected $cart_enabled = null;

	/**
	 * The checkout page URL, read once since every row asks.
	 *
	 * @var string|null
	 */
	protected $checkout_url = null;

	/**
	 * Rows for a customer's saved items.
	 *
	 * @param \SureCart\Models\SavedItem[] $items Saved items, with product, price and variant expanded.
	 *
	 * @return array
	 */
	public function forItems( $items ) {
		$catalog = $this->catalogProducts(
			array_map( fn( $item ) => $item->product->id ?? null, $items )
		);

		return array_map(
			fn( $item ) => $this->row( $item, $catalog[ $item->product->id ?? '' ] ?? null ),
			$items
		);
	}

	/**
	 * Rows for a guest's browser list, resolved from the synced catalog.
	 *
	 * Only published products resolve; anything else renders as unavailable.
	 *
	 * @param array $items Items as `{ product, price?, variant?, bundle_component_variants? }`.
	 *
	 * @return array
	 */
	public function forGuestItems( $items ) {
		$products = $this->catalogProducts( array_column( $items, 'product' ) );

		return array_map(
			function ( $input ) use ( $products ) {
				$product = $products[ $input['product'] ] ?? null;
				// Unresolved ids stay as strings, so the row can still be removed.
				return $this->row(
					(object) [
						'id'                        => null,
						'product'                   => ! empty( $product ) ? $product : $input['product'],
						'price'                     => $this->findById( $product->prices->data ?? [], $input['price'] ?? null ),
						'variant'                   => $this->findById( $product->variants->data ?? [], $input['variant'] ?? null ),
						'bundle_component_variants' => $input['bundle_component_variants'] ?? [],
					],
					$product
				);
			},
			$items
		);
	}

	/**
	 * The list an item is in; null for the default list.
	 *
	 * @param object $item Saved item.
	 *
	 * @return string|null
	 */
	public static function listId( $item ) {
		$list = $item->saved_list ?? null;
		$id = is_object( $list ) ? ( $list->id ?? null ) : $list;
		return ! empty( $id ) ? $id : null;
	}

	/**
	 * A saved item as the browser store keeps it: ids only, and `null` for the default list.
	 *
	 * The browser calls the default list `null` because a guest's single list has no record either.
	 *
	 * @param object      $item       Saved item.
	 * @param string|null $default_id The customer's default list id.
	 *
	 * @return array
	 */
	public static function clientItem( $item, $default_id ) {
		$id   = fn( $value ) => is_object( $value ) ? ( $value->id ?? null ) : $value;
		$list = self::listId( $item );
		return [
			'id'                        => $item->id ?? null,
			'product'                   => $id( $item->product ?? null ),
			'price'                     => $id( $item->price ?? null ),
			'variant'                   => $id( $item->variant ?? null ),
			'saved_list'                => $list === $default_id ? null : $list,
			'quantity'                  => (int) ( $item->quantity ?? 1 ),
			'bundle_component_variants' => (object) ( $item->bundle_component_variants ?? [] ),
		];
	}

	/**
	 * Published catalog products by platform id, in one query.
	 *
	 * Primes the synced-post lookup too, so `$product->post` and `->permalink` cost nothing later.
	 *
	 * @param string[] $ids Product ids.
	 *
	 * @return \SureCart\Models\Product[] Keyed by product id.
	 */
	protected function catalogProducts( $ids ) {
		$ids  = array_values( array_unique( array_filter( $ids ) ) );
		$sync = \SureCart::sync()->product()->post();
		$sync->primeByModelIds( $ids );

		$products = [];
		foreach ( $ids as $id ) {
			$post = $sync->findByModelId( $id );
			if ( ! $post instanceof \WP_Post || 'publish' !== $post->post_status ) {
				continue;
			}
			$product = \SureCart::productPost()->getModel( $post->ID );
			if ( ! empty( $product->id ) ) {
				$products[ $id ] = $product;
			}
		}
		return $products;
	}

	/**
	 * Find a model in a list by id, or return the id itself when it isn't there.
	 *
	 * @param array       $list Models.
	 * @param string|null $id   Id.
	 *
	 * @return object|string|null
	 */
	protected function findById( $list, $id ) {
		foreach ( $list as $model ) {
			if ( $id && ( $model->id ?? null ) === $id ) {
				return $model;
			}
		}
		return $id;
	}

	/**
	 * Whether the slide-out cart is on, checked once per request.
	 *
	 * The cart only renders with a default checkout form, so without one "Move to cart" would
	 * add to a cart the shopper can't see.
	 *
	 * @return bool
	 */
	protected function cartEnabled() {
		if ( null === $this->cart_enabled ) {
			$this->cart_enabled = \SureCart::cart()->isCartEnabled() && ! empty( \SureCart::forms()->getDefaultId() );
		}
		return $this->cart_enabled;
	}

	/**
	 * Everything the row template needs, for a saved item or a guest's browser item.
	 *
	 * Product, price and variant are models when resolved, or bare ids when not.
	 *
	 * @param object                        $item    Saved item (or the same shape built from a guest item).
	 * @param \SureCart\Models\Product|null $catalog The product's synced catalog copy, if published.
	 *
	 * @return array
	 */
	protected function row( $item, $catalog = null ) {
		$product     = is_object( $item->product ) ? $item->product : null;
		$price       = is_object( $item->price ) ? $item->price : null;
		$variant     = is_object( $item->variant ) ? $item->variant : null;
		$unavailable = empty( $product ) || ! empty( $product->archived ) || ! empty( $price->archived );

		// The catalog copy carries bundle components (with their variants), which the saved-item
		// expand doesn't; fall back to the API product if it isn't synced.
		$catalog = ! empty( $catalog ) ? $catalog : $product;

		// A product-level save only has a price when there's nothing to choose.
		if ( ! $price && $catalog && ! $catalog->has_options ) {
			$price = $catalog->initial_price;
		}
		// A bundle can go straight to the cart only if every component with options has a saved pick.
		$components         = array_filter( (array) ( $item->bundle_component_variants ?? [] ) );
		$missing_components = $catalog ? array_diff( (array) $catalog->bundle_variable_component_ids, array_keys( $components ) ) : [];

		// The platform's verdict for a customer's item (guest items have none). A missing price or
		// variant is filled in above or below; a gone or outdated one means choosing again.
		$status = $item->purchasable_status ?? null;

		$needs_options = ! $price
			|| ! empty( $price->ad_hoc )
			|| ( $catalog && $catalog->has_variants && ! $variant )
			|| ! empty( $missing_components )
			|| in_array( $status, [ 'price_gone', 'variant_gone', 'price_old_version', 'variant_old_version' ], true );

		// A variant tracks its own stock unless it defers to the product (null).
		$variant_unlimited = $variant->has_unlimited_stock ?? null;
		$sold_out          = ! $unavailable && ( 'out_of_stock' === $status || ( $catalog && ( null === $variant_unlimited
			? ! $catalog->in_stock
			: ( ! $variant_unlimited && ( $variant->available_stock ?? 0 ) <= 0 ) ) ) );
		$quantity          = max( 1, (int) ( $item->quantity ?? 1 ) );
		$can_buy           = ! $unavailable && ! $sold_out && ! $needs_options && 'exceeds_purchase_limit' !== $status;

		// A single price is often named after the product, so its name only repeats the row title.
		$details = $variant
			? implode( ' / ', array_filter( [ $variant->option_1 ?? '', $variant->option_2 ?? '', $variant->option_3 ?? '' ] ) )
			: ( ! empty( $catalog->has_multiple_prices ) ? ( $price->name ?? '' ) : '' );
		// Variants without their own amount use the price's; product-level saves show the product range.
		$amounts = array_filter( [ $variant->display_amount ?? '', $price->display_amount ?? '', $product->display_amount ?? '' ] );
		$amount  = ! empty( $amounts ) ? reset( $amounts ) : '';
		$name    = $product->name ?? __( 'Product no longer available', 'surecart' );

		// Ids as saved, for removal; resolved ids (e.g. the initial price) for the cart.
		$ids = [
			'product' => $product->id ?? ( is_string( $item->product ) ? $item->product : null ),
			'price'   => is_object( $item->price ) ? $item->price->id : $item->price,
			'variant' => is_object( $item->variant ) ? $item->variant->id : $item->variant,
		];

		return [
			'key'          => $item->id ?? implode( ':', $ids ),
			'id'           => $item->id ?? null,
			'saved'        => $ids,
			'price'        => $price->id ?? null,
			'variant'      => $variant->id ?? null,
			'components'   => $components ? (object) $components : null,
			'name'         => $name,
			'list'         => self::listId( $item ),
			'url'          => $unavailable ? '' : $this->productUrl( $product, $catalog, $variant ),
			'image'        => $product->line_item_image->src ?? '',
			'quantity'     => $quantity,
			/* translators: %d: quantity saved */
			'meta'         => implode( ' · ', array_filter( [ $details, $amount, $quantity > 1 ? sprintf( __( 'Qty %d', 'surecart' ), $quantity ) : '' ] ) ),
			'unavailable'  => $unavailable,
			'soldOut'      => $sold_out,
			// The platform pins the price when saved and flags a newer version; it doesn't say which way.
			'priceChanged' => ! $unavailable && ! empty( $item->price_changed ),
			'canMove'      => $can_buy && $this->cartEnabled(),
			// Without the cart, the quick way to buy; with it, Move to cart already is.
			'buyUrl'       => $can_buy && ! $this->cartEnabled() ? $this->buyUrl( $price, $variant, $quantity, $components ) : '',
			'linkLabel'    => $needs_options && ! $sold_out ? __( 'Choose options', 'surecart' ) : __( 'View product', 'surecart' ),
			/* translators: %s: product name */
			'menuLabel'    => sprintf( __( 'More actions for %s', 'surecart' ), $name ),
			/* translators: %s: product name */
			'selectLabel'  => sprintf( __( 'Select %s', 'surecart' ), $name ),
			'busy'         => false,
			'selected'     => false,
		];
	}

	/**
	 * A checkout link for just this item, as the product page's Buy Now builds it.
	 *
	 * `no_cart` checks out in memory, so the shopper's cart is left as it was.
	 *
	 * @param object|null $price      Price.
	 * @param object|null $variant    Variant.
	 * @param int         $quantity   Quantity.
	 * @param array       $components Bundle component picks, component product id => variant id.
	 *
	 * @return string Empty when the store has no checkout page.
	 */
	protected function buyUrl( $price, $variant, $quantity, $components ) {
		if ( null === $this->checkout_url ) {
			$this->checkout_url = (string) \SureCart::pages()->url( 'checkout' );
		}
		if ( ! $this->checkout_url || empty( $price->id ) ) {
			return '';
		}

		$line_item = array_filter(
			[
				'price_id'                  => $price->id,
				'variant_id'                => $variant->id ?? null,
				'quantity'                  => $quantity,
				'bundle_component_variants' => $components,
			]
		);

		return add_query_arg(
			[
				'line_items' => [ $line_item ],
				'no_cart'    => 1,
			],
			$this->checkout_url
		);
	}

	/**
	 * Product page link with the saved variant's options pre-selected, in the page's own URL format.
	 *
	 * @param object|null $product Product.
	 * @param object|null $catalog Synced catalog product (has variant options).
	 * @param object|null $variant Saved variant.
	 *
	 * @return string
	 */
	protected function productUrl( $product, $catalog, $variant ) {
		$url = $product->permalink ?? '';
		if ( ! $url || ! $variant ) {
			return $url;
		}

		$args = [];
		foreach ( array_values( $catalog->variant_options->data ?? [] ) as $index => $option ) {
			$value = $variant->{'option_' . ( $index + 1 )} ?? '';
			if ( $value ) {
				$args[ sanitize_title( $option->name ) ] = sanitize_title( $value );
			}
		}
		return add_query_arg( $args, $url );
	}
}
