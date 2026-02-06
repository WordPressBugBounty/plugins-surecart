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
        return (h(Host, { key: '6bcb832576f72b55f6afe82bd5fb58458dc038cf' }, this.error && (h("sc-alert", { key: '47ced5d3c826ae061dc20f2887970c8c3390d10e', open: !!this.error, type: "danger" }, h("span", { key: '3099705723df5c40f705351a1864044355c69444', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: 'f3466ae0f222c2880619083c6662ca608deb7090', class: "sc-razorpay-button-container" }, h("sc-alert", { key: '85d6d3fbb8260f83c5b345c1c26dc50f14fee3c8', open: true, type: "warning" }, wp.i18n.__('In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.', 'surecart'), h("div", { key: 'b058c3d0b6eca9ae83a042329241d68cdcd234a5' }, h("sc-button", { key: '88b66be329f78e8e1d1547070b6c7484b8cc3ccf', loading: this.loading, type: "primary", onClick: () => this.createPaymentIntent(), style: { marginTop: 'var(--sc-spacing-medium)' } }, wp.i18n.__('Add New Card', 'surecart')))))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScRazorpayAddMethod.style = ScRazorpayAddMethodStyle0;

export { ScRazorpayAddMethod as sc_razorpay_add_method };

//# sourceMappingURL=sc-razorpay-add-method.entry.js.map