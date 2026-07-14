'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const ScPremiumTag = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.size = 'small';
    }
    render() {
        return (index.h("sc-tag", { key: '9b0568172aec80f2c055acedf805db3c8fa0167d', type: "success", size: this.size }, wp.i18n.__('Premium', 'surecart')));
    }
};

exports.sc_premium_tag = ScPremiumTag;

//# sourceMappingURL=sc-premium-tag.cjs.entry.js.map