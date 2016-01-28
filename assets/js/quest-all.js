/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-cssanimations-csstransitions-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 * Build: http://modernizr.com/download/#-csstransforms3d-csstransitions-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.csstransforms3d=function(){var a=!!F("perspective");return a&&"webkitPerspective"in g.style&&w("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
/*!
 * Bootstrap v3.3.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

if (typeof jQuery === 'undefined') {
    throw new Error('Bootstrap\'s JavaScript requires jQuery')
}

+function ($) {
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1)) {
        throw new Error('Bootstrap\'s JavaScript requires jQuery version 1.9.1 or higher')
    }
}(jQuery);

/* ========================================================================
 * Bootstrap: transition.js v3.3.1
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
    // ============================================================

    function transitionEnd() {
        var el = document.createElement('bootstrap')

        var transEndEventNames = {
            WebkitTransition: 'webkitTransitionEnd',
            MozTransition: 'transitionend',
            OTransition: 'oTransitionEnd otransitionend',
            transition: 'transitionend'
        }

        for (var name in transEndEventNames) {
            if (el.style[name] !== undefined) {
                return {end: transEndEventNames[name]}
            }
        }

        return false // explicit for ie8 (  ._.)
    }

    // http://blog.alexmaccaw.com/css-transitions
    $.fn.emulateTransitionEnd = function (duration) {
        var called = false
        var $el = this
        $(this).one('bsTransitionEnd', function () {
            called = true
        })
        var callback = function () {
            if (!called) $($el).trigger($.support.transition.end)
        }
        setTimeout(callback, duration)
        return this
    }

    $(function () {
        $.support.transition = transitionEnd()

        if (!$.support.transition) return

        $.event.special.bsTransitionEnd = {
            bindType: $.support.transition.end,
            delegateType: $.support.transition.end,
            handle: function (e) {
                if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        }
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: alert.js v3.3.1
 * http://getbootstrap.com/javascript/#alerts
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // ALERT CLASS DEFINITION
    // ======================

    var dismiss = '[data-dismiss="alert"]'
    var Alert = function (el) {
        $(el).on('click', dismiss, this.close)
    }

    Alert.VERSION = '3.3.1'

    Alert.TRANSITION_DURATION = 150

    Alert.prototype.close = function (e) {
        var $this = $(this)
        var selector = $this.attr('data-target')

        if (!selector) {
            selector = $this.attr('href')
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
        }

        var $parent = $(selector)

        if (e) e.preventDefault()

        if (!$parent.length) {
            $parent = $this.closest('.alert')
        }

        $parent.trigger(e = $.Event('close.bs.alert'))

        if (e.isDefaultPrevented()) return

        $parent.removeClass('in')

        function removeElement() {
            // detach from parent, fire event then clean up data
            $parent.detach().trigger('closed.bs.alert').remove()
        }

        $.support.transition && $parent.hasClass('fade') ?
            $parent
                .one('bsTransitionEnd', removeElement)
                .emulateTransitionEnd(Alert.TRANSITION_DURATION) :
            removeElement()
    }


    // ALERT PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.alert')

            if (!data) $this.data('bs.alert', (data = new Alert(this)))
            if (typeof option == 'string') data[option].call($this)
        })
    }

    var old = $.fn.alert

    $.fn.alert = Plugin
    $.fn.alert.Constructor = Alert


    // ALERT NO CONFLICT
    // =================

    $.fn.alert.noConflict = function () {
        $.fn.alert = old
        return this
    }


    // ALERT DATA-API
    // ==============

    $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(jQuery);

/* ========================================================================
 * Bootstrap: button.js v3.3.1
 * http://getbootstrap.com/javascript/#buttons
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // BUTTON PUBLIC CLASS DEFINITION
    // ==============================

    var Button = function (element, options) {
        this.$element = $(element)
        this.options = $.extend({}, Button.DEFAULTS, options)
        this.isLoading = false
    }

    Button.VERSION = '3.3.1'

    Button.DEFAULTS = {
        loadingText: 'loading...'
    }

    Button.prototype.setState = function (state) {
        var d = 'disabled'
        var $el = this.$element
        var val = $el.is('input') ? 'val' : 'html'
        var data = $el.data()

        state = state + 'Text'

        if (data.resetText == null) $el.data('resetText', $el[val]())

        // push to event loop to allow forms to submit
        setTimeout($.proxy(function () {
            $el[val](data[state] == null ? this.options[state] : data[state])

            if (state == 'loadingText') {
                this.isLoading = true
                $el.addClass(d).attr(d, d)
            } else if (this.isLoading) {
                this.isLoading = false
                $el.removeClass(d).removeAttr(d)
            }
        }, this), 0)
    }

    Button.prototype.toggle = function () {
        var changed = true
        var $parent = this.$element.closest('[data-toggle="buttons"]')

        if ($parent.length) {
            var $input = this.$element.find('input')
            if ($input.prop('type') == 'radio') {
                if ($input.prop('checked') && this.$element.hasClass('active')) changed = false
                else $parent.find('.active').removeClass('active')
            }
            if (changed) $input.prop('checked', !this.$element.hasClass('active')).trigger('change')
        } else {
            this.$element.attr('aria-pressed', !this.$element.hasClass('active'))
        }

        if (changed) this.$element.toggleClass('active')
    }


    // BUTTON PLUGIN DEFINITION
    // ========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.button')
            var options = typeof option == 'object' && option

            if (!data) $this.data('bs.button', (data = new Button(this, options)))

            if (option == 'toggle') data.toggle()
            else if (option) data.setState(option)
        })
    }

    var old = $.fn.button

    $.fn.button = Plugin
    $.fn.button.Constructor = Button


    // BUTTON NO CONFLICT
    // ==================

    $.fn.button.noConflict = function () {
        $.fn.button = old
        return this
    }


    // BUTTON DATA-API
    // ===============

    $(document)
        .on('click.bs.button.data-api', '[data-toggle^="button"]', function (e) {
            var $btn = $(e.target)
            if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
            Plugin.call($btn, 'toggle')
            e.preventDefault()
        })
        .on('focus.bs.button.data-api blur.bs.button.data-api', '[data-toggle^="button"]', function (e) {
            $(e.target).closest('.btn').toggleClass('focus', /^focus(in)?$/.test(e.type))
        })

}(jQuery);

/* ========================================================================
 * Bootstrap: carousel.js v3.3.1
 * http://getbootstrap.com/javascript/#carousel
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // CAROUSEL CLASS DEFINITION
    // =========================

    var Carousel = function (element, options) {
        this.$element = $(element)
        this.$indicators = this.$element.find('.carousel-indicators')
        this.options = options
        this.paused =
            this.sliding =
                this.interval =
                    this.$active =
                        this.$items = null

        this.options.keyboard && this.$element.on('keydown.bs.carousel', $.proxy(this.keydown, this))

        this.options.pause == 'hover' && !('ontouchstart' in document.documentElement) && this.$element
            .on('mouseenter.bs.carousel', $.proxy(this.pause, this))
            .on('mouseleave.bs.carousel', $.proxy(this.cycle, this))
    }

    Carousel.VERSION = '3.3.1'

    Carousel.TRANSITION_DURATION = 600

    Carousel.DEFAULTS = {
        interval: 5000,
        pause: 'hover',
        wrap: true,
        keyboard: true
    }

    Carousel.prototype.keydown = function (e) {
        if (/input|textarea/i.test(e.target.tagName)) return
        switch (e.which) {
            case 37:
                this.prev();
                break
            case 39:
                this.next();
                break
            default:
                return
        }

        e.preventDefault()
    }

    Carousel.prototype.cycle = function (e) {
        e || (this.paused = false)

        this.interval && clearInterval(this.interval)

        this.options.interval
        && !this.paused
        && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))

        return this
    }

    Carousel.prototype.getItemIndex = function (item) {
        this.$items = item.parent().children('.item')
        return this.$items.index(item || this.$active)
    }

    Carousel.prototype.getItemForDirection = function (direction, active) {
        var delta = direction == 'prev' ? -1 : 1
        var activeIndex = this.getItemIndex(active)
        var itemIndex = (activeIndex + delta) % this.$items.length
        return this.$items.eq(itemIndex)
    }

    Carousel.prototype.to = function (pos) {
        var that = this
        var activeIndex = this.getItemIndex(this.$active = this.$element.find('.item.active'))

        if (pos > (this.$items.length - 1) || pos < 0) return

        if (this.sliding)       return this.$element.one('slid.bs.carousel', function () {
            that.to(pos)
        }) // yes, "slid"
        if (activeIndex == pos) return this.pause().cycle()

        return this.slide(pos > activeIndex ? 'next' : 'prev', this.$items.eq(pos))
    }

    Carousel.prototype.pause = function (e) {
        e || (this.paused = true)

        if (this.$element.find('.next, .prev').length && $.support.transition) {
            this.$element.trigger($.support.transition.end)
            this.cycle(true)
        }

        this.interval = clearInterval(this.interval)

        return this
    }

    Carousel.prototype.next = function () {
        if (this.sliding) return
        return this.slide('next')
    }

    Carousel.prototype.prev = function () {
        if (this.sliding) return
        return this.slide('prev')
    }

    Carousel.prototype.slide = function (type, next) {
        var $active = this.$element.find('.item.active')
        var $next = next || this.getItemForDirection(type, $active)
        var isCycling = this.interval
        var direction = type == 'next' ? 'left' : 'right'
        var fallback = type == 'next' ? 'first' : 'last'
        var that = this

        if (!$next.length) {
            if (!this.options.wrap) return
            $next = this.$element.find('.item')[fallback]()
        }

        if ($next.hasClass('active')) return (this.sliding = false)

        var relatedTarget = $next[0]
        var slideEvent = $.Event('slide.bs.carousel', {
            relatedTarget: relatedTarget,
            direction: direction
        })
        this.$element.trigger(slideEvent)
        if (slideEvent.isDefaultPrevented()) return

        this.sliding = true

        isCycling && this.pause()

        if (this.$indicators.length) {
            this.$indicators.find('.active').removeClass('active')
            var $nextIndicator = $(this.$indicators.children()[this.getItemIndex($next)])
            $nextIndicator && $nextIndicator.addClass('active')
        }

        var slidEvent = $.Event('slid.bs.carousel', {relatedTarget: relatedTarget, direction: direction}) // yes, "slid"
        if ($.support.transition && this.$element.hasClass('slide')) {
            $next.addClass(type)
            $next[0].offsetWidth // force reflow
            $active.addClass(direction)
            $next.addClass(direction)
            $active
                .one('bsTransitionEnd', function () {
                    $next.removeClass([type, direction].join(' ')).addClass('active')
                    $active.removeClass(['active', direction].join(' '))
                    that.sliding = false
                    setTimeout(function () {
                        that.$element.trigger(slidEvent)
                    }, 0)
                })
                .emulateTransitionEnd(Carousel.TRANSITION_DURATION)
        } else {
            $active.removeClass('active')
            $next.addClass('active')
            this.sliding = false
            this.$element.trigger(slidEvent)
        }

        isCycling && this.cycle()

        return this
    }


    // CAROUSEL PLUGIN DEFINITION
    // ==========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.carousel')
            var options = $.extend({}, Carousel.DEFAULTS, $this.data(), typeof option == 'object' && option)
            var action = typeof option == 'string' ? option : options.slide

            if (!data) $this.data('bs.carousel', (data = new Carousel(this, options)))
            if (typeof option == 'number') data.to(option)
            else if (action) data[action]()
            else if (options.interval) data.pause().cycle()
        })
    }

    var old = $.fn.carousel

    $.fn.carousel = Plugin
    $.fn.carousel.Constructor = Carousel


    // CAROUSEL NO CONFLICT
    // ====================

    $.fn.carousel.noConflict = function () {
        $.fn.carousel = old
        return this
    }


    // CAROUSEL DATA-API
    // =================

    var clickHandler = function (e) {
        var href
        var $this = $(this)
        var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) // strip for ie7
        if (!$target.hasClass('carousel')) return
        var options = $.extend({}, $target.data(), $this.data())
        var slideIndex = $this.attr('data-slide-to')
        if (slideIndex) options.interval = false

        Plugin.call($target, options)

        if (slideIndex) {
            $target.data('bs.carousel').to(slideIndex)
        }

        e.preventDefault()
    }

    $(document)
        .on('click.bs.carousel.data-api', '[data-slide]', clickHandler)
        .on('click.bs.carousel.data-api', '[data-slide-to]', clickHandler)

    $(window).on('load', function () {
        $('[data-ride="carousel"]').each(function () {
            var $carousel = $(this)
            Plugin.call($carousel, $carousel.data())
        })
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: collapse.js v3.3.1
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // COLLAPSE PUBLIC CLASS DEFINITION
    // ================================

    var Collapse = function (element, options) {
        this.$element = $(element)
        this.options = $.extend({}, Collapse.DEFAULTS, options)
        this.$trigger = $(this.options.trigger).filter('[href="#' + element.id + '"], [data-target="#' + element.id + '"]')
        this.transitioning = null

        if (this.options.parent) {
            this.$parent = this.getParent()
        } else {
            this.addAriaAndCollapsedClass(this.$element, this.$trigger)
        }

        if (this.options.toggle) this.toggle()
    }

    Collapse.VERSION = '3.3.1'

    Collapse.TRANSITION_DURATION = 350

    Collapse.DEFAULTS = {
        toggle: true,
        trigger: '[data-toggle="collapse"]'
    }

    Collapse.prototype.dimension = function () {
        var hasWidth = this.$element.hasClass('width')
        return hasWidth ? 'width' : 'height'
    }

    Collapse.prototype.show = function () {
        if (this.transitioning || this.$element.hasClass('in')) return

        var activesData
        var actives = this.$parent && this.$parent.find('> .panel').children('.in, .collapsing')

        if (actives && actives.length) {
            activesData = actives.data('bs.collapse')
            if (activesData && activesData.transitioning) return
        }

        var startEvent = $.Event('show.bs.collapse')
        this.$element.trigger(startEvent)
        if (startEvent.isDefaultPrevented()) return

        if (actives && actives.length) {
            Plugin.call(actives, 'hide')
            activesData || actives.data('bs.collapse', null)
        }

        var dimension = this.dimension()

        this.$element
            .removeClass('collapse')
            .addClass('collapsing')[dimension](0)
            .attr('aria-expanded', true)

        this.$trigger
            .removeClass('collapsed')
            .attr('aria-expanded', true)

        this.transitioning = 1

        var complete = function () {
            this.$element
                .removeClass('collapsing')
                .addClass('collapse in')[dimension]('')
            this.transitioning = 0
            this.$element
                .trigger('shown.bs.collapse')
        }

        if (!$.support.transition) return complete.call(this)

        var scrollSize = $.camelCase(['scroll', dimension].join('-'))

        this.$element
            .one('bsTransitionEnd', $.proxy(complete, this))
            .emulateTransitionEnd(Collapse.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
    }

    Collapse.prototype.hide = function () {
        if (this.transitioning || !this.$element.hasClass('in')) return

        var startEvent = $.Event('hide.bs.collapse')
        this.$element.trigger(startEvent)
        if (startEvent.isDefaultPrevented()) return

        var dimension = this.dimension()

        this.$element[dimension](this.$element[dimension]())[0].offsetHeight

        this.$element
            .addClass('collapsing')
            .removeClass('collapse in')
            .attr('aria-expanded', false)

        this.$trigger
            .addClass('collapsed')
            .attr('aria-expanded', false)

        this.transitioning = 1

        var complete = function () {
            this.transitioning = 0
            this.$element
                .removeClass('collapsing')
                .addClass('collapse')
                .trigger('hidden.bs.collapse')
        }

        if (!$.support.transition) return complete.call(this)

        this.$element
            [dimension](0)
            .one('bsTransitionEnd', $.proxy(complete, this))
            .emulateTransitionEnd(Collapse.TRANSITION_DURATION)
    }

    Collapse.prototype.toggle = function () {
        this[this.$element.hasClass('in') ? 'hide' : 'show']()
    }

    Collapse.prototype.getParent = function () {
        return $(this.options.parent)
            .find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]')
            .each($.proxy(function (i, element) {
                var $element = $(element)
                this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
            }, this))
            .end()
    }

    Collapse.prototype.addAriaAndCollapsedClass = function ($element, $trigger) {
        var isOpen = $element.hasClass('in')

        $element.attr('aria-expanded', isOpen)
        $trigger
            .toggleClass('collapsed', !isOpen)
            .attr('aria-expanded', isOpen)
    }

    function getTargetFromTrigger($trigger) {
        var href
        var target = $trigger.attr('data-target')
            || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7

        return $(target)
    }


    // COLLAPSE PLUGIN DEFINITION
    // ==========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.collapse')
            var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

            if (!data && options.toggle && option == 'show') options.toggle = false
            if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.collapse

    $.fn.collapse = Plugin
    $.fn.collapse.Constructor = Collapse


    // COLLAPSE NO CONFLICT
    // ====================

    $.fn.collapse.noConflict = function () {
        $.fn.collapse = old
        return this
    }


    // COLLAPSE DATA-API
    // =================

    $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
        var $this = $(this)

        if (!$this.attr('data-target')) e.preventDefault()

        var $target = getTargetFromTrigger($this)
        var data = $target.data('bs.collapse')
        var option = data ? 'toggle' : $.extend({}, $this.data(), {trigger: this})

        Plugin.call($target, option)
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: dropdown.js v3.3.1
 * http://getbootstrap.com/javascript/#dropdowns
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // DROPDOWN CLASS DEFINITION
    // =========================

    var backdrop = '.dropdown-backdrop'
    var toggle = '[data-toggle="dropdown"]'
    var Dropdown = function (element) {
        $(element).on('click.bs.dropdown', this.toggle)
    }

    Dropdown.VERSION = '3.3.1'

    Dropdown.prototype.toggle = function (e) {
        var $this = $(this)

        if ($this.is('.disabled, :disabled')) return

        var $parent = getParent($this)
        var isActive = $parent.hasClass('open')

        clearMenus()

        if (!isActive) {
            if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
                // if mobile we use a backdrop because click events don't delegate
                $('<div class="dropdown-backdrop"/>').insertAfter($(this)).on('click', clearMenus)
            }

            var relatedTarget = {relatedTarget: this}
            $parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))

            if (e.isDefaultPrevented()) return

            $this
                .trigger('focus')
                .attr('aria-expanded', 'true')

            $parent
                .toggleClass('open')
                .trigger('shown.bs.dropdown', relatedTarget)
        }

        return false
    }

    Dropdown.prototype.keydown = function (e) {
        if (!/(38|39|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return

        var $this = $(this)

        e.preventDefault()
        e.stopPropagation()

        if ($this.is('.disabled, :disabled')) return

        var $parent = getParent($this)
        var isActive = $parent.hasClass('open')

        if ((!isActive && e.which != 27) || (isActive && e.which == 27)) {
            if (e.which == 27) $parent.find(toggle).trigger('focus')
            return $this.trigger('click')
        }

        // if (e.which == 39){
        //   var trgt = $(e.target);
        //   trgt.next('.sub-menu').find('>li:first-child>a').on('focus', function(){console.log('focusing')})
        //   if(!trgt.parent().hasClass('open')) return trgt.trigger('click')
        //   trgt.next('.sub-menu').find('li:first-child a').eq(0).trigger('focus')
        // console.log(trgt.next('.sub-menu').find('li:first-child a').eq(0))
        // } else if(e.which == 37){

        // }

        var desc = ' li:not(.divider):visible>a'
        var $items = $parent.find(' [role="menu"]>' + desc + ', [role="listbox"]' + desc)
//console.log($items)
        if (!$items.length) return

        var index = $items.index(e.target)

        if (e.which == 38 && index > 0)                 index--                        // up
        if (e.which == 40 && index < $items.length - 1) index++                        // down
        if (!~index)                                      index = 0

        $items.eq(index).trigger('focus')
    }

    function clearMenus(e) {
        if (e && e.which === 3) return
        $(backdrop).remove()
        $(toggle).each(function () {
            var $this = $(this)
            var $parent = getParent($this)
            var relatedTarget = {relatedTarget: this}

            if (!$parent.hasClass('open')) return

            $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))

            if (e.isDefaultPrevented()) return

            $this.attr('aria-expanded', 'false')
            $parent.removeClass('open').trigger('hidden.bs.dropdown', relatedTarget)
        })
    }

    function getParent($this) {
        var selector = $this.attr('data-target')

        if (!selector) {
            selector = $this.attr('href')
            selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
        }

        var $parent = selector && $(selector)

        return $parent && $parent.length ? $parent : $this.parent()
    }


    // DROPDOWN PLUGIN DEFINITION
    // ==========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.dropdown')

            if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
            if (typeof option == 'string') data[option].call($this)
        })
    }

    var old = $.fn.dropdown

    $.fn.dropdown = Plugin
    $.fn.dropdown.Constructor = Dropdown


    // DROPDOWN NO CONFLICT
    // ====================

    $.fn.dropdown.noConflict = function () {
        $.fn.dropdown = old
        return this
    }


    // APPLY TO STANDARD DROPDOWN ELEMENTS
    // ===================================

    $(document)
        .on('click.bs.dropdown.data-api', clearMenus)
        .on('click.bs.dropdown.data-api', '.dropdown form', function (e) {
            e.stopPropagation()
        })
        .on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle)
        .on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown)
        .on('keydown.bs.dropdown.data-api', '[role="menu"]', Dropdown.prototype.keydown)
        .on('keydown.bs.dropdown.data-api', '[role="listbox"]', Dropdown.prototype.keydown)
    //.on('keydown.bs.dropdown.data-api', '.sub-menu-toggle', Dropdown.prototype.keydown);
}(jQuery);

/* ========================================================================
 * Bootstrap: modal.js v3.3.1
 * http://getbootstrap.com/javascript/#modals
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // MODAL CLASS DEFINITION
    // ======================

    var Modal = function (element, options) {
        this.options = options
        this.$body = $(document.body)
        this.$element = $(element)
        this.$backdrop =
            this.isShown = null
        this.scrollbarWidth = 0

        if (this.options.remote) {
            this.$element
                .find('.modal-content')
                .load(this.options.remote, $.proxy(function () {
                    this.$element.trigger('loaded.bs.modal')
                }, this))
        }
    }

    Modal.VERSION = '3.3.1'

    Modal.TRANSITION_DURATION = 300
    Modal.BACKDROP_TRANSITION_DURATION = 150

    Modal.DEFAULTS = {
        backdrop: true,
        keyboard: true,
        show: true
    }

    Modal.prototype.toggle = function (_relatedTarget) {
        return this.isShown ? this.hide() : this.show(_relatedTarget)
    }

    Modal.prototype.show = function (_relatedTarget) {
        var that = this
        var e = $.Event('show.bs.modal', {relatedTarget: _relatedTarget})

        this.$element.trigger(e)

        if (this.isShown || e.isDefaultPrevented()) return

        this.isShown = true

        this.checkScrollbar()
        this.setScrollbar()
        this.$body.addClass('modal-open')

        this.escape()
        this.resize()

        this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))

        this.backdrop(function () {
            var transition = $.support.transition && that.$element.hasClass('fade')

            if (!that.$element.parent().length) {
                that.$element.appendTo(that.$body) // don't move modals dom position
            }

            that.$element
                .show()
                .scrollTop(0)

            if (that.options.backdrop) that.adjustBackdrop()
            that.adjustDialog()

            if (transition) {
                that.$element[0].offsetWidth // force reflow
            }

            that.$element
                .addClass('in')
                .attr('aria-hidden', false)

            that.enforceFocus()

            var e = $.Event('shown.bs.modal', {relatedTarget: _relatedTarget})

            transition ?
                that.$element.find('.modal-dialog') // wait for modal to slide in
                    .one('bsTransitionEnd', function () {
                        that.$element.trigger('focus').trigger(e)
                    })
                    .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
                that.$element.trigger('focus').trigger(e)
        })
    }

    Modal.prototype.hide = function (e) {
        if (e) e.preventDefault()

        e = $.Event('hide.bs.modal')

        this.$element.trigger(e)

        if (!this.isShown || e.isDefaultPrevented()) return

        this.isShown = false

        this.escape()
        this.resize()

        $(document).off('focusin.bs.modal')

        this.$element
            .removeClass('in')
            .attr('aria-hidden', true)
            .off('click.dismiss.bs.modal')

        $.support.transition && this.$element.hasClass('fade') ?
            this.$element
                .one('bsTransitionEnd', $.proxy(this.hideModal, this))
                .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
            this.hideModal()
    }

    Modal.prototype.enforceFocus = function () {
        $(document)
            .off('focusin.bs.modal') // guard against infinite focus loop
            .on('focusin.bs.modal', $.proxy(function (e) {
                if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
                    this.$element.trigger('focus')
                }
            }, this))
    }

    Modal.prototype.escape = function () {
        if (this.isShown && this.options.keyboard) {
            this.$element.on('keydown.dismiss.bs.modal', $.proxy(function (e) {
                e.which == 27 && this.hide()
            }, this))
        } else if (!this.isShown) {
            this.$element.off('keydown.dismiss.bs.modal')
        }
    }

    Modal.prototype.resize = function () {
        if (this.isShown) {
            $(window).on('resize.bs.modal', $.proxy(this.handleUpdate, this))
        } else {
            $(window).off('resize.bs.modal')
        }
    }

    Modal.prototype.hideModal = function () {
        var that = this
        this.$element.hide()
        this.backdrop(function () {
            that.$body.removeClass('modal-open')
            that.resetAdjustments()
            that.resetScrollbar()
            that.$element.trigger('hidden.bs.modal')
        })
    }

    Modal.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove()
        this.$backdrop = null
    }

    Modal.prototype.backdrop = function (callback) {
        var that = this
        var animate = this.$element.hasClass('fade') ? 'fade' : ''

        if (this.isShown && this.options.backdrop) {
            var doAnimate = $.support.transition && animate

            this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
                .prependTo(this.$element)
                .on('click.dismiss.bs.modal', $.proxy(function (e) {
                    if (e.target !== e.currentTarget) return
                    this.options.backdrop == 'static'
                        ? this.$element[0].focus.call(this.$element[0])
                        : this.hide.call(this)
                }, this))

            if (doAnimate) this.$backdrop[0].offsetWidth // force reflow

            this.$backdrop.addClass('in')

            if (!callback) return

            doAnimate ?
                this.$backdrop
                    .one('bsTransitionEnd', callback)
                    .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
                callback()

        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass('in')

            var callbackRemove = function () {
                that.removeBackdrop()
                callback && callback()
            }
            $.support.transition && this.$element.hasClass('fade') ?
                this.$backdrop
                    .one('bsTransitionEnd', callbackRemove)
                    .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
                callbackRemove()

        } else if (callback) {
            callback()
        }
    }

    // these following methods are used to handle overflowing modals

    Modal.prototype.handleUpdate = function () {
        if (this.options.backdrop) this.adjustBackdrop()
        this.adjustDialog()
    }

    Modal.prototype.adjustBackdrop = function () {
        this.$backdrop
            .css('height', 0)
            .css('height', this.$element[0].scrollHeight)
    }

    Modal.prototype.adjustDialog = function () {
        var modalIsOverflowing = this.$element[0].scrollHeight > document.documentElement.clientHeight

        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && modalIsOverflowing ? this.scrollbarWidth : '',
            paddingRight: this.bodyIsOverflowing && !modalIsOverflowing ? this.scrollbarWidth : ''
        })
    }

    Modal.prototype.resetAdjustments = function () {
        this.$element.css({
            paddingLeft: '',
            paddingRight: ''
        })
    }

    Modal.prototype.checkScrollbar = function () {
        this.bodyIsOverflowing = document.body.scrollHeight > document.documentElement.clientHeight
        this.scrollbarWidth = this.measureScrollbar()
    }

    Modal.prototype.setScrollbar = function () {
        var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
        if (this.bodyIsOverflowing) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
    }

    Modal.prototype.resetScrollbar = function () {
        this.$body.css('padding-right', '')
    }

    Modal.prototype.measureScrollbar = function () { // thx walsh
        var scrollDiv = document.createElement('div')
        scrollDiv.className = 'modal-scrollbar-measure'
        this.$body.append(scrollDiv)
        var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
        this.$body[0].removeChild(scrollDiv)
        return scrollbarWidth
    }


    // MODAL PLUGIN DEFINITION
    // =======================

    function Plugin(option, _relatedTarget) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.modal')
            var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)

            if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
            if (typeof option == 'string') data[option](_relatedTarget)
            else if (options.show) data.show(_relatedTarget)
        })
    }

    var old = $.fn.modal

    $.fn.modal = Plugin
    $.fn.modal.Constructor = Modal


    // MODAL NO CONFLICT
    // =================

    $.fn.modal.noConflict = function () {
        $.fn.modal = old
        return this
    }


    // MODAL DATA-API
    // ==============

    $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
        var $this = $(this)
        var href = $this.attr('href')
        var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) // strip for ie7
        var option = $target.data('bs.modal') ? 'toggle' : $.extend({remote: !/#/.test(href) && href}, $target.data(), $this.data())

        if ($this.is('a')) e.preventDefault()

        $target.one('show.bs.modal', function (showEvent) {
            if (showEvent.isDefaultPrevented()) return // only register focus restorer if modal will actually get shown
            $target.one('hidden.bs.modal', function () {
                $this.is(':visible') && $this.trigger('focus')
            })
        })
        Plugin.call($target, option, this)
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: tooltip.js v3.3.1
 * http://getbootstrap.com/javascript/#tooltip
 * Inspired by the original jQuery.tipsy by Jason Frame
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // TOOLTIP PUBLIC CLASS DEFINITION
    // ===============================

    var Tooltip = function (element, options) {
        this.type =
            this.options =
                this.enabled =
                    this.timeout =
                        this.hoverState =
                            this.$element = null

        this.init('tooltip', element, options)
    }

    Tooltip.VERSION = '3.3.1'

    Tooltip.TRANSITION_DURATION = 150

    Tooltip.DEFAULTS = {
        animation: true,
        placement: 'top',
        selector: false,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: 'hover focus',
        title: '',
        delay: 0,
        html: false,
        container: false,
        viewport: {
            selector: 'body',
            padding: 0
        }
    }

    Tooltip.prototype.init = function (type, element, options) {
        this.enabled = true
        this.type = type
        this.$element = $(element)
        this.options = this.getOptions(options)
        this.$viewport = this.options.viewport && $(this.options.viewport.selector || this.options.viewport)

        var triggers = this.options.trigger.split(' ')

        for (var i = triggers.length; i--;) {
            var trigger = triggers[i]

            if (trigger == 'click') {
                this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this))
            } else if (trigger != 'manual') {
                var eventIn = trigger == 'hover' ? 'mouseenter' : 'focusin'
                var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout'

                this.$element.on(eventIn + '.' + this.type, this.options.selector, $.proxy(this.enter, this))
                this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this))
            }
        }

        this.options.selector ?
            (this._options = $.extend({}, this.options, {trigger: 'manual', selector: ''})) :
            this.fixTitle()
    }

    Tooltip.prototype.getDefaults = function () {
        return Tooltip.DEFAULTS
    }

    Tooltip.prototype.getOptions = function (options) {
        options = $.extend({}, this.getDefaults(), this.$element.data(), options)

        if (options.delay && typeof options.delay == 'number') {
            options.delay = {
                show: options.delay,
                hide: options.delay
            }
        }

        return options
    }

    Tooltip.prototype.getDelegateOptions = function () {
        var options = {}
        var defaults = this.getDefaults()

        this._options && $.each(this._options, function (key, value) {
            if (defaults[key] != value) options[key] = value
        })

        return options
    }

    Tooltip.prototype.enter = function (obj) {
        var self = obj instanceof this.constructor ?
            obj : $(obj.currentTarget).data('bs.' + this.type)

        if (self && self.$tip && self.$tip.is(':visible')) {
            self.hoverState = 'in'
            return
        }

        if (!self) {
            self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
            $(obj.currentTarget).data('bs.' + this.type, self)
        }

        clearTimeout(self.timeout)

        self.hoverState = 'in'

        if (!self.options.delay || !self.options.delay.show) return self.show()

        self.timeout = setTimeout(function () {
            if (self.hoverState == 'in') self.show()
        }, self.options.delay.show)
    }

    Tooltip.prototype.leave = function (obj) {
        var self = obj instanceof this.constructor ?
            obj : $(obj.currentTarget).data('bs.' + this.type)

        if (!self) {
            self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
            $(obj.currentTarget).data('bs.' + this.type, self)
        }

        clearTimeout(self.timeout)

        self.hoverState = 'out'

        if (!self.options.delay || !self.options.delay.hide) return self.hide()

        self.timeout = setTimeout(function () {
            if (self.hoverState == 'out') self.hide()
        }, self.options.delay.hide)
    }

    Tooltip.prototype.show = function () {
        var e = $.Event('show.bs.' + this.type)

        if (this.hasContent() && this.enabled) {
            this.$element.trigger(e)

            var inDom = $.contains(this.$element[0].ownerDocument.documentElement, this.$element[0])
            if (e.isDefaultPrevented() || !inDom) return
            var that = this

            var $tip = this.tip()

            var tipId = this.getUID(this.type)

            this.setContent()
            $tip.attr('id', tipId)
            this.$element.attr('aria-describedby', tipId)

            if (this.options.animation) $tip.addClass('fade')

            var placement = typeof this.options.placement == 'function' ?
                this.options.placement.call(this, $tip[0], this.$element[0]) :
                this.options.placement

            var autoToken = /\s?auto?\s?/i
            var autoPlace = autoToken.test(placement)
            if (autoPlace) placement = placement.replace(autoToken, '') || 'top'

            $tip
                .detach()
                .css({top: 0, left: 0, display: 'block'})
                .addClass(placement)
                .data('bs.' + this.type, this)

            this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)

            var pos = this.getPosition()
            var actualWidth = $tip[0].offsetWidth
            var actualHeight = $tip[0].offsetHeight

            if (autoPlace) {
                var orgPlacement = placement
                var $container = this.options.container ? $(this.options.container) : this.$element.parent()
                var containerDim = this.getPosition($container)

                placement = placement == 'bottom' && pos.bottom + actualHeight > containerDim.bottom ? 'top' :
                    placement == 'top' && pos.top - actualHeight < containerDim.top ? 'bottom' :
                        placement == 'right' && pos.right + actualWidth > containerDim.width ? 'left' :
                            placement == 'left' && pos.left - actualWidth < containerDim.left ? 'right' :
                                placement

                $tip
                    .removeClass(orgPlacement)
                    .addClass(placement)
            }

            var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight)

            this.applyPlacement(calculatedOffset, placement)

            var complete = function () {
                var prevHoverState = that.hoverState
                that.$element.trigger('shown.bs.' + that.type)
                that.hoverState = null

                if (prevHoverState == 'out') that.leave(that)
            }

            $.support.transition && this.$tip.hasClass('fade') ?
                $tip
                    .one('bsTransitionEnd', complete)
                    .emulateTransitionEnd(Tooltip.TRANSITION_DURATION) :
                complete()
        }
    }

    Tooltip.prototype.applyPlacement = function (offset, placement) {
        var $tip = this.tip()
        var width = $tip[0].offsetWidth
        var height = $tip[0].offsetHeight

        // manually read margins because getBoundingClientRect includes difference
        var marginTop = parseInt($tip.css('margin-top'), 10)
        var marginLeft = parseInt($tip.css('margin-left'), 10)

        // we must check for NaN for ie 8/9
        if (isNaN(marginTop))  marginTop = 0
        if (isNaN(marginLeft)) marginLeft = 0

        offset.top = offset.top + marginTop
        offset.left = offset.left + marginLeft

        // $.fn.offset doesn't round pixel values
        // so we use setOffset directly with our own function B-0
        $.offset.setOffset($tip[0], $.extend({
            using: function (props) {
                $tip.css({
                    top: Math.round(props.top),
                    left: Math.round(props.left)
                })
            }
        }, offset), 0)

        $tip.addClass('in')

        // check to see if placing tip in new offset caused the tip to resize itself
        var actualWidth = $tip[0].offsetWidth
        var actualHeight = $tip[0].offsetHeight

        if (placement == 'top' && actualHeight != height) {
            offset.top = offset.top + height - actualHeight
        }

        var delta = this.getViewportAdjustedDelta(placement, offset, actualWidth, actualHeight)

        if (delta.left) offset.left += delta.left
        else offset.top += delta.top

        var isVertical = /top|bottom/.test(placement)
        var arrowDelta = isVertical ? delta.left * 2 - width + actualWidth : delta.top * 2 - height + actualHeight
        var arrowOffsetPosition = isVertical ? 'offsetWidth' : 'offsetHeight'

        $tip.offset(offset)
        this.replaceArrow(arrowDelta, $tip[0][arrowOffsetPosition], isVertical)
    }

    Tooltip.prototype.replaceArrow = function (delta, dimension, isHorizontal) {
        this.arrow()
            .css(isHorizontal ? 'left' : 'top', 50 * (1 - delta / dimension) + '%')
            .css(isHorizontal ? 'top' : 'left', '')
    }

    Tooltip.prototype.setContent = function () {
        var $tip = this.tip()
        var title = this.getTitle()

        $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
        $tip.removeClass('fade in top bottom left right')
    }

    Tooltip.prototype.hide = function (callback) {
        var that = this
        var $tip = this.tip()
        var e = $.Event('hide.bs.' + this.type)

        function complete() {
            if (that.hoverState != 'in') $tip.detach()
            that.$element
                .removeAttr('aria-describedby')
                .trigger('hidden.bs.' + that.type)
            callback && callback()
        }

        this.$element.trigger(e)

        if (e.isDefaultPrevented()) return

        $tip.removeClass('in')

        $.support.transition && this.$tip.hasClass('fade') ?
            $tip
                .one('bsTransitionEnd', complete)
                .emulateTransitionEnd(Tooltip.TRANSITION_DURATION) :
            complete()

        this.hoverState = null

        return this
    }

    Tooltip.prototype.fixTitle = function () {
        var $e = this.$element
        if ($e.attr('title') || typeof ($e.attr('data-original-title')) != 'string') {
            $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
        }
    }

    Tooltip.prototype.hasContent = function () {
        return this.getTitle()
    }

    Tooltip.prototype.getPosition = function ($element) {
        $element = $element || this.$element

        var el = $element[0]
        var isBody = el.tagName == 'BODY'

        var elRect = el.getBoundingClientRect()
        if (elRect.width == null) {
            // width and height are missing in IE8, so compute them manually; see https://github.com/twbs/bootstrap/issues/14093
            elRect = $.extend({}, elRect, {width: elRect.right - elRect.left, height: elRect.bottom - elRect.top})
        }
        var elOffset = isBody ? {top: 0, left: 0} : $element.offset()
        var scroll = {scroll: isBody ? document.documentElement.scrollTop || document.body.scrollTop : $element.scrollTop()}
        var outerDims = isBody ? {width: $(window).width(), height: $(window).height()} : null

        return $.extend({}, elRect, scroll, outerDims, elOffset)
    }

    Tooltip.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
        return placement == 'bottom' ? {top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2} :
            placement == 'top' ? {top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2} :
                placement == 'left' ? {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth} :
                    /* placement == 'right' */ {
                    top: pos.top + pos.height / 2 - actualHeight / 2,
                    left: pos.left + pos.width
                }

    }

    Tooltip.prototype.getViewportAdjustedDelta = function (placement, pos, actualWidth, actualHeight) {
        var delta = {top: 0, left: 0}
        if (!this.$viewport) return delta

        var viewportPadding = this.options.viewport && this.options.viewport.padding || 0
        var viewportDimensions = this.getPosition(this.$viewport)

        if (/right|left/.test(placement)) {
            var topEdgeOffset = pos.top - viewportPadding - viewportDimensions.scroll
            var bottomEdgeOffset = pos.top + viewportPadding - viewportDimensions.scroll + actualHeight
            if (topEdgeOffset < viewportDimensions.top) { // top overflow
                delta.top = viewportDimensions.top - topEdgeOffset
            } else if (bottomEdgeOffset > viewportDimensions.top + viewportDimensions.height) { // bottom overflow
                delta.top = viewportDimensions.top + viewportDimensions.height - bottomEdgeOffset
            }
        } else {
            var leftEdgeOffset = pos.left - viewportPadding
            var rightEdgeOffset = pos.left + viewportPadding + actualWidth
            if (leftEdgeOffset < viewportDimensions.left) { // left overflow
                delta.left = viewportDimensions.left - leftEdgeOffset
            } else if (rightEdgeOffset > viewportDimensions.width) { // right overflow
                delta.left = viewportDimensions.left + viewportDimensions.width - rightEdgeOffset
            }
        }

        return delta
    }

    Tooltip.prototype.getTitle = function () {
        var title
        var $e = this.$element
        var o = this.options

        title = $e.attr('data-original-title')
        || (typeof o.title == 'function' ? o.title.call($e[0]) : o.title)

        return title
    }

    Tooltip.prototype.getUID = function (prefix) {
        do prefix += ~~(Math.random() * 1000000)
        while (document.getElementById(prefix))
        return prefix
    }

    Tooltip.prototype.tip = function () {
        return (this.$tip = this.$tip || $(this.options.template))
    }

    Tooltip.prototype.arrow = function () {
        return (this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow'))
    }

    Tooltip.prototype.enable = function () {
        this.enabled = true
    }

    Tooltip.prototype.disable = function () {
        this.enabled = false
    }

    Tooltip.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled
    }

    Tooltip.prototype.toggle = function (e) {
        var self = this
        if (e) {
            self = $(e.currentTarget).data('bs.' + this.type)
            if (!self) {
                self = new this.constructor(e.currentTarget, this.getDelegateOptions())
                $(e.currentTarget).data('bs.' + this.type, self)
            }
        }

        self.tip().hasClass('in') ? self.leave(self) : self.enter(self)
    }

    Tooltip.prototype.destroy = function () {
        var that = this
        clearTimeout(this.timeout)
        this.hide(function () {
            that.$element.off('.' + that.type).removeData('bs.' + that.type)
        })
    }


    // TOOLTIP PLUGIN DEFINITION
    // =========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.tooltip')
            var options = typeof option == 'object' && option
            var selector = options && options.selector

            if (!data && option == 'destroy') return
            if (selector) {
                if (!data) $this.data('bs.tooltip', (data = {}))
                if (!data[selector]) data[selector] = new Tooltip(this, options)
            } else {
                if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)))
            }
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.tooltip

    $.fn.tooltip = Plugin
    $.fn.tooltip.Constructor = Tooltip


    // TOOLTIP NO CONFLICT
    // ===================

    $.fn.tooltip.noConflict = function () {
        $.fn.tooltip = old
        return this
    }

}(jQuery);

/* ========================================================================
 * Bootstrap: popover.js v3.3.1
 * http://getbootstrap.com/javascript/#popovers
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // POPOVER PUBLIC CLASS DEFINITION
    // ===============================

    var Popover = function (element, options) {
        this.init('popover', element, options)
    }

    if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js')

    Popover.VERSION = '3.3.1'

    Popover.DEFAULTS = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, {
        placement: 'right',
        trigger: 'click',
        content: '',
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    })


    // NOTE: POPOVER EXTENDS tooltip.js
    // ================================

    Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)

    Popover.prototype.constructor = Popover

    Popover.prototype.getDefaults = function () {
        return Popover.DEFAULTS
    }

    Popover.prototype.setContent = function () {
        var $tip = this.tip()
        var title = this.getTitle()
        var content = this.getContent()

        $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
        $tip.find('.popover-content').children().detach().end()[ // we use append for html objects to maintain js events
            this.options.html ? (typeof content == 'string' ? 'html' : 'append') : 'text'
            ](content)

        $tip.removeClass('fade top bottom left right in')

        // IE8 doesn't accept hiding via the `:empty` pseudo selector, we have to do
        // this manually by checking the contents.
        if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide()
    }

    Popover.prototype.hasContent = function () {
        return this.getTitle() || this.getContent()
    }

    Popover.prototype.getContent = function () {
        var $e = this.$element
        var o = this.options

        return $e.attr('data-content')
            || (typeof o.content == 'function' ?
                o.content.call($e[0]) :
                o.content)
    }

    Popover.prototype.arrow = function () {
        return (this.$arrow = this.$arrow || this.tip().find('.arrow'))
    }

    Popover.prototype.tip = function () {
        if (!this.$tip) this.$tip = $(this.options.template)
        return this.$tip
    }


    // POPOVER PLUGIN DEFINITION
    // =========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.popover')
            var options = typeof option == 'object' && option
            var selector = options && options.selector

            if (!data && option == 'destroy') return
            if (selector) {
                if (!data) $this.data('bs.popover', (data = {}))
                if (!data[selector]) data[selector] = new Popover(this, options)
            } else {
                if (!data) $this.data('bs.popover', (data = new Popover(this, options)))
            }
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.popover

    $.fn.popover = Plugin
    $.fn.popover.Constructor = Popover


    // POPOVER NO CONFLICT
    // ===================

    $.fn.popover.noConflict = function () {
        $.fn.popover = old
        return this
    }

}(jQuery);

/* ========================================================================
 * Bootstrap: scrollspy.js v3.3.1
 * http://getbootstrap.com/javascript/#scrollspy
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // SCROLLSPY CLASS DEFINITION
    // ==========================

    function ScrollSpy(element, options) {
        var process = $.proxy(this.process, this)

        this.$body = $('body')
        this.$scrollElement = $(element).is('body') ? $(window) : $(element)
        this.options = $.extend({}, ScrollSpy.DEFAULTS, options)
        this.selector = (this.options.target || '') + ' .nav li > a'
        this.offsets = []
        this.targets = []
        this.activeTarget = null
        this.scrollHeight = 0

        this.$scrollElement.on('scroll.bs.scrollspy', process)
        this.refresh()
        this.process()
    }

    ScrollSpy.VERSION = '3.3.1'

    ScrollSpy.DEFAULTS = {
        offset: 10
    }

    ScrollSpy.prototype.getScrollHeight = function () {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }

    ScrollSpy.prototype.refresh = function () {
        var offsetMethod = 'offset'
        var offsetBase = 0

        if (!$.isWindow(this.$scrollElement[0])) {
            offsetMethod = 'position'
            offsetBase = this.$scrollElement.scrollTop()
        }

        this.offsets = []
        this.targets = []
        this.scrollHeight = this.getScrollHeight()

        var self = this

        this.$body
            .find(this.selector)
            .map(function () {
                var $el = $(this)
                var href = $el.data('target') || $el.attr('href')
                var $href = /^#./.test(href) && $(href)

                return ($href
                    && $href.length
                    && $href.is(':visible')
                    && [[$href[offsetMethod]().top + offsetBase, href]]) || null
            })
            .sort(function (a, b) {
                return a[0] - b[0]
            })
            .each(function () {
                self.offsets.push(this[0])
                self.targets.push(this[1])
            })
    }

    ScrollSpy.prototype.process = function () {
        var scrollTop = this.$scrollElement.scrollTop() + this.options.offset
        var scrollHeight = this.getScrollHeight()
        var maxScroll = this.options.offset + scrollHeight - this.$scrollElement.height()
        var offsets = this.offsets
        var targets = this.targets
        var activeTarget = this.activeTarget
        var i

        if (this.scrollHeight != scrollHeight) {
            this.refresh()
        }

        if (scrollTop >= maxScroll) {
            return activeTarget != (i = targets[targets.length - 1]) && this.activate(i)
        }

        if (activeTarget && scrollTop < offsets[0]) {
            this.activeTarget = null
            return this.clear()
        }

        for (i = offsets.length; i--;) {
            activeTarget != targets[i]
            && scrollTop >= offsets[i]
            && (!offsets[i + 1] || scrollTop <= offsets[i + 1])
            && this.activate(targets[i])
        }
    }

    ScrollSpy.prototype.activate = function (target) {
        this.activeTarget = target

        this.clear()

        var selector = this.selector +
            '[data-target="' + target + '"],' +
            this.selector + '[href="' + target + '"]'

        var active = $(selector)
            .parents('li')
            .addClass('active')

        if (active.parent('.dropdown-menu').length) {
            active = active
                .closest('li.dropdown')
                .addClass('active')
        }

        active.trigger('activate.bs.scrollspy')
    }

    ScrollSpy.prototype.clear = function () {
        $(this.selector)
            .parentsUntil(this.options.target, '.active')
            .removeClass('active')
    }


    // SCROLLSPY PLUGIN DEFINITION
    // ===========================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.scrollspy')
            var options = typeof option == 'object' && option

            if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.scrollspy

    $.fn.scrollspy = Plugin
    $.fn.scrollspy.Constructor = ScrollSpy


    // SCROLLSPY NO CONFLICT
    // =====================

    $.fn.scrollspy.noConflict = function () {
        $.fn.scrollspy = old
        return this
    }


    // SCROLLSPY DATA-API
    // ==================

    $(window).on('load.bs.scrollspy.data-api', function () {
        $('[data-spy="scroll"]').each(function () {
            var $spy = $(this)
            Plugin.call($spy, $spy.data())
        })
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: tab.js v3.3.1
 * http://getbootstrap.com/javascript/#tabs
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // TAB CLASS DEFINITION
    // ====================

    var Tab = function (element) {
        this.element = $(element)
    }

    Tab.VERSION = '3.3.1'

    Tab.TRANSITION_DURATION = 150

    Tab.prototype.show = function () {
        var $this = this.element
        var $ul = $this.closest('ul:not(.dropdown-menu)')
        var selector = $this.data('target')

        if (!selector) {
            selector = $this.attr('href')
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
        }

        if ($this.parent('li').hasClass('active')) return

        var $previous = $ul.find('.active:last a')
        var hideEvent = $.Event('hide.bs.tab', {
            relatedTarget: $this[0]
        })
        var showEvent = $.Event('show.bs.tab', {
            relatedTarget: $previous[0]
        })

        $previous.trigger(hideEvent)
        $this.trigger(showEvent)

        if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) return

        var $target = $(selector)

        this.activate($this.closest('li'), $ul)
        this.activate($target, $target.parent(), function () {
            $previous.trigger({
                type: 'hidden.bs.tab',
                relatedTarget: $this[0]
            })
            $this.trigger({
                type: 'shown.bs.tab',
                relatedTarget: $previous[0]
            })
        })
    }

    Tab.prototype.activate = function (element, container, callback) {
        var $active = container.find('> .active')
        var transition = callback
            && $.support.transition
            && (($active.length && $active.hasClass('fade')) || !!container.find('> .fade').length)

        function next() {
            $active
                .removeClass('active')
                .find('> .dropdown-menu > .active')
                .removeClass('active')
                .end()
                .find('[data-toggle="tab"]')
                .attr('aria-expanded', false)

            element
                .addClass('active')
                .find('[data-toggle="tab"]')
                .attr('aria-expanded', true)

            if (transition) {
                element[0].offsetWidth // reflow for transition
                element.addClass('in')
            } else {
                element.removeClass('fade')
            }

            if (element.parent('.dropdown-menu')) {
                element
                    .closest('li.dropdown')
                    .addClass('active')
                    .end()
                    .find('[data-toggle="tab"]')
                    .attr('aria-expanded', true)
            }

            callback && callback()
        }

        $active.length && transition ?
            $active
                .one('bsTransitionEnd', next)
                .emulateTransitionEnd(Tab.TRANSITION_DURATION) :
            next()

        $active.removeClass('in')
    }


    // TAB PLUGIN DEFINITION
    // =====================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.tab')

            if (!data) $this.data('bs.tab', (data = new Tab(this)))
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.tab

    $.fn.tab = Plugin
    $.fn.tab.Constructor = Tab


    // TAB NO CONFLICT
    // ===============

    $.fn.tab.noConflict = function () {
        $.fn.tab = old
        return this
    }


    // TAB DATA-API
    // ============

    var clickHandler = function (e) {
        e.preventDefault()
        Plugin.call($(this), 'show')
    }

    $(document)
        .on('click.bs.tab.data-api', '[data-toggle="tab"]', clickHandler)
        .on('click.bs.tab.data-api', '[data-toggle="pill"]', clickHandler)

}(jQuery);

/* ========================================================================
 * Bootstrap: affix.js v3.3.1
 * http://getbootstrap.com/javascript/#affix
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // AFFIX CLASS DEFINITION
    // ======================

    var Affix = function (element, options) {
        this.options = $.extend({}, Affix.DEFAULTS, options)

        this.$target = $(this.options.target)
            .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
            .on('click.bs.affix.data-api', $.proxy(this.checkPositionWithEventLoop, this))

        this.$element = $(element)
        this.affixed =
            this.unpin =
                this.pinnedOffset = null

        this.checkPosition()
    }

    Affix.VERSION = '3.3.1'

    Affix.RESET = 'affix affix-top affix-bottom'

    Affix.DEFAULTS = {
        offset: 0,
        target: window
    }

    Affix.prototype.getState = function (scrollHeight, height, offsetTop, offsetBottom) {
        var scrollTop = this.$target.scrollTop()
        var position = this.$element.offset()
        var targetHeight = this.$target.height()

        if (offsetTop != null && this.affixed == 'top') return scrollTop < offsetTop ? 'top' : false

        if (this.affixed == 'bottom') {
            if (offsetTop != null) return (scrollTop + this.unpin <= position.top) ? false : 'bottom'
            return (scrollTop + targetHeight <= scrollHeight - offsetBottom) ? false : 'bottom'
        }

        var initializing = this.affixed == null
        var colliderTop = initializing ? scrollTop : position.top
        var colliderHeight = initializing ? targetHeight : height

        if (offsetTop != null && colliderTop <= offsetTop) return 'top'
        if (offsetBottom != null && (colliderTop + colliderHeight >= scrollHeight - offsetBottom)) return 'bottom'

        return false
    }

    Affix.prototype.getPinnedOffset = function () {
        if (this.pinnedOffset) return this.pinnedOffset
        this.$element.removeClass(Affix.RESET).addClass('affix')
        var scrollTop = this.$target.scrollTop()
        var position = this.$element.offset()
        return (this.pinnedOffset = position.top - scrollTop)
    }

    Affix.prototype.checkPositionWithEventLoop = function () {
        setTimeout($.proxy(this.checkPosition, this), 1)
    }

    Affix.prototype.checkPosition = function () {
        if (!this.$element.is(':visible')) return

        var height = this.$element.height()
        var offset = this.options.offset
        var offsetTop = offset.top
        var offsetBottom = offset.bottom
        var scrollHeight = $('body').height()

        if (typeof offset != 'object')         offsetBottom = offsetTop = offset
        if (typeof offsetTop == 'function')    offsetTop = offset.top(this.$element)
        if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element)

        var affix = this.getState(scrollHeight, height, offsetTop, offsetBottom)

        if (this.affixed != affix) {
            if (this.unpin != null) this.$element.css('top', '')

            var affixType = 'affix' + (affix ? '-' + affix : '')
            var e = $.Event(affixType + '.bs.affix')

            this.$element.trigger(e)

            if (e.isDefaultPrevented()) return

            this.affixed = affix
            this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null

            this.$element
                .removeClass(Affix.RESET)
                .addClass(affixType)
                .trigger(affixType.replace('affix', 'affixed') + '.bs.affix')
        }

        if (affix == 'bottom') {
            this.$element.offset({
                top: scrollHeight - height - offsetBottom
            })
        }
    }


    // AFFIX PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.affix')
            var options = typeof option == 'object' && option

            if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    var old = $.fn.affix

    $.fn.affix = Plugin
    $.fn.affix.Constructor = Affix


    // AFFIX NO CONFLICT
    // =================

    $.fn.affix.noConflict = function () {
        $.fn.affix = old
        return this
    }


    // AFFIX DATA-API
    // ==============

    $(window).on('load', function () {
        $('[data-spy="affix"]').each(function () {
            var $spy = $(this)
            var data = $spy.data()

            data.offset = data.offset || {}

            if (data.offsetBottom != null) data.offset.bottom = data.offsetBottom
            if (data.offsetTop != null) data.offset.top = data.offsetTop

            Plugin.call($spy, data)
        })
    })

}(jQuery);

//
// SmoothScroll for websites v1.2.1
// Licensed under the terms of the MIT license.
//
// You may use it in your theme if you credit me. 
// It is also free to use on any individual website.
//
// Exception:
// The only restriction would be not to publish any  
// extension for browsers or native application
// without getting a permission first.
//

// People involved
//  - Balazs Galambosi (maintainer)   
//  - Michael Herf     (Pulse Algorithm)

(function () {

// Scroll Variables (tweakable)
    var defaultOptions = {

        // Scrolling Core
        frameRate: 150, // [Hz]
        animationTime: 400, // [px]
        stepSize: 120, // [px]

        // Pulse (less tweakable)
        // ratio of "tail" to "acceleration"
        pulseAlgorithm: true,
        pulseScale: 8,
        pulseNormalize: 1,

        // Acceleration
        accelerationDelta: 20,  // 20
        accelerationMax: 1,   // 1

        // Keyboard Settings
        keyboardSupport: true,  // option
        arrowScroll: 50,     // [px]

        // Other
        touchpadSupport: true,
        fixedBackground: true,
        excluded: ""
    };

    var options = defaultOptions;


// Other Variables
    var isExcluded = false;
    var isFrame = false;
    var direction = {x: 0, y: 0};
    var initDone = false;
    var root = document.documentElement;
    var activeElement;
    var observer;
    var deltaBuffer = [120, 120, 120];

    var key = {
        left: 37, up: 38, right: 39, down: 40, spacebar: 32,
        pageup: 33, pagedown: 34, end: 35, home: 36
    };


    /***********************************************
     * SETTINGS
     ***********************************************/

    var options = defaultOptions;


    /***********************************************
     * INITIALIZE
     ***********************************************/

    /**
     * Tests if smooth scrolling is allowed. Shuts down everything if not.
     */
    function initTest() {

        var disableKeyboard = false;

        // disable keyboard support if anything above requested it
        if (disableKeyboard) {
            removeEvent("keydown", keydown);
        }

        if (options.keyboardSupport && !disableKeyboard) {
            addEvent("keydown", keydown);
        }
    }

    /**
     * Sets up scrolls array, determines if frames are involved.
     */
    function init() {

        if (!document.body) return;

        var body = document.body;
        var html = document.documentElement;
        var windowHeight = window.innerHeight;
        var scrollHeight = body.scrollHeight;

        // check compat mode for root element
        root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
        activeElement = body;

        initTest();
        initDone = true;

        // Checks if this script is running in a frame
        if (top != self) {
            isFrame = true;
        }

        /**
         * This fixes a bug where the areas left and right to
         * the content does not trigger the onmousewheel event
         * on some pages. e.g.: html, body { height: 100% }
         */
        else if (scrollHeight > windowHeight &&
            (body.offsetHeight <= windowHeight ||
            html.offsetHeight <= windowHeight)) {

            // DOMChange (throttle): fix height
            var pending = false;
            var refresh = function () {
                if (!pending && html.scrollHeight != document.height) {
                    pending = true; // add a new pending action
                    setTimeout(function () {
                        html.style.height = document.height + 'px';
                        pending = false;
                    }, 500); // act rarely to stay fast
                }
            };
            html.style.height = 'auto';
            setTimeout(refresh, 10);

            // clearfix
            if (root.offsetHeight <= windowHeight) {
                var underlay = document.createElement("div");
                underlay.style.clear = "both";
                body.appendChild(underlay);
            }
        }

        // disable fixed background
        if (!options.fixedBackground && !isExcluded) {
            body.style.backgroundAttachment = "scroll";
            html.style.backgroundAttachment = "scroll";
        }
    }


    /************************************************
     * SCROLLING
     ************************************************/

    var que = [];
    var pending = false;
    var lastScroll = +new Date;

    /**
     * Pushes scroll actions to the scrolling queue.
     */
    function scrollArray(elem, left, top, delay) {

        delay || (delay = 1000);
        directionCheck(left, top);

        if (options.accelerationMax != 1) {
            var now = +new Date;
            var elapsed = now - lastScroll;
            if (elapsed < options.accelerationDelta) {
                var factor = (1 + (30 / elapsed)) / 2;
                if (factor > 1) {
                    factor = Math.min(factor, options.accelerationMax);
                    left *= factor;
                    top *= factor;
                }
            }
            lastScroll = +new Date;
        }

        // push a scroll command
        que.push({
            x: left,
            y: top,
            lastX: (left < 0) ? 0.99 : -0.99,
            lastY: (top < 0) ? 0.99 : -0.99,
            start: +new Date
        });

        // don't act if there's a pending queue
        if (pending) {
            return;
        }

        var scrollWindow = (elem === document.body);

        var step = function (time) {

            var now = +new Date;
            var scrollX = 0;
            var scrollY = 0;

            for (var i = 0; i < que.length; i++) {

                var item = que[i];
                var elapsed = now - item.start;
                var finished = (elapsed >= options.animationTime);

                // scroll position: [0, 1]
                var position = (finished) ? 1 : elapsed / options.animationTime;

                // easing [optional]
                if (options.pulseAlgorithm) {
                    position = pulse(position);
                }

                // only need the difference
                var x = (item.x * position - item.lastX) >> 0;
                var y = (item.y * position - item.lastY) >> 0;

                // add this to the total scrolling
                scrollX += x;
                scrollY += y;

                // update last values
                item.lastX += x;
                item.lastY += y;

                // delete and step back if it's over
                if (finished) {
                    que.splice(i, 1);
                    i--;
                }
            }

            // scroll left and top
            if (scrollWindow) {
                window.scrollBy(scrollX, scrollY);
            }
            else {
                if (scrollX) elem.scrollLeft += scrollX;
                if (scrollY) elem.scrollTop += scrollY;
            }

            // clean up if there's nothing left to do
            if (!left && !top) {
                que = [];
            }

            if (que.length) {
                requestFrame(step, elem, (delay / options.frameRate + 1));
            } else {
                pending = false;
            }
        };

        // start a new queue of actions
        requestFrame(step, elem, 0);
        pending = true;
    }


    /***********************************************
     * EVENTS
     ***********************************************/

    /**
     * Mouse wheel handler.
     * @param {Object} event
     */
    function wheel(event) {

        if (!initDone) {
            init();
        }

        var target = event.target;
        var overflowing = overflowingAncestor(target);

        // use default if there's no overflowing
        // element or default action is prevented
        if (!overflowing || event.defaultPrevented ||
            isNodeName(activeElement, "embed") ||
            (isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
            return true;
        }

        var deltaX = event.wheelDeltaX || 0;
        var deltaY = event.wheelDeltaY || 0;

        // use wheelDelta if deltaX/Y is not available
        if (!deltaX && !deltaY) {
            deltaY = event.wheelDelta || 0;
        }

        // check if it's a touchpad scroll that should be ignored
        if (!options.touchpadSupport && isTouchpad(deltaY)) {
            return true;
        }

        // scale by step size
        // delta is 120 most of the time
        // synaptics seems to send 1 sometimes
        if (Math.abs(deltaX) > 1.2) {
            deltaX *= options.stepSize / 120;
        }
        if (Math.abs(deltaY) > 1.2) {
            deltaY *= options.stepSize / 120;
        }

        scrollArray(overflowing, -deltaX, -deltaY);
        event.preventDefault();
    }

    /**
     * Keydown event handler.
     * @param {Object} event
     */
    function keydown(event) {

        var target = event.target;
        var modifier = event.ctrlKey || event.altKey || event.metaKey ||
            (event.shiftKey && event.keyCode !== key.spacebar);

        // do nothing if user is editing text
        // or using a modifier key (except shift)
        // or in a dropdown
        if (/input|textarea|select|embed/i.test(target.nodeName) ||
            target.isContentEditable ||
            event.defaultPrevented ||
            modifier) {
            return true;
        }
        // spacebar should trigger button press
        if (isNodeName(target, "button") &&
            event.keyCode === key.spacebar) {
            return true;
        }

        var shift, x = 0, y = 0;
        var elem = overflowingAncestor(activeElement);
        var clientHeight = elem.clientHeight;

        if (elem == document.body) {
            clientHeight = window.innerHeight;
        }

        switch (event.keyCode) {
            case key.up:
                y = -options.arrowScroll;
                break;
            case key.down:
                y = options.arrowScroll;
                break;
            case key.spacebar: // (+ shift)
                shift = event.shiftKey ? 1 : -1;
                y = -shift * clientHeight * 0.9;
                break;
            case key.pageup:
                y = -clientHeight * 0.9;
                break;
            case key.pagedown:
                y = clientHeight * 0.9;
                break;
            case key.home:
                y = -elem.scrollTop;
                break;
            case key.end:
                var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
                y = (damt > 0) ? damt + 10 : 0;
                break;
            case key.left:
                x = -options.arrowScroll;
                break;
            case key.right:
                x = options.arrowScroll;
                break;
            default:
                return true; // a key we don't care about
        }

        scrollArray(elem, x, y);
        event.preventDefault();
    }

    /**
     * Mousedown event only for updating activeElement
     */
    function mousedown(event) {
        activeElement = event.target;
    }


    /***********************************************
     * OVERFLOW
     ***********************************************/

    var cache = {}; // cleared out every once in while
    setInterval(function () {
        cache = {};
    }, 10 * 1000);

    var uniqueID = (function () {
        var i = 0;
        return function (el) {
            return el.uniqueID || (el.uniqueID = i++);
        };
    })();

    function setCache(elems, overflowing) {
        for (var i = elems.length; i--;)
            cache[uniqueID(elems[i])] = overflowing;
        return overflowing;
    }

    function overflowingAncestor(el) {
        var elems = [];
        var rootScrollHeight = root.scrollHeight;
        do {
            var cached = cache[uniqueID(el)];
            if (cached) {
                return setCache(elems, cached);
            }
            elems.push(el);
            if (rootScrollHeight === el.scrollHeight) {
                if (!isFrame || root.clientHeight + 10 < rootScrollHeight) {
                    return setCache(elems, document.body); // scrolling root in WebKit
                }
            } else if (el.clientHeight + 10 < el.scrollHeight) {
                overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
                if (overflow === "scroll" || overflow === "auto") {
                    return setCache(elems, el);
                }
            }
        } while (el = el.parentNode);
    }


    /***********************************************
     * HELPERS
     ***********************************************/

    function addEvent(type, fn, bubble) {
        window.addEventListener(type, fn, (bubble || false));
    }

    function removeEvent(type, fn, bubble) {
        window.removeEventListener(type, fn, (bubble || false));
    }

    function isNodeName(el, tag) {
        return (el.nodeName || "").toLowerCase() === tag.toLowerCase();
    }

    function directionCheck(x, y) {
        x = (x > 0) ? 1 : -1;
        y = (y > 0) ? 1 : -1;
        if (direction.x !== x || direction.y !== y) {
            direction.x = x;
            direction.y = y;
            que = [];
            lastScroll = 0;
        }
    }

    var deltaBufferTimer;

    function isTouchpad(deltaY) {
        if (!deltaY) return;
        deltaY = Math.abs(deltaY)
        deltaBuffer.push(deltaY);
        deltaBuffer.shift();
        clearTimeout(deltaBufferTimer);
        var allDivisable = (isDivisible(deltaBuffer[0], 120) &&
        isDivisible(deltaBuffer[1], 120) &&
        isDivisible(deltaBuffer[2], 120));
        return !allDivisable;
    }

    function isDivisible(n, divisor) {
        return (Math.floor(n / divisor) == n / divisor);
    }

    var requestFrame = (function () {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            function (callback, element, delay) {
                window.setTimeout(callback, delay || (1000 / 60));
            };
    })();


    /***********************************************
     * PULSE
     ***********************************************/

    /**
     * Viscous fluid with a pulse for part and decay for the rest.
     * - Applies a fixed force over an interval (a damped acceleration), and
     * - Lets the exponential bleed away the velocity over a longer interval
     * - Michael Herf, http://stereopsis.com/stopping/
     */
    function pulse_(x) {
        var val, start, expx;
        // test
        x = x * options.pulseScale;
        if (x < 1) { // acceleartion
            val = x - (1 - Math.exp(-x));
        } else {     // tail
            // the previous animation ended here:
            start = Math.exp(-1);
            // simple viscous drag
            x -= 1;
            expx = 1 - Math.exp(-x);
            val = start + (expx * (1 - start));
        }
        return val * options.pulseNormalize;
    }

    function pulse(x) {
        if (x >= 1) return 1;
        if (x <= 0) return 0;

        if (options.pulseNormalize == 1) {
            options.pulseNormalize /= pulse_(1);
        }
        return pulse_(x);
    }

    var isChrome = /chrome/i.test(window.navigator.userAgent);
    var wheelEvent = null;
    if ("onwheel" in document.createElement("div"))
        wheelEvent = "wheel";
    else if ("onmousewheel" in document.createElement("div"))
        wheelEvent = "mousewheel";

    if (wheelEvent && isChrome) {
        addEvent(wheelEvent, wheel);
        addEvent("mousedown", mousedown);
        addEvent("load", init);
    }

})();
(function() {
  var MutationObserver, Util, WeakMap, getComputedStyle, getComputedStyleRX,
    bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  Util = (function() {
    function Util() {}

    Util.prototype.extend = function(custom, defaults) {
      var key, value;
      for (key in defaults) {
        value = defaults[key];
        if (custom[key] == null) {
          custom[key] = value;
        }
      }
      return custom;
    };

    Util.prototype.isMobile = function(agent) {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(agent);
    };

    Util.prototype.createEvent = function(event, bubble, cancel, detail) {
      var customEvent;
      if (bubble == null) {
        bubble = false;
      }
      if (cancel == null) {
        cancel = false;
      }
      if (detail == null) {
        detail = null;
      }
      if (document.createEvent != null) {
        customEvent = document.createEvent('CustomEvent');
        customEvent.initCustomEvent(event, bubble, cancel, detail);
      } else if (document.createEventObject != null) {
        customEvent = document.createEventObject();
        customEvent.eventType = event;
      } else {
        customEvent.eventName = event;
      }
      return customEvent;
    };

    Util.prototype.emitEvent = function(elem, event) {
      if (elem.dispatchEvent != null) {
        return elem.dispatchEvent(event);
      } else if (event in (elem != null)) {
        return elem[event]();
      } else if (("on" + event) in (elem != null)) {
        return elem["on" + event]();
      }
    };

    Util.prototype.addEvent = function(elem, event, fn) {
      if (elem.addEventListener != null) {
        return elem.addEventListener(event, fn, false);
      } else if (elem.attachEvent != null) {
        return elem.attachEvent("on" + event, fn);
      } else {
        return elem[event] = fn;
      }
    };

    Util.prototype.removeEvent = function(elem, event, fn) {
      if (elem.removeEventListener != null) {
        return elem.removeEventListener(event, fn, false);
      } else if (elem.detachEvent != null) {
        return elem.detachEvent("on" + event, fn);
      } else {
        return delete elem[event];
      }
    };

    Util.prototype.innerHeight = function() {
      if ('innerHeight' in window) {
        return window.innerHeight;
      } else {
        return document.documentElement.clientHeight;
      }
    };

    return Util;

  })();

  WeakMap = this.WeakMap || this.MozWeakMap || (WeakMap = (function() {
    function WeakMap() {
      this.keys = [];
      this.values = [];
    }

    WeakMap.prototype.get = function(key) {
      var i, item, j, len, ref;
      ref = this.keys;
      for (i = j = 0, len = ref.length; j < len; i = ++j) {
        item = ref[i];
        if (item === key) {
          return this.values[i];
        }
      }
    };

    WeakMap.prototype.set = function(key, value) {
      var i, item, j, len, ref;
      ref = this.keys;
      for (i = j = 0, len = ref.length; j < len; i = ++j) {
        item = ref[i];
        if (item === key) {
          this.values[i] = value;
          return;
        }
      }
      this.keys.push(key);
      return this.values.push(value);
    };

    return WeakMap;

  })());

  MutationObserver = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (MutationObserver = (function() {
    function MutationObserver() {
      if (typeof console !== "undefined" && console !== null) {
        console.warn('MutationObserver is not supported by your browser.');
      }
      if (typeof console !== "undefined" && console !== null) {
        console.warn('WOW.js cannot detect dom mutations, please call .sync() after loading new content.');
      }
    }

    MutationObserver.notSupported = true;

    MutationObserver.prototype.observe = function() {};

    return MutationObserver;

  })());

  getComputedStyle = this.getComputedStyle || function(el, pseudo) {
    this.getPropertyValue = function(prop) {
      var ref;
      if (prop === 'float') {
        prop = 'styleFloat';
      }
      if (getComputedStyleRX.test(prop)) {
        prop.replace(getComputedStyleRX, function(_, _char) {
          return _char.toUpperCase();
        });
      }
      return ((ref = el.currentStyle) != null ? ref[prop] : void 0) || null;
    };
    return this;
  };

  getComputedStyleRX = /(\-([a-z]){1})/g;

  this.WOW = (function() {
    WOW.prototype.defaults = {
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: true,
      live: true,
      callback: null,
      scrollContainer: null
    };

    function WOW(options) {
      if (options == null) {
        options = {};
      }
      this.scrollCallback = bind(this.scrollCallback, this);
      this.scrollHandler = bind(this.scrollHandler, this);
      this.resetAnimation = bind(this.resetAnimation, this);
      this.start = bind(this.start, this);
      this.scrolled = true;
      this.config = this.util().extend(options, this.defaults);
      if (options.scrollContainer != null) {
        this.config.scrollContainer = document.querySelector(options.scrollContainer);
      }
      this.animationNameCache = new WeakMap();
      this.wowEvent = this.util().createEvent(this.config.boxClass);
    }

    WOW.prototype.init = function() {
      var ref;
      this.element = window.document.documentElement;
      if ((ref = document.readyState) === "interactive" || ref === "complete") {
        this.start();
      } else {
        this.util().addEvent(document, 'DOMContentLoaded', this.start);
      }
      return this.finished = [];
    };

    WOW.prototype.start = function() {
      var box, j, len, ref;
      this.stopped = false;
      this.boxes = (function() {
        var j, len, ref, results;
        ref = this.element.querySelectorAll("." + this.config.boxClass);
        results = [];
        for (j = 0, len = ref.length; j < len; j++) {
          box = ref[j];
          results.push(box);
        }
        return results;
      }).call(this);
      this.all = (function() {
        var j, len, ref, results;
        ref = this.boxes;
        results = [];
        for (j = 0, len = ref.length; j < len; j++) {
          box = ref[j];
          results.push(box);
        }
        return results;
      }).call(this);
      if (this.boxes.length) {
        if (this.disabled()) {
          this.resetStyle();
        } else {
          ref = this.boxes;
          for (j = 0, len = ref.length; j < len; j++) {
            box = ref[j];
            this.applyStyle(box, true);
          }
        }
      }
      if (!this.disabled()) {
        this.util().addEvent(this.config.scrollContainer || window, 'scroll', this.scrollHandler);
        this.util().addEvent(window, 'resize', this.scrollHandler);
        this.interval = setInterval(this.scrollCallback, 50);
      }
      if (this.config.live) {
        return new MutationObserver((function(_this) {
          return function(records) {
            var k, len1, node, record, results;
            results = [];
            for (k = 0, len1 = records.length; k < len1; k++) {
              record = records[k];
              results.push((function() {
                var l, len2, ref1, results1;
                ref1 = record.addedNodes || [];
                results1 = [];
                for (l = 0, len2 = ref1.length; l < len2; l++) {
                  node = ref1[l];
                  results1.push(this.doSync(node));
                }
                return results1;
              }).call(_this));
            }
            return results;
          };
        })(this)).observe(document.body, {
          childList: true,
          subtree: true
        });
      }
    };

    WOW.prototype.stop = function() {
      this.stopped = true;
      this.util().removeEvent(this.config.scrollContainer || window, 'scroll', this.scrollHandler);
      this.util().removeEvent(window, 'resize', this.scrollHandler);
      if (this.interval != null) {
        return clearInterval(this.interval);
      }
    };

    WOW.prototype.sync = function(element) {
      if (MutationObserver.notSupported) {
        return this.doSync(this.element);
      }
    };

    WOW.prototype.doSync = function(element) {
      var box, j, len, ref, results;
      if (element == null) {
        element = this.element;
      }
      if (element.nodeType !== 1) {
        return;
      }
      element = element.parentNode || element;
      ref = element.querySelectorAll("." + this.config.boxClass);
      results = [];
      for (j = 0, len = ref.length; j < len; j++) {
        box = ref[j];
        if (indexOf.call(this.all, box) < 0) {
          this.boxes.push(box);
          this.all.push(box);
          if (this.stopped || this.disabled()) {
            this.resetStyle();
          } else {
            this.applyStyle(box, true);
          }
          results.push(this.scrolled = true);
        } else {
          results.push(void 0);
        }
      }
      return results;
    };

    WOW.prototype.show = function(box) {
      this.applyStyle(box);
      box.className = box.className + " " + this.config.animateClass;
      if (this.config.callback != null) {
        this.config.callback(box);
      }
      this.util().emitEvent(box, this.wowEvent);
      this.util().addEvent(box, 'animationend', this.resetAnimation);
      this.util().addEvent(box, 'oanimationend', this.resetAnimation);
      this.util().addEvent(box, 'webkitAnimationEnd', this.resetAnimation);
      this.util().addEvent(box, 'MSAnimationEnd', this.resetAnimation);
      return box;
    };

    WOW.prototype.applyStyle = function(box, hidden) {
      var delay, duration, iteration;
      duration = box.getAttribute('data-wow-duration');
      delay = box.getAttribute('data-wow-delay');
      iteration = box.getAttribute('data-wow-iteration');
      return this.animate((function(_this) {
        return function() {
          return _this.customStyle(box, hidden, duration, delay, iteration);
        };
      })(this));
    };

    WOW.prototype.animate = (function() {
      if ('requestAnimationFrame' in window) {
        return function(callback) {
          return window.requestAnimationFrame(callback);
        };
      } else {
        return function(callback) {
          return callback();
        };
      }
    })();

    WOW.prototype.resetStyle = function() {
      var box, j, len, ref, results;
      ref = this.boxes;
      results = [];
      for (j = 0, len = ref.length; j < len; j++) {
        box = ref[j];
        results.push(box.style.visibility = 'visible');
      }
      return results;
    };

    WOW.prototype.resetAnimation = function(event) {
      var target;
      if (event.type.toLowerCase().indexOf('animationend') >= 0) {
        target = event.target || event.srcElement;
        return target.className = target.className.replace(this.config.animateClass, '').trim();
      }
    };

    WOW.prototype.customStyle = function(box, hidden, duration, delay, iteration) {
      if (hidden) {
        this.cacheAnimationName(box);
      }
      box.style.visibility = hidden ? 'hidden' : 'visible';
      if (duration) {
        this.vendorSet(box.style, {
          animationDuration: duration
        });
      }
      if (delay) {
        this.vendorSet(box.style, {
          animationDelay: delay
        });
      }
      if (iteration) {
        this.vendorSet(box.style, {
          animationIterationCount: iteration
        });
      }
      this.vendorSet(box.style, {
        animationName: hidden ? 'none' : this.cachedAnimationName(box)
      });
      return box;
    };

    WOW.prototype.vendors = ["moz", "webkit"];

    WOW.prototype.vendorSet = function(elem, properties) {
      var name, results, value, vendor;
      results = [];
      for (name in properties) {
        value = properties[name];
        elem["" + name] = value;
        results.push((function() {
          var j, len, ref, results1;
          ref = this.vendors;
          results1 = [];
          for (j = 0, len = ref.length; j < len; j++) {
            vendor = ref[j];
            results1.push(elem["" + vendor + (name.charAt(0).toUpperCase()) + (name.substr(1))] = value);
          }
          return results1;
        }).call(this));
      }
      return results;
    };

    WOW.prototype.vendorCSS = function(elem, property) {
      var j, len, ref, result, style, vendor;
      style = getComputedStyle(elem);
      result = style.getPropertyCSSValue(property);
      ref = this.vendors;
      for (j = 0, len = ref.length; j < len; j++) {
        vendor = ref[j];
        result = result || style.getPropertyCSSValue("-" + vendor + "-" + property);
      }
      return result;
    };

    WOW.prototype.animationName = function(box) {
      var animationName;
      try {
        animationName = this.vendorCSS(box, 'animation-name').cssText;
      } catch (_error) {
        animationName = getComputedStyle(box).getPropertyValue('animation-name');
      }
      if (animationName === 'none') {
        return '';
      } else {
        return animationName;
      }
    };

    WOW.prototype.cacheAnimationName = function(box) {
      return this.animationNameCache.set(box, this.animationName(box));
    };

    WOW.prototype.cachedAnimationName = function(box) {
      return this.animationNameCache.get(box);
    };

    WOW.prototype.scrollHandler = function() {
      return this.scrolled = true;
    };

    WOW.prototype.scrollCallback = function() {
      var box;
      if (this.scrolled) {
        this.scrolled = false;
        this.boxes = (function() {
          var j, len, ref, results;
          ref = this.boxes;
          results = [];
          for (j = 0, len = ref.length; j < len; j++) {
            box = ref[j];
            if (!(box)) {
              continue;
            }
            if (this.isVisible(box)) {
              this.show(box);
              continue;
            }
            results.push(box);
          }
          return results;
        }).call(this);
        if (!(this.boxes.length || this.config.live)) {
          return this.stop();
        }
      }
    };

    WOW.prototype.offsetTop = function(element) {
      var top;
      while (element.offsetTop === void 0) {
        element = element.parentNode;
      }
      top = element.offsetTop;
      while (element = element.offsetParent) {
        top += element.offsetTop;
      }
      return top;
    };

    WOW.prototype.isVisible = function(box) {
      var bottom, offset, top, viewBottom, viewTop;
      offset = box.getAttribute('data-wow-offset') || this.config.offset;
      viewTop = (this.config.scrollContainer && this.config.scrollContainer.scrollTop) || window.pageYOffset;
      viewBottom = viewTop + Math.min(this.element.clientHeight, this.util().innerHeight()) - offset;
      top = this.offsetTop(box);
      bottom = top + box.clientHeight;
      return top <= viewBottom && bottom >= viewTop;
    };

    WOW.prototype.util = function() {
      return this._util != null ? this._util : this._util = new Util();
    };

    WOW.prototype.disabled = function() {
      return !this.config.mobile && this.util().isMobile(navigator.userAgent);
    };

    return WOW;

  })();

}).call(this);
/*!
 * cond - v0.1 - 6/10/2009
 * http://benalman.com/projects/jquery-cond-plugin/
 * 
 * Copyright (c) 2009 "Cowboy" Ben Alman
 * Licensed under the MIT license
 * http://benalman.com/about/license/
 * 
 * Based on suggestions and sample code by Stephen Band and DBJDBJ in the
 * jquery-dev Google group: http://bit.ly/jqba1
 */

(function ($) {
    '$:nomunge'; // Used by YUI compressor.

    $.fn.cond = function () {
        var undefined,
            args = arguments,
            i = 0,
            test,
            callback,
            result;

        while (!test && i < args.length) {
            test = args[i++];
            callback = args[i++];

            test = $.isFunction(test) ? test.call(this) : test;

            result = !callback ? test
                : test ? callback.call(this, test)
                : undefined;
        }

        return result !== undefined ? result : this;
    };

})(jQuery);
/**
 * jquery.slitslider.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */

;
(function ($, window, undefined) {

    'use strict';

    /*
     * debouncedresize: special jQuery event that happens once after a window resize
     *
     * latest version and complete README available on Github:
     * https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
     *
     * Copyright 2011 @louis_remi
     * Licensed under the MIT license.
     */
    var $event = $.event,
        $special,
        resizeTimeout;

    $special = $event.special.debouncedresize = {
        setup: function () {
            $(this).on("resize", $special.handler);
        },
        teardown: function () {
            $(this).off("resize", $special.handler);
        },
        handler: function (event, execAsap) {
            // Save the context
            var context = this,
                args = arguments,
                dispatch = function () {
                    // set correct event type
                    event.type = "debouncedresize";
                    $event.dispatch.apply(context, args);
                };

            if (resizeTimeout) {
                clearTimeout(resizeTimeout);
            }

            execAsap ?
                dispatch() :
                resizeTimeout = setTimeout(dispatch, $special.threshold);
        },
        threshold: 20
    };

    // global
    var $window = $(window),
        $document = $(document),
        Modernizr = window.Modernizr;

    $.Slitslider = function (options, element) {

        this.$elWrapper = $(element);
        this._init(options);

    };

    $.Slitslider.defaults = {
        // transitions speed
        speed: 800,
        // if true the item's slices will also animate the opacity value
        optOpacity: false,
        // amount (%) to translate both slices - adjust as necessary
        translateFactor: 230,
        // maximum possible angle
        maxAngle: 40,
        // maximum possible scale
        maxScale: 2,
        // slideshow on / off
        autoplay: false,
        // keyboard navigation
        keyboard: true,
        // time between transitions
        interval: 4000,
        fullscreen: false,
        animation: 'fade',
        // callbacks
        onBeforeChange: function (slide, idx) {
            return false;
        },
        onAfterChange: function (slide, idx) {
            return false;
        }
    };

    $.Slitslider.prototype = {

        _init: function (options) {

            // options
            this.options = $.extend(true, {}, $.Slitslider.defaults, options);

            // https://github.com/twitter/bootstrap/issues/2870
            this.transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            };
            this.transEndEventName = this.transEndEventNames[Modernizr.prefixed('transition')];
            // suport for css 3d transforms and css transitions
            this.support = Modernizr.csstransitions && Modernizr.csstransforms3d;
            // the slider
            this.$el = this.$elWrapper.children('.sl-slider');
            // the slides
            this.$slides = this.$el.children('.sl-slide').hide();
            // total slides
            this.slidesCount = this.$slides.length;
            // current slide
            this.current = 0;
            // control if it's animating
            this.isAnimating = false;
            // get container size
            this._getSize();
            // layout
            this._layout();
            // load some events
            this._loadEvents();
            // slideshow
            if (this.options.autoplay) {

                this._startSlideshow();

            }

        },
        // gets the current container width & height
        _getSize: function () {
            this.size = {
                width: this.$elWrapper.outerWidth(true),
            };
            if (this.options.fullscreen)
                this.size.height = $(window).height();
            else
                this.size.height = this.$elWrapper.outerHeight(true);

        },
        _layout: function () {

            this.$slideWrapper = $('<div class="sl-slides-wrapper" />');

            // wrap the slides
            this.$slides.wrapAll(this.$slideWrapper).each(function (i) {

                var $slide = $(this),
                // vertical || horizontal
                    orientation = $slide.data('orientation');

                $slide.addClass('sl-slide-' + orientation)
                    .children()
                    .wrapAll('<div class="sl-content-wrapper" />')
                    .wrapAll('<div class="sl-content" />');

            });

            // set the right size of the slider/slides for the current window size
            this._setSize();
            // show first slide
            this.$slides.eq(this.current).show().addClass('sl-trans-elems');

        },
        _navigate: function (dir, pos) {

            if (this.isAnimating || this.slidesCount < 2) {

                return false;

            }

            this.isAnimating = true;

            var self = this,
                $currentSlide = this.$slides.eq(this.current);

            // if position is passed
            if (pos !== undefined) {

                this.current = pos;

            }
            // if not check the boundaries
            else if (dir === 'next') {

                this.current = this.current < this.slidesCount - 1 ? ++this.current : 0;

            }
            else if (dir === 'prev') {

                this.current = this.current > 0 ? --this.current : this.slidesCount - 1;

            }

            this.options.onBeforeChange($currentSlide, this.current);

            // next slide to be shown
            var $nextSlide = this.$slides.eq(this.current),
            // the slide we want to cut and animate
                $movingSlide = ( dir === 'next' ) ? $currentSlide : $nextSlide,

            // the following are the data attrs set for each slide
                configData = $movingSlide.data(),
                config = {};

            config.orientation = configData.orientation || 'horizontal',
            config.slice1angle = configData.slice1Rotation || 0,
            config.slice1scale = configData.slice1Scale || 1,
            config.slice2angle = configData.slice2Rotation || 0,
            config.slice2scale = configData.slice2Scale || 1;

            this._validateValues(config);

            var cssStyle = config.orientation === 'horizontal' ? {
                    marginTop: -this.size.height / 2
                } : {
                    marginLeft: -this.size.width / 2
                },
            // default slide's slices style
                resetStyle = {
                    'transform': 'translate(0%,0%) rotate(0deg) scale(1)',
                    opacity: 1
                },
            // slice1 style
                slice1Style = config.orientation === 'horizontal' ? {
                    'transform': 'translateY(-' + this.options.translateFactor + '%) rotate(' + config.slice1angle + 'deg) scale(' + config.slice1scale + ')'
                } : {
                    'transform': 'translateX(-' + this.options.translateFactor + '%) rotate(' + config.slice1angle + 'deg) scale(' + config.slice1scale + ')'
                },
            // slice2 style
                slice2Style = config.orientation === 'horizontal' ? {
                    'transform': 'translateY(' + this.options.translateFactor + '%) rotate(' + config.slice2angle + 'deg) scale(' + config.slice2scale + ')'
                } : {
                    'transform': 'translateX(' + this.options.translateFactor + '%) rotate(' + config.slice2angle + 'deg) scale(' + config.slice2scale + ')'
                };

            if (this.options.optOpacity) {

                slice1Style.opacity = 0;
                slice2Style.opacity = 0;

            }

            // we are adding the classes sl-trans-elems and sl-trans-back-elems to the slide that is either coming "next"
            // or going "prev" according to the direction.
            // the idea is to make it more interesting by giving some animations to the respective slide's elements
            //( dir === 'next' ) ? $nextSlide.addClass( 'sl-trans-elems' ) : $currentSlide.addClass( 'sl-trans-back-elems' );

            if (this.options.animation && this.options.animation === 'fade') {
                $currentSlide.removeClass('sl-trans-elems').css('z-index', 10);
                $nextSlide.css({'z-index': 5, 'display': 'block'});

                setTimeout(function () {
                    $nextSlide.addClass('sl-trans-elems');
                }, this.options.speed / 2);

                $currentSlide.fadeOut(this.options.speed, function () {
                    self.isAnimating = false;
                });

                return;
            }

            $currentSlide.removeClass('sl-trans-elems');

            var transitionProp = {
                'transition': 'all ' + this.options.speed + 'ms ease-in-out'
            };

            // add the 2 slices and animate them
            $movingSlide.css('z-index', this.slidesCount)
                .find('div.sl-content-wrapper')
                .wrap($('<div class="sl-content-slice" />').css(transitionProp))
                .parent()
                .cond(
                dir === 'prev',
                function () {

                    var slice = this;
                    this.css(slice1Style);
                    setTimeout(function () {

                        slice.css(resetStyle);

                    }, 50);

                },
                function () {

                    var slice = this;
                    setTimeout(function () {

                        slice.css(slice1Style);

                    }, 50);

                }
            )
                .clone()
                .appendTo($movingSlide)
                .cond(
                dir === 'prev',
                function () {

                    var slice = this;
                    this.css(slice2Style);
                    setTimeout(function () {

                        $currentSlide.addClass('sl-trans-back-elems');

                        if (self.support) {

                            slice.css(resetStyle).on(self.transEndEventName, function () {

                                self._onEndNavigate(slice, $currentSlide, dir);

                            });

                        }
                        else {

                            self._onEndNavigate(slice, $currentSlide, dir);

                        }

                    }, 50);

                },
                function () {

                    var slice = this;
                    setTimeout(function () {

                        $nextSlide.addClass('sl-trans-elems');

                        if (self.support) {

                            slice.css(slice2Style).on(self.transEndEventName, function () {

                                self._onEndNavigate(slice, $currentSlide, dir);

                            });

                        }
                        else {

                            self._onEndNavigate(slice, $currentSlide, dir);

                        }

                    }, 50);

                }
            )
                .find('div.sl-content-wrapper')
                .css(cssStyle);

            $nextSlide.show();

        },
        _validateValues: function (config) {

            // OK, so we are restricting the angles and scale values here.
            // This is to avoid the slices wrong sides to be shown.
            // you can adjust these values as you wish but make sure you also ajust the
            // paddings of the slides and also the options.translateFactor value and scale data attrs
            if (config.slice1angle > this.options.maxAngle || config.slice1angle < -this.options.maxAngle) {

                config.slice1angle = this.options.maxAngle;

            }
            if (config.slice2angle > this.options.maxAngle || config.slice2angle < -this.options.maxAngle) {

                config.slice2angle = this.options.maxAngle;

            }
            if (config.slice1scale > this.options.maxScale || config.slice1scale <= 0) {

                config.slice1scale = this.options.maxScale;

            }
            if (config.slice2scale > this.options.maxScale || config.slice2scale <= 0) {

                config.slice2scale = this.options.maxScale;

            }
            if (config.orientation !== 'vertical' && config.orientation !== 'horizontal') {

                config.orientation = 'horizontal'

            }

        },
        _onEndNavigate: function ($slice, $oldSlide, dir) {

            // reset previous slide's style after next slide is shown
            var $slide = $slice.parent(),
                removeClasses = 'sl-trans-elems sl-trans-back-elems';

            // remove second slide's slice
            $slice.remove();
            // unwrap..
            $slide.css('z-index', 1)
                .find('div.sl-content-wrapper')
                .unwrap();

            // hide previous current slide
            $oldSlide.hide().removeClass(removeClasses);
            $slide.removeClass(removeClasses);
            // now we can navigate again..
            this.isAnimating = false;
            this.options.onAfterChange($slide, this.current);

        },
        _setSize: function () {

            // the slider and content wrappers will have the window's width and height
            var cssStyle = {
                width: this.size.width,
                height: this.size.height
            };

            this.$el.css(cssStyle).closest('.sl-slider-wrapper').css(cssStyle).find('div.sl-content-wrapper').css(cssStyle);

        },
        _loadEvents: function () {

            var self = this;

            $window.on('debouncedresize.slitslider', function (event) {

                // update size values
                self._getSize();
                // set the sizes again
                self._setSize();

            });

            if (this.options.keyboard) {

                $document.on('keydown.slitslider', function (e) {

                    var keyCode = e.keyCode || e.which,
                        arrow = {
                            left: 37,
                            up: 38,
                            right: 39,
                            down: 40
                        };

                    switch (keyCode) {

                        case arrow.left :

                            self._stopSlideshow();
                            self._navigate('prev');
                            break;

                        case arrow.right :

                            self._stopSlideshow();
                            self._navigate('next');
                            break;

                    }

                });

            }

        },
        _startSlideshow: function () {

            var self = this;

            this.slideshow = setTimeout(function () {

                self._navigate('next');

                if (self.options.autoplay) {

                    self._startSlideshow();

                }

            }, this.options.interval);

        },
        _stopSlideshow: function () {

            if (this.options.autoplay) {

                clearTimeout(this.slideshow);
                this.isPlaying = false;
                this.options.autoplay = false;

            }

        },
        _destroy: function (callback) {

            this.$el.off('.slitslider').removeData('slitslider');
            $window.off('.slitslider');
            $document.off('.slitslider');
            this.$slides.each(function (i) {

                var $slide = $(this),
                    $content = $slide.find('div.sl-content').children();

                $content.appendTo($slide);
                $slide.children('div.sl-content-wrapper').remove();

            });
            this.$slides.unwrap(this.$slideWrapper).hide();
            this.$slides.eq(0).show();
            if (callback) {

                callback.call();

            }

        },
        // public methos: adds more slides to the slider
        add: function ($slides, callback) {

            this.$slides = this.$slides.add($slides);

            var self = this;


            $slides.each(function (i) {

                var $slide = $(this),
                // vertical || horizontal
                    orientation = $slide.data('orientation');

                $slide.hide().addClass('sl-slide-' + orientation)
                    .children()
                    .wrapAll('<div class="sl-content-wrapper" />')
                    .wrapAll('<div class="sl-content" />')
                    .end()
                    .appendTo(self.$el.find('div.sl-slides-wrapper'));

            });

            this._setSize();

            this.slidesCount = this.$slides.length;

            if (callback) {

                callback.call($items);

            }

        },
        // public method: shows next slide
        next: function () {

            this._stopSlideshow();
            this._navigate('next');

        },
        // public method: shows previous slide
        previous: function () {

            this._stopSlideshow();
            this._navigate('prev');

        },
        // public method: goes to a specific slide
        jump: function (pos) {

            pos -= 1;

            if (pos === this.current || pos >= this.slidesCount || pos < 0) {

                return false;

            }

            this._stopSlideshow();
            this._navigate(pos > this.current ? 'next' : 'prev', pos);

        },
        // public method: starts the slideshow
        // any call to next(), previous() or jump() will stop the slideshow
        play: function () {

            if (!this.isPlaying) {

                this.isPlaying = true;

                this._navigate('next');
                this.options.autoplay = true;
                this._startSlideshow();

            }

        },
        // public method: pauses the slideshow
        pause: function () {

            if (this.isPlaying) {

                this._stopSlideshow();

            }

        },
        // public method: check if isAnimating is true
        isActive: function () {

            return this.isAnimating;

        },
        // publicc methos: destroys the slicebox instance
        destroy: function (callback) {

            this._destroy(callback);

        }

    };

    var logError = function (message) {

        if (window.console) {

            window.console.error(message);

        }

    };

    $.fn.slitslider = function (options) {

        var self = $.data(this, 'slitslider');

        if (typeof options === 'string') {

            var args = Array.prototype.slice.call(arguments, 1);

            this.each(function () {

                if (!self) {

                    logError("cannot call methods on slitslider prior to initialization; " +
                    "attempted to call method '" + options + "'");
                    return;

                }

                if (!$.isFunction(self[options]) || options.charAt(0) === "_") {

                    logError("no such method '" + options + "' for slitslider self");
                    return;

                }

                self[options].apply(self, args);

            });

        }
        else {

            this.each(function () {

                if (self) {

                    self._init();

                }
                else {

                    self = $.data(this, 'slitslider', new $.Slitslider(options, this));

                }

            });

        }

        return self;

    };

})(jQuery, window);

/*!
    Colorbox 1.6.3
    license: MIT
    http://www.jacklmoore.com/colorbox
*/
(function($, document, window) {
    var
    // Default settings object.
    // See http://jacklmoore.com/colorbox for details.
        defaults = {
            // data sources
            html: false,
            photo: false,
            iframe: false,
            inline: false,

            // behavior and appearance
            transition: "elastic",
            speed: 300,
            fadeOut: 300,
            width: false,
            initialWidth: "600",
            innerWidth: false,
            maxWidth: false,
            height: false,
            initialHeight: "450",
            innerHeight: false,
            maxHeight: false,
            scalePhotos: true,
            scrolling: true,
            opacity: 0.9,
            preloading: true,
            className: false,
            overlayClose: true,
            escKey: true,
            arrowKey: true,
            top: false,
            bottom: false,
            left: false,
            right: false,
            fixed: false,
            data: undefined,
            closeButton: true,
            fastIframe: true,
            open: false,
            reposition: true,
            loop: true,
            slideshow: false,
            slideshowAuto: true,
            slideshowSpeed: 2500,
            slideshowStart: "start slideshow",
            slideshowStop: "stop slideshow",
            photoRegex: /\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,

            // alternate image paths for high-res displays
            retinaImage: false,
            retinaUrl: false,
            retinaSuffix: '@2x.$1',

            // internationalization
            current: "image {current} of {total}",
            previous: "previous",
            next: "next",
            close: "close",
            xhrError: "This content failed to load.",
            imgError: "This image failed to load.",

            // accessbility
            returnFocus: true,
            trapFocus: true,

            // callbacks
            onOpen: false,
            onLoad: false,
            onComplete: false,
            onCleanup: false,
            onClosed: false,

            rel: function() {
                return this.rel;
            },
            href: function() {
                // using this.href would give the absolute url, when the href may have been inteded as a selector (e.g. '#container')
                return $(this).attr('href');
            },
            title: function() {
                return this.title;
            },
            createImg: function() {
                var img = new Image();
                var attrs = $(this).data('cbox-img-attrs');

                if (typeof attrs === 'object') {
                    $.each(attrs, function(key, val) {
                        img[key] = val;
                    });
                }

                return img;
            },
            createIframe: function() {
                var iframe = document.createElement('iframe');
                var attrs = $(this).data('cbox-iframe-attrs');

                if (typeof attrs === 'object') {
                    $.each(attrs, function(key, val) {
                        iframe[key] = val;
                    });
                }

                if ('frameBorder' in iframe) {
                    iframe.frameBorder = 0;
                }
                if ('allowTransparency' in iframe) {
                    iframe.allowTransparency = "true";
                }
                iframe.name = (new Date()).getTime(); // give the iframe a unique name to prevent caching
                iframe.allowFullscreen = true;

                return iframe;
            }
        },

        // Abstracting the HTML and event identifiers for easy rebranding
        colorbox = 'colorbox',
        prefix = 'cbox',
        boxElement = prefix + 'Element',

        // Events
        event_open = prefix + '_open',
        event_load = prefix + '_load',
        event_complete = prefix + '_complete',
        event_cleanup = prefix + '_cleanup',
        event_closed = prefix + '_closed',
        event_purge = prefix + '_purge',

        // Cached jQuery Object Variables
        $overlay,
        $box,
        $wrap,
        $content,
        $topBorder,
        $leftBorder,
        $rightBorder,
        $bottomBorder,
        $related,
        $window,
        $loaded,
        $loadingBay,
        $loadingOverlay,
        $title,
        $current,
        $slideshow,
        $next,
        $prev,
        $close,
        $groupControls,
        $events = $('<a/>'), // $({}) would be prefered, but there is an issue with jQuery 1.4.2

        // Variables for cached values or use across multiple functions
        settings,
        interfaceHeight,
        interfaceWidth,
        loadedHeight,
        loadedWidth,
        index,
        photo,
        open,
        active,
        closing,
        loadingTimer,
        publicMethod,
        div = "div",
        requests = 0,
        previousCSS = {},
        init;

    // ****************
    // HELPER FUNCTIONS
    // ****************

    // Convenience function for creating new jQuery objects
    function $tag(tag, id, css) {
        var element = document.createElement(tag);

        if (id) {
            element.id = prefix + id;
        }

        if (css) {
            element.style.cssText = css;
        }

        return $(element);
    }

    // Get the window height using innerHeight when available to avoid an issue with iOS
    // http://bugs.jquery.com/ticket/6724
    function winheight() {
        return window.innerHeight ? window.innerHeight : $(window).height();
    }

    function Settings(element, options) {
        if (options !== Object(options)) {
            options = {};
        }

        this.cache = {};
        this.el = element;

        this.value = function(key) {
            var dataAttr;

            if (this.cache[key] === undefined) {
                dataAttr = $(this.el).attr('data-cbox-' + key);

                if (dataAttr !== undefined) {
                    this.cache[key] = dataAttr;
                } else if (options[key] !== undefined) {
                    this.cache[key] = options[key];
                } else if (defaults[key] !== undefined) {
                    this.cache[key] = defaults[key];
                }
            }

            return this.cache[key];
        };

        this.get = function(key) {
            var value = this.value(key);
            return $.isFunction(value) ? value.call(this.el, this) : value;
        };
    }

    // Determine the next and previous members in a group.
    function getIndex(increment) {
        var
            max = $related.length,
            newIndex = (index + increment) % max;

        return (newIndex < 0) ? max + newIndex : newIndex;
    }

    // Convert '%' and 'px' values to integers
    function setSize(size, dimension) {
        return Math.round((/%/.test(size) ? ((dimension === 'x' ? $window.width() : winheight()) / 100) : 1) * parseInt(size, 10));
    }

    // Checks an href to see if it is a photo.
    // There is a force photo option (photo: true) for hrefs that cannot be matched by the regex.
    function isImage(settings, url) {
        return settings.get('photo') || settings.get('photoRegex').test(url);
    }

    function retinaUrl(settings, url) {
        return settings.get('retinaUrl') && window.devicePixelRatio > 1 ? url.replace(settings.get('photoRegex'), settings.get('retinaSuffix')) : url;
    }

    function trapFocus(e) {
        if ('contains' in $box[0] && !$box[0].contains(e.target) && e.target !== $overlay[0]) {
            e.stopPropagation();
            $box.focus();
        }
    }

    function setClass(str) {
        if (setClass.str !== str) {
            $box.add($overlay).removeClass(setClass.str).addClass(str);
            setClass.str = str;
        }
    }

    function getRelated(rel) {
        index = 0;

        if (rel && rel !== false && rel !== 'nofollow') {
            $related = $('.' + boxElement).filter(function() {
                var options = $.data(this, colorbox);
                var settings = new Settings(this, options);
                return (settings.get('rel') === rel);
            });
            index = $related.index(settings.el);

            // Check direct calls to Colorbox.
            if (index === -1) {
                $related = $related.add(settings.el);
                index = $related.length - 1;
            }
        } else {
            $related = $(settings.el);
        }
    }

    function trigger(event) {
        // for external use
        $(document).trigger(event);
        // for internal use
        $events.triggerHandler(event);
    }

    var slideshow = (function() {
        var active,
            className = prefix + "Slideshow_",
            click = "click." + prefix,
            timeOut;

        function clear() {
            clearTimeout(timeOut);
        }

        function set() {
            if (settings.get('loop') || $related[index + 1]) {
                clear();
                timeOut = setTimeout(publicMethod.next, settings.get('slideshowSpeed'));
            }
        }

        function start() {
            $slideshow
                .html(settings.get('slideshowStop'))
                .unbind(click)
                .one(click, stop);

            $events
                .bind(event_complete, set)
                .bind(event_load, clear);

            $box.removeClass(className + "off").addClass(className + "on");
        }

        function stop() {
            clear();

            $events
                .unbind(event_complete, set)
                .unbind(event_load, clear);

            $slideshow
                .html(settings.get('slideshowStart'))
                .unbind(click)
                .one(click, function() {
                    publicMethod.next();
                    start();
                });

            $box.removeClass(className + "on").addClass(className + "off");
        }

        function reset() {
            active = false;
            $slideshow.hide();
            clear();
            $events
                .unbind(event_complete, set)
                .unbind(event_load, clear);
            $box.removeClass(className + "off " + className + "on");
        }

        return function() {
            if (active) {
                if (!settings.get('slideshow')) {
                    $events.unbind(event_cleanup, reset);
                    reset();
                }
            } else {
                if (settings.get('slideshow') && $related[1]) {
                    active = true;
                    $events.one(event_cleanup, reset);
                    if (settings.get('slideshowAuto')) {
                        start();
                    } else {
                        stop();
                    }
                    $slideshow.show();
                }
            }
        };

    }());


    function launch(element) {
        var options;

        if (!closing) {

            options = $(element).data(colorbox);

            settings = new Settings(element, options);

            getRelated(settings.get('rel'));

            if (!open) {
                open = active = true; // Prevents the page-change action from queuing up if the visitor holds down the left or right keys.

                setClass(settings.get('className'));

                // Show colorbox so the sizes can be calculated in older versions of jQuery
                $box.css({
                    visibility: 'hidden',
                    display: 'block',
                    opacity: ''
                });

                $loaded = $tag(div, 'LoadedContent', 'width:0; height:0; overflow:hidden; visibility:hidden');
                $content.css({
                    width: '',
                    height: ''
                }).append($loaded);

                // Cache values needed for size calculations
                interfaceHeight = $topBorder.height() + $bottomBorder.height() + $content.outerHeight(true) - $content.height();
                interfaceWidth = $leftBorder.width() + $rightBorder.width() + $content.outerWidth(true) - $content.width();
                loadedHeight = $loaded.outerHeight(true);
                loadedWidth = $loaded.outerWidth(true);

                // Opens inital empty Colorbox prior to content being loaded.
                var initialWidth = setSize(settings.get('initialWidth'), 'x');
                var initialHeight = setSize(settings.get('initialHeight'), 'y');
                var maxWidth = settings.get('maxWidth');
                var maxHeight = settings.get('maxHeight');

                settings.w = Math.max((maxWidth !== false ? Math.min(initialWidth, setSize(maxWidth, 'x')) : initialWidth) - loadedWidth - interfaceWidth, 0);
                settings.h = Math.max((maxHeight !== false ? Math.min(initialHeight, setSize(maxHeight, 'y')) : initialHeight) - loadedHeight - interfaceHeight, 0);

                $loaded.css({
                    width: '',
                    height: settings.h
                });
                publicMethod.position();

                trigger(event_open);
                settings.get('onOpen');

                $groupControls.add($title).hide();

                $box.focus();

                if (settings.get('trapFocus')) {
                    // Confine focus to the modal
                    // Uses event capturing that is not supported in IE8-
                    if (document.addEventListener) {

                        document.addEventListener('focus', trapFocus, true);

                        $events.one(event_closed, function() {
                            document.removeEventListener('focus', trapFocus, true);
                        });
                    }
                }

                // Return focus on closing
                if (settings.get('returnFocus')) {
                    $events.one(event_closed, function() {
                        $(settings.el).focus();
                    });
                }
            }

            var opacity = parseFloat(settings.get('opacity'));
            $overlay.css({
                opacity: opacity === opacity ? opacity : '',
                cursor: settings.get('overlayClose') ? 'pointer' : '',
                visibility: 'visible'
            }).show();

            if (settings.get('closeButton')) {
                $close.html(settings.get('close')).appendTo($content);
            } else {
                $close.appendTo('<div/>'); // replace with .detach() when dropping jQuery < 1.4
            }

            load();
        }
    }

    // Colorbox's markup needs to be added to the DOM prior to being called
    // so that the browser will go ahead and load the CSS background images.
    function appendHTML() {
        if (!$box) {
            init = false;
            $window = $(window);
            $box = $tag(div).attr({
                id: colorbox,
                'class': $.support.opacity === false ? prefix + 'IE' : '', // class for optional IE8 & lower targeted CSS.
                role: 'dialog',
                tabindex: '-1'
            }).hide();
            $overlay = $tag(div, "Overlay").hide();
            $loadingOverlay = $([$tag(div, "LoadingOverlay")[0], $tag(div, "LoadingGraphic")[0]]);
            $wrap = $tag(div, "Wrapper");
            $content = $tag(div, "Content").append(
                $title = $tag(div, "Title"),
                $current = $tag(div, "Current"),
                $prev = $('<button type="button"/>').attr({
                    id: prefix + 'Previous'
                }),
                $next = $('<button type="button"/>').attr({
                    id: prefix + 'Next'
                }),
                $slideshow = $tag('button', "Slideshow"),
                $loadingOverlay
            );

            $close = $('<button type="button"/>').attr({
                id: prefix + 'Close'
            });

            $wrap.append( // The 3x3 Grid that makes up Colorbox
                $tag(div).append(
                    $tag(div, "TopLeft"),
                    $topBorder = $tag(div, "TopCenter"),
                    $tag(div, "TopRight")
                ),
                $tag(div, false, 'clear:left').append(
                    $leftBorder = $tag(div, "MiddleLeft"),
                    $content,
                    $rightBorder = $tag(div, "MiddleRight")
                ),
                $tag(div, false, 'clear:left').append(
                    $tag(div, "BottomLeft"),
                    $bottomBorder = $tag(div, "BottomCenter"),
                    $tag(div, "BottomRight")
                )
            ).find('div div').css({
                'float': 'left'
            });

            $loadingBay = $tag(div, false, 'position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;');

            $groupControls = $next.add($prev).add($current).add($slideshow);
        }
        if (document.body && !$box.parent().length) {
            $(document.body).append($overlay, $box.append($wrap, $loadingBay));
        }
    }

    // Add Colorbox's event bindings
    function addBindings() {
        function clickHandler(e) {
            // ignore non-left-mouse-clicks and clicks modified with ctrl / command, shift, or alt.
            // See: http://jacklmoore.com/notes/click-events/
            if (!(e.which > 1 || e.shiftKey || e.altKey || e.metaKey || e.ctrlKey)) {
                e.preventDefault();
                launch(this);
            }
        }

        if ($box) {
            if (!init) {
                init = true;

                // Anonymous functions here keep the public method from being cached, thereby allowing them to be redefined on the fly.
                $next.click(function() {
                    publicMethod.next();
                });
                $prev.click(function() {
                    publicMethod.prev();
                });
                $close.click(function() {
                    publicMethod.close();
                });
                $overlay.click(function() {
                    if (settings.get('overlayClose')) {
                        publicMethod.close();
                    }
                });

                // Key Bindings
                $(document).bind('keydown.' + prefix, function(e) {
                    var key = e.keyCode;
                    if (open && settings.get('escKey') && key === 27) {
                        e.preventDefault();
                        publicMethod.close();
                    }
                    if (open && settings.get('arrowKey') && $related[1] && !e.altKey) {
                        if (key === 37) {
                            e.preventDefault();
                            $prev.click();
                        } else if (key === 39) {
                            e.preventDefault();
                            $next.click();
                        }
                    }
                });

                if ($.isFunction($.fn.on)) {
                    // For jQuery 1.7+
                    $(document).on('click.' + prefix, '.' + boxElement, clickHandler);
                } else {
                    // For jQuery 1.3.x -> 1.6.x
                    // This code is never reached in jQuery 1.9, so do not contact me about 'live' being removed.
                    // This is not here for jQuery 1.9, it's here for legacy users.
                    $('.' + boxElement).live('click.' + prefix, clickHandler);
                }
            }
            return true;
        }
        return false;
    }

    // Don't do anything if Colorbox already exists.
    if ($[colorbox]) {
        return;
    }

    // Append the HTML when the DOM loads
    $(appendHTML);


    // ****************
    // PUBLIC FUNCTIONS
    // Usage format: $.colorbox.close();
    // Usage from within an iframe: parent.jQuery.colorbox.close();
    // ****************

    publicMethod = $.fn[colorbox] = $[colorbox] = function(options, callback) {
        var settings;
        var $obj = this;

        options = options || {};

        if ($.isFunction($obj)) { // assume a call to $.colorbox
            $obj = $('<a/>');
            options.open = true;
        }

        if (!$obj[0]) { // colorbox being applied to empty collection
            return $obj;
        }

        appendHTML();

        if (addBindings()) {

            if (callback) {
                options.onComplete = callback;
            }

            $obj.each(function() {
                var old = $.data(this, colorbox) || {};
                $.data(this, colorbox, $.extend(old, options));
            }).addClass(boxElement);

            settings = new Settings($obj[0], options);

            if (settings.get('open')) {
                launch($obj[0]);
            }
        }

        return $obj;
    };

    publicMethod.position = function(speed, loadedCallback) {
        var
            css,
            top = 0,
            left = 0,
            offset = $box.offset(),
            scrollTop,
            scrollLeft;

        $window.unbind('resize.' + prefix);

        // remove the modal so that it doesn't influence the document width/height
        $box.css({
            top: -9e4,
            left: -9e4
        });

        scrollTop = $window.scrollTop();
        scrollLeft = $window.scrollLeft();

        if (settings.get('fixed')) {
            offset.top -= scrollTop;
            offset.left -= scrollLeft;
            $box.css({
                position: 'fixed'
            });
        } else {
            top = scrollTop;
            left = scrollLeft;
            $box.css({
                position: 'absolute'
            });
        }

        // keeps the top and left positions within the browser's viewport.
        if (settings.get('right') !== false) {
            left += Math.max($window.width() - settings.w - loadedWidth - interfaceWidth - setSize(settings.get('right'), 'x'), 0);
        } else if (settings.get('left') !== false) {
            left += setSize(settings.get('left'), 'x');
        } else {
            left += Math.round(Math.max($window.width() - settings.w - loadedWidth - interfaceWidth, 0) / 2);
        }

        if (settings.get('bottom') !== false) {
            top += Math.max(winheight() - settings.h - loadedHeight - interfaceHeight - setSize(settings.get('bottom'), 'y'), 0);
        } else if (settings.get('top') !== false) {
            top += setSize(settings.get('top'), 'y');
        } else {
            top += Math.round(Math.max(winheight() - settings.h - loadedHeight - interfaceHeight, 0) / 2);
        }

        $box.css({
            top: offset.top,
            left: offset.left,
            visibility: 'visible'
        });

        // this gives the wrapper plenty of breathing room so it's floated contents can move around smoothly,
        // but it has to be shrank down around the size of div#colorbox when it's done.  If not,
        // it can invoke an obscure IE bug when using iframes.
        $wrap[0].style.width = $wrap[0].style.height = "9999px";

        function modalDimensions() {
            $topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = (parseInt($box[0].style.width, 10) - interfaceWidth) + 'px';
            $content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = (parseInt($box[0].style.height, 10) - interfaceHeight) + 'px';
        }

        css = {
            width: settings.w + loadedWidth + interfaceWidth,
            height: settings.h + loadedHeight + interfaceHeight,
            top: top,
            left: left
        };

        // setting the speed to 0 if the content hasn't changed size or position
        if (speed) {
            var tempSpeed = 0;
            $.each(css, function(i) {
                if (css[i] !== previousCSS[i]) {
                    tempSpeed = speed;
                    return;
                }
            });
            speed = tempSpeed;
        }

        previousCSS = css;

        if (!speed) {
            $box.css(css);
        }

        $box.dequeue().animate(css, {
            duration: speed || 0,
            complete: function() {
                modalDimensions();

                active = false;

                // shrink the wrapper down to exactly the size of colorbox to avoid a bug in IE's iframe implementation.
                $wrap[0].style.width = (settings.w + loadedWidth + interfaceWidth) + "px";
                $wrap[0].style.height = (settings.h + loadedHeight + interfaceHeight) + "px";

                if (settings.get('reposition')) {
                    setTimeout(function() { // small delay before binding onresize due to an IE8 bug.
                        $window.bind('resize.' + prefix, publicMethod.position);
                    }, 1);
                }

                if ($.isFunction(loadedCallback)) {
                    loadedCallback();
                }
            },
            step: modalDimensions
        });
    };

    publicMethod.resize = function(options) {
        var scrolltop;

        if (open) {
            options = options || {};

            if (options.width) {
                settings.w = setSize(options.width, 'x') - loadedWidth - interfaceWidth;
            }

            if (options.innerWidth) {
                settings.w = setSize(options.innerWidth, 'x');
            }

            $loaded.css({
                width: settings.w
            });

            if (options.height) {
                settings.h = setSize(options.height, 'y') - loadedHeight - interfaceHeight;
            }

            if (options.innerHeight) {
                settings.h = setSize(options.innerHeight, 'y');
            }

            if (!options.innerHeight && !options.height) {
                scrolltop = $loaded.scrollTop();
                $loaded.css({
                    height: "auto"
                });
                settings.h = $loaded.height();
            }

            $loaded.css({
                height: settings.h
            });

            if (scrolltop) {
                $loaded.scrollTop(scrolltop);
            }

            publicMethod.position(settings.get('transition') === "none" ? 0 : settings.get('speed'));
        }
    };

    publicMethod.prep = function(object) {
        if (!open) {
            return;
        }

        var callback, speed = settings.get('transition') === "none" ? 0 : settings.get('speed');

        $loaded.remove();

        $loaded = $tag(div, 'LoadedContent').append(object);

        function getWidth() {
            settings.w = settings.w || $loaded.width();
            settings.w = settings.mw && settings.mw < settings.w ? settings.mw : settings.w;
            return settings.w;
        }

        function getHeight() {
            settings.h = settings.h || $loaded.height();
            settings.h = settings.mh && settings.mh < settings.h ? settings.mh : settings.h;
            return settings.h;
        }

        $loaded.hide()
            .appendTo($loadingBay.show()) // content has to be appended to the DOM for accurate size calculations.
            .css({
                width: getWidth(),
                overflow: settings.get('scrolling') ? 'auto' : 'hidden'
            })
            .css({
                height: getHeight()
            }) // sets the height independently from the width in case the new width influences the value of height.
            .prependTo($content);

        $loadingBay.hide();

        // floating the IMG removes the bottom line-height and fixed a problem where IE miscalculates the width of the parent element as 100% of the document width.

        $(photo).css({
            'float': 'none'
        });

        setClass(settings.get('className'));

        callback = function() {
            var total = $related.length,
                iframe,
                complete;

            if (!open) {
                return;
            }

            function removeFilter() { // Needed for IE8 in versions of jQuery prior to 1.7.2
                if ($.support.opacity === false) {
                    $box[0].style.removeAttribute('filter');
                }
            }

            complete = function() {
                clearTimeout(loadingTimer);
                $loadingOverlay.hide();
                trigger(event_complete);
                settings.get('onComplete');
            };


            $title.html(settings.get('title')).show();
            $loaded.show();

            if (total > 1) { // handle grouping
                if (typeof settings.get('current') === "string") {
                    $current.html(settings.get('current').replace('{current}', index + 1).replace('{total}', total)).show();
                }

                $next[(settings.get('loop') || index < total - 1) ? "show" : "hide"]().html(settings.get('next'));
                $prev[(settings.get('loop') || index) ? "show" : "hide"]().html(settings.get('previous'));

                slideshow();

                // Preloads images within a rel group
                if (settings.get('preloading')) {
                    $.each([getIndex(-1), getIndex(1)], function() {
                        var img,
                            i = $related[this],
                            settings = new Settings(i, $.data(i, colorbox)),
                            src = settings.get('href');

                        if (src && isImage(settings, src)) {
                            src = retinaUrl(settings, src);
                            img = document.createElement('img');
                            img.src = src;
                        }
                    });
                }
            } else {
                $groupControls.hide();
            }

            if (settings.get('iframe')) {

                iframe = settings.get('createIframe');

                if (!settings.get('scrolling')) {
                    iframe.scrolling = "no";
                }

                $(iframe)
                    .attr({
                        src: settings.get('href'),
                        'class': prefix + 'Iframe'
                    })
                    .one('load', complete)
                    .appendTo($loaded);

                $events.one(event_purge, function() {
                    iframe.src = "//about:blank";
                });

                if (settings.get('fastIframe')) {
                    $(iframe).trigger('load');
                }
            } else {
                complete();
            }

            if (settings.get('transition') === 'fade') {
                $box.fadeTo(speed, 1, removeFilter);
            } else {
                removeFilter();
            }
        };

        if (settings.get('transition') === 'fade') {
            $box.fadeTo(speed, 0, function() {
                publicMethod.position(0, callback);
            });
        } else {
            publicMethod.position(speed, callback);
        }
    };

    function load() {
        var href, setResize, prep = publicMethod.prep,
            $inline, request = ++requests;

        active = true;

        photo = false;

        trigger(event_purge);
        trigger(event_load);
        settings.get('onLoad');

        settings.h = settings.get('height') ?
            setSize(settings.get('height'), 'y') - loadedHeight - interfaceHeight :
            settings.get('innerHeight') && setSize(settings.get('innerHeight'), 'y');

        settings.w = settings.get('width') ?
            setSize(settings.get('width'), 'x') - loadedWidth - interfaceWidth :
            settings.get('innerWidth') && setSize(settings.get('innerWidth'), 'x');

        // Sets the minimum dimensions for use in image scaling
        settings.mw = settings.w;
        settings.mh = settings.h;

        // Re-evaluate the minimum width and height based on maxWidth and maxHeight values.
        // If the width or height exceed the maxWidth or maxHeight, use the maximum values instead.
        if (settings.get('maxWidth')) {
            settings.mw = setSize(settings.get('maxWidth'), 'x') - loadedWidth - interfaceWidth;
            settings.mw = settings.w && settings.w < settings.mw ? settings.w : settings.mw;
        }
        if (settings.get('maxHeight')) {
            settings.mh = setSize(settings.get('maxHeight'), 'y') - loadedHeight - interfaceHeight;
            settings.mh = settings.h && settings.h < settings.mh ? settings.h : settings.mh;
        }

        href = settings.get('href');

        loadingTimer = setTimeout(function() {
            $loadingOverlay.show();
        }, 100);

        if (settings.get('inline')) {
            var $target = $(href);
            // Inserts an empty placeholder where inline content is being pulled from.
            // An event is bound to put inline content back when Colorbox closes or loads new content.
            $inline = $('<div>').hide().insertBefore($target);

            $events.one(event_purge, function() {
                $inline.replaceWith($target);
            });

            prep($target);
        } else if (settings.get('iframe')) {
            // IFrame element won't be added to the DOM until it is ready to be displayed,
            // to avoid problems with DOM-ready JS that might be trying to run in that iframe.
            prep(" ");
        } else if (settings.get('html')) {
            prep(settings.get('html'));
        } else if (isImage(settings, href)) {

            href = retinaUrl(settings, href);

            photo = settings.get('createImg');

            if(href.split('.').pop() === 'svg'){ console.log(href)
                // if the image is SVG, IE cannot read the actual width and height, so perform an ajax request and get svg width and height
                $.ajax({
                    url: href,
                    async: false,
                    dataType: 'xml',
                    success: function(svgxml) {
                        /* now with access to the source of the SVG, lookup the values you want... */
                        var attrs = svgxml.documentElement.attributes;
                        if(typeof attrs.width !== 'undefined')
                            photo.width = parseInt(attrs.width.value);

                        if(typeof attrs.height !== 'undefined')
                            photo.height = parseInt(attrs.height.value);
                    }
                });
            }

            $(photo)
                .addClass(prefix + 'Photo')
                .bind('error.' + prefix, function() {
                    prep($tag(div, 'Error').html(settings.get('imgError')));
                })
                .one('load', function() {
                    if (request !== requests) {
                        return;
                    }

                    // A small pause because some browsers will occassionaly report a
                    // img.width and img.height of zero immediately after the img.onload fires
                    setTimeout(function() {
                        var percent;

                        if (settings.get('retinaImage') && window.devicePixelRatio > 1) {
                            photo.height = photo.height / window.devicePixelRatio;
                            photo.width = photo.width / window.devicePixelRatio;
                        }

                        if (settings.get('scalePhotos')) {
                            setResize = function() {
                                photo.height -= photo.height * percent;
                                photo.width -= photo.width * percent;
                            };
                            if (settings.mw && photo.width > settings.mw) {
                                percent = (photo.width - settings.mw) / photo.width;
                                setResize();
                            }
                            if (settings.mh && photo.height > settings.mh) {
                                percent = (photo.height - settings.mh) / photo.height;
                                setResize();
                            }
                        }

                        if (settings.h) {
                            photo.style.marginTop = Math.max(settings.mh - photo.height, 0) / 2 + 'px';
                        }

                        if ($related[1] && (settings.get('loop') || $related[index + 1])) {
                            photo.style.cursor = 'pointer';

                            $(photo).bind('click.' + prefix, function() {
                                publicMethod.next();
                            });
                        }

                        photo.style.width = photo.width + 'px';
                        photo.style.height = photo.height + 'px';
                        prep(photo);
                    }, 1);
                });

            photo.src = href;

        } else if (href) {
            $loadingBay.load(href, settings.get('data'), function(data, status) {
                if (request === requests) {
                    prep(status === 'error' ? $tag(div, 'Error').html(settings.get('xhrError')) : $(this).contents());
                }
            });
        }
    }

    // Navigates to the next page/image in a set.
    publicMethod.next = function() {
        if (!active && $related[1] && (settings.get('loop') || $related[index + 1])) {
            index = getIndex(1);
            launch($related[index]);
        }
    };

    publicMethod.prev = function() {
        if (!active && $related[1] && (settings.get('loop') || index)) {
            index = getIndex(-1);
            launch($related[index]);
        }
    };

    // Note: to use this within an iframe use the following format: parent.jQuery.colorbox.close();
    publicMethod.close = function() {
        if (open && !closing) {

            closing = true;
            open = false;
            trigger(event_cleanup);
            settings.get('onCleanup');
            $window.unbind('.' + prefix);
            $overlay.fadeTo(settings.get('fadeOut') || 0, 0);

            $box.stop().fadeTo(settings.get('fadeOut') || 0, 0, function() {
                $box.hide();
                $overlay.hide();
                trigger(event_purge);
                $loaded.remove();

                setTimeout(function() {
                    closing = false;
                    trigger(event_closed);
                    settings.get('onClosed');
                }, 1);
            });
        }
    };

    // Removes changes Colorbox made to the document, but does not remove the plugin.
    publicMethod.remove = function() {
        if (!$box) {
            return;
        }

        $box.stop();
        $[colorbox].close();
        $box.stop(false, true).remove();
        $overlay.remove();
        closing = false;
        $box = null;
        $('.' + boxElement)
            .removeData(colorbox)
            .removeClass(boxElement);

        $(document).unbind('click.' + prefix).unbind('keydown.' + prefix);
    };

    // A method for fetching the current element Colorbox is referencing.
    // returns a jQuery object.
    publicMethod.element = function() {
        return $(settings.el);
    };

    publicMethod.settings = defaults;

}(jQuery, document, window));

/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */


/*!
 * EventEmitter v4.2.6 - git.io/ee
 * Oliver Caldwell
 * MIT license
 * @preserve
 */

(function () {


    /**
     * Class for managing events.
     * Can be extended to provide event functionality in other classes.
     *
     * @class EventEmitter Manages event registering and emitting.
     */
    function EventEmitter() {
    }

    // Shortcuts to improve speed and size
    var proto = EventEmitter.prototype;
    var exports = this;
    var originalGlobalValue = exports.EventEmitter;

    /**
     * Finds the index of the listener for the event in it's storage array.
     *
     * @param {Function[]} listeners Array of listeners to search through.
     * @param {Function} listener Method to look for.
     * @return {Number} Index of the specified listener, -1 if not found
     * @api private
     */
    function indexOfListener(listeners, listener) {
        var i = listeners.length;
        while (i--) {
            if (listeners[i].listener === listener) {
                return i;
            }
        }

        return -1;
    }

    /**
     * Alias a method while keeping the context correct, to allow for overwriting of target method.
     *
     * @param {String} name The name of the target method.
     * @return {Function} The aliased method
     * @api private
     */
    function alias(name) {
        return function aliasClosure() {
            return this[name].apply(this, arguments);
        };
    }

    /**
     * Returns the listener array for the specified event.
     * Will initialise the event object and listener arrays if required.
     * Will return an object if you use a regex search. The object contains keys for each matched event. So /ba[rz]/ might return an object containing bar and baz. But only if you have either defined them with defineEvent or added some listeners to them.
     * Each property in the object response is an array of listener functions.
     *
     * @param {String|RegExp} evt Name of the event to return the listeners from.
     * @return {Function[]|Object} All listener functions for the event.
     */
    proto.getListeners = function getListeners(evt) {
        var events = this._getEvents();
        var response;
        var key;

        // Return a concatenated array of all matching events if
        // the selector is a regular expression.
        if (typeof evt === 'object') {
            response = {};
            for (key in events) {
                if (events.hasOwnProperty(key) && evt.test(key)) {
                    response[key] = events[key];
                }
            }
        }
        else {
            response = events[evt] || (events[evt] = []);
        }

        return response;
    };

    /**
     * Takes a list of listener objects and flattens it into a list of listener functions.
     *
     * @param {Object[]} listeners Raw listener objects.
     * @return {Function[]} Just the listener functions.
     */
    proto.flattenListeners = function flattenListeners(listeners) {
        var flatListeners = [];
        var i;

        for (i = 0; i < listeners.length; i += 1) {
            flatListeners.push(listeners[i].listener);
        }

        return flatListeners;
    };

    /**
     * Fetches the requested listeners via getListeners but will always return the results inside an object. This is mainly for internal use but others may find it useful.
     *
     * @param {String|RegExp} evt Name of the event to return the listeners from.
     * @return {Object} All listener functions for an event in an object.
     */
    proto.getListenersAsObject = function getListenersAsObject(evt) {
        var listeners = this.getListeners(evt);
        var response;

        if (listeners instanceof Array) {
            response = {};
            response[evt] = listeners;
        }

        return response || listeners;
    };

    /**
     * Adds a listener function to the specified event.
     * The listener will not be added if it is a duplicate.
     * If the listener returns true then it will be removed after it is called.
     * If you pass a regular expression as the event name then the listener will be added to all events that match it.
     *
     * @param {String|RegExp} evt Name of the event to attach the listener to.
     * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.addListener = function addListener(evt, listener) {
        var listeners = this.getListenersAsObject(evt);
        var listenerIsWrapped = typeof listener === 'object';
        var key;

        for (key in listeners) {
            if (listeners.hasOwnProperty(key) && indexOfListener(listeners[key], listener) === -1) {
                listeners[key].push(listenerIsWrapped ? listener : {
                    listener: listener,
                    once: false
                });
            }
        }

        return this;
    };

    /**
     * Alias of addListener
     */
    proto.on = alias('addListener');

    /**
     * Semi-alias of addListener. It will add a listener that will be
     * automatically removed after it's first execution.
     *
     * @param {String|RegExp} evt Name of the event to attach the listener to.
     * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.addOnceListener = function addOnceListener(evt, listener) {
        return this.addListener(evt, {
            listener: listener,
            once: true
        });
    };

    /**
     * Alias of addOnceListener.
     */
    proto.once = alias('addOnceListener');

    /**
     * Defines an event name. This is required if you want to use a regex to add a listener to multiple events at once. If you don't do this then how do you expect it to know what event to add to? Should it just add to every possible match for a regex? No. That is scary and bad.
     * You need to tell it what event names should be matched by a regex.
     *
     * @param {String} evt Name of the event to create.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.defineEvent = function defineEvent(evt) {
        this.getListeners(evt);
        return this;
    };

    /**
     * Uses defineEvent to define multiple events.
     *
     * @param {String[]} evts An array of event names to define.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.defineEvents = function defineEvents(evts) {
        for (var i = 0; i < evts.length; i += 1) {
            this.defineEvent(evts[i]);
        }
        return this;
    };

    /**
     * Removes a listener function from the specified event.
     * When passed a regular expression as the event name, it will remove the listener from all events that match it.
     *
     * @param {String|RegExp} evt Name of the event to remove the listener from.
     * @param {Function} listener Method to remove from the event.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.removeListener = function removeListener(evt, listener) {
        var listeners = this.getListenersAsObject(evt);
        var index;
        var key;

        for (key in listeners) {
            if (listeners.hasOwnProperty(key)) {
                index = indexOfListener(listeners[key], listener);

                if (index !== -1) {
                    listeners[key].splice(index, 1);
                }
            }
        }

        return this;
    };

    /**
     * Alias of removeListener
     */
    proto.off = alias('removeListener');

    /**
     * Adds listeners in bulk using the manipulateListeners method.
     * If you pass an object as the second argument you can add to multiple events at once. The object should contain key value pairs of events and listeners or listener arrays. You can also pass it an event name and an array of listeners to be added.
     * You can also pass it a regular expression to add the array of listeners to all events that match it.
     * Yeah, this function does quite a bit. That's probably a bad thing.
     *
     * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add to multiple events at once.
     * @param {Function[]} [listeners] An optional array of listener functions to add.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.addListeners = function addListeners(evt, listeners) {
        // Pass through to manipulateListeners
        return this.manipulateListeners(false, evt, listeners);
    };

    /**
     * Removes listeners in bulk using the manipulateListeners method.
     * If you pass an object as the second argument you can remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
     * You can also pass it an event name and an array of listeners to be removed.
     * You can also pass it a regular expression to remove the listeners from all events that match it.
     *
     * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to remove from multiple events at once.
     * @param {Function[]} [listeners] An optional array of listener functions to remove.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.removeListeners = function removeListeners(evt, listeners) {
        // Pass through to manipulateListeners
        return this.manipulateListeners(true, evt, listeners);
    };

    /**
     * Edits listeners in bulk. The addListeners and removeListeners methods both use this to do their job. You should really use those instead, this is a little lower level.
     * The first argument will determine if the listeners are removed (true) or added (false).
     * If you pass an object as the second argument you can add/remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
     * You can also pass it an event name and an array of listeners to be added/removed.
     * You can also pass it a regular expression to manipulate the listeners of all events that match it.
     *
     * @param {Boolean} remove True if you want to remove listeners, false if you want to add.
     * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add/remove from multiple events at once.
     * @param {Function[]} [listeners] An optional array of listener functions to add/remove.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.manipulateListeners = function manipulateListeners(remove, evt, listeners) {
        var i;
        var value;
        var single = remove ? this.removeListener : this.addListener;
        var multiple = remove ? this.removeListeners : this.addListeners;

        // If evt is an object then pass each of it's properties to this method
        if (typeof evt === 'object' && !(evt instanceof RegExp)) {
            for (i in evt) {
                if (evt.hasOwnProperty(i) && (value = evt[i])) {
                    // Pass the single listener straight through to the singular method
                    if (typeof value === 'function') {
                        single.call(this, i, value);
                    }
                    else {
                        // Otherwise pass back to the multiple function
                        multiple.call(this, i, value);
                    }
                }
            }
        }
        else {
            // So evt must be a string
            // And listeners must be an array of listeners
            // Loop over it and pass each one to the multiple method
            i = listeners.length;
            while (i--) {
                single.call(this, evt, listeners[i]);
            }
        }

        return this;
    };

    /**
     * Removes all listeners from a specified event.
     * If you do not specify an event then all listeners will be removed.
     * That means every event will be emptied.
     * You can also pass a regex to remove all events that match it.
     *
     * @param {String|RegExp} [evt] Optional name of the event to remove all listeners for. Will remove from every event if not passed.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.removeEvent = function removeEvent(evt) {
        var type = typeof evt;
        var events = this._getEvents();
        var key;

        // Remove different things depending on the state of evt
        if (type === 'string') {
            // Remove all listeners for the specified event
            delete events[evt];
        }
        else if (type === 'object') {
            // Remove all events matching the regex.
            for (key in events) {
                if (events.hasOwnProperty(key) && evt.test(key)) {
                    delete events[key];
                }
            }
        }
        else {
            // Remove all listeners in all events
            delete this._events;
        }

        return this;
    };

    /**
     * Alias of removeEvent.
     *
     * Added to mirror the node API.
     */
    proto.removeAllListeners = alias('removeEvent');

    /**
     * Emits an event of your choice.
     * When emitted, every listener attached to that event will be executed.
     * If you pass the optional argument array then those arguments will be passed to every listener upon execution.
     * Because it uses `apply`, your array of arguments will be passed as if you wrote them out separately.
     * So they will not arrive within the array on the other side, they will be separate.
     * You can also pass a regular expression to emit to all events that match it.
     *
     * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
     * @param {Array} [args] Optional array of arguments to be passed to each listener.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.emitEvent = function emitEvent(evt, args) {
        var listeners = this.getListenersAsObject(evt);
        var listener;
        var i;
        var key;
        var response;

        for (key in listeners) {
            if (listeners.hasOwnProperty(key)) {
                i = listeners[key].length;

                while (i--) {
                    // If the listener returns true then it shall be removed from the event
                    // The function is executed either with a basic call or an apply if there is an args array
                    listener = listeners[key][i];

                    if (listener.once === true) {
                        this.removeListener(evt, listener.listener);
                    }

                    response = listener.listener.apply(this, args || []);

                    if (response === this._getOnceReturnValue()) {
                        this.removeListener(evt, listener.listener);
                    }
                }
            }
        }

        return this;
    };

    /**
     * Alias of emitEvent
     */
    proto.trigger = alias('emitEvent');

    /**
     * Subtly different from emitEvent in that it will pass its arguments on to the listeners, as opposed to taking a single array of arguments to pass on.
     * As with emitEvent, you can pass a regex in place of the event name to emit to all events that match it.
     *
     * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
     * @param {...*} Optional additional arguments to be passed to each listener.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.emit = function emit(evt) {
        var args = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(evt, args);
    };

    /**
     * Sets the current value to check against when executing listeners. If a
     * listeners return value matches the one set here then it will be removed
     * after execution. This value defaults to true.
     *
     * @param {*} value The new value to check for when executing listeners.
     * @return {Object} Current instance of EventEmitter for chaining.
     */
    proto.setOnceReturnValue = function setOnceReturnValue(value) {
        this._onceReturnValue = value;
        return this;
    };

    /**
     * Fetches the current value to check against when executing listeners. If
     * the listeners return value matches this one then it should be removed
     * automatically. It will return true by default.
     *
     * @return {*|Boolean} The current value to check for or the default, true.
     * @api private
     */
    proto._getOnceReturnValue = function _getOnceReturnValue() {
        if (this.hasOwnProperty('_onceReturnValue')) {
            return this._onceReturnValue;
        }
        else {
            return true;
        }
    };

    /**
     * Fetches the events object and creates one if required.
     *
     * @return {Object} The events storage object.
     * @api private
     */
    proto._getEvents = function _getEvents() {
        return this._events || (this._events = {});
    };

    /**
     * Reverts the global {@link EventEmitter} to its previous value and returns a reference to this version.
     *
     * @return {Function} Non conflicting EventEmitter class.
     */
    EventEmitter.noConflict = function noConflict() {
        exports.EventEmitter = originalGlobalValue;
        return EventEmitter;
    };

    // Expose the class either via AMD, CommonJS or the global object
    if (typeof define === 'function' && define.amd) {
        define('eventEmitter/EventEmitter', [], function () {
            return EventEmitter;
        });
    }
    else if (typeof module === 'object' && module.exports) {
        module.exports = EventEmitter;
    }
    else {
        this.EventEmitter = EventEmitter;
    }
}.call(this));

/*!
 * eventie v1.0.4
 * event binding helper
 *   eventie.bind( elem, 'click', myFn )
 *   eventie.unbind( elem, 'click', myFn )
 */

/*jshint browser: true, undef: true, unused: true */
/*global define: false */

(function (window) {


    var docElem = document.documentElement;

    var bind = function () {
    };

    function getIEEvent(obj) {
        var event = window.event;
        // add event.target
        event.target = event.target || event.srcElement || obj;
        return event;
    }

    if (docElem.addEventListener) {
        bind = function (obj, type, fn) {
            obj.addEventListener(type, fn, false);
        };
    } else if (docElem.attachEvent) {
        bind = function (obj, type, fn) {
            obj[type + fn] = fn.handleEvent ?
                function () {
                    var event = getIEEvent(obj);
                    fn.handleEvent.call(fn, event);
                } :
                function () {
                    var event = getIEEvent(obj);
                    fn.call(obj, event);
                };
            obj.attachEvent("on" + type, obj[type + fn]);
        };
    }

    var unbind = function () {
    };

    if (docElem.removeEventListener) {
        unbind = function (obj, type, fn) {
            obj.removeEventListener(type, fn, false);
        };
    } else if (docElem.detachEvent) {
        unbind = function (obj, type, fn) {
            obj.detachEvent("on" + type, obj[type + fn]);
            try {
                delete obj[type + fn];
            } catch (err) {
                // can't delete window object properties
                obj[type + fn] = undefined;
            }
        };
    }

    var eventie = {
        bind: bind,
        unbind: unbind
    };

// transport
    if (typeof define === 'function' && define.amd) {
        // AMD
        define('eventie/eventie', eventie);
    } else {
        // browser global
        window.eventie = eventie;
    }

})(this);

/*!
 * imagesLoaded v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function (window, factory) {
    // universal module definition

    /*global define: false, module: false, require: false */

    if (typeof define === 'function' && define.amd) {
        // AMD
        define([
            'eventEmitter/EventEmitter',
            'eventie/eventie'
        ], function (EventEmitter, eventie) {
            return factory(window, EventEmitter, eventie);
        });
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = factory(
            window,
            require('wolfy87-eventemitter'),
            require('eventie')
        );
    } else {
        // browser global
        window.imagesLoaded = factory(
            window,
            window.EventEmitter,
            window.eventie
        );
    }

})(window,

// --------------------------  factory -------------------------- //

    function factory(window, EventEmitter, eventie) {


        var $ = window.jQuery;
        var console = window.console;
        var hasConsole = typeof console !== 'undefined';

// -------------------------- helpers -------------------------- //

// extend objects
        function extend(a, b) {
            for (var prop in b) {
                a[prop] = b[prop];
            }
            return a;
        }

        var objToString = Object.prototype.toString;

        function isArray(obj) {
            return objToString.call(obj) === '[object Array]';
        }

// turn element or nodeList into an array
        function makeArray(obj) {
            var ary = [];
            if (isArray(obj)) {
                // use object if already an array
                ary = obj;
            } else if (typeof obj.length === 'number') {
                // convert nodeList to array
                for (var i = 0, len = obj.length; i < len; i++) {
                    ary.push(obj[i]);
                }
            } else {
                // array of single index
                ary.push(obj);
            }
            return ary;
        }

        // -------------------------- imagesLoaded -------------------------- //

        /**
         * @param {Array, Element, NodeList, String} elem
         * @param {Object or Function} options - if function, use as callback
         * @param {Function} onAlways - callback function
         */
        function ImagesLoaded(elem, options, onAlways) {
            // coerce ImagesLoaded() without new, to be new ImagesLoaded()
            if (!( this instanceof ImagesLoaded )) {
                return new ImagesLoaded(elem, options);
            }
            // use elem as selector string
            if (typeof elem === 'string') {
                elem = document.querySelectorAll(elem);
            }

            this.elements = makeArray(elem);
            this.options = extend({}, this.options);

            if (typeof options === 'function') {
                onAlways = options;
            } else {
                extend(this.options, options);
            }

            if (onAlways) {
                this.on('always', onAlways);
            }

            this.getImages();

            if ($) {
                // add jQuery Deferred object
                this.jqDeferred = new $.Deferred();
            }

            // HACK check async to allow time to bind listeners
            var _this = this;
            setTimeout(function () {
                _this.check();
            });
        }

        ImagesLoaded.prototype = new EventEmitter();

        ImagesLoaded.prototype.options = {};

        ImagesLoaded.prototype.getImages = function () {
            this.images = [];

            // filter & find items if we have an item selector
            for (var i = 0, len = this.elements.length; i < len; i++) {
                var elem = this.elements[i];
                // filter siblings
                if (elem.nodeName === 'IMG') {
                    this.addImage(elem);
                }
                // find children
                // no non-element nodes, #143
                var nodeType = elem.nodeType;
                if (!nodeType || !( nodeType === 1 || nodeType === 9 || nodeType === 11 )) {
                    continue;
                }
                var childElems = elem.querySelectorAll('img');
                // concat childElems to filterFound array
                for (var j = 0, jLen = childElems.length; j < jLen; j++) {
                    var img = childElems[j];
                    this.addImage(img);
                }
            }
        };

        /**
         * @param {Image} img
         */
        ImagesLoaded.prototype.addImage = function (img) {
            var loadingImage = new LoadingImage(img);
            this.images.push(loadingImage);
        };

        ImagesLoaded.prototype.check = function () {
            var _this = this;
            var checkedCount = 0;
            var length = this.images.length;
            this.hasAnyBroken = false;
            // complete if no images
            if (!length) {
                this.complete();
                return;
            }

            function onConfirm(image, message) {
                if (_this.options.debug && hasConsole) {
                    console.log('confirm', image, message);
                }

                _this.progress(image);
                checkedCount++;
                if (checkedCount === length) {
                    _this.complete();
                }
                return true; // bind once
            }

            for (var i = 0; i < length; i++) {
                var loadingImage = this.images[i];
                loadingImage.on('confirm', onConfirm);
                loadingImage.check();
            }
        };

        ImagesLoaded.prototype.progress = function (image) {
            this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;
            // HACK - Chrome triggers event before object properties have changed. #83
            var _this = this;
            setTimeout(function () {
                _this.emit('progress', _this, image);
                if (_this.jqDeferred && _this.jqDeferred.notify) {
                    _this.jqDeferred.notify(_this, image);
                }
            });
        };

        ImagesLoaded.prototype.complete = function () {
            var eventName = this.hasAnyBroken ? 'fail' : 'done';
            this.isComplete = true;
            var _this = this;
            // HACK - another setTimeout so that confirm happens after progress
            setTimeout(function () {
                _this.emit(eventName, _this);
                _this.emit('always', _this);
                if (_this.jqDeferred) {
                    var jqMethod = _this.hasAnyBroken ? 'reject' : 'resolve';
                    _this.jqDeferred[jqMethod](_this);
                }
            });
        };

        // -------------------------- jquery -------------------------- //

        if ($) {
            $.fn.imagesLoaded = function (options, callback) {
                var instance = new ImagesLoaded(this, options, callback);
                return instance.jqDeferred.promise($(this));
            };
        }


        // --------------------------  -------------------------- //

        function LoadingImage(img) {
            this.img = img;
        }

        LoadingImage.prototype = new EventEmitter();

        LoadingImage.prototype.check = function () {
            // first check cached any previous images that have same src
            var resource = cache[this.img.src] || new Resource(this.img.src);
            if (resource.isConfirmed) {
                this.confirm(resource.isLoaded, 'cached was confirmed');
                return;
            }

            // If complete is true and browser supports natural sizes,
            // try to check for image status manually.
            if (this.img.complete && this.img.naturalWidth !== undefined) {
                // report based on naturalWidth
                this.confirm(this.img.naturalWidth !== 0, 'naturalWidth');
                return;
            }

            // If none of the checks above matched, simulate loading on detached element.
            var _this = this;
            resource.on('confirm', function (resrc, message) {
                _this.confirm(resrc.isLoaded, message);
                return true;
            });

            resource.check();
        };

        LoadingImage.prototype.confirm = function (isLoaded, message) {
            this.isLoaded = isLoaded;
            this.emit('confirm', this, message);
        };

        // -------------------------- Resource -------------------------- //

        // Resource checks each src, only once
        // separate class from LoadingImage to prevent memory leaks. See #115

        var cache = {};

        function Resource(src) {
            this.src = src;
            // add to cache
            cache[src] = this;
        }

        Resource.prototype = new EventEmitter();

        Resource.prototype.check = function () {
            // only trigger checking once
            if (this.isChecked) {
                return;
            }
            // simulate loading on detached element
            var proxyImage = new Image();
            eventie.bind(proxyImage, 'load', this);
            eventie.bind(proxyImage, 'error', this);
            proxyImage.src = this.src;
            // set flag
            this.isChecked = true;
        };

        // ----- events ----- //

        // trigger specified handler for event type
        Resource.prototype.handleEvent = function (event) {
            var method = 'on' + event.type;
            if (this[method]) {
                this[method](event);
            }
        };

        Resource.prototype.onload = function (event) {
            this.confirm(true, 'onload');
            this.unbindProxyEvents(event);
        };

        Resource.prototype.onerror = function (event) {
            this.confirm(false, 'onerror');
            this.unbindProxyEvents(event);
        };

        // ----- confirm ----- //

        Resource.prototype.confirm = function (isLoaded, message) {
            this.isConfirmed = true;
            this.isLoaded = isLoaded;
            this.emit('confirm', this, message);
        };

        Resource.prototype.unbindProxyEvents = function (event) {
            eventie.unbind(event.target, 'load', this);
            eventie.unbind(event.target, 'error', this);
        };

        // -----  ----- //

        return ImagesLoaded;

    });
/*!
 * SmartMenus jQuery Plugin - v0.9.7 - August 25, 2014
 * http://www.smartmenus.org/
 *
 * Copyright 2014 Vasil Dinkov, Vadikom Web Ltd.
 * http://vadikom.com
 *
 * Licensed MIT
 */

(function ($) {

    var menuTrees = [],
        IE = !!window.createPopup, // detect it for the iframe shim
        mouse = false, // optimize for touch by default - we will detect for mouse input
        mouseDetectionEnabled = false;

    // Handle detection for mouse input (i.e. desktop browsers, tablets with a mouse, etc.)
    function initMouseDetection(disable) {
        var eNS = '.smartmenus_mouse';
        if (!mouseDetectionEnabled && !disable) {
            // if we get two consecutive mousemoves within 2 pixels from each other and within 300ms, we assume a real mouse/cursor is present
            // in practice, this seems like impossible to trick unintentianally with a real mouse and a pretty safe detection on touch devices (even with older browsers that do not support touch events)
            var firstTime = true,
                lastMove = null;
            $(document).bind(getEventsNS([
                ['mousemove', function (e) {
                    var thisMove = {x: e.pageX, y: e.pageY, timeStamp: new Date().getTime()};
                    if (lastMove) {
                        var deltaX = Math.abs(lastMove.x - thisMove.x),
                            deltaY = Math.abs(lastMove.y - thisMove.y);
                        if ((deltaX > 0 || deltaY > 0) && deltaX <= 2 && deltaY <= 2 && thisMove.timeStamp - lastMove.timeStamp <= 300) {
                            mouse = true;
                            // if this is the first check after page load, check if we are not over some item by chance and call the mouseenter handler if yes
                            if (firstTime) {
                                var $a = $(e.target).closest('a');
                                if ($a.is('a')) {
                                    $.each(menuTrees, function () {
                                        if ($.contains(this.$root[0], $a[0])) {
                                            this.itemEnter({currentTarget: $a[0]});
                                            return false;
                                        }
                                    });
                                }
                                firstTime = false;
                            }
                        }
                    }
                    lastMove = thisMove;
                }],
                [touchEvents() ? 'touchstart' : 'pointerover pointermove pointerout MSPointerOver MSPointerMove MSPointerOut', function (e) {
                    if (isTouchEvent(e.originalEvent)) {
                        mouse = false;
                    }
                }]
            ], eNS));
            mouseDetectionEnabled = true;
        } else if (mouseDetectionEnabled && disable) {
            $(document).unbind(eNS);
            mouseDetectionEnabled = false;
        }
    }

    function isTouchEvent(e) {
        return !/^(4|mouse)$/.test(e.pointerType);
    }

    // we use this just to choose between toucn and pointer events when we need to, not for touch screen detection
    function touchEvents() {
        return 'ontouchstart' in window;
    }

    // returns a jQuery bind() ready object
    function getEventsNS(defArr, eNS) {
        if (!eNS) {
            eNS = '';
        }
        var obj = {};
        $.each(defArr, function (index, value) {
            obj[value[0].split(' ').join(eNS + ' ') + eNS] = value[1];
        });
        return obj;
    }

    $.SmartMenus = function (elm, options) {
        this.$root = $(elm);
        this.opts = options;
        this.rootId = ''; // internal
        this.$subArrow = null;
        this.subMenus = []; // all sub menus in the tree (UL elms) in no particular order (only real - e.g. UL's in mega sub menus won't be counted)
        this.activatedItems = []; // stores last activated A's for each level
        this.visibleSubMenus = []; // stores visible sub menus UL's
        this.showTimeout = 0;
        this.hideTimeout = 0;
        this.scrollTimeout = 0;
        this.clickActivated = false;
        this.zIndexInc = 0;
        this.$firstLink = null; // we'll use these for some tests
        this.$firstSub = null; // at runtime so we'll cache them
        this.disabled = false;
        this.$disableOverlay = null;
        this.isTouchScrolling = false;
        this.init();
    };

    $.extend($.SmartMenus, {
        hideAll: function () {
            $.each(menuTrees, function () {
                this.menuHideAll();
            });
        },
        destroy: function () {
            while (menuTrees.length) {
                menuTrees[0].destroy();
            }
            initMouseDetection(true);
        },
        prototype: {
            init: function (refresh) {
                var self = this;

                if (!refresh) {
                    menuTrees.push(this);

                    this.rootId = (new Date().getTime() + Math.random() + '').replace(/\D/g, '');

                    if (this.$root.hasClass('sm-rtl')) {
                        this.opts.rightToLeftSubMenus = true;
                    }

                    // init root (main menu)
                    var eNS = '.smartmenus';
                    this.$root
                        .data('smartmenus', this)
                        .attr('data-smartmenus-id', this.rootId)
                        .dataSM('level', 1)
                        .bind(getEventsNS([
                            ['mouseover focusin', $.proxy(this.rootOver, this)],
                            ['mouseout focusout', $.proxy(this.rootOut, this)]
                        ], eNS))
                        .delegate('a', getEventsNS([
                            ['mouseenter', $.proxy(this.itemEnter, this)],
                            ['mouseleave', $.proxy(this.itemLeave, this)],
                            ['mousedown', $.proxy(this.itemDown, this)],
                            ['focus', $.proxy(this.itemFocus, this)],
                            ['blur', $.proxy(this.itemBlur, this)],
                            ['click', $.proxy(this.itemClick, this)],
                            ['touchend', $.proxy(this.itemTouchEnd, this)]
                        ], eNS));

                    // hide menus on tap or click outside the root UL
                    eNS += this.rootId;
                    if (this.opts.hideOnClick) {
                        $(document).bind(getEventsNS([
                            ['touchstart', $.proxy(this.docTouchStart, this)],
                            ['touchmove', $.proxy(this.docTouchMove, this)],
                            ['touchend', $.proxy(this.docTouchEnd, this)],
                            // for Opera Mobile < 11.5, webOS browser, etc. we'll check click too
                            ['click', $.proxy(this.docClick, this)]
                        ], eNS));
                    }
                    // hide sub menus on resize
                    $(window).bind(getEventsNS([['resize orientationchange', $.proxy(this.winResize, this)]], eNS));

                    if (this.opts.subIndicators) {
                        this.$subArrow = $('<span/>').addClass('sub-arrow');
                        if (this.opts.subIndicatorsText) {
                            this.$subArrow.html(this.opts.subIndicatorsText);
                        }
                    }

                    // make sure mouse detection is enabled
                    initMouseDetection();
                }

                // init sub menus
                this.$firstSub = this.$root.find('ul').each(function () {
                    self.menuInit($(this));
                }).eq(0);

                this.$firstLink = this.$root.find('a').eq(0);

                // find current item
                if (this.opts.markCurrentItem) {
                    var reDefaultDoc = /(index|default)\.[^#\?\/]*/i,
                        reHash = /#.*/,
                        locHref = window.location.href.replace(reDefaultDoc, ''),
                        locHrefNoHash = locHref.replace(reHash, '');
                    this.$root.find('a').each(function () {
                        var href = this.href.replace(reDefaultDoc, ''),
                            $this = $(this);
                        if (href == locHref || href == locHrefNoHash) {
                            $this.addClass('current');
                            if (self.opts.markCurrentTree) {
                                $this.parent().parentsUntil('[data-smartmenus-id]', 'li').children('a').addClass('current');
                            }
                        }
                    });
                }
            },
            destroy: function () {
                this.menuHideAll();
                var eNS = '.smartmenus';
                this.$root
                    .removeData('smartmenus')
                    .removeAttr('data-smartmenus-id')
                    .removeDataSM('level')
                    .unbind(eNS)
                    .undelegate(eNS);
                eNS += this.rootId;
                $(document).unbind(eNS);
                $(window).unbind(eNS);
                if (this.opts.subIndicators) {
                    this.$subArrow = null;
                }
                var self = this;
                $.each(this.subMenus, function () {
                    if (this.hasClass('mega-menu')) {
                        this.find('ul').removeDataSM('in-mega');
                    }
                    if (this.dataSM('shown-before')) {
                        if (self.opts.subMenusMinWidth || self.opts.subMenusMaxWidth) {
                            this.css({width: '', minWidth: '', maxWidth: ''}).removeClass('sm-nowrap');
                        }
                        if (this.dataSM('scroll-arrows')) {
                            this.dataSM('scroll-arrows').remove();
                        }
                        this.css({zIndex: '', top: '', left: '', marginLeft: '', marginTop: '', display: ''});
                    }
                    if (self.opts.subIndicators) {
                        this.dataSM('parent-a').removeClass('has-submenu').children('span.sub-arrow').remove();
                    }
                    this.removeDataSM('shown-before')
                        .removeDataSM('ie-shim')
                        .removeDataSM('scroll-arrows')
                        .removeDataSM('parent-a')
                        .removeDataSM('level')
                        .removeDataSM('beforefirstshowfired')
                        .parent().removeDataSM('sub');
                });
                if (this.opts.markCurrentItem) {
                    this.$root.find('a.current').removeClass('current');
                }
                this.$root = null;
                this.$firstLink = null;
                this.$firstSub = null;
                if (this.$disableOverlay) {
                    this.$disableOverlay.remove();
                    this.$disableOverlay = null;
                }
                menuTrees.splice($.inArray(this, menuTrees), 1);
            },
            disable: function (noOverlay) {
                if (!this.disabled) {
                    this.menuHideAll();
                    // display overlay over the menu to prevent interaction
                    if (!noOverlay && !this.opts.isPopup && this.$root.is(':visible')) {
                        var pos = this.$root.offset();
                        this.$disableOverlay = $('<div class="sm-jquery-disable-overlay"/>').css({
                            position: 'absolute',
                            top: pos.top,
                            left: pos.left,
                            width: this.$root.outerWidth(),
                            height: this.$root.outerHeight(),
                            zIndex: this.getStartZIndex(true),
                            opacity: 0
                        }).appendTo(document.body);
                    }
                    this.disabled = true;
                }
            },
            docClick: function (e) {
                if (this.isTouchScrolling) {
                    this.isTouchScrolling = false;
                    return;
                }
                // hide on any click outside the menu or on a menu link
                if (this.visibleSubMenus.length && !$.contains(this.$root[0], e.target) || $(e.target).is('a')) {
                    this.menuHideAll();
                }
            },
            docTouchEnd: function (e) {
                if (!this.lastTouch) {
                    return;
                }
                if (this.visibleSubMenus.length && (this.lastTouch.x2 === undefined || this.lastTouch.x1 == this.lastTouch.x2) && (this.lastTouch.y2 === undefined || this.lastTouch.y1 == this.lastTouch.y2) && (!this.lastTouch.target || !$.contains(this.$root[0], this.lastTouch.target))) {
                    if (this.hideTimeout) {
                        clearTimeout(this.hideTimeout);
                        this.hideTimeout = 0;
                    }
                    // hide with a delay to prevent triggering accidental unwanted click on some page element
                    var self = this;
                    this.hideTimeout = setTimeout(function () {
                        self.menuHideAll();
                    }, 350);
                }
                this.lastTouch = null;
            },
            docTouchMove: function (e) {
                if (!this.lastTouch) {
                    return;
                }
                var touchPoint = e.originalEvent.touches[0];
                this.lastTouch.x2 = touchPoint.pageX;
                this.lastTouch.y2 = touchPoint.pageY;
            },
            docTouchStart: function (e) {
                var touchPoint = e.originalEvent.touches[0];
                this.lastTouch = {x1: touchPoint.pageX, y1: touchPoint.pageY, target: touchPoint.target};
            },
            enable: function () {
                if (this.disabled) {
                    if (this.$disableOverlay) {
                        this.$disableOverlay.remove();
                        this.$disableOverlay = null;
                    }
                    this.disabled = false;
                }
            },
            getClosestMenu: function (elm) {
                var $closestMenu = $(elm).closest('ul');
                while ($closestMenu.dataSM('in-mega')) {
                    $closestMenu = $closestMenu.parent().closest('ul');
                }
                return $closestMenu[0] || null;
            },
            getHeight: function ($elm) {
                return this.getOffset($elm, true);
            },
            // returns precise width/height float values
            getOffset: function ($elm, height) {
                var old;
                if ($elm.css('display') == 'none') {
                    old = {position: $elm[0].style.position, visibility: $elm[0].style.visibility};
                    $elm.css({position: 'absolute', visibility: 'hidden'}).show();
                }
                var box = $elm[0].getBoundingClientRect && $elm[0].getBoundingClientRect(),
                    val = box && (height ? box.height || box.bottom - box.top : box.width || box.right - box.left);
                if (!val && val !== 0) {
                    val = height ? $elm[0].offsetHeight : $elm[0].offsetWidth;
                }
                if (old) {
                    $elm.hide().css(old);
                }
                return val;
            },
            getStartZIndex: function (root) {
                var zIndex = parseInt(this[root ? '$root' : '$firstSub'].css('z-index'));
                if (!root && isNaN(zIndex)) {
                    zIndex = parseInt(this.$root.css('z-index'));
                }
                return !isNaN(zIndex) ? zIndex : 1;
            },
            getTouchPoint: function (e) {
                return e.touches && e.touches[0] || e.changedTouches && e.changedTouches[0] || e;
            },
            getViewport: function (height) {
                var name = height ? 'Height' : 'Width',
                    val = document.documentElement['client' + name],
                    val2 = window['inner' + name];
                if (val2) {
                    val = Math.min(val, val2);
                }
                return val;
            },
            getViewportHeight: function () {
                return this.getViewport(true);
            },
            getViewportWidth: function () {
                return this.getViewport();
            },
            getWidth: function ($elm) {
                return this.getOffset($elm);
            },
            handleEvents: function () {
                return !this.disabled && this.isCSSOn();
            },
            handleItemEvents: function ($a) {
                return this.handleEvents() && !this.isLinkInMegaMenu($a);
            },
            isCollapsible: function () {
                return this.$firstSub.css('position') == 'static';
            },
            isCSSOn: function () {
                return this.$firstLink.css('display') == 'block';
            },
            isFixed: function () {
                var isFixed = this.$root.css('position') == 'fixed';
                if (!isFixed) {
                    this.$root.parentsUntil('body').each(function () {
                        if ($(this).css('position') == 'fixed') {
                            isFixed = true;
                            return false;
                        }
                    });
                }
                return isFixed;
            },
            isLinkInMegaMenu: function ($a) {
                return !$a.parent().parent().dataSM('level');
            },
            isTouchMode: function () {
                return !mouse || this.isCollapsible();
            },
            itemActivate: function ($a) {
                var $li = $a.parent(),
                    $ul = $li.parent(),
                    level = $ul.dataSM('level');
                // if for some reason the parent item is not activated (e.g. this is an API call to activate the item), activate all parent items first
                if (level > 1 && (!this.activatedItems[level - 2] || this.activatedItems[level - 2][0] != $ul.dataSM('parent-a')[0])) {
                    var self = this;
                    $($ul.parentsUntil('[data-smartmenus-id]', 'ul').get().reverse()).add($ul).each(function () {
                        self.itemActivate($(this).dataSM('parent-a'));
                    });
                }
                // hide any visible deeper level sub menus
                if (this.visibleSubMenus.length > level) {
                    this.menuHideSubMenus(!this.activatedItems[level - 1] || this.activatedItems[level - 1][0] != $a[0] ? level - 1 : level);
                }
                // save new active item and sub menu for this level
                this.activatedItems[level - 1] = $a;
                this.visibleSubMenus[level - 1] = $ul;
                if (this.$root.triggerHandler('activate.smapi', $a[0]) === false) {
                    return;
                }
                // show the sub menu if this item has one
                var $sub = $li.dataSM('sub');
                if ($sub && (this.isTouchMode() || (!this.opts.showOnClick || this.clickActivated))) {
                    this.menuShow($sub);
                }
            },
            itemBlur: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                this.$root.triggerHandler('blur.smapi', $a[0]);
            },
            itemClick: function (e) {
                if (this.isTouchScrolling) {
                    this.isTouchScrolling = false;
                    e.stopPropagation();
                    return false;
                }
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                $a.removeDataSM('mousedown');
                if (this.$root.triggerHandler('click.smapi', $a[0]) === false) {
                    return false;
                }
                var $sub = $a.parent().dataSM('sub');
                if (this.isTouchMode()) {
                    // undo fix: prevent the address bar on iPhone from sliding down when expanding a sub menu
                    if ($a.dataSM('href')) {
                        $a.attr('href', $a.dataSM('href')).removeDataSM('href');
                    }
                    // if the sub is not visible
                    if ($sub && (!$sub.dataSM('shown-before') || !$sub.is(':visible'))) {
                        // try to activate the item and show the sub
                        this.itemActivate($a);
                        // if "itemActivate" showed the sub, prevent the click so that the link is not loaded
                        // if it couldn't show it, then the sub menus are disabled with an !important declaration (e.g. via mobile styles) so let the link get loaded
                        if ($sub.is(':visible')) {
                            return false;
                        }
                    }
                } else if (this.opts.showOnClick && $a.parent().parent().dataSM('level') == 1 && $sub) {
                    this.clickActivated = true;
                    this.menuShow($sub);
                    return false;
                }
                if ($a.hasClass('disabled')) {
                    return false;
                }
                if (this.$root.triggerHandler('select.smapi', $a[0]) === false) {
                    return false;
                }
            },
            itemDown: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                $a.dataSM('mousedown', true);
            },
            itemEnter: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                if (!this.isTouchMode()) {
                    if (this.showTimeout) {
                        clearTimeout(this.showTimeout);
                        this.showTimeout = 0;
                    }
                    var self = this;
                    this.showTimeout = setTimeout(function () {
                        self.itemActivate($a);
                    }, this.opts.showOnClick && $a.parent().parent().dataSM('level') == 1 ? 1 : this.opts.showTimeout);
                }
                this.$root.triggerHandler('mouseenter.smapi', $a[0]);
            },
            itemFocus: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                // fix (the mousedown check): in some browsers a tap/click produces consecutive focus + click events so we don't need to activate the item on focus
                if ((!this.isTouchMode() || !$a.dataSM('mousedown')) && (!this.activatedItems.length || this.activatedItems[this.activatedItems.length - 1][0] != $a[0])) {
                    this.itemActivate($a);
                }
                this.$root.triggerHandler('focus.smapi', $a[0]);
            },
            itemLeave: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                if (!this.isTouchMode()) {
                    if ($a[0].blur) {
                        $a[0].blur();
                    }
                    if (this.showTimeout) {
                        clearTimeout(this.showTimeout);
                        this.showTimeout = 0;
                    }
                }
                $a.removeDataSM('mousedown');
                this.$root.triggerHandler('mouseleave.smapi', $a[0]);
            },
            itemTouchEnd: function (e) {
                var $a = $(e.currentTarget);
                if (!this.handleItemEvents($a)) {
                    return;
                }
                // prevent the address bar on iPhone from sliding down when expanding a sub menu
                var $sub = $a.parent().dataSM('sub');
                if ($a.attr('href').charAt(0) !== '#' && $sub && (!$sub.dataSM('shown-before') || !$sub.is(':visible'))) {
                    $a.dataSM('href', $a.attr('href'));
                    $a.attr('href', '#');
                }
            },
            menuFixLayout: function ($ul) {
                // fixes a menu that is being shown for the first time
                if (!$ul.dataSM('shown-before')) {
                    $ul.hide().dataSM('shown-before', true);
                }
            },
            menuHide: function ($sub) {
                if (this.$root.triggerHandler('beforehide.smapi', $sub[0]) === false) {
                    return;
                }
                $sub.stop(true, true);
                if ($sub.is(':visible')) {
                    var complete = function () {
                        // unset z-index
                        $sub.css('z-index', '');
                    };
                    // if sub is collapsible (mobile view)
                    if (this.isCollapsible()) {
                        if (this.opts.collapsibleHideFunction) {
                            this.opts.collapsibleHideFunction.call(this, $sub, complete);
                        } else {
                            $sub.hide(this.opts.collapsibleHideDuration, complete);
                        }
                    } else {
                        if (this.opts.hideFunction) {
                            this.opts.hideFunction.call(this, $sub, complete);
                        } else {
                            $sub.hide(this.opts.hideDuration, complete);
                        }
                    }
                    // remove IE iframe shim
                    if ($sub.dataSM('ie-shim')) {
                        $sub.dataSM('ie-shim').remove();
                    }
                    // deactivate scrolling if it is activated for this sub
                    if ($sub.dataSM('scroll')) {
                        this.menuScrollStop($sub);
                        $sub.css({'touch-action': '', '-ms-touch-action': ''})
                            .unbind('.smartmenus_scroll').removeDataSM('scroll').dataSM('scroll-arrows').hide();
                    }
                    // unhighlight parent item
                    $sub.dataSM('parent-a').removeClass('highlighted');
                    var level = $sub.dataSM('level');
                    this.activatedItems.splice(level - 1, 1);
                    this.visibleSubMenus.splice(level - 1, 1);
                    this.$root.triggerHandler('hide.smapi', $sub[0]);
                }
            },
            menuHideAll: function () {
                if (this.showTimeout) {
                    clearTimeout(this.showTimeout);
                    this.showTimeout = 0;
                }
                // hide all subs
                this.menuHideSubMenus();
                // hide root if it's popup
                if (this.opts.isPopup) {
                    this.$root.stop(true, true);
                    if (this.$root.is(':visible')) {
                        if (this.opts.hideFunction) {
                            this.opts.hideFunction.call(this, this.$root);
                        } else {
                            this.$root.hide(this.opts.hideDuration);
                        }
                        // remove IE iframe shim
                        if (this.$root.dataSM('ie-shim')) {
                            this.$root.dataSM('ie-shim').remove();
                        }
                    }
                }
                this.activatedItems = [];
                this.visibleSubMenus = [];
                this.clickActivated = false;
                // reset z-index increment
                this.zIndexInc = 0;
            },
            menuHideSubMenus: function (level) {
                if (!level)
                    level = 0;
                for (var i = this.visibleSubMenus.length - 1; i > level; i--) {
                    this.menuHide(this.visibleSubMenus[i]);
                }
            },
            menuIframeShim: function ($ul) {
                // create iframe shim for the menu
                if (IE && this.opts.overlapControlsInIE && !$ul.dataSM('ie-shim')) {
                    $ul.dataSM('ie-shim', $('<iframe/>').attr({src: 'javascript:0', tabindex: -9})
                            .css({position: 'absolute', top: 'auto', left: '0', opacity: 0, border: '0'})
                    );
                }
            },
            menuInit: function ($ul) {
                if (!$ul.dataSM('in-mega')) {
                    this.subMenus.push($ul);
                    // mark UL's in mega drop downs (if any) so we can neglect them
                    if ($ul.hasClass('mega-menu')) {
                        $ul.find('ul').dataSM('in-mega', true);
                    }
                    // get level (much faster than, for example, using parentsUntil)
                    var level = 2,
                        par = $ul[0];
                    while ((par = par.parentNode.parentNode) != this.$root[0]) {
                        level++;
                    }
                    // cache stuff
                    $ul.dataSM('parent-a', $ul.prevAll('a').eq(-1))
                        .dataSM('level', level)
                        .parent().dataSM('sub', $ul);
                    // add sub indicator to parent item
                    if (this.opts.subIndicators) {
                        $ul.dataSM('parent-a').addClass('has-submenu')[this.opts.subIndicatorsPos](this.$subArrow.clone());
                    }
                }
            },
            menuPosition: function ($sub) {
                var $a = $sub.dataSM('parent-a'),
                    $ul = $sub.parent().parent(),
                    level = $sub.dataSM('level'),
                    subW = this.getWidth($sub),
                    subH = this.getHeight($sub),
                    itemOffset = $a.offset(),
                    itemX = itemOffset.left,
                    itemY = itemOffset.top,
                    itemW = this.getWidth($a),
                    itemH = this.getHeight($a),
                    $win = $(window),
                    winX = $win.scrollLeft(),
                    winY = $win.scrollTop(),
                    winW = this.getViewportWidth(),
                    winH = this.getViewportHeight(),
                    horizontalParent = $ul.hasClass('sm') && !$ul.hasClass('sm-vertical'),
                    subOffsetX = level == 2 ? this.opts.mainMenuSubOffsetX : this.opts.subMenusSubOffsetX,
                    subOffsetY = level == 2 ? this.opts.mainMenuSubOffsetY : this.opts.subMenusSubOffsetY,
                    x, y;
                if (horizontalParent) {
                    x = this.opts.rightToLeftSubMenus ? itemW - subW - subOffsetX : subOffsetX;
                    y = this.opts.bottomToTopSubMenus ? -subH - subOffsetY : itemH + subOffsetY;
                } else {
                    x = this.opts.rightToLeftSubMenus ? subOffsetX - subW : itemW - subOffsetX;
                    y = this.opts.bottomToTopSubMenus ? itemH - subOffsetY - subH : subOffsetY;
                }
                if (this.opts.keepInViewport && !this.isCollapsible()) {
                    var absX = itemX + x,
                        absY = itemY + y;
                    if (this.opts.rightToLeftSubMenus && absX < winX) {
                        x = horizontalParent ? winX - absX + x : itemW - subOffsetX;
                    } else if (!this.opts.rightToLeftSubMenus && absX + subW > winX + winW) {
                        x = horizontalParent ? winX + winW - subW - absX + x : subOffsetX - subW;
                    }
                    if (!horizontalParent) {
                        if (subH < winH && absY + subH > winY + winH) {
                            y += winY + winH - subH - absY;
                        } else if (subH >= winH || absY < winY) {
                            y += winY - absY;
                        }
                    }
                    // do we need scrolling?
                    // 0.49 used for better precision when dealing with float values
                    if (horizontalParent && (absY + subH > winY + winH + 0.49 || absY < winY) || !horizontalParent && subH > winH + 0.49) {
                        var self = this;
                        if (!$sub.dataSM('scroll-arrows')) {
                            $sub.dataSM('scroll-arrows', $([$('<span class="scroll-up"><span class="scroll-up-arrow"></span></span>')[0], $('<span class="scroll-down"><span class="scroll-down-arrow"></span></span>')[0]])
                                    .bind({
                                        mouseenter: function () {
                                            $sub.dataSM('scroll').up = $(this).hasClass('scroll-up');
                                            self.menuScroll($sub);
                                        },
                                        mouseleave: function (e) {
                                            self.menuScrollStop($sub);
                                            self.menuScrollOut($sub, e);
                                        },
                                        'mousewheel DOMMouseScroll': function (e) {
                                            e.preventDefault();
                                        }
                                    })
                                    .insertAfter($sub)
                            );
                        }
                        // bind scroll events and save scroll data for this sub
                        var eNS = '.smartmenus_scroll';
                        $sub.dataSM('scroll', {
                            step: 1,
                            // cache stuff for faster recalcs later
                            itemH: itemH,
                            subH: subH,
                            arrowDownH: this.getHeight($sub.dataSM('scroll-arrows').eq(1))
                        })
                            .bind(getEventsNS([
                                ['mouseover', function (e) {
                                    self.menuScrollOver($sub, e);
                                }],
                                ['mouseout', function (e) {
                                    self.menuScrollOut($sub, e);
                                }],
                                ['mousewheel DOMMouseScroll', function (e) {
                                    self.menuScrollMousewheel($sub, e);
                                }]
                            ], eNS))
                            .dataSM('scroll-arrows').css({
                                top: 'auto',
                                left: '0',
                                marginLeft: x + (parseInt($sub.css('border-left-width')) || 0),
                                width: subW - (parseInt($sub.css('border-left-width')) || 0) - (parseInt($sub.css('border-right-width')) || 0),
                                zIndex: $sub.css('z-index')
                            })
                            .eq(horizontalParent && this.opts.bottomToTopSubMenus ? 0 : 1).show();
                        // when a menu tree is fixed positioned we allow scrolling via touch too
                        // since there is no other way to access such long sub menus if no mouse is present
                        if (this.isFixed()) {
                            $sub.css({'touch-action': 'none', '-ms-touch-action': 'none'})
                                .bind(getEventsNS([
                                    [touchEvents() ? 'touchstart touchmove touchend' : 'pointerdown pointermove pointerup MSPointerDown MSPointerMove MSPointerUp', function (e) {
                                        self.menuScrollTouch($sub, e);
                                    }]
                                ], eNS));
                        }
                    }
                }
                $sub.css({top: 'auto', left: '0', marginLeft: x, marginTop: y - itemH});
                // IE iframe shim
                this.menuIframeShim($sub);
                if ($sub.dataSM('ie-shim')) {
                    $sub.dataSM('ie-shim').css({
                        zIndex: $sub.css('z-index'),
                        width: subW,
                        height: subH,
                        marginLeft: x,
                        marginTop: y - itemH
                    });
                }
            },
            menuScroll: function ($sub, once, step) {
                var data = $sub.dataSM('scroll'),
                    $arrows = $sub.dataSM('scroll-arrows'),
                    y = parseFloat($sub.css('margin-top')),
                    end = data.up ? data.upEnd : data.downEnd,
                    diff;
                if (!once && data.velocity) {
                    data.velocity *= 0.9;
                    diff = data.velocity;
                    if (diff < 0.5) {
                        this.menuScrollStop($sub);
                        return;
                    }
                } else {
                    diff = step || (once || !this.opts.scrollAccelerate ? this.opts.scrollStep : Math.floor(data.step));
                }
                // hide any visible deeper level sub menus
                var level = $sub.dataSM('level');
                if (this.visibleSubMenus.length > level) {
                    this.menuHideSubMenus(level - 1);
                }
                var newY = data.up && end <= y || !data.up && end >= y ? y : (Math.abs(end - y) > diff ? y + (data.up ? diff : -diff) : end);
                $sub.add($sub.dataSM('ie-shim')).css('margin-top', newY);
                // show opposite arrow if appropriate
                if (mouse && (data.up && newY > data.downEnd || !data.up && newY < data.upEnd)) {
                    $arrows.eq(data.up ? 1 : 0).show();
                }
                // if we've reached the end
                if (newY == end) {
                    if (mouse) {
                        $arrows.eq(data.up ? 0 : 1).hide();
                    }
                    this.menuScrollStop($sub);
                } else if (!once) {
                    if (this.opts.scrollAccelerate && data.step < this.opts.scrollStep) {
                        data.step += 0.5;
                    }
                    var self = this;
                    this.scrollTimeout = setTimeout(function () {
                        self.menuScroll($sub);
                    }, this.opts.scrollInterval);
                }
            },
            menuScrollMousewheel: function ($sub, e) {
                if (this.getClosestMenu(e.target) == $sub[0]) {
                    e = e.originalEvent;
                    var up = (e.wheelDelta || -e.detail) > 0;
                    if ($sub.dataSM('scroll-arrows').eq(up ? 0 : 1).is(':visible')) {
                        $sub.dataSM('scroll').up = up;
                        this.menuScroll($sub, true);
                    }
                }
                e.preventDefault();
            },
            menuScrollOut: function ($sub, e) {
                if (mouse) {
                    if (!/^scroll-(up|down)/.test((e.relatedTarget || '').className) && ($sub[0] != e.relatedTarget && !$.contains($sub[0], e.relatedTarget) || this.getClosestMenu(e.relatedTarget) != $sub[0])) {
                        $sub.dataSM('scroll-arrows').css('visibility', 'hidden');
                    }
                }
            },
            menuScrollOver: function ($sub, e) {
                if (mouse) {
                    if (!/^scroll-(up|down)/.test(e.target.className) && this.getClosestMenu(e.target) == $sub[0]) {
                        this.menuScrollRefreshData($sub);
                        var data = $sub.dataSM('scroll');
                        $sub.dataSM('scroll-arrows').eq(0).css('margin-top', data.upEnd).end()
                            .eq(1).css('margin-top', data.downEnd + data.subH - data.arrowDownH).end()
                            .css('visibility', 'visible');
                    }
                }
            },
            menuScrollRefreshData: function ($sub) {
                var data = $sub.dataSM('scroll'),
                    $win = $(window),
                    vportY = $win.scrollTop() - $sub.dataSM('parent-a').offset().top - data.itemH;
                $.extend(data, {
                    upEnd: vportY,
                    downEnd: vportY + this.getViewportHeight() - data.subH
                });
            },
            menuScrollStop: function ($sub) {
                if (this.scrollTimeout) {
                    clearTimeout(this.scrollTimeout);
                    this.scrollTimeout = 0;
                    $.extend($sub.dataSM('scroll'), {
                        step: 1,
                        velocity: 0
                    });
                    return true;
                }
            },
            menuScrollTouch: function ($sub, e) {
                e = e.originalEvent;
                if (isTouchEvent(e)) {
                    var touchPoint = this.getTouchPoint(e);
                    // neglect event if we touched a visible deeper level sub menu
                    if (this.getClosestMenu(touchPoint.target) == $sub[0]) {
                        var data = $sub.dataSM('scroll');
                        if (/(start|down)$/i.test(e.type)) {
                            if (this.menuScrollStop($sub)) {
                                // if we were scrolling, just stop and don't activate any link on the first touch
                                e.preventDefault();
                                this.isTouchScrolling = true;
                            } else {
                                this.isTouchScrolling = false;
                            }
                            // update scroll data since the user might have zoomed, etc.
                            this.menuScrollRefreshData($sub);
                            // extend it with the touch properties
                            $.extend(data, {
                                touchY: touchPoint.pageY,
                                touchTimestamp: e.timeStamp,
                                velocity: 0
                            });
                        } else if (/move$/i.test(e.type)) {
                            var prevY = data.touchY;
                            if (prevY !== undefined && prevY != touchPoint.pageY) {
                                this.isTouchScrolling = true;
                                $.extend(data, {
                                    up: prevY < touchPoint.pageY,
                                    touchY: touchPoint.pageY,
                                    touchTimestamp: e.timeStamp,
                                    velocity: data.velocity + Math.abs(touchPoint.pageY - prevY) * 0.5
                                });
                                this.menuScroll($sub, true, Math.abs(data.touchY - prevY));
                            }
                            e.preventDefault();
                        } else { // touchend/pointerup
                            if (data.touchY !== undefined) {
                                // check if we need to scroll
                                if (e.timeStamp - data.touchTimestamp < 120 && data.velocity > 0) {
                                    data.velocity *= 0.5;
                                    this.menuScrollStop($sub);
                                    this.menuScroll($sub);
                                    e.preventDefault();
                                }
                                delete data.touchY;
                            }
                        }
                    }
                }
            },
            menuShow: function ($sub) {
                if (!$sub.dataSM('beforefirstshowfired')) {
                    $sub.dataSM('beforefirstshowfired', true);
                    if (this.$root.triggerHandler('beforefirstshow.smapi', $sub[0]) === false) {
                        return;
                    }
                }
                if (this.$root.triggerHandler('beforeshow.smapi', $sub[0]) === false) {
                    return;
                }
                this.menuFixLayout($sub);
                $sub.stop(true, true);
                if (!$sub.is(':visible')) {
                    // set z-index
                    $sub.css('z-index', this.zIndexInc = (this.zIndexInc || this.getStartZIndex()) + 1);
                    // highlight parent item
                    if (this.opts.keepHighlighted || this.isCollapsible()) {
                        $sub.dataSM('parent-a').addClass('highlighted');
                    }
                    // min/max-width fix - no way to rely purely on CSS as all UL's are nested
                    if (this.opts.subMenusMinWidth || this.opts.subMenusMaxWidth) {
                        $sub.css({width: 'auto', minWidth: '', maxWidth: ''}).addClass('sm-nowrap');
                        if (this.opts.subMenusMinWidth) {
                            $sub.css('min-width', this.opts.subMenusMinWidth);
                        }
                        if (this.opts.subMenusMaxWidth) {
                            var noMaxWidth = this.getWidth($sub);
                            $sub.css('max-width', this.opts.subMenusMaxWidth);
                            if (noMaxWidth > this.getWidth($sub)) {
                                $sub.removeClass('sm-nowrap').css('width', this.opts.subMenusMaxWidth);
                            }
                        }
                    }
                    this.menuPosition($sub);
                    // insert IE iframe shim
                    if ($sub.dataSM('ie-shim')) {
                        $sub.dataSM('ie-shim').insertBefore($sub);
                    }
                    var complete = function () {
                        // fix: "overflow: hidden;" is not reset on animation complete in jQuery < 1.9.0 in Chrome when global "box-sizing: border-box;" is used
                        $sub.css('overflow', '');
                    };
                    // if sub is collapsible (mobile view)
                    if (this.isCollapsible()) {
                        if (this.opts.collapsibleShowFunction) {
                            this.opts.collapsibleShowFunction.call(this, $sub, complete);
                        } else {
                            $sub.show(this.opts.collapsibleShowDuration, complete);
                        }
                    } else {
                        if (this.opts.showFunction) {
                            this.opts.showFunction.call(this, $sub, complete);
                        } else {
                            $sub.show(this.opts.showDuration, complete);
                        }
                    }
                    // save new sub menu for this level
                    this.visibleSubMenus[$sub.dataSM('level') - 1] = $sub;
                    this.$root.triggerHandler('show.smapi', $sub[0]);
                }
            },
            popupHide: function (noHideTimeout) {
                if (this.hideTimeout) {
                    clearTimeout(this.hideTimeout);
                    this.hideTimeout = 0;
                }
                var self = this;
                this.hideTimeout = setTimeout(function () {
                    self.menuHideAll();
                }, noHideTimeout ? 1 : this.opts.hideTimeout);
            },
            popupShow: function (left, top) {
                if (!this.opts.isPopup) {
                    alert('SmartMenus jQuery Error:\n\nIf you want to show this menu via the "popupShow" method, set the isPopup:true option.');
                    return;
                }
                if (this.hideTimeout) {
                    clearTimeout(this.hideTimeout);
                    this.hideTimeout = 0;
                }
                this.menuFixLayout(this.$root);
                this.$root.stop(true, true);
                if (!this.$root.is(':visible')) {
                    this.$root.css({left: left, top: top});
                    // IE iframe shim
                    this.menuIframeShim(this.$root);
                    if (this.$root.dataSM('ie-shim')) {
                        this.$root.dataSM('ie-shim').css({
                            zIndex: this.$root.css('z-index'),
                            width: this.getWidth(this.$root),
                            height: this.getHeight(this.$root),
                            left: left,
                            top: top
                        }).insertBefore(this.$root);
                    }
                    // show menu
                    var self = this,
                        complete = function () {
                            self.$root.css('overflow', '');
                        };
                    if (this.opts.showFunction) {
                        this.opts.showFunction.call(this, this.$root, complete);
                    } else {
                        this.$root.show(this.opts.showDuration, complete);
                    }
                    this.visibleSubMenus[0] = this.$root;
                }
            },
            refresh: function () {
                this.menuHideAll();
                this.$root.find('ul').each(function () {
                    var $this = $(this);
                    if ($this.dataSM('scroll-arrows')) {
                        $this.dataSM('scroll-arrows').remove();
                    }
                })
                    .removeDataSM('in-mega')
                    .removeDataSM('shown-before')
                    .removeDataSM('ie-shim')
                    .removeDataSM('scroll-arrows')
                    .removeDataSM('parent-a')
                    .removeDataSM('level')
                    .removeDataSM('beforefirstshowfired');
                this.$root.find('a.has-submenu').removeClass('has-submenu')
                    .parent().removeDataSM('sub');
                if (this.opts.subIndicators) {
                    this.$root.find('span.sub-arrow').remove();
                }
                if (this.opts.markCurrentItem) {
                    this.$root.find('a.current').removeClass('current');
                }
                this.subMenus = [];
                this.init(true);
            },
            rootOut: function (e) {
                if (!this.handleEvents() || this.isTouchMode() || e.target == this.$root[0]) {
                    return;
                }
                if (this.hideTimeout) {
                    clearTimeout(this.hideTimeout);
                    this.hideTimeout = 0;
                }
                if (!this.opts.showOnClick || !this.opts.hideOnClick) {
                    var self = this;
                    this.hideTimeout = setTimeout(function () {
                        self.menuHideAll();
                    }, this.opts.hideTimeout);
                }
            },
            rootOver: function (e) {
                if (!this.handleEvents() || this.isTouchMode() || e.target == this.$root[0]) {
                    return;
                }
                if (this.hideTimeout) {
                    clearTimeout(this.hideTimeout);
                    this.hideTimeout = 0;
                }
            },
            winResize: function (e) {
                if (!this.handleEvents()) {
                    // we still need to resize the disable overlay if it's visible
                    if (this.$disableOverlay) {
                        var pos = this.$root.offset();
                        this.$disableOverlay.css({
                            top: pos.top,
                            left: pos.left,
                            width: this.$root.outerWidth(),
                            height: this.$root.outerHeight()
                        });
                    }
                    return;
                }
                // hide sub menus on resize - on mobile do it only on orientation change
                if (!this.isCollapsible() && (!('onorientationchange' in window) || e.type == 'orientationchange')) {
                    if (this.activatedItems.length) {
                        this.activatedItems[this.activatedItems.length - 1][0].blur();
                    }
                    this.menuHideAll();
                }
            }
        }
    });

    $.fn.dataSM = function (key, val) {
        if (val) {
            return this.data(key + '_smartmenus', val);
        }
        return this.data(key + '_smartmenus');
    }

    $.fn.removeDataSM = function (key) {
        return this.removeData(key + '_smartmenus');
    }

    $.fn.smartmenus = function (options) {
        if (typeof options == 'string') {
            var args = arguments,
                method = options;
            Array.prototype.shift.call(args);
            return this.each(function () {
                var smartmenus = $(this).data('smartmenus');
                if (smartmenus && smartmenus[method]) {
                    smartmenus[method].apply(smartmenus, args);
                }
            });
        }
        var opts = $.extend({}, $.fn.smartmenus.defaults, options);
        return this.each(function () {
            new $.SmartMenus(this, opts);
        });
    }

    // default settings
    $.fn.smartmenus.defaults = {
        isPopup: false,		// is this a popup menu (can be shown via the popupShow/popupHide methods) or a permanent menu bar
        mainMenuSubOffsetX: 0,		// pixels offset from default position
        mainMenuSubOffsetY: 0,		// pixels offset from default position
        subMenusSubOffsetX: 0,		// pixels offset from default position
        subMenusSubOffsetY: 0,		// pixels offset from default position
        subMenusMinWidth: '10em',		// min-width for the sub menus (any CSS unit) - if set, the fixed width set in CSS will be ignored
        subMenusMaxWidth: '20em',		// max-width for the sub menus (any CSS unit) - if set, the fixed width set in CSS will be ignored
        subIndicators: true,		// create sub menu indicators - creates a SPAN and inserts it in the A
        subIndicatorsPos: 'prepend',	// position of the SPAN relative to the menu item content ('prepend', 'append')
        subIndicatorsText: '+',		// [optionally] add text in the SPAN (e.g. '+') (you may want to check the CSS for the sub indicators too)
        scrollStep: 30,		// pixels step when scrolling long sub menus that do not fit in the viewport height
        scrollInterval: 30,		// interval between each scrolling step
        scrollAccelerate: true,		// accelerate scrolling or use a fixed step
        showTimeout: 250,		// timeout before showing the sub menus
        hideTimeout: 500,		// timeout before hiding the sub menus
        showDuration: 0,		// duration for show animation - set to 0 for no animation - matters only if showFunction:null
        showFunction: null,		// custom function to use when showing a sub menu (the default is the jQuery 'show')
        // don't forget to call complete() at the end of whatever you do
        // e.g.: function($ul, complete) { $ul.fadeIn(250, complete); }
        hideDuration: 0,		// duration for hide animation - set to 0 for no animation - matters only if hideFunction:null
        hideFunction: function ($ul, complete) {
            $ul.fadeOut(200, complete);
        },	// custom function to use when hiding a sub menu (the default is the jQuery 'hide')
        // don't forget to call complete() at the end of whatever you do
        // e.g.: function($ul, complete) { $ul.fadeOut(250, complete); }
        collapsibleShowDuration: 0,		// duration for show animation for collapsible sub menus - matters only if collapsibleShowFunction:null
        collapsibleShowFunction: function ($ul, complete) {
            $ul.slideDown(200, complete);
        },	// custom function to use when showing a collapsible sub menu
        // (i.e. when mobile styles are used to make the sub menus collapsible)
        collapsibleHideDuration: 0,		// duration for hide animation for collapsible sub menus - matters only if collapsibleHideFunction:null
        collapsibleHideFunction: function ($ul, complete) {
            $ul.slideUp(200, complete);
        },	// custom function to use when hiding a collapsible sub menu
        // (i.e. when mobile styles are used to make the sub menus collapsible)
        showOnClick: false,		// show the first-level sub menus onclick instead of onmouseover (matters only for mouse input)
        hideOnClick: true,		// hide the sub menus on click/tap anywhere on the page
        keepInViewport: true,		// reposition the sub menus if needed to make sure they always appear inside the viewport
        keepHighlighted: true,		// keep all ancestor items of the current sub menu highlighted (adds the 'highlighted' class to the A's)
        markCurrentItem: false,		// automatically add the 'current' class to the A element of the item linking to the current URL
        markCurrentTree: true,		// add the 'current' class also to the A elements of all ancestor items of the current item
        rightToLeftSubMenus: false,		// right to left display of the sub menus (check the CSS for the sub indicators' position)
        bottomToTopSubMenus: false,		// bottom to top display of the sub menus
        overlapControlsInIE: true		// make sure sub menus appear on top of special OS controls in IE (i.e. SELECT, OBJECT, EMBED, etc.)
    };

})(jQuery);
/*!
 * SmartMenus jQuery Plugin Bootstrap Addon - v0.1.1 - August 25, 2014
 * http://www.smartmenus.org/
 *
 * Copyright 2014 Vasil Dinkov, Vadikom Web Ltd.
 * http://vadikom.com
 *
 * Licensed MIT
 */

(function ($) {

    // init ondomready
    $(function () {

        // init all menus
        $('ul.navbar-nav').each(function () {
            var $this = $(this);
            $this.addClass('sm').smartmenus({

                // these are some good default options that should work for all
                // you can, of course, tweak these as you like
                subMenusSubOffsetX: 2,
                subMenusSubOffsetY: -6,
                subIndicatorsPos: 'append',
                subIndicatorsText: '...',
                collapsibleShowFunction: null,
                collapsibleHideFunction: null,
                rightToLeftSubMenus: $this.hasClass('navbar-right'),
                bottomToTopSubMenus: $this.closest('.navbar').hasClass('navbar-fixed-bottom')
            })
                // set Bootstrap's "active" class to SmartMenus "current" items (should someone decide to enable markCurrentItem: true)
                .find('a.current').parent().addClass('active');
        })
            .bind({
                // set/unset proper Bootstrap classes for some menu elements
                'show.smapi': function (e, menu) {
                    var $menu = $(menu),
                        $scrollArrows = $menu.dataSM('scroll-arrows'),
                        obj = $(this).data('smartmenus');
                    if ($scrollArrows) {
                        // they inherit border-color from body, so we can use its background-color too
                        $scrollArrows.css('background-color', $(document.body).css('background-color'));
                    }
                    $menu.parent().addClass('open' + (obj.isCollapsible() ? ' collapsible' : ''));
                },
                'hide.smapi': function (e, menu) {
                    $(menu).parent().removeClass('open collapsible');
                },
                // click the parent item to toggle the sub menus (and reset deeper levels and other branches on click)
                'click.smapi': function (e, item) {
                    var obj = $(this).data('smartmenus');
                    if (obj.isCollapsible()) {
                        var $item = $(item),
                            $sub = $item.parent().dataSM('sub');
                        if ($sub && $sub.dataSM('shown-before') && $sub.is(':visible')) {
                            obj.itemActivate($item);
                            obj.menuHide($sub);
                            return false;
                        }
                    }
                }
            });

    });

    // fix collapsible menu detection for Bootstrap 3
    $.SmartMenus.prototype.isCollapsible = function () {
        return this.$firstLink.parent().css('float') != 'left';
    };

})(jQuery);
/*!
 * SmartMenus jQuery Plugin Keyboard Addon - v0.1.0 - August 25, 2014
 * http://www.smartmenus.org/
 *
 * Copyright 2014 Vasil Dinkov, Vadikom Web Ltd.
 * http://vadikom.com
 *
 * Licensed MIT
 */

(function ($) {

    function getFirstItemLink($ul) {
        return $ul.find('> li > a:not(.disabled)').eq(0);
    }

    function getLastItemLink($ul) {
        return $ul.find('> li > a:not(.disabled)').eq(-1);
    }

    function getNextItemLink($li, noLoop) {
        var $a = $li.nextAll('li').children('a:not(.disabled)').eq(0);
        return noLoop || $a.length ? $a : getFirstItemLink($li.parent());
    }

    function getPreviousItemLink($li, noLoop) {
        var $a = $li.prevAll('li').children('a:not(.disabled)').eq(0);
        return noLoop || $a.length ? $a : getLastItemLink($li.parent());
    }

    // jQuery's .focus() is unreliable in some versions, so we're going to call the links' native JS focus method
    $.fn.focusSM = function () {
        if (this.length && this[0].focus) {
            this[0].focus();
        }
        return this;
    }

    $.extend($.SmartMenus.Keyboard = {}, {
        docKeydown: function (e) {
            var keyCode = e.keyCode;
            if (!/(27|37|38|39|40)/.test(keyCode)) {
                return;
            }
            var $root = $(this),
                obj = $root.data('smartmenus'),
                $target = $(e.target);
            if (!obj || !$target.is('a')) {
                return;
            }
            var $li = $target.parent(),
                $ul = $li.parent(),
                level = $ul.dataSM('level');
            // exit it if this is an A inside a mega drop-down
            if (!level) {
                return;
            }
            // swap left & right keys
            if (obj.opts.rightToLeftSubMenus) {
                if (keyCode == 37) {
                    keyCode = 39;
                } else if (keyCode == 39) {
                    keyCode = 37;
                }
            }
            switch (keyCode) {
                case 27: // Esc
                    if (obj.visibleSubMenus[level]) {
                        obj.menuHide(obj.visibleSubMenus[level]);
                    } else if (level == 1) {
                        if (obj.opts.isPopup) {
                            obj.menuHideAll();
                        }
                        if (obj.opts.keyboardEscapeFocus) {
                            try {
                                obj.opts.keyboardEscapeFocus.focusSM();
                            } catch (e) {
                            }
                            ;
                            // focus next focusable page element
                        } else {
                            var $lastMenuFocusable = $root.find('a, input, select, button, textarea').eq(-1),
                                $allFocusables = $('a, input, select, button, textarea'),
                                nextFocusableIndex = $allFocusables.index($lastMenuFocusable[0]) + 1;
                            $allFocusables.eq(nextFocusableIndex).focusSM();
                        }
                    } else {
                        $ul.dataSM('parent-a').focusSM();
                        obj.menuHide(obj.visibleSubMenus[level - 1]);
                    }
                    break;
                case 37: // Left
                    if (obj.isCollapsible()) {
                        break;
                    }
                    if (level > 2 || level == 2 && $root.hasClass('sm-vertical')) {
                        obj.activatedItems[level - 2].focusSM();
                        // move to previous non-disabled parent item (make sure we cycle so it might be the last item)
                    } else if (!$root.hasClass('sm-vertical')) {
                        getPreviousItemLink(obj.activatedItems[0].parent()).focusSM();
                    }
                    break;
                case 38: // Up
                    if (obj.isCollapsible()) {
                        var $firstItem;
                        // if this is the first item of a sub menu, move to the parent item
                        if (level > 1 && ($firstItem = getFirstItemLink($ul)).length && $target[0] == $firstItem[0]) {
                            obj.activatedItems[level - 2].focusSM();
                        } else {
                            getPreviousItemLink($li).focusSM();
                        }
                    } else {
                        if (level == 1 && !$root.hasClass('sm-vertical') && obj.visibleSubMenus[level] && obj.opts.bottomToTopSubMenus) {
                            getLastItemLink(obj.visibleSubMenus[level]).focusSM();
                        } else if (level > 1 || $root.hasClass('sm-vertical')) {
                            getPreviousItemLink($li).focusSM();
                        }
                    }
                    break;
                case 39: // Right
                    if (obj.isCollapsible()) {
                        break;
                    }
                    // move to next non-disabled parent item (make sure we cycle so it might be the last item)
                    if ((level == 1 || !obj.visibleSubMenus[level]) && !$root.hasClass('sm-vertical')) {
                        getNextItemLink(obj.activatedItems[0].parent()).focusSM();
                    } else if (obj.visibleSubMenus[level] && !obj.visibleSubMenus[level].hasClass('mega-menu')) {
                        getFirstItemLink(obj.visibleSubMenus[level]).focusSM();
                    }
                    break;
                case 40: // Down
                    if (obj.isCollapsible()) {
                        var $firstSubItem,
                            $lastItem;
                        // move to sub menu if appropriate
                        if (obj.visibleSubMenus[level] && !obj.visibleSubMenus[level].hasClass('mega-menu') && ($firstSubItem = getFirstItemLink(obj.visibleSubMenus[level])).length) {
                            $firstSubItem.focusSM();
                            // if this is the last item of a sub menu, move to the next parent item
                        } else if (level > 1 && ($lastItem = getLastItemLink($ul)).length && $target[0] == $lastItem[0]) {
                            var $parentItem = obj.activatedItems[level - 2].parent(),
                                $nextParentItem = null;
                            while ($parentItem.is('li')) {
                                if (($nextParentItem = getNextItemLink($parentItem, true)).length) {
                                    break;
                                }
                                $parentItem = $parentItem.parent().parent();
                            }
                            $nextParentItem.focusSM();
                        } else {
                            getNextItemLink($li).focusSM();
                        }
                    } else {
                        if (level == 1 && !$root.hasClass('sm-vertical') && obj.visibleSubMenus[level] && !obj.opts.bottomToTopSubMenus) {
                            getFirstItemLink(obj.visibleSubMenus[level]).focusSM();
                        } else if (level > 1 || $root.hasClass('sm-vertical')) {
                            getNextItemLink($li).focusSM();
                        }
                    }
                    break;
            }
            e.stopPropagation();
            e.preventDefault();
        }
    });

    // hook it
    $(document).delegate('ul.sm', 'keydown.smartmenus', $.SmartMenus.Keyboard.docKeydown);

    $.extend($.SmartMenus.prototype, {
        keyboardSetEscapeFocus: function ($elm) {
            this.opts.keyboardEscapeFocus = $elm;
        },
        keyboardSetHotkey: function (keyCode, modifiers) {
            var self = this;
            $(document).bind('keydown.smartmenus' + this.rootId, function (e) {
                if (keyCode == e.keyCode) {
                    var procede = true;
                    if (modifiers) {
                        if (typeof modifiers == 'string') {
                            modifiers = [modifiers];
                        }
                        $.each(['ctrlKey', 'shiftKey', 'altKey', 'metaKey'], function (index, value) {
                            if ($.inArray(value, modifiers) >= 0 && !e[value] || $.inArray(value, modifiers) < 0 && e[value]) {
                                procede = false;
                                return false;
                            }
                        });
                    }
                    if (procede) {
                        getFirstItemLink(self.$root).focusSM();
                        e.stopPropagation();
                        e.preventDefault();
                    }
                }
            });
        }
    });

})(jQuery);
var Quest = function ($) {

    return {

        initFormPlaceHolder: function () {
            if (!("placeholder" in document.createElement("input"))) {
                $("input[placeholder], textarea[placeholder]").each(function () {
                    var val = $(this).attr("placeholder");
                    if (this.value == "") {
                        this.value = val;
                    }
                    $(this).focus(function () {
                        if (this.value == val) {
                            this.value = "";
                        }
                    }).blur(function () {
                        if ($.trim(this.value) == "") {
                            this.value = val;
                        }
                    });
                });

                // Clear default placeholder values on form submit
                $('form').submit(function () {
                    $(this).find("input[placeholder], textarea[placeholder]").each(function () {
                        if (this.value == $(this).attr("placeholder")) {
                            this.value = "";
                        }
                    });
                });
            }
        },

        initColorbox: function () {
            $('a.gallery').colorbox({
                rel: 'gallery',
                maxWidth: '95%',
                maxHeight: '90%',
                retinaImage: true
                // iframe: true
            });
        },

        initTooltip: function () {
            $('a[data-toggle=tooltip]').tooltip();
        },

        initMasonry: function () {
            var $container = $('.grid-container');
            if ($container.length > 0) {
                $container.imagesLoaded(function () {
                    $container.masonry({
                        itemSelector: '.post-grid-wrap'
                    });
                });
            }
        },

        //init image hover effects
        initImageEffects: function () {
            if (Modernizr.touch) {
                $(".close-overlay").removeClass("hidden");
                $(".effects").click(function (e) {
                    if (!$(this).hasClass("hover")) {
                        $(this).addClass("hover");
                    }
                });
                $(".close-overlay").click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if ($(this).closest(".effects").hasClass("hover")) {
                        $(this).closest(".effects").removeClass("hover");
                    }
                });
            } else {
                $(".effect").mouseenter(function () {
                    $(this).addClass("hover");
                })
                    .mouseleave(function () {
                        $(this).removeClass("hover");
                    });
            }

        },

        showBackToTop: function () {
            var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
            //grab the "back to top" link
                $back_to_top = $('.cd-top'),
                $window = $(window);
            ($window.scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if ($window.scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        },

        initBackToTop: function () {
            //smooth scroll to top
            $('.cd-top').on('click', function (event) {
                event.preventDefault();
                $('body,html').animate({
                    scrollTop: 0,
                }, 700);
            });
        },

        init: function () {
            new WOW({offset: $(window).height() / 3}).init();
            Quest.initImageEffects();
            Quest.initColorbox();
            Quest.initTooltip();
            Quest.initBackToTop();
            Quest.initMasonry();
            Quest.initFormPlaceHolder();
        }

    };

}(jQuery);

var PageBuilder = (function ($) {

    return {

        initEvents: function () {

            $('.sl-slider-wrapper').each(function () {
                var $el = $(this),
                    options = $el.data(),
                    defaults = {
                        autoplay: true,
                        onBeforeChange: function (slide, pos) {
                            $nav.removeClass('nav-dot-current');
                            $nav.eq(pos).addClass('nav-dot-current');
                        }
                    },
                    cnt = $el.find('.sl-slide').length;
                $.extend(defaults, options);

                $el.append('<nav class="nav-dots">' + new Array(cnt + 1).join('<span></span>') + '</nav>');

                var $nav = $el.find('.nav-dots > span');
                $nav.first().addClass('nav-dot-current');

                var slitslider = $el.slitslider(defaults),
                    $next = $el.find('.slit-nav-buttons .next'),
                    $prev = $el.find('.slit-nav-buttons .prev');

                $nav.each(function (i) {

                    $(this).on('click', function (event) {

                        var $dot = $(this);

                        if (!slitslider.isActive()) {

                            $nav.removeClass('nav-dot-current');
                            $dot.addClass('nav-dot-current');

                        }

                        slitslider.jump(i + 1);
                        return false;

                    });

                });

                $next.on('click', function (event) {
                    slitslider.next();
                    return false;
                });

                $prev.on('click', function (event) {
                    slitslider.previous();
                    return false;
                });

            });

        }

    }

})(jQuery);


jQuery(window).scroll(function () {
    Quest.showBackToTop();
});

jQuery(document).ready(function () {
    PageBuilder.initEvents();
    Quest.init();
});
