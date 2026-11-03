<?php
// The store opens this by id; close and Done are built in so a customised part can always be closed.
?>
<dialog
	<?php
	echo wp_kses_data(
		get_block_wrapper_attributes(
			array_filter(
				[
					'id'         => 'sc-saved-items-picker',
					'class'      => 'sc-dialog sc-saved-items-dialog',
					'style'      => $width_style,
					'aria-label' => __( 'Save to list', 'surecart' ),
				]
			)
		)
	);
	?>
	data-wp-interactive='{ "namespace": "surecart/saved-items" }'
	data-wp-on--click="actions.closeOnBackdrop"
>
	<button type="button" class="sc-saved-items-dialog__close is-corner" aria-label="<?php esc_attr_e( 'Close', 'surecart' ); ?>" data-wp-on--click="actions.closeDialog">
		<?php echo wp_kses( SureCart::svg()->get( 'x', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
	</button>

	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner blocks. ?>

	<div class="sc-saved-items-dialog__footer wp-block-buttons">
		<div class="wp-block-button">
			<button type="button" class="wp-block-button__link wp-element-button" data-wp-on--click="actions.closeDialog"><?php echo esc_html( $done_text ); ?></button>
		</div>
	</div>
</dialog>
