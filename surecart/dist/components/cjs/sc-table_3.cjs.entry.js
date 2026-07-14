'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const scTableCss = ":host{display:table;width:100%;height:100%;border-spacing:0;border-collapse:collapse;table-layout:fixed;font-family:var(--sc-font-sans);border-radius:var(--border-radius, var(--sc-border-radius-small))}:host([shadowed]){box-shadow:var(--sc-shadow-medium)}::slotted([slot=head]){border-bottom:1px solid var(--sc-table-border-bottom-color, var(--sc-color-gray-200))}";
const ScTableStyle0 = scTableCss;

const ScTable = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: '0febc662ade27fa118afe128050735958d338630' }, index.h("slot", { key: '9d90da2470d95468a11bf533461fa5f403af1fcb', name: "head" }), index.h("slot", { key: 'e8977c187110a77a7bba2d0ef9e38f291cd0a886' }), index.h("slot", { key: 'ff22909c927418fc251f5e5956cc66e6ededdcfc', name: "footer" })));
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
        return (index.h(index.Host, { key: '1e5bfbea526f330b1ae45b983765301eee4d5a4d' }, index.h("slot", { key: '37c94f735bebe7e75b189ea59a716f986da5ed5f' })));
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
        return (index.h(index.Host, { key: '42151c0e0641e1664d8d363738b3da795c12bd6a' }, index.h("slot", { key: 'bd7cdfa06e851fad163d5191f38cab2f7b9ff68d' })));
    }
};
ScTableRow.style = ScTableRowStyle0;

exports.sc_table = ScTable;
exports.sc_table_cell = ScTableScll;
exports.sc_table_row = ScTableRow;

//# sourceMappingURL=sc-table_3.cjs.entry.js.map