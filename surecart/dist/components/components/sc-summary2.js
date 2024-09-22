import{proxyCustomElement,HTMLElement,createEvent,h}from"@stencil/core/internal/client";import{s as speak}from"./index2.js";import{s as setDefaultAnimation,b as stopAnimations,g as getAnimation,a as animateTo,c as shimKeyframesHeightAuto}from"./animation-registry.js";import{d as defineCustomElement$2}from"./sc-line-item2.js";import{d as defineCustomElement$1}from"./sc-skeleton2.js";const scSummaryCss=":host{display:block;font-family:var(--sc-font-sans);font-size:var(--sc-checkout-font-size, 16px)}.collapse-link{display:flex;align-items:center;gap:0.35em}.summary__content--empty{display:none}.collapse-link__icon{width:18px;height:18px;color:var(--sc-order-collapse-link-icon-color, var(--sc-color-gray-500))}.item__product+.item__product{margin-top:20px}.empty{color:var(--sc-order-summary-color, var(--sc-color-gray-500))}.price{display:inline-block;opacity:0;visibility:hidden;transform:translateY(5px);transition:var(--sc-input-transition, var(--sc-transition-medium)) visibility ease, var(--sc-input-transition, var(--sc-transition-medium)) opacity ease, var(--sc-input-transition, var(--sc-transition-medium)) transform ease}.price--collapsed{opacity:1;visibility:visible;transform:translateY(0)}.summary{position:relative;user-select:none;cursor:pointer}.summary .collapse-link__icon{transition:transform 0.25s ease-in-out}.summary .scratch-price{text-decoration:line-through;color:var(--sc-color-gray-500);font-size:var(--sc-font-size-small);margin-right:var(--sc-spacing-xx-small)}.summary--open .collapse-link__icon{transform:rotate(180deg)}::slotted(*){margin:4px 0 !important}::slotted(sc-divider){margin:16px 0 !important}sc-line-item~sc-line-item{margin-top:14px}.total-price{white-space:nowrap}",ScOrderSummary=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.scShow=createEvent(this,"scShow",7),this.scHide=createEvent(this,"scHide",7),this.loading=void 0,this.busy=void 0,this.closedText=wp.i18n.__("Show Summary","surecart"),this.openText=wp.i18n.__("Summary","surecart"),this.collapsible=!1,this.collapsedOnMobile=!1,this.collapsedOnDesktop=void 0,this.collapsed=!1}isMobileScreen(){var e,s;const t=null===(e=document.body)||void 0===e?void 0:e.getClientRects();return(null==t?void 0:t.length)&&(null===(s=t[0])||void 0===s?void 0:s.width)<781}componentWillLoad(){this.isMobileScreen()?this.collapsed=this.collapsed||this.collapsedOnMobile:this.collapsed=this.collapsed||this.collapsedOnDesktop,this.handleOpenChange()}handleClick(e){e.preventDefault(),this.collapsed=!this.collapsed}renderHeader(){return this.loading?h("sc-line-item",null,h("sc-skeleton",{slot:"title",style:{width:"120px",display:"inline-block"}}),h("sc-skeleton",{slot:"price",style:{width:"70px",display:"inline-block","--border-radius":"6px"}}),h("sc-skeleton",{slot:"currency",style:{width:"30px",display:"inline-block"}})):h("sc-line-item",{style:{"--price-size":"var(--sc-font-size-x-large)"}},h("span",{class:"collapse-link",slot:"title",onClick:e=>this.handleClick(e),tabIndex:0,"aria-label":wp.i18n.sprintf(wp.i18n.__("Summary %1$s","surecart"),this.collapsed?wp.i18n.__("collapsed","surecart"):wp.i18n.__("expanded","surecart")),onKeyDown:e=>{" "===e.key&&(this.handleClick(e),speak(wp.i18n.sprintf(wp.i18n.__("Summary %1$s","surecart"),this.collapsed?wp.i18n.__("collapsed","surecart"):wp.i18n.__("expanded","surecart")),"assertive"))}},this.collapsed?this.closedText||wp.i18n.__("Summary","surecart"):this.openText||wp.i18n.__("Summary","surecart"),h("svg",{xmlns:"http://www.w3.org/2000/svg",class:"collapse-link__icon",fill:"none",viewBox:"0 0 24 24",stroke:"currentColor"},h("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M19 9l-7 7-7-7"}))),h("span",{slot:"description"},h("slot",{name:"description"})),h("span",{slot:"price",class:{price:!0,"price--collapsed":this.collapsed}},h("slot",{name:"price"})))}async handleOpenChange(){if(this.collapsed){this.scHide.emit(),await stopAnimations(this.body),this.body.style.overflow="hidden";const{keyframes:e,options:s}=getAnimation(this.el,"summary.hide");await animateTo(this.body,shimKeyframesHeightAuto(e,this.body.scrollHeight),s),this.body.hidden=!0,this.body.style.height="auto",this.body.style.overflow="visible"}else{this.scShow.emit(),await stopAnimations(this.body),this.body.hidden=!1,this.body.style.overflow="hidden";const{keyframes:e,options:s}=getAnimation(this.el,"summary.show");await animateTo(this.body,shimKeyframesHeightAuto(e,this.body.scrollHeight),s),this.body.style.height="auto",this.body.style.overflow="visible"}}render(){return h("div",{class:{summary:!0,"summary--open":!this.collapsed}},this.collapsible&&this.renderHeader(),h("div",{ref:e=>this.body=e,class:{summary__content:!0}},h("slot",null)))}get el(){return this}static get watchers(){return{collapsed:["handleOpenChange"]}}static get style(){return scSummaryCss}},[1,"sc-summary",{loading:[4],busy:[4],closedText:[1,"closed-text"],openText:[1,"open-text"],collapsible:[4],collapsedOnMobile:[4,"collapsed-on-mobile"],collapsedOnDesktop:[4,"collapsed-on-desktop"],collapsed:[1028]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-summary","sc-line-item","sc-skeleton"].forEach((e=>{switch(e){case"sc-summary":customElements.get(e)||customElements.define(e,ScOrderSummary);break;case"sc-line-item":customElements.get(e)||defineCustomElement$2();break;case"sc-skeleton":customElements.get(e)||defineCustomElement$1()}}))}setDefaultAnimation("summary.show",{keyframes:[{height:"0",opacity:"0"},{height:"auto",opacity:"1"}],options:{duration:250,easing:"ease"}}),setDefaultAnimation("summary.hide",{keyframes:[{height:"auto",opacity:"1"},{height:"0",opacity:"0"}],options:{duration:250,easing:"ease"}});export{ScOrderSummary as S,defineCustomElement as d};