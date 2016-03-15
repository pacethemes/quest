/* global Backbone, jQuery, _, ptPbAppPlugins */

var ptPbApp = ptPbApp || {};
ptPbApp.Models = ptPbApp.Models || {};

(function(window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.Models.Section = Backbone.Model.extend({
        defaults: {
            id: null,
            css_class: '',
            content_type: 'boxed',
            bg_image: '',
            bg_attach: 'fixed',
            bg_color: '',
            text_color: '',
            padding_top: '30px',
            padding_bottom: '30px',
            border_top_width: '0px',
            border_bottom_width: '0px',
            border_top_color: '#e5e5e5',
            border_bottom_color: '#e5e5e5',
            hasRows: true,
            rowNum: 0,
            admin_label: 'Section'
        },

        initialize: function() {
            if (this.get('id') === null || !this.get('id')) {
                this.set('id', ['pt_pb_section_', ptPbApp.Sections.length + 1, Math.round(new Date().valueOf() / 1000)].join('_'));
            }

            this.importRows();

            ptPbApp.ModulesList = {};
            _.each(ptPbApp.Models, function(val, key) {
                if (key.match(/.Module/)) {
                    var pluginName = key.replace('Module', '');
                    if(ptPbAppPlugins.hasOwnProperty(pluginName)){
                        if(parseInt(ptPbAppPlugins[pluginName]) === 1){
                            ptPbApp.ModulesList[key] = ptPbApp.Models[key].prototype.defaults;
                        } else {
                            delete ptPbApp.Models[key] ;
                            delete ptPbApp.Views[key] ;
                        }
                    } else {
                        ptPbApp.ModulesList[key] = ptPbApp.Models[key].prototype.defaults;
                    }
                }
            });

        },

        importRows: function() {

            this.set({
                'rows': new ptPbApp.Collections.Row(),
                'pre': ptPbApp.getInputPrefix(this.get('id'))
            });

            if(this.get('col')){
                this.set('row', [{'col': this.get('col')}]);
            }

            _.each(this.get('row') || [], this.addRow, this);

            this.unset('row', {
                silent: true
            });
        },

        addRow: function(attr) {
            attr = attr || {};
            attr.id = [this.get('id'), 'row', this._getRowNum()].join('__');
            var row = new ptPbApp.Models.Row(attr);
            this.get('rows').add(row);
            return row;
        },

        toJSON: function(options) {
            var json = Backbone.Model.prototype.toJSON.call(this);
            if (options && options.rows) {
                delete json.rows;
                json.row = this.get('rows').toJSON({
                    content: true
                });
            }
            return json;
        },

        _getRowNum: function() {
            return this.set('rowNum', this.get('rowNum') + 1).get('rowNum');
        }

    });

    ptPbApp.Models.Row = Backbone.Model.extend({
        defaults: {
            id: '',
            parent: '',
            type: 'columns',
            content_type: 'parent',
            anim_seq: 'yes',
            padding_top: '0px',
            padding_bottom: '0px',
            vertical_align: 'default',
            gutter: 'yes',
            admin_label: ''
        },

        initialize: function() {
            this.set('pre', ptPbApp.getInputPrefix(this.get('id')));
            this.importContent();
        },

        importContent: function() {
            var id = this.get('id');
            this.set('content', new ptPbApp.Collections.Column());

            if (this.get('col')) {
                _.each(this.get('col') || [], this.addColumn, this);

                this.set({
                    'type': 'columns',
                    'admin_label' : this.get('admin_label') === '' ? 'Row - Columns' : this.get('admin_label')
                    })
                    .unset('col', {
                        silent: true
                    });
            } else if (this.get('slider')) {

                var slides = _.filter(this.get('slider'), function(val, key) {
                        return $.isNumeric(key);
                    }),
                    sliderOpts = _.extend(_.reduce(this.get('slider'), function(obj, val, key) {
                        if (!$.isNumeric(key)){
                            obj[key] = val;
                        }
                        return obj;
                    }, {}), {id: this.get('id') + '__slider' });

                this.set({
                        'content': this.addSlider(sliderOpts, slides),
                        'type': 'slider',
                        'admin_label' : this.get('admin_label') === '' ? 'Row - Image Slider' : this.get('admin_label')
                    })
                    .unset('slider', {
                        silent: true
                    });

            } else if (this.get('gallery')) {

                var images = _.filter(this.get('gallery'), function(val, key) {
                        return $.isNumeric(key);
                    }),
                    galOpts = _.extend(_.reduce(this.get('gallery'), function(obj, val, key) {
                        if (!$.isNumeric(key)){
                            obj[key] = val;
                        }
                        return obj;
                    }, {}), {id: this.get('id') + '__gallery' });

                this.set({
                        'content': this.addGallery(galOpts, images),
                        'type': 'gallery',
                        'admin_label' : this.get('admin_label') === '' ? 'Row - Gallery' : this.get('admin_label')
                    })
                    .unset('gallery', {
                        silent: true
                    });

            } else if (this.get('generic_slider')) {
                this.set({
                        'content': this.addGenericSlider(_.extend(this.get('generic_slider'), {id: this.get('id') + '__generic_slider' } )),
                        'type': 'generic-slider',
                        'admin_label' : this.get('admin_label') === '' ? 'Row - ' + _.extend({ 'type' : '' }, this.get('generic_slider')).type + ' Slider' : this.get('admin_label')
                    })
                    .unset('generic_slider', {
                        silent: true
                    });
            } else if (this.get('columns')) {
                _.each(this.get('columns'), function(col, index) {
                    this.get('content').add(new ptPbApp.Models.Column({
                        id: [id, 'col', index + 1].join('__'),
                        type: col
                    }));
                }, this);
                this.set({
                    'admin_label' : this.get('admin_label') === '' ? 'Row - Columns' : this.get('admin_label')
                    })
                    .unset('columns', {
                        silent: true
                    });
            }
        },

        addColumn: function(attr) {
            attr = attr || {};
            attr.id = [this.get('id'), 'col', this._getColNum()].join('__');
            var col = new ptPbApp.Models.Column(attr);
            this.get('content').add(col);
            return col;
        },

        updateColumns: function(columns) {
            var content = this.get('content').toJSON({
                    modules: true
                }),
                newContent = [];

            _.each(columns, function(col, ind) {
                var c = {
                    type: col
                };
                if (ind < content.length) {
                    c = _.extend(content[ind], c);
                }
                newContent.push(c);
            });
            this.unset('content', {
                    silent: true
                })
                .set('col', newContent);
            this.importContent();
            this.trigger('content-import');
        },

        addSlider: function(opts, slides) {
            opts = opts || {};
            opts.slideArr = slides || [];
            return new ptPbApp.Models.Slider(opts);
        },

        addGenericSlider: function(opts) {
            return new ptPbApp.Models.GenericSlider(opts || {});
        },

        addGallery: function(opts, images) {
            opts = opts || {};
            opts.imageArr = images || [];
            return new ptPbApp.Models.Gallery(opts);
        },

        isGallery: function() {
            return this.get('content') !== null && typeof this.get('content') === 'object' && 'get' in this.get('content') && this.get('content').get('images');
        },

        isSlider: function() {
            return this.get('content') !== null && typeof this.get('content') === 'object' && 'get' in this.get('content') && this.get('content').get('slides');
        },

        isGenericSlider: function() {
            return this.get('content') !== null && typeof this.get('content') === 'object' && 'get' in this.get('content') && this.get('content').get('genSlider');
        },

        isColumns: function() {
            return this.get('content') !== null && typeof this.get('content') === 'object' && 'each' in this.get('content');
        },

        toJSON: function(options) {
            var json = Backbone.Model.prototype.toJSON.call(this);
            if (options && options.content) {
                if (this.isColumns()) {
                    json.col = this.get('content').toJSON({
                        modules: true,
                    });
                } else if (this.isSlider()) {
                    json.slider = this.get('content').toJSON({
                        modules: true,
                    });
                } else if (this.isGallery()) {
                    json.gallery = this.get('content').toJSON({
                        modules: true,
                    });
                }
                delete json.content;
            }
            return json;
        },

        _getColNum: function() {
            return this.get('content').length + 1;
        }

    });

    ptPbApp.Models.Column = Backbone.Model.extend({
        defaults: {
            id: '',
            content: null,
            type: '1-1',
            parent: '',
            moduleNum: 0,
            bg_color: '',
            border_left_width: '0px',
            border_right_width: '0px',
            border_left_color: '',
            border_right_color: '',
            css_class: ''
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id')),
                'moduleList': ptPbApp.ModulesList,
                'modules': new ptPbApp.Collections.Module()
            });
            this.importModules();
        },

        importModules: function() {
            if (!this.get('module')){
                return;
            }

            //if module has admin_label property then create an empty object with the module object
            //required for backward compatibility for initial versions of page builder
            if(this.get('module').hasOwnProperty('admin_label')){
                this.set('module', { 0: this.get('module') } );
            }

            //if module is an object, create an array of objects
            //required for backward compatibility for initial versions of page builder
            _.each(_.filter(this.get('module'), function(val, key) {
                return $.isNumeric(key);
            }), this.addModule, this);

            this.unset('module', {
                silent: true
            });
        },

        addModule: function(attr) {
            var moduleName = attr && attr.type ? this.properName(attr.type) : '';
            
            if (!ptPbApp.Models[moduleName]){
                return false;
            }

            var moduleNum = this._getModuleNum(),
                module = new ptPbApp.Models[moduleName](_.extend(
                    attr, {
                        id: [this.get('id'), 'module', moduleNum].join('__')
                    }));

            this.get('modules').add(module);
            return module;
        },

        properName: function(t) {
            t = t || this.get('type');
            return t.toProperCase().replace(/module/, '') + 'Module';
        },

        toJSON: function(options) {
            var json = Backbone.Model.prototype.toJSON.call(this);
            if (options && options.modules) {
                delete json.modules;
                json.module = this.get('modules').toJSON();
            }
            return json;
        },

        _getModuleNum: function() {
            var num = this.get('moduleNum');
            ++num;
            this.set('moduleNum', num);
            return num;
        }

    });

    ptPbApp.Models.Slider = Backbone.Model.extend({

        defaults: {
            id: '',
            css_class: '',
            slides: '',
            height: '400px',
            autoplay: 'true',
            fullscreen: 'false',
            animation: 'slit',
            interval: '4000',
            speed: '800',
            admin_label: 'Slider',
            title: 'Edit Slider',
            slideNum: 0
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id')),
                'slides': new ptPbApp.Collections.Slide()
            });
            this.importSlides();
        },

        importSlides: function() {

            if (!this.get('slideArr')){
                return;
            }

            _.each(this.get('slideArr') || [], this.addSlide, this);

            this.unset('slideArr', {
                silent: true
            });

        },

        addSlide: function(opts) {
            opts = opts || {};
            opts.id = [this.get('id'), this._getSlideNum()].join('__');
            var slide = new ptPbApp.Models.Slide(opts);
            this.get('slides').add(slide);
            return slide;
        },

        toJSON: function(options) {
            var json = Backbone.Model.prototype.toJSON.call(this);
            if (options && options.modules) {
                var slides = this.get('slides').toJSON();
                json = _.extend(json, _.object(_.keys(slides), slides));
                delete json.slides;
            }
            return json;
        },

        _getSlideNum: function() {
            return this.set('slideNum', this.get('slideNum') + 1).get('slideNum');
        }
    });

    ptPbApp.Models.Slide = Backbone.Model.extend({

        defaults: {
            id: '',
            parent: '',
            css_class: '',
            bg_image: '',
            bg_color: '#ddd',
            bg_pos_x: 'center',
            bg_pos_y: 'center',
            content_pos_x: 'center',
            content_pos_y: 'center',
            heading: '',
            content: '',
            heading_color: '',
            heading_bg_color: '',
            heading_size: '42px',
            text_color: '',
            text_bg_color: '',
            text_size: '18px',
            orientation: 'vertical',
            slice1_rotation: '10',
            slice2_rotation: '-15',
            slice1_scale: '1.5',
            slice2_scale: '1.5',
            admin_label: 'Slide',
            title: 'Edit Slide'
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id'))
            });
        }

    });

    ptPbApp.Models.GenericSlider = Backbone.Model.extend({

        defaults: {
            id: '',
            css_class: '',
            slider_id: '',
            type: '',
            admin_label: 'Slider',
            title: 'Edit Slider',
            itemNum: 0,
            genSlider: true
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id'))
            });
        }

    });

    ptPbApp.Models.Gallery = Backbone.Model.extend({

        defaults: {
            id: '',
            css_class: '',
            images: '',
            shape: 'rounded',
            columns: 'four',
            padding: 'yes',
            admin_label: 'Gallery',
            title: 'Edit Gallery',
            imageNum: 0
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id')),
                'images': new ptPbApp.Collections.GImage()
            });
            this.importImages();
        },

        importImages: function() {

            if (!this.get('imageArr')){
                return;
            }

            _.each(this.get('imageArr') || [], this.addImage, this);

            this.unset('imageArr', {
                silent: true
            });

        },

        addImage: function(opts) {
            opts = opts || {};
            opts.id = [this.get('id'), this._getImageNum()].join('__');
            var image = new ptPbApp.Models.GImage(opts);
            this.get('images').add(image);
            return image;
        },

        toJSON: function(options) {
            var json = Backbone.Model.prototype.toJSON.call(this);
            if (options && options.modules) {
                var images = this.get('images').toJSON();
                json = _.extend(json, _.object(_.keys(images), images));
                delete json.images;
            }
            return json;
        },

        _getImageNum: function() {
            return this.set('imageNum', this.get('imageNum') + 1).get('imageNum');
        }

    });

    ptPbApp.Models.GImage = Backbone.Model.extend({

        defaults: {
            id: '',
            css_class: '',
            src: '',
            post_id: '',
            href: '',
            title: '',
            desc: '',
            parent: '',
            admin_label: 'Image',
            icon: 'format-image'
        },

        initialize: function() {
            this.set({
                'pre': ptPbApp.getInputPrefix(this.get('id'))
            });
        }

    });

    ptPbApp.Models.Module = Backbone.Model.extend({

        initialize: function() {
            this.set( 'pre', ptPbApp.getInputPrefix(this.get('id')) );
        },

        properName: function(t) {
            t = t || this.get('type');
            return t.toProperCase().replace(/module/, '') + 'Module';
        }

    });

    ptPbApp.Models.ImageModule = ptPbApp.Models.Module.extend({
        defaults: {
            id: '',
            css_class: '',
            src: '',
            alt: '',
            title: '',
            href: '',
            animation: '',
            lightbox: false,
            target: '',
            align: 'left',
            margin_bottom: '20px',
            padding_top: '0px',
            padding_bottom: '0px',
            padding_left: '0px',
            padding_right: '0px',
            type: 'image',
            parent: '',
            admin_label: 'Image',
            icon: 'format-image'
        }
    });

    ptPbApp.Models.TextModule = ptPbApp.Models.Module.extend({
        defaults: {
            id: '',
            animation: '',
            content: '',
            margin_bottom: '20px',
            padding_top: '0px',
            padding_bottom: '0px',
            padding_left: '0px',
            padding_right: '0px',
            type: 'text',
            parent: '',
            admin_label: 'Text',
            icon: 'editor-paragraph'
        }
    });

    ptPbApp.Models.HovericonModule = ptPbApp.Models.Module.extend({
        defaults: {
            id: '',
            animation: '',
            icon: 'heart',
            size: 3,
            href: '',
            hover_effect: '',
            color: '#27ae60',
            hover_color: '#fff',
            title: '',
            content: '',
            margin_bottom: '20px',
            padding_top: '0px',
            padding_bottom: '0px',
            padding_left: '0px',
            padding_right: '0px',
            type: 'hovericon',
            parent: '',
            admin_label: 'Hover Icon'
        }
    });

    ptPbApp.Models.FeatureboxModule = ptPbApp.Models.Module.extend({
        defaults: {
            id: '',
            animation: '',
            icon: 'awards',
            size: 3,
            href: '',
            color: '#27ae60',
            hover_color: '#fff',
            title: '',
            content: '',
            margin_bottom: '20px',
            padding_top: '0px',
            padding_bottom: '0px',
            padding_left: '0px',
            padding_right: '0px',
            type: 'featurebox',
            parent: '',
            admin_label: 'Feature Box'
        }
    });

    ptPbApp.Models.Contactform7Module = ptPbApp.Models.Module.extend({
        defaults: {
            id: '',
            animation: '',
            parent: '',
            type: 'contactform7',
            form_id: '',
            title: '',
            margin_bottom: '20px',
            padding_top: '0px',
            padding_bottom: '0px',
            padding_left: '0px',
            padding_right: '0px',
            admin_label: 'Contact Form 7',
            icon: 'email-alt'
        }
    });


})(window, Backbone, jQuery, _, ptPbApp);
