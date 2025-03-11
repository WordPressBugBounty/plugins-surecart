import{proxyCustomElement,HTMLElement,createEvent,h}from"@stencil/core/internal/client";import{s as speak}from"./index2.js";const scMenuCss=":host{display:block}.menu{padding:var(--sc-spacing-x-small) 0}.menu:focus{outline:none}::slotted(sc-input){margin-top:-var(--sc-spacing-x-small)}::slotted(sc-divider){--spacing:var(--sc-spacing-x-small)}",ScMenuStyle0=scMenuCss,ScMenu=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.scSelect=createEvent(this,"scSelect",7),this.items=[],this.ariaLabel=void 0}handleClick(e){const t=e.target.closest("sc-menu-item");t&&!t.disabled&&this.scSelect.emit({item:t})}handleKeyDown(e){if("Enter"===e.key){const t=this.getCurrentItem();e.preventDefault(),t&&this.scSelect.emit({item:t}),speak(wp.i18n.sprintf(wp.i18n.__("Menu %s selected","surecart"),t.textContent),"assertive")}if(" "===e.key&&e.preventDefault(),["ArrowDown","ArrowUp","Home","End"].includes(e.key)){const t=this.getCurrentItem();let s=t?this.items.indexOf(t):0;if(this.items.length)return e.preventDefault(),"ArrowDown"===e.key?s++:"ArrowUp"===e.key?s--:"Home"===e.key?s=0:"End"===e.key&&(s=this.items.length-1),s<0&&(s=0),s>this.items.length-1&&(s=this.items.length-1),void this.setCurrentItem(this.items[s])}}getCurrentItem(){return this.items.find((e=>"0"===e.getAttribute("tabindex")))}async setCurrentItem(e){const t=e.disabled?this.items[0]:e;this.items.forEach((e=>{e.setAttribute("tabindex",e===t?"0":"-1")}))}syncItems(){const e=this.el.shadowRoot.querySelector("slot").assignedElements({flatten:!0});this.items=e.filter((e=>"sc-menu-item"===e.nodeName))}handleSlotChange(){this.syncItems()}render(){return h("div",{key:"b27ae3d49eda0c7c84951353a5da37e95881cbe8",part:"base",class:"menu",tabindex:"0",onKeyDown:e=>this.handleKeyDown(e)},h("slot",{key:"4adcf92e0b6db877b301bc030c7d80fa3507973f",onSlotchange:()=>this.handleSlotChange()}))}get el(){return this}static get style(){return ScMenuStyle0}},[1,"sc-menu",{ariaLabel:[1,"aria-label"],setCurrentItem:[64]}]);function defineCustomElement(){"undefined"!=typeof customElements&&["sc-menu"].forEach((e=>{"sc-menu"===e&&(customElements.get(e)||customElements.define(e,ScMenu))}))}export{ScMenu as S,defineCustomElement as d};