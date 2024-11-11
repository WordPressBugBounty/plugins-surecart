import{h}from"@stencil/core";import{__,sprintf}from"@wordpress/i18n";import{speak}from"@wordpress/a11y";export class ScMenu{constructor(){this.items=[],this.ariaLabel=void 0}handleClick(e){const t=e.target.closest("sc-menu-item");t&&!t.disabled&&this.scSelect.emit({item:t})}handleKeyDown(e){if("Enter"===e.key){const t=this.getCurrentItem();e.preventDefault(),t&&this.scSelect.emit({item:t}),speak(sprintf(__("Menu %s selected","surecart"),t.textContent),"assertive")}if(" "===e.key&&e.preventDefault(),["ArrowDown","ArrowUp","Home","End"].includes(e.key)){const t=this.getCurrentItem();let s=t?this.items.indexOf(t):0;if(this.items.length)return e.preventDefault(),"ArrowDown"===e.key?s++:"ArrowUp"===e.key?s--:"Home"===e.key?s=0:"End"===e.key&&(s=this.items.length-1),s<0&&(s=0),s>this.items.length-1&&(s=this.items.length-1),void this.setCurrentItem(this.items[s])}}getCurrentItem(){return this.items.find((e=>"0"===e.getAttribute("tabindex")))}async setCurrentItem(e){const t=e.disabled?this.items[0]:e;this.items.forEach((e=>{e.setAttribute("tabindex",e===t?"0":"-1")}))}syncItems(){const e=this.el.shadowRoot.querySelector("slot").assignedElements({flatten:!0});this.items=e.filter((e=>"sc-menu-item"===e.nodeName))}handleSlotChange(){this.syncItems()}render(){return h("div",{key:"c7ccdc53df0781fdefffd1acd6a835df8fdb54fb",part:"base",class:"menu",tabindex:"0",onKeyDown:e=>this.handleKeyDown(e)},h("slot",{key:"07423e3f9886207a5a57c98b7faaf319767387ab",onSlotchange:()=>this.handleSlotChange()}))}static get is(){return"sc-menu"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-menu.scss"]}}static get styleUrls(){return{$:["sc-menu.css"]}}static get properties(){return{ariaLabel:{type:"string",mutable:!1,complexType:{original:"string",resolved:"string",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"aria-label",reflect:!1}}}static get events(){return[{method:"scSelect",name:"scSelect",bubbles:!0,cancelable:!0,composed:!0,docs:{tags:[],text:""},complexType:{original:"{ item: HTMLScMenuItemElement }",resolved:"{ item: HTMLScMenuItemElement; }",references:{HTMLScMenuItemElement:{location:"global",id:"global::HTMLScMenuItemElement"}}}}]}static get methods(){return{setCurrentItem:{complexType:{signature:"(item: HTMLScMenuItemElement) => Promise<void>",parameters:[{name:"item",type:"HTMLScMenuItemElement",docs:""}],references:{Promise:{location:"global",id:"global::Promise"},HTMLScMenuItemElement:{location:"global",id:"global::HTMLScMenuItemElement"}},return:"Promise<void>"},docs:{text:"",tags:[{name:"internal",text:'Sets the current menu item to the specified element. This sets `tabindex="0"` on the target element and\n`tabindex="-1"` to all other items. This method must be called prior to setting focus on a menu item.'}]}}}}static get elementRef(){return"el"}}