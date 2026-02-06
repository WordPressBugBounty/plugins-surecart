import { r as registerInstance, h } from './index-745b6bec.js';
import { i as intervalString } from './price-af9f0dbf.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import './currency-a0c9bff4.js';

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
        return (h("sc-dashboard-module", { key: '51ca290dd886772effeca7841cc97d4bcbd7e424', heading: this.heading || wp.i18n.__('Enter An Amount', 'surecart'), class: "subscription-switch" }, h("sc-card", { key: '1683e69007e4c5f43ef4bfcdf4e057881d727e75' }, h("sc-form", { key: 'a504914cb231d522e2c44d82d73b48f5302867e3', onScSubmit: e => this.handleSubmit(e) }, h("sc-price-input", { key: '7ed288d92779ba07458f59d1c3070a437d9c4e68', label: "Amount", name: "ad_hoc_amount", currencyCode: this.currencyCode, autofocus: true, required: true }, h("span", { key: 'f95a3af0f428d943eab306134ac26e016721f665', slot: "suffix", style: { opacity: '0.75' } }, intervalString(this.price))), h("sc-button", { key: 'fbdf3c8845ca5d1febbc49461947c59fd2a61cdd', type: "primary", full: true, submit: true, loading: this.busy }, wp.i18n.__('Next', 'surecart'), " ", h("sc-icon", { key: '050d76862a1b972997bd9dfeb6122a9094149bfe', name: "arrow-right", slot: "suffix" })))), this.busy && h("sc-block-ui", { key: '64ae11019d7add7539ad51dce5faf4259e8fd816', style: { zIndex: '9' } })));
    }
};
ScSubscriptionAdHocConfirm.style = ScSubscriptionAdHocConfirmStyle0;

export { ScSubscriptionAdHocConfirm as sc_subscription_ad_hoc_confirm };

//# sourceMappingURL=sc-subscription-ad-hoc-confirm.entry.js.map