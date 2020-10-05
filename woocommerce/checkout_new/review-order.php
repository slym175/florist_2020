<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/15/2020
 * Time: 10:36 AM
 */

defined( 'ABSPATH' ) || exit;
?>
<style>
    dl.variation dt {
        float: left;
        clear: both;
        margin-right: .25em;
        display: inline-block;
        list-style: none outside;
    }
    .product {
        border-radius: 0px !important;
        background-color: #FFFFFF !important;
        border: none !important;
        border-right: none !important;
        border-bottom: none !important;
        border-top: none !important;
    }
</style>
<div class="card-header border-primary bg-cart-header">
    <img src="<?= THEME_URL_URI.'/assets/images/2906/shopping-cart(1).png' ?>" alt="Icon" class="img-fluid">
    <span class="font-18 font-weight-bold">Thông tin đơn hàng: <?= count(WC()->cart->get_cart()) ?> sản
                                    phẩm</span>
</div>
<div class="card-body p-0">
    <div class="container list-product">
        <?php do_action( 'woocommerce_review_order_before_cart_contents' ); ?>

        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
            <?php
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

            ?>

            <?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ):
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
                <div class="row px-3 py-4 p-ordering">
                    <div class="col-2 pr-0">
                        <div class="cart-image">
                            <?= $thumbnail ?>
                            <?php
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="font-10" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="'.THEME_URL_URI.'/assets/images/2906/Group 2816.png'.'" alt="unCart Button"></a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
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
                            <?= wc_get_formatted_cart_item_data( $cart_item ) ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="quantity-wrapper justify-content-center">
                            <a href="#" class="decrement" type="button">−</a>
                            <?php
                            if ( $_product->is_sold_individually() ) {
                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                            } else {
                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                        'min_value'    => '0',
                                        'product_name' => $_product->get_name(),
                                    ),
                                    $_product,
                                    false
                                );
                            }

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                            ?>
                            <a href="#" class="increment text-info" type="button">+</a>
                        </div>
                    </div>
                    <div class="col-2 pr-0">
                        <p class="font-14 text-danger font-weight-bold text-center">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php do_action( 'woocommerce_review_order_after_cart_contents' ); ?>
    </div>
    <div class="container">
        <div class="row px-4 pt-3">
            <a class="btn-plus" href="<?= home_url() ?>">
                <img src="<?= THEME_URL_URI.'/assets/images/2906/Group 2815.png' ?>" alt="add product cart">
                <span class="font-14 ml-3">Chọn thêm sản phẩm</span>
            </a>
        </div>
    </div>


    <div class="my-4 px-4 py-3 bg-secondary-yellow">
        <div class="d-flex justify-content-between font-14 w-100 py-1">
            <span class="font-weight-bold">Tổng tiền (2 sản phẩm):</span>
            <span class="text-danger font-weight-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
        </div>
        <div class="d-flex justify-content-between font-14 w-100 py-1">
            <span>Phí vận chuyển (tạm tính):</span>
            <span>Chưa rõ</span>
        </div>
        <div class="d-flex justify-content-between font-14 w-100 py-1">
            <span class="font-weight-bold">Cần thanh toán:</span>
            <span class="text-danger font-weight-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
        </div>
    </div>
</div>
