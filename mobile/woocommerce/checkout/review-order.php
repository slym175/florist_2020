<div class="list-products">
    <div class="card-header bg-cart-header">
        <img src="<?= THEME_URL_URI ?>/assets/assets/2906/shopping-cart(1).png" alt="Logo"/>
        <span class="font-16 font-weight-bold ml-4">Thông tin đơn hàng: <?= count(WC()->cart->get_cart()) ?>
            sản phẩm</span>
    </div>
    <div class="notifi">

    </div>
    <div class="card-body p-0">
        <div class="container list-product">
            <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>
                <?php
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                if ($image = wp_get_attachment_image_src($_product->get_image_id(), 'thumbnail')) {
                    list($src, $width, $height) = $image;
                } else {
                    $src = '';
                }
                ?>
                <?php if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key); ?>
                    <div class="row pt-4 p-ordering">
                        <div class="col-3 col-md-2 pr-0">
                            <div class="cart-image">
                                <img class="amp-img" src="<?= $src ?>" alt="<?= $_product->get_name() ?>" height="61"
                                     width="61"/>
                                <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="font-10" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="' . THEME_URL_URI . '/assets/images/2906/Group 2816.png' . '" alt="unCart Button"></a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_html__('Remove this item', 'woocommerce'),
                                        esc_attr($product_id),
                                        esc_attr($_product->get_sku())
                                    ),
                                    $cart_item_key
                                );
                                ?>
                            </div>
                        </div>
                        <div class="col-5 col-md-5 pr-0 dt-product">
                            <a href="<?= $product_permalink ?>" class="text-decoration-none">
                                <h6 class="font-14 font-weight-bold text-dark mt-1"><?= $_product->get_name() ?></h6>
                            </a>
                            <div class="collapse font-12 discount" id="collapseKM<?= $product_id ?>">
                                <?= $tg = wc_get_formatted_cart_item_data($cart_item) ?>
                            </div>
                            <?php if ($tg) : ?>
                                <a class="font-12 text-decoration-none" data-toggle="collapse"
                                   href="#collapseKM<?= $product_id ?>" role="button" aria-expanded="false"
                                   aria-controls="collapseKM<?= $product_id ?>">Chi tiết <i
                                            class="fas fa-chevron-down pl-2" aria-hidden="true"></i></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-4 col-md-5 mt-1 d-md-flex align-items-md-start justify-content-md-around">
                            <div class="display_right_cart">
                                    <?php
                                    echo $_product->get_price_html();
                                    ?>
                            </div>
                            <div class="quantity-wrapper mt-md-2">
                                <a href="javascript:void(0)" class="decrement"
                                   data-cart-item="<?= $cart_item_key ?>" data-url="<?= admin_url('admin-ajax.php') ?>">−</a>
                                <?php
                                if ($_product->is_sold_individually()) {
                                    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                } else {
                                    $product_quantity = woocommerce_quantity_input(
                                        array(
                                            'input_name' => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value' => $_product->get_max_purchase_quantity(),
                                            'min_value' => '0',
                                            'product_name' => $_product->get_name(),
                                            'classes' => 'quantity'
                                        ),
                                        $_product,
                                        false
                                    );
                                }
                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); ?>
                                <!-- <input class="quantity" min="0" name="quantity" value="1" type="number"> -->
                                <a href="javascript:void(0)" class="increment text-info"
                                   data-cart-item="<?= $cart_item_key ?>" data-url="<?= admin_url('admin-ajax.php') ?>">+</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="container">
            <div class="row pt-lg-4 pb-lg-2 py-3 d-flex justify-content-center">
                <a class="btn-plus" href="<?= home_url() ?>">
                    <img src="<?= THEME_URL_URI ?>/assets/assets/2906/Group 2815.png" alt="Logo"
                         style="height: 20px;width: 20px"/>
                    <span class="font-14 ml-3">Chọn thêm sản phẩm</span>
                </a>
            </div>
        </div>

        <?php wc_get_template_part('checkout/form', 'coupon'); ?>
        <div class="container py-3 my-3 bg-secondary-yellow">
            <div class="d-flex justify-content-between font-14 w-100 py-1">
                <span class="font-weight-bold">Tổng tiền (<?= count(WC()->cart->get_cart()) ?> sản phẩm):</span>
                <span class="text-4 font-weight-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
            </div>
            <!-- <div class="d-flex justify-content-between font-14 w-100 py-1">
                <span>Giảm</span>
                <span>- 200.000đ</span>
            </div> -->
            <div class="d-flex justify-content-between font-14 w-100 py-1">
                <span>Phí vận chuyển (tạm tính):</span>
                <span>Chưa rõ</span>
            </div>
            <div class="d-flex justify-content-between font-14 w-100 py-1">
                <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                    <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                        <th><?php wc_cart_totals_coupon_label($coupon); ?></th>
                        <td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></td>
                    </tr>
                <?php endforeach; ?>
            </div>
            <div class="d-flex justify-content-between font-14 w-100 py-1">
                <span class="font-weight-bold">Cần thanh toán:</span>
                <span class="text-danger font-weight-bold"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function () {
        jQuery('.apply_coupon').on('click', function () {
            var coupon_code = jQuery(this).parent().find('input').val();
            var url = '<?= admin_url('admin-ajax.php') ?>';
            jQuery.ajax({
                type: 'POST',
                url: url,
                data: {
                    action: 'coupon_code_product_add_to_cart',
                    coupon_code: coupon_code,
                },
                success: function (data) {
                    jQuery('.notifi').empty();
                    jQuery('.notifi').append(data);
                    var success = jQuery('.woocommerce-message');
                    if (success.html()) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        })
    })
</script>
<style>
    .billing_country_field {
        display: none;
    }
    .display_right_cart span{
        font-size: 15px !important;
        font-weight: 100 !important;
    }

    .display_right_cart del.mr-2 {
        font-size: 13px !important;
    }

    .display_right_cart span:last-child {
        display: none;
    }
</style>
