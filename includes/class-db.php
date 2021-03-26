<?php

class Db_All_Remove{

  public function get_all_products(){
    global $wpdb;

    $sql = "SELECT product.ID as product_id, 
                   product.post_title as product_name
            FROM  ".$wpdb->prefix."posts as product
            WHERE post_type='product'
            ORDER BY product_id ASC";

    $result =$wpdb->get_results( $wpdb->prepare($sql ) );
    return $result;
  }

}