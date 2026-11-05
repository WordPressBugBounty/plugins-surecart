<?php
/**
 * Contents of the product review confirmation template part.
 *
 * A PHP pattern so its text is translated; templates/parts/product-review-confirmation.html only references it.
 */
return [
	'title'    => __( 'Product Review Form', 'surecart' ),
	'inserter' => false,
	'content'  => '<!-- wp:surecart/product-review-form-close {"align":"right","style":{"spacing":{"margin":{"top":"0px","bottom":"-10px"}}}} /-->

<!-- wp:surecart/icon {"icon_name":"check-circle-2","size":32,"align":"center","style":{"elements":{"link":{"color":{"text":"#00824c"}}},"color":{"text":"#00824c"},"spacing":{"margin":{"top":"-20px"}}}} /-->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"1.5em","fontWeight":"600","fontStyle":"normal"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:1.5em;font-style:normal;font-weight:600">
	' . esc_html__( 'Thanks for your review!', 'surecart' ) . '
</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__( 'We are processing it and it will appear on the store soon.', 'surecart' ) . '</p>
<!-- /wp:paragraph -->',
];
