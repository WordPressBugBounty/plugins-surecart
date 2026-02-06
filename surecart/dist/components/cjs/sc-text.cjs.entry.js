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
        return (index.h(CustomTag, { key: 'fea476d19041a336b6b0a7ff791b537123c58062', class: {
                'text': true,
                'is-truncated': this.truncate,
                'text--is-rtl': pageAlign.isRtl()
            } }, index.h("slot", { key: '50b4e4789d5a8799369eb7a2a4de196cdc109d33' })));
    }
};
ScText.style = ScTextStyle0;

exports.sc_text = ScText;

//# sourceMappingURL=sc-text.cjs.entry.js.map