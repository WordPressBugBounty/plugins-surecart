'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scSpacingCss = ":host{display:block}::slotted(*:not(:last-child)){margin-bottom:var(--spacing)}";
const ScSpacingStyle0 = scSpacingCss;

const ScSpacing = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: '9478ffa08b32dc9dbdd8667bdecec2ff947d55dc' }, index.h("slot", { key: 'ac61dc23b39a33987db6584638017800525d8fec' })));
    }
};
ScSpacing.style = ScSpacingStyle0;

exports.sc_spacing = ScSpacing;

//# sourceMappingURL=sc-spacing.cjs.entry.js.map