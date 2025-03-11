import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";const scFormRowCss=".form-row{display:flex;align-items:flex-start;justify-content:space-between;gap:calc(var(--sc-form-row-spacing, 0.75em) * 2.5)}::slotted(*){flex:1;width:0}",ScFormRowStyle0=scFormRowCss,ScFormRow$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.width=void 0}componentDidLoad(){"ResizeObserver"in window&&(this.observer=new window.ResizeObserver((e=>{this.width=null==e?void 0:e[0].contentRect.width})),this.observer.observe(this.el))}render(){return h("div",{key:"445c360ea242db69be1ebfc382269c38836300d5",part:"base",class:{"form-row":!0,"breakpoint-sm":this.width<384,"breakpoint-md":this.width>=384&&this.width<576,"breakpoint-lg":this.width>=576&&this.width<768,"breakpoint-xl":this.width>=768}},h("slot",{key:"6eb7dbfcb8da8eea5d166a29ffc776788b232cc2"}))}get el(){return this}static get style(){return ScFormRowStyle0}},[1,"sc-form-row",{width:[32]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-form-row"].forEach((e=>{"sc-form-row"===e&&(customElements.get(e)||customElements.define(e,ScFormRow$1))}))}const ScFormRow=ScFormRow$1,defineCustomElement=defineCustomElement$1;export{ScFormRow,defineCustomElement};