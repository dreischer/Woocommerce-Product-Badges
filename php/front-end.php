<?php

// add tab to actual product page
add_filter( 'woocommerce_product_tabs', 'woo_add_product_badges_tab' );
function woo_add_product_badges_tab ($tabs) {
  if (get_post_meta(get_the_ID(), '_show_product_badges', true) != 'yes') {
    return $tabs;
  }
  $priority = get_post_meta(get_the_ID(), '_product_badges_custom_priority', true);
  $priority = empty($priority) ? 25 : $priority;

  $tabs['product_badges_tab'] = array(
    'title' 	=> __( 'Size guide', 'woocommerce' ),
    'priority' 	=> $priority,
    'callback' 	=> 'product_badges_tab_content'
  );

  add_action('get_footer', 'sizeTable_add_footer_styles');

  return $tabs;
}

function product_badges_tab_content () {
  $json = htmlspecialchars_decode(get_post_meta(get_the_ID(), '_product_badges_data', true));
  $data = json_decode($json)->sizes;

  function build_table ($array) {
    $html = '<table>';

    foreach ($array as $rowIndex => $cells) {
      $html .= '<tr>';

      foreach ($cells as $columnIndex => $val) {
        $openTag = $rowIndex == 0 ? '<th>' : '<td>';
        $closeTag = $rowIndex == 0 ? '</th>' : '</td>';
        $value = $rowIndex == 0 && $columnIndex == 0 ? 'UK size' : $val;

        $html .= $openTag . $value . $closeTag;
      }

      $html .= '</tr>';
    }

    $html .= '</table>';

    return $html;
  }

  echo '<div class="product-badges">';
  // echo '<div class="product-badges-description">All measurements in cm</div>';
  echo build_table($data);
  echo '</div>';
}

function sizeTable_add_footer_styles () {
  $path = plugins_url( 'style.css', __FILE__ );
  wp_enqueue_style('product-badges', $path);
};

?>
