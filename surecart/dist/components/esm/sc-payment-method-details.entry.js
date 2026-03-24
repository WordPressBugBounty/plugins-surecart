import { r as registerInstance, h } from './index-745b6bec.js';

const ScPaymentMethodDetails = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.paymentMethod = undefined;
        this.editHandler = undefined;
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k;
        return (h("sc-card", { key: '826c059459a12c5b39811ff01079ad3024a53500' }, h("sc-flex", { key: 'ff0a03bf78a9fb6a446cb50952d989225953b58f', alignItems: "center", justifyContent: "flex-start", style: { gap: '0.5em' } }, h("sc-payment-method", { key: '7e72e44534372a80eebcb3c95549de197c72d9a8', paymentMethod: this.paymentMethod }), h("div", { key: '67371eea77408f2d09387095407f07a2b3bb955a' }, !!((_b = (_a = this.paymentMethod) === null || _a === void 0 ? void 0 : _a.card) === null || _b === void 0 ? void 0 : _b.exp_month) && (h("span", { key: '6f8b0735d4e37fdd4c88f0125077e5eb78749e32' }, 
        // Translators: %d/%d is month and year of expiration.
        wp.i18n.sprintf(wp.i18n.__('Exp. %d/%d', 'surecart'), (_d = (_c = this.paymentMethod) === null || _c === void 0 ? void 0 : _c.card) === null || _d === void 0 ? void 0 : _d.exp_month, (_f = (_e = this.paymentMethod) === null || _e === void 0 ? void 0 : _e.card) === null || _f === void 0 ? void 0 : _f.exp_year))), !!((_h = (_g = this.paymentMethod) === null || _g === void 0 ? void 0 : _g.paypal_account) === null || _h === void 0 ? void 0 : _h.email) && ((_k = (_j = this.paymentMethod) === null || _j === void 0 ? void 0 : _j.paypal_account) === null || _k === void 0 ? void 0 : _k.email)), h("sc-button", { key: '42897688c5d69d5939647b5113bf17387bc95efb', type: "text", circle: true, onClick: this.editHandler }, h("sc-icon", { key: '799ce0fc86eda6652cbf9cda7761f80b0544c0e5', name: "edit-2" })))));
    }
};

export { ScPaymentMethodDetails as sc_payment_method_details };

//# sourceMappingURL=sc-payment-method-details.entry.js.map