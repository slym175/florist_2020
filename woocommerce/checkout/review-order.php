<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;


?>
<style>
    dl.variation dt {
        float: left;
        clear: both;
        margin-right: .25em;
        display: inline-block;
        list-style: none outside;
    }
    .display_right_cart span{
        font-size: 15px !important;
        float: right;
        font-weight: 100 !important;
    }

    .display_right_cart span:last-child {
        display: none;
    }

</style>
<div class="card-header bg-cart-header">
    <img src="<?= THEME_URL_URI . '/assets/images/2906/shopping-cart(1).png' ?>" alt="Icon" class="img-fluid">
    <span class="font-18 font-weight-bold">Thông tin đơn hàng: <?= count(WC()->cart->get_cart()) ?> sản
                                    phẩm</span>
</div>
<div class="notifi">

</div>
<div class="card-body p-0">
    <div class="container list-product">
        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
            <?php
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

            ?>

            <?php if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)):
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                ?>
                <div class="row px-3 py-4 p-ordering">
                    <div class="col-2 pr-0">
                        <div class="cart-image">
                            <?= $thumbnail ?>
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
                    <div class="col-7 pr-0 product">
                        <a href="<?= $product_permalink ?>" class="text-decoration-none">
                            <h6 class="font-14 font-weight-bold text-dark"><?= $_product->get_name() ?></h6>
                        </a>
                        <div class="collapse show font-12 discount" id="collapseKM1">
                            <?= wc_get_formatted_cart_item_data($cart_item) ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="quantity-wrapper justify-content-center">
                            <a href="javascript:void(0)" class="decrement cart_qty_remove" type="button"
                               data-cart-item="<?= $cart_item_key ?>">−</a>
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
                                    ),
                                    $_product,
                                    false
                                );
                            }

                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
                            ?>
                            <a href="javascript:void(0)" class="increment text-info cart_qty_add" type="button"
                               data-cart-item="<?= $cart_item_key ?>">+</a>
                        </div>
                    </div>
                    <div class="col-2 pr-0 display_right_cart">
                        <?php
                        echo $_product->get_price_html();
                        //                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <div class="row px-4 pt-3">
            <a class="btn-plus" href="<?= home_url() ?>">
                <img src="<?= THEME_URL_URI . '/assets/images/2906/Group 2815.png' ?>" alt="add product cart">
                <span class="font-14 ml-3">Chọn thêm sản phẩm</span>
            </a>
        </div>
    </div>
    <?php wc_get_template_part('checkout/form', 'coupon'); ?>
    <div class="my-4 px-4 py-3 bg-secondary-yellow">
        <div class="d-flex justify-content-between font-14 w-100 py-1">
            <span class="font-weight-bold">Tổng tiền (<?= count(WC()->cart->get_cart()) ?> sản phẩm):</span>
            <span class="text-danger font-weight-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
        </div>
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
<script>
    jQuery(function () {
        jQuery('.decrement').on('click', function () {
            var qty = jQuery(this).parent().find('input').val();
            if (qty > 1) {
                var cart_item = jQuery(this).data('cart-item');
                jQuery(this).parent().find('input').val(parseInt(qty) - 1);
                var url = '<?= admin_url('admin-ajax.php') ?>';
                change_cart(cart_item, parseInt(qty) - 1, url);
            }
        });

        jQuery('.increment').on('click', function () {
            var qty = jQuery(this).parent().find('input').val();
            var cart_item = jQuery(this).data('cart-item');
            jQuery(this).parent().find('input').val(parseInt(qty) + 1);
            var url = '<?= admin_url('admin-ajax.php') ?>';
            change_cart(cart_item, parseInt(qty) + 1, url);
        })

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
                    if(success.html()){
                        setTimeout(function(){ window.location.reload(); },2000);
                    }
                }
            });
        })
    });

    function change_cart(cart_item, qty, url) {
        jQuery.ajax({
            type: 'POST',
            url: url,
            data: {
                action: 'ajax_qty_cart',
                hash: cart_item,
                quantity: qty
            },
            success: function (data) {
                window.location.reload();
            }
        });
    }
</script>

