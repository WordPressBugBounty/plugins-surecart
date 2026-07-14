'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const scFeatureDemoBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScFeatureDemoBannerStyle0 = scFeatureDemoBannerCss;

const ScFeatureDemoBanner = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.url = 'https://app.surecart.com/plans';
        this.buttonText = wp.i18n.__('Upgrade Your Plan', 'surecart');
    }
    render() {
        return (index.h("div", { key: '1ea80f11b4266a05e2f548bdd2e44912cac4050a', class: { 'sc-banner': true } }, index.h("p", { key: '5fc2be0e4ac778d9cd6c3b3b538f7416da5b69be' }, index.h("slot", { key: '662fadd8b909043a65a824e28f87bd955f33f203' }, wp.i18n.__('This is a feature demo. In order to use it, you must upgrade your plan.', 'surecart')), index.h("a", { key: '4f594fea0458db1849933e9c74be7ee67b36de68', href: this.url, target: "_blank" }, index.h("slot", { key: '96e6c618851f37ad6b0695fe6574c4022bf1e1b5', name: "link" }, this.buttonText, " ", index.h("sc-icon", { key: '72b062d2a10acd1221dbbae101a75075669e6ed6', name: "arrow-right" }))))));
    }
};
ScFeatureDemoBanner.style = ScFeatureDemoBannerStyle0;

exports.sc_feature_demo_banner = ScFeatureDemoBanner;

//# sourceMappingURL=sc-feature-demo-banner.cjs.entry.js.map