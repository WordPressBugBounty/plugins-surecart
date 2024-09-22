import{h}from"@stencil/core";import{__,sprintf}from"@wordpress/i18n";export class ScPaymentMethodDetails{constructor(){this.paymentMethod=void 0,this.editHandler=void 0}render(){var t,e,o,i,n,d,a,l,r,s;return h("sc-card",null,h("sc-flex",{alignItems:"center",justifyContent:"flex-start",style:{gap:"0.5em"}},h("sc-payment-method",{paymentMethod:this.paymentMethod}),h("div",null,!!(null===(e=null===(t=this.paymentMethod)||void 0===t?void 0:t.card)||void 0===e?void 0:e.exp_month)&&h("span",null,
// Translators: %d/%d is month and year of expiration.
sprintf(__("Exp. %d/%d","surecart"),null===(i=null===(o=this.paymentMethod)||void 0===o?void 0:o.card)||void 0===i?void 0:i.exp_month,null===(d=null===(n=this.paymentMethod)||void 0===n?void 0:n.card)||void 0===d?void 0:d.exp_year)),!!(null===(l=null===(a=this.paymentMethod)||void 0===a?void 0:a.paypal_account)||void 0===l?void 0:l.email)&&(null===(s=null===(r=this.paymentMethod)||void 0===r?void 0:r.paypal_account)||void 0===s?void 0:s.email)),h("sc-button",{type:"text",circle:!0,onClick:this.editHandler},h("sc-icon",{name:"edit-2"}))))}static get is(){return"sc-payment-method-details"}static get encapsulation(){return"shadow"}static get properties(){return{paymentMethod:{type:"unknown",mutable:!1,complexType:{original:"PaymentMethod",resolved:"PaymentMethod",references:{PaymentMethod:{location:"import",path:"../../../types"}}},required:!1,optional:!1,docs:{tags:[],text:""}},editHandler:{type:"unknown",mutable:!1,complexType:{original:"() => void",resolved:"() => void",references:{}},required:!1,optional:!1,docs:{tags:[],text:""}}}}}