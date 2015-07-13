/*
 * logger module
 * <%= conf.get('themeDir') %> /_development/
 * Jan Willem Henckel
 */

define(function () {
	var oldConsoleLog = null;
	var pub = {};

	pub.enableLogger = function enableLogger() {
		if(oldConsoleLog == null)
			return;

		window['console']['log'] = oldConsoleLog;
	};

	pub.disableLogger = function disableLogger() {
        if (!window.console || !window.console.log) {
            if (!window.console) window.console = {};
            if (!window.console.log) window.console.log = function () {};
            return false;
        } else {
            oldConsoleLog = console.log;
            window['console']['log'] = function() {};
        }
	};

	return pub;
});