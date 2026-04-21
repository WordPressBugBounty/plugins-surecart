'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scHeadingCss = ":host{display:block}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between}.heading--small .heading__title{font-size:var(--sc-font-size-small);text-transform:uppercase}.heading__text{width:100%}.heading__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense);white-space:normal}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);color:var(--sc-color-gray-500)}";
const ScHeadingStyle0 = scHeadingCss;

const ScHeading = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.size = 'medium';
    }
    render() {
        return (index.h("div", { key: '7c2ff5c6a7cdb0fe1998e6fa589376fb76229955', part: "base", class: {
                'heading': true,
                'heading--small': this.size === 'small',
                'heading--medium': this.size === 'medium',
                'heading--large': this.size === 'large',
            } }, index.h("div", { key: '28e31972d690df2e1d7d879545a85d963a020bee', class: { heading__text: true } }, index.h("div", { key: '1b034553bca5061e25d1fc72d0a052c42d9e2db2', class: "heading__title", part: "title" }, index.h("slot", { key: 'b23ded6f5fc98dffe134c5abb3397f627120a651' })), index.h("div", { key: '4d72d87b4b935b239e3276d1008dedd0f4f5ee5a', class: "heading__description", part: "description" }, index.h("slot", { key: '8016f3fd1f724dfb0fe2d66c43b9ce2225ed571f', name: "description" }))), index.h("slot", { key: '09d687939f3be0017df5d5510b3c40720a85316b', name: "end" })));
    }
    get el() { return index.getElement(this); }
};
ScHeading.style = ScHeadingStyle0;

const ScOrderConfirmComponentsValidator = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.checkout = undefined;
        this.hasManualInstructions = undefined;
    }
    handleOrderChange() {
        var _a;
        if ((_a = this.checkout) === null || _a === void 0 ? void 0 : _a.manual_payment) {
            this.addManualPaymentInstructions();
        }
    }
    addManualPaymentInstructions() {
        var _a, _b;
        if (this.hasManualInstructions)
            return;
        const details = this.el.shadowRoot
            .querySelector('slot')
            .assignedElements({ flatten: true })
            .find(element => element.tagName === 'SC-ORDER-CONFIRMATION-DETAILS');
        const address = document.createElement('sc-order-manual-instructions');
        (_b = (_a = details === null || details === void 0 ? void 0 : details.parentNode) === null || _a === void 0 ? void 0 : _a.insertBefore) === null || _b === void 0 ? void 0 : _b.call(_a, address, details);
        this.hasManualInstructions = true;
    }
    componentWillLoad() {
        this.hasManualInstructions = !!this.el.querySelector('sc-order-manual-instructions');
    }
    render() {
        return index.h("slot", { key: '18b78dc40ddf86f5148f4b52378e79d881dcf65a' });
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "checkout": ["handleOrderChange"]
    }; }
};

exports.sc_heading = ScHeading;
exports.sc_order_confirm_components_validator = ScOrderConfirmComponentsValidator;

//# sourceMappingURL=sc-heading_2.cjs.entry.js.map