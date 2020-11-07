// Avoid `console` errors in browsers that lack a console.
(function() { var e; var t = function() {}; var n = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeStamp", "trace", "warn"]; var r = n.length; var i = window.console = window.console || {}; while (r--) { e = n[r]; if (!i[e]) { i[e] = t } } })();


! function(e) {
    e.fn.toc = function(t) {
        var n = this;
        var r = e.extend({}, jQuery.fn.toc.defaults, t);
        var i = e(r.container);
        var s = e(r.selectors, i);
        var o = [];
        var u = "active";
        var a = function(t) {
            for (var n = 0, r = arguments.length; n < r; n++) {
                var i = arguments[n],
                    s = e(i);
                if (s.scrollTop() > 0) { return s } else {
                    s.scrollTop(1);
                    var o = s.scrollTop() > 0;
                    s.scrollTop(0);
                    if (o) { return s }
                }
            }
            return []
        };
        var f = a(r.container, "body", "html");
        var l = function(t) {
            if (r.smoothScrolling) {
                t.preventDefault();
                var i = e(t.target).attr("href");
                var s = e(i);
                f.animate({ scrollTop: s.offset().top }, 400, "swing", function() { location.hash = i })
            }
            e("li", n).removeClass(u);
            e(t.target).parent().addClass(u)
        };
        var c;
        var h = function(t) {
            if (c) { clearTimeout(c) }
            c = setTimeout(function() {
                var t = e(window).scrollTop(),
                    i;
                for (var s = 0, a = o.length; s < a + 1; s++) {
                    if (t <= o[s] && s !== a) {
                        if (s === 0) {
                            e("li", n).removeClass(u);
                            i = e("li:eq(" + s + ")", n).addClass(u);
                            r.onHighlight(i);
                            break
                        } else if (t >= o[s - 1]) {
                            e("li", n).removeClass(u);
                            i = e("li:eq(" + (s - 1) + ")", n).addClass(u);
                            r.onHighlight(i);
                            break
                        }
                    } else if (s === a) {
                        e("li", n).removeClass(u);
                        i = e("li:eq(" + (s - 1) + ")", n).addClass(u);
                        r.onHighlight(i);
                        break
                    }
                }
            }, 50)
        };
        if (r.highlightOnScroll) {
            e(window).bind("scroll", h);
            h()
        }
        return this.each(function() {
            var t = e(this);
            var n = e("<ul/>");
            s.each(function(i, s) {
                var u = e(s);
                o.push(u.offset().top - r.highlightOffset);
                var a = e("<span/>").attr("id", r.anchorName(i, s, r.prefix)).insertBefore(u);
                var f = e("<a/>").text(r.headerText(i, s, u)).attr("href", "#" + r.anchorName(i, s, r.prefix)).bind("click", function(n) {
                    l(n);
                    t.trigger("selected", e(this).attr("href"))
                });
                var c = e("<li/>").addClass(r.itemClass(i, s, u, r.prefix)).append(f);
                n.append(c)
            });
            t.html(n)
        })
    };
    jQuery.fn.toc.defaults = { container: "body", selectors: "h1,h2,h3", smoothScrolling: true, prefix: "toc", onHighlight: function() {}, highlightOnScroll: true, highlightOffset: 100, anchorName: function(e, t, n) { return n + e }, headerText: function(e, t, n) { return n.text() }, itemClass: function(e, t, n, r) { return r + "-" + n[0].tagName.toLowerCase() } }
}(jQuery)

/* Rainbow v1.1.8 rainbowco.de | included languages: generic, javascript, php, html, css */
window.Rainbow = function() {
    function q(a) {
        var b, c = a.getAttribute && a.getAttribute("data-language") || 0;
        if (!c) {
            a = a.attributes;
            for (b = 0; b < a.length; ++b)
                if ("data-language" === a[b].nodeName) return a[b].nodeValue
        }
        return c
    }

    function B(a) {
        var b = q(a) || q(a.parentNode);
        if (!b) {
            var c = /\blang(?:uage)?-(\w+)/;
            (a = a.className.match(c) || a.parentNode.className.match(c)) && (b = a[1])
        }
        return b
    }

    function C(a, b) {
        for (var c in e[d]) {
            c = parseInt(c, 10);
            if (a == c && b == e[d][c] ? 0 : a <= c && b >= e[d][c]) delete e[d][c], delete j[d][c];
            if (a >= c && a < e[d][c] ||
                b > c && b < e[d][c]) return !0
        }
        return !1
    }

    function r(a, b) { return '<span class="' + a.replace(/\./g, " ") + (l ? " " + l : "") + '">' + b + "</span>" }

    function s(a, b, c, h) {
        var f = a.exec(c);
        if (f) {
            ++t;
            !b.name && "string" == typeof b.matches[0] && (b.name = b.matches[0], delete b.matches[0]);
            var k = f[0],
                i = f.index,
                u = f[0].length + i,
                g = function() {
                    function f() { s(a, b, c, h) }
                    t % 100 > 0 ? f() : setTimeout(f, 0)
                };
            if (C(i, u)) g();
            else {
                var m = v(b.matches),
                    l = function(a, c, h) {
                        if (a >= c.length) h(k);
                        else {
                            var d = f[c[a]];
                            if (d) {
                                var e = b.matches[c[a]],
                                    i = e.language,
                                    g = e.name && e.matches ?
                                    e.matches : e,
                                    j = function(b, d, e) {
                                        var i;
                                        i = 0;
                                        var g;
                                        for (g = 1; g < c[a]; ++g) f[g] && (i = i + f[g].length);
                                        d = e ? r(e, d) : d;
                                        k = k.substr(0, i) + k.substr(i).replace(b, d);
                                        l(++a, c, h)
                                    };
                                i ? n(d, i, function(a) { j(d, a) }) : typeof e === "string" ? j(d, d, e) : w(d, g.length ? g : [g], function(a) { j(d, a, e.matches ? e.name : 0) })
                            } else l(++a, c, h)
                        }
                    };
                l(0, m, function(a) {
                    b.name && (a = r(b.name, a));
                    if (!j[d]) {
                        j[d] = {};
                        e[d] = {}
                    }
                    j[d][i] = { replace: f[0], "with": a };
                    e[d][i] = u;
                    g()
                })
            }
        } else h()
    }

    function v(a) {
        var b = [],
            c;
        for (c in a) a.hasOwnProperty(c) && b.push(c);
        return b.sort(function(a,
            b) { return b - a })
    }

    function w(a, b, c) {
        function h(b, k) {
            k < b.length ? s(b[k].pattern, b[k], a, function() { h(b, ++k) }) : D(a, function(a) {
                delete j[d];
                delete e[d];
                --d;
                c(a)
            })
        }++d;
        h(b, 0)
    }

    function D(a, b) {
        function c(a, b, h, e) {
            if (h < b.length) {
                ++x;
                var g = b[h],
                    l = j[d][g],
                    a = a.substr(0, g) + a.substr(g).replace(l.replace, l["with"]),
                    g = function() { c(a, b, ++h, e) };
                0 < x % 250 ? g() : setTimeout(g, 0)
            } else e(a)
        }
        var h = v(j[d]);
        c(a, h, 0, b)
    }

    function n(a, b, c) {
        var d = m[b] || [],
            f = m[y] || [],
            b = z[b] ? d : d.concat(f);
        w(a.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/&(?![\w\#]+;)/g,
            "&amp;"), b, c)
    }

    function o(a, b, c) {
        if (b < a.length) {
            var d = a[b],
                f = B(d);
            return !(-1 < (" " + d.className + " ").indexOf(" rainbow ")) && f ? (f = f.toLowerCase(), d.className += d.className ? " rainbow" : "rainbow", n(d.innerHTML, f, function(k) {
                d.innerHTML = k;
                j = {};
                e = {};
                p && p(d, f);
                setTimeout(function() { o(a, ++b, c) }, 0)
            })) : o(a, ++b, c)
        }
        c && c()
    }

    function A(a, b) {
        var a = a && "function" == typeof a.getElementsByTagName ? a : document,
            c = a.getElementsByTagName("pre"),
            d = a.getElementsByTagName("code"),
            f, e = [];
        for (f = 0; f < d.length; ++f) e.push(d[f]);
        for (f = 0; f <
            c.length; ++f) c[f].getElementsByTagName("code").length || e.push(c[f]);
        o(e, 0, b)
    }
    var j = {},
        e = {},
        m = {},
        z = {},
        d = 0,
        y = 0,
        t = 0,
        x = 0,
        l, p;
    return {
        extend: function(a, b, c) {
            1 == arguments.length && (b = a, a = y);
            z[a] = c;
            m[a] = b.concat(m[a] || [])
        },
        b: function(a) { p = a },
        a: function(a) { l = a },
        color: function(a, b, c) {
            if ("string" == typeof a) return n(a, b, c);
            if ("function" == typeof a) return A(0, a);
            A(a, b)
        }
    }
}();
window.addEventListener ? window.addEventListener("load", Rainbow.color, !1) : window.attachEvent("onload", Rainbow.color);
Rainbow.onHighlight = Rainbow.b;
Rainbow.addClass = Rainbow.a;
Rainbow.extend([{ matches: { 1: { name: "keyword.operator", pattern: /\=/g }, 2: { name: "string", matches: { name: "constant.character.escape", pattern: /\\('|"){1}/g } } }, pattern: /(\(|\s|\[|\=|:)(('|")([^\\\1]|\\.)*?(\3))/gm }, { name: "comment", pattern: /\/\*[\s\S]*?\*\/|(\/\/|\#)[\s\S]*?$/gm }, { name: "constant.numeric", pattern: /\b(\d+(\.\d+)?(e(\+|\-)?\d+)?(f|d)?|0x[\da-f]+)\b/gi }, { matches: { 1: "keyword" }, pattern: /\b(and|array|as|bool(ean)?|c(atch|har|lass|onst)|d(ef|elete|o(uble)?)|e(cho|lse(if)?|xit|xtends|xcept)|f(inally|loat|or(each)?|unction)|global|if|import|int(eger)?|long|new|object|or|pr(int|ivate|otected)|public|return|self|st(ring|ruct|atic)|switch|th(en|is|row)|try|(un)?signed|var|void|while)(?=\(|\b)/gi },
    { name: "constant.language", pattern: /true|false|null/g }, { name: "keyword.operator", pattern: /\+|\!|\-|&(gt|lt|amp);|\||\*|\=/g }, { matches: { 1: "function.call" }, pattern: /(\w+?)(?=\()/g }, { matches: { 1: "storage.function", 2: "entity.name.function" }, pattern: /(function)\s(.*?)(?=\()/g }
]);
Rainbow.extend("javascript", [{ name: "selector", pattern: /(\s|^)\$(?=\.|\()/g }, { name: "support", pattern: /\b(window|document)\b/g }, { matches: { 1: "support.property" }, pattern: /\.(length|node(Name|Value))\b/g }, { matches: { 1: "support.function" }, pattern: /(setTimeout|setInterval)(?=\()/g }, { matches: { 1: "support.method" }, pattern: /\.(getAttribute|push|getElementById|getElementsByClassName|log|setTimeout|setInterval)(?=\()/g }, {
    matches: {
        1: "support.tag.script",
        2: [{ name: "string", pattern: /('|")(.*?)(\1)/g }, {
            name: "entity.tag.script",
            pattern: /(\w+)/g
        }],
        3: "support.tag.script"
    },
    pattern: /(&lt;\/?)(script.*?)(&gt;)/g
}, { name: "string.regexp", matches: { 1: "string.regexp.open", 2: { name: "constant.regexp.escape", pattern: /\\(.){1}/g }, 3: "string.regexp.close", 4: "string.regexp.modifier" }, pattern: /(\/)(?!\*)(.+)(\/)([igm]{0,3})/g }, { matches: { 1: "storage", 3: "entity.function" }, pattern: /(var)?(\s|^)(.*)(?=\s?=\s?function\()/g }, { matches: { 1: "keyword", 2: "entity.function" }, pattern: /(new)\s+(.*)(?=\()/g }, { name: "entity.function", pattern: /(\w+)(?=:\s{0,}function)/g }]);
Rainbow.extend("php", [{ name: "support", pattern: /\becho\b/g }, { matches: { 1: "variable.dollar-sign", 2: "variable" }, pattern: /(\$)(\w+)\b/g }, { name: "constant.language", pattern: /true|false|null/ig }, { name: "constant", pattern: /\b[A-Z0-9_]{2,}\b/g }, { name: "keyword.dot", pattern: /\./g }, { name: "keyword", pattern: /\b(continue|break|die|end(for(each)?|switch|if)|case|require(_once)?|include(_once)?)(?=\(|\b)/g }, { matches: { 1: "keyword", 2: { name: "support.class", pattern: /\w+/g } }, pattern: /(instanceof)\s([^\$].*?)(\)|;)/g }, {
        matches: { 1: "support.function" },
        pattern: /\b(array(_key_exists|_merge|_keys|_shift)?|isset|count|empty|unset|printf|is_(array|string|numeric|object)|sprintf|each|date|time|substr|pos|str(len|pos|tolower|_replace|totime)?|ord|trim|in_array|implode|end|preg_match|explode|fmod|define|link|list|get_class|serialize|file|sort|mail|dir|idate|log|intval|header|chr|function_exists|dirname|preg_replace|file_exists)(?=\()/g
    }, { name: "variable.language.php-tag", pattern: /(&lt;\?(php)?|\?&gt;)/g }, {
        matches: {
            1: "keyword.namespace",
            2: {
                name: "support.namespace",
                pattern: /\w+/g
            }
        },
        pattern: /\b(namespace|use)\s(.*?);/g
    }, { matches: { 1: "storage.modifier", 2: "storage.class", 3: "entity.name.class", 4: "storage.modifier.extends", 5: "entity.other.inherited-class", 6: "storage.modifier.extends", 7: "entity.other.inherited-class" }, pattern: /\b(abstract|final)?\s?(class|interface|trait)\s(\w+)(\sextends\s)?([\w\\]*)?(\simplements\s)?([\w\\]*)?\s?\{?(\n|\})/g }, { name: "keyword.static", pattern: /self::|static::/g }, { matches: { 1: "storage.function", 2: "support.magic" }, pattern: /(function)\s(__.*?)(?=\()/g },
    { matches: { 1: "keyword.new", 2: { name: "support.class", pattern: /\w+/g } }, pattern: /\b(new)\s([^\$].*?)(?=\)|\(|;)/g }, { matches: { 1: { name: "support.class", pattern: /\w+/g }, 2: "keyword.static" }, pattern: /([\w\\]*?)(::)(?=\b|\$)/g }, { matches: { 2: { name: "support.class", pattern: /\w+/g } }, pattern: /(\(|,\s?)([\w\\]*?)(?=\s\$)/g }
]);
Rainbow.extend("html", [{ name: "source.php.embedded", matches: { 2: { language: "php" } }, pattern: /&lt;\?=?(?!xml)(php)?([\s\S]*?)(\?&gt;)/gm }, { name: "source.css.embedded", matches: { "0": { language: "css" } }, pattern: /&lt;style(.*?)&gt;([\s\S]*?)&lt;\/style&gt;/gm }, { name: "source.js.embedded", matches: { "0": { language: "javascript" } }, pattern: /&lt;script(?! src)(.*?)&gt;([\s\S]*?)&lt;\/script&gt;/gm }, { name: "comment.html", pattern: /&lt;\!--[\S\s]*?--&gt;/g }, { matches: { 1: "support.tag.open", 2: "support.tag.close" }, pattern: /(&lt;)|(\/?\??&gt;)/g },
    { name: "support.tag", matches: { 1: "support.tag", 2: "support.tag.special", 3: "support.tag-name" }, pattern: /(&lt;\??)(\/|\!?)(\w+)/g }, { matches: { 1: "support.attribute" }, pattern: /([a-z-]+)(?=\=)/gi }, { matches: { 1: "support.operator", 2: "string.quote", 3: "string.value", 4: "string.quote" }, pattern: /(=)('|")(.*?)(\2)/g }, { matches: { 1: "support.operator", 2: "support.value" }, pattern: /(=)([a-zA-Z\-0-9]*)\b/g }, { matches: { 1: "support.attribute" }, pattern: /\s(\w+)(?=\s|&gt;)(?![\s\S]*&lt;)/g }
], !0);
Rainbow.extend("css", [{ name: "comment", pattern: /\/\*[\s\S]*?\*\//gm }, { name: "constant.hex-color", pattern: /#([a-f0-9]{3}|[a-f0-9]{6})(?=;|\s)/gi }, { matches: { 1: "constant.numeric", 2: "keyword.unit" }, pattern: /(\d+)(px|em|cm|s|%)?/g }, { name: "string", pattern: /('|")(.*?)\1/g }, { name: "support.css-property", matches: { 1: "support.vendor-prefix" }, pattern: /(-o-|-moz-|-webkit-|-ms-)?[\w-]+(?=\s?:)(?!.*\{)/g }, {
    matches: {
        1: [{ name: "entity.name.sass", pattern: /&amp;/g }, { name: "direct-descendant", pattern: /&gt;/g }, {
            name: "entity.name.class",
            pattern: /\.[\w\-_]+/g
        }, { name: "entity.name.id", pattern: /\#[\w\-_]+/g }, { name: "entity.name.pseudo", pattern: /:[\w\-_]+/g }, { name: "entity.name.tag", pattern: /\w+/g }]
    },
    pattern: /([\w\ ,:\.\#\&\;\-_]+)(?=.*\{)/g
}, { matches: { 2: "support.vendor-prefix", 3: "support.css-value" }, pattern: /(:|,)\s?(-o-|-moz-|-webkit-|-ms-)?([a-zA-Z-]*)(?=\b)(?!.*\{)/g }, { matches: { 1: "support.tag.style", 2: [{ name: "string", pattern: /('|")(.*?)(\1)/g }, { name: "entity.tag.style", pattern: /(\w+)/g }], 3: "support.tag.style" }, pattern: /(&lt;\/?)(style.*?)(&gt;)/g }], !0);

/* Rainbow.linecount.js - https://github.com/Blender3D/rainbow.linenumbers.js */
if (window.Rainbow) window.Rainbow.linecount = function(e) {
    e.onHighlight(function(e) {
        var t = $(e);
        var n = t.clone().empty();
        var r = $("<table />", { "class": "rainbow" }).appendTo(n);
        var i = $("<tr />", { "class": "rainbow-header" }).appendTo(r);
        $("<th />").appendTo(i);
        $("<th />", { "class": "rainbow-language" }).text(t.data("language")).appendTo(i);
        var s = t.html().trim().split("\n");
        $.each(s, function(e, t) {
            e++;
            var n = $("<tr />", { "class": "rainbow-line rainbow-line-" + e });
            $("<td />", { "class": "rainbow-line-number", "data-number": e }).appendTo(n);
            $("<td />", { "class": "rainbow-line-code" }).html(t).appendTo(n);
            r.append(n)
        });
        t.replaceWith(r)
    })
}(window.Rainbow);

// Sticky Plugin v1.0.0 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 2/14/2011
// Date: 2/12/2012
// Website: http://labs.anthonygarand.com/sticky
// Description: Makes an element on the page stick on the screen as you scroll
//       It will only set the 'top' and 'position' of your element, you
//       might need to adjust the width in some cases.
(function($) {
    var defaults = { topSpacing: 0, bottomSpacing: 0, className: 'is-sticky', wrapperClassName: 'sticky-wrapper', center: false, getWidthFrom: '' },
        $window = $(window),
        $document = $(document),
        sticked = [],
        windowHeight = $window.height(),
        scroller = function() {
            var scrollTop = $window.scrollTop(),
                documentHeight = $document.height(),
                dwh = documentHeight - windowHeight,
                extra = (scrollTop > dwh) ? dwh - scrollTop : 0;
            for (var i = 0; i < sticked.length; i++) {
                var s = sticked[i],
                    elementTop = s.stickyWrapper.offset().top,
                    etse = elementTop - s.topSpacing - extra;
                if (scrollTop <= etse) {
                    if (s.currentTop !== null) {
                        s.stickyElement.css('position', '').css('top', '');
                        s.stickyElement.parent().removeClass(s.className);
                        s.currentTop = null
                    }
                } else {
                    var newTop = documentHeight - s.stickyElement.outerHeight() - s.topSpacing - s.bottomSpacing - scrollTop - extra;
                    if (newTop < 0) { newTop = newTop + s.topSpacing } else { newTop = s.topSpacing }
                    if (s.currentTop != newTop) {
                        s.stickyElement.css('position', 'fixed').css('top', newTop);
                        if (typeof s.getWidthFrom !== 'undefined') { s.stickyElement.css('width', $(s.getWidthFrom).width()) }
                        s.stickyElement.parent().addClass(s.className);
                        s.currentTop = newTop
                    }
                }
            }
        },
        resizer = function() { windowHeight = $window.height() },
        methods = {
            init: function(options) {
                var o = $.extend(defaults, options);
                return this.each(function() {
                    var stickyElement = $(this);
                    stickyId = stickyElement.attr('id');
                    wrapper = $('<div></div>').attr('id', stickyId + '-sticky-wrapper').addClass(o.wrapperClassName);
                    stickyElement.wrapAll(wrapper);
                    if (o.center) { stickyElement.parent().css({ width: stickyElement.outerWidth(), marginLeft: "auto", marginRight: "auto" }) }
                    if (stickyElement.css("float") == "right") { stickyElement.css({ "float": "none" }).parent().css({ "float": "right" }) } else if (stickyElement.css("float") == "left") { stickyElement.css({ "float": "none" }).parent().css({ "float": "left" }) }
                    var stickyWrapper = stickyElement.parent();
                    stickyWrapper.css('height', stickyElement.outerHeight());
                    sticked.push({ topSpacing: o.topSpacing, bottomSpacing: o.bottomSpacing, stickyElement: stickyElement, currentTop: null, stickyWrapper: stickyWrapper, className: o.className, getWidthFrom: o.getWidthFrom })
                })
            },
            update: scroller
        };
    if (window.addEventListener) {
        window.addEventListener('scroll', scroller, false);
        window.addEventListener('resize', resizer, false)
    } else if (window.attachEvent) {
        window.attachEvent('onscroll', scroller);
        window.attachEvent('onresize', resizer)
    }
    $.fn.sticky = function(method) { if (methods[method]) { return methods[method].apply(this, Array.prototype.slice.call(arguments, 1)) } else if (typeof method === 'object' || !method) { return methods.init.apply(this, arguments) } else { $.error('Method ' + method + ' does not exist on jQuery.sticky') } };
    $(function() { setTimeout(scroller, 0) })
})(jQuery);