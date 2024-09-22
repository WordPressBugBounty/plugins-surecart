import{r as t,h as o,H as i}from"./p-cc7ce8c7.js";const e=":host {\n  display: block;\n}\n\n.manual-payment-method {\n  display: flex;\n  align-items: center;\n  justify-content: flex-start;\n  gap: var(--sc-spacing-x-small);\n  flex-wrap: wrap;\n\n  &__title {\n    font-weight: var(--sc-font-weight-bold);\n    color: var(--sc-primary-color-900);\n  }\n\n  &__description {\n    color: var(--sc-primary-color-600);\n  }\n}\n";const n=class{constructor(o){t(this,o);this.paymentMethod=undefined;this.showDescription=false}render(){var t,i;return o("div",{class:"manual-payment-method",part:"card"},o("div",{class:"payment-method__title"},(t=this.paymentMethod)===null||t===void 0?void 0:t.name),this.showDescription&&o("sc-prose",{class:"payment-method__description",innerHTML:(i=this.paymentMethod)===null||i===void 0?void 0:i.description}))}};n.style=e;const l=":host{display:block}.payment-method{display:flex;align-items:center;justify-content:flex-start;gap:var(--sc-spacing-x-small)}";const s=class{constructor(o){t(this,o);this.paymentMethod=undefined;this.full=undefined;this.externalLink=undefined;this.externalLinkTooltipText=undefined}renderBankAccountType(t){if(t==="checking"){return wp.i18n.__("Checking","surecart")}if(t==="savings"){return wp.i18n.__("Savings","surecart")}}renderExternalLink(){return!!this.externalLink&&o("sc-tooltip",{text:this.externalLinkTooltipText,type:"text"},o("sc-button",{style:{color:"var(--sc-color-gray-500)"},type:"text",size:"small",href:this.externalLink,target:"_blank"},o("sc-icon",{name:"external-link",style:{fontSize:"16px"}})))}render(){var t,i,e,n,l,s,a,r,d,c,m,p,g,h,u,v,f,b;if((i=(t=this.paymentMethod)===null||t===void 0?void 0:t.bank_account)===null||i===void 0?void 0:i.id){const t=(e=this.paymentMethod)===null||e===void 0?void 0:e.bank_account;return o("div",{class:"payment-method",part:"bank"},o("span",null,this.renderBankAccountType(t===null||t===void 0?void 0:t.account_type)),"**** ",t===null||t===void 0?void 0:t.last4,this.renderExternalLink())}if((l=(n=this===null||this===void 0?void 0:this.paymentMethod)===null||n===void 0?void 0:n.payment_instrument)===null||l===void 0?void 0:l.instrument_type){const t=(a=(s=this===null||this===void 0?void 0:this.paymentMethod)===null||s===void 0?void 0:s.payment_instrument)===null||a===void 0?void 0:a.instrument_type;if(["applepay","bancontact","banktransfer","belfius","creditcard","directdebit","eps","giftcard","giropay","ideal","in3","kbc","klarna","mybank","paysafecard","przelewy24","sofort","Voucher"].includes(t)){return o("div",{class:"payment-method",part:"instrument"},o("sc-icon",{style:{fontSize:"36px"},name:t}),o("span",{style:{textTransform:"capitalize"}},t),this.renderExternalLink())}if(t==="paypal"){return o("div",{class:"payment-method",part:"instrument"},o("sc-icon",{style:{fontSize:"56px",lineHeight:"1",height:"28px"},name:"paypal"}))}return o("div",{class:"payment-method",part:"instrument"},o("sc-tag",{exportparts:"base:payment_instrument",type:"info",pill:true},o("span",{style:{textTransform:"capitalize"}},t," ")),this.renderExternalLink())}if((d=(r=this.paymentMethod)===null||r===void 0?void 0:r.card)===null||d===void 0?void 0:d.brand){return o("div",{class:"payment-method",part:"card"},o("sc-cc-logo",{style:{fontSize:"36px"},brand:(m=(c=this.paymentMethod)===null||c===void 0?void 0:c.card)===null||m===void 0?void 0:m.brand}),o("sc-text",{style:{whiteSpace:"nowrap",paddingRight:"6px"}},"**** ",(g=(p=this.paymentMethod)===null||p===void 0?void 0:p.card)===null||g===void 0?void 0:g.last4),this.renderExternalLink())}if((u=(h=this.paymentMethod)===null||h===void 0?void 0:h.paypal_account)===null||u===void 0?void 0:u.id){return o("div",{class:"payment-method",part:"base",style:{gap:"var(--sc-spacing-small)"}},o("sc-icon",{style:{fontSize:"56px",lineHeight:"1",height:"28px"},name:"paypal"}),this.full&&o("sc-text",{style:{"--font-size":"var(--sc-font-size-small)"},truncate:true},(f=(v=this.paymentMethod)===null||v===void 0?void 0:v.paypal_account)===null||f===void 0?void 0:f.email),this.renderExternalLink())}return(b=this===null||this===void 0?void 0:this.paymentMethod)===null||b===void 0?void 0:b.processor_type}};s.style=l;const a=":host{display:block}:host{display:block;position:relative;width:100%;font-family:var(--sc-input-font-family);font-weight:var(--sc-input-font-weight);line-height:var(--sc-line-height-normal);letter-spacing:var(--sc-input-letter-spacing)}::slotted(*){}::slotted([class~='lead']){color:var(--sc-input-color);font-size:var(--sc-input-spacing-small);line-height:1.6;margin-top:1.2em;margin-bottom:1.2em}::slotted(strong){font-weight:var(--sc-font-weight-bold)}::slotted(ol){padding:0;margin-top:var(--sc-input-spacing-small);margin-bottom:var(--sc-input-spacing-small)}::slotted(ol>li){position:relative}::slotted(ul>li){position:relative}::slotted(hr){border-color:var(--sc-color-gray-400);border-top-width:1px;margin-top:3em;margin-bottom:3em}::slotted(blockquote){font-weight:var(--sc-font-weight-medium);font-style:italic;color:var(--sc-color-gray-800);border-left-width:0.25rem;border-left-color:var(--sc-color-gray-400);quotes:'\\201C''\\201D''\\2018''\\2019';margin-top:1.6em;margin-bottom:1.6em;padding-left:1em}::slotted(blockquote p:first-of-type::before){content:open-quote}::slotted(blockquote p:last-of-type::after){content:close-quote}::slotted(h1){font-weight:800;font-size:2.25em;margin-top:0;margin-bottom:0.8888889em;line-height:1.1111111}::slotted(h2){font-weight:700;font-size:1.5em;margin-top:2em;margin-bottom:1em;line-height:1.3333333}::slotted(h3){font-weight:600;font-size:var(--sc-input-spacing-small);margin-top:1.6em;margin-bottom:0.6em;line-height:1.6}::slotted(h4){font-weight:600;margin-top:1.5em;margin-bottom:0.5em;line-height:1.5}::slotted(figure figcaption){color:var(--sc-color-gray-600);font-size:0.875em;line-height:1.4285714;margin-top:0.8571429em}::slotted(code){color:var(--sc-color-gray-900);font-weight:600;font-size:0.875em}::slotted(code::before){content:'`'}::slotted(code::after){content:'`'}::slotted(pre){color:var(--sc-color-gray-300);background-color:var(--sc-color-gray-800);overflow-x:auto;font-size:0.875em;line-height:1.7142857;margin-top:1.7142857em;margin-bottom:1.7142857em;border-radius:0.375rem;padding-top:0.8571429em;padding-right:1.1428571em;padding-bottom:0.8571429em;padding-left:1.1428571em}::slotted(pre code){background-color:transparent;border-width:0;border-radius:0;padding:0;font-weight:400;color:inherit;font-size:inherit;font-family:inherit;line-height:inherit}::slotted(pre code::before){content:''}::slotted(pre code::after){content:''}::slotted(table){width:100%;table-layout:auto;text-align:left;margin-top:2em;margin-bottom:2em;font-size:0.875em;line-height:1.7142857}::slotted(thead){color:#1a202c;font-weight:600;border-bottom-width:1px;border-bottom-color:var(--sc-color-gray-400)}::slotted(thead th){vertical-align:bottom;padding-right:0.5714286em;padding-bottom:0.5714286em;padding-left:0.5714286em}::slotted(tbody tr){border-bottom-width:1px;border-bottom-color:var(--sc-color-gray-400)}::slotted(tbody tr:last-child){border-bottom-width:0}::slotted(tbody td){vertical-align:top;padding-top:0.5714286em;padding-right:0.5714286em;padding-bottom:0.5714286em;padding-left:0.5714286em}::slotted(p),::slotted(img),::slotted(video),::slotted(figure){padding:0 !important;margin-top:var(--sc-input-spacing-small) !important;margin-bottom:var(--sc-input-spacing-small) !important}::slotted(figure>*){margin-top:0;margin-bottom:0}::slotted(h2 code){font-size:0.875em}::slotted(h3 code){font-size:0.9em}::slotted(ul){margin-top:var(--sc-input-spacing-small);margin-bottom:var(--sc-input-spacing-small)}::slotted(li){margin-top:0.5em;margin-bottom:0.5em}::slotted(ul>li p){margin-top:0.75em;margin-bottom:0.75em}::slotted(ul>li>*:first-child){margin-top:var(--sc-input-spacing-small)}::slotted(ul>li>*:last-child){margin-bottom:var(--sc-input-spacing-small)}::slotted(ol>li>*:first-child){margin-top:var(--sc-input-spacing-small)}::slotted(ol>li>*:last-child){margin-bottom:var(--sc-input-spacing-small)}::slotted(ul ul),::slotted(ul ol),::slotted(ol ul),::slotted(ol ol){margin-top:0.75em;margin-bottom:0.75em}::slotted(hr+*){margin-top:0}::slotted(h2+*){margin-top:0}::slotted(h3+*){margin-top:0}::slotted(h4+*){margin-top:0}::slotted(thead th:first-child){padding-left:0}::slotted(thead th:last-child){padding-right:0}::slotted(tbody td:first-child){padding-left:0}::slotted(tbody td:last-child){padding-right:0}::slotted(:first-child){margin-top:0 !important}::slotted(:last-child){margin-bottom:0 !important}";const r=class{constructor(o){t(this,o)}render(){return o(i,null,o("slot",null))}};r.style=a;export{n as sc_manual_payment_method,s as sc_payment_method,r as sc_prose};
//# sourceMappingURL=p-bf662d81.entry.js.map