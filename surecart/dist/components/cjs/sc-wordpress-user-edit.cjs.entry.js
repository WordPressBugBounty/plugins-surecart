'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const fetch = require('./fetch-d374a251.js');
require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scWordpressUserEditCss = ":host{display:block;position:relative}.customer-details{display:grid;gap:0.75em}";
const ScWordpressUserEditStyle0 = scWordpressUserEditCss;

const ScWordPressUserEdit = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.successUrl = undefined;
        this.user = undefined;
        this.loading = undefined;
        this.error = undefined;
    }
    renderEmpty() {
        return index.h("slot", { name: "empty" }, wp.i18n.__('User not found.', 'surecart'));
    }
    async handleSubmit(e) {
        this.loading = true;
        try {
            const { email, first_name, last_name, name } = await e.target.getFormJson();
            await fetch.apiFetch({
                path: `wp/v2/users/me`,
                method: 'PATCH',
                data: {
                    first_name,
                    last_name,
                    email,
                    name,
                },
            });
            if (this.successUrl) {
                window.location.assign(this.successUrl);
            }
            else {
                this.loading = false;
            }
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.loading = false;
        }
    }
    render() {
        var _a, _b, _c, _d;
        return (index.h("sc-dashboard-module", { key: 'd490fd8ab7de09cee05f4610d49be8025c74f33e', class: "account-details", error: this.error }, index.h("span", { key: '5d252785d917147df0ea0fc225afe8fb509cbc59', slot: "heading" }, this.heading || wp.i18n.__('Account Details', 'surecart'), " "), index.h("sc-card", { key: 'bb17ee83662dec88df90fa10b8bf26ba73aa4f44' }, index.h("sc-form", { key: '1ac00ec9a5040c72776ad7e55456435b1f65f600', onScFormSubmit: e => this.handleSubmit(e) }, index.h("sc-input", { key: 'f9af93c923a6c70b2019dabea135947bbd1fad2b', label: wp.i18n.__('Account Email', 'surecart'), name: "email", value: (_a = this.user) === null || _a === void 0 ? void 0 : _a.email, required: true }), index.h("sc-columns", { key: '390dec3c9fb6568d260a1430e99fd68e52c4a80a', style: { '--sc-column-spacing': 'var(--sc-spacing-medium)' } }, index.h("sc-column", { key: '26a6f183fa6073cac174a9f9a360c45606f5145a' }, index.h("sc-input", { key: '55321a259cff22401992e9ce4d607264440bf238', label: wp.i18n.__('First Name', 'surecart'), name: "first_name", value: (_b = this.user) === null || _b === void 0 ? void 0 : _b.first_name })), index.h("sc-column", { key: '689d93d893f2e13af7e4e48c54d85a70928945ff' }, index.h("sc-input", { key: '362b3eda327794eff0ccdbfa0bc6807e7015fc6f', label: wp.i18n.__('Last Name', 'surecart'), name: "last_name", value: (_c = this.user) === null || _c === void 0 ? void 0 : _c.last_name }))), index.h("sc-input", { key: 'a9c3c193935a5afc538077acd764728e45005ad0', label: wp.i18n.__('Display Name', 'surecart'), name: "name", value: (_d = this.user) === null || _d === void 0 ? void 0 : _d.display_name }), index.h("div", { key: '7cfee46308f805c77abfa0659c390ea2fbf84464' }, index.h("sc-button", { key: 'c7bd37352afe47f6f757b3fc44058c5d2273fa6d', type: "primary", full: true, submit: true }, wp.i18n.__('Save', 'surecart'))))), this.loading && index.h("sc-block-ui", { key: 'd4bda73d61cee587658b6cbee92793f405d7fd19', spinner: true })));
    }
};
ScWordPressUserEdit.style = ScWordpressUserEditStyle0;

exports.sc_wordpress_user_edit = ScWordPressUserEdit;

//# sourceMappingURL=sc-wordpress-user-edit.cjs.entry.js.map