<form <?php echo wp_kses_data( get_block_wrapper_attributes( [ 'class' => 'sc-saved-items-picker__new' ] ) ); ?> data-wp-interactive='{ "namespace": "surecart/saved-items" }' data-wp-bind--hidden="state.listsFull" data-wp-on--submit="actions.createPickerList">
	<input class="sc-form-control" type="text" maxlength="<?php echo (int) \SureCart\Models\SavedList::MAX_NAME_LENGTH; ?>" aria-label="<?php echo esc_attr( $placeholder ); ?>" placeholder="<?php echo esc_attr( $placeholder ); ?>" data-wp-bind--value="state.picker.newName" data-wp-on--input="actions.setPickerName" />
	<div class="wp-block-buttons">
		<div class="wp-block-button is-style-outline">
			<button type="submit" class="wp-block-button__link wp-element-button sc-button__link" data-wp-class--sc-button__link--busy="state.picker.creating" data-wp-bind--aria-busy="state.picker.creating">
				<span class="sc-spinner" aria-hidden="true"></span>
				<span class="sc-button__link-text"><?php echo esc_html( $button_text ); ?></span>
			</button>
		</div>
	</div>
</form>
