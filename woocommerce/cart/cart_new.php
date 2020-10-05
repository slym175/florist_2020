<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/13/2020
 * Time: 9:58 AM
 */

$carts = WC()->cart->get_cart();

?>
<style>
    dl.variation dt {
        float: left;
        clear: both;
        margin-right: .25em;
        display: inline-block;
        list-style: none outside;
    }
</style>
<form action="#" method="POST" class="cart-form">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <p class="py-4 m-0 cart-title">Giỏ hàng của bạn</p>
                <div class="card border-primary border-bottom-0"
                     style="border-bottom-left-radius: 0; border-bottom-right-radius: 0">
                    <div class="card-header border-primary bg-cart-header">
                        <img src="<?= THEME_URL_URI.'/assets/images/2906/shopping-cart(1).png' ?>" alt="Icon" class="img-fluid">
                        <span class="font-18 font-weight-bold">Thông tin đơn hàng: 2 sản
                                    phẩm</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="container list-product">
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
                                            <input class="quantity" min="0" name="quantity" value="<?= $cart_item['quantity'] ?>" type="number">
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
                        </div>
                        <div class="container">
                            <div class="row px-4 pt-3">
                                <a class="btn-plus" href="<?= home_url() ?>">
                                    <img src="<?= THEME_URL_URI . '/assets/images/2906/Group 2815.png' ?>"
                                         alt="add product cart">
                                    <span class="font-14 ml-3">Chọn thêm sản phẩm</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="card-header mb-5 text-center btn-order text-uppercase">
                    Đặt hàng
                </button>
            </div>
        </div>
    </section>
</form>
