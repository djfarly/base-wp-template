<?php
/*
 * wordpress functions.php
 * <%= conf.get('themeDir') %>
 * Jan Willem Henckel
 */

/*
 * set the development flag to false to
 *  - use minified scripts
 *  - use minified styles
 *  - disable the console
 *  - exclude livereload 
 */

$development = strpos($_SERVER['HTTP_HOST'], 'dev.') === 0 ? true : false;
// $development = false;

// add debug class to body - this enables the console
if ($development) {
	add_filter('body_class', function ($classes = '') {
		$classes[] = 'debugmode';
		return $classes;
	});
}


// Require Theme Autoloader
// Works for everything inside lib
require_once 'ThemeAutoload.php';

// If composer is used: uncomment this
// Require Composer Autoloading
// require_once 'vendor/autoload.php';

$theme = new df\WpTheme\Theme();

$path = dirname(__FILE__).'/functions';
$files = glob($path."/*.php");
foreach ($files as $filename)
   include $filename;