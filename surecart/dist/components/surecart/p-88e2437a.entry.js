import{r as i,c as e,h as t,H as s,a as o}from"./p-e97fde0a.js";import{s as n,o as d,u as r}from"./p-021b5199.js";import{d as a,e as c,f as l,g as u,h,c as v}from"./p-100cb670.js";import{c as f}from"./p-ff10bfbf.js";import"./p-ba32f886.js";import{s as p}from"./p-6c2d07a0.js";import{s as m}from"./p-fab02ef6.js";import{c as b}from"./p-b9961562.js";import{s as g}from"./p-f113b621.js";import{v as y,c as w,s as _}from"./p-95325ec5.js";import{a as k}from"./p-9a298389.js";import{s as E}from"./p-830ab1a3.js";import{c as x,r as S,a as C}from"./p-1f60f497.js";import{a as I,g as T}from"./p-401e165e.js";import{p as R}from"./p-8b323bfb.js";import{r as j,g as L}from"./p-d3366af3.js";import"./p-03631502.js";import"./p-9dbc54d6.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-6ec14893.js";import"./p-93127aa7.js";import"./p-07b1b1ed.js";const P=":host{display:block}sc-table{height:auto}h4{display:block;margin:0;font-weight:var(--sc-font-weight-bold);font-size:var(--sc-font-size-medium)}.stock-alert{--body-spacing:var(--sc-spacing-x-large);--width:500px}.stock-alert__image{width:50px;height:50px;object-fit:cover;margin-right:10px;display:block}.stock-alert__quantity{color:var(--sc-color-gray-500);font-weight:var(--sc-font-weight-bold);display:flex;align-items:center;justify-content:flex-end;gap:var(--sc-spacing-xx-small)}";const A=P;const O=class{constructor(t){i(this,t);this.scUpdateLineItem=e(this,"scUpdateLineItem",7);this.stockErrors=[];this.busy=undefined;this.error=undefined}getOutOfStockLineItems(){var i,e;return(((e=(i=n.checkout)===null||i===void 0?void 0:i.line_items)===null||e===void 0?void 0:e.data)||[]).filter((i=>{var e,t,s;const o=(e=i.price)===null||e===void 0?void 0:e.product;if((i===null||i===void 0?void 0:i.purchasable_status)!=="out_of_stock")return false;if((t=i===null||i===void 0?void 0:i.variant)===null||t===void 0?void 0:t.id){return((s=i===null||i===void 0?void 0:i.variant)===null||s===void 0?void 0:s.available_stock)<i.quantity}return(o===null||o===void 0?void 0:o.available_stock)<i.quantity}))}async onSubmit(){const i=this.getOutOfStockLineItems().map((i=>{var e,t,s;const o=(e=i.price)===null||e===void 0?void 0:e.product;if((t=i===null||i===void 0?void 0:i.variant)===null||t===void 0?void 0:t.id){return{...i,quantity:Math.max(((s=i===null||i===void 0?void 0:i.variant)===null||s===void 0?void 0:s.available_stock)||0,0)}}return{...i,quantity:Math.max((o===null||o===void 0?void 0:o.available_stock)||0,0)}}));try{this.busy=true;n.checkout=await a({id:n.checkout.id,data:{line_items:(i||[]).filter((i=>!!i.quantity)).map((i=>{var e,t;return{id:i.id,price_id:(e=i.price)===null||e===void 0?void 0:e.id,quantity:i.quantity,...((t=i===null||i===void 0?void 0:i.variant)===null||t===void 0?void 0:t.id)?{variant:i.variant.id}:{}}}))}})}catch(i){const e=((i===null||i===void 0?void 0:i.additional_errors)||[]).map((i=>i===null||i===void 0?void 0:i.message)).filter((i=>i));this.error=`${(i===null||i===void 0?void 0:i.message)||wp.i18n.__("Something went wrong.","surecart")} ${(e===null||e===void 0?void 0:e.length)&&` ${e.join(". ")}`}`}finally{this.busy=false}}render(){const i=(this.getOutOfStockLineItems()||[]).map((i=>{var e,t,s;const o=(e=i.price)===null||e===void 0?void 0:e.product;const n=((t=i===null||i===void 0?void 0:i.variant)===null||t===void 0?void 0:t.id)?(s=i===null||i===void 0?void 0:i.variant)===null||s===void 0?void 0:s.available_stock:o===null||o===void 0?void 0:o.available_stock;return{name:o===null||o===void 0?void 0:o.name,image:i===null||i===void 0?void 0:i.image,quantity:i.quantity,available_stock:n}}));const e=i===null||i===void 0?void 0:i.some((i=>(i===null||i===void 0?void 0:i.available_stock)<1));return t(s,null,t("sc-dialog",{open:!!i.length&&f()==="draft",noHeader:true,onScRequestClose:i=>i.preventDefault(),class:"stock-alert"},t("sc-dashboard-module",{class:"subscription-cancel",error:this.error,style:{"--sc-dashboard-module-spacing":"1em"}},t("sc-flex",{slot:"heading","align-items":"center","justify-content":"flex-start"},t("sc-icon",{name:"alert-circle",style:{color:"var(--sc-color-primary-500"}}),e?wp.i18n.__("Out of Stock","surecart"):wp.i18n.__("Quantity Update","surecart")),t("span",{slot:"description"},e?wp.i18n.__("Some items are no longer available. Your cart will be updated.","surecart"):wp.i18n.__("Available quantities for these items have changed. Your cart will be updated.","surecart")),t("sc-card",{"no-padding":true},t("sc-table",null,t("sc-table-cell",{slot:"head"},wp.i18n.__("Description","surecart")),t("sc-table-cell",{slot:"head",style:{width:"100px",textAlign:"right"}},wp.i18n.__("Quantity","surecart")),i.map(((e,s)=>{const o=s===i.length-1;return t("sc-table-row",{style:{"--columns":"2",...o?{border:"none"}:{}}},t("sc-table-cell",null,t("sc-flex",{justifyContent:"flex-start",alignItems:"center"},(e===null||e===void 0?void 0:e.image)&&t("img",{...e.image,class:"stock-alert__image"}),t("h4",null,e.name))),t("sc-table-cell",{style:{width:"100px",textAlign:"right"}},t("span",{class:"stock-alert__quantity"},t("span",null,e===null||e===void 0?void 0:e.quantity)," ",t("sc-icon",{name:"arrow-right"})," ",t("span",null,Math.max(e===null||e===void 0?void 0:e.available_stock,0)))))}))))),t("sc-button",{slot:"footer",type:"primary",loading:this.busy,onClick:()=>this.onSubmit()},wp.i18n.__("Continue","surecart"),t("sc-icon",{name:"arrow-right",slot:"suffix"})),this.busy&&t("sc-block-ui",{spinner:true})))}};O.style=A;const q=".confirm__icon{margin-bottom:var(--sc-spacing-medium);display:flex;justify-content:center}.confirm__icon-container{background:var(--sc-color-primary-500);width:55px;height:55px;border-radius:999999px;display:flex;align-items:center;justify-content:center;font-size:26px;line-height:1;color:white}sc-dialog::part(overlay){backdrop-filter:blur(4px)}";const D=q;const H=class{constructor(t){i(this,t);this.scOrderPaid=e(this,"scOrderPaid",7);this.scSetState=e(this,"scSetState",7);this.showSuccessModal=false;this.manualPaymentMethod=undefined;this.checkoutStatus=undefined;this.successUrl=undefined}handleConfirmOrderEvent(){if(this.checkoutStatus==="test_mode_restricted"){this.confirmOrder()}}async confirmOrder(){var i;this.manualPaymentMethod=(i=p.manualPaymentMethods||[])===null||i===void 0?void 0:i.find((i=>i.id===m.id));this.showSuccessModal=true;b()}handleSuccessModal(){if(this.showSuccessModal){setTimeout((()=>{var i;(i=this.continueButton)===null||i===void 0?void 0:i.focus()}),50)}}render(){var i,e,o,n,d;return t(s,{key:"3c0c52fb69aacbf3bf4fb797586c7a2432c1f790"},t("slot",{key:"d63060fd4eb7e78e7a658bbd8d17c0cf8707e473"}),t("sc-dialog",{key:"01e59224ca7271e9bd5c7457e374f097e4276a73",open:!!this.showSuccessModal,style:{"--body-spacing":"var(--sc-spacing-xxx-large)","--width":"400px"},noHeader:true,onScRequestClose:i=>i.preventDefault()},t("div",{key:"039b32ae7d4c69f45ee0269422cac7154e333ec3",class:"confirm__icon"},t("div",{key:"1a9da9a6d06ab049b13e26dfc59a89e79de54a87",class:"confirm__icon-container"},t("sc-icon",{key:"3e4b7bd0355bd487dfb6c8064353adb79f348b14",name:"check"}))),t("sc-dashboard-module",{key:"3be338aee9787680a67a7dc62fb1f7c835702f98",heading:wp.i18n.__("Test checkout successful!","surecart"),style:{"--sc-dashboard-module-spacing":"var(--sc-spacing-x-large)",textAlign:"center"}},t("span",{key:"b0ae504ecc5c5ba5bc9f2bd7808cfa3b1ec7b088",slot:"description"},wp.i18n.__("This is a simulated test checkout, and no orders were processed. To perform a test order, please contact your store administrator. ","surecart")),!!((i=this.manualPaymentMethod)===null||i===void 0?void 0:i.name)&&!!((e=this.manualPaymentMethod)===null||e===void 0?void 0:e.instructions)&&t("sc-alert",{key:"a3781ca62e40a451874384561f69d4443efec91e",type:"info",open:true,style:{"text-align":"left"}},t("span",{key:"ead7333597d5ba39dafc5ec79713a3311ac8f316",slot:"title"},(o=this.manualPaymentMethod)===null||o===void 0?void 0:o.name),t("div",{key:"98fd27422acf9b9f822a96735828b99660e02ebe",innerHTML:(n=this.manualPaymentMethod)===null||n===void 0?void 0:n.instructions})),t("sc-button",{key:"fae99645209c19f410aea3814cb15da84e2f714f",href:(d=window===null||window===void 0?void 0:window.scData)===null||d===void 0?void 0:d.home_url,size:"large",type:"primary",ref:i=>this.continueButton=i},wp.i18n.__("Go to Homepage","surecart"),t("sc-icon",{key:"11c366e99b08f2197a044734c748d98d6a29aa35",name:"arrow-right",slot:"suffix"})))))}get el(){return o(this)}static get watchers(){return{checkoutStatus:["handleConfirmOrderEvent"],showSuccessModal:["handleSuccessModal"]}}};H.style=D;const F=class{constructor(e){i(this,e);this.state=undefined}componentDidLoad(){window.addEventListener("beforeunload",(i=>this.warnIfUnsavedChanges(i)),{capture:true})}warnIfUnsavedChanges(i){if(["updating","finalizing","confirming"].includes(this.state)){console.log({e:i});i.preventDefault();i.returnValue=wp.i18n.__("Your payment is processing. Exiting this page could cause an error in your order. Please do not navigate away from this page.","surecart");return i.returnValue}}};const M=class{constructor(e){i(this,e);this.disabled=undefined;this.taxProtocol=undefined;this.hasAddress=undefined;this.hasTaxIDField=undefined;this.hasBumpsField=undefined;this.hasTaxLine=undefined;this.hasBumpLine=undefined;this.hasShippingChoices=undefined;this.hasShippingAmount=undefined;this.hasInvoiceDetails=undefined;this.hasInvoiceMemo=undefined;this.hasTrialLineItem=undefined}handleOrderChange(){var i,e,t,s,o,d,r,a,c;if(this.disabled)return;if(g()){this.addAddressField()}if((t=(e=(i=n.checkout)===null||i===void 0?void 0:i.recommended_bumps)===null||e===void 0?void 0:e.data)===null||t===void 0?void 0:t.length){this.addBumps()}if(!!((s=n.checkout)===null||s===void 0?void 0:s.tax_amount)){this.addTaxLine()}if(((o=n.checkout)===null||o===void 0?void 0:o.shipping_enabled)&&((d=n.checkout)===null||d===void 0?void 0:d.selected_shipping_choice_required)){this.addShippingChoices()}if(!!((r=n.checkout)===null||r===void 0?void 0:r.shipping_amount)){this.addShippingAmount()}if(!!((a=n.checkout)===null||a===void 0?void 0:a.invoice)){this.addInvoiceDetails();this.addInvoiceMemo()}if(!!((c=n.checkout)===null||c===void 0?void 0:c.trial_amount)){this.addTrialLineItem()}}handleHasAddressChange(){if(!this.hasAddress)return;this.handleShippingAddressRequired()}componentWillLoad(){var i,e;this.hasAddress=!!this.el.querySelector("sc-order-shipping-address");this.hasTaxIDField=!!this.el.querySelector("sc-order-tax-id-input");this.hasBumpsField=!!this.el.querySelector("sc-order-bumps");this.hasTaxLine=!!this.el.querySelector("sc-line-item-tax");this.hasShippingChoices=!!this.el.querySelector("sc-shipping-choices");this.hasShippingAmount=!!this.el.querySelector("sc-line-item-shipping");this.hasInvoiceDetails=!!this.el.querySelector("sc-invoice-details");this.hasInvoiceMemo=!!this.el.querySelector("sc-invoice-memo");this.hasTrialLineItem=!!this.el.querySelector("sc-line-item-trial");if((i=this.taxProtocol)===null||i===void 0?void 0:i.tax_enabled){this.addAddressField();if((e=this.taxProtocol)===null||e===void 0?void 0:e.eu_vat_required){this.addTaxIDField()}}this.handleOrderChange();this.removeCheckoutListener=d("checkout",(()=>this.handleOrderChange()));this.removePaymentRequiresShippingListener=d("paymentMethodRequiresShipping",(()=>this.handleOrderChange()))}disconnectedCallback(){this.removeCheckoutListener();this.removePaymentRequiresShippingListener()}handleShippingAddressRequired(){var i;if(!((i=n.checkout)===null||i===void 0?void 0:i.shipping_address_required))return;const e=this.el.querySelector("sc-order-shipping-address");if(!e)return;e.required=true;const t=this.el.querySelector("sc-customer-name");if(!!t){t.required=true;return}const s=this.el.querySelector("sc-customer-firstname");const o=this.el.querySelector("sc-customer-lastname");if(!!s){s.required=true;if(!!o){o.required=true}return}e.requireName=true;e.showName=true}addAddressField(){if(this.hasAddress){return}const i=this.el.querySelector("sc-payment");const e=document.createElement("sc-order-shipping-address");e.label=wp.i18n.__("Shipping Address","surecart");const t=document.createElement("sc-order-billing-address");t.label=wp.i18n.__("Billing Address","surecart");i.parentNode.insertBefore(e,i);i.parentNode.insertBefore(t,i);this.hasAddress=true}addTaxIDField(){if(this.hasTaxIDField)return;const i=this.el.querySelector("sc-payment");const e=document.createElement("sc-order-tax-id-input");i.parentNode.insertBefore(e,i);this.hasTaxIDField=true}addBumps(){if(this.hasBumpsField)return;const i=this.el.querySelector("sc-order-billing-address")||this.el.querySelector("sc-payment");const e=document.createElement("sc-order-bumps");i===null||i===void 0?void 0:i.parentNode.insertBefore(e,i.nextSibling);this.hasBumpsField=true}addTaxLine(){var i;if(this.hasTaxLine)return;const e=this.el.querySelector("sc-line-item-total[total=total]");const t=document.createElement("sc-line-item-tax");if(!e)return;if(((i=e===null||e===void 0?void 0:e.previousElementSibling)===null||i===void 0?void 0:i.tagName)==="SC-DIVIDER"){e.parentNode.insertBefore(t,e.previousElementSibling)}else{e.parentNode.insertBefore(t,e)}this.hasTaxLine=true}addShippingChoices(){if(this.hasShippingChoices)return;const i=this.el.querySelector("sc-payment");const e=document.createElement("sc-shipping-choices");i.parentNode.insertBefore(e,i);this.hasShippingChoices=true}addShippingAmount(){var i;if(this.hasShippingAmount)return;let e=this.el.querySelector("sc-line-item-tax");const t=this.el.querySelector("sc-line-item-total[total=total]");if(!t)return;if(!e){e=((i=t===null||t===void 0?void 0:t.previousElementSibling)===null||i===void 0?void 0:i.tagName)==="SC-DIVIDER"?t.previousElementSibling:t}const s=document.createElement("sc-line-item-shipping");e.parentNode.insertBefore(s,e);this.hasShippingAmount=true}addInvoiceDetails(){if(this.hasInvoiceDetails)return;let i=this.el.querySelector("sc-line-items");const e=document.createElement("sc-invoice-details");i.parentNode.insertBefore(e,i);const t=document.createElement("sc-line-item-invoice-number");e.appendChild(t);const s=document.createElement("sc-line-item-invoice-due-date");e.appendChild(s);const o=document.createElement("sc-line-item-invoice-receipt-download");e.appendChild(o);const n=document.createElement("sc-divider");e.appendChild(n);this.hasInvoiceDetails=true}addInvoiceMemo(){if(this.hasInvoiceMemo)return;const i=this.el.querySelector("sc-order-summary");const e=document.createElement("sc-invoice-details");i.parentNode.insertBefore(e,i.nextSibling);const t=document.createElement("sc-invoice-memo");e.appendChild(t);this.hasInvoiceMemo=true}addTrialLineItem(){if(this.hasTrialLineItem)return;const i=this.el.querySelector("sc-line-item-total[total=subtotal]");const e=document.createElement("sc-line-item-trial");if(!i)return;i.parentNode.insertBefore(e,i.nextSibling);this.hasTrialLineItem=true}render(){return t("slot",{key:"e66bd28dd1186def415bcd23fa32a6aa818ae5c0"})}get el(){return o(this)}static get watchers(){return{hasAddress:["handleHasAddressChange"]}}};const U=class{constructor(e){i(this,e)}componentWillLoad(){this.maybeAddErrorsComponent()}maybeAddErrorsComponent(){var i,e;if(!!this.el.querySelector("sc-checkout-form-errors"))return;const t=document.createElement("sc-checkout-form-errors");(e=(i=this.el.querySelector("sc-form"))===null||i===void 0?void 0:i.prepend)===null||e===void 0?void 0:e.call(i,t)}render(){return t("slot",{key:"cc12da4f1a1b51408b597cbfc88f6b295349dcc3"})}get el(){return o(this)}};const J=class{constructor(t){i(this,t);this.scSetCheckoutFormState=e(this,"scSetCheckoutFormState",7);this._stateService=y(w);this.checkoutState=w.initialState}setState(i){const{send:e}=this._stateService;r(i);return e(i)}handleCheckoutStateChange(i){this.scSetCheckoutFormState.emit(i.value)}componentWillLoad(){this._stateService.subscribe((i=>this.checkoutState=i));this._stateService.start()}disconnectedCallback(){this._stateService.stop()}handleSetStateEvent(i){this.setState(i.detail)}async handlePaid(){this.setState("PAID")}render(){if(this.checkoutState.value==="expired"){return t("sc-block-ui",null,t("div",null,wp.i18n.__("Please refresh the page.","surecart")))}return t("slot",null)}static get watchers(){return{checkoutState:["handleCheckoutStateChange"]}}};const z=":host{display:block}";const N=z;const V=class{constructor(t){i(this,t);this.scSetLoggedIn=e(this,"scSetLoggedIn",7);this.scSetCustomer=e(this,"scSetCustomer",7);this.loggedIn=undefined;this.order=undefined;this.notice=undefined;this.open=undefined;this.loading=undefined;this.error=undefined}handleLoginPrompt(){this.open=true}handleLoginDialogChange(i){if(i){setTimeout((()=>{this.loginForm.querySelector("sc-input").triggerFocus()}),100)}}handleLoggedInChange(i,e){if(e===false&&i){this.notice=true}}handleOrderChange(i,e){if((i===null||i===void 0?void 0:i.updated_at)!==(e===null||e===void 0?void 0:e.updated_at)){this.notice=false}}async handleFormSubmit(i){i.preventDefault();i.stopImmediatePropagation();this.error=null;const{login:e,password:t}=await i.target.getFormJson();try{this.loading=true;const{name:i,email:s}=await k({method:"POST",path:"surecart/v1/login",data:{login:e,password:t}});this.scSetLoggedIn.emit(true);this.scSetCustomer.emit({name:i,email:s});this.open=false}catch(i){console.error(i);this.error=(i===null||i===void 0?void 0:i.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=false}}render(){return t(s,{key:"a763c6b9213e0956cbffc957eb5437ea2deabffd"},!!this.notice&&t("sc-alert",{key:"e777c76f58e730844f1af07f335e889907b3a102",type:"success",open:true,style:{marginBottom:"var(--sc-form-row-spacing)"},closable:true},t("span",{key:"1f81a88f218bee201dc7fb6e4159c3b2520b87c0",slot:"title"},wp.i18n.__("Welcome back!","surecart")),wp.i18n.__("You have logged in successfully.","surecart")),t("slot",{key:"62be3a16c2d427dd195ae6f2717e1fe3d5c26c41"}),!this.loggedIn&&t("sc-dialog",{key:"13661d9b1392306d30939a86a7be1bf0b37a1734",label:wp.i18n.__("Login to your account","surecart"),open:this.open,onScRequestClose:()=>this.open=false},t("sc-form",{key:"694e35ef08476e3cce5f0c5617ba096e817f79b4",ref:i=>this.loginForm=i,onScFormSubmit:i=>{i.preventDefault();i.stopImmediatePropagation()},onScSubmit:i=>this.handleFormSubmit(i)},!!this.error&&t("sc-alert",{key:"0cfe2942095223c9e3e87b54f868c69ab38b2696",type:"danger",open:!!this.error},this.error),t("sc-input",{key:"53d7104a3aa67aba54e31e932b74008765f43ecf",label:wp.i18n.__("Email or Username","surecart"),type:"text",name:"login",required:true,autofocus:this.open}),t("sc-input",{key:"77ddf7f0099f4c62bd5af9ebdfc273123b888a40",label:wp.i18n.__("Password","surecart"),type:"password",name:"password",required:true}),t("sc-button",{key:"fa7141488876dce1c30aa80abdf49a8e56c4c15a",type:"primary",full:true,loading:this.loading,submit:true},wp.i18n.__("Login","surecart")))))}static get watchers(){return{open:["handleLoginDialogChange"],loggedIn:["handleLoggedInChange"],order:["handleOrderChange"]}}};V.style=N;const Y=".confirm__icon{margin-bottom:var(--sc-spacing-medium);display:flex;justify-content:center}.confirm__icon-container{background:var(--sc-color-primary-500);width:55px;height:55px;border-radius:999999px;display:flex;align-items:center;justify-content:center;font-size:26px;line-height:1;color:white}sc-dialog::part(overlay){backdrop-filter:blur(4px)}";const G=Y;const W=class{constructor(t){i(this,t);this.scOrderPaid=e(this,"scOrderPaid",7);this.scSetState=e(this,"scSetState",7);this.showSuccessModal=false;this.manualPaymentMethod=undefined;this.checkoutStatus=undefined;this.successUrl=undefined}handleConfirmOrderEvent(){if(this.checkoutStatus==="confirming"){this.confirmOrder()}else if(this.checkoutStatus==="confirmed"){E(wp.i18n.__("Order has been confirmed. Please select continue to go to the next step.","surecart"))}}async confirmOrder(){var i,e,t,s;try{n.checkout=await k({method:"PATCH",path:I(`surecart/v1/checkouts/${(i=n===null||n===void 0?void 0:n.checkout)===null||i===void 0?void 0:i.id}/confirm`,{expand:c})});this.scSetState.emit("CONFIRMED")}catch(i){console.error(i);x(i)}finally{this.manualPaymentMethod=((e=n.checkout)===null||e===void 0?void 0:e.manual_payment_method)||null;const i=n.checkout;const o=n.formId;if(!!((t=i===null||i===void 0?void 0:i.current_upsell)===null||t===void 0?void 0:t.permalink)){setTimeout((()=>{var e;return window.location.assign(I((e=i===null||i===void 0?void 0:i.current_upsell)===null||e===void 0?void 0:e.permalink,{sc_checkout_id:i===null||i===void 0?void 0:i.id,sc_form_id:o}))}),50);b();return}const d=((s=i===null||i===void 0?void 0:i.metadata)===null||s===void 0?void 0:s.success_url)||this.successUrl;if(d){this.scSetState.emit("REDIRECT");const e=I(d,{sc_order:i===null||i===void 0?void 0:i.id});setTimeout((()=>window.location.assign(e)),50)}else{this.showSuccessModal=true}b()}}getSuccessUrl(){var i,e,t,s,o;const d=((e=(i=n.checkout)===null||i===void 0?void 0:i.metadata)===null||e===void 0?void 0:e.success_url)||this.successUrl;return d?I(d,{sc_order:(t=n.checkout)===null||t===void 0?void 0:t.id}):(o=(s=window===null||window===void 0?void 0:window.scData)===null||s===void 0?void 0:s.pages)===null||o===void 0?void 0:o.dashboard}handleSuccessModal(){if(this.showSuccessModal){setTimeout((()=>{var i;(i=this.continueButton)===null||i===void 0?void 0:i.focus()}),50)}}render(){var i,e,o,n,d,r,a,c,l,u;return t(s,{key:"7973aba1a56af4b61401a696edfa067abd141373"},t("slot",{key:"fdacfae32ead0829bce54e408d269a24f2fc150b"}),t("sc-dialog",{key:"15e80e613a598d8a2bde41acb684da589eb4932b",open:!!this.showSuccessModal,style:{"--body-spacing":"var(--sc-spacing-xxx-large)","--width":"400px"},noHeader:true,onScRequestClose:i=>i.preventDefault()},t("div",{key:"26de364fd655801745d31dedfaeab6756043aaff",class:"confirm__icon"},t("div",{key:"0f900301ba4b239105bfb99e4b4840bf25edc7df",class:"confirm__icon-container"},t("sc-icon",{key:"3ef65dd6612a716dfb7b85c7d32add0f4f1c37dc",name:"check"}))),t("sc-dashboard-module",{key:"a1045a752a3bf5f1c0e924eed98810d10c0c6fb5",heading:((e=(i=_===null||_===void 0?void 0:_.text)===null||i===void 0?void 0:i.success)===null||e===void 0?void 0:e.title)||wp.i18n.__("Thanks for your order!","surecart"),style:{"--sc-dashboard-module-spacing":"var(--sc-spacing-x-large)",textAlign:"center"}},t("span",{key:"224b1a413a4a5fcf2bd2c1436187d2345672c50b",slot:"description"},((n=(o=_===null||_===void 0?void 0:_.text)===null||o===void 0?void 0:o.success)===null||n===void 0?void 0:n.description)||wp.i18n.__("Your payment was successful. A receipt is on its way to your inbox.","surecart")),!!((d=this.manualPaymentMethod)===null||d===void 0?void 0:d.name)&&!!((r=this.manualPaymentMethod)===null||r===void 0?void 0:r.instructions)&&t("sc-alert",{key:"c5a97549d2be58accd40d902d1bfae3c2067b59a",type:"info",open:true,style:{"text-align":"left"}},t("span",{key:"1c3f2e8246961b4130390b0e3280a156508b4449",slot:"title"},(a=this.manualPaymentMethod)===null||a===void 0?void 0:a.name),t("div",{key:"2e7b13d7408a534e8486029cf138b371ee481c44",innerHTML:(c=this.manualPaymentMethod)===null||c===void 0?void 0:c.instructions})),t("sc-button",{key:"40833754a20769b934a6a78a3166dc232205241c",href:this.getSuccessUrl(),size:"large",type:"primary",ref:i=>this.continueButton=i},((u=(l=_===null||_===void 0?void 0:_.text)===null||l===void 0?void 0:l.success)===null||u===void 0?void 0:u.button)||wp.i18n.__("Continue","surecart"),t("sc-icon",{key:"3624aed8d8bb2ed6075cab3f37abb0ec09c854d7",name:"arrow-right",slot:"suffix"})))))}get el(){return o(this)}static get watchers(){return{checkoutStatus:["handleConfirmOrderEvent"],showSuccessModal:["handleSuccessModal"]}}};W.style=G;const Z=class{constructor(t){i(this,t);this.scUpdateOrderState=e(this,"scUpdateOrderState",7);this.scUpdateDraftState=e(this,"scUpdateDraftState",7);this.scPaid=e(this,"scPaid",7);this.scSetState=e(this,"scSetState",7);this.prices=[];this.persist=true}handlePricesChange(){let i=this.addInitialPrices()||[];if(!(i===null||i===void 0?void 0:i.length)){return}return this.loadUpdate({line_items:i})}async finalize(){return await this.handleFormSubmit()}async getFormData(){let i={};const e=this.el.querySelector("sc-form");if(e){const t=await e.getFormJson();i=R(t)}return i}async handleFormSubmit(){var i,e,t,s,o,d,a,c,u,h,v,f;S();r("FINALIZE");if(((i=n===null||n===void 0?void 0:n.checkout)===null||i===void 0?void 0:i.payment_method_required)&&(m===null||m===void 0?void 0:m.id)==="stripe"&&p.config.stripe.paymentElement){if(!((e=p===null||p===void 0?void 0:p.instances)===null||e===void 0?void 0:e.stripeElements)){r("REJECT");this.handleErrorResponse({message:"Stripe Elements not found.",code:"stripe_elements_not_found"});return new Error("Stripe Elements not found.")}const{error:i}=await((t=p===null||p===void 0?void 0:p.instances)===null||t===void 0?void 0:t.stripeElements.submit());if(i){console.error({error:i});r("REJECT");x(i);return}}let b=await this.getFormData();if(((s=window===null||window===void 0?void 0:window.scData)===null||s===void 0?void 0:s.recaptcha_site_key)&&(window===null||window===void 0?void 0:window.grecaptcha)){try{b["grecaptcha"]=await window.grecaptcha.execute(window.scData.recaptcha_site_key,{action:"surecart_checkout_submit"})}catch(i){console.error(i);r("REJECT");this.handleErrorResponse(i);return new Error(i===null||i===void 0?void 0:i.message)}}try{await this.update(b)}catch(i){console.error(i);r("REJECT");this.handleErrorResponse(i)}try{n.checkout=await l({id:(o=n===null||n===void 0?void 0:n.checkout)===null||o===void 0?void 0:o.id,query:{...(m===null||m===void 0?void 0:m.method)?{payment_method_type:m===null||m===void 0?void 0:m.method}:{},return_url:I(window.location.href,{...((d=n===null||n===void 0?void 0:n.checkout)===null||d===void 0?void 0:d.id)?{checkout_id:(a=n===null||n===void 0?void 0:n.checkout)===null||a===void 0?void 0:a.id}:{},is_surecart_payment_redirect:true})},data:b,processor:{id:m.id,manual:m.manual}});if((v=(h=(u=(c=n.checkout)===null||c===void 0?void 0:c.payment_intent)===null||u===void 0?void 0:u.processor_data)===null||h===void 0?void 0:h.mollie)===null||v===void 0?void 0:v.checkout_url){r("PAYING");return setTimeout((()=>{var i,e,t,s;return window.location.assign((s=(t=(e=(i=n.checkout)===null||i===void 0?void 0:i.payment_intent)===null||e===void 0?void 0:e.processor_data)===null||t===void 0?void 0:t.mollie)===null||s===void 0?void 0:s.checkout_url)}),50)}if(["paid","processing"].includes((f=n.checkout)===null||f===void 0?void 0:f.status)){this.scPaid.emit()}setTimeout((()=>{r("PAYING")}),50);return n.checkout}catch(i){console.error(i);this.handleErrorResponse(i);return new Error(i===null||i===void 0?void 0:i.message)}}async handlePaid(){r("PAID")}async handleAbandonedCartUpdate(i){const e=i.detail;this.loadUpdate({abandoned_checkout_enabled:e})}componentDidLoad(){this.findOrCreateOrder()}async findOrCreateOrder(){var i;const{redirect_status:e,checkout_id:t,line_items:s,coupon:o,is_surecart_payment_redirect:d}=T(window.location.href);window.history.replaceState({},document.title,j(window.location.href,"redirect_status","coupon","line_items","confirm_checkout_id","checkout_id","no_cart","is_surecart_payment_redirect"));if(!!d&&!!t){r("FINALIZE");r("PAYING");return this.handleCheckoutIdFromUrl(t,o,{refresh_status:true})}if(!!e){return this.handleRedirectStatus(e,t)}if(!!t){return this.handleCheckoutIdFromUrl(t,o)}if(!!s){return this.handleInitialLineItems(s,o)}const a=(i=n===null||n===void 0?void 0:n.checkout)===null||i===void 0?void 0:i.id;if(a&&this.persist){return this.handleExistingCheckout(a,o)}return this.handleNewCheckout(o)}async handleRedirectStatus(i,e){var t,s;console.info("Handling payment redirect.");if(i==="failed"){x(wp.i18n.__("Payment unsuccessful. Please try again.","surecart"));return}if(!e){x(wp.i18n.__("Could not find checkout. Please contact us before attempting to purchase again.","surecart"));return}try{r("FINALIZE");n.checkout=await u({id:e,query:{refresh_status:true}});if(((t=n.checkout)===null||t===void 0?void 0:t.status)&&["paid","processing"].includes((s=n.checkout)===null||s===void 0?void 0:s.status)){setTimeout((()=>{r("PAID");this.scPaid.emit()}),100)}}catch(i){this.handleErrorResponse(i)}}async handleCheckoutIdFromUrl(i,e="",t={}){var s;console.info("Handling existing checkout from url.",e,i);if(e){return this.loadUpdate({id:i,discount:{promotion_code:e},refresh_line_items:true,...t})}try{r("FETCH");n.checkout=await u({id:i,query:{refresh_line_items:true,...t}});r("RESOLVE")}catch(i){this.handleErrorResponse(i)}switch((s=n.checkout)===null||s===void 0?void 0:s.status){case"paid":case"processing":return setTimeout((()=>{r("FINALIZE");r("PAID");this.scPaid.emit()}),100);case"payment_failed":x({message:wp.i18n.__("Payment unsuccessful.","surecart")});r("REJECT");return;case"payment_intent_canceled":r("REJECT");return;case"canceled":b();x({message:wp.i18n.__("Payment canceled. Please try again.","surecart")});r("REJECT");return}}async handleInitialLineItems(i,e){console.info("Handling initial line items.");const t=this.el.querySelector("sc-order-shipping-address");b();return this.loadUpdate({line_items:i,refresh_line_items:true,...e?{discount:{promotion_code:e}}:{},...(t===null||t===void 0?void 0:t.defaultCountry)?{shipping_address:{country:t===null||t===void 0?void 0:t.defaultCountry}}:{}})}async handleNewCheckout(i){var e,t,s;const o=this.getFormData();let d=n.initialLineItems||[];const a=this.el.querySelector("sc-order-shipping-address");try{r("FETCH");n.checkout=await h({data:{...o,...i?{discount:{promotion_code:i}}:{},...(a===null||a===void 0?void 0:a.defaultCountry)?{shipping_address:{country:a===null||a===void 0?void 0:a.defaultCountry}}:{},line_items:d,...((e=n.taxProtocol)===null||e===void 0?void 0:e.eu_vat_required)?{tax_identifier:{number_type:"eu_vat"}}:{}}});r("RESOLVE")}catch(i){console.error(i);this.handleErrorResponse(i);if(((s=(t=i===null||i===void 0?void 0:i.additional_errors)===null||t===void 0?void 0:t[0])===null||s===void 0?void 0:s.code)==="checkout.discount.coupon.blank"){await this.handleNewCheckout(false);x(i)}}}async handleExistingCheckout(i,e){var t,s,o;if(!i)return this.handleNewCheckout(e);console.info("Handling existing checkout.");try{r("FETCH");n.checkout=await v({id:i,data:{...e?{discount:{promotion_code:e}}:{},...((t=n.taxProtocol)===null||t===void 0?void 0:t.eu_vat_required)?{tax_identifier:{number_type:"eu_vat"}}:{},refresh_line_items:true}});r("RESOLVE")}catch(e){console.error(e);this.handleErrorResponse(e);if(((o=(s=e===null||e===void 0?void 0:e.additional_errors)===null||s===void 0?void 0:s[0])===null||o===void 0?void 0:o.code)==="checkout.discount.coupon.blank"){await this.handleExistingCheckout(i,false);x(e)}}}async handleErrorResponse(i){var e,t,s,o,d,a;if(["checkout.not_found"].includes(i===null||i===void 0?void 0:i.code)){b();return this.handleNewCheckout(false)}if(["test_mode_restricted"].includes(i===null||i===void 0?void 0:i.code)){r("TEST_MODE_RESTRICTED");return}const c=((i===null||i===void 0?void 0:i.additional_errors)||[]).some((i=>{var e,t;const s=((t=(e=i===null||i===void 0?void 0:i.data)===null||e===void 0?void 0:e.options)===null||t===void 0?void 0:t.purchasable_statuses)||[];return["price_old_version","variant_old_version"].some((i=>s.includes(i)))}));if(c){await this.loadUpdate({id:(e=n===null||n===void 0?void 0:n.checkout)===null||e===void 0?void 0:e.id,refresh_line_items:true,status:"draft"});C(((s=(t=i===null||i===void 0?void 0:i.additional_errors)===null||t===void 0?void 0:t[0])===null||s===void 0?void 0:s.message)||wp.i18n.__("Some products in your order were outdated and have been updated. Please review your order summary before proceeding to payment.","surecart"));r("REJECT");return}if(((d=(o=i===null||i===void 0?void 0:i.additional_errors)===null||o===void 0?void 0:o[0])===null||d===void 0?void 0:d.code)==="checkout.product.out_of_stock"){this.fetch();r("REJECT");return}if(["order.invalid_status_transition"].includes(i===null||i===void 0?void 0:i.code)){await this.loadUpdate({id:(a=n===null||n===void 0?void 0:n.checkout)===null||a===void 0?void 0:a.id,status:"draft"});this.handleFormSubmit();return}if((i===null||i===void 0?void 0:i.code)==="rest_cookie_invalid_nonce"){r("EXPIRE");return}if((i===null||i===void 0?void 0:i.code)==="readonly"){b();window.location.assign(j(window.location.href,"order"));return}x(i);r("REJECT")}async initialize(i={}){let e=n.initialLineItems||[];return this.loadUpdate({...(e===null||e===void 0?void 0:e.length)?{line_items:e}:{},...i})}addInitialPrices(){var i;if(!((i=this===null||this===void 0?void 0:this.prices)===null||i===void 0?void 0:i.length))return[];if(this.prices.some((i=>!(i===null||i===void 0?void 0:i.id)))){return}return this.prices.map((i=>({price_id:i.id,quantity:i.quantity,variant:i.variant})))}getSessionId(){var i,e;const t=L(window.location.href,"checkout_id");if(!!t){return t}if((i=n===null||n===void 0?void 0:n.checkout)===null||i===void 0?void 0:i.id){return(e=n===null||n===void 0?void 0:n.checkout)===null||e===void 0?void 0:e.id}return null}async fetchCheckout(i,{query:e={},data:t={}}={}){try{r("FETCH");const s=await v({id:i,query:e,data:t});r("RESOLVE");return s}catch(i){this.handleErrorResponse(i)}}async fetch(i={}){try{r("FETCH");n.checkout=await u({id:this.getSessionId(),query:i});r("RESOLVE")}catch(i){this.handleErrorResponse(i)}}async update(i={},e={}){try{n.checkout=await v({id:(i===null||i===void 0?void 0:i.id)?i.id:this.getSessionId(),data:i,query:e})}catch(i){if(["checkout.not_found"].includes(i===null||i===void 0?void 0:i.code)){b();return this.initialize()}console.error(i);throw i}}async loadUpdate(i={}){try{r("FETCH");await this.update(i);r("RESOLVE")}catch(i){this.handleErrorResponse(i)}}render(){return t("sc-line-items-provider",{key:"19e26b11d01251c4917a7e66f00bd4a4b8851986",order:n===null||n===void 0?void 0:n.checkout,onScUpdateLineItems:i=>this.loadUpdate({line_items:i.detail})},t("slot",{key:"b99ea770aad67e4b52689389722e41fd3c9cdf5f"}))}get el(){return o(this)}static get watchers(){return{prices:["handlePricesChange"]}}};export{O as sc_checkout_stock_alert,H as sc_checkout_test_complete,F as sc_checkout_unsaved_changes_warning,M as sc_form_components_validator,U as sc_form_error_provider,J as sc_form_state_provider,V as sc_login_provider,W as sc_order_confirm_provider,Z as sc_session_provider};
//# sourceMappingURL=p-88e2437a.entry.js.map