'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
require('./fetch-5e8dc1d5.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
const index$1 = require('./index-7ced8198.js');
require('./remove-query-args-b57e8cd3.js');

const scCustomerEditCss = ":host{display:block;position:relative}.customer-edit{display:grid;gap:0.75em}";
const ScCustomerEditStyle0 = scCustomerEditCss;

const ScCustomerEdit = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.customer = undefined;
        this.successUrl = undefined;
        this.loading = undefined;
        this.error = undefined;
    }
    async handleSubmit(e) {
        var _a, _b;
        this.loading = true;
        try {
            const { email, first_name, last_name, phone, billing_matches_shipping, shipping_name, shipping_city, 'tax_identifier.number_type': tax_identifier_number_type, 'tax_identifier.number': tax_identifier_number, shipping_country, shipping_line_1, shipping_line_2, shipping_postal_code, shipping_state, billing_name, billing_city, billing_country, billing_line_1, billing_line_2, billing_postal_code, billing_state, } = await e.target.getFormJson();
            this.customer.billing_address = {
                name: billing_name,
                city: billing_city,
                country: billing_country,
                line_1: billing_line_1,
                line_2: billing_line_2,
                postal_code: billing_postal_code,
                state: billing_state,
            };
            this.customer.shipping_address = {
                name: shipping_name,
                city: shipping_city,
                country: shipping_country,
                line_1: shipping_line_1,
                line_2: shipping_line_2,
                postal_code: shipping_postal_code,
                state: shipping_state,
            };
            await index$1.apiFetch({
                path: addQueryArgs.addQueryArgs(`surecart/v1/customers/${(_a = this.customer) === null || _a === void 0 ? void 0 : _a.id}`, { expand: ['tax_identifier'] }),
                method: 'PATCH',
                data: {
                    email,
                    first_name,
                    last_name,
                    phone,
                    billing_matches_shipping: billing_matches_shipping === true || billing_matches_shipping === 'on',
                    shipping_address: this.customer.shipping_address,
                    billing_address: this.customer.billing_address,
                    ...(tax_identifier_number && tax_identifier_number_type
                        ? {
                            tax_identifier: {
                                number: tax_identifier_number,
                                number_type: tax_identifier_number_type,
                            },
                        }
                        : {}),
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
            this.error = ((_b = e === null || e === void 0 ? void 0 : e.additional_errors) === null || _b === void 0 ? void 0 : _b.length) ? e.additional_errors.map(err => err.message).join(', ') : (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.loading = false;
        }
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m;
        return (index.h("sc-dashboard-module", { key: 'f9cd6cf68c7669077da389e92da081d50d3180c8', class: "customer-edit", error: this.error }, index.h("span", { key: '6dabca7d40ff4ecfb0c22da4a48e744a5a94a664', slot: "heading" }, this.heading || wp.i18n.__('Update Billing Details', 'surecart'), ' ', !((_a = this === null || this === void 0 ? void 0 : this.customer) === null || _a === void 0 ? void 0 : _a.live_mode) && (index.h("sc-tag", { key: '536e170f48935460ad255547ae4d3b51dc665b00', type: "warning", size: "small" }, wp.i18n.__('Test', 'surecart')))), index.h("sc-card", { key: '6624c91004cef92b3960c6d52b201028b8599b71' }, index.h("sc-form", { key: '03b2d0964adbda9fcf07386dc713f6fb07eecaef', onScFormSubmit: e => this.handleSubmit(e) }, index.h("sc-columns", { key: '9f5ad1293754359db1359a3d337a95479c317b64', style: { '--sc-column-spacing': 'var(--sc-spacing-medium)' } }, index.h("sc-column", { key: '0da1d0c54fc4dfd994c4ff9a2a7d06cdc0d013d8' }, index.h("sc-input", { key: '9f9bcafde2e760e572425ea0f052c93faf61c5df', label: wp.i18n.__('First Name', 'surecart'), name: "first_name", value: (_b = this.customer) === null || _b === void 0 ? void 0 : _b.first_name })), index.h("sc-column", { key: '9dcc1f9e648dcd486d2a442e004b6670becca62d' }, index.h("sc-input", { key: '036cb94f88a65c1cdc1ee999ae3a71bd43b076b9', label: wp.i18n.__('Last Name', 'surecart'), name: "last_name", value: (_c = this.customer) === null || _c === void 0 ? void 0 : _c.last_name }))), index.h("sc-column", { key: '26ea7c73599dd28ec79ea4560ca7c798d118ed2b' }, index.h("sc-phone-input", { key: '736dccc2aabc281b23b529b8b57ede636b19f714', label: wp.i18n.__('Phone', 'surecart'), name: "phone", value: (_d = this.customer) === null || _d === void 0 ? void 0 : _d.phone })), index.h("sc-flex", { key: '254a283df440f1b9f4dcd5aaf29524a148b57225', style: { '--sc-flex-column-gap': 'var(--sc-spacing-medium)' }, flexDirection: "column" }, index.h("div", { key: 'bc3b5a0d47d8138f0028daa2ba9076139fbc4962' }, index.h("sc-address", { key: 'e2c8356b06a1d450cd5702fbcc18a1cc588cc9a8', label: wp.i18n.__('Shipping Address', 'surecart'), showName: true, address: {
                ...(_e = this.customer) === null || _e === void 0 ? void 0 : _e.shipping_address,
            }, showLine2: true, required: false, names: {
                name: 'shipping_name',
                country: 'shipping_country',
                line_1: 'shipping_line_1',
                line_2: 'shipping_line_2',
                city: 'shipping_city',
                postal_code: 'shipping_postal_code',
                state: 'shipping_state',
            } })), index.h("div", { key: '504a4101d6ee5b77eebbebad97185370a52c71f6' }, index.h("sc-checkbox", { key: 'c6988f0f7293c36080b3dfe13a6b83c2c3d4f806', name: "billing_matches_shipping", checked: (_f = this.customer) === null || _f === void 0 ? void 0 : _f.billing_matches_shipping, onScChange: e => {
                this.customer = {
                    ...this.customer,
                    billing_matches_shipping: e.target.checked,
                };
            }, value: "on" }, wp.i18n.__('Billing address is same as shipping', 'surecart'))), index.h("div", { key: 'e6f0297d1d718ac7fc7b26971d4e68a4fa7106f7', style: { display: ((_g = this.customer) === null || _g === void 0 ? void 0 : _g.billing_matches_shipping) ? 'none' : 'block' } }, index.h("sc-address", { key: '97e09dc66524123e5078b074a312ab611ffaf057', label: wp.i18n.__('Billing Address', 'surecart'), showName: true, address: {
                ...(_h = this.customer) === null || _h === void 0 ? void 0 : _h.billing_address,
            }, showLine2: true, names: {
                name: 'billing_name',
                country: 'billing_country',
                line_1: 'billing_line_1',
                line_2: 'billing_line_2',
                city: 'billing_city',
                postal_code: 'billing_postal_code',
                state: 'billing_state',
            }, required: true })), index.h("sc-tax-id-input", { key: '4f3d2c70dc7f6dd0794c06b729067f7b67dcc329', show: true, number: (_k = (_j = this.customer) === null || _j === void 0 ? void 0 : _j.tax_identifier) === null || _k === void 0 ? void 0 : _k.number, type: (_m = (_l = this.customer) === null || _l === void 0 ? void 0 : _l.tax_identifier) === null || _m === void 0 ? void 0 : _m.number_type })), index.h("div", { key: 'af40ee6425e6dcb8720fc35dd6b46a1a70b12e26' }, index.h("sc-button", { key: '827f1eb2158d0d8d2f4e165158d611587c377565', type: "primary", full: true, submit: true }, wp.i18n.__('Save', 'surecart'))))), this.loading && index.h("sc-block-ui", { key: '4e884fd57a2a42d66674776dee2142dde507e719', spinner: true })));
    }
};
ScCustomerEdit.style = ScCustomerEditStyle0;

exports.sc_customer_edit = ScCustomerEdit;

//# sourceMappingURL=sc-customer-edit.cjs.entry.js.map