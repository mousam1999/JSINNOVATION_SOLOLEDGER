<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Refund Policy — SoloLedge';
$PAGE_DESC  = 'Refund policy for the SoloLedge digital product. Template — set your actual terms before publishing.';
$PAGE_PATH  = '/refund.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>Refund Policy</h1>
    <p class="text-muted">Effective date: <span class="placeholder"><?= e(LEGAL_EFFECTIVE_DATE) ?></span>. Template. Your actual refund terms must match what is stated at the <span class="placeholder">SuperProfile</span> checkout and in the delivered documentation — do not let them contradict each other.</p>

    <h2>1. Digital product</h2>
    <p>SoloLedge is a digital product delivered as a downloadable source-code package. Because the full product is accessible immediately on delivery, refunds are limited as set out below.</p>

    <h2>2. When a refund may be available</h2>
    <p><span class="placeholder">[Set your policy. Example wording:]</span> If you have not downloaded the package and request a refund within <span class="placeholder">[X] days</span> of purchase, we will refund in full. If a genuine, reproducible defect prevents the product from being deployed as documented and we cannot resolve it within your support window, you may request a refund of the purchase price.</p>

    <h2>3. When a refund is not available</h2>
    <ul>
      <li>After the package has been downloaded, except in the defect case above.</li>
      <li>Because you changed your mind, lack the technical setup described on the sales page and documentation, or do not want to create the required third-party accounts.</li>
      <li>For problems caused by third-party services (Supabase, your host), your own modifications, or your infrastructure.</li>
      <li>After <span class="placeholder">[X] days</span> from purchase.</li>
    </ul>

    <h2>4. How to request</h2>
    <p>Email <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=SoloLedge%20refund%20request"><?= e(SUPPORT_EMAIL) ?></a> from the address used to purchase, with your order reference and the reason. We aim to respond within <span class="placeholder">[X] business days</span>. Approved refunds are issued to the original payment method by <span class="placeholder">SuperProfile</span> and may take several days to appear.</p>

    <h2>5. Statutory rights</h2>
    <p>This policy does not limit any non-waivable rights you have under applicable consumer law. <span class="placeholder">[Confirm the correct statutory-rights wording for your jurisdiction with a professional.]</span></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
