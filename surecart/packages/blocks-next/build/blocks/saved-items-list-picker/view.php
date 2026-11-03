<div <?php echo wp_kses_data( get_block_wrapper_attributes( [ 'class' => 'sc-saved-items-picker' ] ) ); ?> data-wp-interactive='{ "namespace": "surecart/saved-items" }'>
	<ul class="sc-saved-items-picker__lists" data-wp-bind--aria-busy="state.picker.busy">
		<template data-wp-each--list="state.pickerLists" data-wp-each-key="context.list.key">
			<li data-wp-class--is-pending="context.list.pending">
				<label class="sc-form-check">
					<input type="checkbox" class="sc-check-input" data-wp-bind--checked="context.list.checked" data-wp-bind--aria-disabled="state.picker.busy" data-wp-on--change="actions.togglePickerList" />
					<span class="sc-saved-items-picker__name" data-wp-text="context.list.name"></span>
					<span class="sc-spinner" aria-hidden="true" data-wp-bind--hidden="!context.list.pending" hidden></span>
					<?php // "Gift ideas, 3 items" to a screen reader, not "Gift ideas 3". ?>
					<span class="sc-saved-items-picker__count" aria-hidden="true" data-wp-bind--hidden="context.list.pending" data-wp-text="context.list.count"></span>
					<span class="sc-screen-reader-text" data-wp-text="context.list.countLabel"></span>
				</label>
			</li>
		</template>
	</ul>
	<p class="sc-saved-items-dialog__note" role="status" data-wp-text="state.pickerStatus"></p>
	<p class="sc-saved-items-dialog__error" role="alert" data-wp-text="state.picker.error"></p>
</div>
