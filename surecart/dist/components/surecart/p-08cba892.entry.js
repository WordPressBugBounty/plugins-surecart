import{r as t,h as i,F as e}from"./p-e97fde0a.js";import{a as s}from"./p-d9fa04f9.js";import{a as n}from"./p-401e165e.js";import"./p-d3366af3.js";const a=":host{display:block;position:relative}.subscription-payment{display:grid;gap:0.5em}";const o=a;const d=class{constructor(i){t(this,i);this.subscriptionId=undefined;this.backUrl=undefined;this.successUrl=undefined;this.subscription=undefined;this.paymentMethods=[];this.customerIds=[];this.manualPaymentMethods=undefined;this.loading=undefined;this.busy=undefined;this.error=undefined}componentWillLoad(){this.fetchItems()}async fetchItems(){try{this.loading=true;await Promise.all([this.fetchSubscription(),this.fetchPaymentMethods()])}catch(t){console.error(t);this.error=(t===null||t===void 0?void 0:t.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=false}}async fetchSubscription(){if(!this.subscriptionId)return;this.subscription=await s({path:n(`/surecart/v1/subscriptions/${this.subscriptionId}`,{expand:["price","price.product","current_period","product"]})})}async fetchPaymentMethods(){var t,i;this.paymentMethods=await s({path:n(`/surecart/v1/payment_methods`,{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],customer_ids:this.customerIds,reusable:true,...((t=this.subscription)===null||t===void 0?void 0:t.live_mode)!==null?{live_mode:this.subscription.live_mode}:{}})});this.manualPaymentMethods=await s({path:n(`surecart/v1/manual_payment_methods`,{customer_ids:this.customerIds,reusable:true,live_mode:(i=this.subscription)===null||i===void 0?void 0:i.live_mode})})}async handleSubmit(t){var i;const{payment_method:e}=await t.target.getFormJson();const n=(this.manualPaymentMethods||[]).some((t=>t.id===e));try{this.error="";this.busy=true;await s({path:`/surecart/v1/subscriptions/${(i=this.subscription)===null||i===void 0?void 0:i.id}`,method:"PATCH",data:{...!n?{payment_method:e,manual_payment:false}:{manual_payment_method:e,manual_payment:true}}});if(this.successUrl){window.location.assign(this.successUrl)}else{this.busy=false}}catch(t){this.error=(t===null||t===void 0?void 0:t.message)||wp.i18n.__("Something went wrong","surecart");this.busy=false}}renderLoading(){return i(e,null,i("sc-choice",{name:"loading",disabled:true},i("sc-skeleton",{style:{width:"60px",display:"inline-block"}}),i("sc-skeleton",{style:{width:"80px",display:"inline-block"},slot:"price"}),i("sc-skeleton",{style:{width:"120px",display:"inline-block"},slot:"description"})),i("sc-button",{type:"primary",full:true,submit:true,loading:true,busy:true}),!!this.backUrl&&i("sc-button",{href:this.backUrl,full:true,loading:true,busy:true}))}renderContent(){var t,s,n,a,o,d,l,r;if(this.loading){return this.renderLoading()}const u=this.paymentMethods.filter((t=>{var i;return(t===null||t===void 0?void 0:t.live_mode)===((i=this.subscription)===null||i===void 0?void 0:i.live_mode)}));const h=!((t=this.paymentMethods)===null||t===void 0?void 0:t.length)&&!((s=this.manualPaymentMethods)===null||s===void 0?void 0:s.length)||((n=this.paymentMethods)===null||n===void 0?void 0:n.length)&&!(u===null||u===void 0?void 0:u.length);const c=((a=this.subscription)===null||a===void 0?void 0:a.manual_payment)?(o=this.subscription)===null||o===void 0?void 0:o.manual_payment_method:((l=(d=this.subscription)===null||d===void 0?void 0:d.payment_method)===null||l===void 0?void 0:l.id)||((r=this.subscription)===null||r===void 0?void 0:r.payment_method);if(h){return i(e,null,i("sc-empty",{icon:"credit-card"},wp.i18n.__("You have no saved payment methods.","surecart")),!!this.backUrl&&i("sc-button",{href:this.backUrl,full:true},wp.i18n.__("Go Back","surecart")))}return i(e,null,i("sc-choices",null,i("div",null,(this.paymentMethods||[]).map((t=>{var e;if((t===null||t===void 0?void 0:t.live_mode)!==((e=this===null||this===void 0?void 0:this.subscription)===null||e===void 0?void 0:e.live_mode))return null;return i("sc-choice",{checked:c===(t===null||t===void 0?void 0:t.id),name:"payment_method",value:t===null||t===void 0?void 0:t.id},i("sc-payment-method",{paymentMethod:t,full:true}))})),(this.manualPaymentMethods||[]).map((t=>i("sc-choice",{checked:c===(t===null||t===void 0?void 0:t.id),name:"payment_method",value:t===null||t===void 0?void 0:t.id},i("sc-manual-payment-method",{paymentMethod:t,showDescription:true})))))),i("sc-button",{type:"primary",full:true,submit:true,loading:this.loading||this.busy,disabled:this.loading||this.busy},wp.i18n.__("Update","surecart")),!!this.backUrl&&i("sc-button",{href:this.backUrl,full:true,loading:this.loading||this.busy,disabled:this.loading||this.busy},wp.i18n.__("Go Back","surecart")))}render(){return i("sc-dashboard-module",{key:"3fe211fcbda4491ce2813fe1a06cff3bc9fe2b1d",heading:wp.i18n.__("Select a payment method","surecart"),class:"subscription-payment",error:this.error},i("sc-form",{key:"7b4f5a9e0502a70cfa66ca4b38685aef630c72ea",onScFormSubmit:t=>this.handleSubmit(t)},i("sc-card",{key:"eefa2efce12ed5ae248761ee493a13559cda2237"},this.renderContent())),this.busy&&i("sc-block-ui",{key:"390b7200abf7b60a33277a76d3f83fd00cafd115"}))}};d.style=o;export{d as sc_subscription_payment};
//# sourceMappingURL=p-08cba892.entry.js.map