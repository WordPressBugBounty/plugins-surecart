import { r as registerInstance, h, a as getElement } from './index-25e5af33.js';
import { i as isRtl } from './page-align-0cdacf32.js';

const scLineItemCss = ":host{display:block;--mobile-size:380px;--price-size:var(--sc-font-size-medium);--line-item-grid-template-columns:auto 1fr 1fr;line-height:var(--sc-line-height-dense)}.item{display:grid;align-items:center;grid-template-columns:var(--line-item-grid-template-columns)}@media screen and (min-width: var(--mobile-size)){.item{flex-wrap:no-wrap}}.item__title{color:var(--sc-line-item-title-color)}.item__price{color:var(--sc-input-label-color)}.item__title,.item__price{font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-semibold)}.item__description,.item__price-description{font-size:var(--sc-font-size-small);line-height:var(--sc-line-height-dense);color:var(--sc-input-label-color)}::slotted([slot=price-description]){margin-top:var(--sc-line-item-text-margin, 5px);color:var(--sc-input-label-color);text-decoration:none}.item__end{flex:1;display:flex;align-items:center;justify-content:flex-end;flex-wrap:wrap;align-self:flex-end;width:100%;margin-top:20px}@media screen and (min-width: 280px){.item__end{width:auto;text-align:right;margin-left:20px;margin-top:0}.item--is-rtl .item__end{margin-left:0;margin-right:20px}.item__price-text{text-align:right;display:flex;flex-direction:column;align-items:flex-end}}.item__price-currency{font-size:var(--sc-font-size-small);color:var(--sc-input-label-color);text-transform:var(--sc-currency-transform, uppercase);margin-right:8px}.item__text{flex:1}.item__price-description{display:-webkit-box}::slotted([slot=image]){margin-right:20px;width:50px;height:50px;object-fit:cover;border-radius:4px;border:1px solid var(--sc-color-gray-200);display:block;box-shadow:var(--sc-input-box-shadow)}::slotted([slot=price-description]){display:inline-block;width:100%;line-height:1}.item__price-layout{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-semibold);display:flex;align-items:center}.item__price{font-size:var(--price-size)}.item_currency{font-weight:var(--sc-font-weight-normal);font-size:var(--sc-font-size-xx-small);color:var(--sc-input-label-color);margin-right:var(--sc-spacing-small);text-transform:var(--sc-currency-text-transform, uppercase)}.item--is-rtl.item__description,.item--is-rtl.item__price-description{text-align:right}.item--is-rtl .item__text{text-align:right}@media screen and (min-width: 280px){.item--is-rtl .item__end{width:auto;text-align:left;margin-left:0;margin-top:0}.item--is-rtl .item__price-text{text-align:left}}";
const ScLineItemStyle0 = scLineItemCss;

const ScLineItem = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
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
        return (h("div", { key: '374d086feda5b8e0bd6484d3630f1a979d05830a', part: "base", class: {
                'item': true,
                'item--has-image': this.hasImageSlot,
                'item--has-title': this.hasTitleSlot,
                'item--has-description': this.hasDescriptionSlot,
                'item--has-price': this.hasPriceSlot,
                'item--has-price-description': this.hasPriceDescriptionSlot,
                'item--has-price-currency': this.hasCurrencySlot,
                'item--is-rtl': isRtl(),
            } }, h("div", { key: '8987f550f3449bce74d87b3a8868e587a51cb98c', class: "item__image", part: "image" }, h("slot", { key: '3029076c72c6d73b5c9caa5249d57d0bb22d22ba', name: "image" })), h("div", { key: '897c3aa94f26a6e73e9783ebb7562e7144d1bb6f', class: "item__text", part: "text" }, h("div", { key: 'b8d4cb8cb0445e89ed3fb30119b29d6374aa3eda', class: "item__title", part: "title" }, h("slot", { key: '73e0d8df7fa2cdaa23ddc65a5f9967afb90dbd58', name: "title" })), h("div", { key: 'f42c26356c5d10e0f3a580a4f1f4c92ed4ff1e7a', class: "item__description", part: "description" }, h("slot", { key: 'bfd49bd48abc767eb9103f6d377d776e83d7beed', name: "description" }))), h("div", { key: '26bff243074f0a7d5f9acd3525f76234d0ccbdbc', class: "item__end", part: "price" }, h("div", { key: '39b5b8bcbedc01024ed9e3e560dd67daa6fc794c', class: "item__price-currency", part: "currency" }, h("slot", { key: '7734c13cdf3230d29ec5e10f973c26d7d10e9482', name: "currency" })), h("div", { key: '1bf70a5995be8cc681c8c3ed194efd1d77bfaccf', class: "item__price-text", part: "price-text" }, h("div", { key: '13a2e68e2b8d14ef6e4628a18a9d062cbfb7d311', class: "item__price", part: "price" }, h("slot", { key: '0902076fd82e4c89e94cb1434479a074db9bdbd2', name: "price" })), h("div", { key: '993d0cd37a810d0ebfcbbc659b5bb1889514fc3c', class: "item__price-description", part: "price-description" }, h("slot", { key: '0def82ed1c66934ebbd257b7645ddea8a86167f4', name: "price-description" }))))));
    }
    get hostElement() { return getElement(this); }
};
ScLineItem.style = ScLineItemStyle0;

export { ScLineItem as sc_line_item };

//# sourceMappingURL=sc-line-item.entry.js.map