/*
 * <%= conf.get('themeDir') %> bootstrap process
 * Dunckelfeld /_development/
 * Jan Willem Henckel
 */

define([
    'jquery',
    'jquery-ui-widget',
    'app/logger',
    'app/header',
],
function ($, widget, logger, header) {
    return widget('app', {
        options: {
            applicationName: "<%= conf.get('themeDir') %>"
        },
     
        _create: function () {
            $(this._loadInitialModules());

            if(!$('body').hasClass('debugmode')) {
                logger.disableLogger();
            }
        },

        _loadInitialModules: function () {
            this.header = header({title: this.options.applicationName}, '.header');
        }
    });
});