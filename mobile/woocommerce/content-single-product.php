<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $product;
$average = $product->get_average_rating();

?>
<main>
    <!-- breadcrum -->
    <section class="container border-bottom">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="m-breadcrumb">
                    <?php
                    $args = array(
                        'delimiter' => '',
                        'home' => '',
                        'wrap_before' => '<ol class="breadcrumb m-0">',
                        'wrap_after' => '</ol>',
                        'before' => '<li class="breadcrumb-item">',
                        'after' => '</li>',
                    );
                    ?>
                    <?php woocommerce_breadcrumb($args); ?>
                </nav>
            </div>
        </div>
    </section>

    <!-- Tiêu đề sản phẩm, đánh giá, like,share facebook -->
    <?php get_template_part('mobile/woocommerce/single-product/product-title') ?>

    <!-- Ảnh,slide sản phẩm, Giá, biến thể -->
    <section class="container">
        <div class="row">
            <?php get_template_part('/mobile/woocommerce/single-product/product-slide') ?>
            <?php get_template_part('/mobile/woocommerce/single-product/product-variation') ?>
            <div class="col-12 col-md-6 mt-2">
                <div class="card card-body font-14 p-2">
                    <div class="d-flex justify-content-center align-items-baseline">
                        <i class="fas fa-crown text-warning"></i>
                        <p class="text-center text-1 font-weight-bold mx-1 slogan-title">MUA NHƯ VUA - CHĂM SÓC NHƯ
                            VIP</p>
                        <i class="fas fa-crown text-warning"></i>
                    </div>
                    <div class="d-flex align-items-center px-3 py-2">
                        <img src="<?= THEME_URL_URI ?>/assets/assets/2906/folder/Group 1583.png" height="24" width="25" alt="Logo" />
                        <span class="ml-3 text-justify w-100">Miễn phí công lắp đặt</span>
                    </div>
                    <div class="d-flex align-items-center px-3 py-2">
                        <img src="<?= THEME_URL_URI ?>/assets/assets/2906/folder/delivery-shipping-box-gift-truck.png" height="24" width="26" alt="Logo" />
                        <span class="ml-3 text-justify w-100">Lỗi là đổi mới trong 1 tháng tận nhà.</span>
                    </div>
                    <div class="d-flex align-items-center px-3 py-2">
                        <img src="<?= THEME_URL_URI ?>/assets/assets/2906/folder/Group 1584.png" height="24" width="22" alt="Logo" />
                        <span class="ml-3 text-justify w-100">Đổi trả và bảo hành cực dễ chỉ cần số điện
                        thoại</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sản phẩm tương tự -->
    <?php get_template_part('mobile/woocommerce/single-product/product-related') ?>

    <!-- Nội dung sản phẩm -->
    <?php get_template_part('mobile/woocommerce/single-product/product-detail') ?>
</main>




