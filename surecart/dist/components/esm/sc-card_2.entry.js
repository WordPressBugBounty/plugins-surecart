import { r as registerInstance, h, a as getElement } from './index-745b6bec.js';

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
        return (h(Tag, { key: '9ce12e8c3b9b9b2f87599ac96853a6814a50d104', part: "base", class: {
                'card': true,
                'card--borderless': this.borderless,
                'card--no-padding': this.noPadding,
            } }, h("slot", { key: '964fa51fa7a0d9e50cb9625834a8a5adc0084447' })));
    }
    get el() { return getElement(this); }
};
ScCard.style = ScCardStyle0;

const scDashboardModuleCss = ":host{display:block;position:relative}.dashboard-module{display:grid;gap:var(--sc-dashboard-module-spacing, 1em)}.heading{font-family:var(--sc-font-sans);display:flex;flex-wrap:wrap;gap:1em;align-items:center;justify-content:space-between}.heading__text{display:grid;flex:1;gap:calc(var(--sc-dashboard-module-spacing, 1em) / 2)}@media screen and (min-width: 720px){.heading{gap:2em}}.heading__title{font-size:var(--sc-dashbaord-module-heading-size, var(--sc-font-size-x-large));font-weight:var(--sc-dashbaord-module-heading-weight, var(--sc-font-weight-bold));line-height:var(--sc-dashbaord-module-heading-line-height, var(--sc-line-height-dense));white-space:nowrap}.heading__description{font-size:var(--sc-font-size-normal);line-height:var(--sc-line-height-dense);opacity:0.85}";
const ScDashboardModuleStyle0 = scDashboardModuleCss;

const ScDashboardModule = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.heading = undefined;
        this.error = undefined;
        this.loading = undefined;
    }
    render() {
        return (h("div", { key: '214fd7652c6d3ce9362cc80a239e7738024fdabb', class: "dashboard-module", part: "base" }, !!this.error && (h("sc-alert", { key: '1c59334c5967bd602a9102bcf19709fded35c658', exportparts: "base:error__base, icon:error__icon, text:error__text, title:error__title, message:error__message", open: !!this.error, type: "danger" }, h("span", { key: '27ef95257981dd868d6047b7d00dd14272e2bfc0', slot: "title" }, wp.i18n.__('Error', 'surecart')), this.error)), h("div", { key: 'b00dff4165829136d6f2029ba066a1d798208189', class: "heading", part: "heading" }, h("div", { key: '2402b46c572f19abeee5f8e7e8e7faea24ffed24', class: "heading__text", part: "heading-text" }, h("div", { key: '86845a05d0b82c040eac3c245ac03f4c123673dd', class: "heading__title", part: "heading-title" }, h("slot", { key: 'aa334e925f71683d541806cd42defda44e5bd875', name: "heading", "aria-label": this.heading }, this.heading)), h("div", { key: '3a82a689629871831e7700e74f06a1294a91551e', class: "heading__description", part: "heading-description" }, h("slot", { key: '281f165815edcc908b5a19504f43ba321a4685ba', name: "description" }))), h("slot", { key: 'e45151237557c6d3519e0fae04de2178f658337b', name: "end" })), h("slot", { key: 'a6cc0f9bf52088352840d04261f2ed7726dffd48' })));
    }
};
ScDashboardModule.style = ScDashboardModuleStyle0;

export { ScCard as sc_card, ScDashboardModule as sc_dashboard_module };

//# sourceMappingURL=sc-card_2.entry.js.map