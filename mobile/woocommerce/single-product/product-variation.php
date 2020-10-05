<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/9/2020
 * Time: 5:00 PM
 */
global $product;
$woo = new WoocommerceNewsun();
$sales_price_from = get_post_meta($product->get_id(), '_sale_price_dates_from', true);
$sales_price_to = get_post_meta($product->get_id(), '_sale_price_dates_to', true);


if ($product->is_type('variable')) {

    $default_attributes = $product->get_default_attributes();
    $variations = $product->get_attributes();
    $attributes = [];
    foreach ($variations as $key => $variation) {
        $attributes[] = wc_get_product_terms($product->get_id(), $key, array('fields' => 'all'));
    }

    $product_variations = $product->get_available_variations();

    $get_price = $woo->get_html_price_default_product_variable($default_attributes, $product_variations);

    $base_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $product_active = get_product_active($product_variations, $default_attributes, $attributes);
}

?>

<div class="col-12 col-md-6">
    <?php $sale = get_post_meta(get_the_ID(), 'sale_information', true); ?>
    <?php if ($product->is_type('variable')) : ?>
        <?php
        get_view(
            'mobile/woocommerce/single-product/add-to-cart/variable-custom.php',
            array(
                'attributes' => $attributes,
                'product_variations' => $product_variations,
                'default_attributes' => $default_attributes,
                'product' => $product,
                'get_price' => $get_price,
                'woo' => $woo,
                'sale' => $sale,
                'sales_price_to' => $sales_price_to,
                'base_link' => $base_link,
                'product_active' => $product_active,
            )
        );
        ?>
    <?php else : ?>
        <div class="d-flex align-items-baseline font-14 product-price mt-3">
            <span class="mr-2 text-6">Giá:</span>
            <?= (isset($product_active['success']) && $product_active['success']) ? $woo->display_price_default_product_variable($product_active['data']['display_price'],$product_active['data']['display_regular_price']) : $product->get_price_html() ?>
        </div>
        <div class="promotion">
            <div class="card">
                <?php if ($product->is_on_sale()) : ?>
                    <?php if ($sales_price_to) : ?>
                        <div class="card-header border p-2">
                            <span class="font-weight-bold">Khuyến mại:</span>
                            <span class="ml-2">Áp dụng đến ngày <?= date('d/m/Y', $sales_price_to) ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($sale) : ?>
                    <?php if (!$sales_price_to) : ?>
                        <div class="card-header border p-2">
                            <span class="font-weight-bold">Khuyến mại</span>
                        </div>
                        <div class="card-body p-2 border border-top-0">
                            <?php foreach ($sale as $key => $value) : ?>
                                <div class="d-flex mb-2">
                                    <span class="step"><?= $key + 1 ?></span>
                                    <span class="text-justify font-13"><?= $value ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?= '?quick_buy=1&add-to-cart=' . $post->ID ?>" class="btn text-center btn-order">
            <p class="mb-1 font-weight-bold text-white font-14">Mua ngay</p>
            <p class="m-0 text-white font-10 o-8">Giao hàng tận nơi</p>
        </a>
    <?php endif; ?>

</div>
<div class="col-12 col-md-6 mt-2 font-14 order-md-last phone-list">
    <p class="font-weight-bold mb-1">Liên Hệ Tư Vấn:</p>
    <p class="mb-1">Hà Nội: <strong class="text-6">
        <a href="tel:0961555155" class="text-6">0961 555 155</a> - <a href="tel:0934668811" class="text-6">0934
                66 88 11</a></strong></p>
    <p class="mb-1">Nghệ An: <strong class="text-6"><a href="tel:0904736111" class="text-6">0904 736 111</a> - <a
                    href="tel:0973995429" class="text-6">0973 99 5429</a></strong></p>
    <p class="mb-1">Đà Nẵng: <strong class="text-6"><a href="tel:0965119567" class="text-6">0965 119 567</a> - <a
                    href="tel:0934668811" class="text-6">0934 66 88 11</a></strong></p>
    <p class="mb-1">Nha Trang: <strong class="text-6"><a href="tel:0961652266" class="text-6">0961 65 2266</a> - <a
                    href="tel:0911704682" class="text-6">0911 70 46 82</a></strong></p>
    <p class="mb-1">Hồ Chí Minh: <strong class="text-6"><a href="tel:0961555255" class="text-6">0961 555 255</a> - <a
                    href="tel:0934668811" class="text-6">0934 66 88 11</a></strong></p>
</div>