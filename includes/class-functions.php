<?php

function woo_all_remove_script(){
	wp_enqueue_script( 'woo-all-remove',  plugin_dir_url( __FILE__ ) . '/assets/js/woo-all-remove.js');
}

add_action(	'admin_enqueue_scripts', 'woo_all_remove_script'  );

function woo_remove_all_products()
{
	$db = new Db_All_Remove();

	$products = $db->get_all_products();

	if(count($products) < 1)
	{
		wp_send_json(['succeess' => true, 'isEmpty' => true ]);
	}

	try {
		foreach ($products as $key => $product) {
			$request = new WP_REST_Request( 'DELETE', '/wc/v3/products/'.$product->product_id );
			// Установим параметры запроса
			$request->set_param( 'force', true );
			rest_do_request( $request );
		}
		wp_send_json(['succeess' => true ]);
	} catch (\Throwable $th) {
		wp_send_json(['succeess' => false, 'error' => $th]);
	}

	wp_die(); 
}

add_action( 'wp_ajax_woo_remove_all_products', 'woo_remove_all_products' );
add_action( 'wp_ajax_nopriv_woo_remove_all_products', 'woo_remove_all_products' );


