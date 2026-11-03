<?php
use SureCart\SavedItems\SavedItemsList;

$more_icon = wp_kses( SureCart::svg()->get( 'more-horizontal', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() );
?>
<div
	<?php echo wp_kses_data( get_block_wrapper_attributes( [ 'class' => 'sc-saved-items' ] ) ); ?>
	data-wp-interactive='{ "namespace": "surecart/saved-items" }'
	<?php // The cart's "Save for later" asks it to reload its rows, since they render once. ?>
	data-wp-on--surecart-saved-items-refresh="actions.refreshRows"
	<?php
	echo wp_kses_data(
		wp_interactivity_data_wp_context(
			[
				'rows'    => $rows,
				'loading' => $is_guest && $show_all,
				'formId'  => $form_id,
				'mode'    => \SureCart\Models\Form::getMode( $form_id ),
				'lists'   => $lists,
				'counts'  => (object) $counts,
				'active'  => $active,
				'paged'   => $total_pages > 1,
				'total'   => $data['total'] ?? 0,
				'items'   => $data['items'] ?? null,
				// The header action running on the selection: 'remove', 'cart' or ''.
				'bulk'    => '',
			]
		)
	);
	?>
	<?php if ( $is_guest && $show_all ) : ?>
		data-wp-init="callbacks.loadGuestRows"
	<?php elseif ( $lists ) : ?>
		data-wp-init="callbacks.seedItems"
	<?php endif; ?>
	data-wp-bind--aria-busy="context.loading"
	<?php // Focus lands here when the last row is removed. ?>
	tabindex="-1"
>
	<?php if ( $login ) : ?>
		<div class="sc-alert sc-alert__alert--info sc-saved-items__notice">
			<div class="sc-alert__text">
				<?php
				// One string, so translators can move the link within the sentence.
				echo wp_kses(
					sprintf(
						/* translators: %s: sign-in URL */
						__( 'Your list is saved on this device only. <a href="%s">Sign in</a> to keep it on every device.', 'surecart' ),
						esc_url( $login )
					),
					[ 'a' => [ 'href' => [] ] ]
				);
				?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $heading || $view_all ) : ?>
		<div class="sc-saved-items__heading">
			<h2 class="sc-saved-items__heading-title"><?php echo wp_kses_post( $heading ); ?></h2>
			<?php if ( $view_all ) : ?>
				<a class="sc-saved-items__view-all" href="<?php echo esc_url( $view_all ); ?>">
					<?php esc_html_e( 'View all', 'surecart' ); ?>
					<?php echo wp_kses( SureCart::svg()->get( 'chevron-right', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
				</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( $error ) : ?>
		<div class="sc-alert sc-alert__alert--danger" role="alert">
			<div class="sc-alert__text"><?php echo esc_html( $error ); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $lists ) : ?>
	<div class="sc-saved-items__layout">
		<nav class="sc-saved-items__nav" aria-labelledby="sc-saved-items-lists-label">
			<p class="sc-saved-items__nav-label" id="sc-saved-items-lists-label"><?php esc_html_e( 'Lists', 'surecart' ); ?></p>
			<ul>
				<?php foreach ( $lists as $list ) : ?>
					<li>
						<a href="<?php echo esc_url( SavedItemsList::listUrl( $list['id'] ) ); ?>" <?php echo $list['id'] === $active ? 'aria-current="page"' : ''; ?>>
							<span class="sc-saved-items__nav-name"><?php echo esc_html( $list['name'] ); ?></span>
							<span class="sc-saved-items__nav-count" <?php echo wp_kses_data( wp_interactivity_data_wp_context( [ 'nav' => SavedItemsList::listKey( $list['id'] ) ] ) ); ?> data-wp-text="state.navCount"></span>
						</a>
					</li>
				<?php endforeach; ?>
				<?php // The cap counts the default list too. ?>
				<?php if ( count( $lists ) < \SureCart\Models\SavedList::MAX_PER_CUSTOMER ) : ?>
					<li>
						<button type="button" class="sc-saved-items__nav-new" data-wp-context='{ "dialogMode": "create" }' data-wp-on--click="actions.openListDialog">
							<?php esc_html_e( '+ New list', 'surecart' ); ?>
						</button>
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<div class="sc-saved-items__content">
			<div class="sc-saved-items__header">
				<div>
					<div class="sc-saved-items__title-row" <?php echo wp_kses_data( wp_interactivity_data_wp_context( [ 'listId' => $active, 'listName' => SavedItemsList::listName( $lists, $active ) ] ) ); ?>>
						<h2 class="sc-saved-items__title"><?php echo esc_html( SavedItemsList::listName( $lists, $active ) ); ?></h2>
						<?php if ( $active ) : ?>
							<?php // A disclosure of plain buttons: Tab, Enter and Space work natively; Escape and outside clicks close it. ?>
							<div class="sc-dropdown sc-saved-items__menu" data-wp-context='{ "menuOpen": false }' data-wp-on-window--click="callbacks.closeMenu" data-wp-on-window--focusin="callbacks.closeMenu" data-wp-on-window--keydown="callbacks.closeMenu">
								<button type="button" class="sc-saved-items__menu-trigger" data-wp-bind--aria-expanded="context.menuOpen" data-wp-on--click="actions.toggleMenu" aria-expanded="false" aria-label="<?php esc_attr_e( 'List actions', 'surecart' ); ?>">
									<?php echo $more_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- kses above. ?>
								</button>
								<div class="sc-dropdown__panel" data-wp-bind--hidden="!context.menuOpen" hidden>
									<button type="button" class="sc-dropdown__menu-item" data-wp-context='{ "dialogMode": "rename" }' data-wp-on--click="actions.openListDialog"><?php esc_html_e( 'Rename list', 'surecart' ); ?></button>
									<button type="button" class="sc-dropdown__menu-item is-danger" data-wp-context='{ "dialogMode": "delete" }' data-wp-on--click="actions.openListDialog"><?php esc_html_e( 'Delete list', 'surecart' ); ?></button>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<?php // The empty card already says so; "0 items" would repeat it. ?>
					<p class="sc-saved-items__count" data-wp-text="state.activeCountLabel" data-wp-bind--hidden="state.isEmpty"></p>
				</div>
				<?php // `wp-block-buttons`: themes scope their button styles (e.g. outline colours) to core's container. ?>
				<div class="sc-saved-items__header-actions wp-block-buttons">
					<?php // What to do with the selection; hidden until something is selected. ?>
					<div class="sc-dropdown" data-wp-bind--hidden="!state.canMoveSelection" data-wp-context='{ "menuOpen": false, "pending": "" }' data-wp-on-window--click="callbacks.closeMenu" data-wp-on-window--focusin="callbacks.closeMenu" data-wp-on-window--keydown="callbacks.closeMenu" hidden>
						<div class="wp-block-button is-style-outline">
							<button type="button" class="wp-block-button__link wp-element-button" data-wp-bind--aria-expanded="context.menuOpen" data-wp-bind--aria-disabled="state.listBusy" data-wp-on--click="actions.toggleMenu" aria-expanded="false"><?php esc_html_e( 'Move to list', 'surecart' ); ?></button>
						</div>
						<div class="sc-dropdown__panel sc-dropdown__panel--right" data-wp-bind--hidden="!context.menuOpen" data-wp-bind--aria-busy="state.menuBusy" hidden>
							<template data-wp-each--target="state.bulkTargets" data-wp-each-key="context.target.key">
								<button type="button" class="sc-dropdown__menu-item" data-wp-on--click="actions.moveSelected" data-wp-bind--aria-disabled="state.menuBusy" data-wp-class--is-pending="state.menuItemPending">
									<span data-wp-text="context.target.name"></span>
									<span class="sc-spinner" aria-hidden="true" data-wp-bind--hidden="!state.menuItemPending" hidden></span>
								</button>
							</template>
						</div>
					</div>
					<div class="wp-block-button is-style-outline" data-wp-bind--hidden="!state.hasSelection" hidden>
						<button type="button" class="wp-block-button__link wp-element-button sc-button__link" data-wp-on--click="actions.removeSelected" data-wp-bind--aria-disabled="state.listBusy" data-wp-class--sc-button__link--busy="state.removingSelected" data-wp-bind--aria-busy="state.removingSelected">
							<span class="sc-spinner" aria-hidden="true"></span>
							<span class="sc-button__link-text"><?php esc_html_e( 'Remove', 'surecart' ); ?></span>
						</button>
					</div>
					<?php // The page's one filled button: the selected rows that can go to the cart, or all of them. ?>
					<div class="wp-block-button" data-wp-bind--hidden="!state.canMoveAll">
						<button type="button" class="wp-block-button__link wp-element-button sc-button__link" data-wp-on--click="actions.moveAllToCart" data-wp-bind--aria-disabled="state.listBusy" data-wp-class--sc-button__link--busy="state.movingAllToCart" data-wp-bind--aria-busy="state.movingAllToCart">
							<span class="sc-spinner" aria-hidden="true"></span>
							<span class="sc-button__link-text" data-wp-text="state.moveAllLabel"></span>
						</button>
					</div>
				</div>
			</div>
	<?php endif; ?>

	<?php // Other lists may still hold items, so only say "nothing saved" when that's true. ?>
	<?php $list_empty = $active || $total; ?>
	<div class="sc-saved-items__card sc-saved-items__empty" data-wp-bind--hidden="!state.isEmpty">
		<span class="sc-saved-items__empty-badge" aria-hidden="true">
			<?php echo wp_kses( SureCart::svg()->get( $list_empty ? 'list' : 'heart', [ 'class' => 'sc-saved-items__empty-icon' ] ), sc_allowed_svg_html() ); ?>
		</span>
		<h3 class="sc-saved-items__empty-title">
			<?php echo esc_html( $list_empty ? __( 'This list is empty', 'surecart' ) : __( 'Nothing saved yet', 'surecart' ) ); ?>
		</h3>
		<p>
			<?php
			echo esc_html(
				$list_empty
					? __( 'Move saved items here from the menu on any item.', 'surecart' )
					: __( 'Tap the heart on any product to save it for later.', 'surecart' )
			);
			?>
		</p>
		<div class="wp-block-buttons">
			<div class="wp-block-button">
				<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \SureCart::pages()->url( 'shop' ) ); ?>"><?php esc_html_e( 'Browse products', 'surecart' ); ?></a>
			</div>
		</div>
	</div>

	<?php if ( $is_guest && $show_all ) : ?>
		<?php // A guest's rows load after render; hold their place meanwhile. The wrapper's aria-busy tells screen readers. ?>
		<div class="sc-saved-items__card sc-saved-items__loading" data-wp-bind--hidden="!context.loading" aria-hidden="true">
			<ul class="sc-saved-items__rows">
				<?php for ( $i = 0; $i < 2; $i++ ) : ?>
					<li class="sc-saved-items__row">
						<div class="sc-saved-items__product">
							<span class="sc-saved-items__image"></span>
							<div class="sc-saved-items__details">
								<span class="sc-saved-items__skeleton"></span>
								<span class="sc-saved-items__skeleton is-short"></span>
							</div>
						</div>
					</li>
				<?php endfor; ?>
			</ul>
		</div>
	<?php endif; ?>

	<div class="sc-saved-items__card" data-wp-bind--hidden="!state.hasRows">
		<?php if ( $lists ) : ?>
			<div class="sc-saved-items__bulk">
				<label class="sc-saved-items__select-all">
					<?php // Named for what it does; the visible text turns into a count once rows are selected. ?>
					<input type="checkbox" class="sc-saved-items__select" aria-label="<?php esc_attr_e( 'Select all', 'surecart' ); ?>" data-wp-bind--checked="state.allSelected" data-wp-bind--indeterminate="state.someSelected" data-wp-on--change="actions.toggleAllSelected" />
					<span data-wp-text="state.selectionLabel"></span>
				</label>
				<button type="button" class="sc-saved-items__clear" data-wp-bind--hidden="!state.hasSelection" data-wp-on--click="actions.clearSelection" hidden><?php esc_html_e( 'Clear', 'surecart' ); ?></button>
			</div>
		<?php endif; ?>

		<ul class="sc-saved-items__rows">
			<template data-wp-each--row="context.rows" data-wp-each-key="context.row.key">
				<li class="sc-saved-items__row" data-wp-class--is-unavailable="context.row.unavailable">
					<div class="sc-saved-items__product">
						<?php if ( $lists ) : ?>
							<input type="checkbox" class="sc-saved-items__select" data-wp-bind--checked="context.row.selected" data-wp-bind--disabled="context.row.busy" data-wp-bind--aria-label="context.row.selectLabel" data-wp-on--change="actions.toggleRowSelected" />
						<?php endif; ?>
						<img class="sc-saved-items__image" data-wp-bind--src="context.row.image" data-wp-bind--hidden="!context.row.image" alt="" width="56" height="56" loading="lazy" />
						<div class="sc-saved-items__details">
							<a class="sc-saved-items__name" data-wp-bind--href="context.row.url" data-wp-bind--hidden="!context.row.url" data-wp-text="context.row.name"></a>
							<strong class="sc-saved-items__name" data-wp-bind--hidden="context.row.url" data-wp-text="context.row.name"></strong>
							<span class="sc-saved-items__meta" data-wp-bind--hidden="!context.row.meta" data-wp-text="context.row.meta"></span>
							<span class="sc-tag sc-tag--default sc-tag--small" data-wp-bind--hidden="!context.row.unavailable"><?php esc_html_e( 'Unavailable', 'surecart' ); ?></span>
							<span class="sc-tag sc-tag--default sc-tag--small" data-wp-bind--hidden="!context.row.soldOut"><?php esc_html_e( 'Sold out', 'surecart' ); ?></span>
							<span class="sc-tag sc-tag--info sc-tag--small" data-wp-bind--hidden="!context.row.priceChanged"><?php esc_html_e( 'Price changed', 'surecart' ); ?></span>
						</div>
					</div>

					<div class="sc-saved-items__actions wp-block-buttons">
						<?php // Outline: the page's only filled button is "Move N available to cart". ?>
						<div class="wp-block-button is-style-outline" data-wp-bind--hidden="!context.row.canMove">
							<button type="button" class="wp-block-button__link wp-element-button sc-button__link" data-wp-on--click="actions.moveToCart" data-wp-bind--aria-disabled="context.row.busy" data-wp-bind--aria-busy="context.row.toCart" data-wp-class--sc-button__link--busy="context.row.toCart">
								<span class="sc-spinner" aria-hidden="true"></span>
								<span class="sc-button__link-text"><?php esc_html_e( 'Move to cart', 'surecart' ); ?></span>
							</button>
						</div>
						<div class="wp-block-button is-style-outline" data-wp-bind--hidden="!state.showBuyNow">
							<a class="wp-block-button__link wp-element-button" data-wp-bind--href="context.row.buyUrl"><?php esc_html_e( 'Buy now', 'surecart' ); ?></a>
						</div>
						<div class="wp-block-button is-style-outline" data-wp-bind--hidden="!state.showRowLink">
							<a class="wp-block-button__link wp-element-button" data-wp-bind--href="context.row.url" data-wp-text="context.row.linkLabel"></a>
						</div>
						<div class="sc-dropdown sc-saved-items__menu" data-wp-context='{ "menuOpen": false, "pending": "" }' data-wp-on-window--click="callbacks.closeMenu" data-wp-on-window--focusin="callbacks.closeMenu" data-wp-on-window--keydown="callbacks.closeMenu">
							<button type="button" class="sc-saved-items__menu-trigger" data-wp-bind--aria-expanded="context.menuOpen" data-wp-on--click="actions.toggleMenu" data-wp-bind--aria-label="context.row.menuLabel" aria-expanded="false">
								<?php echo $more_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- kses above. ?>
							</button>
							<div class="sc-dropdown__panel sc-dropdown__panel--right" data-wp-bind--hidden="!context.menuOpen" data-wp-bind--aria-busy="state.menuBusy" hidden>
								<?php // Its own box, so the each-rendered items never sit beside Remove in one child list. ?>
								<div data-wp-bind--hidden="!state.moveTargets.length">
									<p class="sc-saved-items__menu-label"><?php esc_html_e( 'Move to list', 'surecart' ); ?></p>
									<template data-wp-each--target="state.moveTargets" data-wp-each-key="context.target.key">
										<button type="button" class="sc-dropdown__menu-item" data-wp-on--click="actions.moveSaved" data-wp-bind--aria-disabled="state.menuBusy" data-wp-class--is-pending="state.menuItemPending">
											<span data-wp-text="context.target.name"></span>
											<span class="sc-spinner" aria-hidden="true" data-wp-bind--hidden="!state.menuItemPending" hidden></span>
										</button>
									</template>
								</div>
								<button type="button" class="sc-dropdown__menu-item is-danger" data-wp-on--click="actions.removeSaved" data-wp-bind--aria-disabled="state.menuBusy" data-wp-class--is-pending="state.menuItemPending">
									<span><?php esc_html_e( 'Remove', 'surecart' ); ?></span>
									<span class="sc-spinner" aria-hidden="true" data-wp-bind--hidden="!state.menuItemPending" hidden></span>
								</button>
							</div>
						</div>
					</div>
				</li>
			</template>
		</ul>
	</div>

	<?php if ( $total_pages > 1 ) : ?>
		<div class="sc-saved-items__pagination">
			<span><?php echo esc_html( sprintf( /* translators: 1: current page, 2: total pages */ __( 'Page %1$d of %2$d', 'surecart' ), $page, $total_pages ) ); ?></span>
			<div class="wp-block-buttons">
				<?php
				foreach ( [
					[ __( 'Previous', 'surecart' ), $page - 1, $page > 1 ],
					[ __( 'Next', 'surecart' ), $page + 1, $page < $total_pages ],
				] as [ $label, $target, $enabled ] ) :
					?>
					<div class="wp-block-button is-style-outline">
						<?php if ( $enabled ) : ?>
							<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( SavedItemsList::pageUrl( $target ) ); ?>"><?php echo esc_html( $label ); ?></a>
						<?php else : ?>
							<span class="wp-block-button__link wp-element-button" aria-disabled="true"><?php echo esc_html( $label ); ?></span>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $lists ) : ?>
		</div>
	</div>

	<?php // New / rename / delete list. Only this page opens it, so it isn't printed site-wide with the toast. ?>
	<dialog
		id="sc-saved-items-list-dialog"
		class="sc-dialog sc-saved-items-dialog"
		aria-labelledby="sc-saved-items-list-dialog-title"
		aria-describedby="sc-saved-items-list-dialog-note"
		data-wp-on--click="actions.closeOnBackdrop"
	>
		<form data-wp-on--submit="actions.submitListDialog">
			<div class="sc-saved-items-dialog__header">
				<h2 class="sc-saved-items-dialog__title" id="sc-saved-items-list-dialog-title" data-wp-text="state.listDialogTitle"></h2>
				<button type="button" class="sc-saved-items-dialog__close" aria-label="<?php esc_attr_e( 'Close', 'surecart' ); ?>" data-wp-on--click="actions.closeDialog">
					<?php echo wp_kses( SureCart::svg()->get( 'x', [ 'aria-hidden' => 'true' ] ), sc_allowed_svg_html() ); ?>
				</button>
			</div>

			<p class="sc-saved-items-dialog__note" id="sc-saved-items-list-dialog-note" data-wp-bind--hidden="!state.listDialogIsDelete" data-wp-text="state.listDialogMessage"></p>
			<div data-wp-bind--hidden="state.listDialogIsDelete">
				<label class="sc-saved-items-dialog__label" for="sc-saved-items-list-name"><?php esc_html_e( 'List name', 'surecart' ); ?></label>
				<input id="sc-saved-items-list-name" class="sc-form-control" type="text" maxlength="<?php echo (int) \SureCart\Models\SavedList::MAX_NAME_LENGTH; ?>" autofocus placeholder="<?php esc_attr_e( 'e.g. Gift ideas', 'surecart' ); ?>" data-wp-bind--value="state.listDialog.name" data-wp-on--input="actions.setListName" />
			</div>
			<p class="sc-saved-items-dialog__error" role="alert" data-wp-text="state.listDialog.error"></p>

			<div class="sc-saved-items-dialog__footer wp-block-buttons">
				<div class="wp-block-button is-style-outline">
					<button type="button" class="wp-block-button__link wp-element-button" data-sc-cancel data-wp-on--click="actions.closeDialog"><?php esc_html_e( 'Cancel', 'surecart' ); ?></button>
				</div>
				<?php // Theme's filled button; red only for a delete, where the colour is the warning. ?>
				<div class="wp-block-button" data-wp-class--is-danger="state.listDialogIsDelete">
					<button type="submit" class="wp-block-button__link wp-element-button sc-button__link" data-wp-class--sc-button__link--busy="state.listDialog.busy" data-wp-bind--aria-busy="state.listDialog.busy">
						<span class="sc-spinner" aria-hidden="true"></span>
						<span class="sc-button__link-text" data-wp-text="state.listDialogSubmit"></span>
					</button>
				</div>
			</div>
		</form>
	</dialog>
	<?php endif; ?>
</div>
