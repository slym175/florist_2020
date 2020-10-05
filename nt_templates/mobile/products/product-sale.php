<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 11:14 AM
 */
$def_banner = THEME_URL_URI.'/assets/product_group.png';
$banner_sale = get_option('banner_sale');

$limit = (isset($attr['limit']) && $attr['limit']) ? $attr['limit'] : 12;

$title = (isset($attr['banner_url']) && $attr['banner_url']) ? '' : 'Khuyến mãi nổi bật';
$banner = (isset($attr['banner_url']) && $attr['banner_url']) ?  '' : $def_banner;

if($title == '' && $banner == '') {
    $pID = url_to_postid($attr['banner_url']);
    $b = get_post($pID);
    $title = $b->post_title;
    $banner  = get_the_post_thumbnail_url( $b->ID, array(1170, 75));
}


$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'featured' => 0,
    'ignore_sticky_posts' => 1,
    //    'orderby' => $orderby,
    //    'order' => $order,
    'posts_per_page' => $limit,
    'meta_query' => array(
        array(
            'key' => '_sale_price',
            'value' => 0,
            'compare' => '>',
            'type' => 'numeric'
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'featured',
        ),
    ),

);

ob_start();

$products = new WP_Query($args);

?>

<?php
//    get_template_part('mobile/template_parts/menu/menu', 'home');
?>

<?php if ($products->have_posts()) : ?>
    <section class="container">
        <div class="discount-banner" style="background-image: url(<?= $banner ?>)">
            <h2><?= $title ?></h2>
        </div>
        <div class="row">
            <div class="col-12 owl-carousel owl-theme dp-owl-carousel border-top">
                <?php while ($products->have_posts()) :
                    $products->the_post();
                    global $product;
                    $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                    <div class="card p-2 product item">
                        <a href="<?= the_permalink() ?>">
                            
                            <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(196, 196)) ?>" alt="<?= the_title() ?>">
                        </a>
                        <?php if ($sale) : ?>
                            <div class="discount-status">
                                <img class="img-fluid" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
                            </div>
                        <?php endif; ?>
                        <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
                        <div class="card-body p-0 mt-lg-2 mt-1">
                            <span class="product-price"><?= number_format($product->get_sale_price()) . get_woocommerce_currency_symbol() ?></span>
                            <div class="d-flex align-items-center">
                                <span class="product-d-price"><?= number_format($product->get_regular_price())  . get_woocommerce_currency_symbol() ?></span>
                                <?php if ($sale) : ?>
                                    <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex">
                                <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI ?>/assets/assets/star.svg" alt="star"></span>
                                <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="col-12 dot-container" id="carousel-dots"></div>
        </div>
    </section>
<?php endif; ?>

<?php wp_reset_query(); ?>