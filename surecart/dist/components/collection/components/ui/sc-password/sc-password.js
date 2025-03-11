import{h}from"@stencil/core";import{__}from"@wordpress/i18n";import{speak}from"@wordpress/a11y";let showHintTimer,showVerificationTimer;export class ScPassword{constructor(){this.size="medium",this.value="",this.pill=!1,this.label=void 0,this.showLabel=!0,this.help="",this.placeholder=void 0,this.disabled=!1,this.readonly=!1,this.required=!1,this.autofocus=void 0,this.confirmation=!1,this.name="password",this.confirmationLabel=void 0,this.confirmationPlaceholder=void 0,this.confirmationHelp=void 0,this.enableValidation=!0,this.hintText=void 0,this.verifyText=void 0}async triggerFocus(e){return this.input.triggerFocus(e)}async reportValidity(){var e,t,i,o,a,s,r;null===(t=null===(e=this.input)||void 0===e?void 0:e.setCustomValidity)||void 0===t||t.call(e,""),null===(o=null===(i=this.confirmInput)||void 0===i?void 0:i.setCustomValidity)||void 0===o||o.call(i,""),this.confirmation&&(null===(a=this.confirmInput)||void 0===a?void 0:a.value)&&(null===(s=this.input)||void 0===s?void 0:s.value)!==(null===(r=this.confirmInput)||void 0===r?void 0:r.value)&&(this.confirmInput.setCustomValidity(__("Password does not match.","surecart")),speak(__("Password does not match.","surecart"),"assertive")),this.hintText&&this.input.setCustomValidity(__(this.hintText,"surecart"));const l=await this.input.reportValidity();return!!l&&(this.confirmInput?this.confirmInput.reportValidity():l)}handleVerification(){clearTimeout(showVerificationTimer),showVerificationTimer=setTimeout((()=>{this.verifyPassword()}),500)}handleValidate(){this.handleVerification(),clearTimeout(showHintTimer),showHintTimer=setTimeout((()=>{this.validatePassword()}),500)}validatePassword(){var e,t,i;if(this.enableValidation){if(0!==(null===(e=this.input)||void 0===e?void 0:e.value.trim().length))return(null===(t=this.input)||void 0===t?void 0:t.value.trim().length)<6?this.hintText=__("The password must be at least 6 characters in length.","surecart"):/[-'`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]/.test(null===(i=this.input)||void 0===i?void 0:i.value)?void(this.hintText=""):this.hintText=__("Passwords must contain a special character.","surecart");this.hintText=""}}verifyPassword(){var e,t,i,o,a,s,r;if((null===(e=this.confirmInput)||void 0===e?void 0:e.value)&&(null===(t=this.input)||void 0===t?void 0:t.value)!==(null===(i=this.confirmInput)||void 0===i?void 0:i.value))return this.verifyText=__("Password does not match.","surecart"),void speak(this.verifyText,"assertive");(null===(o=this.input)||void 0===o?void 0:o.value)&&(null===(a=this.confirmInput)||void 0===a?void 0:a.value)&&(null===(s=this.input)||void 0===s?void 0:s.value)===(null===(r=this.confirmInput)||void 0===r?void 0:r.value)&&speak(__("Password is matched.","surecart"),"assertive"),this.verifyText=""}handleHintTextChange(){speak(this.hintText,"assertive")}render(){var e;return h("div",{key:"5dc92980dc16fa7331b5fd3d18ec271e7120dd1b",class:"password"},h("div",{key:"d8715a1d7f8ce722ec3faea3e00c3455144012b6"},h("sc-input",{key:"f7f5f1f2b3b16b653127b1e47f8f3643488e5016",ref:e=>this.input=e,label:this.label,help:this.help,autofocus:this.autofocus,placeholder:this.placeholder,showLabel:this.showLabel,size:this.size?this.size:"medium",type:"password",name:"password",value:this.value,required:this.required,disabled:this.disabled,onScInput:()=>this.handleValidate()}),!!this.hintText&&h("small",{key:"01ac00189b62ce8e6e85c81bb27d118541517f44",class:"password__hint"},this.hintText)),this.confirmation&&h("div",{key:"7e82a44b8e7985a37c21fbcddff21fadb0c7ce69"},h("sc-input",{key:"e765ade791105217214c0b8e3a92fbbacca4daa8",ref:e=>this.confirmInput=e,label:null!==(e=this.confirmationLabel)&&void 0!==e?e:__("Confirm Password","surecart"),help:this.confirmationHelp,placeholder:this.confirmationPlaceholder,size:this.size?this.size:"medium",type:"password",value:this.value,onScInput:()=>this.handleVerification(),required:this.required,disabled:this.disabled}),!!this.verifyText&&h("small",{key:"afc2d328972b6965791fabb09d166206fdb56324",class:"password__hint"},this.verifyText)))}static get is(){return"sc-password"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-password.scss"]}}static get styleUrls(){return{$:["sc-password.css"]}}static get properties(){return{size:{type:"string",mutable:!1,complexType:{original:"'small' | 'medium' | 'large'",resolved:'"large" | "medium" | "small"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's size."},attribute:"size",reflect:!0,defaultValue:"'medium'"},value:{type:"string",mutable:!0,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's value attribute."},attribute:"value",reflect:!1,defaultValue:"''"},pill:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws a pill-style input with rounded edges."},attribute:"pill",reflect:!0,defaultValue:"false"},label:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's label."},attribute:"label",reflect:!1},showLabel:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Should we show the label"},attribute:"show-label",reflect:!1,defaultValue:"true"},help:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's help text."},attribute:"help",reflect:!1,defaultValue:"''"},placeholder:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's placeholder text."},attribute:"placeholder",reflect:!1},disabled:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Disables the input."},attribute:"disabled",reflect:!0,defaultValue:"false"},readonly:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the input readonly."},attribute:"readonly",reflect:!0,defaultValue:"false"},required:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the input a required field."},attribute:"required",reflect:!0,defaultValue:"false"},autofocus:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's autofocus attribute."},attribute:"autofocus",reflect:!1},confirmation:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's password confirmation attribute."},attribute:"confirmation",reflect:!0,defaultValue:"false"},name:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The name for the input."},attribute:"name",reflect:!1,defaultValue:"'password'"},confirmationLabel:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's confirmation label text."},attribute:"confirmation-label",reflect:!1},confirmationPlaceholder:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's confirmation placeholder text."},attribute:"confirmation-placeholder",reflect:!1},confirmationHelp:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The input's confirmation help text."},attribute:"confirmation-help",reflect:!1},enableValidation:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Ensures strong password validation."},attribute:"enable-validation",reflect:!0,defaultValue:"true"}}}static get states(){return{hintText:{},verifyText:{}}}static get methods(){return{triggerFocus:{complexType:{signature:"(options?: FocusOptions) => Promise<void>",parameters:[{name:"options",type:"FocusOptions",docs:""}],references:{Promise:{location:"global",id:"global::Promise"},FocusOptions:{location:"global",id:"global::FocusOptions"}},return:"Promise<void>"},docs:{text:"Sets focus on the input.",tags:[]}},reportValidity:{complexType:{signature:"() => Promise<boolean>",parameters:[],references:{Promise:{location:"global",id:"global::Promise"}},return:"Promise<boolean>"},docs:{text:"",tags:[]}}}}static get watchers(){return[{propName:"hintText",methodName:"handleHintTextChange"}]}}