'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const consumer = require('./consumer-b58230e6.js');
const price = require('./price-da3cab3d.js');
const tax = require('./tax-a4582e73.js');
require('./currency-71fce0f0.js');

const scOrderConfirmationLineItemsCss = ":host{display:block}.line-items{display:grid;gap:var(--sc-spacing-small)}.line-item{display:grid;gap:var(--sc-spacing-small)}.fee__description{opacity:0.75}";
const ScOrderConfirmationLineItemsStyle0 = scOrderConfirmationLineItemsCss;

const ScOrderConfirmationLineItems = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.order = undefined;
        this.loading = undefined;
    }
    render() {
        var _a, _b;
        if (!!this.loading) {
            return (index.h("sc-line-item", null, index.h("sc-skeleton", { style: { 'width': '50px', 'height': '50px', '--border-radius': '0' }, slot: "image" }), index.h("sc-skeleton", { slot: "title", style: { width: '120px', display: 'inline-block' } }), index.h("sc-skeleton", { slot: "description", style: { width: '60px', display: 'inline-block' } }), index.h("sc-skeleton", { style: { width: '120px', display: 'inline-block' }, slot: "price" }), index.h("sc-skeleton", { style: { width: '60px', display: 'inline-block' }, slot: "price-description" })));
        }
        return (index.h("div", { class: { 'confirmation-summary': true } }, index.h("div", { class: "line-items", part: "line-items" }, (_b = (_a = this.order) === null || _a === void 0 ? void 0 : _a.line_items) === null || _b === void 0 ? void 0 : _b.data.map(item => {
            var _a, _b, _c, _d, _e, _f, _g, _h, _j;
            return (index.h("div", { class: "line-item" }, index.h("sc-product-line-item", { key: item.id, image: (_b = (_a = item === null || item === void 0 ? void 0 : item.price) === null || _a === void 0 ? void 0 : _a.product) === null || _b === void 0 ? void 0 : _b.line_item_image, name: `${(_d = (_c = item === null || item === void 0 ? void 0 : item.price) === null || _c === void 0 ? void 0 : _c.product) === null || _d === void 0 ? void 0 : _d.name}`, price: (_e = item === null || item === void 0 ? void 0 : item.price) === null || _e === void 0 ? void 0 : _e.name, variant: item === null || item === void 0 ? void 0 : item.variant_display_options, editable: false, removable: false, quantity: item.quantity, fees: (_f = item === null || item === void 0 ? void 0 : item.fees) === null || _f === void 0 ? void 0 : _f.data, note: item === null || item === void 0 ? void 0 : item.display_note, amount: item.ad_hoc_display_amount ? item.ad_hoc_display_amount : item.subtotal_display_amount, scratch: !item.ad_hoc_display_amount && (item === null || item === void 0 ? void 0 : item.scratch_display_amount), trial: (_g = item === null || item === void 0 ? void 0 : item.price) === null || _g === void 0 ? void 0 : _g.trial_text, interval: `${(_h = item === null || item === void 0 ? void 0 : item.price) === null || _h === void 0 ? void 0 : _h.short_interval_text} ${(_j = item === null || item === void 0 ? void 0 : item.price) === null || _j === void 0 ? void 0 : _j.short_interval_count_text}`, purchasableStatus: item === null || item === void 0 ? void 0 : item.purchasable_status_display, sku: item === null || item === void 0 ? void 0 : item.sku })));
        }))));
    }
};
consumer.openWormhole(ScOrderConfirmationLineItems, ['order', 'busy', 'loading', 'empty'], false);
ScOrderConfirmationLineItems.style = ScOrderConfirmationLineItemsStyle0;

const scOrderConfirmationTotalsCss = ":host{display:block}";
const ScOrderConfirmationTotalsStyle0 = scOrderConfirmationTotalsCss;

const ScOrderConfirmationTotals = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.order = undefined;
    }
    renderDiscountLine() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p;
        if (!((_c = (_b = (_a = this.order) === null || _a === void 0 ? void 0 : _a.discount) === null || _b === void 0 ? void 0 : _b.promotion) === null || _c === void 0 ? void 0 : _c.code)) {
            return null;
        }
        let humanDiscount = '';
        if ((_e = (_d = this.order) === null || _d === void 0 ? void 0 : _d.discount) === null || _e === void 0 ? void 0 : _e.coupon) {
            humanDiscount = price.getHumanDiscount((_g = (_f = this.order) === null || _f === void 0 ? void 0 : _f.discount) === null || _g === void 0 ? void 0 : _g.coupon);
        }
        return (index.h("sc-line-item", { style: { marginTop: 'var(--sc-spacing-small)' } }, index.h("span", { slot: "description" }, wp.i18n.__('Discount', 'surecart'), index.h("br", null), ((_k = (_j = (_h = this.order) === null || _h === void 0 ? void 0 : _h.discount) === null || _j === void 0 ? void 0 : _j.promotion) === null || _k === void 0 ? void 0 : _k.code) && (index.h("sc-tag", { type: "success", size: "small" }, (_o = (_m = (_l = this.order) === null || _l === void 0 ? void 0 : _l.discount) === null || _m === void 0 ? void 0 : _m.promotion) === null || _o === void 0 ? void 0 : _o.code))), humanDiscount && (index.h("span", { class: "coupon-human-discount", slot: "price-description" }, "(", humanDiscount, ")")), index.h("span", { slot: "price" }, (_p = this.order) === null || _p === void 0 ? void 0 : _p.discounts_display_amount)));
    }
    renderCheckoutFees(checkout) {
        var _a, _b, _c, _d;
        if (!((_b = (_a = checkout === null || checkout === void 0 ? void 0 : checkout.checkout_fees) === null || _a === void 0 ? void 0 : _a.data) === null || _b === void 0 ? void 0 : _b.length)) {
            return null;
        }
        return (index.h(index.Fragment, null, (_d = (_c = checkout === null || checkout === void 0 ? void 0 : checkout.checkout_fees) === null || _c === void 0 ? void 0 : _c.data) === null || _d === void 0 ? void 0 : _d.map(fee => (index.h("sc-line-item", { key: fee === null || fee === void 0 ? void 0 : fee.id }, index.h("span", { slot: "description" }, fee === null || fee === void 0 ? void 0 : fee.description), index.h("span", { slot: "price" }, fee === null || fee === void 0 ? void 0 : fee.display_amount))))));
    }
    renderShippingFees(checkout) {
        var _a, _b, _c, _d;
        if (!((_b = (_a = checkout === null || checkout === void 0 ? void 0 : checkout.shipping_fees) === null || _a === void 0 ? void 0 : _a.data) === null || _b === void 0 ? void 0 : _b.length)) {
            return null;
        }
        return (index.h(index.Fragment, null, (_d = (_c = checkout === null || checkout === void 0 ? void 0 : checkout.shipping_fees) === null || _c === void 0 ? void 0 : _c.data) === null || _d === void 0 ? void 0 : _d.map(fee => (index.h("sc-line-item", { key: fee === null || fee === void 0 ? void 0 : fee.id }, index.h("span", { slot: "description" }, fee === null || fee === void 0 ? void 0 : fee.description), index.h("span", { slot: "price" }, fee === null || fee === void 0 ? void 0 : fee.display_amount))))));
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t, _u, _v, _w, _x, _y, _z, _0, _1, _2, _3, _4, _5, _6, _7, _8, _9, _10, _11, _12, _13, _14, _15, _16, _17, _18;
        const shippingMethod = (_b = (_a = this.order) === null || _a === void 0 ? void 0 : _a.selected_shipping_choice) === null || _b === void 0 ? void 0 : _b.shipping_method;
        const shippingMethodName = shippingMethod === null || shippingMethod === void 0 ? void 0 : shippingMethod.name;
        return (index.h("div", { key: '3d8ba3092b2cfbc55ef0f03130eeed53eabb998f', class: { 'line-item-totals': true } }, ((_c = this.order) === null || _c === void 0 ? void 0 : _c.subtotal_amount) !== ((_d = this.order) === null || _d === void 0 ? void 0 : _d.total_amount) && (index.h(index.Fragment, { key: '53b05e3fe4db8a7fa07034da8bb28a7465663549' }, index.h("sc-line-item", { key: '8ba4f515a02dce808040c5d77312413a96820285' }, index.h("span", { key: 'cee285985685dd9593de1f3a65406c887e5d6234', slot: "description" }, wp.i18n.__('Subtotal', 'surecart')), index.h("span", { key: 'd80914cb62317b718a750d07b326326c47befd3f', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_e = this.order) === null || _e === void 0 ? void 0 : _e.subtotal_display_amount)), this.renderCheckoutFees(this.order))), !!((_f = this.order) === null || _f === void 0 ? void 0 : _f.trial_amount) && (index.h("sc-line-item", { key: '3e59312bd7e0663315f892adeccfe0671fd08ee3' }, index.h("span", { key: '75ad14cc5f57dbbbf3247dd5c206c20441e7814b', slot: "description" }, wp.i18n.__('Trial', 'surecart')), index.h("span", { key: '0e4aa8e05b2da2a630f4dfc527869323dbc35cb2', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_g = this.order) === null || _g === void 0 ? void 0 : _g.trial_display_amount))), !!((_h = this.order) === null || _h === void 0 ? void 0 : _h.discounts) && (index.h("sc-line-item", { key: '93423fdace5bbb17c79289c423f8521299041905' }, index.h("span", { key: 'ec44d18c7859b71e729227fd5ccd966b565d0927', slot: "description" }, wp.i18n.__('Discounts', 'surecart')), index.h("span", { key: 'd493da29fad84f6cfda8a7c8f8970ec116cc7cfb', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_j = this.order) === null || _j === void 0 ? void 0 : _j.discounts_display))), !!((_m = (_l = (_k = this.order) === null || _k === void 0 ? void 0 : _k.discount) === null || _l === void 0 ? void 0 : _l.promotion) === null || _m === void 0 ? void 0 : _m.code) && (index.h("sc-line-item", { key: '73a1414ed7bb90de500b44c65d5ee0ae33f1126b' }, index.h("span", { key: 'fac1e6aec6bb9ce63c3e8e0e7854641da57639ab', slot: "description" }, wp.i18n.__('Discount', 'surecart'), index.h("br", { key: '1207b3751a6c41a77ae3ad68aa89601bb4ad71f4' }), index.h("sc-tag", { key: '730dbf88a35f60b233ad57ee1f30d9c51563aa23', type: "success" }, wp.i18n.__('Coupon:', 'surecart'), " ", (_q = (_p = (_o = this.order) === null || _o === void 0 ? void 0 : _o.discount) === null || _p === void 0 ? void 0 : _p.promotion) === null || _q === void 0 ? void 0 :
            _q.code)), index.h("span", { key: '7c7ced4e94c2922a73b0bf24e03ab8f4a2067618', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_r = this.order) === null || _r === void 0 ? void 0 : _r.discounts_display_amount))), !!((_s = this.order) === null || _s === void 0 ? void 0 : _s.shipping_amount) && (index.h(index.Fragment, { key: 'ce8a93297b6eaba46490bee7fa832ba358b99d2b' }, index.h("sc-line-item", { key: 'f1e2a81acc3f5a6359e4645cba9aaca5c4aae343' }, index.h("span", { key: '8cf5ad7a80ef2983e46235c79d23f95ae73a2398', slot: "description" }, `${wp.i18n.__('Shipping', 'surecart')} ${shippingMethodName ? `(${shippingMethodName})` : ''}`), index.h("span", { key: '15fb4e40f58c12b3bb60d8f647a7a3144a042b31', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_t = this.order) === null || _t === void 0 ? void 0 : _t.shipping_display_amount)), this.renderShippingFees(this.order))), !!((_u = this.order) === null || _u === void 0 ? void 0 : _u.tax_amount) && (index.h("sc-line-item", { key: '7bfb50eaa7fbefb8d5f4f8a6abbd8c13fbe5d661' }, index.h("span", { key: 'f8577d1b72da578bd9b1b05787682bb0729435e7', slot: "description" }, `${tax.formatTaxDisplay((_v = this.order) === null || _v === void 0 ? void 0 : _v.tax_label, ((_w = this.order) === null || _w === void 0 ? void 0 : _w.tax_status) === 'estimated')} (${(_x = this.order) === null || _x === void 0 ? void 0 : _x.tax_percent}%)`), index.h("span", { key: '09530405285b751991ab47773f8aa5efaf6a21c7', slot: "price" }, (_y = this.order) === null || _y === void 0 ? void 0 : _y.tax_display_amount), !!((_z = this.order) === null || _z === void 0 ? void 0 : _z.tax_inclusive_amount) && index.h("span", { key: '69634e6eddf9d1b2f08cf902083490975a64a274', slot: "price-description" }, `(${wp.i18n.__('included', 'surecart')})`))), index.h("sc-divider", { key: '6582d52c2ecde493e49d51310303112208c72056', style: { '--spacing': 'var(--sc-spacing-x-small)' } }), index.h("sc-line-item", { key: '1196c0b634fcf07271560cd1eb9af80504dccd2a', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: 'bdbe25fb8bff6172f203a509529c75bceb6f395f', slot: "title" }, wp.i18n.__('Total', 'surecart')), index.h("span", { key: '9377b1d66d9211d277ae241be1be3127c080d834', slot: "price" }, (_0 = this.order) === null || _0 === void 0 ? void 0 : _0.total_display_amount), index.h("span", { key: '4de75b257ece33d6ddae8617c61938b061916b93', slot: "currency" }, (_1 = this.order) === null || _1 === void 0 ? void 0 : _1.currency)), !!((_2 = this.order) === null || _2 === void 0 ? void 0 : _2.proration_amount) && (index.h("sc-line-item", { key: 'bef58fd42f5b55fdb7b20e8944c18732b4ac440a' }, index.h("span", { key: 'da1a6beb9ef8e4941cb44ff994daa767c0c2abd6', slot: "description" }, wp.i18n.__('Proration', 'surecart')), index.h("span", { key: 'f24e6230cba361c1b2960aa1d88393a8f1d2bc9d', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_3 = this.order) === null || _3 === void 0 ? void 0 : _3.proration_display_amount))), !!((_4 = this.order) === null || _4 === void 0 ? void 0 : _4.applied_balance_amount) && (index.h("sc-line-item", { key: '0314cf5a71ca1852fb065ffcaba2a1024dcfae0b' }, index.h("span", { key: 'a29563800a3ba90f43a856f389d1ab211c9d5641', slot: "description" }, wp.i18n.__('Applied Balance', 'surecart')), index.h("span", { key: '0d4842ef15036d8fc6a96911c9b562828a220fc6', style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            }, slot: "price" }, (_5 = this.order) === null || _5 === void 0 ? void 0 : _5.applied_balance_display_amount))), !!((_6 = this.order) === null || _6 === void 0 ? void 0 : _6.credited_balance_amount) && (index.h("sc-line-item", { key: 'cd55afe393975b8e8ddf241b1b5be0be342d34ed' }, index.h("span", { key: 'c184b39d43de32eb1077086848cf0c659bbc11f1', slot: "description" }, wp.i18n.__('Credited Balance', 'surecart')), index.h("span", { key: '8e67a35c98fc45f186de307d5a4b5e6144c8a2ea', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_7 = this.order) === null || _7 === void 0 ? void 0 : _7.credited_balance_display_amount))), ((_8 = this.order) === null || _8 === void 0 ? void 0 : _8.amount_due) !== ((_9 = this.order) === null || _9 === void 0 ? void 0 : _9.total_amount) && (index.h("sc-line-item", { key: '09811531d72f88e535f75813b028e4093836dc22', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: 'e419a782fcd70bacc6e334d748c91238c9323b76', slot: "title" }, wp.i18n.__('Amount Due', 'surecart')), index.h("span", { key: '4ce3d4f26c40939d97bbf37dd40ae4c1788dcefc', slot: "price" }, (_10 = this.order) === null || _10 === void 0 ? void 0 : _10.amount_due_display_amount), index.h("span", { key: '123e4b38ac6b50d68f0cbbf92f763fbaec6362e8', slot: "currency" }, (_11 = this.order) === null || _11 === void 0 ? void 0 : _11.currency))), index.h("sc-divider", { key: '3168ef19992568f473b4e9fb2796051df787601e', style: { '--spacing': 'var(--sc-spacing-x-small)' } }), !!((_12 = this.order) === null || _12 === void 0 ? void 0 : _12.paid_amount) && (index.h("sc-line-item", { key: 'e45244cc431e50a38e07618cbe000fdb6ca0a80e', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '2637fe8e21b840db79beed51f910a90ccc27ffdd', slot: "title" }, wp.i18n.__('Paid', 'surecart')), index.h("span", { key: 'f9888c5d9f3d8153d338935ed1985005dd9568b6', slot: "price" }, (_13 = this.order) === null || _13 === void 0 ? void 0 : _13.paid_display_amount), index.h("span", { key: 'cbcf0c4daddd64abc1e04590b9747a7ec1fd26ee', slot: "currency" }, (_14 = this.order) === null || _14 === void 0 ? void 0 : _14.currency))), !!((_15 = this.order) === null || _15 === void 0 ? void 0 : _15.refunded_amount) && (index.h(index.Fragment, { key: '62802351fb4f4577996f3a85343e56b5d9497874' }, index.h("sc-line-item", { key: '838ee02b97c9575d99df67e1fa492affb7ce958c', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '67867805235c93704c8d757857c914abba08b628', slot: "description" }, wp.i18n.__('Refunded', 'surecart')), index.h("span", { key: '21c3cd5a009f84b313a3240f90fe01a55ce0eb7b', slot: "price" }, (_16 = this.order) === null || _16 === void 0 ? void 0 : _16.refunded_display_amount)), index.h("sc-line-item", { key: '30e9b4dbc950f0ac5c1a5d6ef2496b7ecc050348', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '113a1bff177530d8316466112b9c297e4103ae16', slot: "title" }, wp.i18n.__('Net Payment', 'surecart')), index.h("span", { key: '2d546ef91662e551ff2f17049e8e72f895d03717', slot: "price" }, (_17 = this.order) === null || _17 === void 0 ? void 0 : _17.net_paid_display_amount)))), ((_18 = this.order) === null || _18 === void 0 ? void 0 : _18.tax_reverse_charged_amount) > 0 && (index.h("sc-line-item", { key: '889808875d9771f2f907afe1349c9daf5fc6f22a' }, index.h("span", { key: '1427a159915edb8575b4b44fceb4cc33f1e8f229', slot: "description" }, wp.i18n.__('*Tax to be paid on reverse charge basis', 'surecart'))))));
    }
};
consumer.openWormhole(ScOrderConfirmationTotals, ['order', 'busy', 'loading', 'empty'], false);
ScOrderConfirmationTotals.style = ScOrderConfirmationTotalsStyle0;

exports.sc_order_confirmation_line_items = ScOrderConfirmationLineItems;
exports.sc_order_confirmation_totals = ScOrderConfirmationTotals;

//# sourceMappingURL=sc-order-confirmation-line-items_2.cjs.entry.js.map