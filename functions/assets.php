<?php

// Theme Scripts
$theme->registerScript(['named' => 'main', 'withDependencies' => []]); // example dependencies ['jquery', 'd3']
$theme->enqueueScript(['named' => 'main']);

$theme->registerScript(['named' => 'livereload', 'fromExternalPath' => 'http://dev.ravio:35729/livereload.js?snipver=1']);
if ($development) $theme->enqueueScript(['named' => 'livereload']);
	
// Theme Styles
$theme->enqueueStyle(['named' => 'main']);

// Are there any critical styles to inline?
// $theme->inlineStyle(['named' => 'critical']);
