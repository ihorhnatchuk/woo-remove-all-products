<?php
/*
Plugin Name: Woo All Remove Products
Plugin URI: 
Description: A brief description of the Plugin.
Version: 1.0
Author: air
Author URI: 
License: A "Slug" license name e.g. GPL2
*/

if( ! defined( 'ABSPATH' ) ) {
    return;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action('init' , function(){
        include dirname(__FILE__) . '/includes/class-admin-nemu.php';
        include dirname(__FILE__) . '/includes/class-db.php';
        include dirname(__FILE__) . '/includes/class-functions.php';

        new Remove_All_Products_Menu();
    } );
}