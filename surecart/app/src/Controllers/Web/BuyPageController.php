<?php
namespace SureCart\Controllers\Web;

/**
 * Handles Instant Checkout Page.
 */
class BuyPageController extends BasePageController {
	/**
	 * Whether this request renders the FSE instant-checkout template.
	 *
	 * @var bool
	 */
	protected $is_fse_instant_checkout = false;

	/**
	 * The resolved instant-checkout template id on the FSE render path.
	 *
	 * @var string
	 */
	protected $instant_checkout_template_id = '';

	/**
	 * Handle filters.
	 *
	 * @return void
	 */
	public function filters(): void {
		parent::filters();
		// Add edit product link to admin bar.
		add_action( 'admin_bar_menu', [ $this, 'addEditProductLink' ], 99 );
		// Add edit instant checkout template link to admin bar (FSE render path only).
		add_action( 'admin_bar_menu', [ $this, 'addEditInstantCheckoutTemplateLink' ], 99 );
		// add styles.
		add_action( 'wp_enqueue_scripts', [ $this, 'styles' ] );
		// add scripts.
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] );
		// add seo meta data.
		add_action( 'wp_head', [ $this, 'addSeoMetaData' ] );
		// add json schema.
		add_action( 'wp_head', [ $this, 'addProductJsonSchema' ] );
		// keep the sc-buy-page body class on the FSE-rendered path so existing CSS still scopes.
		add_filter( 'body_class', [ $this, 'addBuyPageBodyClass' ] );
		// the buy page is singular sc_product now — remove the product page's own hooks
		// for the things this controller (via BasePageController) prints itself.
		remove_action( 'wp_head', [ \SureCart::productSeo(), 'addProductSeoMeta' ], 10 );
		remove_action( 'wp_head', [ \SureCart::productSeo(), 'addProductJsonSchema' ], 10 );
		remove_action( 'admin_bar_menu', [ \SureCart::productPost(), 'addEditLink' ], 99 );
		remove_filter( 'document_title_parts', [ \SureCart::productPost(), 'documentTitle' ] );
		remove_filter( 'pre_get_document_title', [ \SureCart::productPost(), 'disallowPreTitle' ], 214748364 );
	}

	/**
	 * Add the sc-buy-page class on the instant checkout page.
	 *
	 * @param array $classes The current body classes.
	 *
	 * @return array
	 */
	public function addBuyPageBodyClass( $classes ) {
		if ( ! in_array( 'sc-buy-page', $classes, true ) ) {
			$classes[] = 'sc-buy-page';
		}
		return $classes;
	}

	/**
	 * Preload the image above the fold.
	 *
	 * @return void
	 */
	public function preloadImage(): void {
		if ( empty( $this->model->product_medias->data ) || is_wp_error( $this->model->product_medias->data ) ) {
			return;
		}
		$product_media = $this->model->product_medias->data[0];
		?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo esc_url( $product_media->getUrl( 450 ) ); ?>">
		<?php
	}

	/**
	 * Add edit links
	 *
	 * @param \WP_Admin_bar $wp_admin_bar The admin bar.
	 *
	 * @return void
	 */
	public function addEditProductLink( $wp_admin_bar ) {
		// The buy page is a singular sc_product on both render paths, so the admin
		// toolbar adds its own edit node.
		if ( \SureCart::adminToolbar()->isEnabled() ) {
			return;
		}

		if ( empty( $this->model->id ) ) {
			return;
		}

		$is_bundle = ! empty( $this->model->bundle );
		$url_key   = $is_bundle ? 'bundle' : 'product';
		$wp_admin_bar->add_node(
			[
				'id'    => 'edit',
				'title' => $is_bundle ? __( 'Edit Bundle', 'surecart' ) : __( 'Edit Product', 'surecart' ),
				'href'  => esc_url( \SureCart::getUrl()->edit( $url_key, $this->model->id ) ),
			]
		);
	}

	/**
	 * Link merchants to the Site Editor for the instant-checkout template.
	 *
	 * Gated on edit_theme_options, the capability the Site Editor itself requires.
	 *
	 * @param \WP_Admin_bar $wp_admin_bar The admin bar.
	 *
	 * @return void
	 */
	public function addEditInstantCheckoutTemplateLink( $wp_admin_bar ) {
		if ( ! $this->is_fse_instant_checkout ) {
			return;
		}

		// The SureCart toolbar's own edit node supersedes WordPress' default one here.
		if ( $wp_admin_bar->get_node( 'surecart-edit-product' ) ) {
			$wp_admin_bar->remove_node( 'edit' );
		}

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		$template_type = $this->model->buyLink()->getTemplateType();
		$template_id   = $this->instant_checkout_template_id ? $this->instant_checkout_template_id : $this->model->buyLink()->getDefaultTemplateId();

		$wp_admin_bar->add_node(
			[
				'id'    => 'edit-instant-checkout-template',
				'title' => '<span class="ab-icon" aria-hidden="true"></span>' . esc_html__( 'Edit Checkout Template', 'surecart' ),
				'href'  => esc_url( admin_url( 'site-editor.php?postType=' . rawurlencode( $template_type ) . '&postId=' . rawurlencode( $template_id ) . '&canvas=edit' ) ),
			]
		);
	}

	/**
	 * Resolve the product for the buy link slug and run all access gates.
	 *
	 * Returns the Product, or a route response (redirect / not-found / error) on failure.
	 *
	 * @param string $id The id or slug of the product.
	 * @return \SureCart\Models\Product|mixed
	 */
	protected function resolveAndGate( $id ) {
		// fetch the product by id/slug. Bundle expands carry live component
		// variant stock, so the buy page renders fresh availability in one fetch.
		$product = \SureCart\Models\Product::with(
			\SureCart\Models\Product::storefrontExpands()
		)->find( $id );

		if ( is_wp_error( $product ) ) {
			return $this->handleError( $product );
		}

		// if this buy page is not enabled, check read permissions.
		if ( ! $product->buyLink()->isEnabled() && ! current_user_can( 'read_sc_products' ) ) {
			return $this->notFound();
		}

		// slug changed or we are using the id, redirect.
		if ( $product->slug !== $id ) {
			return \SureCart::redirect()->to( esc_url_raw( \SureCart::routeUrl( 'product', [ 'id' => $product->slug ] ) ) );
		}

		// must have at least one active price.
		if ( empty( $product->active_prices[0] ) ) {
			return $this->notFound();
		}

		return $product->withActivePrices()->withSortedPrices();
	}

	/**
	 * Seed the classic form's initial line item with the first sorted active price.
	 *
	 * @return void
	 */
	protected function prepareInitialState(): void {
		$price_id = $this->model->prices->data[0]->id ?? null;
		if ( empty( $price_id ) ) {
			return;
		}

		sc_initial_state(
			[
				'checkout' => [
					'initialLineItems' => sc_initial_line_items( [ $this->model->buyLink()->initialLineItem( $price_id ) ] ),
				],
			]
		);
	}

	/**
	 * Build the view payload for the classic-theme `web/buy` view.
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 *
	 * @return array
	 */
	protected function viewArgs( $request ): array {
		return [
			'product'          => $this->model,
			'terms_text'       => \SureCart\Support\Blocks\CheckoutTermsService::text(),
			'mode'             => $this->model->buyLink()->getMode(),
			'store_name'       => \SureCart::account()->name ?? get_bloginfo(),
			'logo_url'         => \SureCart::theme()->logoUrl(),
			'logo_width'       => \SureCart::settings()->get( 'buy_link_logo_width', '180px' ),
			'user'             => wp_get_current_user(),
			'logout_link'      => wp_logout_url( $request->getUrl() ),
			'dashboard_link'   => \SureCart::pages()->url( 'dashboard' ),
			'enabled'          => $this->model->buyLink()->isEnabled(),
			'show_logo'        => $this->model->buyLink()->templatePartEnabled( 'logo' ),
			'show_terms'       => $this->model->buyLink()->templatePartEnabled( 'terms' ),
			'show_image'       => $this->model->buyLink()->templatePartEnabled( 'image' ),
			'show_description' => $this->model->buyLink()->templatePartEnabled( 'description' ),
			'show_coupon'      => $this->model->buyLink()->templatePartEnabled( 'coupon' ),
			'success_url'      => $this->model->buyLink()->getSuccessUrl(),
		];
	}

	/**
	 * Show the product page
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 * @param \SureCartCore\View                      $view View.
	 * @param string                                  $id The id of the product.
	 * @return function
	 */
	public function show( $request, $view, $id ) {
		// The route's $id can be stale; the `sc_checkout_product_id` query var is canonical.
		$id = get_query_var( 'sc_checkout_product_id' );

		$resolved = $this->resolveAndGate( $id );
		if ( ! $resolved instanceof \SureCart\Models\Product ) {
			return $resolved;
		}
		$this->model = $resolved;

		// prevent 404 redirects by 3rd party plugins.
		$_SERVER['REQUEST_URI'] = $request->getUrl();

		// add the filters.
		$this->filters();

		// Block layout only when the merchant opted in; off keeps the static `web/buy` view.
		// Block themes use the `instant-checkout` wp_template, classic themes the
		// `instant-checkout-info` part.
		$customizable_instant_checkout = (bool) \SureCart::settings()->get( 'customizable_instant_checkout_enabled', false );

		// The block layout only supports Stripe's Payment Element; with that setting off,
		// stay on the classic view. Not Stripe-aware: stores without Stripe fall back too.
		if ( $customizable_instant_checkout && ! (bool) get_option( 'sc_stripe_payment_element', true ) ) {
			$customizable_instant_checkout = false;
		}

		if ( $customizable_instant_checkout ) {
			$template = $this->resolveInstantCheckoutTemplate();
			if ( $template ) {
				return $this->renderInstantCheckoutTemplate( $template );
			}
			// Fall through to the static web/buy view if the template is unavailable.
		}

		// Classic themes: existing self-contained PHP view. Only this view reads
		// sc_initial_state — the block path seeds its own store during render.
		$this->prepareInitialState();

		return \SureCart::view( 'web/buy' )->with( $this->viewArgs( $request ) );
	}

	/**
	 * Resolve the block template for this buy link.
	 *
	 * A deleted per-product template falls back to the plugin default.
	 *
	 * @return \WP_Block_Template|null The template, or null when none has content.
	 */
	protected function resolveInstantCheckoutTemplate() {
		$buy_link      = $this->model->buyLink();
		$template_type = $buy_link->getTemplateType();
		$template      = get_block_template( $buy_link->getTemplateId(), $template_type );

		if ( empty( $template->content ) && $buy_link->getTemplateId() !== $buy_link->getDefaultTemplateId() ) {
			$template = get_block_template( $buy_link->getDefaultTemplateId(), $template_type );
		}

		return empty( $template->content ) ? null : $template;
	}

	/**
	 * Render the block template inside the `web/product-canvas` wrapper.
	 *
	 * Sets up the query var, $post, query flags and FSE globals the blocks read.
	 *
	 * @param \WP_Block_Template $template The resolved template.
	 *
	 * @return \SureCartCore\View\ViewInterface
	 */
	protected function renderInstantCheckoutTemplate( $template ) {
		// Lets the admin-bar edit link target the template that rendered.
		$this->instant_checkout_template_id = $template->id;

		global $post, $wp_query, $_wp_current_template_id, $_wp_current_template_content;

		// FSE path only: on the classic fallback this would trigger Elementor FSE asset loading.
		set_query_var( 'surecart_current_product', $this->model );

		// The seeded state holds the logged-in buyer's email and avatar, so keep page
		// caches (incl. CDN) from serving it.
		// Must run before render: the seed runs mid-render, after headers are sent.
		if ( is_user_logged_in() && ! headers_sent() ) {
			if ( ! defined( 'DONOTCACHEPAGE' ) ) {
				define( 'DONOTCACHEPAGE', true );
			}
			nocache_headers();
		}

		// Makes scripts()/styles() skip the Stencil runtime and theme CSS; the block
		// layout renders no sc-* elements.
		$this->is_fse_instant_checkout = true;

		// A nested <form> is dropped by the parser and closes the checkout form early,
		// so render a <div>.
		add_filter( 'render_block_surecart/product-page', [ $this, 'unwrapProductPageForm' ], 10, 2 );
		// The checkout follows the product-page selection through a watch on its root.
		add_filter( 'render_block_surecart/product-page', [ $this, 'watchProductPage' ], 11, 2 );
		// The buy link gates this page, so a draft product must not be hidden by the
		// block's publish-only query.
		add_filter( 'surecart_product_page_query_args', [ $this, 'widenBuyProductPostStatus' ] );
		// A legacy variant-price-selector without a product_id does Product::find( '' ) and corrupts output.
		add_filter( 'render_block_data', [ $this, 'injectVariantPriceSelectorProduct' ] );

		// Keep the bare product name as title (singular below would append the site name);
		// must outrank the parent's disallowPreTitle filter (priority 214748364).
		add_filter( 'pre_get_document_title', [ $this, 'bareDocumentTitle' ], PHP_INT_MAX );

		// Swap global $post to the synced sc_product so product-aware blocks read product data.
		$synced_post = ! empty( $this->model->post ) && $this->model->post instanceof \WP_Post ? $this->model->post : null;

		if ( $synced_post instanceof \WP_Post ) {
			$post = $synced_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			setup_postdata( $post );
		}

		if ( isset( $wp_query ) ) {
			$wp_query->is_404     = false;
			$wp_query->is_archive = false;
			$wp_query->is_home    = false;

			// Singular needs a queried object (get_body_class() reads its ID), which
			// unsynced products lack.
			if ( $synced_post instanceof \WP_Post ) {
				$wp_query->is_singular       = true;
				$wp_query->is_single         = true;
				$wp_query->queried_object    = $synced_post;
				$wp_query->queried_object_id = $synced_post->ID;
			}
		}
		// Globals core's template-loader sets for FSE rendering.
		$_wp_current_template_id      = $template->id;
		$_wp_current_template_content = $template->content;

		return \SureCart::view( 'web/product-canvas' )->with(
			[
				'content' => $template->content,
			]
		);
	}

	/**
	 * Enqueue scripts; the FSE instant-checkout path skips the Stencil runtime and theme CSS.
	 *
	 * @return void
	 */
	public function scripts() {
		if ( $this->is_fse_instant_checkout ) {
			// parent::scripts() also localizes `scData`; without it the REST nonce
			// middleware never builds and authenticated checkout writes fail with 403,
			// so ship it via a data-only handle.
			wp_register_script( 'surecart-instant-checkout-data', false, array(), \SureCart::plugin()->version(), true );
			wp_enqueue_script( 'surecart-instant-checkout-data' );
			wp_localize_script( 'surecart-instant-checkout-data', 'scData', \SureCart\WordPress\Assets\ScriptsService::getScData() );
			return;
		}

		parent::scripts();
	}

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	public function styles() {
		// filemtime() warns when the built CSS is missing (pre-build); fall back to the
		// plugin version.
		$css_path    = trailingslashit( plugin_dir_path( SURECART_PLUGIN_FILE ) ) . 'dist/templates/instant-checkout.css';
		$css_version = is_readable( $css_path ) ? filemtime( $css_path ) : \SureCart::plugin()->version();

		wp_enqueue_style(
			'surecart/instant-checkout',
			trailingslashit( \SureCart::core()->assets()->getUrl() ) . 'dist/templates/instant-checkout.css',
			[],
			$css_version,
		);

		// Blocks-next-only page: no Stencil enqueue re-runs StylesService::register(), whose
		// init-time call ran before surecart-theme-base was registered.
		if ( $this->is_fse_instant_checkout && wp_style_is( 'surecart-theme-base', 'registered' ) ) {
			\SureCart::assets()->addBlockThemeInlineStyle();
		}

		// Pencil icon for the admin-bar edit node; inline because the node is added
		// after the admin-bar CSS prints.
		if ( $this->is_fse_instant_checkout && is_admin_bar_showing() && current_user_can( 'edit_theme_options' ) ) {
			wp_add_inline_style(
				'admin-bar',
				'#wp-admin-bar-edit-instant-checkout-template .ab-icon{position:relative;top:2px;}#wp-admin-bar-edit-instant-checkout-template .ab-icon:before{content:"\f464" !important;}'
			);
		}

		// add recaptcha if enabled.
		if ( \SureCart::settings()->recaptcha()->isEnabled() ) {
			wp_enqueue_script( 'surecart-google-recaptcha' );
		}
	}

	/**
	 * Give variant-price-selector blocks the buy product's id when they have none.
	 *
	 * @param array $parsed_block Parsed block array.
	 *
	 * @return array
	 */
	public function injectVariantPriceSelectorProduct( $parsed_block ): array {
		if ( 'surecart/variant-price-selector' !== ( $parsed_block['blockName'] ?? '' ) ) {
			return $parsed_block;
		}

		if ( empty( $this->model->id ) ) {
			return $parsed_block;
		}

		// An explicit product_id (e.g. inside a checkout form) still wins.
		if ( ! empty( $parsed_block['attrs']['product_id'] ) ) {
			return $parsed_block;
		}

		$parsed_block['attrs']['product_id'] = $this->model->id;

		return $parsed_block;
	}

	/**
	 * Swap the product-page block's root <form> for a <div> so no form nests in the checkout form.
	 *
	 * @param string $content The rendered block HTML.
	 * @param array  $block   The parsed block.
	 *
	 * @return string
	 */
	public function unwrapProductPageForm( $content, $block = [] ): string {
		$content = (string) $content;
		if ( ! $this->isBuyProductPageBlock( (array) $block ) ) {
			return $content;
		}
		$unwrapped = preg_replace( '/^(\s*)<form\b(.*)<\/form>(\s*)$/s', '$1<div$2</div>$3', $content, 1 );
		return null === $unwrapped ? $content : $unwrapped;
	}

	/**
	 * Mirror the product-page block's price / variant selection into the buy line item.
	 *
	 * @param string $content The rendered block HTML.
	 * @param array  $block   The parsed block.
	 *
	 * @return string
	 */
	public function watchProductPage( $content, $block = [] ): string {
		$content = (string) $content;
		if ( ! $this->isBuyProductPageBlock( (array) $block ) ) {
			return $content;
		}
		$processor = new \WP_HTML_Tag_Processor( $content );
		if ( ! $processor->next_tag() ) {
			return $content;
		}
		$processor->set_attribute( 'data-wp-watch', 'surecart/checkout-form::callbacks.syncFromProduct' );
		return $processor->get_updated_html();
	}

	/**
	 * Let the product-page query for the buy product's own post match its draft or archived status.
	 *
	 * @param array $args WP_Query args for the block's product lookup.
	 *
	 * @return array
	 */
	public function widenBuyProductPostStatus( $args ): array {
		$args    = (array) $args;
		$post_id = $this->buyProductPostId();
		if ( empty( $post_id ) || array_map( 'intval', (array) ( $args['post__in'] ?? [] ) ) !== [ $post_id ] ) {
			return $args;
		}
		$args['post_status'] = [ 'publish', 'draft', 'sc_archived' ];
		return $args;
	}

	/**
	 * Whether a product-page block renders the buy product; an unpinned block does.
	 *
	 * @param array $block The parsed block.
	 *
	 * @return bool
	 */
	protected function isBuyProductPageBlock( array $block ): bool {
		$pinned = $block['attrs']['product_post_id'] ?? null;
		if ( empty( $pinned ) ) {
			return true;
		}
		return (int) $pinned === $this->buyProductPostId();
	}

	/**
	 * The buy product's synced post ID, or 0 when it has none.
	 *
	 * @return int
	 */
	protected function buyProductPostId(): int {
		return ! empty( $this->model->post->ID ) ? (int) $this->model->post->ID : 0;
	}

	/**
	 * Title the FSE buy page with the bare product name, no site-name suffix, like the classic view.
	 *
	 * @return string
	 */
	public function bareDocumentTitle() {
		return wp_strip_all_tags( $this->model->name ?? '' );
	}

	/**
	 * Add the SEO meta data.
	 *
	 * @return void
	 */
	public function addSeoMetaData(): void {
		$product = $this->model;

		if ( empty( $product ) ) {
			return;
		}

		$display_seo_meta = apply_filters( 'sc_display_instant_checkout_seo_meta', true, $product );
		if ( ! $display_seo_meta ) {
			return;
		}

		// render the seo meta. og:url must be the buy link — the mirrored post permalink can 404 for buy-link-only products.
		\SureCart::productSeo()->renderProductSeoMeta( $product, $product->checkout_permalink );
	}

	/**
	 * Add the JSON-LD schema for the product.
	 *
	 * @return void
	 */
	public function addProductJsonSchema(): void {
		$product = $this->model;

		if ( empty( $product ) ) {
			return;
		}

		$display_schema = apply_filters( 'sc_display_instant_checkout_json_ld_schema', true, $product );
		if ( ! $display_schema ) {
			return;
		}

		\SureCart::productSeo()->renderJsonSchema( $product );
	}
}
