<?php
/**
 * "Continue setup" bar shown above SureCart admin screens until the setup guide is done.
 *
 * @package SureCart
 */

$bar = \SureCart::setupGuide()->bar();
if ( empty( $bar ) ) {
	return;
}
?>
<style>
	/*
	 * Not dismissible by design: it is the only persistent signal that setup is
	 * unfinished (or that the claim window expired), and it goes away once the
	 * sixth step lands or the merchant hides the setup guide (the expired prompt stays).
	 */
	.sc-setup-bar {
		box-sizing: border-box;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		gap: 0.5rem 1rem;
		padding: 0.5rem 1.25rem;
		/* SureCart's brand green, as the onboarding and setup guide buttons use. */
		background: var(--sc-color-brand-primary, #388051);
		color: #fff;
		font-size: 0.75rem;
		line-height: 1.125rem;
		text-decoration: none;
		transition: background-color 160ms cubic-bezier(0.23, 1, 0.32, 1);
	}

	/* In #wpcontent (in_admin_header), bleed over its inline-start padding like #sc-admin-header does. */
	#wpcontent > .sc-setup-bar {
		width: calc(100% + 20px);
		margin-inline-start: -20px;
	}

	.sc-setup-bar[hidden] {
		display: none;
	}

	/* WP core link states would otherwise recolor the text and add a blue focus ring. */
	.sc-setup-bar:hover,
	.sc-setup-bar:focus,
	.sc-setup-bar:visited {
		color: #fff;
		box-shadow: none;
	}

	.sc-setup-bar:focus-visible {
		outline: 2px solid #fff;
		outline-offset: -3px;
	}

	.sc-setup-bar strong {
		font-weight: 600;
	}

	.sc-setup-bar-cta {
		display: inline-flex;
		align-items: center;
		gap: 0.25rem;
		font-weight: 500;
	}

	.sc-setup-bar-cta svg {
		transition: translate 160ms cubic-bezier(0.23, 1, 0.32, 1);
	}

	/* The arrow points along the reading direction. */
	[dir="rtl"] .sc-setup-bar-cta svg {
		scale: -1 1;
	}

	@media (hover: hover) {
		.sc-setup-bar:hover {
			background: color-mix(in srgb, var(--sc-color-brand-primary, #388051) 88%, #000);
		}

		.sc-setup-bar:hover .sc-setup-bar-cta svg {
			translate: 2px 0;
		}

		[dir="rtl"] .sc-setup-bar:hover .sc-setup-bar-cta svg {
			translate: -2px 0;
		}
	}

	/* An expired claim is a problem to resolve, not progress, so it reads as a warning (WP notice palette). */
	.sc-setup-bar[data-expired],
	.sc-setup-bar[data-expired]:hover,
	.sc-setup-bar[data-expired]:focus,
	.sc-setup-bar[data-expired]:visited {
		background: #fcf9e8;
		color: #1e1e1e;
		border-bottom: 1px solid #dba617;
	}

	.sc-setup-bar[data-expired]:focus-visible {
		outline-color: currentColor;
	}

	@media (hover: hover) {
		.sc-setup-bar[data-expired]:hover {
			background: #f5e6ab;
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.sc-setup-bar,
		.sc-setup-bar-cta svg {
			transition: none;
		}
	}
</style>
<?php if ( ! empty( $bar['expired'] ) ) : ?>
<a class="sc-setup-bar" id="sc-setup-bar" href="https://surecart.com/support/" target="_blank" rel="noopener noreferrer" data-expired<?php echo ! empty( $bar['hidden'] ) ? ' hidden' : ''; ?>>
	<span class="sc-setup-bar-text">
		<?php esc_html_e( 'The setup window for your store has expired, so it can’t be connected or go live yet. Contact support to finish setting it up.', 'surecart' ); ?>
	</span>
	<span class="sc-setup-bar-cta">
		<?php esc_html_e( 'Contact support', 'surecart' ); ?>
		<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'surecart' ); ?></span>
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
	</span>
</a>
<?php else : ?>
<a class="sc-setup-bar" id="sc-setup-bar" href="<?php echo esc_url( admin_url( 'admin.php?page=sc-setup-guide&from=setup_bar' ) ); ?>"<?php echo ! empty( $bar['hidden'] ) ? ' hidden' : ''; ?>>
	<span class="sc-setup-bar-text">
		<strong>
		<?php
			/* translators: 1: completed setup steps, 2: total setup steps (both formatted numbers). */
			echo esc_html( sprintf( _x( '%1$s of %2$s', 'setup steps progress', 'surecart' ), number_format_i18n( (int) $bar['done'] ), number_format_i18n( (int) $bar['total'] ) ) );
		?>
		</strong>
		&middot; <?php esc_html_e( 'Setting up your store', 'surecart' ); ?>
	</span>
	<span class="sc-setup-bar-cta">
		<?php esc_html_e( 'Continue setup', 'surecart' ); ?>
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
	</span>
</a>
<?php endif; ?>
