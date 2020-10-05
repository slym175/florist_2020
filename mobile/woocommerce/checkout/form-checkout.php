<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if (!defined('ABSPATH')) {
    exit;
}
$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
$order_button_text = 'Đặt hàng';
$checkout = WC()->checkout();
?>
<style>
    .woocommerce-notices-wrapper {
        /*display: none;*/
    }
</style>
<form name="checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" method="POST" class="cart-form checkout woocommerce-checkout" enctype="multipart/form-data">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <p class="py-3 m-0 cart-title">Giỏ hàng của bạn</p>

                <div class="card border-primary border-bottom-0" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0">

                    <?php get_view('mobile/woocommerce/checkout/review-order.php', ['checkout' => $checkout]); ?>

                    <?php get_view('mobile/woocommerce/checkout/form-billing.php', ['checkout' => $checkout]); ?>

                    <div class="info-add">
                        <div class="card-header bg-cart-header border-primary">
                            <img src="<?= THEME_URL_URI ?>/assets/assets/2906/Group2366.png" alt="Logo" />
                            <span class="font-18 font-weight-bold ml-4">Chọn hình thức thanh toán</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="container py-3 font-14">
                                <?php get_view('mobile/woocommerce/checkout/payment-method.php', ['available_gateways' => $available_gateways]); ?>
                            </div>
                        </div>
                        <div class="card-header bg-cart-header position-relative">
                            <img src="<?= THEME_URL_URI ?>/assets/assets/2906/delivery-shipping-box-gift-truck.png" alt="Logo" height="28" width="28" />
                            <span class="font-18 font-weight-bold ml-4">Vận chuyển</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="container py-3 font-14">
                                <div>
                                    <p class="mb-2">Quý khách vui lòng chọn hình thức nhận hàng:</p>
                                    <style>
                                        .m-16>.form-group {
                                            margin-left: 16px;
                                        }
                                    </style>
                                    <div class="m-16 mb-3">
                                        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                            <?php wc_cart_totals_shipping_html(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <p class="mb-2">Thời gian giao hàng:</p>
                                    <div class="mb-2">
                                        <div class="w-100 mb-2 form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="ship_option" value="option1" checked>
                                            <label class="form-check-label" for="inlineCheckbox1">Bất kỳ</label>
                                        </div>
                                        <div class="w-100 mb-2 form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox2" name="ship_option" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Trong giờ hành chính</label>
                                        </div>
                                        <div class="w-100 mb-2 form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox3" name="ship_option" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">Ngoài giờ hành chính</label>
                                        </div>
                                    </div>
                                    <p class="p-0">Ghi chú với hàng hóa đặt mua:</p>
                                    <textarea class="form-control" name="order_comments" id="order_comments" rows="3" placeholder="Ghi chú giao hàng ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php do_action('woocommerce_review_order_before_submit'); ?>
                <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="card-header mb-5 text-center btn-order text-uppercase" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine 
                ?>
                <?php do_action('woocommerce_review_order_after_submit'); ?>
                <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
            </div>
        </div>
    </section>
</form>
