<?php
	/*
	 * Render before <head> so block layout styles are collected before wp_head() prints them.
	 */
	$rendered_template = surecart_get_the_block_template_html( $content );
	?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<?php echo $rendered_template; // phpcs:ignore WordPress.Security.EscapeOutput ?>

		<?php wp_footer(); ?>
	</body>
</html>
