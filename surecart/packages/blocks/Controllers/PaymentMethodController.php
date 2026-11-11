<?php
namespace SureCartBlocks\Controllers;

use SureCart\Models\Component;
use SureCart\Models\Customer;
use SureCart\Models\Processor;
use SureCart\Models\User;

/**
 * Payment method block controller class.
 */
class PaymentMethodController extends BaseController {
	/**
	 * List all payment methods.
	 *
	 * @param array  $attributes Block attributes.
	 * @param string $content Block content.
	 *
	 * @return function
	 */
	public function index( $attributes, $content ) {
		if ( ! is_user_logged_in() ) {
			return false;
		}

		$protocol = \SureCart::account()->subscription_protocol;

		return wp_kses_post(
			Component::tag( 'sc-payment-methods-list' )
			->id( 'sc-customer-payment-methods-list' )
			->with(
				[
					'isCustomer'                    => User::current()->isCustomer(),
					'canDetachDefaultPaymentMethod' => $protocol->default_payment_method_detach_enabled ?? false,
					'query'                         => [
						'customer_ids' => array_values( User::current()->customerIds() ),
						'page'         => 1,
						'per_page'     => 100,
						'reusable'     => true,
					],
				]
			)->render( ( $attributes['title'] ?? __( 'Payment Methods', 'surecart' ) ) ? "<span slot='heading'>" . ( $attributes['title'] ?? __( 'Payment Methods', 'surecart' ) ) . '</span>' : '' )
		);
	}

	public function getProcessors() {
		return array_values(
			array_filter(
				Processor::get() ?? [],
				function ( $processor ) {
					return $processor->live_mode === $this->isLiveMode() && $processor->recurring_enabled && $processor->enabled;
				}
			)
		);
	}

	/**
	 * Get the processor by type.
	 *
	 * @param string $type The processor type.
	 * @param array  $processors Array of processors.
	 *
	 * @return \SureCart/Models/Processor|null;
	 */
	protected function getProcessorByType( $type ) {
		$processors = $this->getProcessors();
		if ( empty( $processors ) ) {
			return null;
		}
		$key = array_search( $type, array_column( (array) $processors, 'processor_type' ), true );
		if ( ! is_int( $key ) ) {
			return null;
		}
		return $processors[ $key ] ?? null;
	}

	/**
	 * Get the success url.
	 *
	 * @param array $attributes The block attributes.
	 *
	 * @return string
	 */
	public function getSuccessUrl( $attributes = [] ) {
		// attribute, then url parameter. An unsafe url sanitizes to '' and falls through to the default.
		$url = esc_url_raw( $attributes['success_url'] ?? '' );
		if ( empty( $url ) ) {
			// Anyone can craft the query arg, so it must stay on-site (open redirect).
			$url = wp_validate_redirect( esc_url_raw( wp_unslash( $_GET['success_url'] ?? '' ) ), '' ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		}
		if ( ! empty( $url ) ) {
			// Gateways (Stripe, Mollie) reject a relative return_url.
			return \WP_Http::make_absolute_url( $url, home_url( '/' ) );
		}

		// default.
		return home_url( add_query_arg( [ 'tab' => $this->getTab() ], remove_query_arg( array_keys( $_GET ) ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	/**
	 * Hand the success url to the rendered add-method components as a prop.
	 *
	 * Kses strips success-url from sc-* tags (SUR-5911) and this markup can pass through
	 * wp_kses_post. The components only read it on submit, so setting it after load is fine.
	 * Called after buffering, because page builders print the prop script immediately.
	 *
	 * @param string $html        The rendered markup.
	 * @param string $success_url The success url.
	 *
	 * @return void
	 */
	protected function setSuccessUrlProps( $html, $success_url ) {
		foreach ( [ 'sc-mollie-add-method', 'sc-stripe-add-method', 'sc-paypal-add-method', 'sc-paystack-add-method', 'sc-razorpay-add-method' ] as $tag ) {
			if ( false !== strpos( $html, 'id="' . $tag . '"' ) ) {
				\SureCart::assets()->addComponentData( $tag, '#' . $tag, [ 'successUrl' => $success_url ] );
			}
		}
	}

	/**
	 * Show a view to add a payment method.
	 *
	 * @param array $attributes The block attributes.
	 *
	 * @return string
	 */
	public function create( $attributes = [] ) {
		// get the success url.
		$success_url = $this->getSuccessUrl( $attributes );

		if ( empty( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ) ) {
			ob_start(); ?>
				<sc-alert type="info" open>
					<?php if ( $this->isLiveMode() && ! empty( User::current()->customerId( 'test' ) ) ) { ?>
						<?php esc_html_e( 'You are not a live mode customer.', 'surecart' ); ?>
						<div style="margin-top:0.5em;">
							<sc-button href="<?php echo esc_url( add_query_arg( [ 'live_mode' => 'false' ] ) ); ?>" type="info" size="small">
								<?php esc_html_e( 'Switch to test mode.', 'surecart' ); ?>
							</sc-button>
						</div>
					<?php } elseif ( ! $this->isLiveMode() && ! empty( User::current()->customerId( 'live' ) ) ) { ?>
						<?php esc_html_e( 'You are not a test mode customer.', 'surecart' ); ?>
						<div style="margin-top:0.5em;">
							<sc-button href="<?php echo esc_url( add_query_arg( [ 'live_mode' => false ] ) ); ?>" type="info" size="small">
								<?php esc_html_e( 'Switch to live mode.', 'surecart' ); ?>
							</sc-button>
						</div>
					<?php } else { ?>
						<?php esc_html_e( 'You are not currently a customer.', 'surecart' ); ?>
					<?php } ?>
				</sc-alert>
			<?php
			return ob_get_clean();
		}

		$processor_names = array_filter(
			array_values(
				array_map(
					function ( $processor ) {
						return $processor->processor_type;
					},
					$this->getProcessors() ?? []
				)
			)
		);

		if ( empty( $processor_names ) ) {
			return '<sc-alert type="info" open>' . __( 'You cannot currently add a payment method. Please contact us for support.', 'surecart' ) . '</sc-alert>';
		}

		ob_start();
		?>

		<sc-spacing style="--spacing: var(--sc-spacing-large)">
			<sc-breadcrumbs>
				<sc-breadcrumb href="<?php echo esc_url( add_query_arg( [ 'tab' => $this->getTab() ], remove_query_arg( array_keys( $_GET ) ) ) );  // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>">
					<?php esc_html_e( 'Dashboard', 'surecart' ); ?>
				</sc-breadcrumb>
				<sc-breadcrumb  href="
					<?php
					echo esc_url(
						add_query_arg(
							[
								'tab'    => $this->getTab(),
								'model'  => 'customer',
								'action' => 'show',
								'id'     => User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ),
							],
							remove_query_arg( array_keys( $_GET ) ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
						)
					);
					?>
				">
					<?php esc_html_e( 'Billing', 'surecart' ); ?>
				</sc-breadcrumb>
				<sc-breadcrumb>
					<?php esc_html_e( 'Add Payment Method', 'surecart' ); ?>
				</sc-breadcrumb>
			</sc-breadcrumbs>

			<sc-heading>
			<?php esc_html_e( 'Add Payment Method', 'surecart' ); ?>
			<?php echo ! $this->isLiveMode() ? '<sc-tag type="warning" slot="end">' . esc_html__( 'Test Mode', 'surecart' ) . '</sc-tag>' : ''; ?>
			</sc-heading>

			<?php
			$mollie = $this->getProcessorByType( 'mollie' );
			if ( $mollie ) :
				?>
				<?php $customer = Customer::with( [ 'shipping_address' ] )->find( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>
				<sc-mollie-add-method
					id="sc-mollie-add-method"
					processor-id="<?php echo esc_attr( $mollie->id ); ?>"
					live-mode="<?php echo esc_attr( $this->isLiveMode() ? 'true' : 'false' ); ?>"
					country="<?php echo esc_attr( $customer->shipping_address->country ?? '' ); ?>"
					currency="<?php echo esc_attr( \SureCart::account()->currency ); ?>"
					customer-id="<?php echo esc_attr( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>">
				</sc-mollie-add-method>
			<?php else : ?>

			<sc-toggles collapsible="false" theme="container" accordion>
				<?php if ( in_array( 'stripe', $processor_names ) ) : ?>
					<sc-toggle class="sc-stripe-toggle" show-control shady borderless>
						<span slot="summary" class="sc-payment-toggle-summary">
							<sc-flex>
								<sc-icon name="creditcard" style="font-size:24px"></sc-icon>
								<span><?php esc_html_e( 'Credit Card', 'surecart' ); ?></span>
							</sc-flex>
						</span>
						<sc-stripe-add-method
							id="sc-stripe-add-method"
							live-mode="<?php echo esc_attr( $this->isLiveMode() ? 'true' : 'false' ); ?>"
							customer-id="<?php echo esc_attr( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>">
						</sc-stripe-add-method>
					</sc-toggle>
				<?php endif; ?>

				<?php if ( in_array( 'paypal', $processor_names ) ) : ?>
					<sc-toggle class="sc-paypal-toggle" show-control shady borderless>
						<span slot="summary" class="sc-payment-toggle-summary">
							<sc-icon name="paypal" style="width: 80px; font-size: 24px"></sc-icon>
						</span>
						<sc-paypal-add-method
							id="sc-paypal-add-method"
							live-mode="<?php echo esc_attr( $this->isLiveMode() ? 'true' : 'false' ); ?>"
							currency="<?php echo esc_attr( \SureCart::account()->currency ); ?>"
							customer-id="<?php echo esc_attr( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>">
						</sc-paypal-add-method>
					</sc-toggle>
				<?php endif; ?>

				<?php if ( in_array( 'paystack', $processor_names ) && ! in_array( 'stripe', $processor_names ) ) : ?>
					<sc-toggle class="sc-paystack-toggle" show-control shady borderless>
						<span slot="summary" class="sc-payment-toggle-summary">
							<sc-flex>
								<sc-icon name="creditcard" style="font-size:24px"></sc-icon>
								<span><?php esc_html_e( 'Credit Card', 'surecart' ); ?></span>
							</sc-flex>
						</span>
						<sc-paystack-add-method
							id="sc-paystack-add-method"
							live-mode="<?php echo esc_attr( $this->isLiveMode() ? 'true' : 'false' ); ?>"
							currency="<?php echo esc_attr( \SureCart::account()->currency ); ?>"
							customer-id="<?php echo esc_attr( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>">
						</sc-paystack-add-method>
					</sc-toggle>
				<?php endif; ?>

				<?php if ( in_array( 'razorpay', $processor_names ) && ! in_array( 'stripe', $processor_names ) && ! in_array( 'paystack', $processor_names ) ) : ?>
					<sc-toggle class="sc-razorpay-toggle" show-control shady borderless>
						<span slot="summary" class="sc-payment-toggle-summary">
							<sc-flex>
								<sc-icon name="razorpay" style="font-size:24px"></sc-icon>
								<span><?php esc_html_e( 'Cards, Netbanking, Wallet & UPI', 'surecart' ); ?></span>
							</sc-flex>
						</span>
						<sc-razorpay-add-method
							id="sc-razorpay-add-method"
							live-mode="<?php echo esc_attr( $this->isLiveMode() ? 'true' : 'false' ); ?>"
							currency="<?php echo esc_attr( \SureCart::account()->currency ); ?>"
							customer-id="<?php echo esc_attr( User::current()->customerId( $this->isLiveMode() ? 'live' : 'test' ) ); ?>">
						</sc-razorpay-add-method>
					</sc-toggle>
				<?php endif; ?>
			</sc-toggles>

			<?php endif; ?>
		</sc-spacing>
		<?php
		$html = ob_get_clean();
		$this->setSuccessUrlProps( $html, $success_url );
		return $html;
	}
}
