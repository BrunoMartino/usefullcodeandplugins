<?php
// Add Theme Style on website
function mobway_add_woocommerce_support() {
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mobway_add_woocommerce_support');

function mobway_css() {
  wp_register_style('mobway-style', get_template_directory_uri() . '/style.css', [], '1.0.0', false);
  wp_enqueue_style('mobway-style');
}
add_action('wp_enqueue_scripts', 'mobway_css');

// controls product display on category pages
function mobway_loop_per_page() {
  return 4;
}
add_filter('loop_shop_per_page', 'mobway_loop_per_page');

function change_woocommerce_labels( $translated_text, $text, $domain ) {
  switch ( $translated_text ) {
      case 'First Name':
          $translated_text = 'Primeiro Nome';
          break;
      case 'Last Name':
          $translated_text = 'Último Nome';
          break;
      case 'Password':
        $translated_text = 'Senha';
        break;
      // Put here another labels you want translated
      
  }
  return $translated_text;
}
add_filter( 'gettext', 'change_woocommerce_labels', 20, 3 );

?>
