'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scBreadcrumbCss = ":host{display:inline-flex}.breadcrumb-item{display:inline-flex;align-items:center;font-family:var(--sc-font-sans);font-size:var(--sc-font-size-small);font-weight:var(--sc-font-weight-semibold);color:var(--sc-breadcrumb-color, var(--sc-color-gray-600));line-height:var(--sc-line-height-normal);white-space:nowrap}.breadcrumb-item__label{display:inline-block;font-family:inherit;font-size:inherit;font-weight:inherit;line-height:inherit;text-decoration:none;color:inherit;background:none;border:none;border-radius:var(--sc-border-radius-medium);padding:0;margin:0;cursor:pointer;transition:color var(--sc-transition-fast) ease}:host(:not(:last-of-type)) .breadcrumb-item__label{color:var(--sc-breadcrumb-item-label-color, var(--sc-color-gray-900))}:host(:not(:last-of-type)) .breadcrumb-item__label:hover{color:var(--sc-breadcrumb-item-label-hover-color, var(--sc-color-primary-500))}:host(:not(:last-of-type)) .breadcrumb-item__label:active{color:var(--sc-breadcrumb-item-label-active-color, var(--sc-color-gray-900))}.breadcrumb-item__label:focus{box-shadow:var(--sc-focus-ring)}.breadcrumb-item__prefix,.breadcrumb-item__suffix{display:none;flex:0 0 auto;display:flex;align-items:center}.breadcrumb-item--has-prefix .breadcrumb-item__prefix{display:inline-flex;margin-right:var(--sc-spacing-x-small)}.breadcrumb-item--has-suffix .breadcrumb-item__suffix{display:inline-flex;margin-left:var(--sc-spacing-x-small)}:host(:last-of-type) .breadcrumb-item__separator{display:none}.breadcrumb-item__separator{display:inline-flex;align-items:center;margin:0 var(--sc-spacing-x-small);user-select:none}";
const ScBreadcrumbStyle0 = scBreadcrumbCss;

const ScBreadcrumb = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.href = undefined;
        this.target = undefined;
        this.rel = 'noreferrer noopener';
        this.hasPrefix = undefined;
        this.hasSuffix = undefined;
    }
    handleSlotChange() {
        this.hasPrefix = !!this.el.querySelector('[slot="prefix"]');
        this.hasSuffix = !!this.el.querySelector('[slot="suffix"]');
    }
    render() {
        const Tag = this.href ? 'a' : 'div';
        return (index.h("div", { key: '65053f3ab81e206acd2bef1b9e1293ae6bf5d4e8', part: "base", class: {
                'breadcrumb-item': true,
                'breadcrumb-item--has-prefix': this.hasPrefix,
                'breadcrumb-item--has-suffix': this.hasSuffix,
            } }, index.h("span", { key: '76abbcd880c1a5f5b703d001716a029bc76114d8', part: "prefix", class: "breadcrumb-item__prefix" }, index.h("slot", { key: '3d42186361b3aa33182645719e937042db994430', name: "prefix" })), index.h(Tag, { key: '88928edce649838606355b525cee0293f3d751c3', part: "label", class: "breadcrumb-item__label breadcrumb-item__label--link", href: this.href, target: this.target, rel: this.rel }, index.h("slot", { key: '6b5169a7129f2ad8575775c316e5908b8a857501' })), index.h("span", { key: '9f10d6f503fc0f7a78c3accb63cab5a6c27836c8', part: "suffix", class: "breadcrumb-item__suffix" }, index.h("slot", { key: '4b1c3976bcb4f64b3934bce939427fd2001ef3c4', name: "suffix", onSlotchange: () => this.handleSlotChange() })), index.h("span", { key: 'a04c250063db3c86c298b1ca2fde1de432e06321', part: "separator", class: "breadcrumb-item__separator", "aria-hidden": "true" }, index.h("slot", { key: '14aecfcb4d4445c80cdeda84b4e30d7a4744b596', name: "separator", onSlotchange: () => this.handleSlotChange() }, index.h("sc-icon", { key: 'f1117d425f7f0d03fb1df9d829654d611a79824d', name: "chevron-right" })))));
    }
    get el() { return index.getElement(this); }
};
ScBreadcrumb.style = ScBreadcrumbStyle0;

exports.sc_breadcrumb = ScBreadcrumb;

//# sourceMappingURL=sc-breadcrumb.cjs.entry.js.map