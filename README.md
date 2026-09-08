# SoloLedge — marketing & sales website

Static PHP marketing site for **SoloLedge V1.0.0** by **JSinnovation**.
No framework, no database, no build step. HTML5 + CSS3 + vanilla JS + a thin
layer of PHP for shared includes and configuration.

- Canonical domain: `https://sololedge.jsinnovation.in/`
- Target host: Hostinger Business (shared, Apache + PHP 8)
- Product sold: one-time source-code package, checkout via **SuperProfile**

---

## 1. Local testing

You need PHP 8.x on your machine (only for local preview — the site itself
uses PHP minimally).

```bash
cd CODE
php -S localhost:8000
```

Open <http://localhost:8000>. The built-in server does not process `.htaccess`,
so security headers, HTTPS redirect and the custom 404 only take effect on the
real Apache host.

## 2. File structure

```
CODE/
├── index.php            Main sales page (all 17 sections)
├── thank-you.php        Post-checkout page (noindex)
├── privacy.php          Legal — template with marked placeholders
├── terms.php            Legal — template with marked placeholders
├── refund.php           Legal — template with marked placeholders
├── license.php          Plain-language summary of the product LICENSE.md
├── support.php          Support policy (mirrors docs/SUPPORT_POLICY.md)
├── 404.php              Custom not-found page
│
├── includes/
│   ├── config.php       >>> SINGLE SOURCE OF TRUTH for IDs, URLs, prices <<<
│   ├── header.php        <head>, analytics bootstraps, site header/nav
│   └── footer.php        Footer + closing markup
│
├── css/main.css         Whole design system (tokens → sections → responsive)
├── js/main.js           Nav, FAQ accordion, scroll reveal, analytics events
│
├── assets/
│   ├── brand/            JSinnovation logo (trimmed, transparent PNG) + source
│   ├── screenshots/      Real SoloLedge screenshots, WebP, dark theme, @1600 + @800
│   ├── icons/            Favicons / touch icons generated from the logo
│   └── og/               Open Graph image (1200×630)
│
├── robots.txt
├── sitemap.xml
├── site.webmanifest
├── favicon.ico
├── .htaccess            Security headers, caching, HTTPS/non-www, 404
├── .env.example         Copy to .env and fill in
└── .github/workflows/
    └── deploy.yml       Optional: auto-deploy to Hostinger over FTP on push
```

> **The repository root is the site root.** Whatever you push (minus dotfiles,
> `*.md` and `.github/`, which `.htaccess` blocks from being served) is what runs
> at `sololedge.jsinnovation.in`. Do not nest the site inside another folder.

## 3. Replacing assets

| Asset | File(s) | Notes |
|---|---|---|
| JSinnovation logo | `assets/brand/jsinnovation-logo.png` | Wide transparent PNG (~1036×155). `-source.png` is the untrimmed original. Keep the aspect ratio; update `width`/`height` in `includes/header.php` + `includes/footer.php` if it changes. |
| Product screenshots | `assets/screenshots/*-dark.webp` (+ `-sm`) | Real SoloLedge screens only. Do not recolour or edit the UI. To regenerate from new PNGs, see the snippet in section 13. |
| OG image | `assets/og/og-default.jpg` | 1200×630. |
| Favicons | `assets/icons/icon-*.png`, `favicon.ico` | Generated from the logo. |

## 4. Configuration — `includes/config.php` / `.env`

Set values via Hostinger environment variables **or** by editing the fallback
defaults in `includes/config.php`. Every value that must change before launch is
marked `>>> REPLACE <<<` in that file.

| Variable | Required | What it is |
|---|---|---|
| `SITE_URL` | yes | Canonical origin, no trailing slash |
| `SUPERPROFILE_CHECKOUT_URL` | **yes** | The real SuperProfile checkout link every CTA points to |
| `SUPPORT_EMAIL` | yes | Monitored support inbox |
| `LEGAL_ENTITY_NAME` / `_ADDR` / `_JURISDICTION` / `_EFFECTIVE_DATE` | yes | Fill the legal pages |
| `GTM_ID` **or** `GA4_MEASUREMENT_ID` | optional | Google tag — set only one |
| `META_PIXEL_ID` | optional | Meta Pixel |
| `GSC_VERIFICATION` | optional | Google Search Console meta-tag token |

Leaving an analytics ID blank simply omits that script — nothing breaks.

## 5. Put the site on GitHub

Hostinger deploys straight from a Git repo, so the repository **root** must be
the site root (the `CODE/` folder's contents).

```bash
cd CODE
git init -b main
git add -A
git commit -m "SoloLedge marketing site"
git remote add origin https://github.com/mousam1999/JSINNOVATION_SOLOLEDGER.git
git push -u origin main
```

`.gitignore` already excludes `.env` and logs — only `.env.example` is committed.
Nothing secret lives in the repo (public GA4 / Pixel IDs are fine to commit, but
prefer setting them as Hostinger environment variables — section 4).

## 6. Deploy — pick ONE path

### Path A — Hostinger built-in Git (recommended, no secrets)

1. hPanel → your hosting plan → **Advanced → GIT**.
2. **Create a new repository**:
   - **Repository** — `https://github.com/mousam1999/JSINNOVATION_SOLOLEDGER.git`
     (public repo works as-is; for a private repo add Hostinger's shown SSH
     deploy key to GitHub → repo → **Settings → Deploy keys**, then use the
     `git@github.com:...` URL).
   - **Branch** — `main`.
   - **Directory** — leave blank to deploy into `public_html`, or set the
     subdomain's folder (e.g. `sololedge.jsinnovation.in`) if the site lives
     under a subdomain document root.
3. Click **Create**, then **Deploy** to pull the first time.
4. **Auto-deploy on push**: on the same page copy the **Webhook URL**, then in
   GitHub → repo → **Settings → Webhooks → Add webhook** → paste it, content
   type `application/json`, event = *Just the push event*. Every push to `main`
   now redeploys automatically.
5. This is a plain `git pull` — no build step, which is exactly what this
   static/PHP site needs.

### Path B — GitHub Actions over FTP (`.github/workflows/deploy.yml`)

Use this only if you are *not* using Path A.

1. hPanel → **Files → FTP Accounts** → note the FTP host and create a
   username + password.
2. GitHub → repo → **Settings → Secrets and variables → Actions** → add secrets
   `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD` (and optionally a **variable**
   `FTP_TARGET_DIR`, default `public_html/`).
3. Push to `main` (or run the workflow manually from the **Actions** tab). The
   workflow uploads the repo, skipping `.git*`, `.github/`, `*.md` and `.env`.

### After either path

- Set environment variables (section 4) in hPanel, **or** edit the fallback
  defaults in `includes/config.php` and commit that. Hostinger's Git pull will
  not overwrite a `.env` you place on the server by hand (it is git-ignored and
  the FTP workflow excludes it).
- Confirm `includes/`, `assets/`, `css/`, `js/` and the hidden `.htaccess`
  are present in the document root.

## 7. Domain / subdomain + SSL

1. hPanel → **Domains → Subdomains** → create `sololedge` under `jsinnovation.in`
   (if it does not already exist), pointing at the folder you deployed into.
2. hPanel → **Security → SSL** → issue/force SSL for the subdomain.
3. The `.htaccess` already forces HTTPS and strips `www`. Edit that block if you
   prefer `www`.

## 8. PHP configuration

- hPanel → **Advanced → PHP Configuration** → PHP **8.1+** (8.2/8.3 fine).
- No extensions beyond the default set are needed. No database.

## 9. Analytics setup

Single source of truth: `includes/config.php` → `includes/header.php` injects
the tags once, in the right order.

- **Google:** set `GTM_ID` (recommended — manage GA4 + Meta inside GTM) *or*
  `GA4_MEASUREMENT_ID` for a direct GA4 tag. Do not set both.
- **Meta Pixel:** set `META_PIXEL_ID`. `PageView` fires automatically.
- Custom events are sent by `js/main.js` via `window.slTrack(name, params)` to
  `dataLayer`/`gtag` and, where mapped, to `fbq`. Events:
  `view_product`, `view_pricing`, `click_primary_cta`, `click_secondary_cta`,
  `click_checkout`, `view_screenshot`, `open_faq`, `scroll_50`, `scroll_90`.
- **Meta `Purchase` is intentionally NOT fired.** Clicking checkout fires
  `InitiateCheckout` only. A real `Purchase` event requires a reliable signal
  from SuperProfile (a purchase webhook, or a verified redirect to
  `thank-you.php` with a checkable token). If/when SuperProfile provides that,
  wire it into `thank-you.php` — see the comment there.

## 10. Meta Pixel — see section 9.

## 11. Google Search Console

1. Add the property for `https://sololedge.jsinnovation.in/`.
2. Use the **HTML tag** method → copy the `content` value into
   `GSC_VERIFICATION` (config/env) → it renders in `<head>` on every page.
3. Submit `https://sololedge.jsinnovation.in/sitemap.xml`.

## 12. SuperProfile checkout configuration

- The site does **not** process payments, apply discounts, or deliver files.
- All "Get SoloLedge" buttons link to `SUPERPROFILE_CHECKOUT_URL`.
- Configure the launch price (₹2,399), any coupon, payment methods and the
  digital delivery of the SoloLedge package **inside SuperProfile**.
- Optional: set SuperProfile's post-purchase redirect to
  `https://sololedge.jsinnovation.in/thank-you.php`.
- Do not expose the product ZIP or any private download URL on this site.

## 13. Regenerating screenshots (optional)

From a folder of fresh PNG exports (`NN-name-dark.png`):

```bash
python - <<'PY'
from PIL import Image; import glob, os
for p in glob.glob("src-shots/*.png"):
    b = os.path.splitext(os.path.basename(p))[0]
    im = Image.open(p).convert("RGB"); w,h = im.size
    for sfx, mw in [("",1600),("-sm",800)]:
        s = min(1, mw/w)
        im.resize((int(w*s),int(h*s)), Image.LANCZOS).save(
            f"assets/screenshots/{b}{sfx}.webp","WEBP",quality=82,method=6)
PY
```

Then update the `$shots` array in `index.php` (filename, width, height, label,
alt text). **Never edit the UI inside a screenshot.**

## 14. Post-deployment testing

- [ ] Every page loads over HTTPS; `www` redirects to non-`www`
- [ ] `curl -I` shows the security headers from `.htaccess`
- [ ] All "Get SoloLedge" buttons open the correct SuperProfile checkout
- [ ] Mobile menu opens/closes; FAQ accordion works; no console errors
- [ ] `thank-you.php` returns `noindex`; `/sitemap.xml` and `/robots.txt` load
- [ ] GA4/GTM shows `page_view` + `click_checkout` in real-time (if configured)
- [ ] Meta Pixel Helper shows `PageView` + `InitiateCheckout` (if configured)
- [ ] Legal pages have every `placeholder`-highlighted value replaced
- [ ] Run the URL through PageSpeed Insights and the Rich Results test
