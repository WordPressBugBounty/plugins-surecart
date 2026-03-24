'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scProvisionalBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScProvisionalBannerStyle0 = scProvisionalBannerCss;

const ScProvisionalBanner = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.claimUrl = '';
        this.expired = false;
    }
    render() {
        return (index.h("div", { key: '6b3ed360d91432ba58501af0f0fbcd621a4765d5', class: { 'sc-banner': true } }, index.h("p", { key: '93808bb6fa2b8f5a76724fb613fa8789b608469d' }, this.expired
            ? wp.i18n.__('The setup window for your store has expired. Please contact support to complete your setup.', 'surecart')
            : wp.i18n.__('Complete your store setup to go live.', 'surecart'), !this.expired && (index.h("a", { key: '6b1081384afc2e48f16d4c55102b66645968ffee', href: this.claimUrl, target: "_blank", rel: "noopener noreferrer" }, wp.i18n.__('Complete Setup', 'surecart'), " ", index.h("sc-icon", { key: '9467c5d82c0947f74d36faa8fe57d184cef06bd7', name: "arrow-right" }))))));
    }
};
ScProvisionalBanner.style = ScProvisionalBannerStyle0;

exports.sc_provisional_banner = ScProvisionalBanner;

//# sourceMappingURL=sc-provisional-banner.cjs.entry.js.map