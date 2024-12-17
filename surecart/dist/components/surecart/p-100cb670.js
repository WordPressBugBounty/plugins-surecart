import{s as i}from"./p-021b5199.js";import{a as o}from"./p-9a298389.js";import{a as d}from"./p-401e165e.js";import{g as t}from"./p-d3366af3.js";const n="surecart/v1/checkouts/",a=["line_items","line_item.price","line_item.fees","line_item.variant","variant.image","price.product","product.product_medias","product.featured_product_media","product.product_collections","product_media.media","customer","customer.shipping_address","payment_intent","discount","discount.promotion","recommended_bumps","bump.price","current_upsell","product.variants","discount.coupon","shipping_address","billing_address","tax_identifier","manual_payment_method","shipping_choices","shipping_choice.shipping_method","invoice"],e=(d={})=>{var o,a,e,t,n,l,u;return{live_mode:"test"!==i.mode,group_key:i.groupId,abandoned_checkout_enabled:i.abandonedCheckoutEnabled,billing_matches_shipping:null===(o=i.checkout)||void 0===o?void 0:o.billing_matches_shipping,metadata:{...(null==d?void 0:d.metadata)||{},...(null===(a=null===window||void 0===window?void 0:window.scData)||void 0===a?void 0:a.page_id)&&{page_id:null===(e=null===window||void 0===window?void 0:window.scData)||void 0===e?void 0:e.page_id},...(null===(t=null==i?void 0:i.product)||void 0===t?void 0:t.id)&&{buy_page_product_id:null===(n=null==i?void 0:i.product)||void 0===n?void 0:n.id},page_url:window.location.href},...(null===(l=null==i?void 0:i.checkout)||void 0===l?void 0:l.email)&&{email:null===(u=null==i?void 0:i.checkout)||void 0===u?void 0:u.email},...d}},l=(d={})=>{var o,a,e,t;return{...!!(null==i?void 0:i.formId)&&{form_id:null==i?void 0:i.formId},...!!(null===(o=null==i?void 0:i.product)||void 0===o?void 0:o.id)&&{product_id:null===(a=null==i?void 0:i.product)||void 0===a?void 0:a.id},...!!(null===(t=null===(e=null==i?void 0:i.checkout)||void 0===e?void 0:e.invoice)||void 0===t?void 0:t.id)&&{type:"open_invoice"},...d}},u=()=>{var d,o;return t(window.location.href,"checkout_id")||((null===(d=null==i?void 0:i.checkout)||void 0===d?void 0:d.id)?null===(o=null==i?void 0:i.checkout)||void 0===o?void 0:o.id:null)},v=(i,o="")=>{let e=i?`${n}${i}`:n;return e=`${e}${o}`,d(e,{expand:a})},r=async({id:i,query:a={}})=>await o({path:d(v(i),l(a))}),s=async({id:i=null,data:a={},query:t={}})=>(i=i||u(),await o({method:i?"PATCH":"POST",path:d(v(i),l(t)),data:e(a)})),c=async({data:i={},query:a={}})=>await o({method:"POST",path:d(v(null),l(a)),data:e(i)}),p=async({id:i,data:a={},query:t={}})=>await o({method:"PATCH",path:d(v(i),l(t)),data:e(a)}),m=async({id:i,data:a={},query:t={},processor:n})=>await o({method:"POST",path:d(v(i,"/finalize"),l({...(null==n?void 0:n.manual)?{manual_payment:!0,manual_payment_method_id:null==n?void 0:n.id}:{processor_type:null==n?void 0:n.id},...t})),data:e(a)}),_=async({checkout:i,data:e,live_mode:t=!1})=>{var n;const l=((null===(n=null==i?void 0:i.line_items)||void 0===n?void 0:n.data)||[]).find((i=>{var d;return(null===(d=null==i?void 0:i.variant)||void 0===d?void 0:d.id)?i.variant.id===e.variant&&i.price.id===e.price:i.price.id===e.price}));if(!(null==i?void 0:i.id))return await o({method:"POST",path:d(v(null)),data:{line_items:[e],live_mode:t}});if(l)return await w({id:null==l?void 0:l.id,data:{...e,quantity:(null==l?void 0:l.quantity)+(null==e?void 0:e.quantity)}});const u=await o({path:d(`surecart/v1/line_items/${(null==l?void 0:l.id)?null==l?void 0:l.id:""}`,{consolidate:!0,expand:[...(a||[]).map((i=>i.includes(".")?i:`checkout.${i}`)),"checkout"]}),method:"POST",data:{...e,checkout:i.id}});return null==u?void 0:u.checkout},h=async({checkoutId:i,itemId:d})=>{const{deleted:a}=await o({path:`surecart/v1/line_items/${d}`,method:"DELETE"});if(!a)throw{code:"error",message:wp.i18n.__("Failed to delete","surecart")};return await r({id:i})},w=async({id:i,data:e})=>{const t=await o({path:d(`surecart/v1/line_items/${i}`,{expand:[...(a||[]).map((i=>i.includes(".")?i:`checkout.${i}`)),"checkout"]}),method:"PATCH",data:e});return null==t?void 0:t.checkout};export{_ as a,n as b,s as c,p as d,a as e,m as f,r as g,c as h,h as r,w as u};