<a
	href="<?php echo esc_url( $saved_url ); ?>"
	data-wp-interactive='{ "namespace": "surecart/saved-items" }'
	<?php echo wp_kses_data( get_block_wrapper_attributes( [ 'class' => 'menu-link' ] ) ); ?>
	aria-label="<?php esc_attr_e( 'Saved items', 'surecart' ); ?>"
	data-wp-bind--aria-label="state.linkLabel"
>
	<?php // The badge is pinned to the heart, not the link: menu links carry theme padding. ?>
	<span class="wp-block-surecart-saved-items-icon__icon">
		<?php echo wp_kses( SureCart::svg()->get( 'heart', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
		<?php if ( $show_count ) : ?>
			<?php // The list lives in the browser, so the count is client-only and safe to page-cache. ?>
			<span
				class="wp-block-surecart-saved-items-icon__count"
				data-wp-text="state.count"
				data-wp-bind--hidden="!state.count"
				aria-hidden="true"
				hidden
			></span>
		<?php endif; ?>
	</span>
</a>
