<?php
// Block-presence marker: validateLocal only requires a choice when the list exists.
wp_interactivity_state(
	'surecart/checkout-form',
	array(
		'hasShippingChoicesField' => true,
	)
);

return 'file:./view.php';
