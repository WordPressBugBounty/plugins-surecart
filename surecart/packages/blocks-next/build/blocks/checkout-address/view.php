<?php
$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-address' )
);
?>

<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner-block HTML, escaped per-block. ?>
</div>
