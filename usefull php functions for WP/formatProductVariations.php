<?php 
function mobway_get_product_variation($id) {
  $product = wc_get_product($id );

  if($product-> is_type('variable')) {
    $variations = $product->get_available_variations();
    $attributes_info = array();

    echo '<ul data-cat="imgs" class="cat-list__img">';

    foreach($variations as $variation) {
      $attributes = $variation['attributes'];

      foreach($attributes as $attribute_name => $attribute_value) {
        if(!empty($attribute_value)) {
          if($attribute_name === 'attribute_pa_image') {
            $variation_image =$variation['image'] ['url'];
            echo '<li><img data-cat="imgs-box" src="' . $variation_image . '" alt="" loading="lazy"</li>';

          } else {
            $attributes_info[$attribute_name][] = $attribute_value;
          }
        }
      }
    }
    echo '</ul>';

    if(!empty($attributes_info)) {
      foreach($attributes_info as $attribute_name => $attribute_values) {
        echo '<div>';
        echo '<h3 class="cat__list-title font-1-up-s">' . str_replace('attribute_pa_', '', $attribute_name) . '</h3>';
        echo '<ul data-cat="attributes" class="' . str_replace("attribute_", "", $attribute_name) . '">';
        sort($attribute_values);
        $unique_values = array_unique($attribute_values);
        foreach($unique_values as $value) {
          echo '<li class="cat-variation"><p>' . $value . '</p></li>';        
        }
        echo '</ul>';
        echo '</div>';
      }
    }
  }
}
?>