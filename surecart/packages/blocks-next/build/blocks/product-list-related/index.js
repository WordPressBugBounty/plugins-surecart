!function(){"use strict";var e,t={4206:function(){var e=window.wp.blocks,t=window.React,r=window.wp.primitives,a=(0,t.createElement)(r.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,t.createElement)(r.Path,{d:"m3 5c0-1.10457.89543-2 2-2h13.5c1.1046 0 2 .89543 2 2v13.5c0 1.1046-.8954 2-2 2h-13.5c-1.10457 0-2-.8954-2-2zm2-.5h6v6.5h-6.5v-6c0-.27614.22386-.5.5-.5zm-.5 8v6c0 .2761.22386.5.5.5h6v-6.5zm8 0v6.5h6c.2761 0 .5-.2239.5-.5v-6zm0-8v6.5h6.5v-6c0-.27614-.2239-.5-.5-.5z",fillRule:"evenodd",clipRule:"evenodd"})),n=window.wp.data,o=window.wp.element,l=window.wp.blockEditor,c=window.wp.i18n,s=window.wp.components;const i=[["core/group",{layout:{type:"flex",justifyContent:"space-between"},style:{spacing:{margin:{bottom:"10px"}}}},[["core/group",{layout:{type:"flex",flexWrap:"nowrap"}},[["surecart/product-list-sort",{}],["surecart/product-list-filter",{}]]],["surecart/product-list-search",{style:{layout:{selfStretch:"fixed",flexSize:"250px"}}}]]],["core/group",{layout:{type:"flex",flexWrap:"nowrap"},style:{spacing:{margin:{bottom:"10px"}}}},[["surecart/product-list-filter-tags"]]],["surecart/product-template",{style:{spacing:{blockGap:"30px"}},layout:{type:"grid",columnCount:4}}],["surecart/product-pagination"]];var u=window.wp.coreData;const p=[{label:(0,c.__)("Latest","surecart"),value:"date:desc"},{label:(0,c.__)("Oldest","surecart"),value:"date:asc"},{label:(0,c.__)("Alphabetical, A-Z","surecart"),value:"title:asc"},{label:(0,c.__)("Alphabetical, Z-A","surecart"),value:"title:desc"},{label:(0,c.__)("Price, low to high","surecart"),value:"price:asc"},{label:(0,c.__)("Price, high to low","surecart"),value:"price:desc"},{label:(0,c.__)("Random (pagination disabled)","surecart"),value:"rand:asc"}];function d(e){let{onUpdateQuery:t,attributes:{query:{perPage:r,pages:a,order:n,orderBy:i,taxonomy:d,fallback:m,shuffle:g}}}=e;const{records:h}=(0,u.useEntityRecords)("root","taxonomy",{per_page:-1}),_=(h??[]).filter((e=>e.types.includes("sc_product")&&e?.visibility.public));return(0,o.useEffect)((()=>{"rand"===i&&t({pages:1})}),[i]),React.createElement(l.InspectorControls,null,React.createElement(s.PanelBody,{title:(0,c.__)("Attributes","surecart")},React.createElement(s.SelectControl,{__nextHasNoMarginBottom:!0,__next40pxDefaultSize:!0,label:(0,c.__)("Default Sorting","surecart"),options:p,value:`${i}:${n}`,onChange:e=>{const r=e?.split(":");t({order:r[1],orderBy:r[0]})}}),Array.isArray(_)&&React.createElement(s.SelectControl,{__nextHasNoMarginBottom:!0,__next40pxDefaultSize:!0,label:(0,c.__)("Taxonomy"),options:_.map((e=>({label:e.name,value:e.slug}))),value:d,onChange:e=>t({taxonomy:e})}),React.createElement(s.RangeControl,{label:(0,c.__)("Products Per Page","surecart"),value:r,onChange:e=>t({perPage:e}),step:1,min:1,max:40}),"rand"!==i&&React.createElement(s.RangeControl,{label:(0,c.__)("Max pages to show","surecart"),value:a,onChange:e=>t({pages:e}),step:1,min:1,max:10,help:(0,c.__)("Limit the pages you want to show, even if the query has more results.","surecart")}),React.createElement(s.ToggleControl,{label:(0,c.__)("All Products Fallback","surecart"),help:(0,c.__)("If there are no related products, show all products.","surecart"),checked:m,onChange:e=>t({fallback:e})})))}function m(t,r,a){const o=(0,n.useSelect)((t=>t(e.store).getActiveBlockVariation(a,r)?.name),[r]),c=`${a}/${o}`;return(0,n.useSelect)((e=>{if(!o)return!1;const{getBlockRootClientId:r,getPatternsByBlockTypes:a}=e(l.store),n=r(t);return a(c,n).length>0}),[t,o,c])?c:a}window.wp.htmlEntities;const g=(e,t)=>(0,n.useSelect)((r=>{const{getBlockRootClientId:a,getPatternsByBlockTypes:n}=r(l.store),o=a(e);return n(t,o)}),[t,e]);var h=e=>{let{openPatternSelectionModal:t,name:r,clientId:a}=e;const n=!!g(a,r).length;return React.createElement(React.Fragment,null,n&&React.createElement(s.ToolbarGroup,{className:"wp-block-template-part__block-control-group"},React.createElement(s.ToolbarButton,{onClick:t},(0,c.__)("Replace"))))};function _(e){let{setAttributes:t,attributes:r,attributes:{limit:a,ids:n,query:c,query:{perPage:s,include:u}},name:p,clientId:m,openPatternSelectionModal:g}=e;const _=e=>{t({query:{...c,...e}})};(0,o.useEffect)((()=>{_({perPage:a||s,include:n?.length?n:u}),t({limit:null})}),[a,n]);const v=(0,l.useBlockProps)(),b=(0,l.useInnerBlocksProps)(v,{template:i});return React.createElement(React.Fragment,null,React.createElement(d,{attributes:r,setAttributes:t,onUpdateQuery:_}),React.createElement(l.BlockControls,null,React.createElement(h,{name:p,clientId:m,openPatternSelectionModal:g})),React.createElement("div",b))}const v=[["surecart/product-template",{style:{spacing:{blockGap:"30px"}},layout:{type:"grid",columnCount:4}}],["surecart/product-pagination"]];function b(t){let{attributes:r,clientId:a,name:o,openPatternSelectionModal:i}=t;const{replaceInnerBlocks:u}=(0,n.useDispatch)(l.store),p=(0,l.useBlockProps)(),d=m(a,r,o),{blockType:g,activeBlockVariation:h,hasPatterns:_}=(0,n.useSelect)((t=>{const{getActiveBlockVariation:n,getBlockType:c}=t(e.store),{getBlockRootClientId:s,getPatternsByBlockTypes:i}=t(l.store),u=s(a);return{blockType:c(o),activeBlockVariation:n(o,r),hasPatterns:!!i(d,u).length}}),[o,d,a,r]),b=h?.icon?.src||h?.icon||g?.icon?.src,f=h?.title||g?.title;return React.createElement("div",p,React.createElement(s.Placeholder,{icon:b,label:f,instructions:(0,c.__)("Choose a pattern for the product list or start with a basic layout.")},!!_&&React.createElement(s.Button,{variant:"primary",onClick:i},(0,c.__)("Choose","surecart")),React.createElement(s.Button,{variant:"secondary",onClick:()=>{u(a,(0,e.createBlocksFromInnerBlocksTemplate)(v),!1)}},(0,c.__)("Start basic","surecart"))))}var f=window.wp.compose;function y(t){let{clientId:r,attributes:a,setIsPatternSelectionModalOpen:i,name:u}=t;const[p,d]=(0,o.useState)(""),{replaceBlock:h,selectBlock:_}=(0,n.useDispatch)(l.store),v=(0,o.useMemo)((()=>({previewPostType:"sc_product"})),["sc_product"]),b=m(r,a,u),y=g(r,b),k=(0,o.useMemo)((()=>function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";if(!t)return e;const r=e.map((e=>[e,getPatternSearchRank(e,t)])).filter((e=>{let[,t]=e;return t>0}));return r.sort(((e,t)=>{let[,r]=e,[,a]=t;return a-r})),r.map((e=>{let[t]=e;return t}))}(y,p)),[y,p]),w=(0,f.useAsyncList)(k);return React.createElement(s.Modal,{overlayClassName:"block-library-query-pattern__selection-modal",title:(0,c.__)("Choose a pattern","surecart"),onRequestClose:()=>i(!1),isFullScreen:!0},React.createElement("div",{className:"block-library-query-pattern__selection-content"},React.createElement("div",{className:"block-library-query-pattern__selection-search"},React.createElement(s.SearchControl,{__nextHasNoMarginBottom:!0,onChange:d,value:p,label:(0,c.__)("Search for patterns","surecart"),placeholder:(0,c.__)("Search","surecart")})),React.createElement(l.BlockContextProvider,{value:v},React.createElement(l.__experimentalBlockPatternsList,{blockPatterns:k,shownPatterns:w,onClickPattern:(t,n)=>{const{newBlocks:o,queryClientIds:l}=((t,r,a)=>{const{namespace:n}=r,o=t.map((t=>(0,e.cloneBlock)(t))),l=[],c=[...o];for(;c.length>0;){const e=c.shift();e.name===a&&(n&&(e.attributes.namespace=n),l.push(e.clientId)),e.innerBlocks?.forEach((e=>{c.push(e)}))}return{newBlocks:o,queryClientIds:l}})(n,a,u);h(r,o),l[0]&&_(l[0])}}))))}function k(){return k=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var a in r)({}).hasOwnProperty.call(r,a)&&(e[a]=r[a])}return e},k.apply(null,arguments)}var w=JSON.parse('{"UU":"surecart/product-list-related"}');(0,e.registerBlockType)(w.UU,{icon:a,edit:e=>{const{clientId:t,attributes:r,name:a}=e,[c,s]=(0,o.useState)(!1),i=(0,n.useSelect)((e=>!!e(l.store).getBlocks(t).length),[t])?_:b;return React.createElement(React.Fragment,null,React.createElement(i,k({},e,{openPatternSelectionModal:()=>s(!0)})),c&&React.createElement(y,{clientId:t,attributes:r,setIsPatternSelectionModalOpen:s,name:a}))},save:function(){return React.createElement(l.InnerBlocks.Content,null)}})}},r={};function a(e){var n=r[e];if(void 0!==n)return n.exports;var o=r[e]={exports:{}};return t[e](o,o.exports,a),o.exports}a.m=t,e=[],a.O=function(t,r,n,o){if(!r){var l=1/0;for(u=0;u<e.length;u++){r=e[u][0],n=e[u][1],o=e[u][2];for(var c=!0,s=0;s<r.length;s++)(!1&o||l>=o)&&Object.keys(a.O).every((function(e){return a.O[e](r[s])}))?r.splice(s--,1):(c=!1,o<l&&(l=o));if(c){e.splice(u--,1);var i=n();void 0!==i&&(t=i)}}return t}o=o||0;for(var u=e.length;u>0&&e[u-1][2]>o;u--)e[u]=e[u-1];e[u]=[r,n,o]},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={8621:0,6289:0};a.O.j=function(t){return 0===e[t]};var t=function(t,r){var n,o,l=r[0],c=r[1],s=r[2],i=0;if(l.some((function(t){return 0!==e[t]}))){for(n in c)a.o(c,n)&&(a.m[n]=c[n]);if(s)var u=s(a)}for(t&&t(r);i<l.length;i++)o=l[i],a.o(e,o)&&e[o]&&e[o][0](),e[o]=0;return a.O(u)},r=self.webpackChunk_surecart_blocks_next=self.webpackChunk_surecart_blocks_next||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var n=a.O(void 0,[6289],(function(){return a(4206)}));n=a.O(n)}();