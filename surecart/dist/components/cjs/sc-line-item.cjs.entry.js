'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const pageAlign = require('./page-align-5a2ab493.js');

const scLineItemCss = ":host{display:block;--mobile-size:380px;--price-size:var(--sc-font-size-medium);--line-item-grid-template-columns:auto 1fr 1fr;line-height:var(--sc-line-height-dense)}.item{display:grid;align-items:center;grid-template-columns:var(--line-item-grid-template-columns)}@media screen and (min-width: var(--mobile-size)){.item{flex-wrap:no-wrap}}.item__title{color:var(--sc-line-item-title-color)}.item__price{color:var(--sc-input-label-color)}.item__title,.item__price{font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-semibold)}.item__description,.item__price-description{font-size:var(--sc-font-size-small);line-height:var(--sc-line-height-dense);color:var(--sc-input-label-color)}::slotted([slot=price-description]){margin-top:var(--sc-line-item-text-margin, 5px);color:var(--sc-input-label-color);text-decoration:none}.item__end{flex:1;display:flex;align-items:center;justify-content:flex-end;flex-wrap:wrap;align-self:flex-end;width:100%;margin-top:20px}@media screen and (min-width: 280px){.item__end{width:auto;text-align:right;margin-left:20px;margin-top:0}.item--is-rtl .item__end{margin-left:0;margin-right:20px}.item__price-text{text-align:right;display:flex;flex-direction:column;align-items:flex-end}}.item__price-currency{font-size:var(--sc-font-size-small);color:var(--sc-input-label-color);text-transform:var(--sc-currency-transform, uppercase);margin-right:8px}.item__text{flex:1}.item__price-description{display:-webkit-box}::slotted([slot=image]){margin-right:20px;width:50px;height:50px;object-fit:cover;border-radius:4px;border:1px solid var(--sc-color-gray-200);display:block;box-shadow:var(--sc-input-box-shadow)}::slotted([slot=price-description]){display:inline-block;width:100%;line-height:1}.item__price-layout{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-semibold);display:flex;align-items:center}.item__price{font-size:var(--price-size)}.item_currency{font-weight:var(--sc-font-weight-normal);font-size:var(--sc-font-size-xx-small);color:var(--sc-input-label-color);margin-right:var(--sc-spacing-small);text-transform:var(--sc-currency-text-transform, uppercase)}.item--is-rtl.item__description,.item--is-rtl.item__price-description{text-align:right}.item--is-rtl .item__text{text-align:right}@media screen and (min-width: 280px){.item--is-rtl .item__end{width:auto;text-align:left;margin-left:0;margin-top:0}.item--is-rtl .item__price-text{text-align:left}}";
const ScLineItemStyle0 = scLineItemCss;

const ScLineItem = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.price = undefined;
        this.currency = undefined;
        this.hasImageSlot = undefined;
        this.hasTitleSlot = undefined;
        this.hasDescriptionSlot = undefined;
        this.hasPriceSlot = undefined;
        this.hasPriceDescriptionSlot = undefined;
        this.hasCurrencySlot = undefined;
    }
    componentWillLoad() {
        this.hasImageSlot = !!this.hostElement.querySelector('[slot="image"]');
        this.hasTitleSlot = !!this.hostElement.querySelector('[slot="title"]');
        this.hasDescriptionSlot = !!this.hostElement.querySelector('[slot="description"]');
        this.hasPriceSlot = !!this.hostElement.querySelector('[slot="price"]');
        this.hasPriceDescriptionSlot = !!this.hostElement.querySelector('[slot="price-description"]');
        this.hasCurrencySlot = !!this.hostElement.querySelector('[slot="currency"]');
    }
    render() {
        return (index.h("div", { key: '5c4eccfa1eab08d764fb031f906550bf893d6391', part: "base", class: {
                'item': true,
                'item--has-image': this.hasImageSlot,
                'item--has-title': this.hasTitleSlot,
                'item--has-description': this.hasDescriptionSlot,
                'item--has-price': this.hasPriceSlot,
                'item--has-price-description': this.hasPriceDescriptionSlot,
                'item--has-price-currency': this.hasCurrencySlot,
                'item--is-rtl': pageAlign.isRtl(),
            } }, index.h("div", { key: '59cefc50672f033fedd477937df2299a22c118d0', class: "item__image", part: "image" }, index.h("slot", { key: '291693625d6732d2f4573d79189d95728e716fcb', name: "image" })), index.h("div", { key: '484bc86ebb738532f672d584391903086c12dd90', class: "item__text", part: "text" }, index.h("div", { key: 'a0339d24e8fc37335098be84dc0fac3a4b88897f', class: "item__title", part: "title" }, index.h("slot", { key: 'e282ae8057aa5b6325d8286de3f62c2a864eada2', name: "title" })), index.h("div", { key: '00bddf9639bde33428ceb60943c062b4b987eb14', class: "item__description", part: "description" }, index.h("slot", { key: 'be2a0b847b360c98a881170a91d9c834f8f89e58', name: "description" }))), index.h("div", { key: '65ba9bc4109adb10534c70376582e2daa740496d', class: "item__end", part: "price" }, index.h("div", { key: 'a627018c185a991e5fb0425c05517afb2bcdc41d', class: "item__price-currency", part: "currency" }, index.h("slot", { key: '6a8eae24f3f661c40265d164d8fceda78ce426ac', name: "currency" })), index.h("div", { key: 'db15d47647deacd45d436e4fd5f88b0036b01cb6', class: "item__price-text", part: "price-text" }, index.h("div", { key: '4ad887062b2f934e232a33fc7b1cf12c444cf0f9', class: "item__price", part: "price" }, index.h("slot", { key: '340c9d822dfd16113bcf0ff02f2091863856864e', name: "price" })), index.h("div", { key: '2f341a200df1ee5c165fb963e9581cd38d8989cd', class: "item__price-description", part: "price-description" }, index.h("slot", { key: '17aef99cf92fca232003ef49f81e17ae7f32badb', name: "price-description" }))))));
    }
    get hostElement() { return index.getElement(this); }
};
ScLineItem.style = ScLineItemStyle0;

exports.sc_line_item = ScLineItem;

//# sourceMappingURL=sc-line-item.cjs.entry.js.map