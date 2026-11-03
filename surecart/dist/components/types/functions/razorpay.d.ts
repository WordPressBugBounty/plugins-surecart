/**
 * Internal dependencies.
 */
import { RazorpayConstructor } from '../types';
export { RAZORPAY_METHOD_META, getRazorpayMethodIcon } from './razorpay-method-meta';
/**
 * Razorpay Checkout JS SDK URL.
 */
export declare const RAZORPAY_CHECKOUT_SCRIPT_URL = "https://checkout.razorpay.com/v1/checkout.js";
/**
 * Localized label for a Razorpay method id, or `undefined` for unknown ids.
 */
export declare const getRazorpayMethodLabel: (type?: string | null) => string | undefined;
/**
 * Load Razorpay SDK script.
 * Uses singleton pattern to avoid loading the script multiple times.
 *
 * @returns Promise that resolves to the Razorpay constructor.
 */
export declare const loadRazorpay: () => Promise<RazorpayConstructor>;
