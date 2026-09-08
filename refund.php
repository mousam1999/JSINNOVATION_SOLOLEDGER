<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Refund Policy — SoloLedge';
$PAGE_DESC  = 'SoloLedge is a digital product and all sales are final. Read this before you buy.';
$PAGE_PATH  = '/refund.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Refund Policy</h1>
    <p class="text-muted">Effective date: <?= e(LEGAL_EFFECTIVE_DATE) ?>.</p>

    <h2>1. All sales are final</h2>
    <p>SoloLedge <?= e(PRODUCT_VERSION) ?> is a digital product. The complete source-code package and documentation are made available to you immediately after purchase and cannot be returned or "un-received". <strong>For this reason, all sales are final and we do not offer refunds, exchanges or cancellations once a purchase is complete.</strong></p>
    <p>This is also stated at the SuperProfile checkout. By completing your purchase you confirm that you have read and accepted this policy.</p>

    <h2>2. Please check before you buy</h2>
    <p>Because purchases are non-refundable, please make sure before you pay that:</p>
    <ul>
      <li>You understand SoloLedge is source code you deploy yourself, on your own Supabase and hosting accounts — not a hosted service we run for you.</li>
      <li>You are comfortable following a step-by-step technical guide (creating accounts, running one SQL script, setting environment variables, deploying to a host).</li>
      <li>You have read the <a href="/#features">features</a>, the <a href="/#how-it-works">how-it-works</a> section and the <a href="/#faq">FAQ</a>, which describe exactly what the product does and does not do.</li>
    </ul>
    <p>If anything is unclear, email <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=Pre-purchase%20question"><?= e(SUPPORT_EMAIL) ?></a> <em>before</em> buying and we will answer your questions.</p>

    <h2>3. If something is wrong with your purchase</h2>
    <p>The no-refund policy does not cover a situation where you were charged but did not receive access to the product, or where the package you received is materially not what was described. If that happens, contact <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=Order%20problem"><?= e(SUPPORT_EMAIL) ?></a> within 7 days of purchase with your order reference and we will investigate and put it right — which may mean re-sending your access or, at our discretion, refunding that specific order.</p>

    <h2>4. Your statutory rights</h2>
    <p>Nothing in this policy removes or limits any right you have under applicable consumer-protection law that cannot be waived by agreement. If such a law gives you a remedy in your circumstances, that law prevails over this policy to the extent of any conflict.</p>

    <h2>5. Contact</h2>
    <p><?= e(LEGAL_ENTITY_NAME) ?> — <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a><br>
    <?= e(LEGAL_ENTITY_ADDR) ?></p>

    <p><a href="/privacy.php">Privacy</a> · <a href="/terms.php">Terms</a> · <a href="/license.php">License</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
