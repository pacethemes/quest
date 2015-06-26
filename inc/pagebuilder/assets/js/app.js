window.partial = function (which, data) {
    var tmpl = jQuery('#' + which).html();
    return _.template(tmpl)(data);
};

window.generateOption = function (selected, value, name) {
    if (!name)
        name = value;
    return '<option value="' + value + '" ' + (value == selected ? 'selected' : '') + ' >' + name + '</option>';
};

var trPbApp = trPbApp || {};

(function ($, trPbApp) {
    'use strict';

    trPbApp.options = {
        sectionId: /(pt_pb_section__([0-9]+)_([0-9]+)__col__([0-9]+)__module__items__([0-9]+))|(pt_pb_section__([0-9]+)_([0-9]+)__col__([0-9]+)__module)|(pt_pb_section__([0-9]+)_([0-9]+)__col__([0-9]+))|(pt_pb_section__([0-9]+)_([0-9]+)__slider(__[0-9]+)?)|(pt_pb_section__([0-9]+)_([0-9]+)__gallery(__[0-9]+)?)|(pt_pb_section__([0-9]+)_([0-9]+))/ig
    };

    trPbApp.cache = {
        $container: $('#pt-pb-main-container'),
        $editorModal: $('#pt-pb-editor-modal'),
        $pageTemplate: $('#page_template'),
        $hiddenEditor: $('#pt-pb-editor-hidden'),
        editorHtml: ''
    };

    trPbApp.AddSection = function (model, ind, animate, clone) {
        var newSection = new trPbApp.SectionModel({}),
            ind = (ind || trPbApp.Sections.length),
            id = (model && model.attributes && model.attributes.id && !clone) ? model.attributes.id : 'pt_pb_section__' + (trPbApp.Sections.length + 1) + '_' + Math.round(new Date().valueOf() / 1000),
            el = trPbApp.cache.$container.find('.pt-pb-section:nth-child(' + ind + ')');

        if (model && model.attributes.content && model.attributes.content.length > 0) {
            var contentArr = new trPbApp.ColumnCollection(),
                colModels = (typeof model.attributes.content.models === 'undefined') ? model.attributes.content : model.attributes.content.toJSON();

            _.each(colModels, function (column, ind) {
                var colId = id + '__col__' + (ind + 1),
                    colModel = {
                        parent: id,
                        id: colId,
                        type: column['type']
                    };
                if (column['content'] !== undefined && (column['content'].length > 0 || column['content'].attributes !== undefined || column['content']['type'] !== undefined)) {

                    var content = (typeof column['content'].attributes === 'undefined') ? column['content'] : column['content'].toJSON(),
                        module = content['type'].toProperCase();
                    if (!trPbApp.Modules[module + 'Model']) return;

                    content['parent'] = colId;
                    content['id'] = colId + '__module';
                    colModel['content'] = new trPbApp.Modules[module + 'Model'](content);

                }
                contentArr.add(new trPbApp.ColumnModel(colModel));
            });

            newSection.set(model.attributes);
            newSection.set('content', contentArr);
        } else if (model && (model.attributes.slider)) {
            var sliderId = id + '__slider',
                slideArr = new trPbApp.SlideCollection(),
                slides = model.attributes.slider,
                slider = new trPbApp.SliderModel();

            slider.set('id', sliderId);

            _.each(slides, function (slide, ind) {
                if (typeof slide !== 'object') {
                    slider.set(ind, slide);
                } else {
                    var newSlide = new trPbApp.SlideModel();
                    newSlide.set(slide);
                    newSlide['parent'] = sliderId;
                    newSlide['id'] = sliderId + '__' + (slideArr.length + 1);
                    slideArr.add(newSlide);
                }
            });

            delete model.attributes['slider'];
            slider.set('slides', slideArr);

            newSection.set(model.attributes);
            newSection.set('content', slider);

        } else if (model && (model.attributes.images)) {
            var galleryId = id + '__gallery',
                imageArr = new trPbApp.GImageCollection(),
                images = model.attributes.images,
                gallery = new trPbApp.GalleryModel();

            gallery.set('id', galleryId);

            _.each(images, function (image, ind) {
                if (typeof image !== 'object') {
                    gallery.set(ind, image);
                } else {
                    var newImage = new trPbApp.GImageModel();
                    newImage.set(image);
                    newImage['parent'] = galleryId;
                    newImage['id'] = galleryId + '__' + (imageArr.length + 1);
                    imageArr.add(newImage);
                }
            });

            delete model.attributes['images'];
            gallery.set('images', imageArr);

            newSection.set(model.attributes);
            newSection.set('content', gallery);

        } else if (model) {
            newSection.set('attributes', model.attributes);
        }

        newSection.set('id', id);
        trPbApp.Sections.add(newSection, {
            at: ind
        });

        var sectionView = new trPbApp.SectionView({
                model: newSection
            }),
            $el = $(sectionView.render().el).hide();

        if (el.length === 0) {
            trPbApp.cache.$container.append($el);
        } else {
            el.after($el);
        }

        if (animate) {
            $el.stop().slideDown();
            trPbApp.scrollTo($el.offset().top - 50);
        } else {
            $el.show();
        }

    };

    trPbApp.generateSection = function (section, clone) {
        if (typeof section !== 'object')
            return;
        var newSection = {};
        newSection.attributes = section;
        newSection.attributes.content = section.col ? section.col : section.slider;
        if (section.col) {
            newSection.attributes.content = [];
            _.each(section.col, function (v, i) {
                var n = {};
                n.content = v.module;
                n.type = v.type;
                newSection.attributes.content.push(n);
            });
        } else if (section.slider) {
            newSection.attributes.slider = section.slider;
        } else if (section.gallery) {
            newSection.attributes.images = section.gallery;
        }
        if (clone) {
            trPbApp.AddSection(newSection, null, false, true);
        } else {
            trPbApp.AddSection(newSection);
        }
    };

    trPbApp.setHiddenInput = function (id, content, isText) {

        var name = (id.split('__').join('][') + ']').replace('pt_pb_section]', 'pt_pb_section'),
            sectionId = id.match(trPbApp.options.sectionId),
            input = isText ? $('textarea[name="' + name + '"]') : $('input[name="' + name + '"]');

        if (sectionId === null) return;

        sectionId = sectionId[0];

        if (input.length > 0) {
            input.val(content);
        } else if (isText) {
            $('<textarea />').attr({
                'name': name,
                'class': 'content-text hidden'
            }).html(content).appendTo($('#' + sectionId));
        } else {
            $('<input />').attr({
                'name': name,
                'type': 'hidden',
                'value': content
            }).appendTo($('#' + sectionId));
        }
    };


    trPbApp.setHiddenInputAll = function (model, el) {

        var id = model.get('id'),
            name = (id.split('__').join('][') + ']').replace('pt_pb_section]', 'pt_pb_section'),
            sectionId = id.match(trPbApp.options.sectionId),
            $section;

        if (sectionId === null || model.attributes === undefined) return;
        var text = (model.attributes.type === 'text') ? true : false;
        sectionId = sectionId[0];

        if (el && el.length && el.length > 0) {
            $section = el.attr('id') === sectionId ? el : el.find('#' + sectionId);
        } else {
            $section = $('#' + sectionId);
        }

        _.each(model.attributes, function (value, key) {
            if (typeof value !== 'string' || ['parent'].indexOf(key) > -1) return;

            var inputName = name + '[' + key + ']',
                input = (text || key === 'content') ? $section.find('textarea[name="' + inputName + '"]') : $section.find('input[name="' + inputName + '"]');

            if (input.length > 0) {
                input.val(value);
            } else if (text || key === 'content') {
                $('<textarea />').attr({
                    'name': inputName,
                    'class': 'content-text hidden'
                }).html(value).appendTo($section);
            } else {
                $('<input />').attr({
                    'name': inputName,
                    'type': 'hidden',
                    'value': value
                }).appendTo($section);
            }

        });

    };

    trPbApp.setSectionOrder = function (order) {
        $('[name="pt_pb_section[order]"]').val(order.join(",").replace(/pt_pb_section__/ig, ''));
    };

    trPbApp.setColumnContent = function (id, content) {

        var sections = trPbApp.Sections;
        var section = trPbApp.Sections.find(function (item) {
            return item.get('id') === id.replace(/__col__[0-9]+/, '');
        });

        if (!section || !section.get('content')) return;

        var columns = section.get('content');

        var column = columns.find(function (item) {
            return item.get('id') === id;
        });


        if (!column) return;

        column.set('content', content);
        columns.set(column, {
            remove: false
        });
        section.set('content', columns);
        sections.set(section, {
            remove: false
        });
        trPbApp.Sections = sections;

    };

    trPbApp.isVisualEditor = function () {
        return $('#wp-pt_pb_editor-wrap').hasClass('tmce-active');
    };

    trPbApp.getContent = function () {
        if (trPbApp.isVisualEditor()) {
            return tinyMCE.get('pt_pb_editor').getContent();
        }

        return $('#pt_pb_editor').val();
    };

    trPbApp.setContent = function (content) {
        if (trPbApp.isVisualEditor() && tinyMCE.get('pt_pb_editor') !== undefined) {
            tinyMCE.get('pt_pb_editor').setContent(content);
        } else {
            $('#pt_pb_editor').val(content);
        }
    };

    trPbApp.createEditor = function (el, text) {
        if (!el || el.length === 0) {
            return;
        }

        var $content = el.find('[name=content]');
        $content.after(trPbApp.cache.editorHtml);

        setTimeout(function () {
            if (typeof window.switchEditors !== 'undefined') {
                window.switchEditors.go('pt_pb_editor', trPbApp.getEditorMode());
            }

            window.wpActiveEditor = 'pt_pb_editor';

            trPbApp.setContent(text);

        }, 100);

    };

    trPbApp.removeEditor = function (textarea_id) {
        // $('#wp-pt_pb_editor-wrap').remove();
        if (typeof window.tinyMCE !== 'undefined') {
            window.tinyMCE.execCommand('mceRemoveEditor', false, textarea_id);

            if (typeof window.tinyMCE.get(textarea_id) !== 'undefined') {
                window.tinyMCE.remove('#' + textarea_id);
            }
        }
    };

    trPbApp.getEditorMode = function () {
        var mode = 'tinymce';

        if ('html' === getUserSetting('editor')) {
            mode = 'html';
        }

        return mode;
    };

    trPbApp.toggleTemplate = function (event) {
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

    trPbApp.animationPreview = function (e) {
        e.preventDefault();
        var $select = $(e.target),
            $preview = $select.siblings('.animation-preview');

        $preview.removeClass().addClass($select.val() + ' animated animation-preview').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass().addClass('animation-preview');
        });
    };

    trPbApp.scrollTo = function (top) {
        $('html, body').stop().animate({
            scrollTop: top
        }, 600);
    };

    trPbApp.Sections = new trPbApp.SectionCollection();

    trPbApp.Upload = {};

    trPbApp.Upload.AddFile = function (event) {

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
        frame.on('select', function () {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first();
            frame.close();
            $parent.find('.pt-pb-upload-field').val(attachment.attributes.url);
            $parent.find('.pt-pb-upload-field-id').val(attachment.attributes.id);
            if (attachment.attributes.type == 'image') {
                $parent.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '">').slideDown('fast');
            }
            $parent.find('.pt-pb-upload-button').hide();
            $parent.find('.pt-pb-remove-upload-button').show();
        });

        // Finally, open the modal.
        frame.open();
    };


    trPbApp.Upload.RemoveFile = function (selector) {
        selector.find('.pt-pb-upload-field').val('');
        selector.find('.screenshot').slideUp(200, function () {
            $(this).empty();
        });
        selector.find('.pt-pb-remove-upload-button').hide();
        selector.find('.pt-pb-upload-button').show();
    };

    trPbApp.Upload.BindEvents = function () {
        var that = this;

        $('.pt-pb-upload-field').each(function () {
            var el = $(this);
            if (el.val() !== '') {
                el.siblings('.pt-pb-upload-button').hide();
                el.siblings('.pt-pb-remove-upload-button').show();
                el.siblings('.screenshot').empty().append('<img src="' + el.val() + '">').show();
            } else {
                el.siblings('.pt-pb-upload-button').show();
                el.siblings('.pt-pb-remove-upload-button').hide();
            }
        });

        $('.pt-pb-remove-upload-button').on('click', function (event) {
            that.RemoveFile($(event.target).parent());
        });

        $('.pt-pb-upload-button').on('click', function (event) {
            that.AddFile(event);
        });
    };

    trPbApp.Icons = {};

    trPbApp.Icons.BindEvents = function () {
        $('.pt-pb-icon-select').each(function () {
            var $icon = $(this)
            var $preview = $icon.siblings('.icon-grid');
            if ($preview.find('section').length === 0) {
                $preview.html(window.ptIcons);
                $preview.find('.fa-hover a').on('click', function (e) {
                    e.preventDefault();
                    var $a = $(this),
                        $option = $a.closest('.pt-pb-option-container'),
                        icon = $a.attr('href').replace('#', '');

                    $option.children('.pt-pb-icon').val(icon);
                    $option.children('.icon-preview').html('<i class="fa fa-2x ' + icon + '"></i>');
                    $preview.stop().slideToggle();
                });
            }
            $icon.on('click', function () {
                $(this).siblings('.icon-grid').stop().slideToggle();
            })
        });
    }


})(jQuery, trPbApp);

jQuery(document).ready(function ($) {

    trPbApp.cache.editorHtml = trPbApp.cache.$hiddenEditor.html();
    trPbApp.cache.$hiddenEditor.remove();

    trPbApp.cache.$pageTemplate.on('change', trPbApp.toggleTemplate)
        .trigger('change');

    _.each(trPbAppSections, function (section, key) {
        trPbApp.generateSection(section);
    });

    jQuery(document).on('reveal:open', function () {
        trPbApp.Upload.BindEvents();
        trPbApp.Icons.BindEvents();
        $('.reveal-modal').find('.pt-pb-color').wpColorPicker();
    });

    trPbApp.cache.$editorModal.on('click', '.save-content', function (e) {
        e.preventDefault();
        var textAreaId = trPbApp.cache.$editorModal.attr('data-textarea'),
            content = trPbApp.getContent(),
            animation = trPbApp.cache.$editorModal.find('.js-animations').val(),
            admin_label = trPbApp.cache.$editorModal.find('input[name=admin_label]').val();
        jQuery('#' + textAreaId).trigger('content:update', {
            content: content,
            animation: animation,
            admin_label: admin_label
        });
        trPbApp.cache.$editorModal.trigger('reveal:close');
    });

    trPbApp.cache.$editorModal.on('click', '.close-model, .close-reveal-modal', function (e) {
        e.preventDefault();
        trPbApp.removeEditor('pt_pb_editor');
        trPbApp.cache.$editorModal.trigger('reveal:close');
    });

    $('.pt-pb-insert-section').on('click', function (e) {
        e.preventDefault();
        trPbApp.AddSection(null, null, true);
    });

    trPbApp.cache.$container.sortable({
        handle: '.pt-pb-header',
        forcePlaceholderSizeType: true,
        distance: 2,
        tolerance: 'pointer',
        items: '.pt-pb-section',
        cancel: '.pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-content',
        update: function (event, ui) {
            var updated = [];
            $(this).find('.pt-pb-section').each(function () {
                updated.push($(this).attr('id'));
            });

            trPbApp.Sections.models = _(trPbApp.Sections.models).sortBy(function (model) {
                return _.indexOf(updated, model.id);
            });

        }
    });

    trPbApp.cache.$container.on('click', '.pt-pb-module-toggle', function (e) {
        e.preventDefault();
        var content = $(this).closest('.module-controls').siblings('.content-preview, .slide-content-preview').slideToggle(300, function () {
            $(this).siblings('.module-controls').toggleClass('close');
        });
    });

    trPbApp.cache.$container.on('change', '.js-animations', trPbApp.animationPreview);
    trPbApp.cache.$editorModal.on('change', '.js-animations', trPbApp.animationPreview);

    trPbApp.ModulesList = {};
    _.each(trPbApp.Modules, function (val, ind) {
        if (ind.match(/Model/) !== null) {
            trPbApp.ModulesList[ind.replace('Model', '')] = new trPbApp.Modules[ind]().attributes;
        }
    });

});
