<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/9/2020
 * Time: 5:03 PM
 */
$gallery_tinh_nang = get_post_meta(get_the_ID(), 'salient_features', true);
$iframe = get_post_meta(get_the_ID(), 'iframe', true);

global $product;
$gallery = $product->get_gallery_image_ids();
$gallery[] = get_post_thumbnail_id($product->get_id());

if ($iframe) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $iframe, $match);
    $video_thumbnail = 'https://img.youtube.com/vi/' . $match[1] . '/hqdefault.jpg';
    $video_thumbnail_icon = 'https://img.youtube.com/vi/' . $match[1] . '/3.jpg';
}

?>
<style>
    iframe {
        width: 100%;
    }
</style>
<div class="col-lg-4 col-md-6 col-12">
    <!-- slide -->
    <div class="tab-content" id="tabContent">

        <!-- slide tính năng nổi bật -->
        <?php if ($iframe || $gallery_tinh_nang): ?>
            <div class="tab-pane fade show active" id="pills-videos" role="tabpanel" aria-labelledby="videos-tab">
                <div class="owl-carousel owl-theme pre-img-carousel">
                    <?php if (isset($video_thumbnail) && $video_thumbnail): ?>
                        <div class="item video-item">
                            <img src="<?= $video_thumbnail ?>" class="img-fluid" alt="">
                        </div>
                    <?php endif; ?>
                    <?php if ($gallery_tinh_nang): ?>
                        <?php foreach ($gallery_tinh_nang as $image_tinh_nang): ?>
                            <div class="item">
                                <img src="<?= wp_get_attachment_image_url($image_tinh_nang, array(380, 313)) ?>"
                                     class="img-fluid"
                                     alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- slide album hình ảnh sản phẩm -->
        <div class="tab-pane fade <?= ($iframe || $gallery_tinh_nang) ? '' : 'show active' ?>" id="pills-images" role="tabpanel" aria-labelledby="images-tab">
            <?php if ($gallery): ?>
                <div class="owl-carousel owl-theme pre-img-carousel">
                    <?php foreach ($gallery as $image): ?>
                        <div class="item">
                            <img src="<?= wp_get_attachment_image_url($image, array(1920, 1080)) ?>" class="img-fluid"
                                 alt="<?= the_title() ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- tab slide -->
    <div class="d-flex justify-content-center mb-4">
        <ul class="nav mt-2" id="tab" role="tablist">
            <?php if ($iframe || $gallery_tinh_nang): ?>
                <li class="nav-item">
                    <a class="nav-link px-2 py-0 active show" data-toggle="pill" href="#pills-videos" role="tab"
                       aria-controls="pills-images" aria-selected="false">
                        <?php if ($iframe): ?>
                            <img src="<?= $video_thumbnail_icon ?>"
                                 class="product-img"
                                 alt="<?= the_title() ?>">
                        <?php else: ?>
                            <img src="<?= wp_get_attachment_image_url($gallery_tinh_nang[0], array(150, 150)) ?>"
                                 class="product-img"
                                 alt="<?= the_title() ?>">
                        <?php endif; ?>
                        <p>Tính năng <br> nổi bật</p>
                    </a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link px-2 py-0 <?= (($iframe || $gallery_tinh_nang)) ? '' : 'active show' ?>" data-toggle="pill" href="#pills-images" role="tab"
                   aria-controls="pills-videos" aria-selected="true">
                    <img src="<?= get_the_post_thumbnail_url($product->get_id(), array(150, 150)) ?>"
                         class="product-img"
                         alt="<?= the_title() ?>">
                    <p>Hình <br> sản phẩm</p>
                </a>
            </li>
        </ul>
        <a href="#" class="product-detail mt-2 mx-2" data-toggle="modal" data-target="#dataModal">
            <i class="fas fa-exclamation-circle text-center"></i>
            <p class="text-center m-0 font-14">Xem thông số kỹ thuật</p>
        </a>
        <div class="modal fade" id="dataModal" tabindex="-1" role="dialog"
             aria-labelledby="dataModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông số kỹ thuật</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ts-modal-table font-14 w-100 d-flex flex-column pb-4 technical-data tech-section">
                        <?= wpautop(get_post_meta($product->get_id(), 'technical_data', true)) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="font-14 show-hide-text" style="padding: 0 10px">
        <h6 class="font-weight-bold">Đặc điểm nổi bật:</h6>
        <div class="text-justify outstanding-features"><?= the_excerpt() ?></div>
        <div class="d-flex justify-content-center show-more">
            <a href="#" class="font-12">Xem thêm <i class="fas fa-chevron-down"></i></a>
        </div>
    </div>
</div>

<div id="img-preview">
    <a href="#" class="close">×</a>
    <div class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <?php if ($gallery): ?>
                    <div class="owl-carousel owl-theme pre-carousel">
                        <?php foreach ($gallery as $image): ?>
                            <div class="item">
                                <img src="<?= wp_get_attachment_image_url($image, array(1920, 1080)) ?>"
                                     class="img-fluid"
                                     alt="<?= the_title() ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div id="video-preview">
    <a href="#" class="close">×</a>
    <div class="container">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="owl-carousel owl-theme pre-carousel">
                    <?php if ($iframe): ?>
                        <div class="item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <?= $iframe ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($gallery_tinh_nang): ?>
                        <?php foreach ($gallery_tinh_nang as $image_tinh_nang): ?>
                            <div class="item">
                                <img src="<?= wp_get_attachment_image_url($image_tinh_nang, array(600, 600)) ?>"
                                     class="img-fluid"
                                     alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>