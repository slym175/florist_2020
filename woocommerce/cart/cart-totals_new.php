<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/13/2020
 * Time: 11:27 AM
 */
?>
<div class="d-flex justify-content-between font-14 w-100 py-1">
    <span class="font-weight-bold">Tổng tiền (2 sản phẩm):</span>
    <span class="text-danger font-weight-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
</div>
<div class="d-flex justify-content-between font-14 w-100 py-1">
    <span>Giảm</span>
    <span>- 200.000đ</span>
</div>
<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

    <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

    <?php wc_cart_totals_shipping_html(); ?>

    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

    <tr class="shipping">
        <th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
        <td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
    </tr>

<?php endif; ?>
<div class="d-flex justify-content-between font-14 w-100 py-1">
    <span>Phí vận chuyển (tạm tính):</span>
    <span>Chưa rõ</span>
</div>
<div class="d-flex justify-content-between font-14 w-100 py-1">
    <span class="font-weight-bold">Cần thanh toán:</span>
    <span class="text-danger font-weight-bold">2.000.000đ</span>
</div>
