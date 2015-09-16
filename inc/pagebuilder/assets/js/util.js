/*jshint freeze:false*/
/* global _ */

var ptPbApp = ptPbApp || {};

(function($, _) {

    String.prototype.toProperCase = function() {
        return this.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    };

    /**
     * Serializes an array / params to a javascript object
     * @return object
     */
    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    /**
     * Bind all reveal events
     */
    $.fn.revealBind = function() {
        // Initialize reveal
        this.reveal();

        //Bind media upload events
        this.find('.pt-pb-upload-field').each(function() {
            var el = $(this);
            if (el.val() !== '') {
                el.siblings('.pt-pb-upload-button').hide();
                el.siblings('.pt-pb-remove-upload-button').show();
                el.siblings('.screenshot').empty().append('<img src="' + el.val() + '">').show();
            } else {
                el.siblings('.pt-pb-upload-button').show();
                el.siblings('.pt-pb-remove-upload-button').hide();
            }
        });

        this.find('.pt-pb-remove-upload-button').on('click', function(event) {
            ptPbApp.Upload.RemoveFile($(event.target).parent());
        });

        this.find('.pt-pb-upload-button').on('click', function(event) {
            ptPbApp.Upload.AddFile(event);
        });

        //Bind Icon select events
        this.find('.pt-pb-icon-select').each(function() {
            var $icon = $(this);
            var $preview = $icon.siblings('.icon-grid');
            if ($preview.find('section').length === 0) {
                $preview.html(window.ptIcons);
                $preview.find('.fa-hover a').on('click', function(e) {
                    e.preventDefault();
                    var $a = $(this),
                        $option = $a.closest('.pt-pb-option-container'),
                        icon = $a.attr('href').replace('#', '');

                    $option.children('.pt-pb-icon').val(icon);
                    $option.children('.icon-preview').html('<i class="fa fa-2x ' + icon + '"></i>');
                    $preview.stop().slideToggle();
                });
            }
            $icon.on('click', function() {
                $(this).siblings('.icon-grid').stop().slideToggle();
            });
        });

        //Bind color picker events
        this.find('.pt-pb-color').wpColorPicker();

        this.find('.js-animations').on('change', function(e) {
            e.preventDefault();
            var $select = $(e.target),
                $preview = $select.siblings('.animation-preview');

            $preview.removeClass().addClass($select.val() + ' animated animation-preview').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $(this).removeClass().addClass('animation-preview');
            });
        });

        return this;
    };

    /**
     * ptPbApp.template( id )
     *
     * Fetch a JavaScript template for an id, and return a templating function for it.
     *
     * @param  {string} id   A string that corresponds to a DOM element with an id prefixed with "tmpl-".
     *                       For example, "attachment" maps to "tmpl-attachment".
     * @return {function}    A function that lazily-compiles the template requested.
     */
    ptPbApp.template = _.memoize(function(id) {
        var compiled,
            /*
             * Underscore's default ERB-style templates are incompatible with PHP
             * when asp_tags is enabled, so WordPress uses Mustache-inspired templating syntax.
             *
             * code reference - @see trac ticket #22344.
             */
            options = {
                evaluate: /<#([\s\S]+?)#>/g,
                interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
                escape: /\{\{([^\}]+?)\}\}(?!\})/g
            };

        return function(data) {
            compiled = compiled || _.template($('#pt-pb-tmpl-' + id).html(), null, options);
            return compiled(data);
        };
    });

    ptPbApp.partial = function(which, data) {
        return ptPbApp.template(which)(data);
    };

    ptPbApp.generateOption = function(selected, value, name) {
        if (!name)
            name = value;
        return '<option value="' + value + '" ' + (value == selected ? 'selected' : '') + ' >' + name + '</option>';
    };

    ptPbApp.getInputPrefix = function(id) {
        return (id.split('__').join('][') + ']').replace('pt_pb_section]', 'pt_pb_section');
    };

    ptPbApp.serializeElms = function(elm) {
        var arr = elm.serializeObject(),
            result = {};
        $.each(arr, function(i, v) {
            var n = i.split('][').slice(-1)[0].replace(']', '') || 'nn';
            result[n] = v;
        });
        return result;
    };

    ptPbApp.stripslashes = function stripslashes(str) {
        // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +   improved by: Ates Goral (http://magnetiq.com)
        // +      fixed by: Mick@el
        // +   improved by: marrtins
        // +   bugfixed by: Onno Marsman
        // +   improved by: rezna
        // +   input by: Rick Waldron
        // +   reimplemented by: Brett Zamir (http://brett-zamir.me)
        // +   input by: Brant Messenger (http://www.brantmessenger.com/)
        // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
        // *     example 1: stripslashes('Kevin\'s code');
        // *     returns 1: "Kevin's code"
        // *     example 2: stripslashes('Kevin\\\'s code');
        // *     returns 2: "Kevin\'s code"
        return (str + '').replace(/\\(.?)/g, function(s, n1) {
            switch (n1) {
                case '\\':
                    return '\\';
                case '0':
                    return '\u0000';
                case '':
                    return '';
                default:
                    return n1;
            }
        });
    };

    ptPbApp.htmlEncode = function(value) {
        return String(ptPbApp.stripslashes(value))
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    };

}(jQuery, _));
