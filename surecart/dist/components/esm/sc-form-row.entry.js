import { r as registerInstance, h, a as getElement } from './index-25e5af33.js';

const scFormRowCss = ".form-row{display:flex;align-items:flex-start;justify-content:space-between;gap:calc(var(--sc-form-row-spacing, 0.75em) * 2.5)}::slotted(*){flex:1;width:0}";
const ScFormRowStyle0 = scFormRowCss;

const ScFormRow = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.width = undefined;
    }
    componentDidLoad() {
        if ('ResizeObserver' in window) {
            this.observer = new window.ResizeObserver(entries => {
                this.width = entries === null || entries === void 0 ? void 0 : entries[0].contentRect.width;
            });
            this.observer.observe(this.el);
        }
    }
    render() {
        return (h("div", { key: 'da0a94bd653f8da06ab49dc2f3f09b96adac9bdd', part: "base", class: {
                'form-row': true,
                'breakpoint-sm': this.width < 384,
                'breakpoint-md': this.width >= 384 && this.width < 576,
                'breakpoint-lg': this.width >= 576 && this.width < 768,
                'breakpoint-xl': this.width >= 768,
            } }, h("slot", { key: '0d8d31c77919c4f0c1b57f65d2072d2aa498fc95' })));
    }
    get el() { return getElement(this); }
};
ScFormRow.style = ScFormRowStyle0;

export { ScFormRow as sc_form_row };

//# sourceMappingURL=sc-form-row.entry.js.map