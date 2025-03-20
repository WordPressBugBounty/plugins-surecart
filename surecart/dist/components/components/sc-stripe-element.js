import{proxyCustomElement,HTMLElement,createEvent,h,Fragment}from"@stencil/core/internal/client";import{p as pure}from"./pure.js";import{o as openWormhole}from"./consumer.js";import{s as state}from"./watchers5.js";import{a as availableProcessors}from"./getters5.js";import{c as createErrorNotice}from"./mutations3.js";import{u as updateFormState}from"./mutations5.js";import{d as defineCustomElement$4}from"./sc-form-control2.js";import{d as defineCustomElement$3}from"./sc-text2.js";import{d as defineCustomElement$2}from"./sc-visually-hidden2.js";const scStripeElementCss="sc-stripe-element{display:block;--focus-ring:0 0 0 var(--sc-focus-ring-width) var(--sc-focus-ring-color-primary)}sc-stripe-element sc-input{--sc-input-height-medium:auto}.sc-stripe *{font-family:var(--sc-input-font-family);font-weight:var(--sc-input-font-weight);font-size:var(--sc-input-font-size)}.sc-stripe-element{border-radius:var(--sc-input-border-radius-medium);font-size:var(--sc-input-font-size-medium);height:var(--sc-input-height-medium);width:100%;box-sizing:border-box !important;background-color:var(--sc-input-background-color);border:solid 1px var(--sc-input-border-color, var(--sc-input-border));box-shadow:var(--sc-input-box-shadow);transition:var(--sc-input-transition, var(--sc-transition-medium)) color, var(--sc-input-transition, var(--sc-transition-medium)) border, var(--sc-input-transition, var(--sc-transition-medium)) box-shadow}.sc-stripe-element:hover{background-color:var(--sc-input-background-color-hover);border-color:var(--sc-input-border-color-hover)}.sc-stripe-element.StripeElement--focus{background-color:var(--sc-input-background-color-focus);border-color:var(--sc-input-border-color-focus);box-shadow:var(--focus-ring)}.sc-stripe fieldset{margin:0 15px 20px;padding:0;border-style:none;background-color:#7795f8;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #829fff;border-radius:4px}.sc-stripe .row{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;margin-left:15px}.sc-stripe .row+.row{border-top:1px solid #819efc}.sc-stripe label{width:15%;min-width:70px;padding:11px 0;color:#c4f0ff;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.sc-stripe input,.sc-stripe button{-webkit-appearance:none;-moz-appearance:none;appearance:none;outline:none;border-style:none}.sc-stripe input:-webkit-autofill{-webkit-text-fill-color:#fce883;transition:background-color 100000000s;-webkit-animation:1ms void-animation-out}.sc-stripe .StripeElement--webkit-autofill{background:transparent !important}.sc-stripe .StripeElement{width:100%;padding:var(--sc-input-spacing-small)}.sc-stripe input{width:100%;padding:11px;color:#fff;background-color:transparent;-webkit-animation:1ms void-animation-out}.sc-stripe input::-webkit-input-placeholder{color:#87bbfd}.sc-stripe input::-moz-placeholder{color:#87bbfd}.sc-stripe input:-ms-input-placeholder{color:#87bbfd}.sc-stripe button{display:block;width:calc(100% - 30px);height:40px;margin:40px 15px 0;background-color:#f6a4eb;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #ffb9f6;border-radius:4px;color:#fff;font-weight:600;cursor:pointer}.sc-stripe button:active{background-color:#d782d9;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #e298d8}.sc-stripe .error svg .base{fill:#fff}.sc-stripe .error svg .glyph{fill:#6772e5}.sc-stripe .error .message{color:#fff}.sc-stripe .success .icon .border{stroke:#87bbfd}.sc-stripe .success .icon .checkmark{stroke:#fff}.sc-stripe .success .title{color:#fff}.sc-stripe .success .message{color:#9cdbff}.sc-stripe .success .reset path{fill:#fff}",ScStripeElementStyle0=scStripeElementCss,ScStripeElement$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.scPaid=createEvent(this,"scPaid",7),this.scSetState=createEvent(this,"scSetState",7),this.scPaymentInfoAdded=createEvent(this,"scPaymentInfoAdded",7),this.disabled=void 0,this.order=void 0,this.mode="live",this.size="medium",this.label=void 0,this.secureText="",this.showLabel=!0,this.hasFocus=void 0,this.selectedProcessorId=void 0,this.formState=void 0,this.error=void 0,this.confirming=void 0}async componentWillLoad(){const e=(availableProcessors()||[]).find((e=>"stripe"===e.processor_type));if(!e)return;const{account_id:t,publishable_key:r}=(null==e?void 0:e.processor_data)||{};try{this.stripe=await pure.loadStripe(r,{stripeAccount:t}),this.elements=this.stripe.elements()}catch(e){this.error=(null==e?void 0:e.message)||wp.i18n.__("Stripe could not be loaded","surecart")}}async maybeConfirmOrder(e){var t,r,o,i,s,n,a,c,l,d,m,p,u,h,f,v,b,g,y,x,S,_x,E;if("paying"===e&&"stripe"===(null==state?void 0:state.id)&&"stripe"===(null===(r=null===(t=this.order)||void 0===t?void 0:t.payment_intent)||void 0===r?void 0:r.processor_type)&&(null===(i=null===(o=this.order)||void 0===o?void 0:o.payment_intent)||void 0===i?void 0:i.external_intent_id)&&(null===(c=null===(a=null===(n=null===(s=this.order)||void 0===s?void 0:s.payment_intent)||void 0===n?void 0:n.processor_data)||void 0===a?void 0:a.stripe)||void 0===c?void 0:c.client_secret)&&(null===(p=null===(m=null===(d=null===(l=this.order)||void 0===l?void 0:l.payment_intent)||void 0===d?void 0:d.processor_data)||void 0===m?void 0:m.stripe)||void 0===p?void 0:p.type)&&!this.confirming){this.confirming=!0;try{let e;if(e="setup"==(null===(v=null===(f=null===(h=null===(u=this.order)||void 0===u?void 0:u.payment_intent)||void 0===h?void 0:h.processor_data)||void 0===f?void 0:f.stripe)||void 0===v?void 0:v.type)?await this.confirmCardSetup(null===(y=null===(g=null===(b=this.order)||void 0===b?void 0:b.payment_intent)||void 0===g?void 0:g.processor_data)||void 0===y?void 0:y.stripe.client_secret):await this.confirmCardPayment(null===(E=null===(_x=null===(S=null===(x=this.order)||void 0===x?void 0:x.payment_intent)||void 0===S?void 0:S.processor_data)||void 0===_x?void 0:_x.stripe)||void 0===E?void 0:E.client_secret),null==e?void 0:e.error)throw this.error=e.error.message,e.error;this.scSetState.emit("PAID"),this.scPaid.emit()}catch(e){updateFormState("REJECT"),createErrorNotice(e),e.message&&(this.error=e.message),this.confirming=!1,this.scSetState.emit("REJECT")}}}async confirmCardPayment(e){var t,r;return this.stripe.confirmCardPayment(e,{payment_method:{card:this.element,billing_details:{...(null===(t=null==this?void 0:this.order)||void 0===t?void 0:t.name)?{name:this.order.name}:{},...(null===(r=null==this?void 0:this.order)||void 0===r?void 0:r.email)?{email:this.order.email}:{}}}})}async confirmCardSetup(e){var t,r;return this.stripe.confirmCardSetup(e,{payment_method:{card:this.element,billing_details:{...(null===(t=null==this?void 0:this.order)||void 0===t?void 0:t.name)?{name:this.order.name}:{},...(null===(r=null==this?void 0:this.order)||void 0===r?void 0:r.email)?{email:this.order.email}:{}}}})}componentDidLoad(){if(!this.elements)return;const e=getComputedStyle(document.body);this.elements.create("card",{style:{base:{color:e.getPropertyValue("--sc-input-label-color"),fontSize:"16px",iconColor:e.getPropertyValue("--sc-stripe-icon-color"),fontSmoothing:"antialiased","::placeholder":{color:e.getPropertyValue("--sc-input-placeholder-color")}},invalid:{color:e.getPropertyValue("--sc-color-error-500"),":focus":{color:e.getPropertyValue("--sc-input-label-color")}}}}).mount(this.container),this.element=this.elements.getElement("card"),this.element.on("change",(e=>{var t,r,o;e.complete&&this.scPaymentInfoAdded.emit({processor_type:"stripe",checkout_id:this.order.id,currency:this.order.currency,total_amount:this.order.total_amount,line_items:this.order.line_items,payment_method:{billing_details:{name:(null===(t=null==this?void 0:this.order)||void 0===t?void 0:t.name)?this.order.name:"",email:(null===(r=null==this?void 0:this.order)||void 0===r?void 0:r.email)?this.order.email:""}}}),this.error=(null===(o=null==e?void 0:e.error)||void 0===o?void 0:o.message)?e.error.message:""})),this.element.on("focus",(()=>this.hasFocus=!0)),this.element.on("blur",(()=>this.hasFocus=!1))}render(){return h(Fragment,{key:"38200ee9a8f3be8e975395883cfae8ec98c50652"},h("sc-form-control",{key:"408634b78b91e5a8baa6d3429c27d9e33e01c45e",class:"sc-stripe",size:this.size,label:this.label},h("div",{key:"d6363dc7f2852c56f0dd86ee230301cc232d8943",class:"sc-stripe-element",ref:e=>this.container=e})),this.error&&h("sc-text",{key:"00eb23ea2f5f175a5bcc19f809da0d1ec9335dab",style:{color:"var(--sc-color-danger-500)","--font-size":"var(--sc-font-size-small)",marginTop:"0.5em"}},this.error))}get el(){return this}static get watchers(){return{formState:["maybeConfirmOrder"]}}static get style(){return ScStripeElementStyle0}},[0,"sc-stripe-element",{disabled:[4],order:[16],mode:[1],size:[513],label:[1],secureText:[1,"secure-text"],showLabel:[4,"show-label"],hasFocus:[1540,"has-focus"],selectedProcessorId:[1,"selected-processor-id"],formState:[1,"form-state"],error:[32],confirming:[32],confirmCardPayment:[64],confirmCardSetup:[64]},void 0,{formState:["maybeConfirmOrder"]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-stripe-element","sc-form-control","sc-text","sc-visually-hidden"].forEach((e=>{switch(e){case"sc-stripe-element":customElements.get(e)||customElements.define(e,ScStripeElement$1);break;case"sc-form-control":customElements.get(e)||defineCustomElement$4();break;case"sc-text":customElements.get(e)||defineCustomElement$3();break;case"sc-visually-hidden":customElements.get(e)||defineCustomElement$2()}}))}openWormhole(ScStripeElement$1,["order","mode","selectedProcessorId","formState"],!1);const ScStripeElement=ScStripeElement$1,defineCustomElement=defineCustomElement$1;export{ScStripeElement,defineCustomElement};