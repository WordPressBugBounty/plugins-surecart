import{a as i}from"./p-863940e9.js";import{i as o,g as d}from"./p-fd1598d9.js";import{p as l}from"./p-3b9fdf35.js";import{s as e,o as r}from"./p-86fd1a31.js";import{a as v}from"./p-401e165e.js";i("set",((i,o,e)=>{JSON.stringify(null==o?void 0:o.line_item)!==JSON.stringify(null==e?void 0:e.line_item)&&l()})),setInterval((()=>{o()&&(e.loading="complete")}),1e3),r("line_item",(()=>{var i,o,l;e.amount_due=(null===(i=null==e?void 0:e.line_item)||void 0===i?void 0:i.total_amount)+(null!==(l=null===(o=null==e?void 0:e.line_item)||void 0===o?void 0:o.trial_amount)&&void 0!==l?l:0)})),r("upsell",(i=>{var o;if(!(null==i?void 0:i.permalink))return e.loading="complete";e.loading="redirecting",window.location.assign(v(null==i?void 0:i.permalink,{sc_checkout_id:null===(o=e.checkout)||void 0===o?void 0:o.id,sc_form_id:e.form_id}))})),r("loading",(i=>{var o;if("complete"===i){const i=d();if(!i)return e.loading="complete";e.loading="redirecting",window.location.assign(v(i,{sc_order:null===(o=e.checkout)||void 0===o?void 0:o.id}))}}));