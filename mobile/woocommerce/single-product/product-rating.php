<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 2:36 PM
 */

global $product;

if (!wc_review_ratings_enabled()) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();
?>
<style>
    .average{
    color: #efa625;
    font-size: 18px;
    font-weight: bold;
    margin-right: 10px;
    }
</style>
<section class="container py-3 border-bottom">
    <div class="row">
        <div class="col-12 mb-2">
            <h6 class="font-weight-bold font-14 section-title-14">Đánh giá sản phẩm:</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-5 d-flex d-md-block justify-content-start mb-2">
            <div class="d-flex justify-content-start align-items-center">
                <span class="average"><?= $average ?>/5</span>
                <div class="star-rating" role="img" style="color: #ffc107;margin-right: 10px">
                    <span style="width: <?= floor(($average / 5) * 100) ?>%;"></span>
                </div>
                <span class="font-12">(<?= $product->get_rating_count() ?> đánh giá)</span>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <?php for ($i = 5; $i >= 1; $i--) :
                $percent = $rating_count > 0 ? floor(($product->get_rating_count($i) / $rating_count) * 100) : 0; ?>
                <div class="rating my-1">
                    <span><?= $i ?><img src="<?= THEME_URL_URI . '/assets/assets/star2.svg' ?>" alt="Star Icon" style="width: 13px;height: 13px" class="ml-1" /></span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="rating-percent"><?= $percent ?><span class="font-7">%</span></span>
                    <span class="pl-2 vote-number border-left "><?= $product->get_rating_count($i); ?> đánh giá</span>
                </div>
            <?php endfor; ?>
            <script>
                jQuery(document).ready(function() {
                    tg = jQuery('.progress-bar');
                    tg.each(function() {
                        jQuery(this).css('width', jQuery(this).attr('aria-valuenow') + '%');
                    })
                });
            </script>
        </div>
    </div>
</section>
<?php
wp_reset_query();
if (comments_open() || get_comments_number()) :
    comments_template();
endif;
?>
<style>
    .feedback{
        margin-top: 15px;
    }
    .rating-form {
        display: flex;
        width: 100%;
        justify-content: center;
        overflow: hidden;
        flex-direction: row-reverse;
        position: relative;
    }

    .rating-0 {
        filter: grayscale(100%);
    }

    .rating-form > input {
        display: none;
    }

    .rating-form > label {
        text-align: center;
        flex: 1;
        height: 55px;
    }

    .rating-form > input:checked ~ label i {
        color: #fe9727;
    }

    .rating-form i {
        color: #e3e3e3;
        zoom: 1.4;
    }

    .rating-form span {
        display: block;
        color: #999;
        margin: 7px 25% 0;
        font-size: .9em;
    }


</style>
