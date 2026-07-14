'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
require('./watchers-a1a973e3.js');
const store = require('./store-401bdb4d.js');
const getters = require('./getters-bc65a40b.js');
const mutations = require('./mutations-c14cbdc4.js');
require('./watchers-d2dd8b04.js');
require('./index-c3de642f.js');
require('./google-c1098cb3.js');
require('./currency-71fce0f0.js');
require('./google-59d23803.js');
require('./utils-a9d13080.js');
require('./util-a15c420c.js');
require('./index-fb76df07.js');
require('./add-query-args-49dcb630.js');
require('./fetch-5e8dc1d5.js');
require('./index-7ced8198.js');
require('./remove-query-args-b57e8cd3.js');
require('./mutations-d5d6ddf1.js');

const scUpsellCss = ":host{display:block}.confirm__icon{margin-bottom:var(--sc-spacing-medium);display:flex;justify-content:center}.confirm__icon-container{background:var(--sc-color-primary-500);width:55px;height:55px;border-radius:999999px;display:flex;align-items:center;justify-content:center;font-size:26px;line-height:1;color:white}";
const ScUpsellStyle0 = scUpsellCss;

const ScUpsell = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    componentWillLoad() {
        mutations.trackOffer();
        mutations.preview();
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j;
        const manualPaymentMethod = (_a = store.state.checkout) === null || _a === void 0 ? void 0 : _a.manual_payment_method;
        return (index.h(index.Host, { key: 'c8e62ae16a72c3f5428b6d603a18addc013df1fc' }, index.h("slot", { key: '36663bc52edb72e8b3cb2af4f7d7cb7fcd460f89' }), getters.isBusy() && index.h("sc-block-ui", { key: '14f0fbdaadf614585110b53dbf461e260e234afc', style: { 'z-index': '30', '--sc-block-ui-position': 'fixed' } }), index.h("sc-dialog", { key: '39513caaca9d6f7b1d292978ac1d03fcf19be0bc', open: store.state.loading === 'complete', style: { '--body-spacing': 'var(--sc-spacing-xxx-large)' }, noHeader: true, onScRequestClose: e => e.preventDefault() }, index.h("div", { key: 'f8c2eee3e1b9c5f11ecbd21eba942ac5e4ded318', class: "confirm__icon" }, index.h("div", { key: 'bcce3eadf9d7d8976f18b12ff5c634efa75d7547', class: "confirm__icon-container" }, index.h("sc-icon", { key: 'a3d11975f069e4a43bbdd8b7938edd85202f2b6d', name: "check" }))), index.h("sc-dashboard-module", { key: 'd81d1b806e308dfce0658d92368d9cf21f9fe966', heading: ((_c = (_b = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _b === void 0 ? void 0 : _b.success) === null || _c === void 0 ? void 0 : _c.title) || wp.i18n.__('Thank you!', 'surecart'), style: { '--sc-dashboard-module-spacing': 'var(--sc-spacing-x-large)', 'textAlign': 'center' } }, index.h("span", { key: 'ca06d54009712445eb6b2733014977314c0fa02e', slot: "description" }, ((_e = (_d = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _d === void 0 ? void 0 : _d.success) === null || _e === void 0 ? void 0 : _e.description) || wp.i18n.__('Your purchase was successful. A receipt is on its way to your inbox.', 'surecart')), !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name) && !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions) && (index.h("sc-alert", { key: 'cd905d621a630e1908b9133041fc50e836bd30be', type: "info", open: true, style: { 'text-align': 'left' } }, index.h("span", { key: 'e48e3b2046459cb30fc8130a17f0291e6292083b', slot: "title" }, manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name), index.h("div", { key: '2619ac94c6442d09019af0cc181e5d5d5b99bc75', innerHTML: manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions }))), index.h("sc-button", { key: 'c5b6065ce733124eab54386710c60a4ac03f9431', href: (_g = (_f = window === null || window === void 0 ? void 0 : window.scData) === null || _f === void 0 ? void 0 : _f.pages) === null || _g === void 0 ? void 0 : _g.dashboard, size: "large", type: "primary", autofocus: true }, ((_j = (_h = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _h === void 0 ? void 0 : _h.success) === null || _j === void 0 ? void 0 : _j.button) || wp.i18n.__('Continue', 'surecart'), index.h("sc-icon", { key: '796b5de03b573968e6e86863a8c784b7d73793a4', name: "arrow-right", slot: "suffix" }))))));
    }
};
ScUpsell.style = ScUpsellStyle0;

exports.sc_upsell = ScUpsell;

//# sourceMappingURL=sc-upsell.cjs.entry.js.map