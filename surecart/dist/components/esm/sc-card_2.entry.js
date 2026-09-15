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
        return (h(Tag, { key: '461f7c362c1e6faf9f3b3d785c69ee09c801ff47', part: "base", class: {
                'card': true,
                'card--borderless': this.borderless,
                'card--no-padding': this.noPadding,
            } }, h("slot", { key: '268d494f43226b3573f9382ab3d23cc36ab0bbf5' })));
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
        return (h("div", { key: 'd71b824fc1724bdae0b2003c9c0a48cb5483617f', class: "dashboard-module", part: "base" }, !!this.error && (h("sc-alert", { key: '9a896a315d9512c0f06ebaa03e31589b4350d63d', exportparts: "base:error__base, icon:error__icon, text:error__text, title:error__title, message:error__message", open: !!this.error, type: "danger" }, h("span", { key: '57f2d49cdc99c89e4d2646ecb105012f3ffa01d2', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: '13002577458dad11bab591ba6a42df8dceea27db', class: "heading", part: "heading" }, h("div", { key: '621f4988e1a5f3a27f5f22358b1453f4ae547b95', class: "heading__text", part: "heading-text" }, h("div", { key: '45c91aa6856dcd62691453ff69388883aca879fa', class: "heading__title", part: "heading-title" }, h("slot", { key: '4c280dc341d28e836b0f62622865de378d99b953', name: "heading", "aria-label": this.heading }, this.heading)), h("div", { key: '0d6fc4c87157813bbcd77a3ad2354871d60c55e5', class: "heading__description", part: "heading-description" }, h("slot", { key: '01c444f64f932ddb510d1edfdc43289180b549fa', name: "description" }))), h("slot", { key: '10ee763f20e92a92e57ad28a4e4f4348ce0a280a', name: "end" })), h("slot", { key: '1d3ccdb15670d9793aa2f9c5b13e7c0c9e176196' })));
    }
};
ScDashboardModule.style = ScDashboardModuleStyle0;

export { ScCard as sc_card, ScDashboardModule as sc_dashboard_module };

//# sourceMappingURL=sc-card_2.entry.js.map