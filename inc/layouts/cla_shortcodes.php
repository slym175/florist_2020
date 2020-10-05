<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 10:30 AM
 */
function customer_get_template_part($slug, $name = null)
{
    if (wp_is_mobile()) {
        return get_template_part('mobile/' . $slug, $name);
    }
    // $slug = wp_is_mobile() ? 'moblie/' . $slug : $slug;
    return get_template_part($slug, $name);
}

function listTags($limit)
{
    return customer_get_template_part('template_parts/contents/tag', '');
}

add_shortcode('ns_list_tags', 'listTags');

function listComment($limit)
{
    return customer_get_template_part('template_parts/contents/comment', '');
}

add_shortcode('ns_list_comment', 'listComment');

function listNewsCategory($limit)
{
    return customer_get_template_part('template_parts/contents/category', '');
}

add_shortcode('ns_list_news_category', 'listNewsCategory');

function listNewsCategoryDetail($limit)
{
    return customer_get_template_part('template_parts/contents/category', 'detail');
}

add_shortcode('ns_list_news_category_detail', 'listNewsCategoryDetail');

function listPostMostViewed($limit)
{
    return customer_get_template_part('template_parts/contents/post-most-viewed', '');
}

add_shortcode('ns_list_post_most_viewed', 'listPostMostViewed');

function postsRelated($limit)
{
    return customer_get_template_part('template_parts/contents/posts-related', '');
}

add_shortcode('ns_posts_related', 'postsRelated');

function listMobilePostMostViewed($limit)
{
    return customer_get_template_part('template_parts/contents/post-most-viewed', '');
}

add_shortcode('ns_list_mobile_post_most_viewed', 'listMobilePostMostViewed');

function listMobileNewsCategory($limit)
{
    return customer_get_template_part('template_parts/contents/category', '');
}

add_shortcode('ns_list_mobile_news_category', 'listMobileNewsCategory');