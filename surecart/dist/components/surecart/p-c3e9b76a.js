import{c as a,s as o,u as t}from"./p-8bceca25.js";import{c as s}from"./p-8266bbed.js";import{u as c,r as e,a as i}from"./p-d58c9410.js";import{a as r}from"./p-18e45a13.js";import{a as d}from"./p-1c2e2695.js";const n=()=>a(o.formId,o.mode),l=c=>o.locks=[...o.locks,c],p=(c="")=>o.locks=c?o.locks.filter((o=>o!==c)):[],v=async({id:a,data:e})=>{try{t("FETCH"),o.checkout=await c({id:a,data:e}),t("RESOLVE")}catch(a){console.error(a),s(a),t("REJECT")}},u=async c=>{try{t("FETCH"),o.checkout=await e({checkoutId:o.checkout.id,itemId:c}),t("RESOLVE")}catch(c){console.error(c),s(c),t("REJECT")}},E=async c=>{try{t("FETCH"),o.checkout=await i({checkout:o.checkout,data:c,live_mode:"live"===(null==o?void 0:o.mode)}),t("RESOLVE")}catch(c){console.error(c),s(c),t("REJECT")}},m=c=>{var t,a,e;(null===(t=o.checkout)||void 0===t?void 0:t.id)&&r({path:d(`surecart/v1/checkouts/${o.checkout.id}/offer_bump/${c}`,{t:Date.now(),...!!(null===(e=null===(a=null==o?void 0:o.checkout)||void 0===a?void 0:a.invoice)||void 0===e?void 0:e.id)&&{type:"open_invoice"}}),method:"POST",keepalive:!0})};export{E as a,p as b,n as c,l,u as r,m as t,v as u};