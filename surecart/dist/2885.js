"use strict";(self.webpackChunk_surecart_surecart=self.webpackChunk_surecart_surecart||[]).push([[2885],{4805:function(e,n,t){t.d(n,{a:function(){return p},b:function(){return u},g:function(){return l}});var r=t(4467),i=t(296);function o(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function a(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?o(Object(t),!0).forEach((function(n){(0,r.A)(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):o(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function c(e,n){var t="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!t){if(Array.isArray(e)||(t=function(e,n){if(e){if("string"==typeof e)return s(e,n);var t={}.toString.call(e).slice(8,-1);return"Object"===t&&e.constructor&&(t=e.constructor.name),"Map"===t||"Set"===t?Array.from(e):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?s(e,n):void 0}}(e))||n&&e&&"number"==typeof e.length){t&&(e=t);var _n=0,r=function(){};return{s:r,n:function(){return _n>=e.length?{done:!0}:{done:!1,value:e[_n++]}},e:function(e){throw e},f:r}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,o=!0,a=!1;return{s:function(){t=t.call(e)},n:function(){var e=t.next();return o=e.done,e},e:function(e){a=!0,i=e},f:function(){try{o||null==t.return||t.return()}finally{if(a)throw i}}}}function s(e,n){(null==n||n>e.length)&&(n=e.length);for(var t=0,r=Array(n);t<n;t++)r[t]=e[t];return r}function u(e){for(var n,t="",r=Object.entries(e);n=r.shift();){var o=n,a=(0,i.A)(o,2),s=a[0],u=a[1];if(Array.isArray(u)||u&&u.constructor===Object){var d,l=c(Object.entries(u).reverse());try{for(l.s();!(d=l.n()).done;){var p=(0,i.A)(d.value,2),f=p[0],v=p[1];r.unshift(["".concat(s,"[").concat(f,"]"),v])}}catch(e){l.e(e)}finally{l.f()}}else void 0!==u&&(null===u&&(u=""),t+="&"+[s,u].map(encodeURIComponent).join("="))}return t.substr(1)}function d(e){try{return decodeURIComponent(e)}catch(n){return e}}function l(e){return(function(e){var n;try{n=new URL(e,"http://example.com").search.substring(1)}catch(e){}if(n)return n}(e)||"").replace(/\+/g,"%20").split("&").reduce((function(e,n){var t=n.split("=").filter(Boolean).map(d),r=(0,i.A)(t,2),o=r[0],c=r[1],s=void 0===c?"":c;return o&&function(e,n,t){for(var r=n.length,i=r-1,o=0;o<r;o++){var c=n[o];!c&&Array.isArray(e)&&(c=e.length.toString()),c=["__proto__","constructor","prototype"].includes(c)?c.toUpperCase():c;var s=!isNaN(Number(n[o+1]));e[c]=o===i?t:e[c]||(s?[]:{}),Array.isArray(e[c])&&!s&&(e[c]=a({},e[c])),e=e[c]}}(e,o.replace(/\]/g,"").split("["),s),e}),Object.create(null))}function p(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",n=arguments.length>1?arguments[1]:void 0;if(!n||!Object.keys(n).length)return e;var t=e,r=e.indexOf("?");return-1!==r&&(n=Object.assign(l(e),n),t=t.substr(0,r)),t+"?"+u(n)}},488:function(e,n,t){t.d(n,{i:function(){return o},m:function(){return i},z:function(){return r}});var r=["bif","byr","clp","djf","gnf","isk","jpy","kmf","krw","pyg","rwf","ugx","vnd","vuv","xaf","xag","xau","xba","xbb","xbc","xbd","xdr","xof","xpd","xpf","xpt","xts"],i=function(e,n){return o(n)?e:e/100},o=function(e){var n;return r.includes(null===(n=null==e?void 0:e.toLowerCase)||void 0===n?void 0:n.call(e))}},1889:function(e,n,t){t.d(n,{a:function(){return F},h:function(){return z}});var r=t(467),i=t(45),o=t(296),a=t(4467),c=t(9280),s=t.n(c),u=t(4805),d=t(3506),l=["rest_route"],p=["path","url"],f=["url","path","data","parse"];function v(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function h(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?v(Object(t),!0).forEach((function(n){(0,a.A)(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):v(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function _(e,n){return void 0!==(0,d.g)(e,n)}function w(e){var n=e.split("?"),t=n[1],r=n[0];return t?r+"?"+t.split("&").map((function(e){return e.split("=")})).map((function(e){return e.map(decodeURIComponent)})).sort((function(e,n){return e[0].localeCompare(n[0])})).map((function(e){return e.map(encodeURIComponent)})).map((function(e){return e.join("=")})).join("&"):r}var b=function(e,n){var t,r,i=e.path;return"string"==typeof e.namespace&&"string"==typeof e.endpoint&&(t=e.namespace.replace(/^\/|\/$/g,""),i=(r=e.endpoint.replace(/^\//,""))?t+"/"+r:t),delete e.namespace,delete e.endpoint,n(h(h({},e),{},{path:i}))};function g(e,n){return Promise.resolve(n?e.body:new window.Response(JSON.stringify(e.body),{status:200,statusText:"OK",headers:e.headers}))}var y=function(e){return e.json?e.json():Promise.reject(e)},m=function(e){return function(e){if(!e)return{};var n=e.match(/<([^>]+)>; rel="next"/);return n?{next:n[1]}:{}}(e.headers.get("link")).next},x=function(e){var n=!!e.path&&-1!==e.path.indexOf("per_page=-1"),t=!!e.url&&-1!==e.url.indexOf("per_page=-1");return n||t},k=function(){var e=(0,r.A)(s().mark((function e(n,t){var r,o,a,c,d,l;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!1!==n.parse){e.next=2;break}return e.abrupt("return",t(n));case 2:if(x(n)){e.next=4;break}return e.abrupt("return",t(n));case 4:return e.next=6,F(h(h({},(f={per_page:100},void 0,void 0,v=(s=n).path,_=s.url,h(h({},(0,i.A)(s,p)),{},{url:_&&(0,u.a)(_,f),path:v&&(0,u.a)(v,f)}))),{},{parse:!1}));case 6:return r=e.sent,e.next=9,y(r);case 9:if(o=e.sent,Array.isArray(o)){e.next=12;break}return e.abrupt("return",o);case 12:if(a=m(r)){e.next=15;break}return e.abrupt("return",o);case 15:c=[].concat(o);case 16:if(!a){e.next=27;break}return e.next=19,F(h(h({},n),{},{path:void 0,url:a,parse:!1}));case 19:return d=e.sent,e.next=22,y(d);case 22:l=e.sent,c=c.concat(l),a=m(d),e.next=16;break;case 27:return e.abrupt("return",c);case 28:case"end":return e.stop()}var s,f,v,_}),e)})));return function(_x,n){return e.apply(this,arguments)}}(),O=new Set(["PATCH","PUT","DELETE"]),P=function(e){var n=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];return Promise.resolve(function(e){return arguments.length>1&&void 0!==arguments[1]&&!arguments[1]?e:204===e.status?null:e.json?e.json():Promise.reject(e)}(e,n)).catch((function(e){return j(e,n)}))};function j(e){if(arguments.length>1&&void 0!==arguments[1]&&!arguments[1])throw e;return function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.")};if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))}(e).then((function(e){var n={code:"unknown_error",message:wp.i18n.__("An unknown error occurred.")};throw e||n}))}var A,T,S,C,U,M,R,D={Accept:"application/json, */*;q=0.1"},N={credentials:"include"},E=[function(e,n){return"string"!=typeof e.url||_(e.url,"_locale")||(e.url=(0,u.a)(e.url,{_locale:"user"})),"string"!=typeof e.path||_(e.path,"_locale")||(e.path=(0,u.a)(e.path,{_locale:"user"})),n(e)},b,function(e,n){var t=e.method,r=void 0===t?"GET":t;return O.has(r.toUpperCase())&&(e=h(h({},e),{},{headers:h(h({},e.headers),{},{"X-HTTP-Method-Override":r,"Content-Type":"application/json"}),method:"POST"})),n(e)},k],I=function(e){if(e.status>=200&&e.status<300)return e;throw e},X=function(e){var n=e.url,t=e.path,r=e.data,o=e.parse,a=void 0===o||o,c=(0,i.A)(e,f),s=e.body,u=e.headers;return u=h(h({},D),u),r&&(s=JSON.stringify(r),u["Content-Type"]="application/json"),window.fetch(n||t||window.location.href,h(h(h({},N),c),{},{body:s,headers:u})).then((function(e){return Promise.resolve(e).then(I).catch((function(e){return j(e,a)})).then((function(e){return P(e,a)}))}),(function(e){if(e&&"AbortError"===e.name)throw e;throw{code:"fetch_error",message:wp.i18n.__("You are probably offline.")}}))};function F(e){return E.reduceRight((function(e,n){return function(t){return n(t,e)}}),X)(e).catch((function(n){return"rest_cookie_invalid_nonce"!==n.code?Promise.reject(n):window.fetch(F.nonceEndpoint).then(I).then((function(e){return e.text()})).then((function(n){return F.nonceMiddleware.nonce=n,F(e)}))}))}F.use=function(e){E.unshift(e)},F.setFetchHandler=function(e){X=e},F.createNonceMiddleware=function(e){var n=function e(n,t){var r=n.headers,i=void 0===r?{}:r;for(var o in i)if("x-wp-nonce"===o.toLowerCase()&&i[o]===e.nonce)return t(n);return t(h(h({},n),{},{headers:h(h({},i),{},{"X-WP-Nonce":e.nonce})}))};return n.nonce=e,n},F.createPreloadingMiddleware=function(e){var n=Object.fromEntries(Object.entries(e).map((function(e){var n=(0,o.A)(e,2),t=n[0],r=n[1];return[w(t),r]})));return function(e,t){var r=e.parse,o=void 0===r||r,a=e.path;if(!a&&e.url){var c=(0,u.g)(e.url),s=c.rest_route,d=(0,i.A)(c,l);"string"==typeof s&&(a=(0,u.a)(s,d))}if("string"!=typeof a)return t(e);var p=e.method||"GET",f=w(a);if("GET"===p&&n[f]){var v=n[f];return delete n[f],g(v,!!o)}if("OPTIONS"===p&&n[p]&&n[p][f]){var h=n[p][f];return delete n[p][f],g(h,!!o)}return t(e)}},F.createRootURLMiddleware=function(e){return function(n,t){return b(n,(function(n){var r,i=n.url,o=n.path;return"string"==typeof o&&(r=e,-1!==e.indexOf("?")&&(o=o.replace("?","&")),o=o.replace(/^\//,""),"string"==typeof r&&-1!==r.indexOf("?")&&(o=o.replace("?","&")),i=r+o),t(h(h({},n),{},{url:i}))}))}},F.fetchAllMiddleware=k,F.mediaUploadMiddleware=function(e,n){if(!function(e){var n=!!e.method&&"POST"===e.method;return(!!e.path&&-1!==e.path.indexOf("/wp/v2/media")||!!e.url&&-1!==e.url.indexOf("/wp/v2/media"))&&n}(e))return n(e);var t=0,r=function e(r){return t++,n({path:"/wp/v2/media/".concat(r,"/post-process"),method:"POST",data:{action:"create-image-subsizes"},parse:!1}).catch((function(){return t<5?e(r):(n({path:"/wp/v2/media/".concat(r,"?force=true"),method:"DELETE"}),Promise.reject())}))};return n(h(h({},e),{},{parse:!1})).catch((function(n){var t=n.headers.get("x-wp-upload-attachment-id");return n.status>=500&&n.status<600&&t?r(t).catch((function(){return!1!==e.parse?Promise.reject({code:"post_process",message:wp.i18n.__("Media upload failed. If this is a photo or a large image, please scale it down and try again.")}):Promise.reject(n)})):j(n,e.parse)})).then((function(n){return P(n,e.parse)}))},F.createThemePreviewMiddleware=function(e){return function(n,t){if("string"==typeof n.url){var r=(0,d.g)(n.url,"wp_theme_preview");void 0===r?n.url=(0,u.a)(n.url,{wp_theme_preview:e}):""===r&&(n.url=(0,d.r)(n.url,"wp_theme_preview"))}if("string"==typeof n.path){var i=(0,d.g)(n.path,"wp_theme_preview");void 0===i?n.path=(0,u.a)(n.path,{wp_theme_preview:e}):""===i&&(n.path=(0,d.r)(n.path,"wp_theme_preview"))}return t(n)}},F.fetchAllMiddleware=null,F.use(F.createRootURLMiddleware((null===(T=null===(A=null===window||void 0===window?void 0:window.parent)||void 0===A?void 0:A.scData)||void 0===T?void 0:T.root_url)||(null===(S=null===window||void 0===window?void 0:window.scData)||void 0===S?void 0:S.root_url))),(null===(C=null===window||void 0===window?void 0:window.scData)||void 0===C?void 0:C.nonce)&&(F.nonceMiddleware=F.createNonceMiddleware(null===(U=null===window||void 0===window?void 0:window.scData)||void 0===U?void 0:U.nonce),F.use(F.nonceMiddleware)),(null===(M=null===window||void 0===window?void 0:window.scData)||void 0===M?void 0:M.nonce_endpoint)&&(F.nonceEndpoint=null===(R=null===window||void 0===window?void 0:window.scData)||void 0===R?void 0:R.nonce_endpoint),F.use((function(e,n){return e.path=(0,u.a)(e.path,{t:Date.now()}),n(e)})),F.use((function(e,n){return e.path=(0,u.a)(e.path,h({},!!(0,d.g)(window.location.href,"currency")&&{currency:(0,d.g)(window.location.href,"currency")})),n(e)})),F.use((function(e,n){var t=n(e);return t.catch((function(e){return"invalid_json"===e.code&&(e.message=wp.i18n.__("The response is not a valid JSON response.","surecart"),e.additional_errors=[{code:"invalid_json",message:wp.i18n.sprintf(/* translators: %s: URL to debug settings page */
wp.i18n.__("Please ensure that your site is not in debug mode as this may interfere with API responses. %s","surecart"),'<a href="'.concat("https://surecart.com/docs/is-not-a-valid-json-response/",'" target="_blank" rel="noopener noreferrer">').concat(wp.i18n.__("More Information","surecart"),"</a>"))}]),"checkout.finalize_error"===e.code&&(e.additional_errors=[{code:"checkout.finalize_error",message:e.message}],e.message=wp.i18n.__("We were not able to process this order","surecart")),Promise.reject(e)})),t}));var Y=function(e){var n={code:"invalid_json",message:wp.i18n.__("The response is not a valid JSON response.","surecart")};if((null==e?void 0:e.code)&&(null==e?void 0:e.message))throw e;if(!e||!e.json)throw n;return e.json().catch((function(){throw n}))},z=function(){var e=(0,r.A)(s().mark((function e(n){var t;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,Y(n);case 2:if("rest_cookie_invalid_nonce"===(t=e.sent).code){e.next=5;break}throw t;case 5:return e.abrupt("return",window.fetch(F.nonceEndpoint).then((function(e){if(e.status>=200&&e.status<300)return e;throw e})).then((function(e){return e.text()})).then((function(e){F.nonceMiddleware.nonce=e})));case 6:case"end":return e.stop()}}),e)})));return function(n){return e.apply(this,arguments)}}()},8796:function(e,n,t){t.d(n,{a:function(){return i},b:function(){return p},c:function(){return a},g:function(){return o},i:function(){return s},p:function(){return l},t:function(){return c}});var r=t(488),i=function(e){return(null==e?void 0:e.amount_off)&&(null==e?void 0:e.currency)?o({amount:e.amount_off,currency:e.currency}):(null==e?void 0:e.percent_off)?wp.i18n.sprintf(wp.i18n.__("%1d%% off","surecart"),0|e.percent_off):""},o=function(e){var n=e.amount,t=e.currency,i=function(e,n){return r.z.includes(n)?e:e/100}(n,t);return"".concat(new Intl.NumberFormat(void 0,{style:"currency",currency:t}).format(parseFloat(i.toFixed(2))))},a=function(){var e,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"usd";return null===(e=new Intl.NumberFormat(void 0,{style:"currency",currency:n}).formatToParts().find((function(e){return"currency"===e.type})))||void 0===e?void 0:e.value},c=function(e,n){var t=arguments.length>2&&void 0!==arguments[2]?arguments[2]:wp.i18n.__("every","surecart"),r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:wp.i18n.__("once","surecart"),i=arguments.length>4&&void 0!==arguments[4]&&arguments[4];switch(n){case"day":return"".concat(t," ").concat(wp.i18n.sprintf(i?wp.i18n._n("%d day","%d days",e,"surecart"):wp.i18n._n("day","%d days",e,"surecart"),e));case"week":return"".concat(t," ").concat(wp.i18n.sprintf(i?wp.i18n._n("%d week","%d weeks",e,"surecart"):wp.i18n._n("week","%d weeks",e,"surecart"),e));case"month":return"".concat(t," ").concat(wp.i18n.sprintf(i?wp.i18n._n("%d month","%d months",e,"surecart"):wp.i18n._n("month","%d months",e,"surecart"),e));case"year":return"".concat(t," ").concat(wp.i18n.sprintf(i?wp.i18n._n("%d year","%d years",e,"surecart"):wp.i18n._n("year","%d years",e,"surecart"),e));default:return r}},s=function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(!e)return"";var t=n.showOnce,r=n.labels,i=n.abbreviate,o=(r||{}).interval,a=void 0===o?wp.i18n.__("every","surecart"):o;return"".concat(u(e,a,t?wp.i18n.__("once","surecart"):"",i)," ").concat(d(e,i))},u=function(e,n){var t=arguments.length>2&&void 0!==arguments[2]?arguments[2]:wp.i18n.__("once","surecart"),r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];return e.recurring_interval_count&&e.recurring_interval&&1!==(null==e?void 0:e.recurring_period_count)?r?function(e,n){var t=arguments.length>2&&void 0!==arguments[2]?arguments[2]:wp.i18n.__("once","surecart"),r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];switch(n){case"day":return" / ".concat(wp.i18n.sprintf(r?wp.i18n._n("%d day","%d days",e,"surecart"):wp.i18n._n("day","%d days",e,"surecart"),e));case"week":return" / ".concat(wp.i18n.sprintf(r?wp.i18n._n("%d wk","%d wks",e,"surecart"):wp.i18n._n("wk","%d wks",e,"surecart"),e));case"month":return" / ".concat(wp.i18n.sprintf(r?wp.i18n._n("%d mo","%d months",e,"surecart"):wp.i18n._n("mo","%d mos",e,"surecart"),e));case"year":return" / ".concat(wp.i18n.sprintf(r?wp.i18n._n("%d yr","%d yrs",e,"surecart"):wp.i18n._n("yr","%d yrs",e,"surecart"),e));default:return t}}(e.recurring_interval_count,e.recurring_interval,t):c(e.recurring_interval_count,e.recurring_interval," ".concat(n),t):""},d=function(e){var n=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return(null==e?void 0:e.recurring_period_count)&&1!==(null==e?void 0:e.recurring_period_count)?n?"x ".concat(e.recurring_period_count):" (".concat(wp.i18n.sprintf(wp.i18n._n("%d payment","%d payments",e.recurring_period_count,"surecart"),e.recurring_period_count),")"):""},l=function(e){var n;return e?"".concat(null===(n=null==e?void 0:e.product)||void 0===n?void 0:n.name," ").concat((null==e?void 0:e.name)?"— ".concat(e.name):""):""},p=function(e){switch(e){case"invalid":return wp.i18n.__("Not valid","surecart");case"expired":return wp.i18n.__("Expired","surecart");case"gone":return wp.i18n.__("Not available","surecart");case"less_than_min_subtotal_amount":return wp.i18n.__("Minimum not met","surecart");case"greater_than_max_subtotal_amount":return wp.i18n.__("Order too large","surecart");case"not_applicable":return wp.i18n.__("Product(s) not eligible","surecart");case"not_applicable_to_customer":return wp.i18n.__("Not eligible","surecart");case"":return"";default:return wp.i18n.__("Not redeemable","surecart")}}},3506:function(e,n,t){t.d(n,{g:function(){return i},r:function(){return o}});var r=t(4805);function i(e,n){return(0,r.g)(e)[n]}function o(e){var n=e.indexOf("?");if(-1===n)return e;for(var t=(0,r.g)(e),i=e.substr(0,n),o=arguments.length,a=new Array(o>1?o-1:0),c=1;c<o;c++)a[c-1]=arguments[c];a.forEach((function(e){return delete t[e]}));var s=(0,r.b)(t);return s?i+"?"+s:i}},2885:function(e,n,t){t.r(n),t.d(n,{sc_subscription_details:function(){return f},sc_subscription_status_badge:function(){return v}});var r=t(467),i=t(3029),o=t(2901),a=t(9280),c=t.n(a),s=t(1346),u=t(1889),d=t(8796),l=t(4805),p=function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return new Intl.NumberFormat([],{style:"currency",currency:n.toUpperCase(),currencyDisplay:"symbol"}).format(function(e,n){return["BIF","BYR","CLP","DJF","GNF","ISK","JPY","KMF","KRW","PYG","RWF","UGX","VND","VUV","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XDR","XOF","XPD","XPF","XPT","XTS"].includes(null==n?void 0:n.toUpperCase())?e:e/100}(e,n.toUpperCase()))},f=function(){return(0,o.A)((function e(n){(0,i.A)(this,e),(0,s.r)(this,n),this.subscription=void 0,this.pendingPrice=void 0,this.hideRenewalText=void 0,this.activationsModal=void 0,this.loading=void 0,this.hasPendingUpdate=void 0}),[{key:"renderName",value:function(){var e,n,t;return"string"!=typeof(null===(n=null===(e=this.subscription)||void 0===e?void 0:e.price)||void 0===n?void 0:n.product)?(0,d.p)(null===(t=this.subscription)||void 0===t?void 0:t.price):wp.i18n.__("Subscription","surecart")}},{key:"handleSubscriptionChange",value:(n=(0,r.A)(c().mark((function e(){var n,t,r,i;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(this.hasPendingUpdate=!!(null===(t=Object.keys((null===(n=null==this?void 0:this.subscription)||void 0===n?void 0:n.pending_update)||{}))||void 0===t?void 0:t.length),!(null===(i=null===(r=null==this?void 0:this.subscription)||void 0===r?void 0:r.pending_update)||void 0===i?void 0:i.price)||(null==this?void 0:this.pendingPrice)||this.hideRenewalText){e.next=5;break}return e.next=4,this.fetchPrice(this.subscription.pending_update.price);case 4:this.pendingPrice=e.sent;case 5:case"end":return e.stop()}}),e,this)}))),function(){return n.apply(this,arguments)})},{key:"componentWillLoad",value:function(){this.handleSubscriptionChange()}},{key:"fetchPrice",value:(e=(0,r.A)(c().mark((function e(n){var t;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.prev=0,this.loading=!0,e.next=4,(0,u.a)({path:(0,l.a)("surecart/v1/prices/".concat(n),{expand:["product"]})});case 4:return t=e.sent,e.abrupt("return",t);case 8:e.prev=8,e.t0=e.catch(0),console.error(e.t0);case 11:return e.prev=11,this.loading=!1,e.finish(11);case 14:case"end":return e.stop()}}),e,this,[[0,8,11,14]])}))),function(n){return e.apply(this,arguments)})},{key:"renderRenewalText",value:function(){var e,n,t,r,i,o,a,c,u,l,f,v,h,_,w,b,g,y,m,x,k,_x,O,P=(0,s.h)("sc-subscription-status-badge",{subscription:null==this?void 0:this.subscription});return(null===(e=null==this?void 0:this.subscription)||void 0===e?void 0:e.cancel_at_period_end)&&(null===(n=null==this?void 0:this.subscription)||void 0===n?void 0:n.current_period_end_at)?(0,s.h)("span",{"aria-label":wp.i18n.sprintf(/* translators: %s: current period end date */
wp.i18n.__("Renewal Update - Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date)},P," ",/* translators: %s: current period end date */
wp.i18n.sprintf(wp.i18n.__("Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date)):this.hasPendingUpdate?this.pendingPrice||(null===(r=null===(t=this.subscription)||void 0===t?void 0:t.pending_update)||void 0===r?void 0:r.ad_hoc_amount)?(null===(o=null===(i=this.subscription)||void 0===i?void 0:i.pending_update)||void 0===o?void 0:o.ad_hoc_amount)?(0,s.h)("span",{"aria-label":wp.i18n.sprintf(/* translators: 1: new price, 2: current period end date */
wp.i18n.__("Renewal Update - Your plan switches to %1s on %2s","surecart"),p(null===(c=null===(a=this.subscription)||void 0===a?void 0:a.pending_update)||void 0===c?void 0:c.ad_hoc_amount,(null===(u=this.pendingPrice)||void 0===u?void 0:u.currency)||(null===(f=null===(l=this.subscription)||void 0===l?void 0:l.price)||void 0===f?void 0:f.currency)),this.subscription.current_period_end_at_date)},wp.i18n.__("Your plan switches to","surecart")," ",(0,s.h)("strong",null,(0,s.h)("sc-format-number",{type:"currency",currency:(null===(v=this.pendingPrice)||void 0===v?void 0:v.currency)||(null===(_=null===(h=this.subscription)||void 0===h?void 0:h.price)||void 0===_?void 0:_.currency),value:null===(b=null===(w=this.subscription)||void 0===w?void 0:w.pending_update)||void 0===b?void 0:b.ad_hoc_amount})," ",(0,d.i)(this.pendingPrice||(null===(g=this.subscription)||void 0===g?void 0:g.price)))," ",wp.i18n.__("on","surecart")," ",this.subscription.current_period_end_at_date):(0,s.h)("span",{"aria-label":wp.i18n.sprintf(/* translators: 1: new plan name, 2: current period end date */
wp.i18n.__("Renewal Update - Your plan switches to %1s on %2s","surecart"),this.pendingPrice.product.name,this.subscription.current_period_end_at_date)},wp.i18n.__("Your plan switches to","surecart")," ",(0,s.h)("strong",null,this.pendingPrice.product.name)," ",wp.i18n.__("on","surecart")," ",this.subscription.current_period_end_at_date):(0,s.h)("sc-skeleton",null):"trialing"===(null===(y=null==this?void 0:this.subscription)||void 0===y?void 0:y.status)&&(null===(m=null==this?void 0:this.subscription)||void 0===m?void 0:m.trial_end_at)?(0,s.h)("span",{"aria-label":wp.i18n.sprintf(/* translators: %s: trial end date */
wp.i18n.__("Renewal Update - Your plan begins on %s.","surecart"),this.subscription.trial_end_at_date)},P," ",wp.i18n.sprintf(/* translators: %s: trial end date */
wp.i18n.__("Your plan begins on %s","surecart"),null===(x=null==this?void 0:this.subscription)||void 0===x?void 0:x.trial_end_at_date)):"active"===(null===(k=this.subscription)||void 0===k?void 0:k.status)&&(null===(_x=this.subscription)||void 0===_x?void 0:_x.current_period_end_at)?(0,s.h)("span",{"aria-label":wp.i18n.sprintf(/* translators: %s: current period end date */
wp.i18n.__("Renewal Update - Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date)},P," ",null===(null===(O=this.subscription)||void 0===O?void 0:O.remaining_period_count)?/* translators: %s: current period end date */
wp.i18n.sprintf(wp.i18n.__("Your plan renews on %s","surecart"),this.subscription.current_period_end_at_date):/* translators: %s: current period end date */
wp.i18n.sprintf(wp.i18n.__("Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date)):P}},{key:"getActivations",value:function(){var e,n,t,r;return((null===(r=null===(t=null===(n=null===(e=this.subscription)||void 0===e?void 0:e.purchase)||void 0===n?void 0:n.license)||void 0===t?void 0:t.activations)||void 0===r?void 0:r.data)||[]).filter((function(e){return null==e?void 0:e.counted}))}},{key:"renderActivations",value:function(){var e,n=this,t=this.getActivations();return(null==t?void 0:t.length)?(0,s.h)("sc-flex",{justifyContent:"flex-start",alignItems:"center"},(0,s.h)("sc-tag",{size:"small"},null===(e=null==t?void 0:t[0])||void 0===e?void 0:e.name),(null==t?void 0:t.length)>1&&(0,s.h)("sc-text",{style:{"--font-size":"var(--sc-font-size-small)",cursor:"pointer"},onClick:function(e){e.preventDefault(),e.stopImmediatePropagation(),n.activationsModal=!0}},"+ ",(null==t?void 0:t.length)-1," More")):null}},{key:"showWarning",value:function(){var e,n,t,r,i,o,a;return!(null===(e=this.subscription)||void 0===e?void 0:e.payment_method)&&!this.subscription.manual_payment&&!!["active","past_due","unpaid","incomplete"].includes(null===(n=this.subscription)||void 0===n?void 0:n.status)&&((null===(r=null===(t=this.subscription)||void 0===t?void 0:t.price)||void 0===r?void 0:r.ad_hoc)?0!==(null===(i=this.subscription)||void 0===i?void 0:i.ad_hoc_amount):0!==(null===(a=null===(o=this.subscription)||void 0===o?void 0:o.price)||void 0===a?void 0:a.amount))}},{key:"render",value:function(){var e=this;return(0,s.h)("div",{key:"e640f90fc526a25d04e1158799925e35add636bf",class:"subscription-details"},this.hasPendingUpdate&&(0,s.h)("div",{key:"0e7e066677cee4db69c50fa0ddf39dd98980b3bf"},(0,s.h)("sc-tag",{key:"62a14d0f7a21916cc2b2beac59677606ebd34af8",size:"small",type:"warning"},wp.i18n.__("Update Scheduled","surecart"))),(0,s.h)("sc-flex",{key:"53aadf662a0b9e7636533c5826c33d64f1e23c69",alignItems:"center",justifyContent:"flex-start"},(0,s.h)("sc-text",{key:"3413194d4aa83659d5cade9febcc186ba15ea5c3","aria-label":wp.i18n.sprintf(/* translators: %s: plan name */
wp.i18n.__("Plan name - %s","surecart"),this.renderName()),style:{"--font-weight":"var(--sc-font-weight-bold)"}},this.renderName()),this.renderActivations()),!this.hideRenewalText&&(0,s.h)("div",{key:"21c1b05e817851a95e7271db5aa15224e6fc8a63"},this.renderRenewalText()," "),(0,s.h)("slot",{key:"151181ebd2a31a01d1add55346e5f8b3fba50ff6"}),(0,s.h)("sc-dialog",{key:"78878beecf0c04c8344b820a6b27bdc31bf4ce78",label:wp.i18n.__("Activations","surecart"),onScRequestClose:function(){return e.activationsModal=!1},open:!!this.activationsModal},(0,s.h)("sc-card",{key:"02d8fa942bb4489c8941c4e990410b59630b7c70","no-padding":!0,style:{"--overflow":"hidden"}},(0,s.h)("sc-stacked-list",{key:"e920f9f546dbdfd4b9c6b27c4948090d37414794"},(this.getActivations()||[]).map((function(e){return(0,s.h)("sc-stacked-list-row",{style:{"--columns":"2"},mobileSize:0},(0,s.h)("sc-text",{style:{"--line-height":"var(--sc-line-height-dense)"}},(0,s.h)("strong",null,null==e?void 0:e.name),(0,s.h)("div",null,(0,s.h)("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},null==e?void 0:e.fingerprint))),(0,s.h)("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},null==e?void 0:e.created_at_date))}))))),this.showWarning()&&(0,s.h)("div",{key:"257a053e6a6b7ecf3c9644808e2cc4b95eb69d80"},(0,s.h)("sc-tag",{key:"fdba4baf6e5bf62047e9bd984f88220b92063abe",type:"warning"},(0,s.h)("div",{key:"b9784536b215cc8057e89ca8041453aade15ae26",class:"subscription-details__missing-method"},(0,s.h)("sc-icon",{key:"23f26265d946a4a8d7475f15a1e41cce92124ba9",name:"alert-triangle"}),wp.i18n.__("Payment Method Missing","surecart")))))}}],[{key:"watchers",get:function(){return{subscription:["handleSubscriptionChange"]}}}]);var e,n}();f.style=":host{display:block}.subscription-details{display:grid;gap:0.25em;color:var(--sc-input-label-color)}.subscription-details__missing-method{display:flex;align-items:center;gap:var(--sc-spacing-x-small)}";var v=function(){return(0,o.A)((function e(n){(0,i.A)(this,e),(0,s.r)(this,n),this.status=void 0,this.subscription=void 0,this.size="medium",this.pill=!1,this.clearable=!1}),[{key:"getType",value:function(){var e,n,t;if(null===(e=this.subscription)||void 0===e?void 0:e.cancel_at_period_end)return"info";switch(this.status||(null===(n=this.subscription)||void 0===n?void 0:n.status)){case"incomplete":case"past_due":case"unpaid":return"warning";case"trialing":return"info";case"active":case"completed":return"success";case"canceled":return(null===(t=this.subscription)||void 0===t?void 0:t.restore_at)?"info":"danger"}}},{key:"getText",value:function(){var e,n,t,r,i;if((null===(e=this.subscription)||void 0===e?void 0:e.cancel_at_period_end)&&this.subscription.current_period_end_at&&"canceled"!==(null===(n=this.subscription)||void 0===n?void 0:n.status))return(0,s.h)(s.F,null,(null===(t=this.subscription)||void 0===t?void 0:t.restore_at)?wp.i18n.__("Pauses","surecart"):wp.i18n.__("Cancels","surecart")," ",this.subscription.current_period_end_at_date);switch(this.status||(null===(r=this.subscription)||void 0===r?void 0:r.status)){case"incomplete":return wp.i18n.__("Incomplete","surecart");case"trialing":return wp.i18n.__("Trialing","surecart");case"active":return wp.i18n.__("Active","surecart");case"past_due":return wp.i18n.__("Past Due","surecart");case"canceled":return(null===(i=this.subscription)||void 0===i?void 0:i.restore_at)?"Paused":wp.i18n.__("Canceled","surecart");case"completed":return wp.i18n.__("Completed","surecart");case"unpaid":return wp.i18n.__("Unpaid","surecart")}}},{key:"render",value:function(){return(0,s.h)("sc-tag",{key:"c054cba164edd310a201a47dc43defefeeba8e77","aria-label":wp.i18n.sprintf(wp.i18n.__("Plan Status - %s","surecart"),this.getText()),type:this.getType()},this.getText())}}])}();v.style=":host{display:inline-block}"},45:function(e,n,t){t.d(n,{A:function(){return i}});var r=t(8587);function i(e,n){if(null==e)return{};var t,i,o=(0,r.A)(e,n);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(i=0;i<a.length;i++)t=a[i],n.indexOf(t)>=0||{}.propertyIsEnumerable.call(e,t)&&(o[t]=e[t])}return o}},8587:function(e,n,t){function r(e,n){if(null==e)return{};var t={};for(var r in e)if({}.hasOwnProperty.call(e,r)){if(n.indexOf(r)>=0)continue;t[r]=e[r]}return t}t.d(n,{A:function(){return r}})}}]);