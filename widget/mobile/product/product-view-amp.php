<?php
$query = new WP_Query(array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'tax_query' => array(array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => array($cat_id),
    ))
));
if ($query->have_posts()) :
    while ($query-> have_posts()) : $query->the_post();
        global $product; ?>
        <div class="<?= $class ?>">
            <a href="<?= the_permalink() ?>">
                <img src="<?= get_the_post_thumbnail_url('',array(300,300)) ?>" alt="<?= the_title() ?>" style="width: 169px;height: 165px">
            </a>
            <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                <img class="img-fluid" src="<?= THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
            </span>
            <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
            <div class="card-body p-0 mt-lg-2 mt-1">
                <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                    <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                    <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                    <span class="product-d-discount ml-lg-3 ml-1 text-danger">-<?= $sale ?>%</span>
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