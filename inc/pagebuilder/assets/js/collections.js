/* global Backbone, jQuery, _ */
var trPbApp = trPbApp || {};

(function (window, Backbone, $, _, trPbApp) {
    'use strict';

    trPbApp.SectionCollection = Backbone.Collection.extend({
        model: trPbApp.SectionModel
    });

    trPbApp.RowCollection = Backbone.Collection.extend({
        model: trPbApp.RowModel
    });

    trPbApp.ColumnCollection = Backbone.Collection.extend({
        model: trPbApp.ColumnModel
    });

    trPbApp.GImageCollection = Backbone.Collection.extend({
        model: trPbApp.GImageModel
    });

    trPbApp.SlideCollection = Backbone.Collection.extend({
        model: trPbApp.SlideModel
    });

})(window, Backbone, jQuery, _, trPbApp);
