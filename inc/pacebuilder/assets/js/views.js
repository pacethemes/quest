/*jshint unused:false*/
/* global Backbone, jQuery, _, console, ptPbAppLocalization, ptPbAppSliders */

var ptPbApp = ptPbApp || {};
ptPbApp.Views = ptPbApp.Views || {};

(function(window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.Views.Section = Backbone.View.extend({
        template: ptPbApp.template('section'),
        className: 'pt-pb-section grid',
        id: function() {
            return this.model.get('id');
        },
        $content: null,
        $reveal: null,
        $formElms: null,
        $insertColumns: null,

        events: {
            'click .pt-pb-section-toggle': 'toggleSection',
            'click .pt-pb-settings-section': 'editSection',
            'click .pt-pb-clone-section': 'cloneSection',
            'click .pt-pb-remove': 'removeSection',
            'click .save-section': 'saveSection',
            'click .pt-pb-insert-slider': 'insertSlider',
            'click .pt-pb-insert-generic-slider': 'insertGenericSlider',
            'click .pt-pb-insert-gallery': 'insertGallery',
            'click .pt-pb-insert-column': 'insertColumnsDialog',
            'click .insert .column-layouts li': 'insertColumns',
            'click .columns .pt-pb-settings-columns': 'insertColumnsDialog',
            'click .update .column-layouts li': 'updateColumns',
            'pt-pb-clone-row': 'cloneRow',
            'ptpb:rowMovedSection': 'moveRow'
        },

        initialize: function(options) {
            this.model.on('remove', this.remove, this);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$content = this.$('.pt-pb-content');
            this.$reveal = this.$('.pt-pb-section-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$insertColumns = this.$('.pt-pb-insert-columns').revealBind();


            this.renderRows()
                .makeRowsSortable();

            return this;
        },

        renderRows: function() {
            this.model.get('rows').each(this.renderRow, this);
            return this;
        },

        renderRow: function(row, el, animate) {
            var after = el && el.length,
                addTo = after ? $(el) : this.$content;
            var v = $(new ptPbApp.Views.Row({
                model: row
            }).render().el);
            animate = animate === false ? false : true;
            ptPbApp.addAndAnimate(v, addTo, animate, 100, after);
        },

        editSection: function(e) {
            e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        cloneSection: function(e) {
            e.preventDefault();
            ptPbApp.AddSection(_.extend({}, this.model.toJSON({
                rows: true
            }), {
                id: null
            }), true);
        },

        saveSection: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$el.find('.pt-pb-section-label').text(this.model.get('admin_label'));
            this.closeReveal();
        },

        removeSection: function(e, confirm) {
            if (e) { e.preventDefault(); }
            if (confirm || window.confirm(ptPbAppLocalization.remove_section)) {
                this.model.trigger('destroy', this.model);
            }
        },

        toggleSection: function(e) {
            e.preventDefault();

            var $this = $(e.target),
                $head = $this.closest('.pt-pb-header'),
                $body = $head.siblings('.pt-pb-content-wrap');

            if ($body.css('display') === undefined || $body.css('display') === 'block') {
                $body.slideUp(400, function() {
                    $head.addClass('close');
                });
            } else {
                $body.slideDown(400, function() {
                    $head.removeClass('close');
                });
            }
        },

        insertColumnsDialog: function(e) {
            e.preventDefault();
            var cssClass = e.target.className.match(/fa-|edit-columns/) !== null ? 'update' : 'insert',
                rowId = cssClass === 'update' ? $(e.target).closest('.pt-pb-row').attr('id') : '';
            this.$insertColumns.data('rowId', rowId).removeClass('update insert').addClass(cssClass).trigger('reveal:open');
        },

        insertColumns: function(e) {
            var $target = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li'),
                columns = $target.data('layout').replace(/ /g, '').split(',');

            this.renderRow(
                this.model.addRow({
                    'type': 'columns',
                    'columns': columns
                })
            );
            this.$insertColumns.trigger('reveal:close');
        },

        insertSlider: function(e) {
            e.preventDefault();
            this.renderRow(
                this.model.addRow({
                    'type': 'slider',
                    'slider': {}
                })
            );
        },

        insertGallery: function(e) {
            e.preventDefault();
            this.renderRow(
                this.model.addRow({
                    'type': 'gallery',
                    'gallery': {}
                })
            );
        },

        insertGenericSlider: function(e) {
            e.preventDefault();
            var slType = $(e.target).attr('data-gen-slider');
            this.renderRow(
                this.model.addRow({
                    'type': 'generic-slider',
                    'generic_slider': {
                        type: slType
                    }
                })
            );
        },

        updateColumns: function(e) {
            var $e = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li');
            $('#' + this.$insertColumns.data('rowId')).trigger('update-columns', $e.data('layout'));
            this.$insertColumns.trigger('reveal:close');
        },

        cloneRow: function(e, row) {
            e.preventDefault();
            this.renderRow(this.model.addRow(row), $(e.target));
        },

        moveRow: function(e, attr, el) {
            this.renderRow(this.model.addRow(attr), el, false);
            el.trigger('ptpb:rowRemove', true);
        },

        makeRowsSortable: function() {
            var view = this;
            this.$content.sortable({
                handle: '.pt-pb-row-header',
                forcePlaceholderSizeType: true,
                placeholder: 'sortable-placeholder-pt-pb-row',
                distance: 2,
                tolerance: 'pointer',
                items: '.pt-pb-row',
                connectWith: '.pt-pb-content',
                axis: 'y',
                // cancel: '.pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-row-content',
                start: function(e, ui) {
                    ui.placeholder.css('height', ui.item.height() + 'px');
                },
                update: function(event, ui) {
                    if (this === ui.item.parent()[0] && ui.sender !== null) {
                        ui.item.trigger('ptpb:rowmoved', ui.sender.closest('.pt-pb-section'));
                    }
                    view.sortRows();
                }
            });
        },

        sortRows: function() {
            var order = this.$('.pt-pb-row').map(function() {
                    return $(this).attr('id');
                }).get(),
                rows = this.model.get('rows');
            rows.models = _.sortBy(rows.models, function(row) {
                return order.indexOf(row.get('id'));
            });
            this.model.set('rows', rows);
        },

        closeReveal: function() {
            this.$reveal.trigger('reveal:close');
        }

    });

    ptPbApp.Views.Row = Backbone.View.extend({
        template: ptPbApp.template('row'),
        className: 'pt-pb-row clearfix',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .pt-pb-remove-row': 'removeRow',
            'click .pt-pb-settings-row': 'editRow',
            'click .save-row': 'saveRow',
            'click .pt-pb-settings-slider': 'editSlider',
            'click .pt-pb-settings-generic-slider': 'editGenericSlider',
            'click .gallery .pt-pb-settings-gallery': 'editGallery',
            'click .pt-pb-row-toggle': 'toggleRow',
            'update-columns': 'updateColumns',
            'click .pt-pb-clone-row': 'cloneRow',
            'ptpb:rowmoved': 'moveRow',
            'ptpb:rowRemove': 'removeRow'
        },

        initialize: function(options) {
            this.model.on('remove', this.remove, this)
                .on('change:admin_label', this.adminLabel, this)
                .on('content-import', this.render, this);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$content = this.$('.pt-pb-row-content');
            this.$reveal = this.$el.find('.pt-pb-row-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');

            this.renderContent()
                .makeColumnsSortable();

            return this;
        },

        renderContent: function() {
            var content = this.model.get('content');
            //if content is a backbone collection then the row contains columns, else it contains a slider or gallery
            if (this.model.isColumns()) {
                content.each(this.renderColumn, this);
            } else if (this.model.isSlider()) {
                this.renderSlider(content);
            } else if (this.model.isGenericSlider()) {
                this.renderGenericSlider(content);
            } else if (this.model.isGallery()) {
                this.renderGallery(content);
            }
            return this;
        },

        renderColumn: function(column) {
            this.$content.append(new ptPbApp.Views.Column({
                model: column
            }).render().el);
        },

        renderSlider: function(slider) {
            this.$content.append(new ptPbApp.Views.Slider({
                model: slider
            }).render().el);
        },

        renderGenericSlider: function(slider) {
            var sliderType = slider.get('type').toLowerCase();
            this.$content.append(new ptPbApp.Views.GenericSlider({
                model: slider
            }).render().el);
            if (sliderType in ptPbAppSliders && ptPbAppSliders[sliderType].icon) {
                this.$el.find('.pt-pb-row-header .pt-pb-settings-generic-slider').html(ptPbAppSliders[sliderType].icon);
                this.$('.slider-options').append(ptPbApp.htmlTemplate( ptPbAppSliders[sliderType].sliders)( {slider_id: slider.get('slider_id')} ));
            }
        },

        renderGallery: function(gallery) {
            this.$content.append(new ptPbApp.Views.Gallery({
                model: gallery
            }).render().el);
        },

        adminLabel: function(model, value) {
            this.$('.pt-pb-row-label').text(value);
        },

        toggleRow: function(e) {
            e.preventDefault();

            var $this = $(e.target),
                $head = $this.closest('.pt-pb-row-header'),
                $body = $head.siblings('.pt-pb-row-content');

            if ($body.css('display') === undefined || $body.css('display') === 'block') {
                $body.slideUp(400, function() {
                    $head.addClass('close');
                });
            } else {
                $body.slideDown(400, function() {
                    $head.removeClass('close');
                });
            }
        },

        removeRow: function(e, confirm) {
            if (e) { e.preventDefault(); }
            if (confirm || window.confirm(ptPbAppLocalization.remove_row)) {
                this.model.trigger('destroy', this.model);
            }
        },

        editRow: function(e) {
            e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        saveRow: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        cloneRow: function(e) {
            e.preventDefault();
            this.$el.trigger('pt-pb-clone-row', this.model.toJSON({
                content: true
            }));
        },

        moveRow: function(e, oldParent){
            this.$el.closest('.pt-pb-section').trigger('ptpb:rowMovedSection', [this.model.toJSON( { content: true } ), this.$el]);
        },

        editSlider: function(e) {
            e.preventDefault();
            this.$('.pt-pb-slide:first').trigger('edit-slider');
        },

        editGenericSlider: function(e) {
            e.preventDefault();
            this.$('.pt-pb-generic-slider').trigger('edit-generic-slider');
        },

        editGallery: function(e) {
            e.preventDefault();
            this.$('.pt-pb-gimage:first').trigger('edit-gallery');
        },

        updateColumns: function(e, layouts) {
            var columns = layouts.replace(/ /g, '').split(','),
                models = this.model.get('content');

            if (models.length > columns.length && !window.confirm(ptPbAppLocalization.resize_columns)) {
                return;
            } else if (models.length === columns.length) {
                return;
            }

            this.model.updateColumns(columns);
        },

        makeColumnsSortable: function() {
            var view = this;
            this.$el.sortable({
                handle: '.pt-pb-column-sortable',
                placeholder: 'sortable-placeholder pt-pb-column',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column',
                start: function(e, ui) {
                    var col = ui.item.attr('class').replace(/ ?pt-pb-column ?/, '');
                    ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px;width:' + ui.item.width() + 'px;"></div>');
                },
                update: function() {
                    view.sortColumns();
                }
            });
        },

        sortColumns: function(){
            var updated = [],
                columns = this.model.get('content');
            this.$content.find('.pt-pb-column').each(function() {
                updated.push($(this).attr('id'));
            });

            columns.models = _(columns.models).sortBy(function(model) {
                return _.indexOf(updated, model.id);
            });
            this.model.set('content', columns);
        }

    });

    ptPbApp.Views.Column = Backbone.View.extend({
        template: ptPbApp.template('column'),
        $insertModule: null,
        $reveal: null,
        $formElms: null,
        $content: null,

        id: function() {
            return this.model.get('id');
        },

        className: function() {
            return 'pt-pb-module-preview pt-pb-column pt-pb-col-' + this.model.get('type');
        },

        events: {
            'click .save-column': 'updateColumn',
            'click .pt-pb-settings-column': 'editColumn',
            'click .pt-pb-insert-module': 'insertModuleDialog',
            'click .column-module': 'insertModule',
            'ptpb:moduleMovedCol': 'moveModule'
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));
            this.$content = this.$('.pt-pb-column-content');
            this.$insertModule = this.$('.pt-pb-insert-modules').revealBind();
            this.$reveal = this.$('.pt-pb-column-edit-r').revealBind();
            this.$formElms = this.$reveal.find(':input');

            this.renderModules()
                .makeModulesSortable();

            return this;
        },

        renderModules: function() {
            this.model.get('modules').each(this.renderModule, this);
            return this;
        },

        renderModule: function(module, key, clctn, el) {
            if (!ptPbApp.Views.hasOwnProperty(module.properName())){
                return;
            }

            var moduleView = new ptPbApp.Views[module.properName()]({
                model: module
            });

            if (el){
                el.after(moduleView.render().el);
            } else {
                this.$content.append(moduleView.render().el);
            }

            return moduleView;
        },

        insertModuleDialog: function(e) {
            e.preventDefault();
            this.$insertModule.trigger('reveal:open');
        },

        insertModule: function(e) {
            e.preventDefault();
            var $target = $(e.target).hasClass('column-module') ? $(e.target) : $(e.target).parent(),
                moduleName = $target.data('module').replace(/ /g, '').toProperCase().replace(/module/, ''),
                module = this.model.addModule({
                    type: moduleName
                });

            if (!module){
                return;
            }

            var view = this.renderModule(module);

            this.closeReveal(true);
            view.editModule();
        },

        moveModule: function(e, attr, el) {
            this.renderModule(this.model.addModule(attr), null, null, el);
            el.trigger('ptpb:removemodule', true);
        },

        closeReveal: function(immediate) {
            this.$insertModule.trigger('reveal:close', {
                immediate: immediate,
                openModalBg: true
            });
        },

        editColumn: function(e) {
            if (e) { e.preventDefault(); }
            this.$reveal.trigger('reveal:open');
        },

        updateColumn: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        makeModulesSortable: function() {
            var view = this;
            this.$content.sortable({
                handle: '.module-controls',
                placeholder: 'sortable-placeholder-module',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-module-preview',
                connectWith: '.pt-pb-column-content',
                start: function(e, ui) {
                    var col = ui.item.attr('class').replace(/ ?pt-pb-column ?/, '');
                    ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px;width:100%;"></div>');
                },
                update: function(event, ui) {
                    ui.item.css('width', 'auto');
                    if (this === ui.item.parent()[0] && ui.sender !== null) {
                        ui.item.trigger('ptpb:modulemoved', ui.sender.closest('.pt-pb-column'));
                    }
                    view.sortModules();
                },
                over: function(event, ui) {
                    ui.item.css('width', (ui.placeholder.closest('.pt-pb-column').width() - 20) + 'px');
                }
            });
        },

        sortModules: function() {
            var order = this.$('.pt-pb-module-preview').map(function() {
                    return $(this).attr('id');
                }).get(),
                modules = this.model.get('modules');
            modules.models = _.sortBy(modules.models, function(module) {
                return order.indexOf(module.get('id'));
            });
            this.model.set('modules', modules);
        }

    });

    ptPbApp.Views.Slider = Backbone.View.extend({
        template: ptPbApp.template('module-slider'),
        className: 'pt-pb-slide',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .save-slider': 'updateSlider',
            'edit-slider': 'editSlider',
            'click .pt-pb-insert-slide': 'insertSlide'
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$content = this.$('.slider-container');
            this.$reveal = this.$('.pt-pb-slider-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');

            this.renderSlides()
                .makeSlidesSortable();

            return this;
        },

        renderSlides: function() {
            this.model.get('slides').each(this.renderSlide, this);
            return this;
        },

        renderSlide: function(slide, animate) {
            var slideView = new ptPbApp.Views.Slide({
                model: slide
            }).render().el;

            if (animate) {
                ptPbApp.scrollTo($(slideView).hide().appendTo(this.$content).slideDown().offset().top - 300);
                return;
            }

            this.$content.append(slideView);
        },

        makeSlidesSortable: function() {
            this.$el.find('.slider-container').sortable({
                handle: '.module-controls',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column'
            });
        },

        editSlider: function(e) {
            if (e) { e.preventDefault(); }
            this.$reveal.trigger('reveal:open');
        },

        updateSlider: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        insertSlide: function(e) {
            if (e) { e.preventDefault(); }
            this.renderSlide(this.model.addSlide(), true);
        }

    });

    ptPbApp.Views.Slide = Backbone.View.extend({
        template: ptPbApp.template('module-slide'),
        className: 'pt-pb-column pt-pb-col-1-1',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .save-slide': 'updateSlide',
            'click .edit-module-slide .edit': 'editSlide',
            'click .slide-content-preview': 'editSlide',
            'click .edit-module-slide .remove': 'removeSlide'
        },

        initialize: function() {
            this.model.on('change', this.render, this)
                .on('remove', this.remove, this);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$reveal = this.$('.pt-pb-slide-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editSlide: function(e) {
            if (e) { e.preventDefault(); }
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        updateSlide: function() {
            this.model.set(_.extend({}, ptPbApp.serializeElms(this.$formElms), {
                'content': ptPbApp.getContent()
            }));
            this.$reveal.trigger('reveal:close');
        },

        removeSlide: function(e) {
            e.preventDefault();
            if (window.confirm(ptPbAppLocalization.remove_slide)) {
                this.model.trigger('destroy', this.model);
            }
        }

    });

    ptPbApp.Views.GenericSlider = Backbone.View.extend({
        template: ptPbApp.template('module-generic-slider'),
        className: 'pt-pb-generic-slider',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-module': 'updateSlider',
            'edit-generic-slider': 'editSlider'
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$reveal = this.$el.find('.pt-pb-generic-slider-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        editSlider: function(e) {
            if (e) { e.preventDefault(); }
            this.$reveal.trigger('reveal:open');
        },

        updateSlider: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$el.find('.generic-slider-container').html('<b>Slider ID : </b>' + this.model.get('slider_id'));
            this.$reveal.trigger('reveal:close');
        }

    });

    ptPbApp.Views.Gallery = Backbone.View.extend({
        template: ptPbApp.template('module-gallery'),
        className: 'pt-pb-gimage',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .save-gallery': 'updateGallery',
            'edit-gallery': 'editGallery',
            'click .pt-pb-insert-gimage': 'insertImage'
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$content = this.$('.images-container');
            this.$reveal = this.$('.pt-pb-gallery-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');

            this.renderImages()
                .makeImagesSortable();

            return this;
        },

        renderImages: function() {
            this.model.get('images').each(this.renderImage, this);
            return this;
        },

        renderImage: function(image, animate) {
            var imageView = new ptPbApp.Views.GImage({
                model: image
            }).render().el;

            if (animate) {
                ptPbApp.scrollTo($(imageView).hide().appendTo(this.$content).slideDown().offset().top - 300);
                return;
            }

            this.$content.append(imageView);
        },

        makeImagesSortable: function() {
            this.$el.find('.images-container').sortable({
                handle: '.module-controls',
                placeholder: 'sortable-placeholder pt-pb-gallery-image',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column',
                start: function(e, ui) {
                    ui.placeholder.css({
                        'height': ui.item.height() + 'px',
                        width: ui.item.width() + 'px'
                    });
                }
            });
        },

        editGallery: function(e) {
            if (e) { e.preventDefault(); }
            this.$reveal.trigger('reveal:open');
        },

        updateGallery: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        insertImage: function(e) {
            if (e) { e.preventDefault(); }
            this.renderImage(this.model.addImage(), true);
        }

    });

    ptPbApp.Views.GImage = Backbone.View.extend({
        template: ptPbApp.template('module-gimage'),
        className: 'pt-pb-column pt-pb-col-1-4',
        id: function() {
            return this.model.get('id');
        },
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-gimage': 'updateImage',
            'click .edit-module-gimage .edit': 'editImage',
            'click .gimage-content-preview': 'editImage',
            'click .edit-module-gimage .remove': 'removeImage'
        },

        initialize: function() {
            this.model.on('change', this.render, this)
                .on('remove', this.remove, this);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));

            this.$reveal = this.$el.find('.pt-pb-gimage-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        editImage: function(e) {
            if (e) { e.preventDefault(); }
            this.$reveal.trigger('reveal:open');
        },

        updateImage: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        removeImage: function(e) {
            e.preventDefault();
            if (window.confirm(ptPbAppLocalization.remove_image)) {
                this.model.trigger('destroy', this.model);
            }
        },

    });

    ptPbApp.Views.Module = Backbone.View.extend({
        $reveal: null,
        $formElms: null,
        $content: null,

        id: function() {
            return this.model.get('id');
        },

        className: 'pt-pb-module-preview',

        events: {
            'click .content-preview': 'editModule',
            'click .edit-module > .edit': 'editModule',
            'click .save-module': 'updateModule',
            'click .edit-module > .remove': 'removeModule',
            'ptpb:removemodule': 'removeModule',
            'ptpb:modulemoved': 'moveModule'
        },

        initialize: function() {
            this.model.on('remove', this.remove, this);
            this.model.on('change', this.render, this);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()));
            this.$reveal = this.$('.reveal-modal').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editModule: function(e) {
            if (e) { e.preventDefault(); }
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        updateModule: function(e) {
            var data = ptPbApp.serializeElms(this.$formElms);
            if (this.$content.length > 0) {
                data.content = ptPbApp.getContent();
            }
            this.model.set(data);
            this.$reveal.trigger('reveal:close');
        },

        removeModule: function(e, confirm) {
            e.preventDefault();
            if (confirm || window.confirm(ptPbAppLocalization.remove_module)) {
                this.model.trigger('destroy', this.model, this.model.collection);
            }
        },

        moveModule: function(e, oldParent) {
            this.$el.closest('.pt-pb-column').trigger('ptpb:moduleMovedCol', [this.model.toJSON(), this.$el]);
        }

    });

    ptPbApp.Views.ImageModule = ptPbApp.Views.Module.extend({
        template: ptPbApp.template('module-image')
    });


    ptPbApp.Views.TextModule = ptPbApp.Views.Module.extend({
        template: ptPbApp.template('module-text')
    });


    ptPbApp.Views.HovericonModule = ptPbApp.Views.Module.extend({
        template: ptPbApp.template('module-hovericon')
    });

    ptPbApp.Views.FeatureboxModule = ptPbApp.Views.Module.extend({
        template: ptPbApp.template('module-featurebox')
    });

    ptPbApp.Views.Contactform7Module = ptPbApp.Views.Module.extend({
        template: ptPbApp.template('module-cf7')
    });


})(window, Backbone, jQuery, _, ptPbApp);
