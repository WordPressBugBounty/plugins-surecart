'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

const index = require('./index-8acc3c89.js');
const animationRegistry = require('./animation-registry-f7f1a08b.js');

const locks = new Set();
//
// Prevents body scrolling. Keeps track of which elements requested a lock so multiple levels of locking are possible
// without premature unlocking.
//
function lockBodyScrolling(lockingEl) {
    locks.add(lockingEl);
    document.body.classList.add('sc-scroll-lock');
}
//
// Unlocks body scrolling. Scrolling will only be unlocked once all elements that requested a lock call this method.
//
function unlockBodyScrolling(lockingEl) {
    locks.delete(lockingEl);
    if (locks.size === 0) {
        document.body.classList.remove('sc-scroll-lock');
    }
}

const scDialogCss = ":host{--width:31rem;--header-spacing:var(--sc-spacing-large);--body-spacing:var(--sc-spacing-large);--footer-spacing:var(--sc-spacing-large);display:contents}[hidden]{display:none !important}.dialog{display:flex;align-items:center;justify-content:center;position:fixed;top:0;right:0;bottom:0;left:0;z-index:var(--sc-z-index-dialog);box-sizing:border-box;text-align:left}.dialog__panel{display:flex;flex-direction:column;z-index:2;width:var(--width);max-width:100vw;max-height:100vh;background-color:var(--sc-panel-background-color);border-radius:var(--sc-border-radius-medium);box-shadow:var(--sc-shadow-x-large);position:relative}.dialog__panel:focus{outline:none}@media screen and (max-width: 420px){.dialog__panel{max-height:80vh}}.dialog--open .dialog__panel{display:flex;opacity:1;transform:none}.dialog__header{flex:0 0 auto;display:flex;border-bottom:1px solid var(--sc-color-gray-300)}.dialog__title{flex:1 1 auto;font:inherit;font-size:var(--sc-font-size-large);line-height:var(--sc-line-height-dense);padding:var(--header-spacing);margin:0}.dialog__close{flex:0 0 auto;display:flex;align-items:center;font-size:var(--sc-font-size-x-large);padding:0 calc(var(--header-spacing) / 2);z-index:2}.dialog__body{flex:1 1 auto;padding:var(--body-spacing);overflow:var(--dialog-body-overflow, auto);-webkit-overflow-scrolling:touch}.dialog__footer{flex:0 0 auto;text-align:right;padding:var(--footer-spacing)}.dialog__footer ::slotted(sl-button:not(:first-of-type)){margin-left:var(--sc-spacing-x-small)}.dialog:not(.dialog--has-footer) .dialog__footer{display:none}.dialog__overlay{position:fixed;top:0;right:0;bottom:0;left:0;background-color:var(--sc-overlay-background-color)}";
const ScDialogStyle0 = scDialogCss;

const ScDialog = class {
    constructor(hostRef) {
        index.registerInstance(this, hostRef);
        this.scRequestClose = index.createEvent(this, "scRequestClose", 7);
        this.scShow = index.createEvent(this, "scShow", 7);
        this.scAfterShow = index.createEvent(this, "scAfterShow", 7);
        this.scHide = index.createEvent(this, "scHide", 7);
        this.scAfterHide = index.createEvent(this, "scAfterHide", 7);
        this.scInitialFocus = index.createEvent(this, "scInitialFocus", 7);
        this.open = false;
        this.label = '';
        this.noHeader = false;
        this.hasFooter = false;
    }
    /** Shows the dialog. */
    async show() {
        if (this.open) {
            return undefined;
        }
        this.open = true;
    }
    /** Hides the dialog */
    async hide() {
        if (!this.open) {
            return undefined;
        }
        this.open = false;
    }
    requestClose(source) {
        const slRequestClose = this.scRequestClose.emit(source);
        if (slRequestClose.defaultPrevented) {
            const animation = animationRegistry.getAnimation(this.el, 'dialog.denyClose');
            animationRegistry.animateTo(this.panel, animation.keyframes, animation.options);
            return;
        }
        this.hide();
    }
    handleKeyDown(event) {
        if (event.key === 'Escape') {
            event.stopPropagation();
            this.requestClose('keyboard');
        }
    }
    async handleOpenChange() {
        if (this.open) {
            // Show
            this.scShow.emit();
            lockBodyScrolling(this.el);
            // When the dialog is shown, Safari will attempt to set focus on whatever element has autofocus. This can cause
            // the dialogs's animation to jitter (if it starts offscreen), so we'll temporarily remove the attribute, call
            // `focus({ preventScroll: true })` ourselves, and add the attribute back afterwards.
            //
            // Related: https://github.com/shoelace-style/shoelace/issues/693
            //
            const autoFocusTarget = this.el.querySelector('[autofocus]');
            if (autoFocusTarget) {
                autoFocusTarget.removeAttribute('autofocus');
            }
            await Promise.all([animationRegistry.stopAnimations(this.dialog), animationRegistry.stopAnimations(this.overlay)]);
            this.dialog.hidden = false;
            // Set initial focus
            requestAnimationFrame(() => {
                const slInitialFocus = this.scInitialFocus.emit();
                if (!slInitialFocus.defaultPrevented) {
                    // Set focus to the autofocus target and restore the attribute
                    if (autoFocusTarget) {
                        autoFocusTarget.focus({ preventScroll: true });
                    }
                    else {
                        this.panel.focus({ preventScroll: true });
                    }
                }
                // Restore the autofocus attribute
                if (autoFocusTarget) {
                    autoFocusTarget.setAttribute('autofocus', '');
                }
            });
            const panelAnimation = animationRegistry.getAnimation(this.el, 'dialog.show');
            const overlayAnimation = animationRegistry.getAnimation(this.el, 'dialog.overlay.show');
            await Promise.all([animationRegistry.animateTo(this.panel, panelAnimation.keyframes, panelAnimation.options), animationRegistry.animateTo(this.overlay, overlayAnimation.keyframes, overlayAnimation.options)]);
            this.scAfterShow.emit();
        }
        else {
            // Hide
            this.scHide.emit();
            await Promise.all([animationRegistry.stopAnimations(this.dialog), animationRegistry.stopAnimations(this.overlay)]);
            const panelAnimation = animationRegistry.getAnimation(this.el, 'dialog.hide');
            const overlayAnimation = animationRegistry.getAnimation(this.el, 'dialog.overlay.hide');
            await Promise.all([animationRegistry.animateTo(this.panel, panelAnimation.keyframes, panelAnimation.options), animationRegistry.animateTo(this.overlay, overlayAnimation.keyframes, overlayAnimation.options)]);
            this.dialog.hidden = true;
            unlockBodyScrolling(this.el);
            // Restore focus to the original trigger
            const trigger = this.originalTrigger;
            if (typeof (trigger === null || trigger === void 0 ? void 0 : trigger.focus) === 'function') {
                setTimeout(() => trigger.focus());
            }
            this.scAfterHide.emit();
        }
    }
    componentDidLoad() {
        this.hasFooter = !!this.el.querySelector('[slot="footer"]');
        this.dialog.hidden = !this.open;
        if (this.open) {
            lockBodyScrolling(this.el);
        }
    }
    disconnectedCallback() {
        unlockBodyScrolling(this.el);
    }
    render() {
        return (index.h("div", { key: '8d3f7d20d6b22e0ad66907474b378f2228ea58d9', part: "base", ref: el => (this.dialog = el), class: {
                'dialog': true,
                'dialog--open': this.open,
                'dialog--has-footer': this.hasFooter,
            }, onKeyDown: e => this.handleKeyDown(e) }, index.h("div", { key: '548999e48b22766cad918e63824e74987478df6a', part: "overlay", class: "dialog__overlay", onClick: e => {
                e.preventDefault();
                e.stopImmediatePropagation();
                this.requestClose('overlay');
            }, ref: el => (this.overlay = el), tabindex: "-1" }), index.h("div", { key: 'f8e8a8312f639fecac6e99efb0f6500992012179', part: "panel", class: "dialog__panel", role: "dialog", "aria-modal": "true", "aria-hidden": this.open ? 'false' : 'true', "aria-label": this.noHeader || this.label, "aria-labelledby": !this.noHeader || 'title', ref: el => (this.panel = el), tabindex: "0" }, !this.noHeader && (index.h("header", { key: '31199359bcf123b57a0c66fb029aa2e98013503d', part: "header", class: "dialog__header" }, index.h("h2", { key: '7e8eb83bb35b6b79c5fce8a4720f6abe06a61b81', part: "title", class: "dialog__title", id: "title" }, index.h("slot", { key: 'e44e3a262643cc0a1f0788eb66adeb4ece455855', name: "label" }, " ", this.label.length > 0 ? this.label : String.fromCharCode(65279), " ")), index.h("sc-button", { key: '0446495dcffd53b782b4c927fc4ea0f1b7d1e17f', class: "dialog__close", type: "text", circle: true, part: "close-button", exportparts: "base:close-button__base", onClick: e => {
                e.preventDefault();
                e.stopImmediatePropagation();
                this.requestClose('close-button');
            } }, index.h("sc-icon", { key: '50bf0a6fe4692c7a753f6dcb69b7a379c0c83e66', name: "x", label: wp.i18n.__('Close', 'surecart') })))), index.h("div", { key: '9d3b915fa63ec5ac16b7eb37afe371471f638c99', part: "body", class: "dialog__body" }, index.h("slot", { key: '2796493c1b65e16a13fda0480c0d0c8be14704f4' })), index.h("footer", { key: '21d5496268df167717357846c011b918dd19d1b3', part: "footer", class: "dialog__footer" }, index.h("slot", { key: '4f3b9218756de511ee0fc531fa10cfe6cdc229ac', name: "footer" })))));
    }
    get el() { return index.getElement(this); }
    static get watchers() { return {
        "open": ["handleOpenChange"]
    }; }
};
animationRegistry.setDefaultAnimation('dialog.show', {
    keyframes: [
        { opacity: 0, transform: 'scale(0.8)' },
        { opacity: 1, transform: 'scale(1)' },
    ],
    options: { duration: 150, easing: 'ease' },
});
animationRegistry.setDefaultAnimation('dialog.hide', {
    keyframes: [
        { opacity: 1, transform: 'scale(1)' },
        { opacity: 0, transform: 'scale(0.8)' },
    ],
    options: { duration: 150, easing: 'ease' },
});
animationRegistry.setDefaultAnimation('dialog.denyClose', {
    keyframes: [{ transform: 'scale(1)' }, { transform: 'scale(1.02)' }, { transform: 'scale(1)' }],
    options: { duration: 150 },
});
animationRegistry.setDefaultAnimation('dialog.overlay.show', {
    keyframes: [{ opacity: 0 }, { opacity: 1 }],
    options: { duration: 150 },
});
animationRegistry.setDefaultAnimation('dialog.overlay.hide', {
    keyframes: [{ opacity: 1 }, { opacity: 0 }],
    options: { duration: 150 },
});
ScDialog.style = ScDialogStyle0;

exports.sc_dialog = ScDialog;

//# sourceMappingURL=sc-dialog.cjs.entry.js.map