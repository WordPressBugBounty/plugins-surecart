import{c as createStore}from"./index-06061d4e.js";import{g as getSerializedState}from"./utils-cd1431df.js";import{g as getLineItemByProductId}from"./getters-3a0d4ac0.js";import{i as isInRange}from"./util-50af2a83.js";import{u as updateCheckoutLineItem,a as addCheckoutLineItem}from"./mutations-56e6eb22.js";import{o as onChange$1}from"./mutations-6f9b9a86.js";const{productDonation:productDonation}=getSerializedState(),productDonationData=Object.keys(productDonation||{}).reduce(((t,o)=>{var e;const n=getLineItemByProductId(o);return(null==n?void 0:n.id)&&(t[o]={...t[o],...(null==n?void 0:n.ad_hoc_amount)?{ad_hoc_amount:n.ad_hoc_amount}:{},...(null==n?void 0:n.price)?{selectedPrice:n.price}:{},custom_amount:(null===(e=t[o].amounts||[])||void 0===e?void 0:e.includes(n.ad_hoc_amount))?null:n.ad_hoc_amount}),t}),productDonation),{state:state,onChange:onChange,on:on,set:set,get:get,dispose:dispose}=createStore({...productDonationData},((t,o)=>JSON.stringify(t)!==JSON.stringify(o))),getValidAdHocAmount=t=>{const o=state[t],e=(o.amounts||[]).filter((t=>isInRange(t,o.selectedPrice)));return e.includes(null==o?void 0:o.ad_hoc_amount)?null==o?void 0:o.ad_hoc_amount:e[0]},getInRangeAmounts=t=>{const o=state[t];return(o.amounts||[]).filter((t=>isInRange(t,o.selectedPrice)))},updateDonationState=(t,o)=>{state[t]={...state[t],...o}},updateLineItem=(t,o)=>{const e=getLineItemByProductId(t);return(null==e?void 0:e.id)?updateCheckoutLineItem({id:e.id,data:{...{price:e.price.id,...(null==e?void 0:e.ad_hoc_amount)?{ad_hoc_amount:null==e?void 0:e.ad_hoc_amount}:{}},...o}}):addCheckoutLineItem(o)};onChange$1("checkout",(()=>{Object.keys(state).forEach((t=>{var o;const e=getLineItemByProductId(t);if(e)return set(t,{...state[t],selectedPrice:e.price,ad_hoc_amount:e.ad_hoc_amount,custom_amount:(null===(o=state[t].amounts||[])||void 0===o?void 0:o.includes(e.ad_hoc_amount))?null:e.ad_hoc_amount});set(t,{...state[t],selectedPrice:null,ad_hoc_amount:null,custom_amount:null})}))})),Object.keys(state).forEach((t=>{on("set",((o,e,n)=>{var a,d,i,u,c,s;if(o===t&&((null==e?void 0:e.selectedPrice)||(null==e?void 0:e.ad_hoc_amount)||(null==e?void 0:e.custom_amount))&&((null===(a=null==e?void 0:e.selectedPrice)||void 0===a?void 0:a.id)!==(null===(d=null==n?void 0:n.selectedPrice)||void 0===d?void 0:d.id)||(null==e?void 0:e.ad_hoc_amount)!==(null==n?void 0:n.ad_hoc_amount)||(null==e?void 0:e.custom_amount)!==(null==n?void 0:n.custom_amount))){const o=(null==e?void 0:e.custom_amount)&&isInRange(null==e?void 0:e.custom_amount,e.selectedPrice)?null==e?void 0:e.custom_amount:getValidAdHocAmount(t),n=(null===(i=e.selectedPrice)||void 0===i?void 0:i.id)||(null===(s=null===(c=null===(u=e.product)||void 0===u?void 0:u.prices)||void 0===c?void 0:c.data.find((t=>null==t?void 0:t.ad_hoc)))||void 0===s?void 0:s.id);if(!n)return;updateLineItem(t,{price:n,quantity:1,ad_hoc_amount:o})}}))}));export{on as a,set as b,getInRangeAmounts as c,dispose as d,get as g,onChange as o,state as s,updateDonationState as u};