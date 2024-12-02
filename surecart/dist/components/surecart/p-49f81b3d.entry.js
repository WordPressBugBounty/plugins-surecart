import{r as i,c as e,h as t,H as s}from"./p-e97fde0a.js";import{a as o}from"./p-9a298389.js";import{b as n,i as l}from"./p-6ec14893.js";import{f as c}from"./p-710afbfa.js";import{a as r}from"./p-401e165e.js";import"./p-d3366af3.js";import"./p-3f6362a4.js";const d=":host{display:block;font-size:var(--sc-font-size-medium)}.close__button{position:absolute;top:0;right:0;font-size:22px}";const a=d;const u=class{constructor(t){i(this,t);this.scRequestClose=e(this,"scRequestClose",7);this.scRefresh=e(this,"scRefresh",7);this.open=undefined;this.protocol=undefined;this.subscription=undefined;this.reasons=undefined;this.reason=undefined;this.step="cancel";this.comment=undefined}close(){this.reset();this.trackAttempt();this.scRequestClose.emit("close-button")}reset(){var i;this.reason=null;this.step=((i=this.protocol)===null||i===void 0?void 0:i.preservation_enabled)?"survey":"cancel"}async trackAttempt(){var i,e;if(!((i=this.protocol)===null||i===void 0?void 0:i.preservation_enabled))return;await o({method:"PATCH",path:`surecart/v1/subscriptions/${(e=this.subscription)===null||e===void 0?void 0:e.id}/preserve`})}componentWillLoad(){this.reset()}render(){return t("sc-dialog",{key:"3de2271f2c7b0bde56b4f741740e037b3ed06504",style:{"--width":this.step==="survey"?"675px":"500px","--body-spacing":"var(--sc-spacing-xxx-large)"},noHeader:true,open:this.open,onScRequestClose:()=>this.close()},t("div",{key:"e79662fffed4c09b328a745c0159941d800fec91",class:{cancel:true}},t("sc-button",{key:"46738c75e4938d3de3cf654b2642af3160ea3bb0",class:"close__button",type:"text",circle:true,onClick:()=>this.close()},t("sc-icon",{key:"65fa63e99b904b0e338b682fee1727f1c45c8b5f",name:"x"})),this.step==="cancel"&&t("sc-subscription-cancel",{key:"30f84bba58ac9dc2080ac1a41ef759251b6a7495",subscription:this.subscription,protocol:this.protocol,reason:this.reason,comment:this.comment,onScAbandon:()=>this.close(),onScCancelled:()=>{this.scRefresh.emit();this.reset();this.scRequestClose.emit("close-button")}}),this.step==="survey"&&t("sc-cancel-survey",{key:"ef6b2b395a3e881321915b24f7fe4fbf4a21307e",protocol:this.protocol,onScAbandon:()=>this.close(),onScSubmitReason:i=>{const{comment:e,reason:t}=i.detail;this.reason=t;this.comment=e;this.step=(t===null||t===void 0?void 0:t.coupon_enabled)?"discount":"cancel"}}),this.step==="discount"&&t("sc-cancel-discount",{key:"8c8bde15cc7a78d4b06f1902d1cfb68e92a73000",protocol:this.protocol,subscription:this.subscription,reason:this.reason,comment:this.comment,onScCancel:()=>this.step="cancel",onScPreserved:()=>{this.scRefresh.emit();this.reset();this.scRequestClose.emit("close-button")}})))}};u.style=a;const v=class{constructor(e){i(this,e);this.subscription=undefined;this.updatePaymentMethodUrl=undefined;this.period=undefined;this.loading=true;this.error=undefined;this.details=undefined}componentWillLoad(){this.fetch()}handleSubscriptionChange(){this.fetch()}async fetch(){var i,e,t;if(((i=this.subscription)===null||i===void 0?void 0:i.cancel_at_period_end)&&this.subscription.current_period_end_at){this.loading=false;return}if(((e=this.subscription)===null||e===void 0?void 0:e.status)==="canceled"){this.loading=false;return}try{this.loading=true;this.period=await o({method:"PATCH",path:r(`surecart/v1/subscriptions/${(t=this.subscription)===null||t===void 0?void 0:t.id}/upcoming_period`,{skip_product_group_validation:true,expand:["period.checkout","checkout.line_items","checkout.payment_method","checkout.manual_payment_method","payment_method.card","payment_method.payment_instrument","payment_method.paypal_account","payment_method.bank_account","line_item.price","price.product","period.subscription"]}),data:{purge_pending_update:false}})}catch(i){console.error(i);this.error=i}finally{this.loading=false}}render(){var i,e,o,d,a;if(this.loading){return t("sc-toggle",{borderless:true,disabled:true},t("sc-flex",{slot:"summary",flexDirection:"column"},t("sc-skeleton",{style:{width:"200px"}}),t("sc-skeleton",{style:{width:"400px"}}),t("sc-skeleton",{style:{width:"300px"}})))}const u=(i=this===null||this===void 0?void 0:this.period)===null||i===void 0?void 0:i.checkout;if(!u)return t("div",{style:{padding:"var(--sc-spacing-medium)"}},t("sc-subscription-details",{slot:"summary",subscription:this.subscription}));const v=(u===null||u===void 0?void 0:u.manual_payment)?u===null||u===void 0?void 0:u.manual_payment_method:null;const p=(this===null||this===void 0?void 0:this.subscription.payment_method)||(this===null||this===void 0?void 0:this.subscription.manual_payment);return t(s,null,t("sc-toggle",{borderless:true,shady:true},t("span",{slot:"summary"},t("sc-subscription-details",{subscription:this.subscription},t("div",{style:{fontSize:"var(--sc-font-size-small)"}},wp.i18n.__("Your next payment is","surecart")," ",t("strong",null,t("sc-format-number",{type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.amount_due}))," ",!!((e=this.subscription)===null||e===void 0?void 0:e.finite)&&" — "+n((o=this.subscription)===null||o===void 0?void 0:o.remaining_period_count)))),t("sc-card",{noPadding:true,borderless:true},(d=u===null||u===void 0?void 0:u.line_items)===null||d===void 0?void 0:d.data.map((i=>{var e,s,o,n,c,r;return t("sc-product-line-item",{image:(s=(e=i.price)===null||e===void 0?void 0:e.product)===null||s===void 0?void 0:s.line_item_image,name:(n=(o=i.price)===null||o===void 0?void 0:o.product)===null||n===void 0?void 0:n.name,priceName:(c=i===null||i===void 0?void 0:i.price)===null||c===void 0?void 0:c.name,variantLabel:((i===null||i===void 0?void 0:i.variant_options)||[]).filter(Boolean).join(" / ")||null,editable:false,removable:false,quantity:i===null||i===void 0?void 0:i.quantity,amount:i===null||i===void 0?void 0:i.subtotal_amount,currency:(r=i===null||i===void 0?void 0:i.price)===null||r===void 0?void 0:r.currency,interval:l(i===null||i===void 0?void 0:i.price),purchasableStatusDisplay:i===null||i===void 0?void 0:i.purchasable_status_display})})),t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Subtotal","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.subtotal_amount})),!!u.proration_amount&&t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Proration Credit","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:-(u===null||u===void 0?void 0:u.proration_amount)})),!!u.applied_balance_amount&&t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Applied Balance","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:-(u===null||u===void 0?void 0:u.applied_balance_amount)})),!!u.trial_amount&&t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Trial","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.trial_amount})),!!(u===null||u===void 0?void 0:u.discount_amount)&&t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Discounts","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.discount_amount})),!!(u===null||u===void 0?void 0:u.shipping_amount)&&t("sc-line-item",{style:{marginTop:"var(--sc-spacing-small)"}},t("span",{slot:"description"},wp.i18n.__("Shipping","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.shipping_amount})),!!u.tax_amount&&t("sc-line-item",null,t("span",{slot:"description"},c(u===null||u===void 0?void 0:u.tax_label)),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.tax_amount})),t("sc-divider",{style:{"--spacing":"0"}}),t("sc-line-item",null,t("span",{slot:"description"},wp.i18n.__("Payment","surecart")),p&&t("a",{href:this.updatePaymentMethodUrl,slot:"price-description"},t("sc-flex",{"justify-content":"flex-start","align-items":"center",style:{"--spacing":"0.5em"}},v?t("sc-manual-payment-method",{paymentMethod:v}):t("sc-payment-method",{paymentMethod:u===null||u===void 0?void 0:u.payment_method}),t("sc-icon",{name:"edit-3"}))),!p&&t("a",{href:r(window.location.href,{action:"create",model:"payment_method",id:this===null||this===void 0?void 0:this.subscription.id,...((a=this===null||this===void 0?void 0:this.subscription)===null||a===void 0?void 0:a.live_mode)===false?{live_mode:false}:{}}),slot:"price-description"},wp.i18n.__("Add Payment Method","surecart"))),t("sc-line-item",{style:{"--price-size":"var(--sc-font-size-x-large)"}},t("span",{slot:"title"},wp.i18n.__("Total Due","surecart")),t("sc-format-number",{slot:"price",type:"currency",currency:u===null||u===void 0?void 0:u.currency,value:u===null||u===void 0?void 0:u.amount_due}),t("span",{slot:"currency"},u.currency)))))}static get watchers(){return{subscription:["handleSubscriptionChange"]}}};export{u as sc_cancel_dialog,v as sc_subscription_next_payment};
//# sourceMappingURL=p-49f81b3d.entry.js.map