! function (s) {
    function e(e) {
        for (var n, t, c = e[0], u = e[1], p = e[2], d = 0, r = []; d < c.length; d++) t = c[d], Object.prototype.hasOwnProperty.call(i, t) && i[t] && r.push(i[t][0]), i[t] = 0;
        for (n in u) Object.prototype.hasOwnProperty.call(u, n) && (s[n] = u[n]);
        for (_ && _(e); r.length;) r.shift()();
        return a.push.apply(a, p || []), l()
    }

    function l() {
        for (var s, e = 0; e < a.length; e++) {
            for (var l = a[e], n = !0, c = 1; c < l.length; c++) {
                var u = l[c];
                0 !== i[u] && (n = !1)
            }
            n && (a.splice(e--, 1), s = t(t.s = l[0]))
        }
        return s
    }
    var n = {},
        i = {
            0: 0
        },
        a = [];

    function t(e) {
        if (n[e]) return n[e].exports;
        var l = n[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return s[e].call(l.exports, l, l.exports, t), l.l = !0, l.exports
    }
    t.m = s, t.c = n, t.d = function (s, e, l) {
        t.o(s, e) || Object.defineProperty(s, e, {
            enumerable: !0,
            get: l
        })
    }, t.r = function (s) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(s, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(s, "__esModule", {
            value: !0
        })
    }, t.t = function (s, e) {
        if (1 & e && (s = t(s)), 8 & e) return s;
        if (4 & e && "object" == typeof s && s && s.__esModule) return s;
        var l = Object.create(null);
        if (t.r(l), Object.defineProperty(l, "default", {
            enumerable: !0,
            value: s
        }), 2 & e && "string" != typeof s)
            for (var n in s) t.d(l, n, function (e) {
                return s[e]
            }.bind(null, n));
        return l
    }, t.n = function (s) {
        var e = s && s.__esModule ? function () {
            return s.default
        } : function () {
            return s
        };
        return t.d(e, "a", e), e
    }, t.o = function (s, e) {
        return Object.prototype.hasOwnProperty.call(s, e)
    }, t.p = "../";
    var c = window.webpackJsonp = window.webpackJsonp || [],
        u = c.push.bind(c);
    c.push = e, c = c.slice();
    for (var p = 0; p < c.length; p++) e(c[p]);
    var _ = u;
    a.push([137, 1]), l()
}(Array(109).concat([function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(180);
        e.a = function () {
            var e = s(".header-mobile");
            e.find(".header-mobile__burger").on("click", (function () {
                e.addClass("header-mobile--show")
            })), e.find(".header-mobile__close").on("click", (function () {
                e.removeClass("header-mobile--show")
            })), s(document).on("click", (function (s) {
                0 === e.has(s.target).length && e.removeClass("header-mobile--show")
            }))
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(181);
        e.a = function () {
            var e = s(".footer__row--mobile"),
                l = s(".js-footer-link"),
                n = new Date;
            s(".footer__copy span").html(n.getFullYear()), l.length && s(".js-footer-link").on("click", (function (e) {
                var l = s(e.currentTarget);
                s(".rules__block").hide(), s(l.data("target")).show(), s(".rules__link").each((function (e, n) {
                    s(n).removeClass("rules__link--active"), s(n).data("target") === l.data("target") && s(n).addClass("rules__link--active")
                })), window.scrollTo(0, 0)
            })), s(".footer__btn").on("click", (function () {
                e.hasClass("footer__row--open") ? (e.removeClass("footer__row--open"), e.find(".footer__nav").slideUp()) : (e.addClass("footer__row--open"), e.find(".footer__nav").slideDown())
            }))
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(182), l(95), l(96), l(183), l(184), l(185), l(186), l(189), l(190);
        var n = l(112),
            i = l.n(n);
        e.a = function () {
            var e = null,
                l = null,
                n = null;
            s(".js-open-popup-link").magnificPopup({
                type: "inline",
                midClick: !0,
                callbacks: {
                    open: function () {
                        var a = s(".js-datepicker");
                        l = s(".js-phonepicker"), e = s(".js-select"), a.length && a.datepicker({
                            format: "dd.mm.YYYY",
                            language: "ru-RU",
                            zIndex: "9999"
                        }), e.length && (e.selectize({
                            searchField: !1
                        }), s(".selectize-input > input").prop("disabled", "disabled")), l.length && (n = i()(l[0], {
                            initialCountry: "ru",
                            hiddenInput: "full_phone",
                            preferredCountries: ["ru", "us", "ua"],
                            separateDialCode: !0,
                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/intlTelInput.min.js"
                        }))
                    },
                    close: function () {
                        e.each((function (s, e) {
                            e.selectize.destroy()
                        })), e.find("option").each((function (e, l) {
                            s(l)[0].selected = !1
                        })), n.destroy()
                    }
                }
            }), s(".js-nav-popup-btn").magnificPopup({
                type: "inline",
                midClick: !0,
                removalDelay: 300,
                mainClass: "mfp-fade mfp-fade-contact",
                fixedContentPos: !0,
                preloader: !1
            })
        }
    }).call(this, l(1))
}, , function (s, e, l) {
    "use strict";
    (function (s) {
        var n = l(114),
            i = (l(193), l(195), l(197), l(115)),
            a = (l(201), l(203), l(117)),
            t = l(118),
            c = l(119);
        e.a = function () {
            Object(n.a)(), Object(i.a)(), s(".photo-slider").length && Object(a.a)(), s(".hall-slider").length && Object(t.a)(), Object(c.a)()
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(192);
        e.a = function () {
            var e = s(".page-loader");
            ! function (s, e, l, n) {
                var i = null;
                window.requestAnimationFrame((function a(t) {
                    i || (i = t);
                    var c = Math.min((t - i) / n, 1);
                    null !== s && (s.innerHTML = Math.floor(c * (l - e) + e)), c < 1 && window.requestAnimationFrame(a)
                }))
            }(document.querySelector(".page-loader__percent-count"), 0, 100, 2e3), setTimeout((function () {
                e.addClass("page-loader--hidden")
            }), 2e3)
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(199);
        var n = l(116);
        l(200);
        e.a = function () {
            var e = s(".gallery");
            Object(n.a)(e[0], {
                thumbnail: !0,
                mode: "lg-fade"
            })
        }
    }).call(this, l(1))
}, , function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(97), l(98), l(205);
        e.a = function () {
            var e = s(".photo-slider").find(".photo-slider__wrapper");
            e.lightSlider({
                autoWidth: !0,
                loop: !0,
                slideMargin: 0,
                controls: !1,
                pager: !1,
                auto: !0,
                pauseOnHover: !0,
                onSliderLoad: function () {
                    e.removeClass("cS-hidden")
                }
            })
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(97), l(98), l(206);
        e.a = function () {
            var e = s(".hall-slider"),
                l = e.find(".hall-slider__wrapper"),
                n = l.lightSlider({
                    item: 4,
                    loop: !1,
                    slideMargin: 30,
                    controls: !1,
                    pager: !1,
                    auto: !1,
                    pauseOnHover: !0,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            item: 3,
                            slideMargin: 18
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            item: 1.4,
                            slideMargin: 18
                        }
                    }],
                    onSliderLoad: function () {
                        l.removeClass("cS-hidden")
                    },
                    onBeforeSlide: function (s) {
                        e.find(".hall-slider__current").text(s.getCurrentSlideCount())
                    }
                });
            e.find(".hall-slider__total").text(n.getTotalSlideCount()), e.find(".hall-slider__nav--prev").on("click", (function () {
                n.goToPrevSlide()
            })), e.find(".hall-slider__nav--next").on("click", (function () {
                n.goToNextSlide()
            }))
        }
    }).call(this, l(1))
    
}, function (s, e, l) {
    "use strict";
    l(207);
    e.a = function () { }
}, function (s, e, l) {
    "use strict";
    (function (s) {
        var n = l(132),
            i = l(121),
            a = l(125),
            t = l(126),
            c = l(127),
            u = l(128),
            p = l(129),
            _ = l(131);
        e.a = function () {
            Object(n.a)(), s(".menu").length && Object(i.a)(), Object(a.a)(), Object(t.a)(), Object(c.a)(), Object(u.a)(), s(".contacts").length && Object(p.a)(), s(".rules").length && Object(_.a)();
            var e = .01 * window.innerHeight;
            document.documentElement.style.setProperty("--vh", "".concat(e, "px")), window.addEventListener("resize", (function () {
                var s = .01 * window.innerHeight;
                document.documentElement.style.setProperty("--vh", "".concat(s, "px"))
            }))
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(213), l(99), l(95), l(96);
        var n = l(47),
            i = l(122);
        l(243), l(244), l(245);
        e.a = function () {
            var e = s(".js-adult-y"),
                l = s(".js-adult-n"),
                a = s(".menu__cover"),
                t = s(".menu__wrap");
            Object(i.a)(), localStorage.getItem("userAdult") ? t.show() : (a.show(), s.magnificPopup.open({
                items: {
                    src: "#adult-modal",
                    type: "inline",
                    removalDelay: 300,
                    mainClass: "mfp-fade",
                    fixedContentPos: !0,
                    preloader: !1
                },
                modal: !0
            })), e.on("click", (function () {
                t.fadeIn(200), a.fadeOut(300), localStorage.setItem("userAdult", "true"), s.magnificPopup.close()
            })), l.on("click", (function () {
                window.location.replace("/")
            })), s(window).on("scroll", Object(n.throttle)((function (e) {
                var l = s(".menu__sections");
                s(e.target).width() < 992 && (s(e.target).scrollTop() > 50 ? l.addClass("menu__sections--bg") : l.removeClass("menu__sections--bg"))
            }), 80))
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(221);
        var n = l(123),
            i = l.n(n),
            a = l(124),
            t = l.n(a);
        e.a = function () {
            i.a.get("https://api.artest.rest/public/menu/").then((function (e) {
                var l = {
                    menu: e.data
                };
                s(".menu__wrap").append(t()(l));
                var n, i = s(".menu__trigger"),
                    a = s(".menu__screen");
                n = a, i.on("click", (function (e) {
                    e.preventDefault();
                    var l = s(this),
                        i = l.data("tab");
                    s(".menu__trigger--active").removeClass("menu__trigger--active"), l.addClass("menu__trigger--active"), n.removeClass("menu__screen--show"), n.filter("[data-tab='".concat(i, "']")).addClass("menu__screen--show")
                })), s(window).width() < 992 && s(window).scrollTop() > 50 && s(".menu__sections").addClass("menu__sections--bg")
            })).catch((function (s) {
                console.error(s)
            }))
        }
    }).call(this, l(1))
}, , function (s, e, l) {
    var n = l(241);
    s.exports = function (s) {
        var e, l = "",
            a = s || {};
        return function (s, i) {
            l += '<div class="menu__container"><aside class="menu__side"><h1 class="menu__title">Меню</h1><ul class="menu__sections">',
                function () {
                    var s = i;
                    if ("number" == typeof s.length)
                        for (var a = 0, t = s.length; a < t; a++) {
                            var c = s[a];
                            l = l + '<li class="menu__section"><button' + (n.attr("class", n.classes(["menu__trigger", 0 === a ? "menu__trigger--active" : ""], [!1, !0]), !1, !0) + n.attr("data-tab", a, !0, !0)) + ">" + n.escape(null == (e = c.name) ? "" : e) + "</button></li>"
                        } else {
                        t = 0;
                        for (var a in s) {
                            t++;
                            c = s[a];
                            l = l + '<li class="menu__section"><button' + (n.attr("class", n.classes(["menu__trigger", 0 === a ? "menu__trigger--active" : ""], [!1, !0]), !1, !0) + n.attr("data-tab", a, !0, !0)) + ">" + n.escape(null == (e = c.name) ? "" : e) + "</button></li>"
                        }
                    }
                }.call(this), l += '\x3c!--li.menu__section--\x3e\x3c!--  button.menu__trigger Винная карта--\x3e\x3c!--li.menu__section--\x3e\x3c!--  button.menu__trigger Бар--\x3e</ul></aside><div class="menu__content">',
                function () {
                    var a = i;
                    if ("number" == typeof a.length)
                        for (var t = 0, c = a.length; t < c; t++) {
                            var u = a[t];
                            l = l + "<div" + (n.attr("class", n.classes(["menu__screen", 0 === t ? "menu__screen--show" : ""], [!1, !0]), !1, !0) + n.attr("data-tab", t, !0, !0)) + ">", 0 !== u.child.length ? function () {
                                var s = u.child;
                                if ("number" == typeof s.length)
                                    for (var i = 0, a = s.length; i < a; i++) {
                                        var t = s[i];
                                        l = l + '<div class="menu-list"><h2 class="menu__subtitle">' + n.escape(null == (e = t.name) ? "" : e) + "</h2>", 0 !== t.items.length && function () {
                                            var s = t.items;
                                            if ("number" == typeof s.length)
                                                for (var i = 0, a = s.length; i < a; i++) {
                                                    var c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                } else {
                                                a = 0;
                                                for (var i in s) {
                                                    a++;
                                                    c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                }
                                            }
                                        }.call(this),
                                            function () {
                                                var s = t.child;
                                                if ("number" == typeof s.length)
                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                        var c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    } else {
                                                    a = 0;
                                                    for (var i in s) {
                                                        a++;
                                                        c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    }
                                                }
                                            }.call(this), l += "</div>"
                                    } else {
                                    a = 0;
                                    for (var i in s) {
                                        a++;
                                        t = s[i];
                                        l = l + '<div class="menu-list"><h2 class="menu__subtitle">' + n.escape(null == (e = t.name) ? "" : e) + "</h2>", 0 !== t.items.length && function () {
                                            var s = t.items;
                                            if ("number" == typeof s.length)
                                                for (var i = 0, a = s.length; i < a; i++) {
                                                    var c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                } else {
                                                a = 0;
                                                for (var i in s) {
                                                    a++;
                                                    c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                }
                                            }
                                        }.call(this),
                                            function () {
                                                var s = t.child;
                                                if ("number" == typeof s.length)
                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                        var c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    } else {
                                                    a = 0;
                                                    for (var i in s) {
                                                        a++;
                                                        c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    }
                                                }
                                            }.call(this), l += "</div>"
                                    }
                                }
                            }.call(this) : function () {
                                var i = u.items;
                                if ("number" == typeof i.length)
                                    for (var a = 0, t = i.length; a < t; a++) {
                                        i[a];
                                        l = l + '<div class="menu-list"><div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = s.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== s.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = s.size) ? "" : e) + "</div>"), null !== s.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = s.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== s.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = s.desc) ? "" : e) + "</div>"), l += "</div></div>"
                                    } else {
                                    t = 0;
                                    for (var a in i) {
                                        t++;
                                        i[a];
                                        l = l + '<div class="menu-list"><div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = s.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== s.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = s.size) ? "" : e) + "</div>"), null !== s.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = s.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== s.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = s.desc) ? "" : e) + "</div>"), l += "</div></div>"
                                    }
                                }
                            }.call(this), l += "</div>"
                        } else {
                        c = 0;
                        for (var t in a) {
                            c++;
                            u = a[t];
                            l = l + "<div" + (n.attr("class", n.classes(["menu__screen", 0 === t ? "menu__screen--show" : ""], [!1, !0]), !1, !0) + n.attr("data-tab", t, !0, !0)) + ">", 0 !== u.child.length ? function () {
                                var s = u.child;
                                if ("number" == typeof s.length)
                                    for (var i = 0, a = s.length; i < a; i++) {
                                        var t = s[i];
                                        l = l + '<div class="menu-list"><h2 class="menu__subtitle">' + n.escape(null == (e = t.name) ? "" : e) + "</h2>", 0 !== t.items.length && function () {
                                            var s = t.items;
                                            if ("number" == typeof s.length)
                                                for (var i = 0, a = s.length; i < a; i++) {
                                                    var c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                } else {
                                                a = 0;
                                                for (var i in s) {
                                                    a++;
                                                    c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                }
                                            }
                                        }.call(this),
                                            function () {
                                                var s = t.child;
                                                if ("number" == typeof s.length)
                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                        var c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    } else {
                                                    a = 0;
                                                    for (var i in s) {
                                                        a++;
                                                        c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    }
                                                }
                                            }.call(this), l += "</div>"
                                    } else {
                                    a = 0;
                                    for (var i in s) {
                                        a++;
                                        t = s[i];
                                        l = l + '<div class="menu-list"><h2 class="menu__subtitle">' + n.escape(null == (e = t.name) ? "" : e) + "</h2>", 0 !== t.items.length && function () {
                                            var s = t.items;
                                            if ("number" == typeof s.length)
                                                for (var i = 0, a = s.length; i < a; i++) {
                                                    var c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                } else {
                                                a = 0;
                                                for (var i in s) {
                                                    a++;
                                                    c = s[i];
                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                }
                                            }
                                        }.call(this),
                                            function () {
                                                var s = t.child;
                                                if ("number" == typeof s.length)
                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                        var c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    } else {
                                                    a = 0;
                                                    for (var i in s) {
                                                        a++;
                                                        c = s[i];
                                                        l = l + '<div class="menu-list__title">' + n.escape(null == (e = c.name) ? "" : e) + "</div>",
                                                            function () {
                                                                var s = c.items;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = t.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== t.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = t.size) ? "" : e) + "</div>"), null !== t.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = t.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== t.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = t.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                    }
                                                                }
                                                            }.call(this), 0 !== c.child && function () {
                                                                var s = c.child;
                                                                if ("number" == typeof s.length)
                                                                    for (var i = 0, a = s.length; i < a; i++) {
                                                                        var t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    } else {
                                                                    a = 0;
                                                                    for (var i in s) {
                                                                        a++;
                                                                        t = s[i];
                                                                        l = l + '<div class="menu-list__content-name"><span>' + n.escape(null == (e = t.name) ? "" : e) + "</span></div>", 0 !== t.items.length && function () {
                                                                            var s = t.items;
                                                                            if ("number" == typeof s.length)
                                                                                for (var i = 0, a = s.length; i < a; i++) {
                                                                                    var c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                } else {
                                                                                a = 0;
                                                                                for (var i in s) {
                                                                                    a++;
                                                                                    c = s[i];
                                                                                    l = l + '<div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = c.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== c.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = c.size) ? "" : e) + "</div>"), l += "</div>", null !== c.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = c.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div>", 0 !== c.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = c.desc) ? "" : e) + "</div>"), l += "</div>"
                                                                                }
                                                                            }
                                                                        }.call(this)
                                                                    }
                                                                }
                                                            }.call(this)
                                                    }
                                                }
                                            }.call(this), l += "</div>"
                                    }
                                }
                            }.call(this) : function () {
                                var i = u.items;
                                if ("number" == typeof i.length)
                                    for (var a = 0, t = i.length; a < t; a++) {
                                        i[a];
                                        l = l + '<div class="menu-list"><div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = s.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== s.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = s.size) ? "" : e) + "</div>"), null !== s.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = s.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== s.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = s.desc) ? "" : e) + "</div>"), l += "</div></div>"
                                    } else {
                                    t = 0;
                                    for (var a in i) {
                                        t++;
                                        i[a];
                                        l = l + '<div class="menu-list"><div class="menu-list__position"><div class="menu-list__top"><span class="menu-list__name">' + n.escape(null == (e = s.name) ? "" : e) + '</span><div class="menu-list__detail">', null !== s.size && (l = l + '<div class="menu-list__size">' + n.escape(null == (e = s.size) ? "" : e) + "</div>"), null !== s.price && (l = l + '<span class="menu-list__price">' + n.escape(null == (e = s.price) ? "" : e) + '<span class="menu-list__rubl">i</span></span>'), l += "</div></div>", 0 !== s.desc.length && (l = l + '<div class="menu-list__desc">' + n.escape(null == (e = s.desc) ? "" : e) + "</div>"), l += "</div></div>"
                                    }
                                }
                            }.call(this), l += "</div>"
                        }
                    }
                }.call(this), l += "</div></div>"
        }.call(this, "i" in a ? a.i : "undefined" != typeof i ? i : void 0, "menu" in a ? a.menu : "undefined" != typeof menu ? menu : void 0), l
    }
}, function (s, e, l) {
    "use strict";
    l(246);
    e.a = function () { }
}, function (s, e, l) {
    "use strict";
    l(247);
    e.a = function () { }
}, function (s, e, l) {
    "use strict";
    l(248);
    e.a = function () { }
}, function (s, e, l) {
    "use strict";
    l(249);
    e.a = function () { }
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(250), l(251);
        var n = l(130);
        e.a = function () {
            var e = s(".contacts__map-wrap"),
                i = [55.754365, 37.586446],
                a = null;
            if (e.length) {
                n.a.load().then((function () {
                    ymaps.ready((function () {
                        a = new ymaps.Map("map", {
                            center: i,
                            zoom: 5,
                            controls: []
                        }, {
                            searchControlProvider: "yandex#search"
                        });
                        var s = new ymaps.Placemark(i, {}, {
                            iconLayout: "default#image",
                            iconImageHref: "".concat(l(252))
                        });
                        a.geoObjects.add(s)
                    }))
                }))
            }
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    l(84), l(83);
    var n, i = !1,
        a = !1,
        t = ((n = {}).promise = new Promise((function (s, e) {
            n.resolve = s, n.reject = e
        })), n);
    window.ymapLoaded = function () {
        i = !0, t.resolve()
    }, e.a = {
        load: function () {
            if (i || a) return t.promise;
            a = !0;
            var s = document.createElement("script");
            return s.setAttribute("type", "text/javascript"), s.setAttribute("src", "https://api-maps.yandex.ru/2.1/?lang=en_US&onload=ymapLoaded"), (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(s), t.promise
        },
        promise: t.promise,
        isLoaded: i,
        isLoading: a
    }
}, function (s, e, l) {
    "use strict";
    (function (s) {
        l(33), l(253), l(254);
        var n = l(47);
        e.a = function () {
            var e = s(".rules");
            e.length && (window.location.hash ? (e.find(window.location.hash).show(), e.find('.rules__link[data-target="'.concat(window.location.hash, '"]')).addClass("rules__link--active")) : (e.find("#privacy").show(), e.find('.rules__link[data-target="#privacy"]').addClass("rules__link--active")), setTimeout((function () {
                window.scrollTo(0, 0)
            }), 0), e.find(".rules__link").on("click", (function (l) {
                var n = s(l.currentTarget);
                e.find(".rules__block").hide(), e.find(n.data("target")).show(), e.find(".rules__link").each((function (e, l) {
                    s(l).removeClass("rules__link--active")
                })), n.addClass("rules__link--active"), window.scrollTo(0, 0)
            })), s(window).on("scroll", Object(n.throttle)((function (e) {
                var l = s(".rules__menu");
                s(e.target).width() < 992 && (s(e.target).scrollTop() > 0 ? l.addClass("rules__menu--bg") : l.removeClass("rules__menu--bg"))
            }), 80)))
        }
    }).call(this, l(1))
}, function (s, e, l) {
    "use strict";
    l(208), l(209), l(210), l(211), l(212), e.a = function () { }
}, , , , , function (s, e, l) {
    s.exports = l(255)
}, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, , , function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, , , , , , , , , , function (s, e, l) { }, function (s, e, l) {
    "use strict";
    l(194)
}, function (s, e, l) { }, function (s, e, l) {
    "use strict";
    l(196)
}, function (s, e, l) { }, function (s, e, l) {
    "use strict";
    l(198)
}, function (s, e, l) { }, function (s, e, l) { }, , function (s, e, l) {
    "use strict";
    l(202)
}, function (s, e, l) { }, function (s, e, l) {
    "use strict";
    l(204)
}, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) {
    s.exports = l.p + "index.html"
}, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) { }, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function (s, e) { }, function (s, e, l) {
    s.exports = l.p + "menu.html"
}, function (s, e, l) { }, function (s, e, l) { }, function (s, e, l) {
    s.exports = l.p + "fireplace.html"
}, function (s, e, l) {
    s.exports = l.p + "chefs-table.html"
}, function (s, e, l) {
    s.exports = l.p + "terrace.html"
}, function (s, e, l) {
    s.exports = l.p + "teatr-odnogo-povara.html"
}, function (s, e, l) {
    s.exports = l.p + "contacts.html"
}, function (s, e, l) { }, function (s, e) {
    s.exports = "./images/logo-map.svg"
}, function (s, e, l) { }, function (s, e, l) {
    s.exports = l.p + "rules.html"
}, function (s, e, l) {
    "use strict";
    l.r(e);
    l(138);
    var n = l(1),
        i = l.n(n),
        a = (l(172), l(173), l(174), l(175), l(176), l(177), l(109)),
        t = l(110),
        c = l(111),
        u = function () {
            Object(a.a)(), Object(c.a)(), Object(t.a)()
        },
        p = l(113),
        _ = l(120);
    i()((function () {
        u(), Object(p.a)(), Object(_.a)()
    }))
}]));




let hall__item__popup = document.querySelector("#hall__item__popup")
let popup_close=document.querySelector("#popup_close")
let popup_wrapper=document.querySelector(".hall__item-popup__wrapper ")
const body = document.body

function popup_delay(){
    hall__item__popup.classList.toggle("open");
    popup_wrapper.classList.toggle("popup__open")
    body.classList.toggle("no_scroll")
}

setTimeout(popup_delay, 4000)

popup_close.onclick = () => {
    hall__item__popup.classList.remove("open");
    popup_wrapper.classList.remove("popup__open")
    body.classList.remove("no_scroll")
  }
