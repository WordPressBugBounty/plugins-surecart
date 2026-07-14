'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const formData = require('./form-data-0da9940f.js');

const scSwitchCss = ":host{--height:var(--sc-toggle-size);--thumb-size:calc(var(--sc-toggle-size) - 2px);--width:calc(var(--height) * 2);display:block}.switch{display:inline-flex;align-items:flex-start;gap:0.7em;font-family:var(--sc-input-font-family);font-size:var(--sc-input-font-size-medium);font-weight:var(--sc-input-font-weight);color:var(--sc-input-color);vertical-align:middle;cursor:pointer}.switch--reversed{flex-direction:row-reverse}.switch--editing{cursor:initial}.switch__control{flex:0 0 auto;position:relative;display:inline-flex;align-items:center;justify-content:center;width:var(--width);height:var(--height);background-color:var(--sc-switch-control-background-color, var(--sc-color-gray-300));border:solid var(--sc-input-border-width) var(--sc-switch-border-color, var(--sc-color-gray-300));border-radius:var(--height);transition:var(--sc-input-transition, var(--sc-transition-medium)) border-color, var(--sc-input-transition, var(--sc-transition-medium)) background-color}.switch__control .switch__thumb{width:var(--thumb-size);height:var(--thumb-size);background-color:var(--sc-switch-thumb-background-color, var(--sc-color-white));border-radius:50%;border:solid var(--sc-input-border-width) var(--sc-input-border-color);transform:translateX(calc(var(--width) / -2 + var(--thumb-size) / 2 - (var(--thumb-size) - var(--height)) / 2));transition:var(--sc-input-transition, var(--sc-transition-medium)) transform ease, var(--sc-input-transition, var(--sc-transition-medium)) background-color, var(--sc-input-transition, var(--sc-transition-medium)) border-color, var(--sc-input-transition, var(--sc-transition-medium)) box-shadow}.switch__control input[type=checkbox]{position:absolute;opacity:0;padding:0;margin:0;pointer-events:none}.switch__control:has(:focus-visible){outline:2px solid var(--sc-focus-ring-color-primary);outline-offset:2px}.switch:not(.switch--checked):not(.switch--disabled) .switch__control:hover{background-color:var(--sc-switch-control-hover-background-color, var(--sc-color-gray-200));border-color:var(--sc-switch-control-hover-border-color, var(--sc-color-gray-200))}.switch:not(.switch--checked):not(.switch--disabled) .switch__control:hover .switch__thumb{background-color:var(--sc-switch-background-thumb-hover-color, var(--sc-color-white));border-color:var(--sc-switch-thumb-border-color, var(--sc-input-border-color))}.switch.switch--focused:not(.switch--checked):not(.switch--disabled) .switch__control{background-color:var(--sc-switch-control-hover-background-color, var(--sc-color-gray-200));border-color:var(--sc-switch-control-hover-border-color, var(--sc-color-gray-200))}.switch.switch--focused:not(.switch--checked):not(.switch--disabled) .switch__control .switch__thumb{background-color:var(--sc-color-white);border-color:var(--sc-color-gray-300);box-shadow:0 0 0 1px var(--sc-color-gray-300)}.switch--checked .switch__control{background-color:var(--sc-switch-checked-control-background-color, var(--sc-color-primary-500));border-color:var(--sc-switch-checked-control-border-color, var(--sc-color-primary-500))}.switch--checked .switch__control .switch__thumb{background-color:var(--sc-color-white);border-color:var(--sc-color-primary-500);transform:translateX(calc(var(--width) / 2 - var(--thumb-size) / 2 + (var(--thumb-size) - var(--height)) / 2))}.switch.switch--checked:not(.switch--disabled) .switch__control:hover{opacity:0.8}.switch.switch--checked:not(.switch--disabled) .switch__control:hover .switch__thumb{background-color:var(--sc-color-white);border-color:var(--sc-color-primary-500)}.switch.switch--checked:not(.switch--disabled).switch--focused .switch__control .switch__thumb{background-color:var(--sc-color-white);border-color:var(--sc-color-primary-500);box-shadow:0 0 0 1px var(--sc-focus-ring-color-primary)}.switch--disabled{opacity:0.5;cursor:not-allowed}.switch__label{user-select:none;line-height:var(--height)}.switch--is-required .switch__title:after{content:\" *\";color:var(--sc-color-danger-500)}.switch__title{color:var(--sc-swith-label-color, var(--sc-input-label-color));font-weight:var(--sc-input-label-font-weight);font-size:var(--sc-input-label-font-size-medium)}.switch__description{display:none;color:var(--sc-switch-description-color, var(--sc-color-gray-500));line-height:var(--sc-line-height-dense);margin:0.5em 0 0;font-size:var(--sc-font-size-small)}.switch--has-description .switch__description{display:block}slot[name=description]::slotted(*){margin:0.75em 0;line-height:var(--sc-line-height-dense);vertical-align:center}";
const ScSwitchStyle0 = scSwitchCss;

let id = 0;
const ScSwitch = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scBlur = index.createEvent(this, "scBlur", 7);
        this.scChange = index.createEvent(this, "scChange", 7);
        this.scFocus = index.createEvent(this, "scFocus", 7);
        this.switchId = `switch-${++id}`;
        this.labelId = `switch-label-${id}`;
        this.hasDescription = undefined;
        this.hasFocus = false;
        this.name = undefined;
        this.value = undefined;
        this.disabled = false;
        this.required = false;
        this.checked = false;
        this.invalid = false;
        this.reversed = undefined;
        this.edit = false;
    }
    /** Checks for validity and shows the browser's validation message if the control is invalid. */
    async reportValidity() {
        this.invalid = !this.input.checkValidity();
        return this.input.reportValidity();
    }
    handleClick() {
        this.checked = !this.checked;
        this.scChange.emit();
    }
    handleBlur() {
        this.hasFocus = false;
        this.scBlur.emit();
    }
    handleFocus() {
        this.hasFocus = true;
        this.scFocus.emit();
    }
    handleKeyDown(event) {
        if (this.edit)
            return true;
        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            this.checked = false;
            this.scChange.emit();
        }
        if (event.key === 'ArrowRight') {
            event.preventDefault();
            this.checked = true;
            this.scChange.emit();
        }
        if (event.key === ' ' || event.key === 'Enter') {
            event.preventDefault();
            this.handleClick();
        }
    }
    handleMouseDown(event) {
        if (this.edit)
            return true;
        // Prevent clicks on the label from briefly blurring the input
        event.preventDefault();
        this.input.focus();
    }
    handleCheckedChange() {
        if (this.input) {
            this.input.checked = this.checked;
            this.invalid = !this.input.checkValidity();
        }
    }
    componentWillLoad() {
        this.hasDescription = !!this.el.querySelector('[slot="description"]');
    }
    componentDidLoad() {
        this.formController = new formData.FormSubmitController(this.el, {
            value: (control) => (control.checked ? control.value : undefined),
        }).addFormData();
    }
    disconnectedCallback() {
        var _a;
        (_a = this.formController) === null || _a === void 0 ? void 0 : _a.removeFormData();
    }
    render() {
        const Tag = this.edit ? 'div' : 'label';
        return (index.h(Tag, { key: '0bc6d723a48f9e30d893db6d4757ac923765dad2', part: "base", htmlFor: this.switchId, class: {
                'switch': true,
                'switch--is-required': this.required,
                'switch--checked': this.checked,
                'switch--disabled': this.disabled,
                'switch--focused': this.hasFocus,
                'switch--reversed': this.reversed,
                'switch--editing': this.edit,
                'switch--has-description': this.hasDescription,
            }, onMouseDown: e => this.handleMouseDown(e) }, index.h("span", { key: '6617a7ac3ebb070af6a80c9a1702230db4c69bf3', part: "control", class: "switch__control" }, index.h("span", { key: '9920a4a7bc48af537ffe3679fc7ab3def0e79565', part: "thumb", class: "switch__thumb" }), index.h("input", { key: '30014d20c33caf2ee8f25d88dd3c2c1d113c9aae', ref: el => (this.input = el), id: this.switchId, type: "checkbox", role: "switch", name: this.name, value: this.value || 'on', checked: this.checked, disabled: this.disabled, required: this.required, "aria-checked": this.checked ? 'true' : 'false', "aria-labelledby": this.labelId, onClick: () => this.handleClick(), onBlur: () => this.handleBlur(), onFocus: () => this.handleFocus(), onKeyDown: e => this.handleKeyDown(e) })), index.h("span", { key: '80acb6b2f11dff62e8558513e48952d4c40570de', class: "switch__label", part: "label" }, index.h("span", { key: '81a62563cc2fb88dccb60298e15ccd25f5437c42', part: "title", id: this.labelId, class: "switch__title" }, index.h("slot", { key: '46312332dbaf3a82aa3167ff1675185341ea515a' })), index.h("span", { key: 'f3743f3874c5cd0e9706cc1ff2bde41e23007798', class: "switch__description", part: "description" }, index.h("slot", { key: 'eb7b70318555a3235b6a76cb9958d0d0d393f71a', name: "description" })))));
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "checked": ["handleCheckedChange"]
    }; }
};
ScSwitch.style = ScSwitchStyle0;

exports.sc_switch = ScSwitch;

//# sourceMappingURL=sc-switch.cjs.entry.js.map