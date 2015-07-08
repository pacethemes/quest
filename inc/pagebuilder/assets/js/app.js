window.partial = function (which, data) {
    var tmpl = jQuery('#' + which).html();
    return _.template(tmpl)(data);
};

window.generateOption = function (selected, value, name) {
    if (!name)
        name = value;
    return '<option value="' + value + '" ' + (value == selected ? 'selected' : '') + ' >' + name + '</option>';
};

var ptPbApp = ptPbApp || {};

(function ($, ptPbApp) {
    'use strict';

    ptPbApp.options = {
        sectionId: /(pt_pb_section__([0-9]+)_([0-9]+)__row__([0-9]+)__col__([0-9]+)__module__items__([0-9]+))|(pt_pb_section__([0-9]+)_([0-9]+)__row__([0-9]+)__col__([0-9]+)__module)|(pt_pb_section__([0-9]+)_([0-9]+)__row__([0-9]+)__col__([0-9]+))|(pt_pb_section__([0-9]+)_([0-9]+)__row__([0-9]+)__slider(__[0-9]+)?)|(pt_pb_section__([0-9]+)_([0-9]+)__row__([0-9]+)__gallery(__[0-9]+)?)|(pt_pb_section__([0-9]+)_([0-9]+))/ig
    };

    ptPbApp.cache = {
        $container: $('#pt-pb-main-container'),
        $pageTemplate: $('#page_template'),
        $hiddenEditor: $('#pt-pb-editor-hidden'),
        editorHtml: ''
    };

    ptPbApp.AddSection = function (model, ind, animate, clone) {
        var newSection = new ptPbApp.SectionModel({}),
            ind = (ind || ptPbApp.Sections.length),
            id = (model && model.attributes && model.attributes.id && !clone) ? model.attributes.id : 'pt_pb_section__' + (ptPbApp.Sections.length + 1) + '_' + Math.round(new Date().valueOf() / 1000),
            el = ptPbApp.cache.$container.find('.pt-pb-section:nth-child(' + ind + ')');

        if (model && model.attributes) {
            newSection.set(model.attributes);
        }

        if (model && model.attributes && model.attributes.hasRows && model.attributes.content.length) {
            var rows = new ptPbApp.RowCollection(),
                rowArr = (typeof model.attributes.content.models === 'undefined') ? model.attributes.content : model.attributes.content.toJSON();

            _.each(rowArr, function (row, i) {
                rows.add(ptPbApp.AddRow(row, i, id));
            });

            newSection.set('content', rows);

        }

        newSection.set('id', id);
        ptPbApp.Sections.add(newSection, {
            at: ind
        });

        var sectionView = new ptPbApp.SectionView({
                model: newSection
            }),
            $el = $(sectionView.render().el).hide();

        if (el.length === 0) {
            ptPbApp.cache.$container.append($el);
        } else {
            el.after($el);
        }

        if (animate) {
            $el.stop().slideDown();
            ptPbApp.scrollTo($el.offset().top - 50);
        } else {
            $el.show();
        }

    };

    ptPbApp.AddRow = function (row, i, id) {

        var rowType = row.type || ptPbApp.getRowType(row),
            rowId = id + '__row__' + (i + 1),
            newRow = new ptPbApp.RowModel({
                id: rowId,
                parent: id,
                type: rowType
            });

        if (rowType === 'slider') {

            var sliderId = rowId + '__slider',
                slideArr = new ptPbApp.SlideCollection(),
                slides = row.content.attributes.slides.models ? row.content.attributes.slides.toJSON() : row.content.attributes.slides,
                slider = new ptPbApp.SliderModel();

            slider.set(row.content.attributes);

            _.each(slides, function (slide, ind) {
                if (typeof slide !== 'object') {
                    slider.set(ind, slide);
                } else {
                    var newSlide = new ptPbApp.SlideModel();
                    newSlide.set(slide);
                    newSlide['parent'] = sliderId;
                    newSlide['id'] = sliderId + '__' + (slideArr.length + 1);
                    slideArr.add(newSlide);
                }
            });

            slider.set('slides', slideArr);
            slider.set('id', sliderId);

            newRow.set('content', slider);

        } else if (rowType === 'gallery') {

            var galleryId = rowId + '__gallery',
                imageArr = new ptPbApp.GImageCollection(),
                images = row.content.attributes.images.models ? row.content.attributes.images.toJSON() : row.content.attributes.images,
                gallery = new ptPbApp.GalleryModel();

            gallery.set(row.content.attributes);

            _.each(images, function (image, ind) {
                if (typeof image !== 'object') {
                    gallery.set(ind, image);
                } else {
                    var newImage = new ptPbApp.GImageModel();
                    newImage.set(image);
                    newImage['parent'] = galleryId;
                    newImage['id'] = galleryId + '__' + (imageArr.length + 1);
                    imageArr.add(newImage);
                }
            });

            gallery.set('images', imageArr);
            gallery.set('id', galleryId);

            newRow.set('content', gallery);

        } else if (rowType === 'columns') {

            var contentArr = new ptPbApp.ColumnCollection(),
                colModels = row.content ? ((typeof row.content.models === 'undefined') ? row.content : row.content.toJSON()) : row.attributes.content.toJSON();

            _.each(colModels, function (column, ind) {
                var colId = rowId + '__col__' + (ind + 1),
                    colModel = {
                        parent: rowId,
                        id: colId,
                        type: column['type']
                    };
                if (column['content'] !== undefined && (column['content'].length > 0 || column['content'].attributes !== undefined || column['content']['type'] !== undefined)) {

                    var content = (typeof column['content'].attributes === 'undefined') ? column['content'] : column['content'].toJSON(),
                        module = content['type'].toProperCase();
                    if (!ptPbApp.Modules[module + 'Model']) return;

                    content['parent'] = colId;
                    content['id'] = colId + '__module';
                    colModel['content'] = new ptPbApp.Modules[module + 'Model'](content);

                }
                contentArr.add(new ptPbApp.ColumnModel(colModel));
            });

            newRow.set('content', contentArr);

        }
        return newRow;


    };

    ptPbApp.getRowType = function (row) {
        if (typeof row.col !== 'undefined')
            return 'columns';
        else if (typeof row.slider !== 'undefined')
            return 'slider';
        else if (typeof row.gallery !== 'undefined')
            return 'gallery';

        return 'columns';
    };

    ptPbApp.generateSection = function (section, clone) {
        if (typeof section !== 'object')
            return;
        var newSection = {};
        newSection.attributes = section;

        if (!section.row) {
            var rowType = ptPbApp.getRowType(section);
            if (rowType === 'slider') {
                section.row = {
                    1: {
                        slider: section.slider
                    }
                }
                delete section.slider;
            } else if (rowType === 'gallery') {
                section.row = {
                    1: {
                        gallery: section.gallery
                    }
                }
            } else if (rowType === 'columns') {
                section.row = {
                    1: {
                        col: section.col
                    }
                }
            }

        }


        newSection.attributes.hasRows = true;
        var rows = [];
        _.each(section.row, function (r, k) {
            var rowType = ptPbApp.getRowType(r),
                row = {
                    content: {
                        attributes: {}
                    },
                    type: rowType
                };

            if (rowType === 'slider') {
                row.content.attributes.slides = [];
                _.each(r.slider, function (s, i) {
                    if (isNaN(i))
                        row.content.attributes[i] = s;
                    else
                        row.content.attributes.slides.push(s)
                });
            } else if (rowType === 'gallery') {
                row.content.attributes.images = [];
                _.each(r.gallery, function (s, i) {
                    if (isNaN(i))
                        row.content.attributes[i] = s;
                    else
                        row.content.attributes.images.push(s)
                });
            } else if (rowType === 'columns') {
                row.content = [];
                _.each(r.col, function (v, i) {
                    var n = {};
                    n.content = v.module;
                    n.type = v.type;
                    n.id = v.id;
                    row.content.push(n);
                });
            }
            rows.push(row);
        });
        newSection.attributes.content = rows;

        if (clone) {
            ptPbApp.AddSection(newSection, null, false, true);
        } else {
            ptPbApp.AddSection(newSection);
        }
    };

    ptPbApp.setHiddenInput = function (id, content, isText) {

        var name = (id.split('__').join('][') + ']').replace('pt_pb_section]', 'pt_pb_section'),
            sectionId = id.match(ptPbApp.options.sectionId),
            input = isText ? $('textarea[name="' + name + '"]') : $('input[name="' + name + '"]');

        if (sectionId === null) return;

        sectionId = sectionId[0];

        if (input.length > 0) {
            input.val(content);
        } else {
            $('<input />').attr({
                'name': name,
                'type': 'hidden',
                'value': content
            }).appendTo($('#' + sectionId));
        }
    };


    ptPbApp.setHiddenInputAll = function (model, el) {

        var id = model.get('id'),
            name = (id.split('__').join('][') + ']').replace('pt_pb_section]', 'pt_pb_section'),
            sectionId = id.match(ptPbApp.options.sectionId),
            $section;

        if (sectionId === null || model.attributes === undefined) return;

        sectionId = sectionId[0];

        if (el && el.length && el.length > 0) {
            $section = el.attr('id') === sectionId ? el : el.find('#' + sectionId);
        } else {
            $section = $('#' + sectionId);
        }

        _.each(model.attributes, function (value, key) {
            if (typeof value !== 'string' || ['parent'].indexOf(key) > -1) return;

            var inputName = name + '[' + key + ']',
                input = (key === 'content') ? $section.find('textarea[name="' + inputName + '"]') : $section.find('input[name="' + inputName + '"]');

            if (input.length > 0) {
                input.val(value);
            } else {
                $('<input />').attr({
                    'name': inputName,
                    'type': 'hidden',
                    'value': value
                }).appendTo($section);
            }

        });

    };

    ptPbApp.setSectionOrder = function (order) {
        $('[name="pt_pb_section[order]"]').val(order.join(",").replace(/pt_pb_section__/ig, ''));
    };

    ptPbApp.setColumnContent = function (id, content) {

        var sections = ptPbApp.Sections;
        var section = ptPbApp.Sections.find(function (item) {
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
        ptPbApp.Sections = sections;

    };

    ptPbApp.isVisualEditor = function () {
        return $('#wp-pt_pb_editor-wrap').hasClass('tmce-active');
    };

    ptPbApp.getContent = function () {
        if (ptPbApp.isVisualEditor()) {
            return tinyMCE.get('pt_pb_editor').getContent();
        }

        return $('#pt_pb_editor').val();
    };

    ptPbApp.setContent = function (content) {
        if (ptPbApp.isVisualEditor() && tinyMCE.get('pt_pb_editor') !== undefined) {
            tinyMCE.get('pt_pb_editor').setContent(content);
        } else {
            $('#pt_pb_editor').val(content);
        }
    };

    ptPbApp.createEditor = function (el, text) {
        if (!el || el.length === 0) {
            return;
        }

        var $content = el.find('[name=content]');
        $content.after(ptPbApp.cache.editorHtml);

        setTimeout(function () {
            if (typeof window.switchEditors !== 'undefined') {
                window.switchEditors.go('pt_pb_editor', ptPbApp.getEditorMode());
            }

            window.wpActiveEditor = 'pt_pb_editor';

            ptPbApp.setContent(text);

        }, 100);

    };

    ptPbApp.removeEditor = function (textarea_id) {
        if (typeof window.tinyMCE !== 'undefined') {
            window.tinyMCE.execCommand('mceRemoveEditor', false, textarea_id);

            if (typeof window.tinyMCE.get(textarea_id) !== 'undefined') {
                window.tinyMCE.remove('#' + textarea_id);
            }
        }
    };

    ptPbApp.getEditorMode = function () {
        var mode = 'tinymce';

        if ('html' === getUserSetting('editor')) {
            mode = 'html';
        }

        return mode;
    };

    ptPbApp.toggleTemplate = function (event) {
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

    ptPbApp.animationPreview = function (e) {
        e.preventDefault();
        var $select = $(e.target),
            $preview = $select.siblings('.animation-preview');

        $preview.removeClass().addClass($select.val() + ' animated animation-preview').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass().addClass('animation-preview');
        });
    };

    ptPbApp.scrollTo = function (top) {
        $('html, body').stop().animate({
            scrollTop: top
        }, 600);
    };

    ptPbApp.Sections = new ptPbApp.SectionCollection();

    ptPbApp.Upload = {};

    ptPbApp.Upload.AddFile = function (event) {

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


    ptPbApp.Upload.RemoveFile = function (selector) {
        selector.find('.pt-pb-upload-field').val('');
        selector.find('.screenshot').slideUp(200, function () {
            $(this).empty();
        });
        selector.find('.pt-pb-remove-upload-button').hide();
        selector.find('.pt-pb-upload-button').show();
    };

    ptPbApp.Upload.BindEvents = function () {
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

    ptPbApp.Icons = {};

    ptPbApp.Icons.BindEvents = function () {
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


})(jQuery, ptPbApp);

jQuery(document).ready(function ($) {

    ptPbApp.cache.editorHtml = ptPbApp.cache.$hiddenEditor.html();
    ptPbApp.cache.$hiddenEditor.remove();

    ptPbApp.cache.$pageTemplate.on('change', ptPbApp.toggleTemplate)
        .trigger('change');

    _.each(ptPbAppSections, function (section, key) {
        ptPbApp.generateSection(section);
    });

    jQuery(document).on('reveal:open', function () {
        ptPbApp.Upload.BindEvents();
        ptPbApp.Icons.BindEvents();
        $('.reveal-modal').find('.pt-pb-color').wpColorPicker();
    });

    $('.pt-pb-insert-section').on('click', function (e) {
        e.preventDefault();
        ptPbApp.AddSection(null, null, true);
    });

    ptPbApp.cache.$container.sortable({
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

            ptPbApp.Sections.models = _(ptPbApp.Sections.models).sortBy(function (model) {
                return _.indexOf(updated, model.id);
            });

        }
    });

    ptPbApp.cache.$container.on('click', '.pt-pb-module-toggle', function (e) {
        e.preventDefault();
        var content = $(this).closest('.module-controls').siblings('.content-preview, .slide-content-preview').slideToggle(300, function () {
            $(this).siblings('.module-controls').toggleClass('close');
        });
    });

    ptPbApp.cache.$container.on('change', '.js-animations', ptPbApp.animationPreview);

    ptPbApp.ModulesList = {};
    _.each(ptPbApp.Modules, function (val, ind) {
        if (ind.match(/Model/) !== null) {
            ptPbApp.ModulesList[ind.replace('Model', '')] = new ptPbApp.Modules[ind]().attributes;
        }
    });

    $('#pt_pb_loader').slideUp();

});
