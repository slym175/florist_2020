<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/13/2020
 * Time: 3:32 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<div class="form-group form-check c-form-check">
    <input value="<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="form-check-input" name="payment_method" id="payment-method-<?php echo esc_attr( $gateway->id ); ?>" checked="">
    <label class="form-check-label ml-3" for="payment-method-<?php echo esc_attr( $gateway->id ); ?>"><?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?></label>
</div>