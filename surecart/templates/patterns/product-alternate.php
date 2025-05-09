<?php
/**
 * Product Page with Image on Right block pattern.
 */
return [
	'title'      => __( 'Classic Product (Alternate)', 'surecart' ),
	'categories' => [ 'surecart_product_page' ],
	'blockTypes' => [ 'surecart/product-page' ],
	'priority'   => 1,
	'content'    => '<!-- wp:surecart/product-page {"metadata":{"categories":["surecart_product_page"],"patternName":"surecart-product-alternate","name":"Classic Product (Alternate)"},"align":"wide","layout":{"type":"constrained"}} -->
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"36%","style":{"spacing":{"blockGap":"0.75em"}}} -->
	<div class="wp-block-column" style="flex-basis:36%"><!-- wp:surecart/product-collection-tags -->
		<!-- wp:surecart/product-collection-tag /-->
		<!-- /wp:surecart/product-collection-tags -->

		<!-- wp:surecart/product-title {"style":{"typography":{"fontSize":"32px"},"spacing":{"margin":{"top":"10px","bottom":"10px"}}}} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group">
				<!-- wp:surecart/product-selected-price-scratch-amount {"style":{"typography":{"textDecoration":"line-through","fontSize":"24px","lineHeight":"1.5"},"color":{"text":"#686868"},"elements":{"link":{"color":{"text":"#686868"}}}}} /-->

				<!-- wp:surecart/product-selected-price-amount {"style":{"typography":{"fontSize":"24px","lineHeight":"1.5"}}} /-->

				<!-- wp:surecart/product-selected-price-interval {"style":{"typography":{"lineHeight":"2"}}} /-->

				<!-- wp:surecart/product-sale-badge {"style":{"border":{"radius":"15px"},"typography":{"fontSize":"12px","lineHeight":"2.1"},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
			<div class="wp-block-group"><!-- wp:surecart/product-selected-price-trial /-->

				<!-- wp:surecart/product-selected-price-fees /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:surecart/product-description /-->

		<!-- wp:surecart/product-variant-pills -->
		<!-- wp:surecart/product-variant-pill /-->
		<!-- /wp:surecart/product-variant-pills -->

		<!-- wp:surecart/product-price-chooser -->
		<!-- wp:surecart/product-price-choice-template {"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap","orientation":"horizontal"}} -->
		<!-- wp:surecart/price-name {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0px"},"layout":{"selfStretch":"fixed","flexSize":"50%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:surecart/price-scratch-amount {"style":{"typography":{"textDecoration":"line-through","fontStyle":"normal","fontWeight":"500"},"color":{"text":"#686868"}}} /-->

				<!-- wp:surecart/price-amount {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

				<!-- wp:surecart/price-interval {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:surecart/price-trial {"style":{"color":{"text":"#8a8a8a"},"elements":{"link":{"color":{"text":"#8a8a8a"}}}},"fontSize":"small"} /-->

			<!-- wp:surecart/price-setup-fee {"style":{"color":{"text":"#8a8a8a"},"elements":{"link":{"color":{"text":"#8a8a8a"}}}},"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:surecart/product-price-choice-template -->
		<!-- /wp:surecart/product-price-chooser -->

		<!-- wp:surecart/product-quantity /-->

		<!-- wp:surecart/product-selected-price-ad-hoc-amount /-->

		<!-- wp:surecart/product-buy-buttons {"style":{"spacing":{"blockGap":"5px"}}} -->
		<div class="wp-block-surecart-product-buy-buttons wp-block-buttons sc-block-buttons is-layout-flex">
			<!-- wp:surecart/product-buy-button {"add_to_cart":true,"text":"Add To Cart"} /-->

			<!-- wp:surecart/product-buy-button {"text":"Buy Now","className":"is-style-outline"} /-->
		</div>
		<!-- /wp:surecart/product-buy-buttons -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":""} -->
	<div class="wp-block-column"><!-- wp:surecart/product-media /--></div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- /wp:surecart/product-page -->
<!-- wp:group {"style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:40px"><!-- wp:post-content /--></div>
<!-- /wp:group -->
',
];
