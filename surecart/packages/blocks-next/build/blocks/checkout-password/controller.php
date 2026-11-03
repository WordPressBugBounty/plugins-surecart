<?php
// A password only makes sense for an account that doesn't exist yet. A login during checkout is
// handled by the `state.loggedIn` bind in view.php.
if ( is_user_logged_in() ) {
	return '';
}

wp_interactivity_state(
	'surecart/checkout-form',
	array(
		// Marker + required flag, read by validateLocal.
		'passwordEnabled'           => true,
		'passwordRequired'          => ! empty( $attributes['required'] ),
		// All it gates is the strength hint (min 6 chars + one special character).
		'passwordValidationEnabled' => (bool) get_option( 'surecart_password_validation_enabled', true ),
		// Reveal-toggle state. `passwordInputType` must be seeded (see above).
		'passwordVisible'           => false,
		'passwordInputType'         => 'password',
		// Derived, non-secret values. The plaintext lives only in the DOM and the
		// `checkout-form/password` module, never in state: `setCheckout` persists
		// state.checkout to localStorage.
		'passwordFilled'            => false,
		'passwordHint'              => '',
	)
);

return 'file:./view.php';
