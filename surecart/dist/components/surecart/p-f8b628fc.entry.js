import{r as e,h as t,a as s}from"./p-e97fde0a.js";import{a as i}from"./p-6135d661.js";import{o as a}from"./p-b719a497.js";import{a as r}from"./p-401e165e.js";import"./p-d3366af3.js";const o=":host{display:block;position:relative}.charges-list{display:grid;gap:1em}";const n=o;const c=class{constructor(t){e(this,t);this.query={page:1,per_page:10};this.heading=undefined;this.showPagination=true;this.allLink=undefined;this.charges=[];this.loading=undefined;this.loaded=undefined;this.error=undefined;this.pagination={total:0,total_pages:0}}componentWillLoad(){a(this.el,(()=>{this.getItems()}))}async getItems(){try{this.loading=true;const e=await i({path:r(`surecart/v1/charges/`,{expand:["checkout","checkout.order"],...this.query}),parse:false});this.pagination={total:parseInt(e.headers.get("X-WP-Total")),total_pages:parseInt(e.headers.get("X-WP-TotalPages"))};this.charges=await e.json()}catch(e){if(e===null||e===void 0?void 0:e.message){this.error=e.message}else{this.error=wp.i18n.__("Something went wrong","surecart")}console.error(this.error)}finally{this.loading=false;this.loaded=true}}renderRefundStatus(e){if(e===null||e===void 0?void 0:e.fully_refunded){return t("sc-tag",{type:"danger"},wp.i18n.__("Refunded","surecart"))}if(e===null||e===void 0?void 0:e.refunded_amount){return t("sc-tag",{type:"warning"},wp.i18n.__("Partially Refunded","surecart"))}return t("sc-tag",{type:"success"},wp.i18n.__("Paid","surecart"))}renderEmpty(){return t("sc-stacked-list-row",{"mobile-size":0},t("slot",{name:"empty"},wp.i18n.__("You have no saved payment methods.","surecart")))}renderLoading(){return t("sc-stacked-list-row",{style:{"--columns":"2"},"mobile-size":0},t("div",{style:{padding:"0.5em"}},t("sc-skeleton",{style:{width:"30%",marginBottom:"0.75em"}}),t("sc-skeleton",{style:{width:"20%",marginBottom:"0.75em"}}),t("sc-skeleton",{style:{width:"40%"}})))}renderContent(){var e;if(this.loading&&!this.loaded){return this.renderLoading()}if(((e=this.charges)===null||e===void 0?void 0:e.length)===0){return this.renderEmpty()}return this.charges.map((e=>{var s;const{currency:i,amount:a,created_at_date:o}=e;return t("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":600,href:r(window.location.href,{action:"show",model:"order",id:(s=e.checkout.order)===null||s===void 0?void 0:s.id})},t("strong",null,o),t("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},wp.i18n.sprintf(wp.i18n.__("#%s","surecart"),e.checkout.order.number)),t("div",null,this.renderRefundStatus(e)),t("strong",null,t("sc-format-number",{type:"currency",value:a,currency:i})))}))}nextPage(){this.query.page=this.query.page+1;this.getItems()}prevPage(){this.query.page=this.query.page-1;this.getItems()}render(){var e;return t("sc-dashboard-module",{key:"932ef18bbc6c4f2964cbc9db6f4fa1356e3a6cfe",class:"charges-list",error:this.error},t("span",{key:"aed23eac26eca14ae80ccf9de99838d60c5cf32f",slot:"heading"},t("slot",{key:"ae4b87c5404c5dd22e72a936a13ded59a83ee063",name:"heading"},this.heading||wp.i18n.__("Payment History","surecart"))),!!this.allLink&&t("sc-button",{key:"14dbf0f05d5d62ecb283df0f9341daf50298531b",type:"link",href:this.allLink,slot:"end"},wp.i18n.__("View all","surecart"),t("sc-icon",{key:"0e3b91393f473a2675f76fe07020e10e20865d25",name:"chevron-right",slot:"suffix"})),t("sc-card",{key:"bee3f25c4b04e9e873254ba872e7be776e15725e","no-padding":true,style:{"--overflow":"hidden"}},t("sc-stacked-list",{key:"93d1bec458065f27d30560cc891761a97fad9d91"},this.renderContent())),this.showPagination&&t("sc-pagination",{key:"bf7720349c3c3a9036f3c6cbc4d224652e884c80",page:this.query.page,perPage:this.query.per_page,total:this.pagination.total,totalPages:this.pagination.total_pages,totalShowing:(e=this===null||this===void 0?void 0:this.charges)===null||e===void 0?void 0:e.length,onScNextPage:()=>this.nextPage(),onScPrevPage:()=>this.prevPage()}),this.loading&&this.loaded&&t("sc-block-ui",{key:"a4e0b4163265b7bf28379e2df25349864c0a0087",spinner:true}))}get el(){return s(this)}};c.style=n;export{c as sc_charges_list};
//# sourceMappingURL=p-f8b628fc.entry.js.map