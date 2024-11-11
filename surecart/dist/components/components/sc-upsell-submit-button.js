import{proxyCustomElement,HTMLElement,h,Host}from"@stencil/core/internal/client";import"./watchers2.js";import{s as state}from"./store.js";import{s as state$1}from"./store2.js";import{i as isProductOutOfStock,c as isSelectedVariantMissing}from"./watchers.js";import{a as accept}from"./mutations.js";import{c as isBusy}from"./getters.js";const scUpsellSubmitButtonCss="sc-upsell-submit-button{position:relative;display:block}sc-upsell-submit-button .wp-block-button__link{position:relative;text-decoration:none}sc-upsell-submit-button .wp-block-button__link span sc-icon{padding-right:var(--sc-spacing-small)}sc-upsell-submit-button .wp-block-button__link [data-text],sc-upsell-submit-button .wp-block-button__link sc-spinner{display:flex;align-items:center;justify-content:center}sc-upsell-submit-button .sc-block-button--sold-out,sc-upsell-submit-button .sc-block-button--unavailable{display:none !important}sc-upsell-submit-button.is-unavailable .sc-block-button__link{display:none !important}sc-upsell-submit-button.is-unavailable .sc-block-button--unavailable{display:initial !important}sc-upsell-submit-button.is-sold-out .sc-block-button__link{display:none !important}sc-upsell-submit-button.is-sold-out .sc-block-button--sold-out{display:initial !important}sc-upsell-submit-button sc-spinner::part(base){--indicator-color:currentColor;--spinner-size:12px;position:absolute;top:calc(50% - var(--spinner-size) + var(--spinner-size) / 4);left:calc(50% - var(--spinner-size) + var(--spinner-size) / 4)}sc-upsell-submit-button [data-text],sc-upsell-submit-button [data-loader]{transition:opacity var(--sc-transition-fast) ease-in-out, visibility var(--sc-transition-fast) ease-in-out}sc-upsell-submit-button [data-loader]{opacity:0;visibility:hidden}sc-upsell-submit-button.is-disabled{pointer-events:none}sc-upsell-submit-button.is-busy [data-text]{opacity:0;visibility:hidden}sc-upsell-submit-button.is-busy [data-loader]{opacity:1;visibility:visible}sc-upsell-submit-button.is-out-of-stock [data-text]{opacity:0.6}",ScUpsellSubmitButtonStyle0=scUpsellSubmitButtonCss,ScUpsellSubmitButton$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost()}getUpsellProductId(){var t;return(null===(t=state.product)||void 0===t?void 0:t.id)||""}async handleAddToOrderClick(t){t.preventDefault(),accept()}render(){return h(Host,{key:"39347ac9caf2eb92dba20c1a77d9d74fe2bfe389",class:{"is-busy":isBusy(),"is-disabled":state.disabled,"is-sold-out":isProductOutOfStock(this.getUpsellProductId())&&!isSelectedVariantMissing(this.getUpsellProductId())||"out_of_stock"===(null==state$1?void 0:state$1.code),"is-unavailable":isSelectedVariantMissing(this.getUpsellProductId())||"expired"===(null==state$1?void 0:state$1.code)},onClick:t=>this.handleAddToOrderClick(t)},h("slot",{key:"63489ccd19bb85f1058ecca834bcfbab7c0c13a0"}))}get el(){return this}static get style(){return ScUpsellSubmitButtonStyle0}},[4,"sc-upsell-submit-button"]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-upsell-submit-button"].forEach((t=>{"sc-upsell-submit-button"===t&&(customElements.get(t)||customElements.define(t,ScUpsellSubmitButton$1))}))}const ScUpsellSubmitButton=ScUpsellSubmitButton$1,defineCustomElement=defineCustomElement$1;export{ScUpsellSubmitButton,defineCustomElement};