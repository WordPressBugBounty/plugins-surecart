import { r as registerInstance, h, H as Host } from './index-745b6bec.js';
import { s as sizeImage, g as getFeaturedProductMediaAttributes } from './media-d21119a3.js';
import { a as applyFilters } from './index-871d88b8.js';

const scPriceRangeCss = ":host{display:block;line-height:1}";
const ScPriceRangeStyle0 = scPriceRangeCss;

const ScPriceRange = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.prices = undefined;
        this.minPrice = undefined;
        this.maxPrice = undefined;
    }
    handlePricesChange() {
        let min, max;
        (this.prices || [])
            .filter(p => !(p === null || p === void 0 ? void 0 : p.archived))
            .forEach(price => {
            if (!max || price.amount > max.amount) {
                max = price;
            }
            if (!min || price.amount < min.amount) {
                min = price;
            }
        });
        this.minPrice = min;
        this.maxPrice = max;
    }
    componentWillLoad() {
        this.handlePricesChange();
    }
    render() {
        if (!this.maxPrice || !this.minPrice) {
            return h(Host, null);
        }
        return (h(Host, null, this.maxPrice.amount == this.minPrice.amount ? (h("span", null, h("sc-format-number", { type: "currency", currency: this.maxPrice.currency, value: this.maxPrice.amount }))) : (h("span", null, h("sc-visually-hidden", null, wp.i18n.__('Price range from', 'surecart'), " "), h("sc-format-number", { type: "currency", currency: this.minPrice.currency, value: this.minPrice.amount }), h("span", { "aria-hidden": true }, ' — '), h("sc-visually-hidden", null, wp.i18n.__('to', 'surecart')), h("sc-format-number", { type: "currency", currency: this.maxPrice.currency, value: this.maxPrice.amount })))));
    }
    static get watchers() { return {
        "prices": ["handlePricesChange"]
    }; }
};
ScPriceRange.style = ScPriceRangeStyle0;

const scProductItemImageCss = ":host{border-style:none}.product-img{max-width:100%;aspect-ratio:var(--sc-product-image-aspect-ratio);padding-top:var(--sc-product-image-padding-top, 0);padding-bottom:var(--sc-product-image-padding-bottom, 0);padding-left:var(--sc-product-image-padding-left, 0);padding-right:var(--sc-product-image-padding-right, 0);margin-top:var(--sc-product-image-margin-top, 0);margin-bottom:var(--sc-product-image-margin-bottom, 0);margin-left:var(--sc-product-image-margin-left, 0);margin-right:var(--sc-product-image-margin-right, 0);border:solid var(--sc-product-image-border-width) var(--sc-product-image-border-color);border-radius:var(--sc-product-image-border-radius);overflow:hidden}.product-img>img{width:100%;height:100%;box-sizing:border-box;object-fit:contain;display:block;transition:transform var(--sc-transition-medium) ease}.product-img.is_covered>img{object-fit:cover}.product-img.is_contained>img{object-fit:contain}.product-img_placeholder{width:100%;height:100%;background-color:var(--sc-color-gray-300)}.product-img:hover img{transform:scale(1.05)}";
const ScProductItemImageStyle0 = scProductItemImageCss;

const ScProductItemImage = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.product = undefined;
        this.sizing = undefined;
    }
    getSrc() {
        var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l;
        if ((_b = (_a = this.product) === null || _a === void 0 ? void 0 : _a.featured_product_media) === null || _b === void 0 ? void 0 : _b.url) {
            return (_d = (_c = this.product) === null || _c === void 0 ? void 0 : _c.featured_product_media) === null || _d === void 0 ? void 0 : _d.url;
        }
        if ((_g = (_f = (_e = this.product) === null || _e === void 0 ? void 0 : _e.featured_product_media) === null || _f === void 0 ? void 0 : _f.media) === null || _g === void 0 ? void 0 : _g.url) {
            return sizeImage((_k = (_j = (_h = this.product) === null || _h === void 0 ? void 0 : _h.featured_product_media) === null || _j === void 0 ? void 0 : _j.media) === null || _k === void 0 ? void 0 : _k.url, applyFilters('surecart/product-list/media/size', 900));
        }
        return `${(_l = window.scData) === null || _l === void 0 ? void 0 : _l.plugin_url}/images/placeholder.jpg`;
    }
    render() {
        const { alt, title } = getFeaturedProductMediaAttributes(this.product);
        return (h(Host, { key: 'b6924a849e91f15ea37f7c3d1fc261e94aff9d21', style: { borderStyle: 'none' } }, h("div", { key: '414a12ccbcaa6f07c14e2ab623091ffd83c14409', class: {
                'product-img': true,
                'is_contained': this.sizing === 'contain',
                'is_covered': this.sizing === 'cover',
            } }, !!this.getSrc() ? h("img", { src: this.getSrc(), alt: alt, ...(title ? { title } : {}) }) : h("div", { class: "product-img_placeholder" }))));
    }
};
ScProductItemImage.style = ScProductItemImageStyle0;

const scProductItemPriceCss = ":host{display:block;line-height:1}.product-price{padding-top:var(--sc-product-price-padding-top, 0);padding-bottom:var(--sc-product-price-padding-bottom, 0);padding-left:var(--sc-product-price-padding-left, 0);padding-right:var(--sc-product-price-padding-right, 0);margin-top:var(--sc-product-price-margin-top, 0);margin-bottom:var(--sc-product-price-margin-bottom, 0);margin-left:var(--sc-product-price-margin-left, 0);margin-right:var(--sc-product-price-margin-right, 0);text-align:var(--sc-product-price-align);font-size:var(--sc-product-price-font-size);font-weight:var(--sc-product-price-font-weight);color:var(--sc-product-price-text-color)}";
const ScProductItemPriceStyle0 = scProductItemPriceCss;

const ScProductItemPrice = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.prices = undefined;
        this.range = true;
        this.metrics = undefined;
    }
    componentWillLoad() {
        var _a, _b, _c, _d, _e, _f;
        // If min-max price is different, then generate a price range.
        if (this.range && ((_a = this.metrics) === null || _a === void 0 ? void 0 : _a.min_price_amount) !== ((_b = this.metrics) === null || _b === void 0 ? void 0 : _b.max_price_amount)) {
            this.prices = [
                {
                    amount: (_c = this.metrics) === null || _c === void 0 ? void 0 : _c.min_price_amount,
                    currency: (_d = this.metrics) === null || _d === void 0 ? void 0 : _d.currency,
                },
                {
                    amount: (_e = this.metrics) === null || _e === void 0 ? void 0 : _e.max_price_amount,
                    currency: (_f = this.metrics) === null || _f === void 0 ? void 0 : _f.currency,
                },
            ];
        }
    }
    render() {
        var _a;
        const price = (this.prices || []).sort((a, b) => (a === null || a === void 0 ? void 0 : a.position) - (b === null || b === void 0 ? void 0 : b.position)).find(price => !(price === null || price === void 0 ? void 0 : price.archived));
        return (h("div", { key: 'ddea884259bc9c7bd9f371214e1f56510ef0214f', class: "product-price", part: "base" }, !this.range && ((_a = this.prices) === null || _a === void 0 ? void 0 : _a.length) ? (h("sc-format-number", { type: "currency", currency: (price === null || price === void 0 ? void 0 : price.currency) || 'usd', value: price === null || price === void 0 ? void 0 : price.amount })) : (h("sc-price-range", { prices: this.prices }))));
    }
};
ScProductItemPrice.style = ScProductItemPriceStyle0;

const scProductItemTitleCss = ".product-item-title{padding-top:var(--sc-product-title-padding-top, 0);padding-bottom:var(--sc-product-title-padding-bottom, 0);margin-top:var(--sc-product-title-margin-top, 0);margin-bottom:var(--sc-product-title-margin-bottom, 0);font-size:var(--sc-product-title-font-size);text-align:var(--sc-product-title-align);font-weight:var(--sc-product-title-font-weight);color:var(--sc-product-title-text-color);line-height:1.2}";
const ScProductItemTitleStyle0 = scProductItemTitleCss;

const ScProductItemTitle = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
    }
    render() {
        return (h(Host, { key: '6bdd56813383263c5b4dae214f42471ebedc450e' }, h("div", { key: 'cc77ce95aeb65dff5887521e0af1327dd17c9d2e', class: {
                'product-item-title': true,
            } }, h("slot", { key: 'bcfb74c6e9f19cba4ce8285a4a87cc65093e41c3' }))));
    }
};
ScProductItemTitle.style = ScProductItemTitleStyle0;

export { ScPriceRange as sc_price_range, ScProductItemImage as sc_product_item_image, ScProductItemPrice as sc_product_item_price, ScProductItemTitle as sc_product_item_title };

//# sourceMappingURL=sc-price-range_4.entry.js.map