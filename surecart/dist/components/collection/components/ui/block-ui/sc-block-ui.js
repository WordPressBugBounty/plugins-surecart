import{h}from"@stencil/core";export class ScBlockUi{constructor(){this.zIndex=1,this.transparent=void 0,this.spinner=void 0}render(){return h("div",{key:"9681c9104c4d01ee05c0151c9574f0a33b88b0e7",part:"base",class:{overlay:!0,transparent:this.transparent},style:{"z-index":this.zIndex.toString()}},h("div",{key:"7232fa02fb8767911454188287a19cbfc0d82af5",class:"overlay__content",part:"content"},h("slot",{key:"2aab74d4d58c9a7b4401576ec4ebf5ab6bdd3740",name:"spinner"},!this.transparent&&this.spinner&&h("sc-spinner",{key:"a47feab5434e70c0e93ed35d390d8ac99826a5a7"})),h("slot",{key:"d0d84b1d1fb5295c0fbab68a202e338b40dfac3d"})))}static get is(){return"sc-block-ui"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-block-ui.scss"]}}static get styleUrls(){return{$:["sc-block-ui.css"]}}static get properties(){return{zIndex:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"z-index",reflect:!1,defaultValue:"1"},transparent:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"transparent",reflect:!1},spinner:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"spinner",reflect:!1}}}}