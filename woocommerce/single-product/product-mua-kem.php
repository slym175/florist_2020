<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 2:08 PM
 */

$purchased_together = get_post_meta(get_the_ID(), 'purchased_together', true);
if ($purchased_together) {
    $args_purchased_together = [
        'post_type' => 'product',
        'post_status' => 'publish',
        'post__in' => $purchased_together,
    ];
    $product_purchased_together = new WP_Query($args_purchased_together);

}
$banner_sale = get_option('banner_sale');
?>
<?php if (isset($product_purchased_together) && $product_purchased_together): ?>
    <h5 class="py-4 font-18 mb-0">Sản phẩm mua kèm:</h5>
    <div class="container border-bottom pb-4">
        <div class="row p-0 border-top border-left">
            <?php while ($product_purchased_together->have_posts()): $product_purchased_together->the_post(); global $product?>
                <div class="col-lg-3 col-md-3 col-6 card p-0 product">
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

                    <div class="card-body p-2">
                        <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                        <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên h' ?></span>
                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                            <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                        </div>
                        <div class="d-flex">
                            <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI.'/assets/images/star.svg' ?>" alt="star"></span>
                            <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query() ?>
