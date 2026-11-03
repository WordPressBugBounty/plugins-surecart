<?php
$customer_card = null;

if ( is_user_logged_in() ) {
	$user = wp_get_current_user();

	// Same resolution as the seeded `customerName` (first+last, then
	// display_name) so the pre-painted card matches the hydrated one.
	$customer_name = \SureCart\Support\Blocks\CheckoutStateSeedService::resolveCustomerName( $user );
	$customer_name = '' !== $customer_name ? $customer_name : $user->user_email;

	$customer_card = array(
		'name'       => $customer_name,
		'email'      => $user->user_email,
		// 404 default — a missing gravatar paints nothing, so initials show through.
		'avatar_url' => get_avatar_url( $user->user_email, array( 'default' => '404' ) ),
		'initials'   => mb_substr( $customer_name, 0, 1 ),
	);
}

return 'file:./view.php';
