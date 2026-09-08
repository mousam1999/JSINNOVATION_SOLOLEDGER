<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Terms — SoloLedge';
$PAGE_DESC  = 'Terms of sale and use for the SoloLedge V1.0.0 digital product by JSinnovation.';
$PAGE_PATH  = '/terms.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Terms of Sale &amp; Use</h1>
    <p class="text-muted">Effective date: <?= e(LEGAL_EFFECTIVE_DATE) ?>.</p>

    <h2>1. Parties</h2>
    <p>These terms are a binding agreement between <strong><?= e(LEGAL_ENTITY_NAME) ?></strong>, <?= e(LEGAL_ENTITY_TYPE) ?>, of <?= e(LEGAL_ENTITY_ADDR) ?> ("we", "us", "our"), and you, the person or business buying the product ("you"). By purchasing SoloLedge you agree to these terms, the <a href="/license.php">License</a>, the <a href="/refund.php">Refund Policy</a> and the <a href="/privacy.php">Privacy Policy</a>.</p>

    <h2>2. The product</h2>
    <p>SoloLedge <?= e(PRODUCT_VERSION) ?> is a one-time-purchase digital product: a source-code package plus documentation for a finance application that freelancers deploy and run on their own cloud accounts. It is delivered digitally through <strong>SuperProfile</strong>. It is not a subscription and not a hosted service, and we do not host it for you.</p>

    <h2>3. What the purchase includes</h2>
    <ul>
      <li>The SoloLedge <?= e(PRODUCT_VERSION) ?> source-code package and its documentation, as described on this site and listed in the package's <code>RELEASE_MANIFEST.md</code>.</li>
      <li>A licence to use it on the terms set out in the <a href="/license.php">License</a>.</li>
      <li>7 days of email setup support from the date of purchase, on the terms in <a href="/support.php">Support</a>.</li>
    </ul>

    <h2>4. What it does not include</h2>
    <ul>
      <li>Hosting, infrastructure, or any of our own accounts, servers, databases or credentials.</li>
      <li>Third-party accounts and services (Supabase, your host, a domain) — you create and pay for these yourself, directly with those providers.</li>
      <li>Custom development, guaranteed future updates or versions, ongoing maintenance, or any support beyond the 7-day window.</li>
    </ul>

    <h2>5. Your responsibilities</h2>
    <p>You are responsible for creating and securing your own accounts and deployment, for configuring the software, for your own data and its backups, and for complying with the terms of every third-party service you use to run it. You must have the basic technical ability described on this site (creating accounts, running one SQL script, setting environment variables, deploying to a host).</p>

    <h2>6. Nature of the software</h2>
    <p>SoloLedge is a financial tracking and planning tool. It is not accounting software, tax-filing software, GST-filing software, or a substitute for advice from a qualified chartered accountant or tax professional. Its TDS and GST features only record information you enter; they never calculate or assert a legal tax position. You are solely responsible for verifying any financial, tax or regulatory figure before relying on it.</p>

    <h2>7. Payment and pricing</h2>
    <p>Prices are shown in Indian rupees and are charged at checkout by SuperProfile and its payment partners, subject to their terms. Any launch or promotional price is limited and may change or end at any time without notice; the price you pay is the price shown at checkout when you complete the purchase.</p>

    <h2>8. Refunds</h2>
    <p>All sales are final. Please read the <a href="/refund.php">Refund Policy</a> in full before buying.</p>

    <h2>9. Intellectual property</h2>
    <p>We retain all ownership, copyright and intellectual-property rights in the software, its design and the "SoloLedge" and "JSinnovation" names. Your purchase is a licence to use the source code as set out in the <a href="/license.php">License</a>, not a transfer of ownership. Your own business data always belongs to you.</p>

    <h2>10. Warranty disclaimer &amp; liability</h2>
    <p>The product is provided "as is" and "as available", without warranty of any kind, express or implied, including merchantability, fitness for a particular purpose and non-infringement. To the maximum extent permitted by law, our total liability arising out of or in connection with the product or these terms will not exceed the amount you actually paid for it, and we will not be liable for any indirect, incidental, special or consequential loss, or for any loss of profit, data, goodwill or business. Nothing in these terms limits any liability that cannot be limited under applicable law.</p>

    <h2>11. Governing law</h2>
    <p>These terms are governed by the laws of India. The courts at Mumbai, <?= e(LEGAL_JURISDICTION) ?> have exclusive jurisdiction over any dispute, subject to any consumer-protection right you have to bring proceedings in your own place of residence.</p>

    <h2>12. Contact</h2>
    <p><?= e(LEGAL_ENTITY_NAME) ?> — <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a><br>
    <?= e(LEGAL_ENTITY_ADDR) ?></p>

    <p><a href="/privacy.php">Privacy</a> · <a href="/refund.php">Refund Policy</a> · <a href="/license.php">License</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
