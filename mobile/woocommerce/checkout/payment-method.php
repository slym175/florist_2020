<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/13/2020
 * Time: 3:32 PM
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($available_gateways) foreach ($available_gateways as $gateway) { 
    $id = esc_attr($gateway->id);
    $type = "";
    if($id == 'cheque') {
        $type = "location";
    }elseif($id == 'bacs') {
        $type = "bank";
    }else{
        $type = "";
    }
    ?>
    <div class="form-check c-form-check">
        <input value="<?= $id ?>" type="radio" class="form-check-input" name="payment_method" id="payment-method-<?= $id ?>"  checked="" data-url="<?= admin_url('admin-ajax.php') ?>" data-type="<?= $type ?>">
        <label class="form-check-label ml-3" for="payment-method-<?= $id ?>"><?php echo $gateway->get_title() ?></label>
        <div class="box-info-payment"></div>
    </div>
<?php } ?>