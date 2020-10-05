<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
if(wp_is_mobile()){
    return get_template_part('mobile/single-location');
}

get_header('aboutus');

?>
    <section class="section-hethongdieuthi2">
        <div class="hethongdsieuthi2">
            <div class="container p-0">
                <div class="row pt-3 pb-2">
                    <div class="col-md-8 left pr-0">
                        <div class="col-md-12">
                            <div class="hidden-xs">
                                <ul class="ns-breadcrumb">
                                    <li><a href="<?= home_url('he-thong-5-cua-hang-800-2200') ?>">Hệ thống cửa hàng</a></li>
                                    <li class="active"><?= the_title() ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 text-lg-left mt-2">
                            <h3 class="text-lg-left text-center"><?= the_title() ?></h3>
                            <div class="maps-florist w-100">
                                <?= get_post_meta(get_the_ID(),'map',true) ?>
                            </div>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        </div>

                        <div class="container">
                            <?php
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-4 right right-slogan">
                        <div class="col-md-12 hethong-items">
                            <p><?= the_title() ?></p>
                        </div>
                        <div class="col-md-12 info-items w-100">
                            <img src="<?= get_the_post_thumbnail_url() ?>" class="img-fluid">
                            <?= the_excerpt() ?>
                            <p><strong>Địa chỉ: </strong><?= get_post_meta(get_the_ID(),'address',true) ?></p>
                            <p><strong>Email: </strong><?= get_post_meta(get_the_ID(),'email',true) ?></p>
                            <p><strong>SDT: </strong><?= get_post_meta(get_the_ID(),'phone',true) ?></p>
                            <p><strong>Giờ làm việc: </strong><?= get_post_meta(get_the_ID(),'time_work',true) ?></p>
                        </div>
                        <div class="content-box">
                            <div class="policy_intuitive">
                                <div class="for-mobile">
                                    <h4 class="text-green-1">Mua như vua - chăm sóc như vip</h4>
                                    <ul class="policy_new">
                                        <li>
                                            <span>
                                                <i class="icondetailV3-ld-new">
                                                    
                                                </i>
                                            </span>
                                            <p><b>Miễn phí</b> công lắp đặt</p>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icondetailV3-1d1-new">
                                                    
                                                </i>
                                            </span>
                                            <p>Lỗi là đổi mới trong <b>1 tháng</b> tận nhà <a href="#" title="Chính sách đổi trả"> <b data-tooltip-stickto="top" data-tooltip-maxwidth="300" data-tooltip="Trong tháng đầu tiên, nếu sản phẩm lỗi do nhà sản xuất, quý khách sẽ được đổi sản phẩm tương đương (cùng model, cùng màu, …) miễn phí."> Xem chi tiết </b> </a>
                                            </p>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icondetailV3-dt-new">
                                                    
                                                </i>
                                            </span>
                                            <p>Đổi trả và bảo hành cực dễ <b>chỉ cần số điện thoại</b></p>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icondetailV3-bh-new"></i>
                                            </span>
                                            <p>Bảo hành <b>chính hãng 2 năm</b>, có người đến lấy tận nhà</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr">
                <?php do_shortcode('[ns_list_tags]'); ?>
            </div>
        </div>
    </section>
    <style>
        .w-100 iframe{
            width: 100%;
            height: 550px;
        }
    </style>
<?php

get_footer();
