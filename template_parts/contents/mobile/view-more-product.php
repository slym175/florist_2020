<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/6/2020
 * Time: 6:05 PM
 */

$paged = (isset($_POST['page']) && $_POST['page']) ? $_POST['page'] : '';
$orderby = (isset($_POST['orderby']) && $_POST['orderby']) ? $_POST['orderby'] : '';

//
$args = [
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'paged' => $paged,
    'tax_query' => array(array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => array($_POST['cat_id']),
    ))
];
$product_load_more = new WP_Query($args);



?>
<?php if ($paged): ?>

    <?php if ($product_load_more->have_posts()): while ($product_load_more->have_posts()) : $product_load_more->the_post();
        global $product ?>
        <div class="col-lg-3 col-md-4 col-6 card p-0 product">
            <a href="<?= the_permalink() ?>">
                <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
            </a>
            <span class="discount-status">
                                        <img class="img-fluid" src="<?= THEME_URL_URI.'/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
                                    </span>
            <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
            <div class="card-body p-2">
                <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                    <?php $sale = ($product->get_sale_price()) ? floor((1- ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                    <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên h' ?></span>
                    <span class="product-d-discount ml-lg-3 ml-1 text-danger">-<?= $sale ?>%</span>
                </div>
                <div class="d-flex">
                    <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI.'/assets/images/star.svg' ?>" alt="star"></span>
                    <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                </div>
            </div>
        </div>

    <?php endwhile; endif; ?>

    <?php if (isset($product_load_more->max_num_pages) && $product_load_more->max_num_pages > $paged): ?>
        <div class="row m-md-4 m-2">
            <div class="col-12 text-center">
                <a href="javascript:void(0)" onclick="loadProducts(this)" data-pageindex="<?= $paged+1 ?>" data-cat-id="<?= $_POST['cat_id'] ?>" data-url="<?= admin_url('admin-ajax.php') ?>" class="btn-more px-4 py-2">
                    <span class="mr-3">Xem thêm</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
