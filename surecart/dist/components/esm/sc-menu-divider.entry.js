import { r as registerInstance, h } from './index-25e5af33.js';

const scMenuDividerCss = ":host{display:block}.menu-divider{border-top:solid 1px var(--sc-panel-border-color);margin:var(--sc-spacing-x-small) 0}";
const ScMenuDividerStyle0 = scMenuDividerCss;

const ScMenuDivider = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return h("div", { key: '831a405fb0e350a8fd6f24c8473e0513861ecba8', part: "base", class: "menu-divider", role: "separator", "aria-hidden": "true" });
    }
};
ScMenuDivider.style = ScMenuDividerStyle0;

export { ScMenuDivider as sc_menu_divider };

//# sourceMappingURL=sc-menu-divider.entry.js.map