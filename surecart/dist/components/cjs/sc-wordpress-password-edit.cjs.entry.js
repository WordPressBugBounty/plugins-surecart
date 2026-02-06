'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const fetch = require('./fetch-d374a251.js');
require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scWordpressPasswordEditCss = ":host{display:block;position:relative}";
const ScWordpressPasswordEditStyle0 = scWordpressPasswordEditCss;

const ScWordPressPasswordEdit = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.successUrl = undefined;
        this.user = undefined;
        this.loading = undefined;
        this.error = undefined;
        this.enableValidation = true;
    }
    renderEmpty() {
        return index.h("slot", { name: "empty" }, wp.i18n.__('User not found.', 'surecart'));
    }
    validatePassword(password) {
        const regex = new RegExp('^(?=.*?[#?!@$%^&*-]).{6,}$');
        if (regex.test(password))
            return true;
        return false;
    }
    async handleSubmit(e) {
        this.loading = true;
        this.error = '';
        try {
            const { password } = await e.target.getFormJson();
            await fetch.apiFetch({
                path: `wp/v2/users/me`,
                method: 'PATCH',
                data: {
                    password,
                    meta: {
                        default_password_nag: false,
                    },
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
        return (index.h("sc-dashboard-module", { key: '86bd38dff33fdf158717ed5b82e902e39a0c91e3', class: "customer-details", error: this.error }, index.h("span", { key: '314d4796a60ee2a836e84e7331c882981bbaa9ac', slot: "heading" }, this.heading || wp.i18n.__('Update Password', 'surecart'), " "), index.h("slot", { key: '60a1b840112fdefc6ffd31d7137b17cf53690590', name: "end", slot: "end" }), index.h("sc-card", { key: '5838fc46f9d6c9f0fbadaace7daef75ca6271ea1' }, index.h("sc-form", { key: '921b186b07c093217ed7c838cb02763957d8e677', onScFormSubmit: e => this.handleSubmit(e) }, index.h("sc-password", { key: '9d8e66381add0e2d0371883c68faf3f6f49a94cb', enableValidation: this.enableValidation, label: wp.i18n.__('New Password', 'surecart'), name: "password", confirmation: true, required: true }), index.h("div", { key: '8ef0a2af206d4b6ea2ac5b9c6db418d1d3dd5a50' }, index.h("sc-button", { key: '2d3be1e6f49d25fdbcc4b8b97e9afc52a1b587dd', type: "primary", full: true, submit: true }, wp.i18n.__('Update Password', 'surecart'))))), this.loading && index.h("sc-block-ui", { key: '76f3f8a7318499acfc8dbd60acb2c2b61147a4d0', spinner: true })));
    }
};
ScWordPressPasswordEdit.style = ScWordpressPasswordEditStyle0;

exports.sc_wordpress_password_edit = ScWordPressPasswordEdit;

//# sourceMappingURL=sc-wordpress-password-edit.cjs.entry.js.map