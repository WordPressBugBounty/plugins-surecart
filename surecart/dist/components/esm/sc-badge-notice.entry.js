import { r as registerInstance, h } from './index-745b6bec.js';

const scBadgeNoticeCss = ":host{display:block}.notice{background:var(--sc-badge-notice-background-color, var(--sc-color-white));color:var(--sc-badge-notice-text-color, var(--sc-color-gray-950));border:solid 1px var(--sc-badge-notice-border-color, var(--sc-color-white));border-radius:var(--sc-border-radius-small);padding:var(--sc-spacing-small);font-size:var(--sc-font-size-x-small);display:flex;gap:0.5em;line-height:1}.notice--warning{background:var(--sc-color-warning-50);color:var(--sc-color-warning-700)}";
const ScBadgeNoticeStyle0 = scBadgeNoticeCss;

const ScBadgeNotice = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.type = 'primary';
        this.label = undefined;
        this.size = 'small';
    }
    render() {
        return (h("div", { key: '7859f6172596a5244def9099de7e033244caf6d4', class: {
                'notice': true,
                'notice--is-small': this.size === 'small',
                'notice--is-medium': this.size === 'medium',
                'notice--is-large': this.size === 'large',
                'notice--primary': this.type === 'primary',
                'notice--success': this.type === 'success',
                'notice--warning': this.type === 'warning',
                'notice--danger': this.type === 'danger',
                'notice--default': this.type === 'default',
            } }, h("sc-tag", { key: '5daa87dff7517ed6abb7c5d8d35997bba1b8d114', size: this.size, type: this.type }, this.label), h("slot", { key: 'c84acc5ec51afb35103ac69ed884251d1d16b241' })));
    }
};
ScBadgeNotice.style = ScBadgeNoticeStyle0;

export { ScBadgeNotice as sc_badge_notice };

//# sourceMappingURL=sc-badge-notice.entry.js.map