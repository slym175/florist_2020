<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
get_header();
$category = get_queried_object();
$t_id = $category->term_id;
$cognome_nome = get_field('attchment_image', 'product_cat_' . $t_id);
$banner_sale = get_option('banner_sale');
// $view_mobile_rieng = get_field('view_mobile_rieng', 'product_cat_' . $t_id);
if (wp_is_mobile()) : ?>
    <section class="container border-bottom">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="m-breadcrumb">
                    <?php
                    $args = array(
                        'delimiter' => '',
                        'home' => 'Trang chủ',
                        'wrap_before' => '<ol class="breadcrumb m-0">',
                        'wrap_after' => '</ol>',
                        'before' => '<li class="breadcrumb-item">',
                        'after' => '</li>',
                    );
                    ?>
                    <?php woocommerce_breadcrumb($args); ?>
                </nav>
            </div>
        </div>
    </section>
    <?php if ($category->description) : ?>
        <section class="container py-3 mb-3 border-bottom">
            <div class="row">
                <div class="col-12 font-14 show-hide-text">
                    <p class="text-justify text-2"><?= $category->description ?></p>
                    <div class="d-flex justify-content-center show-more">
                        <a class="font-12">Xem thêm<i class="fas fa-chevron-down font-12 ml-2"></i></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="container catalog-section pb-3">
        <div class="row mb-3">
            <div class="col-12">
                <a class="btn btn-catalog" data-toggle="collapse" href="#collapseCatalog1" role="button" aria-expanded="false" aria-controls="collapseContent">
                    <span><?= $category->name ?></span>
                </a>
            </div>
        </div>
        <div class="row border-top cat-product-container">
            <div class="cat-loading d-none" >
                <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
            </div>
            <?php while ($query->have_posts()) :
                $query->the_post();
                global $product;
                $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                <div class="card p-2 col-md-3 col-lg-2 col-4 product">
                    <a href="<?= the_permalink() ?>">
                        <img class="amp-img" src="<?= get_the_post_thumbnail_url(get_the_ID(), array(196, 196)) ?>" alt="<?= the_title() ?>" />
                    </a>
                    <div class="discount-status">
                        <?php if ($sale) : ?>
                            <img data-amp-auto-lightbox-disable class="img-fluid amp-img" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status" />
                        <?php endif; ?>
                    </div>
                    <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
                    <div class="card-body p-0 mt-lg-2 mt-1">
                        <span class="product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                        <div class="d-flex align-items-center">
                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                            <?php if ($sale) : ?>
                                <span class="product-d-discount ml-lg-3 ml-1">(-<?= $sale ?>%)</span>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex">
                            <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img class="amp-img" src="<?= THEME_URL_URI ?>/assets/assets/star.svg" alt="star" /></span>
                            <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                            </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php if($query->max_num_pages > 1) :?>
                <div class="col-12 d-flex justify-content-center more-product">
                    <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="2" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false);" title="Xem thêm" class="btn btn-outline-primary py-1 px-2 mt-3">Xem thêm <i class="fas fa-angle-down ml-2"></i></a>
                </div>
            <?php endif;?>
        </div>
    </section>
<?php else :
    global $wp_query;
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $orderby = (isset($_GET['orderby']) && $_GET['orderby']) ? $_GET['orderby'] : ''; ?>
    <?php if ($cognome_nome['url']) : ?>
        <section class="banner">
            <div class="container">
                <div class="row">
                    <img src="<?= $cognome_nome['url'] ?>" class="img-fluid" alt="">
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="container">
        <div class="row">
            <div class="col-12 p-0 my-3">
                <?php
                $args = array(
                    'delimiter' => '',
                    'home' => 'Trang chủ',
                    'wrap_before' => '<ol class="breadcrumb breadcrumb-left p-0 m-0">',
                    'wrap_after' => '</ol>',
                    'before' => '<li class="breadcrumb-item">',
                    'after' => '</li>',
                );
                ?>
                <?php woocommerce_breadcrumb($args); ?>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row main-reverse">
            <div class="col-lg-9 col-12 p-0 pr-lg-3">
                <div class="card order-card">
                    <div class="card-header d-flex order-options">
                        <span class="col-lg-2 col-5 font-weight-bold">Xếp theo:</span>
                        <div class="filter-icon col-7 col-lg-10">
                            <i class="fas fa-sort-amount-down float-right"></i>
                        </div>
                        <div class="col-lg-10 filter-area">
                            <div class="c-radio-inline">
                                <input type="radio" class="d-none orderby-product"
                                       data-url="<?= add_query_arg('orderby', '', $link) ?>" data-sort="bc" id="radio1"
                                       name="orderBy" <?= (!$orderby) ? 'checked' : '' ?>>
                                <label class="c-radio-label" for="radio1">Bán chạy</label>
                            </div>
                            <div class="c-radio-inline">
                                <input class="d-none orderby-product" type="radio" id="radio2" name="orderBy"
                                       data-url="<?= add_query_arg('orderby', 'price-desc', $link) ?>" <?= ($orderby && $orderby == 'price-desc') ? 'checked' : '' ?>>
                                <label class="c-radio-label" for="radio2">Giá cao đến thấp</label>
                            </div>
                            <div class="c-radio-inline">
                                <input class="d-none orderby-product" type="radio" id="radio3" name="orderBy"
                                       data-url="<?= add_query_arg('orderby', 'price', $link) ?>" <?= ($orderby && $orderby == 'price') ? 'checked' : '' ?>>
                                <label class="c-radio-label" for="radio3">Giá thấp đến cao</label>
                            </div>
                            <div class="c-radio-inline">
                                <input class="d-none orderby-product" type="radio" id="radio4" name="orderBy"
                                       data-url="<?= add_query_arg('orderby', 'date', $link) ?>" <?= ($orderby && $orderby == 'date') ? 'checked' : '' ?>>
                                <label class="c-radio-label" for="radio4">Mới - Cũ</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0 d-flex flex-wrap list-product">
                        <?php if (have_posts()) :
                            while (have_posts()) : the_post();
                                global $product; ?>
                                <div class="col-lg-3 col-md-4 col-6 card p-2 product">
                                    <a href="<?= the_permalink() ?>">
                                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                    </a>
                                    <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                        <img class="img-fluid" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
                                    </span>
                                    <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
                                    <div class="card-body p-0 mt-lg-2 mt-1">
                                        <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                        <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                            <span class="product-d-discount ml-lg-3 ml-1 text-danger">(-<?= $sale ?>%)</span>
                                        </div>
                                        <div class="d-flex">
                                            <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>" alt="star"></span>
                                            <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                                        </div>
                                    </div>
                                </div>

                        <?php endwhile;
                        endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
                <?php if ($wp_query->max_num_pages > 1) : ?>
                    <div class="row m-md-4 m-2">
                        <div class="col-12 text-center">
                            <a href="javascript:void(0)" onclick="loadProducts(this)" data-pageindex="2" data-orderby="<?= $orderby ?>" data-cat-id="<?= $t_id ?>" data-url="<?= admin_url('admin-ajax.php') ?>" class="btn-more px-4 py-2">
                                <span class="mr-3">Xem thêm</span>
                                <i class="fas fa-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!--Bộ lọc-->
            <?php get_sidebar('products'); ?>

        </div>
    </section>
<?php endif;
do_shortcode('[ns_list_tags]');
get_footer();
