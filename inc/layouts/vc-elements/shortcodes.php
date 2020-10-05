<?php

// var_dump( get_queried_object_id());
// $post_ids = get_post_meta(get_the_ID(), 'view_mobile_rieng', false);
// var_dump($post_ids);
// die();
if(!function_exists('st_slider_tour_ft')){
    function st_slider_tour_ft($attr,$content = null)
    {
        $attr = shortcode_atts([
            'style' => 'List',
            'list_slider' => '',
        ], $attr);
        return nt()->load_template('layouts/elements/slider-home', '', array('attr' => $attr));
    }
    add_shortcode('st_slider_tour', 'st_slider_tour_ft');
}

if(!function_exists('nt_content_header')){
    function nt_content_header($attr,$content = null)
    {
        $attr = shortcode_atts([
            'list_slider' => '',
            'new_ids' => '',
            'banner_group' => '',
            'limit' => '',
            'list_banner' => '',
        ], $attr);
        return nt()->load_template('content/content-header', '', array('attr' => $attr));
    }
    add_shortcode('nt_content_header', 'nt_content_header');
}

if(!function_exists('st_product_sale')){
    function st_product_sale($attr,$content = null)
    {
        $attr = shortcode_atts([
            'limit'         => '',
            'banner_url'    => '',
        ], $attr);
        return nt()->load_template('products/product-sale', '', array('attr' => $attr));
    }
    add_shortcode('st_product_sale', 'st_product_sale');
}

if(!function_exists('st_product_in_category')){
    function st_product_in_category($attr,$content = null)
    {
        $attr = shortcode_atts([
            'cat_id' => '',
            'limit' => '',
            'banner_group' => '',
        ], $attr);
        return nt()->load_template('products/product-in-category', '', array('attr' => $attr));
    }
    add_shortcode('st_product_in_category', 'st_product_in_category');
}

if(!function_exists('st_product_viewed')){
    function st_product_viewed($attr,$content = null)
    {
        $attr = shortcode_atts([
            'limit' => '',
        ], $attr);
        return nt()->load_template('products/product-viewed', '', array('attr' => $attr));
    }
    add_shortcode('st_product_viewed', 'st_product_viewed');
}

if(!function_exists('st_news_and_video')){
    function st_news_and_video($attr,$content = null)
    {
        $attr = shortcode_atts([
            'limit' => '',
            'ids' => '',
            'video_ids' => '',
        ], $attr);
        return nt()->load_template('content/news-video/list-news', '', array('attr' => $attr));
    }
    add_shortcode('st_news_and_video', 'st_news_and_video');
}

if(!function_exists('st_abc')){
    function st_abc($attr,$content = null)
    {
        $attr = shortcode_atts([
            'limit' => '',
            'ids' => '',
        ], $attr);
        return nt()->load_template('content/news-video/list-news', '', array('attr' => $attr));
    }
    add_shortcode('st_abc', 'st_abc');
}

if(!function_exists('st_single_image')){
    function st_single_image($attr,$content = null)
    {
        $attr = shortcode_atts([
            'image' => '',
            'link_to' => '',
        ], $attr);
        return nt()->load_template('content/single', 'image', array('attr' => $attr));
    }
    add_shortcode('st_single_image', 'st_single_image');
}

