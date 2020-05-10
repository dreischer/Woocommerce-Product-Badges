<?php

// add options tab to product admin page
add_filter('woocommerce_product_data_tabs', 'add_product_badges_product_data_tab');
function add_product_badges_product_data_tab ( $product_data_tabs ) {
  $product_data_tabs['product-badges-tab'] = array(
    'label' => 'Product Badges',
    'target' => 'product_badges_product_data',
    'class' => array('show_if_simple', 'show_if_variable'),
  );

  return $product_data_tabs;
}

// add content of new options tab
add_action('woocommerce_product_data_panels', 'show_product_badges_fields');
function show_product_badges_fields ($post_id) {
  global $post;
  ?>
  <div id='product_badges_product_data' class='panel woocommerce_options_panel' >
    <div class = 'options_group' >
      <?php
        $badges = require( 'badges.php');

        woocommerce_wp_checkbox(array(
          'id' => '_show_product_badges',
          'label' => 'Show product badges',
          'description' => '',
          'desc_tip' => false
        ));

        foreach($badges as $item) {
          woocommerce_wp_checkbox(array(
            'id' => $item['id'],
            'label' => $item['label'],
            'description' => '',
            'desc_tip' => false
          ));
        }
      ?>
    </div>
  </div>
  <?php
}

// save data of all fields
add_action('woocommerce_process_product_meta', 'woocom_save_product_badges');
function woocom_save_product_badges ($post_id) {
  $field_id = '_show_product_badges';
  $value = isset($_POST[$field_id]) ? 'yes' : 'no';
  update_post_meta($post_id, $field_id, $value);

  $badges = require( 'badges.php');
  foreach($badges as $item) {
    $field_id = $item['id'];
    $value = isset($_POST[$field_id]) ? 'yes' : 'no';
    update_post_meta($post_id, $field_id, $value);
  }
}
?>
