/**
 * Internal dependencies.
 */
import { RazorpayConstructor } from '../types';
/**
 * Razorpay Checkout JS SDK URL.
 */
export declare const RAZORPAY_CHECKOUT_SCRIPT_URL = "https://checkout.razorpay.com/v1/checkout.js";
/**
 * Load Razorpay SDK script.
 * Uses singleton pattern to avoid loading the script multiple times.
 *
 * @returns Promise that resolves to the Razorpay constructor.
 */
export declare const loadRazorpay: () => Promise<RazorpayConstructor>;
