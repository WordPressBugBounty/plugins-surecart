"use strict";(self.webpackChunk_surecart_surecart=self.webpackChunk_surecart_surecart||[]).push([[839],{4805:function(e,n,t){t.d(n,{a:function(){return p},b:function(){return u},g:function(){return l}});var r=t(4467),i=t(296);function o(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function a(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?o(Object(t),!0).forEach((function(n){(0,r.A)(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):o(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function c(e,n){var t="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!t){if(Array.isArray(e)||(t=function(e,n){if(e){if("string"==typeof e)return s(e,n);var t={}.toString.call(e).slice(8,-1);return"Object"===t&&e.constructor&&(t=e.constructor.name),"Map"===t||"Set"===t?Array.from(e):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?s(e,n):void 0}}(e))||n&&e&&"number"==typeof e.length){t&&(e=t);var _n=0,r=function(){};return{s:r,n:function(){return _n>=e.length?{done:!0}:{done:!1,value:e[_n++]}},e:function(e){throw e},f:r}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,o=!0,a=!1;return{s:function(){t=t.call(e)},n:function(){var e=t.next();return o=e.done,e},e:function(e){a=!0,i=e},f:function(){try{o||null==t.return||t.return()}finally{if(a)throw i}}}}function s(e,n){(null==n||n>e.length)&&(n=e.length);for(var t=0,r=Array(n);t<n;t++)r[t]=e[t];return r}function u(e){for(var n,t="",r=Object.entries(e);n=r.shift();){var o=n,a=(0,i.A)(o,2),s=a[0],u=a[1];if(Array.isArray(u)||u&&u.constructor===Object){var d,l=c(Object.entries(u).reverse());try{for(l.s();!(d=l.n()).done;){var p=(0,i.A)(d.value,2),f=p[0],h=p[1];r.unshift(["".concat(s,"[").concat(f,"]"),h])}}catch(e){l.e(e)}finally{l.f()}}else void 0!==u&&(null===u&&(u=""),t+="&"+[s,u].map(encodeURIComponent).join("="))}return t.substr(1)}function d(e){try{return decodeURIComponent(e)}catch(n){return e}}function l(e){return(function(e){var n;try{n=new URL(e,"http://example.com").search.substring(1)}catch(e){}if(n)return n}(e)||"").replace(/\+/g,"%20").split("&").reduce((function(e,n){var t=n.split("=").filter(Boolean).map(d),r=(0,i.A)(t,2),o=r[0],c=r[1],s=void 0===c?"":c;return o&&function(e,n,t){for(var r=n.length,i=r-1,o=0;o<r;o++){var c=n[o];!c&&Array.isArray(e)&&(c=e.length.toString()),c=["__proto__","constructor","prototype"].includes(c)?c.toUpperCase():c;var s=!isNaN(Number(n[o+1]));e[c]=o===i?t:e[c]||(s?[]:{}),Array.isArray(e[c])&&!s&&(e[c]=a({},e[c])),e=e[c]}}(e,o.replace(/\]/g,"").split("["),s),e}),Object.create(null))}function p(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",n=arguments.length>1?arguments[1]:void 0;if(!n||!Object.keys(n).length)return e;var t=e,r=e.indexOf("?");return-1!==r&&(n=Object.assign(l(e),n),t=t.substr(0,r)),t+"?"+u(n)}},1889:function(e,n,t){t.d(n,{a:function(){return L},h:function(){return z}});var r=t(467),i=t(45),o=t(296),a=t(4467),c=t(9280),s=t.n(c),u=t(4805),d=t(3506),l=["rest_route"],p=["path","url"],f=["url","path","data","parse"];function h(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function v(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?h(Object(t),!0).forEach((function(n){(0,a.A)(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):h(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function b(e,n){return void 0!==(0,d.g)(e,n)}function m(e){var n=e.split("?"),t=n[1],r=n[0];return t?r+"?"+t.split("&").map((function(e){return e.split("=")})).map((function(e){return e.map(decodeURIComponent)})).sort((function(e,n){return e[0].localeCompare(n[0])})).map((function(e){return e.map(encodeURIComponent)})).map((function(e){return e.join("=")})).join("&"):r}var _=function(e,n){var t,r,i=e.path;return"string"==typeof e.namespace&&"string"==typeof e.endpoint&&(t=e.namespace.replace(/^\/|\/$/g,""),i=(r=e.endpoint.replace(/^\//,""))?t+"/"+r:t),delete e.namespace,delete e.endpoint,n(v(v({},e),{},{path:i}))};function g(e,n){return Promise.resolve(n?e.body:new window.Response(JSON.stringify(e.body),{status:200,statusText:"OK",headers:e.headers}))}var w=function(e){return e.json?e.json():Promise.reject(e)},y=function(e){return function(e){if(!e)return{};var n=e.match(/<([^>]+)>; rel="next"/);return n?{next:n[1]}:{}}(e.headers.get("link")).next},O=function(e){var n=!!e.path&&-1!==e.path.indexOf("per_page=-1"),t=!!e.url&&-1!==e.url.indexOf("per_page=-1");return n||t},j=function(){var e=(0,r.A)(s().mark((function e(n,t){var r,o,a,c,d,l;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!1!==n.parse){e.next=2;break}return e.abrupt("return",t(n));case 2:if(O(n)){e.next=4;break}return e.abrupt("return",t(n));case 4:return e.next=6,L(v(v({},(f={per_page:100},void 0,void 0,h=(s=n).path,b=s.url,v(v({},(0,i.A)(s,p)),{},{url:b&&(0,u.a)(b,f),path:h&&(0,u.a)(h,f)}))),{},{parse:!1}));case 6:return r=e.sent,e.next=9,w(r);case 9:if(o=e.sent,Array.isArray(o)){e.next=12;break}return e.abrupt("return",o);case 12:if(a=y(r)){e.next=15;break}return e.abrupt("return",o);case 15:c=[].concat(o);case 16:if(!a){e.next=27;break}return e.next=19,L(v(v({},n),{},{path:void 0,url:a,parse:!1}));case 19:return d=e.sent,e.next=22,w(d);case 22:l=e.sent,c=c.concat(l),a=y(d),e.next=16;break;case 27:return e.abrupt("return",c);case 28:case"end":return e.stop()}var s,f,h,b}),e)})));return function(_x,n){return e.apply(this,arguments)}}(),k=new Set(["PATCH","PUT","DELETE"]),P=function(e){var n=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];return Promise.resolve(function(e){return arguments.length>1&&void 0!==arguments[1]&&!arguments[1]?e:204===e.status?null:e.json?e.json():Promise.reject(e)}(e,n)).catch((function(e){return x(e,n)}))};function x(e){if(arguments.length>1&&void 0!==arguments[1]&&!arguments[1])throw e;return function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.")};if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))}(e).then((function(e){var n={code:"unknown_error",message:wp.i18n.__("An unknown error occurred.")};throw e||n}))}var A,S,D,E,T,C,M,N={Accept:"application/json, */*;q=0.1"},U={credentials:"include"},F=[function(e,n){return"string"!=typeof e.url||b(e.url,"_locale")||(e.url=(0,u.a)(e.url,{_locale:"user"})),"string"!=typeof e.path||b(e.path,"_locale")||(e.path=(0,u.a)(e.path,{_locale:"user"})),n(e)},_,function(e,n){var t=e.method,r=void 0===t?"GET":t;return k.has(r.toUpperCase())&&(e=v(v({},e),{},{headers:v(v({},e.headers),{},{"X-HTTP-Method-Override":r,"Content-Type":"application/json"}),method:"POST"})),n(e)},j],I=function(e){if(e.status>=200&&e.status<300)return e;throw e},R=function(e){var n=e.url,t=e.path,r=e.data,o=e.parse,a=void 0===o||o,c=(0,i.A)(e,f),s=e.body,u=e.headers;return u=v(v({},N),u),r&&(s=JSON.stringify(r),u["Content-Type"]="application/json"),window.fetch(n||t||window.location.href,v(v(v({},U),c),{},{body:s,headers:u})).then((function(e){return Promise.resolve(e).then(I).catch((function(e){return x(e,a)})).then((function(e){return P(e,a)}))}),(function(e){if(e&&"AbortError"===e.name)throw e;throw{code:"fetch_error",message:wp.i18n.__("You are probably offline.")}}))};function L(e){return F.reduceRight((function(e,n){return function(t){return n(t,e)}}),R)(e).catch((function(n){return"rest_cookie_invalid_nonce"!==n.code?Promise.reject(n):window.fetch(L.nonceEndpoint).then(I).then((function(e){return e.text()})).then((function(n){return L.nonceMiddleware.nonce=n,L(e)}))}))}L.use=function(e){F.unshift(e)},L.setFetchHandler=function(e){R=e},L.createNonceMiddleware=function(e){var n=function e(n,t){var r=n.headers,i=void 0===r?{}:r;for(var o in i)if("x-wp-nonce"===o.toLowerCase()&&i[o]===e.nonce)return t(n);return t(v(v({},n),{},{headers:v(v({},i),{},{"X-WP-Nonce":e.nonce})}))};return n.nonce=e,n},L.createPreloadingMiddleware=function(e){var n=Object.fromEntries(Object.entries(e).map((function(e){var n=(0,o.A)(e,2),t=n[0],r=n[1];return[m(t),r]})));return function(e,t){var r=e.parse,o=void 0===r||r,a=e.path;if(!a&&e.url){var c=(0,u.g)(e.url),s=c.rest_route,d=(0,i.A)(c,l);"string"==typeof s&&(a=(0,u.a)(s,d))}if("string"!=typeof a)return t(e);var p=e.method||"GET",f=m(a);if("GET"===p&&n[f]){var h=n[f];return delete n[f],g(h,!!o)}if("OPTIONS"===p&&n[p]&&n[p][f]){var v=n[p][f];return delete n[p][f],g(v,!!o)}return t(e)}},L.createRootURLMiddleware=function(e){return function(n,t){return _(n,(function(n){var r,i=n.url,o=n.path;return"string"==typeof o&&(r=e,-1!==e.indexOf("?")&&(o=o.replace("?","&")),o=o.replace(/^\//,""),"string"==typeof r&&-1!==r.indexOf("?")&&(o=o.replace("?","&")),i=r+o),t(v(v({},n),{},{url:i}))}))}},L.fetchAllMiddleware=j,L.mediaUploadMiddleware=function(e,n){if(!function(e){var n=!!e.method&&"POST"===e.method;return(!!e.path&&-1!==e.path.indexOf("/wp/v2/media")||!!e.url&&-1!==e.url.indexOf("/wp/v2/media"))&&n}(e))return n(e);var t=0,r=function e(r){return t++,n({path:"/wp/v2/media/".concat(r,"/post-process"),method:"POST",data:{action:"create-image-subsizes"},parse:!1}).catch((function(){return t<5?e(r):(n({path:"/wp/v2/media/".concat(r,"?force=true"),method:"DELETE"}),Promise.reject())}))};return n(v(v({},e),{},{parse:!1})).catch((function(n){var t=n.headers.get("x-wp-upload-attachment-id");return n.status>=500&&n.status<600&&t?r(t).catch((function(){return!1!==e.parse?Promise.reject({code:"post_process",message:wp.i18n.__("Media upload failed. If this is a photo or a large image, please scale it down and try again.")}):Promise.reject(n)})):x(n,e.parse)})).then((function(n){return P(n,e.parse)}))},L.createThemePreviewMiddleware=function(e){return function(n,t){if("string"==typeof n.url){var r=(0,d.g)(n.url,"wp_theme_preview");void 0===r?n.url=(0,u.a)(n.url,{wp_theme_preview:e}):""===r&&(n.url=(0,d.r)(n.url,"wp_theme_preview"))}if("string"==typeof n.path){var i=(0,d.g)(n.path,"wp_theme_preview");void 0===i?n.path=(0,u.a)(n.path,{wp_theme_preview:e}):""===i&&(n.path=(0,d.r)(n.path,"wp_theme_preview"))}return t(n)}},L.fetchAllMiddleware=null,L.use(L.createRootURLMiddleware((null===(S=null===(A=null===window||void 0===window?void 0:window.parent)||void 0===A?void 0:A.scData)||void 0===S?void 0:S.root_url)||(null===(D=null===window||void 0===window?void 0:window.scData)||void 0===D?void 0:D.root_url))),(null===(E=null===window||void 0===window?void 0:window.scData)||void 0===E?void 0:E.nonce)&&(L.nonceMiddleware=L.createNonceMiddleware(null===(T=null===window||void 0===window?void 0:window.scData)||void 0===T?void 0:T.nonce),L.use(L.nonceMiddleware)),(null===(C=null===window||void 0===window?void 0:window.scData)||void 0===C?void 0:C.nonce_endpoint)&&(L.nonceEndpoint=null===(M=null===window||void 0===window?void 0:window.scData)||void 0===M?void 0:M.nonce_endpoint),L.use((function(e,n){return e.path=(0,u.a)(e.path,{t:Date.now()}),n(e)})),L.use((function(e,n){return e.path=(0,u.a)(e.path,v({},!!(0,d.g)(window.location.href,"currency")&&{currency:(0,d.g)(window.location.href,"currency")})),n(e)})),L.use((function(e,n){var t=n(e);return t.catch((function(e){return"invalid_json"===e.code&&(e.message=wp.i18n.__("The response is not a valid JSON response.","surecart"),e.additional_errors=[{code:"invalid_json",message:wp.i18n.sprintf(/* translators: %s: URL to debug settings page */
wp.i18n.__("Please ensure that your site is not in debug mode as this may interfere with API responses. %s","surecart"),'<a href="'.concat("https://surecart.com/docs/is-not-a-valid-json-response/",'" target="_blank" rel="noopener noreferrer">').concat(wp.i18n.__("More Information","surecart"),"</a>"))}]),"checkout.finalize_error"===e.code&&(e.additional_errors=[{code:"checkout.finalize_error",message:e.message}],e.message=wp.i18n.__("We were not able to process this order","surecart")),Promise.reject(e)})),t}));var J=function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.","surecart")};if((null==e?void 0:e.code)&&(null==e?void 0:e.message))throw e;if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))},z=function(){var e=(0,r.A)(s().mark((function e(n){var t;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,J(n);case 2:if("rest_cookie_invalid_nonce"===(t=e.sent).code){e.next=5;break}throw t;case 5:return e.abrupt("return",window.fetch(L.nonceEndpoint).then((function(e){if(e.status>=200&&e.status<300)return e;throw e})).then((function(e){return e.text()})).then((function(e){L.nonceMiddleware.nonce=e})));case 6:case"end":return e.stop()}}),e)})));return function(n){return e.apply(this,arguments)}}()},3506:function(e,n,t){t.d(n,{g:function(){return i},r:function(){return o}});var r=t(4805);function i(e,n){return(0,r.g)(e)[n]}function o(e){var n=e.indexOf("?");if(-1===n)return e;for(var t=(0,r.g)(e),i=e.substr(0,n),o=arguments.length,a=new Array(o>1?o-1:0),c=1;c<o;c++)a[c-1]=arguments[c];a.forEach((function(e){return delete t[e]}));var s=(0,r.b)(t);return s?i+"?"+s:i}},839:function(e,n,t){t.r(n),t.d(n,{sc_customer_edit:function(){return h}});var r=t(4467),i=t(467),o=t(3029),a=t(2901),c=t(9280),s=t.n(c),u=t(1346),d=t(1889),l=t(4805);function p(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function f(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?p(Object(t),!0).forEach((function(n){(0,r.A)(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):p(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}var h=function(){return(0,a.A)((function e(n){(0,o.A)(this,e),(0,u.r)(this,n),this.heading=void 0,this.customer=void 0,this.successUrl=void 0,this.i18n=void 0,this.loading=void 0,this.error=void 0}),[{key:"handleSubmit",value:(e=(0,i.A)(s().mark((function e(n){var t,r,i,o,a,c,u,p,h,v,b,m,_,g,w,y,O,j,k,P,x;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return this.loading=!0,e.prev=1,e.next=4,n.target.getFormJson();case 4:return r=e.sent,i=r.email,o=r.first_name,a=r.last_name,c=r.phone,u=r.billing_matches_shipping,p=r.shipping_name,h=r.shipping_city,v=r["tax_identifier.number_type"],b=r["tax_identifier.number"],m=r.shipping_country,_=r.shipping_line_1,g=r.shipping_postal_code,w=r.shipping_state,y=r.billing_name,O=r.billing_city,j=r.billing_country,k=r.billing_line_1,P=r.billing_postal_code,x=r.billing_state,this.customer.billing_address={name:y,city:O,country:j,line_1:k,postal_code:P,state:x},this.customer.shipping_address={name:p,city:h,country:m,line_1:_,postal_code:g,state:w},e.next=28,(0,d.a)({path:(0,l.a)("surecart/v1/customers/".concat(null===(t=this.customer)||void 0===t?void 0:t.id),{expand:["tax_identifier"]}),method:"PATCH",data:f({email:i,first_name:o,last_name:a,phone:c,billing_matches_shipping:!0===u||"on"===u,shipping_address:this.customer.shipping_address,billing_address:this.customer.billing_address},b&&v?{tax_identifier:{number:b,number_type:v}}:{})});case 28:this.successUrl?window.location.assign(this.successUrl):this.loading=!1,e.next=35;break;case 31:e.prev=31,e.t0=e.catch(1),this.error=(null===e.t0||void 0===e.t0?void 0:e.t0.message)||wp.i18n.__("Something went wrong","surecart"),this.loading=!1;case 35:case"end":return e.stop()}}),e,this,[[1,31]])}))),function(_x){return e.apply(this,arguments)})},{key:"render",value:function(){var e,n,t,r,i,o,a,c,s,d,l,p,h,v,b,m,_=this;return(0,u.h)("sc-dashboard-module",{key:"07d114eecf30ed395330b5b7ddfff3541ba48215",class:"customer-edit",error:this.error},(0,u.h)("span",{key:"25deba97c1c5fcc1b9b0c34e3f46eedbf745b6cc",slot:"heading"},this.heading||wp.i18n.__("Update Billing Details","surecart")," ",!(null===(e=null==this?void 0:this.customer)||void 0===e?void 0:e.live_mode)&&(0,u.h)("sc-tag",{key:"41a3e98fc997d2f3ca4117841087c34e0e039f87",type:"warning",size:"small"},wp.i18n.__("Test","surecart"))),(0,u.h)("sc-card",{key:"37385a6d04e6900e32d18703d74a96d3bd8ee6bd"},(0,u.h)("sc-form",{key:"095458517efb9e61bb94958528a0d775e5098f05",onScFormSubmit:function(e){return _.handleSubmit(e)}},(0,u.h)("sc-columns",{key:"06cb728f04a862bc4b74a7ed471c51154530b6b8",style:{"--sc-column-spacing":"var(--sc-spacing-medium)"}},(0,u.h)("sc-column",{key:"0aabe9befbf0112295f034d342b3fe05f5ac8fb6"},(0,u.h)("sc-input",{key:"0400d0b331f925421183e22d07f463ff0e00a9cc",label:wp.i18n.__("First Name","surecart"),name:"first_name",value:null===(n=this.customer)||void 0===n?void 0:n.first_name})),(0,u.h)("sc-column",{key:"908c5dbb5f5f5e45eaa2e8b47007e9f82e1fd931"},(0,u.h)("sc-input",{key:"f8b956292d5a78f56389c55063a3b68c035d4470",label:wp.i18n.__("Last Name","surecart"),name:"last_name",value:null===(t=this.customer)||void 0===t?void 0:t.last_name}))),(0,u.h)("sc-column",{key:"460a4ecc86a062a38c93563c20aad606e71d01f7"},(0,u.h)("sc-phone-input",{key:"2f2efc02eaee34d6522307521e80cc3df5fba816",label:wp.i18n.__("Phone","surecart"),name:"phone",value:null===(r=this.customer)||void 0===r?void 0:r.phone})),(0,u.h)("sc-flex",{key:"0edd0a2bdb4ab388cf942a54c433e6e0246fe815",style:{"--sc-flex-column-gap":"var(--sc-spacing-medium)"},flexDirection:"column"},(0,u.h)("div",{key:"f781c94e47d9cd8ae82f63e74b909a624667cf6b"},(0,u.h)("sc-address",{key:"916a6f1d6fe5291db5933f36b7f0180d833fbfee",label:wp.i18n.__("Shipping Address","surecart"),showName:!0,address:f({},null===(i=this.customer)||void 0===i?void 0:i.shipping_address),required:!1,names:{name:"shipping_name",country:"shipping_country",line_1:"shipping_line_1",line_2:"shipping_line_2",city:"shipping_city",postal_code:"shipping_postal_code",state:"shipping_state"},defaultCountryFields:(null===(o=this.i18n)||void 0===o?void 0:o.defaultCountryFields)||[],countryFields:(null===(a=this.i18n)||void 0===a?void 0:a.countryFields)||[]})),(0,u.h)("div",{key:"851a39f20aafbb11113b44b49a81b7886d256666"},(0,u.h)("sc-checkbox",{key:"2b2eae9c38bfb7de09481fb96318b989838db0b0",name:"billing_matches_shipping",checked:null===(c=this.customer)||void 0===c?void 0:c.billing_matches_shipping,onScChange:function(e){_.customer=f(f({},_.customer),{},{billing_matches_shipping:e.target.checked})},value:"on"},wp.i18n.__("Billing address is same as shipping","surecart"))),(0,u.h)("div",{key:"6d2a3164b9ec45f2b432f0b3b4a6bfd4e3c66f0a",style:{display:(null===(s=this.customer)||void 0===s?void 0:s.billing_matches_shipping)?"none":"block"}},(0,u.h)("sc-address",{key:"0df99157b0882a3f8754f4a42bff2fa5fe3991d4",label:wp.i18n.__("Billing Address","surecart"),showName:!0,address:f({},null===(d=this.customer)||void 0===d?void 0:d.billing_address),names:{name:"billing_name",country:"billing_country",line_1:"billing_line_1",line_2:"billing_line_2",city:"billing_city",postal_code:"billing_postal_code",state:"billing_state"},required:!0,defaultCountryFields:(null===(l=this.i18n)||void 0===l?void 0:l.defaultCountryFields)||[],countryFields:(null===(p=this.i18n)||void 0===p?void 0:p.countryFields)||[]})),(0,u.h)("sc-tax-id-input",{key:"51da03a5430806d612e4a4673a5761f3d2e08d21",show:!0,number:null===(v=null===(h=this.customer)||void 0===h?void 0:h.tax_identifier)||void 0===v?void 0:v.number,type:null===(m=null===(b=this.customer)||void 0===b?void 0:b.tax_identifier)||void 0===m?void 0:m.number_type})),(0,u.h)("div",{key:"a12a0ed5c3bc1694285b52ab56c3d11f7a138118"},(0,u.h)("sc-button",{key:"32a2d734470fecbee07ee8a546ddd178fd96c644",type:"primary",full:!0,submit:!0},wp.i18n.__("Save","surecart"))))),this.loading&&(0,u.h)("sc-block-ui",{key:"3f85836c69662242a912e2f93843005b91da0871",spinner:!0}))}}]);var e}();h.style=":host{display:block;position:relative}.customer-edit{display:grid;gap:0.75em}"},45:function(e,n,t){t.d(n,{A:function(){return i}});var r=t(8587);function i(e,n){if(null==e)return{};var t,i,o=(0,r.A)(e,n);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(i=0;i<a.length;i++)t=a[i],n.indexOf(t)>=0||{}.propertyIsEnumerable.call(e,t)&&(o[t]=e[t])}return o}},8587:function(e,n,t){function r(e,n){if(null==e)return{};var t={};for(var r in e)if({}.hasOwnProperty.call(e,r)){if(n.indexOf(r)>=0)continue;t[r]=e[r]}return t}t.d(n,{A:function(){return r}})}}]);