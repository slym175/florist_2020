<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/9/2020
 * Time: 5:03 PM
 */
$gallery_tinh_nang = get_post_meta(get_the_ID(), 'salient_features', true);
$iframe = get_post_meta(get_the_ID(), 'iframe', true);
if ($iframe) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $iframe, $match);
    $video_thumbnail = 'https://img.youtube.com/vi/' . $match[1] . '/hqdefault.jpg';
    $video_thumbnail_icon = 'https://img.youtube.com/vi/' . $match[1] . '/3.jpg';
}

global $product;
$gallery = $product->get_gallery_image_ids();
$gallery[] = get_post_thumbnail_id($product->get_id());
?>
<style>
    iframe {
        width: 100%;
    }

    .owl-theme .owl-nav {
        height: 0px;
    }
</style>
<div class="col-12 col-md-6">
    <div class="img-carousel tab-content">
        <!-- slide tính năng nổi bật -->
        <?php if ($iframe || $gallery_tinh_nang): ?>
            <div class="tab-pane fade show active" id="p_feature" role="tabpanel" aria-labelledby="p_feature_label">
                <div class="owl-carousel owl-theme owl-product-images">
                    <?php if ($video_thumbnail): ?>
                        <div class="item video-item">
                            <img src="<?= $video_thumbnail ?>" class="img-fluid" alt="">
                        </div>
                    <?php endif; ?>
                    <?php if ($gallery_tinh_nang) : ?>
                        <?php foreach ($gallery_tinh_nang as $image) : ?>
                            <img class="item" lightbox src="<?= wp_get_attachment_image_url($image, array(400, 300)) ?>"
                                alt="<?= the_title() ?>" layout="responsive"/>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="opi-navs">
                    <button class="opi-nav opi-next">
                        <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/next.svg" alt="next">
                    </button>
                    <button class="opi-nav opi-prev">
                        <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/prev.svg" alt="prev">
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <!-- slide hình ảnh nổi bật -->
        <div class="tab-pane fade <?= (get_post_meta($product->get_id(), 'iframe', true)) ? '' : 'show active' ?>" id="p_gallery" role="tabpanel" aria-labelledby="p_gallery_label">
            <div class="owl-carousel owl-theme owl-product-gallery">
                <?php if ($gallery) : ?>
                    <?php foreach ($gallery as $image) : ?>
                        <img class="item" src="<?= wp_get_attachment_image_url($image, array(400, 300)) ?>"
                             alt="<?= the_title() ?>" layout="responsive"/>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="opg-navs">
                <button class="opg-nav opg-next">
                    <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/next.svg" alt="next">
                </button>
                <button class="opg-nav opg-prev">
                    <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/prev.svg" alt="prev">
                </button>
            </div>
        </div>
    </div>
    <section class="list-images">
        <div class="nav nav-tabs" id="slide-tab" role="tablist">
            <?php if (get_post_meta($product->get_id(), 'iframe', true)): ?>
                <a class="nav-link active p-feature" href="#p_feature" id="p_feature_label" data-toggle="tab"
                aria-controls="p_feature" aria-selected="true">
                    <?php if ($iframe): ?>
                        <img class="item"
                            src="<?= (isset($video_thumbnail_icon) && $video_thumbnail_icon) ? $video_thumbnail_icon : get_the_post_thumbnail_url('', array(150, 150)) ?>"
                            alt="" height="73" width="79"/>
                    <?php else: ?>
                        <img src="<?= get_the_post_thumbnail_url($product->get_id(), array(150, 150)) ?>"
                                 class="product-img"
                                 alt="<?= the_title() ?>" height="73" width="79">
                    <?php endif; ?>
                    <p>Tính năng<br>nổi bật</p>
                </a>
            <?php endif; ?>
            <?php if ($gallery) : ?>
                <a class="nav-link p-gallery <?= (get_post_meta($product->get_id(), 'iframe', true)) ? '' : 'active' ?>" href="#p_gallery" id="p_gallery_label" data-toggle="tab"
                   aria-controls="p_gallery" aria-selected="true">
                    <img class="item" src="<?= (get_the_post_thumbnail_url('', array(150, 150))) ? get_the_post_thumbnail_url('', array(150, 150)) : wp_get_attachment_image_url($gallery[0], array(79, 73)) ?>" alt="image"
                         height="73" width="79"/>
                    <p>Hình<br>sản phẩm</p>
                </a>
            <?php endif; ?>
        </div>

        <a href="#" class="mx-2 tech-info" data-toggle="modal" data-target="#dataModal">
            <i class="fas fa-exclamation-circle text-center"></i>
            <p class="text-center m-0 font-14">Xem thông số kỹ thuật</p>
        </a>
        <div class="modal fade tech-modal" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông số kỹ thuật</h5>
                        <a class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times; Đóng</span>
                        </a>
                    </div>
                    <div class="modal-body ts-modal-table">
                        <img class="img-fluid amp-img mb-2" src="<?= get_the_post_thumbnail_url('', array(300, 300)) ?>"
                             height="244" width="337" alt="Thumbnail"/>
                        <?= wpautop(get_post_meta($product->get_id(), 'technical_data', true)) ?>
                    </div>
                    <!--                     <div class="modal-header">
                                            <h5 class="modal-title">Đặc điểm sản phẩm</h5>
                                        </div>
                                        <div class="modal-body ts-modal-table">

                                        </div> -->
                </div>
            </div>
        </div>
    </section>
</div>

<div id="video-preview">
    <a href="#" class="close">╳</a>
    <div class="container-fluid">
        <div class="owl-carousel owl-theme pre-carousel">
                    <?php if ($iframe): ?>
                        <div class="item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <?= $iframe ?>
                            </div>
                        </div>
            <?php endif; ?>
        </div>
    </div>
</div>