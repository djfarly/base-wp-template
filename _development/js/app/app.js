/*
 * <%= conf.get('themeDir') %> bootstrap process
 * Dunckelfeld /_development/
 * Jan Willem Henckel
 */

define([
    'jquery',
    'jquery-ui-widget',
    'app/header',
],
function ($, widget, header) {
    return widget('app', {
        options: {
            applicationName: '<%= projectName %>'
        },
     
        _create: function () {
            $(this._loadInitialModules());
        },

        _loadInitialModules: function () {
            this.header = header({title: this.options.applicationName}, '.header');
        }
    });
});