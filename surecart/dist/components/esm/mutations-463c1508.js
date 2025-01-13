import{u as updateFormState,s as state,c as clearCheckout$1}from"./mutations-4ce86b78.js";import{c as createErrorNotice}from"./mutations-ed6d0770.js";import{u as updateLineItem,a as addLineItem,r as removeLineItem}from"./index-e528b663.js";import{a as apiFetch}from"./fetch-2d92a73e.js";import{a as addQueryArgs}from"./add-query-args-0e2a8393.js";var _a;const clearCheckout=()=>clearCheckout$1(state.formId,state.mode),lockCheckout=e=>state.locks=[...state.locks,e],unLockCheckout=(e="")=>state.locks=e?state.locks.filter((t=>t!==e)):[],updateCheckoutLineItem=async({id:e,data:t})=>{try{updateFormState("FETCH"),state.checkout=await updateLineItem({id:e,data:t}),updateFormState("RESOLVE")}catch(e){console.error(e),createErrorNotice(e),updateFormState("REJECT")}},removeCheckoutLineItem=async e=>{try{updateFormState("FETCH"),state.checkout=await removeLineItem({checkoutId:state.checkout.id,itemId:e}),updateFormState("RESOLVE")}catch(e){console.error(e),createErrorNotice(e),updateFormState("REJECT")}},addCheckoutLineItem=async e=>{try{updateFormState("FETCH"),state.checkout=await addLineItem({checkout:state.checkout,data:e,live_mode:"live"===(null==state?void 0:state.mode)}),updateFormState("RESOLVE")}catch(e){console.error(e),createErrorNotice(e),updateFormState("REJECT")}},trackOrderBump=e=>{var t,a,o;(null===(t=state.checkout)||void 0===t?void 0:t.id)&&apiFetch({path:addQueryArgs(`surecart/v1/checkouts/${state.checkout.id}/offer_bump/${e}`,{t:Date.now(),...!!(null===(o=null===(a=null==state?void 0:state.checkout)||void 0===a?void 0:a.invoice)||void 0===o?void 0:o.id)&&{type:"open_invoice"}}),method:"POST",keepalive:!0})};window.sc={...(null===window||void 0===window?void 0:window.sc)||{},checkout:{...(null===(_a=null===window||void 0===window?void 0:window.sc)||void 0===_a?void 0:_a.checkout)||{},addLineItem:addCheckoutLineItem}};export{addCheckoutLineItem as a,unLockCheckout as b,clearCheckout as c,lockCheckout as l,removeCheckoutLineItem as r,trackOrderBump as t,updateCheckoutLineItem as u};