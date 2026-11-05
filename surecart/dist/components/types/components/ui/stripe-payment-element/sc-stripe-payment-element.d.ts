import { EventEmitter } from '../../../stencil-public-runtime';
import { FormStateSetter, PaymentInfoAddedParams } from '../../../types';
export declare class ScStripePaymentElement {
    /** This element */
    el: HTMLScStripePaymentElementElement;
    /** Holds the element container. */
    private container;
    /** holds the stripe element. */
    private element;
    private unlistenToFormState;
    private unlistenToCheckout;
    /** Whether the current Elements instance uses a paymentMethodTypes allowlist. */
    private hasPaymentMethodAllowlist;
    /** The error. */
    error: string;
    /** Are we confirming the order? */
    confirming: boolean;
    /** Are we initializing stripe? */
    isInitializingStripe: boolean;
    /** Are we creating our updating stripe elements? */
    isCreatingUpdatingStripeElement: boolean;
    /** Are we loaded? */
    loaded: boolean;
    /** The order/invoice was paid for. */
    scPaid: EventEmitter<void>;
    /** Set the state */
    scSetState: EventEmitter<FormStateSetter>;
    /** Payment information was added */
    scPaymentInfoAdded: EventEmitter<PaymentInfoAddedParams>;
    styles: CSSStyleDeclaration;
    componentWillLoad(): Promise<void>;
    handleStylesChange(): Promise<void>;
    fetchStyles(): Promise<void>;
    /**
     * We wait for our property value to resolve (styles have been loaded)
     * This prevents the element appearance api being set before the styles are loaded.
     */
    getComputedStyles(): Promise<unknown>;
    /** Sync the checkout mode */
    syncCheckoutMode(): Promise<void>;
    componentDidLoad(): Promise<void>;
    initializeStripe(): Promise<void>;
    clearStripeInstances(): void;
    /** Tear down the Payment Element so the next createOrUpdateElements() builds a fresh one. */
    destroyElements(): void;
    disconnectedCallback(): void;
    getElementsConfig(): any;
    maybeApplyFilters(options: any): any;
    /** Update the payment element mode, amount and currency when it changes. */
    createOrUpdateElements(): void;
    /** Update the default attributes of the element when they cahnge. */
    handleUpdateElement(): void;
    submit(): Promise<void>;
    /**
     * Watch order status and maybe confirm the order.
     */
    maybeConfirmOrder(): Promise<void>;
    confirm(type: 'setup' | 'payment', args?: {}): Promise<void>;
    render(): any;
}
