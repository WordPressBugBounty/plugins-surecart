import{r as e,h as a,F as r,a as t}from"./p-e97fde0a.js";const s=":host{display:block}.breadcrumb{display:flex;align-items:center;flex-wrap:wrap}";const c=s;const d=class{constructor(a){e(this,a);this.label="Breadcrumb"}getSeparator(){const e=this.el.shadowRoot.querySelector("slot[name=separator]");const a=e.assignedElements({flatten:true})[0];const r=a.cloneNode(true);[r,...r.querySelectorAll("[id]")].forEach((e=>e.removeAttribute("id")));r.slot="separator";return r}handleSlotChange(){const e=this.el.shadowRoot.querySelector(".breadcrumb slot");const a=e.assignedElements().filter((e=>e.nodeName==="CE-BREADCRUMB"));a.forEach(((e,r)=>{const t=e.querySelector('[slot="separator"]');if(t===null){e.append(this.getSeparator())}if(r===a.length-1){e.setAttribute("aria-current","page")}else{e.removeAttribute("aria-current")}}))}render(){return a(r,{key:"2f3f63eb0f3721d4b87c4e2a7e2c27310c1a0fab"},a("nav",{key:"bdd48259dd1852805a265848bfec21e941da1dd2",part:"base",class:"breadcrumb","aria-label":this.label},a("slot",{key:"b8b11182fc31e3fbc274093df61470965e1be282",onSlotchange:()=>this.handleSlotChange()})),a("div",{key:"e5c321c8902b78bd10272bf91d34b299041286c5",part:"separator",hidden:true,"aria-hidden":"true"},a("slot",{key:"3a306ecf502eeffd1d51cd0942bf11216523a9b3",name:"separator"},a("sc-icon",{key:"56ced04d1595b218f2ff7d6248e42a5092a65aff",name:"chevron-right"}))))}get el(){return t(this)}};d.style=c;export{d as sc_breadcrumbs};
//# sourceMappingURL=p-42efcf53.entry.js.map