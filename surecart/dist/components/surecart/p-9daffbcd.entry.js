import{r as e,h as t,F as i,a as o}from"./p-e97fde0a.js";import{a as s}from"./p-6135d661.js";import{e as a,b as d}from"./p-123bd51b.js";import{a as r,g as n,b as c,s as l,u as p,c as u}from"./p-f3141d53.js";import{c as h}from"./p-1f60f497.js";import{f}from"./p-ff10bfbf.js";import{a as v}from"./p-401e165e.js";import"./p-d3366af3.js";import"./p-03631502.js";import"./p-9dbc54d6.js";import"./p-830ab1a3.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-95325ec5.js";import"./p-6ec14893.js";const b=":host{--sc-drawer-header-spacing:var(--sc-spacing-large);--sc-drawer-body-spacing:var(--sc-spacing-large);--sc-drawer-footer-spacing:var(--sc-spacing-large)}.cart{font-size:16px}.cart__header{display:flex;align-items:center;justify-content:space-between;width:100%;font-size:1em}.cart__close{opacity:0.75;transition:opacity 0.25s ease;cursor:pointer}.cart__close:hover{opacity:1}::slotted(*){padding:var(--sc-drawer-header-spacing);background:var(--sc-panel-background-color);position:relative}::slotted(sc-line-items){flex:1 1 auto;overflow:auto;-webkit-overflow-scrolling:touch;min-height:200px}::slotted(:last-child){border-bottom:0 !important}sc-drawer::part(body){display:flex;flex-direction:column;box-sizing:border-box;padding:0;overflow:hidden}";const m=b;const g=class{constructor(t){e(this,t);this.open=null;this.formId=undefined;this.header=undefined;this.checkoutLink=undefined;this.cartTemplate=undefined;this.mode="live";this.checkoutUrl=undefined;this.alwaysShow=undefined;this.floatingIconEnabled=true;this.uiState="idle"}handleOpenChange(){var e,t,i;r.set("cart",{...r.state.cart,...{open:this.open}});if(this.open===true){this.fetchOrder()}else{(i=(t=(e=document===null||document===void 0?void 0:document.querySelector("sc-cart-icon"))===null||e===void 0?void 0:e.shadowRoot)===null||t===void 0?void 0:t.querySelector(".cart"))===null||i===void 0?void 0:i.focus()}}order(){return n(this.formId,this.mode)}setCheckout(e){c(e,this.formId)}pageHasForm(){return!!document.querySelector("sc-checkout")}getItemsCount(){var e,t;const i=(t=(e=l.checkout)===null||e===void 0?void 0:e.line_items)===null||t===void 0?void 0:t.data;let o=0;(i||[]).forEach((e=>{o=o+(e===null||e===void 0?void 0:e.quantity)}));return o}handleSetState(e){this.uiState=e.detail}handleCloseCart(){this.open=false}async fetchOrder(){var e,t;if(!((e=l.checkout)===null||e===void 0?void 0:e.id)){return}try{p("FETCH");l.checkout=await s({method:"GET",path:v(`${d}${(t=l.checkout)===null||t===void 0?void 0:t.id}`,{expand:a})});p("RESOLVE")}catch(e){console.error(e);p("REJECT");h(e);if((e===null||e===void 0?void 0:e.code)==="checkout.not_found"){u(this.formId,this.mode)}}}componentWillLoad(){this.open=!!r.state.cart.open;r.onChange("cart",(e=>{this.open=e.open}))}state(){var e,t,i,o,s,a,d,r,n,c,p;return{uiState:this.uiState,checkoutLink:this.checkoutLink,loading:this.uiState==="loading",busy:this.uiState==="busy",navigating:this.uiState==="navigating",empty:!((i=(t=(e=l.checkout)===null||e===void 0?void 0:e.line_items)===null||t===void 0?void 0:t.pagination)===null||i===void 0?void 0:i.count),order:l.checkout,lineItems:((s=(o=l.checkout)===null||o===void 0?void 0:o.line_items)===null||s===void 0?void 0:s.data)||[],tax_status:(a=l.checkout)===null||a===void 0?void 0:a.tax_status,customerShippingAddress:typeof((d=l.checkout)===null||d===void 0?void 0:d.customer)!=="string"?(n=(r=l.checkout)===null||r===void 0?void 0:r.customer)===null||n===void 0?void 0:n.shipping_address:{},shippingAddress:(c=l.checkout)===null||c===void 0?void 0:c.shipping_address,taxStatus:(p=l.checkout)===null||p===void 0?void 0:p.tax_status,formId:this.formId}}render(){return t("sc-cart-session-provider",{key:"560c163d6734b8e3523aa3ef694402087bb8d925"},t("sc-drawer",{key:"afef03ec7696549111ea08d98f082b16a12bd089",open:this.open,onScAfterShow:()=>this.open=true,onScAfterHide:()=>{this.open=false}},this.open===true&&t(i,{key:"587340601c82b370c27c1eb24ee656a376703e27"},t("div",{key:"c97b85fc5346f04a8c6c1f9620ed5fb5da93ad52",class:"cart__header-suffix",slot:"header"},t("slot",{key:"90c42dc0deca0417a7c2c0e34dcb98ea61bf9b09",name:"cart-header"}),t("sc-error",{key:"2dfa19f7e78f4203b0e0bd84c33dc23406e5f052",style:{"--sc-alert-border-radius":"0"},slot:"header"})),t("slot",{key:"7eeb0334a95f5d87bba56813e38cb76017ea09c1"})),f()&&t("sc-block-ui",{key:"006485d36e0db4fe8d635b56250df23aae6a9056","z-index":9})))}get el(){return o(this)}static get watchers(){return{open:["handleOpenChange"]}}};g.style=m;export{g as sc_cart};
//# sourceMappingURL=p-9daffbcd.entry.js.map