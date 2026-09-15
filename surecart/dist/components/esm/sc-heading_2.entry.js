import { r as registerInstance, h, a as getElement } from './index-25e5af33.js';

const scHeadingCss = ":host{display:block}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between}.heading--small .heading__title{font-size:var(--sc-font-size-small);text-transform:uppercase}.heading__text{width:100%}.heading__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense);white-space:normal}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);color:var(--sc-color-gray-500)}";
const ScHeadingStyle0 = scHeadingCss;

const ScHeading = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.size = 'medium';
    }
    render() {
        return (h("div", { key: '2c05bf2be5dfbf8a42dd51a5c2f0dad8e9cd05e4', part: "base", class: {
                'heading': true,
                'heading--small': this.size === 'small',
                'heading--medium': this.size === 'medium',
                'heading--large': this.size === 'large',
            } }, h("div", { key: 'cd6d046230640dd50cfefcdd3579cb4ef495deea', class: { heading__text: true } }, h("div", { key: '62025af900a60a6297dc9f0d8b47d714d44c1263', class: "heading__title", part: "title" }, h("slot", { key: '436f779b921dabdfe243d8def74471ca3fcfa43a' })), h("div", { key: 'bec60d7ece0fa1588d2b53f6db6387dc20c7cc1e', class: "heading__description", part: "description" }, h("slot", { key: '8f1f63556f62b6e9a88512f2e07f99984aa55bcd', name: "description" }))), h("slot", { key: 'ad125c7f9b38810afed4562be3a2e64c1ef5ce1a', name: "end" })));
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
        return h("slot", { key: '0aba6b77b55efe6b56d524c6e5e3f77a372acb5d' });
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "checkout": ["handleOrderChange"]
    }; }
};

export { ScHeading as sc_heading, ScOrderConfirmComponentsValidator as sc_order_confirm_components_validator };

//# sourceMappingURL=sc-heading_2.entry.js.map