import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';

const scBreadcrumbCss = ":host{display:inline-flex}.breadcrumb-item{display:inline-flex;align-items:center;font-family:var(--sc-font-sans);font-size:var(--sc-font-size-small);font-weight:var(--sc-font-weight-semibold);color:var(--sc-breadcrumb-color, var(--sc-color-gray-600));line-height:var(--sc-line-height-normal);white-space:nowrap}.breadcrumb-item__label{display:inline-block;font-family:inherit;font-size:inherit;font-weight:inherit;line-height:inherit;text-decoration:none;color:inherit;background:none;border:none;border-radius:var(--sc-border-radius-medium);padding:0;margin:0;cursor:pointer;transition:color var(--sc-transition-fast) ease}:host(:not(:last-of-type)) .breadcrumb-item__label{color:var(--sc-breadcrumb-item-label-color, var(--sc-color-gray-900))}:host(:not(:last-of-type)) .breadcrumb-item__label:hover{color:var(--sc-breadcrumb-item-label-hover-color, var(--sc-color-primary-500))}:host(:not(:last-of-type)) .breadcrumb-item__label:active{color:var(--sc-breadcrumb-item-label-active-color, var(--sc-color-gray-900))}.breadcrumb-item__label:focus{box-shadow:var(--sc-focus-ring)}.breadcrumb-item__prefix,.breadcrumb-item__suffix{display:none;flex:0 0 auto;display:flex;align-items:center}.breadcrumb-item--has-prefix .breadcrumb-item__prefix{display:inline-flex;margin-right:var(--sc-spacing-x-small)}.breadcrumb-item--has-suffix .breadcrumb-item__suffix{display:inline-flex;margin-left:var(--sc-spacing-x-small)}:host(:last-of-type) .breadcrumb-item__separator{display:none}.breadcrumb-item__separator{display:inline-flex;align-items:center;margin:0 var(--sc-spacing-x-small);user-select:none}";
const ScBreadcrumbStyle0 = scBreadcrumbCss;

const ScBreadcrumb = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.href = undefined;
        this.target = undefined;
        this.rel = 'noreferrer noopener';
        this.hasPrefix = undefined;
        this.hasSuffix = undefined;
    }
    handleSlotChange() {
        this.hasPrefix = !!this.el.querySelector('[slot="prefix"]');
        this.hasSuffix = !!this.el.querySelector('[slot="suffix"]');
    }
    render() {
        const Tag = this.href ? 'a' : 'div';
        return (h("div", { key: '66825739da5358c619e025859d18198ac45698ca', part: "base", class: {
                'breadcrumb-item': true,
                'breadcrumb-item--has-prefix': this.hasPrefix,
                'breadcrumb-item--has-suffix': this.hasSuffix,
            } }, h("span", { key: '304c12c2b7717fc71de73cfdb4d2898c0b8048f6', part: "prefix", class: "breadcrumb-item__prefix" }, h("slot", { key: 'e659e6a691db6a0fbd010b8e2646bf6880ef92fc', name: "prefix" })), h(Tag, { key: '1d47827abe1bdad7da3360c41b91ad37f5dadebe', part: "label", class: "breadcrumb-item__label breadcrumb-item__label--link", href: this.href, target: this.target, rel: this.rel }, h("slot", { key: '25b0a35b0d086ed743c44e2819c9cf8caee9d10a' })), h("span", { key: '6d1565bb00485e87f83145eef4bcf211770e3170', part: "suffix", class: "breadcrumb-item__suffix" }, h("slot", { key: '980c9d854b1d98b9e8d29e808d66cd6c9c275e01', name: "suffix", onSlotchange: () => this.handleSlotChange() })), h("span", { key: '9810502d3285dba3def2fda6d30f5a5168be856c', part: "separator", class: "breadcrumb-item__separator", "aria-hidden": "true" }, h("slot", { key: '0dbf3a5aa5048fc83f3c136436ca4525a7a95394', name: "separator", onSlotchange: () => this.handleSlotChange() }, h("sc-icon", { key: '8be971ab5b81dbb29bfa6d2a755fd4367d6b5af2', name: "chevron-right" })))));
    }
    get el() { return getElement(this); }
};
ScBreadcrumb.style = ScBreadcrumbStyle0;

export { ScBreadcrumb as sc_breadcrumb };

//# sourceMappingURL=sc-breadcrumb.entry.js.map