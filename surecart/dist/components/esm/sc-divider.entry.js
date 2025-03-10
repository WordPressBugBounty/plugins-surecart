import { r as registerInstance, h } from './index-745b6bec.js';

const scDividerCss = ":host{display:block;min-height:1px}.divider{position:relative;padding:var(--spacing) 0}.line__container{position:absolute;top:0;right:0;bottom:0;left:0;display:flex;align-items:center}.line{width:100%;border-top:1px solid var(--sc-divider-border-top-color, var(--sc-color-gray-200))}.text__container{position:relative;display:flex;justify-content:center;font-size:var(--sc-font-size-small)}.text{padding:0 var(--sc-spacing-small);background:var(--sc-divider-text-background-color, var(--sc-color-white));color:var(--sc-color-gray-500)}";
const ScDividerStyle0 = scDividerCss;

const ScDivider = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return (h("div", { key: 'fba7ce61b21661065b87fa3a664bc6455d680564', class: "divider", part: "base" }, h("div", { key: 'eb59b8ae62e4e0e379bd02cbc34d805c572eb25d', class: "line__container", "aria-hidden": "true", part: "line-container" }, h("div", { key: '6fb46dd20e9aefd00f31ff53131ecbd0681bf9e6', class: "line", part: "line" })), h("div", { key: 'a28c76d40d9367b832a267c2ee90636d5561097e', class: "text__container", part: "text-container" }, h("span", { key: '7a9eab5746386130f9be84354cd73a80bfb8e61c', class: "text", part: "text" }, h("slot", { key: 'de9c40658e3cb0d8a44be738b2c0ffa5fa88dfb9' })))));
    }
};
ScDivider.style = ScDividerStyle0;

export { ScDivider as sc_divider };

//# sourceMappingURL=sc-divider.entry.js.map