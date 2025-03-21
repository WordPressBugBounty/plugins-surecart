'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const fetch = require('./fetch-d644cebd.js');
const lazy = require('./lazy-2b509fa7.js');
const addQueryArgs = require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');

const scDashboardDownloadsListCss = ":host{display:block}.download__details{opacity:0.75}";
const ScDashboardDownloadsListStyle0 = scDashboardDownloadsListCss;

const ScDownloadsList = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.query = {
            page: 1,
            per_page: 10,
        };
        this.allLink = undefined;
        this.heading = undefined;
        this.isCustomer = undefined;
        this.requestNonce = undefined;
        this.purchases = [];
        this.loading = undefined;
        this.busy = undefined;
        this.error = undefined;
        this.pagination = {
            total: 0,
            total_pages: 0,
        };
    }
    componentWillLoad() {
        lazy.onFirstVisible(this.el, () => {
            this.initialFetch();
        });
    }
    async initialFetch() {
        if (!this.isCustomer) {
            return;
        }
        try {
            this.loading = true;
            await this.getItems();
        }
        catch (e) {
            console.error(this.error);
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.loading = false;
        }
    }
    async fetchItems() {
        if (!this.isCustomer) {
            return;
        }
        try {
            this.busy = true;
            await this.getItems();
        }
        catch (e) {
            console.error(this.error);
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
        }
        finally {
            this.busy = false;
        }
    }
    /** Get all subscriptions */
    async getItems() {
        const response = (await await fetch.apiFetch({
            path: addQueryArgs.addQueryArgs(`surecart/v1/purchases/`, {
                expand: ['product', 'product.downloads', 'download.media'],
                downloadable: true,
                revoked: false,
                ...this.query,
            }),
            parse: false,
        }));
        this.pagination = {
            total: parseInt(response.headers.get('X-WP-Total')),
            total_pages: parseInt(response.headers.get('X-WP-TotalPages')),
        };
        this.purchases = (await response.json());
        return this.purchases;
    }
    nextPage() {
        this.query.page = this.query.page + 1;
        this.fetchItems();
    }
    prevPage() {
        this.query.page = this.query.page - 1;
        this.fetchItems();
    }
    render() {
        var _a;
        return (index.h("sc-purchase-downloads-list", { key: '8a407e34ef1f0391cd10eaa26fe39f9b514df13d', heading: this.heading, allLink: this.allLink && this.pagination.total_pages > 1 ? this.allLink : '', loading: this.loading, busy: this.busy, requestNonce: this.requestNonce, error: this.error, purchases: this.purchases }, index.h("span", { key: '96f5cfb120ced4bb1df6c7fe91ceac0d8404211e', slot: "heading" }, index.h("slot", { key: '350f2eeeef60a8e1e02e45b254bbf7e1445c3c9a', name: "heading" }, this.heading || wp.i18n.__('Downloads', 'surecart'))), index.h("sc-pagination", { key: 'dcf0d6d0c55b026de43a23cabb495aac69702686', slot: "after", page: this.query.page, perPage: this.query.per_page, total: this.pagination.total, totalPages: this.pagination.total_pages, totalShowing: (_a = this === null || this === void 0 ? void 0 : this.purchases) === null || _a === void 0 ? void 0 : _a.length, onScNextPage: () => this.nextPage(), onScPrevPage: () => this.prevPage() })));
    }
    get el() { return index.getElement(this); }
};
ScDownloadsList.style = ScDashboardDownloadsListStyle0;

exports.sc_dashboard_downloads_list = ScDownloadsList;

//# sourceMappingURL=sc-dashboard-downloads-list.cjs.entry.js.map