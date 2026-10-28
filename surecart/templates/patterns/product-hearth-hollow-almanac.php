<?php
/**
 * Product Page with The Hearth & Hollow Almanac block pattern.
 */
return [
	'title'      => __( 'The Hearth & Hollow Almanac', 'surecart' ),
	'categories' => [ 'surecart_product_page' ],
	'blockTypes' => [ 'surecart/product-page' ],
	'priority'   => 1,
	'content'    => '<!-- wp:surecart/product-page {"metadata":{"name":"The Hearth \\u0026 Hollow Almanac","categories":["surecart_product_page"],"patternName":"surecart-product-hearth-hollow-almanac"},"align":"full","layout":{"type":"constrained","contentSize":"1140px"}} -->
<!-- wp:group {"align":"full","style":{"color":{"background":"#F4EEE0"},"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#F4EEE0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"56px","right":"20px","bottom":"88px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group" style="padding-top:56px;padding-right:20px;padding-bottom:88px;padding-left:20px"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"64px","top":"32px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"52%","layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:52%"><!-- wp:surecart/product-media {"desktop_gallery":true,"className":"is-style-orbit"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"48%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:48%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"color":{"text":"#f4eee0","background":"#0f172a"},"elements":{"link":{"color":{"text":"#f4eee0"}}},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"}},"border":{"radius":{"topLeft":"100px","topRight":"100px","bottomLeft":"100px","bottomRight":"100px"}},"typography":{"fontSize":"12px","letterSpacing":"2px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}}} -->
<p class="has-text-color has-background has-link-color" style="border-top-left-radius:100px;border-top-right-radius:100px;border-bottom-left-radius:100px;border-bottom-right-radius:100px;color:#f4eee0;background-color:#0f172a;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;font-size:12px;font-style:normal;font-weight:600;letter-spacing:2px;line-height:1">INSTANT DOWNLOAD</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-title {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.02em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"top":"22px"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px","margin":{"top":"18px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-top:18px"><!-- wp:surecart/product-review-average-rating-stars {"fill_color":"#0f172a"} /-->

<!-- wp:surecart/product-review-total-rating {"style":{"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"top":"20px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"baseline"}} -->
<div class="wp-block-group" style="margin-top:20px"><!-- wp:surecart/product-selected-price-amount {"style":{"typography":{"fontSize":"34px","fontWeight":"600"},"color":{"text":"#0F172A"}}} /-->

<!-- wp:surecart/product-selected-price-scratch-amount {"style":{"typography":{"fontSize":"20px"},"color":{"text":"#6E6049"}}} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:14px">one-time purchase · yours forever</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","lineHeight":"1.6"},"color":{"text":"#2C2823"},"spacing":{"margin":{"top":"20px"}}}} -->
<p class="has-text-color" style="color:#2C2823;margin-top:20px;font-size:18px;line-height:1.6">A 184-page digital almanac of seasonal recipes, planting tables, lunar calendars and slow-living rituals for the year ahead. Read it on any device, or print it at home and bind it yourself.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"24px","bottom":"24px"}},"color":{"background":"#DDD2BB"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="margin-top:24px;margin-bottom:24px;background-color:#DDD2BB;color:#DDD2BB"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"blockGap":"18px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#0f172a"}}} -->
<p class="has-text-color" style="color:#0f172a;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">Qty</p>
<!-- /wp:paragraph -->

<!-- wp:surecart/product-quantity {"hidden_label":true,"className":"is-style-pebble","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}},"fontSize":"small"} -->
<!-- wp:surecart/product-quantity-control {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"color":"#ddd2bb","width":"1px"}}} -->
<!-- wp:surecart/product-quantity-input-decrease /-->

<!-- wp:surecart/product-quantity-input {"style":{"color":{"background":"#ffffff00"}},"fontSize":"small"} /-->

<!-- wp:surecart/product-quantity-input-increase /-->
<!-- /wp:surecart/product-quantity-control -->
<!-- /wp:surecart/product-quantity --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-selected-price-ad-hoc-amount {"style":{"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} /-->

<!-- wp:surecart/product-buy-buttons {"style":{"spacing":{"blockGap":"14px","margin":{"top":"22px","bottom":"4px"}}}} -->
<div class="wp-block-surecart-product-buy-buttons wp-block-buttons sc-block-buttons is-layout-flex" style="margin-top:22px;margin-bottom:4px"><!-- wp:surecart/product-buy-button {"add_to_cart":true,"text":' . wp_json_encode( __( 'Add to Cart', 'surecart' ) ) . ',"style":{"elements":{"link":{"color":{"text":"#f4eee0"}}},"color":{"background":"#0f172a","text":"#f4eee0"},"border":{"color":"#0f172a"}}} /-->

<!-- wp:surecart/product-buy-button {"text":' . wp_json_encode( __( 'Buy Now', 'surecart' ) ) . ',"className":"is-style-outline","style":{"color":{"text":"#0f172a","background":"#ffffff00"},"elements":{"link":{"color":{"text":"#0f172a"}}},"border":{"color":"#0f172a","width":"2px"}}} /--></div>
<!-- /wp:surecart/product-buy-buttons -->

<!-- wp:group {"style":{"spacing":{"blockGap":"28px","margin":{"top":"22px"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-top:22px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/check"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:14px">Instant download</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/envelope"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:14px">Link sent to your inbox</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/shield"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:14px">Secure checkout</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Product Content"},"style":{"color":{"text":"#2C2823"},"spacing":{"padding":{"top":"0px","right":"20px","bottom":"48px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group has-text-color" style="color:#2C2823;padding-top:0px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:post-content {"align":"full","layout":{"type":"constrained","contentSize":"720px"}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"88px","right":"20px","bottom":"88px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:88px;padding-right:20px;padding-bottom:88px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:10px;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">Five files · one download</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.03em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"40px","top":"0"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0F172A;margin-top:0;margin-bottom:40px;font-size:38px;font-weight:600;letter-spacing:0.03em;line-height:1.05;text-transform:uppercase">What\'s inside</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"18px","bottom":"18px"},"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:18px;padding-bottom:18px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"},"color":{"text":"#2C2823"}}} -->
<p class="has-text-color" style="color:#2C2823;font-size:17px">The full 2026 Almanac</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontFamily":"ui-monospace, monospace"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-family:ui-monospace, monospace;font-size:13px">almanac-2026.pdf · 184 pages · 96 MB</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"18px","bottom":"18px"},"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:18px;padding-bottom:18px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"},"color":{"text":"#2C2823"}}} -->
<p class="has-text-color" style="color:#2C2823;font-size:17px">Lunar planting calendar</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontFamily":"ui-monospace, monospace"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-family:ui-monospace, monospace;font-size:13px">lunar-calendar.pdf · 12 pages · 8 MB</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"18px","bottom":"18px"},"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:18px;padding-bottom:18px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"},"color":{"text":"#2C2823"}}} -->
<p class="has-text-color" style="color:#2C2823;font-size:17px">Seasonal recipe cards, print-ready</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontFamily":"ui-monospace, monospace"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-family:ui-monospace, monospace;font-size:13px">recipe-cards.pdf · 24 cards · 14 MB</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"18px","bottom":"18px"},"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:18px;padding-bottom:18px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"},"color":{"text":"#2C2823"}}} -->
<p class="has-text-color" style="color:#2C2823;font-size:17px">Pantry label sheets</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontFamily":"ui-monospace, monospace"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-family:ui-monospace, monospace;font-size:13px">pantry-labels.pdf · 6 sheets · 4 MB</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"},"bottom":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"18px","bottom":"18px"},"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;border-bottom-color:#DDD2BB;border-bottom-width:1px;padding-top:18px;padding-bottom:18px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published"} /-->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"},"color":{"text":"#2C2823"}}} -->
<p class="has-text-color" style="color:#2C2823;font-size:17px">Desktop &amp; phone wallpapers</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontFamily":"ui-monospace, monospace"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-family:ui-monospace, monospace;font-size:13px">wallpapers.zip · 8 images · 22 MB</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"88px","right":"20px","bottom":"88px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:88px;padding-right:20px;padding-bottom:88px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"9px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:9px;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">From hearth to hand</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.03em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"48px","top":"0"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0F172A;margin-top:0;margin-bottom:48px;font-size:38px;font-weight:600;letter-spacing:0.03em;line-height:1.05;text-transform:uppercase">How it works</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"300px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"31%"},"border":{"top":{"color":"#0F172A","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:#0F172A;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"44px","fontWeight":"600"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:14px;font-size:44px;font-weight:600">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px","fontWeight":"600","lineHeight":"1.2","letterSpacing":"0.05em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0F172A;margin-bottom:10px;font-size:22px;font-weight:600;letter-spacing:0.05em;line-height:1.2;text-transform:uppercase">Check out securely</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.6"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:15px;line-height:1.6">Pay once with card, Apple Pay or Google Pay. No subscription, no account required.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"31%"},"border":{"top":{"color":"#0F172A","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:#0F172A;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"44px","fontWeight":"600"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:14px;font-size:44px;font-weight:600">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px","fontWeight":"600","lineHeight":"1.2","letterSpacing":"0.05em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0F172A;margin-bottom:10px;font-size:22px;font-weight:600;letter-spacing:0.05em;line-height:1.2;text-transform:uppercase">Open your inbox</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.6"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:15px;line-height:1.6">Your download link arrives instantly by email, and on the order confirmation page.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"31%"},"border":{"top":{"color":"#0F172A","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="border-top-color:#0F172A;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"44px","fontWeight":"600"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:14px;font-size:44px;font-weight:600">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px","fontWeight":"600","lineHeight":"1.2","letterSpacing":"0.05em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0F172A;margin-bottom:10px;font-size:22px;font-weight:600;letter-spacing:0.05em;line-height:1.2;text-transform:uppercase">Read or print anywhere</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"15px","lineHeight":"1.6"},"color":{"text":"#6E6049"}}} -->
<p class="has-text-color" style="color:#6E6049;font-size:15px;line-height:1.6">PDFs are sized for screens and US Letter / A4 printing. Keep them forever, re-download anytime.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#EAE1CC"},"border":{"top":{"color":"#DDD2BB","width":"0px","style":"none"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}},"spacing":{"padding":{"top":"88px","right":"20px","bottom":"88px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group alignfull has-background" style="border-top-color:#DDD2BB;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;background-color:#EAE1CC;padding-top:88px;padding-right:20px;padding-bottom:88px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:10px;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">From the hearth</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.03em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"40px","top":"0"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0F172A;margin-top:0;margin-bottom:40px;font-size:38px;font-weight:600;letter-spacing:0.03em;line-height:1.05;text-transform:uppercase">Reader reviews</h2>
<!-- /wp:heading -->

<!-- wp:surecart/product-review-list -->
<!-- wp:surecart/product-reviews -->
<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"32px","left":"100px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"38%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:38%"><!-- wp:surecart/product-review-summary -->
<!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"bottom":"16px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-bottom:16px"><!-- wp:surecart/product-review-average-rating-stars {"fill_color":"#0f172a"} /-->

<!-- wp:surecart/product-review-average-rating-value /-->

<!-- wp:surecart/product-review-total-rating /--></div>
<!-- /wp:group -->

<!-- wp:surecart/product-review-breakdown {"fill_color":"#0f172a"} /-->
<!-- /wp:surecart/product-review-summary --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"62%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:62%"><!-- wp:surecart/product-review-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<!-- wp:surecart/product-review-reviewer-name {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}}} /-->

<!-- wp:surecart/product-review-verified-badge /-->

<!-- wp:surecart/product-review-date {"datetime":"2026-06-11T04:12:46.179Z","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}}} /-->

<!-- wp:surecart/product-review-rating-stars {"fill_color":"#0f172a","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20"}}}} /-->

<!-- wp:surecart/product-review-content /-->
<!-- /wp:surecart/product-review-template --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:surecart/product-reviews -->
<!-- /wp:surecart/product-review-list -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"48px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:48px"><!-- wp:surecart/product-review-add-button {"style":{"elements":{"link":{"color":{"text":"#f4eee0"}}},"color":{"background":"#0f172a","text":"#f4eee0"},"border":{"color":"#0f172a"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"88px","right":"20px","bottom":"88px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group" style="border-style:none;border-width:0px;padding-top:88px;padding-right:20px;padding-bottom:88px;padding-left:20px"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"56px","top":"32px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"32%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:32%"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:10px;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">Good to know</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.03em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0F172A;margin-top:0;margin-bottom:0;font-size:38px;font-weight:600;letter-spacing:0.03em;line-height:1.05;text-transform:uppercase">Questions, answered</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"68%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:68%"><!-- wp:details {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"20px","bottom":"0px"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} -->
<details class="wp-block-details has-text-color has-link-color" style="border-top-color:#DDD2BB;border-top-width:1px;color:#0f172a;padding-top:20px;padding-bottom:0px"><summary>What format are the files?</summary><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"color":{"text":"#6E6049"},"spacing":{"margin":{"top":"10px","bottom":"0","left":"0","right":"0"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0;font-size:16px;line-height:1.6">Everything arrives as print-ready PDFs plus one ZIP of wallpapers. They open on any phone, tablet, e-reader or computer — no special software needed.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"20px","bottom":"0px"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} -->
<details class="wp-block-details has-text-color has-link-color" style="border-top-color:#DDD2BB;border-top-width:1px;color:#0f172a;padding-top:20px;padding-bottom:0px"><summary>When do I get access?</summary><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"color":{"text":"#6E6049"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"10px","bottom":"0","left":"0","right":"0"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:16px;line-height:1.6">Immediately. Your download link appears on the order confirmation page and is also emailed to you, so you can come back to it anytime.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"20px","bottom":"0px"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} -->
<details class="wp-block-details has-text-color has-link-color" style="border-top-color:#DDD2BB;border-top-width:1px;color:#0f172a;padding-top:20px;padding-bottom:0px"><summary>Can I print it at home?</summary><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"color":{"text":"#6E6049"},"spacing":{"margin":{"top":"10px","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-top:10px;margin-bottom:0;font-size:16px;line-height:1.6">Yes — every page is sized for both US Letter and A4. The recipe cards and pantry labels are laid out for standard home printers.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"20px","bottom":"0px"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} -->
<details class="wp-block-details has-text-color has-link-color" style="border-top-color:#DDD2BB;border-top-width:1px;color:#0f172a;padding-top:20px;padding-bottom:0px"><summary>Will I get next year\'s edition?</summary><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"color":{"text":"#6E6049"},"spacing":{"margin":{"top":"10px","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-top:10px;margin-bottom:0;font-size:16px;line-height:1.6">This is the 2026 edition. Owners receive an early-bird discount on each new yearly edition — we\'ll write to you when it\'s ready.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"},"bottom":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"20px","bottom":"20px"}},"color":{"text":"#0f172a"},"elements":{"link":{"color":{"text":"#0f172a"}}}}} -->
<details class="wp-block-details has-text-color has-link-color" style="border-top-color:#DDD2BB;border-top-width:1px;border-bottom-color:#DDD2BB;border-bottom-width:1px;color:#0f172a;padding-top:20px;padding-bottom:20px"><summary>What if it isn\'t for me?</summary><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"color":{"text":"#6E6049"},"spacing":{"margin":{"right":"0","left":"0","top":"10px","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0;font-size:16px;line-height:1.6">Write to us within 14 days and we\'ll make it right — a friendly, no-fuss guarantee, even on digital goods.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#DDD2BB","width":"1px"}},"spacing":{"padding":{"top":"88px","right":"20px","bottom":"96px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"1140px"}} -->
<div class="wp-block-group" style="border-top-color:#DDD2BB;border-top-width:1px;padding-top:88px;padding-right:20px;padding-bottom:96px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.22em","textTransform":"uppercase"},"color":{"text":"#6E6049"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-color" style="color:#6E6049;margin-bottom:10px;font-size:13px;font-weight:600;letter-spacing:0.22em;text-transform:uppercase">More from the hollow</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"38px","fontWeight":"600","lineHeight":"1.05","letterSpacing":"0.03em","textTransform":"uppercase"},"color":{"text":"#0F172A"},"spacing":{"margin":{"bottom":"48px","top":"0"}}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0F172A;margin-top:0;margin-bottom:48px;font-size:38px;font-weight:600;letter-spacing:0.03em;line-height:1.05;text-transform:uppercase">You may also like</h2>
<!-- /wp:heading -->

<!-- wp:surecart/product-list-related {"limit":null} -->
<!-- wp:surecart/product-template {"layout":{"type":"grid","columnCount":4}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"isDark":false,"style":{"dimensions":{"aspectRatio":"4/5"},"spacing":{"margin":{"bottom":"4px"}},"border":{"radius":"6px"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light" style="border-radius:6px;margin-bottom:4px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"></div></div>
<!-- /wp:cover -->

<!-- wp:surecart/product-title {"level":3,"style":{"typography":{"fontSize":"16px","fontWeight":"500","lineHeight":"1.3"},"color":{"text":"#2C2823"}}} /-->

<!-- wp:surecart/product-selected-price-amount {"style":{"color":{"text":"#6E6049"},"typography":{"fontSize":"16px","fontFamily":"ui-monospace, monospace"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-template -->
<!-- /wp:surecart/product-list-related --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-page -->',
];
