<?php

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


// function remove_the_dashboard () {
//     if (current_user_can('administrator')) {
//         return;
//     }
//     else {
//         global $menu, $submenu, $user_ID;

//         $the_user = new WP_User($user_ID);

//         reset($menu); $page = key($menu);

//         while ((__('Dashboard') != $menu[$page][0]) && next($menu))
//             $page = key($menu);

//         if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);

//         reset($menu); $page = key($menu);

//         while (!$the_user->has_cap($menu[$page][1]) && next($menu))
//             $page = key($menu);

//         if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
//             wp_redirect(get_option('siteurl') . '/wp-admin/post-new.php');


//     }
// }
// add_action('admin_menu', 'remove_the_dashboard');

