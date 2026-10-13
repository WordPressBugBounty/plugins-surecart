interface IconFile {
    ok: boolean;
    status: number;
    svg: string;
}
/**
 * Parse an SVG string and strip anything that can execute script.
 *
 * DOMParser documents are inert, so nothing in the markup runs or loads while we sanitize.
 * The `src` URL can be author-supplied, so the result must be safe to render via innerHTML.
 */
export declare const sanitizeSvg: (text: string) => string;
export declare const requestIcon: (url: string) => Promise<IconFile>;
export {};
