import { r as registerInstance, h } from './index-745b6bec.js';
import { u as updateFormState, s as state } from './mutations-2f6b31cb.js';
import { t as toggleSwap } from './index-d0f5f0db.js';
import { c as createErrorNotice } from './mutations-ed6d0770.js';
import './index-06061d4e.js';
import './utils-cd1431df.js';
import './remove-query-args-938c53ea.js';
import './add-query-args-0e2a8393.js';
import './index-c5a96d53.js';
import './google-a86aa761.js';
import './currency-a0c9bff4.js';
import './store-627acec4.js';
import './price-7bb626d0.js';
import './fetch-8ecbbe53.js';

const scSwapCss = ".swap{display:flex;align-items:baseline;justify-content:space-between}.swap__price{color:var(--sc-swap-price-color, var(--sc-input-label-color));line-height:var(--sc-line-height-dense);font-size:var(--sc-font-size-small);white-space:nowrap}";
const ScSwapStyle0 = scSwapCss;

const ScSwap = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.lineItem = undefined;
    }
    async onSwapToggleChange(e) {
        var _a;
        try {
            updateFormState('FETCH');
            state.checkout = await toggleSwap({ id: (_a = this.lineItem) === null || _a === void 0 ? void 0 : _a.id, action: e.target.checked ? 'swap' : 'unswap' });
            updateFormState('RESOLVE');
        }
        catch (e) {
            updateFormState('REJECT');
            createErrorNotice(e.message);
            console.error(e);
        }
    }
    render() {
        var _a, _b, _c, _d, _e, _f, _g;
        if (!((_b = (_a = this === null || this === void 0 ? void 0 : this.lineItem) === null || _a === void 0 ? void 0 : _a.price) === null || _b === void 0 ? void 0 : _b.current_swap) && !((_c = this === null || this === void 0 ? void 0 : this.lineItem) === null || _c === void 0 ? void 0 : _c.swap)) {
            return null;
        }
        const swap = ((_d = this === null || this === void 0 ? void 0 : this.lineItem) === null || _d === void 0 ? void 0 : _d.swap) || ((_f = (_e = this === null || this === void 0 ? void 0 : this.lineItem) === null || _e === void 0 ? void 0 : _e.price) === null || _f === void 0 ? void 0 : _f.current_swap);
        const price = (swap === null || swap === void 0 ? void 0 : swap.swap_price) || this.lineItem.price;
        return (h("div", { class: "swap" }, h("sc-switch", { checked: !!((_g = this === null || this === void 0 ? void 0 : this.lineItem) === null || _g === void 0 ? void 0 : _g.swap), onScChange: e => this.onSwapToggleChange(e) }, swap === null || swap === void 0 ? void 0 : swap.description), !!(price === null || price === void 0 ? void 0 : price.display_amount) && (h("div", { class: "swap__price" }, price === null || price === void 0 ? void 0 :
            price.display_amount, " ", price === null || price === void 0 ? void 0 :
            price.short_interval_text, " ", price === null || price === void 0 ? void 0 :
            price.interval_count_text))));
    }
};
ScSwap.style = ScSwapStyle0;

export { ScSwap as sc_swap };

//# sourceMappingURL=sc-swap.entry.js.map