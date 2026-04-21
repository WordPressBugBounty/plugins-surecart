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
        return (index.h("div", { key: '25c4d29e2997057567cd934a57a1f0ce6ed00cc0', part: "base", class: {
                'item': true,
                'item--has-image': this.hasImageSlot,
                'item--has-title': this.hasTitleSlot,
                'item--has-description': this.hasDescriptionSlot,
                'item--has-price': this.hasPriceSlot,
                'item--has-price-description': this.hasPriceDescriptionSlot,
                'item--has-price-currency': this.hasCurrencySlot,
                'item--is-rtl': pageAlign.isRtl(),
            } }, index.h("div", { key: 'd3d2badb573efba37856667d90941d459eea5d0e', class: "item__image", part: "image" }, index.h("slot", { key: 'bb25f2e7208462a6cd2c148584fe61e897aab6cd', name: "image" })), index.h("div", { key: '47a40bc308d81afca239b85b6c7726d2d0536193', class: "item__text", part: "text" }, index.h("div", { key: '8ece874d0a37ecee88f7998b186044a0a665ee64', class: "item__title", part: "title" }, index.h("slot", { key: 'b574c7b91127613039ca7524fc42328f86f4ca68', name: "title" })), index.h("div", { key: 'cad82c24f0c7587b1ac5a4b3748410815c994720', class: "item__description", part: "description" }, index.h("slot", { key: 'bacd59ec6ff125674728ce83738cb9252d57e175', name: "description" }))), index.h("div", { key: '2957202b074019a3f01e04786814a2c05bff1073', class: "item__end", part: "price" }, index.h("div", { key: '4e979dfb01632ea2bf33bdb6f5b4e9df2541349e', class: "item__price-currency", part: "currency" }, index.h("slot", { key: '13a37d8aa4b6bb23f4cce3b2b15071943ef9a936', name: "currency" })), index.h("div", { key: '2affb45bd07a11e51c4f0905f764cba81cdd2e0f', class: "item__price-text", part: "price-text" }, index.h("div", { key: 'e5cb36e2f1aa9904615dc1eeae825a6efc7d6b10', class: "item__price", part: "price" }, index.h("slot", { key: '409ac5293728cba1c119433a6ae2777ed5a40a61', name: "price" })), index.h("div", { key: '84ca08f13108a73a7fa17ba7d654431bdbb71ae5', class: "item__price-description", part: "price-description" }, index.h("slot", { key: 'e128f197b0ac57673c62fcd736ad4fa51cc20024', name: "price-description" }))))));
    }
    get hostElement() { return index.getElement(this); }
};
ScLineItem.style = ScLineItemStyle0;

exports.sc_line_item = ScLineItem;

//# sourceMappingURL=sc-line-item.cjs.entry.js.map