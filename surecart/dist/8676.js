"use strict";(self.webpackChunk_surecart_surecart=self.webpackChunk_surecart_surecart||[]).push([[8676],{4805:function(e,r,n){n.d(r,{a:function(){return f},b:function(){return s},g:function(){return l}});var t=n(4467),o=n(296);function a(e,r){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(e);r&&(t=t.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),n.push.apply(n,t)}return n}function i(e){for(var r=1;r<arguments.length;r++){var n=null!=arguments[r]?arguments[r]:{};r%2?a(Object(n),!0).forEach((function(r){(0,t.A)(e,r,n[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))}))}return e}function c(e,r){var n="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!n){if(Array.isArray(e)||(n=function(e,r){if(e){if("string"==typeof e)return u(e,r);var n={}.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?u(e,r):void 0}}(e))||r&&e&&"number"==typeof e.length){n&&(e=n);var _n=0,t=function(){};return{s:t,n:function(){return _n>=e.length?{done:!0}:{done:!1,value:e[_n++]}},e:function(e){throw e},f:t}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,i=!1;return{s:function(){n=n.call(e)},n:function(){var e=n.next();return a=e.done,e},e:function(e){i=!0,o=e},f:function(){try{a||null==n.return||n.return()}finally{if(i)throw o}}}}function u(e,r){(null==r||r>e.length)&&(r=e.length);for(var n=0,t=Array(r);n<r;n++)t[n]=e[n];return t}function s(e){for(var r,n="",t=Object.entries(e);r=t.shift();){var a=r,i=(0,o.A)(a,2),u=i[0],s=i[1];if(Array.isArray(s)||s&&s.constructor===Object){var d,l=c(Object.entries(s).reverse());try{for(l.s();!(d=l.n()).done;){var f=(0,o.A)(d.value,2),p=f[0],h=f[1];t.unshift(["".concat(u,"[").concat(p,"]"),h])}}catch(e){l.e(e)}finally{l.f()}}else void 0!==s&&(null===s&&(s=""),n+="&"+[u,s].map(encodeURIComponent).join("="))}return n.substr(1)}function d(e){try{return decodeURIComponent(e)}catch(r){return e}}function l(e){return(function(e){var r;try{r=new URL(e,"http://example.com").search.substring(1)}catch(e){}if(r)return r}(e)||"").replace(/\+/g,"%20").split("&").reduce((function(e,r){var n=r.split("=").filter(Boolean).map(d),t=(0,o.A)(n,2),a=t[0],c=t[1],u=void 0===c?"":c;return a&&function(e,r,n){for(var t=r.length,o=t-1,a=0;a<t;a++){var c=r[a];!c&&Array.isArray(e)&&(c=e.length.toString()),c=["__proto__","constructor","prototype"].includes(c)?c.toUpperCase():c;var u=!isNaN(Number(r[a+1]));e[c]=a===o?n:e[c]||(u?[]:{}),Array.isArray(e[c])&&!u&&(e[c]=i({},e[c])),e=e[c]}}(e,a.replace(/\]/g,"").split("["),u),e}),Object.create(null))}function f(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",r=arguments.length>1?arguments[1]:void 0;if(!r||!Object.keys(r).length)return e;var n=e,t=e.indexOf("?");return-1!==t&&(r=Object.assign(l(e),r),n=n.substr(0,t)),n+"?"+s(r)}},1889:function(e,r,n){n.d(r,{a:function(){return J},h:function(){return H}});var t=n(467),o=n(45),a=n(296),i=n(4467),c=n(9280),u=n.n(c),s=n(4805),d=n(3506),l=["rest_route"],f=["path","url"],p=["url","path","data","parse"];function h(e,r){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var t=Object.getOwnPropertySymbols(e);r&&(t=t.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),n.push.apply(n,t)}return n}function v(e){for(var r=1;r<arguments.length;r++){var n=null!=arguments[r]?arguments[r]:{};r%2?h(Object(n),!0).forEach((function(r){(0,i.A)(e,r,n[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):h(Object(n)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))}))}return e}function w(e,r){return void 0!==(0,d.g)(e,r)}function m(e){var r=e.split("?"),n=r[1],t=r[0];return n?t+"?"+n.split("&").map((function(e){return e.split("=")})).map((function(e){return e.map(decodeURIComponent)})).sort((function(e,r){return e[0].localeCompare(r[0])})).map((function(e){return e.map(encodeURIComponent)})).map((function(e){return e.join("=")})).join("&"):t}var b=function(e,r){var n,t,o=e.path;return"string"==typeof e.namespace&&"string"==typeof e.endpoint&&(n=e.namespace.replace(/^\/|\/$/g,""),o=(t=e.endpoint.replace(/^\//,""))?n+"/"+t:n),delete e.namespace,delete e.endpoint,r(v(v({},e),{},{path:o}))};function y(e,r){return Promise.resolve(r?e.body:new window.Response(JSON.stringify(e.body),{status:200,statusText:"OK",headers:e.headers}))}var g=function(e){return e.json?e.json():Promise.reject(e)},_=function(e){return function(e){if(!e)return{};var r=e.match(/<([^>]+)>; rel="next"/);return r?{next:r[1]}:{}}(e.headers.get("link")).next},O=function(e){var r=!!e.path&&-1!==e.path.indexOf("per_page=-1"),n=!!e.url&&-1!==e.url.indexOf("per_page=-1");return r||n},j=function(){var e=(0,t.A)(u().mark((function e(r,n){var t,a,i,c,d,l;return u().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!1!==r.parse){e.next=2;break}return e.abrupt("return",n(r));case 2:if(O(r)){e.next=4;break}return e.abrupt("return",n(r));case 4:return e.next=6,J(v(v({},(p={per_page:100},void 0,void 0,h=(u=r).path,w=u.url,v(v({},(0,o.A)(u,f)),{},{url:w&&(0,s.a)(w,p),path:h&&(0,s.a)(h,p)}))),{},{parse:!1}));case 6:return t=e.sent,e.next=9,g(t);case 9:if(a=e.sent,Array.isArray(a)){e.next=12;break}return e.abrupt("return",a);case 12:if(i=_(t)){e.next=15;break}return e.abrupt("return",a);case 15:c=[].concat(a);case 16:if(!i){e.next=27;break}return e.next=19,J(v(v({},r),{},{path:void 0,url:i,parse:!1}));case 19:return d=e.sent,e.next=22,g(d);case 22:l=e.sent,c=c.concat(l),i=_(d),e.next=16;break;case 27:return e.abrupt("return",c);case 28:case"end":return e.stop()}var u,p,h,w}),e)})));return function(_x,r){return e.apply(this,arguments)}}(),k=new Set(["PATCH","PUT","DELETE"]),A=function(e){var r=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];return Promise.resolve(function(e){return arguments.length>1&&void 0!==arguments[1]&&!arguments[1]?e:204===e.status?null:e.json?e.json():Promise.reject(e)}(e,r)).catch((function(e){return P(e,r)}))};function P(e){if(arguments.length>1&&void 0!==arguments[1]&&!arguments[1])throw e;return function(e){var r={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.")};if(!e||!e.json)throw r;return e.json().catch((function(){throw r}))}(e).then((function(e){var r={code:"unknown_error",message:wp.i18n.__("An unknown error occurred.")};throw e||r}))}var x,S,E,T,D,M,U,C={Accept:"application/json, */*;q=0.1"},N={credentials:"include"},I=[function(e,r){return"string"!=typeof e.url||w(e.url,"_locale")||(e.url=(0,s.a)(e.url,{_locale:"user"})),"string"!=typeof e.path||w(e.path,"_locale")||(e.path=(0,s.a)(e.path,{_locale:"user"})),r(e)},b,function(e,r){var n=e.method,t=void 0===n?"GET":n;return k.has(t.toUpperCase())&&(e=v(v({},e),{},{headers:v(v({},e.headers),{},{"X-HTTP-Method-Override":t,"Content-Type":"application/json"}),method:"POST"})),r(e)},j],R=function(e){if(e.status>=200&&e.status<300)return e;throw e},L=function(e){var r=e.url,n=e.path,t=e.data,a=e.parse,i=void 0===a||a,c=(0,o.A)(e,p),u=e.body,s=e.headers;return s=v(v({},C),s),t&&(u=JSON.stringify(t),s["Content-Type"]="application/json"),window.fetch(r||n||window.location.href,v(v(v({},N),c),{},{body:u,headers:s})).then((function(e){return Promise.resolve(e).then(R).catch((function(e){return P(e,i)})).then((function(e){return A(e,i)}))}),(function(e){if(e&&"AbortError"===e.name)throw e;throw{code:"fetch_error",message:wp.i18n.__("You are probably offline.")}}))};function J(e){return I.reduceRight((function(e,r){return function(n){return r(n,e)}}),L)(e).catch((function(r){return"rest_cookie_invalid_nonce"!==r.code?Promise.reject(r):window.fetch(J.nonceEndpoint).then(R).then((function(e){return e.text()})).then((function(r){return J.nonceMiddleware.nonce=r,J(e)}))}))}J.use=function(e){I.unshift(e)},J.setFetchHandler=function(e){L=e},J.createNonceMiddleware=function(e){var r=function e(r,n){var t=r.headers,o=void 0===t?{}:t;for(var a in o)if("x-wp-nonce"===a.toLowerCase()&&o[a]===e.nonce)return n(r);return n(v(v({},r),{},{headers:v(v({},o),{},{"X-WP-Nonce":e.nonce})}))};return r.nonce=e,r},J.createPreloadingMiddleware=function(e){var r=Object.fromEntries(Object.entries(e).map((function(e){var r=(0,a.A)(e,2),n=r[0],t=r[1];return[m(n),t]})));return function(e,n){var t=e.parse,a=void 0===t||t,i=e.path;if(!i&&e.url){var c=(0,s.g)(e.url),u=c.rest_route,d=(0,o.A)(c,l);"string"==typeof u&&(i=(0,s.a)(u,d))}if("string"!=typeof i)return n(e);var f=e.method||"GET",p=m(i);if("GET"===f&&r[p]){var h=r[p];return delete r[p],y(h,!!a)}if("OPTIONS"===f&&r[f]&&r[f][p]){var v=r[f][p];return delete r[f][p],y(v,!!a)}return n(e)}},J.createRootURLMiddleware=function(e){return function(r,n){return b(r,(function(r){var t,o=r.url,a=r.path;return"string"==typeof a&&(t=e,-1!==e.indexOf("?")&&(a=a.replace("?","&")),a=a.replace(/^\//,""),"string"==typeof t&&-1!==t.indexOf("?")&&(a=a.replace("?","&")),o=t+a),n(v(v({},r),{},{url:o}))}))}},J.fetchAllMiddleware=j,J.mediaUploadMiddleware=function(e,r){if(!function(e){var r=!!e.method&&"POST"===e.method;return(!!e.path&&-1!==e.path.indexOf("/wp/v2/media")||!!e.url&&-1!==e.url.indexOf("/wp/v2/media"))&&r}(e))return r(e);var n=0,t=function e(t){return n++,r({path:"/wp/v2/media/".concat(t,"/post-process"),method:"POST",data:{action:"create-image-subsizes"},parse:!1}).catch((function(){return n<5?e(t):(r({path:"/wp/v2/media/".concat(t,"?force=true"),method:"DELETE"}),Promise.reject())}))};return r(v(v({},e),{},{parse:!1})).catch((function(r){var n=r.headers.get("x-wp-upload-attachment-id");return r.status>=500&&r.status<600&&n?t(n).catch((function(){return!1!==e.parse?Promise.reject({code:"post_process",message:wp.i18n.__("Media upload failed. If this is a photo or a large image, please scale it down and try again.")}):Promise.reject(r)})):P(r,e.parse)})).then((function(r){return A(r,e.parse)}))},J.createThemePreviewMiddleware=function(e){return function(r,n){if("string"==typeof r.url){var t=(0,d.g)(r.url,"wp_theme_preview");void 0===t?r.url=(0,s.a)(r.url,{wp_theme_preview:e}):""===t&&(r.url=(0,d.r)(r.url,"wp_theme_preview"))}if("string"==typeof r.path){var o=(0,d.g)(r.path,"wp_theme_preview");void 0===o?r.path=(0,s.a)(r.path,{wp_theme_preview:e}):""===o&&(r.path=(0,d.r)(r.path,"wp_theme_preview"))}return n(r)}},J.fetchAllMiddleware=null,J.use(J.createRootURLMiddleware((null===(S=null===(x=null===window||void 0===window?void 0:window.parent)||void 0===x?void 0:x.scData)||void 0===S?void 0:S.root_url)||(null===(E=null===window||void 0===window?void 0:window.scData)||void 0===E?void 0:E.root_url))),(null===(T=null===window||void 0===window?void 0:window.scData)||void 0===T?void 0:T.nonce)&&(J.nonceMiddleware=J.createNonceMiddleware(null===(D=null===window||void 0===window?void 0:window.scData)||void 0===D?void 0:D.nonce),J.use(J.nonceMiddleware)),(null===(M=null===window||void 0===window?void 0:window.scData)||void 0===M?void 0:M.nonce_endpoint)&&(J.nonceEndpoint=null===(U=null===window||void 0===window?void 0:window.scData)||void 0===U?void 0:U.nonce_endpoint),J.use((function(e,r){return e.path=(0,s.a)(e.path,{t:Date.now()}),r(e)})),J.use((function(e,r){return e.path=(0,s.a)(e.path,v({},!!(0,d.g)(window.location.href,"currency")&&{currency:(0,d.g)(window.location.href,"currency")})),r(e)})),J.use((function(e,r){var n=r(e);return n.catch((function(e){return"invalid_json"===e.code&&(e.message=wp.i18n.__("The response is not a valid JSON response.","surecart"),e.additional_errors=[{code:"invalid_json",message:wp.i18n.sprintf(/* translators: %s: URL to debug settings page */
wp.i18n.__("Please ensure that your site is not in debug mode as this may interfere with API responses. %s","surecart"),'<a href="'.concat("https://surecart.com/docs/is-not-a-valid-json-response/",'" target="_blank" rel="noopener noreferrer">').concat(wp.i18n.__("More Information","surecart"),"</a>"))}]),"checkout.finalize_error"===e.code&&(e.additional_errors=[{code:"checkout.finalize_error",message:e.message}],e.message=wp.i18n.__("We were not able to process this order","surecart")),Promise.reject(e)})),n}));var F=function(e){var r={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.","surecart")};if((null==e?void 0:e.code)&&(null==e?void 0:e.message))throw e;if(!e||!e.json)throw r;return e.json().catch((function(){throw r}))},H=function(){var e=(0,t.A)(u().mark((function e(r){var n;return u().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,F(r);case 2:if("rest_cookie_invalid_nonce"===(n=e.sent).code){e.next=5;break}throw n;case 5:return e.abrupt("return",window.fetch(J.nonceEndpoint).then((function(e){if(e.status>=200&&e.status<300)return e;throw e})).then((function(e){return e.text()})).then((function(e){J.nonceMiddleware.nonce=e})));case 6:case"end":return e.stop()}}),e)})));return function(r){return e.apply(this,arguments)}}()},3506:function(e,r,n){n.d(r,{g:function(){return o},r:function(){return a}});var t=n(4805);function o(e,r){return(0,t.g)(e)[r]}function a(e){var r=e.indexOf("?");if(-1===r)return e;for(var n=(0,t.g)(e),o=e.substr(0,r),a=arguments.length,i=new Array(a>1?a-1:0),c=1;c<a;c++)i[c-1]=arguments[c];i.forEach((function(e){return delete n[e]}));var u=(0,t.b)(n);return u?o+"?"+u:o}},8676:function(e,r,n){n.r(r),n.d(r,{sc_wordpress_user_edit:function(){return d}});var t=n(467),o=n(3029),a=n(2901),i=n(9280),c=n.n(i),u=n(1346),s=n(1889),d=function(){return(0,a.A)((function e(r){(0,o.A)(this,e),(0,u.r)(this,r),this.heading=void 0,this.successUrl=void 0,this.user=void 0,this.loading=void 0,this.error=void 0}),[{key:"renderEmpty",value:function(){return(0,u.h)("slot",{name:"empty"},wp.i18n.__("User not found.","surecart"))}},{key:"handleSubmit",value:(e=(0,t.A)(c().mark((function e(r){var n,t,o,a,i;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return this.loading=!0,e.prev=1,e.next=4,r.target.getFormJson();case 4:return n=e.sent,t=n.email,o=n.first_name,a=n.last_name,i=n.name,e.next=11,(0,s.a)({path:"wp/v2/users/me",method:"PATCH",data:{first_name:o,last_name:a,email:t,name:i}});case 11:this.successUrl?window.location.assign(this.successUrl):this.loading=!1,e.next=18;break;case 14:e.prev=14,e.t0=e.catch(1),this.error=(null===e.t0||void 0===e.t0?void 0:e.t0.message)||wp.i18n.__("Something went wrong","surecart"),this.loading=!1;case 18:case"end":return e.stop()}}),e,this,[[1,14]])}))),function(_x){return e.apply(this,arguments)})},{key:"render",value:function(){var e,r,n,t,o=this;return(0,u.h)("sc-dashboard-module",{key:"a422ba1c2c1db4ed6e679a7df550166caed0c3e2",class:"account-details",error:this.error},(0,u.h)("span",{key:"8b2162a34f54e40b4c2ae5b5e052b854497cbea3",slot:"heading"},this.heading||wp.i18n.__("Account Details","surecart")," "),(0,u.h)("sc-card",{key:"de88b6807a5421cf9e609ad3a53563f8867bb4ca"},(0,u.h)("sc-form",{key:"cf27c3856c9d83654901e62ddc8d10e9bd0b70b3",onScFormSubmit:function(e){return o.handleSubmit(e)}},(0,u.h)("sc-input",{key:"dc6a23f37ec0f66bc62c752286c7931eb1b9050d",label:wp.i18n.__("Account Email","surecart"),name:"email",value:null===(e=this.user)||void 0===e?void 0:e.email,required:!0}),(0,u.h)("sc-columns",{key:"2984ad09bac241bf613b2c1829f71cd339c13271",style:{"--sc-column-spacing":"var(--sc-spacing-medium)"}},(0,u.h)("sc-column",{key:"9dcfc93f2f09eb6fa1892542e13a100015af79a4"},(0,u.h)("sc-input",{key:"8d7e7aa6283d33846754ed1ceb7440e092b86b06",label:wp.i18n.__("First Name","surecart"),name:"first_name",value:null===(r=this.user)||void 0===r?void 0:r.first_name})),(0,u.h)("sc-column",{key:"c4b9439106b37d6efe311e73498f66c77d43ba87"},(0,u.h)("sc-input",{key:"c28492cf80de562e6ff1bfe214082f988f662c8a",label:wp.i18n.__("Last Name","surecart"),name:"last_name",value:null===(n=this.user)||void 0===n?void 0:n.last_name}))),(0,u.h)("sc-input",{key:"6e9452110a8bfaa8a4eaf30baeaa84261643bfeb",label:wp.i18n.__("Display Name","surecart"),name:"name",value:null===(t=this.user)||void 0===t?void 0:t.display_name}),(0,u.h)("div",{key:"a32f6a1a72b1491da99aa9dfdd2af470a8e0aa5f"},(0,u.h)("sc-button",{key:"04b889c2844159f03c9da35e88d8f0f776201ef1",type:"primary",full:!0,submit:!0},wp.i18n.__("Save","surecart"))))),this.loading&&(0,u.h)("sc-block-ui",{key:"c4532c6c5190036149955417180b03f82e476de0",spinner:!0}))}}]);var e}();d.style=":host{display:block;position:relative}.customer-details{display:grid;gap:0.75em}"},45:function(e,r,n){n.d(r,{A:function(){return o}});var t=n(8587);function o(e,r){if(null==e)return{};var n,o,a=(0,t.A)(e,r);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(o=0;o<i.length;o++)n=i[o],r.indexOf(n)>=0||{}.propertyIsEnumerable.call(e,n)&&(a[n]=e[n])}return a}},8587:function(e,r,n){function t(e,r){if(null==e)return{};var n={};for(var t in e)if({}.hasOwnProperty.call(e,t)){if(r.indexOf(t)>=0)continue;n[t]=e[t]}return n}n.d(r,{A:function(){return t}})}}]);