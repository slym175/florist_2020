<?php $limit = (isset($attr['limit']) && $attr['limit']) ? $attr['limit'] : 12; ?>
<?php if($data['page'] == 1) : ?>
    <div class="cat-loading d-none" >
        <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
    </div>
<?php endif; ?>
<?php
while ($prod->have_posts()) : $prod->the_post();
global $product;?>
	<div class="card p-2 col-md-3 col-lg-2 col-4 product">
        <a href="<?= the_permalink() ?>">
            <img class="amp-img" src="<?= get_the_post_thumbnail_url(get_the_ID(), array(196, 196)) ?>" alt="<?= the_title() ?>" />
        </a>
        <div class="discount-status">
            <?php if ($sale) : ?>
                <img data-amp-auto-lightbox-disable class="img-fluid amp-img" src="<?= THEME_URL_URI ?>/assets/assets/2606/Group 2108.png" alt="Red Status" />
            <?php endif; ?>
        </div>
        <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
        <div class="card-body p-0 mt-lg-2 mt-1">
            <span class="product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
            <div class="d-flex align-items-center">
                <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                <?php if ($sale) : ?>
                    <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                <?php endif; ?>
            </div>
            <div class="d-flex">
                <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img class="amp-img" src="<?= THEME_URL_URI ?>/assets/assets/star.svg" alt="star" /></span>
                <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
            </div>
        </div>
    </div>
<?php endwhile; wp_reset_postdata();?>
<?php if($prod->max_num_pages > $data['page']) :?>
    <div class="col-12 d-flex justify-content-center more-product">
        <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="<?= $data['page']+1 ?>" data-limit="<?= $limit ?>" data-slugg="<?= $data['slugg'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false);" title="<?= $slugg ?>" class="btn btn-outline-primary py-1 px-2 mt-3">Xem thêm <i class="fas fa-angle-down ml-2"></i></a>
    </div>
<?php endif;?>