import{r as s,c as i,h as t}from"./p-e97fde0a.js";import{c as o}from"./p-4194d4cd.js";import{s as e}from"./p-d919bf0e.js";import{s as a,o as h}from"./p-322d462c.js";import{a as d}from"./p-93127aa7.js";import"./p-9a298389.js";import"./p-401e165e.js";import"./p-d3366af3.js";import"./p-03631502.js";import"./p-e2d5dc4f.js";import"./p-830ab1a3.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-d7296e4c.js";import"./p-6ec14893.js";const n=":host{display:block}";const l=n;const r=class{constructor(t){s(this,t);this.scInput=i(this,"scInput",7);this.scFocus=i(this,"scFocus",7);this.scBlur=i(this,"scBlur",7);this.size="medium";this.value=null;this.pill=false;this.label=undefined;this.showLabel=true;this.help="";this.placeholder=undefined;this.disabled=false;this.readonly=false;this.required=false;this.invalid=false;this.autofocus=undefined;this.hasFocus=undefined}async reportValidity(){return this.input.reportValidity()}async handleChange(){this.value=this.input.value;try{a.checkout=await o({id:a.checkout.id,data:{name:this.input.value}})}catch(s){console.error(s)}}handleSessionChange(){var s,i,t,o,h,n;if(this.value)return;const l=d("full_name");if(!e.loggedIn&&!!l){this.value=l;return}if(e.loggedIn){this.value=((i=(s=a===null||a===void 0?void 0:a.checkout)===null||s===void 0?void 0:s.customer)===null||i===void 0?void 0:i.name)||((t=a===null||a===void 0?void 0:a.checkout)===null||t===void 0?void 0:t.name)}else{this.value=((o=a===null||a===void 0?void 0:a.checkout)===null||o===void 0?void 0:o.name)||((n=(h=a===null||a===void 0?void 0:a.checkout)===null||h===void 0?void 0:h.customer)===null||n===void 0?void 0:n.name)}}componentWillLoad(){this.handleSessionChange();this.removeCheckoutListener=h("checkout",(()=>this.handleSessionChange()))}disconnectedCallback(){this.removeCheckoutListener()}render(){return t("sc-input",{key:"405c3f6ce8a692f29b4e85ac29bfdb9dba7d0f2e",type:"text",name:"name",ref:s=>this.input=s,value:this.value,label:this.label,help:this.help,autocomplete:"name",placeholder:this.placeholder,readonly:this.readonly,required:this.required,invalid:this.invalid,autofocus:this.autofocus,hasFocus:this.hasFocus,onScChange:()=>this.handleChange(),onScInput:()=>this.scInput.emit(),onScFocus:()=>this.scFocus.emit(),onScBlur:()=>this.scBlur.emit(),...this.disabled&&{disabled:true}})}};r.style=l;export{r as sc_customer_name};
//# sourceMappingURL=p-93e37648.entry.js.map