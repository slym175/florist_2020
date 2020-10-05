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
if (wp_is_mobile()) :
    get_view('mobile/woocommerce/checkout/form-checkout.php');
else :
    if (!defined('ABSPATH')) {
        exit;
    }
    $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
    $order_button_text = 'Đặt hàng';
?>
    <style>
        .product {
            border: none !important;
        }

        #billing_country_field {
            display: none;
        }
        .woocommerce-notices-wrapper {
            display: none;
        }
    </style>
    <form name="checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" method="POST" class="cart-form checkout woocommerce-checkout" enctype="multipart/form-data">
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <p class="py-4 m-0 cart-title">Giỏ hàng của bạn</p>
                    <div class="card border-primary border-bottom-0" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0">

                        <!--  Thông tin đơn hàng -->
                        <?php remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20); ?>
                        <?php do_action('woocommerce_checkout_order_review'); ?>



                        <?php do_action('woocommerce_checkout_billing'); ?>

                        <div class="card-header bg-cart-header">
                            <img src="<?= THEME_URL_URI . '/assets/images/2906/Group2366.png' ?>" alt="Icon" class="img-fluid">
                            <span class="font-18 font-weight-bold">Chọn hình thức thanh toán</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="container p-4 pl-5 font-14">
                                <?php
                                foreach ($available_gateways as $gateway) {
                                    wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
                                }
                                ?>
                            </div>
                        </div>

                        <div class="card-header bg-cart-header position-relative">
                            <img src="<?= THEME_URL_URI . '/assets/images/2906/delivery-shipping-box-gift-truck.png' ?>" alt="Icon" class="img-fluid">
                            <span class="font-18 font-weight-bold">Vận chuyển</span>
                        </div>

                        <div class="card-body p-0">
                            <div class="container p-4 pl-5 font-14">
                                <div>
                                    <p class="p-0">Quý khách vui lòng chọn hình thức nhận hàng:</p>
                                    <div class="pl-3">

                                        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                            <?php wc_cart_totals_shipping_html(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <p class="p-0">Thời gian giao hàng:</p>
                                    <div class="pl-3">
                                        <div class="form-group d-flex justify-content-lg-between">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Bất kỳ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Trong giờ hành chính</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                <label class="form-check-label" for="inlineCheckbox3">Ngoài giờ hành chính</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="p-0">Ghi chú với hàng hóa đặt mua:</p>
                                    <textarea name="order_comments" class="form-control" id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." rows="2" cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php do_action('woocommerce_review_order_before_submit'); ?>
                    <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="card-header mb-3 text-center btn-order text-uppercase" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine 
                    ?>
                    <?php do_action('woocommerce_review_order_after_submit'); ?>
                    <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                </div>
            </div>
        </section>
    </form>
<?php endif; ?>