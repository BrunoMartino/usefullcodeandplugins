<?php 
function mobway_custom_user_menu($menu_links) {
  unset($menu_links['downloads']);
  unset($menu_links['dashboard']);
  $menu_links['customer-logout'] = 'Sair';
  $menu_links['edit-account'] = 'Meus Dados';
  $menu_links['edit-address'] = 'Endereços';
  $menu_links['orders'] = 'Meus Pedidos';

  return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'mobway_custom_user_menu');
?>