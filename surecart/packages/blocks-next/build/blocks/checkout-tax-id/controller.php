<?php
// The merchant's "always required" choice is OR'd into the `taxIdRequired` and `taxIdShown`
// getters. This block renders before the form's seed pass, which reads the key back so it
// cannot clobber it.
if ( ! empty( $attributes['required'] ) ) {
	wp_interactivity_state( 'surecart/checkout-form', array( 'taxIdForcedRequired' => true ) );
}

return 'file:./view.php';
