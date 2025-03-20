import{proxyCustomElement,HTMLElement,h,Host}from"@stencil/core/internal/client";import{s as se}from"./inline.js";import{a as apiFetch}from"./fetch.js";import{d as defineCustomElement$5}from"./sc-alert2.js";import{d as defineCustomElement$4}from"./sc-button2.js";import{d as defineCustomElement$3}from"./sc-icon2.js";import{d as defineCustomElement$2}from"./sc-spinner2.js";const scPaystackAddMethodCss=":host{display:block}",ScPaystackAddMethodStyle0=":host{display:block}",ScPaystackAddMethod$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.liveMode=!0,this.customerId=void 0,this.successUrl=void 0,this.currency=void 0,this.loading=void 0,this.loaded=void 0,this.error=void 0,this.paymentIntent=void 0}async handlePaymentIntentCreate(){var e,t;const{public_key:s,access_code:n}=(null===(t=null===(e=this.paymentIntent)||void 0===e?void 0:e.processor_data)||void 0===t?void 0:t.paystack)||{};if(!s||!n)return;const a=new se;await a.newTransaction({key:s,accessCode:n,onSuccess:async e=>{if("success"!==(null==e?void 0:e.status))throw{message:wp.i18n.sprintf(wp.i18n.__("Paystack transaction could not be finished. Status: %s","surecart"),null==e?void 0:e.status)};window.location.assign(this.successUrl)},onClose:e=>{console.error(e),alert((null==e?void 0:e.message)||wp.i18n.__("The payment did not process. Please try again.","surecart"))}})}async createPaymentIntent(){var e,t;try{this.loading=!0,this.error="",this.paymentIntent=await apiFetch({method:"POST",path:"surecart/v1/payment_intents",data:{processor_type:"paystack",reusable:!0,live_mode:this.liveMode,customer_id:this.customerId,currency:this.currency,refresh_status:!0}})}catch(s){this.error=(null===(t=null===(e=null==s?void 0:s.additional_errors)||void 0===e?void 0:e[0])||void 0===t?void 0:t.message)||(null==s?void 0:s.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=!1}}render(){return h(Host,{key:"c7834e27c130521d7944a6df4adc15bccdfdf67e"},this.error&&h("sc-alert",{key:"c0f0ff2bcf73e6e18b513275cecf6092d0b6d84d",open:!!this.error,type:"danger"},h("span",{key:"050c49e02d40ae4c6d62da7c4a67219723b6ac31",slot:"title"},wp.i18n.__("Error","surecart")),this.error),h("div",{key:"131c553e7867a53bbbf586609df2e97066f4c7a4",class:"sc-paystack-button-container"},h("sc-alert",{key:"95f980fbf168fdc9fd528846ed0ae983eeb6c161",open:!0,type:"warning"},wp.i18n.__("In order to add a new card, we will need to make a small transaction to authenticate it. This is for authentication purposes and will be immediately refunded.","surecart"),h("div",{key:"d8b8bdce1b6d20c48442fe755c92e07ded997893"},h("sc-button",{key:"e579bcf3a4d801c1981a8ee97450043c544b989f",loading:this.loading,type:"primary",onClick:()=>this.createPaymentIntent(),style:{marginTop:"var(--sc-spacing-medium)"}},wp.i18n.__("Add New Card","surecart"))))))}static get watchers(){return{paymentIntent:["handlePaymentIntentCreate"]}}static get style(){return":host{display:block}"}},[0,"sc-paystack-add-method",{liveMode:[4,"live-mode"],customerId:[1,"customer-id"],successUrl:[1,"success-url"],currency:[1],loading:[32],loaded:[32],error:[32],paymentIntent:[32]},void 0,{paymentIntent:["handlePaymentIntentCreate"]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-paystack-add-method","sc-alert","sc-button","sc-icon","sc-spinner"].forEach((e=>{switch(e){case"sc-paystack-add-method":customElements.get(e)||customElements.define(e,ScPaystackAddMethod$1);break;case"sc-alert":customElements.get(e)||defineCustomElement$5();break;case"sc-button":customElements.get(e)||defineCustomElement$4();break;case"sc-icon":customElements.get(e)||defineCustomElement$3();break;case"sc-spinner":customElements.get(e)||defineCustomElement$2()}}))}const ScPaystackAddMethod=ScPaystackAddMethod$1,defineCustomElement=defineCustomElement$1;export{ScPaystackAddMethod,defineCustomElement};