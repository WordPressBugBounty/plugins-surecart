'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const mutations = require('./mutations-86c3aa04.js');
require('./fetch-d374a251.js');
require('./add-query-args-49dcb630.js');
require('./remove-query-args-b57e8cd3.js');
require('./store-ce062aec.js');
require('./utils-2e91d46c.js');
require('./index-bcdafe6e.js');
require('./watchers-db03ec4e.js');
require('./google-03835677.js');
require('./currency-71fce0f0.js');
require('./google-59d23803.js');
require('./util-b877b2bd.js');
require('./index-fb76df07.js');
require('./mutations-11c8f9a8.js');

const scUpsellNoThanksButtonCss = "sc-upsell-no-thanks-button{display:block}sc-upsell-no-thanks-button p{margin-block-start:0;margin-block-end:1em}sc-upsell-no-thanks-button .wp-block-button__link{position:relative;text-decoration:none}";
const ScUpsellNoThanksButtonStyle0 = scUpsellNoThanksButtonCss;

const ScUpsellNoThanksButton = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        return (index.h(index.Host, { key: 'f84ea052003e7828428f59d7046c00eb71aee95a', onClick: () => mutations.decline() }, index.h("slot", { key: '330d09226ff1f67ea1e9f24ffd96d38b77ef755c' })));
    }
};
ScUpsellNoThanksButton.style = ScUpsellNoThanksButtonStyle0;

exports.sc_upsell_no_thanks_button = ScUpsellNoThanksButton;

//# sourceMappingURL=sc-upsell-no-thanks-button.cjs.entry.js.map