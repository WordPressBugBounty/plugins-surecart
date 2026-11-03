<?php

namespace SureCart\SavedItems;

/**
 * Adds the saved items heart to classic-theme menus chosen in Design settings.
 *
 * Block themes place the Saved Items Icon block in their header instead.
 */
class SavedItemsMenuService {
	/**
	 * Bootstrap the menu filter.
	 *
	 * Priority 9: before the cart icon (10), so on the right the heart sits before the cart.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_filter( 'wp_nav_menu_items', [ $this, 'addMenuItem' ], 9, 2 );
	}

	/**
	 * Menus the heart is added to.
	 *
	 * @return int[]
	 */
	public function getSelectedIds() {
		return array_map( 'intval', (array) get_option( 'surecart_saved_items_menu_selected_ids', [] ) );
	}

	/**
	 * Which end of the menu the heart goes on: `left` or `right`.
	 *
	 * @return string
	 */
	public function getAlignment() {
		return 'left' === get_option( 'surecart_saved_items_menu_alignment', 'right' ) ? 'left' : 'right';
	}

	/**
	 * Add the heart to a selected menu.
	 *
	 * @param string    $items Menu items HTML.
	 * @param \stdClass $args  Menu arguments.
	 *
	 * @return string
	 */
	public function addMenuItem( $items, $args ) {
		$menu = wp_get_nav_menu_object( $args->menu );
		if ( ! $menu || ! in_array( (int) $menu->term_id, $this->getSelectedIds(), true ) ) {
			return $items;
		}

		// Renders nothing when the store has no page to link to.
		$icon = do_blocks( '<!-- wp:surecart/saved-items-icon /-->' );
		if ( '' === trim( $icon ) ) {
			return $items;
		}

		$item = '<li class="menu-item sc-saved-items-menu-item">' . $icon . '</li>';
		return 'left' === $this->getAlignment() ? $item . $items : $items . $item;
	}
}
