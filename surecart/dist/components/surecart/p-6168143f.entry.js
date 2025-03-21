import{r as e,c as i,h as t,a as o}from"./p-e97fde0a.js";import{p as s}from"./p-9ef0f73f.js";import{s as l}from"./p-fab02ef6.js";import{o as d,s as a,u as n}from"./p-f09ee70b.js";import{o as r}from"./p-95325ec5.js";import"./p-930ac855.js";import{s as c,g as u}from"./p-8e1549b8.js";import{c as v}from"./p-ff10bfbf.js";import{c as p}from"./p-1f60f497.js";import{b as f}from"./p-3918a0cc.js";import{a as m}from"./p-401e165e.js";import"./p-03631502.js";import"./p-9dbc54d6.js";import"./p-d3366af3.js";import"./p-830ab1a3.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-88aed607.js";import"./p-93127aa7.js";import"./p-07b1b1ed.js";const h="sc-stripe-payment-element{display:block}sc-stripe-payment-element [hidden]{display:none}.loader{display:grid;height:128px;gap:2em}.loader__row{display:flex;align-items:flex-start;justify-content:space-between;gap:1em}.loader__details{display:grid;gap:0.5em}";const y=h;const b=class{constructor(t){e(this,t);this.scPaid=i(this,"scPaid",7);this.scSetState=i(this,"scSetState",7);this.scPaymentInfoAdded=i(this,"scPaymentInfoAdded",7);this.error=undefined;this.confirming=false;this.loaded=false;this.styles=undefined}async componentWillLoad(){this.fetchStyles();this.syncCheckoutMode()}async handleStylesChange(){this.createOrUpdateElements()}async fetchStyles(){this.styles=await this.getComputedStyles()}getComputedStyles(){return new Promise((e=>{let i=setInterval((()=>{const t=window.getComputedStyle(document.body);const o=t.getPropertyValue("--sc-color-primary-500");if(o){clearInterval(i);e(t)}}),100)}))}async syncCheckoutMode(){d("checkout",(()=>{this.initializeStripe()}))}async componentDidLoad(){this.initializeStripe()}async initializeStripe(){var e,i;if(typeof((e=a===null||a===void 0?void 0:a.checkout)===null||e===void 0?void 0:e.live_mode)==="undefined"||((i=c===null||c===void 0?void 0:c.instances)===null||i===void 0?void 0:i.stripe)){return}const{processor_data:t}=u("stripe")||{};try{c.instances.stripe=await s.loadStripe(t===null||t===void 0?void 0:t.publishable_key,{stripeAccount:t===null||t===void 0?void 0:t.account_id});this.error=""}catch(e){this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Stripe could not be loaded","surecart");return}this.createOrUpdateElements();this.handleUpdateElement();this.unlistenToCheckout=d("checkout",(()=>{this.fetchStyles();this.createOrUpdateElements();this.handleUpdateElement()}));this.unlistenToFormState=r("formState",(()=>{var e;if(!((e=a===null||a===void 0?void 0:a.checkout)===null||e===void 0?void 0:e.payment_method_required))return;if("paying"===v()){this.maybeConfirmOrder()}}))}disconnectedCallback(){this.unlistenToFormState();this.unlistenToCheckout()}getElementsConfig(){var e,i,t,o;const s=getComputedStyle(this.el);return{mode:((e=a.checkout)===null||e===void 0?void 0:e.remaining_amount_due)>0?"payment":"setup",amount:(i=a.checkout)===null||i===void 0?void 0:i.remaining_amount_due,currency:(t=a.checkout)===null||t===void 0?void 0:t.currency,setupFutureUsage:((o=a.checkout)===null||o===void 0?void 0:o.reusable_payment_method_required)?"off_session":null,appearance:{variables:{colorPrimary:s.getPropertyValue("--sc-color-primary-500")||"black",colorText:s.getPropertyValue("--sc-input-label-color")||"black",borderRadius:s.getPropertyValue("--sc-input-border-radius-medium")||"4px",colorBackground:s.getPropertyValue("--sc-input-background-color")||"white",fontSizeBase:s.getPropertyValue("--sc-input-font-size-medium")||"16px",colorLogo:s.getPropertyValue("--sc-stripe-color-logo")||"light",colorLogoTab:s.getPropertyValue("--sc-stripe-color-logo-tab")||"light",colorLogoTabSelected:s.getPropertyValue("--sc-stripe-color-logo-tab-selected")||"light",colorTextPlaceholder:s.getPropertyValue("--sc-input-placeholder-color")||"black"},rules:{".Input":{border:s.getPropertyValue("--sc-input-border")}}}}}createOrUpdateElements(){var e,i,t,o,s,l;if(!((e=a===null||a===void 0?void 0:a.checkout)===null||e===void 0?void 0:e.payment_method_required))return;if(!c.instances.stripe)return;if(((i=a.checkout)===null||i===void 0?void 0:i.status)&&["paid","processing"].includes((t=a.checkout)===null||t===void 0?void 0:t.status))return;if(!c.instances.stripeElements){c.instances.stripeElements=c.instances.stripe.elements(this.getElementsConfig());const{line1:e,line2:i,city:t,state:d,country:n,postal_code:r}=(o=f("shipping"))!==null&&o!==void 0?o:{};c.instances.stripeElements.create("payment",{defaultValues:{billingDetails:{name:(s=a.checkout)===null||s===void 0?void 0:s.name,email:(l=a.checkout)===null||l===void 0?void 0:l.email,...e&&{address:{line1:e,line2:i,city:t,state:d,country:n,postal_code:r}}}},fields:{billingDetails:{email:"never"}}}).mount(this.container);this.element=c.instances.stripeElements.getElement("payment");this.element.on("ready",(()=>this.loaded=true));this.element.on("change",(e=>{var i,t,o,s,l,d,n;const r=["cashapp","klarna","clearpay"];a.paymentMethodRequiresShipping=r.includes((i=e===null||e===void 0?void 0:e.value)===null||i===void 0?void 0:i.type);if(e.complete){this.scPaymentInfoAdded.emit({checkout_id:(t=a.checkout)===null||t===void 0?void 0:t.id,currency:(o=a.checkout)===null||o===void 0?void 0:o.currency,processor_type:"stripe",total_amount:(s=a.checkout)===null||s===void 0?void 0:s.total_amount,line_items:(l=a.checkout)===null||l===void 0?void 0:l.line_items,payment_method:{billing_details:{email:(d=a.checkout)===null||d===void 0?void 0:d.email,name:(n=a.checkout)===null||n===void 0?void 0:n.name}}})}}));return}c.instances.stripeElements.update(this.getElementsConfig())}handleUpdateElement(){var e,i;if(!this.element)return;if(((e=a.checkout)===null||e===void 0?void 0:e.status)!=="draft")return;const{name:t,email:o}=a.checkout;const{line_1:s,line_2:l,city:d,state:n,country:r,postal_code:c}=((i=a.checkout)===null||i===void 0?void 0:i.shipping_address)||{};this.element.update({defaultValues:{billingDetails:{name:t,email:o,address:{line1:s,line2:l,city:d,state:n,country:r,postal_code:c}}},fields:{billingDetails:{email:"never"}}})}async submit(){if((l===null||l===void 0?void 0:l.id)!=="stripe")return;const{error:e}=await c.instances.stripeElements.submit();if(e){console.error({error:e});n("REJECT");p(e);this.error=e.message;return}}async maybeConfirmOrder(){var e,i,t,o,s,d,n,r,c,u,v,p,f,m;if((l===null||l===void 0?void 0:l.id)!=="stripe")return;if(((i=(e=a.checkout)===null||e===void 0?void 0:e.payment_intent)===null||i===void 0?void 0:i.processor_type)!=="stripe")return;if(!((d=(s=(o=(t=a.checkout)===null||t===void 0?void 0:t.payment_intent)===null||o===void 0?void 0:o.processor_data)===null||s===void 0?void 0:s.stripe)===null||d===void 0?void 0:d.type))return;if(!((u=(c=(r=(n=a.checkout)===null||n===void 0?void 0:n.payment_intent)===null||r===void 0?void 0:r.processor_data)===null||c===void 0?void 0:c.stripe)===null||u===void 0?void 0:u.client_secret))return;return await this.confirm((m=(f=(p=(v=a.checkout)===null||v===void 0?void 0:v.payment_intent)===null||p===void 0?void 0:p.processor_data)===null||f===void 0?void 0:f.stripe)===null||m===void 0?void 0:m.type)}async confirm(e,i={}){var t,o,s,l;const d={elements:c.instances.stripeElements,clientSecret:(l=(s=(o=(t=a.checkout)===null||t===void 0?void 0:t.payment_intent)===null||o===void 0?void 0:o.processor_data)===null||s===void 0?void 0:s.stripe)===null||l===void 0?void 0:l.client_secret,confirmParams:{return_url:m(window.location.href,{...a.checkout.id?{checkout_id:a.checkout.id}:{}}),payment_method_data:{billing_details:{email:a.checkout.email}}},redirect:"if_required",...i};if(this.confirming)return;if(!c.instances.stripe)return;try{this.scSetState.emit("PAYING");const i=e==="setup"?await c.instances.stripe.confirmSetup(d):await c.instances.stripe.confirmPayment(d);if(i===null||i===void 0?void 0:i.error){this.error=i.error.message;throw i.error}else{this.scSetState.emit("PAID");this.scPaid.emit()}}catch(e){console.error(e);n("REJECT");p(e);if(e.message){this.error=e.message}}finally{this.confirming=false}}render(){return t("div",{key:"170025ac530ed8ff63915f78e71791a9bd6ae011",class:"sc-stripe-payment-element","data-testid":"stripe-payment-element"},!!this.error&&t("sc-text",{key:"71cb07364532f75cac1e3484546e57f331d8601b",style:{color:"var(--sc-color-danger-500)","--font-size":"var(--sc-font-size-small)",marginBottom:"0.5em"}},this.error),t("div",{key:"32433ca8b6e98f54375647965a23ec9deac977e5",class:"loader",hidden:this.loaded},t("div",{key:"13727343d3c57ab37510f8acf8bea4e162c83fc4",class:"loader__row"},t("div",{key:"2339b462378290db05d47d11c7dd77533a2619f8",style:{width:"50%"}},t("sc-skeleton",{key:"8876201da1f6583aea21127c548c45974b0d2ec6",style:{width:"50%",marginBottom:"0.5em"}}),t("sc-skeleton",{key:"c3e151ea4e34508f272dcd770b214c60b340b23d"})),t("div",{key:"4224654a2ea5d55e7ab95996666eb1f4c2eb03ba",style:{flex:"1"}},t("sc-skeleton",{key:"a01bd023860c669dee5921f5d7e4325dd8624968",style:{width:"50%",marginBottom:"0.5em"}}),t("sc-skeleton",{key:"ed9ee081031102abecfe942658c9441e67450e30"})),t("div",{key:"1bafcceca4f272d80c2088f2fbf45e371f7bbb5e",style:{flex:"1"}},t("sc-skeleton",{key:"bdb2b2b810fbdd94382ee194d5f5c3cc723f156b",style:{width:"50%",marginBottom:"0.5em"}}),t("sc-skeleton",{key:"1ea86755ae845508fc4386500ce79ebd3559d817"}))),t("div",{key:"de97c3c08feb8f2a31f60307e4b5ade16edb94fc",class:"loader__details"},t("sc-skeleton",{key:"dab30dfec7e1634beb8dd50dcb7ec0cd76e470f4",style:{height:"1rem"}}),t("sc-skeleton",{key:"fe49f9ddb7a2e5a710188b6a1af09468e46de30e",style:{height:"1rem",width:"30%"}}))),t("div",{key:"8f3254743688e87910cf0eda0e17d3d2d960c072",hidden:!this.loaded,class:"sc-payment-element-container",ref:e=>this.container=e}))}get el(){return o(this)}static get watchers(){return{styles:["handleStylesChange"]}}};b.style=y;export{b as sc_stripe_payment_element};
//# sourceMappingURL=p-6168143f.entry.js.map