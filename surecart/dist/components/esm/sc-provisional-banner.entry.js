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
        return (h("div", { key: 'dc5712db914896db8c6443501f609c19eb1c5100', class: { 'sc-banner': true } }, h("p", { key: '58455ae2fba430c1e844c2e59a3812f2f626732a' }, this.expired
            ? wp.i18n.__('The setup window for your store has expired. Please contact support to complete your setup.', 'surecart')
            : wp.i18n.__('Complete your store setup to go live.', 'surecart'), !this.expired && (h("a", { key: 'df2b9d83fd962866a64daa59d16b32d975c6ff82', href: this.claimUrl, target: "_blank", rel: "noopener noreferrer" }, wp.i18n.__('Complete Setup', 'surecart'), " ", h("sc-icon", { key: 'cca98deb2a1366ca04d2f78a3cf16b4fd5398b8e', name: "arrow-right" }))))));
    }
};
ScProvisionalBanner.style = ScProvisionalBannerStyle0;

export { ScProvisionalBanner as sc_provisional_banner };

//# sourceMappingURL=sc-provisional-banner.entry.js.map