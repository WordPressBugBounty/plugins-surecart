'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');

const scWordpressUserCss = ":host{display:block;position:relative}.customer-details{display:grid;gap:0.75em}";
const ScWordpressUserStyle0 = scWordpressUserCss;

const ScWordPressUser = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.user = undefined;
    }
    renderContent() {
        var _a, _b, _c, _d, _e, _f, _g, _h;
        if (!this.user) {
            return this.renderEmpty();
        }
        return (index.h(index.Fragment, null, !!((_a = this === null || this === void 0 ? void 0 : this.user) === null || _a === void 0 ? void 0 : _a.display_name) && (index.h("sc-stacked-list-row", { style: { '--columns': '3' }, mobileSize: 480 }, index.h("div", null, index.h("strong", null, wp.i18n.__('Display Name', 'surecart'))), index.h("div", null, (_b = this.user) === null || _b === void 0 ? void 0 : _b.display_name), index.h("div", null))), !!((_c = this === null || this === void 0 ? void 0 : this.user) === null || _c === void 0 ? void 0 : _c.email) && (index.h("sc-stacked-list-row", { style: { '--columns': '3' }, mobileSize: 480 }, index.h("div", null, index.h("strong", null, wp.i18n.__('Account Email', 'surecart'))), index.h("div", null, (_d = this.user) === null || _d === void 0 ? void 0 : _d.email), index.h("div", null))), !!((_e = this === null || this === void 0 ? void 0 : this.user) === null || _e === void 0 ? void 0 : _e.first_name) && (index.h("sc-stacked-list-row", { style: { '--columns': '3' }, mobileSize: 480 }, index.h("div", null, index.h("strong", null, wp.i18n.__('First Name', 'surecart'))), index.h("div", null, (_f = this.user) === null || _f === void 0 ? void 0 : _f.first_name), index.h("div", null))), !!((_g = this === null || this === void 0 ? void 0 : this.user) === null || _g === void 0 ? void 0 : _g.last_name) && (index.h("sc-stacked-list-row", { style: { '--columns': '3' }, mobileSize: 480 }, index.h("div", null, index.h("strong", null, wp.i18n.__('Last Name', 'surecart'))), index.h("div", null, (_h = this.user) === null || _h === void 0 ? void 0 : _h.last_name), index.h("div", null)))));
    }
    renderEmpty() {
        return index.h("slot", { name: "empty" }, wp.i18n.__('User not found.', 'surecart'));
    }
    render() {
        return (index.h("sc-dashboard-module", { key: '8161d42239a10426ad8c77b19c54bd5e3b7d6bc9', class: "customer-details" }, index.h("span", { key: 'b5d122f1fae2fbc7d4431b3720f7031560ecfef0', slot: "heading" }, this.heading || wp.i18n.__('Account Details', 'surecart'), " "), index.h("sc-button", { key: 'cf5b8a4e07da584fec3bf0cd3db6845ffcdd4b45', type: "link", href: addQueryArgs.addQueryArgs(window.location.href, {
                action: 'edit',
                model: 'user',
            }), slot: "end" }, index.h("sc-icon", { key: '571db7bf339bbd96d31c28bb407fd9f77b49bd03', name: "edit-3", slot: "prefix" }), wp.i18n.__('Update', 'surecart')), index.h("sc-card", { key: 'd765745a534078c35d26d8673b3c17e870e82342', "no-padding": true }, index.h("sc-stacked-list", { key: 'efe668eff9ca5af6406daa928d0b5b5381dfc2ba' }, this.renderContent()))));
    }
};
ScWordPressUser.style = ScWordpressUserStyle0;

exports.sc_wordpress_user = ScWordPressUser;

//# sourceMappingURL=sc-wordpress-user.cjs.entry.js.map