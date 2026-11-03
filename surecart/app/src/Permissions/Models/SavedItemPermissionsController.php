<?php

namespace SureCart\Permissions\Models;

use SureCart\Models\SavedItem;
use SureCart\Models\SavedList;

/**
 * Saved item and saved list permissions.
 *
 * Listing and creating are scoped server-side to the current user's customer,
 * so only changing a specific item or list needs an ownership check.
 */
class SavedItemPermissionsController extends ModelPermissionsController {
	/**
	 * Can the user delete this saved item?
	 *
	 * @param \SureCart\Models\User $user User model.
	 * @param array                 $args {
	 *                  Arguments that accompany the requested capability check.
	 *
	 *     @type string    $0 Requested capability.
	 *     @type int       $1 Concerned user ID.
	 *     @type mixed  ...$2 Optional second and further parameters, typically object ID.
	 * }
	 * @param bool[]                $allcaps Array of key/value pairs where keys represent a capability name
	 *                                       and boolean values represent whether the user has that capability.
	 * @return boolean Does user have permission.
	 */
	public function delete_sc_saved_item( $user, $args, $allcaps ) {
		return $this->ownsItem( $args, $user );
	}

	/**
	 * Can the user move this saved item, change its options or move it to their cart?
	 *
	 * @param \SureCart\Models\User $user    User model.
	 * @param array                 $args    Capability args; $args[2] is the item id.
	 * @param bool[]                $allcaps All capabilities.
	 * @return boolean
	 */
	public function edit_sc_saved_item( $user, $args, $allcaps ) {
		return $this->ownsItem( $args, $user );
	}

	/**
	 * Can the user rename this list, or save into it?
	 *
	 * @param \SureCart\Models\User $user    User model.
	 * @param array                 $args    Capability args; $args[2] is the list id.
	 * @param bool[]                $allcaps All capabilities.
	 * @return boolean
	 */
	public function edit_sc_saved_list( $user, $args, $allcaps ) {
		return ! empty( $args[2] ) && $this->belongsToUser( SavedList::class, $args[2], $user );
	}

	/**
	 * Can the user delete this list?
	 *
	 * @param \SureCart\Models\User $user    User model.
	 * @param array                 $args    Capability args; $args[2] is the list id.
	 * @param bool[]                $allcaps All capabilities.
	 * @return boolean
	 */
	public function delete_sc_saved_list( $user, $args, $allcaps ) {
		return ! empty( $args[2] ) && $this->belongsToUser( SavedList::class, $args[2], $user );
	}

	/**
	 * Whether the saved item in the capability args belongs to the user.
	 *
	 * Items carry no customer, so this reads the item with its list expanded: one request, and
	 * the item's operation then hits the API again. That's the price of not trusting a client id.
	 *
	 * @param array                 $args Capability args.
	 * @param \SureCart\Models\User $user User model.
	 * @return boolean
	 */
	protected function ownsItem( $args, $user ) {
		if ( empty( $args[2] ) ) {
			return false;
		}
		$item = SavedItem::with( [ 'saved_list' ] )->find( $args[2] );
		// Fail closed: an API error must not read as ownership.
		return ! is_wp_error( $item ) && ! empty( $item->id ) && $item->belongsToUser( $user );
	}
}
