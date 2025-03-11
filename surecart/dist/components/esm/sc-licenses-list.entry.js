import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';
import { o as onFirstVisible } from './lazy-deb42890.js';
import { a as apiFetch } from './fetch-8ecbbe53.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './remove-query-args-938c53ea.js';

const scLicensesListCss = ":host{display:block}.license__name{font-weight:var(--sc-font-weight-semibold)}.license__details{display:grid;gap:0.25em;color:var(--sc-input-label-color)}";
const ScLicensesListStyle0 = scLicensesListCss;

const ScLicensesList = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.query = {
            page: 1,
            per_page: 10,
        };
        this.heading = wp.i18n.__('Licenses', 'surecart');
        this.isCustomer = undefined;
        this.allLink = undefined;
        this.licenses = [];
        this.copied = false;
        this.loading = false;
        this.error = '';
        this.pagination = {
            total: 0,
            total_pages: 0,
        };
    }
    /** Only fetch if visible */
    componentWillLoad() {
        onFirstVisible(this.el, () => {
            this.initialFetch();
        });
    }
    async initialFetch() {
        try {
            this.loading = true;
            await this.getLicenses();
        }
        catch (e) {
            console.error(e);
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    async getLicenses() {
        if (!this.isCustomer) {
            return;
        }
        const response = (await await apiFetch({
            path: addQueryArgs('surecart/v1/licenses', {
                expand: ['purchase', 'purchase.product', 'activations'],
                ...this.query,
            }),
            parse: false,
        }));
        this.pagination = {
            total: parseInt(response.headers.get('X-WP-Total')),
            total_pages: parseInt(response.headers.get('X-WP-TotalPages')),
        };
        this.licenses = (await response.json());
        return this.licenses;
    }
    renderStatus(status) {
        if (status === 'active') {
            return h("sc-tag", { type: "success" }, wp.i18n.__('Active', 'surecart'));
        }
        if (status === 'revoked') {
            return h("sc-tag", { type: "danger" }, wp.i18n.__('Revoked', 'surecart'));
        }
        if (status === 'inactive') {
            return h("sc-tag", { type: "info" }, wp.i18n.__('Not Activated', 'surecart'));
        }
        return h("sc-tag", { type: "info" }, status);
    }
    async copyKey(key) {
        try {
            await navigator.clipboard.writeText(key);
            this.copied = true;
            setTimeout(() => {
                this.copied = false;
            }, 2000);
        }
        catch (err) {
            console.error(err);
            alert(wp.i18n.__('Error copying to clipboard', 'surecart'));
        }
    }
    renderLoading() {
        return (h("sc-card", { "no-padding": true, style: { '--overflow': 'hidden' } }, h("sc-stacked-list", null, h("sc-stacked-list-row", { style: { '--columns': '2' }, "mobile-size": 0 }, h("div", { style: { padding: '0.5em' } }, h("sc-skeleton", { style: { width: '30%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '20%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '40%' } }))))));
    }
    renderEmpty() {
        return (h("div", null, h("sc-divider", { style: { '--spacing': '0' } }), h("slot", { name: "empty" }, h("sc-empty", { icon: "file-text" }, wp.i18n.__("You don't have any licenses.", 'surecart')))));
    }
    renderContent() {
        var _a, _b;
        if (this.loading) {
            return this.renderLoading();
        }
        if (((_a = this.licenses) === null || _a === void 0 ? void 0 : _a.length) === 0) {
            return this.renderEmpty();
        }
        return (h("sc-card", { "no-padding": true }, h("sc-stacked-list", null, (_b = this.licenses) === null || _b === void 0 ? void 0 : _b.map(({ id, purchase, status, activation_limit, activation_count }) => {
            var _a;
            return (h("sc-stacked-list-row", { key: id, href: addQueryArgs(window.location.href, {
                    action: 'show',
                    model: 'license',
                    id,
                }), "mobile-size": 0 }, h("div", { class: "license__details" }, h("div", { class: "license__name" }, (_a = purchase === null || purchase === void 0 ? void 0 : purchase.product) === null || _a === void 0 ? void 0 : _a.name), h("div", null, this.renderStatus(status), " ", wp.i18n.sprintf(wp.i18n.__('%1s of %2s Activations Used'), activation_count || 0, activation_limit || '∞'))), h("sc-icon", { name: "chevron-right", slot: "suffix" })));
        }))));
    }
    render() {
        var _a;
        return (h("sc-dashboard-module", { key: 'fc989681ab3152e9ec3dc7606cb1cf0bd9dd1444', class: "purchase", part: "base", error: this.error }, h("span", { key: 'a5b82af04312192c00355eac1ac9f09122a657dd', slot: "heading" }, h("slot", { key: 'f723eb7bd5ca0a862e15576fa4923ad12ab241bd', name: "heading" }, this.heading || wp.i18n.__('License Keys', 'surecart'))), !!this.allLink && !!((_a = this.licenses) === null || _a === void 0 ? void 0 : _a.length) && (h("sc-button", { key: 'f2c77bbc3b501ac0949cb55ac6ca4211e7392e3b', type: "link", href: this.allLink, slot: "end" }, wp.i18n.__('View all', 'surecart'), h("sc-icon", { key: 'fd935365e1bb1ee04dce5053614cc1d3fd4992b5', name: "chevron-right", slot: "suffix" }))), this.renderContent()));
    }
    get el() { return getElement(this); }
};
ScLicensesList.style = ScLicensesListStyle0;

export { ScLicensesList as sc_licenses_list };

//# sourceMappingURL=sc-licenses-list.entry.js.map