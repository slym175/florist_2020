<?php

// var_dump( get_queried_object_id());
// $post_ids = get_post_meta(get_the_ID(), 'view_mobile_rieng', false);
// var_dump($post_ids);
// die();
if(!function_exists('st_home_header_slider')){
    function st_home_header_slider($attr,$content = null)
    {
        $attr = shortcode_atts([
            'banner_group_id'   => '',
            'limit'             => '',
        ], $attr);
        return nt()->load_template('content/home/slider', '', array('attr' => $attr));
    }
    add_shortcode('st_home_header_slider', 'st_home_header_slider');
}

if(!function_exists('st_home_most_chosen_gift')){
    function st_home_most_chosen_gift($attr,$content = null)
    {
        $attr = shortcode_atts([
            'title'     => '',
            'excerpt'   => '',
            'image'     => '',
            'limit'     => '',
        ], $attr);
        return nt()->load_template('content/home/most-chosen-gift', '', array('attr' => $attr));
    }
    add_shortcode('st_home_most_chosen_gift', 'st_home_most_chosen_gift');
}

if(!function_exists('st_home_newest_products')){
    function st_home_newest_products($attr,$content = null)
    {
        $attr = shortcode_atts([
            'banner_group_id'   => '',
            'title'             => '',
            'excerpt'           => '',
            'image'             => '',
            'limit'             => '',
        ], $attr);
        return nt()->load_template('content/home/newest-product', '', array('attr' => $attr));
    }
    add_shortcode('st_home_newest_products', 'st_home_newest_products');
}

if(!function_exists('st_home_product_category')){
    function st_home_product_category($attr,$content = null)
    {
        $attr = shortcode_atts([
            'category'     => '',
            'limit'           => '',
            'banner_position' => '',
        ], $attr);
        return nt()->load_template('content/home/category', '', array('attr' => $attr));
    }
    add_shortcode('st_home_product_category', 'st_home_product_category');
}

if(!function_exists('st_home_hot_deal')){
    function st_home_hot_deal($attr,$content = null)
    {
        $attr = shortcode_atts([
            'category'  => '',
            'limit'     => '',
            'end_date'  => ''
        ], $attr);
        return nt()->load_template('content/home/hot-deal', '', array('attr' => $attr));
    }
    add_shortcode('st_home_hot_deal', 'st_home_hot_deal');
}

if(!function_exists('st_home_florist_youtube')){
    function st_home_florist_youtube($attr,$content = null)
    {
        $attr = shortcode_atts([
            'category'  => '',
            'limit'     => '',
        ], $attr);
        return nt()->load_template('content/home/florist-youtube', '', array('attr' => $attr));
    }
    add_shortcode('st_home_florist_youtube', 'st_home_florist_youtube');
}

if(!function_exists('st_home_florist_news')){
    function st_home_florist_news($attr,$content = null)
    {
        $attr = shortcode_atts([
            'category'  => '',
            'limit'     => '',
        ], $attr);
        return nt()->load_template('content/home/florist-news', '', array('attr' => $attr));
    }
    add_shortcode('st_home_florist_news', 'st_home_florist_news');
}