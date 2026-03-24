'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const pageAlign = require('./page-align-5a2ab493.js');

const scTabCss = ":host{display:block}.tab{font-family:var(--sc-font-sans);color:var(--sc-color-gray-600);display:flex;align-items:center;justify-content:flex-start;line-height:1;padding:var(--sc-spacing-small) var(--sc-spacing-small);font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-semibold);border-radius:var(--sc-border-radius-small);cursor:pointer;transition:color 0.35s ease, background-color 0.35s ease;user-select:none;text-decoration:none}.tab.tab--active,.tab:hover{color:var(--sc-tab-active-color, var(--sc-color-gray-900));background-color:var(--sc-tab-active-background, var(--sc-color-gray-100))}.tab.tab--disabled{cursor:not-allowed;color:var(--sc-color-gray-400)}.tab__content{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;line-height:var(--sc-line-height-dense)}.tab__prefix,.tab__suffix{flex:0 0 auto;display:flex;align-items:center}.tab__suffix{margin-left:auto}.tab__counter{background:var(--sc-color-gray-200);display:inline-block;padding:var(--sc-spacing-xx-small) var(--sc-spacing-small);border-radius:var(--sc-border-radius-pill);font-size:var(--sc-font-size-small);text-align:center;line-height:1;transition:color 0.35s ease, background-color 0.35s ease}.tab.tab--active .tab__counter,.tab:hover .tab__counter{background:var(--sc-color-white)}.tab--has-prefix{padding-left:var(--sc-spacing-small)}.tab--has-prefix .tab__content{padding-left:var(--sc-spacing-small)}.tab--has-suffix{padding-right:var(--sc-spacing-small)}.tab--has-suffix .tab__label{padding-right:var(--sc-spacing-small)}.tab--is-rtl.tab--has-prefix .tab__content{padding-left:0;padding-right:var(--sc-spacing-small)}";
const ScTabStyle0 = scTabCss;

let id = 0;
const ScTab = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scClose = index.createEvent(this, "scClose", 7);
        this.componentId = `tab-${++id}`;
        this.panel = '';
        this.href = undefined;
        this.active = false;
        this.disabled = false;
        this.count = undefined;
        this.hasPrefix = false;
        this.hasSuffix = false;
    }
    /** Sets focus to the tab. */
    async triggerFocus(options) {
        this.tab.focus(options);
    }
    /** Removes focus from the tab. */
    async triggerBlur() {
        this.tab.blur();
    }
    handleSlotChange() {
        this.hasPrefix = !!this.el.querySelector('[slot="prefix"]');
        this.hasSuffix = !!this.el.querySelector('[slot="suffix"]');
    }
    render() {
        // If the user didn't provide an ID, we'll set one so we can link tabs and tab panels with aria labels
        this.el.id = this.el.id || this.componentId;
        const Tag = this.href ? 'a' : 'div';
        return (index.h(Tag, { key: '4745e4bb5033eca682ef701ac4af8dbdd45faadc', part: `base ${this.active ? `active` : ``}`, href: this.href, class: {
                'tab': true,
                'tab--active': this.active,
                'tab--disabled': this.disabled,
                'tab--has-prefix': this.hasPrefix,
                'tab--has-suffix': this.hasSuffix,
                'tab--is-rtl': pageAlign.isRtl(),
            }, ref: el => (this.tab = el), role: "tab", "aria-disabled": this.disabled ? 'true' : 'false', "aria-selected": this.active ? 'true' : 'false', tabindex: this.disabled ? '-1' : '0' }, index.h("span", { key: '067c3683e10ac2a3e7e14cbc18f711c841c1064c', part: "prefix", class: "tab__prefix" }, index.h("slot", { key: '2df3aa3e7976d92c8cf2143d4027cde76ea1354a', onSlotchange: () => this.handleSlotChange(), name: "prefix" })), index.h("div", { key: 'dbc3e0d39a52dabc870628e5c47709bf3e076814', class: "tab__content", part: "content" }, index.h("slot", { key: 'd88ae7a27547a35df3e3da3cb4d0ad514f3d88c2' })), index.h("span", { key: 'a44f59707b81b018279d7451835636e2d3938aaa', part: "suffix", class: "tab__suffix" }, index.h("slot", { key: 'a09cbe90a13403c6c4c366988bc1672f9a42d23f', onSlotchange: () => this.handleSlotChange(), name: "suffix" })), index.h("slot", { key: '6ab17577589590037f96685248a9412298a598d0', name: "suffix" }, !!this.count && (index.h("div", { key: 'ff70db95fefdc6fcf2bbf4becbfba24c5726c571', class: "tab__counter", part: "counter" }, this.count)))));
    }
    get el() { return index.getElement(this); }
};
ScTab.style = ScTabStyle0;

exports.sc_tab = ScTab;

//# sourceMappingURL=sc-tab.cjs.entry.js.map