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
$development = true;

// Require Theme Autoloader
// Works for everything inside lib
require_once 'ThemeAutoload.php';

// If composer is used: uncomment this
// Require Composer Autoloading
// require_once 'vendor/autoload.php';

$theme = new djfarly\WpTheme\Theme();

$path = dirname(__FILE__).'/functions';
$files = glob($path."/*.php");
foreach ($files as $filename)
   include $filename;