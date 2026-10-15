<?php

namespace SureCart\Models;

use SureCart\Models\Traits\HasDates;
use SureCart\Support\Currency;

/**
 * Variant model
 */

class Variant extends Model {
	use HasDates;

	/**
	 * Rest API endpoint
	 *
	 * @var string
	 */
	protected $endpoint = 'variants';

	/**
	 * Object name
	 *
	 * @var string
	 */
	protected $object_name = 'variant';

	/**
	 * Set the product attribute
	 *
	 * @param  string $value Product properties.
	 * @return void
	 */
	public function setProductAttribute( $value ) {
		$this->setRelation( 'product', $value, Product::class );
	}

	/**
	 * Set the image attribute
	 *
	 * @param  string $value Image properties.
	 * @return void
	 */
	public function setImageAttribute( $value ) {
		$this->setRelation( 'image', $value, Media::class );
	}

	/**
	 * Get whether stock tracking is effectively disabled for this variant.
	 * Returns null when not set on the variant, so callers can fall back to the product.
	 *
	 * @return bool|null
	 */
	public function getHasUnlimitedStockAttribute() {
		if ( null === $this->stock_enabled ) {
			return null;
		}

		if ( empty( $this->stock_enabled ) ) {
			return true;
		}

		return (bool) $this->allow_out_of_stock_purchases;
	}

	/**
	 * Set the current_release_download attribute
	 *
	 * @param  mixed $value Download properties.
	 * @return void
	 */
	public function setCurrentReleaseDownloadAttribute( $value ) {
		$this->setRelation( 'current_release_download', $value, Download::class );
	}

	/**
	 * Get the display amount attribute
	 *
	 * @return string
	 */
	public function getDisplayAmountAttribute() {
		return empty( $this->amount ) ? '' : Currency::format( $this->amount, $this->currency );
	}

	/**
	 * Get the featured image attribute.
	 *
	 * @return object
	 */
	public function getLineItemImageAttribute() {
		$attributes = $this->imageAttributes( 'thumbnail' );

		// always return an empty object.
		return null === $attributes ? (object) [] : sc_sanitize_image_attributes( $attributes );
	}

	/**
	 * Get the variant's own image attributes: its WP media first, then the platform media.
	 *
	 * Unsanitized, including plugin-added keys; pass through sc_sanitize_image_attributes() before rendering into JS.
	 *
	 * @param string|int[] $size The image size.
	 *
	 * @return object|null Null when the variant has no image of its own.
	 */
	public function imageAttributes( $size = 'full' ) {
		if ( ! empty( $this->metadata->wp_media ) ) {
			$item = GalleryItemAttachment::create( $this->metadata->wp_media );
			if ( ! empty( $item ) && $item->exists() ) {
				return $item->attributes( $size );
			}
		}

		if ( is_a( $this->image, Media::class ) ) {
			return $this->image->attributes( $size );
		}

		return null;
	}
}
