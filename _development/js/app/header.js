/*
 * <%= conf.get('themeDir') %> header module
 * Dunckelfeld /_development/
 * Jan Willem Henckel
 */

define([
    'jquery',
    'jquery-ui-widget',
    'jquery.bem.gal'
],
function ($, widget) {
    return widget("header", {
        options: {
            title: ""
        },
     
        _create: function () {
            this._updateUI();
        },
     
        // Create a public method.
        title: function (title) {
     
            // No value passed, act as a getter.
            if (title === undefined) {
                return this.options.title;
            }
     
            // Value passed, act as a setter.
            this.options.title = title;
            this._updateUI();

            return this;
        },

        _updateUI: function () {
            var title = this.options.title;
            this.element
                .elem("text")
                .delMod("empty")
                .text(title);
        }
    });
});