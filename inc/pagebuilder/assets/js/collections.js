/* global Backbone, jQuery, _ */
var ptPbApp = ptPbApp || {};

(function (window, Backbone, $, _, ptPbApp) {
    'use strict';

    ptPbApp.SectionCollection = Backbone.Collection.extend({
        model: ptPbApp.SectionModel
    });

    ptPbApp.RowCollection = Backbone.Collection.extend({
        model: ptPbApp.RowModel
    });

    ptPbApp.ColumnCollection = Backbone.Collection.extend({
        model: ptPbApp.ColumnModel
    });

    ptPbApp.GImageCollection = Backbone.Collection.extend({
        model: ptPbApp.GImageModel
    });

    ptPbApp.SlideCollection = Backbone.Collection.extend({
        model: ptPbApp.SlideModel
    });

})(window, Backbone, jQuery, _, ptPbApp);
