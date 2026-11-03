<?php

namespace SureCart\SavedItems;

use SureCart\Models\Customer;
use SureCart\Models\SavedList;
use SureCart\Models\User;

/**
 * The Saved Items feature's store-wide rules.
 *
 * Owns the on/off switch (off: every saved-items surface renders nothing), the default list's
 * name, where shoppers find their list, and what a page that saves needs printed.
 */
class SavedItemsService {
	/**
	 * Whether this request renders something that saves, so the toast and "Save to list" dialog are printed.
	 *
	 * @var bool
	 */
	protected $needs_ui = false;

	/**
	 * Blocks that only make sense with saved items on.
	 *
	 * They stay registered, so shipped and edited templates that contain them don't show
	 * "unsupported block" warnings; they just render nothing.
	 *
	 * @var string[]
	 */
	const BLOCKS = [
		'surecart/product-save-button',
		'surecart/cart-line-item-save',
		'surecart/saved-items-icon',
		'surecart/saved-items-dialog',
		'surecart/saved-items-dialog-product-name',
		'surecart/saved-items-list-picker',
		'surecart/saved-items-new-list',
		'surecart/customer-saved-items',
	];

	/**
	 * Bootstrap the switch.
	 *
	 * @return void
	 */
	public function bootstrap() {
		// Turning it on (again) gives the store its page; seeding is once, so a deleted page stays deleted.
		add_action( 'update_option_surecart_saved_items_enabled', [ $this, 'seedPageWhenEnabled' ], 10, 2 );
		add_action( 'add_option_surecart_saved_items_enabled', [ $this, 'seedPageWhenEnabled' ], 10, 2 );

		if ( $this->enabled() ) {
			return;
		}

		// Short-circuits before the block renders, so it enqueues no styles or scripts either.
		add_filter( 'pre_render_block', [ $this, 'skipBlock' ], 10, 2 );
		add_filter( 'register_block_type_args', [ $this, 'hideFromInserter' ], 10, 2 );
	}

	/**
	 * Render nothing for a saved-items block.
	 *
	 * @param string|null $pre_render The pre-rendered content, or null.
	 * @param array       $block      The block being rendered.
	 *
	 * @return string|null
	 */
	public function skipBlock( $pre_render, $block ) {
		return in_array( $block['blockName'] ?? '', self::BLOCKS, true ) ? '' : $pre_render;
	}

	/**
	 * Keep saved-items blocks out of the inserter while the feature is off.
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block name.
	 *
	 * @return array
	 */
	public function hideFromInserter( $args, $block_type ) {
		if ( in_array( $block_type, self::BLOCKS, true ) ) {
			$args['supports']             = $args['supports'] ?? [];
			$args['supports']['inserter'] = false;
		}
		return $args;
	}

	/**
	 * Seed the Saved Items page when the feature is switched on.
	 *
	 * Hooked to both add_option (first save) and update_option, whose second argument differs;
	 * the option's current value is what matters.
	 *
	 * @return void
	 */
	public function seedPageWhenEnabled() {
		if ( $this->enabled() ) {
			\SureCart::page_seeder()->createSavedItemsPage();
		}
	}

	/**
	 * Remove the feature's page, settings and cached list ids, when SureCart is uninstalled with "remove data" on.
	 *
	 * Shoppers' saved items live on the platform, so nothing of theirs is stored here.
	 *
	 * @return void
	 */
	public function uninstall() {
		global $wpdb;

		$page = \SureCart::pages()->get( 'saved_items' );
		if ( $page ) {
			wp_delete_post( $page->ID, true );
		}

		foreach ( [ 'enabled', 'default_list_name', 'menu_selected_ids', 'menu_alignment', 'page_id' ] as $option ) {
			delete_option( 'surecart_saved_items_' . $option );
		}

		// Keyed per customer, so there's no list of keys to delete one by one.
		$wpdb->query( // phpcs:ignore WordPress.DB.DirectDatabaseQuery
			$wpdb->prepare(
				"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
				$wpdb->esc_like( '_transient_surecart_default_saved_list_' ) . '%',
				$wpdb->esc_like( '_transient_timeout_surecart_default_saved_list_' ) . '%'
			)
		);
	}

	/**
	 * Whether the store offers saved items (Settings → Design → Saved Items).
	 *
	 * @return bool
	 */
	public function enabled() {
		return (bool) get_option( 'surecart_saved_items_enabled', true );
	}

	/**
	 * Name of the list every save lands in unless the shopper picks another.
	 *
	 * @return string The store's name for it, else the translated "Saved for later".
	 */
	public function defaultListName() {
		$name = trim( (string) get_option( 'surecart_saved_items_default_list_name', '' ) );
		return '' !== $name ? $name : __( 'Saved for later', 'surecart' );
	}

	/**
	 * The current user's customer whose lists they see: live, else test.
	 *
	 * @return string|null
	 */
	public function customerId() {
		$user = User::current();
		foreach ( [ 'live', 'test' ] as $mode ) {
			$customer_id = $user->customerId( $mode );
			if ( ! empty( $customer_id ) ) {
				return $customer_id;
			}
		}
		return null;
	}

	/**
	 * Run a read for the current user's customer, dropping links to customers the platform no longer has.
	 *
	 * Reads never create a customer, so without this a reconnected store left the list erroring until the next save.
	 *
	 * @param callable $read Receives the customer id, or null when the user has none.
	 *
	 * @return mixed What the read returns.
	 */
	public function readForCustomer( callable $read ) {
		// A user links at most a live and a test customer.
		for ( $tries = 0; ; $tries++ ) {
			$customer_id = $this->customerId();
			$result      = $read( $customer_id );
			if ( ! $customer_id || $tries >= 2 || ! $this->forgetGoneCustomer( $result, $customer_id ) ) {
				return $result;
			}
		}
	}

	/**
	 * Unlink a customer the platform no longer has, e.g. after the store was reconnected to another account.
	 *
	 * Only once the platform confirms it's gone, since the link also carries the user's orders.
	 *
	 * @param mixed  $result      What a read or write for the customer returned.
	 * @param string $customer_id Customer id.
	 *
	 * @return bool Whether it was unlinked.
	 */
	public function forgetGoneCustomer( $result, $customer_id ) {
		if ( ! $this->isInvalidCustomer( $result ) ) {
			return false;
		}

		$found  = Customer::find( $customer_id );
		$status = is_wp_error( $found ) ? ( ( (array) $found->get_error_data() )['status'] ?? null ) : null;
		if ( 404 !== $status ) {
			return false;
		}

		$user     = User::current();
		$unlinked = false;
		foreach ( [ 'live', 'test' ] as $mode ) {
			if ( $user->customerId( $mode ) === $customer_id ) {
				$user->removeCustomerId( $mode );
				$unlinked = true;
			}
		}
		SavedList::forgetDefault( $customer_id );

		return $unlinked;
	}

	/**
	 * Whether a saved-items call failed because the platform has no lists for the customer.
	 *
	 * @param mixed $result What the call returned.
	 *
	 * @return bool
	 */
	public function isInvalidCustomer( $result ) {
		return is_wp_error( $result ) && false !== strpos( (string) $result->get_error_code(), 'customer.invalid' );
	}

	/**
	 * Where shoppers view their saved items.
	 *
	 * The Saved Items page works for guests and customers; stores without it fall back to the dashboard tab.
	 *
	 * @return string Empty when the store has neither page.
	 */
	public function url() {
		$saved_url = \SureCart::pages()->url( 'saved_items' );
		if ( ! empty( $saved_url ) ) {
			return $saved_url;
		}

		$dashboard_url = \SureCart::pages()->url( 'dashboard' );
		return $dashboard_url ? add_query_arg(
			[
				'action' => 'index',
				'model'  => 'saved_item',
			],
			$dashboard_url
		) : '';
	}

	/**
	 * Mark this request as rendering something that saves.
	 *
	 * Called by what renders the controls; an enqueued style is no proof, since classic themes enqueue every block's.
	 *
	 * @return void
	 */
	public function requireUi() {
		$this->needs_ui = true;
	}

	/**
	 * Whether the toast and "Save to list" dialog should be printed.
	 *
	 * @return bool
	 */
	public function needsUi() {
		return $this->needs_ui;
	}

	/**
	 * Server values for the store's derived state, matching a list that hasn't loaded yet.
	 *
	 * The server drops a bound attribute whose state is missing, which would strip `aria-pressed`
	 * and the link's name, and hide the "Save for later" label, until the store hydrates.
	 *
	 * @return void
	 */
	public function seedState() {
		wp_interactivity_state(
			'surecart/saved-items',
			[
				'isPressed'        => false,
				'isBusy'           => false,
				'showLabel'        => true,
				'showOptionsLabel' => false,
				'canChangeLists'   => false,
				'linkLabel'        => __( 'Saved items', 'surecart' ),
				'count'            => 0,
			]
		);
	}

	/**
	 * The "Change" link that sits beside a save button; shown once a customer has saved the product.
	 *
	 * Shared by the block, the Elementor widget and the Bricks element. Guests have one list, so it stays hidden.
	 *
	 * @param object|null $product Product being saved.
	 * @param array       $args {
	 *     Optional.
	 *
	 *     @type bool   $inline  Beside a text-link save button ("· Change") rather than under a full button.
	 *     @type string $style   Inline CSS, e.g. to align it with its button.
	 *     @type bool   $preview A visible, inert copy for a page builder canvas, so it can be styled there.
	 * }
	 *
	 * @return string
	 */
	public function changeButton( $product, $args = [] ) {
		$args = wp_parse_args(
			$args,
			[
				'inline'  => false,
				'style'   => '',
				'preview' => false,
			]
		);

		$attributes = sprintf(
			'class="sc-saved-items-change%s"%s',
			$args['inline'] ? ' is-inline' : '',
			$args['style'] ? ' style="' . esc_attr( safecss_filter_attr( $args['style'] ) ) . '"' : ''
		);

		if ( $args['preview'] ) {
			return sprintf( '<span %s>%s</span>', $attributes, esc_html__( 'Change', 'surecart' ) );
		}

		if ( empty( $product->id ) ) {
			return '';
		}

		// "Change" beside "Saved" reads clearly; the accessible name says what changes.
		return sprintf(
			'<button type="button" %s aria-label="%s" data-wp-interactive=\'{ "namespace": "surecart/saved-items" }\' %s data-wp-bind--hidden="!state.canChangeLists" data-wp-on--click="actions.openPicker" hidden>%s</button>',
			$attributes,
			esc_attr__( 'Change list', 'surecart' ),
			wp_interactivity_data_wp_context(
				[
					'productId'   => $product->id,
					'productName' => $product->name ?? '',
				]
			),
			esc_html__( 'Change', 'surecart' )
		);
	}
}
