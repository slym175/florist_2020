<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 3:30 PM
 */
global $product;
$average = $product->get_average_rating();

?>
<section class="container border-bottom pb-3">
    <div class="row">
        <div class="col-md-8 col-12 d-md-flex p-0">
            <h4 class="pr-3 m-0 font-weight-bold font-21"><?= the_title() ?></h4>
            <span class="d-flex pr-3">
                    <div class="star-rating" role="img" style="color: #ffc107;margin-top: 4px">
                        <span style="width: <?= floor(($average / 5) * 100) ?>%;"></span>
                    </div>
                 </span>
            <span class="cmt-num"><?= $product->get_rating_count() ?> đánh giá</span>
        </div>
        <div class="col-md-4 col-12 d-flex justify-content-md-end p-0 btn-socials">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=525478714900201&autoLogAppEvents=1"
                    nonce="T6fvhPOH"></script>
            <div class="fb-like" data-href="<?= the_permalink() ?>" data-width="" data-layout="button_count"
                 data-action="like" data-size="large" data-share="true"></div>
        </div>
    </div>
</section>
