import{r as t,h as i,H as s}from"./p-cc7ce8c7.js";import{s as o,b as e}from"./p-fc86253d.js";import{g as d}from"./p-e4cd2c80.js";import"./p-25433d0f.js";import"./p-72df1f47.js";import"./p-7ef0f71c.js";import"./p-a3a138d6.js";import"./p-f70181c4.js";import"./p-c06b2e12.js";import"./p-830ab1a3.js";const l=":host{display:block}";let n=0;const h=class{constructor(i){t(this,i);this.inputId=`sc-quantity-${++n}`;this.helpId=`sc-quantity-help-text-${n}`;this.labelId=`sc-quantity-label-${n}`;this.size="medium";this.name=undefined;this.errors=undefined;this.showLabel=true;this.label=undefined;this.required=false;this.help=undefined;this.productId=undefined}render(){var t,l,n,h,r,a,p;const c=d((t=o[this.productId])===null||t===void 0?void 0:t.product,(l=o[this.productId])===null||l===void 0?void 0:l.selectedVariant);return i(s,null,i("sc-form-control",{exportparts:"label, help-text, form-control",size:this.size,required:this.required,label:this.label,showLabel:this.showLabel,help:this.help,inputId:this.inputId,helpId:this.helpId,labelId:this.labelId,name:this.name},i("sc-quantity-select",{size:this.size,quantity:Math.max(((h=(n=o[this.productId])===null||n===void 0?void 0:n.selectedPrice)===null||h===void 0?void 0:h.ad_hoc)?1:(r=o[this.productId])===null||r===void 0?void 0:r.quantity,1),disabled:(p=(a=o[this.productId])===null||a===void 0?void 0:a.selectedPrice)===null||p===void 0?void 0:p.ad_hoc,onScInput:t=>e(this.productId,{quantity:t.detail}),...!!c?{max:c}:{}})))}};h.style=l;export{h as sc_product_quantity};
//# sourceMappingURL=p-69307215.entry.js.map