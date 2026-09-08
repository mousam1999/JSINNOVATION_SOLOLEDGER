<?php
require_once __DIR__ . '/includes/config.php';
$PAGE_TITLE = 'License — SoloLedge';
$PAGE_DESC  = 'Summary of the SoloLedge commercial source-code license. The full LICENSE.md delivered with the package is authoritative.';
$PAGE_PATH  = '/license.php';
require __DIR__ . '/includes/header.php';
?>
<section class="section section--flush">
  <div class="container prose">
    <p class="section__eyebrow">Legal</p>
    <h1>License summary</h1>
    <p class="section__lead">SoloLedge <?= e(PRODUCT_VERSION) ?> is sold under a commercial source-code license. This is a plain-language summary. The complete <code>LICENSE.md</code> included in your package is the authoritative document; where this summary and that file differ, the file governs.</p>

    <h2>What you may do</h2>
    <ul>
      <li>Run <strong>one instance</strong> of the application for your own personal or business use.</li>
      <li>Modify the source code for your own use — features, branding and design.</li>
      <li>Deploy the modified or unmodified software on infrastructure you own or control (self-hosted, or a cloud provider you have an account with, such as Vercel and Supabase).</li>
      <li>Use it to serve your own clients as part of your own business — provided the software itself is not what you are selling or licensing to them.</li>
    </ul>

    <h2>What you may not do (without a separate written agreement)</h2>
    <ul>
      <li>Redistribute the source code, in whole or in part, modified or not, to any third party.</li>
      <li>Resell the source code as a product, template, boilerplate or starter kit.</li>
      <li>Repackage or resell the software as a SaaS, white-label or "buy this app" offering.</li>
      <li>Sublicense the rights granted to you, or use the code to build a directly competing product sold as source or as a packaged application.</li>
    </ul>

    <h2>Ownership</h2>
    <p>This purchase is a licence to use the source code. <strong>It is not a transfer of ownership.</strong> <?= e(LEGAL_ENTITY_NAME) ?> (trading as <?= e(PARENT_BRAND) ?>) retains all copyright and intellectual-property rights in the software, its design and its "SoloLedge" and "<?= e(PARENT_BRAND) ?>" branding. Your own business data always belongs to you.</p>

    <h2>Support, warranty and liability</h2>
    <p>Support is limited and time-bound — see <a href="/support.php">Support</a>. The software is provided "as is" with no warranty. It is a financial tracking and planning tool, not accounting, tax-filing or GST-filing software, and not a substitute for a qualified professional. Total liability is capped at the amount you paid.</p>

    <h2>Transfer and termination</h2>
    <p>The licence is tied to the purchaser and is not transferable except as part of a bona-fide sale of your whole business, with prior written consent. It terminates automatically if the prohibited-use terms are breached.</p>

    <h2>Third-party components</h2>
    <p>The software depends on third-party open-source packages and services (see <code>package.json</code> and <code>docs/TECH_STACK.md</code>). Each is governed by its own licence or terms, which you are responsible for reviewing and complying with.</p>

    <h2>Governing terms</h2>
    <p>The complete licence is included as <code>LICENSE.md</code> in your package and is the authoritative version — read it before you deploy or modify the software. Your purchase and use of the product are also subject to our <a href="/terms.php">Terms</a>, which are governed by the laws of India.</p>

    <p><a href="/terms.php">Terms</a> · <a href="/refund.php">Refund Policy</a> · <a href="/privacy.php">Privacy</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
