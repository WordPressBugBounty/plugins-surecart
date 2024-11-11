import { r as registerInstance, h } from './index-745b6bec.js';
import { g as getVariantFromValues } from './util-50af2a83.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';

const scSubscriptionVariationConfirmCss = ":host{display:block}.sc-product-variation-choice-wrap{display:flex;flex-direction:column;gap:var(--sc-variation-gap, 12px)}";
const ScSubscriptionVariationConfirmStyle0 = scSubscriptionVariationConfirmCss;

const ScSubscriptionVariationConfirm = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.heading = undefined;
        this.product = undefined;
        this.price = undefined;
        this.subscription = undefined;
        this.busy = false;
        this.variantValues = [];
        // Bind the submit function to the component instance
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    componentWillLoad() {
        var _a;
        this.variantValues = (_a = this.subscription) === null || _a === void 0 ? void 0 : _a.variant_options;
    }
    async handleSubmit() {
        var _a, _b, _c, _d;
        this.busy = true;
        const selectedVariant = getVariantFromValues({ variants: (_b = (_a = this.product) === null || _a === void 0 ? void 0 : _a.variants) === null || _b === void 0 ? void 0 : _b.data, values: this.variantValues });
        // confirm ad_hoc amount.
        if ((_c = this.price) === null || _c === void 0 ? void 0 : _c.ad_hoc) {
            return window.location.assign(addQueryArgs(window.location.href, {
                action: 'confirm_amount',
                price_id: (_d = this.price) === null || _d === void 0 ? void 0 : _d.id,
                variant: selectedVariant === null || selectedVariant === void 0 ? void 0 : selectedVariant.id,
            }));
        }
        return window.location.assign(addQueryArgs(window.location.href, {
            action: 'confirm',
            variant: selectedVariant === null || selectedVariant === void 0 ? void 0 : selectedVariant.id,
        }));
    }
    buttonText() {
        var _a, _b, _c, _d;
        if ((_a = this.price) === null || _a === void 0 ? void 0 : _a.ad_hoc) {
            if (((_b = this.price) === null || _b === void 0 ? void 0 : _b.id) === ((_d = (_c = this.subscription) === null || _c === void 0 ? void 0 : _c.price) === null || _d === void 0 ? void 0 : _d.id)) {
                return wp.i18n.__('Update Amount', 'surecart');
            }
            return wp.i18n.__('Choose Amount', 'surecart');
        }
        return wp.i18n.__('Next', 'surecart');
    }
    render() {
        var _a, _b;
        return (h("sc-dashboard-module", { key: 'b4d3d8a168236c224bf950b891720f5a5b30940e', heading: this.heading || wp.i18n.__('Enter An Amount', 'surecart'), class: "subscription-switch" }, h("sc-card", { key: '33e7230b37410de241389804a059926452d52d23' }, h("sc-form", { key: '8ba5a31af9de88a3755690b88f4418dec8489e61', onScSubmit: this.handleSubmit }, h("div", { key: 'd63cd681168afd143783738b10ef926bdffb763c', class: "sc-product-variation-choice-wrap" }, (((_b = (_a = this.product) === null || _a === void 0 ? void 0 : _a.variant_options) === null || _b === void 0 ? void 0 : _b.data) || []).map(({ name, values, id }, index) => {
            var _a, _b;
            return (h("sc-select", { exportparts: "base:select__base, input, form-control, label, help-text, trigger, panel, caret, menu__base, spinner__base, empty", part: "name__input", value: ((_b = (_a = this.subscription) === null || _a === void 0 ? void 0 : _a.variant_options) === null || _b === void 0 ? void 0 : _b[index]) || '', onScChange: (e) => {
                    this.variantValues[index] = e.detail.value;
                }, label: name, choices: values === null || values === void 0 ? void 0 : values.map(label => ({
                    label,
                    value: label,
                })), unselect: false, key: id }));
        })), h("sc-button", { key: 'b6984f31a65b5163c59df1dbae4175e043a7adb5', type: "primary", full: true, submit: true, loading: this.busy }, this.buttonText(), " ", h("sc-icon", { key: 'b0da93083cbfdaf966fc3779d2539d41b88713c5', name: "arrow-right", slot: "suffix" })))), this.busy && h("sc-block-ui", { key: '82c045dd4a638dbcfb12b49276641f89670d2567', style: { zIndex: '9' } })));
    }
};
ScSubscriptionVariationConfirm.style = ScSubscriptionVariationConfirmStyle0;

export { ScSubscriptionVariationConfirm as sc_subscription_variation_confirm };

//# sourceMappingURL=sc-subscription-variation-confirm.entry.js.map