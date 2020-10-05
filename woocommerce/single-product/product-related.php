<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 10:52 AM
 */
global $product; // If not set…

if (!is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}
$banner_sale = get_option('banner_sale');
$args = array(
    'posts_per_page' => 6,
    'columns' => 6,
    'orderby' => 'rand',
    'order' => 'desc',
);

$args['related_products'] = array_filter(array_map('wc_get_product', wc_get_related_products($product->get_id(), $args['posts_per_page'], $product->get_upsell_ids())), 'wc_products_array_filter_visible');
$args['related_products'] = wc_products_array_orderby($args['related_products'], $args['orderby'], $args['order']);


// Set global loop values.
wc_set_loop_prop('name', 'related');
wc_set_loop_prop('columns', $args['columns']);

?>
<section class="container border-bottom py-md-4">
    <div class="row">
        <div class="col-12 p-0">
            <h4 class="font-18 pb-3 p-0 mb-0">Sản phẩm tương tự:</h4>
        </div>
    </div>
    <div class="row border-top border-left">
        <?php if ($args['related_products']): ?>
            <?php foreach ($args['related_products'] as $arg): ?>
                <div class="col-lg-2 col-md-4 col-6 card p-0 product">
                    <a href="<?= get_permalink($arg->get_id()) ?>">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($arg->get_id()), 'single-post-thumbnail'); ?>
                        <img class="card-img-top" src="<?= $image[0] ?>" alt="Card image cap">
                    </a>
                    <?php if($arg->is_on_sale()): ?>
                        <span class="discount-status">
                            <img class="img-fluid" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
                        </span>
                    <?php endif; ?>
                    <a href="<?= get_permalink($arg->get_id()) ?>" class="product-name"><span><?= $arg->get_name() ?></span></a>

                    <div class="card-body p-2">
                        <span class="text-danger product-price"><?= ($arg->get_regular_price()) ? number_format(($arg->get_sale_price()) ? $arg->get_sale_price() : $arg->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                        <div class="d-flex <?= ($arg->get_sale_price()) ? '' : 'product-d-none' ?>">
                            <span class="product-d-price"><?= ($arg->get_regular_price()) ? number_format($arg->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                            <?php $sale = ($arg->get_sale_price()) ? floor((1 - ($arg->get_sale_price() / $arg->get_regular_price())) * 100) : ''; ?>
                            <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                        </div>
                        <div class="d-flex">
                            <span class="product-star"><?= (float)$arg->get_average_rating() ?>/5 <img
                                        src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>" alt="star"></span>
                            <span class="product-cmt"><?= $arg->get_rating_count() ?> đánh giá</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
