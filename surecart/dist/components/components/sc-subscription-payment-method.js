import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{a as apiFetch}from"./fetch.js";import{o as onFirstVisible}from"./lazy.js";import{d as defineCustomElement$p}from"./sc-alert2.js";import{d as defineCustomElement$o}from"./sc-block-ui2.js";import{d as defineCustomElement$n}from"./sc-button2.js";import{d as defineCustomElement$m}from"./sc-card2.js";import{d as defineCustomElement$l}from"./sc-cc-logo2.js";import{d as defineCustomElement$k}from"./sc-choice2.js";import{d as defineCustomElement$j}from"./sc-choices2.js";import{d as defineCustomElement$i}from"./sc-dashboard-module2.js";import{d as defineCustomElement$h}from"./sc-empty2.js";import{d as defineCustomElement$g}from"./sc-flex2.js";import{d as defineCustomElement$f}from"./sc-form2.js";import{d as defineCustomElement$e}from"./sc-form-control2.js";import{d as defineCustomElement$d}from"./sc-icon2.js";import{d as defineCustomElement$c}from"./sc-manual-payment-method2.js";import{d as defineCustomElement$b}from"./sc-payment-method2.js";import{d as defineCustomElement$a}from"./sc-prose2.js";import{d as defineCustomElement$9}from"./sc-skeleton2.js";import{d as defineCustomElement$8}from"./sc-spinner2.js";import{d as defineCustomElement$7}from"./sc-stacked-list2.js";import{d as defineCustomElement$6}from"./sc-stacked-list-row2.js";import{d as defineCustomElement$5}from"./sc-tag2.js";import{d as defineCustomElement$4}from"./sc-text2.js";import{d as defineCustomElement$3}from"./sc-tooltip2.js";import{d as defineCustomElement$2}from"./sc-visually-hidden2.js";import{a as addQueryArgs}from"./add-query-args.js";const scSubscriptionPaymentMethodCss=":host{display:block}",ScSubscriptionPaymentMethodStyle0=":host{display:block}",ScSubscriptionPaymentMethod$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.heading=void 0,this.subscription=void 0,this.paymentMethods=void 0,this.manualPaymentMethods=void 0,this.error=void 0,this.loading=void 0,this.busy=void 0,this.method=void 0}renderLoading(){return h("sc-card",{noPadding:!0},h("sc-stacked-list",null,h("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>h("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return h("slot",{name:"empty"},h("sc-card",null,h("sc-empty",{icon:"credit-card"},wp.i18n.__("You do not have any payment methods.","surecart"))))}currentPaymentMethodId(){var e,t,s,o,n;return(null===(e=this.subscription)||void 0===e?void 0:e.manual_payment)?null===(t=this.subscription)||void 0===t?void 0:t.manual_payment_method:(null===(o=null===(s=this.subscription)||void 0===s?void 0:s.payment_method)||void 0===o?void 0:o.id)||(null===(n=this.subscription)||void 0===n?void 0:n.payment_method)}hasPaymentMethods(){var e,t;return(null===(e=this.paymentMethods)||void 0===e?void 0:e.length)&&(null===(t=this.manualPaymentMethods)||void 0===t?void 0:t.length)}hasMultiplePaymentMethods(){var e;return(null===(e=[...(null==this?void 0:this.paymentMethods)||[],...(null==this?void 0:this.manualPaymentMethods)||[]])||void 0===e?void 0:e.length)>1}componentWillLoad(){onFirstVisible(this.el,(()=>{this.getPaymentMethods()}))}async getPaymentMethods(){var e,t,s;if(this.hasPaymentMethods())return;const o=(null===(t=null===(e=this.subscription)||void 0===e?void 0:e.customer)||void 0===t?void 0:t.id)||(null===(s=this.subscription)||void 0===s?void 0:s.customer);if(o)try{this.loading=!0,await this.fetchMethods(o)}catch(e){this.error=(null==e?void 0:e.messsage)||wp.i18n.__("Something went wrong","surecart"),console.error(this.error)}finally{this.loading=!1}}async fetchMethods(e){var t,s;this.paymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/payment_methods",{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],customer_ids:[e],reusable:!0,live_mode:null===(t=this.subscription)||void 0===t?void 0:t.live_mode})}),this.manualPaymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/manual_payment_methods",{customer_ids:[e],reusable:!0,live_mode:null===(s=this.subscription)||void 0===s?void 0:s.live_mode})})}async deleteMethod(e){if(confirm(wp.i18n.__("Are you sure you want to remove this payment method?","surecart")))try{this.busy=!0,await apiFetch({path:`surecart/v1/payment_methods/${null==e?void 0:e.id}/detach`,method:"PATCH"}),this.paymentMethods=this.paymentMethods.filter((t=>t.id!==e.id))}catch(e){this.error=(null==e?void 0:e.messsage)||wp.i18n.__("Something went wrong","surecart"),console.error(this.error)}finally{this.busy=!1}}async updateMethod(e){var t,s;const{payment_method:o}=await e.target.getFormJson();if(o!==this.currentPaymentMethodId())try{const e=(this.manualPaymentMethods||[]).some((e=>e.id===o));this.busy=!0,this.subscription=await apiFetch({path:`surecart/v1/subscriptions/${null===(t=this.subscription)||void 0===t?void 0:t.id}`,method:"PATCH",data:{...e?{manual_payment_method:o,manual_payment:!0}:{payment_method:o,manual_payment:!1}}}),window.location.assign(addQueryArgs(window.location.href,{action:"edit",model:"subscription",id:null===(s=this.subscription)||void 0===s?void 0:s.id}))}catch(e){this.error=(null==e?void 0:e.messsage)||wp.i18n.__("Something went wrong","surecart"),console.error(this.error)}finally{this.busy=!1}}renderContent(){var e,t;return this.loading?this.renderLoading():(null===(e=this.paymentMethods)||void 0===e?void 0:e.length)||(null===(t=this.manualPaymentMethods)||void 0===t?void 0:t.length)?h("sc-form",{onScSubmit:e=>this.updateMethod(e)},h("sc-choices",null,this.renderList()),this.hasMultiplePaymentMethods()&&h("sc-button",{type:"primary",submit:!0,full:!0,size:"large",busy:this.busy,disabled:this.busy},wp.i18n.__("Update Payment Method","surecart"))):this.renderEmpty()}renderList(){return[...this.paymentMethods.map((e=>{const{id:t,card:s,live_mode:o,paypal_account:n}=e;return h("sc-choice",{checked:this.currentPaymentMethodId()===t,name:"payment_method",value:t,required:!0},h("sc-flex",{justifyContent:"flex-start","align-items":"center"},h("sc-payment-method",{paymentMethod:e})," ",!o&&h("sc-tag",{type:"warning",size:"small"},wp.i18n.__("Test","surecart"))),h("div",{slot:"description"},!!(null==s?void 0:s.exp_month)&&h("span",null,
/** Translators: Credit Card Expires (Exp. 11/27) */
wp.i18n.__("Exp.","surecart"),null==s?void 0:s.exp_month,"/",null==s?void 0:s.exp_year),!!n&&(null==n?void 0:n.email)),this.currentPaymentMethodId()===t&&h("sc-tag",{type:"info",slot:"price"},wp.i18n.__("Current Payment Method","surecart")))})),...this.manualPaymentMethods.map((e=>{const{id:t}=e;return h("sc-choice",{checked:this.currentPaymentMethodId()===t,name:"payment_method",value:t,required:!0},h("sc-flex",{justifyContent:"flex-start","align-items":"center"},h("sc-manual-payment-method",{paymentMethod:e,showDescription:!0})),this.currentPaymentMethodId()===t&&h("sc-tag",{type:"info",slot:"price"},wp.i18n.__("Current Payment Method","surecart")))}))]}render(){var e;return h("sc-dashboard-module",{key:"8591a8386f0712aa959d02ca51a1408a5e3035c9",heading:this.heading||wp.i18n.__("Update Payment Method","surecart"),class:"subscription",error:this.error},h("sc-button",{key:"69a087c651b1b17deb52742d10157b63c9432799",slot:"end",type:"link",href:addQueryArgs(window.location.href,{action:"create",model:"payment_method",...!1===(null===(e=this.subscription)||void 0===e?void 0:e.live_mode)?{live_mode:!1}:{},success_url:window.location.href})},h("sc-icon",{key:"94862b4e53889722a467414eac861ab5adce1136",name:"plus",slot:"prefix"}),wp.i18n.__("Add New","surecart")),this.renderContent(),this.busy&&h("sc-block-ui",{key:"7a392456ac19a4cec9e53741fe1a7c19215e3181",spinner:!0}))}get el(){return this}static get style(){return":host{display:block}"}},[1,"sc-subscription-payment-method",{heading:[1],subscription:[16],paymentMethods:[32],manualPaymentMethods:[32],error:[32],loading:[32],busy:[32],method:[32]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-subscription-payment-method","sc-alert","sc-block-ui","sc-button","sc-card","sc-cc-logo","sc-choice","sc-choices","sc-dashboard-module","sc-empty","sc-flex","sc-form","sc-form-control","sc-icon","sc-manual-payment-method","sc-payment-method","sc-prose","sc-skeleton","sc-spinner","sc-stacked-list","sc-stacked-list-row","sc-tag","sc-text","sc-tooltip","sc-visually-hidden"].forEach((e=>{switch(e){case"sc-subscription-payment-method":customElements.get(e)||customElements.define(e,ScSubscriptionPaymentMethod$1);break;case"sc-alert":customElements.get(e)||defineCustomElement$p();break;case"sc-block-ui":customElements.get(e)||defineCustomElement$o();break;case"sc-button":customElements.get(e)||defineCustomElement$n();break;case"sc-card":customElements.get(e)||defineCustomElement$m();break;case"sc-cc-logo":customElements.get(e)||defineCustomElement$l();break;case"sc-choice":customElements.get(e)||defineCustomElement$k();break;case"sc-choices":customElements.get(e)||defineCustomElement$j();break;case"sc-dashboard-module":customElements.get(e)||defineCustomElement$i();break;case"sc-empty":customElements.get(e)||defineCustomElement$h();break;case"sc-flex":customElements.get(e)||defineCustomElement$g();break;case"sc-form":customElements.get(e)||defineCustomElement$f();break;case"sc-form-control":customElements.get(e)||defineCustomElement$e();break;case"sc-icon":customElements.get(e)||defineCustomElement$d();break;case"sc-manual-payment-method":customElements.get(e)||defineCustomElement$c();break;case"sc-payment-method":customElements.get(e)||defineCustomElement$b();break;case"sc-prose":customElements.get(e)||defineCustomElement$a();break;case"sc-skeleton":customElements.get(e)||defineCustomElement$9();break;case"sc-spinner":customElements.get(e)||defineCustomElement$8();break;case"sc-stacked-list":customElements.get(e)||defineCustomElement$7();break;case"sc-stacked-list-row":customElements.get(e)||defineCustomElement$6();break;case"sc-tag":customElements.get(e)||defineCustomElement$5();break;case"sc-text":customElements.get(e)||defineCustomElement$4();break;case"sc-tooltip":customElements.get(e)||defineCustomElement$3();break;case"sc-visually-hidden":customElements.get(e)||defineCustomElement$2()}}))}const ScSubscriptionPaymentMethod=ScSubscriptionPaymentMethod$1,defineCustomElement=defineCustomElement$1;export{ScSubscriptionPaymentMethod,defineCustomElement};