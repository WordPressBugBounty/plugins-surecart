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
        return (index.h("sc-popover", { key: 'fa611223006c6b0b8d9038cf04e9ab1676331de5', skidding: 30 }, index.h("slot", { key: 'c236f9eed71dbc2891f085fb0721e95daed6adae', name: "trigger", slot: "trigger" }), index.h("span", { key: '2b84fd577b8f7da89d5b23d6ca0681d803134c31', slot: "title" }, wp.i18n.__('How to switch from Test to Live mode', 'surecart')), index.h("div", { key: '7e3ef6df2edb8515db00753f08569042870ddc73', class: "sc-test-mode-info-content", slot: "content" }, index.h("ol", { key: '2f14efae4e64ebfab63e45a7b8bc888e33b0af40' }, index.h("li", { key: 'b9bc598d8a27a3882af56254f1e8cac927b9ff0a' }, wp.i18n.__('From the Admin Bar', 'surecart'), index.h("ul", { key: '47bcfde6dc36ca1e64da297893bc120a722cd901' }, index.h("li", { key: '8b0e35b5cf6deb0273688bbab217149a2f69b760' }, wp.i18n.__('Select any product & proceed to its checkout page.', 'surecart')), index.h("li", { key: '9830dbab13a467df5bbea88bab47862ce09c5056' }, wp.i18n.__('Access the dropdown menu & select the live mode.', 'surecart'))), index.h("img", { key: 'c208069bef55e16aea575e2e957651383f95f72f', src: `${(_a = window === null || window === void 0 ? void 0 : window.scData) === null || _a === void 0 ? void 0 : _a.plugin_url}/images/change-from-adminbar.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the admin bar', 'surecart') })), index.h("li", { key: '96109c54404fffe7d4e08923e71518249f269ef1' }, wp.i18n.__('From the Editor', 'surecart'), index.h("ul", { key: '5541cfdb4edf578d90ead46d12040edcefc23215' }, index.h("li", { key: 'd47f95699d3180f969caa5655d1d3b681d3306aa' }, wp.i18n.__('Navigate to the custom Forms section under SureCart.', 'surecart')), index.h("li", { key: '5f3356f3232a229a432c741215e253ab7b445432' }, wp.i18n.__('Select the checkout form.', 'surecart')), index.h("li", { key: '1d495aed07b828242c103189dfa73bcda7464208' }, wp.i18n.__('Select "Live" from the dropdown. Hit Update!', 'surecart'))), index.h("img", { key: '83fb15145f29ecef2af14149d48e523c64c34360', src: `${(_b = window === null || window === void 0 ? void 0 : window.scData) === null || _b === void 0 ? void 0 : _b.plugin_url}/images/change-from-editor.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the editor', 'surecart') })))), index.h("div", { key: '2e6209f710bf3d58db8a6d93ef1901249a000c0e', class: "sc-test-mode-info-footer", slot: "footer" }, index.h("sc-button", { key: '30740b18396970760339d8a3114847578812b3ba', size: "small", type: "link", target: "_blank", href: "https://surecart.com/docs/how-to-make-test-payments/" }, wp.i18n.__('Documentation ', 'surecart'), " ", index.h("sc-icon", { key: 'b9299b40cf68a8f07d2f3aecf6fafd6e6006ed1d', name: "external-link" })), index.h("sc-button", { key: '614403a73f4f5295c8321537818147d222b7998a', size: "small", type: "link", target: "_blank", href: "https://surecart.com/contact-us/" }, wp.i18n.__('Open a ticket ', 'surecart'), " ", index.h("sc-icon", { key: 'cc2cd242daebbd5ba44b148d81ee8b4d94eb21ea', name: "external-link" })))));
    }
};
ScTestModeInfo.style = ScTestModeInfoStyle0;

exports.sc_test_mode_info = ScTestModeInfo;

//# sourceMappingURL=sc-test-mode-info.cjs.entry.js.map