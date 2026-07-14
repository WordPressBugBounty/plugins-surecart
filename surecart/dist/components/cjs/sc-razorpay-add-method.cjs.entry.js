'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
require('./fetch-5e8dc1d5.js');
const razorpay = require('./razorpay-88fe8897.js');
const index$1 = require('./index-7ced8198.js');
require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scRazorpayAddMethodCss = ".sc-razorpay-button-container{display:block}";
const ScRazorpayAddMethodStyle0 = scRazorpayAddMethodCss;

const ScRazorpayAddMethod = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
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
                this.razorpayInstance = await razorpay.loadRazorpay();
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
            const razorpay$1 = new this.razorpayInstance(options);
            razorpay$1.on('payment.failed', response => {
                var _a;
                this.error = ((_a = response === null || response === void 0 ? void 0 : response.error) === null || _a === void 0 ? void 0 : _a.description) || wp.i18n.__('Payment failed. Please try again.', 'surecart');
                this.loading = false;
                console.error('payment.failed', response);
            });
            razorpay$1.open();
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
            this.paymentIntent = await index$1.apiFetch({
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
        return (index.h(index.Host, { key: 'cd269d3b31188c50332667d52b6cab095287008c' }, this.error && (index.h("sc-alert", { key: '2d8176f2a6500b14be1ba880650e9aafd9af20a9', open: !!this.error, type: "danger" }, index.h("span", { key: '734b8d838ca510c3675e8a16c9c2aa9554d4b200', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), index.h("div", { key: '666b487937150857fae1c7cc25c9d7bcdad4c29b', class: "sc-razorpay-button-container" }, index.h("sc-alert", { key: '8a2630836ffbe0936ad0aef76ac57255d4d01997', open: true, type: "warning" }, wp.i18n.__('In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.', 'surecart'), index.h("div", { key: '511ecd465b62e22bb1ba1b3ac0597aa3cb4f5c9e' }, index.h("sc-button", { key: 'd86f770ad3c5958f17b4fee98ef04525fc053b02', loading: this.loading, type: "primary", onClick: () => this.createPaymentIntent(), style: { marginTop: 'var(--sc-spacing-medium)' } }, wp.i18n.__('Add New Card', 'surecart')))))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScRazorpayAddMethod.style = ScRazorpayAddMethodStyle0;

exports.sc_razorpay_add_method = ScRazorpayAddMethod;

//# sourceMappingURL=sc-razorpay-add-method.cjs.entry.js.map