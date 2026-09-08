/* SoloLedge — cookie consent.
 * Loads GA4 / GTM / Meta Pixel ONLY after the visitor accepts (or has
 * previously accepted). No analytics or advertising request is made before
 * that. Essential site behaviour (js/main.js) is unaffected.
 * Choice is stored in localStorage under "sl_cookie_consent".
 */
(function () {
  "use strict";

  var KEY = "sl_cookie_consent"; // "granted" | "denied"
  var cfg = window.SL_CONSENT || {};
  var loaded = { ga: false, gtm: false, pixel: false };

  function readChoice() {
    try { return localStorage.getItem(KEY); } catch (e) { return null; }
  }
  function saveChoice(v) {
    try { localStorage.setItem(KEY, v); } catch (e) {}
  }

  /* ---- Tag loaders (idempotent) ---- */
  function loadGtag(id) {
    if (loaded.ga || !id) return;
    loaded.ga = true;
    var s = document.createElement("script");
    s.async = true;
    s.src = "https://www.googletagmanager.com/gtag/js?id=" + encodeURIComponent(id);
    document.head.appendChild(s);
    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function () { window.dataLayer.push(arguments); };
    window.gtag("js", new Date());
    window.gtag("config", id);
  }

  function loadGtm(id) {
    if (loaded.gtm || !id) return;
    loaded.gtm = true;
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
      var f = d.getElementsByTagName(s)[0], j = d.createElement(s);
      j.async = true;
      j.src = "https://www.googletagmanager.com/gtm.js?id=" + i;
      f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", id);
  }

  function loadPixel(id) {
    if (loaded.pixel || !id) return;
    loaded.pixel = true;
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
      };
      if (!f._fbq) f._fbq = n;
      n.push = n; n.loaded = !0; n.version = "2.0"; n.queue = [];
      t = b.createElement(e); t.async = !0; t.src = v;
      s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s);
    }(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
    window.fbq("init", id);
    window.fbq("track", "PageView");
  }

  function loadTrackers() {
    if (cfg.gtm) loadGtm(cfg.gtm);
    else if (cfg.ga4) loadGtag(cfg.ga4);
    if (cfg.pixel) loadPixel(cfg.pixel);
    // Re-send the primary content view for the current page, since main.js
    // may have "fired" it into a dormant dataLayer before consent.
    try {
      if (typeof window.slTrack === "function" &&
          document.body.classList.contains("page-home")) {
        window.slTrack("view_product", { product: "SoloLedge V1.0.0" });
      }
    } catch (e) {}
  }

  /* ---- Banner UI ---- */
  var banner = document.querySelector("[data-consent]");

  function showBanner(userInitiated) {
    if (!banner) return;
    banner.hidden = false;
    void banner.offsetWidth; // force reflow so the slide-in transition runs
    banner.classList.add("is-visible");
    if (userInitiated) {
      var btn = banner.querySelector("button");
      if (btn) btn.focus();
    }
  }
  function hideBanner() {
    if (!banner) return;
    banner.classList.remove("is-visible");
    window.setTimeout(function () { banner.hidden = true; }, 320);
  }

  function accept() { saveChoice("granted"); hideBanner(); loadTrackers(); }
  function decline() { saveChoice("denied"); hideBanner(); }

  if (banner) {
    banner.addEventListener("click", function (e) {
      var t = e.target.closest("[data-consent-accept], [data-consent-decline]");
      if (!t) return;
      if (t.hasAttribute("data-consent-accept")) accept();
      else decline();
    });
  }

  // "Cookie preferences" control (footer link) re-opens the banner.
  document.addEventListener("click", function (e) {
    var r = e.target.closest("[data-consent-reopen]");
    if (r) { e.preventDefault(); showBanner(true); }
  });

  /* ---- Decide on load ---- */
  var choice = readChoice();
  if (choice === "granted") {
    loadTrackers();
  } else if (choice !== "denied") {
    showBanner(false);
  }
})();
