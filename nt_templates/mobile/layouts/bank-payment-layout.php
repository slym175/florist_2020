<?php
    $bacs_info = get_option( 'woocommerce_bacs_accounts');
?>
<div class="info-payment-top">
	Quý khách có thể lựa chọn chuyển khoản tới 1 trong những ngân hàng sau:
</div>
<div class="info-payment-center">
	<ul>
<?php
$i = -1;
if ( $bacs_info ) : foreach ( $bacs_info as $account ) :
$i++;
$account_name = esc_attr( wp_unslash( $account['account_name'] ) );
$bank_name = esc_attr( wp_unslash( $account['bank_name'] ) );
$account_number = esc_attr( $account['account_number'] );
$icon = $account['iban'];
$branch = $account['bic'];
?>

	    <li class="info-payment-item">
			<div class="payment-thumb">
			    <img src="<?= $icon ?>" style="width: 100px">
			</div>
			<div class="payment-detail">
			     <div class="payment-bankname" style="font-weight: bold"><?= $bank_name  ?></div>
			    <div class="payment-detail-row">
			        <div class="detail-row row-bank"><b>Chi nhánh:</b> <span class="row-txt"><?= $branch  ?></span></div>
			        <div class="detail-row row-name"><b>Chủ TK:</b> <span class="row-txt"><?= $account_name ?></span></div>
			        <div class="detail-row row-number"><b>Số TK:</b> <span class="row-txt"><?= $account_number ?></span></div>
			    </div>
			</div>
		</li>
	
<?php endforeach; endif; ?>

    </ul>
</div>

	                                            
	                                            