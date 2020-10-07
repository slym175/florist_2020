<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Gift
 */
get_header('');

if (have_posts()) {
    the_post();
    the_content();
}
    
get_footer();
?>