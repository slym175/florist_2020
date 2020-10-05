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

?>
<?php if (isset($product_purchased_together) && $product_purchased_together) : ?>
    <section class="container pt-3 border-top">
        <div class="row">
            <div class="col-12 mb-2">
                <h6 class="font-weight-bold font-14 section-title-14">Sản phẩm mua kèm:</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12 owl-carousel owl-theme dp-owl-carousel border-top">
                <?php get_view_widget('mobile/product/product-view-amp-1.php', ['products' => $product_purchased_together, 'class' => 'card p-2 product item']) ?>
            </div>
            <div class="col-12 dot-container" id="carousel-dots"></div>
        </div>
    </section>
<?php endif; wp_reset_query();?>