import{r as i,c as s,h as t}from"./p-cc7ce8c7.js";import{o as h,s as o}from"./p-8bceca25.js";import"./p-25433d0f.js";import"./p-f70181c4.js";import"./p-4d73f82a.js";import"./p-1c2e2695.js";import"./p-830ab1a3.js";import"./p-a3a138d6.js";import"./p-7ef0f71c.js";import"./p-7c2e44b1.js";import"./p-50da3ba3.js";const e=":host{display:block}";const n=class{constructor(t){i(this,t);this.scChange=s(this,"scChange",7);this.scClear=s(this,"scClear",7);this.scInput=s(this,"scInput",7);this.scFocus=s(this,"scFocus",7);this.scBlur=s(this,"scBlur",7);this.size="medium";this.value="";this.pill=false;this.label=undefined;this.showLabel=true;this.help="";this.placeholder=undefined;this.disabled=false;this.readonly=false;this.required=false;this.invalid=false;this.autofocus=undefined;this.hasFocus=undefined;this.error=undefined}async handleChange(){this.value=this.input.value;this.scChange.emit()}async reportValidity(){var i,s;return(s=(i=this.input)===null||i===void 0?void 0:i.reportValidity)===null||s===void 0?void 0:s.call(i)}componentWillLoad(){this.handleCheckoutChange();this.removeChangeListener=h("checkout",(()=>this.handleCheckoutChange()))}disconnectedCallback(){this.removeChangeListener()}handleCheckoutChange(){var i,s,t,h,e,n;if(this===null||this===void 0?void 0:this.value)return;if((i=o.checkout)===null||i===void 0?void 0:i.phone){this.value=(s=o.checkout)===null||s===void 0?void 0:s.phone;return}if((h=(t=o.checkout)===null||t===void 0?void 0:t.customer)===null||h===void 0?void 0:h.phone){this.value=(n=(e=o.checkout)===null||e===void 0?void 0:e.customer)===null||n===void 0?void 0:n.phone;return}}render(){return t("sc-phone-input",{name:"phone",ref:i=>this.input=i,value:this.value,label:this.label,help:this.help,autocomplete:"phone",placeholder:this.placeholder,readonly:this.readonly,required:this.required,invalid:this.invalid,autofocus:this.autofocus,hasFocus:this.hasFocus,onScChange:()=>this.handleChange(),onScInput:()=>this.scInput.emit(),onScFocus:()=>this.scFocus.emit(),onScBlur:()=>this.scBlur.emit()})}};n.style=e;export{n as sc_customer_phone};
//# sourceMappingURL=p-a2d2efb1.entry.js.map