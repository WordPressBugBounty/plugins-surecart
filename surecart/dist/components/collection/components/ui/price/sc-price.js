import{h,Fragment,Host}from"@stencil/core";import{__,_n,sprintf}from"@wordpress/i18n";import{intervalString}from"../../../functions/price";export class ScProductPrice{constructor(){this.currency=void 0,this.amount=void 0,this.scratchAmount=void 0,this.scratchDisplayAmount=void 0,this.displayAmount=void 0,this.saleText=void 0,this.adHoc=void 0,this.recurringPeriodCount=void 0,this.recurringIntervalCount=void 0,this.recurringInterval=void 0,this.setupFeeAmount=void 0,this.trialDurationDays=void 0,this.setupFeeName=void 0}render(){return this.adHoc?h(Host,{role:"paragraph"},__("Custom Amount","surecart")):h(Host,{role:"paragraph"},h("div",{class:"price",id:"price"},h("div",{class:"price__amounts"},!!this.scratchAmount&&this.scratchAmount!==this.amount&&h(Fragment,null,0===this.scratchAmount?__("Free","surecart"):h(Fragment,null,h("sc-visually-hidden",null,__("The price was","surecart")," "),this.scratchDisplayAmount?h("span",{class:"price__scratch"},this.scratchDisplayAmount):h("sc-format-number",{class:"price__scratch",part:"price__scratch",type:"currency",currency:this.currency,value:this.scratchAmount}),h("sc-visually-hidden",null," ",__("now discounted to","surecart")))),0===this.amount?__("Free","surecart"):this.displayAmount?this.displayAmount:h("sc-format-number",{class:"price__amount",type:"currency",value:this.amount,currency:this.currency}),h("div",{class:"price__interval"},this.recurringPeriodCount&&1<this.recurringPeriodCount&&h("sc-visually-hidden",null," ",__("This is a repeating price. Payment will happen","surecart")," ",intervalString({recurring_interval_count:this.recurringIntervalCount,recurring_interval:this.recurringInterval,recurring_period_count:this.recurringPeriodCount},{showOnce:!0,abbreviate:!1,labels:{interval:__("every","surecart"),period:
/** translators: used as in time period: "for 3 months" */
__("for","surecart")}})),h("span",{"aria-hidden":"true"},intervalString({recurring_interval_count:this.recurringIntervalCount,recurring_interval:this.recurringInterval,recurring_period_count:this.recurringPeriodCount},{showOnce:!0,abbreviate:!1,labels:{interval:"/",period:
/** translators: used as in time period: "for 3 months" */
__("for","surecart")}}))),!!this.scratchAmount&&h("sc-tag",{type:"primary",pill:!0,class:"price__sale-badge"},this.saleText||h(Fragment,null,h("sc-visually-hidden",null,__("This product is available for sale.","surecart")," "),h("span",{"aria-hidden":"true"},__("Sale","surecart"))))),(!!(null==this?void 0:this.trialDurationDays)||!!(null==this?void 0:this.setupFeeAmount))&&h("div",{class:"price__details"},!!(null==this?void 0:this.trialDurationDays)&&h(Fragment,null,h("sc-visually-hidden",null,sprintf(__("You have a %d-day trial before payment becomes necessary.","surecart"),null==this?void 0:this.trialDurationDays)),h("span",{class:"price__trial","aria-hidden":"true"},sprintf(_n("Starting in %s day.","Starting in %s days.",null==this?void 0:this.trialDurationDays,"surecart"),null==this?void 0:this.trialDurationDays))),!!(null==this?void 0:this.setupFeeAmount)&&h("span",{class:"price__setup-fee"},h("sc-visually-hidden",null,__("This product has","surecart")," ")," ",h("sc-format-number",{type:"currency",value:null==this?void 0:this.setupFeeAmount,currency:this.currency})," ",(null==this?void 0:this.setupFeeName)||__("Setup Fee","surecart"),"."))))}static get is(){return"sc-price"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-price.scss"]}}static get styleUrls(){return{$:["sc-price.css"]}}static get properties(){return{currency:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The currency."},attribute:"currency",reflect:!1},amount:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The amount"},attribute:"amount",reflect:!1},scratchAmount:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The scratch amount"},attribute:"scratch-amount",reflect:!1},scratchDisplayAmount:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The scratch display amount"},attribute:"scratch-display-amount",reflect:!1},displayAmount:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The display amount"},attribute:"display-amount",reflect:!1},saleText:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The sale text"},attribute:"sale-text",reflect:!1},adHoc:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Is the product ad_hoc?"},attribute:"ad-hoc",reflect:!1},recurringPeriodCount:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The recurring period count"},attribute:"recurring-period-count",reflect:!1},recurringIntervalCount:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The recurring interval count"},attribute:"recurring-interval-count",reflect:!1},recurringInterval:{type:"string",mutable:!1,complexType:{original:"'week' | 'month' | 'year' | 'never'",resolved:'"month" | "never" | "week" | "year"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The recurring interval"},attribute:"recurring-interval",reflect:!1},setupFeeAmount:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The setup fee amount"},attribute:"setup-fee-amount",reflect:!1},trialDurationDays:{type:"number",mutable:!1,complexType:{original:"number",resolved:"number",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The trial duration days"},attribute:"trial-duration-days",reflect:!1},setupFeeName:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:"The setup fee name"},attribute:"setup-fee-name",reflect:!1}}}}