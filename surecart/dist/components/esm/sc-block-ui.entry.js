import { r as registerInstance, h } from './index-25e5af33.js';

const scBlockUiCss = ":host{display:block;position:var(--sc-block-ui-position, absolute);top:-5px;left:-5px;right:-5px;bottom:-5px;overflow:hidden;display:flex;align-items:center;justify-content:center}:host>*{z-index:1}:host:after{content:\"\";position:var(--sc-block-ui-position, absolute);top:0;left:0;right:0;bottom:0;cursor:var(--sc-block-ui-cursor, wait);background:var(--sc-block-ui-background-color, var(--sc-color-white));opacity:var(--sc-block-ui-opacity, 0.15)}:host.transparent:after{background:transparent}.overlay__content{font-size:var(--sc-font-size-large);font-weight:var(--sc-font-weight-semibold);display:grid;gap:0.5em;text-align:center}";
const ScBlockUiStyle0 = scBlockUiCss;

const ScBlockUi = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.zIndex = 1;
        this.transparent = undefined;
        this.spinner = undefined;
    }
    render() {
        return (h("div", { key: '6fe10f376c659216e350a934fe515316e7e64c8f', part: "base", class: { overlay: true, transparent: this.transparent }, style: { 'z-index': this.zIndex.toString() } }, h("div", { key: '6b1817a0aec720042940292035aea65b940833e5', class: "overlay__content", part: "content" }, h("slot", { key: 'b30a2a36957dabcbab80cbd09583972ae27dea6c', name: "spinner" }, !this.transparent && this.spinner && h("sc-spinner", { key: '67e191d3cf1525671930032b7ba8fb97ba8d81ea' })), h("slot", { key: 'c025c3112e07027cd358bf068f0fac6fd03c3fd0' }))));
    }
};
ScBlockUi.style = ScBlockUiStyle0;

export { ScBlockUi as sc_block_ui };

//# sourceMappingURL=sc-block-ui.entry.js.map