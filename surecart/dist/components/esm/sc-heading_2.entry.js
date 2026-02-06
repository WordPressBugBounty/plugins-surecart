import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';

const scHeadingCss = ":host{display:block}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between}.heading--small .heading__title{font-size:var(--sc-font-size-small);text-transform:uppercase}.heading__text{width:100%}.heading__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense);white-space:normal}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);color:var(--sc-color-gray-500)}";
const ScHeadingStyle0 = scHeadingCss;

const ScHeading = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.size = 'medium';
    }
    render() {
        return (h("div", { key: 'f62cfc9d90b6976215cc6010c3bb77f06a7d30b9', part: "base", class: {
                'heading': true,
                'heading--small': this.size === 'small',
                'heading--medium': this.size === 'medium',
                'heading--large': this.size === 'large',
            } }, h("div", { key: '7d4e8b1a3be32903aeb7e807546de965a94e9f96', class: { heading__text: true } }, h("div", { key: '3af7bc5a59ff93dcd8aebaa4c6e8158c68b9e030', class: "heading__title", part: "title" }, h("slot", { key: '16727b87737f0d9698a645c22e4533f64132db45' })), h("div", { key: 'd4ae6eb23a4500058e79b11913a0ea46ef6d1aa9', class: "heading__description", part: "description" }, h("slot", { key: 'e54b051cd369c8a93fdfb21b82dac378182d832b', name: "description" }))), h("slot", { key: '4804e563135589bd01d4b7e1fc146c2e909e5fda', name: "end" })));
    }
    get el() { return getElement(this); }
};
ScHeading.style = ScHeadingStyle0;

const ScOrderConfirmComponentsValidator = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
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
        return h("slot", { key: '3256d44c36a96a5d0025a08ac6115ff4f62864ef' });
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "checkout": ["handleOrderChange"]
    }; }
};

export { ScHeading as sc_heading, ScOrderConfirmComponentsValidator as sc_order_confirm_components_validator };

//# sourceMappingURL=sc-heading_2.entry.js.map