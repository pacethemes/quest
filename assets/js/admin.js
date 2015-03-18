jQuery(document).ready(function($) {

    // Color Scheme Options - These array names should match
    // the values in color_scheme of options.php

    var ash = new Array();
    ash['link_color'] = '#777576';
    var cyan = new Array();
    cyan['link_color'] = '#54c4b8';
    var darkBlue = new Array();
    darkBlue['link_color'] = '#54606e';
    var gold = new Array();
    gold['link_color'] = '#bb9202';
    var lightBlue = new Array();
    lightBlue['link_color'] = '#26ade5';
    var lightGreen = new Array();
    lightGreen['link_color'] = '#b0df13';
    var orange = new Array();
    orange['link_color'] = '#fe6700';
    var pink = new Array();
    pink['link_color'] = '#fc51a0';
    var purple = new Array();
    purple['link_color'] = '#51106a';
    var red = new Array();
    red['link_color'] = '#cd0000';
    var skyBlue = new Array();
    skyBlue['link_color'] = '#4180ab';
    var alizarin = new Array();
    alizarin['link_color'] = '#e84c3d';
    var amethyst = new Array();
    amethyst['link_color'] = '#9a59b5';
    var asbestos = new Array();
    asbestos['link_color'] = '#7e8c8d';
    var belizeHole = new Array();
    belizeHole['link_color'] = '#2a80b9';
    var carrot = new Array();
    carrot['link_color'] = '#e77e22';
    var emerald = new Array();
    emerald['link_color'] = '#2ecd71';
    var greenSea = new Array();
    greenSea['link_color'] = '#17a086';
    var midnightBlue = new Array();
    midnightBlue['link_color'] = '#2d3e50';
    var nephritis = new Array();
    nephritis['link_color'] = '#27ae5f';
    var peterRiver = new Array();
    peterRiver['link_color'] = '#3598dc';
    var pomegranate = new Array();
    pomegranate['link_color'] = '#bf3a2b';
    var pumpkin = new Array();
    pumpkin['link_color'] = '#d25400';
    var sunflower = new Array();
    sunflower['link_color'] = '#f2c40f';



    // When the select box #base_color_scheme changes
    // of_update_color updates each of the color pickers
    $('#section-color_scheme img').click(function() {
        colorscheme = $(this).prev().html();
        if (colorscheme == 'ash') {
            colorscheme = ash;
        }
        if (colorscheme == 'cyan') {
            colorscheme = cyan;
        }
        if (colorscheme == 'dark-blue') {
            colorscheme = darkBlue;
        }
        if (colorscheme == 'gold') {
            colorscheme = gold;
        }
        if (colorscheme == 'light-blue') {
            colorscheme = lightBlue;
        }
        if (colorscheme == 'light-green') {
            colorscheme = lightGreen;
        }
        if (colorscheme == 'orange') {
            colorscheme = orange;
        }
        if (colorscheme == 'pink') {
            colorscheme = pink;
        }
        if (colorscheme == 'purple') {
            colorscheme = purple;
        }
        if (colorscheme == 'red') {
            colorscheme = red;
        }
        if (colorscheme == 'sky-blue') {
            colorscheme = skyBlue;
        }
        if (colorscheme == 'alizarin') {
            colorscheme = alizarin;
        }
        if (colorscheme == 'amethyst') {
            colorscheme = amethyst;
        }
        if (colorscheme == 'asbestos') {
            colorscheme = asbestos;
        }
        if (colorscheme == 'belize-hole') {
            colorscheme = belizeHole;
        }
        if (colorscheme == 'carrot') {
            colorscheme = carrot;
        }
        if (colorscheme == 'emerald') {
            colorscheme = emerald;
        }
        if (colorscheme == 'green-sea') {
            colorscheme = greenSea;
        }
        if (colorscheme == 'midnight-blue') {
            colorscheme = midnightBlue;
        }
        if (colorscheme == 'nephritis') {
            colorscheme = nephritis;
        }
        if (colorscheme == 'peter-river') {
            colorscheme = peterRiver;
        }
        if (colorscheme == 'pomegranate') {
            colorscheme = pomegranate;
        }
        if (colorscheme == 'pumpkin') {
            colorscheme = pumpkin;
        }
        if (colorscheme == 'sunflower') {
            colorscheme = sunflower;
        }

        for (id in colorscheme) {
            of_update_color(id, colorscheme[id]);
        }
    });

    function of_update_color(id, hex) {
        $('#section-' + id + ' .wp-color-result').css({
            backgroundColor: hex
        });
        $('#' + id).val(hex);
    }


    $('#heading_google_font').parent().parent().append(
        '<div style="clear:both"><h1 style="font-family:{headfont};">Grumpy wizards make toxic brew for the evil Queen and Jack.</h1></div>'.replace('{headfont}', $('#heading_google_font').val())
    );

    $('#body_google_font').parent().parent().append(
        '<div style="clear:both"><p style="font-family:{bodyfont};">Grumpy wizards make toxic brew for the evil Queen and Jack.</p></div>'.replace('{bodyfont}', $('#body_google_font').val())
    );


    $('#heading_google_font, #body_google_font').change(function() {
        generate_google_font_preview();
    })

    function generate_google_font_preview() {
        var head = $('#heading_google_font'),
            body = $('#body_google_font');

        if (head.length <= 0 || body.length <= 0) return;

        var font_link = $('#optionsframework #google_font_link');
        if (font_link.length > 0) {
            font_link.attr('href', 'http://fonts.googleapis.com/css?family={headfont}|{bodyfont}'.replace('{headfont}', head.val().replace(/ /g, '+')).replace('{bodyfont}', body.val().replace(/ /g, '+')));
        } else {
            $('#optionsframework').prepend("<link id='google_font_link' href='http://fonts.googleapis.com/css?family={headfont}|{bodyfont}' rel='stylesheet' type='text/css'>".replace('{headfont}', head.val().replace(/ /g, '+')).replace('{bodyfont}', body.val().replace(/ /g, '+')));
        }

        $('#heading_google_font').parent().parent().find('h1').css('font-family', head.val());

        $('#body_google_font').parent().parent().find('p').css('font-family', body.val());

    }

    $("#import_dummy_data").click(function(e) {
        e.preventDefault();

        var activate = confirm('Importing the dummy data will overwrite your current Theme Option settings and change your menus. Proceed anyways?')
        if (activate == false) return false;

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: 'trivoo_ajax_import_data'
            },
            beforeSend: function() {
                jQuery("#trivoo_admin_modal").show();
            },
            error: function() {
                close_trivoo_admin_modal();
                var html = jQuery("#trivoo_admin_modal div").html();
                jQuery("#trivoo_admin_modal div").data('oldHtml', html);
                jQuery("#trivoo_admin_modal div").html('Importing didnt work! <br/> You might want to try reloading the page and then try again <br/>');

            },
            success: function(response) {
                close_trivoo_admin_modal();
                if (response.match('success')) {
                    response = response.replace('<p>Remember to update the passwords and roles of imported users.</p>', '');

                    jQuery("#trivoo_admin_modal div").html('Alright sparky!<br/>Import worked out, no problems whatsoever. <br/>The page will now be reloaded to reflect the changes');
                    window.location.reload(true);

                } else {
                    var html = jQuery("#trivoo_admin_modal div").html();
                    jQuery("#trivoo_admin_modal div").data('oldHtml', html);
                    jQuery("#trivoo_admin_modal div").html('Importing didnt work! <br/> You might want to try reloading the page and then try again <br/> (The script returned the following message: <br/><br/>' + response + ')').css({
                        'overflow-y': 'scroll',
                        'height': '500px'
                    });
                }
            },
            complete: function(response) {
                close_trivoo_admin_modal();
            }
        });

    });

    $("#activate_theme").click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: 'trivoo_activate_theme_license',
                license_key: $("#license_key").val()
            },
            beforeSend: function() {
                jQuery('#activate_theme_loader').remove();
                jQuery('#activate_theme').after('<img id="activate_theme_loader" style="margin-left:5px;" src="' + ajaxurl.slice(0, ajaxurl.lastIndexOf('/')) + '/images/wpspin_light.gif" />');
            },
            error: function() {

                if ($('#setting-error-save_options').length == 0) {
                    $("#optionsframework-metabox").before('<div id="setting-error-save_options" class="fade settings-error"><p><strong>Options saved.</strong></p></div>');
                }

                $('#setting-error-save_options').html('<p>An error occured while trying to activate your license key, please try again</p>').removeClass('updated').addClass('error');

                $('#activate_theme_loader').remove();
            },
            success: function(response) {

                if ($('#setting-error-save_options').length == 0) {
                    $("#optionsframework-metabox").before('<div id="setting-error-save_options" class="fade settings-error"><p><strong>Options saved.</strong></p></div>');
                }

                if (typeof response !== 'object')
                    response = $.parseJSON(response);

                if (response.activated == 0) {
                    $('#setting-error-save_options').html('<p>' + response.message + '</p>').removeClass('updated').addClass('error');
                } else {
                    $('#setting-error-save_options').html('<p>' + response.message + '</p>').removeClass('error').addClass('updated');
                }

            },
            complete: function(response) {
                $('#activate_theme_loader').remove();
            }
        });

    });


    $("#deactivate_theme").click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: 'trivoo_deactivate_theme_license',
                license_key: $("#license_key").val()
            },
            beforeSend: function() {
                jQuery('#activate_theme_loader').remove();
                jQuery('#activate_theme').after('<img id="activate_theme_loader" style="margin-left:5px;" src="' + ajaxurl.slice(0, ajaxurl.lastIndexOf('/')) + '/images/wpspin_light.gif" />');
            },
            error: function() {

                if ($('#setting-error-save_options').length == 0) {
                    $("#optionsframework-metabox").before('<div id="setting-error-save_options" class="fade settings-error"><p><strong>Options saved.</strong></p></div>');
                }

                $('#setting-error-save_options').html('<p>An error occured while trying to deactivate your license key, please try again</p>').removeClass('updated').addClass('error');

                $('#activate_theme_loader').remove();
            },
            success: function(response) {

                if ($('#setting-error-save_options').length == 0) {
                    $("#optionsframework-metabox").before('<div id="setting-error-save_options" class="fade settings-error"><p><strong>Options saved.</strong></p></div>');
                }

                if (typeof response !== 'object')
                    response = $.parseJSON(response);

                if (response.activated == 0) {
                    $('#setting-error-save_options').html('<p>' + response.message + '</p>').removeClass('error').addClass('updated');
                } else {
                    $('#setting-error-save_options').html('<p>' + response.message + '</p>').removeClass('updated').addClass('error');
                }

            },
            complete: function(response) {
                $('#activate_theme_loader').remove();
            }
        });

    });


    $("#update_fontawesome_icons").click(function(e) {
        e.preventDefault();
        var parent = $(this).parent();
        $('#update_fontawesome_icons_msg').remove();
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: 'trivoo_update_fontawesome_icons'
            },
            beforeSend: function() {
                parent.before('<img id="update_fontawesome_icons_loader" style="margin-left:5px;" src="' + ajaxurl.slice(0, ajaxurl.lastIndexOf('/')) + '/images/wpspin_light.gif" />');
            },
            error: function() {
                parent.before('<p id="update_fontawesome_icons_msg">An error occured while trying to the database, please try again</p>').removeClass('updated').addClass('error');
                $('#update_fontawesome_icons_loader').remove();
            },
            success: function(response) {

                parent.before('<p id="update_fontawesome_icons_msg">Updated Database</p>').removeClass('updated').addClass('error');
                $('#update_fontawesome_icons_loader').remove();

            },
            complete: function(response) {
                $('#update_fontawesome_icons_loader').remove();
            }
        });

    });



    function close_trivoo_admin_modal() {
        $(document).keyup(function(e) {
            if (e.keyCode == 27 && jQuery("#trivoo_admin_modal").css('display') === 'block') {
                jQuery("#trivoo_admin_modal").hide();
                jQuery("#trivoo_admin_modal div").html(jQuery("#trivoo_admin_modal").data('oldHtml', html));
            } // esc
        });

        $('#trivoo_admin_modal_close').show();

        $('body').on('click', '#trivoo_admin_modal_close', function() {
            jQuery("#trivoo_admin_modal").hide();
            jQuery("#trivoo_admin_modal div").html(jQuery("#trivoo_admin_modal").data('oldHtml', html));
        });

    }


});
