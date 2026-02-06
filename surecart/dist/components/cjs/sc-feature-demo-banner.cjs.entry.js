'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scFeatureDemoBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScFeatureDemoBannerStyle0 = scFeatureDemoBannerCss;

const ScFeatureDemoBanner = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.url = 'https://app.surecart.com/plans';
        this.buttonText = wp.i18n.__('Upgrade Your Plan', 'surecart');
    }
    render() {
        return (index.h("div", { key: 'dc6d490362271fd7b1cf7bd5ae5798c6f61528cb', class: { 'sc-banner': true } }, index.h("p", { key: '2a670e2c0bcf0e585401dcc7df3dcae21c6f164f' }, index.h("slot", { key: 'ea91046e10cdb6c96511a7387a763f196d77b50e' }, wp.i18n.__('This is a feature demo. In order to use it, you must upgrade your plan.', 'surecart')), index.h("a", { key: '8a141fef5b9ea3199320ebe0f862476d090985dd', href: this.url, target: "_blank" }, index.h("slot", { key: '70dd18736af87997b748e97542b32cd0d8eeffa7', name: "link" }, this.buttonText, " ", index.h("sc-icon", { key: 'd4917cf554cf91d5c58fbb14bfa062e641150763', name: "arrow-right" }))))));
    }
};
ScFeatureDemoBanner.style = ScFeatureDemoBannerStyle0;

exports.sc_feature_demo_banner = ScFeatureDemoBanner;

//# sourceMappingURL=sc-feature-demo-banner.cjs.entry.js.map