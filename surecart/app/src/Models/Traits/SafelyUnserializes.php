<?php

namespace SureCart\Models\Traits;

/**
 * Unserializes stored attribute values without instantiating arbitrary classes.
 */
trait SafelyUnserializes {
	/**
	 * Unserialize a value read back from storage.
	 *
	 * Since maybe_serialize() on create/update re-wraps already-serialized input, stored values may need two passes.
	 *
	 * @param mixed $value Stored attribute value.
	 *
	 * @return mixed
	 */
	protected function unserializeStoredValue( $value ) {
		return $this->unserializeAttributeValue( $this->unserializeAttributeValue( $value ) );
	}

	/**
	 * Unserialize a stored attribute value, allowing only plain objects.
	 *
	 * A disallowed class or a malformed payload comes back as the original string so it stays an inert scalar.
	 *
	 * @param mixed $value Stored attribute value.
	 *
	 * @return mixed
	 */
	protected function unserializeAttributeValue( $value ) {
		if ( ! is_string( $value ) || ! is_serialized( $value ) ) {
			return $value;
		}

		$trimmed      = trim( $value );
		$unserialized = @unserialize( $trimmed, [ 'allowed_classes' => [ 'stdClass' ] ] ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_unserialize, WordPress.PHP.NoSilencedErrors.Discouraged

		if ( false === $unserialized && 'b:0;' !== $trimmed ) {
			return $value;
		}

		return $this->hasIncompleteClass( $unserialized ) ? $value : $unserialized;
	}

	/**
	 * Whether a disallowed class survived anywhere in the value, including nested arrays and objects.
	 *
	 * Values nested too deep, including self-referencing ones, count as rejected.
	 *
	 * @param mixed $value Unserialized value.
	 * @param int   $depth Current nesting depth.
	 *
	 * @return bool
	 */
	private function hasIncompleteClass( $value, int $depth = 0 ): bool {
		if ( $depth > 32 ) {
			return true;
		}

		if ( $value instanceof \__PHP_Incomplete_Class ) {
			return true;
		}

		if ( ! is_array( $value ) && ! $value instanceof \stdClass ) {
			return false;
		}

		foreach ( (array) $value as $item ) {
			if ( $this->hasIncompleteClass( $item, $depth + 1 ) ) {
				return true;
			}
		}

		return false;
	}
}
