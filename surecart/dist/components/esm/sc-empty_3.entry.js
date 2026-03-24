import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';
import { i as isRtl } from './page-align-0cdacf32.js';

const scEmptyCss = ":host{display:block}.empty{display:flex;flex-direction:column;align-items:center;padding:var(--sc-spacing-large);text-align:center;gap:var(--sc-spacing-small);color:var(--sc-empty-color, var(--sc-color-gray-500))}.empty sc-icon{font-size:var(--sc-font-size-xx-large);color:var(--sc-empty-icon-color, var(--sc-color-gray-700))}";
const ScEmptyStyle0 = scEmptyCss;

const ScEmpty = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.icon = undefined;
    }
    render() {
        return (h("div", { key: '4ca98434c5baf6a956e84cf13f13ccbafcb85760', part: "base", class: "empty" }, !!this.icon && h("sc-icon", { key: '1bb7c3f04decc08f71a457165a18123f66c51d7b', exportparts: "base:icon", name: this.icon }), h("slot", { key: '52a8e5a96aa7445e4d81fcdc360c6b7ba9669a1a' })));
    }
};
ScEmpty.style = ScEmptyStyle0;

const scStackedListCss = ":host{display:block;font-family:var(--sc-font-sans)}:slotted(*){margin:0}";
const ScStackedListStyle0 = scStackedListCss;

const ScStackedList = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return h("slot", { key: '5b8b2ea24fef5c32b51c35bc5e78b81e1ce574c2' });
    }
};
ScStackedList.style = ScStackedListStyle0;

const scStackedListRowCss = ":host{display:block;--column-width-min:125px;position:relative}:host(:not(:last-child)){border-bottom:1px solid var(--sc-stacked-list-border-color, var(--sc-color-gray-200))}:host(:focus-within){z-index:2}.list-row{background:var(--sc-list-row-background-color, var(--sc-color-white));color:var(--sc-list-row-color, var(--sc-color-gray-800));text-decoration:none;display:grid;justify-content:var(--sc-stacked-list-row-justify-content, space-between);align-items:var(--sc-stacked-list-row-align-items, start);grid-template-columns:repeat(auto-fit, minmax(100%, 1fr));gap:var(--sc-spacing-xx-small);padding:var(--sc-spacing-medium) var(--sc-spacing-large);transition:background-color var(--sc-transition-fast) ease;border-radius:var(--sc-stacked-list-row-border-radius, var(--sc-input-border-radius-medium));min-width:0px;min-height:0px}.list-row[href]:hover{background:var(--sc-stacked-list-row-hover-color, var(--sc-color-gray-50))}.list-row__prefix,.list-row__suffix{position:absolute;top:50%;transform:translateY(-50%);z-index:1}.list-row__prefix{left:var(--sc-spacing-large)}.list-row__suffix{right:var(--sc-spacing-large)}.list-row--has-prefix{padding-left:3.5em}.list-row--has-suffix{padding-right:3.5em;gap:var(--sc-spacing-xxxx-large)}.list-row.breakpoint-lg{grid-template-columns:repeat(calc(var(--columns) - 1), 1fr) 1fr;gap:var(--sc-spacing-large)}.list-row.breakpoint-lg ::slotted(:last-child:not(:first-child)){display:flex;justify-content:flex-end}.list-row--is-rtl.list-row__prefix,.list-row--is-rtl.list-row__suffix{left:20px;width:20px;transform:rotate(180deg)}.list-row--is-rtl.list-row__suffix{right:auto}.list-row--is-rtl.list-row--has-suffix{gap:var(--sc-spacing-large)}";
const ScStackedListRowStyle0 = scStackedListRowCss;

const ScStackedListRow = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.href = undefined;
        this.target = '_self';
        this.mobileSize = 600;
        this.width = undefined;
        this.hasPrefix = false;
        this.hasSuffix = false;
    }
    componentDidLoad() {
        // Only run if ResizeObserver is supported.
        if ('ResizeObserver' in window) {
            var ro = new window.ResizeObserver(entries => {
                entries.forEach(entry => {
                    this.width = entry.contentRect.width;
                });
            });
            ro.observe(this.el);
        }
    }
    handleSlotChange() {
        this.hasPrefix = !!Array.from(this.el.children).some(child => child.slot === 'prefix');
        this.hasSuffix = !!Array.from(this.el.children).some(child => child.slot === 'suffix');
    }
    render() {
        const Tag = this.href ? 'a' : 'div';
        return (h(Tag, { key: '8c9c116e0f0ea929bad1080bf2a5d4e663d947e8', href: this.href, target: this.target, part: "base", class: {
                'list-row': true,
                'list-row--has-prefix': this.hasPrefix,
                'list-row--has-suffix': this.hasSuffix,
                'breakpoint-lg': this.width >= this.mobileSize,
                'list-row--is-rtl': isRtl()
            } }, h("span", { key: 'c16c3bac56ff8164d85aa231564803467ed87c07', class: "list-row__prefix" }, h("slot", { key: '78babb939b03d45adadb4bb202935ac1f41f0e82', name: "prefix", onSlotchange: () => this.handleSlotChange() })), h("slot", { key: '9e1531a4bb8b5359ce6619df163a643e455e59e3', onSlotchange: () => this.handleSlotChange() }), h("span", { key: '9368fc7b2dabad0a04fc61c6538bb49f6b142344', class: "list-row__suffix" }, h("slot", { key: '11ea3e46fe3cb4192cf4a0ef2fab43c030df9fb2', name: "suffix", onSlotchange: () => this.handleSlotChange() }))));
    }
    get el() { return getElement(this); }
};
ScStackedListRow.style = ScStackedListRowStyle0;

export { ScEmpty as sc_empty, ScStackedList as sc_stacked_list, ScStackedListRow as sc_stacked_list_row };

//# sourceMappingURL=sc-empty_3.entry.js.map