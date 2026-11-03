<?php
namespace SureCart\Models;

use SureCart\Models\Blocks\ProductPageBlock;
use SureCart\Support\Blocks\TemplateUtilityService;

/**
 * Buy link model
 */
class BuyLink {
	/**
	 * Product model
	 *
	 * @var \SureCart\Models\Product
	 */
	protected $product;

	/**
	 * Constructor
	 *
	 * @param \SureCart\Models\Product $product Product model.
	 */
	public function __construct( \SureCart\Models\Product $product ) {
		$this->product = $product;
	}

	/**
	 * The buy page url.
	 *
	 * @return void
	 */
	public function url() {
		return trailingslashit( get_home_url() ) . trailingslashit( \SureCart::settings()->permalinks()->getBase( 'buy_page' ) ) . $this->product->slug;
	}

	/**
	 * Is the buy link enabled.
	 *
	 * @return boolean
	 */
	public function isEnabled() {
		return 'true' === ( $this->product->metadata->wp_buy_link_enabled ?? '' );
	}

	/**
	 * Get the mode.
	 *
	 * @return string
	 */
	public function getMode() {
		return 'true' === ( $this->product->metadata->wp_buy_link_test_mode_enabled ?? '' ) ? 'test' : 'live';
	}

	/**
	 * Get the success url.
	 *
	 * @return string
	 */
	public function getSuccessUrl() {
		if ( 'true' !== ( $this->product->metadata->wp_buy_link_success_page_enabled ?? '' ) ) {
			return '';
		}
		return $this->product->metadata->wp_buy_link_success_page_url ?? '';
	}

	/**
	 * The line item a fresh instant-checkout draft starts from.
	 *
	 * A bundle needs a variant per variable component; the platform rejects it otherwise.
	 *
	 * @param string|null $price_id Price to seed; the product's initial price when omitted.
	 *
	 * @return array Empty when no price resolves.
	 */
	public function initialLineItem( $price_id = null ): array {
		if ( empty( $price_id ) ) {
			$price_id = $this->product->initial_price->id ?? ( $this->product->prices->data[0]->id ?? null );
		}
		if ( empty( $price_id ) ) {
			return array();
		}

		$line_item = array(
			'price_id' => $price_id,
			'quantity' => 1,
		);

		// First IN-STOCK variant, not variants[0] — that could seed a sold-out variant.
		$variant_id = $this->product->first_variant_with_stock->id ?? null;
		if ( ! empty( $variant_id ) ) {
			$line_item['variant_id'] = $variant_id;
		}

		if ( ! empty( $this->product->bundle ) ) {
			$component_variants = (array) ( new ProductPageBlock() )->getInitialBundleComponentVariants( $this->product );
			if ( ! empty( $component_variants ) ) {
				$line_item['bundle_component_variants'] = $component_variants;
			}
		}

		return $line_item;
	}

	/**
	 * The block template type used to render the instant checkout page.
	 *
	 * @return string
	 */
	public function getTemplateType() {
		return self::templateConfig()['post_type'];
	}

	/**
	 * The default (plugin-provided) instant checkout template id.
	 *
	 * @return string
	 */
	public function getDefaultTemplateId() {
		return self::templateConfig()['default_id'];
	}

	/**
	 * Theme-aware template post type, default id and product meta key.
	 *
	 * @return array
	 */
	public static function templateConfig(): array {
		$is_block_theme = wp_is_block_theme();

		return array(
			'post_type'  => $is_block_theme ? 'wp_template' : 'wp_template_part',
			'default_id' => TemplateUtilityService::PLUGIN_SLUG . ( $is_block_theme ? '//instant-checkout' : '//instant-checkout-info' ),
			'meta_key'   => $is_block_theme ? 'wp_buy_link_template_id' : 'wp_buy_link_template_part_id',
		);
	}

	/**
	 * The instant checkout template id, honoring a per-product override.
	 *
	 * Block themes store a wp_template id, classic themes a wp_template_part id.
	 *
	 * @return string
	 */
	public function getTemplateId() {
		$custom = wp_is_block_theme()
			? ( $this->product->metadata->wp_buy_link_template_id ?? '' )
			: ( $this->product->metadata->wp_buy_link_template_part_id ?? '' );

		return $custom ? $custom : $this->getDefaultTemplateId();
	}

	/**
	 * Should we show this item?
	 *
	 * @param string $item The name of the item.
	 *
	 * @return boolean
	 */
	public function templatePartEnabled( $item ) {
		switch ( $item ) {
			case 'image':
				return 'true' !== ( $this->product->metadata->wp_buy_link_product_image_disabled ?? '' );
			case 'description':
				return 'true' !== ( $this->product->metadata->wp_buy_link_product_description_disabled ?? '' );
			case 'coupon':
				return 'true' !== ( $this->product->metadata->wp_buy_link_coupon_field_disabled ?? '' );
			case 'logo':
				return 'true' !== ( $this->product->metadata->wp_buy_link_logo_disabled ?? '' );
			case 'terms':
				return 'true' !== ( $this->product->metadata->wp_buy_link_terms_disabled ?? '' );
		}
		return false;
	}
}
