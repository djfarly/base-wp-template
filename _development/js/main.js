/*
 * <%= conf.get('themeDir') %> main configuration
 * kicks off bootstrapping
 * Dunckelfeld /_development/
 * Jan Willem Henckel
 */

 /*!
 * Dunckelfeld
 * dunckelfeld.de
 */


require.config({
	baseUrl: "<%= conf.get('contentDir') %>/themes/<%= conf.get('themeDir') %>/_development/js",
	paths: {
		jquery: "plugins/jquery/dist/jquery",
		"jquery.bem.gal": "plugins/jquery.bem.gal/jquery.bem",
		requirejs: "plugins/requirejs/require",
		"jquery-ui": "plugins/jquery-ui/jquery-ui",
		"jquery-ui-widget": "plugins/jquery-ui/ui/widget"
	},
	packages: []
});

// bootstrap application
require(['app/app'], function(app) {
	window.app = app(document);
});