<div
	<?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>
	data-wp-on--click="surecart/saved-items::actions.saveLineItem"
	data-wp-on--keydown="surecart/saved-items::actions.saveLineItem"
	role="button"
	tabindex="0"
>
	<?php if ( ! empty( $attributes['show_icon'] ) ) : ?>
		<?php
		echo wp_kses(
			SureCart::svg()->get(
				'heart',
				[
					'class'       => 'wp-block-surecart-cart-line-item-save__icon',
					'aria-hidden' => 'true',
				]
			),
			sc_allowed_svg_html()
		);
		?>
	<?php endif; ?>
	<span class="<?php echo empty( $attributes['show_label'] ) ? 'sc-screen-reader-text' : 'wp-block-surecart-cart-line-item-save__label'; ?>">
		<?php echo wp_kses_post( $label ); ?>
	</span>
	<?php // Tells the lines apart for screen readers while keeping the visible label first in the name. ?>
	<span class="sc-screen-reader-text" data-wp-text="surecart/checkout::context.line_item.price.product.name"></span>
</div>
