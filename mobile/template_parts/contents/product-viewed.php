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
}
?>
<?php if (isset($product_viewed) && $product_viewed) : ?>
    <section class="container pt-3 border-top">
        <div class="row">
            <div class="col-12 mb-2">
                <h6 class="font-weight-bold font-14 section-title-14">Sản phẩm đã xem:</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12 owl-carousel owl-theme dp-owl-carousel-3 border-top">
                <?php get_view_widget('mobile/product/product-view-amp-1.php', ['products' => $product_viewed, 'class' => 'card p-2 product item']); 
                ?>
            </div>
            <div class="col-12 dot-container" id="carousel-dots-3"></div>
        </div>
    </section>
<?php endif; wp_reset_query();?>