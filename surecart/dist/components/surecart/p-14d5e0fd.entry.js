import{r as t,h as i,H as r}from"./p-e97fde0a.js";import{s as o,g as e}from"./p-7f01a36e.js";import{a as c}from"./p-0b0c03f7.js";const d=":host{display:block;line-height:1}";const a=d;const s=class{constructor(i){t(this,i);this.prices=undefined;this.minPrice=undefined;this.maxPrice=undefined}handlePricesChange(){let t,i;(this.prices||[]).filter((t=>!(t===null||t===void 0?void 0:t.archived))).forEach((r=>{if(!i||r.amount>i.amount){i=r}if(!t||r.amount<t.amount){t=r}}));this.minPrice=t;this.maxPrice=i}componentWillLoad(){this.handlePricesChange()}render(){if(!this.maxPrice||!this.minPrice){return i(r,null)}return i(r,null,this.maxPrice.amount==this.minPrice.amount?i("span",null,i("sc-format-number",{type:"currency",currency:this.maxPrice.currency,value:this.maxPrice.amount})):i("span",null,i("sc-visually-hidden",null,wp.i18n.__("Price range from","surecart")," "),i("sc-format-number",{type:"currency",currency:this.minPrice.currency,value:this.minPrice.amount}),i("span",{"aria-hidden":true}," — "),i("sc-visually-hidden",null,wp.i18n.__("to","surecart")),i("sc-format-number",{type:"currency",currency:this.maxPrice.currency,value:this.maxPrice.amount})))}static get watchers(){return{prices:["handlePricesChange"]}}};s.style=a;const n=":host{border-style:none}.product-img{max-width:100%;aspect-ratio:var(--sc-product-image-aspect-ratio);padding-top:var(--sc-product-image-padding-top, 0);padding-bottom:var(--sc-product-image-padding-bottom, 0);padding-left:var(--sc-product-image-padding-left, 0);padding-right:var(--sc-product-image-padding-right, 0);margin-top:var(--sc-product-image-margin-top, 0);margin-bottom:var(--sc-product-image-margin-bottom, 0);margin-left:var(--sc-product-image-margin-left, 0);margin-right:var(--sc-product-image-margin-right, 0);border:solid var(--sc-product-image-border-width) var(--sc-product-image-border-color);border-radius:var(--sc-product-image-border-radius);overflow:hidden}.product-img>img{width:100%;height:100%;box-sizing:border-box;object-fit:contain;display:block;transition:transform var(--sc-transition-medium) ease}.product-img.is_covered>img{object-fit:cover}.product-img.is_contained>img{object-fit:contain}.product-img_placeholder{width:100%;height:100%;background-color:var(--sc-color-gray-300)}.product-img:hover img{transform:scale(1.05)}";const l=n;const u=class{constructor(i){t(this,i);this.product=undefined;this.sizing=undefined}getSrc(){var t,i,r,e,d,a,s,n,l,u,p;if((i=(t=this.product)===null||t===void 0?void 0:t.featured_product_media)===null||i===void 0?void 0:i.url){return(e=(r=this.product)===null||r===void 0?void 0:r.featured_product_media)===null||e===void 0?void 0:e.url}if((s=(a=(d=this.product)===null||d===void 0?void 0:d.featured_product_media)===null||a===void 0?void 0:a.media)===null||s===void 0?void 0:s.url){return o((u=(l=(n=this.product)===null||n===void 0?void 0:n.featured_product_media)===null||l===void 0?void 0:l.media)===null||u===void 0?void 0:u.url,c("surecart/product-list/media/size",900))}return`${(p=window.scData)===null||p===void 0?void 0:p.plugin_url}/images/placeholder.jpg`}render(){const{alt:t,title:o}=e(this.product);return i(r,{key:"b6924a849e91f15ea37f7c3d1fc261e94aff9d21",style:{borderStyle:"none"}},i("div",{key:"414a12ccbcaa6f07c14e2ab623091ffd83c14409",class:{"product-img":true,is_contained:this.sizing==="contain",is_covered:this.sizing==="cover"}},!!this.getSrc()?i("img",{src:this.getSrc(),alt:t,...o?{title:o}:{}}):i("div",{class:"product-img_placeholder"})))}};u.style=l;const p=":host{display:block;line-height:1}.product-price{padding-top:var(--sc-product-price-padding-top, 0);padding-bottom:var(--sc-product-price-padding-bottom, 0);padding-left:var(--sc-product-price-padding-left, 0);padding-right:var(--sc-product-price-padding-right, 0);margin-top:var(--sc-product-price-margin-top, 0);margin-bottom:var(--sc-product-price-margin-bottom, 0);margin-left:var(--sc-product-price-margin-left, 0);margin-right:var(--sc-product-price-margin-right, 0);text-align:var(--sc-product-price-align);font-size:var(--sc-product-price-font-size);font-weight:var(--sc-product-price-font-weight);color:var(--sc-product-price-text-color)}";const v=p;const g=class{constructor(i){t(this,i);this.prices=undefined;this.range=true;this.metrics=undefined}componentWillLoad(){var t,i,r,o,e,c;if(this.range&&((t=this.metrics)===null||t===void 0?void 0:t.min_price_amount)!==((i=this.metrics)===null||i===void 0?void 0:i.max_price_amount)){this.prices=[{amount:(r=this.metrics)===null||r===void 0?void 0:r.min_price_amount,currency:(o=this.metrics)===null||o===void 0?void 0:o.currency},{amount:(e=this.metrics)===null||e===void 0?void 0:e.max_price_amount,currency:(c=this.metrics)===null||c===void 0?void 0:c.currency}]}}render(){var t;const r=(this.prices||[]).sort(((t,i)=>(t===null||t===void 0?void 0:t.position)-(i===null||i===void 0?void 0:i.position))).find((t=>!(t===null||t===void 0?void 0:t.archived)));return i("div",{key:"ddea884259bc9c7bd9f371214e1f56510ef0214f",class:"product-price",part:"base"},!this.range&&((t=this.prices)===null||t===void 0?void 0:t.length)?i("sc-format-number",{type:"currency",currency:(r===null||r===void 0?void 0:r.currency)||"usd",value:r===null||r===void 0?void 0:r.amount}):i("sc-price-range",{prices:this.prices}))}};g.style=v;const h=".product-item-title{padding-top:var(--sc-product-title-padding-top, 0);padding-bottom:var(--sc-product-title-padding-bottom, 0);margin-top:var(--sc-product-title-margin-top, 0);margin-bottom:var(--sc-product-title-margin-bottom, 0);font-size:var(--sc-product-title-font-size);text-align:var(--sc-product-title-align);font-weight:var(--sc-product-title-font-weight);color:var(--sc-product-title-text-color);line-height:1.2}";const m=h;const f=class{constructor(i){t(this,i)}render(){return i(r,{key:"6bdd56813383263c5b4dae214f42471ebedc450e"},i("div",{key:"cc77ce95aeb65dff5887521e0af1327dd17c9d2e",class:{"product-item-title":true}},i("slot",{key:"bcfb74c6e9f19cba4ce8285a4a87cc65093e41c3"})))}};f.style=m;export{s as sc_price_range,u as sc_product_item_image,g as sc_product_item_price,f as sc_product_item_title};
//# sourceMappingURL=p-14d5e0fd.entry.js.map