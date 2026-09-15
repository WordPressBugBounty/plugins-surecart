import { r as registerInstance, c as createEvent, h, a as getElement } from './index-25e5af33.js';
import { a as autoUpdate, c as computePosition, o as offset, f as flip, s as shift, b as size } from './floating-ui.dom.esm-8dce4ea1.js';
import { s as speak } from './index-c5a96d53.js';
import { i as isRtl } from './page-align-0cdacf32.js';

const dropdownCss = ":host{display:inline-block;--panel-height:75vh;--panel-width:11rem}.dropdown{position:relative}.dropdown.dropdown--open .dropdown__positioner{visibility:visible;opacity:1;transform:scale(1)}.dropdown__trigger{display:block;cursor:pointer;border-width:0;outline:none;background-color:unset}.dropdown--disabled,.dropdown--disabled .dropdown__trigger{cursor:not-allowed}.dropdown__positioner{position:absolute;right:0;width:100%;z-index:var(--sc-z-index-dropdown);opacity:0;visibility:hidden;transform:scale(0.9);min-width:var(--panel-width)}.dropdown__panel{transform-origin:top left;box-shadow:0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);max-height:var(--panel-height);font-family:var(--sc-font-sans);font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-normal);color:var(--color);background-color:var(--sc-panel-background-color);border:solid 1px var(--sc-panel-border-color);border-radius:var(--sc-border-radius-medium);box-shadow:var(--sc-shadow-large);overflow:auto;overscroll-behavior:none;transition:var(--sc-transition-fast) opacity, var(--sc-transition-fast) transform;z-index:5}";
const ScDropdownStyle0 = dropdownCss;

let itemIndex = 0;
let arrowFlag = '';
const ScDropdown = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scShow = createEvent(this, "scShow", 7);
        this.scHide = createEvent(this, "scHide", 7);
        this.clickEl = undefined;
        this.disabled = undefined;
        this.open = false;
        this.position = undefined;
        this.placement = 'bottom-start';
        this.distance = 10;
        this.skidding = 0;
        this.hoist = false;
        this.closeOnSelect = true;
        this.isVisible = undefined;
    }
    handleOpenChange() {
        this.open ? this.show() : this.hide();
    }
    handleOutsideClick(evt) {
        const path = evt.composedPath();
        if (!path.some(item => {
            return item === this.el;
        })) {
            this.open = false;
        }
    }
    startPositioner() {
        this.stopPositioner();
        this.updatePositioner();
        this.positionerCleanup = autoUpdate(this.trigger, this.positioner, this.updatePositioner.bind(this));
    }
    updatePositioner() {
        if (!this.open || !this.trigger || !this.positioner) {
            return;
        }
        computePosition(this.trigger, this.positioner, {
            placement: this.placement,
            middleware: [
                offset({ mainAxis: this.distance, crossAxis: this.skidding }),
                flip(),
                shift(),
                size({
                    apply: ({ availableWidth: width, availableHeight: height }) => {
                        // Ensure the panel stays within the viewport when we have lots of menu items
                        Object.assign(this.panel.style, {
                            maxWidth: `${width}px`,
                            maxHeight: `${height}px`,
                        });
                    },
                    padding: 8,
                }),
            ],
            strategy: this.hoist ? 'fixed' : 'absolute',
        }).then(({ x, y, placement }) => {
            this.positioner.setAttribute('data-placement', placement);
            Object.assign(this.positioner.style, {
                position: this.hoist ? 'fixed' : 'absolute',
                left: `${x}px`,
                top: `${y}px`,
                right: 'auto',
            });
        });
    }
    stopPositioner() {
        if (this.positionerCleanup) {
            this.positionerCleanup();
            this.positionerCleanup = undefined;
            this.positioner.removeAttribute('data-placement');
        }
    }
    show() {
        speak(wp.i18n.__('Menu Selection Dropdown opened. Press Up/Down arrow to toggle between menu items.', 'surecart'), 'assertive');
        this.scShow.emit();
        // Prevent subsequent calls to the method, whether manually or triggered by the `open` watcher
        if (this.isVisible) {
            return;
        }
        this.isVisible = true;
        this.open = true;
        this.startPositioner();
        this.panel.focus();
    }
    hide() {
        speak(wp.i18n.__('Menu Selection Dropdown closed.', 'surecart'), 'assertive');
        this.scHide.emit();
        // Prevent subsequent calls to the method, whether manually or triggered by the `open` watcher
        if (!this.isVisible) {
            return;
        }
        this.stopPositioner();
        this.isVisible = false;
        this.open = false;
        const slotted = this.el.shadowRoot.querySelector('slot[name="trigger"]');
        const trigger = slotted.assignedElements({ flatten: true })[0];
        trigger.focus();
    }
    handleClick(e) {
        if (this.closeOnSelect) {
            const path = e.composedPath();
            if (path.some(item => {
                return item.classList && item.classList.contains('menu-item');
            })) {
                this.open = false;
            }
        }
    }
    componentWillLoad() {
        document.addEventListener('mousedown', evt => this.handleOutsideClick(evt));
    }
    /* Get the slotted menu */
    getMenu() {
        let slotted = this.el.shadowRoot.querySelector('slot');
        return slotted.assignedNodes().find(node => {
            return node.nodeName === 'sc-menu';
        });
    }
    getItems() {
        return [...this.el.querySelectorAll('sc-menu-item')];
    }
    handleHide() {
        this.open = false;
        itemIndex = 0;
        this.trigger.focus();
    }
    handleKeyDown(event) {
        const items = this.getItems();
        // Tabbing out of the control closes it
        if (event.key === 'Tab') {
            if (this.open) {
                this.handleHide();
            }
            return;
        }
        // Up/down opens the menu
        if (['ArrowDown', 'ArrowUp'].includes(event.key)) {
            event.preventDefault();
            event.stopImmediatePropagation();
            // Show the menu if it's not already open
            if (!this.open) {
                this.open = true;
            }
            // Focus on a menu item
            // Focus on a menu item
            if (event.key === 'ArrowDown') {
                if (arrowFlag == 'up') {
                    itemIndex = itemIndex + 2;
                }
                if (itemIndex > items.length - 1) {
                    itemIndex = 0;
                }
                items[itemIndex].setFocus();
                arrowFlag = 'down';
                itemIndex++;
                return;
            }
            if (event.key === 'ArrowUp') {
                if (arrowFlag == 'down') {
                    itemIndex = itemIndex - 2;
                }
                if (itemIndex < 0) {
                    itemIndex = items.length - 1;
                }
                items[itemIndex].setFocus();
                arrowFlag = 'up';
                itemIndex--;
                return;
            }
        }
        // Close select dropdown on Esc/Escape key
        if (event.key === 'Escape') {
            if (this.open) {
                this.handleHide();
            }
            return;
        }
        // Open select dropdown with Enter
        if (event.key === 'Enter') {
            if (this.open) {
                this.handleHide();
            }
            else {
                event.stopImmediatePropagation();
                event.preventDefault();
                this.open = true;
            }
        }
        // don't open the menu when a CTRL/Command key is pressed
        if (event.ctrlKey || event.metaKey) {
            return;
        }
    }
    render() {
        return (h("div", { key: 'e441923fb35721375eb517859b4b36c46432b321', part: "base", class: {
                'dropdown': true,
                'dropdown--open': this.open,
                'dropdown--disabled': this.disabled,
            } }, h("span", { key: '8ca99b58022738eef2b0f2ad2efe112a564fd415', part: "trigger", class: "dropdown__trigger", ref: el => (this.trigger = el), onClick: () => {
                if (this.disabled)
                    return;
                if (this.open) {
                    this.hide();
                }
                else {
                    setTimeout(() => {
                        this.show();
                    }, 0);
                }
            }, "aria-expanded": this.open ? 'true' : 'false', "aria-haspopup": "true" }, h("slot", { key: '36019ea522f751deaae663b8f17e35b7bbc3da50', name: "trigger" })), h("div", { key: 'd0f0c27434c0b87bf34fa1630b76c2c533a0dadd', class: "dropdown__positioner", ref: el => (this.positioner = el) }, h("div", { key: '01cf8b10115845c477bec31db650f4f0476efbc3', part: "panel", class: {
                'dropdown__panel': true,
                'position--top-left': this.position === 'top-left',
                'position--top-right': this.position === 'top-right',
                'position--bottom-left': this.position === 'bottom-left',
                'position--bottom-right': this.position === 'bottom-right',
            }, "aria-orientation": "vertical", tabindex: "-1", onClick: e => this.handleClick(e), ref: el => (this.panel = el) }, h("slot", { key: '6b21f22615785d9690091b499627be0ee6869de0' })))));
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "open": ["handleOpenChange"]
    }; }
};
ScDropdown.style = ScDropdownStyle0;

const scMenuCss = ":host{display:block}.menu{padding:var(--sc-spacing-x-small) 0}.menu:focus{outline:none}::slotted(sc-input){margin-top:-var(--sc-spacing-x-small)}::slotted(sc-divider){--spacing:var(--sc-spacing-x-small)}";
const ScMenuStyle0 = scMenuCss;

const ScMenu = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scSelect = createEvent(this, "scSelect", 7);
        this.items = [];
        this.ariaLabel = undefined;
    }
    /** TODO: Click test */
    handleClick(event) {
        const target = event.target;
        const item = target.closest('sc-menu-item');
        if (item && !item.disabled) {
            this.scSelect.emit({ item });
        }
    }
    /** TODO: Keydown Test */
    handleKeyDown(event) {
        // Make a selection when pressing enter
        if (event.key === 'Enter') {
            const item = this.getCurrentItem();
            event.preventDefault();
            if (item) {
                this.scSelect.emit({ item });
            }
            speak(wp.i18n.sprintf(wp.i18n.__('Menu %s selected', 'surecart'), item.textContent), 'assertive');
        }
        // Prevent scrolling when space is pressed
        if (event.key === ' ') {
            event.preventDefault();
        }
        // Move the selection when pressing down or up
        if (['ArrowDown', 'ArrowUp', 'Home', 'End'].includes(event.key)) {
            const selectedItem = this.getCurrentItem();
            let index = selectedItem ? this.items.indexOf(selectedItem) : 0;
            if (this.items.length) {
                event.preventDefault();
                if (event.key === 'ArrowDown') {
                    index++;
                }
                else if (event.key === 'ArrowUp') {
                    index--;
                }
                else if (event.key === 'Home') {
                    index = 0;
                }
                else if (event.key === 'End') {
                    index = this.items.length - 1;
                }
                if (index < 0)
                    index = 0;
                if (index > this.items.length - 1)
                    index = this.items.length - 1;
                this.setCurrentItem(this.items[index]);
                return;
            }
        }
    }
    /** Get the active item */
    getCurrentItem() {
        return this.items.find(i => i.getAttribute('tabindex') === '0');
    }
    /**
     * @internal Sets the current menu item to the specified element. This sets `tabindex="0"` on the target element and
     * `tabindex="-1"` to all other items. This method must be called prior to setting focus on a menu item.
     */
    async setCurrentItem(item) {
        const activeItem = item.disabled ? this.items[0] : item;
        // Update tab indexes
        this.items.forEach(i => {
            i.setAttribute('tabindex', i === activeItem ? '0' : '-1');
        });
    }
    /** Sync slotted items with internal state */
    syncItems() {
        const slottedElements = this.el.shadowRoot.querySelector('slot').assignedElements({ flatten: true });
        this.items = slottedElements.filter(node => {
            return node.nodeName === 'sc-menu-item';
        });
    }
    /** Handle items change in slot */
    handleSlotChange() {
        this.syncItems();
    }
    render() {
        return (h("div", { key: '60325efd7fab67f17c676fcda899ef0c8fb31162', part: "base", class: "menu", tabindex: "0", onKeyDown: e => this.handleKeyDown(e) }, h("slot", { key: '04f3cc7e3596ca52bc3b696dec8475e5d674d4b4', onSlotchange: () => this.handleSlotChange() })));
    }
    get el() { return getElement(this); }
};
ScMenu.style = ScMenuStyle0;

const scMenuItemCss = ":host{display:block}.menu-item{position:relative;display:flex;align-items:stretch;font-family:var(--sc-font-sans);font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-normal);line-height:var(--sc-menu-item-line-height, var(--sc-line-height-normal));letter-spacing:var(--sc-letter-spacing-normal);text-align:left;color:var(--sc-menu-item-color, var(--sc-color-gray-700));padding:var(--sc-spacing-xx-small) var(--sc-spacing-x-large);transition:var(--sc-input-transition, var(--sc-transition-medium)) fill, var(--sc-input-transition, var(--sc-transition-medium)) background-color;user-select:none;white-space:var(--sc-menu-item-white-space, nowrap);text-wrap:auto;cursor:pointer;text-decoration:none}.menu-item.menu-item--focused:not(.menu-item--disabled){outline:none;background-color:var(--sc-menu-item-background-focused, var(--sc-color-primary-500));color:var(--sc-color-white)}.menu-item.menu-item--disabled{outline:none;color:var(--sc-color-gray-400);cursor:not-allowed}.menu-item .menu-item__label{flex:1 1 auto}.menu-item .menu-item__prefix{flex:0 0 auto;display:flex;align-items:center}.menu-item .menu-item__prefix ::slotted(*){display:inline-flex;margin-right:var(--sc-spacing-small)}.menu-item .menu-item__suffix{flex:0 0 auto;display:flex;align-items:center}.menu-item .menu-item__suffix ::slotted(*){margin-left:var(--sc-spacing-x-small);text-align:right}.menu-item .menu-item__check{display:flex;position:absolute;left:0.5em;top:0.6em;visibility:hidden;align-items:center;font-size:inherit}.menu-item--checked .menu-item__check{visibility:visible}.menu-item--is-rtl.menu-item{text-align:right}.menu-item--is-rtl.menu-item .menu-item__check{left:auto;right:0.5em}";
const ScMenuItemStyle0 = scMenuItemCss;

const ScMenuItem = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.hasFocus = false;
        this.href = undefined;
        this.target = undefined;
        this.checked = false;
        this.value = '';
        this.disabled = false;
    }
    /** Sets focus on the button. */
    async setFocus(options) {
        this.menuItem.focus(options);
    }
    /** Removes focus from the button. */
    async setBlur() {
        this.menuItem.blur();
    }
    handleBlur() {
        this.hasFocus = false;
    }
    handleFocus() {
        this.hasFocus = true;
    }
    render() {
        const Tag = this.href ? 'a' : 'div';
        return (h(Tag, { key: '7b4393da38e7417d4dc2c643e54d1b04147ad18e', ref: el => (this.menuItem = el), part: "base", class: {
                'menu-item': true,
                'menu-item--checked': this.checked,
                'menu-item--disabled': this.disabled,
                'menu-item--focused': this.hasFocus,
                'menu-item--is-rtl': isRtl(),
            }, href: this.href, role: "menuitem", "aria-disabled": this.disabled ? 'true' : 'false', "aria-checked": this.checked ? 'true' : 'false', tabindex: !this.disabled ? '0' : undefined, onFocus: () => this.handleFocus(), onBlur: () => this.handleBlur(), onMouseEnter: () => this.handleFocus(), onMouseLeave: () => this.handleBlur(), onKeyDown: e => {
                if (e.key === ' ' || e.key === 'Spacebar' || e.key === 'Enter') {
                    this.menuItem.click();
                }
            }, "aria-label": this.el.innerText, target: this.target }, h("span", { key: '5a82ece53ab5bdc159ecaf81b9b5b77479afe1d3', part: "checked-icon", class: "menu-item__check" }, h("svg", { key: '0684556b713ab0e65b26e757ae4f73cb8de64de2', xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", class: "bi bi-check", viewBox: "0 0 16 16" }, h("path", { key: 'db81b2f59cf49d53e9b7405560342ef7ee872740', d: "M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" }))), h("span", { key: '2f212dda79b3dd1cd4c257ae91e771ea8233215b', part: "prefix", class: "menu-item__prefix" }, h("slot", { key: 'b0b6e97b3b97702659f8e7d35ef0b3e532c4bd44', name: "prefix" })), h("span", { key: '85ac52204d42f3e4211b01631c57c0b9c8f23091', part: "label", class: "menu-item__label" }, h("slot", { key: '9e43cd4c810e6d7d25f6b053439c995714f1812f' })), h("span", { key: '8d7e66a1564823103f52acc99ab2a85b29677a26', part: "suffix", class: "menu-item__suffix" }, h("slot", { key: '16dc91447b73a6f208683e55711ca35c053ead92', name: "suffix" }))));
    }
    get el() { return getElement(this); }
};
ScMenuItem.style = ScMenuItemStyle0;

export { ScDropdown as sc_dropdown, ScMenu as sc_menu, ScMenuItem as sc_menu_item };

//# sourceMappingURL=sc-dropdown_3.entry.js.map