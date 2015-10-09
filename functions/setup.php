<?php

// Theme Scripts
$theme->registerScript(['named' => 'main', 'withDependencies' => []]); // example dependencies ['jquery', 'd3']
$theme->enqueueScript(['named' => 'main']);

$theme->registerScript(['named' => 'livereload', 'fromExternalPath' => 'http://dev.ravio:35729/livereload.js?snipver=1']);
if ($development) $theme->enqueueScript(['named' => 'livereload']);
	
// Theme Styles
$theme->enqueueStyle(['named' => 'main');

// Are there any critical styles to inline?
$theme->inlineStyle(['named' => 'critical');


// cleanup head
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_no_robots');
remove_action('wp_head', 'wp_shortlink_wp_head');

// do not show admin bar, when logged in
add_filter('show_admin_bar', '__return_false');

// add debug class to body - this enables the console
if ($development)
	add_filter('body_class', function ($classes = '') {
		$classes[] = 'debugmode';
		return $classes;
	});


// WPML Setup
// define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
// define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
// define('ICL_DONT_LOAD_LANGUAGES_JS', true);


// Disable Emojis
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


function disable_emojicons_tinymce($plugins) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}