
<?php if ($data->have_posts()): ?>
    <div class="info-payment-top">Quý khách có thể đến một trong các địa chỉ sau để thanh toán và nhận hàng:</div>
    <div class="info-payment-center">
        <?php while ($data->have_posts()): 
            $data->the_post(); ?>
            <div class="info-payment-item">
                <div class="payment-detail-title"><?= the_title() ?></div>
                <div class="payment-detail-row">
                    <span class="payment-row-title">Địa chỉ:</span>
                    <span class="payment-row-txt"><?= get_post_meta(get_the_ID(), 'address', true) ?></span>
                </div>
                <div class="payment-detail-row">
                    <span class="payment-row-title">Điện thoại</span>
                    <span class="payment-row-txt"><?= get_post_meta(get_the_ID(), 'phone', true) ?></span>
                </div>
            </div>
        <?php endwhile ?>
    </div>
<?php endif ?>