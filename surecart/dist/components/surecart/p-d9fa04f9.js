import{g as e,a as n}from"./p-401e165e.js";import{g as t,r}from"./p-d3366af3.js";function o(e,n){return void 0!==t(e,n)}function i(e){const t=e.split("?"),n=t[1],o=t[0];return n?o+"?"+n.split("&").map((e=>e.split("="))).map((e=>e.map(decodeURIComponent))).sort(((e,t)=>e[0].localeCompare(t[0]))).map((e=>e.map(encodeURIComponent))).map((e=>e.join("="))).join("&"):o}function s(e){const t=(e,n)=>{const{headers:o={}}=e;for(const r in o)if("x-wp-nonce"===r.toLowerCase()&&o[r]===t.nonce)return n(e);return n({...e,headers:{...o,"X-WP-Nonce":t.nonce}})};return t.nonce=e,t}const a=(e,t)=>{let n,o,r=e.path;return"string"==typeof e.namespace&&"string"==typeof e.endpoint&&(n=e.namespace.replace(/^\/|\/$/g,""),o=e.endpoint.replace(/^\//,""),r=o?n+"/"+o:n),delete e.namespace,delete e.endpoint,t({...e,path:r})},c=e=>(t,n)=>a(t,(t=>{let o,r=t.url,a=t.path;return"string"==typeof a&&(o=e,-1!==e.indexOf("?")&&(a=a.replace("?","&")),a=a.replace(/^\//,""),"string"==typeof o&&-1!==o.indexOf("?")&&(a=a.replace("?","&")),r=o+a),n({...t,url:r})}));function u(t){const o=Object.fromEntries(Object.entries(t).map((([e,t])=>[i(e),t])));return(t,r)=>{const{parse:a=!0}=t;let s=t.path;if(!s&&t.url){const{rest_route:o,...r}=e(t.url);"string"==typeof o&&(s=n(o,r))}if("string"!=typeof s)return r(t);const c=t.method||"GET",p=i(s);if("GET"===c&&o[p]){const e=o[p];return delete o[p],d(e,!!a)}if("OPTIONS"===c&&o[c]&&o[c][p]){const e=o[c][p];return delete o[c][p],d(e,!!a)}return r(t)}}function d(e,t){return Promise.resolve(t?e.body:new window.Response(JSON.stringify(e.body),{status:200,statusText:"OK",headers:e.headers}))}const l=({path:e,url:t,...o},r)=>({...o,url:t&&n(t,r),path:e&&n(e,r)}),w=e=>e.json?e.json():Promise.reject(e),f=e=>{if(!e)return{};const t=e.match(/<([^>]+)>; rel="next"/);return t?{next:t[1]}:{}},p=e=>{const{next:t}=f(e.headers.get("link"));return t},h=e=>{const t=!!e.path&&-1!==e.path.indexOf("per_page=-1"),n=!!e.url&&-1!==e.url.indexOf("per_page=-1");return t||n},v=async(e,t)=>{if(!1===e.parse)return t(e);if(!h(e))return t(e);const n=await z({...l(e,{per_page:100}),parse:!1}),o=await w(n);if(!Array.isArray(o))return o;let r=p(n);if(!r)return o;let a=[].concat(o);for(;r;){const t=await z({...e,path:void 0,url:r,parse:!1}),n=await w(t);a=a.concat(n),r=p(t)}return a},m=new Set(["PATCH","PUT","DELETE"]),_="GET",g=(e,t)=>{const{method:n=_}=e;return m.has(n.toUpperCase())&&(e={...e,headers:{...e.headers,"X-HTTP-Method-Override":n,"Content-Type":"application/json"},method:"POST"}),t(e)},y=(e,t)=>("string"!=typeof e.url||o(e.url,"_locale")||(e.url=n(e.url,{_locale:"user"})),"string"!=typeof e.path||o(e.path,"_locale")||(e.path=n(e.path,{_locale:"user"})),t(e)),P=(e,t=!0)=>t?204===e.status?null:e.json?e.json():Promise.reject(e):e,T=e=>{const t={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.")};if(!e||!e.json)throw t;return e.json().catch((()=>{throw t}))},O=(e,t=!0)=>Promise.resolve(P(e,t)).catch((e=>j(e,t)));function j(e,t=!0){if(!t)throw e;return T(e).then((e=>{const t={code:"unknown_error",message:wp.i18n.__("An unknown error occurred.")};throw e||t}))}function b(e){const t=!!e.method&&"POST"===e.method;return(!!e.path&&-1!==e.path.indexOf("/wp/v2/media")||!!e.url&&-1!==e.url.indexOf("/wp/v2/media"))&&t}const E=(e,t)=>{if(!b(e))return t(e);let n=0;const o=e=>(n++,t({path:`/wp/v2/media/${e}/post-process`,method:"POST",data:{action:"create-image-subsizes"},parse:!1}).catch((()=>n<5?o(e):(t({path:`/wp/v2/media/${e}?force=true`,method:"DELETE"}),Promise.reject()))));return t({...e,parse:!1}).catch((t=>{const n=t.headers.get("x-wp-upload-attachment-id");return t.status>=500&&t.status<600&&n?o(n).catch((()=>!1!==e.parse?Promise.reject({code:"post_process",message:wp.i18n.__("Media upload failed. If this is a photo or a large image, please scale it down and try again.")}):Promise.reject(t))):j(t,e.parse)})).then((t=>O(t,e.parse)))},S=e=>(o,a)=>{if("string"==typeof o.url){const a=t(o.url,"wp_theme_preview");void 0===a?o.url=n(o.url,{wp_theme_preview:e}):""===a&&(o.url=r(o.url,"wp_theme_preview"))}if("string"==typeof o.path){const a=t(o.path,"wp_theme_preview");void 0===a?o.path=n(o.path,{wp_theme_preview:e}):""===a&&(o.path=r(o.path,"wp_theme_preview"))}return a(o)},k={Accept:"application/json, */*;q=0.1"},x={credentials:"include"},N=[y,a,g,v];function A(e){N.unshift(e)}const I=e=>{if(e.status>=200&&e.status<300)return e;throw e},J=e=>{const{url:t,path:n,data:o,parse:r=!0,...a}=e;let{body:i,headers:s}=e;return s={...k,...s},o&&(i=JSON.stringify(o),s["Content-Type"]="application/json"),window.fetch(t||n||window.location.href,{...x,...a,body:i,headers:s}).then((e=>Promise.resolve(e).then(I).catch((e=>j(e,r))).then((e=>O(e,r)))),(e=>{if(e&&"AbortError"===e.name)throw e;throw{code:"fetch_error",message:wp.i18n.__("You are probably offline.")}}))};let $=J;function C(e){$=e}function z(e){const t=N.reduceRight(((e,t)=>n=>t(n,e)),$);return t(e).catch((t=>"rest_cookie_invalid_nonce"!==t.code?Promise.reject(t):window.fetch(z.nonceEndpoint).then(I).then((e=>e.text())).then((t=>(z.nonceMiddleware.nonce=t,z(e))))))}var D,G,M,U,H,L,R;z.use=A,z.setFetchHandler=C,z.createNonceMiddleware=s,z.createPreloadingMiddleware=u,z.createRootURLMiddleware=c,z.fetchAllMiddleware=v,z.mediaUploadMiddleware=E,z.createThemePreviewMiddleware=S,z.fetchAllMiddleware=null,z.use(z.createRootURLMiddleware((null===(G=null===(D=null===window||void 0===window?void 0:window.parent)||void 0===D?void 0:D.scData)||void 0===G?void 0:G.root_url)||(null===(M=null===window||void 0===window?void 0:window.scData)||void 0===M?void 0:M.root_url))),(null===(U=null===window||void 0===window?void 0:window.scData)||void 0===U?void 0:U.nonce)&&(z.nonceMiddleware=z.createNonceMiddleware(null===(H=null===window||void 0===window?void 0:window.scData)||void 0===H?void 0:H.nonce),z.use(z.nonceMiddleware)),(null===(L=null===window||void 0===window?void 0:window.scData)||void 0===L?void 0:L.nonce_endpoint)&&(z.nonceEndpoint=null===(R=null===window||void 0===window?void 0:window.scData)||void 0===R?void 0:R.nonce_endpoint),z.use(((e,t)=>(e.path=n(e.path,{t:Date.now()}),t(e)))),z.use(((e,o)=>(e.path=n(e.path,{...!!t(window.location.href,"currency")&&{currency:t(window.location.href,"currency")}}),o(e)))),z.use(((e,t)=>{const n=t(e);return n.catch((e=>{if("invalid_json"===e.code){e.message=wp.i18n.__("The response is not a valid JSON response.","surecart");const t="https://surecart.com/docs/is-not-a-valid-json-response/";e.additional_errors=[{code:"invalid_json",message:wp.i18n.sprintf(wp.i18n.__("Please ensure that your site is not in debug mode as this may interfere with API responses. %s","surecart"),`<a href="${t}" target="_blank" rel="noopener noreferrer">${wp.i18n.__("More Information","surecart")}</a>`)}]}return"checkout.finalize_error"===e.code&&(e.additional_errors=[{code:"checkout.finalize_error",message:e.message}],e.message=wp.i18n.__("We were not able to process this order","surecart")),Promise.reject(e)})),n}));const W=e=>{const t={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.","surecart")};if((null==e?void 0:e.code)&&(null==e?void 0:e.message))throw e;if(!e||!e.json)throw t;return e.json().catch((()=>{throw t}))},X=async e=>{const t=await W(e);if("rest_cookie_invalid_nonce"!==t.code)throw t;return window.fetch(z.nonceEndpoint).then((e=>{if(e.status>=200&&e.status<300)return e;throw e})).then((e=>e.text())).then((e=>{z.nonceMiddleware.nonce=e}))};export{z as a,X as h};