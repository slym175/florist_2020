<?php $limit = (isset($attr['limit']) && $attr['limit']) ? $attr['limit'] : 12; ?>
<?php if($data['page'] == 1) : ?>
    <div class="cat-loading d-none" >
        <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
    </div>
<?php endif; ?>
<?php while ($prod->have_posts()) :
    $prod->the_post();
    global $product; ?>
        <div class="col-lg-3 col-md-3 col-6 card p-0 product">
            <a href="<?= the_permalink() ?>">
                <img class="card-img-top" src="<?= get_the_post_thumbnail_url(get_the_ID(), array(300, 300)) ?>" alt="Card image cap">
            </a>
            <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                <img class="img-fluid" src="<?= THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status">
            </span>
            <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
            <div class="card-body p-2">
                <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                    <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . ' ' . get_woocommerce_currency_symbol() : 'Liên h' ?></span>
                                                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                    <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                </div>
                <div class="d-flex">
                    <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>" alt="star"></span>
                    <span class="product-cmt"><?= $product->get_rating_count() ?>đánh giá</span>
                </div>
            </div>
        </div>
<?php endwhile; ?>
<?php if($prod->max_num_pages > $data['page']) :?>
    <div class="col-12 text-center">
        <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="<?= $data['page']+1 ?>" data-limit="<?= $limit ?>" data-slugg="<?= $data['slugg'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false, 'layouts/archive-product-parent-layout');" title="<?= $data['slugg'] ?>" class="btn-more px-4 py-2 mt-md-4 mt-2">
                <span class="mr-3">Xem thêm</span>
                <i class="fas fa-chevron-down"></i>
        </a>
    </div>
<?php endif;?>