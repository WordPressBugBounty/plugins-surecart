<?php
/**
 * Shared address field markup for the shipping + billing address blocks,
 * rendered via AddressBlockService::render().
 *
 * Variables: $kind, $show_name, $require_name, $has_maps.
 */
		$class = 'sc-checkout-' . $kind . '-address';
		// phpcs:disable Generic.WhiteSpace.ScopeIndent -- indentation is intentional so the rendered HTML whitespace stays stable.
		?>
		<?php if ( $show_name ) : ?>
			<input
				type="text"
				name="<?php echo esc_attr( $kind ); ?>_name"
				class="<?php echo esc_attr( $class ); ?>__field"
				placeholder="<?php esc_attr_e( 'Name or Company Name', 'surecart' ); ?>"
				aria-label="<?php esc_attr_e( 'Name or Company Name', 'surecart' ); ?>"
				autocomplete="<?php echo esc_attr( $kind ); ?> name"
				data-wp-bind--hidden="state.<?php echo esc_attr( $kind ); ?>NameHidden"
				data-wp-bind--disabled="state.<?php echo esc_attr( $kind ); ?>NameHidden"
				<?php if ( $require_name ) : ?>
					<?php // A hidden field never blocks submission. ?>
					data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>AddressFullForm"
				<?php else : ?>
					<?php // Not required while hidden in compact/tax mode. ?>
					data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>AddressFullFieldsRequired"
				<?php endif; ?>
				data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.name"
				data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>NameError"
				aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-name"
				<?php // `input`, not `keyup`: paste and autofill fire no key events. ?>
				data-wp-on--input="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressName"
				data-wp-on--blur="actions.flush<?php echo esc_attr( ucfirst( $kind ) ); ?>Address"
			/>
			<p
				id="sc-<?php echo esc_attr( $kind ); ?>-error-name"
				class="<?php echo esc_attr( $class ); ?>__error"
				data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_name"
				data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_name"
			></p>
		<?php endif; ?>

		<select
			name="<?php echo esc_attr( $kind ); ?>_country"
			class="<?php echo esc_attr( $class ); ?>__field"
			autocomplete="<?php echo esc_attr( $kind ); ?> country"
			aria-label="<?php esc_attr_e( 'Country', 'surecart' ); ?>"
			data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>AddressInputsRequired"
			data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.country"
			data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>CountryError"
			aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-country"
			data-wp-on--change="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressCountry"
		>
			<option value="" data-wp-bind--disabled="state.<?php echo esc_attr( $kind ); ?>CountryChosen"><?php esc_html_e( 'Country', 'surecart' ); ?></option>
			<template
				data-wp-each--country="state.countries"
				data-wp-each-key="context.country.value"
			>
				<option
					data-wp-bind--value="context.country.value"
					data-wp-text="context.country.label"
					data-wp-bind--selected="state.isCountrySelectedFor<?php echo esc_attr( ucfirst( $kind ) ); ?>"
				></option>
			</template>
		</select>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-country"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_country"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_country"
		></p>

		<div
			class="<?php echo esc_attr( $class ); ?>__line-1-wrap"
			data-wp-bind--hidden="!state.<?php echo esc_attr( $kind ); ?>AddressFullForm"
		>
		<input
			type="text"
			name="<?php echo esc_attr( $kind ); ?>_line_1"
			class="<?php echo esc_attr( $class ); ?>__field"
			placeholder="<?php esc_attr_e( 'Address', 'surecart' ); ?>"
			data-wp-bind--placeholder="state.<?php echo esc_attr( $kind ); ?>LabelLine1"
			aria-label="<?php esc_attr_e( 'Address', 'surecart' ); ?>"
			data-wp-bind--aria-label="state.<?php echo esc_attr( $kind ); ?>LabelLine1"
			data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>AddressFullFieldsRequired"
			data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.line_1"
			data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>Line1Error"
			aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-line-1"
			data-wp-on--input="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressLine1"
			data-wp-on--blur="actions.flush<?php echo esc_attr( ucfirst( $kind ) ); ?>Address"
			<?php if ( $has_maps ) : ?>
				<?php // Combobox semantics only when Maps suggestions can actually appear. ?>
				data-wp-on--keydown="actions.<?php echo esc_attr( $kind ); ?>SuggestKeydown"
				role="combobox"
				aria-autocomplete="list"
				aria-controls="sc-<?php echo esc_attr( $kind ); ?>-suggest-listbox"
				data-wp-bind--aria-expanded="state.<?php echo esc_attr( $kind ); ?>SuggestionsOpen"
				data-wp-bind--aria-activedescendant="state.<?php echo esc_attr( $kind ); ?>ActiveDescendantId"
				<?php // With Maps on, native autofill would cover the suggestions. ?>
				autocomplete="off"
			<?php else : ?>
				autocomplete="<?php echo esc_attr( $kind ); ?> address-line1"
			<?php endif; ?>
		/>
		<?php if ( $has_maps ) : ?>
		<ul
			id="sc-<?php echo esc_attr( $kind ); ?>-suggest-listbox"
			class="<?php echo esc_attr( $class ); ?>__suggestions"
			role="listbox"
			data-wp-bind--hidden="state.hide<?php echo esc_attr( ucfirst( $kind ) ); ?>Suggestions"
			hidden
		>
			<?php // Attribution header required by the Places ToS. ?>
			<li
				class="<?php echo esc_attr( $class ); ?>__suggestions-attribution"
				role="presentation"
			>
				<span>
					<?php
					printf(
						/* translators: %s: "Google", linking to the Google privacy policy. */
						esc_html__( 'Suggestions powered by %s', 'surecart' ),
						'<a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Google</a>'
					);
					?>
				</span>
				<button
					type="button"
					class="<?php echo esc_attr( $class ); ?>__suggestions-close"
					aria-label="<?php esc_attr_e( 'Close suggestions', 'surecart' ); ?>"
					<?php // Keeps focus in line_1 so its blur can't clear the panel first. ?>
					data-wp-on--mousedown="actions.suggestCloseMousedown"
					data-wp-on--click="actions.clearAddressSuggestions"
				>&times;</button>
			</li>
			<li
				class="<?php echo esc_attr( $class ); ?>__suggestion <?php echo esc_attr( $class ); ?>__suggestion--no-select"
				role="presentation"
				data-wp-bind--hidden="state.hide<?php echo esc_attr( ucfirst( $kind ) ); ?>SuggestLoading"
				hidden
			><?php esc_html_e( 'Loading...', 'surecart' ); ?></li>
			<li
				class="<?php echo esc_attr( $class ); ?>__suggestion <?php echo esc_attr( $class ); ?>__suggestion--no-select"
				role="presentation"
				data-wp-bind--hidden="state.hide<?php echo esc_attr( ucfirst( $kind ) ); ?>SuggestNoResults"
				hidden
			><?php esc_html_e( 'No results found', 'surecart' ); ?></li>
			<template
				data-wp-each--suggestion="state.<?php echo esc_attr( $kind ); ?>Suggestions"
				data-wp-each-key="context.suggestion.domId"
			>
				<li
					class="<?php echo esc_attr( $class ); ?>__suggestion"
					role="option"
					data-wp-bind--id="context.suggestion.domId"
					data-wp-bind--aria-selected="state.is<?php echo esc_attr( ucfirst( $kind ) ); ?>SuggestionFocused"
					data-wp-class--focused="state.is<?php echo esc_attr( ucfirst( $kind ) ); ?>SuggestionFocused"
					data-wp-on--mousedown="actions.selectAddressSuggestion"
				>
					<?php // Spans, not innerHTML, keep the highlight HTML-safe. ?>
					<span data-wp-text="context.suggestion.pre"></span><strong data-wp-text="context.suggestion.match"></strong><span data-wp-text="context.suggestion.post"></span>
				</li>
			</template>
			<?php // A real option so keyboard users reach it; focus stays in line_1. ?>
			<li
				id="sc-<?php echo esc_attr( $kind ); ?>-suggest-manual"
				class="<?php echo esc_attr( $class ); ?>__suggestions-manual-row"
				role="option"
				data-wp-bind--aria-selected="state.is<?php echo esc_attr( ucfirst( $kind ) ); ?>ManualEntryFocused"
				data-wp-class--focused="state.is<?php echo esc_attr( ucfirst( $kind ) ); ?>ManualEntryFocused"
			>
				<button
					type="button"
					class="<?php echo esc_attr( $class ); ?>__suggestions-manual"
					tabindex="-1"
					data-wp-on--mousedown="actions.suggestCloseMousedown"
					data-wp-on--click="actions.clearAddressSuggestions"
				><?php esc_html_e( 'Enter address manually', 'surecart' ); ?></button>
			</li>
		</ul>
		<div
			role="status"
			aria-live="polite"
			class="sc-screen-reader-text"
			data-wp-text="state.<?php echo esc_attr( $kind ); ?>SuggestStatus"
		></div>
		<?php endif; ?>
		</div>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-line-1"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_line_1"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_line_1"
		></p>

		<?php // Always in the DOM; `{kind}Line2Hidden` reveals it when enabled or filled. ?>
		<input
			type="text"
			name="<?php echo esc_attr( $kind ); ?>_line_2"
			class="<?php echo esc_attr( $class ); ?>__field"
			placeholder="<?php esc_attr_e( 'Apartment, suite, etc. (optional)', 'surecart' ); ?>"
			data-wp-bind--placeholder="state.<?php echo esc_attr( $kind ); ?>LabelLine2"
			aria-label="<?php esc_attr_e( 'Apartment, suite, etc. (optional)', 'surecart' ); ?>"
			data-wp-bind--aria-label="state.<?php echo esc_attr( $kind ); ?>LabelLine2"
			autocomplete="<?php echo esc_attr( $kind ); ?> address-line2"
			data-wp-bind--hidden="state.<?php echo esc_attr( $kind ); ?>Line2Hidden"
			data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.line_2"
			data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>Line2Error"
			aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-line-2"
			data-wp-on--input="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressLine2"
			data-wp-on--blur="actions.flush<?php echo esc_attr( ucfirst( $kind ) ); ?>Address"
			hidden
		/>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-line-2"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_line_2"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_line_2"
		></p>

		<div class="<?php echo esc_attr( $class ); ?>__row">
			<input
				type="text"
				name="<?php echo esc_attr( $kind ); ?>_city"
				class="<?php echo esc_attr( $class ); ?>__field"
				placeholder="<?php esc_attr_e( 'City', 'surecart' ); ?>"
				data-wp-bind--placeholder="state.<?php echo esc_attr( $kind ); ?>LabelCity"
				aria-label="<?php esc_attr_e( 'City', 'surecart' ); ?>"
				data-wp-bind--aria-label="state.<?php echo esc_attr( $kind ); ?>LabelCity"
				autocomplete="<?php echo esc_attr( $kind ); ?> address-level2"
				data-wp-style--order="state.<?php echo esc_attr( $kind ); ?>CityOrder"
				data-wp-class--sc-row-last="state.<?php echo esc_attr( $kind ); ?>CityIsRowLast"
				data-wp-bind--hidden="state.<?php echo esc_attr( $kind ); ?>CityHidden"
				data-wp-bind--disabled="state.<?php echo esc_attr( $kind ); ?>CityHidden"
				data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>CityRequired"
				data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.city"
				data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>CityError"
				aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-city"
				data-wp-on--input="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressCity"
				data-wp-on--blur="actions.flush<?php echo esc_attr( ucfirst( $kind ) ); ?>Address"
			/>
			<select
				name="<?php echo esc_attr( $kind ); ?>_state"
				class="<?php echo esc_attr( $class ); ?>__field"
				autocomplete="<?php echo esc_attr( $kind ); ?> address-level1"
				aria-label="<?php esc_attr_e( 'State', 'surecart' ); ?>"
				data-wp-bind--aria-label="state.<?php echo esc_attr( $kind ); ?>LabelState"
				data-wp-style--order="state.<?php echo esc_attr( $kind ); ?>StateOrder"
				data-wp-class--sc-row-last="state.<?php echo esc_attr( $kind ); ?>StateIsRowLast"
				data-wp-bind--hidden="state.<?php echo esc_attr( $kind ); ?>StateHidden"
				data-wp-bind--disabled="state.<?php echo esc_attr( $kind ); ?>StateHidden"
				data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>StateRequired"
				data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.state"
				data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>StateError"
				aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-state"
				data-wp-on--change="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressState"
			>
				<option value="" data-wp-text="state.<?php echo esc_attr( $kind ); ?>LabelState"><?php esc_html_e( 'State', 'surecart' ); ?></option>
				<template
					data-wp-each--region="state.<?php echo esc_attr( $kind ); ?>States"
					data-wp-each-key="context.region.value"
				>
					<option
						data-wp-bind--value="context.region.value"
						data-wp-text="context.region.label"
						data-wp-bind--selected="state.isStateSelectedFor<?php echo esc_attr( ucfirst( $kind ) ); ?>"
					></option>
				</template>
			</select>
			<input
				type="text"
				name="<?php echo esc_attr( $kind ); ?>_postal_code"
				class="<?php echo esc_attr( $class ); ?>__field"
				placeholder="<?php esc_attr_e( 'ZIP / Postal Code', 'surecart' ); ?>"
				data-wp-bind--placeholder="state.<?php echo esc_attr( $kind ); ?>LabelPostalCode"
				aria-label="<?php esc_attr_e( 'ZIP / Postal Code', 'surecart' ); ?>"
				data-wp-bind--aria-label="state.<?php echo esc_attr( $kind ); ?>LabelPostalCode"
				autocomplete="<?php echo esc_attr( $kind ); ?> postal-code"
				data-wp-style--order="state.<?php echo esc_attr( $kind ); ?>PostalOrder"
				data-wp-class--sc-row-last="state.<?php echo esc_attr( $kind ); ?>PostalIsRowLast"
				data-wp-bind--hidden="state.<?php echo esc_attr( $kind ); ?>PostalHidden"
				data-wp-bind--disabled="state.<?php echo esc_attr( $kind ); ?>PostalHidden"
				data-wp-bind--required="state.<?php echo esc_attr( $kind ); ?>PostalRequired"
				data-wp-bind--pattern="state.<?php echo esc_attr( $kind ); ?>PostalRegex"
				data-wp-bind--maxlength="state.<?php echo esc_attr( $kind ); ?>PostalMaxlength"
				data-wp-bind--value="state.<?php echo esc_attr( $kind ); ?>Address.postal_code"
				data-wp-bind--aria-invalid="state.has<?php echo esc_attr( ucfirst( $kind ) ); ?>PostalCodeError"
				aria-describedby="sc-<?php echo esc_attr( $kind ); ?>-error-postal-code"
				data-wp-on--input="actions.set<?php echo esc_attr( ucfirst( $kind ) ); ?>AddressPostalCode"
				data-wp-on--blur="actions.flush<?php echo esc_attr( ucfirst( $kind ) ); ?>Address"
			/>
		</div>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-city"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_city"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_city"
		></p>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-state"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_state"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_state"
		></p>
		<p
			id="sc-<?php echo esc_attr( $kind ); ?>-error-postal-code"
			class="<?php echo esc_attr( $class ); ?>__error"
			data-wp-bind--hidden="!state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_postal_code"
			data-wp-text="state.errorFieldErrors.<?php echo esc_attr( $kind ); ?>_postal_code"
		></p>
<?php
// phpcs:enable Generic.WhiteSpace.ScopeIndent
