import{a as on}from"./watchers-fbf07f32.js";import{i as isUpsellExpired,g as getExitUrl}from"./getters-1899e179.js";import{p as preview}from"./mutations-5702cb96.js";import{s as state,o as onChange}from"./store-4bc13420.js";import{a as addQueryArgs}from"./add-query-args-0e2a8393.js";on("set",((e,t,i)=>{JSON.stringify(null==t?void 0:t.line_item)!==JSON.stringify(null==i?void 0:i.line_item)&&preview()})),setInterval((()=>{isUpsellExpired()&&(state.loading="complete")}),1e3),onChange("line_item",(()=>{var e,t,i;state.amount_due=(null===(e=null==state?void 0:state.line_item)||void 0===e?void 0:e.total_amount)+(null!==(i=null===(t=null==state?void 0:state.line_item)||void 0===t?void 0:t.trial_amount)&&void 0!==i?i:0)})),onChange("upsell",(e=>{var t;if(!(null==e?void 0:e.permalink))return state.loading="complete";state.loading="redirecting",window.location.assign(addQueryArgs(null==e?void 0:e.permalink,{sc_checkout_id:null===(t=state.checkout)||void 0===t?void 0:t.id,sc_form_id:state.form_id}))})),onChange("loading",(e=>{var t;if("complete"===e){const e=getExitUrl();if(!e)return state.loading="complete";state.loading="redirecting",window.location.assign(addQueryArgs(e,{sc_order:null===(t=state.checkout)||void 0===t?void 0:t.id}))}}));