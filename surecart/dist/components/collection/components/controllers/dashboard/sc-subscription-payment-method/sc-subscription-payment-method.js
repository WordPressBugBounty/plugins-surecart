import{h}from"@stencil/core";import{__}from"@wordpress/i18n";import{addQueryArgs}from"@wordpress/url";import apiFetch from"../../../../functions/fetch";import{onFirstVisible}from"../../../../functions/lazy";export class ScSubscriptionPaymentMethod{constructor(){this.heading=void 0,this.subscription=void 0,this.paymentMethods=void 0,this.manualPaymentMethods=void 0,this.error=void 0,this.loading=void 0,this.busy=void 0,this.method=void 0}renderLoading(){return h("sc-card",{noPadding:!0},h("sc-stacked-list",null,h("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>h("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return h("slot",{name:"empty"},h("sc-card",null,h("sc-empty",{icon:"credit-card"},__("You do not have any payment methods.","surecart"))))}currentPaymentMethodId(){var t,e,i,s,n;return(null===(t=this.subscription)||void 0===t?void 0:t.manual_payment)?null===(e=this.subscription)||void 0===e?void 0:e.manual_payment_method:(null===(s=null===(i=this.subscription)||void 0===i?void 0:i.payment_method)||void 0===s?void 0:s.id)||(null===(n=this.subscription)||void 0===n?void 0:n.payment_method)}hasPaymentMethods(){var t,e;return(null===(t=this.paymentMethods)||void 0===t?void 0:t.length)&&(null===(e=this.manualPaymentMethods)||void 0===e?void 0:e.length)}hasMultiplePaymentMethods(){var t;return(null===(t=[...(null==this?void 0:this.paymentMethods)||[],...(null==this?void 0:this.manualPaymentMethods)||[]])||void 0===t?void 0:t.length)>1}componentWillLoad(){onFirstVisible(this.el,(()=>{this.getPaymentMethods()}))}async getPaymentMethods(){var t,e,i;if(this.hasPaymentMethods())return;const s=(null===(e=null===(t=this.subscription)||void 0===t?void 0:t.customer)||void 0===e?void 0:e.id)||(null===(i=this.subscription)||void 0===i?void 0:i.customer);if(s)try{this.loading=!0,await this.fetchMethods(s)}catch(t){this.error=(null==t?void 0:t.messsage)||__("Something went wrong","surecart"),console.error(this.error)}finally{this.loading=!1}}async fetchMethods(t){var e,i;this.paymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/payment_methods",{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],customer_ids:[t],reusable:!0,live_mode:null===(e=this.subscription)||void 0===e?void 0:e.live_mode})}),this.manualPaymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/manual_payment_methods",{customer_ids:[t],reusable:!0,live_mode:null===(i=this.subscription)||void 0===i?void 0:i.live_mode})})}async deleteMethod(t){if(confirm(__("Are you sure you want to remove this payment method?","surecart")))try{this.busy=!0,await apiFetch({path:`surecart/v1/payment_methods/${null==t?void 0:t.id}/detach`,method:"PATCH"}),this.paymentMethods=this.paymentMethods.filter((e=>e.id!==t.id))}catch(t){this.error=(null==t?void 0:t.messsage)||__("Something went wrong","surecart"),console.error(this.error)}finally{this.busy=!1}}async updateMethod(t){var e,i;const{payment_method:s}=await t.target.getFormJson();if(s!==this.currentPaymentMethodId())try{const t=(this.manualPaymentMethods||[]).some((t=>t.id===s));this.busy=!0,this.subscription=await apiFetch({path:`surecart/v1/subscriptions/${null===(e=this.subscription)||void 0===e?void 0:e.id}`,method:"PATCH",data:{...t?{manual_payment_method:s,manual_payment:!0}:{payment_method:s,manual_payment:!1}}}),window.location.assign(addQueryArgs(window.location.href,{action:"edit",model:"subscription",id:null===(i=this.subscription)||void 0===i?void 0:i.id}))}catch(t){this.error=(null==t?void 0:t.messsage)||__("Something went wrong","surecart"),console.error(this.error)}finally{this.busy=!1}}renderContent(){var t,e;return this.loading?this.renderLoading():(null===(t=this.paymentMethods)||void 0===t?void 0:t.length)||(null===(e=this.manualPaymentMethods)||void 0===e?void 0:e.length)?h("sc-form",{onScSubmit:t=>this.updateMethod(t)},h("sc-choices",null,this.renderList()),this.hasMultiplePaymentMethods()&&h("sc-button",{type:"primary",submit:!0,full:!0,size:"large",busy:this.busy,disabled:this.busy},__("Update Payment Method","surecart"))):this.renderEmpty()}renderList(){return[...this.paymentMethods.map((t=>{const{id:e,card:i,live_mode:s,paypal_account:n}=t;return h("sc-choice",{checked:this.currentPaymentMethodId()===e,name:"payment_method",value:e,required:!0},h("sc-flex",{justifyContent:"flex-start","align-items":"center"},h("sc-payment-method",{paymentMethod:t})," ",!s&&h("sc-tag",{type:"warning",size:"small"},__("Test","surecart"))),h("div",{slot:"description"},!!(null==i?void 0:i.exp_month)&&h("span",null,
/** Translators: Credit Card Expires (Exp. 11/27) */
__("Exp.","surecart"),null==i?void 0:i.exp_month,"/",null==i?void 0:i.exp_year),!!n&&(null==n?void 0:n.email)),this.currentPaymentMethodId()===e&&h("sc-tag",{type:"info",slot:"price"},__("Current Payment Method","surecart")))})),...this.manualPaymentMethods.map((t=>{const{id:e}=t;return h("sc-choice",{checked:this.currentPaymentMethodId()===e,name:"payment_method",value:e,required:!0},h("sc-flex",{justifyContent:"flex-start","align-items":"center"},h("sc-manual-payment-method",{paymentMethod:t,showDescription:!0})),this.currentPaymentMethodId()===e&&h("sc-tag",{type:"info",slot:"price"},__("Current Payment Method","surecart")))}))]}render(){var t;return h("sc-dashboard-module",{key:"8d937b71f84742d2278fbf33ea50889222835654",heading:this.heading||__("Update Payment Method","surecart"),class:"subscription",error:this.error},h("sc-button",{key:"15ad250980256f2e75b95a82201fe40a11fd34d6",slot:"end",type:"link",href:addQueryArgs(window.location.href,{action:"create",model:"payment_method",...!1===(null===(t=this.subscription)||void 0===t?void 0:t.live_mode)?{live_mode:!1}:{},success_url:window.location.href})},h("sc-icon",{key:"e9ad5763b95d50e0b578b1a1780c417398b14ea4",name:"plus",slot:"prefix"}),__("Add New","surecart")),this.renderContent(),this.busy&&h("sc-block-ui",{key:"88c88021ead6ff585220e813597105c154b0b429",spinner:!0}))}static get is(){return"sc-subscription-payment-method"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-subscription-payment-method.css"]}}static get styleUrls(){return{$:["sc-subscription-payment-method.css"]}}static get properties(){return{heading:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The heading"},attribute:"heading",reflect:!1},subscription:{type:"unknown",mutable:!1,complexType:{original:"Subscription",resolved:"Subscription",references:{Subscription:{location:"import",path:"../../../../types",id:"src/types.ts::Subscription"}}},required:!1,optional:!1,docs:{tags:[],text:"The subscription"}}}}static get states(){return{paymentMethods:{},manualPaymentMethods:{},error:{},loading:{},busy:{},method:{}}}static get elementRef(){return"el"}}