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
        return (h(Host, { key: 'ebafd5a3210bb2a7b2f7fc0a3411cb12f02b5479' }, this.error && (h("sc-alert", { key: '0fa2906acf2b6ff355b888817eb0b6bd1e020b35', open: !!this.error, type: "danger" }, h("span", { key: 'b7c9714e15f20b86b1c4e9219e6360c84d309664', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: 'bf5cf63be0fbcf1e3f3f428f969e7f112f3b129b', class: "sc-razorpay-button-container" }, h("sc-alert", { key: '243b0c714036125f5fb31329316931808fbdb1ad', open: true, type: "warning" }, wp.i18n.__('In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.', 'surecart'), h("div", { key: 'a67806699bda00e780b396ea3e7061c5f44d33f6' }, h("sc-button", { key: '017eb9b8777cfcd04203ee4c8e29d8cabc272dd0', loading: this.loading, type: "primary", onClick: () => this.createPaymentIntent(), style: { marginTop: 'var(--sc-spacing-medium)' } }, wp.i18n.__('Add New Card', 'surecart')))))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScRazorpayAddMethod.style = ScRazorpayAddMethodStyle0;

export { ScRazorpayAddMethod as sc_razorpay_add_method };

//# sourceMappingURL=sc-razorpay-add-method.entry.js.map