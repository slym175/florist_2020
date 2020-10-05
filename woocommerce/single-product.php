<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$prd_ids = [];
if (isset($_COOKIE['product_viewed']) && is_array(json_decode($_COOKIE['product_viewed']))) {
    if (in_array(get_the_ID(), json_decode($_COOKIE['product_viewed']))) {
    } else {
        $prd_ids = json_decode($_COOKIE['product_viewed']);
        $prd_ids[] = get_the_ID();
        setcookie('product_viewed', json_encode($prd_ids), time() + 259200, "/", "", 0);
    }
} else {
    $prd_ids[] = get_the_ID();
    setcookie('product_viewed', json_encode($prd_ids), time() + 259200, "/", "", 0);
}
get_header(); ?>

<?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php
    if (wp_is_mobile()) {
        get_view('mobile/woocommerce/content-single-product.php');
    } else {
        wc_get_template_part('content', 'single-product');
    }
    ?>

<?php endwhile; // end of the loop. 
?>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
