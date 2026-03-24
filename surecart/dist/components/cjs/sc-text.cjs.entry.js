'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const pageAlign = require('./page-align-5a2ab493.js');

const scTextCss = ":host{display:block;--font-size:var(--font-size, var(--sc-font-size-medium));--font-weight:var(--font-size, var(--sc-font-weight-normal));--line-height:var(--font-size, var(--sc-line-height-medium));--text-align:left;--color:var(--color, inherit)}.text{margin:0;font-size:var(--font-size);font-weight:var(--font-weight);line-height:var(--line-height);text-align:var(--text-align);color:var(--sc-stacked-list-row-text-color, var(--color))}.text.is-truncated{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.text--is-rtl .text{text-align:right}";
const ScTextStyle0 = scTextCss;

const ScText = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.tag = 'p';
        this.truncate = false;
    }
    render() {
        const CustomTag = this.tag;
        return (index.h(CustomTag, { key: 'cc3a0015dddb8eb54f6c724b5824e8a56b964f24', class: {
                'text': true,
                'is-truncated': this.truncate,
                'text--is-rtl': pageAlign.isRtl()
            } }, index.h("slot", { key: '19e4eb8e6f4fab3460539039013ffaa1f2e3da20' })));
    }
};
ScText.style = ScTextStyle0;

exports.sc_text = ScText;

//# sourceMappingURL=sc-text.cjs.entry.js.map