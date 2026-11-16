<?php

namespace SureCart\Integrations\MemberPress;

use SureCart\Integrations\Contracts\IntegrationInterface;
use SureCart\Integrations\Contracts\PurchaseSyncInterface;
use SureCart\Integrations\IntegrationService;
use SureCart\Models\Purchase;
use SureCart\Support\Currency;

/**
 * Controls the MemberPress integration.
 */
class MemberPressService extends IntegrationService implements IntegrationInterface, PurchaseSyncInterface {
	/**
	 * Get the slug for the integration.
	 *
	 * @return string
	 */
	public function getName() {
		return 'surecart/memberpress';
	}

	/**
	 * Get the model for the integration.
	 *
	 * @return string
	 */
	public function getModel() {
		return 'product';
	}

	/**
	 * Get the slug for the integration.
	 *
	 * @return string
	 */
	public function getLogo() {
		return esc_url_raw( trailingslashit( plugin_dir_url( SURECART_PLUGIN_FILE ) ) . 'images/integrations/memberpress.svg' );
	}

	/**
	 * Get the slug for the integration.
	 *
	 * @return string
	 */
	public function getLabel() {
		return __( 'MemberPress Membership', 'surecart' );
	}

	/**
	 * Get the slug for the integration.
	 *
	 * @return string
	 */
	public function getItemLabel() {
		return __( 'Membership Access', 'surecart' );
	}

	/**
	 * Get the slug for the integration.
	 *
	 * @return string
	 */
	public function getItemHelp() {
		return __( 'Enable access to a MemberPress membership.', 'surecart' );
	}

	/**
	 * Is this enabled?
	 *
	 * @return boolean
	 */
	public function enabled() {
		return defined( 'MEPR_VERSION' );
	}

	/**
	 * Get item listing for the integration.
	 *
	 * @param array  $items The integration items.
	 * @param string $search The search term.
	 *
	 * @return array The items for the integration.
	 */
	public function getItems( $items = [], $search = '' ) {
		if ( ! class_exists( 'MeprProduct' ) ) {
			return [];
		}

		$membership_query = new \WP_Query(
			[
				'post_type'      => \MeprProduct::$cpt,
				's'              => $search,
				'posts_per_page' => 100,
			]
		);

		if ( ( isset( $membership_query->posts ) ) && ( ! empty( $membership_query->posts ) ) ) {
			$items = array_map(
				function ( $post ) {
					return (object) [
						'id'    => $post->ID,
						'label' => $post->post_title,
					];
				},
				$membership_query->posts
			);
		}

		return $items;
	}

	/**
	 * Get the individual item.
	 *
	 * @param string $id Id for the record.
	 *
	 * @return object The item for the integration.
	 */
	public function getItem( $id ) {
		$course = get_post( $id );
		if ( ! $course ) {
			return [];
		}
		return (object) [
			'id'             => $id,
			'provider_label' => __( 'MemberPress Membership', 'surecart' ),
			'label'          => $course->post_title,
		];
	}

	/**
	 * The id must be a real MemberPress membership.
	 *
	 * @param string $id Id for the record.
	 *
	 * @return bool
	 */
	public function isValidItem( $id ): bool {
		if ( ! class_exists( 'MeprProduct' ) ) {
			return false;
		}
		$membership = absint( $id ) ? get_post( absint( $id ) ) : null;
		return ! empty( $membership ) && \MeprProduct::$cpt === $membership->post_type;
	}

	/**
	 * Enable Access to the course.
	 *
	 * @param \SureCart\Models\Integration $integration The integrations.
	 * @param \WP_User                     $wp_user The user.
	 *
	 * @return boolean|void Returns true if the user course access updation was successful otherwise false.
	 */
	public function onPurchaseCreated( $integration, $wp_user ) {
		$this->updateAccess( $integration->integration_id, $wp_user, true );
	}

	/**
	 * Enable access when purchase is invoked
	 *
	 * @param \SureCart\Models\Integration $integration The integrations.
	 * @param \WP_User                     $wp_user The user.
	 *
	 * @return boolean|void Returns true if the user course access updation was successful otherwise false.
	 */
	public function onPurchaseInvoked( $integration, $wp_user ) {
		$this->onPurchaseCreated( $integration, $wp_user );
	}

	/**
	 * Remove a user role.
	 *
	 * @param \SureCart\Models\Integration $integration The integrations.
	 * @param \WP_User                     $wp_user The user.
	 *
	 * @return boolean|void Returns true if the user course access updation was successful otherwise false.
	 */
	public function onPurchaseRevoked( $integration, $wp_user ) {
		$this->updateAccess( $integration->integration_id, $wp_user, false );
	}

	/**
	 * Update access to a course.
	 *
	 * @param integer  $membership_id The membership product id.
	 * @param \WP_User $wp_user The user.
	 * @param boolean  $add True to add the user to the course, false to remove.
	 *
	 * @return boolean|void Returns true if the user course access updation was successful otherwise false.
	 */
	public function updateAccess( $membership_id, $wp_user, $add = true ) {
		// we don't have Memberpress installed.
		if ( ! class_exists( 'MeprTransaction' ) ) {
			return;
		}

		// make sure we have a purchase id.
		if ( empty( $this->getPurchaseId() ) ) {
			return;
		}

		// get order, invoice needed to sync the purchase.
		$purchase = Purchase::with( [ 'order', 'invoice' ] )->find( $this->getPurchaseId() );
		if ( is_wp_error( $purchase ) ) {
			return;
		}

		global $wpdb;

		// Grant and revoke for the same purchase/membership run from concurrent paths (checkout confirm, webhooks, customer sync); one named lock keeps them from interleaving and double-creating. md5 keeps the name under MySQL's 64-char lock limit.
		$lock   = 'surecart_mepr_' . md5( $purchase->id . '_' . $membership_id );
		$locked = (int) $wpdb->get_var( $wpdb->prepare( 'SELECT GET_LOCK(%s, %d)', $lock, 10 ) );
		if ( 1 !== $locked ) {
			// Proceed unguarded rather than dropping the access change, but leave a trace.
			error_log( 'SureCart: MemberPress access lock not acquired for purchase ' . $purchase->id . '; proceeding without it.' );
		}

		// finally: createTransaction fires third-party-hookable actions that may throw; the lock must be released on any exit or retries of this purchase stall for the full lock timeout.
		try {
			$existing_ids = $this->getTransactionIds( $purchase->id, $membership_id );

			if ( ! $add ) {
				// Revoking must flip every matching row (duplicates included) and never create one.
				$stored = $this->setTransactionsStatus( $existing_ids, \MeprTransaction::$failed_str );
			} elseif ( ! empty( $existing_ids ) ) {
				// Already provisioned - make sure every matching row grants access.
				$stored = $this->setTransactionsStatus( $existing_ids, \MeprTransaction::$complete_str );
			} else {
				$stored = $this->createTransaction( $purchase, $membership_id, $wp_user );
			}
		} finally {
			$wpdb->query( $wpdb->prepare( 'SELECT RELEASE_LOCK(%s)', $lock ) );
		}

		return $stored;
	}

	/**
	 * Create and complete a MemberPress transaction for a purchase.
	 *
	 * @param \SureCart\Models\Purchase $purchase The purchase, with order/invoice loaded.
	 * @param integer                   $membership_id The membership product id.
	 * @param \WP_User                  $wp_user The user.
	 *
	 * @return boolean The store result.
	 */
	protected function createTransaction( $purchase, $membership_id, $wp_user ) {
		// get purchase order or invoice.
		if ( ! empty( $purchase->order->id ) ) {
			$object = $purchase->order;
		}
		if ( ! empty( $purchase->invoice->id ) ) {
			$object = $purchase->invoice;
		}

		$transaction             = new \MeprTransaction();
		$transaction->amount     = $this->convertAmount( $object->amount_due, $object->currency );
		$transaction->total      = $this->convertAmount( $object->total_amount, $object->currency );
		$transaction->tax_amount = $this->convertAmount( $object->tax_amount, $object->currency );
		$transaction->user_id    = $wp_user->ID;
		$transaction->product_id = $membership_id;
		$transaction->trans_num  = $purchase->id . '-' . $membership_id;
		$transaction->txn_type   = \MeprTransaction::$payment_str;
		$transaction->gateway    = 'manual';
		$transaction->created_at = gmdate( 'c' );
		$transaction->expires_at = \MeprUtils::mysql_lifetime();

		// Fire some hooks for Corporate Accounts.
		$transaction->status = \MeprTransaction::$pending_str;
		$transaction->store();
		do_action( 'mepr-signup', $transaction );

		// Complete the transaction.
		$transaction->status = \MeprTransaction::$complete_str;
		return $transaction->store();
	}

	/**
	 * Get all MemberPress transaction ids for a purchase and membership.
	 *
	 * Matches both the legacy trans_num (purchase id alone) and the current one
	 * (purchase id + membership id), scoped to the membership so a purchase mapped
	 * to several memberships never resolves to another membership's row. Returns
	 * every match because duplicates can exist and each one grants access.
	 *
	 * @param string  $purchase_id The SureCart purchase id.
	 * @param integer $membership_id The membership product id.
	 *
	 * @return array Transaction ids.
	 */
	protected function getTransactionIds( $purchase_id, $membership_id ) {
		global $wpdb;
		$table = \MeprDb::fetch()->transactions;
		return array_map( 'intval', $wpdb->get_col( $wpdb->prepare( "SELECT id FROM {$table} WHERE trans_num IN (%s, %s) AND product_id = %d", $purchase_id, $purchase_id . '-' . $membership_id, $membership_id ) ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	}

	/**
	 * Set the status on a list of MemberPress transactions.
	 *
	 * @param array  $ids Transaction ids.
	 * @param string $status The MemberPress transaction status.
	 *
	 * @return boolean|void The last store result, if any rows matched.
	 */
	protected function setTransactionsStatus( $ids, $status ) {
		$stored = null;
		foreach ( $ids as $id ) {
			$transaction         = new \MeprTransaction( $id );
			$transaction->status = $status;
			$stored              = $transaction->store();
		}
		return $stored;
	}

	/**
	 * Maybe convert to non-zero decimal.
	 *
	 * @param integer $amount The amount as an integer.
	 * @param string  $currency The currency.
	 *
	 * @return float|integer The new amount.
	 */
	public function convertAmount( $amount, $currency ) {
		return Currency::isZeroDecimal( $currency ) ? $amount : round( $amount / 100, 2 );
	}
}
