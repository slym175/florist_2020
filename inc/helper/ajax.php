<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/22/2020
 * Time: 8:28 AM
 */
add_action("wp_ajax_get_post_detail", "get_post_detail");
add_action('wp_ajax_nopriv_get_post_detail', 'get_post_detail');

function get_post_detail() {
    $post_id = $_POST["post_id"];
    $post_detail = get_post($post_id);
    echo nt()->load_template('content/news-video/load-post-detail', '', array('post_detail' => $post_detail));

    die();

}

add_action("wp_ajax_ajax_qty_cart", "ajax_qty_cart");
add_action('wp_ajax_nopriv_ajax_qty_cart', 'ajax_qty_cart');

function ajax_qty_cart() {
    $cart_item_key = $_POST['hash'];
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }

    die();
}

add_action("wp_ajax_coupon_code_product_add_to_cart", "coupon_code_product_add_to_cart");
add_action('wp_ajax_nopriv_coupon_code_product_add_to_cart', 'coupon_code_product_add_to_cart');

function coupon_code_product_add_to_cart() {
    if ( ! empty( $_POST['coupon_code'] ) ) {
        WC()->cart->add_discount( wc_format_coupon_code( wp_unslash( $_POST['coupon_code'] ) ) );
    } else {
        wc_add_notice( WC_Coupon::get_generic_coupon_error( WC_Coupon::E_WC_COUPON_PLEASE_ENTER ), 'error' );
    }
    echo wc_print_notices();
    wp_die();
}

add_action("wp_ajax_ajax_load_products_in_category", "ajax_load_products_in_category");
add_action('wp_ajax_nopriv_ajax_load_products_in_category', 'ajax_load_products_in_category');

function ajax_load_products_in_category() {
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "noslug";
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $limit = isset($_POST['limit']) ? $_POST['limit'] : 12;

    $template =  isset($_POST['template']) ? $_POST['template'] : ''; //view rendered

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'paged' => $page,
        'posts_per_page' => $limit,
        'tax_query' => array(array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array($slug),
        ))
    );

    $prod_in_category = new WP_Query($args);
    echo nt()->load_template($template, '', array('prod' => $prod_in_category, 'data' => array('page' => $page, 'slugg' => $slug)));

    die();
}

//get store
add_action("wp_ajax_get_store", "get_store");
add_action('wp_ajax_nopriv_get_store', 'get_store');

function get_store() {
    $city_id = (isset($_POST["city_id"]) && $_POST["city_id"] ) ? $_POST["city_id"] : '';
    $district_id = (isset($_POST["district_id"]) && $_POST["district_id"]) ? $_POST["district_id"] : '';
    echo nt()->load_template('locations/get','store',array('city_id' => $city_id,'district_id' => $district_id));
    die();
}

add_action("wp_ajax_load_payment_methods", "load_payment_methods");
add_action('wp_ajax_nopriv_load_payment_methods', 'load_payment_methods');

function load_payment_methods() {
    $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : '';
    $template = '';
    $data = '';

    if($post_type == 'location') {
        $template = 'mobile/layouts/location-payment-layout';
        $data = new WP_Query([
            'post_type' => 'location',
            'post_status' => 'publish',
            'posts_per_page' => 5
        ]);
    }
    elseif($post_type == 'bank') {
        $template = 'mobile/layouts/bank-payment-layout';
        
    }
    else {
        $template = '';
    }

    if($template != '') {
        echo nt()->load_template($template, '', $data);
    }
    die();
}

add_action("wp_ajax_ajax_load_posts_in_category", "ajax_load_posts_in_category");
add_action('wp_ajax_nopriv_ajax_load_posts_in_category', 'ajax_load_posts_in_category');

function ajax_load_posts_in_category() {
    $slug = isset($_POST['slug']) ? $_POST['slug'] : "noslug";
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $limit = isset($_POST['limit']) ? $_POST['limit'] : 12;

    $template =  isset($_POST['template']) ? $_POST['template'] : ''; //view rendered

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $page,
        'posts_per_page' => $limit,
        'tax_query' => array(array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array($slug),
        ))
    );

    $post_in_category = new WP_Query($args);
    echo nt()->load_template($template, '', array('post' => $post_in_category, 'data' => array('page' => $page, 'slugg' => $slug)));

    die();
}