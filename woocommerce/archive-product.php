<?php

defined('ABSPATH') || exit;
get_header();

if (is_search()) {
    wc_get_template_part( 'content', 'search' );

} else {
    if(is_tax()){
        $category = get_queried_object();

        $t_id = $category->term_id;

        $product_cats = get_terms([
            'taxonomy' => 'product_cat',
            'post_status' => 'publish',
            'show_count' => 0,
            'pad_counts' => 0,
            'hierarchical' => 1,
            'title_li' => '',
            'hide_empty' => 0,
        ]);
        $prd_cats = [];

        foreach ($product_cats as $key => $product_cat) {
            $prd_cats[] = (array)$product_cat;
        }
        $cla_cat = new ClaCategory();
        $tree = $cla_cat->data_tree($prd_cats, $t_id);


        if ($tree) {
            wp_reset_query();
            get_template_part('woocommerce/archive-product', 'parent');
        } else {
            wp_reset_query();
            get_template_part('woocommerce/archive-product', 'children');
        }
    }else{
        wc_get_template_part( 'content', 'list-product' );
    }
}

get_footer();
