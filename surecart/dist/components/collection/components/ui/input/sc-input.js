import{h,Host}from"@stencil/core";import{FormSubmitController}from"../../../functions/form-data";let id=0;export class ScInput{constructor(){this.inputId="input-"+ ++id,this.helpId=`input-help-text-${id}`,this.labelId=`input-label-${id}`,this.squared=void 0,this.squaredBottom=void 0,this.squaredTop=void 0,this.squaredLeft=void 0,this.squaredRight=void 0,this.hidden=!1,this.type="text",this.size="medium",this.name=void 0,this.value="",this.pill=!1,this.label=void 0,this.showLabel=!0,this.help="",this.clearable=!1,this.togglePassword=!1,this.placeholder=void 0,this.disabled=!1,this.readonly=!1,this.minlength=void 0,this.maxlength=void 0,this.min=void 0,this.max=void 0,this.step=void 0,this.pattern=void 0,this.required=!1,this.invalid=!1,this.autocorrect=void 0,this.autocomplete=void 0,this.autofocus=void 0,this.spellcheck=void 0,this.inputmode=void 0,this.hasFocus=void 0,this.isPasswordVisible=!1}async reportValidity(){return this.input.reportValidity()}async triggerFocus(e){return this.input.focus(e)}async setCustomValidity(e){this.input.setCustomValidity(e),this.invalid=!this.input.checkValidity()}async triggerBlur(){return this.input.blur()}handleWheel(){var e;"number"===this.type&&(null===(e=this.input)||void 0===e||e.blur())}select(){return this.input.select()}handleBlur(){this.hasFocus=!1,this.scBlur.emit()}handleFocus(){this.hasFocus=!0,this.scFocus.emit()}handleChange(){this.value=this.input.value,this.scChange.emit()}handleInput(){this.value=this.input.value,this.scInput.emit()}handleClearClick(e){this.value="",this.scClear.emit(),this.scInput.emit(),this.scChange.emit(),this.input.focus(),e.stopPropagation()}handlePasswordToggle(){this.isPasswordVisible=!this.isPasswordVisible}handleFocusChange(){setTimeout((()=>{this.hasFocus&&this.input?this.input.focus():this.input.blur()}),0)}handleValueChange(){this.input&&(this.invalid=!this.input.checkValidity())}componentDidLoad(){this.formController=new FormSubmitController(this.el).addFormData(),this.handleFocusChange()}disconnectedCallback(){var e;null===(e=this.formController)||void 0===e||e.removeFormData()}render(){var e;return h(Host,{key:"4224dbc47772acb78cb51d1ffbeba8fe292eea04",hidden:this.hidden},h("sc-form-control",{key:"f87c59ed2244628b880ad5bc7a64b2957125f604",exportparts:"label, help-text, form-control",size:this.size,required:this.required,label:this.label,showLabel:this.showLabel,help:this.help,inputId:this.inputId,helpId:this.helpId,labelId:this.labelId,name:this.name},h("slot",{key:"349f5199e2fffd5b914f6f2158fd8079cc1e202c",name:"label-end",slot:"label-end"}),h("div",{key:"c95b36c3658639469a57be09d7b8bdbb3863a2b5",part:"base",class:{input:!0,"input--small":"small"===this.size,"input--medium":"medium"===this.size,"input--large":"large"===this.size,"input--focused":this.hasFocus,"input--invalid":this.invalid,"input--disabled":this.disabled,"input--squared":this.squared,"input--squared-bottom":this.squaredBottom,"input--squared-top":this.squaredTop,"input--squared-left":this.squaredLeft,"input--squared-right":this.squaredRight}},h("span",{key:"6620355ca20aa7b407ca03340b929734e8329246",part:"prefix",class:"input__prefix"},h("slot",{key:"88bce29b8d304db84a35827590d1c6910ded5d1e",name:"prefix"})),h("slot",{key:"57ead8abfaee8a50ee0d1376764eb307dc1eae47"},h("input",{key:"b759b5e3db5782a4feda79946b23006bc23ec292",part:"input",id:this.inputId,class:"input__control",ref:e=>this.input=e,type:"password"===this.type&&this.isPasswordVisible?"text":this.type,name:this.name,disabled:this.disabled,readonly:this.readonly,required:this.required,placeholder:this.placeholder,minlength:this.minlength,maxlength:this.maxlength,min:this.min,max:this.max,step:this.step,autocomplete:this.autocomplete,autocorrect:this.autocorrect,autofocus:this.autofocus,spellcheck:this.spellcheck,pattern:this.pattern,inputmode:this.inputmode,"aria-label":this.label,"aria-labelledby":this.labelId,"aria-invalid":!!this.invalid,value:this.value,onChange:()=>this.handleChange(),onInput:()=>this.handleInput(),onFocus:()=>this.handleFocus(),onBlur:()=>this.handleBlur(),onKeyDown:e=>{["Enter","ArrowRight","ArrowLeft","ArrowUp","ArrowDown","Tab"].includes(e.key)||e.stopPropagation()}})),h("span",{key:"9e2c92d7e98ec4e62a2ddb4cd2a47fd20765922c",part:"suffix",class:"input__suffix"},h("slot",{key:"7c8dde83e051ca1113f917f306f98865d988be12",name:"suffix"})),this.clearable&&(null===(e=this.value)||void 0===e?void 0:e.length)>0&&h("button",{key:"d8548abd9323600d956a6a7be044ba6645ad65ec",part:"clear-button",class:"input__clear",type:"button",onClick:e=>this.handleClearClick(e),tabindex:"-1"},h("slot",{key:"b86eb18dcaab42985187720dcf6dd7d3443ae618",name:"clear-icon"},h("svg",{key:"15489f91b1178512773e41f9c1f8e2a0d58f6341",xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"feather feather-x"},h("line",{key:"36bba41698e4deb66c31e65fffe3eeebd11f284f",x1:"18",y1:"6",x2:"6",y2:"18"}),h("line",{key:"b4a6f32a2ead5c485fe6b2e0259810258df9c9fa",x1:"6",y1:"6",x2:"18",y2:"18"})))))))}static get is(){return"sc-input"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-input.scss"]}}static get styleUrls(){return{$:["sc-input.css"]}}static get properties(){return{squared:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"squared",reflect:!1},squaredBottom:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"squared-bottom",reflect:!1},squaredTop:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"squared-top",reflect:!1},squaredLeft:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"squared-left",reflect:!1},squaredRight:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"squared-right",reflect:!1},hidden:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Hidden"},attribute:"hidden",reflect:!1,defaultValue:"false"},type:{type:"string",mutable:!1,complexType:{original:"'email' | 'number' | 'password' | 'search' | 'tel' | 'text' | 'url' | 'hidden'",resolved:'"email" | "hidden" | "number" | "password" | "search" | "tel" | "text" | "url"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's type."},attribute:"type",reflect:!0,defaultValue:"'text'"},size:{type:"string",mutable:!1,complexType:{original:"'small' | 'medium' | 'large'",resolved:'"large" | "medium" | "small"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's size."},attribute:"size",reflect:!0,defaultValue:"'medium'"},name:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's name attribute."},attribute:"name",reflect:!0},value:{type:"string",mutable:!0,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's value attribute."},attribute:"value",reflect:!0,defaultValue:"''"},pill:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws a pill-style input with rounded edges."},attribute:"pill",reflect:!0,defaultValue:"false"},label:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's label."},attribute:"label",reflect:!1},showLabel:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Should we show the label"},attribute:"show-label",reflect:!1,defaultValue:"true"},help:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's help text."},attribute:"help",reflect:!1,defaultValue:"''"},clearable:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Adds a clear button when the input is populated."},attribute:"clearable",reflect:!1,defaultValue:"false"},togglePassword:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Adds a password toggle button to password inputs."},attribute:"toggle-password",reflect:!1,defaultValue:"false"},placeholder:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's placeholder text."},attribute:"placeholder",reflect:!1},disabled:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Disables the input."},attribute:"disabled",reflect:!0,defaultValue:"false"},readonly:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the input readonly."},attribute:"readonly",reflect:!0,defaultValue:"false"},minlength:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The minimum length of input that will be considered valid."},attribute:"minlength",reflect:!1},maxlength:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The maximum length of input that will be considered valid."},attribute:"maxlength",reflect:!1},min:{type:"any",mutable:!1,complexType:{original:"number | string",resolved:"number | string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's minimum value."},attribute:"min",reflect:!1},max:{type:"any",mutable:!1,complexType:{original:"number | string",resolved:"number | string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's maximum value."},attribute:"max",reflect:!1},step:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's step attribute."},attribute:"step",reflect:!1},pattern:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"A pattern to validate input against."},attribute:"pattern",reflect:!1},required:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the input a required field."},attribute:"required",reflect:!0,defaultValue:"false"},invalid:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"This will be true when the control is in an invalid state. Validity is determined by props such as `type`,\n`required`, `minlength`, `maxlength`, and `pattern` using the browser's constraint validation API."},attribute:"invalid",reflect:!0,defaultValue:"false"},autocorrect:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's autocorrect attribute."},attribute:"autocorrect",reflect:!1},autocomplete:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's autocomplete attribute."},attribute:"autocomplete",reflect:!1},autofocus:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's autofocus attribute."},attribute:"autofocus",reflect:!1},spellcheck:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Enables spell checking on the input."},attribute:"spellcheck",reflect:!1},inputmode:{type:"string",mutable:!1,complexType:{original:"'none' | 'text' | 'decimal' | 'numeric' | 'tel' | 'search' | 'email' | 'url'",resolved:'"decimal" | "email" | "none" | "numeric" | "search" | "tel" | "text" | "url"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's inputmode attribute."},attribute:"inputmode",reflect:!1},hasFocus:{type:"boolean",mutable:!0,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Inputs focus"},attribute:"has-focus",reflect:!0}}}static get states(){return{isPasswordVisible:{}}}static get events(){return[{method:"scChange",name:"scChange",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control's value changes."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scClear",name:"scClear",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the clear button is activated."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scInput",name:"scInput",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control receives input."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scFocus",name:"scFocus",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control gains focus."},complexType:{original:"void",resolved:"void",references:{}}},{method:"scBlur",name:"scBlur",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:"Emitted when the control loses focus."},complexType:{original:"void",resolved:"void",references:{}}}]}static get methods(){return{reportValidity:{complexType:{signature:"() => Promise<boolean>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<boolean>"},docs:{text:"",tags:[]}},triggerFocus:{complexType:{signature:"(options?: FocusOptions) => Promise<void>",parameters:[{name:"options",type:"FocusOptions",docs:""}],references:{Promise:{location:"global",id:"global::Promise"},FocusOptions:{location:"global",id:"global::FocusOptions"}},return:"Promise<void>"},docs:{text:"Sets focus on the input.",tags:[]}},setCustomValidity:{complexType:{signature:"(message: string) => Promise<void>",parameters:[{name:"message",type:"string",docs:""}],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<void>"},docs:{text:"Sets a custom validation message. If `message` is not empty, the field will be considered invalid.",tags:[]}},triggerBlur:{complexType:{signature:"() => Promise<void>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<void>"},docs:{text:"Removes focus from the input.",tags:[]}}}}static get elementRef(){return"el"}static get watchers(){return[{propName:"hasFocus",methodName:"handleFocusChange"},{propName:"value",methodName:"handleValueChange"}]}static get listeners(){return[{name:"wheel",method:"handleWheel",target:void 0,capture:!1,passive:!0}]}}