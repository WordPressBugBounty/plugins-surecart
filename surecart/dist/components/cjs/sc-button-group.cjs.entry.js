'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scButtonGroupCss = ":host{display:inline-block;--gap:var(--sc-spacing-small)}.button-group{display:flex;flex-wrap:wrap}.button-group--separate{gap:var(--gap)}";
const ScButtonGroupStyle0 = scButtonGroupCss;

const ScButtonGroup = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.label = undefined;
        this.separate = undefined;
    }
    findButton(el) {
        return ['sc-button'].includes(el.tagName.toLowerCase()) ? el : el.querySelector(['sc-button'].join(','));
    }
    handleFocus(event) {
        const button = this.findButton(event.target);
        button === null || button === void 0 ? void 0 : button.classList.add('sc-button-group__button--focus');
    }
    handleBlur(event) {
        const button = this.findButton(event.target);
        button === null || button === void 0 ? void 0 : button.classList.remove('sc-button-group__button--focus');
    }
    handleMouseOver(event) {
        const button = this.findButton(event.target);
        button === null || button === void 0 ? void 0 : button.classList.add('sc-button-group__button--hover');
    }
    handleMouseOut(event) {
        const button = this.findButton(event.target);
        button === null || button === void 0 ? void 0 : button.classList.remove('sc-button-group__button--hover');
    }
    handleSlotChange() {
        if (this.separate)
            return;
        const slottedElements = this.el.shadowRoot.querySelector('slot').assignedElements({ flatten: true });
        slottedElements.forEach((el) => {
            const slotted = this.el.shadowRoot.querySelector('slot');
            const index = slotted.assignedNodes().indexOf(el);
            const button = this.findButton(el);
            if (button !== null || !this.separate) {
                button.classList.add('sc-button-group__button');
                button.classList.toggle('sc-button-group__button--first', index === 0);
                button.classList.toggle('sc-button-group__button--inner', index > 0 && index < slottedElements.length - 1);
                button.classList.toggle('sc-button-group__button--last', index === slottedElements.length - 1);
            }
        });
    }
    render() {
        return (index.h("sc-form-control", { key: '9c83cc514623a0a4be25d7e4995171d3d7506870', part: "base", class: {
                'button-group': true,
                'button-group--separate': this.separate,
            }, role: "group", "aria-label": this.label, onFocusout: e => this.handleBlur(e), onFocusin: e => this.handleFocus(e), onMouseOver: e => this.handleMouseOver(e), onMouseOut: e => this.handleMouseOut(e), label: this.label }, index.h("slot", { key: '5ce62829439ac4447a8e4f08bfc37113f28d15af', onSlotchange: () => this.handleSlotChange() })));
    }
    get el() { return index.getElement(this); }
};
ScButtonGroup.style = ScButtonGroupStyle0;

exports.sc_button_group = ScButtonGroup;

//# sourceMappingURL=sc-button-group.cjs.entry.js.map