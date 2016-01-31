/* global jQuery, _, tinyMCE, wp, getUserSetting, ptPbAppSections, ptPbAppSliders */

var ptPbApp = ptPbApp || {};

(function($, ptPbApp) {
    'use strict';

    ptPbApp.cache = {
        $container: $('#pt-pb-main-container'),
        $pageTemplate: $('#page_template'),
        $hiddenEditor: $('#pt-pb-editor-hidden'),
        editorHtml: '',
        sectionNum: 0,
        $html: $('html, body')
    };

    ptPbApp.AddSection = function(attr, animate) {
        var section = new ptPbApp.Models.Section(attr || {}),
            sectionView = new ptPbApp.Views.Section({
                model: section
            }).render().el;

        ptPbApp.Sections.add(section);
        ptPbApp.addAndAnimate($(sectionView), ptPbApp.cache.$container, animate);

        return section;
    };

    ptPbApp.addAndAnimate = function(el, addTo, animate, offset, after) {
        offset = offset || 100;
        if (after && !animate) {
            el.insertAfter(addTo);
        } else if (after) {
            ptPbApp.scrollTo(el.hide().insertAfter(addTo).slideDown().offset().top - offset);
        } else if (animate) {
            ptPbApp.scrollTo(el.hide().appendTo(addTo).slideDown().offset().top - offset);
        } else {
            addTo.append(el);
        }
    };

    ptPbApp.isVisualEditor = function() {
        return $('#wp-pt_pb_editor-wrap').hasClass('tmce-active');
    };

    ptPbApp.getContent = function() {
        if (ptPbApp.isVisualEditor()) {
            return tinyMCE.get('pt_pb_editor').getContent();
        }

        return $('#pt_pb_editor').val();
    };

    ptPbApp.setContent = function(content) {
        if (ptPbApp.isVisualEditor() && tinyMCE.get('pt_pb_editor') !== undefined) {
            tinyMCE.get('pt_pb_editor').setContent(content);
        } else {
            $('#pt_pb_editor').val(content);
        }
    };

    ptPbApp.createEditor = function(el) {
        if (!el || el.length === 0) {
            return;
        }

        el.after(ptPbApp.cache.editorHtml);

        setTimeout(function() {
            if (typeof window.switchEditors !== 'undefined') {
                window.switchEditors.go('pt_pb_editor', ptPbApp.getEditorMode());
            }

            window.wpActiveEditor = 'pt_pb_editor';

            ptPbApp.setContent(el.val());

        }, 100);
    };

    ptPbApp.removeEditor = function() {
        if (typeof window.tinyMCE !== 'undefined') {
            try {
                window.tinyMCE.execCommand('mceRemoveEditor', false, 'pt_pb_editor');
            } catch (e) {}

            if (typeof window.tinyMCE.get('pt_pb_editor') !== 'undefined') {
                window.tinyMCE.remove('#pt_pb_editor');
                $('#wp-pt_pb_editor-wrap').remove();
            }
        }
    };

    ptPbApp.getEditorMode = function() {
        var mode = 'tinymce';

        if ('html' === getUserSetting('editor')) {
            mode = 'html';
        }

        return mode;
    };

    ptPbApp.toggleTemplate = function(event) {
        event.preventDefault();
        var val = $(event.target).val();

        if (val === 'page-builder.php') {
            $('#postdivrich, #postimagediv').hide();
            $('#pt-pb-layout').show();
        } else {
            $('#pt-pb-layout').hide();
            $('#postdivrich, #postimagediv').show();
        }
    };

    ptPbApp.scrollTo = function(top) {
        ptPbApp.cache.$html.stop().animate({
            scrollTop: top
        }, 600);
    };

    ptPbApp.isMetaSliderActive = function() {
        return ptPbAppSliders && ptPbAppSliders.meta && parseInt(ptPbAppSliders.meta.exists) === 1;
    };

    ptPbApp.Upload = {};

    ptPbApp.Upload.AddFile = function(event) {

        var frame,
            $el = $(event.target),
            $parent = $el.parent();

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (frame) {
            frame.open();
            return;
        }

        // Create the media frame.
        frame = wp.media({
            // Set the title of the modal.
            title: $el.data('choose'),

            // Customize the submit button.
            button: {
                // Set the text of the button.
                text: $el.data('update'),
                // Tell the button not to close the modal, since we're
                // going to refresh the page when the image is selected.
                close: false
            }
        });

        // When an image is selected, run a callback.
        frame.on('select', function() {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first();
            frame.close();
            $parent.find('.pt-pb-upload-field').val(attachment.attributes.url);
            $parent.find('.pt-pb-upload-field-id').val(attachment.attributes.id);
            if (attachment.attributes.type === 'image') {
                $parent.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '">').slideDown('fast');
            }
            $parent.find('.pt-pb-upload-button').hide();
            $parent.find('.pt-pb-remove-upload-button').show();
        });

        // Finally, open the modal.
        frame.open();
    };

    ptPbApp.Upload.RemoveFile = function(selector) {
        selector.find('.pt-pb-upload-field').val('');
        selector.find('.screenshot').slideUp(200, function() {
            $(this).empty();
        });
        selector.find('.pt-pb-remove-upload-button').hide();
        selector.find('.pt-pb-upload-button').show();
    };

    ptPbApp.tour = null;
    ptPbApp.validTour = true;

    ptPbApp.startPBTour = function() {

        if (ptPbApp.Sections && ptPbApp.Sections.length > 0) {
            var firstLeg = $('#pt-pb-tour li:first-child');
            firstLeg.find('.content').html($('#tour-pb-not-empty').html());
            firstLeg.find('.buttons a').hide();
            firstLeg.find('.buttons .endtour').show();
            ptPbApp.validTour = false;
        }

        ptPbApp.pbTourStarted = true;

        if (ptPbApp.tour !== null) {
            ptPbApp.tour.trigger('depart.tourbus');
            return;
        }

        var tour = $('#pt-pb-tour').tourbus({
            autoDepart: true,
            onLegStart: function(leg, bus) {
                // auto-progress where required
                if (leg.rawData.autoProgress) {
                    var currentIndex = leg.index;
                    setTimeout(
                        function() {
                            if (bus.currentLegIndex !== currentIndex) {
                                return;
                            }
                            bus.next();
                        },
                        leg.rawData.autoProgress
                    );
                }

                // highlight where required
                if (leg.rawData.highlight) {
                    leg.$target.addClass('intro-tour-highlight');
                    if (leg.$target.is('a')) {
                        leg.$target.on('click', function() {
                            if (ptPbApp.pbTourStarted) {
                                setTimeout(function() {
                                    tour.trigger('next.tourbus');
                                }, 700);
                            }
                        });
                    } else if (leg.$target.is('select')) {
                        leg.$target.on('change', function() {
                            var pb = $('#pt-pb-layout:visible');

                            function focusPB() {
                                if (pb.length > 0) {
                                    tour.trigger('next.tourbus');
                                } else {
                                    setTimeout(focusPB, 200);
                                }
                            }
                            setTimeout(focusPB, 200);
                        });
                    } else if (leg.$target.hasClass('pt-pb-column')) {
                        leg.$target.find('.pt-pb-insert-module').on('click', function() {
                            if (ptPbApp.pbTourStarted) {
                                setTimeout(function() {
                                    tour.trigger('next.tourbus');
                                }, 700);
                            }
                        });
                    }
                    $('.intro-tour-overlay').show();
                }

                // fade/slide in first leg
                if (leg.index === 0) {
                    leg.$el
                        .css({
                            visibility: 'visible',
                            opacity: 0,
                            top: leg.options.top / 2
                        })
                        .animate({
                                top: leg.options.top,
                                opacity: 1.0
                            }, 500,
                            function() {
                                leg.show();
                            });
                    return false;
                }
            },
            onLegEnd: function(leg) {
                // remove highlight when leaving this leg
                if (leg.rawData.highlight) {
                    leg.$target.removeClass('intro-tour-highlight');
                    $('.intro-tour-overlay').hide();
                }

            }
        }).on('stop.tourbus', function() {
            ptPbApp.pbTourStarted = false;
        });

        ptPbApp.tour = tour;

        if (!ptPbApp.validTour){
            return;
        }

        ptPbApp.cache.$pageTemplate.val('default').trigger('change');

        $('body').on('click', '.tour-close-reveal', function() {
                if (ptPbApp.pbTourStarted) {
                    $('.reveal-modal:visible').trigger('reveal:close');
                }
            }).on('click', '.tour-select-layout', function() {
                $('.column-layouts li:nth-child(3)').trigger('click');
                var row = $('.pt-pb-section:first-child .pt-pb-row:first-child');

                function focusFirstRow() {
                    if (row.length > 0) {
                        tour.trigger('next.tourbus');
                    } else {
                        setTimeout(focusFirstRow, 200);
                    }
                }
                setTimeout(focusFirstRow, 200);
            })
            .on('click', '.tour-select-module', function() {
                $('.column-module:first-child').trigger('click');
                var module = $('.pt-pb-image-edit');

                function focusFirstModule() {
                    if (module.length > 0) {
                        tour.trigger('next.tourbus');
                    } else {
                        setTimeout(focusFirstModule, 200);
                    }
                }
                setTimeout(focusFirstModule, 200);
            })
            .on('click', '.tour-close-module', function() {
                var module = $('.pt-pb-section:first-child .pt-pb-row:first-child  .pt-pb-column:first-child');

                function focusFirstModule() {
                    if (module.length > 0) {
                        $('.reveal-modal:visible').trigger('reveal:close');
                        tour.trigger('next.tourbus');
                    } else {
                        setTimeout(focusFirstModule, 200);
                    }
                }
                setTimeout(focusFirstModule, 200);
            }).on('click', '.tourbus-end', function() {
                tour.trigger('stop.tourbus');
            });
    };

    ptPbApp.Sections = new ptPbApp.Collections.Section();


})(jQuery, ptPbApp);

jQuery(document).ready(function($) {

    ptPbApp.cache.editorHtml = ptPbApp.cache.$hiddenEditor.html();
    ptPbApp.cache.$hiddenEditor.remove();

    ptPbApp.cache.$pageTemplate.on('change', ptPbApp.toggleTemplate)
        .trigger('change');


    ptPbApp.cache.$container.sortable({
        handle: '.pt-pb-header',
        forcePlaceholderSizeType: true,
        distance: 2,
        tolerance: 'pointer',
        items: '.pt-pb-section',
        cancel: '.pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-content',
        update: function() {
            var updated = [];
            $(this).find('.pt-pb-section').each(function() {
                updated.push($(this).attr('id'));
            });

            ptPbApp.Sections.models = _(ptPbApp.Sections.models).sortBy(function(model) {
                return _.indexOf(updated, model.id);
            });
        }
    });

    ptPbApp.cache.$container.on('click', '.pt-pb-module-toggle', function(e) {
        e.preventDefault();
        $(this).closest('.module-controls').siblings('.content-preview, .slide-content-preview').slideToggle(300, function() {
            $(this).siblings('.module-controls').toggleClass('close');
        });
    });

    var tourLink = $('<div id="start-pt-pb-tour" class="screen-meta-toggle"><a href="#">Page Builder Tour</a></div>')
        .click(function(e) {
            e.preventDefault();
            ptPbApp.startPBTour();
        });

    $('#screen-meta-links').append(tourLink);

    $('.pt-pb-insert-section').on('click', function(e) {
        e.preventDefault();
        ptPbApp.AddSection(null, true);
    });

    _.each(ptPbAppSections, function(section) {
        ptPbApp.AddSection(section);
    });

    
    $('#pt_pb_loader').slideUp();

});
