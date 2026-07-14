'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const watchers = require('./watchers-517825ae.js');
require('./index-c3de642f.js');

const scPaymentMethodChoiceCss = ":host{display:block}:slotted([slot=\"summary\"]){line-height:1;display:flex;align-items:center;gap:0.5em}";
const ScPaymentMethodChoiceStyle0 = scPaymentMethodChoiceCss;

const ScPaymentMethodChoice = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.methodId = undefined;
        this.processorId = undefined;
        this.isManual = undefined;
        this.card = undefined;
    }
    isSelected() {
        if (this.methodId) {
            return (watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.id) === this.processorId && (watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.method) == this.methodId;
        }
        return !(watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.method) && (watchers.state === null || watchers.state === void 0 ? void 0 : watchers.state.id) === this.processorId;
    }
    getAllOptions() {
        const parentGroup = this.el.closest('sc-payment') || this.el.parentElement;
        if (!parentGroup) {
            return [];
        }
        return [...parentGroup.querySelectorAll(this.el.tagName)];
    }
    getSiblingItems() {
        return this.getAllOptions().filter(choice => choice !== this.el);
    }
    hasOthers() {
        var _a;
        return !!((_a = this.getSiblingItems()) === null || _a === void 0 ? void 0 : _a.length);
    }
    render() {
        const Tag = this.hasOthers() ? 'sc-toggle' : 'div';
        return (index.h(Tag, { key: '8334112049c19b50d796133324d3737cedd26a3b', "show-control": true, borderless: true, open: this.isSelected(), onScShow: () => {
                watchers.state.id = this.processorId;
                watchers.state.manual = !!this.isManual;
                watchers.state.method = this.methodId;
            } }, this.hasOthers() && index.h("slot", { key: '901033d5a1699dd2235acf6445ab9ba086945152', name: "summary", slot: "summary" }), this.card && !this.hasOthers() ? (index.h("sc-card", null, index.h("slot", null))) : (index.h("slot", null))));
    }
    get el() { return index.getElement(this); }
};
ScPaymentMethodChoice.style = ScPaymentMethodChoiceStyle0;

const scPaymentSelectedCss = ":host{display:block}::slotted([slot=icon]){display:block;font-size:24px}.payment-selected{display:flex;flex-direction:column;gap:var(--sc-spacing-x-small)}.payment-selected__label{color:var(--sc-input-label-color);line-height:var(--sc-line-height-dense);font-size:var(--sc-font-size-medium)}.payment-selected__instructions{display:flex;justify-content:flex-start;align-items:center;gap:1em}.payment-selected__instructions svg{width:42px;height:42px;flex-shrink:0}.payment-selected__instructions-text{color:var(--sc-input-label-color);font-size:var(--sc-font-size-small);line-height:var(--sc-line-height-dense)}";
const ScPaymentSelectedStyle0 = scPaymentSelectedCss;

const ScPaymentSelected = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.iconName = undefined;
        this.label = undefined;
    }
    render() {
        return (index.h("div", { key: '7ccd9bfaf83d0583c08af6282c2d29eb5882b459', class: "payment-selected", part: "base" }, index.h("slot", { key: '7ba288c32494189aa2f5fc5abe18f33eade51cba', name: "icon" }), index.h("div", { key: 'ef2f2146ab0dd394798834bca454ef055e14ee66', class: "payment-selected__label" }, this.label), index.h("sc-divider", { key: '231cf29ed91892803fdaabc33c9fea418b967112', style: { '--spacing': 'var(--sc-spacing-xx-small)' }, exportparts: "base:divider, line:divider__line" }), index.h("div", { key: '3035a661a00b6382da529941d9563e52db35cc15', part: "instructions", class: "payment-selected__instructions" }, index.h("svg", { key: '5c485ed626624b3d56f7ad54ea4e0e61d44537dd', part: "icon", viewBox: "0 0 48 40", fill: "var(--sc-color-gray-500)", xmlns: "http://www.w3.org/2000/svg", role: "presentation" }, index.h("path", { key: '7d48a1f771b7e6b1354ce0aaa10f7c33450d757d', opacity: ".6", "fill-rule": "evenodd", "clip-rule": "evenodd", d: "M43 5a4 4 0 00-4-4H17a4 4 0 00-4 4v11a1 1 0 102 0V5a2 2 0 012-2h22a2 2 0 012 2v30a2 2 0 01-2 2H17a2 2 0 01-2-2v-9a1 1 0 10-2 0v9a4 4 0 004 4h22a4 4 0 004-4V5zM17.992 16.409L21.583 20H6a1 1 0 100 2h15.583l-3.591 3.591a1 1 0 101.415 1.416l5.3-5.3a1 1 0 000-1.414l-5.3-5.3a1 1 0 10-1.415 1.416zM17 6a1 1 0 011-1h15a1 1 0 011 1v2a1 1 0 01-1 1H18a1 1 0 01-1-1V6zm21-1a1 1 0 100 2 1 1 0 000-2z" })), index.h("div", { key: 'c473228c989aa59f1726010c88982425bf943da8', part: "text", class: "payment-selected__instructions-text" }, index.h("slot", { key: 'f4f848f0f5f2d1719dd0e63d4556cf4256e53ab2' })))));
    }
};
ScPaymentSelected.style = ScPaymentSelectedStyle0;

exports.sc_payment_method_choice = ScPaymentMethodChoice;
exports.sc_payment_selected = ScPaymentSelected;

//# sourceMappingURL=sc-payment-method-choice_2.cjs.entry.js.map