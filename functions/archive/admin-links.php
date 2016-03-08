<?php

/*
// **************************
// ADD ADMIN MENU
// **************************

/*
* add a group of links under a parent link
*/

// Add a parent shortcut link

// function custom_toolbar_link($wp_admin_bar) {
//     global $siteOptions;

//     if ( current_user_can( 'manage_options' ) ) {
//         $args = array(
//             'id' => 'links',
//             'title' => 'Links',
//             'href' => '#',
//             'meta' => array(
//                 'class' => 'links',
//                 'title' => 'Links'
//                 )
//         );
//         $wp_admin_bar->add_node($args);

//     // Add the first child link

//         $args = array(
//             'id' => 'link-live',
//             'title' => $siteOptions['domain'],
//             'href' => 'http://'.$siteOptions['domain'],
//             'parent' => 'links',
//             'meta' => array(
//                 'class' => 'link-live',
//                 'title' => 'Live Site'
//                 )
//         );
//         $wp_admin_bar->add_node($args);

//         $prefix = $siteOptions['prefix'] === 'zeg' ? '' : $siteOptions['prefix'].'.';
//     // Add another child link
//         $args = array(
//             'id' => 'link-test',
//             'title' => $prefix.'dev.de',
//             'href' => 'http://'.$prefix.'dev.de',
//             'parent' => 'links',
//             'meta' => array(
//                 'class' => 'link-test',
//                 'title' => 'Test Site'
//                 )
//         );
//         $wp_admin_bar->add_node($args);
//         /* A user with admin privileges */

//     // Add another child link
//         $args = array(
//             'id' => 'link-dev',
//             'title' => 'dev.'.$prefix.'.de',
//             'href' => 'dev.'.$prefix.'.de',
//             'parent' => 'links',
//             'meta' => array(
//                 'class' => 'link-test',
//                 'title' => 'Test Site'
//                 )
//         );
//         $wp_admin_bar->add_node($args);
//         /* A user with admin privileges */
//     }
// }
// add_action('admin_bar_menu', 'custom_toolbar_link', 999);


