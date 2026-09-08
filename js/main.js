/* SoloLedge marketing site — behaviour + analytics.
 * Vanilla JS, no dependencies. Loaded with `defer`.
 * Modules: navigation, FAQ accordion, scroll reveal, sticky CTA, analytics.
 */
(function () {
  "use strict";

  var cfg = window.SL_CONFIG || {};

  /* ---------------------------------------------------------------- *
   *  Analytics — single tracking helper.
   *  Sends to GA4 (via dataLayer/gtag) and Meta Pixel when present.
   *  NEVER pass personal / payment / secret data through here.
   * ---------------------------------------------------------------- */
  function track(name, params) {
    params = params || {};
    try {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push(Object.assign({ event: name }, params));
      if (typeof window.gtag === "function") window.gtag("event", name, params);
    } catch (e) {}
    try {
      if (typeof window.fbq === "function") {
        var map = {
          click_checkout: "InitiateCheckout",
          view_pricing: "ViewContent",
          view_product: "ViewContent"
        };
        if (map[name]) window.fbq("track", map[name], { content_name: params.location || name });
      }
    } catch (e) {}
  }
  window.slTrack = track;

  document.addEventListener("DOMContentLoaded", function () {

    /* -------- Navigation (mobile menu) -------- */
    var toggle = document.querySelector("[data-nav-toggle]");
    var menu = document.querySelector("[data-nav-menu]");
    if (toggle && menu) {
      var closeMenu = function () {
        toggle.setAttribute("aria-expanded", "false");
        menu.removeAttribute("data-open");
      };
      toggle.addEventListener("click", function () {
        var open = toggle.getAttribute("aria-expanded") === "true";
        toggle.setAttribute("aria-expanded", String(!open));
        menu.toggleAttribute("data-open", !open);
      });
      menu.addEventListener("click", function (e) {
        if (e.target.closest("a")) closeMenu();
      });
      document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeMenu();
      });
      window.addEventListener("resize", function () {
        if (window.innerWidth > 860) closeMenu();
      });
    }

    /* -------- Header shadow on scroll -------- */
    var header = document.querySelector("[data-header]");
    if (header) {
      var onScroll = function () {
        header.toggleAttribute("data-scrolled", window.scrollY > 8);
      };
      onScroll();
      window.addEventListener("scroll", onScroll, { passive: true });
    }

    /* -------- FAQ accordion (accessible) -------- */
    var faqItems = document.querySelectorAll(".faq__item");
    Array.prototype.forEach.call(faqItems, function (item) {
      var btn = item.querySelector(".faq__q");
      var panel = item.querySelector(".faq__a");
      if (!btn || !panel) return;
      btn.addEventListener("click", function () {
        var open = btn.getAttribute("aria-expanded") === "true";
        btn.setAttribute("aria-expanded", String(!open));
        item.toggleAttribute("data-open", !open);
        panel.hidden = false;
        if (!open) track("open_faq", { question: btn.textContent.trim().slice(0, 80) });
      });
    });

    /* -------- Scroll reveal -------- */
    var reveal = document.querySelectorAll("[data-reveal]");
    if ("IntersectionObserver" in window && reveal.length) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) {
            en.target.classList.add("is-visible");
            io.unobserve(en.target);
          }
        });
      }, { rootMargin: "0px 0px -8% 0px" });
      Array.prototype.forEach.call(reveal, function (el) { io.observe(el); });
      // Safety net: if anything is still hidden shortly after load, show it.
      window.addEventListener("load", function () {
        setTimeout(function () {
          Array.prototype.forEach.call(reveal, function (el) { el.classList.add("is-visible"); });
        }, 1500);
      });
    } else {
      Array.prototype.forEach.call(reveal, function (el) { el.classList.add("is-visible"); });
    }

    /* -------- CTA / checkout click tracking -------- */
    document.addEventListener("click", function (e) {
      var link = e.target.closest("a[href], button[data-cta]");
      if (!link) return;
      var href = link.getAttribute("href") || "";
      var loc = link.getAttribute("data-cta") || "unknown";
      var isCheckout = cfg.checkoutUrl && href.indexOf(cfg.checkoutUrl.split("?")[0]) === 0;
      if (isCheckout || link.hasAttribute("data-checkout")) {
        track("click_checkout", { location: loc });
      } else if (link.hasAttribute("data-secondary-cta")) {
        track("click_secondary_cta", { location: loc });
      } else if (link.hasAttribute("data-cta")) {
        track("click_primary_cta", { location: loc });
      }
    });

    /* -------- Screenshot engagement -------- */
    var shots = document.querySelectorAll("[data-screenshot]");
    if ("IntersectionObserver" in window && shots.length) {
      var sio = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) {
            track("view_screenshot", { screen: en.target.getAttribute("data-screenshot") });
            sio.unobserve(en.target);
          }
        });
      }, { threshold: 0.6 });
      Array.prototype.forEach.call(shots, function (el) { sio.observe(el); });
    }

    /* -------- Pricing view + section milestones -------- */
    var pricing = document.getElementById("pricing");
    if (pricing && "IntersectionObserver" in window) {
      var pio = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { track("view_pricing", { location: "pricing" }); pio.disconnect(); }
        });
      }, { threshold: 0.4 });
      pio.observe(pricing);
    }

    /* -------- Scroll depth (50 / 90) -------- */
    var marks = { 50: false, 90: false };
    var depth = function () {
      var st = window.scrollY || document.documentElement.scrollTop;
      var h = document.documentElement.scrollHeight - window.innerHeight;
      var pct = h > 0 ? (st / h) * 100 : 0;
      [50, 90].forEach(function (m) {
        if (!marks[m] && pct >= m) { marks[m] = true; track("scroll_" + m, {}); }
      });
      if (marks[50] && marks[90]) window.removeEventListener("scroll", depth);
    };
    window.addEventListener("scroll", depth, { passive: true });

    /* -------- view_product once on the sales page -------- */
    if (document.body.classList.contains("page-home")) {
      track("view_product", { product: "SoloLedge V1.0.0" });
    }
  });
})();
