import{h}from"@stencil/core";import{sprintf,__}from"@wordpress/i18n";import{FormSubmitController}from"../../../functions/form-data";const CHAR_LIMIT_THRESHOLD=20;let id=0;export class ScTextarea{constructor(){this.inputId="textarea-"+ ++id,this.helpId=`textarea-help-text-${id}`,this.labelId=`textarea-label-${id}`,this.hasFocus=!1,this.showCharLimit=!1,this.size="medium",this.name=void 0,this.value="",this.filled=!1,this.label="",this.showLabel=!0,this.help="",this.placeholder=void 0,this.rows=4,this.resize="vertical",this.disabled=!1,this.readonly=!1,this.minlength=void 0,this.maxlength=void 0,this.required=!1,this.invalid=!1,this.autocapitalize=void 0,this.autocorrect=void 0,this.autocomplete=void 0,this.autofocus=void 0,this.enterkeyhint=void 0,this.spellcheck=void 0,this.inputmode=void 0}handleRowsChange(){this.setTextareaHeight()}handleValueChange(){this.invalid=!this.input.checkValidity(),this.showCharLimit=this.maxlength-this.value.length<=20}handleDisabledChange(){this.input.disabled=this.disabled,this.invalid=!this.input.checkValidity()}async triggerFocus(e){return this.input.focus(e)}focus(e){this.input.focus(e)}blur(){this.input.blur()}select(){this.input.select()}scrollPosition(e){return e?("number"==typeof e.top&&(this.input.scrollTop=e.top),void("number"==typeof e.left&&(this.input.scrollLeft=e.left))):{top:this.input.scrollTop,left:this.input.scrollTop}}setSelectionRange(e,t,i="none"){this.input.setSelectionRange(e,t,i)}setRangeText(e,t,i,a="preserve"){this.input.setRangeText(e,t,i,a),this.value!==this.input.value&&(this.value=this.input.value,this.scInput.emit()),this.value!==this.input.value&&(this.value=this.input.value,this.setTextareaHeight(),this.scInput.emit(),this.scChange.emit())}async reportValidity(){return this.input.reportValidity()}setCustomValidity(e){this.input.setCustomValidity(e),this.invalid=!this.input.checkValidity()}handleBlur(){this.hasFocus=!1,this.scBlur.emit()}handleChange(){this.value=this.input.value,this.setTextareaHeight(),this.scChange.emit()}handleFocus(){this.hasFocus=!0,this.scFocus.emit()}handleInput(){this.value=this.input.value,this.setTextareaHeight(),this.scInput.emit()}componentWillLoad(){(null===window||void 0===window?void 0:window.ResizeObserver)&&(this.resizeObserver=new window.ResizeObserver((()=>this.setTextareaHeight())))}componentDidLoad(){this.formController=new FormSubmitController(this.el).addFormData(),(null===window||void 0===window?void 0:window.ResizeObserver)&&this.resizeObserver.observe(this.input)}disconnectedCallback(){var e;null===(e=this.formController)||void 0===e||e.removeFormData(),this.resizeObserver.unobserve(this.input)}setTextareaHeight(){"auto"===this.resize?(this.input.style.height="auto",this.input.style.height=`${this.input.scrollHeight}px`):this.input.style.height=void 0}render(){return h("div",{key:"9a7576679eabf4e8b396dd1de454fff1e6d28389",part:"form-control",class:{"form-control":!0,"form-control--small":"small"===this.size,"form-control--medium":"medium"===this.size,"form-control--large":"large"===this.size}},h("sc-form-control",{key:"cd75500e4b400e89a9012fe21ab5fcae1f89bfaa",exportparts:"label, help-text, form-control",size:this.size,required:this.required,label:this.label,showLabel:this.showLabel,help:this.help,inputId:this.inputId,helpId:this.helpId,labelId:this.labelId,name:this.name},h("div",{key:"c1fec2f51128b4b0b1380f3365b636319c496c0f",part:"form-control-input",class:"form-control-input"},h("div",{key:"ac2d70bd454a113db36f476a3285817bed4c95d2",part:"base",class:{textarea:!0,"textarea--small":"small"===this.size,"textarea--medium":"medium"===this.size,"textarea--large":"large"===this.size,"textarea--standard":!this.filled,"textarea--filled":this.filled,"textarea--disabled":this.disabled,"textarea--focused":this.hasFocus,"textarea--empty":!this.value,"textarea--invalid":this.invalid,"textarea--resize-none":"none"===this.resize,"textarea--resize-vertical":"vertical"===this.resize,"textarea--resize-auto":"auto"===this.resize}},h("textarea",{key:"35562c78edd851ee4d6439a2d31c75026ef1b4e7",part:"textarea",ref:e=>this.input=e,id:"input",class:"textarea__control",name:this.name,value:this.value,disabled:this.disabled,readonly:this.readonly,required:this.required,placeholder:this.placeholder,rows:this.rows,minlength:this.minlength,maxlength:this.maxlength,autocapitalize:this.autocapitalize,autocorrect:this.autocorrect,autofocus:this.autofocus,spellcheck:this.spellcheck,enterkeyhint:this.enterkeyhint,inputmode:this.inputmode,"aria-describedby":"help-text",onChange:()=>this.handleChange(),onInput:()=>this.handleInput(),onFocus:()=>this.handleFocus(),onBlur:()=>this.handleBlur(),onKeyDown:e=>e.stopPropagation()})),this.showCharLimit&&h("div",{key:"8664ee8e325031f4cec7a7597a89a0d70e0fa4cb",slot:"help",class:"textarea__char-limit-warning"},sprintf(__("%d characters remaining","surecart"),this.maxlength-this.input.value.length)))))}static get is(){return"sc-textarea"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-textarea.css"]}}static get styleUrls(){return{$:["sc-textarea.css"]}}static get properties(){return{size:{type:"string",mutable:!1,complexType:{original:"'small' | 'medium' | 'large'",resolved:'"large" | "medium" | "small"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's size."},attribute:"size",reflect:!0,defaultValue:"'medium'"},name:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's name attribute."},attribute:"name",reflect:!1},value:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's value attribute."},attribute:"value",reflect:!1,defaultValue:"''"},filled:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws a filled textarea."},attribute:"filled",reflect:!0,defaultValue:"false"},label:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's label. Alternatively, you can use the label slot."},attribute:"label",reflect:!1,defaultValue:"''"},showLabel:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Should we show the label"},attribute:"show-label",reflect:!1,defaultValue:"true"},help:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's help text. Alternatively, you can use the help-text slot."},attribute:"help",reflect:!1,defaultValue:"''"},placeholder:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's placeholder text."},attribute:"placeholder",reflect:!1},rows:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The number of rows to display by default."},attribute:"rows",reflect:!1,defaultValue:"4"},resize:{type:"string",mutable:!1,complexType:{original:"'none' | 'vertical' | 'auto'",resolved:'"auto" | "none" | "vertical"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"Controls how the textarea can be resized."},attribute:"resize",reflect:!1,defaultValue:"'vertical'"},disabled:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Disables the textarea."},attribute:"disabled",reflect:!0,defaultValue:"false"},readonly:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the textarea readonly."},attribute:"readonly",reflect:!0,defaultValue:"false"},minlength:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The minimum length of input that will be considered valid."},attribute:"minlength",reflect:!1},maxlength:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The maximum length of input that will be considered valid."},attribute:"maxlength",reflect:!1},required:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the textarea a required field."},attribute:"required",reflect:!0,defaultValue:"false"},invalid:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"This will be true when the control is in an invalid state. Validity is determined by props such as `type`,\n`required`, `minlength`, and `maxlength` using the browser's constraint validation API."},attribute:"invalid",reflect:!0,defaultValue:"false"},autocapitalize:{type:"string",mutable:!1,complexType:{original:"'off' | 'none' | 'on' | 'sentences' | 'words' | 'characters'",resolved:'"characters" | "none" | "off" | "on" | "sentences" | "words"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's autocapitalize attribute."},attribute:"autocapitalize",reflect:!1},autocorrect:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's autocorrect attribute."},attribute:"autocorrect",reflect:!1},autocomplete:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's autocomplete attribute."},attribute:"autocomplete",reflect:!1},autofocus:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's autofocus attribute."},attribute:"autofocus",reflect:!1},enterkeyhint:{type:"string",mutable:!1,complexType:{original:"'enter' | 'done' | 'go' | 'next' | 'previous' | 'search' | 'send'",resolved:'"done" | "enter" | "go" | "next" | "previous" | "search" | "send"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's enterkeyhint attribute. This can be used to customize the label or icon of the Enter key on virtual\nkeyboards."},attribute:"enterkeyhint",reflect:!1},spellcheck:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Enables spell checking on the textarea."},attribute:"spellcheck",reflect:!1},inputmode:{type:"string",mutable:!1,complexType:{original:"'none' | 'text' | 'decimal' | 'numeric' | 'tel' | 'search' | 'email' | 'url'",resolved:'"decimal" | "email" | "none" | "numeric" | "search" | "tel" | "text" | "url"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The textarea's inputmode attribute."},attribute:"inputmode",reflect:!1}}}static get states(){return{hasFocus:{},showCharLimit:{}}}static get events(){return[{method:"scChange",name:"scChange",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:""},complexType:{original:"void",resolved:"void",references:{}}},{method:"scInput",name:"scInput",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:""},complexType:{original:"void",resolved:"void",references:{}}},{method:"scBlur",name:"scBlur",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:""},complexType:{original:"void",resolved:"void",references:{}}},{method:"scFocus",name:"scFocus",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:""},complexType:{original:"void",resolved:"void",references:{}}}]}static get methods(){return{triggerFocus:{complexType:{signature:"(options?: FocusOptions) => Promise<void>",parameters:[{name:"options",type:"FocusOptions",docs:""}],references:{Promise:{location:"global",id:"global::Promise"},FocusOptions:{location:"global",id:"global::FocusOptions"}},return:"Promise<void>"},docs:{text:"Sets focus on the input.",tags:[]}},reportValidity:{complexType:{signature:"() => Promise<boolean>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<boolean>"},docs:{text:"Checks for validity and shows the browser's validation message if the control is invalid.",tags:[]}}}}static get elementRef(){return"el"}static get watchers(){return[{propName:"rows",methodName:"handleRowsChange"},{propName:"value",methodName:"handleValueChange"},{propName:"disabled",methodName:"handleDisabledChange"}]}}