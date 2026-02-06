import { r as registerInstance, h, H as Host, a as getElement } from './index-745b6bec.js';

const scTabPanelCss = ":host{--padding:0;--spacing:var(--sc-spacing-large);display:block}::slotted(*~*){margin-top:var(--spacing)}.tab-panel{border:solid 1px transparent;padding:var(--padding);font-family:var(--sc-font-sans);font-size:var(--sc-font-size-medium)}";
const ScTabPanelStyle0 = scTabPanelCss;

let id = 0;
const ScTabPanel = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.componentId = `tab-panel-${++id}`;
        this.name = '';
        this.active = false;
    }
    render() {
        // If the user didn't provide an ID, we'll set one so we can link tabs and tab panels with aria labels
        this.el.id = this.el.id || this.componentId;
        return (h(Host, { key: '77f595c94aeccb520620cca6d2a82a8c19e84873', style: { display: this.active ? 'block' : 'none' } }, h("div", { key: '7b6a4885218213d917cfe29bb1da192ff447a085', part: "base", class: "tab-panel", role: "tabpanel", "aria-hidden": this.active ? 'false' : 'true' }, h("slot", { key: '9823b20f201f09ef7f0ce8a0f34c13d74fd4e2e5' }))));
    }
    get el() { return getElement(this); }
};
ScTabPanel.style = ScTabPanelStyle0;

export { ScTabPanel as sc_tab_panel };

//# sourceMappingURL=sc-tab-panel.entry.js.map