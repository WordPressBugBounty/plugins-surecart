import { r as registerInstance, h } from './index-745b6bec.js';

const scProvisionalBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScProvisionalBannerStyle0 = scProvisionalBannerCss;

const ScProvisionalBanner = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.claimUrl = '';
        this.expired = false;
    }
    render() {
        return (h("div", { key: 'f6ccdfcaf7f55a9e3f25efc2507788f4747aea0b', class: { 'sc-banner': true } }, h("p", { key: 'af0c6314fd5d4ff18cb35d9f8131c372d843d96b' }, this.expired
            ? wp.i18n.__('The setup window for your store has expired. Please contact support to complete your setup.', 'surecart')
            : wp.i18n.__('Complete your store setup to go live.', 'surecart'), !this.expired && (h("a", { key: 'ce812dbcd3c349279dc52c8ed4981afa296e5f95', href: this.claimUrl, target: "_blank", rel: "noopener noreferrer" }, wp.i18n.__('Complete Setup', 'surecart'), " ", h("sc-icon", { key: '9af3c139b983eade168be8453a223160602d0136', name: "arrow-right" }))))));
    }
};
ScProvisionalBanner.style = ScProvisionalBannerStyle0;

export { ScProvisionalBanner as sc_provisional_banner };

//# sourceMappingURL=sc-provisional-banner.entry.js.map