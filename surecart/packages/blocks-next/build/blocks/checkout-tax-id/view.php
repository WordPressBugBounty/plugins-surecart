<?php
/** Hidden until `state.taxIdShown` flips true. */

$custom_label = $attributes['label'] ?? '';
$help         = $attributes['help'] ?? '';
$show_label   = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size         = $attributes['size'] ?? 'medium';
$tax_id_types = ! empty( $attributes['taxIdTypes'] ) && is_array( $attributes['taxIdTypes'] )
	? $attributes['taxIdTypes']
	: array( 'eu_vat', 'gb_vat', 'ca_gst', 'au_abn', 'other' );

$zone_labels = array(
	'eu_vat' => __( 'VAT Number', 'surecart' ),
	'gb_vat' => __( 'VAT Number', 'surecart' ),
	'ca_gst' => __( 'GST Number', 'surecart' ),
	'au_abn' => __( 'ABN Number', 'surecart' ),
	'other'  => __( 'Tax ID', 'surecart' ),
);
$type_labels = array(
	'eu_vat' => __( 'EU VAT', 'surecart' ),
	'gb_vat' => __( 'UK VAT', 'surecart' ),
	'ca_gst' => __( 'CA GST', 'surecart' ),
	'au_abn' => __( 'AU ABN', 'surecart' ),
	'other'  => __( 'Other', 'surecart' ),
);

// SSR label: the client default type is eu_vat (store init).
$ssr_label = $custom_label ? $custom_label : ( $zone_labels['eu_vat'] );

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--tax-id sc-checkout-tax-id is-size-' . esc_attr( $size ) )
);
?>
<div
	<?php echo wp_kses_data( $wrapper_attrs ); ?>
	data-wp-bind--hidden="!state.taxIdShown"
	hidden
>
	<?php // Hidden, not omitted, so the input is named by the same text a sighted user sees. ?>
	<label for="sc-checkout-tax-id-number" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php // The text bind sits on its own span so it never wipes the asterisk. ?>
		<span
			<?php if ( ! $custom_label ) : ?>
				data-wp-text="state.taxIdZoneLabel"
			<?php endif; ?>
		><?php echo esc_html( $ssr_label ); ?></span>
		<span class="sc-form-label__required" aria-hidden="true" data-wp-bind--hidden="!state.taxIdRequired" hidden>*</span>
	</label>
	<div class="sc-checkout-tax-id__group">
		<?php // Validation status icons — legacy shows these as an input prefix. ?>
		<span
			class="sc-checkout-tax-id__status-icon sc-checkout-tax-id__status-icon--valid"
			data-wp-bind--hidden="!state.taxIdStatusIsValid"
			hidden
			role="img"
			aria-label="<?php esc_attr_e( 'Valid', 'surecart' ); ?>"
		><?php echo wp_kses( SureCart::svg()->get( 'check' ), sc_allowed_svg_html() ); ?></span>
		<span
			class="sc-checkout-tax-id__status-icon sc-checkout-tax-id__status-icon--invalid"
			data-wp-bind--hidden="!state.taxIdStatusIsInvalid"
			hidden
			role="img"
			aria-label="<?php esc_attr_e( 'Invalid', 'surecart' ); ?>"
		><?php echo wp_kses( SureCart::svg()->get( 'x' ), sc_allowed_svg_html() ); ?></span>
		<input
			id="sc-checkout-tax-id-number"
			type="text"
			name="tax_id_number"
			class="sc-checkout-tax-id__input"
			inputmode="text"
			autocomplete="off"
			placeholder="<?php esc_attr_e( 'Enter Tax ID', 'surecart' ); ?>"
			data-wp-bind--value="state.taxIdNumber"
			data-wp-bind--required="state.taxIdRequired"
			data-wp-bind--aria-invalid="state.hasTaxIdError"
			aria-describedby="sc-checkout-tax-id-error<?php echo $help ? ' sc-checkout-tax-id-help' : ''; ?>"
			<?php // `input` (not keyup) so paste, autofill and programmatic fills reach state. ?>
			data-wp-on--input="surecart/checkout-form::actions.setTaxIdNumber"
			data-wp-on--change="surecart/checkout-form::actions.setTaxIdNumber"
			data-wp-on--blur="surecart/checkout-form::actions.flushTaxId"
		/>
		<?php if ( count( $tax_id_types ) === 1 ) : ?>
			<span class="sc-checkout-tax-id__type-single"><?php echo esc_html( $type_labels[ $tax_id_types[0] ] ?? $tax_id_types[0] ); ?></span>
		<?php else : ?>
			<select
				name="tax_id_type"
				class="sc-checkout-tax-id__type"
				aria-label="<?php esc_attr_e( 'Select number type', 'surecart' ); ?>"
				data-wp-bind--value="state.taxIdType"
				data-wp-on--change="surecart/checkout-form::actions.setTaxIdType"
			>
				<?php foreach ( $tax_id_types as $type ) : ?>
					<option value="<?php echo esc_attr( $type ); ?>">
						<?php echo esc_html( $type_labels[ $type ] ?? $type ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</div>
	<?php if ( $help ) : ?>
		<p id="sc-checkout-tax-id-help" class="sc-form-help" data-wp-bind--hidden="state.hasTaxIdError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-tax-id-error" class="sc-form-error" data-wp-bind--hidden="!state.hasTaxIdError" data-wp-text="state.errorFieldErrors.tax_id_number" hidden></p>
</div>
