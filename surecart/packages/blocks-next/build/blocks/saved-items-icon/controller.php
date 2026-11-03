<?php
$saved_url = \SureCart::saved_items()->url();

// Nowhere to send the shopper.
if ( empty( $saved_url ) ) {
	return '';
}

// Shortcodes pass "false" as a string.
$show_count = filter_var( $attributes['show_count'] ?? true, FILTER_VALIDATE_BOOLEAN );

\SureCart::saved_items()->seedState();

return 'file:./view.php';
