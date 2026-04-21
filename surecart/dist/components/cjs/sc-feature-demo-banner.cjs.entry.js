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
        return (index.h("div", { key: 'f31186768239c19cbaa177b4d1edaada77997edd', class: { 'sc-banner': true } }, index.h("p", { key: 'e3ef2099105a973cab6e160ec6c70cdf5274b623' }, index.h("slot", { key: 'f8d6659b8ad5104423bebcc46c0a5b58b0971732' }, wp.i18n.__('This is a feature demo. In order to use it, you must upgrade your plan.', 'surecart')), index.h("a", { key: '65ddd147c489bdf7ca279d707f62ff56aaaf33a0', href: this.url, target: "_blank" }, index.h("slot", { key: 'be953088ddc7da60acfaf8d3be03f3b1d8086675', name: "link" }, this.buttonText, " ", index.h("sc-icon", { key: '82ab8137aa51e28c460f63baac0df150732cf9f4', name: "arrow-right" }))))));
    }
};
ScFeatureDemoBanner.style = ScFeatureDemoBannerStyle0;

exports.sc_feature_demo_banner = ScFeatureDemoBanner;

//# sourceMappingURL=sc-feature-demo-banner.cjs.entry.js.map