import{r as e,h as d}from"./p-e97fde0a.js";const i=class{constructor(d){e(this,d);this.paymentMethod=undefined;this.editHandler=undefined}render(){var e,i,a,t,o,n,s,c,l,f;return d("sc-card",{key:"54bd46a83c1a787ef805a9d46d03252861ade682"},d("sc-flex",{key:"c03ca3273aa8ef7b48610a8e178982944fe507c8",alignItems:"center",justifyContent:"flex-start",style:{gap:"0.5em"}},d("sc-payment-method",{key:"b3fcb74ff9fa2a9139eb9735cfe54320fa19875c",paymentMethod:this.paymentMethod}),d("div",{key:"e47a8a2015a440054bf900804f0bd6f31bdc2aba"},!!((i=(e=this.paymentMethod)===null||e===void 0?void 0:e.card)===null||i===void 0?void 0:i.exp_month)&&d("span",{key:"ef07b2f1e03a1639c0584ad4ab0522e9ee34d479"},wp.i18n.sprintf(wp.i18n.__("Exp. %d/%d","surecart"),(t=(a=this.paymentMethod)===null||a===void 0?void 0:a.card)===null||t===void 0?void 0:t.exp_month,(n=(o=this.paymentMethod)===null||o===void 0?void 0:o.card)===null||n===void 0?void 0:n.exp_year)),!!((c=(s=this.paymentMethod)===null||s===void 0?void 0:s.paypal_account)===null||c===void 0?void 0:c.email)&&((f=(l=this.paymentMethod)===null||l===void 0?void 0:l.paypal_account)===null||f===void 0?void 0:f.email)),d("sc-button",{key:"8736b013b7b94655c0a8f794f85aa5ab164b021e",type:"text",circle:true,onClick:this.editHandler},d("sc-icon",{key:"de2c99652340b18bb9d0a3fcf44468000888dde0",name:"edit-2"}))))}};export{i as sc_payment_method_details};
//# sourceMappingURL=p-f9744b4e.entry.js.map