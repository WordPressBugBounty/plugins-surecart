!function(){"use strict";var e,t={7005:function(e,t,n){var r=n(1609),o=Symbol.for("react.element"),c=(Symbol.for("react.fragment"),Object.prototype.hasOwnProperty),a=r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,l={key:!0,ref:!0,__self:!0,__source:!0};t.jsx=function(e,t,n){var r,s={},i=null,u=null;for(r in void 0!==n&&(i=""+n),void 0!==t.key&&(i=""+t.key),void 0!==t.ref&&(u=t.ref),t)c.call(t,r)&&!l.hasOwnProperty(r)&&(s[r]=t[r]);if(e&&e.defaultProps)for(r in t=e.defaultProps)void 0===s[r]&&(s[r]=t[r]);return{$$typeof:o,type:e,key:i,ref:u,props:s,_owner:a.current}}},9255:function(e,t,n){e.exports=n(7005)},5482:function(e,t,n){var r=window.wp.blocks,o=window.wp.primitives,c=n(9255),a=(0,c.jsx)(o.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:(0,c.jsx)(o.Path,{d:"M18 5.5H6a.5.5 0 00-.5.5v3h13V6a.5.5 0 00-.5-.5zm.5 5H10v8h8a.5.5 0 00.5-.5v-7.5zm-10 0h-3V18a.5.5 0 00.5.5h2.5v-8zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z"})}),l=window.wp.i18n,s=window.wp.element,i=window.wp.data,u=window.wp.blockEditor;function d(){return d=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)({}).hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},d.apply(null,arguments)}function p(e){let{template:t,renderAppender:n,...r}=e;const o=(0,u.useInnerBlocksProps)(r,{template:t,__unstableDisableLayoutClassNames:!0,renderAppender:n});return React.createElement("div",o)}const f=(0,s.memo)((function(e){let{blocks:t,blockContextId:n,isHidden:r,setActiveBlockContextId:o,...c}=e;const{style:a,className:l,...s}=c||{},i=(0,u.__experimentalUseBlockPreview)({blocks:t});return React.createElement("div",d({},i,{tabIndex:0,role:"button",onClick:()=>{o(n)},style:{...a,display:r?"none":void 0},className:l},s))}));function m(e){let{clientId:t,blockContexts:n,className:r,style:o,itemProps:c,template:a,renderAppender:l,attachBlockProps:m=!0}=e;const[v,k]=(0,s.useState)(),w=(0,i.useSelect)((e=>e(u.store).getBlocks(t)),[t]),b=m?(0,u.useBlockProps)({className:r,style:o}):{style:o,className:r};return React.createElement("div",b,n&&n.map((e=>React.createElement(u.BlockContextProvider,{key:e.id,value:e},e.id===(v||n[0]?.id)&&React.createElement(p,d({template:a,renderAppender:l},c)),React.createElement(f,d({blocks:w,blockContextId:e.id,setActiveBlockContextId:k,isHidden:e.id===(v||n[0]?.id)},c))))))}var v=window.wp.coreData,k=window.wp.components;function w(){return w=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)({}).hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},w.apply(null,arguments)}const b=[["surecart/product-list-filter-checkbox"]],y=[{id:"filter-1","surecart/checkbox/name":(0,l.__)("Filter 1")},{id:"filter-2","surecart/checkbox/name":(0,l.__)("Filter 2")},{id:"filter-3","surecart/checkbox/name":(0,l.__)("Filter 3")}];var _=JSON.parse('{"UU":"surecart/product-list-filter-checkboxes-template"}');(0,r.registerBlockType)(_.UU,{icon:a,edit:e=>{let{clientId:t,__unstableLayoutClassNames:n,context:{taxonomySlug:r}}=e;const o=(0,i.useSelect)((e=>e(u.store).getBlockCount(t))),{records:c,hasResolved:a}=(0,v.useEntityRecords)("taxonomy",r,{per_page:-1,hide_empty:!0}),l=(0,u.useBlockProps)({className:n}),s=c?.map((e=>({id:e.id.toString(),"surecart/checkbox/name":e.name})))||[],d=s.length?s:y;return a?React.createElement("div",l,React.createElement(m,{template:b,blockContexts:d,className:n,clientId:t,renderAppender:o?void 0:u.InnerBlocks.ButtonBlockAppender})):React.createElement("div",w({},l,{style:{display:"flex",justifyContent:"center",padding:"20px"}}),React.createElement(k.Spinner,null))},save:function(){return React.createElement(u.InnerBlocks.Content,null)}})},1609:function(e){e.exports=window.React}},n={};function r(e){var o=n[e];if(void 0!==o)return o.exports;var c=n[e]={exports:{}};return t[e](c,c.exports,r),c.exports}r.m=t,e=[],r.O=function(t,n,o,c){if(!n){var a=1/0;for(u=0;u<e.length;u++){n=e[u][0],o=e[u][1],c=e[u][2];for(var l=!0,s=0;s<n.length;s++)(!1&c||a>=c)&&Object.keys(r.O).every((function(e){return r.O[e](n[s])}))?n.splice(s--,1):(l=!1,c<a&&(a=c));if(l){e.splice(u--,1);var i=o();void 0!==i&&(t=i)}}return t}c=c||0;for(var u=e.length;u>0&&e[u-1][2]>c;u--)e[u]=e[u-1];e[u]=[n,o,c]},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={1065:0,7917:0};r.O.j=function(t){return 0===e[t]};var t=function(t,n){var o,c,a=n[0],l=n[1],s=n[2],i=0;if(a.some((function(t){return 0!==e[t]}))){for(o in l)r.o(l,o)&&(r.m[o]=l[o]);if(s)var u=s(r)}for(t&&t(n);i<a.length;i++)c=a[i],r.o(e,c)&&e[c]&&e[c][0](),e[c]=0;return r.O(u)},n=self.webpackChunk_surecart_blocks_next=self.webpackChunk_surecart_blocks_next||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var o=r.O(void 0,[7917],(function(){return r(5482)}));o=r.O(o)}();