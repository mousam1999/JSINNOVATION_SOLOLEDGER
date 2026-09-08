<?php
/**
 * Shared <head> + site header.
 *
 * Set before including:
 *   $PAGE_TITLE   string  full <title>
 *   $PAGE_DESC    string  meta description
 *   $PAGE_PATH    string  path for canonical, e.g. "/privacy.php" or "/"
 *   $PAGE_OG_IMAGE string optional OG image path (root-relative)
 *   $PAGE_NOINDEX bool    optional, true to noindex
 *   $BODY_CLASS   string  optional extra body class
 *   $EXTRA_HEAD   string  optional raw markup for <head>
 *   $PAGE_JSONLD  string  optional JSON-LD script block(s)
 */
require_once __DIR__ . '/config.php';

$PAGE_TITLE   = $PAGE_TITLE   ?? (SITE_NAME . ' — ' . SITE_TAGLINE);
$PAGE_DESC    = $PAGE_DESC    ?? 'SoloLedge is a self-hosted finance OS for freelancers. One-time purchase, deploy the source code on your own cloud accounts.';
$PAGE_PATH    = $PAGE_PATH    ?? '/';
$PAGE_OG_IMAGE = $PAGE_OG_IMAGE ?? '/assets/og/og-default.jpg';
$PAGE_NOINDEX = $PAGE_NOINDEX ?? false;
$BODY_CLASS   = $BODY_CLASS   ?? '';
$canonical    = sl_url($PAGE_PATH === '/' ? '' : ltrim($PAGE_PATH, '/'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>document.documentElement.className+=' js';</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($PAGE_TITLE) ?></title>
<meta name="description" content="<?= e($PAGE_DESC) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<?php if ($PAGE_NOINDEX): ?>
<meta name="robots" content="noindex, follow">
<?php else: ?>
<meta name="robots" content="index, follow, max-image-preview:large">
<?php endif; ?>
<?php if (GSC_VERIFICATION !== ''): ?>
<meta name="google-site-verification" content="<?= e(GSC_VERIFICATION) ?>">
<?php endif; ?>

<meta name="theme-color" content="#020202">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($PAGE_TITLE) ?>">
<meta property="og:description" content="<?= e($PAGE_DESC) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e(sl_url(ltrim($PAGE_OG_IMAGE, '/'))) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($PAGE_TITLE) ?>">
<meta name="twitter:description" content="<?= e($PAGE_DESC) ?>">
<meta name="twitter:image" content="<?= e(sl_url(ltrim($PAGE_OG_IMAGE, '/'))) ?>">

<link rel="icon" href="/favicon.ico" sizes="32x32">
<link rel="icon" type="image/png" href="/assets/icons/icon-192.png" sizes="192x192">
<link rel="apple-touch-icon" href="/assets/icons/icon-180.png">
<link rel="manifest" href="/site.webmanifest">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style"
  href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap">
<link rel="stylesheet" media="print" onload="this.media='all'"
  href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap">
<noscript><link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"></noscript>

<link rel="stylesheet" href="/css/main.css?v=4">

<?php if (!empty($PAGE_JSONLD)) echo $PAGE_JSONLD; ?>
<?php if (!empty($EXTRA_HEAD)) echo $EXTRA_HEAD; ?>

<?php /* -------- Analytics / advertising --------
   The GA4, GTM and Meta Pixel tags are NOT loaded here. js/consent.js loads
   them only after the visitor accepts cookies (or has previously accepted).
   No analytics or advertising request is made before that. -------- */ ?>
<script>
  window.SL_CONFIG = {
    checkoutUrl: <?= json_encode(SUPERPROFILE_CHECKOUT_URL) ?>,
    hasPixel: <?= META_PIXEL_ID !== '' ? 'true' : 'false' ?>,
    hasGA: <?= (GTM_ID !== '' || GA4_MEASUREMENT_ID !== '') ? 'true' : 'false' ?>
  };
  window.SL_CONSENT = {
    ga4:   <?= json_encode(GA4_MEASUREMENT_ID) ?>,
    gtm:   <?= json_encode(GTM_ID) ?>,
    pixel: <?= json_encode(META_PIXEL_ID) ?>
  };
</script>
<script src="/js/consent.js?v=1" defer></script>
<script src="/js/main.js?v=3" defer></script>
</head>
<body class="<?= e($BODY_CLASS) ?>">
<?php if (GTM_ID !== ''): ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= e(GTM_ID) ?>"
  height="0" width="0" style="display:none;visibility:hidden" title="gtm"></iframe></noscript>
<?php endif; ?>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" data-header>
  <div class="container site-header__inner">
    <a class="brand" href="/" aria-label="<?= e(PARENT_BRAND) ?> — SoloLedge home">
      <img class="brand__logo" src="/assets/brand/jsinnovation-logo.png"
           alt="<?= e(PARENT_BRAND) ?>" width="1036" height="155" decoding="async">
      <span class="brand__product">SoloLedge</span>
    </a>

    <nav class="site-nav" aria-label="Primary">
      <button class="nav-toggle" aria-expanded="false" aria-controls="site-menu" data-nav-toggle>
        <span class="nav-toggle__bar" aria-hidden="true"></span>
        <span class="visually-hidden">Menu</span>
      </button>
      <ul class="site-menu" id="site-menu" data-nav-menu>
        <li><a href="/#features">Features</a></li>
        <li><a href="/#screenshots">Screenshots</a></li>
        <li><a href="/#how-it-works">How It Works</a></li>
        <li><a href="/#faq">FAQ</a></li>
        <li class="site-menu__cta">
          <a class="btn btn--primary btn--sm" href="<?= e(SUPERPROFILE_CHECKOUT_URL) ?>"
             data-cta="header" rel="noopener">Get SoloLedge</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
<main id="main">
