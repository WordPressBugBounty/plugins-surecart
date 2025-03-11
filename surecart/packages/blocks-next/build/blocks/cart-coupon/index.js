!function(){"use strict";var e,t={7005:function(e,t,r){var n=r(1609),a=Symbol.for("react.element"),o=(Symbol.for("react.fragment"),Object.prototype.hasOwnProperty),c=n.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,l={key:!0,ref:!0,__self:!0,__source:!0};t.jsx=function(e,t,r){var n,s={},u=null,i=null;for(n in void 0!==r&&(u=""+r),void 0!==t.key&&(u=""+t.key),void 0!==t.ref&&(i=t.ref),t)o.call(t,n)&&!l.hasOwnProperty(n)&&(s[n]=t[n]);if(e&&e.defaultProps)for(n in t=e.defaultProps)void 0===s[n]&&(s[n]=t[n]);return{$$typeof:a,type:e,key:u,ref:i,props:s,_owner:c.current}}},9255:function(e,t,r){e.exports=r(7005)},5079:function(e,t,r){var n=window.wp.blocks,a=window.wp.primitives,o=r(9255),c=(0,o.jsx)(a.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:(0,o.jsx)(a.Path,{d:"M4.75 4a.75.75 0 0 0-.75.75v7.826c0 .2.08.39.22.53l6.72 6.716a2.313 2.313 0 0 0 3.276-.001l5.61-5.611-.531-.53.532.528a2.315 2.315 0 0 0 0-3.264L13.104 4.22a.75.75 0 0 0-.53-.22H4.75ZM19 12.576a.815.815 0 0 1-.236.574l-5.61 5.611a.814.814 0 0 1-1.153 0L5.5 12.264V5.5h6.763l6.5 6.502a.816.816 0 0 1 .237.574ZM8.75 9.75a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"})}),l=window.wp.i18n,s=window.wp.element,u=window.wp.blockEditor,i=window.wp.components,d=r(1609),m=r.n(d);function p(e){let{name:t,...r}=e;const[n,a]=(0,d.useState)(null),o=window?.scData?.plugin_url+"/dist/icon-assets";if((0,d.useEffect)((()=>{fetch(`${o}/${t}.svg`).then((e=>e.text())).then((e=>{const t=(new DOMParser).parseFromString(e,"image/svg+xml");a(t?.documentElement)})).catch(console.error)}),[t]),!n)return null;const c={...Array.from(n.attributes).reduce(((e,t)=>(e[t.name]=t.value,e)),{}),...r};return m().createElement(n.tagName,{...c,dangerouslySetInnerHTML:{__html:n.innerHTML}})}var _=e=>{let{attributes:t,setAttributes:r}=e;const{backgroundColor:n,textColor:a,padding:o,border:c}=t;return React.createElement(React.Fragment,null,React.createElement(u.PanelColorSettings,{title:(0,l.__)("Color Settings"),colorSettings:[{value:n,onChange:e=>r({backgroundColor:e}),label:(0,l.__)("Background Color","surecart")},{value:a,onChange:e=>r({textColor:e}),label:(0,l.__)("Text Color","surecart")}]}),React.createElement(i.PanelBody,{title:(0,l.__)("Spacing","surecart")},React.createElement(i.__experimentalBoxControl,{label:(0,l.__)("Padding","surecart"),values:o,resetValues:{top:"1.25em",right:"1.25em",bottom:"1.25em",left:"1.25em"},onChange:e=>r({padding:e})})),React.createElement(i.PanelBody,{title:(0,l.__)("Border","surecart")},React.createElement(i.PanelRow,null,React.createElement(i.ToggleControl,{label:(0,l.__)("Bottom Border","surecart"),checked:c,onChange:e=>r({border:e})}))))},f=e=>{let{attributes:t}=e;if(!t)return{};const{border:r,textColor:n,backgroundColor:a,padding:o}=t;return{...r?{borderBottom:"var(--sc-drawer-border)"}:{},...a?{backgroundColor:a}:{},...n?{color:n}:{color:"var(--sc-input-label-color)"},...o?.top?{paddingTop:o?.top}:{},...o?.bottom?{paddingBottom:o?.bottom}:{},...o?.left?{paddingLeft:o?.left}:{},...o?.right?{paddingRight:o?.right}:{}}},g=JSON.parse('{"UU":"surecart/slide-out-cart-coupon"}');(0,n.registerBlockType)(g.UU,{icon:c,edit:e=>{let{attributes:t,setAttributes:r}=e;const{text:n,button_text:a,collapsed:o,placeholder:c}=t,d=(0,s.useRef)(),m=(0,u.useBlockProps)({style:f({attributes:t})}),[g,b]=(0,s.useState)(!1),[v,E]=(0,s.useState)(""),[R,h]=(0,s.useState)(!1),[w,C]=(0,s.useState)(!0);(0,s.useEffect)((()=>{function e(e){d.current&&!d.current.contains(e.target)&&g&&b(!g)}return document.addEventListener("mousedown",e),()=>{document.removeEventListener("mousedown",e)}}),[g]);const x=()=>React.createElement("div",{hidden:!g&&o,class:"sc-input-group sc-coupon-form__input-group",ref:d},React.createElement("input",{type:"text",id:"coupon",class:"sc-form-control sc-coupon-form__input","aria-label":(0,l.__)("Coupon code","surecart"),"aria-describedby":"basic-addon1",placeholder:c||(0,l.__)("Enter coupon code","surecart"),value:v,onChange:e=>E(e.target.value)}),React.createElement("span",{class:"sc-input-group-text",id:"basic-addon1"},React.createElement("button",{hidden:!v,onClick:()=>{b(!1),h(!0)}},a||(0,l.__)("Apply","surecart"))));return React.createElement(s.Fragment,null,React.createElement(u.InspectorControls,null,React.createElement(_,{attributes:t,setAttributes:r}),React.createElement(i.PanelBody,{title:(0,l.__)("Attributes","surecart")},React.createElement(i.PanelRow,null,React.createElement(i.ToggleControl,{label:(0,l.__)("Collapsed","surecart"),checked:o,onChange:e=>r({collapsed:e})})),React.createElement(i.PanelRow,null,React.createElement(i.TextControl,{label:(0,l.__)("Label","surecart"),value:n,onChange:e=>r({text:e})})),React.createElement(i.PanelRow,null,React.createElement(i.TextControl,{label:(0,l.__)("Placeholder","surecart"),value:c,onChange:e=>r({placeholder:e})})),React.createElement(i.PanelRow,null,React.createElement(i.TextControl,{label:(0,l.__)("Button Text","surecart"),value:a,onChange:e=>r({button_text:e})})))),React.createElement("div",m,React.createElement("div",{className:"sc-cart-coupon__wrapper"},R?React.createElement("div",{class:"sc-line-item__item sc-coupon-form",hidden:!R},React.createElement("div",{class:"sc-line-item__text"},React.createElement("div",{class:"sc-line-item__description"},(0,l.__)("Discount","surecart"),React.createElement("div",{class:"sc-tag sc-tag--default"},v,React.createElement("button",{onClick:()=>{h(!1),E("")}},React.createElement(p,{name:"x"}))))),React.createElement("div",{class:"sc-line-item__end"},React.createElement("div",{class:"sc-line-item__price-text"},React.createElement("div",{class:"sc-line-item__price-description"},React.createElement("span",null,React.createElement("span",{class:"coupon-human-discount",hidden:!w},"-",scData?.currency_symbol,"50.00")))))):React.createElement(React.Fragment,null,o?React.createElement("div",null,React.createElement("span",{hidden:g,class:"trigger",onClick:()=>b(!0)},n),x()):React.createElement("div",null,React.createElement("label",{for:"sc-coupon-input"},n),x())))))}})},1609:function(e){e.exports=window.React}},r={};function n(e){var a=r[e];if(void 0!==a)return a.exports;var o=r[e]={exports:{}};return t[e](o,o.exports,n),o.exports}n.m=t,e=[],n.O=function(t,r,a,o){if(!r){var c=1/0;for(i=0;i<e.length;i++){r=e[i][0],a=e[i][1],o=e[i][2];for(var l=!0,s=0;s<r.length;s++)(!1&o||c>=o)&&Object.keys(n.O).every((function(e){return n.O[e](r[s])}))?r.splice(s--,1):(l=!1,o<c&&(c=o));if(l){e.splice(i--,1);var u=a();void 0!==u&&(t=u)}}return t}o=o||0;for(var i=e.length;i>0&&e[i-1][2]>o;i--)e[i]=e[i-1];e[i]=[r,a,o]},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={4376:0,5296:0};n.O.j=function(t){return 0===e[t]};var t=function(t,r){var a,o,c=r[0],l=r[1],s=r[2],u=0;if(c.some((function(t){return 0!==e[t]}))){for(a in l)n.o(l,a)&&(n.m[a]=l[a]);if(s)var i=s(n)}for(t&&t(r);u<c.length;u++)o=c[u],n.o(e,o)&&e[o]&&e[o][0](),e[o]=0;return n.O(i)},r=self.webpackChunk_surecart_blocks_next=self.webpackChunk_surecart_blocks_next||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var a=n.O(void 0,[5296],(function(){return n(5079)}));a=n.O(a)}();