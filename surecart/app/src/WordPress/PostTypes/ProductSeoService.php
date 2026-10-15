<?php

namespace SureCart\WordPress\PostTypes;

/**
 * Prints the product page's SEO meta tags and JSON-LD.
 */
class ProductSeoService {
	/**
	 * Builds the product JSON-LD.
	 *
	 * @var ProductJsonSchema
	 */
	protected $json_schema;

	/**
	 * Constructor.
	 *
	 * @param ProductJsonSchema $json_schema The JSON-LD builder.
	 */
	public function __construct( ProductJsonSchema $json_schema ) {
		$this->json_schema = $json_schema;
	}

	/**
	 * Bootstrap service.
	 *
	 * @return void
	 */
	public function bootstrap() {
		add_action( 'wp_head', array( $this, 'addProductJsonSchema' ), 10 );
		add_action( 'wp_head', array( $this, 'addProductSeoMeta' ), 10 );
	}

	/**
	 * Add the JSON-LD schema for the product.
	 *
	 * @return void
	 */
	public function addProductJsonSchema() {
		if ( ! is_singular( 'sc_product' ) ) {
			return;
		}

		$product = sc_get_product();

		if ( empty( $product ) ) {
			return;
		}

		$display_schema = apply_filters( 'sc_display_product_json_ld_schema', true, $product );
		if ( ! $display_schema ) {
			return;
		}

		$this->renderJsonSchema( $product );
	}

	/**
	 * Print the product's JSON-LD script tag.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return void
	 */
	public function renderJsonSchema( $product ) {
		$schema = $this->getJsonSchemaArray( $product );
		if ( empty( $schema ) ) {
			return;
		}
		?>
		<script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>
		<?php
	}

	/**
	 * Get the JSON-LD schema for the product.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 *
	 * @return array
	 */
	public function getJsonSchemaArray( $product ): array {
		return apply_filters( 'surecart/product/json_schema', $this->json_schema->get( $product ), $this->json_schema, $product );
	}

	/**
	 * Add SEO Meta Tags for the product.
	 *
	 * @return void
	 */
	public function addProductSeoMeta() {
		if ( ! is_singular( 'sc_product' ) ) {
			return;
		}

		$product = sc_get_product();

		if ( empty( $product ) ) {
			return;
		}

		$display_seo_meta = apply_filters( 'sc_display_product_seo_meta', true, $product );
		if ( ! $display_seo_meta ) {
			return;
		}

		$this->renderProductSeoMeta( $product );
	}

	/**
	 * Render the SEO meta tags for the product.
	 *
	 * @param \SureCart\Models\Product $product The product.
	 * @param string                   $permalink Optional. The canonical URL for og:url. Defaults to the product permalink.
	 *
	 * @return void
	 */
	public function renderProductSeoMeta( $product, $permalink = '' ) {
		$permalink         = ! empty( $permalink ) ? $permalink : $product->permalink;
		$image_attributes  = $product->featured_image ? $product->featured_image->attributes( apply_filters( 'surecart/og:image/size', 'full' ) ) : null;
		$product_image_url = $image_attributes ? ( $image_attributes->src ?? '' ) : '';
		?>

		<meta name="description" content="<?php echo esc_attr( sanitize_text_field( $product->meta_description ) ); ?>">
		<meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php echo esc_attr( $product->page_title ); ?>" />
		<meta property="og:description" content="<?php echo esc_attr( sanitize_text_field( $product->meta_description ) ); ?>" />
		<meta property="og:url" content="<?php echo esc_url( $permalink ); ?>" />
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="<?php echo esc_attr( $product->page_title ); ?>" />
		<meta name="twitter:description" content="<?php echo esc_attr( sanitize_text_field( $product->meta_description ) ); ?>" />

		<?php if ( ! empty( $product_image_url ) ) : ?>
		<meta property="og:image" content="<?php echo esc_url( $product_image_url ); ?>" />
		<meta name="twitter:image" content="<?php echo esc_url( $product_image_url ); ?>" />
		<?php endif; ?>

		<?php
	}
}
