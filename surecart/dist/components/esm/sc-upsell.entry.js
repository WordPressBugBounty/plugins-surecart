import { r as registerInstance, h, H as Host } from './index-745b6bec.js';
import './watchers-c215fc6b.js';
import { s as state } from './store-4bc13420.js';
import { a as isBusy } from './getters-1899e179.js';
import { t as trackOffer, p as preview } from './mutations-b0435825.js';
import './watchers-fbf07f32.js';
import './index-06061d4e.js';
import './google-dd89f242.js';
import './currency-a0c9bff4.js';
import './google-a86aa761.js';
import './utils-cd1431df.js';
import './util-50af2a83.js';
import './index-c5a96d53.js';
import './add-query-args-0e2a8393.js';
import './fetch-bc141774.js';
import './remove-query-args-938c53ea.js';
import './mutations-ed6d0770.js';

const scUpsellCss = ":host{display:block}.confirm__icon{margin-bottom:var(--sc-spacing-medium);display:flex;justify-content:center}.confirm__icon-container{background:var(--sc-color-primary-500);width:55px;height:55px;border-radius:999999px;display:flex;align-items:center;justify-content:center;font-size:26px;line-height:1;color:white}";
const ScUpsellStyle0 = scUpsellCss;

const ScUpsell = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    componentWillLoad() {
        trackOffer();
        preview();
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j;
        const manualPaymentMethod = (_a = state.checkout) === null || _a === void 0 ? void 0 : _a.manual_payment_method;
        return (h(Host, { key: '4a9a7d811681ce1273eb97c562344a8094126da7' }, h("slot", { key: 'f16e4f2454058935e1fb92e1befe8f6bf6df7835' }), isBusy() && h("sc-block-ui", { key: '8458a033bd53552547a4ae84f8de4c7c8219066e', style: { 'z-index': '30', '--sc-block-ui-position': 'fixed' } }), h("sc-dialog", { key: 'f0af5c25517e7e8959f08b09620432d6ea3ec101', open: state.loading === 'complete', style: { '--body-spacing': 'var(--sc-spacing-xxx-large)' }, noHeader: true, onScRequestClose: e => e.preventDefault() }, h("div", { key: 'ce9ef446051c9451eef8b7c4f6d5ef96d8840a12', class: "confirm__icon" }, h("div", { key: '3d5512b5e15535d3edd116eda07ef19fb5bba161', class: "confirm__icon-container" }, h("sc-icon", { key: '7bd4566d2ff48f20959a656252a940cbdc97fa38', name: "check" }))), h("sc-dashboard-module", { key: '36efa4b4c2b3e8d43e6291923a3c3e9657deb253', heading: ((_c = (_b = state === null || state === void 0 ? void 0 : state.text) === null || _b === void 0 ? void 0 : _b.success) === null || _c === void 0 ? void 0 : _c.title) || wp.i18n.__('Thank you!', 'surecart'), style: { '--sc-dashboard-module-spacing': 'var(--sc-spacing-x-large)', 'textAlign': 'center' } }, h("span", { key: '5c03168579ddf2c12114b80c4e8ae1dbb4da6f74', slot: "description" }, ((_e = (_d = state === null || state === void 0 ? void 0 : state.text) === null || _d === void 0 ? void 0 : _d.success) === null || _e === void 0 ? void 0 : _e.description) || wp.i18n.__('Your purchase was successful. A receipt is on its way to your inbox.', 'surecart')), !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name) && !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions) && (h("sc-alert", { key: 'd279ccfe1b0f641bd4433747aa7f1e8cca305490', type: "info", open: true, style: { 'text-align': 'left' } }, h("span", { key: '30c1c9f5b3353246c8d86d464a0f14ddfa4da3ed', slot: "title" }, manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name), h("div", { key: 'b75f5cdcc90067928cacad1e06b2a77d117ae1c9', innerHTML: manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions }))), h("sc-button", { key: '7f0ff2ed02d68c61b748e1070576255f47132313', href: (_g = (_f = window === null || window === void 0 ? void 0 : window.scData) === null || _f === void 0 ? void 0 : _f.pages) === null || _g === void 0 ? void 0 : _g.dashboard, size: "large", type: "primary", autofocus: true }, ((_j = (_h = state === null || state === void 0 ? void 0 : state.text) === null || _h === void 0 ? void 0 : _h.success) === null || _j === void 0 ? void 0 : _j.button) || wp.i18n.__('Continue', 'surecart'), h("sc-icon", { key: 'dd71a61382185129e241e4e41dcfea3afd6b664e', name: "arrow-right", slot: "suffix" }))))));
    }
};
ScUpsell.style = ScUpsellStyle0;

export { ScUpsell as sc_upsell };

//# sourceMappingURL=sc-upsell.entry.js.map