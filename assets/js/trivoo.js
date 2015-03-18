var mob = false;
var menuOpen = false;
var menuTimeout;
var trivoo = function() {

    return {

        // initCarousel: function() {
        //     jQuery('.carousel').carousel();
        // },

        // initFitVids: function() {
        //     jQuery(".textwidget, iframe, .video:not(.no-fitvids)").fitVids();
        // },

        initFormPlaceHolder: function() {
            if (!("placeholder" in document.createElement("input"))) {
                jQuery("input[placeholder], textarea[placeholder]").each(function() {
                    var val = jQuery(this).attr("placeholder");
                    if (this.value == "") {
                        this.value = val;
                    }
                    jQuery(this).focus(function() {
                        if (this.value == val) {
                            this.value = "";
                        }
                    }).blur(function() {
                        if (jQuery.trim(this.value) == "") {
                            this.value = val;
                        }
                    });
                });

                // Clear default placeholder values on form submit
                jQuery('form').submit(function() {
                    jQuery(this).find("input[placeholder], textarea[placeholder]").each(function() {
                        if (this.value == jQuery(this).attr("placeholder")) {
                            this.value = "";
                        }
                    });
                });
            }
        },

        // initFlexSlider: function() {
        //     jQuery('#related-posts').flexslider({
        //         animation: 'slide',
        //         itemWidth: 210,
        //         itemMargin: 5,
        //         minItems: 1,
        //         maxItems: 5
        //     });

        //     jQuery('.flexslider:not(.ignore)').flexslider({
        //         animation: "fade",
        //         smoothHeight: true,
        //         selector: ".slides > li"
        //     });
        // },

        initBackToTop: function() {
            jQuery('#back-to-top a').click(function() {
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },

        // initAnimations: function() {
        //     trivoo.eventsForTransitions('fromTop');
        //     trivoo.eventsForTransitions('fromBottom');
        //     trivoo.eventsForTransitions('fromLeft');
        //     trivoo.eventsForTransitions('fromRight');
        //     trivoo.eventsForTransitions('fadeIn');
        //     trivoo.eventsForTransitions('scaleUp', jQuery('.avatar img'));
        // },

        // initIsotope: function(selector) {
        //     if (typeof selector === 'undefined') {
        //         jQuery('.portfolio-grid-alt').isotope({
        //             itemSelector: '.portfolio-grid-alt-item'
        //         });
        //     } else {
        //         jQuery('.portfolio-grid-alt').isotope({
        //             filter: '.portfolio-grid-alt-item.' + selector
        //         });
        //     }
        // },

        // initPortfolioFilter: function() {
        //     jQuery('#portfolio_filter a').click(function() {
        //         jQuery('#portfolio_filter a').removeClass('active');
        //         var selector = jQuery(this).addClass('active').attr('data-filter');
        //         trivoo.initIsotope(selector);
        //         return false;
        //     });
        // },

        initColorbox: function() {
            jQuery('a.gallery').colorbox({
                rel: 'gallery',
                maxWidth: '95%'
            });
        },

        initTooltip: function() {
            jQuery('a[data-toggle=tooltip]').tooltip();
        },

        // initCustomJs: function() {
        //     jQuery('.post-content .col-md-9 .container, .container .container').removeClass('container');
        //     jQuery('.row.no-spacing').parent().parent('.trivoo-row').addClass('np');
        //     jQuery('.row.spacing').parent().parent('.trivoo-row').removeClass('np')
        // },

        // initStickyHeader: function() {
        //     if (!jQuery('nav.main-menu:first').visible(true)) {
        //         if (menuOpen) {
        //             return;
        //         }
        //         menuOpen = true;
        //         jQuery('#back-to-top').fadeIn();

        //         if (jQuery('.fixed-header #sticky-header').length > 0 && !jQuery('#sticky-header').hasClass('scrolled')) {
        //             var that = jQuery('#sticky-header');
        //             var tp = jQuery('#wpadminbar').length > 0 ? jQuery('#wpadminbar').height() : -1;
        //             that.fadeOut(0, function() {
        //                 that.addClass('scrolled').css('top', tp - 42 + 'px');
        //                 menuTimeout = setTimeout(function() {
        //                     that.show().animate({
        //                         'top': tp
        //                     }, 300);
        //                 }, 1000);
        //             });
        //             jQuery('ul#menu-trivoo>li>a').removeAttr('style');
        //         }
        //     } else if (menuOpen) {
        //         menuOpen = false;
        //         clearTimeout(menuTimeout);
        //         jQuery('#back-to-top').fadeOut();

        //         if (jQuery('.fixed-header #sticky-header').length > 0) {
        //             jQuery('#sticky-header').stop().hide().removeClass('scrolled').removeAttr('style');
        //         }
        //     }
        // },

        displayMobileMenu: function() {
            var h = 0,
                mob = false;
            jQuery('.main-header').removeClass('mobile');
            jQuery('.main-header:not(#sticky-header) .nav.navbar-nav>li').each(function() {
                if (h == 0) {
                    h = jQuery(this).offset().top;
                } else if (h != jQuery(this).offset().top) {
                    mob = true;
                }
            });
            if (mob) {
                jQuery('.main-header').addClass('mobile');
            }
        },


        // setHeaderPosition: function() {
        //     if (jQuery(window).width() <= 768) {
        //         jQuery('.main-header').css('top', 'auto');
        //     } else {
        //         jQuery('.main-header').removeAttr('style');
        //     }
        // },

        // setMenuHeight: function(){
        //     var lh = jQuery('.logo img').first().height(),
        //         menu = jQuery('.main-menu .nav:not(#trivoo-sticky-menu)');

        //     if( lh > menu.height()){
        //         menu.css({'height': lh+'px', 'line-height': lh+'px'});
        //     }
        // }

    };

}();


jQuery(window).load(function() {
    // trivoo.setHeaderPosition();
    // trivoo.setMenuHeight();
    // trivoo.initAnimations();
    // trivoo.resizeTabs(null, true);
    // trivoo.initIsotope();
    // trivoo.initPortfolioFilter();
}).resize(function() {
    // trivoo.resizeTabs();
    // trivoo.setHeaderPosition();
    // trivoo.displayMobileMenu();
    // trivoo.initIsotope();
}).scroll(function() {
    // trivoo.initStickyHeader();
});

jQuery(document).ready(function() {
    trivoo.displayMobileMenu();
    // trivoo.initCarousel();
    // trivoo.initFitVids();
    trivoo.initColorbox();
    trivoo.initTooltip();
    // trivoo.initFlexSlider();
    trivoo.initBackToTop();
    // trivoo.setHeaderPosition();
    trivoo.initFormPlaceHolder();
    // trivoo.initCustomJs();
});
