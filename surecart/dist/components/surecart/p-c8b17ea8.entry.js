import{r as i,c as t,h as o,F as s,a as e}from"./p-e97fde0a.js";import{p as r}from"./p-9ef0f73f.js";import{o as n}from"./p-393cb717.js";import{s as d}from"./p-fab02ef6.js";import{a as l}from"./p-8e1549b8.js";import{c}from"./p-1f60f497.js";import{u as a}from"./p-f09ee70b.js";import"./p-03631502.js";import"./p-93127aa7.js";import"./p-9dbc54d6.js";import"./p-830ab1a3.js";import"./p-d3366af3.js";import"./p-401e165e.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-95325ec5.js";import"./p-88aed607.js";const p="sc-stripe-element{display:block;--focus-ring:0 0 0 var(--sc-focus-ring-width) var(--sc-focus-ring-color-primary)}sc-stripe-element sc-input{--sc-input-height-medium:auto}.sc-stripe *{font-family:var(--sc-input-font-family);font-weight:var(--sc-input-font-weight);font-size:var(--sc-input-font-size)}.sc-stripe-element{border-radius:var(--sc-input-border-radius-medium);font-size:var(--sc-input-font-size-medium);height:var(--sc-input-height-medium);width:100%;box-sizing:border-box !important;background-color:var(--sc-input-background-color);border:solid 1px var(--sc-input-border-color, var(--sc-input-border));box-shadow:var(--sc-input-box-shadow);transition:var(--sc-input-transition, var(--sc-transition-medium)) color, var(--sc-input-transition, var(--sc-transition-medium)) border, var(--sc-input-transition, var(--sc-transition-medium)) box-shadow}.sc-stripe-element:hover{background-color:var(--sc-input-background-color-hover);border-color:var(--sc-input-border-color-hover)}.sc-stripe-element.StripeElement--focus{background-color:var(--sc-input-background-color-focus);border-color:var(--sc-input-border-color-focus);box-shadow:var(--focus-ring)}.sc-stripe fieldset{margin:0 15px 20px;padding:0;border-style:none;background-color:#7795f8;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #829fff;border-radius:4px}.sc-stripe .row{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;margin-left:15px}.sc-stripe .row+.row{border-top:1px solid #819efc}.sc-stripe label{width:15%;min-width:70px;padding:11px 0;color:#c4f0ff;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.sc-stripe input,.sc-stripe button{-webkit-appearance:none;-moz-appearance:none;appearance:none;outline:none;border-style:none}.sc-stripe input:-webkit-autofill{-webkit-text-fill-color:#fce883;transition:background-color 100000000s;-webkit-animation:1ms void-animation-out}.sc-stripe .StripeElement--webkit-autofill{background:transparent !important}.sc-stripe .StripeElement{width:100%;padding:var(--sc-input-spacing-small)}.sc-stripe input{width:100%;padding:11px;color:#fff;background-color:transparent;-webkit-animation:1ms void-animation-out}.sc-stripe input::-webkit-input-placeholder{color:#87bbfd}.sc-stripe input::-moz-placeholder{color:#87bbfd}.sc-stripe input:-ms-input-placeholder{color:#87bbfd}.sc-stripe button{display:block;width:calc(100% - 30px);height:40px;margin:40px 15px 0;background-color:#f6a4eb;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #ffb9f6;border-radius:4px;color:#fff;font-weight:600;cursor:pointer}.sc-stripe button:active{background-color:#d782d9;box-shadow:0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #e298d8}.sc-stripe .error svg .base{fill:#fff}.sc-stripe .error svg .glyph{fill:#6772e5}.sc-stripe .error .message{color:#fff}.sc-stripe .success .icon .border{stroke:#87bbfd}.sc-stripe .success .icon .checkmark{stroke:#fff}.sc-stripe .success .title{color:#fff}.sc-stripe .success .message{color:#9cdbff}.sc-stripe .success .reset path{fill:#fff}";const u=p;const h=class{constructor(o){i(this,o);this.scPaid=t(this,"scPaid",7);this.scSetState=t(this,"scSetState",7);this.scPaymentInfoAdded=t(this,"scPaymentInfoAdded",7);this.disabled=undefined;this.order=undefined;this.mode="live";this.size="medium";this.label=undefined;this.secureText="";this.showLabel=true;this.hasFocus=undefined;this.selectedProcessorId=undefined;this.formState=undefined;this.error=undefined;this.confirming=undefined}async componentWillLoad(){const i=(l()||[]).find((i=>i.processor_type==="stripe"));if(!i){return}const{account_id:t,publishable_key:o}=(i===null||i===void 0?void 0:i.processor_data)||{};try{this.stripe=await r.loadStripe(o,{stripeAccount:t});this.elements=this.stripe.elements()}catch(i){this.error=(i===null||i===void 0?void 0:i.message)||wp.i18n.__("Stripe could not be loaded","surecart")}}async maybeConfirmOrder(i){var t,o,s,e,r,n,l,p,u,h,f,v,m,b,g,x,w,y,k,j,_,S,z;if(i!=="paying")return;if((d===null||d===void 0?void 0:d.id)!=="stripe")return;if(((o=(t=this.order)===null||t===void 0?void 0:t.payment_intent)===null||o===void 0?void 0:o.processor_type)!=="stripe")return;if(!((e=(s=this.order)===null||s===void 0?void 0:s.payment_intent)===null||e===void 0?void 0:e.external_intent_id))return;if(!((p=(l=(n=(r=this.order)===null||r===void 0?void 0:r.payment_intent)===null||n===void 0?void 0:n.processor_data)===null||l===void 0?void 0:l.stripe)===null||p===void 0?void 0:p.client_secret))return;if(!((v=(f=(h=(u=this.order)===null||u===void 0?void 0:u.payment_intent)===null||h===void 0?void 0:h.processor_data)===null||f===void 0?void 0:f.stripe)===null||v===void 0?void 0:v.type))return;if(this.confirming)return;this.confirming=true;try{let i;if(((x=(g=(b=(m=this.order)===null||m===void 0?void 0:m.payment_intent)===null||b===void 0?void 0:b.processor_data)===null||g===void 0?void 0:g.stripe)===null||x===void 0?void 0:x.type)=="setup"){i=await this.confirmCardSetup((k=(y=(w=this.order)===null||w===void 0?void 0:w.payment_intent)===null||y===void 0?void 0:y.processor_data)===null||k===void 0?void 0:k.stripe.client_secret)}else{i=await this.confirmCardPayment((z=(S=(_=(j=this.order)===null||j===void 0?void 0:j.payment_intent)===null||_===void 0?void 0:_.processor_data)===null||S===void 0?void 0:S.stripe)===null||z===void 0?void 0:z.client_secret)}if(i===null||i===void 0?void 0:i.error){this.error=i.error.message;throw i.error}this.scSetState.emit("PAID");this.scPaid.emit()}catch(i){a("REJECT");c(i);if(i.message){this.error=i.message}this.confirming=false;this.scSetState.emit("REJECT")}}async confirmCardPayment(i){var t,o;return this.stripe.confirmCardPayment(i,{payment_method:{card:this.element,billing_details:{...((t=this===null||this===void 0?void 0:this.order)===null||t===void 0?void 0:t.name)?{name:this.order.name}:{},...((o=this===null||this===void 0?void 0:this.order)===null||o===void 0?void 0:o.email)?{email:this.order.email}:{}}}})}async confirmCardSetup(i){var t,o;return this.stripe.confirmCardSetup(i,{payment_method:{card:this.element,billing_details:{...((t=this===null||this===void 0?void 0:this.order)===null||t===void 0?void 0:t.name)?{name:this.order.name}:{},...((o=this===null||this===void 0?void 0:this.order)===null||o===void 0?void 0:o.email)?{email:this.order.email}:{}}}})}componentDidLoad(){if(!this.elements){return}const i=getComputedStyle(document.body);this.elements.create("card",{style:{base:{color:i.getPropertyValue("--sc-input-label-color"),fontSize:"16px",iconColor:i.getPropertyValue("--sc-stripe-icon-color"),fontSmoothing:"antialiased","::placeholder":{color:i.getPropertyValue("--sc-input-placeholder-color")}},invalid:{color:i.getPropertyValue("--sc-color-error-500"),":focus":{color:i.getPropertyValue("--sc-input-label-color")}}}}).mount(this.container);this.element=this.elements.getElement("card");this.element.on("change",(i=>{var t,o,s;if(i.complete){this.scPaymentInfoAdded.emit({processor_type:"stripe",checkout_id:this.order.id,currency:this.order.currency,total_amount:this.order.total_amount,line_items:this.order.line_items,payment_method:{billing_details:{name:((t=this===null||this===void 0?void 0:this.order)===null||t===void 0?void 0:t.name)?this.order.name:"",email:((o=this===null||this===void 0?void 0:this.order)===null||o===void 0?void 0:o.email)?this.order.email:""}}})}this.error=((s=i===null||i===void 0?void 0:i.error)===null||s===void 0?void 0:s.message)?i.error.message:""}));this.element.on("focus",(()=>this.hasFocus=true));this.element.on("blur",(()=>this.hasFocus=false))}render(){return o(s,{key:"38200ee9a8f3be8e975395883cfae8ec98c50652"},o("sc-form-control",{key:"408634b78b91e5a8baa6d3429c27d9e33e01c45e",class:"sc-stripe",size:this.size,label:this.label},o("div",{key:"d6363dc7f2852c56f0dd86ee230301cc232d8943",class:"sc-stripe-element",ref:i=>this.container=i})),this.error&&o("sc-text",{key:"00eb23ea2f5f175a5bcc19f809da0d1ec9335dab",style:{color:"var(--sc-color-danger-500)","--font-size":"var(--sc-font-size-small)",marginTop:"0.5em"}},this.error))}get el(){return e(this)}static get watchers(){return{formState:["maybeConfirmOrder"]}}};n(h,["order","mode","selectedProcessorId","formState"],false);h.style=u;export{h as sc_stripe_element};
//# sourceMappingURL=p-c8b17ea8.entry.js.map