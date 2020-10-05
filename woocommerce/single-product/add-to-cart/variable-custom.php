<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/16/2020
 * Time: 10:27 AM
 */

?>


<style>
    .error {
        margin-bottom: 0px !important;
        color: red;
        text-align: center;
    }
</style>

<?php foreach ($attributes as $attribute): ?>
    <?php if (wp_is_mobile()) : ?>
        <div class="product-option">
            <div>
                <?php $label = wc_attribute_label($attribute[0]->taxonomy); ?>
                <p class="font-14"><?= $label ?>:</p>
            </div>
            <ul class="scrolling-wrapper list-unstyled">
                <?php foreach ($attribute as $value): ?>
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
                    <li class="nav-item select_attribute" data-value="<?= $value->slug ?>"
                        data-name="<?= $value->taxonomy ?>">
                        <a class="nav-link text-center attribute <?= $active ?>"
                           href="<?= ($active) ? 'javascipr:void(0)' : $link ?>">
                            <p class="font-12 m-0"><?= $value->name ?></p>
                            <?php if (count($attributes) == 1): ?>
                                <span class="font-12 text-4">
                                    <?= (isset($get_price_att['display_price']) && $get_price_att['display_price']) ? number_format($get_price_att['display_price']) . 'đ' : 'Liên hệ' ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else : ?>
        <div class="py-3">
            <?php $label = wc_attribute_label($attribute[0]->taxonomy); ?>
            <span class="font-14 mr-3 font-weight-bold"><?= $label ?>:</span>
        </div>

        <div class="product-option">
            <ul class="nav justify-content-start list_attributes">
                <?php foreach ($attribute as $value): ?>
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
                    <li class="nav-item select_attribute" data-value="<?= $value->slug ?>"
                        data-name="<?= $value->taxonomy ?>">
                        <a class="nav-link text-center attribute <?= $active ?>"
                           href="<?= ($active) ? 'javascipr:void(0)' : $link ?>">
                            <p class="font-12 m-0"><?= $value->name ?></p>
                            <?php if (count($attributes) == 1): ?>
                                <span class="font-12 text-danger"><?= (isset($get_price_att['display_price']) && $get_price_att['display_price']) ? number_format($get_price_att['display_price']) . 'đ' : 'Liên hệ' ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<div class="py-3">
    <form action="" method="post">
        <?php if (isset($product_active['success']) && $product_active['success'] && $product_active['data']['is_in_stock']): ?>
            <a href="<?= '?quick_buy=1&add-to-cart=' . $product_active['data']['variation_id'] ?>"
               class="btn text-center btn-order">
                <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
                <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
            </a>
        <?php else: ?>
            <a style="background: #c5c2c2" class="btn text-center btn-order" onclick="check_out(this)" data-msg="<?= (isset($product_active['message']) && $product_active['message']) ? $product_active['message'] : 'Sản phẩm bạn chọn hiện đang hết hàng.'  ?>">
                <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
                <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
            </a>
        <?php endif; ?>
    </form>
</div>

<script>
    function check_out(t) {
        var msg = jQuery(t).data('msg');
        alert(msg);
    }
</script>