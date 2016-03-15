/* global Modernizr, WOW, console */

var Quest = (function($) {

    return {

        initFormPlaceHolder: function() {
            if (!('placeholder' in document.createElement('input'))) {
                $('input[placeholder], textarea[placeholder]').each(function() {
                    var val = $(this).attr('placeholder');
                    if (this.value === '') {
                        this.value = val;
                    }
                    $(this).focus(function() {
                        if (this.value === val) {
                            this.value = '';
                        }
                    }).blur(function() {
                        if ($.trim(this.value) === '') {
                            this.value = val;
                        }
                    });
                });

                // Clear default placeholder values on form submit
                $('form').submit(function() {
                    $(this).find('input[placeholder], textarea[placeholder]').each(function() {
                        if (this.value === $(this).attr('placeholder')) {
                            this.value = '';
                        }
                    });
                });
            }
        },

        initColorbox: function() {
            $('a.gallery').colorbox({
                rel: 'gallery',
                maxWidth: '95%',
                maxHeight: '90%',
                retinaImage: true
                    // iframe: true
            });
        },

        initTooltip: function() {
            $('a[data-toggle=tooltip]').tooltip();
        },

        initMasonry: function() {
            var $container = $('.grid-container');
            if ($container.length > 0) {
                $container.imagesLoaded(function() {
                    $container.masonry({
                        itemSelector: '.post-grid-wrap'
                    });
                });
            }
        },

        //init image hover effects
        initImageEffects: function() {
            if (Modernizr.touch) {
                $('.close-overlay').removeClass('hidden');
                $('.effects').click(function(e) {
                    if (!$(this).hasClass('hover')) {
                        $(this).addClass('hover');
                    }
                });
                $('.close-overlay').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    if ($(this).closest('.effects').hasClass('hover')) {
                        $(this).closest('.effects').removeClass('hover');
                    }
                });
            } else {
                $('.effect').mouseenter(function() {
                        $(this).addClass('hover');
                    })
                    .mouseleave(function() {
                        $(this).removeClass('hover');
                    });
            }

        },

        showBackToTop: function() {
            var offset = 300,
                //browser window scroll (in pixels) after which the 'back to top' link opacity is reduced
                offset_opacity = 1200,
                //grab the 'back to top' link
                $back_to_top = $('.cd-top'),
                $window = $(window);

            if ($window.scrollTop() > offset) {
                $back_to_top.addClass('cd-is-visible');
                $('body').addClass('scrolled');
            } else {
                $back_to_top.removeClass('cd-is-visible cd-fade-out');
            }

            if ($window.scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        },

        initBackToTop: function() {
            //smooth scroll to top
            $('.cd-top').on('click', function(event) {
                event.preventDefault();
                $('body,html').animate({
                    scrollTop: 0,
                }, 700);
            });
        },

        initMenu: function(){
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
                    bottomToTopSubMenus: $this.closest('.navbar').hasClass('navbar-fixed-bottom'),
                    showFunction: function(elm, cb){
                        elm.addClass('awake');
                        cb.call(this);
                    },
                    hideFunction: function(elm, cb){
                        elm.removeClass('awake');
                        cb.call(this);
                    }
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
            if(!$('body').hasClass('header-version2')){
                var $logo = $('div.logo');
                $logo.imagesLoaded(function(){
                    $('nav.main-navigation ul.nav').css('line-height', ($logo.height() - 3) + 'px');
                });
            }
        },

        init: function() {
            Quest.initMenu();
            new WOW({
                offset: 100
            }).init();
            Quest.initImageEffects();
            Quest.initColorbox();
            Quest.initTooltip();
            Quest.initBackToTop();
            Quest.initMasonry();
            Quest.initFormPlaceHolder();
        }

    };

}(jQuery));

var PageBuilder = (function($) {

    return {

        initEvents: function() {

            $('.sl-slider-wrapper').each(function() {
                var $el = $(this),
                    $nav = $el.find('.nav-dots > span'),
                    options = $el.data(),
                    defaults = {
                        autoplay: true,
                        onBeforeChange: function(slide, pos) {
                            $nav.removeClass('nav-dot-current');
                            $nav.eq(pos).addClass('nav-dot-current');
                        }
                    },
                    cnt = $el.find('.sl-slide').length;
                $.extend(defaults, options);

                $el.append('<nav class="nav-dots">' + new Array(cnt + 1).join('<span></span>') + '</nav>');

                $nav.first().addClass('nav-dot-current');

                var slitslider = $el.slitslider(defaults),
                    $next = $el.find('.slit-nav-buttons .next'),
                    $prev = $el.find('.slit-nav-buttons .prev');

                $nav.each(function(i) {

                    $(this).on('click', function(event) {

                        var $dot = $(this);

                        if (!slitslider.isActive()) {

                            $nav.removeClass('nav-dot-current');
                            $dot.addClass('nav-dot-current');

                        }

                        slitslider.jump(i + 1);
                        return false;

                    });

                });

                $next.on('click', function(event) {
                    slitslider.next();
                    return false;
                });

                $prev.on('click', function(event) {
                    slitslider.previous();
                    return false;
                });

            });

        }

    };

})(jQuery);


jQuery(window).scroll(function() {
    Quest.showBackToTop();
});

jQuery(document).ready(function() {
    PageBuilder.initEvents();
    Quest.init();
});
