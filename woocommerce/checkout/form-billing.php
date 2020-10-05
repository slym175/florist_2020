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
$florist_woocommerce = new floristWoocommerce();
?>

    <div class="card-header bg-cart-header">
        <img src="<?= THEME_URL_URI . '/assets/images/2906/Union31.png' ?>" alt="Icon" class="img-fluid">
        <span class="font-18 font-weight-bold">Thông tin mua hàng</span>
    </div>


    <div class="card-body p-0">
        <div class="container p-4 font-14">
            <?php
            $fields = $checkout->get_checkout_fields('billing');
            foreach ($fields as $key => $field) {
                if($key == 'billing_city' || $key == 'billing_state'){
                    $field['type'] = 'select';
                }
                $florist_woocommerce->woocommerce_form_field($key, $field, $checkout->get_value($key));
            }
            ?>
            <div class="form-group form-check checkVAT">
                <input type="checkbox" class="form-check-input" id="checkVAT">
                <label class="form-check-label ml-3" for="checkVAT">Yêu cầu florist xuất hóa đơn VAT cho công ty hoặc tổ chức</label>
                <div class="form-group mt-3 check-vat-form">
                    <div class="form-group row">
                        <label for="billing_ma_so_thue" class="col-sm-2 col-form-label text-right">Mã số thuế</label>
                        <div class="col-sm-10">
                            <input type="text" class="input-text form-control" name="billing_ma_so_thue" id="billing_ma_so_thue" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="billing_ten_cong_ty" class="col-sm-2 col-form-label text-right">Tên công ty</label>
                        <div class="col-sm-10">
                            <input type="text" class="input-text form-control" name="billing_ten_cong_ty" id="billing_ten_cong_ty" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="billing_company_address" class="col-sm-2 col-form-label text-right">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="input-text form-control" name="billing_company_address" id="billing_company_address" placeholder="" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

