/*
 * jQuery Reveal Plugin 1.0
 * www.ZURB.com
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */


(function ($) {

    /*---------------------------
     Defaults for Reveal
     ----------------------------*/

    /*---------------------------
     Listener for data-reveal-id attributes
     ----------------------------*/

    // $('a[data-reveal-id]').live('click', function (e) {
    //     e.preventDefault();
    //     var modalLocation = $(this).attr('data-reveal-id');
    //     $('#' + modalLocation).reveal($(this).data());
    // });

    /*---------------------------
     Extend and Execute
     ----------------------------*/

    $.fn.reveal = function (options) {


        var defaults = {
            animation: 'fade', //fade, fadeAndPop, none
            animationspeed: 300, //how fast animtions are
            closeonbackgroundclick: true, //if you click background will modal close?
            dismissmodalclass: 'close-reveal-modal', //the class of a button or element that will close an open modal
            openImmediate: false
        };

        //Extend dem' options
        var options = $.extend({}, defaults, options);

        return this.each(function () {

            /*---------------------------
             Global Variables
             ----------------------------*/
            var modal = $(this),
                topMeasure = parseInt(modal.css('top')),
                topOffset = modal.height() + topMeasure,
                locked = false,
                modalBG = $('.reveal-modal-bg');

            /*---------------------------
             Create Modal BG
             ----------------------------*/
            if (modalBG.length == 0) {
                modalBG = $('<div class="reveal-modal-bg" />').appendTo($('body'));
            }

            if (modal.find('.close-reveal-modal').length == 0) {
                modal.append('<a class="close-reveal-modal">×</a>');
            }

            modal.find('.close-reveal-modal, .close-model').bind('click', function(e){
                e.preventDefault();
                modal.trigger('reveal:close');
            });

            /*---------------------------
             Open & Close Animations
             ----------------------------*/
            //Entrance Animations
            modal.bind('reveal:open', function () {
                $("body").css({
                    overflow: 'hidden'
                });
                modalBG.unbind('click.modalEvent');
                // $('.' + options.dismissmodalclass).unbind('click.modalEvent');
                if (!locked) {
                    lockModal();
                    if (options.animation == "fadeAndPop") {
                        modal.css({
                            'top': $(document).scrollTop() - topOffset,
                            'opacity': 0,
                            'visibility': 'visible',
                            'display': 'block'
                        });
                        modalBG.fadeIn(options.animationspeed / 2);
                        modal.delay(options.animationspeed / 2).animate({
                            "top": $(document).scrollTop() + topMeasure + 'px',
                            "bottom": $(document).scrollTop() + topMeasure + 'px',
                            "opacity": 1
                        }, options.animationspeed, unlockModal());
                    }
                    if (options.animation == "fade") {
                        modal.css({'opacity': 0, 'visibility': 'visible', 'display': 'block'});
                        modalBG.fadeIn(options.animationspeed / 2);
                        modal.delay(options.animationspeed / 2).animate({
                            "opacity": 1
                        }, options.animationspeed, unlockModal());
                    }
                    if (options.animation == "none") {
                        modal.css({'visibility': 'visible', 'display': 'block'});
                        modalBG.css({"display": "block"});
                        unlockModal()
                    }
                }
                // modal.unbind('reveal:open');
            });

            //Closing Animation
            modal.bind('reveal:close', function (e, data) {
                data = data || options;
                if (!locked) {
                    lockModal();
                    if (data.immediate || options.animation == "none") {
                        modal.css({'visibility': 'hidden', 'display': 'none'});
                        if (!data.openModalBg) {
                            modalBG.css({'display': 'none'});
                        }
                        unlockModal();
                        return;
                    }
                    if (options.animation == "fadeAndPop") {
                        if (!data.openModalBg) {
                            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                        }
                        modal.animate({
                            "top": $(document).scrollTop() - topOffset + 'px',
                            "opacity": 0
                        }, options.animationspeed / 2, function () {
                            modal.css({'top': topMeasure, 'opacity': 1, 'visibility': 'hidden', 'display': 'none'});
                            unlockModal();
                        });
                    }
                    if (options.animation == "fade") {
                        if (!data.openModalBg) {
                            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
                        }
                        modal.animate({
                            "opacity": 0
                        }, options.animationspeed, function () {
                            modal.css({'opacity': 1, 'visibility': 'hidden', 'display': 'none'});
                            unlockModal();
                        });
                    }
                }

                //remove tinyMCE editor whenever Reveal modal is closed
                if(!data.keepEditor && ptPbApp && ptPbApp.removeEditor && modal.find('.wp-editor-area').length > 0) {
                    ptPbApp.removeEditor();
                }
                // modal.unbind('reveal:close');
                
                $("body").css({
                    overflow: 'inherit'
                });
            });

            /*---------------------------
             Open and add Closing Listeners
             ----------------------------*/
            if(options.openImmediate) {
                //Open Modal Immediately
                modal.trigger('reveal:open');
            }

            //Close Modal Listeners
            // var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
            //     modal.trigger('reveal:close')
            // });

            if (options.closeonbackgroundclick) {
                modalBG.css({"cursor": "pointer"})
                modalBG.bind('click.modalEvent', function () {
                    modal.trigger('reveal:close')
                });
            }
            $('body').keyup(function (e) {
                if (e.which === 27) {
                    modal.trigger('reveal:close');
                } // 27 is the keycode for the Escape key
            });


            /*---------------------------
             Animations Locks
             ----------------------------*/
            function unlockModal() {
                locked = false;
            }

            function lockModal() {
                locked = true;
            }

        });//each call
    }//orbit plugin call
})(jQuery);
        
