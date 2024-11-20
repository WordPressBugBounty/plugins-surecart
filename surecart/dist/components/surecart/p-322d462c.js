import{c as o}from"./p-03631502.js";import{g as i}from"./p-e2d5dc4f.js";import{g as d,r as n}from"./p-d3366af3.js";import{s as l}from"./p-830ab1a3.js";import{t as v}from"./p-ec182234.js";import{m as u}from"./p-3f6362a4.js";import{a as t}from"./p-401e165e.js";import{s as e,o as r,v as c,c as s}from"./p-d7296e4c.js";import{g as a,a as w}from"./p-6ec14893.js";const m=(i,o)=>{try{return JSON.parse(i.getItem(o))}catch{return null}},f=i=>{let o=!1;return()=>{o||(o=!0,setTimeout((()=>{i(),o=!1}),0))}},p=(i,n,t,d=!1)=>{var e;const u=o(null!==(e=m(i,n))&&void 0!==e?e:t,((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),l=f((()=>i.setItem(n,JSON.stringify(u.state))));return l(),d&&window.addEventListener("storage",(()=>{const o=m(i,n);if(null!==o)for(const i in o)u.set(i,o[i])})),u.use({set:l,reset:l}),u},C=(i,o,n=!1)=>p(localStorage,i,o,n),{checkout:b}=i(),_="browser"!==(null==b?void 0:b.persist)||!!d(window.location.href,"no_cart"),h=_?o({live:{},test:{}}):C("surecart-local-storage",{live:{},test:{}},!0),{state:y,onChange:S,on:k,set:g,get:O,dispose:U}=h;window.scStore=h;const{checkout:D}=i(),{state:E,onChange:I,on:J,set:N,get:q,dispose:T,reset:j}=o({formId:null,groupId:null,mode:"live",locks:[],product:null,checkout:null,currencyCode:"usd",abandonedCheckoutEnabled:!0,initialLineItems:[],isCheckoutPage:!1,validateStock:!1,persist:"browser",paymentMethodRequiresShipping:!1,...D},((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),A=c(s);A.subscribe((i=>e.formState=i)),A.start(),r("formState",(()=>{const{formState:i}=e,{value:o}=i;void 0!==e.text.loading[o]&&l(e.text.loading[o],"assertive")}));const{send:P}=A,$=i=>P(i);var R;I("checkout",(i=>M(i,E.formId))),I("checkout",(i=>{(null==i?void 0:i.id)&&(E.mode=(null==i?void 0:i.live_mode)?"live":"test")})),r("formState",(({value:i})=>{var o,n,t,d;"draft"===i&&(null===(n=null===(o=E.checkout)||void 0===o?void 0:o.invoice)||void 0===n?void 0:n.status)&&"open"!==(null===(d=null===(t=E.checkout)||void 0===t?void 0:t.invoice)||void 0===d?void 0:d.status)&&$("LOCK")})),J("get",(i=>{if("checkout"===i){const i=K(E.formId,E.mode);(null==i?void 0:i.id)&&(E.checkout=i)}})),J("set",((i,o,n)=>{var t,d,e,u,r,c,v,s,p,m,_,y,f,h,g;if("checkout"!==i)return;if(!n||!o)return;if((null==o?void 0:o.total_amount)===(null==n?void 0:n.total_amount)&&(null==o?void 0:o.amount_due)===(null==n?void 0:n.total_amount))return;const b=a({amount:o.amount_due,currency:o.currency}),E=a({amount:o.total_amount,currency:o.currency}),C=(null===(d=null===(t=null==o?void 0:o.discount)||void 0===t?void 0:t.promotion)||void 0===d?void 0:d.code)!==(null===(u=null===(e=null==n?void 0:n.discount)||void 0===e?void 0:e.promotion)||void 0===u?void 0:u.code)&&(null===(c=null===(r=null==o?void 0:o.discount)||void 0===r?void 0:r.promotion)||void 0===c?void 0:c.code),k=[...(null===(s=null===(v=null==o?void 0:o.discount)||void 0===v?void 0:v.promotion)||void 0===s?void 0:s.code)===(null===(m=null===(p=null==n?void 0:n.discount)||void 0===p?void 0:p.promotion)||void 0===m?void 0:m.code)||(null===(y=null===(_=null==o?void 0:o.discount)||void 0===_?void 0:_.promotion)||void 0===y?void 0:y.code)?[]:[wp.i18n.__("Coupon code removed.","sc-coupon-form")],...C?[wp.i18n.sprintf(wp.i18n.__("Coupon code %1$s added. %2$s applied.","sc-coupon-form"),null===(h=null===(f=null==o?void 0:o.discount)||void 0===f?void 0:f.promotion)||void 0===h?void 0:h.code,w(null===(g=null==o?void 0:o.discount)||void 0===g?void 0:g.coupon))]:[],o.total_amount===o.amount_due?wp.i18n.sprintf(wp.i18n.__("Checkout updated. The amount due is %1$s.","surecart"),b):wp.i18n.sprintf(wp.i18n.__("Checkout updated. The total amount for the checkout is %1$s and the amount due is %1$s.","surecart"),E,b)];l(k.join(" "))}));const F=o((()=>({cart:{open:!1}})),((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),L=(i=null)=>{if(!i)return;const o=new CustomEvent("scToggleCart",{bubbles:!0});document.dispatchEvent(o)},{on:V}=F;V("set",((i,o)=>{"cart"===i&&((null==o?void 0:o.open)?l(wp.i18n.__("Cart Opened","surecart"),"assertive"):l(wp.i18n.__("Cart Closed","surecart"),"assertive"))})),window.sc={...(null===window||void 0===window?void 0:window.sc)||{},cart:{...(null===(R=null===window||void 0===window?void 0:window.sc)||void 0===R?void 0:R.cart)||{},toggle:L}},k("set",((i,o,n)=>Object.keys(o||{}).forEach((i=>x(o[i],null==n?void 0:n[i])))));const x=(i,o)=>{var n,t;const d=(null===(n=null==i?void 0:i.line_items)||void 0===n?void 0:n.data)||[],e=(null===(t=null==o?void 0:o.line_items)||void 0===t?void 0:t.data)||[];if(d.forEach((i=>{const o=e.find((o=>o.id===i.id));if(!o||(null==o?void 0:o.quantity)<(null==i?void 0:i.quantity)){const n=new CustomEvent("scAddedToCart",{detail:{...i,quantity:i.quantity-((null==o?void 0:o.quantity)||0)},bubbles:!0});document.dispatchEvent(n)}})),e.forEach((i=>{const o=d.find((o=>o.id===i.id));if(!o||(null==i?void 0:i.quantity)>(null==o?void 0:o.quantity)){const n=new CustomEvent("scRemovedFromCart",{detail:{...i,quantity:i.quantity-((null==o?void 0:o.quantity)||0)},bubbles:!0});document.dispatchEvent(n)}})),!(null==E?void 0:E.isCheckoutPage)&&JSON.stringify(d)!==JSON.stringify(e)){const n=new CustomEvent("scCartUpdated",{detail:{currentCart:i,previousCart:o},bubbles:!0});document.dispatchEvent(n)}};V("set",((i,o,n)=>{if("cart"===i&&(null==o?void 0:o.open)!==(null==n?void 0:n.open)&&(null==o?void 0:o.open)){const i=new CustomEvent("scViewedCart",{detail:E.checkout,bubbles:!0});document.dispatchEvent(i)}})),J("set",((i,o,n)=>{if("checkout"!==i)return;if(null==n?void 0:n.id)return;if(!(null==o?void 0:o.id))return;if(!E.isCheckoutPage)return;const t=new CustomEvent("scCheckoutInitiated",{detail:o,bubbles:!0});document.dispatchEvent(t)})),J("set",((i,o,n)=>{var t,d;if("checkout"!==i)return;if(!(null==o?void 0:o.status)||(null==n?void 0:n.status)===(null==o?void 0:o.status))return;if(!["paid","processing"].includes(o.status))return;const e=new CustomEvent("scOrderPaid",{detail:o,bubbles:!0});document.dispatchEvent(e);const u=new CustomEvent("scCheckoutCompleted",{detail:o,bubbles:!0});document.dispatchEvent(u);const l=((null===(t=null==o?void 0:o.line_items)||void 0===t?void 0:t.data)||[]).filter((i=>{var o;return(null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.trial_duration_days)>0}));if(l.length>0){const i=new CustomEvent("scTrialStarted",{detail:l,bubbles:!0});document.dispatchEvent(i)}const r=((null===(d=null==o?void 0:o.line_items)||void 0===d?void 0:d.data)||[]).filter((i=>{var o;return(null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.recurring_interval_count)>0}));if(r.length>0){const i=new CustomEvent("scSubscriptionStarted",{detail:r,bubbles:!0});document.dispatchEvent(i)}})),J("set",((i,o,n)=>{if("checkout"!==i)return;if(!E.isCheckoutPage)return;if(!(null==o?void 0:o.selected_shipping_choice))return;if((null==n?void 0:n.selected_shipping_choice)===(null==o?void 0:o.selected_shipping_choice))return;const t=new CustomEvent("scShippingInfoAdded",{detail:o,bubbles:!0});document.dispatchEvent(t)})),J("set",((i,o,n)=>{if("checkout"!==i)return;if(!E.isCheckoutPage)return;if(!(null==n?void 0:n.id))return;if(JSON.stringify(o)===JSON.stringify(n))return;const t=new CustomEvent("scCheckoutUpdated",{detail:{currentCheckout:o,previousCheckout:n},bubbles:!0});document.dispatchEvent(t)})),window.addEventListener("scAddedToCart",(i=>{var o,n,t,d,e,l,r,c,a,s,p,m;const _=i.detail;(null===(o=null==_?void 0:_.price)||void 0===o?void 0:o.product)&&v("add_to_cart",{currency:null===(n=_.price)||void 0===n?void 0:n.currency,value:u((null===(t=null==_?void 0:_.price)||void 0===t?void 0:t.amount)||0,(null===(d=_.price)||void 0===d?void 0:d.currency)||"USD"),items:[{item_id:null===(l=null===(e=_.price)||void 0===e?void 0:e.product)||void 0===l?void 0:l.id,item_name:null===(c=null===(r=_.price)||void 0===r?void 0:r.product)||void 0===c?void 0:c.name,item_variant:(_.variant_options||[]).join(" / "),price:u((null===(a=null==_?void 0:_.price)||void 0===a?void 0:a.amount)||0,(null===(s=_.price)||void 0===s?void 0:s.currency)||"USD"),currency:null===(p=_.price)||void 0===p?void 0:p.currency,quantity:_.quantity,discount:(null==_?void 0:_.discount_amount)?u((null==_?void 0:_.discount_amount)||0,(null===(m=_.price)||void 0===m?void 0:m.currency)||"USD"):0}]})})),window.addEventListener("scRemovedFromCart",(i=>{var o,n,t,d,e,l,r,c,a,s,p,m;const _=i.detail;(null===(o=null==_?void 0:_.price)||void 0===o?void 0:o.product)&&v("remove_from_cart",{currency:null===(n=_.price)||void 0===n?void 0:n.currency,value:u((null===(t=null==_?void 0:_.price)||void 0===t?void 0:t.amount)||0,(null===(d=_.price)||void 0===d?void 0:d.currency)||"USD"),items:[{item_id:null===(l=null===(e=_.price)||void 0===e?void 0:e.product)||void 0===l?void 0:l.id,item_name:null===(c=null===(r=_.price)||void 0===r?void 0:r.product)||void 0===c?void 0:c.name,item_variant:(_.variant_options||[]).join(" / "),price:u((null===(a=null==_?void 0:_.price)||void 0===a?void 0:a.amount)||0,(null===(s=_.price)||void 0===s?void 0:s.currency)||"USD"),currency:null===(p=_.price)||void 0===p?void 0:p.currency,quantity:_.quantity,discount:(null==_?void 0:_.discount_amount)?u((null==_?void 0:_.discount_amount)||0,(null===(m=_.price)||void 0===m?void 0:m.currency)||"USD"):0}]})})),window.addEventListener("scViewedCart",(i=>{var o;const n=i.detail;v("view_cart",{currency:n.currency,value:u(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,r,c,v;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name,currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?u(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:u(null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.amount,null===(c=i.price)||void 0===c?void 0:c.currency),quantity:i.quantity,...(null===(v=null==i?void 0:i.variant_options)||void 0===v?void 0:v.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scCheckoutInitiated",(i=>{var o;const n=i.detail;v("begin_checkout",{currency:n.currency,value:u(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,r,c,v;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name,currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?u(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:u(null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.amount,null===(c=i.price)||void 0===c?void 0:c.currency),quantity:i.quantity,...(null===(v=null==i?void 0:i.variant_options)||void 0===v?void 0:v.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scCheckoutCompleted",(i=>{var o;const n=i.detail;v("purchase",{transaction_id:null==n?void 0:n.id,value:u(null==n?void 0:n.total_amount,(null==n?void 0:n.currency)||"USD"),currency:(n.currency||"").toUpperCase(),items:((null===(o=null==n?void 0:n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,t,d,e,l,r,c,v;return{item_id:null===(t=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===t?void 0:t.id,currency:(n.currency||"").toUpperCase(),item_name:(null===(e=null===(d=null==i?void 0:i.price)||void 0===d?void 0:d.product)||void 0===e?void 0:e.name)||"",discount:(null==i?void 0:i.discount_amount)?u((null==i?void 0:i.discount_amount)||0,(null===(l=null==i?void 0:i.price)||void 0===l?void 0:l.currency)||"USD"):0,price:u((null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.amount)||0,(null===(c=null==i?void 0:i.price)||void 0===c?void 0:c.currency)||"USD"),quantity:(null==i?void 0:i.quantity)||1,...(null===(v=null==i?void 0:i.variant_options)||void 0===v?void 0:v.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scPaymentInfoAdded",(i=>{var o;const n=i.detail;v("add_payment_info",{currency:n.currency,value:u(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,r,c,v;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:(null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name)||"",currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?u(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:u(null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.amount,null===(c=i.price)||void 0===c?void 0:c.currency),quantity:i.quantity,...(null===(v=null==i?void 0:i.variant_options)||void 0===v?void 0:v.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scShippingInfoAdded",(i=>{var o,n,t,d,e,l,r,c;const a=i.detail,s=null===(n=null===(o=null==a?void 0:a.shipping_choices)||void 0===o?void 0:o.data)||void 0===n?void 0:n.find((i=>i.id===(null==a?void 0:a.selected_shipping_choice))),p=(null===(t=null==s?void 0:s.shipping_method)||void 0===t?void 0:t.name)||"";v("add_shipping_info",{currency:a.currency,value:u(a.total_amount,a.currency),...(null===(e=null===(d=null==a?void 0:a.discount)||void 0===d?void 0:d.promotion)||void 0===e?void 0:e.code)?{coupon:null===(r=null===(l=null==a?void 0:a.discount)||void 0===l?void 0:l.promotion)||void 0===r?void 0:r.code}:{},...p?{shipping_tier:p}:"",items:((null===(c=a.line_items)||void 0===c?void 0:c.data)||[]).map((i=>{var o,n,t,d,e,l,r,c,v;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:(null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name)||"",currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?u(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:u(null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.amount,null===(c=i.price)||void 0===c?void 0:c.currency),quantity:i.quantity,...(null===(v=null==i?void 0:i.variant_options)||void 0===v?void 0:v.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scAddedToCart",(function(i){var o,n,t,d,e,l,r,c;if(!(null===window||void 0===window?void 0:window.fbq))return;const v=i.detail;if(!(null===(o=null==v?void 0:v.price)||void 0===o?void 0:o.product))return;const a=null===(n=null==v?void 0:v.price)||void 0===n?void 0:n.product,s=(null===(d=null===(t=null==a?void 0:a.product_collections)||void 0===t?void 0:t.data)||void 0===d?void 0:d.map((i=>i.name)))||[];window.fbq("track","AddToCart",{...s.length?{content_category:s.join(", ")}:{},content_ids:[a.id],content_name:(null==a?void 0:a.name)+((null===(e=null==v?void 0:v.variant_options)||void 0===e?void 0:e.length)?` - ${null==v?void 0:v.variant_options.join(" / ")}`:""),content_type:"product",contents:[{id:a.id,quantity:v.quantity}],currency:null===(l=null==v?void 0:v.price)||void 0===l?void 0:l.currency,value:u((null===(r=null==v?void 0:v.price)||void 0===r?void 0:r.amount)||0,(null===(c=null==v?void 0:v.price)||void 0===c?void 0:c.currency)||"USD")})})),window.addEventListener("scCheckoutInitiated",(function(i){var o,n,t,d;if(!(null===window||void 0===window?void 0:window.fbq))return;const e=i.detail;window.fbq("track","InitiateCheckout",{content_ids:null===(o=(null==e?void 0:e.line_items.data)||[])||void 0===o?void 0:o.map((i=>i.id)),contents:null===(n=(null==e?void 0:e.line_items.data)||[])||void 0===n?void 0:n.map((i=>({id:i.id,quantity:i.quantity}))),currency:null==e?void 0:e.currency,num_items:(null===(d=null===(t=null==e?void 0:e.line_items)||void 0===t?void 0:t.data)||void 0===d?void 0:d.length)||0,value:u(null==e?void 0:e.total_amount,(null==e?void 0:e.currency)||"USD")})})),window.addEventListener("scCheckoutCompleted",(function(i){var o,n,t;if(!(null===window||void 0===window?void 0:window.fbq))return;const d=i.detail;window.fbq("track","Purchase",{content_ids:null===(o=null==d?void 0:d.items)||void 0===o?void 0:o.map((i=>i.item_id)),content_name:"Purchase",content_type:"product",contents:null===(n=null==d?void 0:d.items)||void 0===n?void 0:n.map((i=>({id:i.item_id,quantity:i.quantity}))),currency:null==d?void 0:d.currency,num_items:null===(t=null==d?void 0:d.items)||void 0===t?void 0:t.length,value:u(null==d?void 0:d.total_amount,(null==d?void 0:d.currency)||"USD")})})),window.addEventListener("scTrialStarted",(function(i){(null===window||void 0===window?void 0:window.fbq)&&i.detail.forEach((i=>{var o,n,t;window.fbq("track","StartTrial",{currency:null===(o=i.price)||void 0===o?void 0:o.currency,value:u((null===(n=i.price)||void 0===n?void 0:n.amount)||0,(null===(t=i.price)||void 0===t?void 0:t.currency)||"USD")})}))})),window.addEventListener("scSubscriptionStarted",(function(i){(null===window||void 0===window?void 0:window.fbq)&&i.detail.forEach((i=>{var o,n,t;window.fbq("track","Subscribe",{currency:null===(o=i.price)||void 0===o?void 0:o.currency,value:u((null===(n=i.price)||void 0===n?void 0:n.amount)||0,(null===(t=i.price)||void 0===t?void 0:t.currency)||"USD")})}))})),window.addEventListener("scPaymentInfoAdded",(function(i){if(!(null===window||void 0===window?void 0:window.fbq))return;const o=i.detail;window.fbq("track","AddPaymentInfo",{content_category:"Payment Info Added",currency:null==o?void 0:o.currency})}));const K=(i,o)=>{var n;return(null===(n=h.state[o])||void 0===n?void 0:n[i])||{}},M=(i,o)=>{const n=(null==i?void 0:i.live_mode)?"live":"test";h.set(n,{...h.state[n],[o]:i}),E.formId===o&&E.mode===n&&(E.checkout=i),"url"===E.persist&&(null==i?void 0:i.id)&&window.history.replaceState({},document.title,t(window.location.href,{checkout_id:null==i?void 0:i.id}));const d=new CustomEvent("scCheckoutUpdated",{detail:{checkout:E.checkout,formId:E.formId,mode:E.mode},bubbles:!0});document.dispatchEvent(d)},z=(i,o)=>{var t;const{[i]:d,...e}=h.state[o];window.history.replaceState({},document.title,n(window.location.href,"redirect_status","coupon","line_items","confirm_checkout_id","checkout_id")),h.set(o,e);const u=JSON.parse(localStorage.getItem("surecart-local-storage")||"{}");(null===(t=u[o])||void 0===t?void 0:t[i])&&(delete u[o][i],localStorage.setItem("surecart-local-storage",JSON.stringify(u))),j()};export{F as a,M as b,z as c,S as d,J as e,K as g,I as o,E as s,L as t,$ as u};