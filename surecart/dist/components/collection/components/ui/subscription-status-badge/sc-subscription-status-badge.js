import{Fragment,h}from"@stencil/core";import{__,sprintf}from"@wordpress/i18n";export class ScSubscriptionStatusBadge{constructor(){this.status=void 0,this.subscription=void 0,this.size="medium",this.pill=!1,this.clearable=!1}getType(){var e,t,s;if(null===(e=this.subscription)||void 0===e?void 0:e.cancel_at_period_end)return"info";switch(this.status||(null===(t=this.subscription)||void 0===t?void 0:t.status)){case"incomplete":case"past_due":case"unpaid":return"warning";case"trialing":return"info";case"active":case"completed":return"success";case"canceled":return(null===(s=this.subscription)||void 0===s?void 0:s.restore_at)?"info":"danger"}}getText(){var e,t,s,i,r;if((null===(e=this.subscription)||void 0===e?void 0:e.cancel_at_period_end)&&this.subscription.current_period_end_at&&"canceled"!==(null===(t=this.subscription)||void 0===t?void 0:t.status))return h(Fragment,null,(null===(s=this.subscription)||void 0===s?void 0:s.restore_at)?__("Pauses","surecart"):__("Cancels","surecart")," ",this.subscription.current_period_end_at_date);switch(this.status||(null===(i=this.subscription)||void 0===i?void 0:i.status)){case"incomplete":return __("Incomplete","surecart");case"trialing":return __("Trialing","surecart");case"active":return __("Active","surecart");case"past_due":return __("Past Due","surecart");case"canceled":return(null===(r=this.subscription)||void 0===r?void 0:r.restore_at)?"Paused":__("Canceled","surecart");case"completed":return __("Completed","surecart");case"unpaid":return __("Unpaid","surecart")}}render(){return h("sc-tag",{key:"8df1acae7afef7676b2605c96b9d6543449774b0","aria-label":sprintf(__("Plan Status - %s","surecart"),this.getText()),type:this.getType()},this.getText())}static get is(){return"sc-subscription-status-badge"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-subscription-status-badge.css"]}}static get styleUrls(){return{$:["sc-subscription-status-badge.css"]}}static get properties(){return{status:{type:"string",mutable:!1,complexType:{original:"SubscriptionStatus",resolved:'"active" | "canceled" | "completed" | "incomplete" | "past_due" | "trialing" | "unpaid"',references:{SubscriptionStatus:{location:"import",path:"../../../types",id:"src/types.ts::SubscriptionStatus"}}},required:!1,optional:!1,docs:{tags:[],text:"Subscription status"},attribute:"status",reflect:!1},subscription:{type:"unknown",mutable:!1,complexType:{original:"Subscription",resolved:"Subscription",references:{Subscription:{location:"import",path:"../../../types",id:"src/types.ts::Subscription"}}},required:!1,optional:!1,docs:{tags:[],text:"The tag's status type."}},size:{type:"string",mutable:!1,complexType:{original:"'small' | 'medium' | 'large'",resolved:'"large" | "medium" | "small"',references:{}},required:!1,optional:!1,docs:{tags:[],text:"The tag's size."},attribute:"size",reflect:!0,defaultValue:"'medium'"},pill:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Draws a pill-style tag with rounded edges."},attribute:"pill",reflect:!0,defaultValue:"false"},clearable:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:"Makes the tag clearable."},attribute:"clearable",reflect:!1,defaultValue:"false"}}}}