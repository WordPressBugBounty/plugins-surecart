import { r as registerInstance, h } from './index-25e5af33.js';

const ScPaymentMethodDetails = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.paymentMethod = undefined;
        this.editHandler = undefined;
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k;
        return (h("sc-card", { key: 'dabf6669387bf0bdbffb171c3c998901062aa646' }, h("sc-flex", { key: '5ba96c59c9e7eea866373d265ae075d1167fcdb9', alignItems: "center", justifyContent: "flex-start", style: { gap: '0.5em' } }, h("sc-payment-method", { key: '575d00e5cdd19288a65377518dbeea7886c8048a', paymentMethod: this.paymentMethod }), h("div", { key: 'f6552ecb260c3471d62ba5d53727bd0097b9cb05' }, !!((_b = (_a = this.paymentMethod) === null || _a === void 0 ? void 0 : _a.card) === null || _b === void 0 ? void 0 : _b.exp_month) && (h("span", { key: 'bcd7000a18bf7156a77303d0e09477f67200bbe4' }, 
        // Translators: %d/%d is month and year of expiration.
        wp.i18n.sprintf(wp.i18n.__('Exp. %d/%d', 'surecart'), (_d = (_c = this.paymentMethod) === null || _c === void 0 ? void 0 : _c.card) === null || _d === void 0 ? void 0 : _d.exp_month, (_f = (_e = this.paymentMethod) === null || _e === void 0 ? void 0 : _e.card) === null || _f === void 0 ? void 0 : _f.exp_year))), !!((_h = (_g = this.paymentMethod) === null || _g === void 0 ? void 0 : _g.paypal_account) === null || _h === void 0 ? void 0 : _h.email) && ((_k = (_j = this.paymentMethod) === null || _j === void 0 ? void 0 : _j.paypal_account) === null || _k === void 0 ? void 0 : _k.email)), h("sc-button", { key: '0ad57b4eea8b9030970747fc677e28d72b5e4821', type: "text", circle: true, onClick: this.editHandler }, h("sc-icon", { key: '1656fdc8e5bd81ee3f14bd905c45eb3aab8f93aa', name: "edit-2" })))));
    }
};

export { ScPaymentMethodDetails as sc_payment_method_details };

//# sourceMappingURL=sc-payment-method-details.entry.js.map