/* global Backbone, jQuery, _ */
var trPbApp = trPbApp || {};
trPbApp.Modules = trPbApp.Modules || {};

(function(window, Backbone, $, _, trPbApp) {
    'use strict';

    trPbApp.SectionModel = Backbone.Model.extend({
        defaults: {
            id: '',
            css_class: '',
            content: [],
            columns: 1,
            bg_image: '',
            bg_color: '',
            text_color: '',
            padding_top: '30px',
            padding_bottom: '30px',
            border_top_width: '1px',
            border_bottom_width: '1px',
            border_top_color: '#e5e5e5',
            border_bottom_color: '#e5e5e5'
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
            heading: '',
            text: '',
            heading_color: '',
            text_color: '',
            orientation: 'vertical',
            slice1_rotation: '10',
            slice2_rotation: '-15',
            slice1_scale: '1.5',
            slice2_scale: '1.5',
            admin_label: 'Slide',
            title: 'Edit Slide'
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
            text: 'Image'
        }
    });

    trPbApp.Modules.TextModel = Backbone.Model.extend({
        defaults: {
            id: '',
            animation: '',
            content: '',
            type: 'text',
            parent: '',
            admin_label: 'Text'
        }
    });

    trPbApp.Modules.HovericonModel = Backbone.Model.extend({
        defaults: {
            id: '',
            animation: '',
            icon: '',
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
