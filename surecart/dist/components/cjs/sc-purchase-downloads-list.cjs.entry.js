'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');

const scPurchaseDownloadsListCss = ":host{display:block}.download__details{opacity:0.75}";
const ScPurchaseDownloadsListStyle0 = scPurchaseDownloadsListCss;

const ScPurchaseDownloadsList = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.allLink = undefined;
        this.heading = undefined;
        this.busy = undefined;
        this.loading = undefined;
        this.requestNonce = undefined;
        this.error = undefined;
        this.purchases = [];
    }
    renderEmpty() {
        return (index.h("div", null, index.h("sc-divider", { style: { '--spacing': '0' } }), index.h("slot", { name: "empty" }, index.h("sc-empty", { icon: "download" }, wp.i18n.__("You don't have any downloads.", 'surecart')))));
    }
    renderLoading() {
        return (index.h("sc-card", { "no-padding": true, style: { '--overflow': 'hidden' } }, index.h("sc-stacked-list", null, index.h("sc-stacked-list-row", { style: { '--columns': '2' }, "mobile-size": 0 }, index.h("div", { style: { padding: '0.5em' } }, index.h("sc-skeleton", { style: { width: '30%', marginBottom: '0.75em' } }), index.h("sc-skeleton", { style: { width: '20%' } }))))));
    }
    renderList() {
        return this.purchases.map(purchase => {
            var _a, _b, _c, _d, _e;
            const variant = purchase === null || purchase === void 0 ? void 0 : purchase.variant;
            const activeVariantDownloads = (((_a = variant === null || variant === void 0 ? void 0 : variant.downloads) === null || _a === void 0 ? void 0 : _a.data) || []).filter((d) => !d.archived);
            const hasVariantDownloads = (variant === null || variant === void 0 ? void 0 : variant.downloads_enabled) && activeVariantDownloads.length > 0;
            const downloads = hasVariantDownloads ? activeVariantDownloads : ((_d = (_c = (_b = purchase === null || purchase === void 0 ? void 0 : purchase.product) === null || _b === void 0 ? void 0 : _b.downloads) === null || _c === void 0 ? void 0 : _c.data) === null || _d === void 0 ? void 0 : _d.filter((d) => !d.archived)) || [];
            const totalDownloads = downloads.length;
            const mediaBytesList = (downloads || []).map(item => { var _a; return ((item === null || item === void 0 ? void 0 : item.media) ? (_a = item === null || item === void 0 ? void 0 : item.media) === null || _a === void 0 ? void 0 : _a.byte_size : 0); });
            const mediaByteTotalSize = mediaBytesList.reduce((prev, curr) => prev + curr, 0);
            return (index.h("sc-stacked-list-row", { href: !(purchase === null || purchase === void 0 ? void 0 : purchase.revoked)
                    ? addQueryArgs.addQueryArgs(window.location.href, {
                        action: 'show',
                        model: 'download',
                        id: purchase.id,
                        nonce: this.requestNonce,
                    })
                    : null, key: purchase.id, "mobile-size": 0 }, index.h("sc-spacing", { style: {
                    '--spacing': 'var(--sc-spacing-xx--small)',
                } }, index.h("div", null, index.h("strong", null, (_e = purchase === null || purchase === void 0 ? void 0 : purchase.product) === null || _e === void 0 ? void 0 : _e.name)), index.h("div", { class: "download__details" }, wp.i18n.sprintf(wp.i18n._n('%s file', '%s files', totalDownloads, 'surecart'), totalDownloads), !!mediaByteTotalSize && (index.h(index.Fragment, null, ' ', "\u2022 ", index.h("sc-format-bytes", { value: mediaByteTotalSize }))))), index.h("sc-icon", { name: "chevron-right", slot: "suffix" })));
        });
    }
    renderContent() {
        var _a;
        if (this.loading) {
            return this.renderLoading();
        }
        if (((_a = this.purchases) === null || _a === void 0 ? void 0 : _a.length) === 0) {
            return this.renderEmpty();
        }
        return (index.h("sc-card", { "no-padding": true, style: { '--overflow': 'hidden' } }, index.h("sc-stacked-list", null, this.renderList())));
    }
    render() {
        return (index.h("sc-dashboard-module", { key: '9a931a0fa45ff473ec436a78f031b7d2c97aac72', class: "downloads-list", error: this.error }, index.h("span", { key: '9c15cd8e21c6e87a9921745a5298ae579f980d7a', slot: "heading" }, index.h("slot", { key: 'fb3037b7ec2a7e9796f2d622c9c2f1c4b725ca80', name: "heading" }, this.heading || wp.i18n.__('Items', 'surecart'))), index.h("slot", { key: '77b52ccd8bb9944486f6c774c6ae3fc55d7c9b26', name: "before" }), !!this.allLink && (index.h("sc-button", { key: '50673eece2318130f6c82a9a3e0a80b80ce0d814', type: "link", href: this.allLink, slot: "end" }, wp.i18n.__('View all', 'surecart'), index.h("sc-icon", { key: '5ecbadefaa8e5dd4aa21b89dca69f5f8daf68605', name: "chevron-right", slot: "suffix" }))), this.renderContent(), index.h("slot", { key: 'd94e8dee2ddb90509473f1241d3beb8783ee5cf3', name: "after" }), this.busy && index.h("sc-block-ui", { key: '7deb64babd1d421c308dd18026def29dc9eaf014' })));
    }
    get el() { return index.getElement(this); }
};
ScPurchaseDownloadsList.style = ScPurchaseDownloadsListStyle0;

exports.sc_purchase_downloads_list = ScPurchaseDownloadsList;

//# sourceMappingURL=sc-purchase-downloads-list.cjs.entry.js.map