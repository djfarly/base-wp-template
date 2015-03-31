<?php
/*
 * wordpress functions.php
 * Dunckelfeld /_development/
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

foreach(glob(dirname(__FILE__).'functions/*.php') as $file)
	require_once($file);
