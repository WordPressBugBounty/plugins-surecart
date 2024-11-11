import{h}from"@stencil/core";import{isRtl}from"../../../functions/page-align";export class ScText{constructor(){this.tag="p",this.truncate=!1}render(){const t=this.tag;return h(t,{key:"dc8fb99ac75debf3672244d7287d360c44aa600e",class:{text:!0,"is-truncated":this.truncate,"text--is-rtl":isRtl()}},h("slot",{key:"a94cd94105d8c59c20165b416981f7df394b6bf7"}))}static get is(){return"sc-text"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-text.scss"]}}static get styleUrls(){return{$:["sc-text.css"]}}static get properties(){return{tag:{type:"string",mutable:!1,complexType:{original:"'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6' | 'p'",resolved:'"h1" | "h2" | "h3" | "h4" | "h5" | "h6" | "p"',references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"tag",reflect:!1,defaultValue:"'p'"},truncate:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"truncate",reflect:!1,defaultValue:"false"}}}}