<?php foreach ($products as $value) : ?>
    <?php $product = wc_get_product($value->ID); ?>
    <div class="<?= $class ?>">
        <a href="<?= $value->guid ?>">
            <amp-img class="card-img-top" src="<?= get_the_post_thumbnail_url($value->ID, array(169, 165)) ?>" height="165" width="169" alt="<?= $value->post_title ?>"></amp-img>
        </a>
        <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
            <amp-img class="img-fluid" src="<?= THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" height="25" width="148" alt="Red Status"></amp-img>
        </span>
        <a href="<?= $value->guid ?>" class="product-name"><span><?= $value->post_title ?></span></a>
        <div class="card-body p-0 mt-lg-2 mt-1">
            <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
            <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
            </div>
            <div class="d-flex">
                <span class="product-star">
                    <?= (float)$product->get_average_rating() ?>/5 <amp-img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>" alt="star" height="11" width="11"></amp-img></span>
                <span class="product-cmt"><?= $product->get_rating_count() ?>
                    đánh giá</span>
            </div>
        </div>
    </div>
<?php endforeach; ?>