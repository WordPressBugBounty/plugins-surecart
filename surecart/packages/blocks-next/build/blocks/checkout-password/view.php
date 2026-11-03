<?php
/**
 * New-account password: `actions.setPassword` (debounced) on input, `actions.flushPassword` on
 * blur.
 */

// No `label` default in block.json on purpose — a default there ships an
// untranslated string. The fallback belongs here, in PHP, where `__()` works.
$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Set A Password', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Choose a password', 'surecart' );
$help        = $attributes['help'] ?? '';
$required    = ! empty( $attributes['required'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size        = $attributes['size'] ?? 'medium';

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--password is-size-' . esc_attr( $size ) )
);
?>
<?php
// controller.php refuses to render for a logged-in user; this bind covers a login mid-checkout
// (the email block's login card flips state.loggedIn).
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?> data-wp-bind--hidden="state.loggedIn">
	<?php // Hidden, not omitted: the placeholder alone is not a reliable name. ?>
	<label for="sc-checkout-password" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
		<?php echo esc_html( $label ); ?>
		<?php if ( $required ) : ?><span class="sc-form-label__required" aria-hidden="true">*</span><?php endif; ?>
	</label>
	<div class="sc-checkout-password__input-wrap">
		<input
			id="sc-checkout-password"
			type="password"
			name="password"
			class="sc-form-control"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			<?php // `new-password` stops autofill of saved credentials and offers a generator. ?>
			autocomplete="new-password"
			<?php // Assistive tech only; the form is `novalidate`, validateLocal enforces it. ?>
			<?php echo $required ? 'required' : ''; ?>
			<?php
			// A seeded string, never a getter: an unresolvable bind drops the attribute
			// server-side, and a type-less input renders as plaintext.
			?>
			data-wp-bind--type="state.passwordInputType"
			<?php // Boolean — binding the message string here would emit an invalid ARIA token. ?>
			data-wp-bind--aria-invalid="state.hasPasswordError"
			aria-describedby="sc-checkout-password-error<?php echo $help ? ' sc-checkout-password-help' : ''; ?>"
			data-wp-on--keyup="actions.setPassword"
			data-wp-on--change="actions.setPassword"
			data-wp-on--blur="actions.flushPassword"
		/>
		<button
			type="button"
			class="sc-checkout-password__reveal"
			aria-controls="sc-checkout-password"
			aria-label="<?php esc_attr_e( 'Show password', 'surecart' ); ?>"
			data-wp-bind--aria-pressed="state.passwordVisible"
			data-wp-on--click="actions.togglePasswordVisible"
		>
			<?php // Directives can't sit on <svg>; the spans carry the binds. ?>
			<span data-wp-bind--hidden="state.passwordVisible" aria-hidden="true">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
			</span>
			<span data-wp-bind--hidden="!state.passwordVisible" aria-hidden="true" hidden>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false"><path d="M10.7 5.1A9.9 9.9 0 0 1 12 5c6.4 0 10 7 10 7a17.6 17.6 0 0 1-2.2 3.2M6.6 6.6A17.6 17.6 0 0 0 2 12s3.6 7 10 7a9.9 9.9 0 0 0 4.2-.9"></path><path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"></path><line x1="2" y1="2" x2="22" y2="22"></line></svg>
			</span>
		</button>
	</div>
	<?php
	// Live strength hint (min 6 chars + one special character). Empty while
	// `surecart_password_validation_enabled` is off.
	?>
	<small class="sc-checkout-password__hint" role="status" data-wp-bind--hidden="!state.passwordHint" data-wp-text="state.passwordHint" hidden></small>
	<?php if ( $help ) : ?>
		<p id="sc-checkout-password-help" class="sc-form-help" data-wp-bind--hidden="state.hasPasswordError"><?php echo esc_html( $help ); ?></p>
	<?php endif; ?>
	<p id="sc-checkout-password-error" class="sc-form-error" data-wp-bind--hidden="!state.hasPasswordError" data-wp-text="state.errorFieldErrors.password" hidden></p>
</div>
