'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const scSpacingCss = ":host{display:block}::slotted(*:not(:last-child)){margin-bottom:var(--spacing)}";
const ScSpacingStyle0 = scSpacingCss;

const ScSpacing = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: 'ee94db04580a8878ac433026d366f023f7e20ec2' }, index.h("slot", { key: '534f7f8ab09a57651b09455c81ff459786f96199' })));
    }
};
ScSpacing.style = ScSpacingStyle0;

exports.sc_spacing = ScSpacing;

//# sourceMappingURL=sc-spacing.cjs.entry.js.map