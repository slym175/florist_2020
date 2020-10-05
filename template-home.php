<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Home
 */

if (wp_is_mobile()) {
    get_header('mobile');
    if (have_posts()) {
        the_post();
        the_content();
    }
    do_shortcode('[ns_list_tags]');
    get_footer('mobile');
} else {
    get_header('');

    if (have_posts()) {
        the_post();
        the_content();
    }
    do_shortcode('[ns_list_tags]');
    get_footer();
}
