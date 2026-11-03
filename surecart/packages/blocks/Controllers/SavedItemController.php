<?php
namespace SureCartBlocks\Controllers;

/**
 * Customer dashboard "Saved" tab.
 *
 * The list itself is the next-gen `surecart/customer-saved-items` block, shared with the Saved Items page.
 */
class SavedItemController extends BaseController {
	/**
	 * Breadcrumbs plus the shared Saved Items list block.
	 *
	 * @return string
	 */
	public function index() {
		ob_start();
		?>
		<sc-spacing style="--spacing: var(--sc-spacing-large)">
			<sc-breadcrumbs>
				<sc-breadcrumb href="<?php echo esc_url( add_query_arg( [ 'tab' => $this->getTab() ], remove_query_arg( array_keys( $_GET ) ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>">
					<?php esc_html_e( 'Dashboard', 'surecart' ); ?>
				</sc-breadcrumb>
				<sc-breadcrumb>
					<?php esc_html_e( 'Saved', 'surecart' ); ?>
				</sc-breadcrumb>
			</sc-breadcrumbs>

			<?php echo do_blocks( '<!-- wp:surecart/customer-saved-items {"show_all":true} /-->' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</sc-spacing>
		<?php
		return ob_get_clean();
	}
}
