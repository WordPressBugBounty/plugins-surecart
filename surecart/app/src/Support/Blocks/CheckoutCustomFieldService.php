<?php

namespace SureCart\Support\Blocks;

/**
 * Server-side gate + state seed for the instant-checkout custom field blocks.
 *
 * Field names are stored verbatim as checkout metadata keys (existing data and pricing rules match
 * them exactly), so a key is unsafe in a directive path or DOM id; use inputId() / choiceInputId().
 */
class CheckoutCustomFieldService {
	/**
	 * Keys a merchant field may never claim (checkout params and platform-owned metadata).
	 * Compared lower-cased and trimmed, so entries must already be in that form.
	 *
	 * @var string[]
	 */
	const RESERVED_KEYS = array(
		// First-class checkout params.
		'email',
		'name',
		'first_name',
		'last_name',
		'phone',
		'password',
		// Platform-owned metadata.
		'wp_user_role',
		'wp_created_by',
		'success_url',
		'get_feedback',
		'page_id',
		'page_url',
		'buy_page_product_id',
		'external_url',
	);

	/**
	 * Reserved key prefixes (address params and the dotted tax identifier).
	 *
	 * @var string[]
	 */
	const RESERVED_PREFIXES = array(
		'shipping_',
		'billing_',
		'tax_identifier',
	);

	/**
	 * Resolve a merchant-entered field name into the metadata key.
	 *
	 * Verbatim: no trim or case fold; a whitespace-only name is refused by isRenderable().
	 *
	 * @param string $name The raw `name` attribute value.
	 * @return string The metadata key ('' for a missing attribute).
	 */
	public static function resolveKey( $name ): string {
		return (string) $name;
	}

	/**
	 * The value a ticked checkbox/switch stores; empty falls back to `on` so it differs from unticked.
	 *
	 * @param string $value The raw `value` attribute value.
	 * @return string The value to store when ticked.
	 */
	public static function resolveValue( $value ): string {
		$value = trim( (string) $value );

		return '' !== $value ? $value : 'on';
	}

	/**
	 * The value a selected choice stores; empty falls back to the label so siblings stay distinct.
	 *
	 * The editor now always saves `value`, so the fallback only serves blocks saved before it did.
	 *
	 * @param string $value The raw `value` attribute value.
	 * @param string $label The option's label, used as the fallback.
	 * @return string The value to store when selected, or '' when unusable.
	 */
	public static function resolveChoiceValue( $value, $label = '' ): string {
		$value = trim( (string) $value );

		if ( '' !== $value ) {
			return $value;
		}

		return trim( wp_strip_all_tags( (string) $label ) );
	}

	/**
	 * Whether a key is reserved, compared trimmed and case-insensitively (`Email ` is still the email).
	 *
	 * @param string $key The resolved metadata key.
	 * @return bool True when the key is reserved.
	 */
	public static function isReserved( $key ): bool {
		$needle = strtolower( trim( (string) $key ) );

		if ( in_array( $needle, self::RESERVED_KEYS, true ) ) {
			return true;
		}

		foreach ( self::RESERVED_PREFIXES as $prefix ) {
			if ( 0 === strpos( $needle, $prefix ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Whether a resolved key may be rendered and seeded.
	 *
	 * @param string $key The resolved metadata key.
	 * @return bool True when the block should render.
	 */
	public static function isRenderable( $key ): bool {
		return '' !== trim( (string) $key ) && ! self::isReserved( $key );
	}

	/**
	 * Seed a renderable field's value and required flag; a bind without a seed wipes it on hydration.
	 *
	 * @param string $key      The resolved metadata key.
	 * @param bool   $required Whether the field is required (enforced in validateLocal).
	 * @param string $initial  Initial buffer value.
	 * @return void
	 */
	public static function seed( $key, $required = false, $initial = '' ): void {
		if ( ! self::isRenderable( $key ) ) {
			return;
		}

		wp_interactivity_state(
			'surecart/checkout-form',
			array(
				'customFields'         => array( $key => (string) $initial ),
				'customFieldsRequired' => array( $key => (bool) $required ),
			)
		);
	}

	/**
	 * The DOM id for a field's input; the label, `aria-describedby` and error ids derive from it.
	 *
	 * @param string $key The resolved metadata key.
	 * @return string The element id.
	 */
	public static function inputId( $key ): string {
		return 'sc-checkout-field-' . self::idSlug( $key );
	}

	/**
	 * The DOM id for one radio option's input; the group shares one key, so the value keeps
	 * it unique.
	 *
	 * @param string $key   The resolved metadata key.
	 * @param string $value The option's resolved value.
	 * @return string The element id.
	 */
	public static function choiceInputId( $key, $value ): string {
		$slug = sanitize_title( $value );

		// Hash values that sanitize_title() reduces to nothing so their ids stay distinct.
		if ( '' === $slug ) {
			$slug = substr( md5( (string) $value ), 0, 8 );
		}

		return self::inputId( $key ) . '-' . $slug;
	}

	/**
	 * An id-safe slug for a key, hash-suffixed when slugging changed it (`Gift Message` vs `gift-message`).
	 *
	 * @param string $key The resolved metadata key.
	 * @return string The slug.
	 */
	protected static function idSlug( $key ): string {
		$key  = (string) $key;
		$slug = sanitize_title( $key );

		if ( $slug === $key ) {
			return $slug;
		}

		$hash = substr( md5( $key ), 0, 8 );

		return '' !== $slug ? $slug . '-' . $hash : $hash;
	}
}
