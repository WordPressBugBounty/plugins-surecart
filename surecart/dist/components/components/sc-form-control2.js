import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{i as isRtl}from"./page-align.js";import{d as defineCustomElement$1}from"./sc-visually-hidden2.js";const scFormControlCss=".form-control{font-family:var(--sc-font-sans);font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-normal);display:flex;flex-direction:column;gap:var(--sc-input-label-margin)}.form-control .form-control__label{display:none}.form-control .form-control__help-text{display:none}.form-control--has-label .form-control__label{display:inline-block;color:var(--sc-input-label-color);font-weight:var(--sc-input-label-font-weight);text-transform:var(--sc-input-label-text-transform, none);letter-spacing:var(--sc-input-label-letter-spacing, 0)}.form-control--has-label.form-control--small .form-control__label{font-size:var(--sc-input-label-font-size-small)}.form-control--has-label.form-control--medium .form-control__label{font-size:var(--sc-input-label-font-size-medium)}.form-control--has-label.form-control--large .form-control_label{font-size:var(--sc-input-label-font-size-large)}::slotted(.control--errors){margin-top:var(--sc-spacing-small);color:var(--sc-color-danger-500)}::slotted([slot=label-end]){float:right}.form-control--is-required .required{color:var(--sc-color-danger-500)}.form-control--has-help-text .form-control__help-text{display:block;color:var(--sc-input-help-text-color)}.form-control--has-help-text.form-control--small .form-control__help-text{font-size:var(--sc-input-help-text-font-size-small)}.form-control--has-help-text.form-control--medium .form-control__help-text{font-size:var(--sc-input-help-text-font-size-medium)}.form-control--has-help-text.form-control--large .form-control__help-text{font-size:var(--sc-input-help-text-font-size-large)}.form-control--has-error .form-control__error-text{display:block;color:var(--sc-input-error-text-color)}.form-control--has-error.form-control--small .form-control__error-text{font-size:var(--sc-input-error-text-font-size-small)}.form-control--has-error.form-control--medium .form-control__error-text{font-size:var(--sc-input-error-text-font-size-medium)}.form-control--has-error.form-control--large .form-control__error-text{font-size:var(--sc-input-error-text-font-size-large)}.form-control--has-error ::part(base){border-color:rgb(var(--sl-color-danger-500))}.form-control--is-rtl.form-control--has-label .form-control__label{text-align:right}",ScFormControlStyle0=scFormControlCss,ScFormControl=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.size="medium",this.name=void 0,this.showLabel=!0,this.label=void 0,this.labelId=void 0,this.inputId=void 0,this.required=!1,this.help=void 0,this.helpId=void 0}render(){return h("div",{key:"a59d29bc6e5be063405f74099a221444191b43b1",part:"form-control",class:{"form-control":!0,"form-control--small":"small"===this.size,"form-control--medium":"medium"===this.size,"form-control--large":"large"===this.size,"form-control--has-label":!!this.label&&this.showLabel,"form-control--has-help-text":!!this.help,"form-control--is-required":!!this.required,"form-control--is-rtl":isRtl()}},h("label",{key:"9c943d0e31c558320ebe24c57d513594a932b89b",part:"label",id:this.labelId,class:"form-control__label",htmlFor:this.inputId,"aria-hidden":this.label?"false":"true"},h("slot",{key:"46f43cc6519cc45d178375619a010bc4ba96c0b9",name:"label"},this.label),h("slot",{key:"160d284d4a47cb554ff9d7be9d8457b8646fa102",name:"label-end"}),!!this.required&&h("span",{key:"d425ec357e9ccb40ce3dbe6fdadf18c97c8dddd1","aria-hidden":"true",class:"required"}," ","*"),h("sc-visually-hidden",{key:"1b2ddddd86a20dc17cfead8962019c270c585942"},this.required?wp.i18n.__("required","surecart"):"")),h("div",{key:"1997aa16948572fcf65d16ea8957f740c8c6eb03",part:"input",class:"form-control__input"},h("slot",{key:"5c8c34ec97263219eadea1ec9b9481c423c62089"})),this.help&&h("div",{key:"7a90843957ac3cbc4d08bd050421c5113cb60feb",part:"help-text",id:this.helpId,class:"form-control__help-text"},h("slot",{key:"ded3a447811b73073f8cc0746505794c35721709",name:"help-text"},this.help)))}get el(){return this}static get style(){return ScFormControlStyle0}},[1,"sc-form-control",{size:[513],name:[1],showLabel:[4,"show-label"],label:[1],labelId:[1,"label-id"],inputId:[1,"input-id"],required:[4],help:[1],helpId:[1,"help-id"]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-form-control","sc-visually-hidden"].forEach((o=>{switch(o){case"sc-form-control":customElements.get(o)||customElements.define(o,ScFormControl);break;case"sc-visually-hidden":customElements.get(o)||defineCustomElement$1()}}))}export{ScFormControl as S,defineCustomElement as d};