<?php
/**
 * The per-bump card lives in the `surecart/checkout-order-bump-template` child, rendered
 * inside the `<template data-wp-each--bump>` loop via `echo $content`.
 */

$label            = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Recommended', 'surecart' );
$show_label       = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$hide_added_items = ! empty( $attributes['hideAddedItems'] );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-checkout-order-bumps' )
);

$context_payload = wp_interactivity_data_wp_context(
	array( 'hideAddedItems' => $hide_added_items )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-interactive='{ "namespace": "surecart/checkout-form" }'
	<?php echo wp_kses_data( $context_payload ); ?>
	data-wp-bind--hidden="state.hasNoBumps"
	hidden
>
	<?php $label_id = wp_unique_id( 'sc-order-bumps-label-' ); ?>
	<div id="<?php echo esc_attr( $label_id ); ?>" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>"><?php echo esc_html( $label ); ?></div>
	<div class="sc-order-bumps__list" role="group" aria-labelledby="<?php echo esc_attr( $label_id ); ?>">
		<template
			data-wp-each--bump="state.bumpsList"
			data-wp-each-key="context.bump.id"
		>
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner-block (order-bump-template) markup. ?>
		</template>
	</div>
</div>
