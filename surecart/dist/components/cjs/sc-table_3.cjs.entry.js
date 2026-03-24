'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scTableCss = ":host{display:table;width:100%;height:100%;border-spacing:0;border-collapse:collapse;table-layout:fixed;font-family:var(--sc-font-sans);border-radius:var(--border-radius, var(--sc-border-radius-small))}:host([shadowed]){box-shadow:var(--sc-shadow-medium)}::slotted([slot=head]){border-bottom:1px solid var(--sc-table-border-bottom-color, var(--sc-color-gray-200))}";
const ScTableStyle0 = scTableCss;

const ScTable = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: 'e135d36df3fabbd0ab2ab7777aa446c0d26127be' }, index.h("slot", { key: '0c6482ac05c8def5aa0a0a0aedbde9cad34e3503', name: "head" }), index.h("slot", { key: '23112d6290b14b2d47bd428792d66fea68be91fc' }), index.h("slot", { key: '1c9f6a9c073deefa84bcf0a9ee56238eb3c80bf0', name: "footer" })));
    }
};
ScTable.style = ScTableStyle0;

const scTableCellCss = ":host{display:table-cell;font-size:var(--sc-font-size-medium);padding:var(--sc-table-cell-spacing, var(--sc-spacing-small)) var(--sc-table-cell-spacing, var(--sc-spacing-large)) !important;vertical-align:var(--sc-table-cell-vertical-align, middle)}:host([slot=head]){background:var(--sc-table-cell-background-color, var(--sc-color-gray-50));font-size:var(--sc-font-size-small);padding:var(--sc-table-cell-spacing, var(--sc-spacing-small));color:var(--sc-color-gray-500)}:host(:last-child){text-align:right}sc-table-cell{display:table-cell;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}";
const ScTableCellStyle0 = scTableCellCss;

const ScTableScll = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: '189ee7360a3010270fe510d8db2aaaa57efeab13' }, index.h("slot", { key: 'b5230ef34b4c3f72c692d00c1d945dd131cdfc7f' })));
    }
};
ScTableScll.style = ScTableCellStyle0;

const scTableRowCss = ":host{display:table-row;border:1px solid var(--sc-table-row-border-bottom-color, var(--sc-color-gray-200))}:host([href]){cursor:pointer}:host([href]:hover){background:var(--sc-color-gray-50)}";
const ScTableRowStyle0 = scTableRowCss;

const ScTableRow = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.href = undefined;
    }
    render() {
        return (index.h(index.Host, { key: '3a366d6ce24a76378a282e2690ae88e05244ae20' }, index.h("slot", { key: 'a053808cfb5e478f2ffc65c69f26c63d22245a18' })));
    }
};
ScTableRow.style = ScTableRowStyle0;

exports.sc_table = ScTable;
exports.sc_table_cell = ScTableScll;
exports.sc_table_row = ScTableRow;

//# sourceMappingURL=sc-table_3.cjs.entry.js.map