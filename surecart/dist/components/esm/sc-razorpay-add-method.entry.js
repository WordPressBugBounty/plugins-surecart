import { r as registerInstance, h, H as Host } from './index-745b6bec.js';
import { a as apiFetch } from './fetch-bc141774.js';
import { l as loadRazorpay } from './razorpay-12eec934.js';
import './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';

const scRazorpayAddMethodCss = ".sc-razorpay-button-container{display:block}";
const ScRazorpayAddMethodStyle0 = scRazorpayAddMethodCss;

const ScRazorpayAddMethod = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.razorpayInstance = null;
        this.confirming = false;
        this.liveMode = true;
        this.customerId = undefined;
        this.successUrl = undefined;
        this.currency = undefined;
        this.loading = undefined;
        this.loaded = undefined;
        this.error = undefined;
        this.paymentIntent = undefined;
    }
    async handlePaymentIntentCreate() {
        // Prevent multiple simultaneous payment attempts
        if (this.confirming)
            return;
        const { external_intent_id, processor_data } = this.paymentIntent || {};
        const { public_key, customer_id } = ((processor_data === null || processor_data === void 0 ? void 0 : processor_data.razorpay) || {});
        // we need this data.
        if (!public_key || !external_intent_id)
            return;
        this.confirming = true;
        try {
            // Load Razorpay if not loaded yet.
            if (!this.razorpayInstance) {
                this.razorpayInstance = await loadRazorpay();
            }
            const options = {
                key: public_key,
                order_id: external_intent_id,
                customer_id,
                recurring: true,
                handler: async (response) => {
                    if (response === null || response === void 0 ? void 0 : response.razorpay_payment_id) {
                        window.location.assign(this.successUrl);
                    }
                    else {
                        this.error = wp.i18n.__('Payment verification failed. Please contact support.', 'surecart');
                        this.loading = false;
                    }
                },
                modal: {
                    ondismiss: () => {
                        this.loading = false;
                    },
                },
            };
            const razorpay = new this.razorpayInstance(options);
            razorpay.on('payment.failed', response => {
                var _a;
                this.error = ((_a = response === null || response === void 0 ? void 0 : response.error) === null || _a === void 0 ? void 0 : _a.description) || wp.i18n.__('Payment failed. Please try again.', 'surecart');
                this.loading = false;
                console.error('payment.failed', response);
            });
            razorpay.open();
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.loading = false;
            console.error(e);
        }
        finally {
            this.confirming = false;
        }
    }
    async createPaymentIntent() {
        var _a, _b;
        try {
            this.loading = true;
            this.error = '';
            this.paymentIntent = await apiFetch({
                method: 'POST',
                path: 'surecart/v1/payment_intents',
                data: {
                    processor_type: 'razorpay',
                    reusable: true,
                    live_mode: this.liveMode,
                    customer_id: this.customerId,
                    currency: this.currency,
                    refresh_status: true,
                },
            });
        }
        catch (e) {
            console.error(e);
            this.error = ((_b = (_a = e === null || e === void 0 ? void 0 : e.additional_errors) === null || _a === void 0 ? void 0 : _a[0]) === null || _b === void 0 ? void 0 : _b.message) || (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.loading = false;
        }
    }
    render() {
        return (h(Host, { key: '8a0f713c4fe959aa504fbe65506872c9736641d3' }, this.error && (h("sc-alert", { key: '8fbda4390b9510a1cd051698c54c0d9ed5578669', open: !!this.error, type: "danger" }, h("span", { key: 'af6fab9c1b997ed63af403274ccb8e8d80868e2f', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: 'a542db5d779b0ec4df1dd67c187a6b53fa8f5c64', class: "sc-razorpay-button-container" }, h("sc-alert", { key: 'ba03bef8745326b78b251fd7255b560d6cfc9738', open: true, type: "warning" }, wp.i18n.__('In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.', 'surecart'), h("div", { key: '2d3e0e6274f9897f00ba2fde00f18d167e2f4b9f' }, h("sc-button", { key: '323f54355cf998d51536aaa278a33ea1697b3b7a', loading: this.loading, type: "primary", onClick: () => this.createPaymentIntent(), style: { marginTop: 'var(--sc-spacing-medium)' } }, wp.i18n.__('Add New Card', 'surecart')))))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScRazorpayAddMethod.style = ScRazorpayAddMethodStyle0;

export { ScRazorpayAddMethod as sc_razorpay_add_method };

//# sourceMappingURL=sc-razorpay-add-method.entry.js.map