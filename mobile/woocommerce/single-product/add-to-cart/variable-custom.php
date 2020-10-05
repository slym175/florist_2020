<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/16/2020
 * Time: 10:27 AM
 */

?>
<?php foreach ($attributes as $attribute) : ?>

    <div class="product-option">
        <div>
            <?php $label = wc_attribute_label($attribute[0]->taxonomy); ?>
            <p class="font-weight-bold font-14 my-2"><?= $label ?>:</p>
        </div>
        <div class="scrolling-wrapper list_attributes">
            <?php foreach ($attribute as $value) : ?>
                <?php
                $options[$value->taxonomy] = $value->slug;
                $get_price_att = (count($attributes) == 1) ? $woo->get_html_price_default_product_variable($options, $product_variations) : '';
                $selected_key = 'attribute_' . $value->taxonomy;
                $active = '';
                if ((isset($_REQUEST[$selected_key]))) {
                    if ($_REQUEST[$selected_key] == $value->slug) {
                        $active = 'active';
                    }
                } elseif (isset($default_attributes[$value->taxonomy]) && $default_attributes[$value->taxonomy] == $value->slug) {
                    $active = 'active';
                }
                $link = remove_query_arg($selected_key, $base_link);
                $link = add_query_arg($selected_key, wc_clean(wp_unslash($value->slug)), $link);
                ?>
                <div class="select_attribute" data-value="<?= $value->slug ?>" data-name="<?= $value->taxonomy ?>">
                    <a class="nav-link text-center attribute <?= $active ?>" href="<?= $link ?>">
                        <p class="font-12 m-0"><?= $value->name ?></p>
                        <?php if (count($attributes) == 1) : ?>
                            <span class="font-12 text-4"><?= (isset($get_price_att['display_price']) && $get_price_att['display_price']) ? number_format($get_price_att['display_price']) . 'đ' : 'Liên hệ' ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
<div class="d-flex align-items-baseline font-14 product-price mt-3">
    <span class="mr-2 text-6">Giá:</span>
    <?= (isset($product_active['success']) && $product_active['success']) ? $woo->display_price_default_product_variable($product_active['data']['display_price'],$product_active['data']['display_regular_price']) : $product->get_price_html() ?>
</div>
<div class="promotion">
    <div class="card">
        <?php if ($product->is_on_sale()) : ?>
            <div class="card-header p-2">
                <span class="font-weight-bold">Khuyến mại:</span>
                <?php if ($sales_price_to) : ?>
                    <span class="ml-2">Áp dụng đến ngày <?= date('d/m/Y', $sales_price_to) ?></span>
                <?php endif; ?>
            </div>
            <div class="card-body p-2 border border-top-0">
                <?php if ($sale) : ?>
                    <?php foreach ($sale as $key => $value) : ?>
                        <div class="d-flex mb-2">
                            <span class="step"><?= $key + 1 ?></span>
                            <span class="text-justify font-13"><?= $value ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if (isset($product_active['success']) && $product_active['success'] && $product_active['data']['is_in_stock']): ?>
    <a href="<?= '?quick_buy=1&add-to-cart=' . $product_active['data']['variation_id'] ?>" class="btn text-center btn-order">
        <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
        <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
    </a>
<?php else: ?>
    <a style="background: #c5c2c2" onclick="check_out(this)" data-msg="<?= (isset($product_active['message']) && $product_active['message']) ? $product_active['message'] : 'Sản phẩm bạn chọn hiện đang hết hàng.'  ?>" class="btn text-center btn-order">
        <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
        <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
    </a>
<?php endif; ?>

<script>
    function check_out(t) {
        var msg = jQuery(t).data('msg');
        alert(msg);
    }
</script>