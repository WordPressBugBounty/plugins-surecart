import { r as registerInstance, h, F as Fragment, a as getElement } from './index-25e5af33.js';

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
        return (h(Fragment, { key: '3988dff6e084120c5adf7ba2e2d7ac4d9be2f0e0' }, h("nav", { key: '313d813efb5f7b96cfa8827745a8915baddb01ab', part: "base", class: "breadcrumb", "aria-label": this.label }, h("slot", { key: '01202298ef28d826a8fb9936c61572f85bc4b74a', onSlotchange: () => this.handleSlotChange() })), h("div", { key: '76fac461a75075d3c8e6c3ca049c5ab2996d6e0f', part: "separator", hidden: true, "aria-hidden": "true" }, h("slot", { key: '5e72dba0eb691501b5bab049048e46846b857926', name: "separator" }, h("sc-icon", { key: 'bfde84833e2aa5e5d88174a2b234fb40a71c4a37', name: "chevron-right" })))));
    }
    get el() { return getElement(this); }
};
ScBreadcrumbs.style = ScBreadcrumbsStyle0;

export { ScBreadcrumbs as sc_breadcrumbs };

//# sourceMappingURL=sc-breadcrumbs.entry.js.map