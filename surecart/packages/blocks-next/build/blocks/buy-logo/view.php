<?php
/** The width attribute falls back to the `buy_link_logo_width` store setting when empty. */

$logo_url   = \SureCart::theme()->logoUrl();
$logo_width = ! empty( $attributes['width'] ) ? $attributes['width'] : \SureCart::settings()->get( 'buy_link_logo_width', '180px' );
// An empty site title would leave the home link without a name.
$site_name = ! empty( get_bloginfo( 'name' ) ) ? get_bloginfo( 'name' ) : __( 'Home', 'surecart' );

$wrapper_attrs = get_block_wrapper_attributes(
	[
		'class' => empty( $logo_url ) ? 'sc-buy-logo sc-buy-logo--text' : 'sc-buy-logo',
		'href'  => esc_url( home_url( '/' ) ),
	]
);
?>
<a <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<?php if ( empty( $logo_url ) ) : ?>
		<?php echo esc_html( $site_name ); ?>
	<?php else : ?>
		<img src="<?php echo esc_url( $logo_url ); ?>"
			style="max-width: <?php echo esc_attr( $logo_width ); ?>; max-height: 60px; width: auto; height: auto;"
			alt="<?php echo esc_attr( $site_name ); ?>"
		/>
	<?php endif; ?>
</a>
