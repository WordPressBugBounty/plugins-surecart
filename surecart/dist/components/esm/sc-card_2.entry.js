import { r as registerInstance, h, a as getElement } from './index-25e5af33.js';

const scCardCss = ":host{display:block;--overflow:visible}.card{font-family:var(--sc-font-sans);overflow:var(--overflow);display:block}.card:not(.card--borderless){padding:var(--sc-card-padding, var(--sc-spacing-large));background:var(--sc-card-background-color, var(--sc-color-white));border:1px solid var(--sc-card-border-color, var(--sc-color-gray-300));border-radius:var(--sc-card-border-radius, var(--sc-input-border-radius-medium));box-shadow:var(--sc-shadow-small)}.card:not(.card--borderless).card--no-padding{padding:0}.title--divider{display:none}.card--has-title-slot .card--title{font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense)}.card--has-title-slot .title--divider{display:block}::slotted(*){margin-bottom:var(--sc-form-row-spacing)}::slotted(*:first-child){margin-top:0}::slotted(*:last-child){margin-bottom:0 !important}";
const ScCardStyle0 = scCardCss;

const ScCard = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.noDivider = undefined;
        this.borderless = undefined;
        this.noPadding = undefined;
        this.href = undefined;
        this.loading = undefined;
        this.hasTitleSlot = undefined;
    }
    componentWillLoad() {
        this.handleSlotChange();
    }
    handleSlotChange() {
        this.hasTitleSlot = !!this.el.querySelector('[slot="title"]');
    }
    render() {
        const Tag = this.href ? 'a' : 'div';
        return (h(Tag, { key: 'ec6e9bb9f259ea7941dac50afd4a05c9b8e8cd34', part: "base", class: {
                'card': true,
                'card--borderless': this.borderless,
                'card--no-padding': this.noPadding,
            } }, h("slot", { key: '7b5f038e48aaddb6a1d2096e9194b47cc8f3c58b' })));
    }
    get el() { return getElement(this); }
};
ScCard.style = ScCardStyle0;

const scDashboardModuleCss = ":host{display:block;position:relative}.dashboard-module{display:grid;gap:var(--sc-dashboard-module-spacing, 1em)}.dashboard-module>*,.dashboard-module ::slotted(*){min-width:0}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;gap:1em;align-items:center;justify-content:space-between}.heading__text{display:grid;flex:1;gap:calc(var(--sc-dashboard-module-spacing, 1em) / 2)}@media screen and (min-width: 720px){.heading{gap:2em}}.heading__title{font-size:var(--sc-dashbaord-module-heading-size, var(--sc-font-size-x-large));font-weight:var(--sc-dashbaord-module-heading-weight, var(--sc-font-weight-bold));line-height:var(--sc-dashbaord-module-heading-line-height, var(--sc-line-height-dense));white-space:nowrap}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);opacity:0.85}";
const ScDashboardModuleStyle0 = scDashboardModuleCss;

const ScDashboardModule = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.heading = undefined;
        this.error = undefined;
        this.loading = undefined;
    }
    render() {
        return (h("div", { key: 'ce5b99e0647e068f8464306757f059a60d29e50e', class: "dashboard-module", part: "base" }, !!this.error && (h("sc-alert", { key: 'f2fef71d4471fffbc22c42189b123dc2c4a271c2', exportparts: "base:error__base, icon:error__icon, text:error__text, title:error__title, message:error__message", open: !!this.error, type: "danger" }, h("span", { key: '5befd8e32f6524f1309d37d45dafccce6c9ca089', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: '6c317957fb94149ffa70ec573eecc0be0180b4d1', class: "heading", part: "heading" }, h("div", { key: '3ba86805063026026d4b6148879b87db9b2f6ff8', class: "heading__text", part: "heading-text" }, h("div", { key: '81e9ce253d138e0654470cbd6d8e363fdc3c0e7a', class: "heading__title", part: "heading-title" }, h("slot", { key: '2e3643e6642451ed2f3a53125007e7333f8c5450', name: "heading", "aria-label": this.heading }, this.heading)), h("div", { key: 'b2ae6bdc8f465f7fd621a858ccf9066d30c125b0', class: "heading__description", part: "heading-description" }, h("slot", { key: 'ddb666d16734427baebecbdd0ea4bd2e539dc68d', name: "description" }))), h("slot", { key: 'dc1e01e12b933b96276732ce401babe9e0eac9dc', name: "end" })), h("slot", { key: '92f335f5afc961f0f90fa3448eef30fed3ed1375' })));
    }
};
ScDashboardModule.style = ScDashboardModuleStyle0;

export { ScCard as sc_card, ScDashboardModule as sc_dashboard_module };

//# sourceMappingURL=sc-card_2.entry.js.map