/**
 * Minified by jsDelivr using Terser v5.9.0.
 * Original file: /npm/ladda@2.0.3/js/ladda.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
/*!
 * Ladda
 * http://lab.hakim.se/ladda
 * MIT licensed
 *
 * Copyright (C) 2018 Hakim El Hattab, http://hakim.se
 */
import { Spinner } from "spin.js"; var ALL_INSTANCES = []; export function create(t) { if (void 0 !== t) { if (t.classList.contains("ladda-button") || t.classList.add("ladda-button"), t.hasAttribute("data-style") || t.setAttribute("data-style", "expand-right"), !t.querySelector(".ladda-label")) { var e = document.createElement("span"); e.className = "ladda-label", wrapContent(t, e) } var n, a, r = t.querySelector(".ladda-spinner"); r || ((r = document.createElement("span")).className = "ladda-spinner"), t.appendChild(r); var i = { start: function () { return a || (a = createSpinner(t)), t.disabled = !0, t.setAttribute("data-loading", ""), clearTimeout(n), a.spin(r), this.setProgress(0), this }, startAfter: function (t) { return clearTimeout(n), n = setTimeout((function () { i.start() }), t), this }, stop: function () { return i.isLoading() && (t.disabled = !1, t.removeAttribute("data-loading")), clearTimeout(n), a && (n = setTimeout((function () { a.stop() }), 1e3)), this }, toggle: function () { return this.isLoading() ? this.stop() : this.start() }, setProgress: function (e) { e = Math.max(Math.min(e, 1), 0); var n = t.querySelector(".ladda-progress"); 0 === e && n && n.parentNode ? n.parentNode.removeChild(n) : (n || ((n = document.createElement("div")).className = "ladda-progress", t.appendChild(n)), n.style.width = (e || 0) * t.offsetWidth + "px") }, isLoading: function () { return t.hasAttribute("data-loading") }, remove: function () { clearTimeout(n), t.disabled = !1, t.removeAttribute("data-loading"), a && (a.stop(), a = null), ALL_INSTANCES.splice(ALL_INSTANCES.indexOf(i), 1) } }; return ALL_INSTANCES.push(i), i } console.warn("Ladda button target must be defined.") } export function bind(t, e) { var n; if ("string" == typeof t) n = document.querySelectorAll(t); else { if ("object" != typeof t) throw new Error("target must be string or object"); n = [t] } e = e || {}; for (var a = 0; a < n.length; a++)bindElement(n[a], e) } export function stopAll() { for (var t = 0, e = ALL_INSTANCES.length; t < e; t++)ALL_INSTANCES[t].stop() } function getAncestorOfTagType(t, e) { for (; t.parentNode && t.tagName !== e;)t = t.parentNode; return e === t.tagName ? t : void 0 } function createSpinner(t) { var e, n, a = t.offsetHeight; 0 === a && (a = parseFloat(window.getComputedStyle(t).height)), a > 32 && (a *= .8), t.hasAttribute("data-spinner-size") && (a = parseInt(t.getAttribute("data-spinner-size"), 10)), t.hasAttribute("data-spinner-color") && (e = t.getAttribute("data-spinner-color")), t.hasAttribute("data-spinner-lines") && (n = parseInt(t.getAttribute("data-spinner-lines"), 10)); var r = .2 * a; return new Spinner({ color: e || "#fff", lines: n || 12, radius: r, length: .6 * r, width: r < 7 ? 2 : 3, animation: "ladda-spinner-line-fade", zIndex: "auto", top: "auto", left: "auto", className: "" }) } function wrapContent(t, e) { var n = document.createRange(); n.selectNodeContents(t), n.surroundContents(e), t.appendChild(e) } function bindElement(t, e) { if ("function" == typeof t.addEventListener) { var n = create(t), a = -1; t.addEventListener("click", (function () { var r = !0, i = getAncestorOfTagType(t, "FORM"); void 0 === i || i.hasAttribute("novalidate") || "function" == typeof i.checkValidity && (r = i.checkValidity()), r && (n.startAfter(1), "number" == typeof e.timeout && (clearTimeout(a), a = setTimeout(n.stop, e.timeout)), "function" == typeof e.callback && e.callback.apply(null, [n])) }), !1) } }
//# sourceMappingURL=/sm/969d8c6b897d438d608cee2afa1c8c4e7533fd737a7d0a681dcf5d42911885cc.map
