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
        return (h(Fragment, { key: 'd05e6e0591baf132a90960db57aaa1d9351e2aaf' }, h("nav", { key: 'fe0cb06cad5936570a96b7d46ea8394b16b71f7a', part: "base", class: "breadcrumb", "aria-label": this.label }, h("slot", { key: '9d7d1471f507e49c5a623b308e103d7dfd7bd253', onSlotchange: () => this.handleSlotChange() })), h("div", { key: 'f7f578f145827e8f84fb93a25f06dc0753e2f6a0', part: "separator", hidden: true, "aria-hidden": "true" }, h("slot", { key: '430aae0308d8c89fb05f909b48bd1bf9d8858c3b', name: "separator" }, h("sc-icon", { key: '0ec97a84a0409be1dd5c3eecd9b8acefb304e266', name: "chevron-right" })))));
    }
    get el() { return getElement(this); }
};
ScBreadcrumbs.style = ScBreadcrumbsStyle0;

export { ScBreadcrumbs as sc_breadcrumbs };

//# sourceMappingURL=sc-breadcrumbs.entry.js.map