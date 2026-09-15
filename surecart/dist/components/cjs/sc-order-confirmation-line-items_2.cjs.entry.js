'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const consumer = require('./consumer-b58230e6.js');
const index$1 = require('./index-f3933112.js');
const price = require('./price-9dddd853.js');
const tax = require('./tax-a4582e73.js');
require('./currency-b438c76d.js');

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
        const items = (((_b = (_a = this.order) === null || _a === void 0 ? void 0 : _a.line_items) === null || _b === void 0 ? void 0 : _b.data) || []);
        const { regular, bundleParents, componentsByParent } = index$1.groupBundleLineItems(items);
        const orderedItems = [...bundleParents, ...regular];
        return (index.h("div", { class: { 'confirmation-summary': true } }, index.h("div", { class: "line-items", part: "line-items" }, orderedItems.map(item => {
            var _a, _b, _c, _d, _e, _f;
            const product = (_a = item === null || item === void 0 ? void 0 : item.price) === null || _a === void 0 ? void 0 : _a.product;
            const isBundle = !!(product === null || product === void 0 ? void 0 : product.bundle);
            return (index.h("div", { class: "line-item", key: item.id }, index.h("sc-product-line-item", { image: product === null || product === void 0 ? void 0 : product.line_item_image, name: product === null || product === void 0 ? void 0 : product.name, price: (_b = item === null || item === void 0 ? void 0 : item.price) === null || _b === void 0 ? void 0 : _b.name, variant: item === null || item === void 0 ? void 0 : item.variant_display_options, editable: false, removable: false, quantity: item.quantity, fees: (_c = item === null || item === void 0 ? void 0 : item.fees) === null || _c === void 0 ? void 0 : _c.data, note: item === null || item === void 0 ? void 0 : item.display_note, amount: item.ad_hoc_display_amount ? item.ad_hoc_display_amount : item.subtotal_display_amount, scratch: !item.ad_hoc_display_amount && (item === null || item === void 0 ? void 0 : item.scratch_display_amount), trial: (_d = item === null || item === void 0 ? void 0 : item.price) === null || _d === void 0 ? void 0 : _d.trial_text, interval: `${(_e = item === null || item === void 0 ? void 0 : item.price) === null || _e === void 0 ? void 0 : _e.short_interval_text} ${(_f = item === null || item === void 0 ? void 0 : item.price) === null || _f === void 0 ? void 0 : _f.short_interval_count_text}`, purchasableStatus: item === null || item === void 0 ? void 0 : item.purchasable_status_display, sku: item === null || item === void 0 ? void 0 : item.sku, bundleComponents: isBundle ? componentsByParent[item.id] || [] : [] })));
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
        return (index.h("div", { key: '2785cb70e703cb473ccd96a7d7abce1a7f47ce05', class: { 'line-item-totals': true } }, ((_c = this.order) === null || _c === void 0 ? void 0 : _c.subtotal_amount) !== ((_d = this.order) === null || _d === void 0 ? void 0 : _d.total_amount) && (index.h(index.Fragment, { key: '4cb71fe852667d4d6a0a417beb4506696c756778' }, index.h("sc-line-item", { key: '6d4d5eacd9a5e70c965c872a2526882b8221e133' }, index.h("span", { key: '3cae5ada00405b47bff93fd52e7544063fb4eb84', slot: "description" }, wp.i18n.__('Subtotal', 'surecart')), index.h("span", { key: '40b254acde59c538037f8b37cc71b0233facd1d6', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_e = this.order) === null || _e === void 0 ? void 0 : _e.subtotal_display_amount)), this.renderCheckoutFees(this.order))), !!((_f = this.order) === null || _f === void 0 ? void 0 : _f.trial_amount) && (index.h("sc-line-item", { key: '9cd80cc342657a104cba06a68b20cd3c59c98506' }, index.h("span", { key: '9fa1fd8e035661c6ff2a490bee521c1e6df90141', slot: "description" }, wp.i18n.__('Trial', 'surecart')), index.h("span", { key: 'a5aca13321635f37a49484263a1af53f41c4e12b', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_g = this.order) === null || _g === void 0 ? void 0 : _g.trial_display_amount))), !!((_h = this.order) === null || _h === void 0 ? void 0 : _h.discounts) && (index.h("sc-line-item", { key: '5e54615757aaaf17613f4367d6b505c051d461b6' }, index.h("span", { key: '8ebf844b28da863b4b475a4480fe830239d46040', slot: "description" }, wp.i18n.__('Discounts', 'surecart')), index.h("span", { key: '9467b071fc2e2b79d11ab7dff74375b90ac65dce', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_j = this.order) === null || _j === void 0 ? void 0 : _j.discounts_display))), !!((_m = (_l = (_k = this.order) === null || _k === void 0 ? void 0 : _k.discount) === null || _l === void 0 ? void 0 : _l.promotion) === null || _m === void 0 ? void 0 : _m.code) && (index.h("sc-line-item", { key: '8484f4d4175fa89fe49bb729dd79a1fd3249dc91' }, index.h("span", { key: '4a8abd0512fc4675575f3bf8688de663c4156693', slot: "description" }, wp.i18n.__('Discount', 'surecart'), index.h("br", { key: '8eb08ce5c6acff1bba0fd0256dd4426133717f02' }), index.h("sc-tag", { key: 'f1ed9ed0ef73f651822a7adbf6edf2ae070b50b0', type: "success" }, wp.i18n.__('Coupon:', 'surecart'), " ", (_q = (_p = (_o = this.order) === null || _o === void 0 ? void 0 : _o.discount) === null || _p === void 0 ? void 0 : _p.promotion) === null || _q === void 0 ? void 0 :
            _q.code)), index.h("span", { key: '0c160559dd38bf2e8b72489eaf5d8a66b390b4bc', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_r = this.order) === null || _r === void 0 ? void 0 : _r.discounts_display_amount))), !!((_s = this.order) === null || _s === void 0 ? void 0 : _s.shipping_amount) && (index.h(index.Fragment, { key: 'c0593475830b765f3244ed38f321e7876dbcd7b1' }, index.h("sc-line-item", { key: 'a435f6db7ed208b2d07a1350ff0cb488904ae6a4' }, index.h("span", { key: 'e702fdc25abf5833bfb4114f7a6cbe6539f0169c', slot: "description" }, `${wp.i18n.__('Shipping', 'surecart')} ${shippingMethodName ? `(${shippingMethodName})` : ''}`), index.h("span", { key: '2d77d91376e4dbd34248e91a3015ed2b4dc154d7', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_t = this.order) === null || _t === void 0 ? void 0 : _t.shipping_display_amount)), this.renderShippingFees(this.order))), !!((_u = this.order) === null || _u === void 0 ? void 0 : _u.tax_amount) && (index.h("sc-line-item", { key: '0132f8dcbd1bc148bea1a8c487452e4a3adc4070' }, index.h("span", { key: 'dcf4ed094ea177c135b5d3cc0821e15872d91938', slot: "description" }, `${tax.formatTaxDisplay((_v = this.order) === null || _v === void 0 ? void 0 : _v.tax_label, ((_w = this.order) === null || _w === void 0 ? void 0 : _w.tax_status) === 'estimated')} (${(_x = this.order) === null || _x === void 0 ? void 0 : _x.tax_percent}%)`), index.h("span", { key: '4f22f3afdad0861439463605ecf6a08bf8564b6d', slot: "price" }, (_y = this.order) === null || _y === void 0 ? void 0 : _y.tax_display_amount), !!((_z = this.order) === null || _z === void 0 ? void 0 : _z.tax_inclusive_amount) && index.h("span", { key: 'edc1334cece0eee79ac24e91c7794730bedafe7f', slot: "price-description" }, `(${wp.i18n.__('included', 'surecart')})`))), index.h("sc-divider", { key: 'a86e8846701fa1a12e06772eca631206f458aa5c', style: { '--spacing': 'var(--sc-spacing-x-small)' } }), index.h("sc-line-item", { key: '7f7c39fba5c6ba0d6922099a6fdad255bb72f45f', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: 'b49b979bb398014f5228b0e349792fa671549347', slot: "title" }, wp.i18n.__('Total', 'surecart')), index.h("span", { key: '7fbf29e845d9e5daa14fda34e287a3da1d9e7b00', slot: "price" }, (_0 = this.order) === null || _0 === void 0 ? void 0 : _0.total_display_amount), index.h("span", { key: 'eb28ef99c7ed7b1f1e4dbc2950e9914c3ba9dda2', slot: "currency" }, (_1 = this.order) === null || _1 === void 0 ? void 0 : _1.currency)), !!((_2 = this.order) === null || _2 === void 0 ? void 0 : _2.proration_amount) && (index.h("sc-line-item", { key: '1f2c6e3da74277064a22b099455416a96a596506' }, index.h("span", { key: 'b19b1092fa69f8518b54964c0d9b15e4092c6e1a', slot: "description" }, wp.i18n.__('Proration', 'surecart')), index.h("span", { key: '649f7d56f03a7fe913e1ce97a0c25fcbd3299c5d', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_3 = this.order) === null || _3 === void 0 ? void 0 : _3.proration_display_amount))), !!((_4 = this.order) === null || _4 === void 0 ? void 0 : _4.applied_balance_amount) && (index.h("sc-line-item", { key: '4ee32fdc275efbeca7a251fe5acee1f2d68952df' }, index.h("span", { key: '3938af2363531762c10c31a4767c6ba957cd0d16', slot: "description" }, wp.i18n.__('Applied Balance', 'surecart')), index.h("span", { key: '863f02eeff445b985385e67cec6f524db80a4549', style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            }, slot: "price" }, (_5 = this.order) === null || _5 === void 0 ? void 0 : _5.applied_balance_display_amount))), !!((_6 = this.order) === null || _6 === void 0 ? void 0 : _6.credited_balance_amount) && (index.h("sc-line-item", { key: 'f63f89fadb78da92afbd4eb1eefc6c112ba08ef7' }, index.h("span", { key: 'dff7958606db4caab38d94faee56b231d544233e', slot: "description" }, wp.i18n.__('Credited Balance', 'surecart')), index.h("span", { key: '90f2a1854ce725c97c70af08d7d5572a52edfce5', slot: "price", style: {
                'font-weight': 'var(--sc-font-weight-semibold)',
                'color': 'var(--sc-color-gray-800)',
            } }, (_7 = this.order) === null || _7 === void 0 ? void 0 : _7.credited_balance_display_amount))), ((_8 = this.order) === null || _8 === void 0 ? void 0 : _8.amount_due) !== ((_9 = this.order) === null || _9 === void 0 ? void 0 : _9.total_amount) && (index.h("sc-line-item", { key: 'f490c37e1f31da787cd38d11c7059a4e913177c6', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '154f0e56bacb3579c18d4376c4fe19d18126f967', slot: "title" }, wp.i18n.__('Amount Due', 'surecart')), index.h("span", { key: 'f9864200fc4dcc8ccca093ab7549804d819774af', slot: "price" }, (_10 = this.order) === null || _10 === void 0 ? void 0 : _10.amount_due_display_amount), index.h("span", { key: 'a728e42262c051582ecb0d59962b9a44c6e81657', slot: "currency" }, (_11 = this.order) === null || _11 === void 0 ? void 0 : _11.currency))), index.h("sc-divider", { key: 'c5f2db80877dbced4d04a09da74dfe386fd47ccc', style: { '--spacing': 'var(--sc-spacing-x-small)' } }), !!((_12 = this.order) === null || _12 === void 0 ? void 0 : _12.paid_amount) && (index.h("sc-line-item", { key: 'afbf492b9f2a68d84f09b7a274d8f02419e6b81d', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '523a55a6287ded1d06fab9ebb22596c3b2ef1f88', slot: "title" }, wp.i18n.__('Paid', 'surecart')), index.h("span", { key: 'cdf04cae299376917bef573197e1c2bd4f25d4e1', slot: "price" }, (_13 = this.order) === null || _13 === void 0 ? void 0 : _13.paid_display_amount), index.h("span", { key: '8bb3e544b59147c2d8be9aa3e57363115fecb93c', slot: "currency" }, (_14 = this.order) === null || _14 === void 0 ? void 0 : _14.currency))), !!((_15 = this.order) === null || _15 === void 0 ? void 0 : _15.refunded_amount) && (index.h(index.Fragment, { key: '766138ad5832bfb92fc5e86bce66a87593b567f3' }, index.h("sc-line-item", { key: '2bd1f3b46c042f61d5af15826b4dcba38f920475', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: 'e237ff16b6398746c0f168a62585e28edbb05da9', slot: "description" }, wp.i18n.__('Refunded', 'surecart')), index.h("span", { key: '5b94743cc9b01410b3dfba2268d869459749179d', slot: "price" }, (_16 = this.order) === null || _16 === void 0 ? void 0 : _16.refunded_display_amount)), index.h("sc-line-item", { key: '6190484b2858e04b1d67ec8575595d48f90d17a6', style: {
                'width': '100%',
                '--price-size': 'var(--sc-font-size-x-large)',
            } }, index.h("span", { key: '0e66b1a266262237e732f05eb35714d5acca07cb', slot: "title" }, wp.i18n.__('Net Payment', 'surecart')), index.h("span", { key: '22055e65e2ab19774a20fd0dd5ecea1020255318', slot: "price" }, (_17 = this.order) === null || _17 === void 0 ? void 0 : _17.net_paid_display_amount)))), ((_18 = this.order) === null || _18 === void 0 ? void 0 : _18.tax_reverse_charged_amount) > 0 && (index.h("sc-line-item", { key: 'c161f44d139f60067668c9e8649a6b00595616d8' }, index.h("span", { key: '60e846ddca59a293d77a7f662cad6527c6bc965e', slot: "description" }, wp.i18n.__('*Tax to be paid on reverse charge basis', 'surecart'))))));
    }
};
consumer.openWormhole(ScOrderConfirmationTotals, ['order', 'busy', 'loading', 'empty'], false);
ScOrderConfirmationTotals.style = ScOrderConfirmationTotalsStyle0;

exports.sc_order_confirmation_line_items = ScOrderConfirmationLineItems;
exports.sc_order_confirmation_totals = ScOrderConfirmationTotals;

//# sourceMappingURL=sc-order-confirmation-line-items_2.cjs.entry.js.map