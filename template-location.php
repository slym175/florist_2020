<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Location
 */

if (wp_is_mobile()) {
    return get_template_part('mobile/template-location');
}

get_header('aboutus');
$args = [
    'post_type' => 'location',
    'post_status' => 'publish',
    'posts_per_page' => 5
];
$locations = new WP_Query($args);

?>
    <section class="section-hethongdieuthi2" style="background: #fff">
        <div class="hethongdsieuthi2 htstdm1">
            <div class="container">
                <div class="row pt-5 pb-2">
                    <div class="col-md-12 mb-4">
                        <h2 class="text-center text-white">HỆ THỐNG SIÊU THỊ ĐIỆN MÁY NEWSUN</h2>
                    </div>
                    <div class="col-md-8 px-0">
                        <div id="list_store_container">
                            <h5 class="sec-title">Tìm siêu thị điện máy NEWSUN</h5>
                            <div class="row">
                                <div class="col-md-3 pr-0" style="margin-bottom: 15px">
                                    <select name="" id="country_select" class="form-control">
                                        <option value="all">Tỉnh/Thành phố</option>
                                    </select>
                                </div>
                                <div class="col-md-3 pr-0" style="margin-bottom: 15px">
                                    <select name="" id="district_select" class="form-control">
                                        <option value="all">Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 15px;">
                                    <input type="text" placeholder="Nhập tên đường, phường xã ..." class="form-control h-100">
                                    <a href="javascript:;" onclick="_postSubmit()" class="search_store">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row" id="list_store">
                                <div class="col-md-12 hethong-items">
                                    <h5><i class="fas fa-map-marked-alt mr-3"></i> Tất cả siêu thị</h5>
                                </div>
                                <div class="col-md-12 info-items w-100">
                                    <?php if ($locations->have_posts()): ?>
                                        <?php while ($locations->have_posts()):
                                            $locations->the_post(); ?>
                                            <?php if ($locations->current_post == 0): ?>
                                                <div class="iframe-location-active" data-iframe="<?= get_post_meta(get_the_ID(), 'map', true) ?>"></div>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-12 content-box py-3">
                                                    <a href="<?= the_permalink() ?>" class="location-name" data-name="<?= the_title() ?>"
                                                       data-iframe='<?= get_post_meta(get_the_ID(), 'map', true) ?>'><strong><?= the_title() ?></strong></a>
                                                    <p class="mb-1"><strong>Địa chỉ: </strong> <?= get_post_meta(get_the_ID(), 'address', true) ?></p>
                                                    <p class="mb-1"><strong>SĐT: </strong> <?= get_post_meta(get_the_ID(), 'phone', true) ?></p>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 right pr-0">
                        <div class="headinfor">
                            <div>
                                <i class="fas fa-store"></i>
                                <span>Hệ thống siêu thị<br>trên toàn quốc</span>
                            </div>
                            <div>
                                <i class="far fa-clock"></i>
                                <span>Mở cửa <b>8:00 - 22:00</b> <br>kể cả chủ nhật và lễ</span>
                            </div>
                        </div>
                        <div class="col-12 pr-0" style="margin-top: 200px;">
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
            </div>
        </div>
    </section>
<?php
get_footer();