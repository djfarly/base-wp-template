<?
// load require js into footer
add_action('wp_footer', function () use (&$development) {
	$dataMain = $development ? '_development/js/main' : 'assets/js/main';
	$requirejs = 'assets/js/require.min.js';
	echo '<script type="text/javascript" data-main="'.$dataMain.'" src="'.$requirejs.'"></script>';
}, 19); // priority 19 triggers just before enqueue_scripts

// register and enqueue modernizr
wp_register_script('modernizr', get_bloginfo('template_url') . 'assets/js/modernizr.js');
wp_enqueue_script('modernizr');

// register and enqueue livereload
if ($development) {
	wp_register_script('livereload', '<%= conf.get('url') %>:35729/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');
}

if (!is_admin()) { 

	if(file_exists(dirname(__FILE__) . '/../assets/css/main' . ($development ? '.css' : '.min.css'))) {
		wp_enqueue_style('main', get_bloginfo('template_url') . ($development ? '/assets/css/main.css' : '/assets/css/main.min.css'));
	}

	if(file_exists($criticalPath = dirname(__FILE__) . '/../assets/css/critical' . ($development ? '.css' : '.min.css'))) {
		add_action('wp_head', function () {
			echo '<style type="text/css">';
			echo file_get_contents($criticalPath);
			echo '</style>';
		});
	}

	// register and enqueue livereload
	if ($development) {
		wp_register_script('livereload', 'http://dev.ravio:35729/livereload.js?snipver=1', null, false, true);
		wp_enqueue_script('livereload');
	}
}


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


function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}