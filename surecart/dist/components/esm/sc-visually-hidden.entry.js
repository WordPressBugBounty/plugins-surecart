import { r as registerInstance, h } from './index-745b6bec.js';

const scVisuallyHiddenCss = ":host(:not(:focus-within)){position:absolute !important;width:1px !important;height:1px !important;clip:rect(0 0 0 0) !important;clip-path:inset(50%) !important;border:none !important;overflow:hidden !important;white-space:nowrap !important;padding:0 !important}";
const ScVisuallyHiddenStyle0 = scVisuallyHiddenCss;

const ScVisuallyHidden = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return h("slot", { key: 'c936259b18d6a63ba5619be2858ea25e4edb0b50' });
    }
};
ScVisuallyHidden.style = ScVisuallyHiddenStyle0;

export { ScVisuallyHidden as sc_visually_hidden };

//# sourceMappingURL=sc-visually-hidden.entry.js.map