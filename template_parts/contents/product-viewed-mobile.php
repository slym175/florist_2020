<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 11:14 AM
 */
global $product;
$prd_ids = (isset($_COOKIE['product_viewed']) && $_COOKIE['product_viewed']) ? json_decode($_COOKIE['product_viewed']) : '';


if ($prd_ids) {
    foreach ($prd_ids as $key => $value) {
        if ($value == get_the_ID()) {
            unset($prd_ids[$key]);
        }
    }
    if ($prd_ids) {
        $arg_product_viewed = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'post__in' => $prd_ids,
        ];
        $product_viewed = new WP_Query($arg_product_viewed);
    }
    $banner_sale = get_option('banner_sale');
}
?>
<?php if (isset($product_viewed) && $product_viewed): ?>
    <div class="container border-top border-left mb-3">
        <div class="row p-0">
            <?php while ($product_viewed->have_posts()): $product_viewed->the_post();
                global $product ?>
                <div class="col-lg-2 col-md-3 col-4 card p-2 product">
                    <a href="<?= the_permalink() ?>">
                        <img class="card-img-top"
                             src="<?= get_the_post_thumbnail_url(get_the_ID(), array(300, 300)) ?>"
                             alt="Card image cap">
                    </a>
                    <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                <img class="img-fluid" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
                                     alt="Red Status">
                            </span>

                    <a href="<?= the_permalink() ?>"
                       class="product-name"><span><?= the_title() ?></span></a>

                    <div class="card-body px-0 pt-2 pb-0">
                        <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                        <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên h' ?></span>
                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                            <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                        </div>
                        <div class="d-flex">
                            <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img
                                        src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>" alt="star"></span>
                            <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>


