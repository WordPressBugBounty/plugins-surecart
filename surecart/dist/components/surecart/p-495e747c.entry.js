import{r as e,h as t,H as r}from"./p-e97fde0a.js";import{d as s}from"./p-23f2d375.js";import"./p-7a5626ee.js";import"./p-e2d5dc4f.js";import"./p-03631502.js";const o=":host{display:flex;justify-content:var(--sc-upsell-countdown-timer-justify-content, center);align-items:var(--sc-upsell-countdown-timer-align-items, center);text-align:var(--sc-upsell-countdown-timer-text-align, center);flex-wrap:wrap;gap:var(--sc-upsell-countdown-timer-gap, 0.5em);line-height:1;padding:var(--sc-upsell-countdown-timer-padding, var(--sc-spacing-medium));border-radius:var(--sc-upsell-countdown-timer-border-radius, var(--sc-border-radius-pill));background-color:var(--sc-upsell-countdown-timer-background-color, rgb(226, 249, 235));color:var(--sc-upsell-countdown-timer-color, rgb(71, 91, 80))}";const c=o;const n=class{constructor(t){e(this,t);this.timeRemaining=Infinity;this.formattedTime=undefined;this.showIcon=true}componentDidLoad(){this.updateCountdown()}updateCountdown(){this.formattedTime=s();setInterval((()=>{this.formattedTime=s()}),1e3)}render(){return t(r,{key:"7726647f37346c87e3ed5836e969b8fb80a556d8",role:"timer",class:{"sc-upsell-countdown-timer":true}},this.showIcon&&t("sc-icon",{key:"b0e605cb12ff214a8c30e6a31f6448f9350cae95",name:"clock"}),t("span",{key:"2f81e02d6e38c0d2b04dbe05c9d87ad546631746"},t("slot",{key:"74d40dc8e11df76117e1cd8af3fffe77d3618d4a",name:"offer-expire-text"})," ",t("strong",{key:"721aaaa1310b459784e5ac2c18f31f537c8883af"},this.formattedTime)))}};n.style=c;export{n as sc_upsell_countdown_timer};
//# sourceMappingURL=p-495e747c.entry.js.map