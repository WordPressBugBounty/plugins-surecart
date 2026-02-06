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
        return (h(Fragment, { key: '3643096fdec4c945ec250723e5ab9d42f694a022' }, h("nav", { key: '1fecc7111b1bca54dc9f4c42683c7e102d4fb497', part: "base", class: "breadcrumb", "aria-label": this.label }, h("slot", { key: '0ec4fb9f929c50316eba4ccf3f6920faa2fd7c05', onSlotchange: () => this.handleSlotChange() })), h("div", { key: '176cdf6a737ac058c4de2de0c548c5cd2b6d35a5', part: "separator", hidden: true, "aria-hidden": "true" }, h("slot", { key: '6bc1ddcafa647f22d0a6f9f836462fed5988c6fe', name: "separator" }, h("sc-icon", { key: '8540f5d4d5209c825dbe50522d4532b4880b28e5', name: "chevron-right" })))));
    }
    get el() { return getElement(this); }
};
ScBreadcrumbs.style = ScBreadcrumbsStyle0;

export { ScBreadcrumbs as sc_breadcrumbs };

//# sourceMappingURL=sc-breadcrumbs.entry.js.map