import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{a as apiFetch}from"./fetch.js";import{o as onFirstVisible}from"./lazy.js";import{d as defineCustomElement$o}from"./sc-alert2.js";import{d as defineCustomElement$n}from"./sc-block-ui2.js";import{d as defineCustomElement$m}from"./sc-button2.js";import{d as defineCustomElement$l}from"./sc-card2.js";import{d as defineCustomElement$k}from"./sc-cc-logo2.js";import{d as defineCustomElement$j}from"./sc-dashboard-module2.js";import{d as defineCustomElement$i}from"./sc-dialog2.js";import{d as defineCustomElement$h}from"./sc-divider2.js";import{d as defineCustomElement$g}from"./dropdown.js";import{d as defineCustomElement$f}from"./sc-empty2.js";import{d as defineCustomElement$e}from"./sc-flex2.js";import{d as defineCustomElement$d}from"./sc-icon2.js";import{d as defineCustomElement$c}from"./sc-menu2.js";import{d as defineCustomElement$b}from"./sc-menu-item2.js";import{d as defineCustomElement$a}from"./sc-payment-method2.js";import{d as defineCustomElement$9}from"./sc-skeleton2.js";import{d as defineCustomElement$8}from"./sc-spinner2.js";import{d as defineCustomElement$7}from"./sc-stacked-list2.js";import{d as defineCustomElement$6}from"./sc-stacked-list-row2.js";import{d as defineCustomElement$5}from"./sc-switch2.js";import{d as defineCustomElement$4}from"./sc-tag2.js";import{d as defineCustomElement$3}from"./sc-text2.js";import{d as defineCustomElement$2}from"./sc-tooltip2.js";import{a as addQueryArgs}from"./add-query-args.js";const scPaymentMethodsListCss=":host{display:block;position:relative}.payment-methods-list{display:grid;gap:0.5em}.payment-methods-list sc-heading a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.payment-id{overflow:hidden;white-space:nowrap;text-overflow:ellipsis}",ScPaymentMethodsListStyle0=scPaymentMethodsListCss,ScPaymentMethodsList$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.query=void 0,this.heading=void 0,this.isCustomer=void 0,this.canDetachDefaultPaymentMethod=!1,this.paymentMethods=[],this.loading=void 0,this.busy=void 0,this.error=void 0,this.hasTitleSlot=void 0,this.editPaymentMethod=!1,this.deletePaymentMethod=!1,this.cascadeDefaultPaymentMethod=!1}componentWillLoad(){onFirstVisible(this.el,(()=>this.getPaymentMethods())),this.handleSlotChange()}handleSlotChange(){this.hasTitleSlot=!!this.el.querySelector('[slot="title"]')}async deleteMethod(){var e;if(this.deletePaymentMethod)try{this.busy=!0,await apiFetch({path:`surecart/v1/payment_methods/${null===(e=this.deletePaymentMethod)||void 0===e?void 0:e.id}/detach`,method:"PATCH"}),this.paymentMethods=this.paymentMethods.filter((e=>{var t;return e.id!==(null===(t=this.deletePaymentMethod)||void 0===t?void 0:t.id)})),this.deletePaymentMethod=!1}catch(e){alert((null==e?void 0:e.messsage)||wp.i18n.__("Something went wrong","surecart"))}finally{this.busy=!1}}async setDefault(){var e,t,s;if(this.editPaymentMethod){try{this.error="",this.busy=!0,await apiFetch({path:`surecart/v1/customers/${null===(t=null===(e=this.editPaymentMethod)||void 0===e?void 0:e.customer)||void 0===t?void 0:t.id}`,method:"PATCH",data:{default_payment_method:null===(s=this.editPaymentMethod)||void 0===s?void 0:s.id,cascade_default_payment_method:this.cascadeDefaultPaymentMethod}}),this.editPaymentMethod=!1}catch(e){this.error=(null==e?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=!1}try{this.busy=!0,this.paymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/payment_methods/",{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],...this.query})})}catch(e){this.error=(null==e?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=!1}}}async getPaymentMethods(){if(this.isCustomer)try{this.loading=!0,this.paymentMethods=await apiFetch({path:addQueryArgs("surecart/v1/payment_methods/",{expand:["card","customer","billing_agreement","paypal_account","payment_instrument","bank_account"],...this.query,per_page:100})})}catch(e){console.error(this.error),this.error=(null==e?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=!1}}renderLoading(){return h("sc-card",{noPadding:!0},h("sc-stacked-list",null,h("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>h("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return h("div",null,h("sc-divider",{style:{"--spacing":"0"}}),h("slot",{name:"empty"},h("sc-empty",{icon:"credit-card"},wp.i18n.__("You don't have any saved payment methods.","surecart"))))}renderPaymentMethodActions(e){const{id:t,customer:s}=e;if("string"!=typeof s&&(s.default_payment_method!==t||this.canDetachDefaultPaymentMethod))return h("sc-dropdown",{placement:"bottom-end",slot:"suffix"},h("sc-icon",{role:"button",tabIndex:0,name:"more-horizontal",slot:"trigger"}),h("sc-menu",null,s.default_payment_method!==t&&h("sc-menu-item",{onClick:()=>this.editPaymentMethod=e},wp.i18n.__("Make Default","surecart")),h("sc-menu-item",{onClick:()=>this.deletePaymentMethod=e},wp.i18n.__("Delete","surecart"))))}renderList(){return this.paymentMethods.map((e=>{const{id:t,card:s,customer:a,live_mode:n,billing_agreement:o,paypal_account:i}=e;return h("sc-stacked-list-row",{style:{"--columns":o?"2":"3"}},h("sc-payment-method",{paymentMethod:e}),h("div",{class:"payment-id"},!!(null==s?void 0:s.exp_month)&&h("span",null,wp.i18n.__("Exp.","surecart"),null==s?void 0:s.exp_month,"/",null==s?void 0:s.exp_year),!!i&&(null==i?void 0:i.email)),h("sc-flex",{"justify-content":"flex-start","align-items":"center",style:{"--spacing":"0.5em",marginLeft:"auto"}},"string"!=typeof a&&(null==a?void 0:a.default_payment_method)===t&&h("sc-tag",{type:"info"},wp.i18n.__("Default","surecart")),!n&&h("sc-tag",{type:"warning"},wp.i18n.__("Test","surecart"))),this.renderPaymentMethodActions(e))}))}renderContent(){var e;return this.isCustomer?this.loading?this.renderLoading():0===(null===(e=this.paymentMethods)||void 0===e?void 0:e.length)?this.renderEmpty():h("sc-card",{"no-padding":!0},h("sc-stacked-list",null,this.renderList())):this.renderEmpty()}handleEditPaymentMethodChange(){this.cascadeDefaultPaymentMethod=!1}render(){return h("sc-dashboard-module",{key:"09086ce17be8b594ef853c09491abfd1aab72f8b",class:"payment-methods-list",error:this.error},h("span",{key:"0f4042bc2ba34bebdcf8ff3a3d1a82c652c20834",slot:"heading"},h("slot",{key:"8992d01e035f1569bf10289c01f7210b89fb540f",name:"heading"},this.heading||wp.i18n.__("Payment Methods","surecart"))),this.isCustomer&&h("sc-flex",{key:"4964d240006bc4fef96ba5aace156ff63ef7bcdf",slot:"end"},h("sc-button",{key:"d7be77e382596d116c5c7ac8e9b8f9ac536c55bc",type:"link",href:addQueryArgs(window.location.href,{action:"index",model:"charge"})},h("sc-icon",{key:"11a73f682c0c273370d4cd7d7147c9cc8b3a0bd3",name:"clock",slot:"prefix"}),wp.i18n.__("Payment History","surecart")),h("sc-button",{key:"fd5c50131480992ab0113b00e1fd3aa593223ae7",type:"link",href:addQueryArgs(window.location.href,{action:"create",model:"payment_method"})},h("sc-icon",{key:"0cd83a86511cbc2d6d281095d741208ea385cbc3",name:"plus",slot:"prefix"}),wp.i18n.__("Add","surecart"))),this.renderContent(),h("sc-dialog",{key:"5447af802b1ee6a6f32540e2ca2ab8f335293a67",open:!!this.editPaymentMethod,label:wp.i18n.__("Update Default Payment Method","surecart"),onScRequestClose:()=>this.editPaymentMethod=!1},h("sc-alert",{key:"a3a6c10617d51f595099b5b97a8a144f909290b4",type:"danger",open:!!this.error},this.error),h("sc-flex",{key:"9e6697935c04b3b981a30a3daf1a52bb49fb291c",flexDirection:"column",style:{"--sc-flex-column-gap":"var(--sc-spacing-small)"}},h("sc-alert",{key:"9d5f4797da099bf02e1ca5ff90658d01ca4c57fa",type:"info",open:!0},wp.i18n.__("A default payment method will be used as a fallback in case other payment methods get removed from a subscription.","surecart")),h("sc-switch",{key:"51001ae2b9d7d12f5dd4a9b9361d7a0a90a1b7f7",checked:this.cascadeDefaultPaymentMethod,onScChange:e=>this.cascadeDefaultPaymentMethod=e.target.checked},wp.i18n.__("Update All Subscriptions","surecart"),h("span",{key:"cd26b31724ccead67060c4334c8991a4546aa1a7",slot:"description"},wp.i18n.__("Update all existing subscriptions to use this payment method","surecart")))),h("div",{key:"e1a5d9e349f6bf5ba905cdde237d63391a8807c9",slot:"footer"},h("sc-button",{key:"f4fba760ebc187829cef89c3b9ae1a77bbe383ce",type:"text",onClick:()=>this.editPaymentMethod=!1},wp.i18n.__("Cancel","surecart")),h("sc-button",{key:"5b59935d49e8e4a5a41cac63aceb87779327b7e8",type:"primary",onClick:()=>this.setDefault()},wp.i18n.__("Make Default","surecart"))),this.busy&&h("sc-block-ui",{key:"15e2803eee6e4ebd748a7008302a558b62227558",spinner:!0})),h("sc-dialog",{key:"baa7c067b601e067ccacfe4f2a7188e0686aa651",open:!!this.deletePaymentMethod,label:wp.i18n.__("Delete Payment Method","surecart"),onScRequestClose:()=>this.deletePaymentMethod=!1},h("sc-alert",{key:"73a1d582bcfdcfcd1d7fe8e4a420d75b1509a770",type:"danger",open:!!this.error},this.error),h("sc-text",{key:"ec6593d06be8281b34de144b10a50ca763b31932"},wp.i18n.__("Are you sure you want to remove this payment method?","surecart")),h("div",{key:"ff9c10f3f73b96f74202b713a1ef49b9010a943b",slot:"footer"},h("sc-button",{key:"cd7da50146bdb32ed71e1921e0c2afc34d2de967",type:"text",onClick:()=>this.deletePaymentMethod=!1},wp.i18n.__("Cancel","surecart")),h("sc-button",{key:"b4073082365b1273454e650035a1d028fb2ffc5d",type:"primary",onClick:()=>this.deleteMethod()},wp.i18n.__("Delete","surecart"))),this.busy&&h("sc-block-ui",{key:"ec25d336cc92f6ffbb0523111280f8511240e5ef",spinner:!0})),this.busy&&h("sc-block-ui",{key:"85f275ed626a40033d725298de6cdc601efa137d",spinner:!0}))}get el(){return this}static get watchers(){return{editPaymentMethod:["handleEditPaymentMethodChange"]}}static get style(){return ScPaymentMethodsListStyle0}},[1,"sc-payment-methods-list",{query:[16],heading:[1],isCustomer:[4,"is-customer"],canDetachDefaultPaymentMethod:[4,"can-detach-default-payment-method"],paymentMethods:[32],loading:[32],busy:[32],error:[32],hasTitleSlot:[32],editPaymentMethod:[32],deletePaymentMethod:[32],cascadeDefaultPaymentMethod:[32]},void 0,{editPaymentMethod:["handleEditPaymentMethodChange"]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-payment-methods-list","sc-alert","sc-block-ui","sc-button","sc-card","sc-cc-logo","sc-dashboard-module","sc-dialog","sc-divider","sc-dropdown","sc-empty","sc-flex","sc-icon","sc-menu","sc-menu-item","sc-payment-method","sc-skeleton","sc-spinner","sc-stacked-list","sc-stacked-list-row","sc-switch","sc-tag","sc-text","sc-tooltip"].forEach((e=>{switch(e){case"sc-payment-methods-list":customElements.get(e)||customElements.define(e,ScPaymentMethodsList$1);break;case"sc-alert":customElements.get(e)||defineCustomElement$o();break;case"sc-block-ui":customElements.get(e)||defineCustomElement$n();break;case"sc-button":customElements.get(e)||defineCustomElement$m();break;case"sc-card":customElements.get(e)||defineCustomElement$l();break;case"sc-cc-logo":customElements.get(e)||defineCustomElement$k();break;case"sc-dashboard-module":customElements.get(e)||defineCustomElement$j();break;case"sc-dialog":customElements.get(e)||defineCustomElement$i();break;case"sc-divider":customElements.get(e)||defineCustomElement$h();break;case"sc-dropdown":customElements.get(e)||defineCustomElement$g();break;case"sc-empty":customElements.get(e)||defineCustomElement$f();break;case"sc-flex":customElements.get(e)||defineCustomElement$e();break;case"sc-icon":customElements.get(e)||defineCustomElement$d();break;case"sc-menu":customElements.get(e)||defineCustomElement$c();break;case"sc-menu-item":customElements.get(e)||defineCustomElement$b();break;case"sc-payment-method":customElements.get(e)||defineCustomElement$a();break;case"sc-skeleton":customElements.get(e)||defineCustomElement$9();break;case"sc-spinner":customElements.get(e)||defineCustomElement$8();break;case"sc-stacked-list":customElements.get(e)||defineCustomElement$7();break;case"sc-stacked-list-row":customElements.get(e)||defineCustomElement$6();break;case"sc-switch":customElements.get(e)||defineCustomElement$5();break;case"sc-tag":customElements.get(e)||defineCustomElement$4();break;case"sc-text":customElements.get(e)||defineCustomElement$3();break;case"sc-tooltip":customElements.get(e)||defineCustomElement$2()}}))}const ScPaymentMethodsList=ScPaymentMethodsList$1,defineCustomElement=defineCustomElement$1;export{ScPaymentMethodsList,defineCustomElement};