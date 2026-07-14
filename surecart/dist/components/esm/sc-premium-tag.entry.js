import { r as registerInstance, h } from './index-25e5af33.js';

const ScPremiumTag = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.size = 'small';
    }
    render() {
        return (h("sc-tag", { key: '9b0568172aec80f2c055acedf805db3c8fa0167d', type: "success", size: this.size }, wp.i18n.__('Premium', 'surecart')));
    }
};

export { ScPremiumTag as sc_premium_tag };

//# sourceMappingURL=sc-premium-tag.entry.js.map