'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scCardCss = ":host{display:block;--overflow:visible}.card{font-family:var(--sc-font-sans);overflow:var(--overflow);display:block}.card:not(.card--borderless){padding:var(--sc-card-padding, var(--sc-spacing-large));background:var(--sc-card-background-color, var(--sc-color-white));border:1px solid var(--sc-card-border-color, var(--sc-color-gray-300));border-radius:var(--sc-card-border-radius, var(--sc-input-border-radius-medium));box-shadow:var(--sc-shadow-small)}.card:not(.card--borderless).card--no-padding{padding:0}.title--divider{display:none}.card--has-title-slot .card--title{font-weight:var(--sc-font-weight-bold);line-height:var(--sc-line-height-dense)}.card--has-title-slot .title--divider{display:block}::slotted(*){margin-bottom:var(--sc-form-row-spacing)}::slotted(*:first-child){margin-top:0}::slotted(*:last-child){margin-bottom:0 !important}";
const ScCardStyle0 = scCardCss;

const ScCard = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
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
        return (index.h(Tag, { key: '0ba5c66c2084dac75455e41bdf5764e03ed45e9d', part: "base", class: {
                'card': true,
                'card--borderless': this.borderless,
                'card--no-padding': this.noPadding,
            } }, index.h("slot", { key: 'bdd6398f4a4428a310f4bc5fb04300d39707f7b9' })));
    }
    get el() { return index.getElement(this); }
};
ScCard.style = ScCardStyle0;

const scDashboardModuleCss = ":host{display:block;position:relative}.dashboard-module{display:grid;gap:var(--sc-dashboard-module-spacing, 1em)}.dashboard-module>*,.dashboard-module ::slotted(*){min-width:0}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;gap:1em;align-items:center;justify-content:space-between}.heading__text{display:grid;flex:1;gap:calc(var(--sc-dashboard-module-spacing, 1em) / 2)}@media screen and (min-width: 720px){.heading{gap:2em}}.heading__title{font-size:var(--sc-dashbaord-module-heading-size, var(--sc-font-size-x-large));font-weight:var(--sc-dashbaord-module-heading-weight, var(--sc-font-weight-bold));line-height:var(--sc-dashbaord-module-heading-line-height, var(--sc-line-height-dense));white-space:nowrap}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);opacity:0.85}";
const ScDashboardModuleStyle0 = scDashboardModuleCss;

const ScDashboardModule = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.heading = undefined;
        this.error = undefined;
        this.loading = undefined;
    }
    render() {
        return (index.h("div", { key: 'c74169b8d89b313654c46524501e9a18d9d7e4b9', class: "dashboard-module", part: "base" }, !!this.error && (index.h("sc-alert", { key: '3b130790243a375844c081b6035f2361af94402b', exportparts: "base:error__base, icon:error__icon, text:error__text, title:error__title, message:error__message", open: !!this.error, type: "danger" }, index.h("span", { key: '755d2b142f78f847fead08f68baf5bda6502ba90', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), index.h("div", { key: '2e38a1f48005443b2edde396ef363ca6ba816e60', class: "heading", part: "heading" }, index.h("div", { key: 'e7007e61f0a4e16d0e71cef505bd21fe5a6b194f', class: "heading__text", part: "heading-text" }, index.h("div", { key: '52c4109246548372692a02a947ff84ab396f37e7', class: "heading__title", part: "heading-title" }, index.h("slot", { key: '483332b56ed3d0a53a7970a08b2da90ebfaba782', name: "heading", "aria-label": this.heading }, this.heading)), index.h("div", { key: '0fa9bbb662bcdcc01feba25e42314c417eafa6b7', class: "heading__description", part: "heading-description" }, index.h("slot", { key: '27ef733572a5ba07b4f57eb8055e71fdc7bd8a40', name: "description" }))), index.h("slot", { key: '9ac8e1a7789ba1d782ce45df08639abf9eb78c90', name: "end" })), index.h("slot", { key: '328034ad135fdaa5be9df809016b34437e6afb04' })));
    }
};
ScDashboardModule.style = ScDashboardModuleStyle0;

exports.sc_card = ScCard;
exports.sc_dashboard_module = ScDashboardModule;

//# sourceMappingURL=sc-card_2.cjs.entry.js.map