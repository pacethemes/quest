(function ($) {

    var fontChosen,
        wpApi = wp.customize;

    fontChosen = {
        cache: {},

        init: function () {
            fontChosen.buildFonts();
            fontChosen.showFonts();
        },

        buildFonts: function () {
            fontChosen.cache.fonts = '';
            fontChosen.cache.chosen = {};

            $.each(questCustomizerFontsL10n, function (name, options) {
                var disabled = '';
                if (options['disabled'] !== undefined) {
                    disabled = ' disabled="disabled" ';
                }
                fontChosen.cache.fonts += '<option value="' + name + '"' + disabled + '>' + name + '</option>';
            });
        },

        showFonts: function () {
            $(".chosen-select").each(function () {
                var $el = $(this),
                    key = $el.attr('data-customize-setting-link');
                fontChosen.cache.chosen[key] = $(this);
                wpApi(key, function (setting) {
                    $el.on('chosen:ready', function () {
                        var v = setting.get(),
                            $sel = $(this)
                                .html(fontChosen.cache.fonts)
                                .val(v);
                        setTimeout(function () {
                            $el.trigger('chosen:updated');
                        }, 200);
                    });
                    $el.on('change', function () {
                        var $select = $(this),
                            font = $select.val(),
                            $variant = $select.closest('li').next().find('select');
                        if ($variant.length > 0 && questCustomizerFontsL10n[font] !== undefined) {
                            $variant.html(fontChosen.showVariants(questCustomizerFontsL10n[font]['variants'])).val('regular');
                        }
                    });
                    $el.chosen({
                        search_contains: true,
                        width: '100%'
                    });
                });
            });
            fontChosen.showDefaultVariants();
        },

        showDefaultVariants: function () {
            $('[id$=_variant] select').each(function () {
                var $el = $(this),
                    key = $el.attr('data-customize-setting-link'),
                    parentKey = key.replace('_variant', '_family');
                wpApi(key, function (setting) {
                    if (fontChosen.cache.chosen[parentKey] !== undefined && fontChosen.cache.chosen[parentKey].length > 0) {
                        $el.html(fontChosen.showVariants(questCustomizerFontsL10n[fontChosen.cache.chosen[parentKey].val()]['variants']))
                            .val(setting.get());
                    }
                });

            });
        },

        showVariants: function (variants) {
            var options = '';
            $.each(variants, function (ind, val) {
                var name = val.replace('italic', ' Italic').replace(/\w\S*/g, function (txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
                options += '<option value="' + val + '">' + name + '</option>';
            });
            return options;
        }

    };


    $(document).ready(function () {
        fontChosen.init();
        $('<a class="quest-plus-link" href="http://pacethemes.com/quest-download-pricing" target="_blank"><span class="quest-plus">Checkout Quest Plus</span></a>')
            .click(function (e) {
                e.stopPropagation();
            }).appendTo($('#customize-controls .preview-notice'));
    });


})(jQuery);
