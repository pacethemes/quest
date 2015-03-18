/* global Backbone, jQuery, _, wp:true */
var trPbApp = trPbApp || {},
    $trPbApp = $trPbApp || jQuery(trPbApp);

(function(window, Backbone, $, _, trPbApp, $trPbApp) {
    'use strict';

    trPbApp.SectionView = Backbone.View.extend({
        template: _.template($('#tr-pb-section-template').html()),
        $editTemplateId: $('#tr-pb-section-edit-template'),
        editTemplate: '',
        $columnTemplateId: $('#tr-pb-insert-column-template'),
        columnTemplate: '',
        className: 'tr-pb-section grid',

        events: {
            'click .tr-pb-section-toggle': 'toggleSection',
            'click .tr-pb-settings-section': 'editSection',
            'click .tr-pb-clone-section': 'cloneSection',
            'click .tr-pb-remove': 'removeSection',
            'click .save-section': 'saveSection',
            'click .tr-pb-insert-column': 'insertColumnsDialog',
            'click .tr-pb-insert-slider': 'insertSlider',
            'click .tr-pb-insert-gallery': 'insertGallery',
            'click .close-reveal-modal': 'closeReveal',
            'click .close-model': 'closeReveal',
            'click .insert .column-layouts li': 'insertColumns',
            'click .update .column-layouts li': 'updateColumns',
            'click .edit-columns': 'insertColumnsDialog'
        },

        initialize: function(options) {
            this.editTemplate = _.template(this.$editTemplateId.html());
            this.columnTemplate = _.template(this.$columnTemplateId.html());
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            //this.$el.find('.tr-pb-content').css('background-image', 'url('+this.model.get('bg_image')+')');
            var $content = this.$el.find('.tr-pb-content'),
                $view = this,
                content = this.model.get('content');

            if (content.length > 0) {
                $content.html('');
                _.each(content.models, function(column, ind) {
                    var model = new trPbApp.ColumnModel(column.attributes || {});
                    model.set('parent', $view.model.get('id'));
                    model.set('id', $view.model.id + '__col__' + (ind + 1));
                    $content.append(new trPbApp.ColumnView({
                        model: model
                    }).render().el);
                });
            } else if (content.length === undefined && content.attributes) {
                this._addSlider(content);
            }

            this.makeColumnsSortable();

            return this;
        },

        updateInputs: function() {
            trPbApp.setHiddenInputAll(this.model);
            var content = this.model.get('content');
            if (content.length > 0) {
                _.each(content.models, function(column, ind) {
                    trPbApp.setHiddenInputAll(column);
                    var module = column.get('content');
                    if (module.length === 0) {
                        return;
                    }
                    trPbApp.setHiddenInputAll(module);
                });
            } else if (content.attributes !== undefined) {
                trPbApp.setHiddenInputAll(content);
                _.each(content.get('slides').models, function(slide, ind) {
                    trPbApp.setHiddenInputAll(slide);
                });
            }

        },

        editSection: function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('tr-pb-section-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        cloneSection: function(e) {
            e.preventDefault();
            e.stopPropagation();
            trPbApp.AddSection(this.model, trPbApp.Sections.indexOf(this.model) + 1);
        },

        saveSection: function(e) {

            this.model.set(this.$el.find('form').serializeObject());
            this.closeReveal();
            trPbApp.setHiddenInputAll(this.model);
        },

        removeSection: function(e) {
            e.preventDefault();

            var confirm = window.confirm("Are you sure you want to remove this section ? This step cannot be undone");

            if (confirm) {
                trPbApp.Sections.remove(this.model);
                $(e.target).closest('.tr-pb-section').remove();
            }
        },

        toggleSection: function(e) {
            e.preventDefault();

            var $this = $(e.target),
                $head = $this.closest('.tr-pb-header'),
                $body = $head.siblings('.tr-pb-content-wrap');

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
            var edit = e.target.className.match(/fa-|edit-columns/) !== null ? true : false,
                cssClass = edit ? 'tr-pb-insert-columns update reveal-modal' : 'tr-pb-insert-columns insert reveal-modal';
            this.$el.append($('<div />').html(this.columnTemplate()).addClass(cssClass));
            this.$el.find('.tr-pb-column-edit').removeClass('hidden');
            this.$el.find('.reveal-modal').reveal();
        },

        insertColumns: function(e) {
            var $target = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li'),
                columns = $target.data('layout').replace(/ /g, '').split(','),
                $view = this,
                $content = this.$el.find('.tr-pb-content'),
                contentArr = new trPbApp.ColumnCollection(),
                order = [];

            $content.html('');

            _.each(columns, function(col, index) {
                var column = {};
                column['parent'] = $view.model.id;
                column['type'] = col;
                column['id'] = $view.model.id + '__col__' + (index + 1);
                if (columns.length === (index + 1))
                    column['last'] = true;
                order.push(column['id']);
                var model = new trPbApp.ColumnModel(column);
                contentArr.add(model);

                $content.append(new trPbApp.ColumnView({
                    model: model
                }).render().el);
                trPbApp.setHiddenInputAll(model);
            });

            this.model.set('content', contentArr);
            this.closeReveal();

        },

        updateColumns: function(e) {
            var $target = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li'),
                columns = $target.data('layout').replace(/ /g, '').split(','),
                $view = this,
                $content = this.$el.find('.tr-pb-content'),
                contentArr = new trPbApp.ColumnCollection(),
                models = $view.model.get('content'),
                order = [];

            $content.html('');
            _.each(columns, function(col, index) {
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
                    order.push(column['id']);
                    model = new trPbApp.ColumnModel(column);
                    contentArr.add(model);
                }

                $content.append(new trPbApp.ColumnView({
                    model: model
                }).render().el);
                trPbApp.setHiddenInputAll(model);
                if (model.get('content') && model.get('content').attributes !== undefined) {
                    var col = model.get('content');
                    trPbApp.setHiddenInputAll(col);
                    trPbApp.setColumnContent(col.get('parent'), col);
                }

            });

            this.model.set('content', contentArr);
            //this.setColumnOrder(order);
            this.closeReveal();

        },

        makeColumnsSortable: function() {
            var $view = this;
            $view.$el.sortable({
                handle: '.tr-pb-column-sortable',
                placeholder: 'sortable-placeholder tr-pb-column',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.tr-pb-column',
                // axis: 'x',
                start: function(e, ui) {
                    var col = ui.item.attr('class').replace(/ ?tr-pb-column ?/, '');
                    ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px"></div>');
                },
                update: function(event, ui) {
                    var updated = [],
                        columns = $view.model.get('content');
                    $(this).find('.tr-pb-column').each(function() {
                        updated.push($(this).attr('id'));
                    })

                    columns.models = _(columns.models).sortBy(function(model) {
                        return _.indexOf(updated, model.get('id'));
                    });

                    $view.model.set('content', columns);
                }
            });
        },

        insertSlider: function(e) {
            e.preventDefault();
            this._addSlider();
        },

        _addSlider: function(params) {

            var sliderId = this.model.id + '__slider',
                slider = params || new trPbApp.SliderModel({}),
                $content = this.$el.find('.tr-pb-content');

            slider.set({
                'parent': this.model.id,
                'id': sliderId
            });

            $content.html('');

            $content.append(new trPbApp.Modules.SliderView({
                model: slider
            }).render().el);

            this.model.set('content', slider);
            //trPbApp.setHiddenInputAll(slider);
        },

        insertGallery: function(e){
            e.preventDefault();
        },

        closeReveal: function() {
            var reveal = this.$el.find('.reveal-modal');
            reveal.trigger('reveal:close');
            setTimeout(function() {
                reveal.remove();
            }, 500);
        }

        // setColumnOrder: function(order) {
        //     trPbApp.setHiddenInput(this.model.get('id') + '__order', order.join(",").replace(/tr_pb_section__/ig, ''));
        // }


    });

    trPbApp.ColumnView = Backbone.View.extend({
        template: _.template($('#tr-pb-column-template').html()),
        editTemplate: _.template($('#tr-pb-column-edit-template').html()),
        $moduleTemplateId: $('#tr-pb-insert-module-template'),
        moduleTemplate: '',
        className: 'tr-pb-column',
        colClass: 'tr-pb-col-1-1',
        $parent: '',

        events: {
            'click .tr-pb-insert-module': 'insertModuleDialog',
            'click .column-module': 'insertModule',
            'remove-module': 'removeModule'
        },

        initialize: function(options) {
            this.$parent = $('#' + this.model.get('parent'));
            this.colClass = 'tr-pb-col-' + this.model.get('type');
            if (this.model.get('last') === true)
                this.colClass += ' last';
            this.moduleTemplate = _.template(this.$moduleTemplateId.html());
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                }).addClass(this.colClass);

            var $content = this.$el.children('.tr-pb-column-content'),
                $view = this,
                content = this.model.get('content');
            if (content.attributes !== undefined) {
                $content.html('');
                var module = content.get('type').toProperCase();

                $content.append(new trPbApp.Modules[module + 'View']({
                    model: content
                }).render().el);
            }

            return this;
        },

        insertModuleDialog: function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.$el.append($('<div />').html(this.moduleTemplate({
                modules: trPbApp.ModulesList
            })).addClass('tr-pb-insert-modules reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        insertModule: function(e) {
            e.preventDefault();
            var $target = e.target.tagName.toUpperCase() === 'LI' ? $(e.target) : $(e.target).closest('li'),
                module = $target.data('module').replace(/ /g, '').toProperCase();

            if (!trPbApp.Modules[module + 'Model']) return;

            var $col = this,
                $content = this.$el.children('.tr-pb-column-content'),
                atts = {};


            $content.html('');

            atts['parent'] = this.model.id;
            atts['id'] = this.model.id + '__module';
            var model = new trPbApp.Modules[module + 'Model'](atts),
                view = new trPbApp.Modules[module + 'View']({
                    model: model
                });

            $content.append(view.render().el);
            this.model.set('content', model);
            trPbApp.setHiddenInputAll(model);
            this.closeReveal(true);
            view.editModel();

        },

        removeModule: function(e){
            var confirm = window.confirm("Are you sure you want to remove this Module ? This step cannot be undone");
            if (confirm) {
                this.model.set('content', []);
                this.render();
            }
        },

        closeReveal: function(immediate) {
            var reveal = this.$el.find('.reveal-modal');
            if (immediate) reveal.remove();
            reveal.trigger('reveal:close');
            setTimeout(function() {
                reveal.remove();
            }, 500);
        },

    });

    trPbApp.Modules.SliderView = Backbone.View.extend({
        template: _.template($('#tr-pb-module-slider-template').html()),
        $editTemplateId: $('#tr-pb-module-slider-edit-template'),
        editTemplate: '',
        className: 'tr-pb-column tr-pb-col-1-1 tr-pb-slide',

        events: {
            'click .save-slider': 'updateSlider',
            'click .edit-module-slider .edit': 'editModel',
            'click .tr-pb-insert-slide': 'insertSlide',
            'click .edit-module-slide .remove': 'removeSlide'
        },

        initialize: function() {
            this.editTemplate = _.template(this.$editTemplateId.html());
            if (this.model.get('slides') === '') {
                this.model.set('slides', new trPbApp.SlideCollection())
            }
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
            return this;
        },

        makeSlidesSortable: function() {
            var $view = this;
            $view.$el.sortable({
                handle: '.tr-pb-column-sortable',
                // placeholder: 'sortable-placeholder tr-pb-column',
                forcePlaceholderSizeType: true,
                distance: 5,
                tolerance: 'pointer',
                items: '.tr-pb-column',
                // axis: 'x',
                start: function(e, ui) {
                    //var col = ui.item.attr('class').replace(/ ?tr-pb-column ?/, '');
                    //ui.placeholder.addClass(col).html('<div class="placeholder-inner" style="height:' + ui.item.height() + 'px"></div>');
                },
                update: function(event, ui) {

                }
            });
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('tr-pb-slider-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateSlider: function() {
            var $view = this;
            $view.model.set(this.$el.find('.edit-content form').serializeObject());
            $view.$el.find('.admin-label').first().text($view.model.get('admin_label'));
            $view.$el.find('.reveal-modal').trigger('reveal:close');
            trPbApp.setHiddenInputAll(this.model);
        },

        insertSlide: function(e) {
            e.preventDefault();
            var slide = this._addSlide();
            trPbApp.setHiddenInputAll(slide);
        },

        _addSlide: function(params) {
            var slide = params || new trPbApp.SlideModel({}),
                slides = this.model.get('slides'),
                $content = this.$el.find('.content-preview');

            slide.set({
                'parent': this.model.id,
                'id': params ? params.id : this.model.id + '__' + (slides.length + 1)
            });

            slides.add(slide, {
                merge: true
            });
            this.model.set('slides', slides);

            var $slide = $(new trPbApp.Modules.SlideView({
                            model: slide
                        }).render().el).hide();
            
            $content.find('.tr-pb-add-slide').before($slide);
            $slide.slideDown();
            trPbApp.scrollTo($slide.offset().top - 300);
            return slide;
        },

        removeSlide: function(e) {
            e.preventDefault();
            var confirm = window.confirm("Are you sure you want to remove this slide ? This step cannot be undone");
            if (confirm) {
                var $slide = $(e.target).closest('.tr-pb-column'),
                    id = $slide.attr('id');

                this.model.get('slides').remove(id);
                $slide.remove();
            }
        }

    });

    trPbApp.Modules.SlideView = Backbone.View.extend({
        template: _.template($('#tr-pb-module-slide-template').html()),
        $editTemplateId: $('#tr-pb-module-slide-edit-template'),
        editTemplate: '',
        className: 'tr-pb-column tr-pb-col-1-1',

        events: {
            'click .save-slide': 'updateSlide',
            'click .edit-module-slide .edit': 'editModel'
        },

        initialize: function() {
            this.editTemplate = _.template(this.$editTemplateId.html());
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });

            if (this.$el.index() > -1) {
                trPbApp.setHiddenInputAll(this.model);
            }

            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('tr-pb-slide-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        updateSlide: function() {

            var $view = this,
                $reveal = $view.$el.find('.reveal-modal');

            $view.model.set($view.$el.find('.edit-content form').serializeObject());
            $reveal.trigger('reveal:close');

            setTimeout(function() {
                $view.render();
            }, 300);
        }

    });

    trPbApp.Modules.ImageView = Backbone.View.extend({
        template: _.template($('#tr-pb-module-image-template').html()),
        $editTemplateId: $('#tr-pb-module-image-edit-template'),
        editTemplate: '',

        events: {
            'click .save-image': 'updateImage',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {
            this.editTemplate = _.template(this.$editTemplateId.html());
        },

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            this.$el.append($('<div />').html(this.editTemplate(this.model.toJSON())).addClass('tr-pb-image-edit reveal-modal'));
            this.$el.find('.reveal-modal').reveal();
        },

        removeModel: function(e){
            e.preventDefault();
            $('#'+this.model.get('parent')).trigger('remove-module')
        },

        updateImage: function() {

            var id = this.model.get('id'),
                parent = this.model.get('parent'),
                view = this;

            this.model.set(this.$el.find('.edit-content form').serializeObject());

            trPbApp.setColumnContent(parent, this.model);
            trPbApp.setHiddenInputAll(this.model);

            this.$el.find('.reveal-modal').trigger('reveal:close');

            setTimeout(function() {
                view.render();
            }, 300);
        }

    });


    trPbApp.Modules.TextView = Backbone.View.extend({
        template: _.template($('#tr-pb-module-text-template').html()),

        events: {
            'click .content-preview': 'editModel',
            'content:update': 'updateContent',
            'click .edit-module .edit': 'editModel',
            'click .edit-module .remove': 'removeModel'
        },

        initialize: function() {},

        render: function(cls) {
            this.$el.html(this.template(this.model.toJSON()))
                .attr({
                    'id': this.model.id
                });
            return this;
        },

        editModel: function(e) {
            if (e) e.preventDefault();
            trPbApp.setContent(this.$el.parent().siblings('textarea.content-text').val());
            trPbApp.cache.$editorModal.attr('data-textarea', this.model.id).reveal().find('.js-animations').val(this.model.get('animation'));
            trPbApp.cache.$editorModal.find('input[name=admin_label]').val(this.model.get('admin_label'));
        },

        removeModel: function(e){
            e.preventDefault();
            $('#'+this.model.get('parent')).trigger('remove-module')
        },

        updateContent: function(e, data) {
            this.model.set(data);
            trPbApp.setHiddenInputAll(this.model);
            this.$el.find('.content-preview').html(this.model.get('content'));
            this.$el.find('.admin-label').text(this.model.get('admin_label'));
        }

    });

})(window, Backbone, jQuery, _, trPbApp, $trPbApp);


String.prototype.toProperCase = function() {
    return this.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
};
