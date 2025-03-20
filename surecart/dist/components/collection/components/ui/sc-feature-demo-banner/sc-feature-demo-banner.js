import{h}from"@stencil/core";import{__}from"@wordpress/i18n";export class ScFeatureDemoBanner{constructor(){this.url="https://app.surecart.com/plans",this.buttonText=__("Upgrade Your Plan","surecart")}render(){return h("div",{key:"f76f3a6ce3c112a1572a5ddc5c14200ffa0232b1",class:{"sc-banner":!0}},h("p",{key:"55c8903c032d2d8ddf97d5d42b7843b1fbd48c49"},h("slot",{key:"e55c69fa34a910589805fa3e33536ed2b7ccd5d3"},__("This is a feature demo. In order to use it, you must upgrade your plan.","surecart")),h("a",{key:"042a93d4abae2f11f48f7dad8e696cdab95d7fc0",href:this.url,target:"_blank"},h("slot",{key:"8cfccdbe5f539e73d6966e4de5c4283d2a78f095",name:"link"},this.buttonText," ",h("sc-icon",{key:"8db0ecc6b7362efbc52cb7b40934f600052915d3",name:"arrow-right"})))))}static get is(){return"sc-feature-demo-banner"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-feature-demo-banner.scss"]}}static get styleUrls(){return{$:["sc-feature-demo-banner.css"]}}static get properties(){return{url:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"url",reflect:!1,defaultValue:"'https://app.surecart.com/plans'"},buttonText:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"button-text",reflect:!1,defaultValue:"__('Upgrade Your Plan', 'surecart')"}}}}