import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";const scTogglesCss=':host{display:block;--toggle-spacing:0}::slotted(*){margin-bottom:var(--toggle-spacing)}::slotted(:not(:first-child):not([style*="display: none"])){border-top:1px solid var(--sc-input-border-color)}',ScTogglesStyle0=scTogglesCss,ScToggles=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.accordion=!1,this.collapsible=!0,this.theme="default"}getToggles(){var e,t,l;let o=this.el.shadowRoot.querySelector("slot");if(o)return(null===(l=null===(t=null===(e=null==o?void 0:o.assignedNodes)||void 0===e?void 0:e.call(o))||void 0===t?void 0:t.filter)||void 0===l?void 0:l.call(t,(e=>"SC-TOGGLE"===e.nodeName)))||[]}handleShowChange(e){"SC-TOGGLE"===e.target.tagName&&this.accordion&&this.getToggles().map((t=>t.open=e.target===t))}handleCollapibleChange(){this.getToggles().map((e=>e.collapsible=this.collapsible))}componentDidLoad(){this.handleCollapibleChange();const e=this.getToggles();(null==e?void 0:e.length)&&!e.some((e=>e.open))&&(e[0].open=!0)}render(){const e="container"===this.theme?"sc-card":"div";return h(e,{key:"05d5b80055c4f33a643c8b094a07abfafa8a916a",class:{toggles:!0,[`toggles--theme-${this.theme}`]:!0},part:"base","no-padding":!0},h("slot",{key:"33f26ee9c2bc78f949b63d753b17a22e26657194"}))}get el(){return this}static get watchers(){return{collapsible:["handleCollapibleChange"]}}static get style(){return ScTogglesStyle0}},[1,"sc-toggles",{accordion:[4],collapsible:[4],theme:[1]},[[0,"scShow","handleShowChange"]],{collapsible:["handleCollapibleChange"]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-toggles"].forEach((e=>{"sc-toggles"===e&&(customElements.get(e)||customElements.define(e,ScToggles))}))}export{ScToggles as S,defineCustomElement as d};