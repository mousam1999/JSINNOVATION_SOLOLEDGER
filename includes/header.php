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

<link rel="stylesheet" href="/css/main.css?v=3">

<?php if (!empty($PAGE_JSONLD)) echo $PAGE_JSONLD; ?>
<?php if (!empty($EXTRA_HEAD)) echo $EXTRA_HEAD; ?>

<?php /* -------- Analytics: single source of truth -------- */ ?>
<?php if (GTM_ID !== ''): ?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;
j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= e(GTM_ID) ?>');</script>
<?php elseif (GA4_MEASUREMENT_ID !== ''): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(GA4_MEASUREMENT_ID) ?>"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','<?= e(GA4_MEASUREMENT_ID) ?>');</script>
<?php endif; ?>
<?php if (META_PIXEL_ID !== ''): ?>
<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');fbq('init','<?= e(META_PIXEL_ID) ?>');fbq('track','PageView');</script>
<noscript><img height="1" width="1" style="display:none" alt=""
  src="https://www.facebook.com/tr?id=<?= e(META_PIXEL_ID) ?>&ev=PageView&noscript=1"></noscript>
<?php endif; ?>

<script>
  // Expose public config to the tracking helper (js/analytics.js).
  window.SL_CONFIG = {
    checkoutUrl: <?= json_encode(SUPERPROFILE_CHECKOUT_URL) ?>,
    hasPixel: <?= META_PIXEL_ID !== '' ? 'true' : 'false' ?>,
    hasGA: <?= (GTM_ID !== '' || GA4_MEASUREMENT_ID !== '') ? 'true' : 'false' ?>
  };
</script>
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
