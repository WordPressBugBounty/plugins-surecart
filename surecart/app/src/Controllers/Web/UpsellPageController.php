<?php

namespace SureCart\Controllers\Web;

use SureCart\Support\PublicCatalogData;

/**
 * Handles Upsell Page requests for frontend.
 */
class UpsellPageController extends BasePageController {
	/**
	 * The product model.
	 *
	 * @var \SureCart\Models\Product
	 */
	protected $product;

	/**
	 * Handle filters.
	 *
	 * @return void
	 */
	public function filters(): void {
		parent::filters();

		// Add edit product link to admin bar.
		add_action( 'admin_bar_menu', [ $this, 'addEditUpsellLink' ], 99 );

		\SureCart::currency()->convert( true );
	}

	/**
	 * We don't want to index the upsell page.
	 *
	 * @return void
	 */
	public function addSeoMetaData(): void {
		?>
		<meta name="robots" content="noindex" />
		<?php
	}

	/**
	 * Add edit links
	 *
	 * @param \WP_Admin_bar $wp_admin_bar The admin bar.
	 *
	 * @return void
	 */
	public function addEditUpsellLink( $wp_admin_bar ) {
		if ( empty( $this->model->id ) ) {
			return;
		}
		$wp_admin_bar->add_node(
			[
				'id'    => 'edit',
				'title' => __( 'Edit Upsell Funnel', 'surecart' ),
				'href'  => esc_url( \SureCart::getUrl()->edit( 'upsell', $this->model->upsell_funnel ) ),
			]
		);
	}

	/**
	 * Show the product page
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 * @param \SureCartCore\View                      $view View.
	 * @param string                                  $id The id of the product.
	 * @return function
	 */
	public function show( $request, $view ) {
		// fetch the upsell.
		$this->model = \SureCart\Models\Upsell::with( [ 'price' ] )->find( get_query_var( 'sc_upsell_id' ) );
		if ( is_wp_error( $this->model ) ) {
			return $this->handleError( $this->model );
		}

		// does not exist on checkout.
		if ( empty( $this->model->price->product ) ) {
			return $this->notFound();
		}

		// this is typically cached.
		$this->product = \SureCart\Models\Product::with( [ 'image', 'prices', 'product_medias', 'product_media.media', 'variants', 'variant_options' ] )->find( $this->model->price->product );

		// A WP_Error is non-empty, so it would slip past the empty() check below.
		if ( is_wp_error( $this->product ) ) {
			return $this->handleError( $this->product );
		}

		// Stop if the product is not found.
		if ( empty( $this->product ) ) {
			return $this->notFound();
		}

		// Set the product page id.
		set_query_var( 'surecart_current_product', $this->product );

		// add the filters.
		$this->filters();

		$form_id = $this->getFormId( $request );

		// the upsell expands its price — strip catalog data before it hits public state.
		$upsell = json_decode( wp_json_encode( $this->model ), true );
		if ( ! empty( $upsell['price'] ) && is_array( $upsell['price'] ) ) {
			$upsell['price'] = PublicCatalogData::price( $upsell['price'] );
		}

		// Set initial state.
		sc_initial_state(
			[
				'product' => [
					// we need to force the selected price.
					$this->product->id => $this->product->getInitialPageState( [ 'selectedPrice' => PublicCatalogData::price( $this->model->price ) ] ),
				],
				'upsell'  => [
					'product'     => PublicCatalogData::product( $this->product ),
					'upsell'      => $upsell,
					'form_id'     => $form_id,
					'checkout_id' => esc_attr( $request->query( 'sc_checkout_id' ) ?? '' ),
					'text'        => $this->getCheckoutText( $form_id ),
					'success_url' => esc_url( $this->getCheckoutSuccessUrl( $form_id ) ),
				],
			]
		);

		// handle block theme.
		if ( wp_is_block_theme() ) {
			global $_wp_current_template_content;
			$_wp_current_template_content = get_block_template( $this->model->template_id )->content ?? '';
		}

		// include the default view.
		include $view;

		return \SureCart::response();
	}

	/**
	 * Get the checkout form id from the request.
	 *
	 * Classic forms keep their int post id (0 when absent); only instant checkout
	 * sends the `instant-checkout` string constant.
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 *
	 * @return int|string
	 */
	public function getFormId( $request ) {
		$form_id = sanitize_text_field( $request->query( 'sc_form_id' ) ?? '' );

		return 'instant-checkout' === $form_id ? $form_id : (int) $form_id;
	}

	/**
	 * Get the checkout success text.
	 *
	 * @param int|string $form_id Checkout form post id or the `instant-checkout` constant.
	 *
	 * @return array|string
	 */
	public function getCheckoutText( $form_id ) {
		// The instant-checkout form has no post; its block supplies the text.
		if ( ! is_numeric( $form_id ) ) {
			return '';
		}

		$form = get_post( (int) $form_id );

		if ( is_wp_error( $form ) || empty( $form ) ) {
			return '';
		}

		$block      = wp_get_first_block( parse_blocks( $form->post_content ), 'surecart/form' );
		$attributes = $block['attrs'] ?? [];

		return array_filter(
			[
				'success' => array_filter( $attributes['success_text'] ?? [] ),
			]
		);
	}

	/**
	 * Get the success url by form id.
	 *
	 * @param  int|string $form_id Checkout form post id or the `instant-checkout` constant.
	 * @return string         The success url.
	 */
	public function getCheckoutSuccessUrl( $form_id ): string {
		// No post to read from: default to the order-confirmation page
		// (metadata.success_url still wins client-side).
		if ( 'instant-checkout' === $form_id ) {
			return \SureCart::pages()->url( 'order-confirmation' );
		}

		// The classic /buy form sends no id (getFormId() casts it to 0, and get_post( 0 ) would
		// return the global post): '' keeps sc-upsell's Thank-you dialog.
		if ( empty( $form_id ) || ! is_numeric( $form_id ) ) {
			return '';
		}

		$form = get_post( (int) $form_id );

		if ( is_wp_error( $form ) || empty( $form ) ) {
			return '';
		}

		$block = wp_get_first_block( parse_blocks( $form->post_content ), 'surecart/form' );

		if ( empty( $block ) || empty( $block['attrs']['success_url'] ) ) {
			return '';
		}

		return $block['attrs']['success_url'];
	}
}
