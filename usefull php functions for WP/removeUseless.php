<?php 
// remove useless CSS bodyclass that are default for Woocommerce
function remove_unwanted_styles() {
    // Dequeue the wc-all-blocks-style.css
    wp_dequeue_style('wc-all-blocks-style');

    // Dequeue the woocommerce.css
    wp_dequeue_style('woocommerce');

    // Dequeue the woocommerce-layout.css
    wp_dequeue_style('woocommerce-layout');

    // Dequeue jQuery
    wp_dequeue_script('jquery');

    // Dequeue jQuery Migrate
    wp_dequeue_script('jquery-migrate');
}

add_action('wp_enqueue_scripts', 'remove_unwanted_styles', 999);



function remove_some_body_class($classes) {
  $woo_class = array_search('woocommerce', $classes);
  $woopage_class = array_search('woocommerce-page', $classes);
  $search = in_array('archive', $classes) || in_array('product-template-default', $classes);
  if($woo_class && $woopage_class && $search) {
    unset($classes[$woo_class]);
    unset($classes[$woopage_class]);
  }
  return $classes;
}
add_filter('body_class', 'remove_some_body_class');



function add_loading_lazy_to_css_link() {
  // Get the current page's URL
  $current_url = esc_url($_SERVER['REQUEST_URI']);

  // Define the URL of the CSS file you want to target
  $target_css_url = 'https://mobway.test/wp-content/plugins/chaty/css/chaty-front.css?ver=3.1.71694483104';

  // Check if the current page is using the target CSS file
  if (strpos($current_url, $target_css_url) !== false) {
      // Add the 'loading' attribute to the link tag
      echo '<link rel="stylesheet" href="' . $target_css_url . '" type="text/css" media="all" loading="lazy" />';
  }
}

add_action('wp_head', 'add_loading_lazy_to_css_link');


?>