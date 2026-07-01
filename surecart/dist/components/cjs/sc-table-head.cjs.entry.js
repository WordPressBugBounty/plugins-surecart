'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const scTableHeadCss = ":host{display:table-header-group}::slotted(*){display:table-row}";
const ScTableHeadStyle0 = scTableHeadCss;

const ScTable = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: 'bff72d98109033bbb0e2f69062cc98fb2a743398' }, index.h("slot", { key: 'eac0227d1ffce3c79571954ea3b00c0754dfd146' })));
    }
};
ScTable.style = ScTableHeadStyle0;

exports.sc_table_head = ScTable;

//# sourceMappingURL=sc-table-head.cjs.entry.js.map