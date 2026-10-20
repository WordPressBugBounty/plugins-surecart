<?php

namespace SureCart\SetupGuide;

use SureCart\Models\Account;
use SureCart\Models\ApiToken;
use SureCart\Models\Download;
use SureCart\Models\Form;
use SureCart\Models\ManualPaymentMethod;
use SureCart\Models\Order;
use SureCart\Models\Processor;
use SureCart\Models\Product;
use SureCart\Models\ShippingZone;
use SureCart\Support\Currency;
use SureCart\WordPress\Admin\AdminPageRegistry;
use SureCart\WordPress\PostTypes\FormModeService;

/**
 * Setup guide progress, plus the temporary site option behind it.
 *
 * The option moves to the platform analytics API later, so it is read and
 * written only here.
 */
class SetupGuideService {
	/**
	 * Site option holding the onboarding answers, dismissals and cached progress.
	 *
	 * @var string
	 */
	const OPTION = 'surecart_setup_guide';

	/**
	 * Guide step ids.
	 *
	 * @var string[]
	 */
	const STEPS = [ 'product', 'brand', 'test_order', 'claimed', 'payments', 'launched' ];

	/**
	 * Onboarding paths.
	 *
	 * @var string[]
	 */
	const PATHS = [ 'create', 'connect', 'skip' ];

	/**
	 * Onboarding steps, as the telemetry tracking plan names them.
	 *
	 * @var string[]
	 */
	const TELEMETRY_STEPS = [ 'account_details', 'connect_account', 'store_details', 'products_sold' ];

	/**
	 * How each onboarding path ended, in the tracking plan's values. Skip still creates a store.
	 *
	 * @var array
	 */
	const TELEMETRY_PATHS = [
		'create'  => [
			'ended_by'      => 'completed',
			'account_setup' => 'created',
		],
		'connect' => [
			'ended_by'      => 'completed',
			'account_setup' => 'connected',
		],
		'skip'    => [
			'ended_by'      => 'skipped',
			'account_setup' => 'created',
		],
	];

	/**
	 * Audience answers mapped to the tracking plan's `built_for` values.
	 *
	 * @var array
	 */
	const TELEMETRY_BUILT_FOR = [
		'myself' => 'self',
		'client' => 'client',
	];

	/**
	 * Selling answers the tracking plan accepts; the ids match the onboarding tiles.
	 *
	 * @var string[]
	 */
	const TELEMETRY_PRODUCT_TYPES = [ 'physical', 'digital', 'services', 'subscriptions', 'memberships', 'software' ];

	/**
	 * Guide step ids mapped to the tracking plan's setup guide steps.
	 *
	 * @var array
	 */
	const TELEMETRY_GUIDE_STEPS = [
		'product'    => 'add_product',
		'brand'      => 'add_branding',
		'test_order' => 'run_test_order',
		'claimed'    => 'claim_account',
		'payments'   => 'set_up_payments',
		'launched'   => 'launch_store',
	];

	/**
	 * Shape of the option before anything is saved.
	 *
	 * @var array
	 */
	const DEFAULTS = [
		'onboarding' => [
			'path'            => '',
			'audience'        => '',
			'sells'           => [],
			'country'         => '',
			'currency'        => '',
			'skipped_at_step' => '',
			'completed_at'    => 0,
		],
		'dismissed'  => [
			'congrats'  => false,
			'guide'     => false,
			'templates' => false,
		],
		'completed'  => [],
		'has_orders' => false,
		// The store the progress was computed for; another store's progress is never reused.
		'account_id' => '',
	];

	/**
	 * Site option holding the once-only telemetry markers.
	 *
	 * Kept out of OPTION so a PATCH that writes back an older copy of the main option can't resend events.
	 *
	 * @var string
	 */
	const REPORTED_OPTION = 'surecart_setup_guide_reported';

	/**
	 * Shape of the telemetry markers before anything is saved.
	 *
	 * @var array
	 */
	const REPORTED_DEFAULTS = [
		// Steps already sent to telemetry, or already done when progress was first computed.
		'reported_steps'    => [],
		'reported_done'     => false,
		// A demo seed was asked for and hasn't landed yet.
		'demo_seed_pending' => false,
	];

	/**
	 * Transient that spaces out attempts to compute progress for a store that never had it.
	 *
	 * @var string
	 */
	const SEED_BACKOFF = 'surecart_setup_guide_seed_backoff';

	/**
	 * Whether a platform query errored while computing the current status.
	 *
	 * @var bool
	 */
	protected $query_failed = false;

	/**
	 * Whether the current status found a test-mode order. Launching also ticks the step, so the step alone can't say.
	 *
	 * @var bool
	 */
	protected $has_test_order = false;

	/**
	 * Who completed a step during this request, keyed by step id, when that is known.
	 *
	 * @var array<string, string>
	 */
	protected $completed_by = [];

	/**
	 * Progress and everything the guide screen renders from.
	 *
	 * @param bool $refresh      Refetch the account first. A claim lands on the platform while the account stays cached for 15 minutes.
	 * @param bool $include_next Also compute the recommended next-step signals.
	 * @return array
	 */
	public function status( bool $refresh = false, bool $include_next = false ): array {
		$this->query_failed = false;

		if ( $refresh && is_wp_error( \SureCart::account()->refresh() ) ) {
			$this->query_failed = true;
		}

		// Without an account every attribute reads empty, which looks like a brand-new store.
		// Read before empty(): the account service has no __isset.
		$account_id = \SureCart::account()->id;
		if ( empty( $account_id ) ) {
			$this->query_failed = true;
		}

		$default_form = \SureCart::forms()->getDefault();
		$product      = $this->productSignals();
		$payments     = $this->paymentSignals();
		$steps        = $this->steps( $default_form, $product['sellable'], $payments['payments'] );
		$has_orders   = $this->has_test_order ? true : $this->hasAny( Order::paginate( [ 'per_page' => 1 ] ) );

		// The badge read the option earlier in this request; a dismissal saved since then must not be overwritten.
		wp_cache_delete( self::OPTION, 'options' );
		wp_cache_delete( self::REPORTED_OPTION, 'options' );

		if ( $this->query_failed ) {
			// A failed query reads as "not done": show the last good answer on top and cache nothing.
			$option = $this->option();
			if ( $this->isCurrentProgress( $option ) ) {
				foreach ( array_intersect( self::STEPS, $option['completed'] ) as $id ) {
					$steps[ $id ] = true;
				}
				$has_orders = $has_orders || $option['has_orders'];
			}
		} else {
			$this->recordDemoSeedLanded();
			// The platform creates imported products after the import job ends, so the run's count, not its completion, says it added them.
			if ( $steps['product'] && ! isset( $this->completed_by['product'] ) && \SureCart::sync()->woocommerce_products()->importedCount() > 0 ) {
				$this->completed_by['product'] = 'woocommerce_import';
			}
			$option = $this->saveProgress( array_keys( array_filter( $steps ) ), $has_orders );
		}

		$status = [
			'steps'                  => $steps,
			'has_orders'             => $has_orders,
			'remaining'              => $this->countRemaining( array_keys( array_filter( $steps ) ), $has_orders ),
			'live_payments'          => $payments['live_payments'],
			'claim_expired'          => (bool) \SureCart::account()->claim_expired,
			// Named admin routes are not registered on the REST boot request, so routeUrl() would throw.
			'claim_url'              => ! \SureCart::account()->claimed ? esc_url_raw( admin_url( 'admin.php?page=sc-claim-account' ) ) : '',
			'default_form_edit_url'  => ! empty( $default_form->ID ) ? get_edit_post_link( $default_form->ID, 'raw' ) : '',
			'test_checkout_url'      => $product['test_checkout_url'],
			'test_product_name'      => $product['test_product_name'],
			'unpriced_product'       => $product['unpriced_product'],
			'unpriced_count'         => $product['unpriced_count'],
			'other_test_forms_count' => $this->otherTestFormsCount( $default_form ),
			'woo'                    => [
				'active'  => class_exists( 'WooCommerce' ),
				'running' => \SureCart::sync()->woocommerce_products()->isRunning(),
			],
			'seeded_at'              => \SureCart::account()->seeded_at,
			'profile'                => $option['onboarding'],
			'dismissed'              => $option['dismissed'],
			'demo_seed_available'    => $this->demoSeedAvailable(),
			// Consent can change in Settings without a reload; the guide's events gate on this copy.
			'telemetry_consent'      => \SureCart::telemetry()->consent(),
		];

		if ( $include_next ) {
			$status['next'] = $this->nextSteps( $default_form );
		}

		return $status;
	}

	/**
	 * Steps still to do, from the cached progress — no API call once progress has been computed.
	 *
	 * @return int 0 once the store is past setup.
	 */
	public function remaining(): int {
		// The guide page is only registered once a token exists.
		if ( ! ApiToken::get() ) {
			return 0;
		}

		// Stores updated from before the guide never computed progress, and would get no claim prompt.
		// Progress saved for another store (token changed) or by an onboarding PATCH alone counts as never computed.
		if ( ! $this->hasCurrentProgress() ) {
			$this->seedProgress();
		}

		// Still nothing computed: a count would be a guess, and "6" on a set-up store is wrong.
		if ( ! $this->hasCurrentProgress() ) {
			return 0;
		}

		$option = $this->option();

		return $this->countRemaining( $option['completed'], $option['has_orders'] );
	}

	/**
	 * Steps left from progress already computed for this store; never seeds.
	 *
	 * @return int|null Null when there is no current progress to read.
	 */
	public function computedRemaining(): ?int {
		if ( ! ApiToken::get() || ! $this->hasCurrentProgress() ) {
			return null;
		}

		$option = $this->option();

		return $this->countRemaining( $option['completed'], $option['has_orders'] );
	}

	/**
	 * Whether the merchant dismissed part of the guide for this store, from the saved option only.
	 *
	 * Another store's dismissals don't count; its progress resets them on the next save.
	 *
	 * @param string $key Dismissal key, e.g. `guide` or `templates`.
	 * @return bool
	 */
	public function isDismissed( string $key ): bool {
		$option = $this->option();

		return ! empty( $option['dismissed'][ $key ] ) && $this->isCurrentProgress( $option );
	}

	/**
	 * Steps left, or 0 once the store is past setup: taking orders, connected, and with a processor.
	 *
	 * The one rule behind the badge, the bar, the status payload and the activation redirect.
	 *
	 * @param string[] $completed  Completed step ids.
	 * @param bool     $has_orders Whether the store has any order, test or live.
	 * @return int
	 */
	protected function countRemaining( array $completed, bool $has_orders ): int {
		$completed = array_intersect( self::STEPS, $completed );

		if ( $has_orders && empty( array_diff( [ 'claimed', 'payments' ], $completed ) ) ) {
			return 0;
		}

		return count( self::STEPS ) - count( $completed );
	}

	/**
	 * Whether progress was computed and saved for the connected store.
	 *
	 * @return bool
	 */
	protected function hasCurrentProgress(): bool {
		if ( false === get_option( self::OPTION ) ) {
			return false;
		}

		$option = $this->option();

		return '' !== $option['account_id'] && $this->isCurrentProgress( $option );
	}

	/**
	 * Whether stored progress can belong to the connected store.
	 *
	 * With no account loaded, or progress saved before it carried an id, there is nothing to compare, so it is trusted.
	 *
	 * @param array $option The stored option.
	 * @return bool
	 */
	protected function isCurrentProgress( array $option ): bool {
		$account_id = (string) \SureCart::account()->id;

		return '' === $account_id || '' === $option['account_id'] || $option['account_id'] === $account_id;
	}

	/**
	 * Compute progress once for a store that has none cached.
	 *
	 * Backs off between attempts, so a failing API costs one request per window rather than one per admin page.
	 *
	 * @return void
	 */
	protected function seedProgress(): void {
		if ( get_transient( self::SEED_BACKOFF ) ) {
			return;
		}

		set_transient( self::SEED_BACKOFF, 1, 5 * MINUTE_IN_SECONDS );

		$this->status();
	}

	/**
	 * What the "Continue setup" bar shows on an admin page, from the cached progress only.
	 *
	 * An expired claim replaces the progress with a support prompt, whatever the progress is.
	 *
	 * @param string|null $page Admin page slug. Defaults to the current request's.
	 * @return array Empty when the bar must not render, otherwise `expired`, `done`, `total` and `hidden`.
	 */
	public function bar( ?string $page = null ): array {
		$page = $page ?? AdminPageRegistry::currentSlug();

		// Onboarding is a full-screen takeover the bar would only lead away from.
		if ( 'sc-getting-started' === $page ) {
			return [];
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return [];
		}

		if ( ! ApiToken::get() ) {
			return [];
		}

		// Still rendered on the guide so a client-side swap away from it can reveal the bar.
		$hidden = 'sc-setup-guide' === $page;

		// Kept even when the guide is hidden: it's the only sign the store can't go live.
		if ( \SureCart::account()->claim_expired ) {
			return [
				'expired' => true,
				'hidden'  => $hidden,
			];
		}

		if ( $this->isDismissed( 'guide' ) ) {
			return [];
		}

		$remaining = $this->remaining();
		if ( $remaining < 1 ) {
			return [];
		}

		return [
			'expired' => false,
			'done'    => count( self::STEPS ) - $remaining,
			'total'   => count( self::STEPS ),
			'hidden'  => $hidden,
		];
	}

	/**
	 * Merge sanitized onboarding answers and dismissals into the option.
	 *
	 * @param array $changes Any of `onboarding`, `dismissed`.
	 * @return array The stored option.
	 */
	public function update( array $changes ): array {
		$option = $this->option();

		// Saved for another store (token changed): merging into it would let the next status() wipe these answers.
		// The empty account id keeps it "not yet computed", so status() adopts it rather than resetting it.
		if ( ! $this->isCurrentProgress( $option ) ) {
			$option = self::DEFAULTS;
			$this->saveReported( self::REPORTED_DEFAULTS );
		}

		$was_completed = ! empty( $option['onboarding']['completed_at'] );

		if ( is_array( $changes['onboarding'] ?? null ) ) {
			$onboarding           = $this->sanitizeOnboarding( $changes['onboarding'] );
			$option['onboarding'] = array_merge( $option['onboarding'], $onboarding );

			// Onboarding finishes by sending its path; the time is the server's, never the client's.
			if ( ! $was_completed && ! empty( $onboarding['path'] ) ) {
				$option['onboarding']['completed_at'] = time();
			}
		}

		if ( is_array( $changes['dismissed'] ?? null ) ) {
			$option['dismissed'] = array_merge( $option['dismissed'], $this->sanitizeDismissed( $changes['dismissed'] ) );
		}

		$this->save( $option );

		// completed_at is only ever set once, so this sends the answers once.
		if ( ! $was_completed && ! empty( $option['onboarding']['completed_at'] ) ) {
			\SureCart::telemetry()->record( 'onboarding_answers_submitted', $this->answersSubmitted( $option['onboarding'] ) );
		}

		return $option;
	}

	/**
	 * Map the stored answers to the tracking plan, leaving out anything unknown.
	 *
	 * The platform rejects the whole event for a value outside its lists, so every value is checked here.
	 *
	 * @param array $onboarding The stored onboarding answers.
	 * @return array
	 */
	protected function answersSubmitted( array $onboarding ): array {
		$properties = self::TELEMETRY_PATHS[ $onboarding['path'] ] ?? [];

		if ( isset( self::TELEMETRY_BUILT_FOR[ $onboarding['audience'] ] ) ) {
			$properties['built_for'] = self::TELEMETRY_BUILT_FOR[ $onboarding['audience'] ];
		}

		$types = array_values( array_intersect( (array) $onboarding['sells'], self::TELEMETRY_PRODUCT_TYPES ) );
		if ( ! empty( $types ) ) {
			$properties['planned_product_types'] = $types;
		}

		if ( preg_match( '/^[A-Z]{2}$/', $onboarding['country'] ) ) {
			$properties['business_country'] = $onboarding['country'];
		}

		if ( '' !== $onboarding['currency'] ) {
			$properties['currency'] = $onboarding['currency'];
		}

		if ( 'skip' === $onboarding['path'] && '' !== $onboarding['skipped_at_step'] ) {
			$properties['skipped_at_step'] = $onboarding['skipped_at_step'];
		}

		return $properties;
	}

	/**
	 * Put the default checkout form into live mode.
	 *
	 * @return array|\WP_Error Fresh status, or an error when the store is unclaimed, has no processor or has no default form.
	 */
	public function launch() {
		if ( ! \SureCart::account()->claimed ) {
			return new \WP_Error( 'account_unclaimed', __( 'Connect your store before launching it.', 'surecart' ), [ 'status' => 422 ] );
		}

		// A live checkout with only a test-mode processor would have no way to take payment.
		if ( ! $this->paymentSignals()['live_payments'] ) {
			return new \WP_Error( 'payments_not_ready', __( 'Your store can’t take live payments yet. Launch once your payment processor is approved for live payments, or add a manual payment method.', 'surecart' ), [ 'status' => 422 ] );
		}

		$form = \SureCart::forms()->getDefault();
		if ( empty( $form->ID ) ) {
			return new \WP_Error( 'form_not_found', __( 'The default checkout form could not be found.', 'surecart' ), [ 'status' => 404 ] );
		}

		$updated = FormModeService::set( $form->ID, 'live' );
		if ( is_wp_error( $updated ) ) {
			return $updated;
		}

		$this->completed_by['launched'] = 'merchant';

		return $this->status();
	}

	/**
	 * Add the platform's demo products to an empty store.
	 *
	 * @return \SureCart\Models\Account|\WP_Error
	 */
	public function seed() {
		if ( ! $this->demoSeedAvailable() ) {
			return new \WP_Error( 'demo_seed_unavailable', __( 'Demo products are not available for this store.', 'surecart' ), [ 'status' => 403 ] );
		}

		if ( $this->hasAny( Product::paginate( [ 'per_page' => 1 ] ) ) ) {
			return new \WP_Error( 'products_exist', __( 'Demo products can only be added to an empty store.', 'surecart' ), [ 'status' => 422 ] );
		}

		\SureCart::telemetry()->record( 'product_import_started', [ 'origin' => 'demo_products' ] );

		$account = Account::seed();
		if ( is_wp_error( $account ) ) {
			\SureCart::telemetry()->record(
				'product_import_failed',
				[
					'origin'     => 'demo_products',
					'stage'      => 'seed',
					'error_code' => (string) $account->get_error_code(),
				]
			);
			return $account;
		}

		\SureCart::account()->clearCache();

		// The platform seeds in the background; status() records the completion once seeded_at lands.
		$reported                      = $this->reported();
		$reported['demo_seed_pending'] = true;
		$this->saveReported( $reported );

		return $account;
	}

	/**
	 * Record a pending demo seed as completed once the platform reports it seeded.
	 *
	 * The platform doesn't say how many products it added, so no counts are sent.
	 *
	 * @return void
	 */
	protected function recordDemoSeedLanded(): void {
		$reported = $this->reported();

		// An accessor: read before empty().
		$seeded_at = \SureCart::account()->seeded_at;
		if ( ! $reported['demo_seed_pending'] || empty( $seeded_at ) ) {
			return;
		}

		$reported['demo_seed_pending'] = false;
		$this->saveReported( $reported );

		$this->completed_by['product'] = 'demo_products';
		\SureCart::telemetry()->record( 'product_import_completed', [ 'origin' => 'demo_products' ] );
	}

	/**
	 * Whether the platform demo seed can be offered.
	 *
	 * @return bool
	 */
	protected function demoSeedAvailable(): bool {
		// The platform only seeds an account once; an accessor, so read before empty().
		$seeded_at = \SureCart::account()->seeded_at;
		if ( ! empty( $seeded_at ) ) {
			return false;
		}

		/**
		 * Whether the platform demo seed can be offered.
		 *
		 * @param bool $available Return false to hide the demo products offer.
		 */
		return (bool) apply_filters( 'surecart/setup_guide/demo_seed', true );
	}

	/**
	 * Done state per guide step.
	 *
	 * @param \WP_Post|null $default_form The default checkout form.
	 * @param bool          $sellable     Whether a published product has an active price.
	 * @param bool          $payments     Whether the store can take payments, in either mode.
	 * @return array<string, bool>
	 */
	protected function steps( $default_form, bool $sellable, bool $payments ): array {
		$account = \SureCart::account();
		// Plain reads only: the account service resolves attributes through __get and has no __isset, so empty()/isset() on it are always "missing".
		$claimed  = (bool) $account->claimed;
		$launched = $claimed && ! empty( $default_form->ID ) && 'live' === Form::getMode( $default_form->ID );

		$this->has_test_order = $this->hasAny( Order::where( [ 'live_mode' => false ] )->paginate( [ 'per_page' => 1 ] ) );

		return [
			'product'    => $sellable,
			'brand'      => ! empty( $account->brand->logo_url ),
			// A launched store has moved past testing, with or without a test order.
			'test_order' => $this->has_test_order || $launched,
			'claimed'    => $claimed,
			'payments'   => $payments,
			'launched'   => $launched,
		];
	}

	/**
	 * The first sellable product, and what the product and test order steps link to.
	 *
	 * Sellable: published, not archived, with an active price.
	 *
	 * @return array `sellable`, `test_checkout_url`, `test_product_name`, `unpriced_product` (name and edit url, or null) and `unpriced_count`.
	 */
	protected function productSignals(): array {
		$signals = [
			'sellable'          => false,
			'test_checkout_url' => '',
			'test_product_name' => '',
			'unpriced_product'  => null,
			'unpriced_count'    => 0,
		];

		// No dotted expands, so the cached product list still serves this.
		// No `ad_hoc` filter: the platform applies it to prices and drops products that have none.
		$products = Product::where(
			[
				'archived' => false,
				'status'   => [ 'published' ],
			]
		)->with( [ 'prices', 'variant_options' ] )->paginate( [ 'per_page' => 10 ] );

		if ( is_wp_error( $products ) ) {
			$this->query_failed = true;
			return $signals;
		}

		// Pay-what-you-want and variant products sell, but only from their page, where the buyer enters an amount or picks a variant.
		$fallback = null;

		foreach ( (array) $products->data as $product ) {
			$active = array_values( array_filter( (array) ( $product->prices->data ?? [] ), fn( $price ) => empty( $price->archived ) ) );

			if ( empty( $active ) ) {
				++$signals['unpriced_count'];
				if ( null === $signals['unpriced_product'] ) {
					$signals['unpriced_product'] = [
						'name'     => (string) $product->name,
						// edit() escapes for HTML; the client sets this as an href itself.
						'edit_url' => esc_url_raw( html_entity_decode( \SureCart::getUrl()->edit( 'product', $product->id ) ) ),
					];
				}
				continue;
			}

			$signals['sellable'] = true;

			$fixed = array_values( array_filter( $active, fn( $price ) => empty( $price->ad_hoc ) ) );

			// The checkout link carries no amount or variant.
			if ( empty( $fixed ) || ! empty( $product->variant_options->data ?? [] ) ) {
				// An accessor: read before empty().
				$permalink = null === $fallback ? $product->permalink : '';
				if ( ! empty( $permalink ) ) {
					$fallback = [
						'url'  => $permalink,
						'name' => (string) $product->name,
					];
				}
				continue;
			}

			$signals['test_checkout_url'] = \SureCart::getUrl()->checkout(
				[
					[
						'id'       => $fixed[0]->id,
						'quantity' => 1,
					],
				]
			);
			$signals['test_product_name'] = (string) $product->name;
			break;
		}

		if ( '' === $signals['test_checkout_url'] && null !== $fallback ) {
			$signals['test_checkout_url'] = esc_url_raw( $fallback['url'] );
			$signals['test_product_name'] = $fallback['name'];
		}

		// The nudge to add a price only matters while nothing is sellable.
		if ( $signals['sellable'] ) {
			$signals['unpriced_product'] = null;
			$signals['unpriced_count']   = 0;
		}

		return $signals;
	}

	/**
	 * Whether the store can take payments at all, and whether it can take live ones.
	 *
	 * A test-mode processor counts for the step, since live approval can take days. Launch needs live payments.
	 * An enabled manual payment method counts for both.
	 *
	 * @return array `payments` and `live_payments`.
	 */
	protected function paymentSignals(): array {
		$signals = [
			'payments'      => false,
			'live_payments' => false,
		];

		$processors = Processor::get();
		if ( is_wp_error( $processors ) ) {
			$this->query_failed = true;
		} else {
			foreach ( (array) $processors as $processor ) {
				if ( 'mock' === $processor->processor_type || empty( $processor->enabled ) || empty( $processor->approved ) ) {
					continue;
				}
				$signals['payments'] = true;
				if ( ! empty( $processor->live_mode ) ) {
					$signals['live_payments'] = true;
					break;
				}
			}
		}

		if ( ! $signals['live_payments'] && $this->hasAny( ManualPaymentMethod::where( [ 'archived' => false ] )->paginate( [ 'per_page' => 1 ] ) ) ) {
			$signals['payments']      = true;
			$signals['live_payments'] = true;
		}

		return $signals;
	}

	/**
	 * Done state per recommended next step. `portal` has no done state.
	 *
	 * @param \WP_Post|null $default_form The default checkout form.
	 * @return array<string, bool|null>
	 */
	protected function nextSteps( $default_form ): array {
		$account = \SureCart::account();
		$tax     = $account->tax_protocol;
		$portal  = $account->customer_portal_protocol;

		$vat_numbers = ! empty( $tax->eu_vat_required );
		if ( ! $vat_numbers && ! empty( $default_form ) ) {
			$vat_numbers = has_block( 'surecart/tax-id-input', $default_form );
		}

		return [
			'shipping'    => ! empty( $account->shipping_protocol->shipping_enabled ) && $this->hasAny( ShippingZone::paginate( [ 'per_page' => 1 ] ) ),
			'downloads'   => $this->hasAny( Download::paginate( [ 'per_page' => 1 ] ) ),
			'tax'         => ! empty( $tax->tax_enabled ),
			'eu_vat'      => ! empty( $tax->eu_tax_enabled ),
			'vat_numbers' => $vat_numbers,
			'policies'    => ! empty( $portal->terms_url ) && ! empty( $portal->privacy_url ),
			'portal'      => null,
		];
	}

	/**
	 * Published checkout forms, other than the default, still in test mode.
	 *
	 * @param \WP_Post|null $default_form The default checkout form.
	 * @return int
	 */
	protected function otherTestFormsCount( $default_form ): int {
		// Full posts, not ids, so getMode() reads from the primed post cache instead of one query per form.
		$forms = get_posts(
			[
				'post_type'   => 'sc_form',
				'post_status' => 'publish',
				'numberposts' => -1,
				'exclude'     => [ (int) ( $default_form->ID ?? 0 ) ],
			]
		);

		return count( array_filter( $forms, fn( $form ) => 'test' === Form::getMode( $form->ID ) ) );
	}

	/**
	 * Whether a one-item page came back with something in it.
	 *
	 * @param \SureCart\Models\Collection|\WP_Error $page A `paginate( [ 'per_page' => 1 ] )` result.
	 * @return bool
	 */
	protected function hasAny( $page ): bool {
		if ( is_wp_error( $page ) ) {
			$this->query_failed = true;
			return false;
		}

		// Collection resolves attributes through __get and has no __isset, so read before empty().
		$items = $page->data;

		return ! empty( $items );
	}

	/**
	 * Sanitize the onboarding answers that were sent; untouched keys are left out.
	 *
	 * `completed_at` is never taken from the client; update() sets it.
	 *
	 * @param array $onboarding Raw answers.
	 * @return array
	 */
	protected function sanitizeOnboarding( array $onboarding ): array {
		$clean = [];

		if ( isset( $onboarding['path'] ) ) {
			$path          = sanitize_key( $onboarding['path'] );
			$clean['path'] = in_array( $path, self::PATHS, true ) ? $path : '';
		}
		if ( isset( $onboarding['audience'] ) ) {
			$audience          = sanitize_key( $onboarding['audience'] );
			$clean['audience'] = array_key_exists( $audience, self::TELEMETRY_BUILT_FOR ) ? $audience : '';
		}
		if ( isset( $onboarding['sells'] ) ) {
			$clean['sells'] = array_values( array_intersect( array_map( 'sanitize_key', (array) $onboarding['sells'] ), self::TELEMETRY_PRODUCT_TYPES ) );
		}
		if ( isset( $onboarding['country'] ) ) {
			// An ISO code or nothing: a byte-wise cut of anything else could store invalid UTF-8.
			$country          = strtoupper( sanitize_text_field( $onboarding['country'] ) );
			$clean['country'] = preg_match( '/^[A-Z]{2}$/', $country ) ? $country : '';
		}
		if ( isset( $onboarding['currency'] ) ) {
			$currency          = strtolower( sanitize_text_field( $onboarding['currency'] ) );
			$clean['currency'] = array_key_exists( $currency, Currency::getSupportedCurrencies() ) ? $currency : '';
		}
		if ( isset( $onboarding['skipped_at_step'] ) ) {
			$step                     = sanitize_key( $onboarding['skipped_at_step'] );
			$clean['skipped_at_step'] = in_array( $step, self::TELEMETRY_STEPS, true ) ? $step : '';
		}

		return $clean;
	}

	/**
	 * Sanitize the dismissal flags that were sent; unknown keys are dropped.
	 *
	 * @param array $dismissed Raw flags.
	 * @return array
	 */
	protected function sanitizeDismissed( array $dismissed ): array {
		$clean = [];

		foreach ( array_keys( self::DEFAULTS['dismissed'] ) as $key ) {
			if ( array_key_exists( $key, $dismissed ) ) {
				$clean[ $key ] = rest_sanitize_boolean( $dismissed[ $key ] );
			}
		}

		return $clean;
	}

	/**
	 * The stored option on top of the defaults.
	 *
	 * @return array
	 */
	protected function option(): array {
		$stored = get_option( self::OPTION, [] );
		$stored = is_array( $stored ) ? $stored : [];
		$option = self::DEFAULTS;

		foreach ( [ 'onboarding', 'dismissed' ] as $key ) {
			$option[ $key ] = array_merge( self::DEFAULTS[ $key ], (array) ( $stored[ $key ] ?? [] ) );
		}
		$option['completed']  = array_values( (array) ( $stored['completed'] ?? [] ) );
		$option['has_orders'] = (bool) ( $stored['has_orders'] ?? false );
		$option['account_id'] = (string) ( $stored['account_id'] ?? '' );

		return $option;
	}

	/**
	 * The stored telemetry markers on top of the defaults.
	 *
	 * @return array
	 */
	protected function reported(): array {
		$stored = get_option( self::REPORTED_OPTION, [] );
		$stored = is_array( $stored ) ? $stored : [];

		return [
			'reported_steps'    => array_values( (array) ( $stored['reported_steps'] ?? [] ) ),
			'reported_done'     => (bool) ( $stored['reported_done'] ?? false ),
			'demo_seed_pending' => (bool) ( $stored['demo_seed_pending'] ?? false ),
		];
	}

	/**
	 * Store the computed progress, touching nothing else in the option.
	 *
	 * @param string[] $completed  Completed step ids.
	 * @param bool     $has_orders Whether the store has any order, test or live.
	 * @return array The stored option.
	 */
	protected function saveProgress( array $completed, bool $has_orders ): array {
		$option   = $this->option();
		$reported = $this->reported();

		// First progress for this store: steps done before the guide existed are not news, so they only seed the baseline.
		$baseline = ! $this->hasCurrentProgress();

		// Another store's answers, dismissals and markers don't carry over to this one.
		if ( ! $this->isCurrentProgress( $option ) ) {
			$option   = array_merge( $option, array_intersect_key( self::DEFAULTS, array_flip( [ 'onboarding', 'dismissed' ] ) ) );
			$reported = self::REPORTED_DEFAULTS;
		}

		$sent      = $baseline ? [] : $reported['reported_steps'];
		$new_steps = $baseline ? [] : array_values( array_diff( $completed, $sent ) );
		$all_done  = empty( array_diff( self::STEPS, $completed ) );
		$new_done  = ! $baseline && $all_done && ! $reported['reported_done'];

		$option['completed']        = $completed;
		$option['has_orders']       = $has_orders;
		$option['account_id']       = (string) \SureCart::account()->id;
		$reported['reported_steps'] = array_values( array_unique( array_merge( $sent, $completed ) ) );
		if ( $baseline ) {
			$reported['reported_done'] = $all_done;
		} elseif ( $all_done ) {
			$reported['reported_done'] = true;
		}
		$this->save( $option );
		$this->saveReported( $reported );

		$this->recordProgress( $new_steps, $new_done );

		return $option;
	}

	/**
	 * Record the steps that just completed, and the guide itself once every step is done.
	 *
	 * @param string[] $steps    Newly completed step ids.
	 * @param bool     $all_done Whether every step just became done.
	 * @return void
	 */
	protected function recordProgress( array $steps, bool $all_done ): void {
		foreach ( $steps as $id ) {
			if ( ! isset( self::TELEMETRY_GUIDE_STEPS[ $id ] ) ) {
				continue;
			}

			$properties = [ 'step' => self::TELEMETRY_GUIDE_STEPS[ $id ] ];
			if ( isset( $this->completed_by[ $id ] ) ) {
				$properties['completed_by'] = $this->completed_by[ $id ];
			}

			\SureCart::telemetry()->record( 'setup_guide_step_completed', $properties );
		}

		if ( $all_done ) {
			\SureCart::telemetry()->record( 'setup_guide_completed' );
		}
	}

	/**
	 * Persist the option without autoloading it.
	 *
	 * @param array $option The full option.
	 * @return void
	 */
	protected function save( array $option ): void {
		update_option( self::OPTION, $option, false );
	}

	/**
	 * Persist the telemetry markers without autoloading them.
	 *
	 * @param array $reported The full set of markers.
	 * @return void
	 */
	protected function saveReported( array $reported ): void {
		update_option( self::REPORTED_OPTION, $reported, false );
	}
}
