<?php
/**
 * SoloLedge marketing site — central configuration.
 *
 * This is the ONLY place tracking IDs, URLs and business details live.
 * Values are read from the server environment first (set these in the
 * Hostinger control panel or a .env loader), then fall back to the
 * safe defaults below. Public IDs (GA4, Meta Pixel) are meant to be
 * visible in the browser — that is normal. Never put a secret here.
 *
 * Replace every value marked  >>> REPLACE <<<  before launch.
 */

declare(strict_types=1);

if (!function_exists('sl_env')) {
    /** Read an env var with a fallback. */
    function sl_env(string $key, string $default = ''): string
    {
        $v = getenv($key);
        if ($v === false || $v === '') {
            return $default;
        }
        return $v;
    }
}

/* ------------------------------------------------------------------ *
 *  Site
 * ------------------------------------------------------------------ */
define('SITE_NAME',      'SoloLedge');
define('SITE_TAGLINE',   'Self-Hosted Finance OS for Freelancers');
define('PRODUCT_VERSION', 'V1.0.0');
define('PARENT_BRAND',   'JSinnovation');

// Canonical origin, no trailing slash.
define('SITE_URL', rtrim(sl_env('SITE_URL', 'https://sololedge.jsinnovation.in'), '/'));

/* ------------------------------------------------------------------ *
 *  Pricing (display only — SuperProfile controls the real charge)
 * ------------------------------------------------------------------ */
define('PRICE_REGULAR',  '2,999');
define('PRICE_LAUNCH',   '2,399');
define('PRICE_CURRENCY', '₹');
define('PRICE_DISCOUNT_LABEL', '20% off launch price');
// ISO value used only in Product structured data.
define('PRICE_LAUNCH_VALUE', '2399.00');
define('PRICE_CURRENCY_CODE', 'INR');

/* ------------------------------------------------------------------ *
 *  Checkout — SuperProfile
 *  The public "Get SoloLedge" buttons point here. The launch price,
 *  any coupon, payment methods and digital delivery are all configured
 *  inside SuperProfile, NOT in this codebase.
 *  >>> REPLACE with your real SuperProfile product/checkout link <<<
 * ------------------------------------------------------------------ */
define('SUPERPROFILE_CHECKOUT_URL', sl_env(
    'SUPERPROFILE_CHECKOUT_URL',
    'https://superprofile.bio/REPLACE-WITH-YOUR-SOLOLEDGE-CHECKOUT'
));

/* ------------------------------------------------------------------ *
 *  Contact / support
 *  >>> REPLACE with the real, monitored support inbox <<<
 * ------------------------------------------------------------------ */
define('SUPPORT_EMAIL', sl_env('SUPPORT_EMAIL', 'support@jsinnovation.in'));

/* ------------------------------------------------------------------ *
 *  Legal entity details — used in the legal pages.
 *  >>> REPLACE all four before publishing the legal pages <<<
 * ------------------------------------------------------------------ */
define('LEGAL_ENTITY_NAME',   sl_env('LEGAL_ENTITY_NAME',   'JSinnovation [registered legal name — REPLACE]'));
define('LEGAL_ENTITY_ADDR',   sl_env('LEGAL_ENTITY_ADDR',   '[Registered business address — REPLACE]'));
define('LEGAL_JURISDICTION',  sl_env('LEGAL_JURISDICTION',  '[State], India — REPLACE'));
define('LEGAL_EFFECTIVE_DATE', sl_env('LEGAL_EFFECTIVE_DATE', '[Effective date — REPLACE]'));

/* ------------------------------------------------------------------ *
 *  Analytics / tracking IDs  (public by design; leave blank to disable)
 *  Set exactly ONE Google path: GTM_ID  *or*  GA4_MEASUREMENT_ID.
 * ------------------------------------------------------------------ */
define('GTM_ID',            sl_env('GTM_ID', ''));                          // e.g. GTM-XXXXXXX
define('GA4_MEASUREMENT_ID', sl_env('GA4_MEASUREMENT_ID', 'G-YN3BBVXKRV')); // JSinnovation SoloLedge GA4 property
define('META_PIXEL_ID',     sl_env('META_PIXEL_ID', '874542795145215')); // JSinnovation SoloLedge Meta Pixel

// Google Search Console meta-tag token (leave blank until you have it).
define('GSC_VERIFICATION', sl_env('GSC_VERIFICATION', ''));

/* ------------------------------------------------------------------ *
 *  Helpers
 * ------------------------------------------------------------------ */
if (!function_exists('e')) {
    /** HTML-escape for output. */
    function e(?string $s): string
    {
        return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

/** Absolute URL for a site-root-relative path. */
function sl_url(string $path = ''): string
{
    return SITE_URL . '/' . ltrim($path, '/');
}

/** Formatted launch price with currency, e.g. "₹2,399". */
function sl_price_launch(): string
{
    return PRICE_CURRENCY . PRICE_LAUNCH;
}
function sl_price_regular(): string
{
    return PRICE_CURRENCY . PRICE_REGULAR;
}

/** Standard primary CTA label. */
function sl_cta_label(): string
{
    return 'Get SoloLedge — ' . sl_price_launch();
}
