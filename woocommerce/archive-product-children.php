<?php


defined('ABSPATH') || exit;
get_header();
$category = get_queried_object();
$t_id = $category->term_id;
$cognome_nome = get_field('attchment_image', 'product_cat_' . $t_id);

$term_meta = get_option("taxonomy_" . $t_id);

global $wp_query;
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$orderby = (isset($_GET['orderby']) && $_GET['orderby']) ? $_GET['orderby'] : '';
$banner_sale = get_option('banner_sale');
?>
<main class="bg-f8 pb-3">
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
                    <div class="card-body p-0 d-flex flex-wrap list-product border-left">
                        <?php if (have_posts()) :
                            while (have_posts()) : the_post();
                                global $product; ?>
                                <div class="col-lg-3 col-4 card p-2 product">
                                    <a href="<?= the_permalink() ?>">
                                        <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>"
                                             alt="<?= the_title() ?>">
                                    </a>
                                    <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                        <img class="img-fluid"
                                             src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
                                             alt="Red Status">
                                    </span>
                                    <a href="<?= the_permalink() ?>"
                                       class="product-name"><span><?= the_title() ?></span></a>
                                    <div class="card-body p-2 mt-lg-2 mt-1">
                                        <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                        <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                            <span class="product-d-discount ml-lg-3 ml-1 text-danger">-<?= $sale ?>%</span>
                                        </div>
                                        <div class="d-flex">
                                            <span class="product-star"><?= (float)$product->get_average_rating() ?>
                                                /5 <img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>"
                                                        alt="star"></span>
                                            <span class="product-cmt"><?= $product->get_rating_count() ?>
                                                đánh giá</span>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                        endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
                <?php if ($wp_query->max_num_pages > 1) : ?>
                    <div class="row mt-md-4 mt-2">
                        <div class="col-12 text-center">
                            <?php
                            echo posts_navigation();
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!--Bộ lọc-->
            <?php
            if (isset($term_meta['product_cat_attributes_general']) && $term_meta['product_cat_attributes_general'] == 2) {
                if (isset($term_meta['product_cat_attributes']) && $term_meta['product_cat_attributes']) {
                    wc_get_template('filter-product-category.php', array('product_cat_attributes' => $term_meta['product_cat_attributes']));
                }
            } else {
                get_sidebar('product-category');
            }

            ?>

        </div>
    </section>
    <script>
        jQuery(function () {
            jQuery(".product-attribute").change(function () {
                var url = jQuery(this).data('url');
                window.location.href = url;
            });

            jQuery(".orderby-product").change(function () {
                var url = jQuery(this).data('url');
                window.location.href = url;
            });
        })
    </script>
<?php
do_shortcode('[ns_list_tags]');
?>
</main>
<?php
get_footer();
?>