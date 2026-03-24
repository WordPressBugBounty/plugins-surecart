'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scTableHeadCss = ":host{display:table-header-group}::slotted(*){display:table-row}";
const ScTableHeadStyle0 = scTableHeadCss;

const ScTable = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: '917d5fe457f00947a8b946fe9fb7038e65b91323' }, index.h("slot", { key: '93a54b7e6bef51a1b39a4f05a69e63dd33f7eda0' })));
    }
};
ScTable.style = ScTableHeadStyle0;

exports.sc_table_head = ScTable;

//# sourceMappingURL=sc-table-head.cjs.entry.js.map