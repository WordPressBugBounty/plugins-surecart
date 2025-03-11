import{h}from"@stencil/core";export class ScBreadcrumb{constructor(){this.href=void 0,this.target=void 0,this.rel="noreferrer noopener",this.hasPrefix=void 0,this.hasSuffix=void 0}handleSlotChange(){this.hasPrefix=!!this.el.querySelector('[slot="prefix"]'),this.hasSuffix=!!this.el.querySelector('[slot="suffix"]')}render(){const e=this.href?"a":"div";return h("div",{key:"a6c5bdb3ecaad172d54c7fa66196b3c534f89f9d",part:"base",class:{"breadcrumb-item":!0,"breadcrumb-item--has-prefix":this.hasPrefix,"breadcrumb-item--has-suffix":this.hasSuffix}},h("span",{key:"46e40c6e050d6f49f7923f6db9ca94bdc079a5a2",part:"prefix",class:"breadcrumb-item__prefix"},h("slot",{key:"b268f0c29c70ec12829d9a95c02394b03018e7ad",name:"prefix"})),h(e,{key:"9397ab426fd9a537115dbb4b799fd2259b638bfe",part:"label",class:"breadcrumb-item__label breadcrumb-item__label--link",href:this.href,target:this.target,rel:this.rel},h("slot",{key:"610140218c3134ca0d1dcdf0bb1459fdc503897e"})),h("span",{key:"816306b0e51612b52aee78bbdedfaa2fb84e50ea",part:"suffix",class:"breadcrumb-item__suffix"},h("slot",{key:"37d093943ef2eb43f7d26a583011d5c8d96a5d43",name:"suffix",onSlotchange:()=>this.handleSlotChange()})),h("span",{key:"1811165836c86d2946e5160c2e9623849581ce92",part:"separator",class:"breadcrumb-item__separator","aria-hidden":"true"},h("slot",{key:"241731a354f3eb6ce99dc50f9e2e2a1a6a6225fa",name:"separator",onSlotchange:()=>this.handleSlotChange()},h("sc-icon",{key:"244213b938d339ebbe7f4571665867230175683e",name:"chevron-right"}))))}static get is(){return"sc-breadcrumb"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-breadcrumb.css"]}}static get styleUrls(){return{$:["sc-breadcrumb.css"]}}static get properties(){return{href:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!0,docs:{tags:[],text:"Optional URL to direct the user to when the breadcrumb item is activated. When set, a link will be rendered\ninternally. When unset, a button will be rendered instead."},attribute:"href",reflect:!1},target:{type:"string",mutable:!1,complexType:{original:"'_blank' | '_parent' | '_self' | '_top'",resolved:'"_blank" | "_parent" | "_self" | "_top"',references:{}},required:!1,optional:!0,docs:{tags:[],text:"Tells the browser where to open the link. Only used when `href` is set."},attribute:"target",reflect:!1},rel:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The `rel` attribute to use on the link. Only used when `href` is set."},attribute:"rel",reflect:!1,defaultValue:"'noreferrer noopener'"}}}static get states(){return{hasPrefix:{},hasSuffix:{}}}static get elementRef(){return"el"}}