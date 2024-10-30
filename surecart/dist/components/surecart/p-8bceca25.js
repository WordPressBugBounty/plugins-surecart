import{c as o}from"./p-25433d0f.js";import{g as i}from"./p-f70181c4.js";import{g as d}from"./p-4d73f82a.js";import{s as n}from"./p-830ab1a3.js";import{t as l}from"./p-a3a138d6.js";import{m as v}from"./p-7ef0f71c.js";import{g as u,b as t,a as e}from"./p-1c2e2695.js";import{s as r,o as c,v as s,c as a}from"./p-7c2e44b1.js";import{g as m,a as w}from"./p-50da3ba3.js";function f(i){const o=i.indexOf("?");if(-1===o)return i;const n=u(i),d=i.substr(0,o);for(var e=arguments.length,l=new Array(e>1?e-1:0),r=1;r<e;r++)l[r-1]=arguments[r];l.forEach((i=>delete n[i]));const c=t(n);return c?d+"?"+c:d}const p=(i,o)=>{try{return JSON.parse(i.getItem(o))}catch{return null}},_=i=>{let o=!1;return()=>{o||(o=!0,setTimeout((()=>{i(),o=!1}),0))}},b=(i,n,t,d=!1)=>{var e;const l=o(null!==(e=p(i,n))&&void 0!==e?e:t,((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),u=_((()=>i.setItem(n,JSON.stringify(l.state))));return u(),d&&window.addEventListener("storage",(()=>{const o=p(i,n);if(null!==o)for(const i in o)l.set(i,o[i])})),l.use({set:u,reset:u}),l},C=(i,o,n=!1)=>b(localStorage,i,o,n),{checkout:y}=i(),h="browser"!==(null==y?void 0:y.persist)||!!d(window.location.href,"no_cart"),S=h?o({live:{},test:{}}):C("surecart-local-storage",{live:{},test:{}},!0),{state:k,onChange:g,on:O,set:U,get:D,dispose:q}=S;window.scStore=S;const{checkout:I}=i(),{state:E,onChange:J,on:N,set:A,get:j,dispose:T,reset:P}=o({formId:null,groupId:null,mode:"live",locks:[],product:null,checkout:null,currencyCode:"usd",abandonedCheckoutEnabled:!0,initialLineItems:[],isCheckoutPage:!1,validateStock:!1,persist:"browser",paymentMethodRequiresShipping:!1,...I},((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),$=s(a);$.subscribe((i=>r.formState=i)),$.start(),c("formState",(()=>{const{formState:i}=r,{value:o}=i;void 0!==r.text.loading[o]&&n(r.text.loading[o],"assertive")}));const{send:R}=$,F=i=>R(i);J("checkout",(i=>B(i,E.formId))),J("checkout",(i=>{E.mode=(null==i?void 0:i.live_mode)?"live":"test"})),c("formState",(({value:i})=>{var o,n,t,d;"draft"===i&&(null===(n=null===(o=E.checkout)||void 0===o?void 0:o.invoice)||void 0===n?void 0:n.status)&&"open"!==(null===(d=null===(t=E.checkout)||void 0===t?void 0:t.invoice)||void 0===d?void 0:d.status)&&F("LOCK")})),N("get",(i=>{if("checkout"===i){const i=z(E.formId,E.mode);(null==i?void 0:i.id)&&(E.checkout=i)}})),N("set",((i,o,t)=>{var d,e,l,u,r,c,v,a,s,p,_,y,f,h,b;if("checkout"!==i)return;if(!t||!o)return;if((null==o?void 0:o.total_amount)===(null==t?void 0:t.total_amount)&&(null==o?void 0:o.amount_due)===(null==t?void 0:t.total_amount))return;const g=m({amount:o.amount_due,currency:o.currency}),E=m({amount:o.total_amount,currency:o.currency}),C=(null===(e=null===(d=null==o?void 0:o.discount)||void 0===d?void 0:d.promotion)||void 0===e?void 0:e.code)!==(null===(u=null===(l=null==t?void 0:t.discount)||void 0===l?void 0:l.promotion)||void 0===u?void 0:u.code)&&(null===(c=null===(r=null==o?void 0:o.discount)||void 0===r?void 0:r.promotion)||void 0===c?void 0:c.code),S=[...(null===(a=null===(v=null==o?void 0:o.discount)||void 0===v?void 0:v.promotion)||void 0===a?void 0:a.code)===(null===(p=null===(s=null==t?void 0:t.discount)||void 0===s?void 0:s.promotion)||void 0===p?void 0:p.code)||(null===(y=null===(_=null==o?void 0:o.discount)||void 0===_?void 0:_.promotion)||void 0===y?void 0:y.code)?[]:[wp.i18n.__("Coupon code removed.","sc-coupon-form")],...C?[wp.i18n.sprintf(wp.i18n.__("Coupon code %1$s added. %2$s applied.","sc-coupon-form"),null===(h=null===(f=null==o?void 0:o.discount)||void 0===f?void 0:f.promotion)||void 0===h?void 0:h.code,w(null===(b=null==o?void 0:o.discount)||void 0===b?void 0:b.coupon))]:[],o.total_amount===o.amount_due?wp.i18n.sprintf(wp.i18n.__("Checkout updated. The amount due is %1$s.","surecart"),g):wp.i18n.sprintf(wp.i18n.__("Checkout updated. The total amount for the checkout is %1$s and the amount due is %1$s.","surecart"),E,g)];n(S.join(" "))}));const L=o((()=>({cart:{open:!1}})),((i,o)=>JSON.stringify(i)!==JSON.stringify(o))),{state:V}=L,x=(i=null)=>L.set("cart",{...V.cart,open:null!==i?i:!V.cart.open}),{on:K}=L;K("set",((i,o)=>{"cart"===i&&((null==o?void 0:o.open)?n(wp.i18n.__("Cart Opened","surecart"),"assertive"):n(wp.i18n.__("Cart Closed","surecart"),"assertive"))})),O("set",((i,o,n)=>Object.keys(o||{}).forEach((i=>M(o[i],null==n?void 0:n[i])))));const M=(i,o)=>{var n,t;const d=(null===(n=null==i?void 0:i.line_items)||void 0===n?void 0:n.data)||[],e=(null===(t=null==o?void 0:o.line_items)||void 0===t?void 0:t.data)||[];if(d.forEach((i=>{const o=e.find((o=>o.id===i.id));if(!o||(null==o?void 0:o.quantity)<(null==i?void 0:i.quantity)){const n=new CustomEvent("scAddedToCart",{detail:{...i,quantity:i.quantity-((null==o?void 0:o.quantity)||0)},bubbles:!0});document.dispatchEvent(n)}})),e.forEach((i=>{const o=d.find((o=>o.id===i.id));if(!o||(null==i?void 0:i.quantity)>(null==o?void 0:o.quantity)){const n=new CustomEvent("scRemovedFromCart",{detail:{...i,quantity:i.quantity-((null==o?void 0:o.quantity)||0)},bubbles:!0});document.dispatchEvent(n)}})),!(null==E?void 0:E.isCheckoutPage)&&JSON.stringify(d)!==JSON.stringify(e)){const n=new CustomEvent("scCartUpdated",{detail:{currentCart:i,previousCart:o},bubbles:!0});document.dispatchEvent(n)}};K("set",((i,o,n)=>{if("cart"===i&&(null==o?void 0:o.open)!==(null==n?void 0:n.open)&&(null==o?void 0:o.open)){const i=new CustomEvent("scViewedCart",{detail:E.checkout,bubbles:!0});document.dispatchEvent(i)}})),N("set",((i,o,n)=>{if("checkout"!==i)return;if(null==n?void 0:n.id)return;if(!(null==o?void 0:o.id))return;if(!E.isCheckoutPage)return;const t=new CustomEvent("scCheckoutInitiated",{detail:o,bubbles:!0});document.dispatchEvent(t)})),N("set",((i,o,n)=>{var t,d;if("checkout"!==i)return;if(!(null==o?void 0:o.status)||(null==n?void 0:n.status)===(null==o?void 0:o.status))return;if(!["paid","processing"].includes(o.status))return;const e=new CustomEvent("scOrderPaid",{detail:o,bubbles:!0});document.dispatchEvent(e);const l=new CustomEvent("scCheckoutCompleted",{detail:o,bubbles:!0});document.dispatchEvent(l);const u=((null===(t=null==o?void 0:o.line_items)||void 0===t?void 0:t.data)||[]).filter((i=>{var o;return(null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.trial_duration_days)>0}));if(u.length>0){const i=new CustomEvent("scTrialStarted",{detail:u,bubbles:!0});document.dispatchEvent(i)}const r=((null===(d=null==o?void 0:o.line_items)||void 0===d?void 0:d.data)||[]).filter((i=>{var o;return(null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.recurring_interval_count)>0}));if(r.length>0){const i=new CustomEvent("scSubscriptionStarted",{detail:r,bubbles:!0});document.dispatchEvent(i)}})),N("set",((i,o,n)=>{if("checkout"!==i)return;if(!E.isCheckoutPage)return;if(!(null==o?void 0:o.selected_shipping_choice))return;if((null==n?void 0:n.selected_shipping_choice)===(null==o?void 0:o.selected_shipping_choice))return;const t=new CustomEvent("scShippingInfoAdded",{detail:o,bubbles:!0});document.dispatchEvent(t)})),N("set",((i,o,n)=>{if("checkout"!==i)return;if(!E.isCheckoutPage)return;if(!(null==n?void 0:n.id))return;if(JSON.stringify(o)===JSON.stringify(n))return;const t=new CustomEvent("scCheckoutUpdated",{detail:{currentCheckout:o,previousCheckout:n},bubbles:!0});document.dispatchEvent(t)})),window.addEventListener("scAddedToCart",(i=>{var o,n,t,d,e,u,r,c,a,s,p,m;const _=i.detail;(null===(o=null==_?void 0:_.price)||void 0===o?void 0:o.product)&&l("add_to_cart",{currency:null===(n=_.price)||void 0===n?void 0:n.currency,value:v((null===(t=null==_?void 0:_.price)||void 0===t?void 0:t.amount)||0,(null===(d=_.price)||void 0===d?void 0:d.currency)||"USD"),items:[{item_id:null===(u=null===(e=_.price)||void 0===e?void 0:e.product)||void 0===u?void 0:u.id,item_name:null===(c=null===(r=_.price)||void 0===r?void 0:r.product)||void 0===c?void 0:c.name,item_variant:(_.variant_options||[]).join(" / "),price:v((null===(a=null==_?void 0:_.price)||void 0===a?void 0:a.amount)||0,(null===(s=_.price)||void 0===s?void 0:s.currency)||"USD"),currency:null===(p=_.price)||void 0===p?void 0:p.currency,quantity:_.quantity,discount:(null==_?void 0:_.discount_amount)?v((null==_?void 0:_.discount_amount)||0,(null===(m=_.price)||void 0===m?void 0:m.currency)||"USD"):0}]})})),window.addEventListener("scRemovedFromCart",(i=>{var o,n,t,d,e,u,r,c,a,s,p,m;const _=i.detail;(null===(o=null==_?void 0:_.price)||void 0===o?void 0:o.product)&&l("remove_from_cart",{currency:null===(n=_.price)||void 0===n?void 0:n.currency,value:v((null===(t=null==_?void 0:_.price)||void 0===t?void 0:t.amount)||0,(null===(d=_.price)||void 0===d?void 0:d.currency)||"USD"),items:[{item_id:null===(u=null===(e=_.price)||void 0===e?void 0:e.product)||void 0===u?void 0:u.id,item_name:null===(c=null===(r=_.price)||void 0===r?void 0:r.product)||void 0===c?void 0:c.name,item_variant:(_.variant_options||[]).join(" / "),price:v((null===(a=null==_?void 0:_.price)||void 0===a?void 0:a.amount)||0,(null===(s=_.price)||void 0===s?void 0:s.currency)||"USD"),currency:null===(p=_.price)||void 0===p?void 0:p.currency,quantity:_.quantity,discount:(null==_?void 0:_.discount_amount)?v((null==_?void 0:_.discount_amount)||0,(null===(m=_.price)||void 0===m?void 0:m.currency)||"USD"):0}]})})),window.addEventListener("scViewedCart",(i=>{var o;const n=i.detail;l("view_cart",{currency:n.currency,value:v(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,u,r,c;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name,currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?v(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:v(null===(u=null==i?void 0:i.price)||void 0===u?void 0:u.amount,null===(r=i.price)||void 0===r?void 0:r.currency),quantity:i.quantity,...(null===(c=null==i?void 0:i.variant_options)||void 0===c?void 0:c.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scCheckoutInitiated",(i=>{var o;const n=i.detail;l("begin_checkout",{currency:n.currency,value:v(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,u,r,c;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name,currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?v(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:v(null===(u=null==i?void 0:i.price)||void 0===u?void 0:u.amount,null===(r=i.price)||void 0===r?void 0:r.currency),quantity:i.quantity,...(null===(c=null==i?void 0:i.variant_options)||void 0===c?void 0:c.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scCheckoutCompleted",(i=>{var o;const n=i.detail;l("purchase",{transaction_id:null==n?void 0:n.id,value:v(null==n?void 0:n.total_amount,(null==n?void 0:n.currency)||"USD"),currency:(n.currency||"").toUpperCase(),items:((null===(o=null==n?void 0:n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,t,d,e,l,u,r,c;return{item_id:null===(t=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===t?void 0:t.id,currency:(n.currency||"").toUpperCase(),item_name:(null===(e=null===(d=null==i?void 0:i.price)||void 0===d?void 0:d.product)||void 0===e?void 0:e.name)||"",discount:(null==i?void 0:i.discount_amount)?v((null==i?void 0:i.discount_amount)||0,(null===(l=null==i?void 0:i.price)||void 0===l?void 0:l.currency)||"USD"):0,price:v((null===(u=null==i?void 0:i.price)||void 0===u?void 0:u.amount)||0,(null===(r=null==i?void 0:i.price)||void 0===r?void 0:r.currency)||"USD"),quantity:(null==i?void 0:i.quantity)||1,...(null===(c=null==i?void 0:i.variant_options)||void 0===c?void 0:c.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scPaymentInfoAdded",(i=>{var o;const n=i.detail;l("add_payment_info",{currency:n.currency,value:v(n.total_amount,n.currency),items:((null===(o=n.line_items)||void 0===o?void 0:o.data)||[]).map((i=>{var o,n,t,d,e,l,u,r,c;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:(null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name)||"",currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?v(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:v(null===(u=null==i?void 0:i.price)||void 0===u?void 0:u.amount,null===(r=i.price)||void 0===r?void 0:r.currency),quantity:i.quantity,...(null===(c=null==i?void 0:i.variant_options)||void 0===c?void 0:c.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scShippingInfoAdded",(i=>{var o,n,t,d,e,u,r,c;const a=i.detail,s=null===(n=null===(o=null==a?void 0:a.shipping_choices)||void 0===o?void 0:o.data)||void 0===n?void 0:n.find((i=>i.id===(null==a?void 0:a.selected_shipping_choice))),p=(null===(t=null==s?void 0:s.shipping_method)||void 0===t?void 0:t.name)||"";l("add_shipping_info",{currency:a.currency,value:v(a.total_amount,a.currency),...(null===(e=null===(d=null==a?void 0:a.discount)||void 0===d?void 0:d.promotion)||void 0===e?void 0:e.code)?{coupon:null===(r=null===(u=null==a?void 0:a.discount)||void 0===u?void 0:u.promotion)||void 0===r?void 0:r.code}:{},...p?{shipping_tier:p}:"",items:((null===(c=a.line_items)||void 0===c?void 0:c.data)||[]).map((i=>{var o,n,t,d,e,l,u,r,c;return{item_id:null===(n=null===(o=null==i?void 0:i.price)||void 0===o?void 0:o.product)||void 0===n?void 0:n.id,item_name:(null===(d=null===(t=null==i?void 0:i.price)||void 0===t?void 0:t.product)||void 0===d?void 0:d.name)||"",currency:null===(e=i.price)||void 0===e?void 0:e.currency,discount:i.discount_amount?v(i.discount_amount,null===(l=i.price)||void 0===l?void 0:l.currency):0,price:v(null===(u=null==i?void 0:i.price)||void 0===u?void 0:u.amount,null===(r=i.price)||void 0===r?void 0:r.currency),quantity:i.quantity,...(null===(c=null==i?void 0:i.variant_options)||void 0===c?void 0:c.length)?{item_variant:(i.variant_options||[]).join(" / ")}:{}}}))})})),window.addEventListener("scAddedToCart",(function(i){var o,n,t,d,e,l,u,r;if(!(null===window||void 0===window?void 0:window.fbq))return;const c=i.detail;if(!(null===(o=null==c?void 0:c.price)||void 0===o?void 0:o.product))return;const a=null===(n=null==c?void 0:c.price)||void 0===n?void 0:n.product,s=(null===(d=null===(t=null==a?void 0:a.product_collections)||void 0===t?void 0:t.data)||void 0===d?void 0:d.map((i=>i.name)))||[];window.fbq("track","AddToCart",{...s.length?{content_category:s.join(", ")}:{},content_ids:[a.id],content_name:(null==a?void 0:a.name)+((null===(e=null==c?void 0:c.variant_options)||void 0===e?void 0:e.length)?` - ${null==c?void 0:c.variant_options.join(" / ")}`:""),content_type:"product",contents:[{id:a.id,quantity:c.quantity}],currency:null===(l=null==c?void 0:c.price)||void 0===l?void 0:l.currency,value:v((null===(u=null==c?void 0:c.price)||void 0===u?void 0:u.amount)||0,(null===(r=null==c?void 0:c.price)||void 0===r?void 0:r.currency)||"USD")})})),window.addEventListener("scCheckoutInitiated",(function(i){var o,n,t,d;if(!(null===window||void 0===window?void 0:window.fbq))return;const e=i.detail;window.fbq("track","InitiateCheckout",{content_ids:null===(o=(null==e?void 0:e.line_items.data)||[])||void 0===o?void 0:o.map((i=>i.id)),contents:null===(n=(null==e?void 0:e.line_items.data)||[])||void 0===n?void 0:n.map((i=>({id:i.id,quantity:i.quantity}))),currency:null==e?void 0:e.currency,num_items:(null===(d=null===(t=null==e?void 0:e.line_items)||void 0===t?void 0:t.data)||void 0===d?void 0:d.length)||0,value:v(null==e?void 0:e.total_amount,(null==e?void 0:e.currency)||"USD")})})),window.addEventListener("scCheckoutCompleted",(function(i){var o,n,t;if(!(null===window||void 0===window?void 0:window.fbq))return;const d=i.detail;window.fbq("track","Purchase",{content_ids:null===(o=null==d?void 0:d.items)||void 0===o?void 0:o.map((i=>i.item_id)),content_name:"Purchase",content_type:"product",contents:null===(n=null==d?void 0:d.items)||void 0===n?void 0:n.map((i=>({id:i.item_id,quantity:i.quantity}))),currency:null==d?void 0:d.currency,num_items:null===(t=null==d?void 0:d.items)||void 0===t?void 0:t.length,value:v(null==d?void 0:d.total_amount,(null==d?void 0:d.currency)||"USD")})})),window.addEventListener("scTrialStarted",(function(i){(null===window||void 0===window?void 0:window.fbq)&&i.detail.forEach((i=>{var o,n,t;window.fbq("track","StartTrial",{currency:null===(o=i.price)||void 0===o?void 0:o.currency,value:v((null===(n=i.price)||void 0===n?void 0:n.amount)||0,(null===(t=i.price)||void 0===t?void 0:t.currency)||"USD")})}))})),window.addEventListener("scSubscriptionStarted",(function(i){(null===window||void 0===window?void 0:window.fbq)&&i.detail.forEach((i=>{var o,n,t;window.fbq("track","Subscribe",{currency:null===(o=i.price)||void 0===o?void 0:o.currency,value:v((null===(n=i.price)||void 0===n?void 0:n.amount)||0,(null===(t=i.price)||void 0===t?void 0:t.currency)||"USD")})}))})),window.addEventListener("scPaymentInfoAdded",(function(i){if(!(null===window||void 0===window?void 0:window.fbq))return;const o=i.detail;window.fbq("track","AddPaymentInfo",{content_category:"Payment Info Added",currency:null==o?void 0:o.currency})}));const z=(i,o)=>{var n;return(null===(n=S.state[o])||void 0===n?void 0:n[i])||{}},B=(i,o)=>{const n=(null==i?void 0:i.live_mode)?"live":"test";S.set(n,{...S.state[n],[o]:i}),E.formId===o&&E.mode===n&&(E.checkout=i),"url"===E.persist&&(null==i?void 0:i.id)&&window.history.replaceState({},document.title,e(window.location.href,{checkout_id:null==i?void 0:i.id}))},G=(i,o)=>{const{[i]:n,...t}=S.state[o];window.history.replaceState({},document.title,f(window.location.href,"redirect_status","coupon","line_items","confirm_checkout_id","checkout_id")),S.set(o,t),P()};export{L as a,B as b,G as c,g as d,N as e,z as g,J as o,f as r,E as s,x as t,F as u};