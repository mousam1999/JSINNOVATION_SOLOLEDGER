<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Privacy Policy — SoloLedge';
$PAGE_DESC  = 'How the SoloLedge marketing site handles visitor data. Template — review with a professional before publishing.';
$PAGE_PATH  = '/privacy.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Privacy Policy</h1>
    <p class="text-muted">Effective date: <span class="placeholder"><?= e(LEGAL_EFFECTIVE_DATE) ?></span>. This is a starting template, not legal advice. Have it reviewed by a qualified professional and complete every highlighted placeholder before publishing.</p>

    <h2>1. Who we are</h2>
    <p>This website (<?= e(SITE_URL) ?>) is operated by <span class="placeholder"><?= e(LEGAL_ENTITY_NAME) ?></span> ("we", "us"), located at <span class="placeholder"><?= e(LEGAL_ENTITY_ADDR) ?></span>. For privacy questions, contact <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a>.</p>

    <h2>2. Scope</h2>
    <p>This policy covers only this marketing website. It does not cover the SoloLedge application after you deploy it — once deployed, you are the data controller for your own instance and the data your clients and you enter into it.</p>

    <h2>3. What we collect</h2>
    <ul>
      <li><strong>Analytics data</strong> — if analytics is enabled, we use <span class="placeholder">Google Analytics 4 / Google Tag Manager</span> and <span class="placeholder">Meta Pixel</span> to understand aggregate traffic and campaign performance. These set cookies or similar identifiers and collect device, browser, approximate location and on-site behaviour (pages viewed, buttons clicked, scroll depth). We do not send names, emails, passwords or payment details through analytics.</li>
      <li><strong>Contact by email</strong> — if you email us, we receive your email address and message content.</li>
      <li><strong>Server logs</strong> — our host (<span class="placeholder">Hostinger</span>) keeps standard access logs (IP address, timestamp, user agent) for security and reliability.</li>
    </ul>
    <p>Checkout and payment happen on <span class="placeholder">SuperProfile</span>, which has its own privacy policy and is the data controller for that step.</p>

    <h2>4. Why we process it</h2>
    <ul>
      <li>To operate and secure the website (legitimate interest).</li>
      <li>To measure marketing and improve the site (consent, where required).</li>
      <li>To respond to your enquiries (legitimate interest / pre-contract).</li>
    </ul>

    <h2>5. Cookies and tracking</h2>
    <p>Analytics and advertising tools load only <span class="placeholder">[describe your consent approach — e.g. after consent via a banner, or based on your jurisdiction's requirements]</span>. You can block cookies in your browser and use browser or platform opt-outs for Google and Meta.</p>

    <h2>6. Sharing</h2>
    <p>We share data only with the service providers named above (analytics, advertising, hosting, checkout), each acting under its own terms. We do not sell personal data.</p>

    <h2>7. Retention</h2>
    <p>Analytics data is retained per the provider's configured retention period (<span class="placeholder">e.g. 14 months in GA4</span>). Emails are kept as long as needed to handle your request and for a reasonable period afterward.</p>

    <h2>8. Your rights</h2>
    <p>Depending on your location, you may have rights to access, correct, delete or restrict processing of your personal data, and to object to it. To exercise them, email <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a>. <span class="placeholder">[Add the specific rights and the supervisory authority relevant to your jurisdiction.]</span></p>

    <h2>9. Changes</h2>
    <p>We may update this policy. The effective date above will change when we do.</p>

    <p><a href="/terms.php">Terms</a> · <a href="/refund.php">Refund Policy</a> · <a href="/license.php">License</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
