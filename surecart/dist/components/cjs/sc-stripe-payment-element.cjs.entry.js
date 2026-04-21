'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const pure = require('./pure-bd6f0a6e.js');
const watchers = require('./watchers-b4c5fc51.js');
const mutations = require('./mutations-22165f96.js');
const store = require('./store-4a539aea.js');
require('./watchers-f1c1556d.js');
const getters = require('./getters-bdc17348.js');
const getters$1 = require('./getters-87b7ef91.js');
const mutations$1 = require('./mutations-11c8f9a8.js');
const getters$2 = require('./getters-4eeca6b3.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
require('./index-bcdafe6e.js');
require('./utils-2e91d46c.js');
require('./remove-query-args-b57e8cd3.js');
require('./index-fb76df07.js');
require('./google-59d23803.js');
require('./currency-71fce0f0.js');
require('./price-da3cab3d.js');
require('./util-b877b2bd.js');
require('./address-7404695f.js');

const scStripePaymentElementCss = "sc-stripe-payment-element{display:block}sc-stripe-payment-element [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";
const ScStripePaymentElementStyle0 = scStripePaymentElementCss;

const ScStripePaymentElement = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scPaid = index.createEvent(this, "scPaid", 7);
        this.scSetState = index.createEvent(this, "scSetState", 7);
        this.scPaymentInfoAdded = index.createEvent(this, "scPaymentInfoAdded", 7);
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
        var _a, _b, _c, _d;
        this.isInitializingStripe = false;
        this.isCreatingUpdatingStripeElement = false;
        if (this === null || this === void 0 ? void 0 : this.element) {
            try {
                (_b = (_a = this.element) === null || _a === void 0 ? void 0 : _a.unmount) === null || _b === void 0 ? void 0 : _b.call(_a); // If Stripe provides this method
            }
            catch (e) {
                console.warn('Could not unmount Stripe element:', e);
            }
            this.element = null;
        }
        if ((_c = getters.state === null || getters.state === void 0 ? void 0 : getters.state.instances) === null || _c === void 0 ? void 0 : _c.stripeElements) {
            getters.state.instances.stripeElements = null;
        }
        if ((_d = getters.state === null || getters.state === void 0 ? void 0 : getters.state.instances) === null || _d === void 0 ? void 0 : _d.stripe) {
            getters.state.instances.stripe = null;
        }
    }
    disconnectedCallback() {
        this.unlistenToFormState();
        this.unlistenToCheckout();
        this.clearStripeInstances();
    }
    getElementsConfig() {
        var _a, _b, _c, _d;
        const styles = getComputedStyle(this.el);
        return {
            mode: ((_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.remaining_amount_due) > 0 ? 'payment' : 'setup',
            amount: (_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.remaining_amount_due,
            currency: (_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.currency,
            setupFutureUsage: ((_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.reusable_payment_method_required) ? 'off_session' : null,
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
        var _a, _b, _c, _d, _e, _f;
        // need an order amount, etc.
        if (!((_a = mutations.state === null || mutations.state === void 0 ? void 0 : mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.payment_method_required))
            return;
        if (!getters.state.instances.stripe || this.isCreatingUpdatingStripeElement)
            return;
        if (((_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.status) && ['paid', 'processing'].includes((_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.status))
            return;
        this.isCreatingUpdatingStripeElement = true;
        // create the elements if they have not yet been created.
        if (!getters.state.instances.stripeElements) {
            // we have what we need, load elements.
            getters.state.instances.stripeElements = getters.state.instances.stripe.elements(this.getElementsConfig());
            const address = getters$2.toStripeAddress(getters$2.getResolvedBillingAddress());
            const options = this.maybeApplyFilters({
                defaultValues: {
                    billingDetails: {
                        ...(((_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.name) ? { name: mutations.state.checkout.name } : {}),
                        ...(((_e = mutations.state.checkout) === null || _e === void 0 ? void 0 : _e.email) ? { email: mutations.state.checkout.email } : {}),
                        ...(((_f = mutations.state.checkout) === null || _f === void 0 ? void 0 : _f.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
            this.isCreatingUpdatingStripeElement = false;
            return;
        }
        getters.state.instances.stripeElements.update(this.getElementsConfig());
        this.isCreatingUpdatingStripeElement = false;
    }
    /** Update the default attributes of the element when they cahnge. */
    handleUpdateElement() {
        var _a, _b, _c, _d;
        if (!this.element)
            return;
        if (((_a = mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.status) !== 'draft')
            return;
        const address = getters$2.toStripeAddress(getters$2.getResolvedBillingAddress());
        const options = this.maybeApplyFilters({
            defaultValues: {
                billingDetails: {
                    ...(((_b = mutations.state.checkout) === null || _b === void 0 ? void 0 : _b.name) ? { name: mutations.state.checkout.name } : {}),
                    ...(((_c = mutations.state.checkout) === null || _c === void 0 ? void 0 : _c.email) ? { email: mutations.state.checkout.email } : {}),
                    ...(((_d = mutations.state.checkout) === null || _d === void 0 ? void 0 : _d.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
        var _a, _b, _c, _d, _e, _f, _g;
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
                        ...(((_e = mutations.state.checkout) === null || _e === void 0 ? void 0 : _e.email) ? { email: mutations.state.checkout.email } : {}),
                        ...(((_f = mutations.state.checkout) === null || _f === void 0 ? void 0 : _f.name) ? { name: mutations.state.checkout.name } : {}),
                        ...(((_g = mutations.state.checkout) === null || _g === void 0 ? void 0 : _g.phone) ? { phone: mutations.state.checkout.phone } : {}),
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
        return (index.h("div", { key: '7955ae00cd4f2fdde5e816847c5b0df1fcf9a6d6', class: "sc-stripe-payment-element", "data-testid": "stripe-payment-element" }, !!this.error && (index.h("sc-text", { key: '3ae7da488f54a88056323bbfb52c6a2d1cffd838', style: {
                'color': 'var(--sc-color-danger-500)',
                '--font-size': 'var(--sc-font-size-small)',
                'marginBottom': '0.5em',
            } }, this.error)), index.h("div", { key: '21f0e3063a25caf9c1f25b4948232243ea2f44da', class: "loader", hidden: this.loaded }, index.h("div", { key: '9605b7216858bc5b9d22057b323ff3da661477db', class: "loader__row" }, index.h("div", { key: '7959143f5a2164e6ce7c12033abd208ff6c3a5fd', style: { width: '50%' } }, index.h("sc-skeleton", { key: 'fe2d24098dc2c6fdcfdc57128b12aa49df4d1abd', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '34be131b2e8914319d43c91df584f9fa2bcd5759' })), index.h("div", { key: 'f7228bf1501d5ff1fae4247f36ca3cbf940845d7', style: { flex: '1' } }, index.h("sc-skeleton", { key: 'ab254b751fa6f16c92333f81bc732531eec667cb', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '6dc904e81a1ffec1379b38665e8f1ccffb35fd36' })), index.h("div", { key: 'f4a12ac2959ef439132ea4418721cb338ad4947c', style: { flex: '1' } }, index.h("sc-skeleton", { key: '6822090184804a9761fcd8b78c486394f4923798', style: { width: '50%', marginBottom: '0.5em' } }), index.h("sc-skeleton", { key: '064c32f90335c210621477510965ea171188455e' }))), index.h("div", { key: '766dacb84f664d851b5e8f0ab80200673172a543', class: "loader__details" }, index.h("sc-skeleton", { key: '961aa80687e3b6df1948a1f46118d1aa47291f8b', style: { height: '1rem' } }), index.h("sc-skeleton", { key: '381b86acf7e6e9e31961b7f84e89f8a63230c023', style: { height: '1rem', width: '30%' } }))), index.h("div", { key: 'a981219d6470e8845b653cbeeb4459a3030d718d', hidden: !this.loaded, class: "sc-payment-element-container", ref: el => (this.container = el) })));
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "styles": ["handleStylesChange"]
    }; }
};
ScStripePaymentElement.style = ScStripePaymentElementStyle0;

exports.sc_stripe_payment_element = ScStripePaymentElement;

//# sourceMappingURL=sc-stripe-payment-element.cjs.entry.js.map