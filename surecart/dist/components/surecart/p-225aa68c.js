import{c as o}from"./p-03631502.js";import{g as i}from"./p-9dbc54d6.js";import{g as d}from"./p-f113b621.js";import{i as l}from"./p-93127aa7.js";import{u as n,a as v}from"./p-ba67b948.js";import{o as t}from"./p-021b5199.js";const{productDonation:u}=i(),s=Object.keys(u||{}).reduce(((o,a)=>{var u;const n=d(a);return(null==n?void 0:n.id)&&(o[a]={...o[a],...(null==n?void 0:n.ad_hoc_amount)?{ad_hoc_amount:n.ad_hoc_amount}:{},...(null==n?void 0:n.price)?{selectedPrice:n.price}:{},custom_amount:(null===(u=o[a].amounts||[])||void 0===u?void 0:u.includes(n.ad_hoc_amount))?null:n.ad_hoc_amount}),o}),u),{state:a,onChange:c,on:r,set:e,get:m,dispose:p}=o({...s},((o,a)=>JSON.stringify(o)!==JSON.stringify(a))),f=o=>{const u=a[o],d=(u.amounts||[]).filter((o=>l(o,u.selectedPrice)));return d.includes(null==u?void 0:u.ad_hoc_amount)?null==u?void 0:u.ad_hoc_amount:d[0]},_=o=>{const u=a[o];return(u.amounts||[]).filter((o=>l(o,u.selectedPrice)))},b=(o,u)=>{a[o]={...a[o],...u}},j=(o,a)=>{const u=d(o);return(null==u?void 0:u.id)?n({id:u.id,data:{...{price:u.price.id,...(null==u?void 0:u.ad_hoc_amount)?{ad_hoc_amount:null==u?void 0:u.ad_hoc_amount}:{}},...a}}):v(a)};t("checkout",(()=>{Object.keys(a).forEach((o=>{var u;const n=d(o);if(n)return e(o,{...a[o],selectedPrice:n.price,ad_hoc_amount:n.ad_hoc_amount,custom_amount:(null===(u=a[o].amounts||[])||void 0===u?void 0:u.includes(n.ad_hoc_amount))?null:n.ad_hoc_amount});e(o,{...a[o],selectedPrice:null,ad_hoc_amount:null,custom_amount:null})}))})),Object.keys(a).forEach((o=>{r("set",((a,u,d)=>{var n,t,i,c,e,s;if(a===o&&((null==u?void 0:u.selectedPrice)||(null==u?void 0:u.ad_hoc_amount)||(null==u?void 0:u.custom_amount))&&((null===(n=null==u?void 0:u.selectedPrice)||void 0===n?void 0:n.id)!==(null===(t=null==d?void 0:d.selectedPrice)||void 0===t?void 0:t.id)||(null==u?void 0:u.ad_hoc_amount)!==(null==d?void 0:d.ad_hoc_amount)||(null==u?void 0:u.custom_amount)!==(null==d?void 0:d.custom_amount))){const a=(null==u?void 0:u.custom_amount)&&l(null==u?void 0:u.custom_amount,u.selectedPrice)?null==u?void 0:u.custom_amount:f(o),d=(null===(i=u.selectedPrice)||void 0===i?void 0:i.id)||(null===(s=null===(e=null===(c=u.product)||void 0===c?void 0:c.prices)||void 0===e?void 0:e.data.find((o=>null==o?void 0:o.ad_hoc)))||void 0===s?void 0:s.id);if(!d)return;j(o,{price:d,quantity:1,ad_hoc_amount:a})}}))}));export{r as a,e as b,_ as c,p as d,m as g,c as o,a as s,b as u};