<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 4:36 PM
 */

global $product;
$average = $product->get_average_rating();

?>
<style>
    .star-rating::before {
        content: "\73\73\73\73\73";
        color: #d3ced2;
        float: left;
        top: 0;
        left: 0;
        position: absolute;
    }
    .star-rating {
        float: right;
        overflow: hidden;
        position: relative;
        height: 1em;
        line-height: 1;
        font-size: 0.9em;
        width: 5.4em;
        font-family: star;
    }
    .star-rating span {
        overflow: hidden;
        float: left;
        top: 0;
        left: 0;
        position: absolute;
        padding-top: 1.5em;
    }
    .star-rating span::before {
        content: "\53\53\53\53\53";
        top: 0;
        position: absolute;
        left: 0;
    }
</style>
<div class="container product-detail mt-3">
    <div class="row">
        <div class="col-12 d-md-flex align-items-sm-center">
            <h2 class="product-name mb-md-0 mr-md-3"><?= the_title() ?></h2>
            <div class="d-flex justify-content-start align-items-center">
                <div class="star-rating" role="img" style="color: #ffc107;margin-right: 10px">
                    <span style="width: <?= floor(($average / 5) * 100) ?>%;"></span>
                </div>
                <span class="font-12"><?= $product->get_rating_count() ?> đánh giá</span>
            </div>
            <div class="d-flex justify-content-start btn-socials mt-2 mt-md-0 ml-md-auto">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=525478714900201&autoLogAppEvents=1" nonce="T6fvhPOH"></script>
                <div class="fb-like" data-href="<?= the_permalink() ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>

            </div>
        </div>
    </div>
</div>
