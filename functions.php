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

$path = dirname(__FILE__).'/functions';
$files = glob($path."/*.php");
foreach ($files as $filename)
   include $filename;