<?php

namespace SureCart\Controllers\Rest;

use SureCart\Models\User;
use SureCart\Models\VerificationCode;

/**
 * Handle verification code requests through the REST API
 */
class VerificationCodeController extends RestController {
	/**
	 * Class to make the requests.
	 *
	 * @var string
	 */
	protected $class = VerificationCode::class;

	/**
	 * Transient key prefix for the per-email resend window.
	 *
	 * @var string
	 */
	const RESEND_TRANSIENT_PREFIX = 'sc_vcode_resend_';

	/**
	 * Transient key prefix for the per-email verify attempt counter.
	 *
	 * @var string
	 */
	const ATTEMPT_TRANSIENT_PREFIX = 'sc_vcode_attempts_';

	/**
	 * Verify attempts allowed per email before a temporary lockout.
	 *
	 * @var int
	 */
	const MAX_VERIFY_ATTEMPTS = 5;

	/**
	 * Lockout window. Outlasts the code's 10-minute validity so a fresh code can't reset the limit.
	 *
	 * @var int
	 */
	const LOCKOUT_WINDOW = 15 * MINUTE_IN_SECONDS;

	/**
	 * Create model.
	 *
	 * @param \WP_REST_Request $request Rest Request.
	 *
	 * @return array|\WP_Error
	 */
	public function create( \WP_REST_Request $request ) {
		$model = $this->middleware( new $this->class(), $request );
		if ( is_wp_error( $model ) ) {
			return $model;
		}

		$user = $this->getUser( $request->get_param( 'login' ) );

		// bail if no user.
		if ( ! $user ) {
			return new \WP_Error( 'user_not_found', __( 'The user could not be found.', 'surecart' ), [ 'status' => 404 ] );
		}

		$email = $user->user_email;

		// Privileged users can't use code login: fake a sent response and never
		// send the email, blocking admin login and email-bombing.
		if ( ! $this->canLoginWithCode( $user->getUser() ) ) {
			return $this->codeResponse( true );
		}

		// A code was already sent and we're still inside the platform's resend
		// window. Resume that countdown instead of asking the platform again —
		// this is what stops duplicate verification emails on page reload, tab
		// switch, or re-entering the same email via "Change".
		$available_at = $this->getResendWindow( $email );
		if ( $available_at ) {
			return $this->codeResponse( false, $available_at );
		}

		$created = $model->create(
			[
				'email' => $email,
			]
		);

		if ( is_wp_error( $created ) ) {
			// Platform blocked the send as a duplicate. Mirror its backoff window
			// locally so the UI countdown stays accurate on the next request.
			$this->storeResendWindowFromError( $created, $email );
			return $created;
		}

		// Persist the platform-provided window so a reload or tab switch can
		// resume the countdown without triggering another send.
		$available_at = $this->normalizeToTimestamp( $created->resend_available_at ?? null );
		if ( $available_at ) {
			$this->setResendWindow( $email, $available_at );
		}

		return $this->codeResponse( true, $available_at );
	}

	/**
	 * The create response, in the same shape for every branch.
	 *
	 * A plain array so the caller only ever sees these keys — in particular no
	 * email, which would let a username lookup resolve to an address.
	 *
	 * @param bool     $sent         Whether this request reports a new email.
	 * @param int|null $available_at Unix timestamp the next resend is allowed, or null when unknown.
	 *
	 * @return array
	 */
	protected function codeResponse( bool $sent, $available_at = null ): array {
		return [
			'email_sent'          => $sent,
			'resend_available_at' => $available_at,
			'resend_available_in' => $available_at ? max( 0, $available_at - time() ) : null,
		];
	}

	/**
	 * Build the resend window transient key for an email.
	 *
	 * Live and test share one window: the platform keys codes on the email alone.
	 *
	 * @param string $email Normalized against case so the key is stable.
	 *
	 * @return string
	 */
	public static function resendTransientKey( $email ) {
		return self::RESEND_TRANSIENT_PREFIX . md5( strtolower( $email ) );
	}

	/**
	 * Get the stored resend-available timestamp if it is still in the future.
	 *
	 * @param string $email Email address.
	 *
	 * @return int|false Unix timestamp, or false when no active window.
	 */
	protected function getResendWindow( $email ) {
		$available_at = (int) get_transient( self::resendTransientKey( $email ) );
		return $available_at > time() ? $available_at : false;
	}

	/**
	 * Store the resend-available timestamp, expiring the transient when it lapses.
	 *
	 * @param string $email        Email address.
	 * @param int    $available_at Unix timestamp the next resend is allowed.
	 *
	 * @return void
	 */
	protected function setResendWindow( $email, $available_at ) {
		$ttl = $available_at - time();
		if ( $ttl <= 0 ) {
			return;
		}
		set_transient( self::resendTransientKey( $email ), $available_at, $ttl );
	}

	/**
	 * Clear the resend window for an email.
	 *
	 * @param string $email Email address.
	 *
	 * @return void
	 */
	protected function clearResendWindow( $email ) {
		delete_transient( self::resendTransientKey( $email ) );
	}

	/**
	 * Whether a user may authenticate through the passwordless login code.
	 *
	 * Privileged users (anyone who can edit content, manage the site, or manage
	 * the SureCart shop) are blocked by default so the storefront-only code flow
	 * can never hand out an admin session. A site can loosen this through the filter.
	 *
	 * @param \WP_User $user The resolved target user — not the (anonymous) requester.
	 *
	 * @return bool
	 */
	protected function canLoginWithCode( \WP_User $user ): bool {
		$can = ! ( user_can( $user, 'edit_posts' ) || user_can( $user, 'manage_options' ) || user_can( $user, 'manage_sc_shop_settings' ) );
		return (bool) apply_filters( 'surecart/verification_code/can_login', $can, $user );
	}

	/**
	 * Build the verify-attempt transient key for an email.
	 *
	 * @param string $email Normalized against case so the counter is stable.
	 *
	 * @return string
	 */
	public static function verifyAttemptTransientKey( $email ) {
		return self::ATTEMPT_TRANSIENT_PREFIX . md5( strtolower( $email ) );
	}

	/**
	 * Pull the backoff window out of a platform "blocked duplicate" error and store it.
	 *
	 * @param \WP_Error $error The translated platform error.
	 * @param string    $email Email address.
	 *
	 * @return void
	 */
	protected function storeResendWindowFromError( $error, $email ) {
		foreach ( $error->get_error_codes() as $code ) {
			if ( 'verification_code.email.blocked_duplicate' !== $code ) {
				continue;
			}
			$data    = $error->get_error_data( $code );
			$seconds = (int) ( $data['options']['seconds'] ?? 0 );
			if ( $seconds > 0 ) {
				$this->setResendWindow( $email, time() + $seconds );
			}
			return;
		}
	}

	/**
	 * Normalize a platform timestamp (unix int or ISO 8601 string) to a unix timestamp.
	 *
	 * @param mixed $value Raw value from the platform.
	 *
	 * @return int|null
	 */
	protected function normalizeToTimestamp( $value ) {
		if ( empty( $value ) ) {
			return null;
		}
		if ( is_numeric( $value ) ) {
			return (int) $value;
		}
		$parsed = strtotime( (string) $value );
		return $parsed ? $parsed : null;
	}

	/**
	 * Verify a verification code
	 *
	 * @param \WP_REST_Request $request  Rest Request.
	 *
	 * @return mixed|\WP_Error
	 */
	public function verify( \WP_REST_Request $request ) {
		// run middleware.
		$model = $this->middleware( new $this->class(), $request );

		// bail if error.
		if ( is_wp_error( $model ) ) {
			return $model;
		}

		// Resolve the target user once up front.
		$user = $this->getUser( $request->get_param( 'login' ) );
		if ( ! $user ) {
			return new \WP_Error(
				'invalid_email',
				__( 'There is no account with that username or email address.', 'surecart' ),
				[ 'status' => 404 ]
			);
		}

		$email = $user->user_email;

		// Gate privileged accounts before any platform call, using the same generic
		// error as a bad code so valid and invalid codes look identical.
		if ( ! $this->canLoginWithCode( $user->getUser() ) ) {
			return new \WP_Error( 'invalid_code', __( 'Invalid verification code', 'surecart' ), [ 'status' => 400 ] );
		}

		// Too many attempts for this email — lock it out.
		$key      = self::verifyAttemptTransientKey( $email );
		$attempts = (int) get_transient( $key );
		if ( $attempts >= self::MAX_VERIFY_ATTEMPTS ) {
			return new \WP_Error(
				'too_many_attempts',
				__( 'Too many attempts. Please try again later.', 'surecart' ),
				[ 'status' => 429 ]
			);
		}

		// Count before the platform call to narrow the parallel-guess window; not atomic, so a soft cap.
		set_transient( $key, $attempts + 1, self::LOCKOUT_WINDOW );

		// verify the code.
		$verify = $model->verify(
			[
				'email' => $email,
				'code'  => $request->get_param( 'code' ),
			]
		);

		// check for errors.
		if ( is_wp_error( $verify ) ) {
			return $verify;
		}

		// code is invalid or not verified.
		if ( empty( $verify->verified ) ) {
			return new \WP_Error( 'invalid_code', __( 'Invalid verification code', 'surecart' ), [ 'status' => 400 ] );
		}

		// the code must belong to this user.
		if ( 0 !== strcasecmp( (string) ( $verify->email ?? '' ), $email ) ) {
			return new \WP_Error( 'invalid_code', __( 'Invalid verification code', 'surecart' ), [ 'status' => 400 ] );
		}

		// The code was consumed — clear the local resend window so a later
		// request gets a fresh code instead of resuming a countdown for a code
		// that no longer exists. If a genuine platform window remains, the next
		// create re-stores it from the blocked_duplicate error.
		$this->clearResendWindow( $email );
		delete_transient( $key );

		// login the user.
		$logged_in = $user->login();

		if ( is_wp_error( $logged_in ) ) {
			return $logged_in;
		}

		$verify->name         = $user->display_name ?? $user->user_login;
		$verify->avatar_url   = get_avatar_url( $user->user_email, [ 'size' => 48 ] );
		$verify->nonce        = ( wp_installing() && ! is_multisite() ) ? '' : wp_create_nonce( 'wp_rest' );
		$redirect_to          = $request->get_param( 'redirect_to' );
		$redirect_url         = ! empty( $redirect_to ) ? wp_validate_redirect( $redirect_to, false ) : null;
		$verify->redirect_url = apply_filters( 'sc_login_redirect_url', $redirect_url ); // this is the URL to redirect to after login.

		// return the model.
		return $verify;
	}

	/**
	 * Get the user from the login.
	 *
	 * @param string $login An email or login.
	 *
	 * @return \SureCart\Models\User|false
	 */
	public function getUser( $login ) {
		return User::getUserby( strpos( $login ?? '', '@' ) ? 'email' : 'login', $login );
	}
}
