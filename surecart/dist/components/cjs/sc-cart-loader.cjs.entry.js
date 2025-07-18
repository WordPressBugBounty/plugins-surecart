'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const mutations = require('./mutations-10a18c83.js');
require('./index-bcdafe6e.js');
require('./utils-2e91d46c.js');
require('./remove-query-args-b57e8cd3.js');
require('./add-query-args-49dcb630.js');
require('./index-fb76df07.js');
require('./google-59d23803.js');
require('./currency-71fce0f0.js');
require('./store-4a539aea.js');
require('./price-5b1afcfe.js');

const scCartLoaderCss = ":host{position:absolute;z-index:var(--sc-cart-z-index, 999999);font-family:var(--sc-font-sans)}";
const ScCartLoaderStyle0 = scCartLoaderCss;

const ScCartLoader = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.template = undefined;
    }
    render() {
        var _a;
        // check for forms.
        if (document.querySelector('sc-checkout')) {
            return;
        }
        // clear the order if it's already paid.
        if (((_a = mutations.state === null || mutations.state === void 0 ? void 0 : mutations.state.checkout) === null || _a === void 0 ? void 0 : _a.status) === 'paid') {
            mutations.state.checkout = null;
            return null;
        }
        // return the loader.
        return index.h("div", { innerHTML: this.template || '' });
    }
};
ScCartLoader.style = ScCartLoaderStyle0;

exports.sc_cart_loader = ScCartLoader;

//# sourceMappingURL=sc-cart-loader.cjs.entry.js.map