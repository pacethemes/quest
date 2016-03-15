/*!
 * SmartMenus jQuery Plugin Bootstrap Addon - v0.1.1 - August 25, 2014
 * http://www.smartmenus.org/
 *
 * Copyright 2014 Vasil Dinkov, Vadikom Web Ltd.
 * http://vadikom.com
 *
 * Licensed MIT
 */

(function ($) {

    // fix collapsible menu detection for Bootstrap 3
    $.SmartMenus.prototype.isCollapsible = function () {
        return this.$firstLink.parent().css('float') != 'left';
    };

})(jQuery);