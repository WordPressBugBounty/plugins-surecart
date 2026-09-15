import { r as registerInstance, h } from './index-25e5af33.js';
import { i as intervalString } from './price-39d60d32.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './currency-eb33deae.js';

const scSubscriptionAdHocConfirmCss = ":host{display:block}";
const ScSubscriptionAdHocConfirmStyle0 = scSubscriptionAdHocConfirmCss;

const ScSubscriptionAdHocConfirm = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.heading = undefined;
        this.price = undefined;
        this.currencyCode = undefined;
        this.busy = false;
    }
    async handleSubmit(e) {
        const { ad_hoc_amount } = await e.target.getFormJson();
        this.busy = true;
        return window.location.assign(addQueryArgs(window.location.href, {
            action: 'confirm',
            ad_hoc_amount,
        }));
    }
    render() {
        return (h("sc-dashboard-module", { key: 'f29920db0f1bfdd7cbb4b1dc502add98a94c470f', heading: this.heading || wp.i18n.__('Enter An Amount', 'surecart'), class: "subscription-switch" }, h("sc-card", { key: '089d0c2f336752a6619459f05be837fd4299bc32' }, h("sc-form", { key: '47b732d25f1291caa6c43907811d5628aa4d4ddc', onScSubmit: e => this.handleSubmit(e) }, h("sc-price-input", { key: 'd8cf6023f2f4fd4a448b45b54f339cabaf40e09d', label: "Amount", name: "ad_hoc_amount", currencyCode: this.currencyCode, autofocus: true, required: true }, h("span", { key: '048f4552318b63f8eccdaef2814b63e5b9b27e95', slot: "suffix", style: { opacity: '0.75' } }, intervalString(this.price))), h("sc-button", { key: '0c841aa427f142daa0621e8c9c1570efbc5a3dc2', type: "primary", full: true, submit: true, loading: this.busy }, wp.i18n.__('Next', 'surecart'), " ", h("sc-icon", { key: 'cea4ff821d547a4b9644248f90b0087b11a1e4d3', name: "arrow-right", slot: "suffix" })))), this.busy && h("sc-block-ui", { key: '615fef0376dc6996ab14188b7cd4313573c41e6c', style: { zIndex: '9' } })));
    }
};
ScSubscriptionAdHocConfirm.style = ScSubscriptionAdHocConfirmStyle0;

export { ScSubscriptionAdHocConfirm as sc_subscription_ad_hoc_confirm };

//# sourceMappingURL=sc-subscription-ad-hoc-confirm.entry.js.map