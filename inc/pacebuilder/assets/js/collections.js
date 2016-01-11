/* global Backbone, jQuery, _ */
var ptPbApp = ptPbApp || {};
ptPbApp.Collections = ptPbApp.Collections || {};

(function (window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.Collections.Section = Backbone.Collection.extend({
        model: ptPbApp.Models.Section
    });

    ptPbApp.Collections.Row = Backbone.Collection.extend({
        model: ptPbApp.Models.Row
    });

    ptPbApp.Collections.Column = Backbone.Collection.extend({
        model: ptPbApp.Models.Column
    });

    ptPbApp.Collections.GImage = Backbone.Collection.extend({
        model: ptPbApp.Models.GImage
    });

    ptPbApp.Collections.Slide = Backbone.Collection.extend({
        model: ptPbApp.Models.Slide
    });

    ptPbApp.Collections.Module = Backbone.Collection.extend({
        model: ptPbApp.Models.Module
    });

})(window, Backbone, jQuery, _, ptPbApp);
