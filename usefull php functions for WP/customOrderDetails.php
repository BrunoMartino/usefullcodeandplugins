<?php 
function custom_order_item_details($item_name, $item, $is_visible) {
$product = wc_get_product( $item->get_product_id());

if($product) {
  $thumbnail = '';
  $variation_id = $item->get_variation_id(); //get the ID for current variation on cart
  
  if($variation_id) {
    $variation = wc_get_product( $variation_id );

    if($variation && $variation->get_image_id()) {
      $thumbnail = wp_get_attachment_image($variation->get_image_id(),'thumbnail');
    }
  }elseif ($product->get_image_id()) {
    $thumbnail = wp_get_attachment_image($product->get_image_id(), 'thumbnail');
  }

  $item_name = $thumbnail . ' ' . $product->get_name();
}

return $item_name;

}

add_filter('woocommerce_order_item_name', 'custom_order_item_details', 10, 3);
add_filter('woocommerce_order_item_thumbnail', 'custom_order_item_details', 10, 3);
?>