"use strict";(self.webpackChunk_surecart_surecart=self.webpackChunk_surecart_surecart||[]).push([[5812],{4805:function(e,n,r){r.d(n,{a:function(){return f},b:function(){return u},g:function(){return l}});var t=r(4467),o=r(296);function i(e,n){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(e);n&&(t=t.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),r.push.apply(r,t)}return r}function a(e){for(var n=1;n<arguments.length;n++){var r=null!=arguments[n]?arguments[n]:{};n%2?i(Object(r),!0).forEach((function(n){(0,t.A)(e,n,r[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(r,n))}))}return e}function c(e,n){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,n){if(e){if("string"==typeof e)return s(e,n);var r={}.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?s(e,n):void 0}}(e))||n&&e&&"number"==typeof e.length){r&&(e=r);var _n=0,t=function(){};return{s:t,n:function(){return _n>=e.length?{done:!0}:{done:!1,value:e[_n++]}},e:function(e){throw e},f:t}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,i=!0,a=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return i=e.done,e},e:function(e){a=!0,o=e},f:function(){try{i||null==r.return||r.return()}finally{if(a)throw o}}}}function s(e,n){(null==n||n>e.length)&&(n=e.length);for(var r=0,t=Array(n);r<n;r++)t[r]=e[r];return t}function u(e){for(var n,r="",t=Object.entries(e);n=t.shift();){var i=n,a=(0,o.A)(i,2),s=a[0],u=a[1];if(Array.isArray(u)||u&&u.constructor===Object){var d,l=c(Object.entries(u).reverse());try{for(l.s();!(d=l.n()).done;){var f=(0,o.A)(d.value,2),p=f[0],h=f[1];t.unshift(["".concat(s,"[").concat(p,"]"),h])}}catch(e){l.e(e)}finally{l.f()}}else void 0!==u&&(null===u&&(u=""),r+="&"+[s,u].map(encodeURIComponent).join("="))}return r.substr(1)}function d(e){try{return decodeURIComponent(e)}catch(n){return e}}function l(e){return(function(e){var n;try{n=new URL(e,"http://example.com").search.substring(1)}catch(e){}if(n)return n}(e)||"").replace(/\+/g,"%20").split("&").reduce((function(e,n){var r=n.split("=").filter(Boolean).map(d),t=(0,o.A)(r,2),i=t[0],c=t[1],s=void 0===c?"":c;return i&&function(e,n,r){for(var t=n.length,o=t-1,i=0;i<t;i++){var c=n[i];!c&&Array.isArray(e)&&(c=e.length.toString()),c=["__proto__","constructor","prototype"].includes(c)?c.toUpperCase():c;var s=!isNaN(Number(n[i+1]));e[c]=i===o?r:e[c]||(s?[]:{}),Array.isArray(e[c])&&!s&&(e[c]=a({},e[c])),e=e[c]}}(e,i.replace(/\]/g,"").split("["),s),e}),Object.create(null))}function f(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",n=arguments.length>1?arguments[1]:void 0;if(!n||!Object.keys(n).length)return e;var r=e,t=e.indexOf("?");return-1!==t&&(n=Object.assign(l(e),n),r=r.substr(0,t)),r+"?"+u(n)}},3:function(e,n,r){r.d(n,{a:function(){return H},h:function(){return W}});var t=r(467),o=r(45),i=r(296),a=r(4467),c=r(9280),s=r.n(c),u=r(4805),d=r(3506),l=["rest_route"],f=["path","url"],p=["url","path","data","parse"];function h(e,n){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(e);n&&(t=t.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),r.push.apply(r,t)}return r}function v(e){for(var n=1;n<arguments.length;n++){var r=null!=arguments[n]?arguments[n]:{};n%2?h(Object(r),!0).forEach((function(n){(0,a.A)(e,n,r[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):h(Object(r)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(r,n))}))}return e}function w(e,n){return void 0!==(0,d.g)(e,n)}function m(e){var n=e.split("?"),r=n[1],t=n[0];return r?t+"?"+r.split("&").map((function(e){return e.split("=")})).map((function(e){return e.map(decodeURIComponent)})).sort((function(e,n){return e[0].localeCompare(n[0])})).map((function(e){return e.map(encodeURIComponent)})).map((function(e){return e.join("=")})).join("&"):t}var y=function(e,n){var r,t,o=e.path;return"string"==typeof e.namespace&&"string"==typeof e.endpoint&&(r=e.namespace.replace(/^\/|\/$/g,""),o=(t=e.endpoint.replace(/^\//,""))?r+"/"+t:r),delete e.namespace,delete e.endpoint,n(v(v({},e),{},{path:o}))};function g(e,n){return Promise.resolve(n?e.body:new window.Response(JSON.stringify(e.body),{status:200,statusText:"OK",headers:e.headers}))}var b=function(e){return e.json?e.json():Promise.reject(e)},_=function(e){return function(e){if(!e)return{};var n=e.match(/<([^>]+)>; rel="next"/);return n?{next:n[1]}:{}}(e.headers.get("link")).next},O=function(e){var n=!!e.path&&-1!==e.path.indexOf("per_page=-1"),r=!!e.url&&-1!==e.url.indexOf("per_page=-1");return n||r},j=function(){var e=(0,t.A)(s().mark((function e(n,r){var t,i,a,c,d,l;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!1!==n.parse){e.next=2;break}return e.abrupt("return",r(n));case 2:if(O(n)){e.next=4;break}return e.abrupt("return",r(n));case 4:return e.next=6,H(v(v({},(p={per_page:100},void 0,void 0,h=(s=n).path,w=s.url,v(v({},(0,o.A)(s,f)),{},{url:w&&(0,u.a)(w,p),path:h&&(0,u.a)(h,p)}))),{},{parse:!1}));case 6:return t=e.sent,e.next=9,b(t);case 9:if(i=e.sent,Array.isArray(i)){e.next=12;break}return e.abrupt("return",i);case 12:if(a=_(t)){e.next=15;break}return e.abrupt("return",i);case 15:c=[].concat(i);case 16:if(!a){e.next=27;break}return e.next=19,H(v(v({},n),{},{path:void 0,url:a,parse:!1}));case 19:return d=e.sent,e.next=22,b(d);case 22:l=e.sent,c=c.concat(l),a=_(d),e.next=16;break;case 27:return e.abrupt("return",c);case 28:case"end":return e.stop()}var s,p,h,w}),e)})));return function(_x,n){return e.apply(this,arguments)}}(),k=new Set(["PATCH","PUT","DELETE"]),P=function(e){var n=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];return Promise.resolve(function(e){return arguments.length>1&&void 0!==arguments[1]&&!arguments[1]?e:204===e.status?null:e.json?e.json():Promise.reject(e)}(e,n)).catch((function(e){return x(e,n)}))};function x(e){if(arguments.length>1&&void 0!==arguments[1]&&!arguments[1])throw e;return function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.")};if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))}(e).then((function(e){var n={code:"unknown_error",message:wp.i18n.__("An unknown error occurred.")};throw e||n}))}var A,S,E,T,C,M,I,D={Accept:"application/json, */*;q=0.1"},U={credentials:"include"},N=[function(e,n){return"string"!=typeof e.url||w(e.url,"_locale")||(e.url=(0,u.a)(e.url,{_locale:"user"})),"string"!=typeof e.path||w(e.path,"_locale")||(e.path=(0,u.a)(e.path,{_locale:"user"})),n(e)},y,function(e,n){var r=e.method,t=void 0===r?"GET":r;return k.has(t.toUpperCase())&&(e=v(v({},e),{},{headers:v(v({},e.headers),{},{"X-HTTP-Method-Override":t,"Content-Type":"application/json"}),method:"POST"})),n(e)},j],R=function(e){if(e.status>=200&&e.status<300)return e;throw e},L=function(e){var n=e.url,r=e.path,t=e.data,i=e.parse,a=void 0===i||i,c=(0,o.A)(e,p),s=e.body,u=e.headers;return u=v(v({},D),u),t&&(s=JSON.stringify(t),u["Content-Type"]="application/json"),window.fetch(n||r||window.location.href,v(v(v({},U),c),{},{body:s,headers:u})).then((function(e){return Promise.resolve(e).then(R).catch((function(e){return x(e,a)})).then((function(e){return P(e,a)}))}),(function(e){if(e&&"AbortError"===e.name)throw e;throw{code:"fetch_error",message:wp.i18n.__("You are probably offline.")}}))};function H(e){return N.reduceRight((function(e,n){return function(r){return n(r,e)}}),L)(e).catch((function(n){return"rest_cookie_invalid_nonce"!==n.code?Promise.reject(n):window.fetch(H.nonceEndpoint).then(R).then((function(e){return e.text()})).then((function(n){return H.nonceMiddleware.nonce=n,H(e)}))}))}H.use=function(e){N.unshift(e)},H.setFetchHandler=function(e){L=e},H.createNonceMiddleware=function(e){var n=function e(n,r){var t=n.headers,o=void 0===t?{}:t;for(var i in o)if("x-wp-nonce"===i.toLowerCase()&&o[i]===e.nonce)return r(n);return r(v(v({},n),{},{headers:v(v({},o),{},{"X-WP-Nonce":e.nonce})}))};return n.nonce=e,n},H.createPreloadingMiddleware=function(e){var n=Object.fromEntries(Object.entries(e).map((function(e){var n=(0,i.A)(e,2),r=n[0],t=n[1];return[m(r),t]})));return function(e,r){var t=e.parse,i=void 0===t||t,a=e.path;if(!a&&e.url){var c=(0,u.g)(e.url),s=c.rest_route,d=(0,o.A)(c,l);"string"==typeof s&&(a=(0,u.a)(s,d))}if("string"!=typeof a)return r(e);var f=e.method||"GET",p=m(a);if("GET"===f&&n[p]){var h=n[p];return delete n[p],g(h,!!i)}if("OPTIONS"===f&&n[f]&&n[f][p]){var v=n[f][p];return delete n[f][p],g(v,!!i)}return r(e)}},H.createRootURLMiddleware=function(e){return function(n,r){return y(n,(function(n){var t,o=n.url,i=n.path;return"string"==typeof i&&(t=e,-1!==e.indexOf("?")&&(i=i.replace("?","&")),i=i.replace(/^\//,""),"string"==typeof t&&-1!==t.indexOf("?")&&(i=i.replace("?","&")),o=t+i),r(v(v({},n),{},{url:o}))}))}},H.fetchAllMiddleware=j,H.mediaUploadMiddleware=function(e,n){if(!function(e){var n=!!e.method&&"POST"===e.method;return(!!e.path&&-1!==e.path.indexOf("/wp/v2/media")||!!e.url&&-1!==e.url.indexOf("/wp/v2/media"))&&n}(e))return n(e);var r=0,t=function e(t){return r++,n({path:"/wp/v2/media/".concat(t,"/post-process"),method:"POST",data:{action:"create-image-subsizes"},parse:!1}).catch((function(){return r<5?e(t):(n({path:"/wp/v2/media/".concat(t,"?force=true"),method:"DELETE"}),Promise.reject())}))};return n(v(v({},e),{},{parse:!1})).catch((function(n){var r=n.headers.get("x-wp-upload-attachment-id");return n.status>=500&&n.status<600&&r?t(r).catch((function(){return!1!==e.parse?Promise.reject({code:"post_process",message:wp.i18n.__("Media upload failed. If this is a photo or a large image, please scale it down and try again.")}):Promise.reject(n)})):x(n,e.parse)})).then((function(n){return P(n,e.parse)}))},H.createThemePreviewMiddleware=function(e){return function(n,r){if("string"==typeof n.url){var t=(0,d.g)(n.url,"wp_theme_preview");void 0===t?n.url=(0,u.a)(n.url,{wp_theme_preview:e}):""===t&&(n.url=(0,d.r)(n.url,"wp_theme_preview"))}if("string"==typeof n.path){var o=(0,d.g)(n.path,"wp_theme_preview");void 0===o?n.path=(0,u.a)(n.path,{wp_theme_preview:e}):""===o&&(n.path=(0,d.r)(n.path,"wp_theme_preview"))}return r(n)}},H.fetchAllMiddleware=null,H.use(H.createRootURLMiddleware((null===(S=null===(A=null===window||void 0===window?void 0:window.parent)||void 0===A?void 0:A.scData)||void 0===S?void 0:S.root_url)||(null===(E=null===window||void 0===window?void 0:window.scData)||void 0===E?void 0:E.root_url))),(null===(T=null===window||void 0===window?void 0:window.scData)||void 0===T?void 0:T.nonce)&&(H.nonceMiddleware=H.createNonceMiddleware(null===(C=null===window||void 0===window?void 0:window.scData)||void 0===C?void 0:C.nonce),H.use(H.nonceMiddleware)),(null===(M=null===window||void 0===window?void 0:window.scData)||void 0===M?void 0:M.nonce_endpoint)&&(H.nonceEndpoint=null===(I=null===window||void 0===window?void 0:window.scData)||void 0===I?void 0:I.nonce_endpoint),H.use((function(e,n){return e.path=(0,u.a)(e.path,{t:Date.now()}),n(e)})),H.use((function(e,n){var r=n(e);return r.catch((function(e){return"invalid_json"===e.code&&(e.message=wp.i18n.__("The response is not a valid JSON response.","surecart"),e.additional_errors=[{code:"invalid_json",message:wp.i18n.sprintf(/* translators: %s: URL to debug settings page */
wp.i18n.__("Please ensure that your site is not in debug mode as this may interfere with API responses. %s","surecart"),'<a href="'.concat("https://surecart.com/docs/is-not-a-valid-json-response/",'" target="_blank" rel="noopener noreferrer">').concat(wp.i18n.__("More Information","surecart"),"</a>"))}]),"checkout.finalize_error"===e.code&&(e.additional_errors=[{code:"checkout.finalize_error",message:e.message}],e.message=wp.i18n.__("We were not able to process this order","surecart")),Promise.reject(e)})),r}));var J=function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.","surecart")};if((null==e?void 0:e.code)&&(null==e?void 0:e.message))throw e;if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))},W=function(){var e=(0,t.A)(s().mark((function e(n){var r;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,J(n);case 2:if("rest_cookie_invalid_nonce"===(r=e.sent).code){e.next=5;break}throw r;case 5:return e.abrupt("return",window.fetch(H.nonceEndpoint).then((function(e){if(e.status>=200&&e.status<300)return e;throw e})).then((function(e){return e.text()})).then((function(e){H.nonceMiddleware.nonce=e})));case 6:case"end":return e.stop()}}),e)})));return function(n){return e.apply(this,arguments)}}()},3506:function(e,n,r){r.d(n,{g:function(){return o},r:function(){return i}});var t=r(4805);function o(e,n){return(0,t.g)(e)[n]}function i(e){var n=e.indexOf("?");if(-1===n)return e;for(var r=(0,t.g)(e),o=e.substr(0,n),i=arguments.length,a=new Array(i>1?i-1:0),c=1;c<i;c++)a[c-1]=arguments[c];a.forEach((function(e){return delete r[e]}));var s=(0,t.b)(r);return s?o+"?"+s:o}},5812:function(e,n,r){r.r(n),r.d(n,{sc_order_confirmation:function(){return p}});var t=r(467),o=r(3029),i=r(2901),a=r(9280),c=r.n(a),s=r(1346),u=r(3),d=r(6419),l=r(3506),f=r(4805),p=function(){return(0,i.A)((function e(n){(0,o.A)(this,e),(0,s.r)(this,n),this.order=void 0,this.loading=!1,this.error=void 0}),[{key:"componentWillLoad",value:function(){d.U.create(this,this.state()),this.getSession()}},{key:"getSessionId",value:function(){var e;return(null===(e=this.order)||void 0===e?void 0:e.id)?this.order.id:(0,l.g)(window.location.href,"sc_order")}},{key:"getSession",value:(e=(0,t.A)(c().mark((function e(){var n;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(this.getSessionId()){e.next=2;break}return e.abrupt("return");case 2:if(!(null===(n=this.order)||void 0===n?void 0:n.id)){e.next=4;break}return e.abrupt("return");case 4:return e.prev=4,this.loading=!0,e.next=8,(0,u.a)({path:(0,f.a)("surecart/v1/checkouts/".concat(this.getSessionId()),{expand:["line_items","line_item.price","line_item.fees","price.product","customer","customer.shipping_address","payment_intent","discount","manual_payment_method","discount.promotion","billing_address","shipping_address"],refresh_status:!0})});case 8:return e.next=10,e.sent;case 10:this.order=e.sent,e.next=16;break;case 13:e.prev=13,e.t0=e.catch(4),(null===e.t0||void 0===e.t0?void 0:e.t0.message)?this.error=e.t0.message:this.error=wp.i18n.__("Something went wrong","surecart");case 16:return e.prev=16,this.loading=!1,e.finish(16);case 19:case"end":return e.stop()}}),e,this,[[4,13,16,19]])}))),function(){return e.apply(this,arguments)})},{key:"state",value:function(){var e,n,r=null===(e=this.order)||void 0===e?void 0:e.manual_payment_method;return{processor:"stripe",loading:this.loading,orderId:this.getSessionId(),order:this.order,customer:null===(n=this.order)||void 0===n?void 0:n.customer,manualPaymentTitle:null==r?void 0:r.name,manualPaymentInstructions:null==r?void 0:r.instructions}}},{key:"renderOnHold",value:function(){var e,n,r;return"processing"!==(null===(e=this.order)||void 0===e?void 0:e.status)?null:"paypal"===(null===(r=null===(n=null==this?void 0:this.order)||void 0===n?void 0:n.payment_intent)||void 0===r?void 0:r.processor_type)?(0,s.h)("sc-alert",{type:"warning",open:!0},wp.i18n.__("Paypal is taking a closer look at this payment. It’s required for some payments and normally takes up to 3 business days.","surecart")):void 0}},{key:"renderManualInstructions",value:function(){var e,n=null===(e=this.order)||void 0===e?void 0:e.manual_payment_method;if(null==n?void 0:n.instructions)return(0,s.h)("sc-alert",{type:"info",open:!0},(0,s.h)("span",{slot:"title"},null==n?void 0:n.name),(0,s.h)("div",{innerHTML:null==n?void 0:n.instructions}))}},{key:"render",value:function(){var e,n;return(0,s.h)(d.U.Provider,{key:"b659e8338c0273dd7ef253ed4f32464e2146a48b",state:this.state()},(0,s.h)("div",{key:"5d84c1bd84442419ddcb1a982650206689f2058d",class:{"order-confirmation":!0}},(0,s.h)("div",{key:"42624f443d33444d29ec135987f7c849a80ae0b5",class:{"order-confirmation__content":!0,hidden:!(null===(e=this.order)||void 0===e?void 0:e.id)&&!this.loading}},(0,s.h)("sc-order-confirm-components-validator",{key:"641a174a2bd69de8cb9fa8b5075b29f2f4c7e06b",checkout:this.order},(0,s.h)("slot",{key:"8cf3285abdcb9a3ffd37df7af8e974d2f433d8a5"}))),!(null===(n=this.order)||void 0===n?void 0:n.id)&&!this.loading&&(0,s.h)("sc-heading",{key:"315539c145ce66fbff3765f63d39738d1ed969da"},wp.i18n.__("Order not found.","surecart"),(0,s.h)("span",{key:"3981783f698410bdecccc2429bc5a37faef496ef",slot:"description"},wp.i18n.__("This order could not be found. Please try again.","surecart")))))}}]);var e}();p.style=":host{display:block;max-width:800px;margin:auto}::slotted(*:not(:last-child)),sc-form form>*:not(:last-child){margin-bottom:var(--sc-form-row-spacing-large)}.order-confirmation__content{color:var(--sc-order-confirmation-color, var(--sc-color-gray-500))}.order-confirmation__content.hidden{display:none}::part(line-items){display:grid;gap:0.5em}"},6419:function(e,n,r){r.d(n,{U:function(){return c}});var t=r(2284),o=r(1346),i=new Map,a=function(e,n){var r=e.fields,t=e.updater;r.forEach((function(e){t(e,n[e])}))},c={create:function(e,n){var r=(0,o.a)(e),c=new Map,s={wormholes:c,state:n};i.set(e,s);var u=e.connectedCallback;e.connectedCallback=function(){i.set(e,s),u&&u.call(e)};var d=e.disconnectedCallback;e.disconnectedCallback=function(){i.delete(e),d&&d.call(e)},r.addEventListener("openWormhole",(function(e){e.stopPropagation();var n=e.detail,r=n.consumer,o=n.onOpen;if(!c.has(r)){if("symbol"!==(0,t.A)(r)){var i=r.connectedCallback,u=r.disconnectedCallback;r.connectedCallback=function(){c.set(r,e.detail),i&&i.call(r)},r.disconnectedCallback=function(){c.delete(r),u&&u.call(r)}}c.set(r,e.detail),a(e.detail,s.state),null==o||o.resolve((function(){c.delete(r)}))}})),r.addEventListener("closeWormhole",(function(e){var n=e.detail;c.delete(n)}))},Provider:function(e,n){var r=e.state,t=(0,o.g)();if(i.has(t)){var c=i.get(t);c.state=r,c.wormholes.forEach((function(e){a(e,r)}))}return n}}},45:function(e,n,r){r.d(n,{A:function(){return o}});var t=r(8587);function o(e,n){if(null==e)return{};var r,o,i=(0,t.A)(e,n);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(o=0;o<a.length;o++)r=a[o],n.indexOf(r)>=0||{}.propertyIsEnumerable.call(e,r)&&(i[r]=e[r])}return i}},8587:function(e,n,r){function t(e,n){if(null==e)return{};var r={};for(var t in e)if({}.hasOwnProperty.call(e,t)){if(n.indexOf(t)>=0)continue;r[t]=e[t]}return r}r.d(n,{A:function(){return t}})}}]);