import{s as n}from"./p-86fd1a31.js";const o=()=>["loading","busy","redirecting"].includes(n.loading),t=()=>{var l,o;return(null===(o=null===(l=null==n?void 0:n.checkout)||void 0===l?void 0:l.metadata)||void 0===o?void 0:o.success_url)||n.success_url||null},i=l=>{var o,t;return null!==(t=null===(o=null==n?void 0:n.line_item)||void 0===o?void 0:o.total_amount)&&void 0!==t?t:l},r=l=>{var o,t;return(null===(o=null==n?void 0:n.line_item)||void 0===o?void 0:o.total_savings_amount)?-(null===(t=null==n?void 0:n.line_item)||void 0===t?void 0:t.total_savings_amount):l},s=(l="seconds")=>{var o;const t=null===(o=n.checkout)||void 0===o?void 0:o.upsells_expire_at;if(!t)return null;const i=Date.now(),s=Math.floor((1e3*t-i)/1e3);return s<0?0:"seconds"===l?s:"minutes"===l?Math.floor(s/60):"hours"===l?Math.floor(s/60/60):void 0},l=l=>l<10?`0${l}`:`${l}`,u=()=>{var o;if(!(null===(o=n.checkout)||void 0===o?void 0:o.upsells_expire_at))return"--:--";const t=s("seconds"),i=Math.floor(t/86400),u=Math.floor(t%86400/3600),r=Math.floor(t%3600/60),a=Math.floor(t%60);return i>0?`${l(i)}:${l(u)}:${l(r)}:${l(a)}`:u>0?`${l(u)}:${l(r)}:${l(a)}`:`${l(r)}:${l(a)}`},d=()=>{const l=s();return null!==s()&&l<=0};export{i as a,r as b,o as c,u as d,t as g,d as i};