'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
require('./watchers-ba22d6cd.js');
const store = require('./store-401bdb4d.js');
const getters = require('./getters-bc65a40b.js');
const mutations = require('./mutations-e8aed27a.js');
require('./watchers-758fd4c1.js');
require('./index-c3de642f.js');
require('./google-15c85d5e.js');
require('./currency-b438c76d.js');
require('./google-8dbad1a6.js');
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
        return (index.h(index.Host, { key: 'b03e07ed69552fa6d3df65c8eaa1fe34f9085e63' }, index.h("slot", { key: '49bcf176d34e2939e4229de151ffc67752c51df6' }), getters.isBusy() && index.h("sc-block-ui", { key: '322012a0fe23f21eb40b5fbd9f3aab143d508c21', style: { 'z-index': '30', '--sc-block-ui-position': 'fixed' } }), index.h("sc-dialog", { key: '33edd1a571f0942da99e9d56e5b1c77de32ffabe', open: store.state.loading === 'complete', style: { '--body-spacing': 'var(--sc-spacing-xxx-large)' }, noHeader: true, onScRequestClose: e => e.preventDefault() }, index.h("div", { key: '2754198fa58db8032e0976ab9d17b52431bd85ad', class: "confirm__icon" }, index.h("div", { key: '584e4dd830cae2cd4eaf4d854b4fc5af81b9eb1d', class: "confirm__icon-container" }, index.h("sc-icon", { key: '3499c741e299cc4a8c7da186d160f07512d46975', name: "check" }))), index.h("sc-dashboard-module", { key: 'd4c2889f6b7ecdf90b629f19d94c15621e09fe32', heading: ((_c = (_b = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _b === void 0 ? void 0 : _b.success) === null || _c === void 0 ? void 0 : _c.title) || wp.i18n.__('Thank you!', 'surecart'), style: { '--sc-dashboard-module-spacing': 'var(--sc-spacing-x-large)', 'textAlign': 'center' } }, index.h("span", { key: 'b3354352cec6f25406819ee35b07e96d4301a119', slot: "description" }, ((_e = (_d = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _d === void 0 ? void 0 : _d.success) === null || _e === void 0 ? void 0 : _e.description) || wp.i18n.__('Your purchase was successful. A receipt is on its way to your inbox.', 'surecart')), !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name) && !!(manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions) && (index.h("sc-alert", { key: '705034c256cbaa8193270e7ebb06cb35430e5bc3', type: "info", open: true, style: { 'text-align': 'left' } }, index.h("span", { key: '1e01f2415751a0fc22233089645ae014a4d747d6', slot: "title" }, manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.name), index.h("div", { key: '6d0382628afbd9efa8f35e91b51c02d0a9c4c3dc', innerHTML: manualPaymentMethod === null || manualPaymentMethod === void 0 ? void 0 : manualPaymentMethod.instructions }))), index.h("sc-button", { key: '01eb86a42a90e85f232ff72537d632cb08fb0e63', href: (_g = (_f = window === null || window === void 0 ? void 0 : window.scData) === null || _f === void 0 ? void 0 : _f.pages) === null || _g === void 0 ? void 0 : _g.dashboard, size: "large", type: "primary", autofocus: true }, ((_j = (_h = store.state === null || store.state === void 0 ? void 0 : store.state.text) === null || _h === void 0 ? void 0 : _h.success) === null || _j === void 0 ? void 0 : _j.button) || wp.i18n.__('Continue', 'surecart'), index.h("sc-icon", { key: 'd7ea5749f7fc7c2bd1a52bac05f3f1f113a2d550', name: "arrow-right", slot: "suffix" }))))));
    }
};
ScUpsell.style = ScUpsellStyle0;

exports.sc_upsell = ScUpsell;

//# sourceMappingURL=sc-upsell.cjs.entry.js.map