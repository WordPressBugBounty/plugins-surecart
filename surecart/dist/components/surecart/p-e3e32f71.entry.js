import{r as e,h as t,a as s}from"./p-e97fde0a.js";import{a as i}from"./p-9a298389.js";import{o as r}from"./p-b719a497.js";import{a}from"./p-401e165e.js";import"./p-d3366af3.js";const o=":host{display:block}.orders-list{display:grid;gap:0.75em}.orders-list__status{display:flex;align-items:center;gap:var(--sc-spacing-x-small)}.orders-list__heading{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between}.orders-list__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense)}.orders-list a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.order__row{color:var(--sc-color-gray-800);text-decoration:none;display:grid;align-items:center;justify-content:space-between;gap:0;grid-template-columns:1fr 1fr 1fr auto;margin:0;padding:var(--sc-spacing-small) var(--sc-spacing-large)}.order__row:not(:last-child){border-bottom:1px solid var(--sc-color-gray-200)}.order__row:hover{background:var(--sc-color-gray-50)}.order__date{font-weight:var(--sc-font-weight-semibold)}";const n=o;const d=class{constructor(t){e(this,t);this.query={page:1,per_page:10};this.allLink=undefined;this.heading=undefined;this.isCustomer=undefined;this.orders=[];this.loading=undefined;this.busy=undefined;this.error=undefined;this.pagination={total:0,total_pages:0}}componentWillLoad(){r(this.el,(()=>{this.initialFetch()}))}async initialFetch(){try{this.loading=true;await this.getOrders()}catch(e){console.error(this.error);this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=false}}async fetchOrders(){try{this.busy=true;await this.getOrders()}catch(e){console.error(this.error);this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=false}}async getOrders(){if(!this.isCustomer){return}const e=await await i({path:a(`surecart/v1/orders/`,{expand:["checkout","checkout.line_items","checkout.charge"],...this.query}),parse:false});this.pagination={total:parseInt(e.headers.get("X-WP-Total")),total_pages:parseInt(e.headers.get("X-WP-TotalPages"))};this.orders=await e.json();return this.orders}nextPage(){this.query.page=this.query.page+1;this.fetchOrders()}prevPage(){this.query.page=this.query.page-1;this.fetchOrders()}renderStatusBadge(e){const{status:s,checkout:i}=e;const{charge:r}=i;if(r&&typeof r==="object"){if(r===null||r===void 0?void 0:r.fully_refunded){return t("sc-tag",{type:"danger"},wp.i18n.__("Refunded","surecart"))}if(r===null||r===void 0?void 0:r.refunded_amount){return t("sc-tag",{type:"info"},wp.i18n.__("Partially Refunded","surecart"))}}return t("sc-order-status-badge",{status:s})}renderLoading(){return t("sc-card",{noPadding:true},t("sc-stacked-list",null,t("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>t("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return t("div",null,t("sc-divider",{style:{"--spacing":"0"}}),t("slot",{name:"empty"},t("sc-empty",{icon:"shopping-bag"},wp.i18n.__("You don't have any orders.","surecart"))))}renderList(){return this.orders.map((e=>{var s,i;const{checkout:r,created_at_date:o,id:n}=e;if(!r)return null;const{line_items:d,amount_due:l,currency:c,charge:h}=r;return t("sc-stacked-list-row",{href:a(window.location.href,{action:"show",model:"order",id:n}),style:{"--columns":"4"},"mobile-size":500},t("div",{class:"order__date"},typeof h!=="string"&&((h===null||h===void 0?void 0:h.created_at_date)||o)),t("div",null,t("sc-text",{truncate:true,style:{"--color":"var(--sc-color-gray-500)"}},wp.i18n.sprintf(wp.i18n._n("%s item","%s items",((s=d===null||d===void 0?void 0:d.pagination)===null||s===void 0?void 0:s.count)||0,"surecart"),((i=d===null||d===void 0?void 0:d.pagination)===null||i===void 0?void 0:i.count)||0))),t("div",{class:"orders-list__status"},this.renderStatusBadge(e),t("sc-order-shipment-badge",{status:e===null||e===void 0?void 0:e.shipment_status})),t("div",null,t("sc-format-number",{type:"currency",currency:c,value:l})))}))}renderContent(){var e;if(this.loading){return this.renderLoading()}if(((e=this.orders)===null||e===void 0?void 0:e.length)===0){return this.renderEmpty()}return t("sc-card",{"no-padding":true},t("sc-stacked-list",null,this.renderList()))}render(){var e,s;return t("sc-dashboard-module",{key:"fd4c1303c73a0a23fdef5c52417ec5229d1c7362",class:"orders-list",error:this.error},t("span",{key:"54097fb18cc0e695647aff256966c7e0ed428884",slot:"heading"},t("slot",{key:"5b834ce675b49ea0f78a6a34f697c9e95138e605",name:"heading"},this.heading||wp.i18n.__("Order History","surecart"))),!!this.allLink&&!!((e=this.orders)===null||e===void 0?void 0:e.length)&&t("sc-button",{key:"b3dc1da3deab5e79f38955175d009698afffcbe3",type:"link",href:this.allLink,slot:"end","aria-label":wp.i18n.sprintf(wp.i18n.__("View all %s","surecart"),this.heading||wp.i18n.__("Order History","surecart"))},wp.i18n.__("View all","surecart"),t("sc-icon",{key:"04f728e7291ed1d8f76a567aeffb08d1f479f606","aria-hidden":"true",name:"chevron-right",slot:"suffix"})),this.renderContent(),!this.allLink&&t("sc-pagination",{key:"54deab6a17d534deb82f9dd5c4dd60358ad1ebde",page:this.query.page,perPage:this.query.per_page,total:this.pagination.total,totalPages:this.pagination.total_pages,totalShowing:(s=this===null||this===void 0?void 0:this.orders)===null||s===void 0?void 0:s.length,onScNextPage:()=>this.nextPage(),onScPrevPage:()=>this.prevPage()}),this.busy&&t("sc-block-ui",{key:"c7c57dbe43cb9bd8300e6f12a8fa85d9733a3677"}))}get el(){return s(this)}};d.style=n;export{d as sc_orders_list};
//# sourceMappingURL=p-e3e32f71.entry.js.map