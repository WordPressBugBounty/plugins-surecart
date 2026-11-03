<?php
/**
 * Email input, login card (code/password) and logged-in identity card all render; store getters
 * toggle them with `data-wp-bind--hidden`, the PHP only pre-paints the initial one.
 */

$label       = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Email', 'surecart' );
$placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Your email address', 'surecart' );
$help        = $attributes['help'] ?? '';
$required    = true; // Every checkout needs an email, so this is not a setting.
$auto_focus  = ! empty( $attributes['autoFocus'] );
$show_label  = ! isset( $attributes['showLabel'] ) || ! empty( $attributes['showLabel'] );
$size        = $attributes['size'] ?? 'medium';

// Prefill from the logged-in user so the field has a value before JS runs.
$initial_email = '';
$current_user  = wp_get_current_user();
if ( $current_user && ! empty( $current_user->user_email ) ) {
	$initial_email = $current_user->user_email;
}

$wrapper_attrs = get_block_wrapper_attributes(
	array( 'class' => 'sc-form-group sc-checkout-field sc-checkout-field--email is-size-' . esc_attr( $size ) )
);
?>
<div <?php echo wp_kses_data( $wrapper_attrs ); ?>>

	<?php /* A. Bare email input. */ ?>
	<div data-wp-bind--hidden="!state.showEmailInput">
		<?php // Hidden, not omitted: the placeholder alone is not a reliable name. ?>
		<label for="sc-checkout-email" class="sc-form-label<?php echo $show_label ? '' : ' sc-screen-reader-text'; ?>">
			<?php echo esc_html( $label ); ?>
			<?php if ( $required ) : ?><span class="sc-form-label__required" aria-hidden="true">*</span><?php endif; ?>
		</label>
		<div class="sc-checkout-login__input-wrap">
			<input
				id="sc-checkout-email"
				type="email"
				name="email"
				class="sc-form-control"
				placeholder="<?php echo esc_attr( $placeholder ); ?>"
				autocomplete="email"
				inputmode="email"
				pattern="[^\s@]+@[^\s@]+\.[^\s@]+"
				value="<?php echo esc_attr( $initial_email ); ?>"
				<?php echo $required ? 'required' : ''; ?>
				<?php echo $auto_focus ? 'autofocus' : ''; ?>
				data-wp-bind--disabled="!state.showEmailInput"
				data-wp-bind--value="state.customerEmail"
				data-wp-bind--aria-invalid="state.hasEmailError"
				aria-describedby="sc-checkout-email-error<?php echo $help ? ' sc-checkout-email-help' : ''; ?>"
				data-wp-on--keyup="actions.setEmail"
				data-wp-on--change="actions.setEmail"
				data-wp-on--blur="actions.flushEmail"
			/>
			<span class="sc-checkout-login__spinner sc-checkout-login__input-loader" aria-hidden="true" data-wp-bind--hidden="!state.loginBusy" hidden></span>
		</div>
		<?php if ( $help ) : ?>
			<p id="sc-checkout-email-help" class="sc-form-help" data-wp-bind--hidden="state.hasEmailError"><?php echo esc_html( $help ); ?></p>
		<?php endif; ?>
		<p id="sc-checkout-email-error" class="sc-form-error" data-wp-bind--hidden="!state.hasEmailError" data-wp-text="state.errorFieldErrors.email" hidden></p>
	</div>

	<?php /* B. Login card (code + password views). */ ?>
	<div class="sc-checkout-login" data-wp-bind--hidden="!state.showLoginCard">

		<?php /* Sent-info header: icon + "{headline} {email}" + Change link. */ ?>
		<div class="sc-checkout-login__sent-info">
			<svg class="sc-checkout-login__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
			<span>
				<span data-wp-text="state.loginHeadline"></span>
				<strong class="sc-checkout-login__sent-email" data-wp-text="state.customerEmail"></strong>
			</span>
			<button type="button" class="sc-button-reset sc-button-unstyled sc-checkout-login__change-link" data-wp-on--click="actions.changeEmail">
				<?php esc_html_e( 'Change', 'surecart' ); ?>
			</button>
		</div>

		<?php /* Code view. */ ?>
		<div class="sc-checkout-login__code-view" data-wp-bind--hidden="!state.isCodeMode">
			<div class="sc-checkout-login__code">
				<?php for ( $i = 0; $i < 6; $i++ ) : ?>
					<?php if ( 3 === $i ) : ?>
						<span class="sc-checkout-login__separator" aria-hidden="true">&mdash;</span>
					<?php endif; ?>
					<input
						type="text"
						class="sc-form-control sc-checkout-login__code-box"
						data-code-index="<?php echo esc_attr( $i ); ?>"
						inputmode="numeric"
						pattern="[0-9]*"
						maxlength="1"
						<?php echo 0 === $i ? 'autocomplete="one-time-code"' : ''; ?>
						aria-label="<?php echo esc_attr( sprintf( /* translators: %1$d: box number, %2$d: total. */ __( 'Verification code %1$d of %2$d', 'surecart' ), $i + 1, 6 ) ); ?>"
						data-wp-context='{ "index": <?php echo (int) $i; ?> }'
						data-wp-bind--value="state.codeDigits.<?php echo (int) $i; ?>"
						data-wp-on--input="actions.onCodeInput"
						data-wp-on--keydown="actions.onCodeKeydown"
					/>
				<?php endfor; ?>
			</div>

			<?php /* No speak() in module context; role="status" announces the unhide. */ ?>
			<div class="sc-checkout-login__verifying" role="status" data-wp-bind--hidden="!state.isVerifying">
				<span class="sc-checkout-login__spinner" aria-hidden="true"></span>
				<span><?php esc_html_e( 'Verifying...', 'surecart' ); ?></span>
			</div>

			<?php /* Expired notice. */ ?>
			<p class="sc-checkout-login__expired" role="alert" data-wp-bind--hidden="!state.isCodeExpired">
				<?php esc_html_e( 'Code expired.', 'surecart' ); ?>
				<button type="button" class="sc-button-reset sc-button-unstyled" data-wp-on--click="actions.resendCode"><?php esc_html_e( 'Send new code', 'surecart' ); ?></button>
			</p>

			<?php /* Inline error. */ ?>
			<p class="sc-checkout-login__error" role="alert" data-wp-bind--hidden="!state.loginError" data-wp-text="state.loginError"></p>

			<?php /* Footer: resend timer/link + Use Password. */ ?>
			<div class="sc-checkout-login__footer">
				<div class="sc-checkout-login__footer-left">
					<span class="sc-checkout-login__resend-timer" data-wp-bind--hidden="state.canResend">
						<?php esc_html_e( 'Resend code in', 'surecart' ); ?> <span data-wp-text="state.resendCooldownText"></span>
					</span>
					<button type="button" class="sc-button-reset sc-button-unstyled sc-checkout-login__resend-link" data-wp-bind--hidden="!state.canResend" data-wp-on--click="actions.resendCode">
						<?php esc_html_e( 'Resend code', 'surecart' ); ?>
					</button>
				</div>
				<div class="sc-checkout-login__footer-right">
					<button type="button" class="sc-button-reset sc-button-unstyled sc-checkout-login__mode-link" data-wp-on--click="actions.usePasswordMode">
						<?php esc_html_e( 'Use password', 'surecart' ); ?>
					</button>
				</div>
			</div>
		</div>

		<?php
		/*
		 * Not a nested <form> (the parser would drop it and close the checkout form early): Enter
		 * and the button both call loginByPassword. The input is not `required`, so it can't block
		 * the checkout's reportValidity while hidden.
		 */
		?>
		<div class="sc-checkout-login__password-view" data-wp-bind--hidden="!state.isPasswordMode">
			<div class="sc-checkout-login__password-row">
				<input
					type="password"
					class="sc-form-control"
					placeholder="<?php esc_attr_e( 'Password', 'surecart' ); ?>"
					aria-label="<?php esc_attr_e( 'Password', 'surecart' ); ?>"
					autocomplete="current-password"
					data-wp-bind--value="state.loginPassword"
					data-wp-bind--disabled="state.loginBusy"
					data-wp-on--input="actions.setLoginPassword"
					data-wp-on--keydown="actions.loginByPassword"
				/>
				<button
					type="button"
					class="sc-button sc-button--standard sc-button--primary sc-button--medium sc-button--has-prefix sc-button--has-label sc-button-reset"
					data-wp-bind--aria-busy="state.loginBusy"
					data-wp-on--click="actions.loginByPassword"
				>
					<span class="sc-button__prefix">
						<?php /* Directives can't sit on <svg>; the span carries the bind. */ ?>
						<span data-wp-bind--hidden="state.loginBusy" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
						</span>
						<span class="sc-checkout-login__spinner" aria-hidden="true" data-wp-bind--hidden="!state.loginBusy" hidden></span>
					</span>
					<span class="sc-button__label"><?php esc_html_e( 'Login', 'surecart' ); ?></span>
				</button>
			</div>
			<p class="sc-checkout-login__error" role="alert" data-wp-bind--hidden="!state.loginError" data-wp-text="state.loginError"></p>
			<?php /* Hidden after a 429 (codeUnavailable) to avoid a retry loop. */ ?>
			<div class="sc-checkout-login__footer" data-wp-bind--hidden="state.codeUnavailable">
				<div class="sc-checkout-login__footer-left"></div>
				<div class="sc-checkout-login__footer-right">
					<button type="button" class="sc-button-reset sc-button-unstyled sc-checkout-login__mode-link" data-wp-on--click="actions.useCodeMode">
						<?php esc_html_e( 'Use login code', 'surecart' ); ?>
					</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	/*
	Logged-in identity card. Server values pre-paint for an already
		logged-in user; the bindings let a runtime login fill the card too. */
	?>
	<div class="sc-checkout-email-preview" data-wp-bind--hidden="!state.showLoggedInCard">
		<div class="sc-checkout-email-preview__info">
			<span class="sc-checkout-email-preview__avatar" aria-hidden="true">
				<?php if ( ! empty( $customer_card['initials'] ) ) : ?>
					<span class="sc-checkout-email-preview__initials"><?php echo esc_html( $customer_card['initials'] ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $customer_card['avatar_url'] ) ) : ?>
					<img src="<?php echo esc_url( $customer_card['avatar_url'] ); ?>" alt="" loading="lazy" />
				<?php else : ?>
					<img data-wp-bind--src="state.loginAvatarUrl" alt="" loading="lazy" />
				<?php endif; ?>
			</span>
			<div class="sc-checkout-email-preview__text">
				<div class="sc-checkout-email-preview__name" data-wp-text="state.customerName"><?php echo esc_html( $customer_card['name'] ?? '' ); ?></div>
				<div class="sc-checkout-email-preview__email" data-wp-text="state.customerEmail"><?php echo esc_html( $customer_card['email'] ?? '' ); ?></div>
			</div>
		</div>
		<?php
		/* Logout dropdown. */
		?>
		<details class="sc-checkout-email-preview__dropdown">
			<summary aria-label="<?php esc_attr_e( 'Account options', 'surecart' ); ?>">
				<?php /* Directives can't sit on <svg>; the span carries the bind. */ ?>
				<span data-wp-bind--hidden="state.logoutBusy" aria-hidden="true">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false"><polyline points="6 9 12 15 18 9"></polyline></svg>
				</span>
				<span class="sc-checkout-login__spinner" aria-hidden="true" data-wp-bind--hidden="!state.logoutBusy" hidden></span>
			</summary>
			<?php /* No menu roles — a native details/summary disclosure needs none. */ ?>
			<div class="sc-checkout-email-preview__menu">
				<button type="button" class="sc-button-reset sc-button-unstyled" data-wp-on--click="actions.logout" data-wp-bind--aria-busy="state.logoutBusy">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
					<?php esc_html_e( 'Logout', 'surecart' ); ?>
				</button>
			</div>
		</details>
	</div>
</div>
