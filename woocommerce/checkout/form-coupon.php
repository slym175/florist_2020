<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined('ABSPATH') || exit;

if (!wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
    return;
}

?>
<div class="coupon-code container">
    <div class="row px-4 pt-3" style="padding-bottom: 1rem;float: right;">
        <input type="text" name="coupon_code" class="input-text"
               placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" id="coupon_code" value=""/>
        <a class="btn btn-default apply_coupon" name="apply_coupon" value="Áp dụng">Áp dụng</a>
    </div>
</div>
<style>
    .coupon-code {
        margin-top: 15px;
    }

    .coupon-code input {
        height: 37px;
        margin-right: 10px;
    }

    .coupon-code a {
        color: #fff !important;
        background-color: #c5a213 !important;
    }
</style>