import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{d as defineCustomElement$1}from"./sc-prose2.js";const scManualPaymentMethodCss=":host {\n  display: block;\n}\n\n.manual-payment-method {\n  display: flex;\n  align-items: center;\n  justify-content: flex-start;\n  gap: var(--sc-spacing-x-small);\n  flex-wrap: wrap;\n\n  &__title {\n    font-weight: var(--sc-font-weight-bold);\n    color: var(--sc-primary-color-900);\n  }\n\n  &__description {\n    color: var(--sc-primary-color-600);\n  }\n}\n",ScManualPaymentMethodStyle0=scManualPaymentMethodCss,ScManualPaymentMethod=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.paymentMethod=void 0,this.showDescription=!1}render(){var e,t;return h("div",{key:"47bed3b41ae0903839c7c4891098925221ee6824",class:"manual-payment-method",part:"card"},h("div",{key:"888d64e79bf95c316383f18ea42d417823b991ab",class:"payment-method__title"},null===(e=this.paymentMethod)||void 0===e?void 0:e.name),this.showDescription&&h("sc-prose",{key:"b720bff65e2818dfdd444b216b9b3792db9ee7f4",class:"payment-method__description",innerHTML:null===(t=this.paymentMethod)||void 0===t?void 0:t.description}))}static get style(){return ScManualPaymentMethodStyle0}},[1,"sc-manual-payment-method",{paymentMethod:[16],showDescription:[4,"show-description"]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-manual-payment-method","sc-prose"].forEach((e=>{switch(e){case"sc-manual-payment-method":customElements.get(e)||customElements.define(e,ScManualPaymentMethod);break;case"sc-prose":customElements.get(e)||defineCustomElement$1()}}))}export{ScManualPaymentMethod as S,defineCustomElement as d};