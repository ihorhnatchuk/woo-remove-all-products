<?php

/**
 * Admin Menu
 */
class Remove_All_Products_Menu {

    /**
     * Kick-in the class
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {

        /** Top Menu **/
        add_menu_page('Все матчи', 'Удаление всех товаров' , 'manage_options',  'remove-all-produts', array( $this, 'plugin_page' ), 'dashicons-backup', 4);
        add_submenu_page( 'remove-all-produts', __( 'Удаление всех товаров', '' ), __( 'Удаление всех товаров', '' ), 'manage_options', 'remove-all-produts', array( $this, 'plugin_page' ) );
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {
        include  dirname( __FILE__ ) . '/views/page.php';;
    }
}