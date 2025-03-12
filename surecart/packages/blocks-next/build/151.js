"use strict";(self.webpackChunk_surecart_blocks_next=self.webpackChunk_surecart_blocks_next||[]).push([[151],{3530:function(r,t,e){e.d(t,{i:function(){return s},m:function(){return i},z:function(){return n}});const n=["bif","byr","clp","djf","gnf","isk","jpy","kmf","krw","pyg","rwf","ugx","vnd","vuv","xaf","xag","xau","xba","xbb","xbc","xbd","xdr","xof","xpd","xpf","xpt","xts"],i=(r,t)=>s(t)?r:r/100,s=r=>{var t;return n.includes(null===(t=null==r?void 0:r.toLowerCase)||void 0===t?void 0:t.call(r))}},9955:function(r,t,e){e.d(t,{_:function(){return __},a:function(){return _n},b:function(){return _x},s:function(){return o}});var n,i=e(4777),s={};n=s,function(){var r={not_string:/[^s]/,not_bool:/[^t]/,not_type:/[^T]/,not_primitive:/[^v]/,number:/[diefg]/,numeric_arg:/[bcdiefguxX]/,json:/[j]/,not_json:/[^j]/,text:/^[^\x25]+/,modulo:/^\x25{2}/,placeholder:/^\x25(?:([1-9]\d*)\$|\(([^)]+)\))?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-gijostTuvxX])/,key:/^([a-z_][a-z_\d]*)/i,key_access:/^\.([a-z_][a-z_\d]*)/i,index_access:/^\[(\d+)\]/,sign:/^[+-]/};function t(e){return function(e,n){var i,s,a,o,c,u,l,d,p,h=1,f=e.length,_="";for(s=0;s<f;s++)if("string"==typeof e[s])_+=e[s];else if("object"==typeof e[s]){if((o=e[s]).keys)for(i=n[h],a=0;a<o.keys.length;a++){if(null==i)throw new Error(t('[sprintf] Cannot access property "%s" of undefined value "%s"',o.keys[a],o.keys[a-1]));i=i[o.keys[a]]}else i=o.param_no?n[o.param_no]:n[h++];if(r.not_type.test(o.type)&&r.not_primitive.test(o.type)&&i instanceof Function&&(i=i()),r.numeric_arg.test(o.type)&&"number"!=typeof i&&isNaN(i))throw new TypeError(t("[sprintf] expecting number but found %T",i));switch(r.number.test(o.type)&&(d=i>=0),o.type){case"b":i=parseInt(i,10).toString(2);break;case"c":i=String.fromCharCode(parseInt(i,10));break;case"d":case"i":i=parseInt(i,10);break;case"j":i=JSON.stringify(i,null,o.width?parseInt(o.width):0);break;case"e":i=o.precision?parseFloat(i).toExponential(o.precision):parseFloat(i).toExponential();break;case"f":i=o.precision?parseFloat(i).toFixed(o.precision):parseFloat(i);break;case"g":i=o.precision?String(Number(i.toPrecision(o.precision))):parseFloat(i);break;case"o":i=(parseInt(i,10)>>>0).toString(8);break;case"s":i=String(i),i=o.precision?i.substring(0,o.precision):i;break;case"t":i=String(!!i),i=o.precision?i.substring(0,o.precision):i;break;case"T":i=Object.prototype.toString.call(i).slice(8,-1).toLowerCase(),i=o.precision?i.substring(0,o.precision):i;break;case"u":i=parseInt(i,10)>>>0;break;case"v":i=i.valueOf(),i=o.precision?i.substring(0,o.precision):i;break;case"x":i=(parseInt(i,10)>>>0).toString(16);break;case"X":i=(parseInt(i,10)>>>0).toString(16).toUpperCase()}r.json.test(o.type)?_+=i:(!r.number.test(o.type)||d&&!o.sign?p="":(p=d?"+":"-",i=i.toString().replace(r.sign,"")),u=o.pad_char?"0"===o.pad_char?"0":o.pad_char.charAt(1):" ",l=o.width-(p+i).length,c=o.width&&l>0?u.repeat(l):"",_+=o.align?p+i+c:"0"===u?p+c+i:c+p+i)}return _}(function(t){if(i[t])return i[t];for(var e,n=t,s=[],a=0;n;){if(null!==(e=r.text.exec(n)))s.push(e[0]);else if(null!==(e=r.modulo.exec(n)))s.push("%");else{if(null===(e=r.placeholder.exec(n)))throw new SyntaxError("[sprintf] unexpected placeholder");if(e[2]){a|=1;var o=[],c=e[2],u=[];if(null===(u=r.key.exec(c)))throw new SyntaxError("[sprintf] failed to parse named argument key");for(o.push(u[1]);""!==(c=c.substring(u[0].length));)if(null!==(u=r.key_access.exec(c)))o.push(u[1]);else{if(null===(u=r.index_access.exec(c)))throw new SyntaxError("[sprintf] failed to parse named argument key");o.push(u[1])}e[2]=o}else a|=2;if(3===a)throw new Error("[sprintf] mixing positional and named placeholders is not (yet) supported");s.push({placeholder:e[0],param_no:e[1],keys:e[2],sign:e[3],pad_char:e[4],align:e[5],width:e[6],precision:e[7],type:e[8]})}n=n.substring(e[0].length)}return i[t]=s}(e),arguments)}function e(r,e){return t.apply(null,[r].concat(e||[]))}var i=Object.create(null);n.sprintf=t,n.vsprintf=e,"undefined"!=typeof window&&(window.sprintf=t,window.vsprintf=e)}();const a=function(r,t){var e,n,i=0;function s(){var s,a,o=e,c=arguments.length;r:for(;o;){if(o.args.length===arguments.length){for(a=0;a<c;a++)if(o.args[a]!==arguments[a]){o=o.next;continue r}return o!==e&&(o===n&&(n=o.prev),o.prev.next=o.next,o.next&&(o.next.prev=o.prev),o.next=e,o.prev=null,e.prev=o,e=o),o.val}o=o.next}for(s=new Array(c),a=0;a<c;a++)s[a]=arguments[a];return o={args:s,val:r.apply(null,s)},e?(e.prev=o,o.next=e):n=o,i===t.maxSize?(n=n.prev).next=null:i++,e=o,o.val}return t=t||{},s.clear=function(){e=null,n=null,i=0},s}(console.error);function o(r,...t){try{return s.sprintf(r,...t)}catch(t){return t instanceof Error&&a("sprintf error: \n\n"+t.toString()),r}}var c,u,l,d;c={"(":9,"!":8,"*":7,"/":7,"%":7,"+":6,"-":6,"<":5,"<=":5,">":5,">=":5,"==":4,"!=":4,"&&":3,"||":2,"?":1,"?:":1},u=["(","?"],l={")":["("],":":["?","?:"]},d=/<=|>=|==|!=|&&|\|\||\?:|\(|!|\*|\/|%|\+|-|<|>|\?|\)|:/;var p={"!":function(r){return!r},"*":function(r,t){return r*t},"/":function(r,t){return r/t},"%":function(r,t){return r%t},"+":function(r,t){return r+t},"-":function(r,t){return r-t},"<":function(r,t){return r<t},"<=":function(r,t){return r<=t},">":function(r,t){return r>t},">=":function(r,t){return r>=t},"==":function(r,t){return r===t},"!=":function(r,t){return r!==t},"&&":function(r,t){return r&&t},"||":function(r,t){return r||t},"?:":function(r,t,e){if(r)throw t;return e}};var h={contextDelimiter:"",onMissingKey:null};function f(r,t){var e;for(e in this.data=r,this.pluralForms={},this.options={},h)this.options[e]=void 0!==t&&e in t?t[e]:h[e]}f.prototype.getPluralForm=function(r,t){var e,n,i,s,a=this.pluralForms[r];return a||("function"!=typeof(i=(e=this.data[r][""])["Plural-Forms"]||e["plural-forms"]||e.plural_forms)&&(n=function(r){var t,e,n;for(t=r.split(";"),e=0;e<t.length;e++)if(0===(n=t[e].trim()).indexOf("plural="))return n.substr(7)}(e["Plural-Forms"]||e["plural-forms"]||e.plural_forms),s=function(r){var t=function(r){for(var t,e,n,i,s=[],a=[];t=r.match(d);){for(e=t[0],(n=r.substr(0,t.index).trim())&&s.push(n);i=a.pop();){if(l[e]){if(l[e][0]===i){e=l[e][1]||e;break}}else if(u.indexOf(i)>=0||c[i]<c[e]){a.push(i);break}s.push(i)}l[e]||a.push(e),r=r.substr(t.index+e.length)}return(r=r.trim())&&s.push(r),s.concat(a.reverse())}(r);return function(r){return function(r,t){var e,n,i,s,a,o,c=[];for(e=0;e<r.length;e++){if(a=r[e],s=p[a]){for(n=s.length,i=Array(n);n--;)i[n]=c.pop();try{o=s.apply(null,i)}catch(r){return r}}else o=t.hasOwnProperty(a)?t[a]:+a;c.push(o)}return c[0]}(t,r)}}(n),i=function(r){return+s({n:r})}),a=this.pluralForms[r]=i),a(t)},f.prototype.dcnpgettext=function(r,t,e,n,i){var s,a,o;return s=void 0===i?0:this.getPluralForm(r,i),a=e,t&&(a=t+this.options.contextDelimiter+e),(o=this.data[r][a])&&o[s]?o[s]:(this.options.onMissingKey&&this.options.onMissingKey(e,r),0===s?e:n)};const _={plural_forms(r){return 1===r?0:1}},m=/^i18n\.(n?gettext|has_translation)(_|$)/,v=((r,t,e)=>{const n=new f({}),i=new Set,s=()=>{i.forEach((r=>r()))},a=(r,t="default")=>{n.data[t]={...n.data[t],...r},n.data[t][""]={..._,...n.data[t]?.[""]},delete n.pluralForms[t]},o=(r,t)=>{a(r,t),s()},c=(r="default",t,e,i,s)=>(n.data[r]||a(void 0,r),n.dcnpgettext(r,t,e,i,s)),u=(r="default")=>r,_x=(r,t,n)=>{let i=c(n,t,r);return e?(i=e.applyFilters("i18n.gettext_with_context",i,r,t,n),e.applyFilters("i18n.gettext_with_context_"+u(n),i,r,t,n)):i};if(e){const r=r=>{m.test(r)&&s()};e.addAction("hookAdded","core/i18n",r),e.addAction("hookRemoved","core/i18n",r)}return{getLocaleData:(r="default")=>n.data[r],setLocaleData:o,addLocaleData:(r,t="default")=>{n.data[t]={...n.data[t],...r,"":{..._,...n.data[t]?.[""],...r?.[""]}},delete n.pluralForms[t],s()},resetLocaleData:(r,t)=>{n.data={},n.pluralForms={},o(r,t)},subscribe:r=>(i.add(r),()=>i.delete(r)),__:(r,t)=>{let n=c(t,void 0,r);return e?(n=e.applyFilters("i18n.gettext",n,r,t),e.applyFilters("i18n.gettext_"+u(t),n,r,t)):n},_x:_x,_n:(r,t,n,i)=>{let s=c(i,void 0,r,t,n);return e?(s=e.applyFilters("i18n.ngettext",s,r,t,n,i),e.applyFilters("i18n.ngettext_"+u(i),s,r,t,n,i)):s},_nx:(r,t,n,i,s)=>{let a=c(s,i,r,t,n);return e?(a=e.applyFilters("i18n.ngettext_with_context",a,r,t,n,i,s),e.applyFilters("i18n.ngettext_with_context_"+u(s),a,r,t,n,i,s)):a},isRTL:()=>"rtl"===_x("ltr","text direction"),hasTranslation:(r,t,i)=>{const s=t?t+""+r:r;let a=!!n.data?.[null!=i?i:"default"]?.[s];return e&&(a=e.applyFilters("i18n.has_translation",a,r,t,i),a=e.applyFilters("i18n.has_translation_"+u(i),a,r,t,i)),a}}})(0,0,i.d);v.getLocaleData.bind(v),v.setLocaleData.bind(v),v.resetLocaleData.bind(v),v.subscribe.bind(v);const __=v.__.bind(v),_x=v._x.bind(v),_n=v._n.bind(v);v._nx.bind(v),v.isRTL.bind(v),v.hasTranslation.bind(v)},4777:function(r,t,e){function n(r){return"string"!=typeof r||""===r?(console.error("The namespace must be a non-empty string."),!1):!!/^[a-zA-Z][a-zA-Z0-9_.\-\/]*$/.test(r)||(console.error("The namespace can only contain numbers, letters, dashes, periods, underscores and slashes."),!1)}function i(r){return"string"!=typeof r||""===r?(console.error("The hook name must be a non-empty string."),!1):/^__/.test(r)?(console.error("The hook name cannot begin with `__`."),!1):!!/^[a-zA-Z][a-zA-Z0-9_.-]*$/.test(r)||(console.error("The hook name can only contain numbers, letters, dashes, periods and underscores."),!1)}function s(r,t){return function(e,s,a,o=10){const c=r[t];if(!i(e))return;if(!n(s))return;if("function"!=typeof a)return void console.error("The hook callback must be a function.");if("number"!=typeof o)return void console.error("If specified, the hook priority must be a number.");const u={callback:a,priority:o,namespace:s};if(c[e]){const r=c[e].handlers;let t;for(t=r.length;t>0&&!(o>=r[t-1].priority);t--);t===r.length?r[t]=u:r.splice(t,0,u),c.__current.forEach((r=>{r.name===e&&r.currentIndex>=t&&r.currentIndex++}))}else c[e]={handlers:[u],runs:0};"hookAdded"!==e&&r.doAction("hookAdded",e,s,a,o)}}function a(r,t,e=!1){return function(s,a){const o=r[t];if(!i(s))return;if(!e&&!n(a))return;if(!o[s])return 0;let c=0;if(e)c=o[s].handlers.length,o[s]={runs:o[s].runs,handlers:[]};else{const r=o[s].handlers;for(let t=r.length-1;t>=0;t--)r[t].namespace===a&&(r.splice(t,1),c++,o.__current.forEach((r=>{r.name===s&&r.currentIndex>=t&&r.currentIndex--})))}return"hookRemoved"!==s&&r.doAction("hookRemoved",s,a),c}}function o(r,t){return function(e,n){const i=r[t];return void 0!==n?e in i&&i[e].handlers.some((r=>r.namespace===n)):e in i}}function c(r,t,e=!1){return function(n,...i){const s=r[t];s[n]||(s[n]={handlers:[],runs:0}),s[n].runs++;const a=s[n].handlers;if(!a||!a.length)return e?i[0]:void 0;const o={name:n,currentIndex:0};for(s.__current.push(o);o.currentIndex<a.length;){const r=a[o.currentIndex].callback.apply(null,i);e&&(i[0]=r),o.currentIndex++}return s.__current.pop(),e?i[0]:void 0}}function u(r,t){return function(){var e;const n=r[t];return null!==(e=n.__current[n.__current.length-1]?.name)&&void 0!==e?e:null}}function l(r,t){return function(e){const n=r[t];return void 0===e?void 0!==n.__current[0]:!!n.__current[0]&&e===n.__current[0].name}}function d(r,t){return function(e){const n=r[t];if(i(e))return n[e]&&n[e].runs?n[e].runs:0}}e.d(t,{a:function(){return w},d:function(){return p}});const p=new class{constructor(){this.actions=Object.create(null),this.actions.__current=[],this.filters=Object.create(null),this.filters.__current=[],this.addAction=s(this,"actions"),this.addFilter=s(this,"filters"),this.removeAction=a(this,"actions"),this.removeFilter=a(this,"filters"),this.hasAction=o(this,"actions"),this.hasFilter=o(this,"filters"),this.removeAllActions=a(this,"actions",!0),this.removeAllFilters=a(this,"filters",!0),this.doAction=c(this,"actions"),this.applyFilters=c(this,"filters",!0),this.currentAction=u(this,"actions"),this.currentFilter=u(this,"filters"),this.doingAction=l(this,"actions"),this.doingFilter=l(this,"filters"),this.didAction=d(this,"actions"),this.didFilter=d(this,"filters")}},{addAction:h,addFilter:f,removeAction:_,removeFilter:m,hasAction:v,hasFilter:y,removeAllActions:g,removeAllFilters:x,doAction:b,applyFilters:w,currentAction:F,currentFilter:k,doingAction:A,doingFilter:$,didAction:I,didFilter:T,actions:D,filters:S}=p},8983:function(r,t,e){e.d(t,{a:function(){return s},b:function(){return h},c:function(){return o},g:function(){return a},i:function(){return u},p:function(){return p},t:function(){return c}});var n=e(9955),i=e(3530);const s=r=>(null==r?void 0:r.amount_off)&&(null==r?void 0:r.currency)?a({amount:r.amount_off,currency:r.currency}):(null==r?void 0:r.percent_off)?(0,n.s)((0,n._)("%1d%% off","surecart"),0|r.percent_off):"",a=({amount:r,currency:t})=>{const e=((r,t)=>i.z.includes(t)?r:r/100)(r,t);return`${new Intl.NumberFormat(void 0,{style:"currency",currency:t}).format(parseFloat(e.toFixed(2)))}`},o=(r="usd")=>{var t;return null===(t=new Intl.NumberFormat(void 0,{style:"currency",currency:r}).formatToParts().find((r=>"currency"===r.type)))||void 0===t?void 0:t.value},c=(r,t,e=(0,n._)("every","surecart"),i=(0,n._)("once","surecart"),s=!1)=>{switch(t){case"day":return`${e} ${(0,n.s)(s?(0,n.a)("%d day","%d days",r,"surecart"):(0,n.a)("day","%d days",r,"surecart"),r)}`;case"week":return`${e} ${(0,n.s)(s?(0,n.a)("%d week","%d weeks",r,"surecart"):(0,n.a)("week","%d weeks",r,"surecart"),r)}`;case"month":return`${e} ${(0,n.s)(s?(0,n.a)("%d month","%d months",r,"surecart"):(0,n.a)("month","%d months",r,"surecart"),r)}`;case"year":return`${e} ${(0,n.s)(s?(0,n.a)("%d year","%d years",r,"surecart"):(0,n.a)("year","%d years",r,"surecart"),r)}`;default:return i}},u=(r,t={})=>{if(!r)return"";const{showOnce:e,labels:i,abbreviate:s}=t,{interval:a=(0,n._)("every","surecart")}=i||{};return`${l(r,a,e?(0,n._)("once","surecart"):"",s)} ${d(r,s)}`},l=(r,t,e=(0,n._)("once","surecart"),i=!1)=>r.recurring_interval_count&&r.recurring_interval&&1!==(null==r?void 0:r.recurring_period_count)?i?((r,t,e=(0,n._)("once","surecart"),i=!1)=>{switch(t){case"day":return` / ${(0,n.s)(i?(0,n.a)("%d day","%d days",r,"surecart"):(0,n.a)("day","%d days",r,"surecart"),r)}`;case"week":return` / ${(0,n.s)(i?(0,n.a)("%d wk","%d wks",r,"surecart"):(0,n.a)("wk","%d wks",r,"surecart"),r)}`;case"month":return` / ${(0,n.s)(i?(0,n.a)("%d mo","%d months",r,"surecart"):(0,n.a)("mo","%d mos",r,"surecart"),r)}`;case"year":return` / ${(0,n.s)(i?(0,n.a)("%d yr","%d yrs",r,"surecart"):(0,n.a)("yr","%d yrs",r,"surecart"),r)}`;default:return e}})(r.recurring_interval_count,r.recurring_interval,e):c(r.recurring_interval_count,r.recurring_interval,` ${t}`,e):"",d=(r,t=!1)=>(null==r?void 0:r.recurring_period_count)&&1!==(null==r?void 0:r.recurring_period_count)?t?`x ${r.recurring_period_count}`:` (${(0,n.s)((0,n.a)("%d payment","%d payments",r.recurring_period_count,"surecart"),r.recurring_period_count)})`:"",p=r=>{var t;return r?`${null===(t=null==r?void 0:r.product)||void 0===t?void 0:t.name} ${(null==r?void 0:r.name)?`— ${r.name}`:""}`:""},h=r=>{switch(r){case"invalid":return(0,n._)("Not valid","surecart");case"expired":return(0,n._)("Expired","surecart");case"gone":return(0,n._)("Not available","surecart");case"less_than_min_subtotal_amount":return(0,n._)("Minimum not met","surecart");case"greater_than_max_subtotal_amount":return(0,n._)("Order too large","surecart");case"not_applicable":return(0,n._)("Product(s) not eligible","surecart");case"not_applicable_to_customer":return(0,n._)("Not eligible","surecart");case"":return"";default:return(0,n._)("Not redeemable","surecart")}}},151:function(r,t,e){e.r(t),e.d(t,{sc_price:function(){return a}});var n=e(6892),i=e(9955),s=e(8983);e(4777);const a=class{constructor(r){(0,n.r)(this,r),this.currency=void 0,this.amount=void 0,this.scratchAmount=void 0,this.scratchDisplayAmount=void 0,this.displayAmount=void 0,this.saleText=void 0,this.adHoc=void 0,this.recurringPeriodCount=void 0,this.recurringIntervalCount=void 0,this.recurringInterval=void 0,this.setupFeeAmount=void 0,this.setupFeeText=void 0,this.trialDurationDays=void 0,this.setupFeeName=void 0}render(){return this.adHoc?(0,n.h)(n.H,{role:"paragraph"},(0,i._)("Custom Amount","surecart")):(0,n.h)(n.H,{role:"paragraph"},(0,n.h)("div",{class:"price",id:"price"},(0,n.h)("div",{class:"price__amounts"},!!this.scratchAmount&&this.scratchAmount!==this.amount&&(0,n.h)(n.F,null,0===this.scratchAmount?(0,i._)("Free","surecart"):(0,n.h)(n.F,null,(0,n.h)("sc-visually-hidden",null,(0,i._)("The price was","surecart")," "),this.scratchDisplayAmount?(0,n.h)("span",{class:"price__scratch"},this.scratchDisplayAmount):(0,n.h)("sc-format-number",{class:"price__scratch",part:"price__scratch",type:"currency",currency:this.currency,value:this.scratchAmount}),(0,n.h)("sc-visually-hidden",null," ",(0,i._)("now discounted to","surecart")))),0===this.amount?(0,i._)("Free","surecart"):this.displayAmount?this.displayAmount:(0,n.h)("sc-format-number",{class:"price__amount",type:"currency",value:this.amount,currency:this.currency}),(0,n.h)("div",{class:"price__interval"},this.recurringPeriodCount&&1<this.recurringPeriodCount&&(0,n.h)("sc-visually-hidden",null," ",(0,i._)("This is a repeating price. Payment will happen","surecart")," ",(0,s.i)({recurring_interval_count:this.recurringIntervalCount,recurring_interval:this.recurringInterval,recurring_period_count:this.recurringPeriodCount},{showOnce:!0,abbreviate:!1,labels:{interval:(0,i._)("every","surecart"),period:/** translators: used as in time period: "for 3 months" */ /** translators: used as in time period: "for 3 months" */
(0,i._)("for","surecart")}})),(0,n.h)("span",{"aria-hidden":"true"},(0,s.i)({recurring_interval_count:this.recurringIntervalCount,recurring_interval:this.recurringInterval,recurring_period_count:this.recurringPeriodCount},{showOnce:!0,abbreviate:!1,labels:{interval:"/",period:/** translators: used as in time period: "for 3 months" */ /** translators: used as in time period: "for 3 months" */
(0,i._)("for","surecart")}}))),!!this.scratchAmount&&(0,n.h)("sc-tag",{type:"primary",pill:!0,class:"price__sale-badge"},this.saleText||(0,n.h)(n.F,null,(0,n.h)("sc-visually-hidden",null,(0,i._)("This product is available for sale.","surecart")," "),(0,n.h)("span",{"aria-hidden":"true"},(0,i._)("Sale","surecart"))))),(!!(null==this?void 0:this.trialDurationDays)||!!(null==this?void 0:this.setupFeeAmount))&&(0,n.h)("div",{class:"price__details"},!!(null==this?void 0:this.trialDurationDays)&&(0,n.h)(n.F,null,(0,n.h)("sc-visually-hidden",null,(0,i.s)((0,i._)("You have a %d-day trial before payment becomes necessary.","surecart"),null==this?void 0:this.trialDurationDays)),(0,n.h)("span",{class:"price__trial","aria-hidden":"true"},(0,i.s)((0,i.a)("Starting in %s day.","Starting in %s days.",null==this?void 0:this.trialDurationDays,"surecart"),null==this?void 0:this.trialDurationDays))),!!(null==this?void 0:this.setupFeeAmount)&&(0,n.h)("span",{class:"price__setup-fee"},(0,n.h)("sc-visually-hidden",null,(0,i._)("This product has","surecart")," ")," ",this.setupFeeText?this.setupFeeText:(0,n.h)(n.F,null,(0,n.h)("sc-format-number",{type:"currency",value:null==this?void 0:this.setupFeeAmount,currency:this.currency}),(null==this?void 0:this.setupFeeName)||(0,i._)("Setup Fee","surecart"))))))}};a.style=":host{display:block}.price{display:inline-flex;flex-direction:column;gap:var(--sc-spacing-xxx-small);text-align:var(--sc-product-price-alignment, left);justify-content:var(--sc-product-price-alignment, left)}.price__amounts{display:inline-flex;flex-wrap:wrap;align-items:baseline;gap:var(--sc-spacing-xx-small);justify-content:var(--sc-product-price-alignment, left);text-align:var(--sc-product-price-alignment, left)}.price__scratch{text-decoration:line-through;opacity:0.75}.price__interval{font-size:min(var(--sc-font-size-small), 16px);opacity:0.75}.price__details{font-size:min(var(--sc-font-size-small), 16px);opacity:0.75}.price__sale-badge{font-size:min(1em, 14px);align-self:center}"}}]);