import { r as registerInstance, h } from './index-745b6bec.js';
import { p as pure } from './pure-963214cb.js';
import { a as apiFetch } from './fetch-bc141774.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';

const scStripeAddMethodCss = "sc-stripe-add-method{display:block}sc-stripe-add-method [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";
const ScStripeAddMethodStyle0 = scStripeAddMethodCss;

const ScStripeAddMethod = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
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
                this.stripe = await pure.loadStripe((_j = (_h = (_g = this.paymentIntent) === null || _g === void 0 ? void 0 : _g.processor_data) === null || _h === void 0 ? void 0 : _h.stripe) === null || _j === void 0 ? void 0 : _j.publishable_key, { stripeAccount: (_m = (_l = (_k = this.paymentIntent) === null || _k === void 0 ? void 0 : _k.processor_data) === null || _l === void 0 ? void 0 : _l.stripe) === null || _m === void 0 ? void 0 : _m.account_id });
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
            this.paymentIntent = await apiFetch({
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
                    return_url: addQueryArgs(this.successUrl, {
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
        return (h("sc-form", { key: 'cbc749fca6a905c11f3f2fd49cc06e78e6a9cc58', onScFormSubmit: e => this.handleSubmit(e) }, this.error && (h("sc-alert", { key: 'f2d91b01c47861c65b6b759ba5273fa39b9bd734', open: !!this.error, type: "danger" }, h("span", { key: '5ff5d08cb0eb39b038dbb8784e96f682df28e15e', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: '12494683b11ffa3f55c2ef0cd5659cde8cbea37c', class: "loader", hidden: this.loaded }, h("div", { key: '6351f5a1841afd40df609fa7038aaab3e71070d5', class: "loader__row" }, h("div", { key: 'a5412295adb6ce0f2b5c0320bc9e7ac7cad90697', style: { width: '50%' } }, h("sc-skeleton", { key: 'a15d182bb5e66f3d6dc47e2d3af6317495cc5bd8', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: 'a4609fedba0c749649ba33fc83b138d8bd7e4b59' })), h("div", { key: 'e0127790d3790af6dc6b2b2559eafb799f8a1856', style: { flex: '1' } }, h("sc-skeleton", { key: '855577f52f90014275e03f58cb3e375b029c85e0', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: '083899839d75ba37dc1b8b059238e4f5b57390bc' })), h("div", { key: 'd7cc98ff8a1be4246bedd04c9ee42c81d3ffc2d1', style: { flex: '1' } }, h("sc-skeleton", { key: 'ed0a52a5fb3c6f15e441c87964d44381fdf13311', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: '1b1090d8141941553f0a46213b1699c5f131e43b' }))), h("div", { key: '4323da46f0c9154a8e19a628631dd9c3823bfa9d', class: "loader__details" }, h("sc-skeleton", { key: '577ffd98822b9fe5774836957a984611783d2ce2', style: { height: '1rem' } }), h("sc-skeleton", { key: '7cfdb8647205178ae4ed8a25def1751b37e39d72', style: { height: '1rem', width: '30%' } }))), h("div", { key: 'a26cc6832c3d9cd1d473bf6bacc0e48849b39c33', hidden: !this.loaded, class: "sc-payment-element-container", ref: el => (this.container = el) }), h("sc-button", { key: '99b3cb8441801575759820f9dd6852c9f00773c5', type: "primary", submit: true, full: true, loading: this.loading }, wp.i18n.__('Save Payment Method', 'surecart'))));
    }
    static get watchers() { return {
        "paymentIntent": ["handlePaymentIntentCreate"]
    }; }
};
ScStripeAddMethod.style = ScStripeAddMethodStyle0;

export { ScStripeAddMethod as sc_stripe_add_method };

//# sourceMappingURL=sc-stripe-add-method.entry.js.map