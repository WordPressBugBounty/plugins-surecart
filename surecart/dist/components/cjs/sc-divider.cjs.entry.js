'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scDividerCss = ":host{display:block;min-height:1px}.divider{position:relative;padding:var(--spacing) 0}.line__container{position:absolute;top:0;right:0;bottom:0;left:0;display:flex;align-items:center}.line{width:100%;border-top:1px solid var(--sc-divider-border-top-color, var(--sc-color-gray-200))}.text__container{position:relative;display:flex;justify-content:center;font-size:var(--sc-font-size-small)}.text{padding:0 var(--sc-spacing-small);background:var(--sc-divider-text-background-color, var(--sc-color-white));color:var(--sc-color-gray-500)}";
const ScDividerStyle0 = scDividerCss;

const ScDivider = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h("div", { key: '455b4063bf3c0651d22920713c57e48cd3baea7a', class: "divider", part: "base" }, index.h("div", { key: 'cca9befa0ae875032268e20aa34855ec17a23b15', class: "line__container", "aria-hidden": "true", part: "line-container" }, index.h("div", { key: 'a4aa49ad8fee33faa0f1ff333ecc8e24407c5df9', class: "line", part: "line" })), index.h("div", { key: '729213abf54388f9901d7bc42bd8c34fce1f2928', class: "text__container", part: "text-container" }, index.h("span", { key: 'e376ad1dcb57a270784c3c07147d042f34142a69', class: "text", part: "text" }, index.h("slot", { key: '3a195dbeefe99b2e10b9517621d4ebfad49e8629' })))));
    }
};
ScDivider.style = ScDividerStyle0;

exports.sc_divider = ScDivider;

//# sourceMappingURL=sc-divider.cjs.entry.js.map