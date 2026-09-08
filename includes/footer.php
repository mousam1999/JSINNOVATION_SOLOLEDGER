</main>
<footer class="site-footer">
  <div class="container site-footer__inner">
    <div class="site-footer__brand">
      <img src="/assets/brand/jsinnovation-logo.png" alt="<?= e(PARENT_BRAND) ?>"
           width="1036" height="155" loading="lazy" decoding="async">
      <p class="site-footer__tagline">Digital products built for practical problems.</p>
    </div>

    <nav class="site-footer__col" aria-label="Product">
      <h2>Product</h2>
      <ul>
        <li><a href="/#features">Features</a></li>
        <li><a href="/#screenshots">Screenshots</a></li>
        <li><a href="/#how-it-works">How it works</a></li>
        <li><a href="/#pricing">Pricing</a></li>
        <li><a href="/#faq">FAQ</a></li>
      </ul>
    </nav>

    <nav class="site-footer__col" aria-label="Legal">
      <h2>Legal</h2>
      <ul>
        <li><a href="/privacy.php">Privacy</a></li>
        <li><a href="/terms.php">Terms</a></li>
        <li><a href="/refund.php">Refund Policy</a></li>
        <li><a href="/license.php">License</a></li>
<?php if ((defined('GA4_MEASUREMENT_ID') && GA4_MEASUREMENT_ID !== '') || (defined('GTM_ID') && GTM_ID !== '') || (defined('META_PIXEL_ID') && META_PIXEL_ID !== '')): ?>
        <li><a href="/privacy.php#cookies" data-consent-reopen>Cookie preferences</a></li>
<?php endif; ?>
      </ul>
    </nav>

    <nav class="site-footer__col" aria-label="Support">
      <h2>Support</h2>
      <ul>
        <li><a href="/support.php">Support</a></li>
        <li><a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a></li>
      </ul>
    </nav>
  </div>

  <div class="container site-footer__legal">
    <p>&copy; <?= date('Y') ?> <?= e(LEGAL_ENTITY_NAME) ?> (trading as <?= e(PARENT_BRAND) ?>). SoloLedge <?= e(PRODUCT_VERSION) ?>. All rights reserved.</p>
    <p class="site-footer__disclaimer">
      SoloLedge is a financial tracking and planning tool. It is not accounting, tax,
      GST-filing or legal software, and it is not a substitute for advice from a
      qualified professional.
    </p>
  </div>
</footer>
<?php require __DIR__ . '/consent.php'; ?>
</body>
</html>
