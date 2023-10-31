<?php 
// Add new images sizes and custom crops on uploaded imagens from WP Library

function mobway_custom_images() {
  add_image_size("category-box", 50, 50, ['center', 'top']);
  add_image_size('product-box', 260, 300, ['center', 'top']);
  add_image_size('product-gallery', 600, 560, ['center', 'top']);
  add_image_size('slide-gallery', 1440, 400, ['center', 'top']);
  add_image_size('parent-cat', 96, 96,['center', 'top']);
  update_option("medium_crop", 1);
}
add_action('after_setup_theme', 'mobway_custom_images');
?>