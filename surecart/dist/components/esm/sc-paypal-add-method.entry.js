import { r as registerInstance, h, H as Host } from './index-745b6bec.js';
import { l as loadScript, g as getScriptLoadParams } from './functions-2a4a4ba3.js';
import { a as apiFetch } from './fetch-2d92a73e.js';
import './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';

const scPaypalAddMethodCss = ":host{display:block}.paypal-buttons{position:relative;line-height:0;text-align:center}.paypal-buttons:after{content:\" \";border-bottom:1px solid var(--sc-input-border-color);width:100%;height:0;top:50%;left:0;right:0;position:absolute}";
const ScPaypalAddMethodStyle0 = scPaypalAddMethodCss;

const ScPaypalAddMethod = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.liveMode = true;
        this.customerId = undefined;
        this.successUrl = undefined;
        this.currency = undefined;
        this.loading = undefined;
        this.loaded = undefined;
        this.error = undefined;
        this.paymentIntent = undefined;
    }
    componentWillLoad() {
        this.createPaymentIntent();
    }
    async handlePaymentIntentCreate() {
        var _a, _b;
        const { external_intent_id } = this.paymentIntent || {};
        const { client_id, account_id, merchant_initiated } = ((_b = (_a = this.paymentIntent) === null || _a === void 0 ? void 0 : _a.processor_data) === null || _b === void 0 ? void 0 : _b.paypal) || {};
        // we need this data.
        if (!client_id || !account_id || !external_intent_id)
            return;
        // check if stripe has been initialized
        if (!this.paypal) {
            try {
                this.paypal = await loadScript(getScriptLoadParams({
                    clientId: client_id,
                    merchantId: account_id,
                    merchantInitiated: merchant_initiated,
                    reusable: true,
                }));
                this.paypal
                    .Buttons({
                    onInit: () => {
                        this.loaded = true;
                    },
                    createBillingAgreement: () => {
                        return new Promise(resolve => resolve(external_intent_id));
                    },
                    onApprove: async () => {
                        var _a;
                        try {
                            this.loading = true;
                            const intent = (await apiFetch({
                                method: 'PATCH',
                                path: `surecart/v1/payment_intents/${(_a = this.paymentIntent) === null || _a === void 0 ? void 0 : _a.id}/capture`,
                            }));
                            if (['succeeded', 'pending', 'requires_approval'].includes(intent === null || intent === void 0 ? void 0 : intent.status)) {
                                window.location.assign(this.successUrl);
                            }
                            else {
                                throw { message: wp.i18n.__('The payment did not process. Please try again.', 'surecart') };
                            }
                        }
                        catch (err) {
                            console.error(err);
                            this.error = (err === null || err === void 0 ? void 0 : err.message) || wp.i18n.__('The payment did not process. Please try again.', 'surecart');
                            this.loading = false;
                        }
                    },
                    onError: err => {
                        console.error(err);
                        alert((err === null || err === void 0 ? void 0 : err.message) || wp.i18n.__('The payment did not process. Please try again.', 'surecart'));
                    },
                })
                    .render(this.container);
            }
            catch (err) {
                console.error('Failed to load the PayPal JS SDK script', err);
                this.error = wp.i18n.__('Failed to load the PayPal JS SDK script', 'surecart');
            }
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
                    processor_type: 'paypal',
                    reusable: true,
                    live_mode: this.liveMode,
                    customer_id: this.customerId,
                    currency: this.currency,
                    refresh_status: true,
                },
            });
        }
        catch (e) {
            this.error = ((_b = (_a = e === null || e === void 0 ? void 0 : e.additional_errors) === null || _a === void 0 ? void 0 : _a[0]) === null || _b === void 0 ? void 0 : _b.message) || (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    render() {
        return (h(Host, { key: '8248c22c8a4cbb1746e50102af66a65284f4ca1b' }, this.error && (h("sc-alert", { key: 'c170d57805570a508df704d1f034c18bfc362ef3', open: !!this.error, type: "danger" }, h("span", { key: 'f34ce3790ed8f2d082d226e03a243f34d5b67c62', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: '1ec2c4534cc4aa0f1125a9ca9feed7a718c9d657', class: "sc-paypal-button-container", hidden: !this.loaded, ref: el => (this.container = el) })));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScPaypalAddMethod.style = ScPaypalAddMethodStyle0;

export { ScPaypalAddMethod as sc_paypal_add_method };

//# sourceMappingURL=sc-paypal-add-method.entry.js.map