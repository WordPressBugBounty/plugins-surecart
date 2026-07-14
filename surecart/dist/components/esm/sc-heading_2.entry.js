import { r as registerInstance, h, a as getElement } from './index-25e5af33.js';

const scHeadingCss = ":host{display:block}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between}.heading--small .heading__title{font-size:var(--sc-font-size-small);text-transform:uppercase}.heading__text{width:100%}.heading__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense);white-space:normal}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);color:var(--sc-color-gray-500)}";
const ScHeadingStyle0 = scHeadingCss;

const ScHeading = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.size = 'medium';
    }
    render() {
        return (h("div", { key: 'fe40e9d0ae6ea3531ed92be779e0663da6b3d490', part: "base", class: {
                'heading': true,
                'heading--small': this.size === 'small',
                'heading--medium': this.size === 'medium',
                'heading--large': this.size === 'large',
            } }, h("div", { key: 'fc17eac0459e3b3c0f1d30039bf0a24dec75ea24', class: { heading__text: true } }, h("div", { key: '77cb82c0ffc9384c0c414900d8fcec7617776348', class: "heading__title", part: "title" }, h("slot", { key: '4eb2136abac313e535626dace325ccb6ad196fa2' })), h("div", { key: '3e7e7bd9f0e55f5fba00ee93e8686dbb06aaf0e0', class: "heading__description", part: "description" }, h("slot", { key: 'bb162dfa4af264ea108d1bc7908e0a9718467631', name: "description" }))), h("slot", { key: '331aa116fe04ef03cb04e79428781cf5f9b6e319', name: "end" })));
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
        return h("slot", { key: '48f0bba0030c959794dabb1f53671a7662d7ca30' });
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "checkout": ["handleOrderChange"]
    }; }
};

export { ScHeading as sc_heading, ScOrderConfirmComponentsValidator as sc_order_confirm_components_validator };

//# sourceMappingURL=sc-heading_2.entry.js.map