<?php

namespace SureCart\Controllers\Web;

use SureCart\Models\CustomerLink;
use SureCart\Models\User;

/**
 * Thank you routes
 */
class DashboardController {
	/**
	 * Get the enabled navigation.
	 *
	 * @return array
	 */
	public function getEnabledNavigation( $id ) {
		return array_values(
			array_filter(
				[ 'orders', 'invoices', 'subscriptions', 'downloads', 'saved', 'account', 'billing' ],
				function( $name ) use ( $id ) {
					if ( ! get_post_meta( $id, '_surecart_dashboard_navigation_' . $name, true ) ) {
						return false;
					}
					// Billing lives on a customer record; users without one have nothing to show.
					// Saved stays visible: the first save creates the customer.
					if ( 'billing' === $name ) {
						return $this->hasCustomer();
					}
					return true;
				}
			)
		);
	}

	/**
	 * Does the current user have a live or test customer?
	 *
	 * @return boolean
	 */
	private function hasCustomer() {
		return ! empty( User::current()->customerId( 'live' ) ) || ! empty( User::current()->customerId( 'test' ) );
	}

	/**
	 * Get data for the page.
	 *
	 * @return array
	 */
	public function getData() {
		return [
			'show_logo'          => get_post_meta( get_the_ID(), '_surecart_dashboard_show_logo', true ),
			'logo_url'           => \SureCart::theme()->logoUrl() ?: null,
			'logo_width'         => get_post_meta( get_the_ID(), '_surecart_dashboard_logo_width', true ),
			'current_url'        => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
			'user'               => wp_get_current_user(),
			'dashboard_url'      => get_permalink( get_the_ID() ),
			'logout_link'        => wp_logout_url( get_permalink( get_the_ID() ) ),
			'active_tab'         => esc_html( $_GET['model'] ?? 'dashboard' ),
			'navigation'         => $this->getNavigation(),
			'account_navigation' => $this->getAccountNavigation(),
		];
	}

	/**
	 * Is this tab active.
	 */
	public function isActive( $tab ) {
		return esc_html( $_GET['model'] ?? 'dashboard' ) === $tab;
	}

	/**
	 * Get the account navigation.
	 *
	 * @return array
	 */
	public function getAccountNavigation() {
		$dashboard_url      = get_permalink( get_the_ID() );
		$enabled_navigation = $this->getEnabledNavigation( get_the_ID() );
		$customer_id        = ! empty( User::current()->customerId( 'live' ) ) ? User::current()->customerId( 'live' ) : User::current()->customerId( 'test' );
		return array_filter(
			[
				'account' => [
					'icon_name' => 'user',
					'name'      => __( 'Account', 'surecart' ),
					'active'    => $this->isActive( 'account' ),
					'href'      => add_query_arg(
						[
							'action' => 'edit',
							'model'  => 'user',
						],
						$dashboard_url
					),
				],
				'billing' => ! empty( $customer_id ) ? [
					'icon_name' => 'credit-card',
					'name'      => __( 'Billing', 'surecart' ),
					'active'    => $this->isActive( 'billing' ),
					'href'      => add_query_arg(
						[
							'action' => 'show',
							'model'  => 'customer',
							'id'     => $customer_id,
						],
						$dashboard_url
					),
				] : false,
			],
			function( $item, $key ) use ( $enabled_navigation ) {
				return $item && in_array( $key, $enabled_navigation, true );
			},
			ARRAY_FILTER_USE_BOTH
		);
	}

	/**
	 * Get the navigation.
	 *
	 * @return array
	 */
	public function getNavigation() {
		$dashboard_url      = get_permalink( get_the_ID() );
		$enabled_navigation = $this->getEnabledNavigation( get_the_ID() );

		$navigation = array_filter(
			[
				'dashboard'     => [
					'icon_name' => 'server',
					'name'      => __( 'Dashboard', 'surecart' ),
					'active'    => $this->isActive( 'dashboard' ),
					'href'      => $dashboard_url,
				],
				'orders'        => [
					'icon_name' => 'shopping-bag',
					'name'      => __( 'Orders', 'surecart' ),
					'active'    => $this->isActive( 'order' ),
					'href'      => add_query_arg(
						[
							'action' => 'index',
							'model'  => 'order',
						],
						$dashboard_url
					),
				],
				'invoices'        => [
					'icon_name' => 'inbox',
					'name'      => __( 'Invoices', 'surecart' ),
					'active'    => $this->isActive( 'invoice' ),
					'href'      => add_query_arg(
						[
							'action' => 'index',
							'model'  => 'invoice',
						],
						$dashboard_url
					),
				],
				'subscriptions' => [
					'icon_name' => 'repeat',
					'name'      => __( 'Plans', 'surecart' ),
					'active'    => $this->isActive( 'subscription' ),
					'href'      => add_query_arg(
						[
							'action' => 'index',
							'model'  => 'subscription',
						],
						$dashboard_url
					),
				],
				'downloads'     => [
					'icon_name' => 'download-cloud',
					'name'      => __( 'Downloads', 'surecart' ),
					'active'    => $this->isActive( 'download' ),
					'href'      => add_query_arg(
						[
							'action' => 'index',
							'model'  => 'download',
						],
						$dashboard_url
					),
				],
				'saved'         => \SureCart::saved_items()->enabled() ? [
					'icon_name' => 'heart',
					'name'      => __( 'Saved', 'surecart' ),
					'active'    => $this->isActive( 'saved_item' ),
					'href'      => add_query_arg(
						[
							'action' => 'index',
							'model'  => 'saved_item',
						],
						$dashboard_url
					),
				] : null,
			],
			function( $item, $key ) use ( $enabled_navigation ) {
				return $item && ( 'dashboard' === $key || in_array( $key, $enabled_navigation, true ) );
			},
			ARRAY_FILTER_USE_BOTH
		);

		/**
		 * Filters the customer dashboard sidebar navigation.
		 *
		 * Add, remove or reorder tabs. Each item is keyed by a unique slug.
		 *
		 * @since 4.10.0
		 *
		 * @param array  $navigation {
		 *     Navigation items keyed by slug.
		 *
		 *     @type string $icon_name Icon name (sc-icon).
		 *     @type string $name      Label.
		 *     @type bool   $active    Whether this tab is the current page.
		 *     @type string $href      Link URL.
		 * }
		 * @param string $dashboard_url The dashboard page URL.
		 */
		return apply_filters( 'surecart/dashboard/navigation', $navigation, $dashboard_url );
	}

	/**
	 * Show the dashboard.
	 */
	public function show( $request, $view ) {
		// do not cache.
		$request->noCache();
		return \SureCart::view( $view );
	}

	/**
	 * Get the link from the request.
	 *
	 * @param string $link_id The link id.
	 * @return string|\WP_Error
	 */
	public function getLink( $link_id ) {
		$link = CustomerLink::find( $link_id );
		if ( is_wp_error( $link ) ) {
			return $link;
		}
		return $link;
	}

	/**
	 * Login the user
	 *
	 * @param int|\WP_User $wp_user WordPress user.
	 * @return void
	 */
	public function loginUser( $wp_user ) {
		if ( ! $wp_user ) {
			return wp_die( esc_html__( 'This user could not be found.', 'surecart' ) );
		}

		$id = ! empty( $wp_user->ID ) ? $wp_user->ID : $wp_user;
		if ( ! is_int( $id ) ) {
			return;
		}

		wp_clear_auth_cookie();
		wp_set_current_user( $id );
		wp_set_auth_cookie( $id );
	}
}
