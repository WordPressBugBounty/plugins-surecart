<?php
/** Per-bump card — the DUAL modern/classic design. */

$card_modern_attrs  = get_block_wrapper_attributes(
	array( 'class' => 'sc-order-bump sc-order-bump--modern sc-choice' )
);
$card_classic_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-order-bump sc-order-bump--classic sc-choice' )
);
?>
<?php if ( $is_modern ) : ?>
	<?php
	// The card box + add-button are chrome around it.
	?>
	<div <?php echo wp_kses_data( $card_modern_attrs ); ?> data-wp-class--sc-choice--checked="state.isBumpAdded">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- authored InnerBlocks (reorderable leaves). ?>
		<button
			type="button"
			class="sc-order-bump__button sc-button-reset sc-button-unstyled"
			data-wp-class--sc-order-bump__button--checked="state.isBumpAdded"
			data-wp-class--sc-order-bump__button--loading="context.bumpLoading"
			data-wp-bind--aria-label="state.bumpButtonAriaLabel"
			data-wp-bind--aria-pressed="state.isBumpAdded"
			data-wp-bind--aria-busy="context.bumpLoading"
			data-wp-bind--aria-disabled="state.checkoutLoading"
			data-wp-on--click="actions.toggleBump"
		>
			<span class="sc-order-bump__button-icon" aria-hidden="true" data-wp-bind--hidden="state.isBumpAdded">
				<?php echo wp_kses( \SureCart::svg()->get( 'plus', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
			</span>
			<span class="sc-order-bump__button-icon" aria-hidden="true" data-wp-bind--hidden="!state.isBumpAdded" hidden>
				<?php echo wp_kses( \SureCart::svg()->get( 'check', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
			</span>
			<span class="sc-spinner" aria-hidden="true" data-wp-bind--hidden="!context.bumpLoading" hidden></span>
		</button>
	</div>
<?php else : ?>
	<?php
	// Reorder does not apply in classic: a server-option design can't be one authored template.
	// Leaves can sit inside core/group wrappers (the default template nests price + badge), so
	// walk the tree; a nested WP_Block already carries its parent's context. First leaf wins.
	$parts         = array();
	$leaf_prefix   = 'surecart/checkout-order-bump-';
	$collect_leafs = function ( $blocks ) use ( &$collect_leafs, &$parts, $leaf_prefix ) {
		foreach ( $blocks as $inner_block ) {
			$name = $inner_block->parsed_block['blockName'] ?? '';
			if ( 0 !== strpos( $name, $leaf_prefix ) ) {
				$collect_leafs( $inner_block->inner_blocks ?? array() );
				continue;
			}
			$key = substr( $name, strlen( $leaf_prefix ) );
			if ( ! isset( $parts[ $key ] ) ) {
				$parts[ $key ] = $inner_block->render();
			}
		}
	};
	$collect_leafs( $block->inner_blocks ?? array() );

	// Price + discount-badge leaves as flex siblings inside the `.sc-order-bump__amount` row.
	ob_start();
	?>
	<div class="sc-order-bump__amount">
		<?php echo $parts['price'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- routed leaf markup. ?>
		<?php echo $parts['discount-badge'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- routed leaf markup. ?>
	</div>
	<?php
	$amount_row = ob_get_clean();
	?>
	<label
		<?php echo wp_kses_data( $card_classic_attrs ); ?>
		data-wp-class--sc-choice--checked="state.isBumpAdded"
		data-wp-class--sc-choice--disabled="state.checkoutLoading"
	>
		<div class="sc-order-bump__main">
			<?php // Hidden, not omitted, when the control is off: the card still needs a keyboard-operable control. ?>
			<input
				type="checkbox"
				class="sc-order-bump__checkbox<?php echo $show_control ? '' : ' sc-screen-reader-text'; ?>"
				data-wp-bind--checked="state.isBumpAdded"
				data-wp-bind--disabled="state.checkoutLoading"
				data-wp-on--change="actions.toggleBump"
				data-wp-on--keydown="actions.bumpKeydown"
			/>
			<div class="sc-order-bump__text">
				<div class="sc-order-bump__title" data-wp-text="state.bumpClassicTitle"></div>
				<?php echo $amount_row; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup built above. ?>
			</div>
		</div>
		<div class="sc-order-bump__footer" data-wp-bind--hidden="!context.bump.metadata.description" hidden>
			<hr class="sc-order-bump__divider" />
			<div class="sc-order-bump__product">
				<?php echo $parts['image'] ?? ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- routed leaf markup. ?>
				<div class="sc-order-bump__product-text">
					<?php // Only when the CTA takes the title slot above. ?>
					<div
						class="sc-order-bump__product-title"
						data-wp-bind--hidden="!context.bump.metadata.cta"
						data-wp-text="state.bumpTitle"
						hidden
					></div>
					<div class="sc-order-bump__product-description">
						<span data-wp-bind--innerHTML="context.bump.rendered_description"></span>
					</div>
				</div>
			</div>
		</div>
	</label>
<?php endif; ?>
