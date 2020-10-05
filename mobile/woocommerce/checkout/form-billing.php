<?php

/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
$newsun_woocommerce = new NewsunWoocommerce();
?>
<style>
    #billing_country_field {
        display: none;
    }
</style>
<div class="info-user">
    <div class="card-header bg-cart-header mt-3">
        <img src="<?= THEME_URL_URI ?>/assets/assets/2906/Union31.png" alt="Logo" />
        <span class="font-18 font-weight-bold ml-4">Thông tin mua hàng</span>
    </div>
    <div class="card-body p-0">
        <div class="container py-3 font-14">
            <?php
            $fields = $checkout->get_checkout_fields('billing');
            foreach ($fields as $key => $field) {
                if($key == 'billing_city' || $key == 'billing_state'){
                    $field['type'] = 'select';
                }
                $field['label'] = '';
                $newsun_woocommerce->woocommerce_form_field($key, $field, $checkout->get_value($key));
            }
            ?>
            <div class="form-check checkVAT">
                <input type="checkbox" class="form-check-input" id="checkVAT">
                <label class="form-check-label ml-2" for="checkVAT">Yêu cầu NEWSUN xuất hóa đơn VAT cho công ty hoặc tổ chức</label>
                <div class="check-vat-form mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_ma_so_thue" id="inputTax" placeholder="Nhập mã số thuế nếu có">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_ten_cong_ty" id="inputCompany" placeholder="Tên công ty/tổ chức viết trên hóa đơn">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="billing_company_address" id="inputAddress2" placeholder="Địa điểm đăng ký của công ty/tổ chức với cơ quan thuế">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>