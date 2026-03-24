import { r as registerInstance, h } from './index-745b6bec.js';

const scFeatureDemoBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScFeatureDemoBannerStyle0 = scFeatureDemoBannerCss;

const ScFeatureDemoBanner = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.url = 'https://app.surecart.com/plans';
        this.buttonText = wp.i18n.__('Upgrade Your Plan', 'surecart');
    }
    render() {
        return (h("div", { key: '0100edcabb3c70bad5f687a433f56c83723acffb', class: { 'sc-banner': true } }, h("p", { key: '81da9ad5d267ae65dd1ff38f81d285c91c43b8a9' }, h("slot", { key: '89c056ec8bf01fadc637ef8b0e87a24e84fc5502' }, wp.i18n.__('This is a feature demo. In order to use it, you must upgrade your plan.', 'surecart')), h("a", { key: 'ad5ecb534e226446b6bd46820cdaa41611057587', href: this.url, target: "_blank" }, h("slot", { key: 'dbd3223b60ec4d7c0d4baf0a63f921ed82d8c1b5', name: "link" }, this.buttonText, " ", h("sc-icon", { key: '4c63a4b49e931d75862bdc9c0397017bae7db3e6', name: "arrow-right" }))))));
    }
};
ScFeatureDemoBanner.style = ScFeatureDemoBannerStyle0;

export { ScFeatureDemoBanner as sc_feature_demo_banner };

//# sourceMappingURL=sc-feature-demo-banner.entry.js.map