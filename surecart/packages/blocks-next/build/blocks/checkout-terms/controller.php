<?php
// Block-presence marker: validateLocal only requires the tick when the checkbox exists.
wp_interactivity_state(
	'surecart/checkout-form',
	array(
		'hasTermsField' => true,
	)
);

return 'file:./view.php';
