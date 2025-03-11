'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scProvisionalBannerCss = ".sc-banner{background-color:var(--sc-color-brand-primary);color:white;display:flex;align-items:center;justify-content:center}.sc-banner>p{font-size:14px;line-height:1;margin:var(--sc-spacing-small)}.sc-banner>p a{color:inherit;font-weight:600;margin-left:10px;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border-bottom:1px solid;padding-bottom:2px}";
const ScProvisionalBannerStyle0 = scProvisionalBannerCss;

const ScProvisionalBanner = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.claimUrl = '';
    }
    render() {
        return (index.h("div", { key: '48303db6e6ba950bfb1261b30177fb31ff2e23b4', class: { 'sc-banner': true } }, index.h("p", { key: 'f3cc37256746dc3af088a125dcb1f5afb795dd51' }, wp.i18n.__('Complete your store setup to go live.', 'surecart'), index.h("a", { key: 'b247e58d52915bfebd03a9f15ae58553975047f2', href: this.claimUrl }, wp.i18n.__('Complete Setup', 'surecart'), " ", index.h("sc-icon", { key: '9906778ec5f82f38407cc34bd1e65279ce92c54d', name: "arrow-right" })))));
    }
};
ScProvisionalBanner.style = ScProvisionalBannerStyle0;

exports.sc_provisional_banner = ScProvisionalBanner;

//# sourceMappingURL=sc-provisional-banner.cjs.entry.js.map