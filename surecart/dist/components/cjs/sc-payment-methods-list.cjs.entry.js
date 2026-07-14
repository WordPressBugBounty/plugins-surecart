'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
require('./fetch-5e8dc1d5.js');
const lazy = require('./lazy-2b509fa7.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
const index$1 = require('./index-7ced8198.js');
require('./remove-query-args-b57e8cd3.js');

const scPaymentMethodsListCss = ":host{display:block;position:relative}.payment-methods-list{display:grid;gap:0.5em}.payment-methods-list sc-heading a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.payment-id{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}";
const ScPaymentMethodsListStyle0 = scPaymentMethodsListCss;

const ScPaymentMethodsList = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.query = undefined;
        this.heading = undefined;
        this.isCustomer = undefined;
        this.canDetachDefaultPaymentMethod = false;
        this.paymentMethods = [];
        this.loading = undefined;
        this.busy = undefined;
        this.error = undefined;
        this.hasTitleSlot = undefined;
        this.editPaymentMethod = false;
        this.deletePaymentMethod = false;
        this.cascadeDefaultPaymentMethod = false;
    }
    /** Only fetch if visible */
    componentWillLoad() {
        lazy.onFirstVisible(this.el, () => this.getPaymentMethods());
        this.handleSlotChange();
    }
    handleSlotChange() {
        this.hasTitleSlot = !!this.el.querySelector('[slot="title"]');
    }
    /**
     * Delete the payment method.
     */
    async deleteMethod() {
        var _a;
        if (!this.deletePaymentMethod)
            return;
        try {
            this.busy = true;
            (await index$1.apiFetch({
                path: `surecart/v1/payment_methods/${(_a = this.deletePaymentMethod) === null || _a === void 0 ? void 0 : _a.id}/detach`,
                method: 'PATCH',
            }));
            // remove from view.
            this.paymentMethods = this.paymentMethods.filter(m => { var _a; return m.id !== ((_a = this.deletePaymentMethod) === null || _a === void 0 ? void 0 : _a.id); });
            this.deletePaymentMethod = false;
        }
        catch (e) {
            alert((e === null || e === void 0 ? void 0 : e.messsage) || wp.i18n.__('Something went wrong', 'surecart'));
        }
        finally {
            this.busy = false;
        }
    }
    /**
     * Set the default payment method.
     */
    async setDefault() {
        var _a, _b, _c;
        if (!this.editPaymentMethod)
            return;
        try {
            this.error = '';
            this.busy = true;
            (await index$1.apiFetch({
                path: `surecart/v1/customers/${(_b = (_a = this.editPaymentMethod) === null || _a === void 0 ? void 0 : _a.customer) === null || _b === void 0 ? void 0 : _b.id}`,
                method: 'PATCH',
                data: {
                    default_payment_method: (_c = this.editPaymentMethod) === null || _c === void 0 ? void 0 : _c.id,
                    cascade_default_payment_method: this.cascadeDefaultPaymentMethod,
                },
            }));
            this.editPaymentMethod = false;
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.busy = false;
        }
        try {
            this.busy = true;
            this.paymentMethods = (await index$1.apiFetch({
                path: addQueryArgs.addQueryArgs(`surecart/v1/payment_methods/`, {
                    expand: ['card', 'customer', 'billing_agreement', 'paypal_account', 'payment_instrument', 'bank_account'],
                    ...this.query,
                }),
            }));
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.busy = false;
        }
    }
    /** Get all paymentMethods */
    async getPaymentMethods() {
        if (!this.isCustomer) {
            return;
        }
        try {
            this.loading = true;
            this.paymentMethods = (await index$1.apiFetch({
                path: addQueryArgs.addQueryArgs(`surecart/v1/payment_methods/`, {
                    expand: ['card', 'customer', 'billing_agreement', 'paypal_account', 'payment_instrument', 'bank_account'],
                    ...this.query,
                    per_page: 100,
                }),
            }));
        }
        catch (e) {
            console.error(this.error);
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    renderLoading() {
        return (index.h("sc-card", { noPadding: true }, index.h("sc-stacked-list", null, index.h("sc-stacked-list-row", { style: { '--columns': '4' }, "mobile-size": 500 }, [...Array(4)].map(() => (index.h("sc-skeleton", { style: { width: '100px', display: 'inline-block' } })))))));
    }
    renderEmpty() {
        return (index.h("div", null, index.h("sc-divider", { style: { '--spacing': '0' } }), index.h("slot", { name: "empty" }, index.h("sc-empty", { icon: "credit-card" }, wp.i18n.__("You don't have any saved payment methods.", 'surecart')))));
    }
    renderPaymentMethodActions(paymentMethod) {
        const { id, customer } = paymentMethod;
        // If this is a string, don't show the actions.
        if (typeof customer === 'string')
            return;
        // If this is the default payment method and it cannot be detached, don't show the actions.
        if (customer.default_payment_method === id && !this.canDetachDefaultPaymentMethod)
            return;
        return (index.h("sc-dropdown", { placement: "bottom-end", slot: "suffix" }, index.h("sc-icon", { role: "button", tabIndex: 0, name: "more-horizontal", slot: "trigger" }), index.h("sc-menu", null, customer.default_payment_method !== id && index.h("sc-menu-item", { onClick: () => (this.editPaymentMethod = paymentMethod) }, wp.i18n.__('Make Default', 'surecart')), index.h("sc-menu-item", { onClick: () => (this.deletePaymentMethod = paymentMethod) }, wp.i18n.__('Delete', 'surecart')))));
    }
    renderList() {
        return this.paymentMethods.map(paymentMethod => {
            const { id, card, customer, live_mode, billing_agreement, paypal_account } = paymentMethod;
            return (index.h("sc-stacked-list-row", { style: { '--columns': billing_agreement ? '2' : '3' } }, index.h("sc-payment-method", { paymentMethod: paymentMethod }), index.h("div", { class: "payment-id" }, !!(card === null || card === void 0 ? void 0 : card.exp_month) && (index.h("span", null, wp.i18n.__('Exp.', 'surecart'), card === null || card === void 0 ? void 0 :
                card.exp_month, "/", card === null || card === void 0 ? void 0 :
                card.exp_year)), !!paypal_account && (paypal_account === null || paypal_account === void 0 ? void 0 : paypal_account.email)), index.h("sc-flex", { "justify-content": "flex-start", "align-items": "center", style: { '--spacing': '0.5em', 'marginLeft': 'auto' } }, typeof customer !== 'string' && (customer === null || customer === void 0 ? void 0 : customer.default_payment_method) === id && index.h("sc-tag", { type: "info" }, wp.i18n.__('Default', 'surecart')), !live_mode && index.h("sc-tag", { type: "warning" }, wp.i18n.__('Test', 'surecart'))), this.renderPaymentMethodActions(paymentMethod)));
        });
    }
    renderContent() {
        var _a;
        if (!this.isCustomer) {
            return this.renderEmpty();
        }
        if (this.loading) {
            return this.renderLoading();
        }
        if (((_a = this.paymentMethods) === null || _a === void 0 ? void 0 : _a.length) === 0) {
            return this.renderEmpty();
        }
        return (index.h("sc-card", { "no-padding": true }, index.h("sc-stacked-list", null, this.renderList())));
    }
    handleEditPaymentMethodChange() {
        // reset when payment method edit changes
        this.cascadeDefaultPaymentMethod = false;
    }
    render() {
        return (index.h("sc-dashboard-module", { key: '6eae52decf85f848eae7168756928dceb7b5e629', class: "payment-methods-list", error: this.error }, index.h("span", { key: 'c197e439f849a7ae72e3c00d6bceacf4ef01a3a0', slot: "heading" }, index.h("slot", { key: 'd1ad50076fe5d51eaf9d031c0eb909ecace4628f', name: "heading" }, this.heading || wp.i18n.__('Payment Methods', 'surecart'))), this.isCustomer && (index.h("sc-flex", { key: '1657ec515d96379b744462d1af5265c5d9847c3b', slot: "end" }, index.h("sc-button", { key: '7491eb37355a037c6d3924d55637601b2de04e09', type: "link", href: addQueryArgs.addQueryArgs(window.location.href, {
                action: 'index',
                model: 'charge',
            }) }, index.h("sc-icon", { key: '3f1d435e7602d305dc6d07bfbc1bec5df2ea638d', name: "clock", slot: "prefix" }), wp.i18n.__('Payment History', 'surecart')), index.h("sc-button", { key: '9b2dafeb6eee4ad4c7ef6d7f9683d943963f82fb', type: "link", href: addQueryArgs.addQueryArgs(window.location.href, {
                action: 'create',
                model: 'payment_method',
            }) }, index.h("sc-icon", { key: '4d84f27843f1956b8bd5c83e5e1c8381bfd300f4', name: "plus", slot: "prefix" }), wp.i18n.__('Add', 'surecart')))), this.renderContent(), index.h("sc-dialog", { key: 'ca330a75668bf8eaa738224062dad17014c804d9', open: !!this.editPaymentMethod, label: wp.i18n.__('Update Default Payment Method', 'surecart'), onScRequestClose: () => (this.editPaymentMethod = false) }, index.h("sc-alert", { key: '15b2a7b85e9b8249fa300dc23f4e1dfac5ee3d3c', type: "danger", open: !!this.error }, this.error), index.h("sc-flex", { key: 'd7a4649d56fb7248e376458b48eeabb4874adada', flexDirection: "column", style: { '--sc-flex-column-gap': 'var(--sc-spacing-small)' } }, index.h("sc-alert", { key: 'd1e2770669da86b909f5fe51e65fc0b93a70207c', type: "info", open: true }, wp.i18n.__('A default payment method will be used as a fallback in case other payment methods get removed from a subscription.', 'surecart')), index.h("sc-switch", { key: '6fef721375d222f3e1ba8d0c0cde1a44d0ade123', checked: this.cascadeDefaultPaymentMethod, onScChange: e => (this.cascadeDefaultPaymentMethod = e.target.checked) }, wp.i18n.__('Update All Subscriptions', 'surecart'), index.h("span", { key: 'e18c296bb99b0d230e01f0d6708f5bd71b3897c7', slot: "description" }, wp.i18n.__('Update all existing subscriptions to use this payment method', 'surecart')))), index.h("div", { key: 'e9f3faf99fc4ca8f914181dc1c8a8e83a1a1f165', slot: "footer" }, index.h("sc-button", { key: 'fbe30ecbe7ebea00414a0de727e7dd1f82fced79', type: "text", onClick: () => (this.editPaymentMethod = false) }, wp.i18n.__('Cancel', 'surecart')), index.h("sc-button", { key: 'bad630f8ca3e46dbcc259dfa01c2217a2c1bbde7', type: "primary", onClick: () => this.setDefault() }, wp.i18n.__('Make Default', 'surecart'))), this.busy && index.h("sc-block-ui", { key: 'cd63bbb64ba644c6e42bb4f588915c52eaf6a102', spinner: true })), index.h("sc-dialog", { key: '0b0897e44768b173814fda0a0454fe1f50221da8', open: !!this.deletePaymentMethod, label: wp.i18n.__('Delete Payment Method', 'surecart'), onScRequestClose: () => (this.deletePaymentMethod = false) }, index.h("sc-alert", { key: 'fef019eab6f198e069b1de2808ec3c38c913187c', type: "danger", open: !!this.error }, this.error), index.h("sc-text", { key: '4270285c2fd8eb25fbb0b0277d98bed3785ea95a' }, wp.i18n.__('Are you sure you want to remove this payment method?', 'surecart')), index.h("div", { key: 'f4ebb6b281910f8dc9110499366426a220a965ee', slot: "footer" }, index.h("sc-button", { key: 'cdf89460d2ff37da61512548ccd5fafbd1349cd5', type: "text", onClick: () => (this.deletePaymentMethod = false) }, wp.i18n.__('Cancel', 'surecart')), index.h("sc-button", { key: '1ac9074c6bc2a3d5eefdbaf219077d0ab5a86bda', type: "primary", onClick: () => this.deleteMethod() }, wp.i18n.__('Delete', 'surecart'))), this.busy && index.h("sc-block-ui", { key: '58e3d1e03bfb27b20c9b763190dcc46fccac605c', spinner: true })), this.busy && index.h("sc-block-ui", { key: '46285ca6f2d0a9537448c2343b9b00a27640ae21', spinner: true })));
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "editPaymentMethod": ["handleEditPaymentMethodChange"]
    }; }
};
ScPaymentMethodsList.style = ScPaymentMethodsListStyle0;

exports.sc_payment_methods_list = ScPaymentMethodsList;

//# sourceMappingURL=sc-payment-methods-list.cjs.entry.js.map