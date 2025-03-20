import { r as registerInstance, c as createEvent, h, F as Fragment, a as getElement } from './index-745b6bec.js';
import { a as apiFetch } from './fetch-8ecbbe53.js';
import { a as getHumanDiscount } from './price-7bb626d0.js';
import { a as addQueryArgs } from './add-query-args-0e2a8393.js';
import { F as FormSubmitController } from './form-data-76641f16.js';
import './remove-query-args-938c53ea.js';
import './currency-a0c9bff4.js';

/**
 * Replace the {{ name }} in a string with a new value
 */
const replaceAmount = (string, replace, name = 'amount') => {
    return string.replaceAll('{{' + name + '}}', replace).replaceAll('{{ ' + name + ' }}', replace);
};
/**
 * Replace the amount in a string with discount.
 */
const replaceAmountFromString = (amountStr, protocol) => (protocol === null || protocol === void 0 ? void 0 : protocol.preservation_coupon) ? replaceAmount(amountStr, getHumanDiscount(protocol === null || protocol === void 0 ? void 0 : protocol.preservation_coupon)) : amountStr;
/**
 *
 */
const getCurrentBehaviourContent = (protocol, hasDiscount) => {
    const { preserve_title, preserve_description, preserve_button, cancel_link } = (protocol === null || protocol === void 0 ? void 0 : protocol.preservation_locales) || {};
    if (hasDiscount) {
        const discountLocales = {
            title: replaceAmountFromString(wp.i18n.__('Your {{ amount }} discount is still active.', 'surecart'), protocol),
            description: replaceAmountFromString(wp.i18n.__('You have a {{ amount }} discount active. Cancelling now will forfeit this discount forever. Are you sure you wish to cancel?', 'surecart'), protocol),
            button: wp.i18n.__('Keep My Discount', 'surecart'),
            cancel_link: wp.i18n.__('Cancel Anyway', 'surecart'),
        };
        return discountLocales;
    }
    const defaultLocales = {
        title: replaceAmountFromString(preserve_title, protocol),
        description: replaceAmountFromString(preserve_description, protocol),
        button: preserve_button,
        cancel_link: cancel_link,
    };
    return defaultLocales;
};

const scCancelDiscountCss = ".cancel-discount__abort-link{color:var(--sc-color-gray-500)}";
const ScCancelDiscountStyle0 = scCancelDiscountCss;

const ScCancelDiscount = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scCancel = createEvent(this, "scCancel", 7);
        this.scPreserved = createEvent(this, "scPreserved", 7);
        this.subscription = undefined;
        this.reason = undefined;
        this.comment = undefined;
        this.protocol = undefined;
        this.loading = undefined;
        this.error = undefined;
    }
    async addDiscount() {
        var _a, _b;
        try {
            this.loading = true;
            this.subscription = (await apiFetch({
                method: 'PATCH',
                path: addQueryArgs(`surecart/v1/subscriptions/${(_a = this.subscription) === null || _a === void 0 ? void 0 : _a.id}/preserve`, {
                    cancellation_act: {
                        ...(!!this.comment ? { comment: this.comment } : {}),
                        cancellation_reason_id: (_b = this.reason) === null || _b === void 0 ? void 0 : _b.id,
                    },
                }),
            }));
            this.scPreserved.emit();
        }
        catch (e) {
            console.error(e);
            this.error = e;
        }
        finally {
            this.loading = false;
        }
    }
    hasDiscount() {
        var _a, _b;
        return !!((_b = (_a = this.subscription) === null || _a === void 0 ? void 0 : _a.discount) === null || _b === void 0 ? void 0 : _b.id);
    }
    render() {
        var _a, _b;
        const { title, description, button, cancel_link } = getCurrentBehaviourContent(this.protocol, (_b = (_a = this.subscription) === null || _a === void 0 ? void 0 : _a.discount) === null || _b === void 0 ? void 0 : _b.id);
        return (h("div", { key: '75800328815ee488f0ac0aa33b8497c8f348de26', class: "cancel-discount" }, h("sc-dashboard-module", { key: '76bc38ea00f23c7d48da40a28501c1534f8e34fc', heading: title, style: { '--sc-dashboard-module-spacing': '2em' } }, h("span", { key: '8b68bb03cd315d86b215f26c66dac9220e0ecbc3', slot: "description" }, description), h("sc-flex", { key: '3c1939f1712f2299aea7dee921137b58a27c8a43', justifyContent: "flex-start" }, h("sc-button", { key: 'd4d60e7be1bfe6570ee4b931203c93356bd1adbd', type: "primary", onClick: () => this.addDiscount() }, button), h("sc-button", { key: 'e3f52a1134ea9d5814881e121d2fa22598527227', class: "cancel-discount__abort-link", type: "text", onClick: () => this.scCancel.emit() }, cancel_link)), !!this.loading && h("sc-block-ui", { key: '6ac29078600f6c53e221baaaa2d73192f531e48c', spinner: true }))));
    }
};
ScCancelDiscount.style = ScCancelDiscountStyle0;

const scCancelSurveyCss = ".cancel-survey{color:var(--sc-color-gray-900)}.cancel-survey__abort-link{color:var(--sc-color-gray-500)}";
const ScCancelSurveyStyle0 = scCancelSurveyCss;

const ScCancelSurvey = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scAbandon = createEvent(this, "scAbandon", 7);
        this.scSubmitReason = createEvent(this, "scSubmitReason", 7);
        this.protocol = undefined;
        this.reasons = undefined;
        this.loading = undefined;
        this.selectedReason = undefined;
        this.comment = undefined;
        this.error = undefined;
    }
    componentWillLoad() {
        if (!this.reasons) {
            this.fetchReasons();
        }
    }
    handleSelectedReasonChange() {
        var _a;
        if ((_a = this.selectedReason) === null || _a === void 0 ? void 0 : _a.comment_enabled) {
            setTimeout(() => {
                this.textArea.triggerFocus();
            }, 50);
        }
    }
    async fetchReasons() {
        try {
            this.loading = true;
            this.reasons = await apiFetch({
                path: 'surecart/v1/cancellation_reasons',
            });
        }
        catch (e) {
            console.error(e);
            this.error = e;
        }
        finally {
            this.loading = false;
        }
    }
    async handleSubmit(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        try {
            this.scSubmitReason.emit({ reason: this.selectedReason, comment: this.comment });
        }
        catch (e) {
            console.error(e);
            this.error = e;
        }
    }
    renderReasons() {
        if (this.loading) {
            return (h("sc-choice", null, h("sc-skeleton", null)));
        }
        return (this.reasons || []).map(reason => (h("sc-choice", { value: reason === null || reason === void 0 ? void 0 : reason.id, name: "reason", onScChange: e => {
                if (e.target.checked) {
                    this.selectedReason = reason;
                }
            } }, reason === null || reason === void 0 ? void 0 : reason.label)));
    }
    render() {
        var _a, _b, _c;
        const { reasons_title, reasons_description, skip_link } = ((_a = this.protocol) === null || _a === void 0 ? void 0 : _a.preservation_locales) || {};
        if (this.loading) {
            return h("sc-skeleton", null);
        }
        return (h("div", { class: "cancel-survey" }, h("sc-dashboard-module", { heading: reasons_title, style: { '--sc-dashboard-module-spacing': '2em' } }, h("span", { slot: "description" }, reasons_description), h("sc-form", { onScSubmit: e => this.handleSubmit(e), style: { '--sc-form-row-spacing': '2em' } }, h("sc-choices", { showLabel: false, label: wp.i18n.__('Choose a reason', 'surecart'), style: { '--columns': '2' }, required: true }, this.renderReasons()), ((_b = this.selectedReason) === null || _b === void 0 ? void 0 : _b.comment_enabled) && (h("sc-textarea", { label: ((_c = this.selectedReason) === null || _c === void 0 ? void 0 : _c.comment_prompt) || wp.i18n.__('Additional Comments', 'surecart'), required: true, ref: el => (this.textArea = el), onScInput: e => (this.comment = e.target.value) })), h("sc-flex", { justifyContent: "flex-start" }, h("sc-button", { type: "primary", submit: true }, wp.i18n.__('Continue', 'surecart'), h("sc-icon", { name: "arrow-right", slot: "suffix" })), !!skip_link && (h("sc-button", { class: "cancel-survey__abort-link", type: "text", onClick: () => this.scAbandon.emit() }, skip_link)))))));
    }
    static get watchers() { return {
        "selectedReason": ["handleSelectedReasonChange"]
    }; }
};
ScCancelSurvey.style = ScCancelSurveyStyle0;

const scSubscriptionCancelCss = ":host{display:block;position:relative}.subscription-cancel{display:grid;gap:0.5em}.subscription-cancel__terms{color:var(--sc-color-gray-600);font-size:var(--sc-font-size-small)}";
const ScSubscriptionCancelStyle0 = scSubscriptionCancelCss;

const ScSubscriptionCancel = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scAbandon = createEvent(this, "scAbandon", 7);
        this.scCancelled = createEvent(this, "scCancelled", 7);
        this.heading = undefined;
        this.backUrl = undefined;
        this.successUrl = undefined;
        this.subscription = undefined;
        this.protocol = undefined;
        this.reason = undefined;
        this.comment = undefined;
        this.loading = undefined;
        this.busy = undefined;
        this.error = undefined;
    }
    async cancelSubscription() {
        var _a, _b;
        try {
            this.error = '';
            this.busy = true;
            await apiFetch({
                path: addQueryArgs(`/surecart/v1/subscriptions/${(_a = this.subscription) === null || _a === void 0 ? void 0 : _a.id}/cancel`, {
                    cancellation_act: {
                        ...(!!this.comment ? { comment: this.comment } : {}),
                        cancellation_reason_id: (_b = this.reason) === null || _b === void 0 ? void 0 : _b.id,
                    },
                }),
                method: 'PATCH',
            });
            this.scCancelled.emit();
        }
        catch (e) {
            this.error = (e === null || e === void 0 ? void 0 : e.message) || wp.i18n.__('Something went wrong', 'surecart');
            this.busy = false;
        }
    }
    renderContent() {
        var _a, _b;
        if (this.loading) {
            return this.renderLoading();
        }
        return (h(Fragment, null, ((_a = this === null || this === void 0 ? void 0 : this.protocol) === null || _a === void 0 ? void 0 : _a.cancel_behavior) === 'pending' ? (h("div", { slot: "description" }, wp.i18n.__('Your plan will be canceled, but is still available until the end of your billing period on', 'surecart'), ' ', h("strong", null, (_b = this === null || this === void 0 ? void 0 : this.subscription) === null || _b === void 0 ? void 0 : _b.current_period_end_at_date), ". ", wp.i18n.__('If you change your mind, you can renew your subscription.', 'surecart'))) : (h("div", { slot: "description" }, wp.i18n.__('Your plan will be canceled immediately and cannot be modified later.', 'surecart')))));
    }
    renderLoading() {
        return (h("div", { style: { padding: '0.5em' } }, h("sc-skeleton", { style: { width: '30%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '20%', marginBottom: '0.75em' } }), h("sc-skeleton", { style: { width: '40%' } })));
    }
    render() {
        return (h("sc-dashboard-module", { key: '19f4836d6e004723bdd92b1a5d818bcda683e1bd', heading: this.heading || wp.i18n.__('Cancel your plan', 'surecart'), class: "subscription-cancel", error: this.error, style: { '--sc-dashboard-module-spacing': '1em' } }, this.renderContent(), h("sc-flex", { key: '25d70e2b9d79928b9871e7a8c9f6c684bc13f057', justifyContent: "flex-start" }, h("sc-button", { key: '64ed5dbb7b36c092566c6b98fa695ab527b384b0', type: "primary", loading: this.loading || this.busy, disabled: this.loading || this.busy, onClick: () => this.cancelSubscription() }, wp.i18n.__('Cancel Plan', 'surecart')), h("sc-button", { key: '1ffa35b66b8560701d1c3022864666d7c15fcc6d', style: { color: 'var(--sc-color-gray-500' }, type: "text", onClick: () => this.scAbandon.emit(), loading: this.loading || this.busy, disabled: this.loading || this.busy }, wp.i18n.__('Keep My Plan', 'surecart'))), this.busy && h("sc-block-ui", { key: 'efbb5939c7521d1ec9ab78d652a7e595c40f565b' })));
    }
};
ScSubscriptionCancel.style = ScSubscriptionCancelStyle0;

const scTextareaCss = ":host{display:block}.textarea{display:flex;align-items:center;position:relative;width:100%;font-family:var(--sc-input-font-family);font-weight:var(--sc-input-font-weight);line-height:var(--sc-line-height-normal);letter-spacing:var(--sc-input-letter-spacing);vertical-align:middle;transition:var(--sc-input-transition, var(--sc-transition-medium)) color, var(--sc-input-transition, var(--sc-transition-medium)) border, var(--sc-input-transition, var(--sc-transition-medium)) box-shadow,\n    var(--sc-input-transition, var(--sc-transition-medium)) background-color;cursor:text}.textarea--standard{background-color:var(--sc-input-background-color);border:solid var(--sc-input-border-width) var(--sc-input-border-color)}.textarea--standard:hover:not(.textarea--disabled){background-color:var(--sc-input-background-color-hover);border-color:var(--sc-input-border-color-hover)}.textarea--standard:hover:not(.textarea--disabled) .textarea__control{color:var(--sc-input-color-hover)}.textarea--standard.textarea--focused:not(.textarea--disabled){background-color:var(--sc-input-background-color-focus);border-color:var(--sc-input-border-color-focus);color:var(--sc-input-color-focus);box-shadow:0 0 0 var(--sc-focus-ring-width) var(--sc-input-focus-ring-color)}.textarea--standard.textarea--focused:not(.textarea--disabled) .textarea__control{color:var(--sc-input-color-focus)}.textarea--standard.textarea--disabled{background-color:var(--sc-input-background-color-disabled);border-color:var(--sc-input-border-color-disabled);opacity:0.5;cursor:not-allowed}.textarea--standard.textarea--disabled .textarea__control{color:var(--sc-input-color-disabled)}.textarea--standard.textarea--disabled .textarea__control::placeholder{color:var(--sc-input-placeholder-color-disabled)}.textarea--filled{border:none;background-color:var(--sc-input-filled-background-color);color:var(--sc-input-color)}.textarea--filled:hover:not(.textarea--disabled){background-color:var(--sc-input-filled-background-color-hover)}.textarea--filled.textarea--focused:not(.textarea--disabled){background-color:var(--sc-input-filled-background-color-focus);outline:var(--sc-focus-ring);outline-offset:var(--sc-focus-ring-offset)}.textarea--filled.textarea--disabled{background-color:var(--sc-input-filled-background-color-disabled);opacity:0.5;cursor:not-allowed}.textarea__control{flex:1 1 auto;font-family:inherit;font-size:inherit;font-weight:inherit;line-height:1.4;color:var(--sc-input-color);border:none;background:none;box-shadow:none;cursor:inherit;-webkit-appearance:none}.textarea__control::-webkit-search-decoration,.textarea__control::-webkit-search-cancel-button,.textarea__control::-webkit-search-results-button,.textarea__control::-webkit-search-results-decoration{-webkit-appearance:none}.textarea__control::placeholder{color:var(--sc-input-placeholder-color);user-select:none}.textarea__control:focus{outline:none}.textarea--small{border-radius:var(--sc-input-border-radius-small);font-size:var(--sc-input-font-size-small)}.textarea--small .textarea__control{padding:0.5em var(--sc-input-spacing-small)}.textarea--medium{border-radius:var(--sc-input-border-radius-medium);font-size:var(--sc-input-font-size-medium)}.textarea--medium .textarea__control{padding:0.5em var(--sc-input-spacing-medium)}.textarea--large{border-radius:var(--sc-input-border-radius-large);font-size:var(--sc-input-font-size-large)}.textarea--large .textarea__control{padding:0.5em var(--sc-input-spacing-large)}.textarea--resize-none .textarea__control{resize:none}.textarea--resize-vertical .textarea__control{resize:vertical}.textarea--resize-auto .textarea__control{height:auto;resize:none}.textarea__char-limit-warning{margin-top:var(--sc-input-spacing-small);color:var(--sc-input-help-text-color);font-size:var(--sc-input-help-text-font-size-medium)}";
const ScTextareaStyle0 = scTextareaCss;

const CHAR_LIMIT_THRESHOLD = 20;
let id = 0;
const ScTextarea = class {
    constructor(hostRef) {
        registerInstance(this, hostRef);
        this.scChange = createEvent(this, "scChange", 7);
        this.scInput = createEvent(this, "scInput", 7);
        this.scBlur = createEvent(this, "scBlur", 7);
        this.scFocus = createEvent(this, "scFocus", 7);
        this.inputId = `textarea-${++id}`;
        this.helpId = `textarea-help-text-${id}`;
        this.labelId = `textarea-label-${id}`;
        this.hasFocus = false;
        this.showCharLimit = false;
        this.size = 'medium';
        this.name = undefined;
        this.value = '';
        this.filled = false;
        this.label = '';
        this.showLabel = true;
        this.help = '';
        this.placeholder = undefined;
        this.rows = 4;
        this.resize = 'vertical';
        this.disabled = false;
        this.readonly = false;
        this.minlength = undefined;
        this.maxlength = undefined;
        this.required = false;
        this.invalid = false;
        this.autocapitalize = undefined;
        this.autocorrect = undefined;
        this.autocomplete = undefined;
        this.autofocus = undefined;
        this.enterkeyhint = undefined;
        this.spellcheck = undefined;
        this.inputmode = undefined;
    }
    handleRowsChange() {
        this.setTextareaHeight();
    }
    handleValueChange() {
        var _a;
        this.invalid = !this.input.checkValidity();
        const valueLength = ((_a = this.value) === null || _a === void 0 ? void 0 : _a.length) || 0;
        const maxLength = this.maxlength || Number.MAX_SAFE_INTEGER;
        this.showCharLimit = maxLength - valueLength <= CHAR_LIMIT_THRESHOLD;
    }
    handleDisabledChange() {
        // Disabled form controls are always valid, so we need to recheck validity when the state changes
        this.input.disabled = this.disabled;
        this.invalid = !this.input.checkValidity();
    }
    /** Sets focus on the input. */
    async triggerFocus(options) {
        return this.input.focus(options);
    }
    /** Sets focus on the textarea. */
    focus(options) {
        this.input.focus(options);
    }
    /** Removes focus from the textarea. */
    blur() {
        this.input.blur();
    }
    /** Selects all the text in the textarea. */
    select() {
        this.input.select();
    }
    /** Gets or sets the textarea's scroll position. */
    scrollPosition(position) {
        if (position) {
            if (typeof position.top === 'number')
                this.input.scrollTop = position.top;
            if (typeof position.left === 'number')
                this.input.scrollLeft = position.left;
            return;
        }
        // eslint-disable-next-line consistent-return
        return {
            top: this.input.scrollTop,
            left: this.input.scrollTop,
        };
    }
    /** Sets the start and end positions of the text selection (0-based). */
    setSelectionRange(selectionStart, selectionEnd, selectionDirection = 'none') {
        this.input.setSelectionRange(selectionStart, selectionEnd, selectionDirection);
    }
    /** Replaces a range of text with a new string. */
    setRangeText(replacement, start, end, selectMode = 'preserve') {
        this.input.setRangeText(replacement, start, end, selectMode);
        if (this.value !== this.input.value) {
            this.value = this.input.value;
            this.scInput.emit();
        }
        if (this.value !== this.input.value) {
            this.value = this.input.value;
            this.setTextareaHeight();
            this.scInput.emit();
            this.scChange.emit();
        }
    }
    /** Checks for validity and shows the browser's validation message if the control is invalid. */
    async reportValidity() {
        return this.input.reportValidity();
    }
    /** Sets a custom validation message. If `message` is not empty, the field will be considered invalid. */
    setCustomValidity(message) {
        this.input.setCustomValidity(message);
        this.invalid = !this.input.checkValidity();
    }
    handleBlur() {
        this.hasFocus = false;
        this.scBlur.emit();
    }
    handleChange() {
        this.value = this.input.value;
        this.setTextareaHeight();
        this.scChange.emit();
    }
    handleFocus() {
        this.hasFocus = true;
        this.scFocus.emit();
    }
    handleInput() {
        this.value = this.input.value;
        this.setTextareaHeight();
        this.scInput.emit();
    }
    componentWillLoad() {
        if (!(window === null || window === void 0 ? void 0 : window.ResizeObserver)) {
            return;
        }
        this.resizeObserver = new window.ResizeObserver(() => this.setTextareaHeight());
    }
    componentDidLoad() {
        this.formController = new FormSubmitController(this.el).addFormData();
        if (!(window === null || window === void 0 ? void 0 : window.ResizeObserver)) {
            return;
        }
        this.resizeObserver.observe(this.input);
    }
    disconnectedCallback() {
        var _a;
        (_a = this.formController) === null || _a === void 0 ? void 0 : _a.removeFormData();
        this.resizeObserver.unobserve(this.input);
    }
    setTextareaHeight() {
        if (this.resize === 'auto') {
            this.input.style.height = 'auto';
            this.input.style.height = `${this.input.scrollHeight}px`;
        }
        else {
            this.input.style.height = undefined;
        }
    }
    render() {
        var _a;
        return (h("div", { key: 'c21ca68e709671f5d61e62000fcb64c0cb102447', part: "form-control", class: {
                'form-control': true,
                'form-control--small': this.size === 'small',
                'form-control--medium': this.size === 'medium',
                'form-control--large': this.size === 'large',
            } }, h("sc-form-control", { key: '4463d13d8c842989b17adb35afc7992369444427', exportparts: "label, help-text, form-control", size: this.size, required: this.required, label: this.label, showLabel: this.showLabel, help: this.help, inputId: this.inputId, helpId: this.helpId, labelId: this.labelId, name: this.name }, h("div", { key: '04318c6a0781a6f712db9701ac6a58793e65a44b', part: "form-control-input", class: "form-control-input" }, h("div", { key: '9ef84276cbd4ac2db3148aa6199dda4df3bbe8b9', part: "base", class: {
                'textarea': true,
                'textarea--small': this.size === 'small',
                'textarea--medium': this.size === 'medium',
                'textarea--large': this.size === 'large',
                'textarea--standard': !this.filled,
                'textarea--filled': this.filled,
                'textarea--disabled': this.disabled,
                'textarea--focused': this.hasFocus,
                'textarea--empty': !this.value,
                'textarea--invalid': this.invalid,
                'textarea--resize-none': this.resize === 'none',
                'textarea--resize-vertical': this.resize === 'vertical',
                'textarea--resize-auto': this.resize === 'auto',
            } }, h("textarea", { key: '6e5061082a40d58c51f57fee9fd2610a565602d4', part: "textarea", ref: el => (this.input = el), id: "input", class: "textarea__control", name: this.name, value: this.value, disabled: this.disabled, readonly: this.readonly, required: this.required, placeholder: this.placeholder, rows: this.rows, minlength: this.minlength, maxlength: this.maxlength, autocapitalize: this.autocapitalize, autocorrect: this.autocorrect, autofocus: this.autofocus, spellcheck: this.spellcheck, enterkeyhint: this.enterkeyhint, inputmode: this.inputmode, "aria-describedby": "help-text", onChange: () => this.handleChange(), onInput: () => this.handleInput(), onFocus: () => this.handleFocus(), onBlur: () => this.handleBlur(), onKeyDown: (e) => e.stopPropagation() })), this.showCharLimit && (h("div", { key: '0e2601abba6be4da243459feba2f2ec50d551697', slot: "help", class: 'textarea__char-limit-warning' }, wp.i18n.sprintf(wp.i18n.__('%d characters remaining', 'surecart'), this.maxlength && ((_a = this.input) === null || _a === void 0 ? void 0 : _a.value) ? this.maxlength - this.input.value.length : this.maxlength)))))));
    }
    get el() { return getElement(this); }
    static get watchers() { return {
        "rows": ["handleRowsChange"],
        "value": ["handleValueChange"],
        "disabled": ["handleDisabledChange"]
    }; }
};
ScTextarea.style = ScTextareaStyle0;

export { ScCancelDiscount as sc_cancel_discount, ScCancelSurvey as sc_cancel_survey, ScSubscriptionCancel as sc_subscription_cancel, ScTextarea as sc_textarea };

//# sourceMappingURL=sc-cancel-discount_4.entry.js.map