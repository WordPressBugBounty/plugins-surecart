import{proxyCustomElement,HTMLElement,createEvent,h}from"@stencil/core/internal/client";import{a as apiFetch}from"./fetch.js";import{a as getHumanDiscount}from"./price.js";import{d as defineCustomElement$7}from"./sc-alert2.js";import{d as defineCustomElement$6}from"./sc-block-ui2.js";import{d as defineCustomElement$5}from"./sc-button2.js";import{d as defineCustomElement$4}from"./sc-dashboard-module2.js";import{d as defineCustomElement$3}from"./sc-flex2.js";import{d as defineCustomElement$2}from"./sc-icon2.js";import{d as defineCustomElement$1}from"./sc-spinner2.js";import{a as addQueryArgs}from"./add-query-args.js";const replaceAmount=(e,t,s="amount")=>e.replaceAll("{{"+s+"}}",t).replaceAll("{{ "+s+" }}",t),replaceAmountFromString=(e,t)=>(null==t?void 0:t.preservation_coupon)?replaceAmount(e,getHumanDiscount(null==t?void 0:t.preservation_coupon)):e,getCurrentBehaviourContent=(e,t)=>{const{preserve_title:s,preserve_description:n,preserve_button:o,cancel_link:c}=(null==e?void 0:e.preservation_locales)||{};return t?{title:replaceAmountFromString(wp.i18n.__("Your {{ amount }} discount is still active.","surecart"),e),description:replaceAmountFromString(wp.i18n.__("You have a {{ amount }} discount active. Cancelling now will forfeit this discount forever. Are you sure you wish to cancel?","surecart"),e),button:wp.i18n.__("Keep My Discount","surecart"),cancel_link:wp.i18n.__("Cancel Anyway","surecart")}:{title:replaceAmountFromString(s,e),description:replaceAmountFromString(n,e),button:o,cancel_link:c}},scCancelDiscountCss=".cancel-discount__abort-link{color:var(--sc-color-gray-500)}",ScCancelDiscountStyle0=scCancelDiscountCss,ScCancelDiscount=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.scCancel=createEvent(this,"scCancel",7),this.scPreserved=createEvent(this,"scPreserved",7),this.subscription=void 0,this.reason=void 0,this.comment=void 0,this.protocol=void 0,this.loading=void 0,this.error=void 0}async addDiscount(){var e,t;try{this.loading=!0,this.subscription=await apiFetch({method:"PATCH",path:addQueryArgs(`surecart/v1/subscriptions/${null===(e=this.subscription)||void 0===e?void 0:e.id}/preserve`,{cancellation_act:{...this.comment?{comment:this.comment}:{},cancellation_reason_id:null===(t=this.reason)||void 0===t?void 0:t.id}})}),this.scPreserved.emit()}catch(e){console.error(e),this.error=e}finally{this.loading=!1}}hasDiscount(){var e,t;return!!(null===(t=null===(e=this.subscription)||void 0===e?void 0:e.discount)||void 0===t?void 0:t.id)}render(){var e,t;const{title:s,description:n,button:o,cancel_link:c}=getCurrentBehaviourContent(this.protocol,null===(t=null===(e=this.subscription)||void 0===e?void 0:e.discount)||void 0===t?void 0:t.id);return h("div",{key:"75800328815ee488f0ac0aa33b8497c8f348de26",class:"cancel-discount"},h("sc-dashboard-module",{key:"76bc38ea00f23c7d48da40a28501c1534f8e34fc",heading:s,style:{"--sc-dashboard-module-spacing":"2em"}},h("span",{key:"8b68bb03cd315d86b215f26c66dac9220e0ecbc3",slot:"description"},n),h("sc-flex",{key:"3c1939f1712f2299aea7dee921137b58a27c8a43",justifyContent:"flex-start"},h("sc-button",{key:"d4d60e7be1bfe6570ee4b931203c93356bd1adbd",type:"primary",onClick:()=>this.addDiscount()},o),h("sc-button",{key:"e3f52a1134ea9d5814881e121d2fa22598527227",class:"cancel-discount__abort-link",type:"text",onClick:()=>this.scCancel.emit()},c)),!!this.loading&&h("sc-block-ui",{key:"6ac29078600f6c53e221baaaa2d73192f531e48c",spinner:!0})))}static get style(){return ScCancelDiscountStyle0}},[1,"sc-cancel-discount",{subscription:[16],reason:[16],comment:[1],protocol:[16],loading:[32],error:[32]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-cancel-discount","sc-alert","sc-block-ui","sc-button","sc-dashboard-module","sc-flex","sc-icon","sc-spinner"].forEach((e=>{switch(e){case"sc-cancel-discount":customElements.get(e)||customElements.define(e,ScCancelDiscount);break;case"sc-alert":customElements.get(e)||defineCustomElement$7();break;case"sc-block-ui":customElements.get(e)||defineCustomElement$6();break;case"sc-button":customElements.get(e)||defineCustomElement$5();break;case"sc-dashboard-module":customElements.get(e)||defineCustomElement$4();break;case"sc-flex":customElements.get(e)||defineCustomElement$3();break;case"sc-icon":customElements.get(e)||defineCustomElement$2();break;case"sc-spinner":customElements.get(e)||defineCustomElement$1()}}))}export{ScCancelDiscount as S,defineCustomElement as d};