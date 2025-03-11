import{r as e,h as t,a as s}from"./p-e97fde0a.js";import{s as a}from"./p-fab02ef6.js";import"./p-03631502.js";const i=':host{display:block}:slotted([slot="summary"]){line-height:1;display:flex;align-items:center;gap:0.5em}';const n=i;const l=class{constructor(t){e(this,t);this.methodId=undefined;this.processorId=undefined;this.isManual=undefined;this.card=undefined}isSelected(){if(this.methodId){return(a===null||a===void 0?void 0:a.id)===this.processorId&&(a===null||a===void 0?void 0:a.method)==this.methodId}return!(a===null||a===void 0?void 0:a.method)&&(a===null||a===void 0?void 0:a.id)===this.processorId}getAllOptions(){const e=this.el.closest("sc-payment")||this.el.parentElement;if(!e){return[]}return[...e.querySelectorAll(this.el.tagName)]}getSiblingItems(){return this.getAllOptions().filter((e=>e!==this.el))}hasOthers(){var e;return!!((e=this.getSiblingItems())===null||e===void 0?void 0:e.length)}render(){const e=this.hasOthers()?"sc-toggle":"div";return t(e,{key:"d5d8a2b7c83018be1e077dbd8fbd9a3b342ebf30","show-control":true,borderless:true,open:this.isSelected(),onScShow:()=>{a.id=this.processorId;a.manual=!!this.isManual;a.method=this.methodId}},this.hasOthers()&&t("slot",{key:"e031fcaec8703bc20e97cec0793dc9d50d43f59d",name:"summary",slot:"summary"}),this.card&&!this.hasOthers()?t("sc-card",null,t("slot",null)):t("slot",null))}get el(){return s(this)}};l.style=n;const c=":host{display:block}::slotted([slot=icon]){display:block;font-size:24px}.payment-selected{display:flex;flex-direction:column;gap:var(--sc-spacing-x-small)}.payment-selected__label{color:var(--sc-input-label-color);line-height:var(--sc-line-height-dense);font-size:var(--sc-font-size-medium)}.payment-selected__instructions{display:flex;justify-content:flex-start;align-items:center;gap:1em}.payment-selected__instructions svg{width:42px;height:42px;flex-shrink:0}.payment-selected__instructions-text{color:var(--sc-input-label-color);font-size:var(--sc-font-size-small);line-height:var(--sc-line-height-dense)}";const d=c;const o=class{constructor(t){e(this,t);this.iconName=undefined;this.label=undefined}render(){return t("div",{key:"f4ffd54b80409279e2f7e41f82c4419ffa22c001",class:"payment-selected",part:"base"},t("slot",{key:"aca1eb85d4ffa5537b2586c5370d6bd983221f48",name:"icon"}),t("div",{key:"6fa3591c0292762edd7f4ef5037242704a4ab709",class:"payment-selected__label"},this.label),t("sc-divider",{key:"2994dcb949a465da5eaa9d5cc721e5298adde6b1",style:{"--spacing":"var(--sc-spacing-xx-small)"},exportparts:"base:divider, line:divider__line"}),t("div",{key:"f508675358e94ea5a7c9adea1135252b53c1a84d",part:"instructions",class:"payment-selected__instructions"},t("svg",{key:"827631181277a52012a27a6c6c55c37d20790a1b",part:"icon",viewBox:"0 0 48 40",fill:"var(--sc-color-gray-500)",xmlns:"http://www.w3.org/2000/svg",role:"presentation"},t("path",{key:"6f10dcf15aea6e04df2f7186d79585ee9c903d4d",opacity:".6","fill-rule":"evenodd","clip-rule":"evenodd",d:"M43 5a4 4 0 00-4-4H17a4 4 0 00-4 4v11a1 1 0 102 0V5a2 2 0 012-2h22a2 2 0 012 2v30a2 2 0 01-2 2H17a2 2 0 01-2-2v-9a1 1 0 10-2 0v9a4 4 0 004 4h22a4 4 0 004-4V5zM17.992 16.409L21.583 20H6a1 1 0 100 2h15.583l-3.591 3.591a1 1 0 101.415 1.416l5.3-5.3a1 1 0 000-1.414l-5.3-5.3a1 1 0 10-1.415 1.416zM17 6a1 1 0 011-1h15a1 1 0 011 1v2a1 1 0 01-1 1H18a1 1 0 01-1-1V6zm21-1a1 1 0 100 2 1 1 0 000-2z"})),t("div",{key:"d363ceb79d86079acd48b3310e3ac1f11053ce93",part:"text",class:"payment-selected__instructions-text"},t("slot",{key:"5f351d539fc1ff8fa643a892e8353ced772c8313"}))))}};o.style=d;export{l as sc_payment_method_choice,o as sc_payment_selected};
//# sourceMappingURL=p-c1e85152.entry.js.map