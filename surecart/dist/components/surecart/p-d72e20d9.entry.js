import{r as e,h as t}from"./p-e97fde0a.js";const s=":host{display:inline-block}";const r=s;const a=class{constructor(t){e(this,t);this.status=undefined;this.size="medium";this.pill=false;this.clearable=false}getType(){switch(this.status){case"paid":return"success";case"open":return"info";case"draft":return"default"}}getText(){switch(this.status){case"paid":return wp.i18n.__("Paid","surecart");case"open":return wp.i18n.__("Open","surecart");case"draft":return wp.i18n.__("Draft","surecart");default:return this.status}}render(){return t("sc-tag",{key:"910dcfd2e4fc4853c0d847a6fb18e9eca7d080c1",type:this.getType(),pill:this.pill},this.getText())}};a.style=r;export{a as sc_invoice_status_badge};
//# sourceMappingURL=p-d72e20d9.entry.js.map