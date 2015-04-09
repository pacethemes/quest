var mob = false;
var menuOpen = false;
var menuTimeout;
var trivoo = function($) {

    return {

        // initCarousel: function() {
        //     $('.carousel').carousel();
        // },

        // initFitVids: function() {
        //     $(".textwidget, iframe, .video:not(.no-fitvids)").fitVids();
        // },

        initFormPlaceHolder: function() {
            if (!("placeholder" in document.createElement("input"))) {
                $("input[placeholder], textarea[placeholder]").each(function() {
                    var val = $(this).attr("placeholder");
                    if (this.value == "") {
                        this.value = val;
                    }
                    $(this).focus(function() {
                        if (this.value == val) {
                            this.value = "";
                        }
                    }).blur(function() {
                        if ($.trim(this.value) == "") {
                            this.value = val;
                        }
                    });
                });

                // Clear default placeholder values on form submit
                $('form').submit(function() {
                    $(this).find("input[placeholder], textarea[placeholder]").each(function() {
                        if (this.value == $(this).attr("placeholder")) {
                            this.value = "";
                        }
                    });
                });
            }
        },

        // initFlexSlider: function() {
        //     $('#related-posts').flexslider({
        //         animation: 'slide',
        //         itemWidth: 210,
        //         itemMargin: 5,
        //         minItems: 1,
        //         maxItems: 5
        //     });

        //     $('.flexslider:not(.ignore)').flexslider({
        //         animation: "fade",
        //         smoothHeight: true,
        //         selector: ".slides > li"
        //     });
        // },

        initBackToTop: function() {
            $('#back-to-top a').click(function() {
                $('body,html').animate({
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
        //     trivoo.eventsForTransitions('scaleUp', $('.avatar img'));
        // },

        // initIsotope: function(selector) {
        //     if (typeof selector === 'undefined') {
        //         $('.portfolio-grid-alt').isotope({
        //             itemSelector: '.portfolio-grid-alt-item'
        //         });
        //     } else {
        //         $('.portfolio-grid-alt').isotope({
        //             filter: '.portfolio-grid-alt-item.' + selector
        //         });
        //     }
        // },

        // initPortfolioFilter: function() {
        //     $('#portfolio_filter a').click(function() {
        //         $('#portfolio_filter a').removeClass('active');
        //         var selector = $(this).addClass('active').attr('data-filter');
        //         trivoo.initIsotope(selector);
        //         return false;
        //     });
        // },

        initColorbox: function() {
            $('a.gallery').colorbox({
                rel: 'gallery',
                maxWidth: '95%'
            });
        },

        initTooltip: function() {
            $('a[data-toggle=tooltip]').tooltip();
        },

        initMasonry: function() {
            var $container = $('#grid-container');
            if ( $container.length > 0 ) {
                $container.masonry({
                  itemSelector: '.post-grid-wrap'
                });
            }
        },

        // initCustomJs: function() {
        //     $('.entry-content .col-md-9 .container, .container .container').removeClass('container');
        //     $('.row.no-spacing').parent().parent('.trivoo-row').addClass('np');
        //     $('.row.spacing').parent().parent('.trivoo-row').removeClass('np')
        // },

        // initStickyHeader: function() {
        //     if (!$('nav.main-menu:first').visible(true)) {
        //         if (menuOpen) {
        //             return;
        //         }
        //         menuOpen = true;
        //         $('#back-to-top').fadeIn();

        //         if ($('.fixed-header #sticky-header').length > 0 && !$('#sticky-header').hasClass('scrolled')) {
        //             var that = $('#sticky-header');
        //             var tp = $('#wpadminbar').length > 0 ? $('#wpadminbar').height() : -1;
        //             that.fadeOut(0, function() {
        //                 that.addClass('scrolled').css('top', tp - 42 + 'px');
        //                 menuTimeout = setTimeout(function() {
        //                     that.show().animate({
        //                         'top': tp
        //                     }, 300);
        //                 }, 1000);
        //             });
        //             $('ul#menu-trivoo>li>a').removeAttr('style');
        //         }
        //     } else if (menuOpen) {
        //         menuOpen = false;
        //         clearTimeout(menuTimeout);
        //         $('#back-to-top').fadeOut();

        //         if ($('.fixed-header #sticky-header').length > 0) {
        //             $('#sticky-header').stop().hide().removeClass('scrolled').removeAttr('style');
        //         }
        //     }
        // },

        displayMobileMenu: function() {
            // var h = 0,
            //     mob = false;
            // $('.main-header').removeClass('mobile');
            // $('.main-header:not(#sticky-header) .nav.navbar-nav>li').each(function() {
            //     if (h == 0) {
            //         h = $(this).offset().top;
            //     } else if (h != $(this).offset().top) {
            //         mob = true;
            //     }
            // });
            // if (mob) {
            //     $('.main-header').addClass('mobile');
            // }
        },


        // setHeaderPosition: function() {
        //     if ($(window).width() <= 768) {
        //         $('.main-header').css('top', 'auto');
        //     } else {
        //         $('.main-header').removeAttr('style');
        //     }
        // },

        // setMenuHeight: function(){
        //     var lh = $('.logo img').first().height(),
        //         menu = $('.main-menu .nav:not(#trivoo-sticky-menu)');

        //     if( lh > menu.height()){
        //         menu.css({'height': lh+'px', 'line-height': lh+'px'});
        //     }
        // }

    };

}(jQuery);

var PageBuilder = (function($) {

    return {

        initEvents : function() {

            $('.sl-slider-wrapper').each(function(){
                var $el = $(this),
                    options = $el.data(),
                    defaults = {
                        autoplay: true,
                        onBeforeChange : function( slide, pos ) {
                            $nav.removeClass( 'nav-dot-current' );
                            $nav.eq( pos ).addClass( 'nav-dot-current' );
                        }
                    },
                    cnt = $el.find('.sl-slide').length;
                $.extend( defaults, options );

                $el.append('<nav class="nav-dots">' + new Array(cnt + 1).join('<span></span>')+ '</nav>');

                var $nav = $el.find( '.nav-dots > span' );
                $nav.first().addClass('nav-dot-current');

                var slitslider = $el.slitslider( defaults ),
                $next = $el.find('.slit-nav-buttons .next'),
                $prev = $el.find('.slit-nav-buttons .prev');

                $nav.each( function( i ) {
                
                    $( this ).on( 'click', function( event ) {
                        
                        var $dot = $( this );
                        
                        if( !slitslider.isActive() ) {

                            $nav.removeClass( 'nav-dot-current' );
                            $dot.addClass( 'nav-dot-current' );
                        
                        }
                        
                        slitslider.jump( i + 1 );
                        return false;
                    
                    } );
                    
                } );

                $next.on('click', function( event ) {
                    slitslider.next();
                    return false;
                });

                $prev.on('click', function( event ) { 
                    slitslider.previous();
                    return false;
                });

            });

        }

    }

})(jQuery);


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
    PageBuilder.initEvents();
    trivoo.displayMobileMenu();
    // trivoo.initCarousel();
    // trivoo.initFitVids();
    trivoo.initColorbox();
    trivoo.initTooltip();
    // trivoo.initFlexSlider();
    trivoo.initBackToTop();
    trivoo.initMasonry();
    // trivoo.setHeaderPosition();
    trivoo.initFormPlaceHolder();
    // trivoo.initCustomJs();
});