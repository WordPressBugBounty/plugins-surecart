import { r as registerInstance, h, F as Fragment, a as getElement } from './index-25e5af33.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';

const scPurchaseDownloadsListCss = ":host{display:block}.download__details{opacity:0.75}";
const ScPurchaseDownloadsListStyle0 = scPurchaseDownloadsListCss;

const ScPurchaseDownloadsList = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.allLink = undefined;
        this.heading = undefined;
        this.busy = undefined;
        this.loading = undefined;
        this.requestNonce = undefined;
        this.error = undefined;
        this.purchases = [];
    }
    renderEmpty() {
        return (h("div", null, h("sc-divider", { style: { '--spacing': '0' } }), h("slot", { name: "empty" }, h("sc-empty", { icon: "download" }, wp.i18n.__("You don't have any downloads.", 'surecart')))));
    }
    renderLoading() {
        return (h("sc-card", { "no-padding": true, style: { '--overflow': 'hidden' } }, h("sc-stacked-list", null, h("sc-stacked-list-row", { style: { '--columns': '2' }, "mobile-size": 0 }, h("div", { style: { padding: '0.5em' } }, h("sc-skeleton", { style: { width: '30%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '20%' } }))))));
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
            return (h("sc-stacked-list-row", { href: !(purchase === null || purchase === void 0 ? void 0 : purchase.revoked)
                    ? addQueryArgs(window.location.href, {
                        action: 'show',
                        model: 'download',
                        id: purchase.id,
                        nonce: this.requestNonce,
                    })
                    : null, key: purchase.id, "mobile-size": 0 }, h("sc-spacing", { style: {
                    '--spacing': 'var(--sc-spacing-xx--small)',
                } }, h("div", null, h("strong", null, (_e = purchase === null || purchase === void 0 ? void 0 : purchase.product) === null || _e === void 0 ? void 0 : _e.name)), h("div", { class: "download__details" }, wp.i18n.sprintf(wp.i18n._n('%s file', '%s files', totalDownloads, 'surecart'), totalDownloads), !!mediaByteTotalSize && (h(Fragment, null, ' ', "\u2022 ", h("sc-format-bytes", { value: mediaByteTotalSize }))))), h("sc-icon", { name: "chevron-right", slot: "suffix" })));
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
        return (h("sc-card", { "no-padding": true, style: { '--overflow': 'hidden' } }, h("sc-stacked-list", null, this.renderList())));
    }
    render() {
        return (h("sc-dashboard-module", { key: '9a931a0fa45ff473ec436a78f031b7d2c97aac72', class: "downloads-list", error: this.error }, h("span", { key: '9c15cd8e21c6e87a9921745a5298ae579f980d7a', slot: "heading" }, h("slot", { key: 'fb3037b7ec2a7e9796f2d622c9c2f1c4b725ca80', name: "heading" }, this.heading || wp.i18n.__('Items', 'surecart'))), h("slot", { key: '77b52ccd8bb9944486f6c774c6ae3fc55d7c9b26', name: "before" }), !!this.allLink && (h("sc-button", { key: '50673eece2318130f6c82a9a3e0a80b80ce0d814', type: "link", href: this.allLink, slot: "end" }, wp.i18n.__('View all', 'surecart'), h("sc-icon", { key: '5ecbadefaa8e5dd4aa21b89dca69f5f8daf68605', name: "chevron-right", slot: "suffix" }))), this.renderContent(), h("slot", { key: 'd94e8dee2ddb90509473f1241d3beb8783ee5cf3', name: "after" }), this.busy && h("sc-block-ui", { key: '7deb64babd1d421c308dd18026def29dc9eaf014' })));
    }
    get el() { return getElement(this); }
};
ScPurchaseDownloadsList.style = ScPurchaseDownloadsListStyle0;

export { ScPurchaseDownloadsList as sc_purchase_downloads_list };

//# sourceMappingURL=sc-purchase-downloads-list.entry.js.map