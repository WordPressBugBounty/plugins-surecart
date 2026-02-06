'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scBlockUiCss = ":host{display:block;position:var(--sc-block-ui-position, absolute);top:-5px;left:-5px;right:-5px;bottom:-5px;overflow:hidden;display:flex;align-items:center;justify-content:center}:host>*{z-index:1}:host:after{content:\"\";position:var(--sc-block-ui-position, absolute);top:0;left:0;right:0;bottom:0;cursor:var(--sc-block-ui-cursor, wait);background:var(--sc-block-ui-background-color, var(--sc-color-white));opacity:var(--sc-block-ui-opacity, 0.15)}:host.transparent:after{background:transparent}.overlay__content{font-size:var(--sc-font-size-large);font-weight:var(--sc-font-weight-semibold);display:grid;gap:0.5em;text-align:center}";
const ScBlockUiStyle0 = scBlockUiCss;

const ScBlockUi = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.zIndex = 1;
        this.transparent = undefined;
        this.spinner = undefined;
    }
    render() {
        return (index.h("div", { key: 'e1d5eb9c283486e0cea9fdbab7cca644e938a90c', part: "base", class: { overlay: true, transparent: this.transparent }, style: { 'z-index': this.zIndex.toString() } }, index.h("div", { key: 'd19e1af909b2b7d6e1e53d9ea94b6cc52130ace6', class: "overlay__content", part: "content" }, index.h("slot", { key: '58e594d51cb599b7b5aa28e505b0154a85e1e4ec', name: "spinner" }, !this.transparent && this.spinner && index.h("sc-spinner", { key: '65e6b8b42563f1c804822e1eee069324cd31411e' })), index.h("slot", { key: '7d52d9ec8092106c9bcc5b02f662eb1fdde068f7' }))));
    }
};
ScBlockUi.style = ScBlockUiStyle0;

const scSpinnerCss = ":host{--track-color:#0d131e20;--indicator-color:var(--sc-color-primary-500);--stroke-width:2px;--spinner-size:1em;display:inline-block}.spinner{display:inline-block;width:var(--spinner-size);height:var(--spinner-size);border-radius:50%;border:solid var(--stroke-width) var(--track-color);border-top-color:var(--indicator-color);border-right-color:var(--indicator-color);animation:1s linear infinite spin}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}";
const ScSpinnerStyle0 = scSpinnerCss;

const ScSpinner = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return index.h("span", { key: 'db337063917d466b4b136437957b475bde71c517', part: "base", class: "spinner", "aria-busy": "true", "aria-live": "polite" });
    }
};
ScSpinner.style = ScSpinnerStyle0;

exports.sc_block_ui = ScBlockUi;
exports.sc_spinner = ScSpinner;

//# sourceMappingURL=sc-block-ui_2.cjs.entry.js.map