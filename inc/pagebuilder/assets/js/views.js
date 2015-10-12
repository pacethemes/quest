/*jshint unused:false*/
/* global Backbone, jQuery, _ */

var ptPbApp = ptPbApp || {};


(function(window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.SectionView = Backbone.View.extend({
        template: ptPbApp.template('section'),
        columnTemplate: ptPbApp.template('insert-column'),
        className: 'pt-pb-section grid',
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
            'click .pt-pb-clone-row': 'cloneRow'
        },

        initialize: function(options) {

            if (!this.model.get('content'))
                this.model.set('content', new ptPbApp.RowCollection());

            this.model.set('rowNum', 0);
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));

        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var $view = this,
                $content = this.$el.find('.pt-pb-content'),
                content = this.model.get('content');

            if (this.model.get('content').length > 0) {
                _.each(content.models, function(row, ind) {
                    $content.append(new ptPbApp.RowView({
                        model: row
                    }).render().el);
                });
                $view.model.set('rowNum', content.models.length);
            }

            this.makeRowsSortable();
            this.$reveal = this.$el.find('.pt-pb-section-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$insertColumns = this.$el.find('.pt-pb-insert-columns').revealBind();
            return this;
        },

        editSection: function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.$reveal.trigger('reveal:open');
        },

        cloneSection: function(e) {
            e.preventDefault();
            e.stopPropagation();
            var model = this.model;
            if (typeof this.model.attributes.content.length === 'undefined') {
                model.attributes.slider = {};
                _.each(model.attributes.content.attributes, function(val, key) {
                    if (key === 'slides')
                        return;
                    model.attributes.slider[key] = val;
                });
                _.each(model.attributes.content.attributes.slides.models, function(val, key) {
                    model.attributes.slider[key] = val.attributes;
                });
            }
            ptPbApp.AddSection(model, ptPbApp.Sections.indexOf(this.model) + 1, true, true);
        },

        saveSection: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$el.find('.pt-pb-section-label').text(this.model.get('admin_label'));
            this.closeReveal();
        },

        removeSection: function(e, confirm) {
            e.preventDefault();

            confirm = confirm ? confirm : window.confirm("Are you sure you want to remove this section ? This step cannot be undone");

            if (confirm) {
                ptPbApp.Sections.remove(this.model);
                $(e.target).closest('.pt-pb-section').remove();
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
            e.stopPropagation();
            var cssClass = e.target.className.match(/fa-|edit-columns/) !== null ? 'update' : 'insert',
                rowId = cssClass === 'update' ? $(e.target).closest('.pt-pb-row').attr('id') : '';
            this.$insertColumns.data('rowId', rowId).removeClass('update insert').addClass(cssClass).trigger('reveal:open');
        },

        insertColumns: function(e) {
            var $target = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li'),
                columns = $target.data('layout').replace(/ /g, '').split(','),
                $content = this.$el.find('.pt-pb-content'),
                row = this._createRow('columns'),
                rows = this.model.get('content'),
                rowView = new ptPbApp.RowView({
                    model: row
                });

            rowView.insertColumns(columns);
            $content.append(rowView.render().el);
            rows.add(rowView.model);
            this.model.set('content', rows);
            this.$insertColumns.trigger('reveal:close');
        },

        updateColumns: function(e) {
            var $e = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li');
            $('#' + this.$insertColumns.data('rowId')).trigger('update-columns', $e.data('layout'));
            this.$insertColumns.trigger('reveal:close');
        },

        insertSlider: function(e) {
            e.preventDefault();
            var $content = this.$el.find('.pt-pb-content'),
                row = this._createRow('slider'),
                rows = this.model.get('content'),
                rowView = new ptPbApp.RowView({
                    model: row
                });
            rowView._addSlider();
            $content.append(rowView.render().el);
            rows.add(rowView.model);
            this.model.set('content', rows);
        },

        insertGenericSlider: function(e) {
            e.preventDefault();
            var slType = $(e.target).data('slider'),
                $content = this.$el.find('.pt-pb-content'),
                row = this._createRow('generic-slider', slType),
                rows = this.model.get('content'),
                rowView = new ptPbApp.RowView({
                    model: row
                });
            $content.append(rowView.render().el);
            rows.add(rowView.model);
            this.model.set('content', rows);
        },

        insertGallery: function(e) {
            e.preventDefault();
            var $content = this.$el.find('.pt-pb-content'),
                row = this._createRow('gallery'),
                rows = this.model.get('content'),
                rowView = new ptPbApp.RowView({
                    model: row
                });
            rowView._addGallery();
            $content.append(rowView.render().el);
            rows.add(rowView.model);
            this.model.set('content', rows);
        },

        _getRowNum: function() {
            var rowNum = this.model.get('rowNum');
            rowNum++;
            this.model.set('rowNum', rowNum);
            return rowNum;
        },

        _createRow: function(type, slType) {
            var rowNum = this._getRowNum(),
                id = this.model.get('id'),
                row = new ptPbApp.RowModel({
                    id: id + '__row__' + rowNum,
                    parent: id,
                    type: type,
                    genSlider: slType || ''
                });
            this.model.set('rowNum', rowNum);
            return row;
        },

        cloneRow: function(e) {
            e.preventDefault();
            var $row = $(e.target).closest('.pt-pb-row'),
                rowId = $row.attr('id'),
                rows = this.model.get('content'),
                rowNum = this._getRowNum(),
                row = ptPbApp.AddRow(rows.get(rowId).toJSON(), rowNum, this.model.get('id')),
                rowEl = new ptPbApp.RowView({
                    model: row,
                    parent: this.model
                }).render().el;

            rows.add(row);
            $row.after(rowEl);
            ptPbApp.scrollTo($(rowEl).offset().top - 50);
            this.model.set('content', rows);

        },

        makeRowsSortable: function() {
            var $view = this;
            $view.$el.sortable({
                handle: '.pt-pb-row-header',
                forcePlaceholderSizeType: true,
                placeholder: 'sortable-placeholder-pt-pb-row',
                distance: 2,
                tolerance: 'pointer',
                items: '.pt-pb-row',
                cancel: '.pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-row-content',
                start: function(e, ui) {
                    ui.placeholder.css('height', ui.item.height() + 'px');
                },
                update: function(event, ui) {
                    var updated = [],
                        rows = $view.model.get('content');
                    $(this).find('.pt-pb-row').each(function() {
                        updated.push($(this).attr('id'));
                    });

                    rows.models = _(rows.models).sortBy(function(model) {
                        return _.indexOf(updated, model.get('id'));
                    });

                    $view.model.set('content', rows);

                }
            });
        },

        closeReveal: function() {
            this.$reveal.trigger('reveal:close');
        }

    });

    ptPbApp.RowView = Backbone.View.extend({
        template: ptPbApp.template('row'),
        className: 'pt-pb-row clearfix',
        $reveal: null,
        $formElms: null,

        events: {
            'click .pt-pb-remove-row': 'removeRow',
            'click .pt-pb-settings-row': 'editRow',
            'click .save-row': 'saveRow',
            'click .slider .pt-pb-settings-slider': 'editSlider',
            'click .pt-pb-settings-generic-slider': 'editGenericSlider',
            'click .gallery .pt-pb-settings-gallery': 'editGallery',
            'click .pt-pb-row-toggle': 'toggleRow',
            'update-columns': 'updateColumns',
        },

        initialize: function(options) {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
            var rType = this.model.get('type');
            this.model.set('admin_label', 'Row - ' + 
                                ( rType === 'generic-slider' ? 
                                    ( this.model.get('genSlider') || this.model.get('content').attributes.type ) + ' Slider' 
                                    : rType ) );
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            this.addRow(this.model);

            this.makeColumnsSortable();
            this.$reveal = this.$el.find('.pt-pb-row-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        addRow: function(row) {
            row = new ptPbApp.RowModel(row.attributes || {});
            var $content = this.$el.find('.pt-pb-row-content'),
                $view = this,
                rowId = row.attributes.id,
                rowContent = row.get('content');

            if (row.get('type') === 'columns' && rowContent && rowContent.models) {
                _.each(rowContent.models, function(column, ind) {
                    var model = new ptPbApp.ColumnModel(column.attributes || {});
                    model.set('parent', rowId);
                    model.set('id', rowId + '__col__' + (ind + 1));
                    $content.append(new ptPbApp.ColumnView({
                        model: model,
                        parent: $view.model
                    }).render().el);
                });
            } else if (row.get('type') === 'gallery') {
                $view._addGallery(row, rowContent);
            } else if (row.get('type') === 'slider') {
                $view._addSlider(rowContent);
            } else if (row.get('type') === 'generic-slider') {
                $view._addGenericSlider(rowContent, row.get('genSlider') || rowContent.get('type'));
            }
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

        expandRow: function(callback) {
            var $head = this.$el.find('.pt-pb-row-header'),
                $body = $head.siblings('.pt-pb-row-content');
            $body.slideDown(400, function() {
                $head.removeClass('close');
                if (typeof callback === 'function')
                    callback();
            });
        },

        removeRow: function(e, confirm) {
            e.preventDefault();

            confirm = confirm ? confirm : window.confirm("Are you sure you want to remove this row ? This step cannot be undone");

            if (confirm) {
                var $row = $(e.target).closest('.pt-pb-row'),
                    rowId = this.model.get('id'),
                    section = ptPbApp.Sections.get(this.model.get('parent'));

                section.get('content').remove(rowId);
                $row.remove();
            }
        },

        editRow: function(e) {
            e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        saveRow: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$el.find('.pt-pb-row-label').text(this.model.get('admin_label'));
            this.$reveal.trigger('reveal:close');
        },

        editSlider: function(e) {
            e.preventDefault();
            var $view = this;
            this.expandRow(function() {
                $view.$el.find('.pt-pb-slide:first').trigger('edit-slider');
            });
        },

        editGenericSlider: function(e) {
            e.preventDefault();
            var $view = this;
            this.expandRow(function() {
                $view.$el.find('.pt-pb-generic-slider').trigger('edit-generic-slider');
            });
        },

        editGallery: function(e) {
            e.preventDefault();
            var $view = this;
            this.expandRow(function() {
                $view.$el.find('.pt-pb-gimage:first').trigger('edit-gallery');
            });
        },

        insertColumns: function(columns) {
            var contentArr = new ptPbApp.ColumnCollection(),
                $content = this.$el.find('.pt-pb-row-content'),
                rowId = this.model.get('id'),
                $view = this;
            _.each(columns, function(col, index) {
                var column = {
                    parent: rowId,
                    type: col,
                    id: rowId + '__col__' + (index + 1)
                };

                if (columns.length === (index + 1))
                    column.last = true;

                var model = new ptPbApp.ColumnModel(column);
                contentArr.add(model);

                $content.append(new ptPbApp.ColumnView({
                    model: model,
                    parent: $view.model
                }).render().el);
            });
            this.model.set('content', contentArr);
        },

        updateColumns: function(e, layouts) {

            var columns = layouts.replace(/ /g, '').split(','),
                $content = this.$el.find('.pt-pb-row-content'),
                contentArr = new ptPbApp.ColumnCollection(),
                $view = this,
                models = this.model.get('content');

            if (models.length > columns.length) {
                var confirm = window.confirm("You are about to resize the columns to a lower size than the existing columns, it may remove the last columns and will result in data/module loss. Do you really want to do this ?");
                if (!confirm)
                    return;
            }
            $content.html('');
            _.each(columns, function(col, index) {
                var column = {},
                    model;
                if (models.models[index] !== undefined) {
                    model = models.models[index];
                    model.set('type', col);
                    contentArr.add(model);
                } else {
                    column.parent = $view.model.id;
                    column.type = col;
                    column.id = $view.model.id + '__col__' + (index + 1);
                    model = new ptPbApp.ColumnModel(column);
                    contentArr.add(model);
                }

                $content.append(new ptPbApp.ColumnView({
                    model: model,
                    parent: $view.model
                }).render().el);

            });

            this.model.set('content', contentArr);

        },

        _addSlider: function(params) {

            var rows = this.model.get('content'),
                rowId = this.model.get('id'),
                sliderId = rowId + '__slider',
                slider = params || new ptPbApp.SliderModel({}),
                $content = this.$el.find('.pt-pb-row-content');

            slider.set({
                'parent': rowId,
                'id': sliderId
            });

            this.model.set('content', slider);

            $content.append(new ptPbApp.SliderView({
                model: slider
            }).render().el);

            return slider;
        },

        _addGenericSlider: function(params, type) {

            var rows = this.model.get('content'),
                rowId = this.model.get('id'),
                sliderId = rowId + '__generic_slider',
                slider = params || new ptPbApp.GenericSliderModel({}),
                $content = this.$el.find('.pt-pb-row-content');

            slider.set({
                'parent': rowId,
                'id': sliderId,
                'type' : type || params.type
            });

            this.model.set('content', slider);

            $content.append(new ptPbApp.GenericSliderView({
                model: slider
            }).render().el);

            var icon = "ptPbApp" + slider.get('type').toProperCase() + "Slider";
            if( icon in window && window[icon].icon ) {
                this.$el.find('.pt-pb-row-header .pt-pb-settings-generic-slider').html( window[icon].icon );
            }

            return slider;
        },

        _addGallery: function(row, params) {
            var rowId = this.model.get('id'),
                galleryId = rowId + '__gallery',
                gallery = params || new ptPbApp.GalleryModel({}),
                $content = this.$el.find('.pt-pb-row-content');

            gallery.set({
                'parent': this.model.id,
                'id': galleryId
            });

            this.model.set('content', gallery);

            $content.append(new ptPbApp.GalleryView({
                model: gallery
            }).render().el);

        },

        makeColumnsSortable: function() {
            var $view = this;
            $view.$el.sortable({
                handle: '.pt-pb-column-sortable',
                placeholder: 'sortable-placeholder pt-pb-column',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column',
                start: function(e, ui) {
                    var col = ui.item.attr('class').replace(/ ?pt-pb-column ?/, '');
                    ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px"></div>');
                },
                update: function(event, ui) {
                    var updated = [],
                        columns = $view.model.get('content');
                    $(this).find('.pt-pb-column').each(function() {
                        updated.push($(this).attr('id'));
                    });

                    columns.models = _(columns.models).sortBy(function(model) {
                        return _.indexOf(updated, model.get('id'));
                    });

                    $view.model.set('content', columns);
                }
            });
        },

    });

    ptPbApp.ColumnView = Backbone.View.extend({
        template: ptPbApp.template('column'),
        $insertModule: null,
        $reveal: null,
        $formElms: null,
        className: 'pt-pb-column',
        colClass: 'pt-pb-col-1-1',
        $parent: '',
        cache: {
            parent: null
        },

        events: {
            'click .save-column': 'updateColumn',
            'click .pt-pb-settings-column': 'editColumn',
            'click .pt-pb-insert-module': 'insertModuleDialog',
            'click .column-module': 'insertModule',
            'remove-module': 'removeModule'
        },

        initialize: function(options) {
            this.$parent = $('#' + this.model.get('parent'));
            this.cache.parent = options.parent;
            this.colClass = 'pt-pb-col-' + this.model.get('type');
            if (this.model.get('last') === true)
                this.colClass += ' last';
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));

            ptPbApp.ModulesList = {};
            _.each(ptPbApp.Modules, function(val, ind) {
                if (ind.match(/Model/) !== null) {
                    ptPbApp.ModulesList[ind.replace('Model', '')] = new ptPbApp.Modules[ind]().attributes;
                }
            });
            this.model.set('modules', ptPbApp.ModulesList);
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                }).addClass(this.colClass);

            var $content = this.$el.find('.pt-pb-column-content'),
                $view = this,
                content = this.model.get('content');

            if (content.length !== undefined) {
                _.each(content, function(mod, k) {
                    var module = mod.get('type').toProperCase();
                    $content.append(new ptPbApp.Modules[module + 'View']({
                        model: mod
                    }).render().el);
                });
                this.model.set('moduleNum', content.length);
            }

            this.$insertModule = this.$el.find('.pt-pb-insert-modules').revealBind();
            this.$reveal = this.$el.find('.pt-pb-column-edit-r').revealBind();
            this.$formElms = this.$reveal.find(':input');

            return this;
        },

        insertModuleDialog: function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.$insertModule.trigger('reveal:open');
        },

        insertModule: function(e) {
            e.preventDefault();
            var $target = $(e.target).hasClass('column-module') ? $(e.target) : $(e.target).parent(),
                module = $target.data('module').replace(/ /g, '').toProperCase();

            if (!ptPbApp.Modules[module + 'Model']) return;

            var $col = this,
                $content = this.$el.find('.pt-pb-column-content'),
                modules = this.model.get('content'),
                moduleNum = this._getModuleNum(),
                atts = {
                    parent: this.model.id,
                    id: this.model.id + '__module__' + moduleNum
                },
                model = new ptPbApp.Modules[module + 'Model'](atts),
                view = new ptPbApp.Modules[module + 'View']({
                    model: model
                });

            $content.append(view.render().el);
            modules.push(model);
            this.model.set('content', modules);
            this.cache.parent.get('content').add(this.model, {
                merge: true
            });
            this.closeReveal(true);
            view.editModel();

        },

        removeModule: function(e, data) {
            var confirm = window.confirm("Are you sure you want to remove this Module ? This step cannot be undone");
            if (confirm && data && data.moduleId) {
                var modules = this.model.get('content');
                _.each(modules, function(module, i) {
                    if (data.moduleId === module.get('id'))
                        modules.splice(i, 1);
                });
                this.model.set('content', modules);
                $('#' + data.moduleId).remove();
            }
        },

        closeReveal: function(immediate) {
            this.$insertModule.trigger('reveal:close', {
                immediate: immediate,
                openModalBg: true
            });
        },

        editColumn: function(e){
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        updateColumn: function(e) {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        _getModuleNum: function() {
            var num = this.model.get('moduleNum');
            ++num;
            this.model.set('moduleNum', num);
            return num;
        }

    });

    ptPbApp.SliderView = Backbone.View.extend({
        template: ptPbApp.template('module-slider'),
        className: 'pt-pb-slide',
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-slider': 'updateSlider',
            'edit-slider': 'editModel',
            'click .pt-pb-insert-slide': 'insertSlide',
            'click .edit-module-slide .remove': 'removeSlide'
        },

        initialize: function() {
            if (this.model.get('slides') === '') {
                this.model.set('slides', new ptPbApp.SlideCollection());
            }
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var view = this;
            _.each(this.model.get('slides').models, function(slide, ind) {
                view._addSlide(slide);
            });
            this.makeSlidesSortable();
            this.$reveal = this.$el.find('.pt-pb-slider-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        makeSlidesSortable: function() {
            var $view = this;
            $view.$el.find('.slider-container').sortable({
                handle: '.module-controls',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column'
            });
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        updateSlider: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        insertSlide: function(e) {
            e.preventDefault();
            var slide = this._addSlide(null, true);
        },

        _addSlide: function(params, animate) {
            var slide = params || new ptPbApp.SlideModel({}),
                slides = this.model.get('slides'),
                $content = this.$el.find('.slider-container'),
                newId = this.model.id + '__' + this._getItemNum();

            if (params && params.text)
                slide.set('content', params.text);

            slide.set({
                'parent': this.model.id,
                'id': newId
            });

            slides.add(slide, {
                merge: true
            });
            this.model.set('slides', slides);

            var $slide = $(new ptPbApp.SlideView({
                model: slide
            }).render().el).hide();

            $content.find('.pt-pb-add-slide').before($slide);
            if (animate) {
                $slide.slideDown();
                ptPbApp.scrollTo($slide.offset().top - 300);
            } else {
                $slide.show();
            }
            return slide;
        },

        removeSlide: function(e) {
            e.preventDefault();
            var confirm = window.confirm("Are you sure you want to remove this slide ? This step cannot be undone");
            if (confirm) {
                var $slide = $(e.target).closest('.pt-pb-column'),
                    id = $slide.attr('id');

                this.model.get('slides').remove(id);
                $slide.remove();
            }
        },

        _getItemNum: function() {
            var num = this.model.get('itemNum');
            ++num;
            this.model.set('itemNum', num);
            return num;
        }

    });

    ptPbApp.SlideView = Backbone.View.extend({
        template: ptPbApp.template('module-slide'),
        className: 'pt-pb-column pt-pb-col-1-1',
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .save-slide': 'updateSlide',
            'click .edit-module-slide .edit': 'editModel',
            'click .slide-content-preview': 'editModel'
        },

        initialize: function() {
            if (this.model.get('content') === '' && this.model.get('text')) {
                this.model.set('content', this.model.get('text'));
            }
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            this.$reveal = this.$el.find('.pt-pb-slide-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        updateSlide: function() {

            var view = this;

            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.model.set('content', ptPbApp.getContent());
            this.$reveal.trigger('reveal:close');

            setTimeout(function() {
                view.render();
            }, 300);
        }

    });

    ptPbApp.GenericSliderView = Backbone.View.extend({
        template: ptPbApp.template('module-generic-slider'),
        className: 'pt-pb-generic-slider',
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-generic-slider': 'updateSlider',
            'edit-generic-slider': 'editModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            this.$reveal = this.$el.find('.pt-pb-generic-slider-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        updateSlider: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$el.find('.generic-slider-container').html('<b>Slider ID : </b>' + this.model.get('slider_id') );
            this.$reveal.trigger('reveal:close');
        }

    });

    ptPbApp.GalleryView = Backbone.View.extend({
        template: ptPbApp.template('module-gallery'),
        className: 'pt-pb-gimage',
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-gallery': 'updateGallery',
            'edit-gallery': 'editModel',
            'click .pt-pb-insert-gimage': 'insertImage',
            'click .edit-module-gimage .remove': 'removeImage'
        },

        initialize: function() {
            if (this.model.get('images') === '') {
                var model = new ptPbApp.GImageCollection();
                for (var i = 1; i < 5; i++) {
                    var image = new ptPbApp.GImageModel({
                        'parent': this.model.id,
                        'id': this.model.id + '__' + this._getItemNum()
                    });
                    model.add(image);
                }

                this.model.set('images', model);
            }
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var view = this;
            _.each(this.model.get('images').models, function(image, ind) {
                view._addImage(image, false);
            });
            this.makeImagesSortable();
            this.$reveal = this.$el.find('.pt-pb-gallery-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        makeImagesSortable: function() {
            var $view = this;
            $view.$el.find('.images-container').sortable({
                handle: '.module-controls',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column'
            });
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        updateGallery: function() {
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
        },

        insertImage: function(e) {
            if (e) {
                e.preventDefault();
            }
            var slide = this._addImage(null, true);
        },

        _addImage: function(params, animate) {
            var image = params || new ptPbApp.GImageModel({}),
                images = this.model.get('images'),
                $content = this.$el.find('.images-container'),
                newId = this.model.id + '__' + this._getItemNum();

            image.set({
                'parent': this.model.id,
                'id': newId
            });

            images.add(image, {
                merge: true
            });
            this.model.set('images', images);

            var $image = $(new ptPbApp.GImageView({
                model: image
            }).render().el).hide();

            $content.append($image);

            if (animate) {
                $image.slideDown();
                ptPbApp.scrollTo($image.offset().top - 100);
            } else {
                $image.show();
            }
            return image;
        },

        removeImage: function(e) {
            e.preventDefault();
            var confirm = window.confirm("Are you sure you want to remove this Image ? This step cannot be undone");
            if (confirm) {
                var $image = $(e.target).closest('.pt-pb-column'),
                    id = $image.attr('id');
                this.model.get('images').remove(id);
                $image.remove();
            }
        },

        _getItemNum: function() {
            var num = this.model.get('itemNum');
            ++num;
            this.model.set('itemNum', num);
            return num;
        }

    });

    ptPbApp.GImageView = Backbone.View.extend({
        template: ptPbApp.template('module-gimage'),
        className: 'pt-pb-column pt-pb-col-1-4',
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-gimage': 'updateImage',
            'click .edit-module-gimage .edit': 'editModel',
            'click .gimage-content-preview': 'editModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            this.$reveal = this.$el.find('.pt-pb-gimage-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        updateImage: function() {
            var view = this;
            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');
            setTimeout(function() {
                view.render();
            }, 300);
        }

    });

    ptPbApp.Modules.ImageView = Backbone.View.extend({
        template: ptPbApp.template('module-image'),
        className: 'pt-pb-module-preview',
        $reveal: null,
        $formElms: null,

        events: {
            'click .save-image': 'updateImage',
            'click .edit-module .edit': 'editModel',
            'click .content-preview': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            this.$reveal = this.$el.find('.pt-pb-image-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$reveal.trigger('reveal:open');
        },

        removeModel: function(e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {
                moduleId: this.model.get('id')
            });
        },

        updateImage: function() {
            var view = this;

            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.$reveal.trigger('reveal:close');

            setTimeout(function() {
                view.render();
            }, 300);
        }

    });


    ptPbApp.Modules.TextView = Backbone.View.extend({
        template: ptPbApp.template('module-text'),
        className: 'pt-pb-module-preview',
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .content-preview': 'editModel',
            'click .save-text': 'updateContent',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            this.$reveal = this.$el.find('.pt-pb-text-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        removeModel: function(e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {
                moduleId: this.model.get('id')
            });
        },

        updateContent: function(e) {
            var view = this;

            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.model.set('content', ptPbApp.getContent());

            this.$reveal.trigger('reveal:close');
            setTimeout(function() {
                view.render();
            }, 300);
        }

    });


    ptPbApp.Modules.HovericonView = Backbone.View.extend({
        template: ptPbApp.template('module-hovericon'),
        className: 'pt-pb-module-preview',
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .content-preview': 'editModel',
            'click .save-icon': 'updateModel',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            this.$reveal = this.$el.find('.pt-pb-hovericon-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        removeModel: function(e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {
                moduleId: this.model.get('id')
            });
        },

        updateModel: function(e) {
            var view = this;

            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.model.set('content', ptPbApp.getContent());

            this.$reveal.trigger('reveal:close');
            setTimeout(function() {
                view.render();
            }, 300);
        }

    });

    ptPbApp.Modules.FeatureboxView = Backbone.View.extend({
        template: ptPbApp.template('module-featurebox'),
        className: 'pt-pb-module-preview',
        $reveal: null,
        $formElms: null,
        $content: null,

        events: {
            'click .content-preview': 'editModel',
            'click .save-featurebox': 'updateModel',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {
            this.model.set('pre', ptPbApp.getInputPrefix(this.model.id));
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            this.$reveal = this.$el.find('.pt-pb-featurebox-edit').revealBind();
            this.$formElms = this.$reveal.find(':input');
            this.$content = this.$reveal.find('input[name="' + this.model.get('pre') + '[content]"]');
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            ptPbApp.createEditor(this.$content);
            this.$reveal.trigger('reveal:open');
        },

        removeModel: function(e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {
                moduleId: this.model.get('id')
            });
        },

        updateModel: function(e) {
            var view = this;

            this.model.set(ptPbApp.serializeElms(this.$formElms));
            this.model.set('content', ptPbApp.getContent());

            this.$reveal.trigger('reveal:close');
            setTimeout(function() {
                view.render();
            }, 300);
        }

    });


})(window, Backbone, jQuery, _, ptPbApp);
