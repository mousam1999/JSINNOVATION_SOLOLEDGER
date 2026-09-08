<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'Support — SoloLedge';
$PAGE_DESC  = 'SoloLedge includes 7 days of email setup support from the purchase date, covering installation, deployment and configuration.';
$PAGE_PATH  = '/support.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Support</p>
    <h1>SoloLedge support</h1>
    <p class="section__lead">This summary reflects the included <code>docs/SUPPORT_POLICY.md</code>. If the two ever differ, the document delivered with your package is authoritative.</p>

    <h2>What's included</h2>
    <p><strong>7 days of email support</strong>, starting from your date of purchase, covering:</p>
    <ul>
      <li>Getting the application installed and running from the source code.</li>
      <li>Deploying it to Vercel or an equivalent hosting provider.</li>
      <li>Connecting and configuring your Supabase project — database migration, authentication settings, environment variables.</li>
      <li>Diagnosing errors you hit while following the quick-start or deployment guide.</li>
    </ul>

    <h2>What's not included</h2>
    <ul>
      <li><strong>Custom development.</strong> New features, screens, reports or integrations for your business are out of scope. This can be discussed as a separate paid engagement.</li>
      <li><strong>Feature or roadmap requests.</strong> SoloLedge ships as documented in <code>docs/FEATURES.md</code>.</li>
      <li><strong>Ongoing maintenance.</strong> After the 7-day window, dependency updates and general upkeep are your responsibility.</li>
      <li><strong>Financial, tax, accounting or legal advice.</strong> SoloLedge is a record-keeping and planning tool. Confirm tax treatment with a qualified professional.</li>
      <li><strong>Third-party service problems.</strong> Supabase or host outages, billing, rate limits and policy changes are outside our control.</li>
      <li><strong>Data recovery.</strong> There is no backup system beyond what your Supabase plan provides.</li>
    </ul>

    <h2>How to request help</h2>
    <p>Email <a href="mailto:<?= e(SUPPORT_EMAIL) ?>?subject=SoloLedge%20setup%20support"><?= e(SUPPORT_EMAIL) ?></a> and include:</p>
    <ol>
      <li>What you were trying to do — the exact step from the guide.</li>
      <li>What happened instead — the exact error text (copy-pasted) or a screenshot.</li>
      <li>Where it happened — local development or your deployed URL.</li>
      <li>Relevant logs — your host's build log, or the browser console for a runtime error.</li>
      <li>What you've already tried, including whether you checked <code>docs/KNOWN_ISSUES.md</code>.</li>
    </ol>
    <p class="callout"><strong>Never send</strong> your Supabase database password, service-role key or any other secret credential. None of these are needed to diagnose a setup problem.</p>

    <h2>After the support window</h2>
    <p>You keep full ownership of your deployment and all your data — nothing stops working. You're welcome to reach out afterward, but responses aren't guaranteed and may be treated as a new paid engagement depending on scope.</p>

    <p><a class="btn btn--primary" href="<?= e(SUPERPROFILE_CHECKOUT_URL) ?>" data-cta="support_page" rel="noopener"><?= e(sl_cta_label()) ?></a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
