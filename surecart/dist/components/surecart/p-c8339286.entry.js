import{r as e,h as t,a as s}from"./p-e97fde0a.js";import{a}from"./p-9a298389.js";import{o as i}from"./p-b719a497.js";import{a as n}from"./p-401e165e.js";import"./p-d3366af3.js";const c=":host{display:block;position:relative}.payment-methods-list{display:grid;gap:0.5em}.payment-methods-list sc-heading a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.payment-id{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}";const d=c;const r=class{constructor(t){e(this,t);this.query=undefined;this.heading=undefined;this.isCustomer=undefined;this.canDetachDefaultPaymentMethod=false;this.paymentMethods=[];this.loading=undefined;this.busy=undefined;this.error=undefined;this.hasTitleSlot=undefined;this.editPaymentMethod=false;this.deletePaymentMethod=false;this.cascadeDefaultPaymentMethod=false}componentWillLoad(){i(this.el,(()=>this.getPaymentMethods()));this.handleSlotChange()}handleSlotChange(){this.hasTitleSlot=!!this.el.querySelector('[slot="title"]')}async deleteMethod(){var e;if(!this.deletePaymentMethod)return;try{this.busy=true;await a({path:`surecart/v1/payment_methods/${(e=this.deletePaymentMethod)===null||e===void 0?void 0:e.id}/detach`,method:"PATCH"});this.paymentMethods=this.paymentMethods.filter((e=>{var t;return e.id!==((t=this.deletePaymentMethod)===null||t===void 0?void 0:t.id)}));this.deletePaymentMethod=false}catch(e){alert((e===null||e===void 0?void 0:e.messsage)||wp.i18n.__("Something went wrong","surecart"))}finally{this.busy=false}}async setDefault(){var e,t,s;if(!this.editPaymentMethod)return;try{this.error="";this.busy=true;await a({path:`surecart/v1/customers/${(t=(e=this.editPaymentMethod)===null||e===void 0?void 0:e.customer)===null||t===void 0?void 0:t.id}`,method:"PATCH",data:{default_payment_method:(s=this.editPaymentMethod)===null||s===void 0?void 0:s.id,cascade_default_payment_method:this.cascadeDefaultPaymentMethod}});this.editPaymentMethod=false}catch(e){this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=false}try{this.busy=true;this.paymentMethods=await a({path:n(`surecart/v1/payment_methods/`,{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],...this.query})})}catch(e){this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=false}}async getPaymentMethods(){if(!this.isCustomer){return}try{this.loading=true;this.paymentMethods=await a({path:n(`surecart/v1/payment_methods/`,{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],...this.query,per_page:100})})}catch(e){console.error(this.error);this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=false}}renderLoading(){return t("sc-card",{noPadding:true},t("sc-stacked-list",null,t("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>t("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return t("div",null,t("sc-divider",{style:{"--spacing":"0"}}),t("slot",{name:"empty"},t("sc-empty",{icon:"credit-card"},wp.i18n.__("You don't have any saved payment methods.","surecart"))))}renderPaymentMethodActions(e){const{id:s,customer:a}=e;if(typeof a==="string")return;if(a.default_payment_method===s&&!this.canDetachDefaultPaymentMethod)return;return t("sc-dropdown",{placement:"bottom-end",slot:"suffix"},t("sc-icon",{role:"button",tabIndex:0,name:"more-horizontal",slot:"trigger"}),t("sc-menu",null,a.default_payment_method!==s&&t("sc-menu-item",{onClick:()=>this.editPaymentMethod=e},wp.i18n.__("Make Default","surecart")),t("sc-menu-item",{onClick:()=>this.deletePaymentMethod=e},wp.i18n.__("Delete","surecart"))))}renderList(){return this.paymentMethods.map((e=>{const{id:s,card:a,customer:i,live_mode:n,billing_agreement:c,paypal_account:d}=e;return t("sc-stacked-list-row",{style:{"--columns":c?"2":"3"}},t("sc-payment-method",{paymentMethod:e}),t("div",{class:"payment-id"},!!(a===null||a===void 0?void 0:a.exp_month)&&t("span",null,wp.i18n.__("Exp.","surecart"),a===null||a===void 0?void 0:a.exp_month,"/",a===null||a===void 0?void 0:a.exp_year),!!d&&(d===null||d===void 0?void 0:d.email)),t("sc-flex",{"justify-content":"flex-start","align-items":"center",style:{"--spacing":"0.5em",marginLeft:"auto"}},typeof i!=="string"&&(i===null||i===void 0?void 0:i.default_payment_method)===s&&t("sc-tag",{type:"info"},wp.i18n.__("Default","surecart")),!n&&t("sc-tag",{type:"warning"},wp.i18n.__("Test","surecart"))),this.renderPaymentMethodActions(e))}))}renderContent(){var e;if(!this.isCustomer){return this.renderEmpty()}if(this.loading){return this.renderLoading()}if(((e=this.paymentMethods)===null||e===void 0?void 0:e.length)===0){return this.renderEmpty()}return t("sc-card",{"no-padding":true},t("sc-stacked-list",null,this.renderList()))}handleEditPaymentMethodChange(){this.cascadeDefaultPaymentMethod=false}render(){return t("sc-dashboard-module",{key:"0ac80f9fda075ae4829fbbe03c414221010b20ba",class:"payment-methods-list",error:this.error},t("span",{key:"1c98a5c652a987b7723b94750d1b63602cf83799",slot:"heading"},t("slot",{key:"458d481338136b9faf5fad827cd5791c93eab0d3",name:"heading"},this.heading||wp.i18n.__("Payment Methods","surecart"))),this.isCustomer&&t("sc-flex",{key:"43538e9893e920b2318b3cdf8add46cca1507e76",slot:"end"},t("sc-button",{key:"06979322168db93d3f4fb682bab61f5248690430",type:"link",href:n(window.location.href,{action:"index",model:"charge"})},t("sc-icon",{key:"a85ef3259390284fc15a993a5eeea94c17047b54",name:"clock",slot:"prefix"}),wp.i18n.__("Payment History","surecart")),t("sc-button",{key:"27ce21d0667c5a4974edcb46b372970fe5448519",type:"link",href:n(window.location.href,{action:"create",model:"payment_method"})},t("sc-icon",{key:"c844878bbf69207359439c6e84814d6375045514",name:"plus",slot:"prefix"}),wp.i18n.__("Add","surecart"))),this.renderContent(),t("sc-dialog",{key:"2676d6388a35809831f6229215320c150778000b",open:!!this.editPaymentMethod,label:wp.i18n.__("Update Default Payment Method","surecart"),onScRequestClose:()=>this.editPaymentMethod=false},t("sc-alert",{key:"28a646a4e263121e35a376ba687ee3bc7733fb08",type:"danger",open:!!this.error},this.error),t("sc-flex",{key:"6aad98329670e1235f3e259e71ac47436ec97cc1",flexDirection:"column",style:{"--sc-flex-column-gap":"var(--sc-spacing-small)"}},t("sc-alert",{key:"b9da67346f5453a7371b2cd4dfe18b8236578b2c",type:"info",open:true},wp.i18n.__("A default payment method will be used as a fallback in case other payment methods get removed from a subscription.","surecart")),t("sc-switch",{key:"431b19ea6a3874f26df33ff621870dc7b5025c59",checked:this.cascadeDefaultPaymentMethod,onScChange:e=>this.cascadeDefaultPaymentMethod=e.target.checked},wp.i18n.__("Update All Subscriptions","surecart"),t("span",{key:"a6e9796449e7e803167a75d41d5eb81a8396f675",slot:"description"},wp.i18n.__("Update all existing subscriptions to use this payment method","surecart")))),t("div",{key:"9963324d7a86fb45ebddfd27c24c1fd981e5d4da",slot:"footer"},t("sc-button",{key:"70cd3903dd566b08e712fbf56e387cf262f7389b",type:"text",onClick:()=>this.editPaymentMethod=false},wp.i18n.__("Cancel","surecart")),t("sc-button",{key:"b05d07b8cad9a9e40e6320e2cd5705a7bca08453",type:"primary",onClick:()=>this.setDefault()},wp.i18n.__("Make Default","surecart"))),this.busy&&t("sc-block-ui",{key:"276e152f1ba2c7b333efedec087346cd95b02d20",spinner:true})),t("sc-dialog",{key:"7d859e318c4d14a5f885c8838b3f089a7ea3ee71",open:!!this.deletePaymentMethod,label:wp.i18n.__("Delete Payment Method","surecart"),onScRequestClose:()=>this.deletePaymentMethod=false},t("sc-alert",{key:"c8cb0e2747ff6df79df46a8ed1fb97c2a4e626f8",type:"danger",open:!!this.error},this.error),t("sc-text",{key:"bbb353bc799b00270b8e195e618e059d3bd2f049"},wp.i18n.__("Are you sure you want to remove this payment method?","surecart")),t("div",{key:"c3cb78e2bd4ed816217a9e28d5904127a36ceb38",slot:"footer"},t("sc-button",{key:"b76485391ec921f52bbf05682df01da33cb181c4",type:"text",onClick:()=>this.deletePaymentMethod=false},wp.i18n.__("Cancel","surecart")),t("sc-button",{key:"cef6cee245c579c292ed890215cdef7fa076ddd7",type:"primary",onClick:()=>this.deleteMethod()},wp.i18n.__("Delete","surecart"))),this.busy&&t("sc-block-ui",{key:"0b3f15837d10333995e5b34da5dceb0f77a53202",spinner:true})),this.busy&&t("sc-block-ui",{key:"9c9d1dee23d6acf93d3b03495ab5a00b7535a76d",spinner:true}))}get el(){return s(this)}static get watchers(){return{editPaymentMethod:["handleEditPaymentMethodChange"]}}};r.style=d;export{r as sc_payment_methods_list};
//# sourceMappingURL=p-c8339286.entry.js.map