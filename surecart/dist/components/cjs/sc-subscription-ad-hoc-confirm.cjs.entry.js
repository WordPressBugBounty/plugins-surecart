'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const price = require('./price-da3cab3d.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
require('./currency-71fce0f0.js');

const scSubscriptionAdHocConfirmCss = ":host{display:block}";
const ScSubscriptionAdHocConfirmStyle0 = scSubscriptionAdHocConfirmCss;

const ScSubscriptionAdHocConfirm = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.price = undefined;
        this.currencyCode = undefined;
        this.busy = false;
    }
    async handleSubmit(e) {
        const { ad_hoc_amount } = await e.target.getFormJson();
        this.busy = true;
        return window.location.assign(addQueryArgs.addQueryArgs(window.location.href, {
            action: 'confirm',
            ad_hoc_amount,
        }));
    }
    render() {
        return (index.h("sc-dashboard-module", { key: 'b7690af8174ac2adf08d01b0470b4769c8569ab9', heading: this.heading || wp.i18n.__('Enter An Amount', 'surecart'), class: "subscription-switch" }, index.h("sc-card", { key: '02906b9bfcddad757b3d1c7fdcee27124d20cc23' }, index.h("sc-form", { key: '92601bb6bd601151f91294b6c1363c1090d9f0e7', onScSubmit: e => this.handleSubmit(e) }, index.h("sc-price-input", { key: '64a82f8031ea5af66457a83427a4ac29963de030', label: "Amount", name: "ad_hoc_amount", currencyCode: this.currencyCode, autofocus: true, required: true }, index.h("span", { key: '847823b508d2b86e1dc078b7594f13a211f4dc7a', slot: "suffix", style: { opacity: '0.75' } }, price.intervalString(this.price))), index.h("sc-button", { key: 'ddb95bdfd98fd618e29b06508f6693dca7bce918', type: "primary", full: true, submit: true, loading: this.busy }, wp.i18n.__('Next', 'surecart'), " ", index.h("sc-icon", { key: 'aa2178c55214ff76bf94f25ca0185316b4ac9c9e', name: "arrow-right", slot: "suffix" })))), this.busy && index.h("sc-block-ui", { key: '0f0af2a6839166dbab8d9adbaf8c9802c5f58897', style: { zIndex: '9' } })));
    }
};
ScSubscriptionAdHocConfirm.style = ScSubscriptionAdHocConfirmStyle0;

exports.sc_subscription_ad_hoc_confirm = ScSubscriptionAdHocConfirm;

//# sourceMappingURL=sc-subscription-ad-hoc-confirm.cjs.entry.js.map