import { r as registerInstance, c as createEvent, h, a as getElement } from './index-25e5af33.js';
import { p as pure } from './pure-963214cb.js';
import { s as state$2 } from './watchers-c7bbc6b2.js';
import { o as onChange, s as state, u as updateFormState } from './mutations-54fc7af1.js';
import { o as onChange$1 } from './store-fd165874.js';
import './watchers-c2958e52.js';
import { s as state$1, g as getProcessorByType } from './getters-476a5a84.js';
import { c as currentFormState } from './getters-3801a0c9.js';
import { c as createErrorNotice } from './mutations-7458343f.js';
import { b as getResolvedBillingEmail, t as toStripeAddress, d as getResolvedBillingAddress } from './getters-ed04d1c9.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './index-18f5a1bc.js';
import './utils-2fd36c2c.js';
import './remove-query-args-938c53ea.js';
import './index-c5a96d53.js';
import './google-e9085e27.js';
import './currency-eb33deae.js';
import './price-39d60d32.js';
import './util-dfbf863e.js';
import './store-ea636731.js';
import './address-b8e2e4c8.js';

const scStripePaymentElementCss = "sc-stripe-payment-element{display:block}sc-stripe-payment-element [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";
const ScStripePaymentElementStyle0 = scStripePaymentElementCss;

const ScStripePaymentElement = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scPaid = createEvent(this, "scPaid", 7);
        this.scSetState = createEvent(this, "scSetState", 7);
        this.scPaymentInfoAdded = createEvent(this, "scPaymentInfoAdded", 7);
        /** Whether the current Elements instance uses a paymentMethodTypes allowlist. */
        this.hasPaymentMethodAllowlist = false;
        this.error = undefined;
        this.confirming = false;
        this.isInitializingStripe = false;
        this.isCreatingUpdatingStripeElement = false;
        this.loaded = false;
        this.styles = undefined;
    }
    async componentWillLoad() {
        this.fetchStyles();
        this.syncCheckoutMode();
    }
    async handleStylesChange() {
        this.createOrUpdateElements();
    }
    async fetchStyles() {
        this.styles = (await this.getComputedStyles());
    }
    /**
     * We wait for our property value to resolve (styles have been loaded)
     * This prevents the element appearance api being set before the styles are loaded.
     */
    getComputedStyles() {
        return new Promise(resolve => {
            let checkInterval = setInterval(() => {
                const styles = window.getComputedStyle(document.body);
                const color = styles.getPropertyValue('--sc-color-primary-500');
                if (color) {
                    clearInterval(checkInterval);
                    resolve(styles);
                }
            }, 100);
        });
    }
    /** Sync the checkout mode */
    async syncCheckoutMode() {
        onChange('checkout', () => {
            this.initializeStripe();
        });
    }
    async componentDidLoad() {
        this.initializeStripe();
    }
    async initializeStripe() {
        var _a, _b;
        if (typeof ((_a = state === null || state === void 0 ? void 0 : state.checkout) === null || _a === void 0 ? void 0 : _a.live_mode) === 'undefined' || ((_b = state$1 === null || state$1 === void 0 ? void 0 : state$1.instances) === null || _b === void 0 ? void 0 : _b.stripe) || this.isInitializingStripe) {
            return;
        }
        this.isInitializingStripe = true;
        const { processor_data } = getProcessorByType('stripe') || {};
        try {
            state$1.instances.stripe = await pure.loadStripe(processor_data === null || processor_data === void 0 ? void 0 : processor_data.publishable_key, { stripeAccount: processor_data === null || processor_data === void 0 ? void 0 : processor_data.account_id });
            this.error = '';
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Stripe could not be loaded', 'surecart');
            this.isInitializingStripe = false;
            // don't continue.
            return;
        }
        // create or update elements.
        this.createOrUpdateElements();
        this.handleUpdateElement();
        this.unlistenToCheckout = onChange('checkout', () => {
            this.fetchStyles();
            this.createOrUpdateElements();
            this.handleUpdateElement();
        });
        // we need to listen to the form state and pay when the form state enters the paying state.
        this.unlistenToFormState = onChange$1('formState', () => {
            var _a;
            if (!((_a = state === null || state === void 0 ? void 0 : state.checkout) === null || _a === void 0 ? void 0 : _a.payment_method_required))
                return;
            if ('paying' === currentFormState()) {
                this.maybeConfirmOrder();
            }
        });
        this.isInitializingStripe = false;
    }
    clearStripeInstances() {
        var _a;
        this.isInitializingStripe = false;
        this.isCreatingUpdatingStripeElement = false;
        this.destroyElements();
        if ((_a = state$1 === null || state$1 === void 0 ? void 0 : state$1.instances) === null || _a === void 0 ? void 0 : _a.stripe) {
            state$1.instances.stripe = null;
        }
    }
    /** Tear down the Payment Element so the next createOrUpdateElements() builds a fresh one. */
    destroyElements() {
        var _a, _b, _c;
        if (this === null || this === void 0 ? void 0 : this.element) {
            try {
                (_b = (_a = this.element) === null || _a === void 0 ? void 0 : _a.destroy) === null || _b === void 0 ? void 0 : _b.call(_a);
            }
            catch (e) {
                console.warn('Could not destroy Stripe element:', e);
            }
            this.element = null;
        }
        if ((_c = state$1 === null || state$1 === void 0 ? void 0 : state$1.instances) === null || _c === void 0 ? void 0 : _c.stripeElements) {
            state$1.instances.stripeElements = null;
        }
        this.loaded = false;
    }
    disconnectedCallback() {
        this.unlistenToFormState();
        this.unlistenToCheckout();
        this.clearStripeInstances();
    }
    getElementsConfig() {
        var _a, _b, _c, _d, _e, _f, _g;
        const styles = getComputedStyle(this.el);
        const config = {
            mode: ((_a = state.checkout) === null || _a === void 0 ? void 0 : _a.remaining_amount_due) > 0 ? 'payment' : 'setup',
            amount: (_b = state.checkout) === null || _b === void 0 ? void 0 : _b.remaining_amount_due,
            currency: (_c = state.checkout) === null || _c === void 0 ? void 0 : _c.currency,
            setupFutureUsage: ((_d = state.checkout) === null || _d === void 0 ? void 0 : _d.reusable_payment_method_required) ? 'off_session' : null,
            excludedPaymentMethodTypes: [],
            appearance: {
                variables: {
                    colorPrimary: styles.getPropertyValue('--sc-color-primary-500') || 'black',
                    colorText: styles.getPropertyValue('--sc-input-label-color') || 'black',
                    borderRadius: styles.getPropertyValue('--sc-input-border-radius-medium') || '4px',
                    colorBackground: styles.getPropertyValue('--sc-input-background-color') || 'white',
                    fontSizeBase: styles.getPropertyValue('--sc-input-font-size-medium') || '16px',
                    colorLogo: styles.getPropertyValue('--sc-stripe-color-logo') || 'light',
                    colorLogoTab: styles.getPropertyValue('--sc-stripe-color-logo-tab') || 'light',
                    colorLogoTabSelected: styles.getPropertyValue('--sc-stripe-color-logo-tab-selected') || 'light',
                    colorTextPlaceholder: styles.getPropertyValue('--sc-input-placeholder-color') || 'black',
                },
                rules: {
                    '.Input': {
                        border: styles.getPropertyValue('--sc-input-border'),
                    },
                },
            },
        };
        // Only keys Stripe accepts in elements.update() survive a re-render — fonts, loader, customerOptions and paymentMethodCreation apply on create only.
        if (!((_f = (_e = window === null || window === void 0 ? void 0 : window.wp) === null || _e === void 0 ? void 0 : _e.hooks) === null || _f === void 0 ? void 0 : _f.applyFilters))
            return config;
        const filtered = (_g = window.wp.hooks.applyFilters('surecart_stripe_payment_element_elements_config', config, state.checkout)) !== null && _g !== void 0 ? _g : config;
        // Stripe rejects both keys together: a non-empty allowlist wins, an empty one means no allowlist.
        const { paymentMethodTypes, excludedPaymentMethodTypes, ...rest } = filtered;
        return (paymentMethodTypes === null || paymentMethodTypes === void 0 ? void 0 : paymentMethodTypes.length) ? { ...rest, paymentMethodTypes } : { ...rest, excludedPaymentMethodTypes: excludedPaymentMethodTypes !== null && excludedPaymentMethodTypes !== void 0 ? excludedPaymentMethodTypes : [] };
    }
    maybeApplyFilters(options) {
        var _a, _b, _c;
        if (!((_b = (_a = window === null || window === void 0 ? void 0 : window.wp) === null || _a === void 0 ? void 0 : _a.hooks) === null || _b === void 0 ? void 0 : _b.applyFilters))
            return options;
        return {
            ...options,
            paymentMethodOrder: window.wp.hooks.applyFilters('surecart_stripe_payment_element_payment_method_order', [], state.checkout),
            wallets: window.wp.hooks.applyFilters('surecart_stripe_payment_element_wallets', {}, state.checkout),
            terms: window.wp.hooks.applyFilters('surecart_stripe_payment_element_terms', {}, state.checkout),
            fields: window.wp.hooks.applyFilters('surecart_stripe_payment_element_fields', (_c = options.fields) !== null && _c !== void 0 ? _c : {}),
        };
    }
    /** Update the payment element mode, amount and currency when it changes. */
    createOrUpdateElements() {
        var _a, _b, _c, _d, _e;
        // need an order amount, etc.
        if (!((_a = state === null || state === void 0 ? void 0 : state.checkout) === null || _a === void 0 ? void 0 : _a.payment_method_required))
            return;
        if (!state$1.instances.stripe || this.isCreatingUpdatingStripeElement)
            return;
        if (((_b = state.checkout) === null || _b === void 0 ? void 0 : _b.status) && ['paid', 'processing'].includes((_c = state.checkout) === null || _c === void 0 ? void 0 : _c.status))
            return;
        this.isCreatingUpdatingStripeElement = true;
        try {
            const config = this.getElementsConfig();
            const hasAllowlist = !!config.paymentMethodTypes;
            // elements.update() can't unset paymentMethodTypes, so entering or leaving allowlist mode needs a fresh instance.
            if (state$1.instances.stripeElements && hasAllowlist !== this.hasPaymentMethodAllowlist) {
                this.destroyElements();
            }
            this.hasPaymentMethodAllowlist = hasAllowlist;
            // create the elements if they have not yet been created.
            if (!state$1.instances.stripeElements) {
                // we have what we need, load elements.
                state$1.instances.stripeElements = state$1.instances.stripe.elements(config);
                const address = toStripeAddress(getResolvedBillingAddress());
                const options = this.maybeApplyFilters({
                    defaultValues: {
                        billingDetails: {
                            ...(((_d = state.checkout) === null || _d === void 0 ? void 0 : _d.name) ? { name: state.checkout.name } : {}),
                            ...(getResolvedBillingEmail() ? { email: getResolvedBillingEmail() } : {}),
                            ...(((_e = state.checkout) === null || _e === void 0 ? void 0 : _e.phone) ? { phone: state.checkout.phone } : {}),
                            ...(address ? { address } : {}),
                        },
                    },
                    fields: {
                        billingDetails: {
                            email: 'never',
                        },
                    },
                });
                // create the payment element.
                state$1.instances.stripeElements.create('payment', options).mount(this.container);
                this.element = state$1.instances.stripeElements.getElement('payment');
                this.element.on('ready', () => (this.loaded = true));
                this.element.on('change', (event) => {
                    var _a, _b, _c, _d, _e, _f, _g;
                    const requiredShippingPaymentTypes = ['cashapp', 'klarna', 'clearpay'];
                    state.paymentMethodRequiresShipping = requiredShippingPaymentTypes.includes((_a = event === null || event === void 0 ? void 0 : event.value) === null || _a === void 0 ? void 0 : _a.type);
                    if (event.complete) {
                        this.scPaymentInfoAdded.emit({
                            checkout_id: (_b = state.checkout) === null || _b === void 0 ? void 0 : _b.id,
                            currency: (_c = state.checkout) === null || _c === void 0 ? void 0 : _c.currency,
                            processor_type: 'stripe',
                            total_amount: (_d = state.checkout) === null || _d === void 0 ? void 0 : _d.total_amount,
                            line_items: (_e = state.checkout) === null || _e === void 0 ? void 0 : _e.line_items,
                            payment_method: {
                                billing_details: {
                                    email: (_f = state.checkout) === null || _f === void 0 ? void 0 : _f.email,
                                    name: (_g = state.checkout) === null || _g === void 0 ? void 0 : _g.name,
                                },
                            },
                        });
                    }
                });
                return;
            }
            state$1.instances.stripeElements.update(config);
        }
        finally {
            // Stripe throws on invalid filtered values; without this the element would ignore every later checkout change.
            this.isCreatingUpdatingStripeElement = false;
        }
    }
    /** Update the default attributes of the element when they cahnge. */
    handleUpdateElement() {
        var _a, _b, _c;
        if (!this.element)
            return;
        if (((_a = state.checkout) === null || _a === void 0 ? void 0 : _a.status) !== 'draft')
            return;
        const address = toStripeAddress(getResolvedBillingAddress());
        const options = this.maybeApplyFilters({
            defaultValues: {
                billingDetails: {
                    ...(((_b = state.checkout) === null || _b === void 0 ? void 0 : _b.name) ? { name: state.checkout.name } : {}),
                    ...(getResolvedBillingEmail() ? { email: getResolvedBillingEmail() } : {}),
                    ...(((_c = state.checkout) === null || _c === void 0 ? void 0 : _c.phone) ? { phone: state.checkout.phone } : {}),
                    ...(address ? { address } : {}),
                },
            },
            fields: {
                billingDetails: {
                    email: 'never',
                },
            },
        });
        this.element.update(options);
    }
    async submit() {
        // this processor is not selected.
        if ((state$2 === null || state$2 === void 0 ? void 0 : state$2.id) !== 'stripe')
            return;
        // submit the elements.
        const { error } = await state$1.instances.stripeElements.submit();
        if (error) {
            console.error({ error });
            updateFormState('REJECT');
            createErrorNotice(error);
            this.error = error.message;
            return;
        }
    }
    /**
     * Watch order status and maybe confirm the order.
     */
    async maybeConfirmOrder() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p;
        // this processor is not selected.
        if ((state$2 === null || state$2 === void 0 ? void 0 : state$2.id) !== 'stripe')
            return;
        // must be a stripe session
        if (((_b = (_a = state.checkout) === null || _a === void 0 ? void 0 : _a.payment_intent) === null || _b === void 0 ? void 0 : _b.processor_type) !== 'stripe')
            return;
        // need an external_type
        if (!((_f = (_e = (_d = (_c = state.checkout) === null || _c === void 0 ? void 0 : _c.payment_intent) === null || _d === void 0 ? void 0 : _d.processor_data) === null || _e === void 0 ? void 0 : _e.stripe) === null || _f === void 0 ? void 0 : _f.type))
            return;
        // we need a client secret.
        if (!((_k = (_j = (_h = (_g = state.checkout) === null || _g === void 0 ? void 0 : _g.payment_intent) === null || _h === void 0 ? void 0 : _h.processor_data) === null || _j === void 0 ? void 0 : _j.stripe) === null || _k === void 0 ? void 0 : _k.client_secret))
            return;
        // confirm the intent.
        return await this.confirm((_p = (_o = (_m = (_l = state.checkout) === null || _l === void 0 ? void 0 : _l.payment_intent) === null || _m === void 0 ? void 0 : _m.processor_data) === null || _o === void 0 ? void 0 : _o.stripe) === null || _p === void 0 ? void 0 : _p.type);
    }
    async confirm(type, args = {}) {
        var _a, _b, _c, _d, _e, _f;
        const address = toStripeAddress(getResolvedBillingAddress());
        const confirmArgs = {
            elements: state$1.instances.stripeElements,
            clientSecret: (_d = (_c = (_b = (_a = state.checkout) === null || _a === void 0 ? void 0 : _a.payment_intent) === null || _b === void 0 ? void 0 : _b.processor_data) === null || _c === void 0 ? void 0 : _c.stripe) === null || _d === void 0 ? void 0 : _d.client_secret,
            confirmParams: {
                return_url: addQueryArgs(window.location.href, {
                    ...(state.checkout.id ? { checkout_id: state.checkout.id } : {}),
                }),
                payment_method_data: {
                    billing_details: {
                        ...(getResolvedBillingEmail() ? { email: getResolvedBillingEmail() } : {}),
                        ...(((_e = state.checkout) === null || _e === void 0 ? void 0 : _e.name) ? { name: state.checkout.name } : {}),
                        ...(((_f = state.checkout) === null || _f === void 0 ? void 0 : _f.phone) ? { phone: state.checkout.phone } : {}),
                        ...(address ? { address } : {}),
                    },
                },
            },
            redirect: 'if_required',
            ...args,
        };
        // prevent possible double-charges
        if (this.confirming)
            return;
        // stripe must be loaded.
        if (!state$1.instances.stripe)
            return;
        try {
            this.scSetState.emit('PAYING');
            const response = type === 'setup' ? await state$1.instances.stripe.confirmSetup(confirmArgs) : await state$1.instances.stripe.confirmPayment(confirmArgs);
            if (response === null || response === void 0 ? void 0 : response.error) {
                this.error = response.error.message;
                throw response.error;
            }
            else {
                this.scSetState.emit('PAID');
                // paid
                this.scPaid.emit();
            }
        }
        catch (e) {
            console.error(e);
            updateFormState('REJECT');
            createErrorNotice(e);
            if (e.message) {
                this.error = e.message;
            }
        }
        finally {
            this.confirming = false;
        }
    }
    render() {
        return (h("div", { key: '71eb75dbc4789fb58a2c995b136ea3267cc95410', class: "sc-stripe-payment-element", "data-testid": "stripe-payment-element" }, !!this.error && (h("sc-text", { key: '1367b9366c5474e0fc4340cca9b5d304d42fd263', style: {
                'color': 'var(--sc-color-danger-500)',
                '--font-size': 'var(--sc-font-size-small)',
                'marginBottom': '0.5em',
            } }, this.error)), h("div", { key: 'f9fd687ce66dc90ad63967be56ea2e042dde19a5', class: "loader", hidden: this.loaded }, h("div", { key: 'afaf4ad57dac3a12252d42ea14f8b0592630b83f', class: "loader__row" }, h("div", { key: '7801ca5c37d6d342e9700d887a8af9d89eeaba78', style: { width: '50%' } }, h("sc-skeleton", { key: 'bef7ff412628b5af8e74d521391c1db9363c17c6', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: 'aafeae6422be0a70cb2314d84d7e9b5cee277cc1' })), h("div", { key: '624f7c0d6d33732d88574e139fc8be159b963a3a', style: { flex: '1' } }, h("sc-skeleton", { key: '38dabc80697301b27c18dcb61d507bf853e4436e', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: '3e2eb79cc78a6000b66e102380fcb17527374191' })), h("div", { key: 'df48e8e2bb68c68377111971c2a4cd643fcd735b', style: { flex: '1' } }, h("sc-skeleton", { key: '4e390c38f046b1209d75b05e9e03a66458010424', style: { width: '50%', marginBottom: '0.5em' } }), h("sc-skeleton", { key: '624837cf2f9588279c741ce750c8f21e55f9adca' }))), h("div", { key: '435300cfb76ad84bd81d7b89ab8cf7628398604c', class: "loader__details" }, h("sc-skeleton", { key: '6da30ad16f9b25bba4f189dd1ebbb52c1c59ae31', style: { height: '1rem' } }), h("sc-skeleton", { key: 'dc01c492dfce33d19507a0083218b22279333ece', style: { height: '1rem', width: '30%' } }))), h("div", { key: 'dc597b17bfdaba207ddc3b8700d284b8501f4461', hidden: !this.loaded, class: "sc-payment-element-container", ref: el => (this.container = el) })));
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "styles": ["handleStylesChange"]
    }; }
};
ScStripePaymentElement.style = ScStripePaymentElementStyle0;

export { ScStripePaymentElement as sc_stripe_payment_element };

//# sourceMappingURL=sc-stripe-payment-element.entry.js.map