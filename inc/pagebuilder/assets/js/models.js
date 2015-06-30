/* global Backbone, jQuery, _ */
var trPbApp = trPbApp || {};
trPbApp.Modules = trPbApp.Modules || {};

(function (window, Backbone, $, _, trPbApp) {
    'use strict';

    trPbApp.SectionModel = Backbone.Model.extend({
        defaults: {
            id: '',
            css_class: '',
            content: null,
            content_type: 'boxed',
            columns: 1,
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
            rowNum: 1
        }
    });

    trPbApp.RowModel = Backbone.Model.extend({
        defaults: {
            id: '',
            content: null,
            parent: '',
            type: 'columns'
        }
    });

    trPbApp.ColumnModel = Backbone.Model.extend({
        defaults: {
            id: '',
            content: [],
            type: '1-1',
            parent: ''
        }
    });


    trPbApp.SliderModel = Backbone.Model.extend({
        defaults: {
            id: '',
            css_class: '',
            slides: '',
            height: '400px',
            autoplay: 'true',
            interval: '4000',
            speed: '800',
            admin_label: 'Slider',
            title: 'Edit Slider'
        }
    });

    trPbApp.SlideModel = Backbone.Model.extend({
        defaults: {
            id: '',
            parent: '',
            css_class: '',
            bg_image: '',
            bg_color: '#ddd',
            bg_pos_x: 'center',
            bg_pos_y: 'center',
            heading: '',
            content: '',
            heading_color: '',
            heading_size: '42px',
            text_color: '',
            text_size: '18px',
            orientation: 'vertical',
            slice1_rotation: '10',
            slice2_rotation: '-15',
            slice1_scale: '1.5',
            slice2_scale: '1.5',
            admin_label: 'Slide',
            title: 'Edit Slide'
        }
    });

    trPbApp.GalleryModel = Backbone.Model.extend({
        defaults: {
            id: '',
            css_class: '',
            images: '',
            shape: 'rounded',
            admin_label: 'Gallery',
            title: 'Edit Gallery'
        }
    });

    trPbApp.GImageModel = Backbone.Model.extend({
        defaults: {
            id: '',
            css_class: '',
            src: '',
            post_id: '',
            href: '',
            parent: '',
            admin_label: 'Image',
            icon: 'format-image'
        }
    });

    trPbApp.Modules.ImageModel = Backbone.Model.extend({
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
            type: 'image',
            parent: '',
            admin_label: 'Image',
            icon: 'format-image'
        }
    });

    trPbApp.Modules.TextModel = Backbone.Model.extend({
        defaults: {
            id: '',
            animation: '',
            content: '',
            type: 'text',
            parent: '',
            admin_label: 'Text',
            icon: 'editor-paragraph'
        }
    });

    trPbApp.Modules.HovericonModel = Backbone.Model.extend({
        defaults: {
            id: '',
            animation: '',
            icon: 'heart',
            size: 3,
            href: '',
            color: '#27ae60',
            hover_color: '#fff',
            title: '',
            content: '',
            type: 'hovericon',
            parent: '',
            admin_label: 'Hover Icon'
        }
    });


})(window, Backbone, jQuery, _, trPbApp);
