/**
 * Keep a stored redirect target only if it stays on this site.
 *
 * For `checkout.metadata.success_url`, which anyone can write via the public checkouts endpoint.
 * The merchant-configured success URL is not run through this; it may point off-site.
 *
 * @param url The stored URL.
 * @returns The URL when it is same-origin http(s), otherwise null.
 */
export declare const sameOriginUrl: (url?: string | null) => string | null;
