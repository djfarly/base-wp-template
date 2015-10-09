/*
 * <%= conf.get('themeDir') %> main script entry-point
 * <%= conf.get('themeDir') %> /_development/
 * Jan Willem Henckel
 */

var app = require('./app/app.js');
var logger = require('./app/logger.js');

if (true === app.app) {
	console.log('hell yeah');
}