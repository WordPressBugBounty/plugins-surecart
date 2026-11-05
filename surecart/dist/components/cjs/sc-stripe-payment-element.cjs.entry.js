'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const pure = require('./pure-bd6f0a6e.js');
const watchers = require('./watchers-517825ae.js');
const mutations = require('./mutations-4133422f.js');
const store = require('./store-29627d6b.js');
require('./watchers-3a87bc45.js');
const getters = require('./getters-d8754292.js');
const getters$1 = require('./getters-ade46b86.js');
const mutations$1 = require('./mutations-d5d6ddf1.js');
const getters$2 = require('./getters-1ff518bc.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
require('./index-c3de642f.js');
require('./utils-f5ea3c23.js');
require('./remove-query-args-b57e8cd3.js');
require('./index-fb76df07.js');
require('./google-8dbad1a6.js');
require('./currency-b438c76d.js');
require('./price-9dddd853.js');
require('./util-a15c420c.js');
require('./store-5cd165ea.js');
require('./address-7404695f.js');

const scStripePaymentElementCss = "sc-stripe-payment-element{display:block}sc-stripe-payment-element [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";
const ScStripePaymentElementStyle0 = scStripePaymentElementCss;

const ScStripePaymentElement = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scPaid = index.createEvent(this, "scPaid", 7);
        this.scSetState = index.createEvent(this, "scSetState", 7);
        this.scPaymentInfoAdded = index.createEvent(this, "scPaymentInfoAdded", 7);
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
        mutations.onChange('checkout', () => {
            this.initializeStripe();
        });
    }
    async componentDidLoad() {
        this.initializeStripe();
    }
    async initializeStripe() {
        var _a, _b;
        if (typeof ((_a = mutations.state === null || mutations.state === void 0 ? void 0 : mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.live_mode) === 'undefined' || ((_b = getters.state === null || getters.state === void 0 ? void 0 : getters.state.instances) === null || _b === void 0 ? void 0 : _b.stripe) || this.isInitializingStripe) {
            return;
        }
        this.isInitializingStripe = true;
        const { processor_data } = getters.getProcessorByType('stripe') || {};
        try {
            getters.state.instances.stripe = await pure.pure.loadStripe(processor_data === null || processor_data === void 0 ? void 0 : processor_data.publishable_key, { stripeAccount: processor_data === null || processor_data === void 0 ? void 0 : processor_data.account_id });
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
        this.unlistenToCheckout = mutations.onChange('checkout', () => {
            this.fetchStyles();
            this.createOrUpdateElements();
            this.handleUpdateElement();
        });
        // we need to listen to the form state and pay when the form state enters the paying state.
        this.unlistenToFormState = store.onChange('formState', () => {
            var _a;
            if (!((_a = mutations.state === null || mutations.state === void 0 ? void 0 : mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.payment_method_required))
                return;
            if ('paying' === getters$1.currentFormState()) {
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
        if ((_a = getters.state === null || getters.state === void 0 ? void 0 : getters.state.instances) === null || _a === void 0 ? void 0 : _a.stripe) {
            getters.state.instances.stripe = null;
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
        if ((_c = getters.state === null || getters.state === void 0 ? void 0 : getters.state.instances) === null || _c === void 0 ? void 0 : _c.stripeElements) {
            getters.state.instances.stripeElements = null;
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
            mode: ((_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.remaining_amount_due) > 0 ? 'payment' : 'setup',
            amount: (_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.remaining_amount_due,
            currency: (_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.currency,
            setupFutureUsage: ((_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.reusable_payment_method_required) ? 'off_session' : null,
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
        const filtered = (_g = window.wp.hooks.applyFilters('surecart_stripe_payment_element_elements_config', config, mutations.state.checkout)) !== null && _g !== void 0 ? _g : config;
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
            paymentMethodOrder: window.wp.hooks.applyFilters('surecart_stripe_payment_element_payment_method_order', [], mutations.state.checkout),
            wallets: window.wp.hooks.applyFilters('surecart_stripe_payment_element_wallets', {}, mutations.state.checkout),
            terms: window.wp.hooks.applyFilters('surecart_stripe_payment_element_terms', {}, mutations.state.checkout),
            fields: window.wp.hooks.applyFilters('surecart_stripe_payment_element_fields', (_c = options.fields) !== null && _c !== void 0 ? _c : {}),
        };
    }
    /** Update the payment element mode, amount and currency when it changes. */
    createOrUpdateElements() {
        var _a, _b, _c, _d, _e;
        // need an order amount, etc.
        if (!((_a = mutations.state === null || mutations.state === void 0 ? void 0 : mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.payment_method_required))
            return;
        if (!getters.state.instances.stripe || this.isCreatingUpdatingStripeElement)
            return;
        if (((_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.status) && ['paid', 'processing'].includes((_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.status))
            return;
        this.isCreatingUpdatingStripeElement = true;
        try {
            const config = this.getElementsConfig();
            const hasAllowlist = !!config.paymentMethodTypes;
            // elements.update() can't unset paymentMethodTypes, so entering or leaving allowlist mode needs a fresh instance.
            if (getters.state.instances.stripeElements && hasAllowlist !== this.hasPaymentMethodAllowlist) {
                this.destroyElements();
            }
            this.hasPaymentMethodAllowlist = hasAllowlist;
            // create the elements if they have not yet been created.
            if (!getters.state.instances.stripeElements) {
                // we have what we need, load elements.
                getters.state.instances.stripeElements = getters.state.instances.stripe.elements(config);
                const address = getters$2.toStripeAddress(getters$2.getResolvedBillingAddress());
                const options = this.maybeApplyFilters({
                    defaultValues: {
                        billingDetails: {
                            ...(((_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.name) ? { name: mutations.state.checkout.name } : {}),
                            ...(getters$2.getResolvedBillingEmail() ? { email: getters$2.getResolvedBillingEmail() } : {}),
                            ...(((_e = mutations.state.checkout) === null || _e === void 0 ? void 0 : _e.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
                getters.state.instances.stripeElements.create('payment', options).mount(this.container);
                this.element = getters.state.instances.stripeElements.getElement('payment');
                this.element.on('ready', () => (this.loaded = true));
                this.element.on('change', (event) => {
                    var _a, _b, _c, _d, _e, _f, _g;
                    const requiredShippingPaymentTypes = ['cashapp', 'klarna', 'clearpay'];
                    mutations.state.paymentMethodRequiresShipping = requiredShippingPaymentTypes.includes((_a = event === null || event === void 0 ? void 0 : event.value) === null || _a === void 0 ? void 0 : _a.type);
                    if (event.complete) {
                        this.scPaymentInfoAdded.emit({
                            checkout_id: (_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.id,
                            currency: (_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.currency,
                            processor_type: 'stripe',
                            total_amount: (_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.total_amount,
                            line_items: (_e = mutations.state.checkout) === null || _e === void 0 ? void 0 : _e.line_items,
                            payment_method: {
                                billing_details: {
                                    email: (_f = mutations.state.checkout) === null || _f === void 0 ? void 0 : _f.email,
                                    name: (_g = mutations.state.checkout) === null || _g === void 0 ? void 0 : _g.name,
                                },
                            },
                        });
                    }
                });
                return;
            }
            getters.state.instances.stripeElements.update(config);
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
        if (((_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.status) !== 'draft')
            return;
        const address = getters$2.toStripeAddress(getters$2.getResolvedBillingAddress());
        const options = this.maybeApplyFilters({
            defaultValues: {
                billingDetails: {
                    ...(((_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.name) ? { name: mutations.state.checkout.name } : {}),
                    ...(getters$2.getResolvedBillingEmail() ? { email: getters$2.getResolvedBillingEmail() } : {}),
                    ...(((_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
        if ((watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.id) !== 'stripe')
            return;
        // submit the elements.
        const { error } = await getters.state.instances.stripeElements.submit();
        if (error) {
            console.error({ error });
            mutations.updateFormState('REJECT');
            mutations$1.createErrorNotice(error);
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
        if ((watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.id) !== 'stripe')
            return;
        // must be a stripe session
        if (((_b = (_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.payment_intent) === null || _b === void 0 ? void 0 : _b.processor_type) !== 'stripe')
            return;
        // need an external_type
        if (!((_f = (_e = (_d = (_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.payment_intent) === null || _d === void 0 ? void 0 : _d.processor_data) === null || _e === void 0 ? void 0 : _e.stripe) === null || _f === void 0 ? void 0 : _f.type))
            return;
        // we need a client secret.
        if (!((_k = (_j = (_h = (_g = mutations.state.checkout) === null || _g === void 0 ? void 0 : _g.payment_intent) === null || _h === void 0 ? void 0 : _h.processor_data) === null || _j === void 0 ? void 0 : _j.stripe) === null || _k === void 0 ? void 0 : _k.client_secret))
            return;
        // confirm the intent.
        return await this.confirm((_p = (_o = (_m = (_l = mutations.state.checkout) === null || _l === void 0 ? void 0 : _l.payment_intent) === null || _m === void 0 ? void 0 : _m.processor_data) === null || _o === void 0 ? void 0 : _o.stripe) === null || _p === void 0 ? void 0 : _p.type);
    }
    async confirm(type, args = {}) {
        var _a, _b, _c, _d, _e, _f;
        const address = getters$2.toStripeAddress(getters$2.getResolvedBillingAddress());
        const confirmArgs = {
            elements: getters.state.instances.stripeElements,
            clientSecret: (_d = (_c = (_b = (_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.payment_intent) === null || _b === void 0 ? void 0 : _b.processor_data) === null || _c === void 0 ? void 0 : _c.stripe) === null || _d === void 0 ? void 0 : _d.client_secret,
            confirmParams: {
                return_url: addQueryArgs.addQueryArgs(window.location.href, {
                    ...(mutations.state.checkout.id ? { checkout_id: mutations.state.checkout.id } : {}),
                }),
                payment_method_data: {
                    billing_details: {
                        ...(getters$2.getResolvedBillingEmail() ? { email: getters$2.getResolvedBillingEmail() } : {}),
                        ...(((_e = mutations.state.checkout) === null || _e === void 0 ? void 0 : _e.name) ? { name: mutations.state.checkout.name } : {}),
                        ...(((_f = mutations.state.checkout) === null || _f === void 0 ? void 0 : _f.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
        if (!getters.state.instances.stripe)
            return;
        try {
            this.scSetState.emit('PAYING');
            const response = type === 'setup' ? await getters.state.instances.stripe.confirmSetup(confirmArgs) : await getters.state.instances.stripe.confirmPayment(confirmArgs);
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
            mutations.updateFormState('REJECT');
            mutations$1.createErrorNotice(e);
            if (e.message) {
                this.error = e.message;
            }
        }
        finally {
            this.confirming = false;
        }
    }
    render() {
        return (index.h("div", { key: '71eb75dbc4789fb58a2c995b136ea3267cc95410', class: "sc-stripe-payment-element", "data-testid": "stripe-payment-element" }, !!this.error && (index.h("sc-text", { key: '1367b9366c5474e0fc4340cca9b5d304d42fd263', style: {
                'color': 'var(--sc-color-danger-500)',
                '--font-size': 'var(--sc-font-size-small)',
                'marginBottom': '0.5em',
            } }, this.error)), index.h("div", { key: 'f9fd687ce66dc90ad63967be56ea2e042dde19a5', class: "loader", hidden: this.loaded }, index.h("div", { key: 'afaf4ad57dac3a12252d42ea14f8b0592630b83f', class: "loader__row" }, index.h("div", { key: '7801ca5c37d6d342e9700d887a8af9d89eeaba78', style: { width: '50%' } }, index.h("sc-skeleton", { key: 'bef7ff412628b5af8e74d521391c1db9363c17c6', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: 'aafeae6422be0a70cb2314d84d7e9b5cee277cc1' })), index.h("div", { key: '624f7c0d6d33732d88574e139fc8be159b963a3a', style: { flex: '1' } }, index.h("sc-skeleton", { key: '38dabc80697301b27c18dcb61d507bf853e4436e', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '3e2eb79cc78a6000b66e102380fcb17527374191' })), index.h("div", { key: 'df48e8e2bb68c68377111971c2a4cd643fcd735b', style: { flex: '1' } }, index.h("sc-skeleton", { key: '4e390c38f046b1209d75b05e9e03a66458010424', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '624837cf2f9588279c741ce750c8f21e55f9adca' }))), index.h("div", { key: '435300cfb76ad84bd81d7b89ab8cf7628398604c', class: "loader__details" }, index.h("sc-skeleton", { key: '6da30ad16f9b25bba4f189dd1ebbb52c1c59ae31', style: { height: '1rem' } }), index.h("sc-skeleton", { key: 'dc01c492dfce33d19507a0083218b22279333ece', style: { height: '1rem', width: '30%' } }))), index.h("div", { key: 'dc597b17bfdaba207ddc3b8700d284b8501f4461', hidden: !this.loaded, class: "sc-payment-element-container", ref: el => (this.container = el) })));
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "styles": ["handleStylesChange"]
    }; }
};
ScStripePaymentElement.style = ScStripePaymentElementStyle0;

exports.sc_stripe_payment_element = ScStripePaymentElement;

//# sourceMappingURL=sc-stripe-payment-element.cjs.entry.js.map