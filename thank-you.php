<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'You\'re all set — SoloLedge';
$PAGE_DESC  = 'Next steps after your SoloLedge purchase: access your package, read the setup guide and deploy.';
$PAGE_PATH  = '/thank-you.php';
$PAGE_NOINDEX = true;
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container" style="max-width:720px">
    <span class="badge badge--accent" data-reveal><span class="badge__dot"></span> Thank you</span>
    <h1 data-reveal>You're all set.</h1>
    <p class="section__lead" data-reveal>
      Your SoloLedge <?= e(PRODUCT_VERSION) ?> purchase and delivery details are handled through the
      purchase platform. This page doesn't confirm a payment on its own — check the platform and your
      email for your access and download.
    </p>

    <div class="card" data-reveal style="margin:2rem 0">
      <h2 style="font-size:1.25rem">Next steps</h2>
      <div class="steps" style="margin-top:1rem">
        <div class="step"><span class="step__num"></span><div><h3>Check your email</h3><p>Look for the purchase confirmation and access details from the checkout platform (check spam too).</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Access your purchase</h3><p>Open your SoloLedge package through the purchase platform and download the source ZIP and documentation. The application inside is named SoloLedge <?= e(PRODUCT_VERSION) ?>; some in-app screens and files still use its original working title, "Freelancer Finance OS" — it is the same product.</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Follow the setup guide</h3><p>Start with <code>docs/QUICK_START.md</code>, or <code>docs/DEPLOYMENT_GUIDE.md</code> for the full walkthrough.</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Deploy and sign in</h3><p>Create your Supabase project and host, deploy, then sign up on your own instance.</p></div></div>
      </div>
    </div>

    <p class="callout" data-reveal>
      Stuck during setup within your 7-day support window? Email
      <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=SoloLedge%20setup%20support"><?= e(SUPPORT_EMAIL) ?></a>
      with the exact step, the exact error message, and whether it happened locally or on your deployment.
      See <a href="/support.php">Support</a> for what's covered.
    </p>

    <p data-reveal><a class="btn btn--ghost" href="/">Back to home</a></p>
  </div>
</section>

<?php /*
  META PURCHASE EVENT — deliberately not fired.
  We only reach this page via a redirect we cannot currently verify, so firing
  Purchase here would inflate conversions. If SuperProfile is configured to
  redirect here with a signed/verifiable token (or exposes a purchase webhook),
  validate it server-side above and then uncomment:

  <?php if ($verified_purchase): ?>
  <script>
    if (typeof fbq === 'function') fbq('track', 'Purchase',
      { value: <?= json_encode($amount) ?>, currency: 'INR' });
    if (typeof window.slTrack === 'function') window.slTrack('purchase',
      { transaction_id: <?= json_encode($order_id) ?>, value: <?= json_encode($amount) ?>, currency: 'INR' });
  </script>
  <?php endif; ?>
*/ ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
