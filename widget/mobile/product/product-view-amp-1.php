<?php while ($products->have_posts()) :
    $products->the_post();
    global $product; ?>
    <div class="<?= $class ?>">
        <a href="<?= the_permalink() ?>">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
        </a>
        
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
<?php endwhile; ?>
<?php wp_reset_query() ?>
