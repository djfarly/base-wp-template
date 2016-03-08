<?php
/*add_action('after_setup_theme', function () {
  register_nav_menu('main', __('Main Menu', '<%= conf.get('themeDir') %>'));
});*/


// **************************
// CUSTOM MENU WALKER
// **************************

  // class socialNavWalker extends Walker
  // {
  //     public function walk( $elements, $max_depth )
  //     {
  //         $list = array ();

  //         foreach ( $elements as $item ) {
  //             $post = get_post($item->object_id);
  //             $list[] = '<a target="_blank" class="navlink '.join(' ', $item->classes).' icon-social-'.strtolower($item->title).'" href="'.$item->url.'" data-slug="'.$post->post_name.'"><span>'.$item->title.'</span></a>';
  //         }

  //         return join( "\n", $list );
  //     }
  // }
  // 