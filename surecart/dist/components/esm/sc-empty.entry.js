import { r as registerInstance, h } from './index-745b6bec.js';

const scEmptyCss = ":host{display:block}.empty{display:flex;flex-direction:column;align-items:center;padding:var(--sc-spacing-large);text-align:center;gap:var(--sc-spacing-small);color:var(--sc-empty-color, var(--sc-color-gray-500))}.empty sc-icon{font-size:var(--sc-font-size-xx-large);color:var(--sc-empty-icon-color, var(--sc-color-gray-700))}";
const ScEmptyStyle0 = scEmptyCss;

const ScEmpty = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.icon = undefined;
    }
    render() {
        return (h("div", { key: '034e453f1d36c8d64ce058530f3be78aeb4f733e', part: "base", class: "empty" }, !!this.icon && h("sc-icon", { key: '8487d66a24550900bf4338b286039fd21bdfa955', exportparts: "base:icon", name: this.icon }), h("slot", { key: '4811490ba1456caa621b71c264d741b680c00bb3' })));
    }
};
ScEmpty.style = ScEmptyStyle0;

export { ScEmpty as sc_empty };

//# sourceMappingURL=sc-empty.entry.js.map