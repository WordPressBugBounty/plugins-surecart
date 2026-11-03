<?php
/**
 * Contents of the "Save to list" dialog template part.
 *
 * A PHP pattern so the heading is translated; the part (templates/parts/saved-items-dialog.html)
 * only references it, and the Site Editor inlines it when the part is customised.
 */
return [
	'title'    => __( 'Save to List Dialog', 'surecart' ),
	'inserter' => false,
	'content'  => '<!-- wp:group {"style":{"spacing":{"blockGap":"4px","padding":{"right":"32px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-right:32px">
	<!-- wp:heading {"style":{"typography":{"fontSize":"18px","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<h2 class="wp-block-heading" style="margin-top:0;margin-bottom:0;font-size:18px;line-height:1.3">' . esc_html__( 'Save to list', 'surecart' ) . '</h2>
	<!-- /wp:heading -->

	<!-- wp:surecart/saved-items-dialog-product-name {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
</div>
<!-- /wp:group -->

<!-- wp:surecart/saved-items-list-picker {"lock":{"remove":true}} /-->

<!-- wp:surecart/saved-items-new-list /-->',
];
