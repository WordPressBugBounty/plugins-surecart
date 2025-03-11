import{r as e,c as i,h as r,F as c,H as t}from"./p-e97fde0a.js";import{i as n}from"./p-88aed607.js";import"./p-3f6362a4.js";const s=".recurring-price-choice{display:flex;justify-content:space-between;gap:var(--sc-spacing-x-small);flex-wrap:wrap}.recurring-price-choice__name{font-weight:var(--sc-font-weight-semibold);cursor:pointer}.recurring-price-choice__control{flex:1;display:flex;flex-direction:column;gap:var(--sc-spacing-x-small);align-self:center}.recurring-price-choice__details{align-self:center;display:flex;align-items:flex-end;flex-direction:column;gap:var(--sc-spacing-xx-small)}.recurring-price-choice__button{font-size:var(--sc-font-size-small);appearance:none;display:flex;align-items:center;gap:var(--sc-spacing-xx-small);text-decoration:none;user-select:none;white-space:var(--sc-recurring-price-choice-white-space, nowrap);text-align:var(--sc-recurring-price-choice-text-align, center);vertical-align:middle;padding:13px;margin:-13px;border:none;background:transparent;font-size:inherit;color:inherit;border-radius:var(--sc-input-border-radius-medium);opacity:0.8;cursor:pointer}.recurring-price-choice__button:focus-visible{outline:1px solid var(--sc-color-primary-500);outline-offset:4px}.recurring-price-choice__trial,.recurring-price-choice__setup-fee,.recurring-price-choice__price{font-size:var(--sc-font-size-small);opacity:0.8}sc-dropdown{width:100%}sc-choice-container:not([checked]) sc-dropdown{pointer-events:none}";const o=s;const l=class{constructor(r){e(this,r);this.scChange=i(this,"scChange",7);this.prices=undefined;this.selectedPrice=undefined;this.selectedOption=undefined;this.product=undefined;this.label=undefined;this.showControl=false;this.showAmount=true;this.showDetails=true}renderPrice(e){return r("sc-format-number",{type:"currency",value:e===null||e===void 0?void 0:e.amount,currency:e===null||e===void 0?void 0:e.currency})}value(){return this.prices.find((e=>{var i;return e.id===((i=this.selectedPriceState())===null||i===void 0?void 0:i.id)}))||this.prices[0]}selectedPriceState(){return this.prices.find((e=>{var i;return e.id===((i=this.selectedPrice)===null||i===void 0?void 0:i.id)}))||this.selectedOption||this.prices[0]}render(){var e,i,s,o,l,a,u,d,h,p,v,g,f,m;if(!((e=this.prices)===null||e===void 0?void 0:e.length)){return r(t,{style:{display:"none"}})}return r("sc-choice-container",{value:(i=this.selectedPrice)===null||i===void 0?void 0:i.id,type:"radio",showControl:this.showControl,checked:this.prices.some((e=>{var i;return e.id===((i=this.selectedPrice)===null||i===void 0?void 0:i.id)})),onScChange:e=>{var i;e.stopPropagation();this.scChange.emit((i=this.value())===null||i===void 0?void 0:i.id)},role:"button"},r("div",{class:"recurring-price-choice"},r("div",{class:"recurring-price-choice__control"},r("div",{class:"recurring-price-choice__name"},r("slot",null,this.label)),((s=this.prices)===null||s===void 0?void 0:s.length)>1&&r("div",{class:"recurring-price-choice__description"},r("sc-dropdown",{style:{"--panel-width":"max(100%, 11rem)","--sc-menu-item-white-space":"wrap"}},r("button",{class:"recurring-price-choice__button",slot:"trigger","aria-label":wp.i18n.__("Press Up/Down Arrow & select the recurring interval you want.","surecart")},((o=this.value())===null||o===void 0?void 0:o.name)||(((l=this.value())===null||l===void 0?void 0:l.recurring_interval)?n(this.value(),{showOnce:true,abbreviate:false,labels:{interval:wp.i18n.__("Every","surecart"),period:wp.i18n.__("for","surecart")}}):this.product.name),r("sc-icon",{style:{minWidth:"var(--width)"},name:"chevron-down"})),r("sc-menu",{"aria-label":wp.i18n.__("Recurring Interval selection Dropdown opened, Press Up/Down Arrow & select the recurring interval you want.","surecart")},(this.prices||[]).map((e=>{var i;const c=(e===null||e===void 0?void 0:e.id)===((i=this.selectedPriceState())===null||i===void 0?void 0:i.id);const t=(e===null||e===void 0?void 0:e.name)||((e===null||e===void 0?void 0:e.recurring_interval)?n(e,{showOnce:true,abbreviate:false,labels:{interval:wp.i18n.__("Every","surecart"),period:wp.i18n.__("for","surecart")}}):this.product.name);return r("sc-menu-item",{onClick:()=>{this.selectedOption=e;this.scChange.emit(e===null||e===void 0?void 0:e.id)},checked:c,"aria-label":t},t,this.showAmount&&r("span",{slot:"suffix"},this.renderPrice(e)))})))))),this.showDetails&&r("div",{class:"recurring-price-choice__details"},r("div",{class:"recurring-price-choice__price"},((a=this.selectedPriceState())===null||a===void 0?void 0:a.ad_hoc)?wp.i18n.__("Custom Amount","surecart"):r(c,null,r("sc-format-number",{type:"currency",value:(u=this.selectedPriceState())===null||u===void 0?void 0:u.amount,currency:(d=this.selectedPriceState())===null||d===void 0?void 0:d.currency}),n(this.selectedPriceState(),{showOnce:true,abbreviate:true,labels:{interval:"/",period:wp.i18n.__("for","surecart")}}))),!!((h=this.selectedPriceState())===null||h===void 0?void 0:h.trial_duration_days)&&r("div",{class:"recurring-price-choice__trial"},wp.i18n.sprintf(wp.i18n._n("Starting in %s day","Starting in %s days",this.selectedPriceState().trial_duration_days,"surecart"),this.selectedPriceState().trial_duration_days)),!!((p=this.selectedPriceState())===null||p===void 0?void 0:p.setup_fee_enabled)&&((v=this.selectedPriceState())===null||v===void 0?void 0:v.setup_fee_amount)&&r("div",{class:"recurring-price-choice__setup-fee"},r("sc-format-number",{type:"currency",value:Math.abs(this.selectedPriceState().setup_fee_amount),currency:(g=this.selectedPriceState())===null||g===void 0?void 0:g.currency})," ",((f=this.selectedPriceState())===null||f===void 0?void 0:f.setup_fee_name)||(((m=this.selectedPriceState())===null||m===void 0?void 0:m.setup_fee_amount)<0?wp.i18n.__("Discount","surecart"):wp.i18n.__("Setup Fee","surecart"))))))}};l.style=o;export{l as sc_recurring_price_choice_container};
//# sourceMappingURL=p-5b78672c.entry.js.map