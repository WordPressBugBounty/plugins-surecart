import{proxyCustomElement,HTMLElement,createEvent,h}from"@stencil/core/internal/client";import{F as FormSubmitController}from"./form-data.js";import{i as isRtl}from"./page-align.js";const scChoiceContainerCss=":host{display:flex;flex-direction:column;align-items:stretch;justify-content:stretch;min-width:0;align-self:stretch;height:100%}[hidden]{border:0 !important;clip:rect(0 0 0 0) !important;height:1px !important;margin:-1px !important;overflow:hidden !important;padding:0 !important;position:absolute !important;width:1px !important}.choice{background:var(--sc-choice-background-color);font-family:var(--sc-input-font-family);font-size:var(--sc-input-font-size-medium);font-weight:var(--sc-input-font-weight);user-select:none;border:solid var(--sc-choice-border-width, var(--sc-input-border-width)) var(--sc-choice-border-color, var(--sc-input-border-color));border-radius:var(--sc-choice-border-radius, var(--sc-input-border-radius-large));box-shadow:var(--sc-choice-box-shadow);cursor:pointer;padding:var(--sc-choice-padding-top, 1.3em) var(--sc-choice-padding-right, 1.1em) var(--sc-choice-padding-bottom, 1.3em) var(--sc-choice-padding-left, 1.1em);position:relative;text-decoration:none;color:var(--sc-choice-text-color, var(--sc-input-color));height:100%;transition:background-color 150ms ease, border-color 150ms ease, color 150ms ease, box-shadow 150ms ease;box-sizing:border-box}.choice--is-rtl{text-align:right}.choice__content{cursor:pointer;display:flex;align-items:center;gap:0.75em;height:100%}.choice--checked{border-color:var(--sc-color-primary-500);box-shadow:0 0 0 1px var(--sc-color-primary-500);z-index:1}.choice__title{display:inline-block;font-weight:var(--sc-input-label-font-weight);font-size:var(--sc-input-label-font-size-medium)}.choice--size-small{padding:0.75em 0.9em}.choice--size-large{padding:1.3em 1.1em}.choice__icon{display:inline-flex;width:var(--sc-radio-size);height:var(--sc-radio-size)}.choice__icon svg{width:100%;height:100%}.choice__control{flex:0 0 auto;position:relative;display:inline-flex;align-items:center;justify-content:center;border:solid var(--sc-input-border-width) var(--sc-input-border-color);background-color:var(--sc-input-background-color);color:transparent;transition:var(--sc-input-transition, var(--sc-transition-medium)) border-color, var(--sc-input-transition, var(--sc-transition-medium)) background-color, var(--sc-input-transition, var(--sc-transition-medium)) color, var(--sc-input-transition, var(--sc-transition-medium)) box-shadow}.choice__control.choice__radio{width:var(--sc-radio-size);height:var(--sc-radio-size);border-radius:50%}.choice__control.choice__checkbox{width:var(--sc-toggle-size);height:var(--sc-toggle-size);border-radius:4px}.choice__control input[type=radio],.choice__control input[type=checkbox]{position:absolute;opacity:0;padding:0;margin:0;pointer-events:none}.choice:not(.choice--checked):not(.choice--disabled) .choice__control:hover{border-color:var(--sc-input-border-color-hover);background-color:var(--sc-input-background-color-hover)}.choice.choice--focused:not(.choice--checked):not(.choice--disabled) .choice__control{border-color:var(--var-sc-checked-focus-border-color, var(--sc-input-background-color));background-color:var(--sc-input-background-color-focus);box-shadow:0 0 0 var(--sc-focus-ring-width) var(--sc-color-primary-500)}.choice.choice--focused:not(.choice--checked):not(.choice--disabled){outline-style:solid;outline-color:var(--sc-color-primary-500);outline-width:var(--sc-focus-ring-width);outline-offset:2px}.choice--checked .choice__control{color:var(--var-sc-checked-color, var(--sc-input-background-color));border-color:var(--sc-color-primary-500);background-color:var(--sc-color-primary-500)}.choice.choice--checked:not(.choice--disabled) .choice__control:hover{border-color:var(--var-sc-checked-hover-radio-border-color, var(--sc-input-background-color));background-color:var(--sc-color-primary-500)}.choice.choice--checked:not(.choice--disabled).choice--focused .choice__control{border-color:var(--var-sc-checked-focus-radio-border-color, var(--sc-input-background-color));background-color:var(--sc-color-primary-500);box-shadow:0 0 0 var(--sc-focus-ring-width) var(--sc-focus-ring-color-primary)}.choice--disabled{opacity:0.5;cursor:not-allowed}.choice:not(.choice--checked) svg circle{opacity:0}.choice__label{width:100%;line-height:1;user-select:none}.choice--layout-columns .choice__label{display:flex;justify-content:space-between;flex-wrap:wrap;gap:0.5em}.choice--layout-columns .choice__price{text-align:right;margin:0;display:flex;flex-direction:column;gap:var(--sc-spacing-xx-small)}.choice__description{display:inline-block;color:var(--sc-color-gray-500);font-size:var(--sc-font-size-medium)}.choice__label-text{display:flex;flex-direction:column;justify-content:center;gap:0.2em;flex:1}.choice__price{display:block}",ScChoiceContainerStyle0=scChoiceContainerCss;let id=0;const ScChoiceContainer=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.scBlur=createEvent(this,"scBlur",7),this.scChange=createEvent(this,"scChange",7),this.scFocus=createEvent(this,"scFocus",7),this.inputId="choice-container-"+ ++id,this.labelId=`choice-container-label-${id}`,this.hasFocus=!1,this.name=void 0,this.size="medium",this.value=void 0,this.type="radio",this.disabled=!1,this.checked=!1,this.required=!1,this.invalid=!1,this.showControl=!0,this.role=void 0}async triggerClick(){this.input.click()}async triggerFocus(){this.input.focus()}async reportValidity(){return this.invalid=!this.input.checkValidity(),this.required&&(this.getAllChoices().some((e=>e.checked))?(this.input.setCustomValidity(""),this.invalid=!this.input.checkValidity()):(this.input.setCustomValidity("radio"===this.type?wp.i18n.__("Please choose one.","surecart"):wp.i18n.__("Please choose at least one.","surecart")),this.invalid=!this.input.checkValidity())),this.input.reportValidity()}handleCheckedChange(){this.input.setCustomValidity(""),"radio"===this.type&&this.checked&&this.getSiblingChoices().map((e=>e.checked=!1)),this.input.checked=this.checked}handleBlur(){this.hasFocus=!1,this.scBlur.emit()}handleFocus(){this.hasFocus=!0,this.scFocus.emit()}async setCustomValidity(e){this.input.setCustomValidity(e),this.invalid=!this.input.checkValidity()}getAllChoices(){const e=this.el.closest("sc-choices")||this.el.parentElement;return e?[...e.querySelectorAll("sc-choice-container, sc-choice")]:[]}getSiblingChoices(){return this.getAllChoices().filter((e=>e!==this.el))}handleKeyDown(e){if("true"!==e.target.contentEditable){if(["ArrowUp","ArrowDown","ArrowLeft","ArrowRight"].includes(e.key)){const c=this.getAllChoices().filter((e=>!e.disabled)),i=["ArrowUp","ArrowLeft"].includes(e.key)?-1:1;let o=c.indexOf(this.el)+i;o<0&&(o=c.length-1),o>c.length-1&&(o=0),c[o].triggerFocus(),c[o].checked=!0,e.preventDefault()}" "===e.key&&(e.preventDefault(),this.checked=!0,this.scChange.emit(this.input.checked))}}componentDidLoad(){this.formController=new FormSubmitController(this.el,{value:e=>e.checked?e.value:void 0}).addFormData()}disconnectedCallback(){var e;null===(e=this.formController)||void 0===e||e.removeFormData()}handleClickEvent(){"checkbox"===this.type?(this.checked=!this.checked,this.scChange.emit(this.input.checked)):this.checked||(this.checked=!0,this.scChange.emit(this.input.checked))}render(){return h("div",{key:"fbb252d6687a765e77bb31e4a381f4cbdd4a7fa7",part:"base",class:{choice:!0,"choice--checked":this.checked,"choice--disabled":this.disabled,"choice--focused":this.hasFocus,"choice--is-rtl":isRtl(),[`choice--size-${this.size}`]:!0},role:"radio","aria-checked":this.checked?"true":"false","aria-disabled":this.disabled?"true":"false",onKeyDown:e=>this.handleKeyDown(e)},h("slot",{key:"d5b594ee2353500f4ab9ae52c5d069813a024b21",name:"header"}),h("div",{key:"adc025a8062525469fd4211877eeceb41c4f2e26",class:"choice__content",part:"content"},h("span",{key:"c22e88638ff85bac0aa8369555599c83f97fecf4",part:"control",class:{choice__control:!0,choice__checkbox:"checkbox"===this.type,choice__radio:"radio"===this.type},hidden:!this.showControl},h("span",{key:"1a492b131f44591e9acd6c89b4311947f851ec79",part:"checked-icon",class:"choice__icon"},"checkbox"===this.type?h("svg",{viewBox:"0 0 16 16"},h("g",{stroke:"none","stroke-width":"1",fill:"none","fill-rule":"evenodd","stroke-linecap":"round"},h("g",{stroke:"currentColor","stroke-width":"2"},h("g",{transform:"translate(3.428571, 3.428571)"},h("path",{d:"M0,5.71428571 L3.42857143,9.14285714"}),h("path",{d:"M9.14285714,0 L3.42857143,9.14285714"}))))):h("svg",{viewBox:"0 0 16 16"},h("g",{stroke:"none","stroke-width":"1",fill:"none","fill-rule":"evenodd"},h("g",{fill:"currentColor"},h("circle",{cx:"8",cy:"8",r:"3.42857143"}))))),h("input",{key:"724a8e539c569481eb320de26277043c76ee97a5",id:this.inputId,ref:e=>this.input=e,type:this.type,name:this.name,value:this.value,checked:this.checked,disabled:this.disabled,"aria-checked":this.checked?"true":"false","aria-disabled":this.disabled?"true":"false","aria-labelledby":this.labelId,tabindex:"0",onBlur:()=>this.handleBlur(),onFocus:()=>this.handleFocus(),onChange:()=>this.handleClickEvent(),role:this.role})),h("label",{key:"a5811161b8717c231f73b80d0c2c2a8e8f2c3e00",part:"label",id:this.labelId,class:"choice__label"},h("slot",{key:"ce445cbe4a12c71a47ac75a724185ce9607202db"}))))}get el(){return this}static get watchers(){return{checked:["handleCheckedChange"]}}static get style(){return ScChoiceContainerStyle0}},[1,"sc-choice-container",{name:[1],size:[1],value:[513],type:[1],disabled:[1540],checked:[1540],required:[516],invalid:[1540],showControl:[4,"show-control"],role:[1],hasFocus:[32],triggerClick:[64],triggerFocus:[64],reportValidity:[64],setCustomValidity:[64]},[[0,"click","handleClickEvent"]],{checked:["handleCheckedChange"]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-choice-container"].forEach((e=>{"sc-choice-container"===e&&(customElements.get(e)||customElements.define(e,ScChoiceContainer))}))}export{ScChoiceContainer as S,defineCustomElement as d};