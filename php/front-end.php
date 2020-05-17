<?php

add_action( 'woocommerce_share', 'add_product_badges' );

function add_product_badges () {
  if (get_post_meta(get_the_ID(), '_show_product_badges', true) == 'yes') {
    write_product_badges_content();
    write_product_bages_css();
  }
}

function write_product_badges_content () {
  echo '<div class="product-badges-container">';

  $badges = require( 'badges.php');
  foreach($badges as $item) {
    if (get_post_meta(get_the_ID(), $item['id'], true) == 'yes') {
      $image = $item['image'];
      $label = $item['label'];

      echo '<div class="product-badges-item">';
      echo "<img src='$image' alt='$label' title='$label' />";
      echo "<span> $label </span>";
      echo '</div>';
    }
  }
  echo '</div>';
}

function write_product_bages_css () {
  ?>
  <style>
  .product-badges-container {
    margin: 0px;
    text-align: center;
  }
  .product-badges-container:first-of-type {
    display: block;
  }
  .product-badges-item {
    display: inline-block;
    width: 68px;
    vertical-align: top;
    margin: 10px 14px;
    padding: 5px;
  }

  .product-badges-item img {
    width: 100%;
    height: auto;
  }

  .product-badges-item span {
    /* font-size: 10px; */
    font-weight: bold;
    line-height: 1em;
    display: block;
    margin-top: 10px;
  }
  </style>
  <?php
}

?>
