import{s as state}from"./store-dcefd119.js";const isBusy=()=>["loading","busy","redirecting"].includes(state.loading),getExitUrl=()=>{var t,e;return(null===(e=null===(t=null==state?void 0:state.checkout)||void 0===t?void 0:t.metadata)||void 0===e?void 0:e.success_url)||state.success_url||null},getDiscountedAmount=t=>{var e,i;return null!==(i=null===(e=null==state?void 0:state.line_item)||void 0===e?void 0:e.total_amount)&&void 0!==i?i:t},getScratchAmount=t=>{var e,i,o;return(null===(e=null==state?void 0:state.line_item)||void 0===e?void 0:e.total_savings_amount)?-(null===(i=null==state?void 0:state.line_item)||void 0===i?void 0:i.total_savings_amount)+(null===(o=null==state?void 0:state.line_item)||void 0===o?void 0:o.total_amount):t},getUpsellRemainingTime=(t="seconds")=>{var e;const i=null===(e=state.checkout)||void 0===e?void 0:e.upsells_expire_at;if(!i)return null;const o=Date.now(),n=Math.floor((1e3*i-o)/1e3);return n<0?0:"seconds"===t?n:"minutes"===t?Math.floor(n/60):"hours"===t?Math.floor(n/60/60):void 0},formatTimeUnit=t=>t<10?`0${t}`:`${t}`,getFormattedRemainingTime=()=>{var t;if(!(null===(t=state.checkout)||void 0===t?void 0:t.upsells_expire_at))return"--:--";const e=getUpsellRemainingTime("seconds"),i=Math.floor(e/86400),o=Math.floor(e%86400/3600),n=Math.floor(e%3600/60),a=Math.floor(e%60);return i>0?`${formatTimeUnit(i)}:${formatTimeUnit(o)}:${formatTimeUnit(n)}:${formatTimeUnit(a)}`:o>0?`${formatTimeUnit(o)}:${formatTimeUnit(n)}:${formatTimeUnit(a)}`:`${formatTimeUnit(n)}:${formatTimeUnit(a)}`},isUpsellExpired=()=>{const t=getUpsellRemainingTime();return null!==getUpsellRemainingTime()&&t<=0};export{getDiscountedAmount as a,getScratchAmount as b,isBusy as c,getFormattedRemainingTime as d,getExitUrl as g,isUpsellExpired as i};