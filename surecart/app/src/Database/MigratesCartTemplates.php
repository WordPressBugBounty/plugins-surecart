<?php

namespace SureCart\Database;

/**
 * Shared by migrations that change stores' saved cart templates.
 */
trait MigratesCartTemplates {
	/**
	 * Collect the cart posts to migrate.
	 *
	 * Covers both storage locations:
	 *   - wp_template_part with post_name 'cart' (newer installs).
	 *   - sc_cart post type (legacy installs whose cart hasn't been moved yet).
	 *
	 * @return array
	 */
	protected function getCartPosts(): array {
		$cart_part_query = new \WP_Query(
			array(
				'post_type'           => 'wp_template_part',
				'post_status'         => array( 'auto-draft', 'draft', 'publish' ),
				'posts_per_page'      => -1,
				'name'                => 'cart',
				'lazy_load_term_meta' => false,
			)
		);

		$sc_cart_query = new \WP_Query(
			array(
				'post_type'           => 'sc_cart',
				'post_status'         => array( 'auto-draft', 'draft', 'publish' ),
				'posts_per_page'      => -1,
				'lazy_load_term_meta' => false,
			)
		);

		return array_merge( $cart_part_query->posts ?? array(), $sc_cart_query->posts ?? array() );
	}

	/**
	 * Get the attribute JSON of the first occurrence of a self-closing block.
	 *
	 * @param string $content Post content to scan.
	 * @param string $block   Block name without the `surecart/` prefix.
	 * @return string|null Attribute JSON, or null when absent/attribute-less.
	 */
	protected function blockAttrs( string $content, string $block ): ?string {
		if ( preg_match( '/<!--\s*wp:surecart\/' . preg_quote( $block, '/' ) . '\s+(\{.*?\})\s*\/-->/s', $content, $matches ) ) {
			return $matches[1];
		}
		return null;
	}
}
