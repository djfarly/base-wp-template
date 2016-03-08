<?php

// **************************
// WYSIWYG
// **************************

    // // Callback function to insert 'styleselect' into the $buttons array
    // function my_mce_buttons_2( $buttons ) {
    //     array_unshift( $buttons, 'styleselect' );
    //     return $buttons;
    // }
    // add_filter('mce_buttons_2', 'my_mce_buttons_2');

    // function my_mce_before_init_insert_formats( $init_array ) {
    //     $style_formats = array(
    //         array(
    //             'title' => 'Lead',
    //             'block' => 'p',
    //             'classes' => 'lead'
    //         ),
    //         array(
    //             'title' => 'Button',
    //             // 'inline' => 'a',
    //             'selector' => 'a',
    //             'classes' => 'btn',
    //             'wrapper' => false
    //         ),
    //         array(
    //             'title' => 'Normal',
    //             'inline' => 'a',
    //             'selector' => 'a',
    //             'classes' => '',
    //             'exact' => true,
    //             'wrapper' => false
    //         ),
    //         // array(
    //         //     'title' => 'Lead 2',
    //         //     'block' => 'p',
    //         //     'classes' => 'lead-2'
    //         // ),
    //         // array(
    //         //     'title' => 'address',
    //         //     'block' => 'p',
    //         //     'classes' => 'address'
    //         // ),
    //         // array(
    //         //     'title' => 'subhead',
    //         //     'block' => 'p',
    //         //     'classes' => 'subhead'
    //         // ),
    //         // array(
    //         //     'title' => 'Big Title',
    //         //     'block' => 'h2',
    //         //     'classes' => 'big'
    //         // ),
    //         // array(
    //         //     'title' => 'Middle Title',
    //         //     'block' => 'h2',
    //         //     'classes' => 'middle'
    //         // ),
    //         // array(
    //         //     'title' => 'Call to action',
    //         //     'inline' => 'a',
    //         //     'selector' => 'a',
    //         //     'classes' => 'btn cta',
    //         //     'wrapper' => false
    //         // ),
    //         // array(
    //         //     'title' => 'link',
    //         //     'inline' => 'a',
    //         //     'selector' => 'a',
    //         //     'classes' => 'link',
    //         //     'wrapper' => false
    //         // ),
    //         // array(
    //         //     'title' => 'sidebarlink',
    //         //     'inline' => 'a',
    //         //     'selector' => 'a',
    //         //     'classes' => 'sidebarlink',
    //         //     'wrapper' => false
    //         // ),
    //         // array(
    //         //     'title' => 'readmorelink',
    //         //     'inline' => 'a',
    //         //     'selector' => 'a',
    //         //     'classes' => 'readmorelink',
    //         //     'wrapper' => false
    //         // )
    //     );
    //     $init_array['style_formats'] = json_encode( $style_formats );
    //     return $init_array;
    // }
    // add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

    // function add_my_editor_style() {
    //     // add_editor_style( 'assets/css/layout.css' );
    // }
    // add_action( 'admin_init', 'add_my_editor_style' );
