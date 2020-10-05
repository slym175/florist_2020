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
<section class="container py-4 px-0 border-bottom">
    <h5 class="mb-4">Đánh giá sản phẩm:</h5>
    <div class="row">
        <div class="col-lg-4 col-12 border-right">
            <h1 class="text-center text-warning"><?= (float)$average ?>/5</h1>
            <span class="d-flex justify-content-center pb-2">
                <div class="star-rating" role="img" aria-label="Được xếp hạng 3.00 5 sao">
                    <span style="width: <?= ($average/5)*100 ?>%;"></span>
                </div>
            </span>
            <p class="text-center font-14">(<?= $rating_count ?> đánh giá)</p>
        </div>
        <div class="col-lg-8 col-12">
            <?php for($i = 5 ; $i>=1 ; $i--): ?>
            <div class="d-flex align-items-center font-14 p-1">
                <span class="mr-3 d-flex align-items-center" style="width: 32px"><?= $i ?>
                    <img class="ml-2 img-fluid" src="<?= THEME_URL_URI . '/assets/images/star2.svg' ?>" alt="Star">
                </span>
                <div class="progress w-50">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?= ($rating_count > 0) ? ($product->get_rating_count($i)/$rating_count)*100 : 0 ?>%"></div>
                </div>
                <span class="border-right text-warning px-2" style="width: 52px"><?= ($rating_count > 0) ? floor(($product->get_rating_count($i)/$rating_count)*100) : 0 ?>%</span>
                <span class="border-left px-3"><?= $product->get_rating_count($i); ?> đánh giá</span>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>