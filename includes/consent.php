<?php
/**
 * Cookie consent banner. Rendered only when an analytics/advertising tag is
 * configured (otherwise there is nothing to consent to). Hidden by default;
 * js/consent.js decides whether to show it.
 */
$sl_tracking = (defined('GA4_MEASUREMENT_ID') && GA4_MEASUREMENT_ID !== '')
    || (defined('GTM_ID') && GTM_ID !== '')
    || (defined('META_PIXEL_ID') && META_PIXEL_ID !== '');
if ($sl_tracking):
?>
<div class="consent" data-consent role="region" aria-label="Cookie consent" hidden>
  <div class="container consent__inner">
    <p class="consent__text">
      We use essential cookies to make this site work. With your consent we also use
      analytics and advertising cookies — Google Analytics and the Meta Pixel — to
      measure traffic and how our ads perform. See our
      <a href="/privacy.php#cookies">Privacy Policy</a> for details.
    </p>
    <div class="consent__actions">
      <button type="button" class="btn btn--ghost btn--sm" data-consent-decline>Decline non-essential</button>
      <button type="button" class="btn btn--primary btn--sm" data-consent-accept>Accept</button>
    </div>
  </div>
</div>
<?php endif; ?>
