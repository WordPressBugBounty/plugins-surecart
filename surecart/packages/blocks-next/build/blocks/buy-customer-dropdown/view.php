<?php
/**
 * The avatar uses gravatar's 404 default: when it fails, the empty-alt image paints nothing
 * and the initials underneath show through.
 */

$user           = wp_get_current_user();
$avatar_url     = get_avatar_url( $user->user_email, array( 'default' => '404' ) );
$dashboard_link = \SureCart::pages()->url( 'dashboard' );

// Buy pages are non-post routes — rebuild the current URL from the parsed request path.
global $wp;
$logout_link = wp_logout_url( home_url( '/' . $wp->request ) );

$wrapper_attrs = get_block_wrapper_attributes( [ 'class' => 'sc-buy-customer-dropdown' ] );
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<details>
		<summary aria-label="<?php esc_attr_e( 'Account menu', 'surecart' ); ?>">
			<span class="sc-buy-customer-dropdown__avatar">
				<span class="sc-buy-customer-dropdown__initials" aria-hidden="true"><?php echo esc_html( mb_substr( $user->display_name, 0, 1 ) ); ?></span>
				<?php if ( ! empty( $avatar_url ) ) : ?>
					<img src="<?php echo esc_url( $avatar_url ); ?>" alt="" />
				<?php endif; ?>
			</span>
		</summary>
		<nav class="sc-buy-customer-dropdown__menu">
			<?php if ( ! empty( $dashboard_link ) ) : ?>
				<a href="<?php echo esc_url( $dashboard_link ); ?>"><?php esc_html_e( 'Dashboard', 'surecart' ); ?></a>
			<?php endif; ?>
			<a href="<?php echo esc_url( $logout_link ); ?>"><?php esc_html_e( 'Logout', 'surecart' ); ?></a>
		</nav>
	</details>
</div>
