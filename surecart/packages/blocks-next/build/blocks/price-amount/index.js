!function(){"use strict";var e=window.wp.blocks,t=window.wp.blockEditor;window.wp.i18n;var r=JSON.parse('{"UU":"surecart/price-amount"}');(0,e.registerBlockType)(r.UU,{edit:e=>{let{context:r}=e;const c=(0,t.useBlockProps)(),{display_amount:n}=r["surecart/price"];return n?React.createElement("div",c,n):React.createElement("div",c,(e=>{let{amount:t,currency:r=scData?.currency||"usd",options:c={}}=e;const n=function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:scData?.currency;return["BIF","BYR","CLP","DJF","GNF","ISK","JPY","KMF","KRW","PYG","RWF","UGX","VND","VUV","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XDR","XOF","XPD","XPF","XPT","XTS"].includes(t?.toUpperCase())?e:e/100}(parseFloat(t),r),o=t%1==0?0:2;return`${new Intl.NumberFormat(void 0,{style:"currency",currency:r,minimumFractionDigits:o,...c}).format(parseFloat(n.toFixed(2)))}`})({amount:1e3,currency:scData?.currency}))}})}();