import{r as t,c as s,h as a,a as i}from"./p-e97fde0a.js";const e=":host{display:block;--sc-tabs-min-width:225px}.tab-group{display:flex;flex-wrap:wrap;position:relative;border:solid 1px transparent;border-radius:0;flex-direction:row}@media screen and (min-width: 750px){.tab-group{flex-wrap:nowrap}}.tab-group__tabs{display:flex;flex-wrap:wrap;flex:0 0 auto;flex-direction:column;margin-bottom:var(--sc-spacing-xx-large)}.tab-group__nav-container{order:1;flex:1 0 100%}@media screen and (min-width: 750px){.tab-group__nav-container{min-width:var(--sc-tabs-min-width);flex:0 1 auto}}.tab-group__body{flex:1 1 auto;order:2}@media screen and (min-width: 750px){.tab-group__body{padding:0 var(--sc-spacing-xx-large)}}::slotted(sc-tab){margin-bottom:var(--sc-spacing-xx-small)}";const o=e;const r=class{constructor(a){t(this,a);this.scTabHide=s(this,"scTabHide",7);this.scTabShow=s(this,"scTabShow",7);this.tabs=[];this.panels=[];this.activeTab=undefined}componentDidLoad(){this.syncTabsAndPanels();this.setAriaLabels();this.setActiveTab(this.getActiveTab()||this.tabs[0],{emitEvents:false});this.mutationObserver=new MutationObserver((()=>{this.syncTabsAndPanels()}));this.mutationObserver.observe(this.el,{attributes:true,childList:true,subtree:true})}disconnectedCallback(){this.mutationObserver.disconnect()}syncTabsAndPanels(){this.tabs=this.getAllTabs();this.panels=this.getAllPanels()}setAriaLabels(){this.tabs.map((t=>{const s=this.panels.find((s=>s.name===t.panel));if(s){t.setAttribute("aria-controls",s.getAttribute("id"));s.setAttribute("aria-labelledby",t.getAttribute("id"))}}))}handleClick(t){const s=t.target;const a=s.closest("sc-tab");const i=a===null||a===void 0?void 0:a.closest("sc-tab-group");if(i!==this.el){return}if(a){this.setActiveTab(a,{scrollBehavior:"smooth"})}}handleKeyDown(t){const s=t.target;const a=s.closest("sc-tab");const i=a===null||a===void 0?void 0:a.closest("sc-tab-group");if(i!==this.el){return true}if(["Enter"," "].includes(t.key)){if(a){this.setActiveTab(a,{scrollBehavior:"smooth"})}}if(["ArrowUp","ArrowDown","Home","End"].includes(t.key)){const s=document.activeElement;if(s&&s.tagName.toLowerCase()==="sc-tab"){let a=this.tabs.indexOf(s);if(t.key==="Home"){a=0}else if(t.key==="End"){a=this.tabs.length-1}else if(t.key==="ArrowUp"){a=Math.max(0,a-1)}else if(t.key==="ArrowDown"){a=Math.min(this.tabs.length-1,a+1)}this.tabs[a].triggerFocus({preventScroll:true});t.preventDefault()}}}setActiveTab(t,s){s=Object.assign({emitEvents:true,scrollBehavior:"auto"},s);if(t&&t!==this.activeTab&&!t.disabled){const a=this.activeTab;this.activeTab=t;this.tabs.map((t=>t.active=t===this.activeTab));this.panels.map((t=>t.active=t.name===this.activeTab.panel));if(s.emitEvents){if(a){this.scTabHide.emit(a.panel)}this.scTabShow.emit(this.activeTab.panel)}}}getActiveTab(){const t=this.getAllTabs();return t.find((t=>t.active))}getAllChildren(){const t=this.el.shadowRoot.querySelectorAll("slot");const s=["sc-tab","sc-tab-panel"];const a=Array.from(t).map((t=>{var s;return(s=t===null||t===void 0?void 0:t.assignedElements)===null||s===void 0?void 0:s.call(t,{flatten:true})})).flat();return a.reduce(((t,s)=>{var a;return t.concat(s,[...((a=s===null||s===void 0?void 0:s.querySelectorAll)===null||a===void 0?void 0:a.call(s,"*"))||[]])}),[]).filter((t=>{var a,i;return s.includes((i=(a=t===null||t===void 0?void 0:t.tagName)===null||a===void 0?void 0:a.toLowerCase)===null||i===void 0?void 0:i.call(a))}))}getAllTabs(t=false){return this.getAllChildren().filter((s=>t?s.tagName.toLowerCase()==="sc-tab":s.tagName.toLowerCase()==="sc-tab"&&!s.disabled))}getAllPanels(){return this.getAllChildren().filter((t=>t.tagName.toLowerCase()==="sc-tab-panel"))}render(){return a("div",{key:"c324b17db79d29abf98459eeb15646bb55c09dfb",part:"base",class:{"tab-group":true},onClick:t=>this.handleClick(t),onKeyDown:t=>this.handleKeyDown(t)},a("div",{key:"fc7ad29471ed8853112c2a2b54a028e5a7a46f0d",class:"tab-group__nav-container",part:"nav"},a("div",{key:"63aa6165010b8e24621c64b1b6e367e0ffbec99b",class:"tab-group__nav"},a("div",{key:"afaf00dd8101f398332f44a2603ceb12ad46f3fa",part:"tabs",class:"tab-group__tabs",role:"tablist"},a("slot",{key:"37c9279ca4057f195393131825772bfd921b43a2",onSlotchange:()=>this.syncTabsAndPanels(),name:"nav"})))),a("div",{key:"7f7752bad5e65a95259546ee40c4bd6a58dfb110",part:"body",class:"tab-group__body"},a("slot",{key:"5131894576274caf9165db8c0b8bf1b5a1608b6a",onSlotchange:()=>this.syncTabsAndPanels()})))}get el(){return i(this)}};r.style=o;export{r as sc_tab_group};
//# sourceMappingURL=p-756a4a41.entry.js.map