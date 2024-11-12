import{r as e,h as t,F as i,a as s}from"./p-e97fde0a.js";import{a}from"./p-9a298389.js";import{o}from"./p-b719a497.js";import{a as r}from"./p-401e165e.js";import"./p-d3366af3.js";const n=":host{display:block}.orders-list{display:grid;gap:0.75em}.orders-list__heading{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between}.orders-list__title{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense)}.orders-list a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.order__row{color:var(--sc-color-gray-800);text-decoration:none;display:grid;align-items:center;justify-content:space-between;gap:0;grid-template-columns:1fr 1fr 1fr auto;margin:0;padding:var(--sc-spacing-small) var(--sc-spacing-large)}.order__row:not(:last-child){border-bottom:1px solid var(--sc-color-gray-200)}.order__row:hover{background:var(--sc-color-gray-50)}.order__date{font-weight:var(--sc-font-weight-semibold)}";const l=n;const d=class{constructor(t){e(this,t);this.query={page:1,per_page:10};this.allLink=undefined;this.heading=undefined;this.isCustomer=undefined;this.invoices=[];this.loading=undefined;this.busy=undefined;this.error=undefined;this.pagination={total:0,total_pages:0}}componentWillLoad(){o(this.el,(()=>{this.initialFetch()}))}async initialFetch(){try{this.loading=true;await this.getInvoices()}catch(e){console.error(this.error);this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=false}}async fetchInvoices(){try{this.busy=true;await this.getInvoices()}catch(e){console.error(this.error);this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=false}}async getInvoices(){if(!this.isCustomer){return}const e=await await a({path:r(`surecart/v1/invoices/`,{expand:["checkout"],...this.query}),parse:false});this.pagination={total:parseInt(e.headers.get("X-WP-Total")),total_pages:parseInt(e.headers.get("X-WP-TotalPages"))};this.invoices=await e.json();return this.invoices}nextPage(){this.query.page=this.query.page+1;this.fetchInvoices()}prevPage(){this.query.page=this.query.page-1;this.fetchInvoices()}renderLoading(){return t("sc-card",{noPadding:true},t("sc-stacked-list",null,t("sc-stacked-list-row",{style:{"--columns":"4"},"mobile-size":500},[...Array(4)].map((()=>t("sc-skeleton",{style:{width:"100px",display:"inline-block"}}))))))}renderEmpty(){return t("div",null,t("sc-divider",{style:{"--spacing":"0"}}),t("slot",{name:"empty"},t("sc-empty",{icon:"shopping-bag"},wp.i18n.__("You don't have any invoices.","surecart"))))}getInvoiceRedirectUrl(e){var t,i,s;if(e.status==="open"){return`${window.scData.pages.checkout}?checkout_id=${(t=e===null||e===void 0?void 0:e.checkout)===null||t===void 0?void 0:t.id}`}return r(window.location.href,{action:"show",model:"order",id:(s=(i=e===null||e===void 0?void 0:e.checkout)===null||i===void 0?void 0:i.order)===null||s===void 0?void 0:s.id})}renderList(){return this.invoices.map((e=>{const{checkout:s}=e;if(!s)return null;const{amount_due:a,currency:o}=s;return t("sc-stacked-list-row",{href:this.getInvoiceRedirectUrl(e),style:{"--columns":"4"},"mobile-size":500},t("div",null,"#",e===null||e===void 0?void 0:e.order_number),t("div",null,(e===null||e===void 0?void 0:e.due_date)?t(i,null,wp.i18n.__("Due on","surecart")," ",t("sc-format-date",{class:"invoice__date",date:(e===null||e===void 0?void 0:e.due_date)*1e3,month:"short",day:"numeric",year:"numeric"})):"—"),t("div",{class:"invoices-list__status"},t("sc-invoice-status-badge",{status:e===null||e===void 0?void 0:e.status})),t("div",null,t("sc-format-number",{type:"currency",currency:o,value:a})))}))}renderContent(){var e;if(this.loading){return this.renderLoading()}if(((e=this.invoices)===null||e===void 0?void 0:e.length)===0){return this.renderEmpty()}return t("sc-card",{"no-padding":true},t("sc-stacked-list",null,this.renderList()))}render(){var e,i;return t("sc-dashboard-module",{key:"5992864f8144798dea426aeed406d33c0d6a1504",class:"invoices-list",error:this.error},t("span",{key:"1256c1ff549e7de7af1b7c8de5ea33eaeb2fbfbd",slot:"heading"},t("slot",{key:"180d32a25df5e4f8fb3e1da36fc724244a88ee47",name:"heading"},this.heading||wp.i18n.__("Invoices","surecart"))),!!this.allLink&&!!((e=this.invoices)===null||e===void 0?void 0:e.length)&&t("sc-button",{key:"7f58aac442ddaf2b6a1bcd36332198bfb4f9abd9",type:"link",href:this.allLink,slot:"end","aria-label":wp.i18n.sprintf(wp.i18n.__("View all %s","surecart"),this.heading||wp.i18n.__("Invoices","surecart"))},wp.i18n.__("View all","surecart"),t("sc-icon",{key:"337a05133a481b09519345e137091fc2fc678acf","aria-hidden":"true",name:"chevron-right",slot:"suffix"})),this.renderContent(),!this.allLink&&t("sc-pagination",{key:"493a39f3f8f07b746571d0f09d780ba090b654dc",page:this.query.page,perPage:this.query.per_page,total:this.pagination.total,totalPages:this.pagination.total_pages,totalShowing:(i=this===null||this===void 0?void 0:this.invoices)===null||i===void 0?void 0:i.length,onScNextPage:()=>this.nextPage(),onScPrevPage:()=>this.prevPage()}),this.busy&&t("sc-block-ui",{key:"7186dcaf461e1f5e442f231f70141009d630ad28"}))}get el(){return s(this)}};d.style=l;export{d as sc_invoices_list};
//# sourceMappingURL=p-39106bb0.entry.js.map