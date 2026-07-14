import { r as registerInstance, h, F as Fragment } from './index-25e5af33.js';
import { s as state, e as isOptionSoldOut, h as isOptionMissing, b as setProduct } from './watchers-17c3cde1.js';
import './index-18f5a1bc.js';
import './google-ff13b5f8.js';
import './currency-a0c9bff4.js';
import './google-a86aa761.js';
import './utils-f84b2118.js';
import './util-dfbf863e.js';
import './index-c5a96d53.js';

const scProductPillsVariantOptionCss = ".sc-product-pills-variant-option__wrapper{display:flex;flex-wrap:wrap;gap:var(--sc-spacing-x-small)}";
const ScProductPillsVariantOptionStyle0 = scProductPillsVariantOptionCss;

const ScProductPillsVariantOption = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.label = undefined;
        this.optionNumber = 1;
        this.productId = undefined;
    }
    render() {
        return (h("sc-form-control", { key: 'be4e88abd2a7ea836309d65a15ac1f36f31bf1aa', label: this.label }, h("span", { key: '5af73fcabc1d011cf57b17afa38757d84ef99287', slot: "label" }, this.label), h("div", { key: '256097ee1fe2260432c5d1d2144272929c42fe3a', class: "sc-product-pills-variant-option__wrapper" }, (state[this.productId].variant_options[this.optionNumber - 1].values || []).map(value => {
            const isUnavailable = isOptionSoldOut(this.productId, this.optionNumber, value) || isOptionMissing(this.productId, this.optionNumber, value);
            return (h("sc-pill-option", { isUnavailable: isUnavailable, isSelected: state[this.productId].variantValues[`option_${this.optionNumber}`] === value, onClick: () => setProduct(this.productId, {
                    variantValues: {
                        ...state[this.productId].variantValues,
                        [`option_${this.optionNumber}`]: value,
                    },
                }) }, h("span", { "aria-hidden": "true" }, value), h("sc-visually-hidden", null, wp.i18n.sprintf(wp.i18n.__('Select %s: %s.', 'surecart'), this.label, value), isUnavailable && h(Fragment, null, " ", wp.i18n.__('(option unavailable)', 'surecart')), state[this.productId].variantValues[`option_${this.optionNumber}`] === value && h(Fragment, null, " ", wp.i18n.__('This option is currently selected.', 'surecart')))));
        }))));
    }
};
ScProductPillsVariantOption.style = ScProductPillsVariantOptionStyle0;

export { ScProductPillsVariantOption as sc_product_pills_variant_option };

//# sourceMappingURL=sc-product-pills-variant-option.entry.js.map