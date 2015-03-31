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

// enqueue stylesheet
wp_enqueue_style('main', get_bloginfo('template_url') . ($development ? 'assets/css/main.css' : 'assets/css/main.min.css'));

// cleanup head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// do not show admin bar, when logged in
add_filter('show_admin_bar', '__return_false');

// add debug class to body - this enables the console
if ($development)
	add_filter('body_class', function ($classes = '') {
		$classes[] = 'debugmode';
		return $classes;
	});