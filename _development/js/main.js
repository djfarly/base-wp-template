/*
 * <%= conf.get('themeDir') %> main configuration
 * kicks off bootstrapping
 * <%= conf.get('themeDir') %> /_development/
 * Jan Willem Henckel
 */

 /*!
 * Dunckelfeld
 * dunckelfeld.de
 */


require.config({
	baseUrl: "<%= conf.get('contentDir') %>/themes/<%= conf.get('themeDir') %>/_development/js",
	paths: {
		jquery: "../components/jquery/dist/jquery",
		"jquery.bem.gal": "../components/jquery.bem.gal/jquery.bem",
		requirejs: "../components/requirejs/require",
		"jquery-ui": "../components/jquery-ui/jquery-ui",
		"jquery-ui-widget": "../components/jquery-ui/ui/widget"
	},
	packages: [

	]
});

// bootstrap application
require(['app/app'], function(app) {
	window.app = app(document);
});