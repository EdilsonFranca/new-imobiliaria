function verificaSeOCampoTemValor(t, e) {
    var n = [],
        r = document.getElementsByName("minValue1")[0].value,
        i = document.getElementsByName("maxValue1")[0].value;
    return "" == r ? n.push(t) : (t = r, n.push(t)), "" == i ? n.push(e) : (e = i, n.push(e)), n
}

function formatMoney(t, e, n, r) {
    return e = isNaN(e = Math.abs(e)) ? 2 : e, n = void 0 == n ? "," : n, r = void 0 == r ? "." : r, s = 0 > t ? "-" : "", i = parseInt(t = Math.abs(+t || 0).toFixed(e)) + "", j = (j = i.length) > 3 ? j % 3 : 0, s + (j ? i.substr(0, j) + r : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + r) + (e ? n + Math.abs(t - i).toFixed(e).slice(2) : "")
}
$(document).ready(function() {
        $(".noUi-handle").on("click", function() {
            $(this).width(50)
        });
        var t = document.getElementsByClassName("slider-range")[0],
            e = verificaSeOCampoTemValor(12e4, 4e5);
        noUiSlider.create(t, {
            start: [e[0], e[1]],
            step: 5e3,
            range: {
                min: [8e4],
                max: [999999]
            },
            connect: !0
        }), t.noUiSlider.on("update", function(t) {
            document.getElementsByClassName("slider-range-value1")[0].innerHTML = formatMoney(t[0]), document.getElementsByClassName("slider-range-value2")[0].innerHTML = formatMoney(t[1]), document.getElementsByName("minValue1")[0].value = t[0], document.getElementsByName("maxValue1")[0].value = t[1]
        })
    }),
    function(t) {
        "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? module.exports = t() : window.noUiSlider = t()
    }(function() {
        "use strict";

        function t(t) {
            return t.filter(function(t) {
                return this[t] ? !1 : this[t] = !0
            }, {})
        }

        function e(t, e) {
            return Math.round(t / e) * e
        }

        function n(t) {
            var e = t.getBoundingClientRect(),
                n = t.ownerDocument,
                r = n.documentElement,
                i = d();
            return /webkit.*Chrome.*Mobile/i.test(navigator.userAgent) && (i.x = 0), {
                top: e.top + i.y - r.clientTop,
                left: e.left + i.x - r.clientLeft
            }
        }

        function r(t) {
            return "number" == typeof t && !isNaN(t) && isFinite(t)
        }

        function i(t) {
            var e = Math.pow(10, 7);
            return Number((Math.round(t * e) / e).toFixed(7))
        }

        function o(t, e, n) {
            c(t, e), setTimeout(function() {
                l(t, e)
            }, n)
        }

        function a(t) {
            return Math.max(Math.min(t, 100), 0)
        }

        function s(t) {
            return Array.isArray(t) ? t : [t]
        }

        function u(t) {
            var e = t.split(".");
            return e.length > 1 ? e[1].length : 0
        }

        function c(t, e) {
            t.classList ? t.classList.add(e) : t.className += " " + e
        }

        function l(t, e) {
            t.classList ? t.classList.remove(e) : t.className = t.className.replace(new RegExp("(^|\\b)" + e.split(" ").join("|") + "(\\b|$)", "gi"), " ")
        }

        function f(t, e) {
            return t.classList ? t.classList.contains(e) : new RegExp("\\b" + e + "\\b").test(t.className)
        }

        function d() {
            var t = void 0 !== window.pageXOffset,
                e = "CSS1Compat" === (document.compatMode || ""),
                n = t ? window.pageXOffset : e ? document.documentElement.scrollLeft : document.body.scrollLeft,
                r = t ? window.pageYOffset : e ? document.documentElement.scrollTop : document.body.scrollTop;
            return {
                x: n,
                y: r
            }
        }

        function p(t) {
            t.stopPropagation()
        }

        function h(t) {
            return function(e) {
                return t + e
            }
        }

        function m(t, e) {
            return 100 / (e - t)
        }

        function g(t, e) {
            return 100 * e / (t[1] - t[0])
        }

        function v(t, e) {
            return g(t, t[0] < 0 ? e + Math.abs(t[0]) : e - t[0])
        }

        function b(t, e) {
            return e * (t[1] - t[0]) / 100 + t[0]
        }

        function w(t, e) {
            for (var n = 1; t >= e[n];) n += 1;
            return n
        }

        function y(t, e, n) {
            if (n >= t.slice(-1)[0]) return 100;
            var r, i, o, a, s = w(n, t);
            return r = t[s - 1], i = t[s], o = e[s - 1], a = e[s], o + v([r, i], n) / m(o, a)
        }

        function x(t, e, n) {
            if (n >= 100) return t.slice(-1)[0];
            var r, i, o, a, s = w(n, e);
            return r = t[s - 1], i = t[s], o = e[s - 1], a = e[s], b([r, i], (n - o) * m(o, a))
        }

        function S(t, n, r, i) {
            if (100 === i) return i;
            var o, a, s = w(i, t);
            return r ? (o = t[s - 1], a = t[s], i - o > (a - o) / 2 ? a : o) : n[s - 1] ? t[s - 1] + e(i - t[s - 1], n[s - 1]) : i
        }

        function E(t, e, n) {
            var i;
            if ("number" == typeof e && (e = [e]), "[object Array]" !== Object.prototype.toString.call(e)) throw new Error("noUiSlider: 'range' contains invalid value.");
            if (i = "min" === t ? 0 : "max" === t ? 100 : parseFloat(t), !r(i) || !r(e[0])) throw new Error("noUiSlider: 'range' value isn't numeric.");
            n.xPct.push(i), n.xVal.push(e[0]), i ? n.xSteps.push(isNaN(e[1]) ? !1 : e[1]) : isNaN(e[1]) || (n.xSteps[0] = e[1])
        }

        function N(t, e, n) {
            return e ? void(n.xSteps[t] = g([n.xVal[t], n.xVal[t + 1]], e) / m(n.xPct[t], n.xPct[t + 1])) : !0
        }

        function M(t, e, n, r) {
            this.xPct = [], this.xVal = [], this.xSteps = [r || !1], this.xNumSteps = [!1], this.snap = e, this.direction = n;
            var i, o = [];
            for (i in t) t.hasOwnProperty(i) && o.push([t[i], i]);
            for (o.length && "object" == typeof o[0][0] ? o.sort(function(t, e) {
                    return t[0][0] - e[0][0]
                }) : o.sort(function(t, e) {
                    return t[0] - e[0]
                }), i = 0; i < o.length; i++) E(o[i][1], o[i][0], this);
            for (this.xNumSteps = this.xSteps.slice(0), i = 0; i < this.xNumSteps.length; i++) N(i, this.xNumSteps[i], this)
        }

        function U(t, e) {
            if (!r(e)) throw new Error("noUiSlider: 'step' is not numeric.");
            t.singleStep = e
        }

        function P(t, e) {
            if ("object" != typeof e || Array.isArray(e)) throw new Error("noUiSlider: 'range' is not an object.");
            if (void 0 === e.min || void 0 === e.max) throw new Error("noUiSlider: Missing 'min' or 'max' in 'range'.");
            if (e.min === e.max) throw new Error("noUiSlider: 'range' 'min' and 'max' cannot be equal.");
            t.spectrum = new M(e, t.snap, t.dir, t.singleStep)
        }

        function O(t, e) {
            if (e = s(e), !Array.isArray(e) || !e.length || e.length > 2) throw new Error("noUiSlider: 'start' option is incorrect.");
            t.handles = e.length, t.start = e
        }

        function j(t, e) {
            if (t.snap = e, "boolean" != typeof e) throw new Error("noUiSlider: 'snap' option must be a boolean.")
        }

        function L(t, e) {
            if (t.animate = e, "boolean" != typeof e) throw new Error("noUiSlider: 'animate' option must be a boolean.")
        }

        function V(t, e) {
            if ("lower" === e && 1 === t.handles) t.connect = 1;
            else if ("upper" === e && 1 === t.handles) t.connect = 2;
            else if (e === !0 && 2 === t.handles) t.connect = 3;
            else {
                if (e !== !1) throw new Error("noUiSlider: 'connect' option doesn't match handle count.");
                t.connect = 0
            }
        }

        function k(t, e) {
            switch (e) {
                case "horizontal":
                    t.ort = 0;
                    break;
                case "vertical":
                    t.ort = 1;
                    break;
                default:
                    throw new Error("noUiSlider: 'orientation' option is invalid.")
            }
        }

        function F(t, e) {
            if (!r(e)) throw new Error("noUiSlider: 'margin' option must be numeric.");
            if (0 !== e && (t.margin = t.spectrum.getMargin(e), !t.margin)) throw new Error("noUiSlider: 'margin' option is only supported on linear sliders.")
        }

        function A(t, e) {
            if (!r(e)) throw new Error("noUiSlider: 'limit' option must be numeric.");
            if (t.limit = t.spectrum.getMargin(e), !t.limit) throw new Error("noUiSlider: 'limit' option is only supported on linear sliders.")
        }

        function C(t, e) {
            switch (e) {
                case "ltr":
                    t.dir = 0;
                    break;
                case "rtl":
                    t.dir = 1, t.connect = [0, 2, 1, 3][t.connect];
                    break;
                default:
                    throw new Error("noUiSlider: 'direction' option was not recognized.")
            }
        }

        function T(t, e) {
            if ("string" != typeof e) throw new Error("noUiSlider: 'behaviour' must be a string containing options.");
            var n = e.indexOf("tap") >= 0,
                r = e.indexOf("drag") >= 0,
                i = e.indexOf("fixed") >= 0,
                o = e.indexOf("snap") >= 0,
                a = e.indexOf("hover") >= 0;
            if (r && !t.connect) throw new Error("noUiSlider: 'drag' behaviour must be used with 'connect': true.");
            t.events = {
                tap: n || o,
                drag: r,
                fixed: i,
                snap: o,
                hover: a
            }
        }

        function B(t, e) {
            var n;
            if (e !== !1)
                if (e === !0)
                    for (t.tooltips = [], n = 0; n < t.handles; n++) t.tooltips.push(!0);
                else {
                    if (t.tooltips = s(e), t.tooltips.length !== t.handles) throw new Error("noUiSlider: must pass a formatter for all handles.");
                    t.tooltips.forEach(function(t) {
                        if ("boolean" != typeof t && ("object" != typeof t || "function" != typeof t.to)) throw new Error("noUiSlider: 'tooltips' must be passed a formatter or 'false'.")
                    })
                }
        }

        function q(t, e) {
            if (t.format = e, "function" == typeof e.to && "function" == typeof e.from) return !0;
            throw new Error("noUiSlider: 'format' requires 'to' and 'from' methods.")
        }

        function z(t, e) {
            if (void 0 !== e && "string" != typeof e) throw new Error("noUiSlider: 'cssPrefix' must be a string.");
            t.cssPrefix = e
        }

        function H(t) {
            var e, n = {
                margin: 0,
                limit: 0,
                animate: !0,
                format: X
            };
            e = {
                step: {
                    r: !1,
                    t: U
                },
                start: {
                    r: !0,
                    t: O
                },
                connect: {
                    r: !0,
                    t: V
                },
                direction: {
                    r: !0,
                    t: C
                },
                snap: {
                    r: !1,
                    t: j
                },
                animate: {
                    r: !1,
                    t: L
                },
                range: {
                    r: !0,
                    t: P
                },
                orientation: {
                    r: !1,
                    t: k
                },
                margin: {
                    r: !1,
                    t: F
                },
                limit: {
                    r: !1,
                    t: A
                },
                behaviour: {
                    r: !0,
                    t: T
                },
                format: {
                    r: !1,
                    t: q
                },
                tooltips: {
                    r: !1,
                    t: B
                },
                cssPrefix: {
                    r: !1,
                    t: z
                }
            };
            var r = {
                connect: !1,
                direction: "ltr",
                behaviour: "tap",
                orientation: "horizontal"
            };
            return Object.keys(e).forEach(function(i) {
                if (void 0 === t[i] && void 0 === r[i]) {
                    if (e[i].r) throw new Error("noUiSlider: '" + i + "' is required.");
                    return !0
                }
                e[i].t(n, void 0 === t[i] ? r[i] : t[i])
            }), n.pips = t.pips, n.style = n.ort ? "top" : "left", n
        }

        function I(e, r) {
            function i(t, e, n) {
                var r = t + e[0],
                    i = t + e[1];
                return n ? (0 > r && (i += Math.abs(r)), i > 100 && (r -= i - 100), [a(r), a(i)]) : [r, i]
            }

            function m(t, e) {
                t.preventDefault();
                var n, r, i = 0 === t.type.indexOf("touch"),
                    o = 0 === t.type.indexOf("mouse"),
                    a = 0 === t.type.indexOf("pointer"),
                    s = t;
                return 0 === t.type.indexOf("MSPointer") && (a = !0), i && (n = t.changedTouches[0].pageX, r = t.changedTouches[0].pageY), e = e || d(), (o || a) && (n = t.clientX + e.x, r = t.clientY + e.y), s.pageOffset = e, s.points = [n, r], s.cursor = o || a, s
            }

            function g(t, e) {
                var n = document.createElement("div"),
                    r = document.createElement("div"),
                    i = ["-lower", "-upper"];
                return t && i.reverse(), c(r, rt[3]), c(r, rt[3] + i[e]), c(n, rt[2]), n.appendChild(r), n
            }

            function v(t, e, n) {
                switch (t) {
                    case 1:
                        c(e, rt[7]), c(n[0], rt[6]);
                        break;
                    case 3:
                        c(n[1], rt[6]);
                    case 2:
                        c(n[0], rt[7]);
                    case 0:
                        c(e, rt[6])
                }
            }

            function b(t, e, n) {
                var r, i = [];
                for (r = 0; t > r; r += 1) i.push(n.appendChild(g(e, r)));
                return i
            }

            function w(t, e, n) {
                c(n, rt[0]), c(n, rt[8 + t]), c(n, rt[4 + e]);
                var r = document.createElement("div");
                return c(r, rt[1]), n.appendChild(r), r
            }

            function y(t, e) {
                if (!r.tooltips[e]) return !1;
                var n = document.createElement("div");
                return n.className = rt[18], t.firstChild.appendChild(n)
            }

            function x() {
                r.dir && r.tooltips.reverse();
                var t = K.map(y);
                r.dir && (t.reverse(), r.tooltips.reverse()), Y("update", function(e, n, i) {
                    t[n] && (t[n].innerHTML = r.tooltips[n] === !0 ? e[n] : r.tooltips[n].to(i[n]))
                })
            }

            function S(t, e, n) {
                if ("range" === t || "steps" === t) return tt.xVal;
                if ("count" === t) {
                    var r, i = 100 / (e - 1),
                        o = 0;
                    for (e = [];
                        (r = o++ * i) <= 100;) e.push(r);
                    t = "positions"
                }
                return "positions" === t ? e.map(function(t) {
                    return tt.fromStepping(n ? tt.getStep(t) : t)
                }) : "values" === t ? n ? e.map(function(t) {
                    return tt.fromStepping(tt.getStep(tt.toStepping(t)))
                }) : e : void 0
            }

            function E(e, n, r) {
                function i(t, e) {
                    return (t + e).toFixed(7) / 1
                }
                var o = tt.direction,
                    a = {},
                    s = tt.xVal[0],
                    u = tt.xVal[tt.xVal.length - 1],
                    c = !1,
                    l = !1,
                    f = 0;
                return tt.direction = 0, r = t(r.slice().sort(function(t, e) {
                    return t - e
                })), r[0] !== s && (r.unshift(s), c = !0), r[r.length - 1] !== u && (r.push(u), l = !0), r.forEach(function(t, o) {
                    var s, u, d, p, h, m, g, v, b, w, y = t,
                        x = r[o + 1];
                    if ("steps" === n && (s = tt.xNumSteps[o]), s || (s = x - y), y !== !1 && void 0 !== x)
                        for (u = y; x >= u; u = i(u, s)) {
                            for (p = tt.toStepping(u), h = p - f, v = h / e, b = Math.round(v), w = h / b, d = 1; b >= d; d += 1) m = f + d * w, a[m.toFixed(5)] = ["x", 0];
                            g = r.indexOf(u) > -1 ? 1 : "steps" === n ? 2 : 0, !o && c && (g = 0), u === x && l || (a[p.toFixed(5)] = [u, g]), f = p
                        }
                }), tt.direction = o, a
            }

            function N(t, e, n) {
                function i(t) {
                    return ["-normal", "-large", "-sub"][t]
                }

                function o(t, e, n) {
                    return 'class="' + e + " " + e + "-" + s + " " + e + i(n[1]) + '" style="' + r.style + ": " + t + '%"'
                }

                function a(t, r) {
                    tt.direction && (t = 100 - t), r[1] = r[1] && e ? e(r[0], r[1]) : r[1], l += "<div " + o(t, rt[21], r) + "></div>", r[1] && (l += "<div " + o(t, rt[22], r) + ">" + n.to(r[0]) + "</div>")
                }
                var s = ["horizontal", "vertical"][r.ort],
                    u = document.createElement("div"),
                    l = "";
                return c(u, rt[20]), c(u, rt[20] + "-" + s), Object.keys(t).forEach(function(e) {
                    a(e, t[e])
                }), u.innerHTML = l, u
            }

            function M(t) {
                var e = t.mode,
                    n = t.density || 1,
                    r = t.filter || !1,
                    i = t.values || !1,
                    o = t.stepped || !1,
                    a = S(e, i, o),
                    s = E(n, e, a),
                    u = t.format || {
                        to: Math.round
                    };
                return Z.appendChild(N(s, r, u))
            }

            function U() {
                var t = J.getBoundingClientRect(),
                    e = "offset" + ["Width", "Height"][r.ort];
                return 0 === r.ort ? t.width || J[e] : t.height || J[e]
            }

            function P(t, e, n) {
                void 0 !== e && 1 !== r.handles && (e = Math.abs(e - r.dir)), Object.keys(nt).forEach(function(r) {
                    var i = r.split(".")[0];
                    t === i && nt[r].forEach(function(t) {
                        t.call(Q, s(I()), e, s(O(Array.prototype.slice.call(et))), n || !1, _)
                    })
                })
            }

            function O(t) {
                return 1 === t.length ? t[0] : r.dir ? t.reverse() : t
            }

            function j(t, e, n, i) {
                var o = function(e) {
                        return Z.hasAttribute("disabled") ? !1 : f(Z, rt[14]) ? !1 : (e = m(e, i.pageOffset), t === D.start && void 0 !== e.buttons && e.buttons > 1 ? !1 : i.hover && e.buttons ? !1 : (e.calcPoint = e.points[r.ort], void n(e, i)))
                    },
                    a = [];
                return t.split(" ").forEach(function(t) {
                    e.addEventListener(t, o, !1), a.push([t, o])
                }), a
            }

            function L(t, e) {
                if (-1 === navigator.appVersion.indexOf("MSIE 9") && 0 === t.buttons && 0 !== e.buttonsProperty) return V(t, e);
                var n, r, o = e.handles || K,
                    a = !1,
                    s = 100 * (t.calcPoint - e.start) / e.baseSize,
                    u = o[0] === K[0] ? 0 : 1;
                if (n = i(s, e.positions, o.length > 1), a = B(o[0], n[u], 1 === o.length), o.length > 1) {
                    if (a = B(o[1], n[u ? 0 : 1], !1) || a)
                        for (r = 0; r < e.handles.length; r++) P("slide", r)
                } else a && P("slide", u)
            }

            function V(t, e) {
                var n = J.querySelector("." + rt[15]),
                    r = e.handles[0] === K[0] ? 0 : 1;
                null !== n && l(n, rt[15]), t.cursor && (document.body.style.cursor = "", document.body.removeEventListener("selectstart", document.body.noUiListener));
                var i = document.documentElement;
                i.noUiListeners.forEach(function(t) {
                    i.removeEventListener(t[0], t[1])
                }), l(Z, rt[12]), P("set", r), P("change", r), void 0 !== e.handleNumber && P("end", e.handleNumber)
            }

            function k(t, e) {
                "mouseout" === t.type && "HTML" === t.target.nodeName && null === t.relatedTarget && V(t, e)
            }

            function F(t, e) {
                var n = document.documentElement;
                if (1 === e.handles.length && (c(e.handles[0].children[0], rt[15]), e.handles[0].hasAttribute("disabled"))) return !1;
                t.preventDefault(), t.stopPropagation();
                var r = j(D.move, n, L, {
                        start: t.calcPoint,
                        baseSize: U(),
                        pageOffset: t.pageOffset,
                        handles: e.handles,
                        handleNumber: e.handleNumber,
                        buttonsProperty: t.buttons,
                        positions: [_[0], _[K.length - 1]]
                    }),
                    i = j(D.end, n, V, {
                        handles: e.handles,
                        handleNumber: e.handleNumber
                    }),
                    o = j("mouseout", n, k, {
                        handles: e.handles,
                        handleNumber: e.handleNumber
                    });
                if (n.noUiListeners = r.concat(i, o), t.cursor) {
                    document.body.style.cursor = getComputedStyle(t.target).cursor, K.length > 1 && c(Z, rt[12]);
                    var a = function() {
                        return !1
                    };
                    document.body.noUiListener = a, document.body.addEventListener("selectstart", a, !1)
                }
                void 0 !== e.handleNumber && P("start", e.handleNumber)
            }

            function A(t) {
                var e, i, a = t.calcPoint,
                    s = 0;
                return t.stopPropagation(), K.forEach(function(t) {
                    s += n(t)[r.style]
                }), e = s / 2 > a || 1 === K.length ? 0 : 1, K[e].hasAttribute("disabled") && (e = e ? 0 : 1), a -= n(J)[r.style], i = 100 * a / U(), r.events.snap || o(Z, rt[14], 300), K[e].hasAttribute("disabled") ? !1 : (B(K[e], i), P("slide", e, !0), P("set", e, !0), P("change", e, !0), void(r.events.snap && F(t, {
                    handles: [K[e]]
                })))
            }

            function C(t) {
                var e = t.calcPoint - n(J)[r.style],
                    i = tt.getStep(100 * e / U()),
                    o = tt.fromStepping(i);
                Object.keys(nt).forEach(function(t) {
                    "hover" === t.split(".")[0] && nt[t].forEach(function(t) {
                        t.call(Q, o)
                    })
                })
            }

            function T(t) {
                var e, n;
                if (!t.fixed)
                    for (e = 0; e < K.length; e += 1) j(D.start, K[e].children[0], F, {
                        handles: [K[e]],
                        handleNumber: e
                    });
                if (t.tap && j(D.start, J, A, {
                        handles: K
                    }), t.hover)
                    for (j(D.move, J, C, {
                            hover: !0
                        }), e = 0; e < K.length; e += 1)["mousemove MSPointerMove pointermove"].forEach(function(t) {
                        K[e].children[0].addEventListener(t, p, !1)
                    });
                t.drag && (n = [J.querySelector("." + rt[7])], c(n[0], rt[10]), t.fixed && n.push(K[n[0] === K[0] ? 1 : 0].children[0]), n.forEach(function(t) {
                    j(D.start, t, F, {
                        handles: K
                    })
                }))
            }

            function B(t, e, n) {
                var i = t !== K[0] ? 1 : 0,
                    o = _[0] + r.margin,
                    s = _[1] - r.margin,
                    u = _[0] + r.limit,
                    f = _[1] - r.limit;
                return K.length > 1 && (e = i ? Math.max(e, o) : Math.min(e, s)), n !== !1 && r.limit && K.length > 1 && (e = i ? Math.min(e, u) : Math.max(e, f)), e = tt.getStep(e), e = a(parseFloat(e.toFixed(7))), e === _[i] ? !1 : (window.requestAnimationFrame ? window.requestAnimationFrame(function() {
                    t.style[r.style] = e + "%"
                }) : t.style[r.style] = e + "%", t.previousSibling || (l(t, rt[17]), e > 50 && c(t, rt[17])), _[i] = e, et[i] = tt.fromStepping(e), P("update", i), !0)
            }

            function q(t, e) {
                var n, i, o;
                for (r.limit && (t += 1), n = 0; t > n; n += 1) i = n % 2, o = e[i], null !== o && o !== !1 && ("number" == typeof o && (o = String(o)), o = r.format.from(o), (o === !1 || isNaN(o) || B(K[i], tt.toStepping(o), n === 3 - r.dir) === !1) && P("update", i))
            }

            function z(t) {
                var e, n, i = s(t);
                for (r.dir && r.handles > 1 && i.reverse(), r.animate && -1 !== _[0] && o(Z, rt[14], 300), e = K.length > 1 ? 3 : 1, 1 === i.length && (e = 1), q(e, i), n = 0; n < K.length; n++) null !== i[n] && P("set", n)
            }

            function I() {
                var t, e = [];
                for (t = 0; t < r.handles; t += 1) e[t] = r.format.to(et[t]);
                return O(e)
            }

            function $() {
                for (rt.forEach(function(t) {
                        t && l(Z, t)
                    }); Z.firstChild;) Z.removeChild(Z.firstChild);
                delete Z.noUiSlider
            }

            function X() {
                var t = _.map(function(t, e) {
                    var n = tt.getApplicableStep(t),
                        r = u(String(n[2])),
                        i = et[e],
                        o = 100 === t ? null : n[2],
                        a = Number((i - n[2]).toFixed(r)),
                        s = 0 === t ? null : a >= n[1] ? n[2] : n[0] || !1;
                    return [s, o]
                });
                return O(t)
            }

            function Y(t, e) {
                nt[t] = nt[t] || [], nt[t].push(e), "update" === t.split(".")[0] && K.forEach(function(t, e) {
                    P("update", e)
                })
            }

            function W(t) {
                var e = t.split(".")[0],
                    n = t.substring(e.length);
                Object.keys(nt).forEach(function(t) {
                    var r = t.split(".")[0],
                        i = t.substring(r.length);
                    e && e !== r || n && n !== i || delete nt[t]
                })
            }

            function G(t) {
                var e, n = I(),
                    i = H({
                        start: [0, 0],
                        margin: t.margin,
                        limit: t.limit,
                        step: t.step,
                        range: t.range,
                        animate: t.animate,
                        snap: void 0 === t.snap ? r.snap : t.snap
                    });
                for (["margin", "limit", "step", "range", "animate"].forEach(function(e) {
                        void 0 !== t[e] && (r[e] = t[e])
                    }), i.spectrum.direction = tt.direction, tt = i.spectrum, _ = [-1, -1], z(n), e = 0; e < K.length; e++) P("update", e)
            }
            var J, K, Q, Z = e,
                _ = [-1, -1],
                tt = r.spectrum,
                et = [],
                nt = {},
                rt = ["target", "base", "origin", "handle", "horizontal", "vertical", "background", "connect", "ltr", "rtl", "draggable", "", "state-drag", "", "state-tap", "active", "", "stacking", "tooltip", "", "pips", "marker", "value"].map(h(r.cssPrefix || R));
            if (Z.noUiSlider) throw new Error("Slider was already initialized.");
            return J = w(r.dir, r.ort, Z), K = b(r.handles, r.dir, J), v(r.connect, Z, K), r.pips && M(r.pips), r.tooltips && x(), Q = {
                destroy: $,
                steps: X,
                on: Y,
                off: W,
                get: I,
                set: z,
                updateOptions: G,
                options: r,
                target: Z,
                pips: M
            }, T(r.events), Q
        }

        function $(t, e) {
            if (!t.nodeName) throw new Error("noUiSlider.create requires a single element.");
            var n = H(e, t),
                r = I(t, n);
            return r.set(n.start), t.noUiSlider = r, r
        }
        var D = window.navigator.pointerEnabled ? {
                start: "pointerdown",
                move: "pointermove",
                end: "pointerup"
            } : window.navigator.msPointerEnabled ? {
                start: "MSPointerDown",
                move: "MSPointerMove",
                end: "MSPointerUp"
            } : {
                start: "mousedown touchstart",
                move: "mousemove touchmove",
                end: "mouseup touchend"
            },
            R = "noUi-";
        M.prototype.getMargin = function(t) {
            return 2 === this.xPct.length ? g(this.xVal, t) : !1
        }, M.prototype.toStepping = function(t) {
            return t = y(this.xVal, this.xPct, t), this.direction && (t = 100 - t), t
        }, M.prototype.fromStepping = function(t) {
            return this.direction && (t = 100 - t), i(x(this.xVal, this.xPct, t))
        }, M.prototype.getStep = function(t) {
            return this.direction && (t = 100 - t), t = S(this.xPct, this.xSteps, this.snap, t), this.direction && (t = 100 - t), t
        }, M.prototype.getApplicableStep = function(t) {
            var e = w(t, this.xPct),
                n = 100 === t ? 2 : 1;
            return [this.xNumSteps[e - 2], this.xVal[e - n], this.xNumSteps[e - n]]
        }, M.prototype.convert = function(t) {
            return this.getStep(this.toStepping(t))
        };
        var X = {
            to: function(t) {
                return void 0 !== t && t.toFixed(2)
            },
            from: Number
        };
        return {
            create: $
        }
    }),
    function() {
        "use strict";

        function t(t) {
            return t.split("").reverse().join("")
        }

        function e(t, e) {
            return t.substring(0, e.length) === e
        }

        function n(t, e) {
            return t.slice(-1 * e.length) === e
        }

        function r(t, e, n) {
            if ((t[e] || t[n]) && t[e] === t[n]) throw new Error(e)
        }

        function i(t) {
            return "number" == typeof t && isFinite(t)
        }

        function o(t, e) {
            var n = Math.pow(10, e);
            return (Math.round(t * n) / n).toFixed(e)
        }

        function a(e, n, r, a, s, u, c, l, f, d, p, h) {
            var m, g, v, b = h,
                w = "",
                y = "";
            return u && (h = u(h)), i(h) ? (e !== !1 && 0 === parseFloat(h.toFixed(e)) && (h = 0), 0 > h && (m = !0, h = Math.abs(h)), e !== !1 && (h = o(h, e)), h = h.toString(), -1 !== h.indexOf(".") ? (g = h.split("."), v = g[0], r && (w = r + g[1])) : v = h, n && (v = t(v).match(/.{1,3}/g), v = t(v.join(t(n)))), m && l && (y += l), a && (y += a), m && f && (y += f), y += v, y += w, s && (y += s), d && (y = d(y, b)), y) : !1
        }

        function s(t, r, o, a, s, u, c, l, f, d, p, h) {
            var m, g = "";
            return p && (h = p(h)), h && "string" == typeof h ? (l && e(h, l) && (h = h.replace(l, ""), m = !0), a && e(h, a) && (h = h.replace(a, "")), f && e(h, f) && (h = h.replace(f, ""), m = !0), s && n(h, s) && (h = h.slice(0, -1 * s.length)), r && (h = h.split(r).join("")), o && (h = h.replace(o, ".")), m && (g += "-"), g += h, g = g.replace(/[^0-9\.\-.]/g, ""), "" === g ? !1 : (g = Number(g), c && (g = c(g)), i(g) ? g : !1)) : !1
        }

        function u(t) {
            var e, n, i, o = {};
            for (e = 0; e < f.length; e += 1)
                if (n = f[e], i = t[n], void 0 === i) "negative" !== n || o.negativeBefore ? "mark" === n && "." !== o.thousand ? o[n] = "." : o[n] = !1 : o[n] = "-";
                else if ("decimals" === n) {
                if (!(i >= 0 && 8 > i)) throw new Error(n);
                o[n] = i
            } else if ("encoder" === n || "decoder" === n || "edit" === n || "undo" === n) {
                if ("function" != typeof i) throw new Error(n);
                o[n] = i
            } else {
                if ("string" != typeof i) throw new Error(n);
                o[n] = i
            }
            return r(o, "mark", "thousand"), r(o, "prefix", "negative"), r(o, "prefix", "negativeBefore"), o
        }

        function c(t, e, n) {
            var r, i = [];
            for (r = 0; r < f.length; r += 1) i.push(t[f[r]]);
            return i.push(n), e.apply("", i)
        }

        function l(t) {
            return this instanceof l ? void("object" == typeof t && (t = u(t), this.to = function(e) {
                return c(t, a, e)
            }, this.from = function(e) {
                return c(t, s, e)
            })) : new l(t)
        }
        var f = ["decimals", "thousand", "mark", "prefix", "postfix", "encoder", "decoder", "negativeBefore", "negative", "edit", "undo"];
        window.wNumb = l
    }()