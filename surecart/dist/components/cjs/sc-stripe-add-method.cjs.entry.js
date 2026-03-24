'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const pure = require('./pure-bd6f0a6e.js');
const fetch = require('./fetch-d374a251.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scStripeAddMethodCss = "sc-stripe-add-method{display:block}sc-stripe-add-method [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";
const ScStripeAddMethodStyle0 = scStripeAddMethodCss;

const ScStripeAddMethod = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.liveMode = true;
        this.customerId = undefined;
        this.successUrl = undefined;
        this.loading = undefined;
        this.loaded = undefined;
        this.error = undefined;
        this.paymentIntent = undefined;
    }
    componentWillLoad() {
        this.createPaymentIntent();
    }
    async handlePaymentIntentCreate() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t;
        // we need this data.
        if (!((_c = (_b = (_a = this.paymentIntent) === null || _a === void 0 ? void 0 : _a.processor_data) === null || _b === void 0 ? void 0 : _b.stripe) === null || _c === void 0 ? void 0 : _c.publishable_key) || !((_f = (_e = (_d = this.paymentIntent) === null || _d === void 0 ? void 0 : _d.processor_data) === null || _e === void 0 ? void 0 : _e.stripe) === null || _f === void 0 ? void 0 : _f.account_id))
            return;
        // check if stripe has been initialized
        if (!this.stripe) {
            try {
                this.stripe = await pure.pure.loadStripe((_j = (_h = (_g = this.paymentIntent) === null || _g === void 0 ? void 0 : _g.processor_data) === null || _h === void 0 ? void 0 : _h.stripe) === null || _j === void 0 ? void 0 : _j.publishable_key, { stripeAccount: (_m = (_l = (_k = this.paymentIntent) === null || _k === void 0 ? void 0 : _k.processor_data) === null || _l === void 0 ? void 0 : _l.stripe) === null || _m === void 0 ? void 0 : _m.account_id });
            }
            catch (e) {
                this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Stripe could not be loaded', 'surecart');
                // don't continue.
                return;
            }
        }
        // load the element.
        // we need a stripe instance and client secret.
        if (!((_q = (_p = (_o = this.paymentIntent) === null || _o === void 0 ? void 0 : _o.processor_data) === null || _p === void 0 ? void 0 : _p.stripe) === null || _q === void 0 ? void 0 : _q.client_secret) || !this.container) {
            console.warn('do not have client secret or container');
            return;
        }
        // get the computed styles.
        const styles = getComputedStyle(document.body);
        // we have what we need, load elements.
        this.elements = this.stripe.elements({
            clientSecret: (_t = (_s = (_r = this.paymentIntent) === null || _r === void 0 ? void 0 : _r.processor_data) === null || _s === void 0 ? void 0 : _s.stripe) === null || _t === void 0 ? void 0 : _t.client_secret,
            appearance: {
                variables: {
                    colorPrimary: styles.getPropertyValue('--sc-color-primary-500'),
                    colorText: styles.getPropertyValue('--sc-input-label-color'),
                    borderRadius: styles.getPropertyValue('--sc-input-border-radius-medium'),
                    colorBackground: styles.getPropertyValue('--sc-input-background-color'),
                    fontSizeBase: styles.getPropertyValue('--sc-input-font-size-medium'),
                },
                rules: {
                    '.Input': {
                        border: styles.getPropertyValue('--sc-input-border'),
                    },
                    '.Input::placeholder': {
                        color: styles.getPropertyValue('--sc-input-placeholder-color'),
                    },
                },
            },
        });
        // create the payment element.
        this.elements
            .create('payment', {
            wallets: {
                applePay: 'never',
                googlePay: 'never',
            },
        })
            .mount('.sc-payment-element-container');
        this.element = this.elements.getElement('payment');
        this.element.on('ready', () => (this.loaded = true));
    }
    async createPaymentIntent() {
        try {
            this.loading = true;
            this.error = '';
            this.paymentIntent = await fetch.apiFetch({
                method: 'POST',
                path: 'surecart/v1/payment_intents',
                data: {
                    processor_type: 'stripe',
                    live_mode: this.liveMode,
                    customer_id: this.customerId,
                    refresh_status: true,
                },
            });
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    /**
     * Handle form submission.
     */
    async handleSubmit(e) {
        var _a;
        e.preventDefault();
        this.loading = true;
        try {
            const confirmed = await this.stripe.confirmSetup({
                elements: this.elements,
                confirmParams: {
                    return_url: addQueryArgs.addQueryArgs(this.successUrl, {
                        payment_intent: (_a = this.paymentIntent) === null || _a === void 0 ? void 0 : _a.id,
                    }),
                },
                redirect: 'always',
            });
            if (confirmed === null || confirmed === void 0 ? void 0 : confirmed.error) {
                this.error = confirmed.error.message;
                throw confirmed.error;
            }
        }
        catch (e) {
            console.error(e);
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.loading = false;
        }
    }
    render() {
        return (index.h("sc-form", { key: '6ada94b2bc880992857c16c5691030c5a9f4e926', onScFormSubmit: e => this.handleSubmit(e) }, this.error && (index.h("sc-alert", { key: 'ab82bd7c6127a5882601d9ecaf151491c823bd53', open: !!this.error, type: "danger" }, index.h("span", { key: '076ce56c24da8c0bd72bc8c208fc0373befc4f07', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), index.h("div", { key: 'e6b0c78786042eec6bfc6d87930d15ac3d71b219', class: "loader", hidden: this.loaded }, index.h("div", { key: '7bebb1f8bfb30ba9dcf17fbbec2e50d0ae2a51f3', class: "loader__row" }, index.h("div", { key: '13fc8b7ece68f8fa084859da178207ac69295a12', style: { width: '50%' } }, index.h("sc-skeleton", { key: 'a3a54e710901fa3f5b5011cc3c147fba2f571e73', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '36c46a0240be37c16235f359755569b3848c7985' })), index.h("div", { key: 'c1a6e9374979437d36dfabd1940dca23e6c5a4d9', style: { flex: '1' } }, index.h("sc-skeleton", { key: '22f9124aabd5fef20303e5d0ba7292123a513057', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: 'ae905323f8c8f1b8da46be407025f3da5e8e9924' })), index.h("div", { key: 'e785fdb48266338319252e9300b81d48f94a8d71', style: { flex: '1' } }, index.h("sc-skeleton", { key: '53b946b89ba26da09fa565a53ff1ea6ac473ff2f', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: 'fe84a5af888827d493279df807fb1eb0b6aa08dc' }))), index.h("div", { key: 'b711b5dc9c554d4210e7aef1b5a4287282403e44', class: "loader__details" }, index.h("sc-skeleton", { key: '34cbb4a2f1404257519954eb5d05f7758ecda7e8', style: { height: '1rem' } }), index.h("sc-skeleton", { key: 'cd2a28cc457fa3a7f7e5e79c54ea20c9ae83ad3a', style: { height: '1rem', width: '30%' } }))), index.h("div", { key: 'a1e632b8957a2a7071ef7b2a4316535c42d70d44', hidden: !this.loaded, class: "sc-payment-element-container", ref: el => (this.container = el) }), index.h("sc-button", { key: '30181a8fc1a72deb247926291e296fc80bd731b6', type: "primary", submit: true, full: true, loading: this.loading }, wp.i18n.__('Save Payment Method', 'surecart'))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScStripeAddMethod.style = ScStripeAddMethodStyle0;

exports.sc_stripe_add_method = ScStripeAddMethod;

//# sourceMappingURL=sc-stripe-add-method.cjs.entry.js.map