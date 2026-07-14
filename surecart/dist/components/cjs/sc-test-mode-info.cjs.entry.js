'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-be4abba1.js');

const scTestModeInfoCss = "sc-test-mode-info .sc-test-mode-info-content ol{padding-left:1em;margin:0;font-size:12px}sc-test-mode-info .sc-test-mode-info-content ol img{width:320px;margin-top:12px}sc-test-mode-info .sc-test-mode-info-content ul{padding-left:1em}sc-test-mode-info .sc-test-mode-info-footer{display:flex;justify-content:space-between}sc-test-mode-info .sc-test-mode-info-footer sc-button>sc-icon{margin-left:4px}sc-test-mode-info .sc-test-mode-info-footer>span{font-size:var(--sc-button-font-size-small);align-content:center;opacity:0.75}sc-test-mode-info sc-popover{--panel-width:25em}#wpadminbar #wp-admin-bar-sc_change_checkout_mode>.ab-item:before{content:\"\\f186\"/\"\";top:2px}";
const ScTestModeInfoStyle0 = scTestModeInfoCss;

const ScTestModeInfo = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
    }
    render() {
        var _a, _b;
        return (index.h("sc-popover", { key: '1a8f50a07aa969535d8eee3cfce42d7754160e4d', skidding: 30 }, index.h("slot", { key: 'a5497e7e55eed86f068cf352df96e492b9c3af09', name: "trigger", slot: "trigger" }), index.h("span", { key: 'd40d96365dc000f35bc05ed606ef54ca1a406a82', slot: "title" }, wp.i18n.__('How to switch from Test to Live mode', 'surecart')), index.h("div", { key: '8412b32afd67e5c6afda8436ed9e94ca913fb569', class: "sc-test-mode-info-content", slot: "content" }, index.h("ol", { key: 'c3736a772a17ee57e4412dae75c89a70e41eb233' }, index.h("li", { key: 'a2bc992d4c621e9224a2579f5a9d9dbbc5c9753e' }, wp.i18n.__('From the Admin Bar', 'surecart'), index.h("ul", { key: 'cd2cdd35b13cdb1f10ab87a584440c2de7fbc7eb' }, index.h("li", { key: '4816a7c692130c9f5ed99ddff17d85b88f05cdb7' }, wp.i18n.__('Select any product & proceed to its checkout page.', 'surecart')), index.h("li", { key: '0e6825e27951941d6c6b9c6c01b67d86ee5fefef' }, wp.i18n.__('Access the dropdown menu & select the live mode.', 'surecart'))), index.h("img", { key: 'c7ca3ed6d459175c72f61e988f84f356aa360a07', src: `${(_a = window === null || window === void 0 ? void 0 : window.scData) === null || _a === void 0 ? void 0 : _a.plugin_url}/images/change-from-adminbar.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the admin bar', 'surecart') })), index.h("li", { key: '201f7f3f18ce0847594f0098dd69f46ba9ac4fa5' }, wp.i18n.__('From the Editor', 'surecart'), index.h("ul", { key: '20de23c066379557df7bebdcfe1815036ee03ce0' }, index.h("li", { key: 'fd3eac9b96af7d083d04110f5158532a14995af5' }, wp.i18n.__('Navigate to the custom Forms section under SureCart.', 'surecart')), index.h("li", { key: '2e13785fe254cbda6742b127913b90e8f4007f3f' }, wp.i18n.__('Select the checkout form.', 'surecart')), index.h("li", { key: '0a60974e8b07dbb5d624a7d9d19127577986b6e9' }, wp.i18n.__('Select "Live" from the dropdown. Hit Update!', 'surecart'))), index.h("img", { key: '90fc2c1c45f60f2e84ec2180949579d206dc8655', src: `${(_b = window === null || window === void 0 ? void 0 : window.scData) === null || _b === void 0 ? void 0 : _b.plugin_url}/images/change-from-editor.png`, alt: wp.i18n.__('Screenshot showing how to change mode from the editor', 'surecart') })))), index.h("div", { key: '3d3c40d20fc66b5d6084f87691b9339d54fb528c', class: "sc-test-mode-info-footer", slot: "footer" }, index.h("sc-button", { key: '85dc6a4826d7c40cc4b27d73e7d5bf9b5b9000a6', size: "small", type: "link", target: "_blank", href: "https://surecart.com/docs/how-to-make-test-payments/" }, wp.i18n.__('Documentation ', 'surecart'), " ", index.h("sc-icon", { key: 'd3277fc2d9614ba7522f92435e305d5cfb1ce391', name: "external-link" })), index.h("sc-button", { key: 'd368be6ceff598518c6a7a3ac0c05165ac6e648a', size: "small", type: "link", target: "_blank", href: "https://surecart.com/contact-us/" }, wp.i18n.__('Open a ticket ', 'surecart'), " ", index.h("sc-icon", { key: '160afd05a4ea677098d150d053979471fd4ca119', name: "external-link" })))));
    }
};
ScTestModeInfo.style = ScTestModeInfoStyle0;

exports.sc_test_mode_info = ScTestModeInfo;

//# sourceMappingURL=sc-test-mode-info.cjs.entry.js.map