import{s as n}from"./p-7a5626ee.js";const o=()=>["loading","busy","redirecting"].includes(n.loading),t=()=>{var o,l;return(null===(l=null===(o=null==n?void 0:n.checkout)||void 0===o?void 0:o.metadata)||void 0===l?void 0:l.success_url)||n.success_url||null},i=o=>{var l,t;return null!==(t=null===(l=null==n?void 0:n.line_item)||void 0===l?void 0:l.total_amount)&&void 0!==t?t:o},r=o=>{var l,t,i;return(null===(l=null==n?void 0:n.line_item)||void 0===l?void 0:l.total_savings_amount)?-(null===(t=null==n?void 0:n.line_item)||void 0===t?void 0:t.total_savings_amount)+(null===(i=null==n?void 0:n.line_item)||void 0===i?void 0:i.total_amount):o},l=(o="seconds")=>{var l;const t=null===(l=n.checkout)||void 0===l?void 0:l.upsells_expire_at;if(!t)return null;const i=Date.now(),s=Math.floor((1e3*t-i)/1e3);return s<0?0:"seconds"===o?s:"minutes"===o?Math.floor(s/60):"hours"===o?Math.floor(s/60/60):void 0},s=o=>o<10?`0${o}`:`${o}`,d=()=>{var o;if(!(null===(o=n.checkout)||void 0===o?void 0:o.upsells_expire_at))return"--:--";const t=l("seconds"),i=Math.floor(t/86400),u=Math.floor(t%86400/3600),e=Math.floor(t%3600/60),r=Math.floor(t%60);return i>0?`${s(i)}:${s(u)}:${s(e)}:${s(r)}`:u>0?`${s(u)}:${s(e)}:${s(r)}`:`${s(e)}:${s(r)}`},u=()=>{const o=l();return null!==l()&&o<=0};export{i as a,r as b,o as c,d,t as g,u as i};