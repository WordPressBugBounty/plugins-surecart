'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const watchers = require('./watchers-b4c5fc51.js');
require('./index-bcdafe6e.js');

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
        return (index.h(Tag, { key: '30a689b58b16b67de619340b34a732b808401ba3', "show-control": true, borderless: true, open: this.isSelected(), onScShow: () => {
                watchers.state.id = this.processorId;
                watchers.state.manual = !!this.isManual;
                watchers.state.method = this.methodId;
            } }, this.hasOthers() && index.h("slot", { key: '9ff19943660fdb2d2845c5b573b515ce4e4a91d8', name: "summary", slot: "summary" }), this.card && !this.hasOthers() ? (index.h("sc-card", null, index.h("slot", null))) : (index.h("slot", null))));
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
        return (index.h("div", { key: '10b3db7aef56a785033d6de0f6e86e60d68fd507', class: "payment-selected", part: "base" }, index.h("slot", { key: 'fc36061b3155e63180b44113de23837679a0f41c', name: "icon" }), index.h("div", { key: '74b1690dd7fd1cc6b48a9ca31a56e0404036fc26', class: "payment-selected__label" }, this.label), index.h("sc-divider", { key: '33d5ac73adef755d929e045c82d8f56eaecf6815', style: { '--spacing': 'var(--sc-spacing-xx-small)' }, exportparts: "base:divider, line:divider__line" }), index.h("div", { key: 'e608c027f2ddb39cffdfe9e181069779b8524244', part: "instructions", class: "payment-selected__instructions" }, index.h("svg", { key: '0aee668c6c8f3dbad3e18a244571f98a99556eb7', part: "icon", viewBox: "0 0 48 40", fill: "var(--sc-color-gray-500)", xmlns: "http://www.w3.org/2000/svg", role: "presentation" }, index.h("path", { key: '73c2809ff23d7ae98ab18afa9a78d437f3a20a37', opacity: ".6", "fill-rule": "evenodd", "clip-rule": "evenodd", d: "M43 5a4 4 0 00-4-4H17a4 4 0 00-4 4v11a1 1 0 102 0V5a2 2 0 012-2h22a2 2 0 012 2v30a2 2 0 01-2 2H17a2 2 0 01-2-2v-9a1 1 0 10-2 0v9a4 4 0 004 4h22a4 4 0 004-4V5zM17.992 16.409L21.583 20H6a1 1 0 100 2h15.583l-3.591 3.591a1 1 0 101.415 1.416l5.3-5.3a1 1 0 000-1.414l-5.3-5.3a1 1 0 10-1.415 1.416zM17 6a1 1 0 011-1h15a1 1 0 011 1v2a1 1 0 01-1 1H18a1 1 0 01-1-1V6zm21-1a1 1 0 100 2 1 1 0 000-2z" })), index.h("div", { key: '51f1d3b106c12bb2d860a9da25dcb31e3a553645', part: "text", class: "payment-selected__instructions-text" }, index.h("slot", { key: 'b33a44a01c0e49bc659a27dd881c32c995281234' })))));
    }
};
ScPaymentSelected.style = ScPaymentSelectedStyle0;

exports.sc_payment_method_choice = ScPaymentMethodChoice;
exports.sc_payment_selected = ScPaymentSelected;

//# sourceMappingURL=sc-payment-method-choice_2.cjs.entry.js.map