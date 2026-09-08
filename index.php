<?php
require_once __DIR__ . '/includes/config.php';

$PAGE_TITLE = 'SoloLedge — Self-Hosted Finance OS for Freelancers';
$PAGE_DESC  = 'SoloLedge is a self-hosted finance OS for freelancers: invoices, payments, expenses, cash flow and safe-to-spend in one system. One-time purchase — get the source code and deploy it on your own cloud accounts. ' . sl_price_launch() . '.';
$PAGE_PATH  = '/';
$BODY_CLASS = 'page-home has-sticky-cta';
$CHECKOUT   = SUPERPROFILE_CHECKOUT_URL;

$faqs = [
  ['What is SoloLedge?', 'SoloLedge is a self-hosted finance workspace for freelancers and independent professionals. It brings billing, payments received, outstanding invoices, expenses, TDS/GST records and cash-flow planning into one place, including a "safe to spend" estimate based on the numbers you enter. It is a tracking and planning tool — not accounting, tax-filing or GST-filing software. SoloLedge V1.0.0 is the product name for the application; some in-app screens and files still use its original working title, "Freelancer Finance OS".'],
  ['Who is SoloLedge for?', 'Freelancers, consultants and solo professionals — especially those working in India who also invoice international clients. It is built for one person managing their own finances, not for teams or agencies with multiple staff logins.'],
  ['Is this a SaaS subscription?', 'No. There is no subscription and no recurring fee. You pay once and receive the SoloLedge V1.0.0 source-code package and documentation.'],
  ['Is this a one-time purchase?', 'Yes. One payment of ' . sl_price_launch() . ' during the launch offer (regular price ' . sl_price_regular() . '). You then deploy SoloLedge yourself.'],
  ['What do I receive after purchase?', 'The complete SoloLedge V1.0.0 source-code package as a ZIP, a single database migration file, the full handoff documentation set (setup, deployment, features, database schema, environment variables, known issues, support policy and license), the in-app demo-data loader, and 7 days of email setup support from the date of purchase.'],
  ['Where is SoloLedge hosted?', 'On infrastructure you control. SoloLedge is a web application built on Next.js and Supabase (PostgreSQL + authentication). The documentation walks through deploying it to Vercel with a Supabase project — both have free tiers. You can also use an equivalent host you have an account with.'],
  ['Do you provide hosting?', 'No. This purchase is the source code and setup support only. It does not include hosting, and it does not transfer any of JSinnovation\'s own accounts, servers, databases or credentials.'],
  ['Do I need my own accounts?', 'Yes. You create and pay for your own Supabase project and your own Vercel (or equivalent) account, plus a GitHub account if you want the smoothest deploy path. SoloLedge runs on those; your data lives in your Supabase database.'],
  ['Do I need technical knowledge?', 'You need to be comfortable following a step-by-step technical guide: creating accounts, running one SQL script in the Supabase dashboard, setting a few environment variables and clicking deploy. The deployment guide is written for that level. It is not no-code, and it is not one-click.'],
  ['Is setup documentation included?', 'Yes. A condensed quick-start and a full zero-assumption deployment walkthrough are both included, along with a troubleshooting section and a documented known-issues list.'],
  ['What does 7-day support include?', 'Email help with getting the application installed and running from the source, deploying it to Vercel or an equivalent host, connecting and configuring your Supabase project, and diagnosing errors you hit while following the deployment guide. It runs for 7 days from your purchase date.'],
  ['Do you provide custom development?', 'Not as part of this purchase. Building new features, screens, reports or integrations for your business is out of scope for the included support. It can be discussed as a separate paid engagement, but it is not promised or included here.'],
  ['Are future updates guaranteed?', 'No. SoloLedge V1.0.0 ships as documented. Ongoing updates, new features and dependency maintenance after the support window are not promised. Because you have the source, you or any Next.js developer can maintain it.'],
  ['Can I use SoloLedge for tax or accounting decisions?', 'Treat its numbers as record-keeping and planning estimates. The TDS and GST modules record figures you enter — SoloLedge never calculates or asserts a legal tax position. Always confirm actual tax treatment with a qualified professional before relying on it.'],
];

// ---- Structured data (only facts that are true) ----
$faqLd = array_map(fn($f) => [
  '@type' => 'Question',
  'name'  => $f[0],
  'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
], $faqs);

$jsonld = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'Organization',
      '@id'   => sl_url('#org'),
      'name'  => PARENT_BRAND,
      'url'   => SITE_URL,
      'logo'  => sl_url('assets/brand/jsinnovation-logo.png'),
      'slogan' => 'Digital products built for practical problems.',
    ],
    [
      '@type' => 'Product',
      'name'  => 'SoloLedge ' . PRODUCT_VERSION,
      'description' => 'Self-hosted finance OS for freelancers, delivered as a one-time-purchase source-code package.',
      'brand' => ['@type' => 'Brand', 'name' => PARENT_BRAND],
      'category' => 'Software > Finance',
      'url'   => SITE_URL,
      'image' => sl_url('assets/og/og-default.jpg'),
      'offers' => [
        '@type' => 'Offer',
        'price' => PRICE_LAUNCH_VALUE,
        'priceCurrency' => PRICE_CURRENCY_CODE,
        'availability' => 'https://schema.org/InStock',
        'url' => SITE_URL,
      ],
    ],
    ['@type' => 'FAQPage', 'mainEntity' => $faqLd],
  ],
];
$PAGE_JSONLD = "<script type=\"application/ld+json\">" . json_encode($jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

require __DIR__ . '/includes/header.php';
?>

<!-- ============ HERO ============ -->
<section class="hero section--flush">
  <div class="container hero__grid">
    <div class="hero__copy">
      <span class="badge badge--accent"><span class="badge__dot"></span> SoloLedge <?= e(PRODUCT_VERSION) ?> · Public launch offer</span>
      <h1>Your finances shouldn't live across five spreadsheets.</h1>
      <p class="hero__sub">SoloLedge brings freelancer financial management — invoices, payments, expenses, cash flow and what you can safely spend — into one system you deploy and run on your own cloud accounts.</p>
      <div class="hero__actions">
        <a class="btn btn--primary btn--lg" href="<?= e($CHECKOUT) ?>" data-cta="hero_primary" rel="noopener"><?= e(sl_cta_label()) ?></a>
        <a class="btn btn--ghost btn--lg" href="#how-it-works" data-cta="hero_secondary" data-secondary-cta>See How It Works</a>
      </div>
      <p class="hero__meta">One-time purchase · regular <span style="text-decoration:line-through"><?= e(sl_price_regular()) ?></span> · <?= e(PRICE_DISCOUNT_LABEL) ?> · 7-day email setup support</p>
    </div>
    <figure class="hero__figure" data-screenshot="hero-dashboard">
      <div class="frame">
        <img src="/assets/screenshots/02-dashboard-dark.webp" width="1600" height="1897"
             alt="SoloLedge dashboard showing safe-to-spend, money received, business expenses, outstanding invoices, revenue and expense trend charts, and a cash-flow chart"
             fetchpriority="high" decoding="async">
      </div>
      <figcaption>The SoloLedge dashboard — actual product screenshot.</figcaption>
    </figure>
  </div>
</section>

<!-- ============ TRUST / VALUE STRIP ============ -->
<section class="section" aria-label="What this is">
  <div class="container">
    <div class="trust" data-reveal>
      <span class="trust__item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg> One-time purchase, no subscription</span>
      <span class="trust__item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Self-deployed on your own cloud accounts</span>
      <span class="trust__item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 18 22 12 16 6"/><path d="M8 6 2 12 8 18"/></svg> Full source code &amp; documentation</span>
      <span class="trust__item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2 11 13"/><path d="M22 2 15 22 11 13 2 9z"/></svg> 7-day email setup support</span>
    </div>
  </div>
</section>

<!-- ============ PROBLEM ============ -->
<section class="section">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">The problem</p>
      <h2>Freelance money is scattered by default</h2>
      <p class="section__lead">Invoices in one document. Payments half-remembered in a banking app. Expenses in a folder of receipts. TDS worked out at year-end from scratch. No clear answer to the only question that matters day to day.</p>
    </div>
    <div class="grid feature-grid">
      <div class="card" data-reveal><h3>"What have I actually been paid?"</h3><p>Billed is not received. Without one ledger, the gap between the two stays invisible until it's a cash-flow problem.</p></div>
      <div class="card" data-reveal><h3>"What do clients still owe me?"</h3><p>Outstanding invoices and how overdue they are get tracked in your head — or not at all.</p></div>
      <div class="card" data-reveal><h3>"What can I safely spend right now?"</h3><p>Cash in the account isn't spendable cash. Some of it is tax you'll owe, some is already committed.</p></div>
    </div>
  </div>
</section>

<!-- ============ SOLUTION ============ -->
<section class="section">
  <div class="container split" data-reveal>
    <div class="split__copy">
      <p class="section__eyebrow">The solution</p>
      <h2>One system, running on your own cloud accounts</h2>
      <p class="section__lead">SoloLedge is a single web app for your freelance finances. You deploy it to your own Supabase project and your own host, sign in, and every client, invoice, payment and expense lives in one place — with the dashboard doing the arithmetic you'd otherwise redo by hand.</p>
      <ul class="checklist">
        <li>Money received vs. money still owed, always current</li>
        <li>A safe-to-spend figure with every term shown</li>
        <li>Multi-currency invoicing with FX rate and fees preserved</li>
        <li>Your data in a Supabase project only you control</li>
      </ul>
    </div>
    <div class="split__media" data-screenshot="solution-cashflow">
      <figure class="frame">
        <img src="/assets/screenshots/09-cash-flow-dark.webp" width="1600" height="1265" loading="lazy" decoding="async"
             alt="SoloLedge cash-flow screen with a six-month money-in / money-out chart and 30/60/90-day receivables aging">
      </figure>
    </div>
  </div>
</section>

<!-- ============ WHO IT'S FOR ============ -->
<section class="section">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">Who it's for</p>
      <h2>Built for one person running their own practice</h2>
    </div>
    <div class="grid audience-grid">
      <div class="card" data-reveal><h3>Indian freelancers</h3><p>Designers, developers, writers and consultants who invoice in ₹ and need TDS and GST figures recorded as they go.</p></div>
      <div class="card" data-reveal><h3>Cross-border independents</h3><p>Anyone billing US, EU, UK or UAE clients who needs the original currency, FX rate and fees kept on every payment.</p></div>
      <div class="card" data-reveal><h3>Spreadsheet outgrowers</h3><p>You've built the spreadsheet three times. You want a real ledger without moving your data into someone else's cloud.</p></div>
      <div class="card" data-reveal><h3>Self-hosting professionals</h3><p>You'd rather own the deployment and the database than rent another SaaS seat.</p></div>
    </div>
    <p class="callout" data-reveal style="margin-top:1.5rem">Not built for agencies, multi-user teams, or as a replacement for your accountant. SoloLedge is a single-user tracking and planning tool.</p>
  </div>
</section>

<!-- ============ FEATURES ============ -->
<section class="section" id="features">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">Features</p>
      <h2>What's in SoloLedge V1.0.0</h2>
      <p class="section__lead">Every item below is implemented in the product you receive. Feature status is documented file-by-file in the included <code>docs/FEATURES.md</code>.</p>
    </div>
    <div class="grid feature-grid">
      <?php
      $features = [
        ['Dashboard &amp; safe-to-spend', 'Headline numbers — money received, business expenses, net cash, clients owe you, TDS and GST recorded — plus a safe-to-spend estimate with an expandable breakdown of every term.'],
        ['Clients', 'Add, edit and archive clients. Per-client detail view: revenue, outstanding balance, projects, invoices, payments and effective hourly rate.'],
        ['Projects', 'Link projects to clients, set a quoted amount and an hour budget, and track actual hours against it.'],
        ['Invoices', 'Create, edit and cancel invoices. Status (draft, sent, partially paid, paid, overdue, cancelled) is derived from payments and the due date — never stored as stale truth.'],
        ['Payments', 'Multiple payments per invoice, seven payment methods, and full foreign-currency capture: currency, FX rate, gross, TDS, GST component, fees and net received.'],
        ['Expenses', 'Categorised expenses with a business-use percentage and a deductible-amount estimate, clearly labelled as an estimate and not a tax determination.'],
        ['TDS records', 'Record TDS deducted by clients per financial year with certificate references and a matched flag. Record-keeping only — no rates asserted by the app.'],
        ['GST records', 'Per-record client country, supply type, GST treatment, taxable value and CGST/SGST/IGST split, with the required "confirm with a professional" disclaimer shown in-app.'],
        ['Cash flow', 'Opening and closing cash, a six-month money-in / money-out view, 30/60/90-day receivables aging and a configurable reserves list.'],
        ['Reports &amp; CSV export', 'Revenue and expenses by month, revenue &amp; effective rate by client, expenses by category, TDS and GST summaries, and CSV export for every major table.'],
        ['Onboarding wizard', 'A skippable first-run wizard for business name, base currency, GST registration, financial-year start and reserve assumptions — all editable later.'],
        ['Light &amp; dark, mobile-ready', 'A responsive light/dark interface: full sidebar on desktop, bottom navigation on mobile, tabular-figure alignment for money.'],
      ];
      foreach ($features as $f): ?>
        <div class="card" data-reveal>
          <div class="card__icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
          </div>
          <h3><?= $f[0] ?></h3>
          <p><?= $f[1] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <p class="callout" data-reveal style="margin-top:1.75rem">SoloLedge deliberately does <strong>not</strong> include AI features, bank-account sync, automated tax filing, a payment gateway, team accounts or a native mobile app. It records what you enter and does the arithmetic on it.</p>
  </div>
</section>

<!-- ============ SCREENSHOTS ============ -->
<section class="section" id="screenshots">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">Screenshots</p>
      <h2>The actual product</h2>
      <p class="section__lead">These are real screenshots of SoloLedge V1.0.0 running with demo data — not mock-ups. The product interface is its own; only this marketing site uses the JSinnovation black-and-orange styling.</p>
    </div>
    <div class="grid screens-grid">
      <?php
      $shots = [
        ['02-dashboard-dark', 1600, 1897, 'Dashboard', 'Dashboard: safe-to-spend, money received, outstanding invoices, revenue and expense trends, and a six-month cash-flow chart.'],
        ['05-invoices-dark', 1600, 1000, 'Invoices', 'Invoices list with derived status, client, amount and due date, plus search and status filtering.'],
        ['03-income-dark', 1600, 1000, 'Payments', 'Payments across all invoices — date, client, invoice, method, gross and net received, including a foreign-currency payment.'],
        ['04-expenses-dark', 1600, 1000, 'Expenses', 'Expenses with category, business-use percentage and a labelled deductible-amount estimate.'],
        ['06-clients-dark', 1600, 1000, 'Clients', 'Clients list with status, revenue and outstanding balance per client.'],
        ['07-reports-dark', 1600, 1733, 'Reports', 'Reports: revenue and expenses by month, revenue and effective rate by client, and CSV export tabs.'],
        ['09-cash-flow-dark', 1600, 1265, 'Cash flow', 'Cash flow: six-month money-in / money-out chart, receivables aging and a reserves list.'],
        ['08-settings-dark', 1600, 1875, 'Settings', 'Settings: profile, base currency, financial year, GST registration, theme, demo data and CSV export.'],
      ];
      foreach ($shots as $s): ?>
        <figure class="frame" data-reveal data-screenshot="<?= e($s[3]) ?>">
          <img src="/assets/screenshots/<?= e($s[0]) ?>.webp"
               srcset="/assets/screenshots/<?= e($s[0]) ?>-sm.webp 800w, /assets/screenshots/<?= e($s[0]) ?>.webp 1600w"
               sizes="(min-width: 900px) 33vw, (min-width: 600px) 50vw, 100vw"
               width="<?= $s[1] ?>" height="<?= $s[2] ?>" loading="lazy" decoding="async"
               alt="<?= e($s[4]) ?>">
          <figcaption><?= e($s[3]) ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
    <div class="split" data-reveal style="margin-top:2.5rem">
      <div class="split__copy">
        <h3>Works on your phone</h3>
        <p class="section__lead">On mobile, SoloLedge switches to a stacked layout with bottom navigation, so you can check what you're owed and what you can spend from anywhere.</p>
      </div>
      <div class="split__media">
        <figure class="frame frame--phone" data-screenshot="Mobile dashboard">
          <div class="frame__view">
            <img src="/assets/screenshots/09-mobile-dashboard-dark.webp" width="780" height="1470" loading="lazy" decoding="async"
                 alt="SoloLedge mobile dashboard: stacked cards for safe-to-spend, money received and outstanding invoices with bottom navigation">
          </div>
        </figure>
      </div>
    </div>
  </div>
</section>

<!-- ============ WHAT YOU GET / PROVIDE ============ -->
<section class="section">
  <div class="container split">
    <div class="card" data-reveal>
      <p class="section__eyebrow">You receive</p>
      <h2 style="font-size:1.5rem">What's in the purchase</h2>
      <ul class="checklist">
        <li>SoloLedge <?= e(PRODUCT_VERSION) ?> — complete source-code package (ZIP)</li>
        <li>One database migration file to create the schema</li>
        <li>Setup &amp; deployment documentation (quick-start + full walkthrough)</li>
        <li>Feature inventory, database schema, environment and known-issues docs</li>
        <li>In-app demo-data loader to preview a populated system</li>
        <li>Commercial license terms and support policy</li>
        <li>7 days of email setup support from the purchase date</li>
      </ul>
      <p class="text-muted" style="font-size:.85rem;margin:0">Exact package contents are listed in the included <code>RELEASE_MANIFEST.md</code>.</p>
    </div>
    <div class="card" data-reveal>
      <p class="section__eyebrow">You provide</p>
      <h2 style="font-size:1.5rem">What you bring</h2>
      <ul class="checklist checklist--muted">
        <li>Your own Supabase project (free tier is enough to start)</li>
        <li>Your own Vercel account, or an equivalent host you control</li>
        <li>A GitHub account for the smoothest deploy path (optional)</li>
        <li>Your deployment environment and environment variables</li>
        <li>Your own production data</li>
        <li>Any domain you want to point at your deployment</li>
      </ul>
      <p class="text-muted" style="font-size:.85rem;margin:0">JSinnovation does not transfer or provide its own accounts, servers, databases or credentials. Third-party services are billed to you by those providers.</p>
    </div>
  </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="section" id="how-it-works">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">How it works</p>
      <h2>From purchase to using it</h2>
    </div>
    <div class="split">
      <div class="steps" data-reveal>
        <div class="step"><span class="step__num"></span><div><h3>Purchase</h3><p>Check out through SuperProfile. You get the SoloLedge package and documentation through the purchase platform.</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Download</h3><p>Download the source ZIP and the docs. Nothing is installed on your machine yet — it's a code package.</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Deploy</h3><p>Create your Supabase project, run the one migration, set your environment variables and deploy to Vercel (or your host). The guide covers every step.</p></div></div>
        <div class="step"><span class="step__num"></span><div><h3>Start using</h3><p>Sign up on your own deployment, complete or skip onboarding, and add your first client — or load demo data to see it populated.</p></div></div>
      </div>
      <div class="split__media" data-reveal>
        <div class="card">
          <h3 style="font-size:1.05rem">What deployment actually involves</h3>
          <ol style="color:var(--text-2);font-size:.95rem;line-height:1.9;margin:0;padding-left:1.2rem">
            <li>Create a free Supabase project</li>
            <li>Paste one SQL file into the Supabase SQL editor and run it</li>
            <li>Copy two keys into your environment variables</li>
            <li>Import the repo into Vercel and deploy</li>
            <li>Add your site URL to Supabase auth settings</li>
            <li>Sign up and go</li>
          </ol>
          <p class="text-muted" style="font-size:.85rem;margin:1rem 0 0">Requires following a technical guide. It is not no-code and not one-click. Time depends on your familiarity with these tools.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ PRICING ============ -->
<section class="section" id="pricing">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">Pricing</p>
      <h2>One payment. Yours to run.</h2>
    </div>
    <div class="pricing" data-reveal>
      <div class="price-card">
        <span class="badge badge--accent"><span class="badge__dot"></span> Public launch offer — <?= e(PRICE_DISCOUNT_LABEL) ?></span>
        <div class="price-card__row" style="margin-top:1rem">
          <span class="price-card__now"><?= e(sl_price_launch()) ?></span>
          <span class="price-card__was"><?= e(sl_price_regular()) ?></span>
        </div>
        <p class="price-card__note">One-time purchase of SoloLedge <?= e(PRODUCT_VERSION) ?>. No subscription, no per-user fee.</p>
        <hr>
        <ul class="checklist" style="margin-bottom:1.5rem">
          <li>Complete source-code package</li>
          <li>Full setup &amp; deployment documentation</li>
          <li>Demo-data loader</li>
          <li>7-day email setup support</li>
        </ul>
        <a class="btn btn--primary btn--block btn--lg" href="<?= e($CHECKOUT) ?>" data-cta="pricing" rel="noopener"><?= e(sl_cta_label()) ?></a>
        <p class="text-muted text-center" style="font-size:.85rem;margin:.9rem 0 0">Checkout, payment and delivery are handled by SuperProfile. Prices in Indian rupees.</p>
      </div>
    </div>
    <p class="callout" data-reveal style="margin-top:1.5rem;max-width:520px">The final price and any coupon are applied at the SuperProfile checkout. This page never processes payments.</p>
  </div>
</section>

<!-- ============ 7-DAY SUPPORT ============ -->
<section class="section">
  <div class="container split">
    <div class="split__copy" data-reveal>
      <p class="section__eyebrow">Support</p>
      <h2>7-day setup support, by email</h2>
      <p class="section__lead">For the first 7 days after purchase, email us if you get stuck deploying. We help you get SoloLedge running.</p>
    </div>
    <div class="split__media" data-reveal>
      <div class="grid" style="gap:1rem">
        <div class="card">
          <h3 style="font-size:1rem">Covered</h3>
          <ul class="checklist" style="font-size:.94rem">
            <li>Installing and running the app from source</li>
            <li>Deploying to Vercel or an equivalent host</li>
            <li>Connecting and configuring your Supabase project</li>
            <li>Diagnosing errors from the deployment guide</li>
          </ul>
        </div>
        <div class="card">
          <h3 style="font-size:1rem">Not covered</h3>
          <ul class="checklist checklist--muted" style="font-size:.94rem">
            <li>Custom development or new features</li>
            <li>Ongoing maintenance after the 7 days</li>
            <li>Hosting or infrastructure management</li>
            <li>Tax, accounting, financial or legal advice</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top:1.5rem">
    <p class="callout" data-reveal>Full terms are in <a href="/support.php">Support</a> and the included <code>docs/SUPPORT_POLICY.md</code>.</p>
  </div>
</section>

<!-- ============ INDIA / TAX NOTE ============ -->
<section class="section">
  <div class="container">
    <div class="callout" data-reveal style="max-width:820px">
      <strong>About the India tax features.</strong> SoloLedge lets you record GST and TDS-related information for your own tracking and planning. It does not file returns, does not calculate or assert legal tax rates, and is not a substitute for a qualified accountant or tax advisor. Always confirm tax treatment with a professional.
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="section" id="faq">
  <div class="container">
    <div class="section__head" data-reveal>
      <p class="section__eyebrow">FAQ</p>
      <h2>Questions, answered</h2>
    </div>
    <div class="faq" data-reveal>
      <?php foreach ($faqs as $i => $f): ?>
        <div class="faq__item">
          <h3 style="margin:0;font-size:1rem">
            <button class="faq__q" aria-expanded="false" aria-controls="faq-a-<?= $i ?>" id="faq-q-<?= $i ?>">
              <span><?= $f[0] ?></span>
              <span class="faq__icon" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a-<?= $i ?>" role="region" aria-labelledby="faq-q-<?= $i ?>" hidden>
            <div><?= $f[1] ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="section cta-final">
  <div class="container" data-reveal>
    <h2>Ready to take control of your freelance finances?</h2>
    <p class="section__lead" style="margin-inline:auto">Get SoloLedge <?= e(PRODUCT_VERSION) ?> and deploy it on your own cloud accounts.</p>
    <div class="hero__actions">
      <a class="btn btn--primary btn--lg" href="<?= e($CHECKOUT) ?>" data-cta="final" rel="noopener"><?= e(sl_cta_label()) ?></a>
      <a class="btn btn--ghost btn--lg" href="#features" data-cta="final_secondary" data-secondary-cta>Review the features</a>
    </div>
  </div>
</section>

<div class="sticky-cta" data-sticky-cta>
  <div class="sticky-cta__inner">
    <p class="sticky-cta__text"><strong>SoloLedge <?= e(PRODUCT_VERSION) ?></strong> — one-time <?= e(sl_price_launch()) ?> <span style="text-decoration:line-through"><?= e(sl_price_regular()) ?></span> · 7-day setup support</p>
    <a class="btn btn--primary btn--block" href="<?= e($CHECKOUT) ?>" data-cta="sticky" rel="noopener"><?= e(sl_cta_label()) ?></a>
  </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
