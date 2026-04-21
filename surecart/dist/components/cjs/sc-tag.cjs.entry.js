'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scTagCss = ":host{display:inline-block;vertical-align:middle}.tag{display:flex;align-items:center;border:none;line-height:1;white-space:nowrap;user-select:none;cursor:pointer;text-decoration:none;font-weight:var(--sc-font-weight-bold)}.tag__prefix,.tag__suffix{vertical-align:middle;display:flex}.tag__suffix ::slotted(*){width:var(--sc-tag-suffix-width, 1.2em);height:var(--sc-tag-suffix-width, 1.2em);margin-left:var(--sc-tag-suffix-margin-left, 5px)}.tag__prefix ::slotted(*){width:var(--sc-tag-prefix-width, 1.2em);height:var(--sc-tag-prefix-width, 1.2em);margin-right:var(--sc-tag-prefix-margin-right, 5px)}.tag__clear::part(base){color:inherit;padding:0}.tag--primary{background-color:var(--sc-tag-primary-background-color, var(--sc-color-primary-500));border-color:var(--sc-tag-primary-border-color, var(--sc-color-primary-500));color:var(--sc-tag-primary-color, var(--sc-color-primary-text, var(--sc-color-white)))}.tag--success{background-color:var(--sc-tag-success-background-color, var(--sc-color-success-100));border-color:var(--sc-tag-success-border-color, var(--sc-color-success-200));color:var(--sc-tag-success-color, var(--sc-color-success-800))}.tag--info{background-color:var(--sc-color-info-100);border-color:var(--sc-color-info-200);color:var(--sc-color-info-700)}.tag--default{background-color:var(--sc-tag-default-background-color, var(--sc-color-gray-100));border-color:var(--sc-tag-default-border-color, var(--sc-color-gray-200));color:var(--sc-tag-default-color, var(--sc-color-gray-700))}.tag--warning{background-color:var(--sc-color-warning-100);border-color:var(--sc-color-warning-200);color:var(--sc-color-warning-700)}.tag--danger{background-color:var(--sc-color-danger-100);border-color:var(--sc-color-danger-200);color:var(--sc-color-danger-700)}.tag--small{font-size:var(--sc-button-font-size-small);height:calc(var(--sc-input-height-small) * 0.75);line-height:calc(var(--sc-input-height-small) - var(--sc-input-border-width) * 2);border-radius:var(--sc-input-border-radius-small);padding:0 var(--sc-spacing-x-small)}.tag--small .tag__clear{margin-left:var(--sc-spacing-xx-small);margin-right:calc(-1 * var(--sc-spacing-xxx-small))}.tag--medium{font-size:var(--sc-font-size-small);height:calc(var(--sc-input-height-medium) * 0.75);line-height:calc(var(--sc-input-height-medium) - var(--sc-input-border-width) * 2);border-radius:var(--sc-input-border-radius-medium);padding:0 var(--sc-spacing-small)}.tag--medium .tag__clear{margin-left:var(--sc-spacing-xx-small);margin-right:calc(-1 * var(--sc-spacing-xx-small))}.tag--large{font-size:var(--sc-button-font-size-large);height:calc(var(--sc-input-height-large) * 0.75);line-height:calc(var(--sc-input-height-large) - var(--sc-input-border-width) * 2);border-radius:var(--sc-input-border-radius-large);padding:0 var(--sc-spacing-medium)}.tag--large .tag__clear{margin-left:var(--sc-spacing-xx-small);margin-right:calc(-1 * var(--sc-spacing-x-small))}.tag--pill{border-radius:var(--sc-border-radius-pill)}";
const ScTagStyle0 = scTagCss;

const ScTag = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scClear = index.createEvent(this, "scClear", 7);
        this.type = 'default';
        this.size = 'medium';
        this.pill = false;
        this.clearable = false;
        this.ariaLabel = undefined;
    }
    handleClearClick() {
        this.scClear.emit(this);
    }
    render() {
        const Tag = this.clearable ? 'button' : 'span';
        return (index.h(Tag, { key: 'f8dd6924f8d7db87dc9ebdc15e23f6095f311626', part: "base", onClick: () => this.handleClearClick(), class: {
                'tag': true,
                // Types
                'tag--primary': this.type === 'primary',
                'tag--success': this.type === 'success',
                'tag--info': this.type === 'info',
                'tag--warning': this.type === 'warning',
                'tag--danger': this.type === 'danger',
                'tag--default': this.type === 'default',
                // Sizes
                'tag--small': this.size === 'small',
                'tag--medium': this.size === 'medium',
                'tag--large': this.size === 'large',
                // Modifers
                'tag--pill': this.pill,
                'tag--clearable': this.clearable,
            }, "aria-label": this.ariaLabel }, index.h("span", { key: 'fb725b324c57a6f51410b5d6c1a35d2533433cba', class: "tag__prefix", part: "prefix" }, index.h("slot", { key: '14127d973d4cfb83a798b2c31c7435f5c5eaced8', name: "prefix" })), index.h("span", { key: '715435af337fa1615a0fb0b51c57de1013020533', part: "content", class: "tag__content" }, index.h("slot", { key: '7956911def174643834f04f71af6feb6ebe3255b' })), !!this.clearable && (index.h("svg", { key: '39548436aa286139b16bb315d7b4102084024239', xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", class: "bi bi-x", viewBox: "0 0 16 16" }, index.h("path", { key: '208d1674ec8a3e3a501d000ab501c0d84c340279', d: "M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" }))), index.h("span", { key: '14fb8adb20a9e74491f8b845a0603ea7f8cecf42', class: "tag__suffix", part: "suffix" }, index.h("slot", { key: '0a5157697eac0d0a135b6b20c66502fd9a78a6e7', name: "suffix" }))));
    }
};
ScTag.style = ScTagStyle0;

exports.sc_tag = ScTag;

//# sourceMappingURL=sc-tag.cjs.entry.js.map