<?php \SureCart::render( 'layouts/partials/admin-settings-styles' ); ?>

<div id="sc-settings-container">
	<?php \SureCart::render( 'layouts/partials/setup-bar' ); ?>
	<?php
	\SureCart::render(
		'layouts/partials/admin-settings-header',
		[
			'breadcrumb' => $breadcrumb,
		]
	);
	?>
	<div id="sc-settings-app"></div>
</div>

