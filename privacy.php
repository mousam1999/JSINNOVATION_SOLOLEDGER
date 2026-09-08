<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Privacy Policy — SoloLedge';
$PAGE_DESC  = 'How the SoloLedge website by JSinnovation handles visitor data: analytics, cookies, and your rights.';
$PAGE_PATH  = '/privacy.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Privacy Policy</h1>
    <p class="text-muted">Effective date: <?= e(LEGAL_EFFECTIVE_DATE) ?>.</p>

    <h2>1. Who we are</h2>
    <p>This website, <?= e(SITE_URL) ?> ("the Site"), is operated by <strong><?= e(LEGAL_ENTITY_NAME) ?></strong>, <?= e(LEGAL_ENTITY_TYPE) ?>, based at <?= e(LEGAL_ENTITY_ADDR) ?> ("we", "us", "our"). For any privacy question or request, contact <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=Privacy%20request"><?= e(SUPPORT_EMAIL) ?></a>. We are also the grievance contact for the purposes of India's Digital Personal Data Protection Act, 2023.</p>

    <h2>2. Scope</h2>
    <p>This policy covers only this marketing and sales website. It does <strong>not</strong> cover the SoloLedge application after you buy and deploy it. Once you deploy SoloLedge on your own accounts, you are the data controller (Data Fiduciary) for that instance and for the data you and your clients enter into it — we have no access to it.</p>

    <h2>3. What we collect and why</h2>
    <ul>
      <li><strong>Analytics &amp; advertising data.</strong> We use <strong>Google Analytics 4</strong> and <strong>Meta Pixel</strong> to understand how visitors find and use the Site and how our ads perform. These set cookies and similar identifiers and collect your device and browser type, approximate location (from IP, not precise), referring source, and on-site actions (pages viewed, buttons and links clicked, scroll depth). We do not collect your name, email, password or payment details through analytics.</li>
      <li><strong>Email you send us.</strong> If you email our support address we receive your email address and whatever you put in the message, and we keep it to answer you and for our records.</li>
      <li><strong>Server logs.</strong> Our hosting provider, Hostinger, keeps standard web-server access logs (IP address, timestamp, requested URL, user agent) for security, abuse prevention and reliability.</li>
    </ul>
    <p>We process this data to operate and secure the Site, to measure and improve our marketing, and to respond to your enquiries. Where the law requires your consent for analytics or advertising cookies, we rely on that consent; otherwise we rely on our legitimate interest in running and improving the Site.</p>

    <h2>4. Checkout and payment</h2>
    <p>When you click "Get SoloLedge" you are taken to <strong>SuperProfile</strong>, a third-party platform that handles the checkout, payment and delivery of the product. Any information you enter there (name, email, payment details) is collected and controlled by SuperProfile and its payment partners under their own privacy policies, not this one. We receive only the order and contact information SuperProfile shares with us to fulfil and support your purchase.</p>

    <h2>5. Cookies and tracking</h2>
    <p>The Site uses:</p>
    <ul>
      <li><strong>Essential</strong> — a small amount of local browser storage to remember interface state (for example, whether you have opened an FAQ item). No tracking.</li>
      <li><strong>Analytics &amp; advertising</strong> — Google Analytics 4 and Meta Pixel cookies, as described above.</li>
    </ul>
    <p>You can control cookies through your browser settings, and you can opt out of these specific tools using Google's <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener nofollow">Analytics opt-out add-on</a> and your Meta <a href="https://www.facebook.com/settings?tab=ads" rel="noopener nofollow">ad preferences</a>. We are introducing an on-site consent control that lets you accept or decline analytics and advertising cookies; until it is live, these tools load when you visit and you can decline them by the methods just described.</p>

    <h2>6. Sharing and international transfer</h2>
    <p>We share data only with the service providers that make the Site work: Google (analytics), Meta (advertising measurement), Hostinger (hosting) and SuperProfile (checkout). Each processes it under its own terms. Some of these providers are located outside India and may process data on servers outside India. <strong>We do not sell your personal data</strong>, and we do not share it for any purpose other than those described here.</p>

    <h2>7. Retention</h2>
    <p>Google Analytics data is retained for up to <strong>14 months</strong> and then automatically deleted. Server logs are kept per Hostinger's standard retention. Emails you send us are kept for as long as needed to handle your request and for a reasonable period afterward for our records, then deleted.</p>

    <h2>8. Your rights</h2>
    <p>You can ask us to give you a copy of the personal data we hold about you, correct it, or delete it, and you can withdraw any consent you have given. To do so, email <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=Privacy%20request"><?= e(SUPPORT_EMAIL) ?></a> from the address concerned; we will respond within a reasonable time.</p>
    <ul>
      <li><strong>If you are in India:</strong> under the Digital Personal Data Protection Act, 2023 you have the right to access, correction and erasure of your personal data, the right to grievance redressal, and the right to nominate another person to exercise your rights. If we do not resolve your grievance, you may complain to the Data Protection Board of India.</li>
      <li><strong>If you are in the EU/UK or another region with similar laws:</strong> you may also have rights to restrict or object to processing, to data portability, and to lodge a complaint with your local data-protection authority.</li>
    </ul>

    <h2>9. Children</h2>
    <p>The Site and the product are intended for working professionals and are not directed at anyone under 18. We do not knowingly collect data from children.</p>

    <h2>10. Changes</h2>
    <p>If we change this policy we will update the effective date above and, for material changes, note it on this page.</p>

    <h2>11. Contact</h2>
    <p><?= e(LEGAL_ENTITY_NAME) ?> — <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a><br>
    <?= e(LEGAL_ENTITY_ADDR) ?></p>

    <p><a href="/terms.php">Terms</a> · <a href="/refund.php">Refund Policy</a> · <a href="/license.php">License</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
