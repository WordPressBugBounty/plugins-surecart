<?php
namespace SureCart\Account;

use SureCart\Models\Account;
use SureCart\Models\ApiToken;
use SureCart\Models\ProvisionalAccount;

/**
 * Service for plugin activation.
 */
class AccountService {
	/**
	 * Holds the global account model.
	 *
	 * @var \SureCart\Models\Account;
	 */
	protected $account = null;

	/**
	 * The key for the cache.
	 *
	 * @var string
	 */
	protected $cache_key = 'surecart_account';

	/**
	 * The application instance.
	 *
	 * @var \SureCart\Application\Application
	 */
	protected $app = null;

	/**
	 * Whether the account was requested from the API during this request.
	 *
	 * @var bool
	 */
	protected $fetched_live = false;

	/**
	 * Why this request's refresh failed, so a repeat call doesn't report the kept account as fresh.
	 *
	 * @var \WP_Error|null
	 */
	protected $refresh_error = null;

	/**
	 * Bootstrap the service.
	 *
	 * @return void
	 */
	public function bootstrap() {
		// clear account cache when account is updated.
		\add_action( 'surecart/account_updated', array( $this, 'clearCache' ) );
	}

	/**
	 * Seed the account with products and collections.
	 *
	 * @param array $products The products to seed.
	 *
	 * @return \SureCart\Models\Import|\WP_Error
	 */
	public function seed( $products = [] ) {
		return $this->app->resolve( 'surecart.account.seed' )->seed( $products );
	}

	/**
	 * Import products (and optionally WooCommerce products) into the account.
	 *
	 * @param array $data Data with optional `products` and `import_woocommerce_products`.
	 *
	 * @return true|\WP_Error
	 */
	public function import( $data = [] ) {
		return $this->app->resolve( 'surecart.account.seed' )->import( $data );
	}

	/**
	 * Set up a store for a third party (e.g. Starter Templates) without ever replacing a connected account.
	 *
	 * An `api_token` connects the site to that existing store instead; a connected site keeps its store.
	 * Callers can tell the outcomes apart with `instanceof ProvisionalAccount` (created) vs `Account` (existing).
	 *
	 * @param array $data Provisional account attributes, plus an optional `api_token`. Once connected, only `products` and `import_woocommerce_products` are used.
	 *
	 * @return Account|ProvisionalAccount|\WP_Error
	 */
	public function setup( $data = [] ) {
		$token = is_string( $data['api_token'] ?? null ) ? trim( $data['api_token'] ) : '';
		// A credential, so it must never reach the public provisional accounts endpoint.
		unset( $data['api_token'] );

		if ( ! $this->isConnected() ) {
			// The platform never de-duplicates, so a second provisional account would orphan this store.
			if ( empty( $token ) ) {
				return ProvisionalAccount::create( $data );
			}

			$connected = $this->connect( $token );
			if ( is_wp_error( $connected ) ) {
				return $connected;
			}
		} elseif ( ! empty( $token ) && ApiToken::get() !== $token ) {
			return new \WP_Error( 'already_connected', __( 'This site is already connected to a different store.', 'surecart' ) );
		}

		// A stale or revoked token surfaces here as the platform's error; we never fall back to creating.
		$import = $this->import( $data );
		if ( is_wp_error( $import ) ) {
			return $import;
		}

		return Account::find();
	}

	/**
	 * Connect this site to an existing store, saving the token only once the platform accepts it.
	 *
	 * @param string $token The store's API token.
	 *
	 * @return true|\WP_Error
	 */
	protected function connect( $token ) {
		try {
			$account = \SureCart::requests()->setToken( $token )->get( 'account' );
		} finally {
			// Put the shared service back so a rejected token isn't reused.
			\SureCart::requests()->setToken( ApiToken::get() );
		}

		if ( is_wp_error( $account ) ) {
			return $account;
		}

		if ( empty( $account->id ) ) {
			return new \WP_Error( 'invalid_token', __( 'Invalid API token.', 'surecart' ) );
		}

		ApiToken::save( $token );
		$this->clearCache();

		return true;
	}

	/**
	 * We get the account when the service is loaded.
	 * Since this is loaded in a service container, its
	 * cached so it only fetches once, no matter how many calls.
	 *
	 * This is also cached in a 60 second transient to prevent
	 * rate limited calls to the API.
	 *
	 * @param \SureCart\Support\Server              $server The server utility to use.
	 * @param \SureCartCore\Application\Application $app The application instance.
	 *
	 * @return void
	 */
	public function __construct( \SureCart\Support\Server $server, \SureCartCore\Application\Application $app ) {
		$this->app = $app;

		$cache = null;

		if ( defined( 'SURECART_CACHE_ACCOUNT' ) ) {
			$cache = SURECART_CACHE_ACCOUNT;
		}

		// do not cache requests if specifically set to false.
		if ( false === $cache ) {
			$this->fetchAccount();
			return;
		}

		// cache requests if specifically set to true.
		if ( true === $cache ) {
			$this->fetchCachedAccount();
			return;
		}

		// don't cache on localhost if constant is not set.
		if ( $server->isLocalHost() ) {
			$this->fetchAccount();
			return;
		}

		// cache requests if not explicitly set.
		$this->fetchCachedAccount();
	}

	/**
	 * Fetch the cached account.
	 *
	 * @return \SureCart\Models\Account|\WP_Error|null
	 */
	public function fetchCachedAccount() {
		$this->account = $this->convertArrayToAccount( get_transient( $this->cache_key ) );

		// we don't have a cached account.
		if ( empty( $this->account ) ) {
			// fetch the account.
			$this->account = $this->fetchAccount();

			// there was an error or the account could not be fetched by other means.
			if ( is_wp_error( $this->account ) || ! ( $this->account instanceof Account ) || empty( $this->account->id ) ) {
				// get the previously working account.
				$previously_working_account = $this->convertArrayToAccount( get_option( 'sc_previous_account' ) );

				// if there was no previously working account, return the error.
				if ( empty( $previously_working_account ) || empty( $previously_working_account->id ) ) {
					// return the error.
					return $this->account;
				}

				// set previously working account and don't try for 5 minutes.
				set_transient( $this->cache_key, $previously_working_account->toArray(), 5 * MINUTE_IN_SECONDS );

				// return the account.
				return $previously_working_account;
			}

			// store the previously working account in case we need a fallback.
			update_option( 'sc_previous_account', $this->account->toArray() );

			// set the transient.
			set_transient( $this->cache_key, $this->account->toArray(), 15 * MINUTE_IN_SECONDS );
		}

		return $this->account;
	}

	/**
	 * Fetch the account.
	 *
	 * @return \SureCart\Models\Account
	 */
	protected function fetchAccount() {
		$this->account      = Account::with( array( 'brand', 'brand.address', 'brand.logo', 'brand.dark_logo', 'customer_portal_protocol', 'order_protocol', 'tax_protocol', 'tax_protocol.address', 'subscription_protocol', 'review_protocol', 'shipping_protocol', 'affiliation_protocol' ) )->find();
		$this->fetched_live = true;
		return $this->account;
	}

	/**
	 * Replace the account with a live one from the API and re-cache it.
	 *
	 * Skips the request when this request already fetched live, e.g. right after the transient expired.
	 * On failure the account already in memory is kept, so the rest of the request still reads something.
	 *
	 * @return \SureCart\Models\Account|\WP_Error
	 */
	public function refresh() {
		if ( $this->fetched_live ) {
			return $this->refresh_error ?? $this->account;
		}

		$previous = $this->account;
		$account  = $this->fetchAccount();

		if ( is_wp_error( $account ) || ! ( $account instanceof Account ) || empty( $account->id ) ) {
			if ( $previous instanceof Account ) {
				$this->account = $previous;
			}
			$this->refresh_error = is_wp_error( $account ) ? $account : new \WP_Error( 'account_not_found', __( 'The store account could not be loaded.', 'surecart' ) );
			return $this->refresh_error;
		}

		$this->refresh_error = null;

		update_option( 'sc_previous_account', $account->toArray() );
		set_transient( $this->cache_key, $account->toArray(), 15 * MINUTE_IN_SECONDS );

		return $account;
	}

	/**
	 * Clear account cache.
	 *
	 * @return boolean
	 */
	public function clearCache() {
		// The next refresh() must ask the API again.
		$this->fetched_live  = false;
		$this->refresh_error = null;
		return delete_transient( $this->cache_key );
	}

	/**
	 * Is the account connected?
	 *
	 * @return boolean
	 */
	public function isConnected() {
		return ! empty( ApiToken::get() );
	}

	/**
	 * Should affiliate click tracking run on this store?
	 *
	 * @return boolean
	 */
	public function isAffiliateTrackingEnabled(): bool {
		$tracking_enabled = $this->affiliation_protocol->wordpress_plugin_tracking_enabled ?? false;
		$script_defined   = defined( 'SURECART_ENABLE_AFFILIATE_SCRIPT' ) && ! empty( SURECART_ENABLE_AFFILIATE_SCRIPT );

		return ( $tracking_enabled || $script_defined ) && ! empty( $this->entitlements->affiliates );
	}

	/**
	 * Get the account model attribute
	 *
	 * @param string $attribute Attribute name.
	 * @return mixed
	 */
	public function __get( $attribute ) {
		return $this->account->$attribute ?? null;
	}

	/**
	 * Convert an associative array back to an Account model.
	 *
	 * @param array $data Associative array.
	 * @return \SureCart\Models\Account|null
	 */
	public function convertArrayToAccount( $data ) {
		// Handle Backward Compatibility. If it's already an account, return it.
		if ( $data instanceof Account ) {
			return $data;
		}

		if ( empty( $data ) || ( ! isset( $data['id'] ) && ! isset( $data->id ) ) ) {
			return null;
		}

		$data = json_decode( wp_json_encode( $data ) );

		return new Account( $data );
	}
}
