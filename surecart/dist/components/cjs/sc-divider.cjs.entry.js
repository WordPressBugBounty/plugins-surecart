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
        return (index.h("div", { key: 'b5e08e4c73ca700d81cb03c37a53e2d331d3b2a1', class: "divider", part: "base" }, index.h("div", { key: 'a8373987b8039ed035edddf9d29d47bd4bb5c547', class: "line__container", "aria-hidden": "true", part: "line-container" }, index.h("div", { key: 'eacef62b2cde1a1e27182e8eb2c058d792062ed9', class: "line", part: "line" })), index.h("div", { key: '193f37a7547a07509af52679c8f2b036a50a63fe', class: "text__container", part: "text-container" }, index.h("span", { key: '98cd2f3e522739b73e86fc0c30bac896421fb935', class: "text", part: "text" }, index.h("slot", { key: 'ba4b2c2d07be1afe8d7e790644507d6ff704ad6b' })))));
    }
};
ScDivider.style = ScDividerStyle0;

exports.sc_divider = ScDivider;

//# sourceMappingURL=sc-divider.cjs.entry.js.map