<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Terms — SoloLedge';
$PAGE_DESC  = 'Terms for purchasing SoloLedge. Template — review with a professional before publishing.';
$PAGE_PATH  = '/terms.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Terms of Sale &amp; Use</h1>
    <p class="text-muted">Effective date: <span class="placeholder"><?= e(LEGAL_EFFECTIVE_DATE) ?></span>. Starting template, not legal advice. Review with a qualified professional and complete every placeholder before publishing.</p>

    <h2>1. Parties</h2>
    <p>These terms are between <span class="placeholder"><?= e(LEGAL_ENTITY_NAME) ?></span> ("we", "us") of <span class="placeholder"><?= e(LEGAL_ENTITY_ADDR) ?></span>, and you, the purchaser.</p>

    <h2>2. The product</h2>
    <p>SoloLedge <?= e(PRODUCT_VERSION) ?> is a one-time-purchase digital product: a source-code package plus documentation for a self-hosted freelancer finance application. It is delivered digitally through <span class="placeholder">SuperProfile</span>. It is not a subscription and not a hosted service.</p>

    <h2>3. What the purchase includes</h2>
    <ul>
      <li>The SoloLedge <?= e(PRODUCT_VERSION) ?> source-code package and its documentation.</li>
      <li>A licence to use it on the terms set out in the <a href="/license.php">License</a>.</li>
      <li>7 days of email setup support from the purchase date, as described in <a href="/support.php">Support</a>.</li>
    </ul>

    <h2>4. What it does not include</h2>
    <ul>
      <li>Hosting, infrastructure, or any of our own accounts, servers, databases or credentials.</li>
      <li>Third-party accounts and services (Supabase, your host, domains) — you obtain and pay for these yourself.</li>
      <li>Custom development, guaranteed future updates, ongoing maintenance, or support beyond the 7-day window.</li>
    </ul>

    <h2>5. Your responsibilities</h2>
    <p>You are responsible for creating and securing your own infrastructure and accounts, for your deployment and its configuration, for your data and its backups, and for complying with the terms of any third-party service you use.</p>

    <h2>6. Nature of the software</h2>
    <p>SoloLedge is a financial tracking and planning tool. It is not accounting software, tax-filing software, GST-filing software, or a substitute for advice from a qualified professional. Its TDS and GST features record information you enter and never calculate or assert a legal tax position. You are solely responsible for verifying any financial, tax or regulatory figure before relying on it.</p>

    <h2>7. Payment and pricing</h2>
    <p>Prices are shown in Indian rupees and charged at checkout by <span class="placeholder">SuperProfile</span>, subject to its terms. The launch price is a limited promotional price and may change or end without notice.</p>

    <h2>8. Refunds</h2>
    <p>Refunds are governed by our <a href="/refund.php">Refund Policy</a>.</p>

    <h2>9. Warranty disclaimer &amp; liability</h2>
    <p>The product is provided "as is" without warranty of any kind. To the maximum extent permitted by law, our total liability arising from the product or these terms will not exceed the amount you paid for it. We are not liable for indirect or consequential losses, or for loss of profit, data or business.</p>

    <h2>10. Governing law</h2>
    <p>These terms are governed by the laws of <span class="placeholder"><?= e(LEGAL_JURISDICTION) ?></span>, and the courts of that jurisdiction have exclusive jurisdiction. <span class="placeholder">[Confirm the correct clause with a lawyer.]</span></p>

    <h2>11. Contact</h2>
    <p><a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
