export declare class ScCheckoutRazorpayPaymentProvider {
    private unlistenToFormState;
    private razorpayInstance;
    private confirming;
    componentWillLoad(): void;
    disconnectedCallback(): void;
    confirm(): Promise<void>;
}
