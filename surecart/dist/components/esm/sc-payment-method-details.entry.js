import { r as registerInstance, h } from './index-745b6bec.js';

const ScPaymentMethodDetails = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.paymentMethod = undefined;
        this.editHandler = undefined;
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k;
        return (h("sc-card", { key: '06a8abe1afd13307bfd192b334ba441c712d9258' }, h("sc-flex", { key: '1fb72f2082fa4cfb3cd6b02be9a0795a9ded331d', alignItems: "center", justifyContent: "flex-start", style: { gap: '0.5em' } }, h("sc-payment-method", { key: '42df3c7d9ecadda72aa987a5ec25216c6895e731', paymentMethod: this.paymentMethod }), h("div", { key: '63b04ea7cd8d97dcf43dcab83ce02c5a8c4314fc' }, !!((_b = (_a = this.paymentMethod) === null || _a === void 0 ? void 0 : _a.card) === null || _b === void 0 ? void 0 : _b.exp_month) && (h("span", { key: '8d07d8e299feb7dbe9e4bdd1cad722f104c1680d' }, 
        // Translators: %d/%d is month and year of expiration.
        wp.i18n.sprintf(wp.i18n.__('Exp. %d/%d', 'surecart'), (_d = (_c = this.paymentMethod) === null || _c === void 0 ? void 0 : _c.card) === null || _d === void 0 ? void 0 : _d.exp_month, (_f = (_e = this.paymentMethod) === null || _e === void 0 ? void 0 : _e.card) === null || _f === void 0 ? void 0 : _f.exp_year))), !!((_h = (_g = this.paymentMethod) === null || _g === void 0 ? void 0 : _g.paypal_account) === null || _h === void 0 ? void 0 : _h.email) && ((_k = (_j = this.paymentMethod) === null || _j === void 0 ? void 0 : _j.paypal_account) === null || _k === void 0 ? void 0 : _k.email)), h("sc-button", { key: '0eec455e170045ae04500db4e6b161313b793390', type: "text", circle: true, onClick: this.editHandler }, h("sc-icon", { key: '57c4fe2f0fba44242d6c44a166c9f0d34e14fcf2', name: "edit-2" })))));
    }
};

export { ScPaymentMethodDetails as sc_payment_method_details };

//# sourceMappingURL=sc-payment-method-details.entry.js.map