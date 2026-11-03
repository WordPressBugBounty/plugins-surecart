<?php
// Saved state is set in the browser only, so full-page caching never leaks one shopper's list.
// The overlay chip hides its label, so it's icon-only whatever `show_label` says.
$is_overlay        = false !== strpos( $attributes['className'] ?? '', 'is-style-overlay' );
$icon_only         = ! $is_button && ( empty( $attributes['show_label'] ) || $is_overlay );
$context           = wp_kses_data(
	wp_interactivity_data_wp_context(
		[
			'productId'   => $product->id,
			'productName' => $product->name,
		]
	)
);
// A toggle's name must not change, so only icon-only buttons (fixed aria-label) are pressed toggles;
// labelled ones keep their visible text as the name (voice control matches it). `is-saved` styles both.
$button_attributes = sprintf(
	'type="button" data-wp-interactive=\'{ "namespace": "surecart/saved-items" }\' %s data-wp-class--is-saved="state.isPressed" data-wp-bind--aria-busy="state.isBusy" data-wp-on--click="actions.toggle" data-wp-on--mousedown="actions.preventMouseFocus"%s',
	$context,
	$icon_only ? ' data-wp-bind--aria-pressed="state.isPressed" aria-pressed="false" aria-label="' . esc_attr( sprintf( /* translators: %s: product name */ __( 'Save %s for later', 'surecart' ), $product->name ) ) . '"' : ''
);
$icon              = wp_kses(
	SureCart::svg()->get(
		'heart',
		[
			'class'       => 'wp-block-surecart-product-save-button__icon',
			'aria-hidden' => 'true',
		]
	),
	sc_allowed_svg_html()
);
// Shown when the product is saved, but not with the options now chosen on the product page.
$options_label = __( 'Save these options', 'surecart' );
ob_start();
?>
<span class="wp-block-surecart-product-save-button__label" data-wp-bind--hidden="!state.showLabel"><?php echo wp_kses_post( $label ); ?></span>
<span class="wp-block-surecart-product-save-button__label" data-wp-bind--hidden="!state.isPressed" hidden><?php echo wp_kses_post( $saved_label ); ?></span>
<span class="wp-block-surecart-product-save-button__label" data-wp-bind--hidden="!state.showOptionsLabel" hidden><?php echo esc_html( $options_label ); ?></span>
<?php // Tells a grid's buttons apart for screen readers, after the visible label so voice control still matches. ?>
<span class="sc-screen-reader-text"><?php echo esc_html( $product->name ); ?></span>
<?php
$labels = ob_get_clean();
?>
<?php if ( $is_button ) : ?>
	<?php // Same markup as the buy buttons, so theme button styles and the outline variation apply. ?>
	<div
	<?php
	echo wp_kses_data(
		get_block_wrapper_attributes(
			array_filter(
				[
					'class' => 'wp-block-button is-style-outline wp-block-button__width-100',
					'style' => $wrapper_style,
				]
			)
		)
	);
	?>
			>
		<button class="wp-block-button__link wp-element-button sc-button__link" <?php echo $button_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
			<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- kses above. ?>
			<?php echo $labels; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>
		</button>
		<?php echo $show_change_list ? \SureCart::saved_items()->changeButton( $product ) : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the helper. ?>
	</div>
<?php elseif ( ! $icon_only ) : ?>
	<?php // A text link with "· Change list" beside it once saved; the wrapper holds both buttons. ?>
	<div
	<?php
	echo wp_kses_data(
		get_block_wrapper_attributes(
			array_filter(
				[
					'class' => 'is-labelled',
					'style' => $wrapper_style,
				]
			)
		)
	);
	?>
			>
		<button class="wp-block-surecart-product-save-button__toggle" <?php echo $button_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
			<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- kses above. ?>
			<?php echo $labels; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>
		</button>
		<?php echo $show_change_list ? \SureCart::saved_items()->changeButton( $product, [ 'inline' => true ] ) : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the helper. ?>
	</div>
<?php else : ?>
	<button <?php echo wp_kses_data( get_block_wrapper_attributes( $wrapper_style ? [ 'style' => $wrapper_style ] : [] ) ); ?> <?php echo $button_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
		<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- kses above. ?>
	</button>
<?php endif; ?>
