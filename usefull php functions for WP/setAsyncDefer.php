<?php 
function add_async_defer_to_plugin_assets($tag, $handle, $src) {
  //Verify if resource is loaded by a plugin or wp-includes directory

  if(strpos ($src, '/wp-content/plugins/') !== false || strpos ($src, "/wp-includes/") !== false) {
    // Verify resource is a script
    if(wp_script_is($handle, 'registered')) {
      $tag = str_replace('<script', '<script loading="lazy"', $tag); // do no use defer or async on scripts
    }
    /*
    // verify resource is a style
    if(wp_style_is($handle, 'registered')) {
      $tag = str_replace('<link', '<link rel="stylesheet" async', $tag);
    }
    */
  }
  return $tag;
}
add_filter('script_loader_tag', 'add_async_defer_to_plugin_assets', 10, 3);
add_filter('style_loader_tag', 'add_async_defer_to_plugin_assets', 10, 3);



?>