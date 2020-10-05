<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/9/2020
 * Time: 5:00 PM
 */
global $product;

$woo = new Woocommerceflorist();
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

<div class="col-lg-5 col-md-6 col-12">
    <div class="pb-2 product-price">
        <span class="font-weight-bold mr-2">Giá :</span>
        <?php if ($product->is_type('variable')): ?>
            <?= (isset($product_active['success']) && $product_active['success']) ? $woo->display_price_default_product_variable($product_active['data']['display_price'], $product_active['data']['display_regular_price']) : '<span class="text-danger font-weight-bold mr-2 font-20">Liên hệ</span>' ?>
        <?php else: ?>
            <?php
            $cart_active = false;
            $notifi = '';
            if ($product->is_in_stock() && '' !== $product->get_price()) {
                $cart_active = true;
            } elseif ('' === $product->get_price()) {
                $notifi = 'Sản phẩm đang cập nhật giá';
            } elseif (!$product->is_in_stock()) {
                $notifi = 'Hết hàng';
            }

            ?>

            <?= $product->get_price_html() ?>
        <?php endif; ?>
    </div>
    <?php $sale = get_post_meta(get_the_ID(), 'sale_information', true); ?>

    <div class="card discount">
        <?php if ($product->is_on_sale()): ?>
            <?php if ($sales_price_to): ?>
                <div class="card-header p-2">
                    <span class="font-weight-bold mr-3">Khuyến mại:</span>
                    <span>Áp dụng đến ngày <?= date('d/m/Y', $sales_price_to) ?></span>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($sale): ?>
            <?php if (!$sales_price_to) : ?>
                <div class="card-header p-2">
                    <span class="font-weight-bold mr-3">Khuyến mại</span>
                </div>
            <?php endif; ?>
            <div class="card-body p-2">
                <?php foreach ($sale as $key => $value): ?>
                    <div class="d-flex m-1 align-items-start km">
                        <span class="step bg-warning"><?= $key + 1 ?></span>
                        <span class="mb-1 text-justify"><?= $value ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($product->is_type('variable')): ?>
        <?php
        wc_get_template(
            'single-product/add-to-cart/variable-custom.php',
            array(
                'attributes' => $attributes,
                'product_variations' => $product_variations,
                'default_attributes' => $default_attributes,
                'product' => $product,
                'get_price' => $get_price,
                'woo' => $woo,
                'base_link' => $base_link,
                'product_active' => $product_active,
            )
        );
        ?>
    <?php else: ?>
        <?php if ($notifi): ?>
            <div class="product_status" style="padding: 10px 0 10px 0">
                <span class="font-weight-bold mr-3 font-14">Trạng thái:</span>
                <span style="color: red;font-weight: bold" class="font-14"><?= $notifi ?></span>
            </div>
        <?php endif; ?>
        <?php if ($cart_active): ?>
            <div class="py-3">
                <form action="" method="post">
                    <a href="<?= '?quick_buy=1&add-to-cart=' . $product->get_id() ?>" class="btn text-center btn-order">
                        <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
                        <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
                    </a>
                </form>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div>
        <h6 class="font-weight-bold font-14">Liên Hệ Tư Vấn:</h6>
        <div>
            <div class="font-14">Hà Nội: <span class="font-weight-bold">0961 555 155 - 0934
                                    66 88 11</span></div>
            <div class="font-14">Nghệ An: <span class="font-weight-bold">0904 736 111 - 0973
                                    99 5429</span></div>
            <div class="font-14">Đà Nẵng: <span class="font-weight-bold">0965 119 567 - 0934
                                    66 88 11</span></div>
            <div class="font-14">Nha Trang: <span class="font-weight-bold">0961 65 2266 -
                                    0911 70 46 82</span></div>
            <div class="font-14">Hồ Chí Minh: <span class="font-weight-bold">0961 555 255 -
                                    0934 66 88 11</span></div>
        </div>
    </div>
</div>
<style>
    .error {
        margin-bottom: 0px !important;
        color: red;
        text-align: center;
    }
</style>
<script>
    function quick_by(t) {
        alert('Sản phẩm bạn chọn hiện đang hết hàng.');
    }
</script>
