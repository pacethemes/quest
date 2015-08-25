/* global Backbone, jQuery, _, wp:true */
var ptPbApp = ptPbApp || {};


(function (window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.SectionView = Backbone.View.extend({
        template: ptPbApp.template('section'),
        editTemplate: ptPbApp.template('section-edit'),
        columnTemplate: ptPbApp.template('insert-column'),
        className: 'pt-pb-section grid',

        events: {
            'click .pt-pb-section-toggle': 'toggleSection',
            'click .pt-pb-settings-section': 'editSection',
            'click .pt-pb-clone-section': 'cloneSection',
            'click .pt-pb-remove': 'removeSection',
            'click .save-section': 'saveSection',
            'click .pt-pb-insert-column': 'insertColumnsDialog',
            'click .pt-pb-insert-slider': 'insertSlider',
            'click .pt-pb-insert-gallery': 'insertGallery',
            'click .close-reveal-modal': 'closeReveal',
            'click .close-model': 'closeReveal',
            'click .insert .column-layouts li': 'insertColumns',
            'click .columns .pt-pb-settings-columns': 'updateColumnsDialog',
            'click .pt-pb-clone-row': 'cloneRow'
        },

        initialize: function (options) {

            if (!this.model.get('content'))
                this.model.set('content', new ptPbApp.RowCollection());

            this.model.set('rowNum', 0);

        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var $view = this,
                $content = this.$el.find('.pt-pb-content'),
                content = this.model.get('content');

            if (this.model.get('content').length > 0) {
                _.each(content.models, function (row, ind) {
                    $content.append(new ptPbApp.RowView({
                        model: row
                    }).render().el);
                });
                $view.model.set('rowNum', content.models.length)
            }

            this.makeRowsSortable();
            ptPbApp.setHiddenInputAll(this.model, this.$el);

            return this;
        },

        editSection: function (e) {
            e.preventDefault();
            e.stopPropagation();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-section-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        cloneSection: function (e) {
            e.preventDefault();
            e.stopPropagation();
            var model = this.model;
            if (typeof this.model.attributes.content.length === 'undefined') {
                model.attributes['slider'] = {};
                _.each(model.attributes.content.attributes, function (val, key) {
                    if (key === 'slides')
                        return;
                    model.attributes['slider'][key] = val;
                });
                _.each(model.attributes.content.attributes.slides.models, function (val, key) {
                    model.attributes['slider'][key] = val.attributes;
                });
            }
            ptPbApp.AddSection(model, ptPbApp.Sections.indexOf(this.model) + 1, true, true);
        },

        saveSection: function (e) {
            this.model.set(this.$el.find('form').serializeObject());
            this.closeReveal();
            ptPbApp.setHiddenInputAll(this.model, this.$el);
        },

        removeSection: function (e, confirm) {
            e.preventDefault();

            var confirm = confirm ? confirm : window.confirm("Are you sure you want to remove this section ? This step cannot be undone");

            if (confirm) {
                ptPbApp.Sections.remove(this.model);
                $(e.target).closest('.pt-pb-section').remove();
            }
        },

        toggleSection: function (e) {
            e.preventDefault();

            var $this = $(e.target),
                $head = $this.closest('.pt-pb-header'),
                $body = $head.siblings('.pt-pb-content-wrap');

            if ($body.css('display') === undefined || $body.css('display') === 'block') {
                $body.slideUp(400, function () {
                    $head.addClass('close');
                });
            } else {
                $body.slideDown(400, function () {
                    $head.removeClass('close');
                });
            }
        },


        insertColumnsDialog: function (e) {
            e.preventDefault();
            e.stopPropagation();
            var edit = e.target.className.match(/fa-|edit-columns/) !== null ? true : false,
                cssClass = edit ? 'pt-pb-insert-columns update reveal-modal' : 'pt-pb-insert-columns insert reveal-modal';
            this.$el.append($('<div />').html(this.columnTemplate()).addClass(cssClass));
            this.$el.find('.reveal-modal').reveal();
        },

        updateColumnsDialog: function (e) {
            e.preventDefault();
            e.stopPropagation();
            var cssClass = 'pt-pb-insert-columns update reveal-modal',
                $view = this;

            $view.$el.append($('<div />').html(this.columnTemplate()).addClass(cssClass));
            $view.$el.find('.column-layouts li').click(function (em) {
                var $e = em.target.tagName.toUpperCase() === 'LI' ? $(em.target) : $(em.target).closest('li');
                $(e.target).closest('.pt-pb-row').trigger('update-columns', $e.data('layout'));
                $view.closeReveal();
            });
            $view.$el.find('.reveal-modal').reveal();
        },

        insertColumns: function (e) {
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
            this.closeReveal();

        },

        insertSlider: function (e) {
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

        insertGallery: function (e) {
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

        _getRowNum: function () {
            var rowNum = this.model.get('rowNum');
            rowNum++;
            this.model.set('rowNum');
            return rowNum;
        },

        _createRow: function (type) {
            var rowNum = this._getRowNum(),
                id = this.model.get('id'),
                row = new ptPbApp.RowModel({
                    id: id + '__row__' + rowNum,
                    parent: id,
                    type: type
                });
            this.model.set('rowNum', rowNum);
            return row;
        },

        cloneRow: function (e) {
            e.preventDefault();
            var $row = $(e.target).closest('.pt-pb-row'),
                rowId = $row.attr('id'),
                rows = this.model.get('content'),
                rowNum = this._getRowNum(),
                row = ptPbApp.AddRow(rows.get(rowId).toJSON(), rowNum, this.model.get('id'))

            rows.add(row);
            $row.after(new ptPbApp.RowView({
                model: row,
                parent: this.model
            }).render().el);
            this.model.set('content', rows);

        },

        makeRowsSortable: function () {
            var $view = this;
            $view.$el.sortable({
                handle: '.pt-pb-row-header',
                forcePlaceholderSizeType: true,
                placeholder: 'sortable-placeholder-pt-pb-row',
                distance: 2,
                tolerance: 'pointer',
                items: '.pt-pb-row',
                cancel: '.pt-pb-settings, .pt-pb-clone, .pt-pb-remove, .pt-pb-section-add, .pt-pb-row-add, .pt-pb-insert-module, .pt-pb-insert-column, .pt-pb-row-content',
                start: function (e, ui) {
                    ui.placeholder.css('height', ui.item.height() + 'px');
                },
                update: function (event, ui) {
                    var updated = [],
                        rows = $view.model.get('content');
                    $(this).find('.pt-pb-row').each(function () {
                        updated.push($(this).attr('id'));
                    });

                    rows.models = _(rows.models).sortBy(function (model) {
                        return _.indexOf(updated, model.get('id'));
                    });

                    $view.model.set('content', rows);

                }
            });
        },

        closeReveal: function () {
            var reveal = this.$el.find('.reveal-modal');
            ptPbApp.removeEditor('pt_pb_editor');
            reveal.trigger('reveal:close');
            setTimeout(function () {
                reveal.remove();
            }, 500);
        }


    });

    ptPbApp.RowView = Backbone.View.extend({
        template: ptPbApp.template('row'),
        className: 'pt-pb-row clearfix',
        editTemplate: ptPbApp.template('row-edit'),

        events: {
            'click .pt-pb-remove-row': 'removeRow',
            'click .pt-pb-settings-row': 'editRow',
            'click .save-row': 'saveRow',
            'click .slider .pt-pb-settings-slider': 'editSlider',
            'click .gallery .pt-pb-settings-gallery': 'editGallery',
            'click .pt-pb-row-toggle': 'toggleRow',
            'update-columns': 'updateColumns',
        },


        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            this.addRow(this.model);

            this.makeColumnsSortable();

            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        addRow: function (row) {
            var $content = this.$el.find('.pt-pb-row-content'),
                $view = this,
                row = new ptPbApp.RowModel(row.attributes || {}),
                rowId = row.attributes.id,
                rowContent = row.get('content');

            if (row.get('type') === 'columns' && rowContent && rowContent.models) {
                _.each(rowContent.models, function (column, ind) {
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
            }
        },

        toggleRow: function (e) {
            e.preventDefault();

            var $this = $(e.target),
                $head = $this.closest('.pt-pb-row-header'),
                $body = $head.siblings('.pt-pb-row-content');

            if ($body.css('display') === undefined || $body.css('display') === 'block') {
                $body.slideUp(400, function () {
                    $head.addClass('close');
                });
            } else {
                $body.slideDown(400, function () {
                    $head.removeClass('close');
                });
            }
        },

        expandRow: function( callback ){
            var $head = this.$el.find('.pt-pb-row-header'),
                $body = $head.siblings('.pt-pb-row-content');
            $body.slideDown(400, function () {
                $head.removeClass('close');
                if(typeof callback === 'function' )
                    callback();
            });
        },

        removeRow: function (e, confirm) {
            e.preventDefault();

            var confirm = confirm ? confirm : window.confirm("Are you sure you want to remove this row ? This step cannot be undone");

            if (confirm) {
                var $row = $(e.target).closest('.pt-pb-row'),
                    rowId = this.model.get('id'),
                    section = ptPbApp.Sections.get(this.model.get('parent'));

                section.get('content').remove(rowId);
                $row.remove();
            }
        },

        editRow: function (e) {
            e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-row-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        saveRow: function (e) {
            this.model.set(this.$el.find('form').serializeObject());
            this.$el.find('.reveal-modal').trigger('reveal:close');
            ptPbApp.setHiddenInputAll(this.model, this.$el);
        },

        editSlider: function (e) {
            e.preventDefault();
            var $view = this;
            this.expandRow(function(){
                $view.$el.find('.pt-pb-slide:first').trigger('edit-slider');
            });
        },

        editGallery: function (e) {
            e.preventDefault();
            var $view = this;
            this.expandRow(function(){
                $view.$el.find('.pt-pb-gimage:first').trigger('edit-gallery');
            });
        },

        insertColumns: function (columns) {
            var contentArr = new ptPbApp.ColumnCollection(),
                $content = this.$el.find('.pt-pb-row-content'),
                rowId = this.model.get('id'),
                $view = this;
            _.each(columns, function (col, index) {
                var column = {};
                column['parent'] = rowId;
                column['type'] = col;
                column['id'] = rowId + '__col__' + (index + 1);
                if (columns.length === (index + 1))
                    column['last'] = true;

                var model = new ptPbApp.ColumnModel(column);
                contentArr.add(model);

                $content.append(new ptPbApp.ColumnView({
                    model: model,
                    parent: $view.model
                }).render().el);
            });
            this.model.set('content', contentArr);
        },

        updateColumns: function (e, layouts) {

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
            _.each(columns, function (col, index) {
                var column = {},
                    model;
                if (models.models[index] !== undefined) {
                    model = models.models[index];
                    model.set('type', col);
                    contentArr.add(model);
                } else {
                    column['parent'] = $view.model.id;
                    column['type'] = col;
                    column['id'] = $view.model.id + '__col__' + (index + 1);
                    model = new ptPbApp.ColumnModel(column);
                    contentArr.add(model);
                }

                $content.append(new ptPbApp.ColumnView({
                    model: model,
                    parent: $view.model
                }).render().el);

                if (model.get('content') && model.get('content').attributes !== undefined) {
                    var col = model.get('content');
                    ptPbApp.setColumnContent(col.get('parent'), col);
                }

            });

            this.model.set('content', contentArr);

        },

        _addSlider: function (params) {

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

            $content.append(new ptPbApp.Modules.SliderView({
                model: slider
            }).render().el);

            return slider;
        },

        _addGallery: function (row, params) {
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

        makeColumnsSortable: function () {
            var $view = this;
            $view.$el.sortable({
                handle: '.pt-pb-column-sortable',
                placeholder: 'sortable-placeholder pt-pb-column',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column',
                start: function (e, ui) {
                    var col = ui.item.attr('class').replace(/ ?pt-pb-column ?/, '');
                    ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px"></div>');
                },
                update: function (event, ui) {
                    var updated = [],
                        columns = $view.model.get('content');
                    $(this).find('.pt-pb-column').each(function () {
                        updated.push($(this).attr('id'));
                    });

                    columns.models = _(columns.models).sortBy(function (model) {
                        return _.indexOf(updated, model.get('id'));
                    });

                    $view.model.set('content', columns);
                }
            });
        },

    });

    ptPbApp.ColumnView = Backbone.View.extend({
        template: ptPbApp.template('column'),
        editTemplate: ptPbApp.template('column-edit'),
        moduleTemplate: ptPbApp.template('insert-module'),
        className: 'pt-pb-column',
        colClass: 'pt-pb-col-1-1',
        $parent: '',
        cache: {
            parent: null
        },

        events: {
            'click .pt-pb-insert-module': 'insertModuleDialog',
            'click .column-module': 'insertModule',
            'remove-module': 'removeModule'
        },

        initialize: function (options) {
            this.$parent = $('#' + this.model.get('parent'));
            this.cache.parent = options.parent;
            this.colClass = 'pt-pb-col-' + this.model.get('type');
            if (this.model.get('last') === true)
                this.colClass += ' last';
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                }).addClass(this.colClass);

            var $content = this.$el.children('.pt-pb-column-content'),
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

            ptPbApp.setHiddenInputAll(this.model, this.$el);

            return this;
        },

        insertModuleDialog: function (e) {
            e.preventDefault();
            e.stopPropagation();
            this.$el.append($('<div />').html(this.moduleTemplate({
                modules: ptPbApp.ModulesList
            })).addClass('pt-pb-insert-modules reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        insertModule: function (e) {
            e.preventDefault();
            var $target = $(e.target).hasClass('column-module') ? $(e.target) : $(e.target).parent(),
                module = $target.data('module').replace(/ /g, '').toProperCase();

            if (!ptPbApp.Modules[module + 'Model']) return;

            var $col = this,
                $content = this.$el.children('.pt-pb-column-content'),
                modules = this.model.get('content'),
                moduleNum = this._getModuleNum(),
                atts = {};

            atts['parent'] = this.model.id;
            atts['id'] = this.model.id + '__module__' + moduleNum;
            var model = new ptPbApp.Modules[module + 'Model'](atts),
                view = new ptPbApp.Modules[module + 'View']({
                    model: model
                });

            $content.append(view.render().el);
            modules.push(model);
            this.model.set('content', modules);
            this.cache.parent.get('content').add(this.model, {merge: true});
            this.closeReveal(true);
            view.editModel();

        },

        removeModule: function (e, data) {
            var confirm = window.confirm("Are you sure you want to remove this Module ? This step cannot be undone");
            if (confirm && data && data.moduleId) {
                var modules = modules = this.model.get('content');
                _.each(modules, function(module, i) {
                    if( data.moduleId === module.get('id') )
                        modules.splice(i, 1);
                });
                this.model.set('content', modules);
                $('#' + data.moduleId).remove();
            }
        },

        closeReveal: function (immediate) {
            var reveal = this.$el.find('.reveal-modal');
            if (immediate) reveal.remove();
            reveal.trigger('reveal:close');
            setTimeout(function () {
                reveal.remove();
            }, 500);
        },

        _getModuleNum: function(){
            var num = this.model.get('moduleNum');
            ++num;
            this.model.set('moduleNum', num);
            return num;
        }

    });

    ptPbApp.Modules.SliderView = Backbone.View.extend({
        template: ptPbApp.template('module-slider'),
        editTemplate: ptPbApp.template('module-slider-edit'),
        className: 'pt-pb-slide',

        events: {
            'click .save-slider': 'updateSlider',
            'edit-slider': 'editModel',
            'click .pt-pb-insert-slide': 'insertSlide',
            'click .edit-module-slide .remove': 'removeSlide'
        },

        initialize: function () {
            if (this.model.get('slides') === '') {
                this.model.set('slides', new ptPbApp.SlideCollection())
            }
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var view = this;
            _.each(this.model.get('slides').models, function (slide, ind) {
                view._addSlide(slide);
            });
            this.makeSlidesSortable();
            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        makeSlidesSortable: function () {
            var $view = this;
            $view.$el.children('.slider-container').sortable({
                handle: '.module-controls',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column'
            });
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-slider-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateSlider: function () {
            var $view = this;
            $view.model.set(this.$el.find('.edit-content form').serializeObject());
            $view.$el.find('.admin-label').first().text($view.model.get('admin_label'));
            $view.$el.find('.reveal-modal').trigger('reveal:close');
            ptPbApp.setHiddenInputAll(this.model, this.$el);
        },

        insertSlide: function (e) {
            e.preventDefault();
            var slide = this._addSlide(null, true);
        },

        _addSlide: function (params, animate) {
            var slide = params || new ptPbApp.SlideModel({}),
                slides = this.model.get('slides'),
                $content = this.$el.find('.slider-container'),
                newId = this.model.id + '__' + this._getItemNum();

            if (params && params.text)
                slide.set('content', params.text)

            slide.set({
                'parent': this.model.id,
                'id': newId
            });

            slides.add(slide, {
                merge: true
            });
            this.model.set('slides', slides);

            var $slide = $(new ptPbApp.Modules.SlideView({
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

        removeSlide: function (e) {
            e.preventDefault();
            var confirm = window.confirm("Are you sure you want to remove this slide ? This step cannot be undone");
            if (confirm) {
                var $slide = $(e.target).closest('.pt-pb-column'),
                    id = $slide.attr('id');

                this.model.get('slides').remove(id);
                $slide.remove();
            }
        },

         _getItemNum: function(){
            var num = this.model.get('itemNum');
            ++num;
            this.model.set('itemNum', num);
            return num;
        }

    });

    ptPbApp.Modules.SlideView = Backbone.View.extend({
        template: ptPbApp.template('module-slide'),
        editTemplate: ptPbApp.template('module-slide-edit'),
        className: 'pt-pb-column pt-pb-col-1-1',

        events: {
            'click .save-slide': 'updateSlide',
            'click .edit-module-slide .edit': 'editModel',
            'click .slide-content-preview': 'editModel'
        },

        initialize: function () {
            if (this.model.get('content') == '' && this.model.get('text'))
                this.model.set('content', this.model.get('text'));
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            ptPbApp.setHiddenInputAll(this.model, this.$el);

            return this;
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-slide-edit reveal-modal'));
            ptPbApp.createEditor(this.$el, this.model.get('content'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateSlide: function () {

            var $view = this,
                $reveal = $view.$el.find('.reveal-modal');

            $view.model.set($view.$el.find('.edit-content form').serializeObject());
            this.model.set('content', ptPbApp.getContent());
            ptPbApp.removeEditor('pt_pb_editor');
            $reveal.trigger('reveal:close');

            setTimeout(function () {
                $view.render();
            }, 300);
        }

    });

    ptPbApp.GalleryView = Backbone.View.extend({
        template: ptPbApp.template('module-gallery'),
        editTemplate: ptPbApp.template('module-gallery-edit'),
        className: 'pt-pb-gimage',

        events: {
            'click .save-gallery': 'updateGallery',
            'edit-gallery': 'editModel',
            'click .pt-pb-insert-gimage': 'insertImage',
            'click .edit-module-gimage .remove': 'removeImage'
        },

        initialize: function () {
            if (this.model.get('images') === '') {
                var model = new ptPbApp.GImageCollection();
                for (var i = 1; i < 5; i++) {
                    var image = new ptPbApp.GImageModel({
                        'parent': this.model.id,
                        'id': this.model.id + '__' + this._getItemNum()
                    });
                    model.add(image);
                }
                ;

                this.model.set('images', model);
            }

        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            var view = this;
            _.each(this.model.get('images').models, function (image, ind) {
                view._addImage(image, false);
            });
            this.makeImagesSortable();
            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        makeImagesSortable: function () {
            var $view = this;
            $view.$el.find('.images-container').sortable({
                handle: '.module-controls',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.pt-pb-column'
            });
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-gallery-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateGallery: function () {
            var $view = this;
            $view.model.set(this.$el.find('.edit-content form').serializeObject());
            $view.$el.find('.admin-label').first().text($view.model.get('admin_label'));
            $view.$el.find('.reveal-modal').trigger('reveal:close');
            ptPbApp.setHiddenInputAll(this.model, this.$el);
        },

        insertImage: function (e) {
            if (e) {
                e.preventDefault();
            }
            var slide = this._addImage(null, true);
        },

        _addImage: function (params, animate) {
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

        removeImage: function (e) {
            e.preventDefault();
            var confirm = window.confirm("Are you sure you want to remove this Image ? This step cannot be undone");
            if (confirm) {
                var $image = $(e.target).closest('.pt-pb-column'),
                    id = $image.attr('id');
                this.model.get('images').remove(id);
                $image.remove();
            }
        },

         _getItemNum: function(){
            var num = this.model.get('itemNum');
            ++num;
            this.model.set('itemNum', num);
            return num;
        }

    });

    ptPbApp.GImageView = Backbone.View.extend({
        template: ptPbApp.template('module-gimage'),
        editTemplate: ptPbApp.template('module-gimage-edit'),
        className: 'pt-pb-column pt-pb-col-1-4',

        events: {
            'click .save-gimage': 'updateImage',
            'click .edit-module-gimage .edit': 'editModel',
            'click .gimage-content-preview': 'editModel'
        },

        initialize: function () {

        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            ptPbApp.setHiddenInputAll(this.model, this.$el);

            return this;
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-slide-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateImage: function () {

            var $view = this,
                $reveal = $view.$el.find('.reveal-modal');

            $view.model.set($view.$el.find('.edit-content form').serializeObject());
            $reveal.trigger('reveal:close');

            setTimeout(function () {
                $view.render();
            }, 300);
        }

    });

    ptPbApp.Modules.ImageView = Backbone.View.extend({
        template: ptPbApp.template('module-image'),
        editTemplate: ptPbApp.template('module-image-edit'),
        className: 'pt-pb-module-preview',

        events: {
            'click .save-image': 'updateImage',
            'click .edit-module .edit': 'editModel',
            'click .content-preview': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function () {
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-image-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        removeModel: function (e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {moduleId: this.model.get('id')});
        },

        updateImage: function () {

            var id = this.model.get('id'),
                parent = this.model.get('parent'),
                view = this;

            this.model.set(this.$el.find('.edit-content form').serializeObject());

            ptPbApp.setColumnContent(parent, this.model);

            this.$el.find('.reveal-modal').trigger('reveal:close');

            setTimeout(function () {
                view.render();
            }, 300);
        }

    });


    ptPbApp.Modules.TextView = Backbone.View.extend({
        template: ptPbApp.template('module-text'),
        editTemplate: ptPbApp.template('module-text-edit'),
        className: 'pt-pb-module-preview',

        events: {
            'click .content-preview': 'editModel',
            'click .save-text': 'updateContent',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function () {
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-image-edit reveal-modal'));
            ptPbApp.createEditor(this.$el, this.model.get('content'));
            this.$el.find('.reveal-modal').reveal();
        },

        removeModel: function (e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {moduleId: this.model.get('id')})
        },

        updateContent: function (e) {
            var id = this.model.get('id'),
                parent = this.model.get('parent'),
                view = this;

            this.model.set(this.$el.find('.edit-content form').serializeObject());
            this.model.set('content', ptPbApp.getContent());

            ptPbApp.setColumnContent(parent, this.model);

            ptPbApp.removeEditor('pt_pb_editor');
            this.$el.find('.reveal-modal').trigger('reveal:close');
            setTimeout(function () {
                view.render();
            }, 300);
        }

    });


    ptPbApp.Modules.HovericonView = Backbone.View.extend({
        template: ptPbApp.template('module-hovericon'),
        editTemplate: ptPbApp.template('module-hovericon-edit'),
        className: 'pt-pb-module-preview',

        events: {
            'click .content-preview': 'editModel',
            'click .save-icon': 'updateModel',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function () {
        },

        render: function (cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            ptPbApp.setHiddenInputAll(this.model, this.$el);
            return this;
        },

        editModel: function (e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('pt-pb-hovericon-edit reveal-modal'));
            ptPbApp.createEditor(this.$el, this.model.get('content'));
            this.$el.find('.reveal-modal').reveal();

        },

        removeModel: function (e) {
            e.preventDefault();
            $('#' + this.model.get('parent')).trigger('remove-module', {moduleId: this.model.get('id')});
        },

        updateModel: function (e) {
            var id = this.model.get('id'),
                parent = this.model.get('parent'),
                view = this;

            this.model.set(this.$el.find('.edit-content form').serializeObject());
            this.model.set('content', ptPbApp.getContent());

            ptPbApp.setColumnContent(parent, this.model);

            ptPbApp.removeEditor('pt_pb_editor');
            this.$el.find('.reveal-modal').trigger('reveal:close');
            setTimeout(function () {
                view.render();
            }, 300);
        }

    });


})(window, Backbone, jQuery, _, ptPbApp);
