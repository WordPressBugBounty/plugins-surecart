import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{s as speak}from"./index2.js";import{d as defineCustomElement$3}from"./sc-form-control2.js";import{d as defineCustomElement$2}from"./sc-input2.js";import{d as defineCustomElement$1}from"./sc-visually-hidden2.js";const scPasswordCss=":host{display:block}.password{display:grid;gap:var(--sc-form-row-spacing, 0.75em)}.password__hint{padding-top:0.36rem;color:red}";let showHintTimer,showVerificationTimer;const ScPassword=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.size="medium",this.value="",this.pill=!1,this.label=void 0,this.showLabel=!0,this.help="",this.placeholder=void 0,this.disabled=!1,this.readonly=!1,this.required=!1,this.autofocus=void 0,this.confirmation=!1,this.name="password",this.confirmationLabel=void 0,this.confirmationPlaceholder=void 0,this.confirmationHelp=void 0,this.enableValidation=!0,this.hintText=void 0,this.verifyText=void 0}async triggerFocus(i){return this.input.triggerFocus(i)}async reportValidity(){var i,t,e,s,o,a,n;null===(t=null===(i=this.input)||void 0===i?void 0:i.setCustomValidity)||void 0===t||t.call(i,""),null===(s=null===(e=this.confirmInput)||void 0===e?void 0:e.setCustomValidity)||void 0===s||s.call(e,""),this.confirmation&&(null===(o=this.confirmInput)||void 0===o?void 0:o.value)&&(null===(a=this.input)||void 0===a?void 0:a.value)!==(null===(n=this.confirmInput)||void 0===n?void 0:n.value)&&(this.confirmInput.setCustomValidity(wp.i18n.__("Password does not match.","surecart")),speak(wp.i18n.__("Password does not match.","surecart"),"assertive")),this.hintText&&this.input.setCustomValidity(wp.i18n.__(this.hintText,"surecart"));const r=await this.input.reportValidity();return!!r&&(this.confirmInput?this.confirmInput.reportValidity():r)}handleVerification(){clearTimeout(showVerificationTimer),showVerificationTimer=setTimeout((()=>{this.verifyPassword()}),500)}handleValidate(){this.handleVerification(),clearTimeout(showHintTimer),showHintTimer=setTimeout((()=>{this.validatePassword()}),500)}validatePassword(){var i,t,e;if(this.enableValidation){if(0!==(null===(i=this.input)||void 0===i?void 0:i.value.trim().length))return(null===(t=this.input)||void 0===t?void 0:t.value.trim().length)<6?this.hintText=wp.i18n.__("The password must be at least 6 characters in length.","surecart"):/[-'`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]/.test(null===(e=this.input)||void 0===e?void 0:e.value)?void(this.hintText=""):this.hintText=wp.i18n.__("Passwords must contain a special character.","surecart");this.hintText=""}}verifyPassword(){var i,t,e,s,o,a,n;if((null===(i=this.confirmInput)||void 0===i?void 0:i.value)&&(null===(t=this.input)||void 0===t?void 0:t.value)!==(null===(e=this.confirmInput)||void 0===e?void 0:e.value))return this.verifyText=wp.i18n.__("Password does not match.","surecart"),void speak(this.verifyText,"assertive");(null===(s=this.input)||void 0===s?void 0:s.value)&&(null===(o=this.confirmInput)||void 0===o?void 0:o.value)&&(null===(a=this.input)||void 0===a?void 0:a.value)===(null===(n=this.confirmInput)||void 0===n?void 0:n.value)&&speak(wp.i18n.__("Password is matched.","surecart"),"assertive"),this.verifyText=""}handleHintTextChange(){speak(this.hintText,"assertive")}render(){var i;return h("div",{class:"password"},h("div",null,h("sc-input",{ref:i=>this.input=i,label:this.label,help:this.help,autofocus:this.autofocus,placeholder:this.placeholder,showLabel:this.showLabel,size:this.size?this.size:"medium",type:"password",name:"password",value:this.value,required:this.required,disabled:this.disabled,onScInput:()=>this.handleValidate()}),!!this.hintText&&h("small",{class:"password__hint"},this.hintText)),this.confirmation&&h("div",null,h("sc-input",{ref:i=>this.confirmInput=i,label:null!==(i=this.confirmationLabel)&&void 0!==i?i:wp.i18n.__("Confirm Password","surecart"),help:this.confirmationHelp,placeholder:this.confirmationPlaceholder,size:this.size?this.size:"medium",type:"password",value:this.value,onScInput:()=>this.handleVerification(),required:this.required,disabled:this.disabled}),!!this.verifyText&&h("small",{class:"password__hint"},this.verifyText)))}static get watchers(){return{hintText:["handleHintTextChange"]}}static get style(){return scPasswordCss}},[1,"sc-password",{size:[513],value:[1025],pill:[516],label:[1],showLabel:[4,"show-label"],help:[1],placeholder:[1],disabled:[516],readonly:[516],required:[516],autofocus:[4],confirmation:[516],name:[1],confirmationLabel:[1,"confirmation-label"],confirmationPlaceholder:[1,"confirmation-placeholder"],confirmationHelp:[1,"confirmation-help"],enableValidation:[516,"enable-validation"],hintText:[32],verifyText:[32],triggerFocus:[64],reportValidity:[64]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-password","sc-form-control","sc-input","sc-visually-hidden"].forEach((i=>{switch(i){case"sc-password":customElements.get(i)||customElements.define(i,ScPassword);break;case"sc-form-control":customElements.get(i)||defineCustomElement$3();break;case"sc-input":customElements.get(i)||defineCustomElement$2();break;case"sc-visually-hidden":customElements.get(i)||defineCustomElement$1()}}))}export{ScPassword as S,defineCustomElement as d};