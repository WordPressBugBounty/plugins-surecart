<?php

namespace SureCart\Support\Blocks;

use SureCart\Models\BuyLink;
use SureCart\Models\ManualPaymentMethod;
use SureCart\Models\Processor;
use SureCart\Models\Product;

/**
 * Builds the `surecart/checkout-form` interactivity state seed for the instant-checkout page.
 *
 * Never reads or emits a "secret" or "private" setting; only public keys, flags and copy
 * are seeded.
 */
class CheckoutStateSeedService {
	/**
	 * Build the surecart/checkout-form state seed for a buy link.
	 *
	 * @param Product $product  The resolved product for this buy link.
	 * @param BuyLink $buy_link The product's buy link wrapper.
	 *
	 * @return array Payload for wp_interactivity_state().
	 */
	public static function build( Product $product, BuyLink $buy_link ) {
		$mode         = $buy_link->getMode();
		$is_live      = ( 'test' !== $mode );
		$current_user = wp_get_current_user();

		// Inner blocks seed their own keys first and later seeds win, so read them back
		// instead of clobbering.
		$seeded = wp_interactivity_state( 'surecart/checkout-form' );

		// Same catalog (and default processor) the payment block renders, so the seed
		// and the markup cannot drift.
		$catalog = self::resolveProcessorCatalog( $product, $seeded['defaultProcessor'] ?? '', (array) ( $seeded['disabledMethods'] ?? array() ) );

		// The JS init creates the first draft from this; empty when no price resolves.
		$initial_line_item  = $buy_link->initialLineItem();
		$initial_line_items = ! empty( $initial_line_item ) ? array( $initial_line_item ) : array();

		$payload = array(
			'mode'                     => $mode,
			'liveMode'                 => $is_live,
			'currencyCode'             => isset( $product->currency ) ? $product->currency : 'usd',
			// Shop currency (distinct from the product's display currency above).
			'currency'                 => \SureCart::account()->currency ?? ( isset( $product->currency ) ? $product->currency : 'usd' ),
			'initialLineItems'         => $initial_line_items,

			'formState'                => 'draft',
			'errorKind'                => null,
			'errorTitle'               => null,
			'errorMessage'             => null,
			'errorFieldErrors'         => (object) array(),
			'errorAdditional'          => array(),

			// Customer field write-buffers, pre-filled from the logged-in user.
			'customerEmail'            => $current_user && ! empty( $current_user->user_email ) ? $current_user->user_email : '',
			'customerName'             => self::resolveCustomerName( $current_user ),
			'customerPhone'            => '',
			'agreeToTerms'             => false,

			// Pay-what-you-want gate.
			'adHocRequired'            => self::hasAdHocPrice( $product ),
			// Returning-customer login; the identity card also reuses `customerName`.
			'loggedIn'                 => is_user_logged_in(),
			'loginAvatarUrl'           => $current_user && $current_user->ID ? get_avatar_url( $current_user->user_email, array( 'size' => 48 ) ) : '',
			// Merchant opt-out for the proactive login code.
			'showLoginPrompt'          => (bool) get_option( 'surecart_checkout_show_login_prompt', true ),

			// Tax-ID buffer. Seed only the policy booleans: a seeded `taxIdRequired` or
			// status key would shadow the store getters.
			'taxIdType'                => '',
			'taxIdNumber'              => '',
			'taxEnabled'               => (bool) ( \SureCart::account()->tax_protocol->tax_enabled ?? false ),
			'euVatRequired'            => (bool) ( \SureCart::account()->tax_protocol->eu_vat_required ?? false ),
			// Under `apply_reverse_charge` an unverified EU VAT number is accepted.
			'euVatUnverifiedBehavior'  => (string) ( \SureCart::account()->tax_protocol->eu_vat_unverified_behavior ?? '' ),
			// Merchant-forced requirement, seeded by the tax-id block's controller.
			'taxIdForcedRequired'      => ! empty( $seeded['taxIdForcedRequired'] ),

			// Processor catalog (public surface only).
			'processors'               => $catalog['processors'],
			'manualPaymentMethods'     => $catalog['manualPaymentMethods'],
			'selectedProcessorId'      => null,
			'selectedManualMethodId'   => null,

			// Public processor config for the SDK islands.
			'config'                   => array(
				'stripe' => array(
					'paymentElement' => (bool) get_option( 'sc_stripe_payment_element', true ),
				),
			),

			// Abandoned-checkout attribution, sent on every checkout request.
			'abandonedCheckoutEnabled' => ! is_admin(),
			'groupKey'                 => null,
			'metadata'                 => array_filter(
				array(
					'buy_page_product_id' => $product->id ?? null,
					'page_id'             => get_the_ID() ? get_the_ID() : null,
					'page_url'            => get_permalink() ? get_permalink() : null,
				),
				function ( $value ) {
					return null !== $value;
				}
			),

			// Recaptcha (site key only).
			'recaptcha'                => array(
				'enabled' => (bool) \SureCart::settings()->recaptcha()->isEnabled(),
				'siteKey' => \SureCart::settings()->recaptcha()->getSiteKey(),
				'token'   => null,
			),

			'loading'                  => false,
			'loadingText'              => '',
			'successUrl'               => $buy_link->getSuccessUrl(),
			'successText'              => self::successText(),
			// Empty (no Terms or Privacy page set) hides the terms block.
			'termsText'                => CheckoutTermsService::text(),

			'i18n'                     => self::i18nStrings(),
		);

		/**
		 * Filter the checkout-form state seed payload.
		 *
		 * Lets third-party plugins inject keys into the initial Interactivity state.
		 *
		 * @param array   $payload  The seed payload.
		 * @param Product $product  The product being rendered.
		 * @param BuyLink $buy_link The buy link wrapper.
		 */
		return apply_filters( 'surecart/checkout_form/state_seed', $payload, $product, $buy_link );
	}

	/**
	 * Success-panel copy. Read client-side as
	 * `state.successText.{title,description,button}`.
	 *
	 * @return array
	 */
	private static function successText() {
		return array(
			'title'       => __( 'Thank you!', 'surecart' ),
			'description' => __( 'Your payment was successful. A receipt is on its way to your inbox.', 'surecart' ),
			'button'      => __( 'Continue', 'surecart' ),
		);
	}

	/**
	 * Client-only strings the store renders. Keys and literals must match the JS `t()` calls.
	 *
	 * @return array
	 */
	private static function i18nStrings() {
		return array(
			'submitting'           => __( 'Submitting...', 'surecart' ),
			'processing'           => __( 'Processing...', 'surecart' ),
			'finalizing'           => __( 'Finalizing...', 'surecart' ),
			'success'              => __( 'Success!', 'surecart' ),
			'successRedirecting'   => __( 'Success! Redirecting...', 'surecart' ),
			'emailRequired'        => __( 'Email is required.', 'surecart' ),
			'emailInvalid'         => __( 'Please enter a valid email address.', 'surecart' ),
			'nameRequired'         => __( 'Name is required.', 'surecart' ),
			'choosePaymentMethod'  => __( 'Please choose a payment method.', 'surecart' ),
			'chooseShippingMethod' => __( 'Please choose a shipping method.', 'surecart' ),
			'termsRequired'        => __( 'Please agree to the terms.', 'surecart' ),
			'amountRequired'       => __( 'Please enter an amount.', 'surecart' ),
			'optionUnavailable'    => __( 'Please choose an available option.', 'surecart' ),
			'fixErrors'            => __( 'Please fix the errors below.', 'surecart' ),
			// New-account password; the strength hints only apply while
			// `surecart_password_validation_enabled` is on.
			'passwordRequired'     => __( 'Password is required.', 'surecart' ),
			'passwordTooShort'     => __( 'The password must be at least 6 characters in length.', 'surecart' ),
			'passwordNeedsSpecial' => __( 'Passwords must contain a special character.', 'surecart' ),
			'fieldRequired'        => __( 'This field is required.', 'surecart' ),
			'postalInvalid'        => __( 'Please enter a valid postal code', 'surecart' ),
			'addressLine1Label'    => __( 'Address', 'surecart' ),
			'addressLine2Label'    => __( 'Apartment, suite, etc. (optional)', 'surecart' ),
			'addressCityLabel'     => __( 'City', 'surecart' ),
			'addressStateLabel'    => __( 'State', 'surecart' ),
			'addressPostalLabel'   => __( 'ZIP / Postal Code', 'surecart' ),
			// Compact (tax-accuracy) mode retitles the shipping legend to "Address".
			'shippingLegend'       => __( 'Shipping Address', 'surecart' ),
			'addressLegend'        => __( 'Address', 'surecart' ),
			// Places API failure notice; the dropdown chrome strings render server-side.
			/* translators: %s: the Google Maps API error message. */
			'googleMapError'       => __( 'Google Map Error: %s', 'surecart' ),
			// Address-suggestion listbox announcements (aria-live).
			'suggestionsAvailable' => __( 'Address suggestions available.', 'surecart' ),
			'enterAddressManually' => __( 'Enter address manually', 'surecart' ),
			// Fallback name for an unnamed shipping method.
			'standardShipping'     => __( 'Standard Shipping', 'surecart' ),
			'quantityUpdating'     => __( 'Updating quantity.', 'surecart' ),
			/* translators: %d: quantity */
			'quantityChanged'      => __( 'Quantity changed to: %d', 'surecart' ),
			// Fallback product name in the two removal announcements below.
			'item'                 => __( 'item', 'surecart' ),
			/* translators: %d: number of items in the bundle. */
			'bundleItemsIncluded'  => __( 'Items included: %d', 'surecart' ),
			/* translators: %s: product name. */
			'removingItem'         => __( 'Removing %s from your cart.', 'surecart' ),
			/* translators: %s: product name. */
			'removedItem'          => __( 'Removed %s from your cart.', 'surecart' ),
			'bumpApplied'          => __( 'Order bump applied.', 'surecart' ),
			'bumpRemoved'          => __( 'Order bump removed.', 'surecart' ),
			'shippingUpdated'      => __( 'Shipping choice updated.', 'surecart' ),
			/* translators: %s: formatted amount. */
			'totalChanged'         => __( 'Your order total has changed to: %s.', 'surecart' ),
			/* translators: %s: discount (e.g. "$5.00" or "10%"). */
			'bumpSave'             => __( 'Save %s', 'surecart' ),
			/* translators: %s: percentage number, e.g. "10". %% is the percent sign. */
			'percentOff'           => __( '%s%%', 'surecart' ),
			/* translators: %s: tax name from the checkout, e.g. "VAT" or "IGST"; may be empty. */
			'taxEstimated'         => __( 'Estimated %s', 'surecart' ),
			'free'                 => __( 'Free', 'surecart' ),
			/* translators: %s: order bump name. */
			'bumpAdd'              => __( 'Add %s to order', 'surecart' ),
			/* translators: %s: order bump name. */
			'bumpRemove'           => __( 'Remove %s from order', 'surecart' ),
			'couponApplying'       => __( 'Applying promotion code.', 'surecart' ),
			'couponRemoving'       => __( 'Removing promotion code.', 'surecart' ),
			/* translators: %s: promotion code */
			'couponApplied'        => __( 'Promotion code %s has been applied.', 'surecart' ),
			'couponRemoved'        => __( 'Promotion code has been removed.', 'surecart' ),
			'couponInvalid'        => __( 'That coupon code is invalid or expired. Please try again.', 'surecart' ),
			/* translators: %s: the currency code. */
			'currencyConversion'   => __( 'Your payment will be processed in %s.', 'surecart' ),
			'errorOccurred'        => __( 'An error occurred.', 'surecart' ),
			'productsOutdated'     => __( 'Some products in your order were outdated and have been updated. Please review your order summary before proceeding to payment.', 'surecart' ),
			'noCheckoutToConfirm'  => __( 'No checkout to confirm.', 'surecart' ),
			'noCheckoutToFinalize' => __( 'No checkout to finalize.', 'surecart' ),
			'noCheckoutToCapture'  => __( 'No checkout to capture.', 'surecart' ),
			'paymentInProgress'    => __( 'A payment is already in progress.', 'surecart' ),
			'paymentUnsuccessful'  => __( 'Payment unsuccessful.', 'surecart' ),
			'paymentTryAgain'      => __( 'Payment unsuccessful. Please try again.', 'surecart' ),
			'paymentCanceled'      => __( 'Payment canceled. Please try again.', 'surecart' ),
			'paymentFailed'        => __( 'Payment failed. Please try again.', 'surecart' ),
			'paymentDidNotProcess' => __( 'The payment did not process. Please try again.', 'surecart' ),
			'paymentProcessFailed' => __( 'Payment processing failed. Please attempt the transaction once more.', 'surecart' ),
			'somethingWentWrong'   => __( 'Something went wrong. Please try again.', 'surecart' ),
			'contactForPayment'    => __( 'Something went wrong. Please contact us for payment.', 'surecart' ),
			'stripeNotReady'       => __( 'Stripe is not ready. Please reload and try again.', 'surecart' ),
			'paystackUnconfigured' => __( 'Payment gateway configuration incomplete. Please ensure Paystack is properly configured for transactions.', 'surecart' ),
			'paystackNotReady'     => __( 'Paystack is not ready. Please reload and try again.', 'surecart' ),
			/* translators: %s: Paystack transaction status. */
			'paystackFailed'       => __( 'Paystack transaction could not be finished. Status: %s', 'surecart' ),
			'razorpayUnconfigured' => __( 'Payment gateway configuration incomplete. Please ensure Razorpay is properly configured for transactions.', 'surecart' ),
			'razorpayNotReady'     => __( 'Razorpay is not ready. Please reload and try again.', 'surecart' ),
			'razorpayScriptFailed' => __( 'Failed to load Razorpay script.', 'surecart' ),
			'razorpayVerifyFailed' => __( 'Payment verification failed. Please contact support.', 'surecart' ),
			'signingInAs'          => __( 'Signing in as', 'surecart' ),
			'codeSentTo'           => __( 'Code sent to', 'surecart' ),
			'codeSent'             => __( 'Verification code is sent to your email. Please check your email.', 'surecart' ),
			'codeAlreadySent'      => __( 'A verification code was already sent to your email. Please check your email.', 'surecart' ),
			'codeSentShort'        => __( 'Code sent', 'surecart' ),
			'codeAlreadySentShort' => __( 'A code was already sent to your email.', 'surecart' ),
			'incorrectCode'        => __( 'Incorrect code. Please try again.', 'surecart' ),
			'rateLimited'          => __( 'Please wait a moment and try again.', 'surecart' ),
			'signInWithPassword'   => __( 'Please sign in with your password to continue.', 'surecart' ),
			'loginFailed'          => __( 'Login failed. Please try again.', 'surecart' ),
			'loggedOut'            => __( 'Logged out successfully.', 'surecart' ),
			'taxZoneLabels'        => array(
				'eu_vat' => __( 'VAT Number', 'surecart' ),
				'gb_vat' => __( 'VAT Number', 'surecart' ),
				'ca_gst' => __( 'GST Number', 'surecart' ),
				'au_abn' => __( 'ABN Number', 'surecart' ),
				'other'  => __( 'Tax ID', 'surecart' ),
			),
		);
	}

	/**
	 * Resolve the public processor catalog for a buy-page product.
	 *
	 * Shared by `build()` and the payment block. Inner blocks render before the form
	 * controller seeds the store, so the payment block resolves the catalog directly.
	 *
	 * @param Product $product   The resolved buy-page product.
	 * @param string  $preferred Processor type to float first (the block's default processor).
	 * @param array   $disabled  Processor types the payment block unchecked ('manual' hides every manual method).
	 *
	 * @return array { processors: array[], manualPaymentMethods: array[] }
	 */
	public static function resolveProcessorCatalog( Product $product, $preferred = '', array $disabled = array() ): array {
		$is_live = ( 'test' !== $product->buyLink()->getMode() );

		$processors = array_values(
			array_filter(
				self::serializeProcessors( Processor::where( array( 'live_mode' => $is_live ) )->get(), $preferred ),
				function ( $processor ) use ( $disabled ) {
					return ! in_array( $processor['type'] ?? '', $disabled, true );
				}
			)
		);

		$manual_methods = in_array( 'manual', $disabled, true )
			? array()
			: self::serializeManualMethods( ManualPaymentMethod::where( array( 'archived' => false ) )->get() );

		return array(
			'processors'           => $processors,
			'manualPaymentMethods' => $manual_methods,
		);
	}

	/**
	 * Build the seeded customerName: first + last name, else display_name, else empty.
	 *
	 * @param \WP_User|null $user The current user object, or null if not logged in.
	 *
	 * @return string
	 */
	public static function resolveCustomerName( $user ) {
		if ( empty( $user->ID ) ) {
			return '';
		}
		$full_name = trim( $user->first_name . ' ' . $user->last_name );

		return '' !== $full_name ? $full_name : $user->display_name;
	}

	/**
	 * Whether any active price is pay-what-you-want.
	 *
	 * @param Product $product The buy-page product.
	 *
	 * @return bool
	 */
	private static function hasAdHocPrice( Product $product ): bool {
		foreach ( $product->active_prices ?? array() as $price ) {
			if ( ! empty( $price->ad_hoc ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Serialize processors to a JSON-safe public surface.
	 *
	 * Keeps approved and enabled processors, strips fields matching /secret|private/i, and sorts.
	 *
	 * @param mixed  $processors Raw processor collection from Processor::where()->get().
	 * @param string $preferred  Processor type to float first.
	 *
	 * @return array
	 */
	private static function serializeProcessors( $processors, $preferred = '' ) {
		if ( is_wp_error( $processors ) || empty( $processors ) ) {
			return array();
		}

		$out = array();
		foreach ( (array) $processors as $processor ) {
			if ( empty( $processor->approved ) || empty( $processor->enabled ) ) {
				continue;
			}

			$out[] = array(
				'id'                   => $processor->id ?? null,
				'type'                 => $processor->processor_type ?? null,
				'name'                 => $processor->name ?? '',
				'live'                 => (bool) ( $processor->live_mode ?? false ),
				'public_key'           => $processor->public_key ?? null,
				'recurring_enabled'    => (bool) ( $processor->recurring_enabled ?? false ),
				'supported_currencies' => $processor->supported_currencies ?? array(),
				// Public config the SDKs need to boot; never
				// `payment_intent.processor_data` (client_secret).
				'processor_data'       => self::publicProcessorData( $processor->processor_data ?? null ),
			);
		}

		return self::sortProcessors( $out, (string) $preferred );
	}

	/**
	 * Allowlist the non-secret fields of a processor's `processor_data`.
	 *
	 * Only publishable_key, account_id, client_id and merchant_initiated are kept.
	 *
	 * @param mixed $data The raw processor_data (object or array).
	 *
	 * @return array
	 */
	private static function publicProcessorData( $data ) {
		if ( empty( $data ) ) {
			return array();
		}

		$data    = (array) $data;
		$allowed = array( 'publishable_key', 'account_id', 'client_id', 'merchant_initiated' );
		$out     = array();
		foreach ( $allowed as $key ) {
			if ( isset( $data[ $key ] ) ) {
				$out[ $key ] = $data[ $key ];
			}
		}

		return $out;
	}

	/**
	 * Sort serialized processors by a fixed display order, unknown ones last.
	 *
	 * A `$preferred` type floats first so the client auto-selects it.
	 *
	 * @param array  $processors Serialized processor rows.
	 * @param string $preferred  Optional processor type to float first.
	 *
	 * @return array
	 */
	private static function sortProcessors( array $processors, $preferred = '' ) {
		$order = array( 'stripe', 'paystack', 'paypal', 'razorpay', 'mollie', 'mock' );

		usort(
			$processors,
			function ( $a, $b ) use ( $order, $preferred ) {
				$a_type = $a['type'] ?? '';
				$b_type = $b['type'] ?? '';

				// Preferred type wins outright over everything else.
				if ( $preferred ) {
					$a_pref = ( $a_type === $preferred );
					$b_pref = ( $b_type === $preferred );
					if ( $a_pref !== $b_pref ) {
						return $a_pref ? -1 : 1;
					}
				}

				$a_index = array_search( $a_type, $order, true );
				$b_index = array_search( $b_type, $order, true );
				// Unknown types (false) sort LAST.
				$a_index = false === $a_index ? PHP_INT_MAX : $a_index;
				$b_index = false === $b_index ? PHP_INT_MAX : $b_index;
				return $a_index <=> $b_index;
			}
		);

		return $processors;
	}

	/**
	 * Public (kses'd) shape of the manual payment methods.
	 *
	 * @param mixed $methods Raw collection from ManualPaymentMethod::where()->get().
	 *
	 * @return array
	 */
	private static function serializeManualMethods( $methods ) {
		if ( is_wp_error( $methods ) || empty( $methods ) ) {
			return array();
		}

		$out = array();
		foreach ( (array) $methods as $method ) {
			$out[] = array(
				'id'           => $method->id ?? null,
				'name'         => $method->name ?? '',
				'instructions' => wp_kses_post( $method->instructions ?? '' ),
				// Needed so reusable manual methods survive the client's subscription filter.
				'reusable'     => (bool) ( $method->reusable ?? false ),
			);
		}

		return $out;
	}
}
