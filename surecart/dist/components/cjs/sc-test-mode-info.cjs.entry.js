'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');

const scTestModeInfoCss = "sc-test-mode-info .sc-test-mode-info-content ol{padding-left:1em;margin:0;font-size:12px}sc-test-mode-info .sc-test-mode-info-content ol img{width:320px;margin-top:12px}sc-test-mode-info .sc-test-mode-info-content ul{padding-left:1em}sc-test-mode-info .sc-test-mode-info-footer{display:flex;justify-content:space-between}sc-test-mode-info .sc-test-mode-info-footer sc-button>sc-icon{margin-left:4px}sc-test-mode-info .sc-test-mode-info-footer>span{font-size:var(--sc-button-font-size-small);align-content:center;opacity:0.75}sc-test-mode-info sc-popover{--panel-width:25em}#wpadminbar #wp-admin-bar-sc_change_checkout_mode>.ab-item:before{content:\"\\f186\"/\"\";top:2px}";
const ScTestModeInfoStyle0 = scTestModeInfoCss;

const ScTestModeInfo = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        var _a, _b;
        return (index.h("sc-popover", { key: 'bddb96dccd02be083436d31c319c3aca8865fbb9', skidding: 30 }, index.h("slot", { key: '50fc91920f3033ce107fe1db832d24964cadfc34', name: "trigger", slot: "trigger" }), index.h("span", { key: 'e39fd57dea8edd8bf8c9b5e9e8125144d55abf98', slot: "title" }, wp.i18n.__('How to switch from Test to Live mode', 'surecart')), index.h("div", { key: '7cabb507768c07f0fab50b0af1b3ae94d4f64f2b', class: "sc-test-mode-info-content", slot: "content" }, index.h("ol", { key: 'ed9410c8d4d36379b678a7dd4c8300c35e452386' }, index.h("li", { key: '1ed5ded70462a3250c8ae28bccf0e998273ebc97' }, wp.i18n.__('From the Admin Bar', 'surecart'), index.h("ul", { key: '4c79f55ed9fdbd5ec15fd805ba325586ed76cc3c' }, index.h("li", { key: '15a6d79e804b9dbd6d192f9cc081fe9ae74016c5' }, wp.i18n.__('Select any product & proceed to its checkout page.', 'surecart')), index.h("li", { key: '2c363b7b085eb517bba1d99bdf1d582bb503cae7' }, wp.i18n.__('Access the dropdown menu & select the live mode.', 'surecart'))), index.h("img", { key: 'ba08d112e7a328f9fa5b3ac4243e2e571ac4b458', src: `${(_a = window === null || window === void 0 ? void 0 : window.scData) === null || _a === void 0 ? void 0 : _a.plugin_url}/images/change-from-adminbar.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the admin bar', 'surecart') })), index.h("li", { key: '619303926f2216b403edcb44b15542c1a4817dea' }, wp.i18n.__('From the Editor', 'surecart'), index.h("ul", { key: '04d1885b7ecea2e2b83c8adf69abbde1d0559aa7' }, index.h("li", { key: 'c4a17c66d33c871c9916d6e88532b93182010e96' }, wp.i18n.__('Navigate to the custom Forms section under SureCart.', 'surecart')), index.h("li", { key: 'ebe5acc8bae16344a569b5ca40b6f81579a51f6f' }, wp.i18n.__('Select the checkout form.', 'surecart')), index.h("li", { key: '58082cf9adc2d1dd76f7df9ac3bf34758c1893ae' }, wp.i18n.__('Select "Live" from the dropdown. Hit Update!', 'surecart'))), index.h("img", { key: '860a8996aea74413590b4dac4d4fe4adfc4f1321', src: `${(_b = window === null || window === void 0 ? void 0 : window.scData) === null || _b === void 0 ? void 0 : _b.plugin_url}/images/change-from-editor.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the editor', 'surecart') })))), index.h("div", { key: '179d95b64ed6178804ace6e5df672bb74c87ce33', class: "sc-test-mode-info-footer", slot: "footer" }, index.h("sc-button", { key: '02d36fd5b44f193d62fc86af794865c2b67a2e23', size: "small", type: "link", target: "_blank", href: "https://surecart.com/docs/how-to-make-test-payments/" }, wp.i18n.__('Documentation ', 'surecart'), " ", index.h("sc-icon", { key: 'b07c0a5e88f335377a25b2db5a4adef0df23ad71', name: "external-link" })), index.h("sc-button", { key: 'c0745269ad1cb9ac26b6666c4b93ec54f2f03968', size: "small", type: "link", target: "_blank", href: "https://surecart.com/contact-us/" }, wp.i18n.__('Open a ticket ', 'surecart'), " ", index.h("sc-icon", { key: 'fe5575761fc8b77958e9cc778354f10956ff1e90', name: "external-link" })))));
    }
};
ScTestModeInfo.style = ScTestModeInfoStyle0;

exports.sc_test_mode_info = ScTestModeInfo;

//# sourceMappingURL=sc-test-mode-info.cjs.entry.js.map