/*!
Waypoints - 4.0.1
Copyright © 2011-2016 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blob/master/licenses.txt
*/
!function () {
    "use strict";

    function t(o) {
        if (!o) throw new Error("No options passed to Waypoint constructor");
        if (!o.element) throw new Error("No element option passed to Waypoint constructor");
        if (!o.handler) throw new Error("No handler option passed to Waypoint constructor");
        this.key = "waypoint-" + e, this.options = t.Adapter.extend({}, t.defaults, o), this.element = this.options.element, this.adapter = new t.Adapter(this.element), this.callback = o.handler, this.axis = this.options.horizontal ? "horizontal" : "vertical", this.enabled = this.options.enabled, this.triggerPoint = null, this.group = t.Group.findOrCreate({
            name: this.options.group,
            axis: this.axis
        }), this.context = t.Context.findOrCreateByElement(this.options.context), t.offsetAliases[this.options.offset] && (this.options.offset = t.offsetAliases[this.options.offset]), this.group.add(this), this.context.add(this), i[this.key] = this, e += 1
    }

    var e = 0, i = {};
    t.prototype.queueTrigger = function (t) {
        this.group.queueTrigger(this, t)
    }, t.prototype.trigger = function (t) {
        this.enabled && this.callback && this.callback.apply(this, t)
    }, t.prototype.destroy = function () {
        this.context.remove(this), this.group.remove(this), delete i[this.key]
    }, t.prototype.disable = function () {
        return this.enabled = !1, this
    }, t.prototype.enable = function () {
        return this.context.refresh(), this.enabled = !0, this
    }, t.prototype.next = function () {
        return this.group.next(this)
    }, t.prototype.previous = function () {
        return this.group.previous(this)
    }, t.invokeAll = function (t) {
        var e = [];
        for (var o in i) e.push(i[o]);
        for (var n = 0, r = e.length; r > n; n++) e[n][t]()
    }, t.destroyAll = function () {
        t.invokeAll("destroy")
    }, t.disableAll = function () {
        t.invokeAll("disable")
    }, t.enableAll = function () {
        t.Context.refreshAll();
        for (var e in i) i[e].enabled = !0;
        return this
    }, t.refreshAll = function () {
        t.Context.refreshAll()
    }, t.viewportHeight = function () {
        return window.innerHeight || document.documentElement.clientHeight
    }, t.viewportWidth = function () {
        return document.documentElement.clientWidth
    }, t.adapters = [], t.defaults = {context: window, continuous: !0, enabled: !0, group: "default", horizontal: !1, offset: 0}, t.offsetAliases = {
        "bottom-in-view": function () {
            return this.context.innerHeight() - this.adapter.outerHeight()
        }, "right-in-view": function () {
            return this.context.innerWidth() - this.adapter.outerWidth()
        }
    }, window.Waypoint = t
}(), function () {
    "use strict";

    function t(t) {
        window.setTimeout(t, 1e3 / 60)
    }

    function e(t) {
        this.element = t, this.Adapter = n.Adapter, this.adapter = new this.Adapter(t), this.key = "waypoint-context-" + i, this.didScroll = !1, this.didResize = !1, this.oldScroll = {
            x: this.adapter.scrollLeft(),
            y: this.adapter.scrollTop()
        }, this.waypoints = {
            vertical: {},
            horizontal: {}
        }, t.waypointContextKey = this.key, o[t.waypointContextKey] = this, i += 1, n.windowContext || (n.windowContext = !0, n.windowContext = new e(window)), this.createThrottledScrollHandler(), this.createThrottledResizeHandler()
    }

    var i = 0, o = {}, n = window.Waypoint, r = window.onload;
    e.prototype.add = function (t) {
        var e = t.options.horizontal ? "horizontal" : "vertical";
        this.waypoints[e][t.key] = t, this.refresh()
    }, e.prototype.checkEmpty = function () {
        var t = this.Adapter.isEmptyObject(this.waypoints.horizontal), e = this.Adapter.isEmptyObject(this.waypoints.vertical), i = this.element == this.element.window;
        t && e && !i && (this.adapter.off(".waypoints"), delete o[this.key])
    }, e.prototype.createThrottledResizeHandler = function () {
        function t() {
            e.handleResize(), e.didResize = !1
        }

        var e = this;
        this.adapter.on("resize.waypoints", function () {
            e.didResize || (e.didResize = !0, n.requestAnimationFrame(t))
        })
    }, e.prototype.createThrottledScrollHandler = function () {
        function t() {
            e.handleScroll(), e.didScroll = !1
        }

        var e = this;
        this.adapter.on("scroll.waypoints", function () {
            (!e.didScroll || n.isTouch) && (e.didScroll = !0, n.requestAnimationFrame(t))
        })
    }, e.prototype.handleResize = function () {
        n.Context.refreshAll()
    }, e.prototype.handleScroll = function () {
        var t = {}, e = {
            horizontal: {newScroll: this.adapter.scrollLeft(), oldScroll: this.oldScroll.x, forward: "right", backward: "left"},
            vertical: {newScroll: this.adapter.scrollTop(), oldScroll: this.oldScroll.y, forward: "down", backward: "up"}
        };
        for (var i in e) {
            var o = e[i], n = o.newScroll > o.oldScroll, r = n ? o.forward : o.backward;
            for (var s in this.waypoints[i]) {
                var a = this.waypoints[i][s];
                if (null !== a.triggerPoint) {
                    var l = o.oldScroll < a.triggerPoint, h = o.newScroll >= a.triggerPoint, p = l && h, u = !l && !h;
                    (p || u) && (a.queueTrigger(r), t[a.group.id] = a.group)
                }
            }
        }
        for (var c in t) t[c].flushTriggers();
        this.oldScroll = {x: e.horizontal.newScroll, y: e.vertical.newScroll}
    }, e.prototype.innerHeight = function () {
        return this.element == this.element.window ? n.viewportHeight() : this.adapter.innerHeight()
    }, e.prototype.remove = function (t) {
        delete this.waypoints[t.axis][t.key], this.checkEmpty()
    }, e.prototype.innerWidth = function () {
        return this.element == this.element.window ? n.viewportWidth() : this.adapter.innerWidth()
    }, e.prototype.destroy = function () {
        var t = [];
        for (var e in this.waypoints) for (var i in this.waypoints[e]) t.push(this.waypoints[e][i]);
        for (var o = 0, n = t.length; n > o; o++) t[o].destroy()
    }, e.prototype.refresh = function () {
        var t, e = this.element == this.element.window, i = e ? void 0 : this.adapter.offset(), o = {};
        this.handleScroll(), t = {
            horizontal: {
                contextOffset: e ? 0 : i.left,
                contextScroll: e ? 0 : this.oldScroll.x,
                contextDimension: this.innerWidth(),
                oldScroll: this.oldScroll.x,
                forward: "right",
                backward: "left",
                offsetProp: "left"
            },
            vertical: {
                contextOffset: e ? 0 : i.top,
                contextScroll: e ? 0 : this.oldScroll.y,
                contextDimension: this.innerHeight(),
                oldScroll: this.oldScroll.y,
                forward: "down",
                backward: "up",
                offsetProp: "top"
            }
        };
        for (var r in t) {
            var s = t[r];
            for (var a in this.waypoints[r]) {
                var l, h, p, u, c, d = this.waypoints[r][a], f = d.options.offset, w = d.triggerPoint, y = 0, g = null == w;
                d.element !== d.element.window && (y = d.adapter.offset()[s.offsetProp]), "function" == typeof f ? f = f.apply(d) : "string" == typeof f && (f = parseFloat(f), d.options.offset.indexOf("%") > -1 && (f = Math.ceil(s.contextDimension * f / 100))), l = s.contextScroll - s.contextOffset, d.triggerPoint = Math.floor(y + l - f), h = w < s.oldScroll, p = d.triggerPoint >= s.oldScroll, u = h && p, c = !h && !p, !g && u ? (d.queueTrigger(s.backward), o[d.group.id] = d.group) : !g && c ? (d.queueTrigger(s.forward), o[d.group.id] = d.group) : g && s.oldScroll >= d.triggerPoint && (d.queueTrigger(s.forward), o[d.group.id] = d.group)
            }
        }
        return n.requestAnimationFrame(function () {
            for (var t in o) o[t].flushTriggers()
        }), this
    }, e.findOrCreateByElement = function (t) {
        return e.findByElement(t) || new e(t)
    }, e.refreshAll = function () {
        for (var t in o) o[t].refresh()
    }, e.findByElement = function (t) {
        return o[t.waypointContextKey]
    }, window.onload = function () {
        r && r(), e.refreshAll()
    }, n.requestAnimationFrame = function (e) {
        var i = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || t;
        i.call(window, e)
    }, n.Context = e
}(), function () {
    "use strict";

    function t(t, e) {
        return t.triggerPoint - e.triggerPoint
    }

    function e(t, e) {
        return e.triggerPoint - t.triggerPoint
    }

    function i(t) {
        this.name = t.name, this.axis = t.axis, this.id = this.name + "-" + this.axis, this.waypoints = [], this.clearTriggerQueues(), o[this.axis][this.name] = this
    }

    var o = {vertical: {}, horizontal: {}}, n = window.Waypoint;
    i.prototype.add = function (t) {
        this.waypoints.push(t)
    }, i.prototype.clearTriggerQueues = function () {
        this.triggerQueues = {up: [], down: [], left: [], right: []}
    }, i.prototype.flushTriggers = function () {
        for (var i in this.triggerQueues) {
            var o = this.triggerQueues[i], n = "up" === i || "left" === i;
            o.sort(n ? e : t);
            for (var r = 0, s = o.length; s > r; r += 1) {
                var a = o[r];
                (a.options.continuous || r === o.length - 1) && a.trigger([i])
            }
        }
        this.clearTriggerQueues()
    }, i.prototype.next = function (e) {
        this.waypoints.sort(t);
        var i = n.Adapter.inArray(e, this.waypoints), o = i === this.waypoints.length - 1;
        return o ? null : this.waypoints[i + 1]
    }, i.prototype.previous = function (e) {
        this.waypoints.sort(t);
        var i = n.Adapter.inArray(e, this.waypoints);
        return i ? this.waypoints[i - 1] : null
    }, i.prototype.queueTrigger = function (t, e) {
        this.triggerQueues[e].push(t)
    }, i.prototype.remove = function (t) {
        var e = n.Adapter.inArray(t, this.waypoints);
        e > -1 && this.waypoints.splice(e, 1)
    }, i.prototype.first = function () {
        return this.waypoints[0]
    }, i.prototype.last = function () {
        return this.waypoints[this.waypoints.length - 1]
    }, i.findOrCreate = function (t) {
        return o[t.axis][t.name] || new i(t)
    }, n.Group = i
}(), function () {
    "use strict";

    function t(t) {
        this.$element = e(t)
    }

    var e = window.jQuery, i = window.Waypoint;
    e.each(["innerHeight", "innerWidth", "off", "offset", "on", "outerHeight", "outerWidth", "scrollLeft", "scrollTop"], function (e, i) {
        t.prototype[i] = function () {
            var t = Array.prototype.slice.call(arguments);
            return this.$element[i].apply(this.$element, t)
        }
    }), e.each(["extend", "inArray", "isEmptyObject"], function (i, o) {
        t[o] = e[o]
    }), i.adapters.push({name: "jquery", Adapter: t}), i.Adapter = t
}(), function () {
    "use strict";

    function t(t) {
        return function () {
            var i = [], o = arguments[0];
            return t.isFunction(arguments[0]) && (o = t.extend({}, arguments[1]), o.handler = arguments[0]), this.each(function () {
                var n = t.extend({}, o, {element: this});
                "string" == typeof n.context && (n.context = t(this).closest(n.context)[0]), i.push(new e(n))
            }), i
        }
    }

    var e = window.Waypoint;
    window.jQuery && (window.jQuery.fn.waypoint = t(window.jQuery)), window.Zepto && (window.Zepto.fn.waypoint = t(window.Zepto))
}();

// Global namespace variable
var sitevars = {};

jQuery(document).ready(function ($) {

    $("html:first").removeClass("no-js");

    // #Preloader
    setTimeout(function () {
        $('.preloader').addClass('hide-preloader');
    }, 2000);

    // #Nav #Slide #Out
    $('.nav-toggle').on('click', function () {
        $('html').toggleClass('nav-open');
        setTimeout(function () {
            $('html').toggleClass('nav-opened');

            $('body').on('touchmove', function (e) {
                e.preventDefault()
            });
            $('.side-nav').on("touchmove", function (e) {
                e.stopPropagation()
            });
        }, 250);
        $('.menu-item-has-children').removeClass('is-active');
        $('.menu').removeClass('is-active');
        $('.close-sub-nav').removeClass('is-active');
    });

    // #Mobile Sub menu
    $('.menu-item-has-children > a').on('click', function () {
        $(this).parent().toggleClass('is-active');
        $(this).closest('.menu').toggleClass('is-active');
        $('.close-sub-nav').toggleClass('is-active');
        // $(this).parent().find('.sub-menu').slideToggle(200);
        return false;
    });

    $('.close-sub-nav').click(function () {
        $('.menu-item-has-children').removeClass('is-active');
        $('.menu').removeClass('is-active');
        $(this).removeClass('is-active');
        return false;
    });


    // $(document).on('click', '.menu-item-has-children > a', function () {
    //     return false;
    // });

    // // #Nav #Slide #Out
    // $('.nav-toggle').on('click', function () {
    //     $('html').toggleClass('nav-open');
    //     setTimeout(function () {
    //         $('html').toggleClass('nav-opened');

    //         $('body').on('touchmove', function (e) {
    //             e.preventDefault()
    //         });
    //         $('.side-nav').on("touchmove", function (e) {
    //             e.stopPropagation()
    //         });
    //     }, 250);
    // });

    //#Header #Scroll
    $(window).on("scroll", function () {
        if ($(window).scrollTop() >= 10) {
            $(".header").addClass("is-active");
        } else {
            $(".header").removeClass("is-active");
        }
    });

    if ($('.section--has-side-nav .side-nav').length) {
        if ($(window).width() < 640) {
            $(".side-nav .item.active").scrollLeft(300);
        }
        ;
    }
    ;

    // #Modal
    if ($('.modal').length) {
        $('.modal-inner .close-modal').on('click', function (e) {
            $('.modal').removeClass('is-active');
            e.preventDefault();
        });
        $('.has-modal').on('click', function (e) {
            $('.modal').addClass('is-active');
        });
    }
    ;

    // #Accordion
    function startAccordion() {
        if ($('.section--faqs').length) {
            $('.accordion-content').hide();
            $('.accordion-content.is-active').show();
        }

        $('.accordion-title').on('click', function () {
            if ($(this).next().is(':hidden')) {
                $('.accordion-content').slideUp();
                $('.accordion-title').removeClass('is-active');
                $(this).next().slideToggle(function () {
                    $('html, body').stop().animate(500);
                });
                $(this).toggleClass('is-active');
            } else {
                $(this).next().slideToggle();
                $(this).toggleClass('is-active');
            }
        });
    }

    startAccordion();


    // #book #pagination #prev
    $('.section--single-pagination .prev-link').mouseover(function () {
        $('.section--single-pagination .next-link a').css('color', '#cfcfcf');
    });
    $('.section--single-pagination .prev-link').mouseout(function () {
        $('.section--single-pagination .next-link a').css('color', '#000');
    });

    // #book #pagination #next
    $('.section--single-pagination .next-link').mouseover(function () {
        $('.section--single-pagination .prev-link a').css('color', '#cfcfcf');
    });
    $('.section--single-pagination .next-link').mouseout(function () {
        $('.section--single-pagination .prev-link a').css('color', '#000');
    });


    //Waypoints
    function startWaypoints() {
        var itemQueue = []
        var delay = 300
        var queueTimer

        function processItemQueue() {
            if (queueTimer) return
            queueTimer = window.setInterval(function () {
                if (itemQueue.length) {
                    $(itemQueue.shift()).addClass('animate');
                    processItemQueue()
                } else {
                    window.clearInterval(queueTimer)
                    queueTimer = null
                }
            }, delay)
        }

        $('.card-book, .card-event, .card-post, .card-press, .card-philanthropy').waypoint(function () {
            if (!$(this).hasClass('animate')) {
                itemQueue.push(this.element)
                processItemQueue()
            }
        }, {
            offset: '90%'
        });
    }

    startWaypoints();


    // #ajax #pages
    $(document).on('click', '.js-about-link', function () {
        var page_id = $(this).data('page_id');
        var slug = $(this).data('slug');
        $('.item').removeClass('active');
        $('.js-about .load-more-container').hide();
        update_pages(page_id, slug);
        $(this).closest('.item').addClass('active');
        return false;
    });

    function update_pages(page_id, slug) {
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "get_about_pages",
                page_id: page_id
            },
            dataType: "json",
            beforeSend: function () {
                $(".loading-container").addClass("is-active");
            },
            success: function (data) {
                var items = $(data.html);
                $('.js-about .load-more-container').show().html(items);
                $(".loading-container").removeClass("is-active");
                window.history.pushState(document.location.href, "", slug);
                startWaypoints();
                startTestimonials();
                startAccordion();
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    }


    // #Ajax book posts
    $(document).on('click', '.js-category-link', function () {
        var category_value = $(this).data('value');
        $('.item').removeClass('active');
        $('.js-books .load-more-container').hide();
        update_books(category_value, 1);
        $(this).closest('.item').addClass('active');
        return false;
    });

    function update_books(category) {
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "get_book_posts",
                cat: category
            },
            dataType: "json",
            beforeSend: function () {
                $(".loading-container").addClass("is-active");
            },
            success: function (data) {
                console.log(category);
                var items = $(data.html);
                $('.js-books .load-more-container').show().html(items);
                $(".loading-container").removeClass("is-active");
                startWaypoints();
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    }


    // Dropdown
    if ($('.js-dropdown-toggle').length) {

        $('.js-dropdown-toggle').click(function () {
            var dropdown = $(this).data('toggle');

            $('[data-toggle]').not('[data-toggle="' + dropdown + '"]').removeClass('is-active');
            $('.js-dropdown-body[data-toggle]').not('.js-dropdown-body[data-toggle="' + dropdown + '"]').slideUp();

            $('.js-dropdown-body[data-toggle="' + dropdown + '"]').slideToggle();
            $(this).toggleClass('is-active');
        });

    }

    if ($('.js-dropdown-item-ajax').length) {

        $('.js-dropdown-item-ajax').click(function () {

            $(this).closest('.js-dropdown-toggle').removeClass('is-active');
            $(this).closest('.js-dropdown-body').slideUp();
        });

    }

    if ($('.js-book-trail-intro').length) {

        $('.js-book-trail-intro-toggle').click(function () {

            $(this).toggleClass('is-active');
            $('.js-book-trail-intro').toggleClass('is-hidden');
            $('.js-book-trail-intro .container').slideToggle();
        });

    }

    if ($('.js-booktrail-map-info').length) {

        $('.js-booktrail-map-info-close').click(function () {
            $('.js-booktrail-map-info').fadeOut(600);
            $('.js-booktrail-map-panel').addClass('booktrail-map-info-closed');

            var MyAjax = {
                ajaxurl: site_url + "/wp-admin/admin-ajax.php"
            };

            $.post(
                MyAjax.ajaxurl, {action: 'map_popup_closed'},
                function (response) {
                }
            );

            return false;

        });

    }


    if ($('.js-recenter-btn-info-close').length) {


        $('.js-recenter-btn-info-close').click(function () {
            $('.js-recenter-btn-info').fadeOut(600);

            var MyAjax = {
                ajaxurl: site_url + "/wp-admin/admin-ajax.php"
            };

            $.post(
                MyAjax.ajaxurl, {action: 'recenter_btn_closed'},
                function (response) {
                }
            );

            return false;

        });

    }


    if ($('.js-enter-btn-info-close').length) {

        $('.js-enter-btn-info-close').click(function () {
            $('.js-enter-btn-info').fadeOut(600);

            var MyAjax = {
                ajaxurl: site_url + "/wp-admin/admin-ajax.php"
            };

            $.post(
                MyAjax.ajaxurl, {action: 'competition_btn_closed'},
                function (response) {
                }
            );

            return false;

        });

    }


    // #Ajax book trails
    $(document).on('click', '.js-book-trail-link', function () {
        var booktrail_book = $(this).data('book');
        $('.js-load-booktrail-info .load-more-container').hide();
        update_booktrails(booktrail_book, 1);
        $('.js-book-trail-link').removeClass('is-active');
        $(this).addClass('active');
        return false;
    });

    function update_booktrails(trail_id) {
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "get_booktrail_posts",
                cat: trail_id
            },
            dataType: "json",
            beforeSend: function () {
                $(".js-load-booktrail-info .loading-container").addClass("is-active");
            },
            success: function (data) {
                var items = $(data.html);
                $('.js-load-booktrail-info .load-more-container').show().html(items);
                $(".js-load-booktrail-info .loading-container").removeClass("is-active");
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    }


    //Pagination AJAX
    var ajax_pagination_request = false;
    $('body').on('click touchend', '.ur-load-more-link', function (e) {
        if (ajax_pagination_request) {
            return;
        } else {
            e.preventDefault();
            var url = this.href;
            var pageNo = $(this).attr('data-current');
            var pageType = $(this).attr('data-page-type');
            var nextPage = $(this).attr('data-next');
            var ppp = $(this).attr('data-ppp');
            var hover_text = $(this).attr('data-js-hover');
            var button_text = $(this).text();

            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'ur_load_more',
                    pageNo: pageNo,
                    ppp: ppp,
                    nextPage: nextPage,
                    pageType: pageType,
                },
                beforeSend: function () {
                    ajax_pagination_request = true;
                    $('.ur-load-more-link').text(hover_text);
                },
                success: function (response) {
                    $('.ur-load-more').remove();
                    $('.load-more-container').append(response);
                    $('.ur-load-more-link').text(button_text);
                    startWaypoints();

                    if ((history.pushState) && (url !== '')) {
                        history.pushState(null, null, url);
                    }
                    ajax_pagination_request = false;
                }
            });
        }
    });

    // #Testimonials #Slider
    function startTestimonials() {
        if ($('.testimonials--standard').length) {
            $('.testimonials--standard').each(function () {
                var js_var = $(this).data('js-var');
                create_testimonials_standard('.testimonials--standard[data-js-var="' + js_var + '"]', js_var);
            });
            var slider = $(".testimonials--standard").data('royalSlider');

            $('.cursor-left').on('click', function () {
                slider.prev();
            });
            $('.cursor-right').on('click', function () {
                slider.next();
            });
        }
    }

    startTestimonials();

    // #Map
    if ($('.map--standard').length) {
        $('.map--standard').each(function () {
            var map_id = $(this).attr('id');
            var latlng = $(this).data('latlng').split(',');
            var js_var = $(this).data('js-var');

            create_map_standard(map_id, latlng, js_var);
        });
    }


    // Book Trails
    if ($('#map_book_trail').length) {

        create_book_trail('map_book_trail');

        book_trail_timer();

        $(document).on('click', '.js-booktrail-info-toggle', function (e) {
            $(this).toggleClass('is-active');
            $('.js-booktrail-info-panel').toggleClass('is-active');
            $('.js-booktrail-info-toggle-alt').toggleClass('is-active');
        });

        $(document).on('click', '.js-booktrail-info-toggle-alt', function (e) {
            $('.js-booktrail-info-panel-alt').toggleClass('is-active');
        });

        $(document).on('click', '.js-booktrail-form-close', function (e) {
            $('.js-booktrail-form').removeClass('is-active');
        });

        $(document).on('click', '.js-booktrail-form-open', function (e) {
            $('.js-booktrail-form').addClass('is-active');
        });

    }

});


var book_trail_map;
var current_pos_marker;
var current_location_latlng = {
    lat: 0,
    lng: 0
};
var locations = {};
var init_location_set = false;
var dragged = false;

$(document).on('click', '.js-booktrail-recenter', function () {
    dragged = false;

    create_book_trail('map_book_trail');


    $('.js-booktrail-recenter-wrapper').hide();
    update_current_location();
    return false;
});

function book_trail_timer() {
    setTimeout(function () {
        update_current_location();
        book_trail_timer();
    }, 1000);
}

function create_book_trail(map_id) {

    var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [{visibility: "off"}]
    }];

    var mapOptions = {
        zoom: 17,
        backgroundColor: '#eeeeee',
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles,
        panControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        zoomControl: true,
        fullscreenControl: false,
        scrollwheel: false
    };

    book_trail_map = new google.maps.Map(document.getElementById(map_id), mapOptions);

    google.maps.event.addListener(book_trail_map, 'dragstart', function () {
        $('.js-booktrail-recenter-wrapper').show();
        dragged = true;
    });

    var bounds = new google.maps.LatLngBounds();

    var image = {
        url: theme_url + '/img/marker.png', // url
    };

    var image_active = {
        url: theme_url + '/img/marker-active.png', // url
    };

    var labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];
    var labelIndex = 0;
    var location_markers = [];

    book_trail_plots.forEach(function (plot) {
        var plot_latlng = new google.maps.LatLng(plot.plot_marker.lat, plot.plot_marker.lng);
        bounds.extend(plot_latlng);

        var marker = new google.maps.Marker({
            label: labels[labelIndex++ % labels.length],
            map: book_trail_map,
            position: plot_latlng,
            icon: image,
            zIndex: 1
        });

        locations[plot.uid] = marker;
        location_markers.push(marker);

        marker.addListener('click', function () {
            update_location_info(plot.booktrail_id, plot.uid, false);
            $(this).addClass('is-active');

            for (var j = 0; j < location_markers.length; j++) {
                location_markers[j].setIcon(image);
            }
            this.setIcon(image_active);
            $('.js-booktrail-info-panel').addClass('is-active');
            $('.js-booktrail-info-toggle-alt').addClass('is-active');
        });
    });

    update_current_location();

    var markerCluster = new MarkerClusterer(book_trail_map, Object.values(locations),
        {
            zIndex: 1,
            imagePath: theme_url + '/img/marker-cluster.png', styles: [
                {
                    height: 53,
                    url: theme_url + '/img/marker-cluster.png',
                    width: 53,
                }
            ]
        });

    markerCluster.setCalculator(function (markers, numStyles) {
        var index = 0;
        var count = markers.length;
        var dv = count;
        while (dv !== 0) {
            dv = parseInt(dv / 10, 10);
            index++;
        }

        index = Math.min(index, numStyles);
        return {
            text: "", // set to empty string
            index: index,
            zIndex: 1
        };
    });

    book_trail_map.fitBounds(bounds);

    var infowindow = new google.maps.InfoWindow({
        content: 'test'
    });

    sitevars['book_trail'] = book_trail_map;
}

function update_current_location() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            if (current_location_latlng.lat !== position.coords.latitude || current_location_latlng.lng !== position.coords.longitude) {
                if (current_pos_marker !== undefined) {
                    current_pos_marker.setMap(null);
                }

                var current_pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                if (init_location_set === false) {
                    // book_trail_map.setCenter(current_pos);
                    init_location_set = true;
                }

                current_pos_marker = new google.maps.Marker({
                    map: book_trail_map,
                    position: current_pos,
                    icon: theme_url + '/img/marker-location.png',
                    zIndex: 10
                });

                var closest_distance = update_distances(current_pos);

                if (closest_distance < 1000) {
                    if (!dragged) {
                        book_trail_map.setCenter(current_pos);
                    }
                }

                current_location_latlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
            }
        }, function () {
            handleLocationError(true, map.getCenter());
        });
    } else {
        handleLocationError(false, map.getCenter());
    }
}

google.maps.event.addListener(current_pos_marker, 'dragend', function () {
    var cur_pos = current_pos_marker.getPosition();
    update_distances(cur_pos);

    $('.js-current-pos .lat').html(cur_pos.lat());
    $('.js-current-pos .lng').html(cur_pos.lng());
});

function update_distances(current_pos) {
    var closest_distance = 999999;
    var closest_plot;

    // Check if need to update distances if the user has moved
    book_trail_plots.forEach(function (plot) {
        var distance_to_current = distance(current_pos.lat(), current_pos.lng(), plot.plot_marker.lat, plot.plot_marker.lng);

        if (distance_to_current < closest_distance) {
            closest_distance = distance_to_current;
            closest_plot = plot;
        }

    });

    // If distance is closer than 20 meters show popup
    if (closest_distance < 20) {
        // locations[closest_plot.uid].setAnimation(google.maps.Animation.BOUNCE);
        update_location_info(closest_plot.booktrail_id, closest_plot.uid, true);
    }

    return closest_distance;
}

/**
 * Gets location information
 *
 * @param book_trail_id
 * @param location_id
 * @param at_location
 */
function update_location_info(book_trail_id, location_id, at_location) {
    $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
            action: "got_to_location",
            book_trail_id: book_trail_id,
            location_id: location_id,
            at_location: at_location
        },
        dataType: "json",
        success: function (data) {
            if (at_location === false) {
                $('.js-booktrail-info').html(data.html);
                $('.js-collected-letters').html(data.collected_letters);
            }
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
    });
}

/**
 * Find the distance between two points
 *
 * @param lat1
 * @param lon1
 * @param lat2
 * @param lon2
 * @returns {number}
 */
function distance(lat1, lon1, lat2, lon2) {
    if ((lat1 == lat2) && (lon1 == lon2)) {
        return 0;
    } else {
        var radlat1 = Math.PI * lat1 / 180;
        var radlat2 = Math.PI * lat2 / 180;
        var theta = lon1 - lon2;
        var radtheta = Math.PI * theta / 180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180 / Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1609.344; // To meters

        return dist;
    }
}

/**
 * Handle geocode error
 *
 * @param browserHasGeolocation
 * @param pos
 */
function handleLocationError(browserHasGeolocation, pos) {
    alert(pos);
    alert(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}

function create_testimonials_standard(slider_class, slider_var) {
    var slider = $(slider_class).royalSlider({
        slidesSpacing: 80,
        sliderTouch: false,
        addActiveClass: true,
        arrowsNav: true,
        loop: true,
        arrowsNavAutoHide: false,
        controlNavigation: 'bullets',
        autoScaleSlider: false,
        imageScaleMode: 'none',
        imageAlignCenter: false,
        imageScalePadding: 0,
        autoHeight: true,
        autoPlay: {
            enabled: true,
            delay: 3000
        }
    }).data('royalSlider');

    sitevars[slider_var] = slider;
}

function create_map_standard(map_id, latlng, map_var) {
    var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [{visibility: "off"}]
    }];

    var mapOptions = {
        zoom: 14,
        backgroundColor: '#eeeeee',
        center: new google.maps.LatLng(latlng[0], latlng[1]),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: myStyles,
        panControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        zoomControl: true,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById(map_id), mapOptions);

    var image = {
        url: theme_url + '/img/marker.png', // url
    };

    var marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(latlng[0], latlng[1]),
        icon: image
    });

    sitevars[map_var] = map;
}
