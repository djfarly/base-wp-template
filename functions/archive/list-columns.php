<?php

// add_action('manage_pages_custom_column',  'my_show_columns');
// function my_show_columns($name) {
//     global $post;
//     switch ($name) {
//         case 'differ-site':
//             $site = get_post_meta($post->ID, 'differSite', true);
//             echo $site;
//         case 'differ-type':
//             $page = get_post_meta($post->ID, 'differType', true);
//             echo $page;
//     }
// }

// add_filter('manage_pages_columns', 'my_columns');
// function my_columns($columns) {
//     $columns['differ-site'] = 'Site';
//     $columns['differ-type'] = 'Type';
//     return $columns;
// }