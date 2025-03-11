import{h}from"@stencil/core";import{FormSubmitController}from"../../../functions/form-data";import{isRtl}from"../../../functions/page-align";let id=0;export class ScCheckbox{constructor(){this.inputId="checkbox-"+ ++id,this.labelId=`checkbox-label-${id}`,this.hasFocus=!1,this.name=void 0,this.value=void 0,this.disabled=!1,this.edit=!1,this.required=!1,this.checked=!1,this.indeterminate=!1,this.invalid=!1}firstUpdated(){this.input.indeterminate=this.indeterminate}async triggerClick(){return this.input.click()}async triggerFocus(e){return this.input.focus(e)}async triggerBlur(){return this.input.blur()}async reportValidity(){return this.invalid=!this.input.checkValidity(),this.input.reportValidity()}setCustomValidity(e){this.input.setCustomValidity(e),this.invalid=!this.input.checkValidity()}handleClick(){this.checked=!this.checked,this.indeterminate=!1}handleBlur(){this.hasFocus=!1,this.scBlur.emit()}handleFocus(){this.hasFocus=!0,this.scFocus.emit()}handleLabelMouseDown(){this.input.focus()}handleStateChange(){this.input.checked=this.checked,this.input.indeterminate=this.indeterminate,this.scChange.emit()}componentDidLoad(){this.formController=new FormSubmitController(this.el,{value:e=>e.checked?e.value:void 0}).addFormData()}disconnectedCallback(){var e;null===(e=this.formController)||void 0===e||e.removeFormData()}render(){const e=this.edit?"div":"label";return h(e,{key:"01a04bae7c78d102e7a4ba8cc1e9ba335b2ceb98",part:"base",class:{checkbox:!0,"checkbox--is-required":this.required,"checkbox--checked":this.checked,"checkbox--disabled":this.disabled,"checkbox--focused":this.hasFocus,"checkbox--indeterminate":this.indeterminate,"checkbox--is-rtl":isRtl()},htmlFor:this.inputId,onMouseDown:()=>this.handleLabelMouseDown()},h("span",{key:"34906184c63a8564c766a910ff7b89906fefd758",part:"control",class:"checkbox__control"},this.checked?h("span",{part:"checked-icon",class:"checkbox__icon"},h("svg",{viewBox:"0 0 16 16"},h("g",{stroke:"none","stroke-width":"1",fill:"none","fill-rule":"evenodd","stroke-linecap":"round"},h("g",{stroke:"currentColor","stroke-width":"2"},h("g",{transform:"translate(3.428571, 3.428571)"},h("path",{d:"M0,5.71428571 L3.42857143,9.14285714"}),h("path",{d:"M9.14285714,0 L3.42857143,9.14285714"})))))):"",!this.checked&&this.indeterminate?h("span",{part:"indeterminate-icon",class:"checkbox__icon"},h("svg",{viewBox:"0 0 16 16"},h("g",{stroke:"none","stroke-width":"1",fill:"none","fill-rule":"evenodd","stroke-linecap":"round"},h("g",{stroke:"currentColor","stroke-width":"2"},h("g",{transform:"translate(2.285714, 6.857143)"},h("path",{d:"M10.2857143,1.14285714 L1.14285714,1.14285714"})))))):"",h("input",{key:"71ac1de1acad4ba4d7b695bbc0ebe8e120a97cfc",id:this.inputId,ref:e=>this.input=e,type:"checkbox",name:this.name,value:this.value,checked:this.checked,disabled:this.disabled,required:this.required,role:"checkbox","aria-checked":this.checked?"true":"false","aria-labelledby":this.labelId,onClick:()=>this.handleClick(),onBlur:()=>this.handleBlur(),onFocus:()=>this.handleFocus()})),h("span",{key:"c77f44d9121a6d1c409f2488ffa524444bb7d631",part:"label",id:this.labelId,class:"checkbox__label"},h("slot",{key:"e18ad2a918ebf681b85fcb84f91ec7e82b3e7216"})))}static get is(){return"sc-checkbox"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-checkbox.scss"]}}static get styleUrls(){return{$:["sc-checkbox.css"]}}static get properties(){return{name:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The checkbox's name attribute."},attribute:"name",reflect:!1},value:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The checkbox's value attribute."},attribute:"value",reflect:!1},disabled:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Disables the checkbox."},attribute:"disabled",reflect:!0,defaultValue:"false"},edit:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes this edit and not editable."},attribute:"edit",reflect:!0,defaultValue:"false"},required:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the checkbox a required field."},attribute:"required",reflect:!0,defaultValue:"false"},checked:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws the checkbox in a checked state."},attribute:"checked",reflect:!0,defaultValue:"false"},indeterminate:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws the checkbox in an indeterminate state."},attribute:"indeterminate",reflect:!0,defaultValue:"false"},invalid:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"This will be true when the control is in an invalid state. Validity is determined by the `required` prop."},attribute:"invalid",reflect:!0,defaultValue:"false"}}}static get states(){return{hasFocus:{}}}static get events(){return[{method:"scBlur",name:"scBlur",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control loses focus."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scChange",name:"scChange",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control's checked state changes."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scFocus",name:"scFocus",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control gains focus."},complexType:{original:"void",resolved:"void",references:{}}}]}static get methods(){return{triggerClick:{complexType:{signature:"() => Promise<void>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<void>"},docs:{text:"Simulates a click on the checkbox.",tags:[]}},triggerFocus:{complexType:{signature:"(options?: FocusOptions) => Promise<void>",parameters:[{name:"options",type:"FocusOptions",docs:""}],references:{Promise:{location:"global",id:"global::Promise"},FocusOptions:{location:"global",id:"global::FocusOptions"}},return:"Promise<void>"},docs:{text:"Sets focus on the checkbox.",tags:[]}},triggerBlur:{complexType:{signature:"() => Promise<void>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<void>"},docs:{text:"Removes focus from the checkbox.",tags:[]}},reportValidity:{complexType:{signature:"() => Promise<boolean>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<boolean>"},docs:{text:"Checks for validity and shows the browser's validation message if the control is invalid.",tags:[]}}}}static get elementRef(){return"el"}static get watchers(){return[{propName:"checked",methodName:"handleStateChange"},{propName:"indeterminate",methodName:"handleStateChange"}]}}