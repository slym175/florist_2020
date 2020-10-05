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


?>
<main style="background-color: #fff;">
    <?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
    //    do_action( 'woocommerce_single_product_summary' );
    ?>
    <section class="container breadcrumb-section">
        <div class="row font-14">
            <div class="col-12 p-0">
                <?php
                $args = array(
                    'delimiter' => '',
                    'home' => '',
                    'wrap_before' => '<ol class="breadcrumb breadcrumb-left p-0 m-0">',
                    'wrap_after' => '</ol>',
                    'before' => '<li class="breadcrumb-item">',
                    'after' => '</li>',
                );
                ?>

                <?php woocommerce_breadcrumb($args); ?>
            </div>
        </div>
    </section>

    <?php wc_get_template( 'single-product/product-title.php' ); ?>

    <section class="container border-bottom py-md-4 product-details px-0">
        <div class="row">

            <?php wc_get_template('single-product/product-slide.php') ?>

            <?php wc_get_template('single-product/product-variation.php') ?>

            <div class="col-lg-3 mt-lg-0 mt-2">
                <div class="policy_intuitive">
                    <div class="for-mobile">
                        <h4 class="text-green-1">Mua như vua - chăm sóc như vip</h4>
                        <ul class="policy_new">
                            <li>
                                <span>
                                    <i class="icondetailV3-ld-new">

                                    </i>
                                </span>
                                <p><b>Miễn phí</b> công lắp đặt</p>
                            </li>
                            <li>
                                <span>
                                    <i class="icondetailV3-1d1-new">

                                    </i>
                                </span>
                                <p>Lỗi là đổi mới trong <b>1 tháng</b> tận nhà <a href="#" title="Chính sách đổi trả"> <b data-tooltip-stickto="top" data-tooltip-maxwidth="300" data-tooltip="Trong tháng đầu tiên, nếu sản phẩm lỗi do nhà sản xuất, quý khách sẽ được đổi sản phẩm tương đương (cùng model, cùng màu, …) miễn phí."> Xem chi tiết </b> </a>
                                </p>
                            </li>
                            <li>
                                <span>
                                    <i class="icondetailV3-dt-new">

                                    </i>
                                </span>
                                <p>Đổi trả và bảo hành cực dễ <b>chỉ cần số điện thoại</b></p>
                            </li>
                            <li>
                                <span>
                                    <i class="icondetailV3-bh-new"></i>
                                </span>
                                <p>Bảo hành <b>chính hãng 2 năm</b>, có người đến lấy tận nhà</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Sản phẩm liên quan -->
    <?php wc_get_template('single-product/product-related.php') ?>

    <!-- Chi tiết sản phẩm -->
    <?php wc_get_template('single-product/product-detail.php') ?>
</main>
