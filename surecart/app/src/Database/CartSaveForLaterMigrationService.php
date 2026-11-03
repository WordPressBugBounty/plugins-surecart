<?php

namespace SureCart\Database;

/**
 * Adds "Save for later" beside "Remove" in stores' saved cart templates.
 *
 * Runs once ever, not on each version bump, so a merchant who later removes the block keeps it removed.
 */
class CartSaveForLaterMigrationService extends VersionMigration {
	use MigratesCartTemplates;

	/**
	 * The key for the migration.
	 *
	 * @var string
	 */
	protected $migration_key = 'surecart_saved_items_cart_migration';

	/**
	 * Matches the first self-closing remove block, with its indentation.
	 *
	 * @var string
	 */
	const REMOVE_BLOCK_PATTERN = '/([ \t]*)<!--\s*wp:surecart\/cart-line-item-remove\b.*?\/-->/s';

	/**
	 * A group holding exactly Save then Remove: its attributes, and the rest of its markup.
	 *
	 * @var string
	 */
	const ACTIONS_GROUP_PATTERN = '/<!--\s*wp:group\s+(\{(?:(?!-->).)*\})\s*-->(\s*<div class="wp-block-group">\s*<!--\s*wp:surecart\/cart-line-item-save\b(?:(?!-->).)*\/-->\s*<!--\s*wp:surecart\/cart-line-item-remove\b(?:(?!-->).)*\/-->\s*<\/div>)/s';

	/**
	 * Only until it has run once.
	 *
	 * @return bool
	 */
	public function shouldMigrate(): bool {
		return '0.0.0' === $this->getLastMigrationVersion();
	}

	/**
	 * Run the migration.
	 *
	 * @return void
	 */
	public function run(): void {
		foreach ( $this->getCartPosts() as $cart_post ) {
			$content  = $cart_post->post_content ?? '';
			$migrated = $this->addSaveBlock( $content );
			if ( $migrated === $content ) {
				continue;
			}

			$result = $this->updatePostContent( $cart_post->ID, $migrated );

			// a failed update defers completion so the next admin_init retries (see VersionMigration::complete()).
			if ( is_wp_error( $result ) || empty( $result ) ) {
				$this->failed = true;
			}
		}
	}

	/**
	 * Put the save block just before the remove block, styled like it, and the two side by side.
	 *
	 * @param string $content Post content.
	 * @return string Migrated content (unchanged when there's no remove block to sit beside).
	 */
	protected function addSaveBlock( string $content ): string {
		if ( '' === $content ) {
			return $content;
		}

		if ( ! has_block( 'surecart/cart-line-item-save', $content ) ) {
			// Remove's styling only: its label and icon choices would make Save read "Delete" or vanish.
			$attrs = array_diff_key(
				(array) json_decode( (string) $this->blockAttrs( $content, 'cart-line-item-remove' ), true ),
				array_flip( [ 'label', 'show_label', 'icon' ] )
			);
			$save  = '<!-- wp:surecart/cart-line-item-save ' . ( $attrs ? serialize_block_attributes( $attrs ) . ' ' : '' ) . '/-->';

			$migrated = preg_replace_callback(
				self::REMOVE_BLOCK_PATTERN,
				fn( $matches ) => $matches[1] . $save . "\n\n" . $matches[0],
				$content,
				1
			);
			$content  = is_string( $migrated ) ? $migrated : $content;
		}

		return $this->setSideBySide( $content );
	}

	/**
	 * Turn a stacked group holding only Save then Remove into a row, as fresh carts have them.
	 *
	 * Stacked, the two links misalign (Remove has an icon). The row may wrap, so on a narrow cart
	 * Remove drops below Save rather than overflowing. Other styling and the alignment are kept;
	 * a group with anything else in it is left alone.
	 *
	 * @param string $content Post content.
	 * @return string
	 */
	protected function setSideBySide( string $content ): string {
		$migrated = preg_replace_callback(
			self::ACTIONS_GROUP_PATTERN,
			function ( $matches ) {
				$attrs = json_decode( $matches[1], true );
				if ( ! is_array( $attrs ) || 'vertical' !== ( $attrs['layout']['orientation'] ?? '' ) ) {
					return $matches[0];
				}

				$attrs['layout'] = array_filter(
					[
						'type'           => 'flex',
						'justifyContent' => $attrs['layout']['justifyContent'] ?? null,
					]
				);
				$attrs['style']['spacing']['blockGap'] = '12px';

				return '<!-- wp:group ' . serialize_block_attributes( $attrs ) . ' -->' . $matches[2];
			},
			$content,
			1
		);

		return is_string( $migrated ) ? $migrated : $content;
	}
}
