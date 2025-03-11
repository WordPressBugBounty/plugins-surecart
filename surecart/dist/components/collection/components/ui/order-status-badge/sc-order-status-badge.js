import{h}from"@stencil/core";import{__}from"@wordpress/i18n";export class ScOrderStatusBadge{constructor(){this.status=void 0,this.size="medium",this.pill=!1,this.clearable=!1}getType(){switch(this.status){case"processing":return"warning";case"paid":return"success";case"payment_failed":case"canceled":case"void":case"canceled":return"danger"}}getText(){switch(this.status){case"processing":return __("Processing","surecart");case"payment_failed":return __("Payment Failed","surecart");case"paid":return __("Paid","surecart");case"canceled":case"void":return __("Canceled","surecart");case"draft":return __("Draft","surecart");default:return this.status}}render(){return h("sc-tag",{key:"88f88070397e1bf82d6c8190498dd3dd69ef991f",type:this.getType(),pill:this.pill},this.getText())}static get is(){return"sc-order-status-badge"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-order-status-badge.css"]}}static get styleUrls(){return{$:["sc-order-status-badge.css"]}}static get properties(){return{status:{type:"string",mutable:!1,complexType:{original:"OrderStatus",resolved:'"canceled" | "draft" | "paid" | "payment_failed" | "processing" | "void"',references:{OrderStatus:{location:"import",path:"../../../types",id:"src/types.ts::OrderStatus"}}},required:!1,optional:!1,docs:{tags:[],text:"The tag's statux type."},attribute:"status",reflect:!1},size:{type:"string",mutable:!1,complexType:{original:"'small' | 'medium' | 'large'",resolved:'"large" | "medium" | "small"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The tag's size."},attribute:"size",reflect:!0,defaultValue:"'medium'"},pill:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws a pill-style tag with rounded edges."},attribute:"pill",reflect:!0,defaultValue:"false"},clearable:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the tag clearable."},attribute:"clearable",reflect:!1,defaultValue:"false"}}}}