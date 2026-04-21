import { r as registerInstance, h, F as Fragment, a as getElement } from './index-745b6bec.js';

const scBreadcrumbsCss = ":host{display:block}.breadcrumb{display:flex;align-items:center;flex-wrap:wrap}";
const ScBreadcrumbsStyle0 = scBreadcrumbsCss;

const ScBreadcrumbs = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.label = 'Breadcrumb';
    }
    // Generates a clone of the separator element to use for each breadcrumb item
    getSeparator() {
        const slotted = this.el.shadowRoot.querySelector('slot[name=separator]');
        const separator = slotted.assignedElements({ flatten: true })[0];
        // Clone it, remove ids, and slot it
        const clone = separator.cloneNode(true);
        [clone, ...clone.querySelectorAll('[id]')].forEach(el => el.removeAttribute('id'));
        clone.slot = 'separator';
        return clone;
    }
    handleSlotChange() {
        const slotted = this.el.shadowRoot.querySelector('.breadcrumb slot');
        const items = slotted.assignedElements().filter(node => {
            return node.nodeName === 'CE-BREADCRUMB';
        });
        items.forEach((item, index) => {
            // Append separators to each item if they don't already have one
            const separator = item.querySelector('[slot="separator"]');
            if (separator === null) {
                item.append(this.getSeparator());
            }
            // The last breadcrumb item is the "current page"
            if (index === items.length - 1) {
                item.setAttribute('aria-current', 'page');
            }
            else {
                item.removeAttribute('aria-current');
            }
        });
    }
    render() {
        return (h(Fragment, { key: 'efed488a3a1f00f843df51343dec5bdee12398fe' }, h("nav", { key: '54c3edca833b1b9f629a950b1868807acd36c583', part: "base", class: "breadcrumb", "aria-label": this.label }, h("slot", { key: '5bd5c9879c27cad98c57458923be5df1c825c05a', onSlotchange: () => this.handleSlotChange() })), h("div", { key: '3fcdf2ac4a9dde993118ffadbfe06a7390f59820', part: "separator", hidden: true, "aria-hidden": "true" }, h("slot", { key: '48f7a92d1a58d4c61de3ac3c21d51ce4c9653afa', name: "separator" }, h("sc-icon", { key: 'ef3e0fe72189e8bc6a06a81c5be9864b2945fc1d', name: "chevron-right" })))));
    }
    get el() { return getElement(this); }
};
ScBreadcrumbs.style = ScBreadcrumbsStyle0;

export { ScBreadcrumbs as sc_breadcrumbs };

//# sourceMappingURL=sc-breadcrumbs.entry.js.map