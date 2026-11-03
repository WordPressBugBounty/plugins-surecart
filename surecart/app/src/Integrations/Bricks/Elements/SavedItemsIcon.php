<?php

namespace SureCart\Integrations\Bricks\Elements;

use SureCart\Integrations\Bricks\Concerns\ConvertsBlocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Saved items header icon element.
 *
 * Renders the `surecart/saved-items-icon` block, so markup, count and the store-wide switch stay in one place.
 */
class SavedItemsIcon extends \Bricks\Element {
	use ConvertsBlocks; // we have to use a trait since we can't extend the bricks class.

	/**
	 * Element category.
	 *
	 * @var string
	 */
	public $category = 'SureCart Elements';

	/**
	 * Element name.
	 *
	 * @var string
	 */
	public $name = 'surecart-saved-items-icon';

	/**
	 * Element block name.
	 *
	 * @var string
	 */
	public $block_name = 'surecart/saved-items-icon';

	/**
	 * Element icon.
	 *
	 * @var string
	 */
	public $icon = 'ti-heart';

	/**
	 * Get element label.
	 *
	 * @return string
	 */
	public function get_label() {
		return esc_html__( 'Saved Items Icon', 'surecart' );
	}

	/**
	 * Get element keywords.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return [ 'wishlist', 'saved', 'favorites', 'heart', 'header', 'menu' ];
	}

	/**
	 * Set controls.
	 *
	 * @return void
	 */
	public function set_controls() {
		$this->controls['show_count'] = [
			'label'       => esc_html__( 'Show count', 'surecart' ),
			'type'        => 'checkbox',
			'default'     => true,
			'description' => esc_html__( 'Hidden while the list is empty.', 'surecart' ),
		];

		$this->controls['icon_size'] = [
			'label' => esc_html__( 'Icon size', 'surecart' ),
			'type'  => 'number',
			'units' => true,
			'css'   => [
				[
					'property' => 'width',
					'selector' => 'svg',
				],
				[
					'property' => 'height',
					'selector' => 'svg',
				],
			],
		];
	}

	/**
	 * Render element.
	 *
	 * @return void
	 */
	public function render() {
		echo $this->html( [ 'show_count' => ! empty( $this->settings['show_count'] ) ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
