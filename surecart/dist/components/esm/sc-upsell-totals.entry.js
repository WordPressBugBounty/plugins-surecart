import { r as registerInstance, h, F as Fragment } from './index-25e5af33.js';
import './watchers-35242771.js';
import { s as state } from './store-289e460c.js';
import './watchers-17c3cde1.js';
import './index-18f5a1bc.js';
import './google-ff13b5f8.js';
import './currency-a0c9bff4.js';
import './google-a86aa761.js';
import './utils-f84b2118.js';
import './util-dfbf863e.js';
import './index-c5a96d53.js';
import './getters-1477d792.js';
import './mutations-c99167c2.js';
import './fetch-cdff67be.js';
import './index-824c562b.js';
import './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';
import './mutations-7458343f.js';

const scUpsellTotalsCss = ":host{display:block}sc-divider{margin:16px 0 !important}.conversion-description{color:var(--sc-color-gray-500);font-size:var(--sc-font-size-small);margin-right:var(--sc-spacing-xx-small)}";
const ScUpsellTotalsStyle0 = scUpsellTotalsCss;

const ScUpsellTotals = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    renderAmountDue() {
        var _a, _b;
        return state.amount_due > 0 ? (_a = state === null || state === void 0 ? void 0 : state.line_item) === null || _a === void 0 ? void 0 : _a.total_display_amount : !!((_b = state === null || state === void 0 ? void 0 : state.line_item) === null || _b === void 0 ? void 0 : _b.trial_amount) ? wp.i18n.__('Trial', 'surecart') : wp.i18n.__('Free', 'surecart');
    }
    // Determine if the currency should be displayed to avoid duplication in the amount display.
    getCurrencyToDisplay() {
        var _a, _b, _c, _d, _e, _f, _g;
        return ((_c = (_b = (_a = state === null || state === void 0 ? void 0 : state.line_item) === null || _a === void 0 ? void 0 : _a.total_default_currency_display_amount) === null || _b === void 0 ? void 0 : _b.toLowerCase()) === null || _c === void 0 ? void 0 : _c.includes((_e = (_d = state === null || state === void 0 ? void 0 : state.line_item) === null || _d === void 0 ? void 0 : _d.currency) === null || _e === void 0 ? void 0 : _e.toLowerCase()))
            ? ''
            : (_g = (_f = state === null || state === void 0 ? void 0 : state.line_item) === null || _f === void 0 ? void 0 : _f.currency) === null || _g === void 0 ? void 0 : _g.toUpperCase();
    }
    renderConversion() {
        var _a, _b, _c, _d, _e, _f;
        // need to check the checkout for a few things.
        const checkout = state === null || state === void 0 ? void 0 : state.checkout;
        if (!(checkout === null || checkout === void 0 ? void 0 : checkout.show_converted_total)) {
            return null;
        }
        // the currency is the same as the current currency.
        if ((checkout === null || checkout === void 0 ? void 0 : checkout.currency) === (checkout === null || checkout === void 0 ? void 0 : checkout.current_currency)) {
            return null;
        }
        // there is no amount due.
        if (!((_a = state === null || state === void 0 ? void 0 : state.line_item) === null || _a === void 0 ? void 0 : _a.total_amount)) {
            return null;
        }
        return (h(Fragment, null, h("sc-divider", null), h("sc-line-item", { style: { '--price-size': 'var(--sc-font-size-x-large)' } }, h("span", { slot: "title" }, h("slot", { name: "charge-amount-description" }, wp.i18n.sprintf(wp.i18n.__('Payment Total', 'surecart'), (_c = (_b = state === null || state === void 0 ? void 0 : state.line_item) === null || _b === void 0 ? void 0 : _b.currency) === null || _c === void 0 ? void 0 : _c.toUpperCase()))), h("span", { slot: "price" }, this.getCurrencyToDisplay() && h("span", { class: "currency-label" }, this.getCurrencyToDisplay()), (_d = state === null || state === void 0 ? void 0 : state.line_item) === null || _d === void 0 ? void 0 :
            _d.total_default_currency_display_amount)), h("sc-line-item", null, h("span", { slot: "description", class: "conversion-description" }, wp.i18n.sprintf(wp.i18n.__('Your payment will be processed in %s.', 'surecart'), (_f = (_e = state === null || state === void 0 ? void 0 : state.line_item) === null || _e === void 0 ? void 0 : _e.currency) === null || _f === void 0 ? void 0 : _f.toUpperCase())))));
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g;
        return (h("sc-summary", { key: 'ac64d5a59917cc3647a6d6996087e187879150fd', "open-text": "Total", "closed-text": "Total", collapsible: true, collapsed: true }, !!((_a = state.line_item) === null || _a === void 0 ? void 0 : _a.id) && h("span", { key: '542dee06ed2d1ffd4335940cd338a905bd50e85d', slot: "price" }, this.renderAmountDue()), h("sc-divider", { key: '3d2226e9c744c02dbfcc873230c0b7d42879c881' }), h("sc-line-item", { key: '8367fec44b9df5eb49a8337e133a4fede1bd9b54' }, h("span", { key: '833886b904adad505bedd207a432ec97cb5f10f1', slot: "description" }, wp.i18n.__('Subtotal', 'surecart')), h("span", { key: 'e9740e0de600d0aea10eed35286dab873e327d0f', slot: "price" }, (_b = state.line_item) === null || _b === void 0 ? void 0 : _b.subtotal_display_amount)), (((_d = (_c = state === null || state === void 0 ? void 0 : state.line_item) === null || _c === void 0 ? void 0 : _c.fees) === null || _d === void 0 ? void 0 : _d.data) || [])
            .filter(fee => fee.fee_type === 'upsell') // only upsell fees.
            .map(fee => {
            return (h("sc-line-item", null, h("span", { slot: "description" }, fee.description, " ", `(${wp.i18n.__('one time', 'surecart')})`), h("span", { slot: "price" }, fee === null || fee === void 0 ? void 0 : fee.display_amount)));
        }), !!((_e = state.line_item) === null || _e === void 0 ? void 0 : _e.tax_amount) && (h("sc-line-item", { key: '54ec7f434a389f9ad8c552d0667efde721876b1e' }, h("span", { key: '124b2717d828ee803aab533ac0719c482f0a13e4', slot: "description" }, wp.i18n.__('Tax', 'surecart')), h("span", { key: 'e15ad543f95c1b4d7e681ba00325b636f57b31dc', slot: "price" }, (_f = state.line_item) === null || _f === void 0 ? void 0 : _f.tax_display_amount))), h("sc-divider", { key: '3b6303ac5248d4f7fe06deb1f3061b4d69fd5ea0' }), h("sc-line-item", { key: 'f1882049a8ad56cb2518c944de1757100e69bce9', style: { '--price-size': 'var(--sc-font-size-x-large)' } }, h("span", { key: '0c75689c35e10c1a9030f746bf2ce4ad0b8bbe2a', slot: "title" }, wp.i18n.__('Total', 'surecart')), h("span", { key: '9d251f8d035958714b5d5e1c41fffb1bdf8e5446', slot: "price" }, (_g = state.line_item) === null || _g === void 0 ? void 0 : _g.total_display_amount)), this.renderConversion()));
    }
};
ScUpsellTotals.style = ScUpsellTotalsStyle0;

export { ScUpsellTotals as sc_upsell_totals };

//# sourceMappingURL=sc-upsell-totals.entry.js.map