<?php
/**
 * Product Page with Solstice Studio Design System block pattern.
 */
return [
	'title'      => __( 'Solstice Studio Design System', 'surecart' ),
	'categories' => [ 'surecart_product_page' ],
	'blockTypes' => [ 'surecart/product-page' ],
	'priority'   => 1,
	'content'    => '<!-- wp:surecart/product-page {"metadata":{"name":"Solstice Studio Design System","categories":["surecart_product_page"],"patternName":"surecart-product-solstice-studio-design-system"},"align":"full","layout":{"type":"constrained","contentSize":"1160px"}} -->
<!-- wp:group {"align":"full","style":{"color":{"background":"#0B1220"},"spacing":{"padding":{"top":"72px","right":"32px","bottom":"88px","left":"32px"}}},"layout":{"type":"constrained","contentSize":"1160px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#0B1220;padding-top:72px;padding-right:32px;padding-bottom:88px;padding-left:32px"><!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"left":"72px","top":"48px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"52%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:52%"><!-- wp:surecart/product-media {"thumbnails_per_page":4} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"48%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:48%"><!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#0EA5E9","text":"#ffffff"},"border":{"radius":"999px"},"spacing":{"padding":{"top":"7px","right":"14px","bottom":"7px","left":"14px"}},"elements":{"link":{"color":{"text":"#ffffff"}}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-text-color has-background has-link-color" style="border-radius:999px;color:#ffffff;background-color:#0EA5E9;padding-top:7px;padding-right:14px;padding-bottom:7px;padding-left:14px"><!-- wp:paragraph {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.12em","textTransform":"uppercase","fontStyle":"normal"}}} -->
<p class="has-text-color" style="color:#0B1220;font-size:12px;font-style:normal;font-weight:600;letter-spacing:0.12em;text-transform:uppercase">Instant download</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-title {"style":{"color":{"text":"#F7F9FC"},"typography":{"fontSize":"58px","fontWeight":"400","letterSpacing":"-0.01em","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:surecart/product-review-average-rating-stars {"fill_color":"#0ea5e9"} /-->

<!-- wp:surecart/product-review-total-rating {"style":{"elements":{"link":{"color":{"text":"#ffffff"}}},"color":{"text":"#ffffff"}}} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"18px","lineHeight":"1.6","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#93A0B8;font-family:\'Archivo\', sans-serif;font-size:18px;line-height:1.6">A complete, token-driven design system for product teams — 240 components, 64 page templates, and the documentation to ship with them. Built in Figma, exportable everywhere.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"14px","margin":{"bottom":"20px"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-bottom:20px"><!-- wp:surecart/product-selected-price-amount {"style":{"color":{"text":"#F7F9FC"},"typography":{"fontSize":"44px","lineHeight":"1","fontFamily":"\'Instrument Serif\', serif"}}} /-->

<!-- wp:surecart/product-selected-price-scratch-amount {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"22px","textDecoration":"line-through","fontFamily":"\'Archivo\', sans-serif"}}} /-->

<!-- wp:paragraph {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"14px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#93A0B8;font-family:\'Archivo\', sans-serif;font-size:14px">one-time · lifetime license</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-selected-price-ad-hoc-amount {"style":{"elements":{"link":{"color":{"text":"#ffffff"}}}},"textColor":"white"} /-->

<!-- wp:surecart/product-buy-buttons -->
<div class="wp-block-surecart-product-buy-buttons wp-block-buttons sc-block-buttons is-layout-flex"><!-- wp:surecart/product-buy-button {"add_to_cart":true,"text":' . wp_json_encode( __( 'Buy and Download', 'surecart' ) ) . ',"style":{"color":{"background":"#0ea5e9","text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}, "border":{"color":"#0ea5e9"}}} /--></div>
<!-- /wp:surecart/product-buy-buttons -->

<!-- wp:group {"style":{"spacing":{"blockGap":"26px","margin":{"top":"10px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:10px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/shield","style":{"dimensions":{"width":"16px"},"color":{"text":"#0EA5E9"}}} /-->

<!-- wp:paragraph {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"14px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#93A0B8;font-family:\'Archivo\', sans-serif;font-size:14px">Secure checkout</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/envelope","style":{"dimensions":{"width":"16px"},"color":{"text":"#0EA5E9"}}} /-->

<!-- wp:paragraph {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"14px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#93A0B8;font-family:\'Archivo\', sans-serif;font-size:14px">Instant email delivery</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/published","style":{"dimensions":{"width":"16px"},"color":{"text":"#0EA5E9"}}} /-->

<!-- wp:paragraph {"style":{"color":{"text":"#93A0B8"},"typography":{"fontSize":"14px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#93A0B8;font-family:\'Archivo\', sans-serif;font-size:14px">14-day guarantee</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Product Content"},"align":"full","style":{"color":{"background":"#ffffff","text":"#0B1220"},"spacing":{"padding":{"top":"56px","right":"32px","bottom":"56px","left":"32px"}}},"layout":{"type":"constrained","contentSize":"1160px"}} -->
<div class="wp-block-group alignfull has-text-color has-background" style="color:#0B1220;background-color:#ffffff;padding-top:56px;padding-right:32px;padding-bottom:56px;padding-left:32px"><!-- wp:post-content {"align":"full","layout":{"type":"constrained","contentSize":"760px"}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#FCFCFD"},"spacing":{"padding":{"top":"96px","right":"32px","bottom":"96px","left":"32px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1160px"},"anchor":"features"} -->
<div class="wp-block-group alignfull has-background" id="features" style="background-color:#FCFCFD;margin-top:0;margin-bottom:0;padding-top:96px;padding-right:32px;padding-bottom:96px;padding-left:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"56px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:56px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"13px","fontWeight":"700","letterSpacing":"0.14em","textTransform":"uppercase","fontStyle":"normal"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-size:13px;font-style:normal;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">What\'s inside</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"46px","fontWeight":"400","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:46px;font-weight:400;line-height:1.05">Everything a product team ships with</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"18px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:18px">Solstice is the working system behind dozens of shipped products — organized so you spend your first hour designing, not untangling layers.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"360px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/block-default","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">240+ components</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Every primitive and pattern a product needs — inputs, tables, navigation, overlays — wired with variants and auto-layout.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/shield","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">Lifetime license</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">One payment covers unlimited personal and client projects, forever. No seats, no renewals, no per-project fees.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/published","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">Free updates</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Every 3.x release is included automatically. Update notes ship with each version so you know exactly what changed.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/envelope","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">Instant delivery</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Your download link appears on the confirmation screen and in your inbox seconds after checkout. Re-download anytime.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/people","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">Team-ready</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Share the file with up to 10 editors under one license. Naming and structure are consistent enough for day-one handoff.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"color":{"background":"#FCFCFD"},"border":{"color":"#DEE4ED","width":"1px","style":"solid","radius":"10px"},"spacing":{"padding":{"top":"28px","right":"26px","bottom":"28px","left":"26px"},"blockGap":"12px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-border-color has-background" style="border-color:#DEE4ED;border-style:solid;border-width:1px;border-radius:10px;background-color:#FCFCFD;padding-top:28px;padding-right:26px;padding-bottom:28px;padding-left:26px"><!-- wp:group {"style":{"color":{"background":"#E4F4FD"},"border":{"radius":"9px"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background" style="border-radius:9px;background-color:#E4F4FD;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:icon {"icon":"core/comment","style":{"dimensions":{"width":"22px"},"color":{"text":"#0B7CB8"}}} /--></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"24px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:24px;font-weight:400;line-height:1.1">Priority support</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Twelve months of email support with replies inside one business day, from the designers who built the kit.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"18px","margin":{"top":"80px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-top:80px"><!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"30px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:30px;font-weight:400;line-height:1.1">Specifications</h3>
<!-- /wp:heading -->

<!-- wp:table {"className":"is-style-stripes","style":{"border":{"color":"#f0f0f0","width":"1px"},"layout":{"selfStretch":"fit","flexSize":null},"typography":{"fontSize":"16px"}},"backgroundColor":"base"} -->
<figure class="wp-block-table is-style-stripes" style="font-size:16px"><table class="has-base-background-color has-background has-border-color has-fixed-layout" style="border-color:#f0f0f0;border-width:1px"><tbody><tr><th class="has-text-align-left" data-align="left" scope="row">Format</th><td class="has-text-align-left" data-align="left">Figma file (.fig), W3C design-token JSON, PDF documentation</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">Components</th><td class="has-text-align-left" data-align="left">240 components · 1,180 variants · 8 density modes</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">Templates</th><td class="has-text-align-left" data-align="left">64 page templates across marketing, app, and commerce</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">File size</th><td class="has-text-align-left" data-align="left">1.4 GB zipped · 2.1 GB unpacked</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">Version</th><td class="has-text-align-left" data-align="left">3.2 (June 2026) — full changelog included</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">Compatibility</th><td class="has-text-align-left" data-align="left">Figma free &amp; professional plans; tokens work with any build pipeline</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">License</th><td class="has-text-align-left" data-align="left">Lifetime commercial license · unlimited projects · up to 10 editors</td></tr><tr><th class="has-text-align-left" data-align="left" scope="row">Included files</th><td class="has-text-align-left" data-align="left">solstice.fig · tokens.json · docs.pdf · icons.zip · changelog.md</td></tr></tbody></table></figure>
<!-- /wp:table --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#F1F4F8"},"spacing":{"padding":{"top":"96px","right":"32px","bottom":"96px","left":"32px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1160px"},"anchor":"how-it-works"} -->
<div class="wp-block-group alignfull has-background" id="how-it-works" style="background-color:#F1F4F8;margin-top:0;margin-bottom:0;padding-top:96px;padding-right:32px;padding-bottom:96px;padding-left:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"56px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:56px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"13px","fontWeight":"700","letterSpacing":"0.14em","textTransform":"uppercase","fontStyle":"normal"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-size:13px;font-style:normal;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">How it works</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"46px","fontWeight":"400","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:46px;font-weight:400;line-height:1.05">From checkout to canvas in minutes</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"330px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"top":{"color":"#0B1220","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"10px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="border-top-color:#0B1220;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"56px","lineHeight":"1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-family:\'Instrument Serif\', serif;font-size:56px;line-height:1">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"26px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:26px;font-weight:400;line-height:1.1">Buy securely</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Checkout takes under a minute. Cards, Apple Pay, and Google Pay are all accepted.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#0B1220","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"10px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="border-top-color:#0B1220;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"56px","lineHeight":"1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-family:\'Instrument Serif\', serif;font-size:56px;line-height:1">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"26px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:26px;font-weight:400;line-height:1.1">Download instantly</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Your link is on the confirmation screen and in your inbox. Re-download anytime from your account.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"color":"#0B1220","width":"2px"}},"spacing":{"padding":{"top":"22px"},"blockGap":"10px"},"layout":{"selfStretch":"fixed","flexSize":"31%"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="border-top-color:#0B1220;border-top-width:2px;padding-top:22px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"56px","lineHeight":"1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-family:\'Instrument Serif\', serif;font-size:56px;line-height:1">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"26px","fontWeight":"400","lineHeight":"1.1","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:26px;font-weight:400;line-height:1.1">Start designing</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"15px","fontFamily":"\'Archivo\', sans-serif"}}} -->
<p class="has-text-color" style="color:#5B6478;font-family:\'Archivo\', sans-serif;font-size:15px">Open the file in Figma, point the tokens at your brand, and ship your first screen today.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#FCFCFD"},"spacing":{"padding":{"top":"96px","right":"32px","bottom":"96px","left":"32px"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1160px"},"anchor":"reviews"} -->
<div class="wp-block-group alignfull has-background" id="reviews" style="background-color:#FCFCFD;margin-top:0;margin-bottom:0;padding-top:96px;padding-right:32px;padding-bottom:96px;padding-left:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"40px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:40px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"13px","fontWeight":"700","letterSpacing":"0.14em","textTransform":"uppercase","fontStyle":"normal"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-size:13px;font-style:normal;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">Reviews</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"46px","fontWeight":"400","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:46px;font-weight:400;line-height:1.05">Trusted by working teams</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-review-list -->
<!-- wp:heading {"className":"wp-block-heading","style":{"spacing":{"margin":{"top":"32px","bottom":"32px"}},"typography":{"lineHeight":"1"}}} -->
<h2 class="wp-block-heading" style="margin-top:32px;margin-bottom:32px;line-height:1">Customer Reviews</h2>
<!-- /wp:heading -->

<!-- wp:surecart/product-reviews -->
<!-- wp:surecart/product-review-summary {"style":{"spacing":{"margin":{"bottom":"15px"}}}} -->
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"20px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"280px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:280px"><!-- wp:group {"style":{"spacing":{"blockGap":"14px","padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"5px","padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:surecart/product-review-average-rating-value {"className":"is-style-none","style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1","fontSize":"24px"}}} /-->

<!-- wp:paragraph {"metadata":{"name":"/ 5.0"},"style":{"typography":{"lineHeight":"1.5","fontSize":"14px"},"color":{"text":"#4b5563"},"elements":{"link":{"color":{"text":"#4b5563"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-color has-link-color" style="color:#4b5563;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px;line-height:1.5">/ 5.0</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-review-average-rating-stars {"fill_color":"#0ea5e9"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:paragraph {"metadata":{"name":"Based on"},"style":{"typography":{"fontSize":"14px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<p style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px">Based on</p>
<!-- /wp:paragraph -->

<!-- wp:surecart/product-review-total-rating {"link_to_reviews":false,"className":"is-style-default","style":{"spacing":{"blockGap":"4px","margin":{"right":"0","left":"0"},"padding":{"right":"0","left":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:surecart/product-review-breakdown {"columns":2,"fill_color":"#0ea5e9","bar_fill_color":"#0ea5e9","bar_background_color":"#c7ecfd","className":"is-style-default","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal","verticalAlignment":"center"}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:surecart/product-review-summary -->

<!-- wp:group {"metadata":{"name":"Header"},"style":{"spacing":{"margin":{"bottom":"10px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-bottom:10px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:surecart/product-review-list-sidebar-toggle {"label":' . wp_json_encode( __( 'Filters', 'surecart' ) ) . '} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:surecart/product-review-list-sidebar {"style":{"layout":{"selfStretch":"fixed","flexSize":"225px"},"position":{"type":"sticky","top":"0px"},"spacing":{"blockGap":"30px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<!-- wp:surecart/product-review-list-filter-tags {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<!-- wp:surecart/product-review-list-filter-tags-label {"style":{"typography":{"fontWeight":"700","fontStyle":"normal","fontSize":"16px"}}} /-->

<!-- wp:surecart/product-review-list-filter-tags-template {"style":{"spacing":{"blockGap":"8px"},"typography":{"fontSize":"16px"}},"layout":{"type":"flex","orientation":"horizontal"}} -->
<!-- wp:surecart/product-review-list-filter-tag {"style":{"typography":{"fontSize":"14px"}}} /-->
<!-- /wp:surecart/product-review-list-filter-tags-template -->

<!-- wp:surecart/product-review-list-filter-tags-clear-all {"style":{"typography":{"textDecoration":"underline","fontWeight":"700","fontStyle":"normal"}},"fontSize":"small"} /-->
<!-- /wp:surecart/product-review-list-filter-tags -->

<!-- wp:surecart/product-review-list-filter-checkboxes {"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"8px"}}} -->
<!-- wp:surecart/product-review-list-filter-checkboxes-label {"style":{"typography":{"fontWeight":"700","fontStyle":"normal","fontSize":"16px"}}} /-->

<!-- wp:surecart/product-review-list-filter-checkboxes-template {"style":{"spacing":{"blockGap":"6px","margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"16px"}}} -->
<!-- wp:surecart/product-review-list-filter-checkbox {"style":{"typography":{"fontSize":"16px"}}} /-->
<!-- /wp:surecart/product-review-list-filter-checkboxes-template -->
<!-- /wp:surecart/product-review-list-filter-checkboxes -->
<!-- /wp:surecart/product-review-list-sidebar -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:surecart/product-review-template {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"8px","padding":{"top":"24px","bottom":"24px","right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"#e5e7eb","width":"1px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="border-bottom-color:#e5e7eb;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:24px;padding-right:0px;padding-bottom:24px;padding-left:0px"><!-- wp:group {"className":"sc-review-header-group","style":{"spacing":{"margin":{"top":"0","bottom":"16px"},"padding":{"right":"0px","left":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group sc-review-header-group" style="margin-top:0;margin-bottom:16px;padding-right:0px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px","padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:surecart/product-review-reviewer-name {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"right":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"500","fontSize":"16px"}}} /-->

<!-- wp:surecart/product-review-verified-badge {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"16px"},"spacing":{"blockGap":"4px"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center","orientation":"horizontal"}} /--></div>
<!-- /wp:group -->

<!-- wp:surecart/product-review-date {"datetime":"2026-01-01T09:37:00.225Z","format":"human-diff","style":{"typography":{"fontSize":"14px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:surecart/product-review-rating-stars {"fill_color":"#0ea5e9","style":{"spacing":{"margin":{"bottom":"16px"}}}} /-->

<!-- wp:surecart/product-review-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"18px"},"spacing":{"margin":{"bottom":"8px"}}}} /-->

<!-- wp:surecart/product-review-content {"style":{"typography":{"fontSize":"16px"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-review-template -->

<!-- wp:surecart/product-review-pagination {"style":{"spacing":{"margin":{"top":"30px","bottom":"30px"}}}} -->
<!-- wp:surecart/product-review-pagination-previous {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->

<!-- wp:surecart/product-review-pagination-numbers {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->

<!-- wp:surecart/product-review-pagination-next {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->
<!-- /wp:surecart/product-review-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-reviews -->

<!-- wp:surecart/product-review-list-no-reviews -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no reviews.","style":{"typography":{"textAlign":"left"}}} -->
<p class="has-text-align-left">' . esc_html__( 'No reviews yet.', 'surecart' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0px;padding-left:0px"><!-- wp:surecart/product-review-add-button {"width":100,"className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"#ffffff"}}},"color":{"background":"#0ea5e9","text":"#ffffff"},"border":{"color":"#0ea5e9"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-review-list-no-reviews -->
<!-- /wp:surecart/product-review-list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#F1F4F8"},"spacing":{"padding":{"top":"96px","right":"32px","bottom":"96px","left":"32px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1160px"},"anchor":"faq"} -->
<div class="wp-block-group alignfull has-background" id="faq" style="background-color:#F1F4F8;margin-top:0;margin-bottom:0;padding-top:96px;padding-right:32px;padding-bottom:96px;padding-left:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"56px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-bottom:56px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"13px","fontWeight":"700","letterSpacing":"0.14em","textTransform":"uppercase","fontStyle":"normal"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-size:13px;font-style:normal;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">FAQ</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"46px","fontWeight":"400","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:46px;font-weight:400;line-height:1.05">Before you buy</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group"><!-- wp:details {"style":{"border":{"top":{"color":"#DEE4ED","width":"1px"},"bottom":{"color":"#DEE4ED","width":"1px"}},"spacing":{"padding":{"top":"24px","bottom":"24px"}}}} -->
<details class="wp-block-details" style="border-top-color:#DEE4ED;border-top-width:1px;border-bottom-color:#DEE4ED;border-bottom-width:1px;padding-top:24px;padding-bottom:24px"><summary>What exactly do I get when I buy?</summary><!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"16px","fontFamily":"\'Archivo\', sans-serif"},"spacing":{"margin":{"top":"20px","bottom":"0px"}}}} -->
<p class="has-text-color" style="color:#5B6478;margin-top:20px;margin-bottom:0px;font-family:\'Archivo\', sans-serif;font-size:16px">A ZIP containing the full Figma file, a W3C-format design-token JSON, PDF documentation, the icon library, and a changelog. The download link appears immediately after checkout and is emailed to you.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"#DEE4ED","width":"1px"}},"spacing":{"padding":{"top":"24px","bottom":"24px"}}}} -->
<details class="wp-block-details" style="border-bottom-color:#DEE4ED;border-bottom-width:1px;padding-top:24px;padding-bottom:24px"><summary>Can I use it for client work?</summary><!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"16px","fontFamily":"\'Archivo\', sans-serif"},"spacing":{"margin":{"top":"20px","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#5B6478;margin-top:20px;margin-bottom:0;font-family:\'Archivo\', sans-serif;font-size:16px">Yes — the lifetime license covers unlimited personal and client projects. The only thing it doesn\'t allow is reselling or redistributing the kit files themselves.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"#DEE4ED","width":"1px"}},"spacing":{"padding":{"top":"24px","bottom":"24px"}}}} -->
<details class="wp-block-details" style="border-bottom-color:#DEE4ED;border-bottom-width:1px;padding-top:24px;padding-bottom:24px"><summary>Do I get future updates?</summary><!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"16px","fontFamily":"\'Archivo\', sans-serif"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"20px","bottom":"0","left":"0","right":"0"}}}} -->
<p class="has-text-color" style="color:#5B6478;margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-family:\'Archivo\', sans-serif;font-size:16px">Every 3.x release is included free. When an update ships, you\'ll get an email and the new files appear in your account downloads automatically.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"#DEE4ED","width":"1px"}},"spacing":{"padding":{"top":"24px","bottom":"24px"}}}} -->
<details class="wp-block-details" style="border-bottom-color:#DEE4ED;border-bottom-width:1px;padding-top:24px;padding-bottom:24px"><summary>What software do I need?</summary><!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"16px","fontFamily":"\'Archivo\', sans-serif"},"spacing":{"margin":{"top":"20px","bottom":"0","left":"0","right":"0"}}}} -->
<p class="has-text-color" style="color:#5B6478;margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0;font-family:\'Archivo\', sans-serif;font-size:16px">Figma, on any plan including free. The token JSON is tool-agnostic and works with Style Dictionary, Tokens Studio, or any custom pipeline.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"style":{"border":{"bottom":{"color":"#DEE4ED","width":"1px"}},"spacing":{"padding":{"top":"24px","bottom":"24px"}}}} -->
<details class="wp-block-details" style="border-bottom-color:#DEE4ED;border-bottom-width:1px;padding-top:24px;padding-bottom:24px"><summary>What\'s the refund policy?</summary><!-- wp:paragraph {"style":{"color":{"text":"#5B6478"},"typography":{"fontSize":"16px","fontFamily":"\'Archivo\', sans-serif"},"spacing":{"margin":{"top":"20px","bottom":"0","left":"0","right":"0"}}}} -->
<p class="has-text-color" style="color:#5B6478;margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0;font-family:\'Archivo\', sans-serif;font-size:16px">14-day money-back guarantee, no questions asked. Email support with your order number and we\'ll process it within one business day.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#FCFCFD"},"spacing":{"padding":{"top":"96px","right":"32px","bottom":"96px","left":"32px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1160px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#FCFCFD;margin-top:0;margin-bottom:0;padding-top:96px;padding-right:32px;padding-bottom:96px;padding-left:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px","margin":{"bottom":"40px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:40px"><!-- wp:paragraph {"style":{"color":{"text":"#0B7CB8"},"typography":{"fontSize":"13px","letterSpacing":"0.14em","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"}}} -->
<p class="has-text-color" style="color:#0B7CB8;font-size:13px;font-style:normal;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">More from Solstice Studio</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"color":{"text":"#0B1220"},"typography":{"fontSize":"46px","fontWeight":"400","lineHeight":"1.05","fontFamily":"\'Instrument Serif\', serif"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#0B1220;font-family:\'Instrument Serif\', serif;font-size:46px;font-weight:400;line-height:1.05">Pairs well with</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-list-related {"limit":null} -->
<!-- wp:surecart/product-template {"style":{"spacing":{"blockGap":"30px"}},"layout":{"type":"grid","columnCount":4}} -->
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#0000000d"},"border":{"radius":"10px"},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="border-radius:10px;background-color:#0000000d;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"contentPosition":"top center","isDark":false,"style":{"dimensions":{"aspectRatio":"3/4"},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"bottom":"15px"}},"border":{"radius":"10px"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-center" style="border-radius:10px;margin-bottom:15px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:surecart/product-quick-view-button {"style":{"typography":{"fontSize":"12px","textAlign":"center","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"left":"10px","right":"10px","top":"10px","bottom":"10px"}},"border":{"radius":"100px"},"color":{"background":"#0ea5e9","text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}}} /-->

<!-- wp:surecart/product-sale-badge {"style":{"typography":{"fontSize":"12px"},"border":{"radius":"100px"},"layout":{"selfStretch":"fit","flexSize":null}}} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:surecart/product-title {"level":3,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"5px","top":"0px"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em","margin":{"top":"0px","bottom":"0px"}},"margin":{"top":"0px","bottom":"0px"},"typography":{"lineHeight":"1"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;line-height:1"><!-- wp:surecart/product-list-price {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"5px"}}}} /-->

<!-- wp:surecart/product-scratch-price {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"5px"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-template -->

<!-- wp:surecart/product-pagination {"style":{"spacing":{"margin":{"top":"20px"}}}} -->
<!-- wp:surecart/product-pagination-previous {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->

<!-- wp:surecart/product-pagination-numbers {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->

<!-- wp:surecart/product-pagination-next {"style":{"color":{"text":"#5b6478"},"elements":{"link":{"color":{"text":"#5b6478"}}}}} /-->
<!-- /wp:surecart/product-pagination -->
<!-- /wp:surecart/product-list-related --></div>
<!-- /wp:group -->
<!-- /wp:surecart/product-page -->',
];
