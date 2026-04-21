import { r as registerInstance, h, H as Host } from './index-745b6bec.js';

const scTableCss = ":host{display:table;width:100%;height:100%;border-spacing:0;border-collapse:collapse;table-layout:fixed;font-family:var(--sc-font-sans);border-radius:var(--border-radius, var(--sc-border-radius-small))}:host([shadowed]){box-shadow:var(--sc-shadow-medium)}::slotted([slot=head]){border-bottom:1px solid var(--sc-table-border-bottom-color, var(--sc-color-gray-200))}";
const ScTableStyle0 = scTableCss;

const ScTable = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return (h(Host, { key: 'b2c3775e16dde10ec23b3c4d09c5db15974cab41' }, h("slot", { key: '79ccb7d6573e54bc9970fe9a3355262e5c56a17b', name: "head" }), h("slot", { key: 'f35c47af61c558fd10985a5d4a6257ebe85a85eb' }), h("slot", { key: '64f72dc736b444f39bedc49526999f97e3f86a0b', name: "footer" })));
    }
};
ScTable.style = ScTableStyle0;

const scTableCellCss = ":host{display:table-cell;font-size:var(--sc-font-size-medium);padding:var(--sc-table-cell-spacing, var(--sc-spacing-small)) var(--sc-table-cell-spacing, var(--sc-spacing-large)) !important;vertical-align:var(--sc-table-cell-vertical-align, middle)}:host([slot=head]){background:var(--sc-table-cell-background-color, var(--sc-color-gray-50));font-size:var(--sc-font-size-small);padding:var(--sc-table-cell-spacing, var(--sc-spacing-small));color:var(--sc-color-gray-500)}:host(:last-child){text-align:right}sc-table-cell{display:table-cell;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}";
const ScTableCellStyle0 = scTableCellCss;

const ScTableScll = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return (h(Host, { key: 'f997e610f42edd67ae31860c66548fab344db006' }, h("slot", { key: 'd0685315432e9976fac16c996ab5592099477fc5' })));
    }
};
ScTableScll.style = ScTableCellStyle0;

const scTableRowCss = ":host{display:table-row;border:1px solid var(--sc-table-row-border-bottom-color, var(--sc-color-gray-200))}:host([href]){cursor:pointer}:host([href]:hover){background:var(--sc-color-gray-50)}";
const ScTableRowStyle0 = scTableRowCss;

const ScTableRow = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.href = undefined;
    }
    render() {
        return (h(Host, { key: 'ea5ee83fa78bc3d6f76a0bc359a247878016b7b4' }, h("slot", { key: 'b256fb1dfcc3c850a85b244b1dc57866e2259789' })));
    }
};
ScTableRow.style = ScTableRowStyle0;

export { ScTable as sc_table, ScTableScll as sc_table_cell, ScTableRow as sc_table_row };

//# sourceMappingURL=sc-table_3.entry.js.map