<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Location
 */

get_header('aboutus-mobile');
$args = [
    'post_type' => 'location',
    'post_status' => 'publish'
];
$locations = new WP_Query($args);

?>

    <section class="section-hethongdieuthi2" style="background: #fff">
        <div class="hethongdsieuthi2 htstdm1">
            <div class="container">
                <div class="row pt-lg-5 pt-4">
                    <div class="col-md-12 mb-4">
                        <h2 class="text-center">HỆ THỐNG SIÊU THỊ ĐIỆN MÁY NEWSUN</h2>
                    </div>
                    <div class="col-md-3 left" style="margin-bottom: 15px">
                        <select name="" id="country_select" class="form-control">
                            <option value="all">Tỉnh/Thành phố</option>
                        </select>
                    </div>
                    <div class="col-md-3 left" style="margin-bottom: 15px">
                        <select name="" id="district_select" class="form-control">
                            <option value="all">Quận/Huyện</option>
                        </select>
                    </div>
<!--                    <div class="col-md-6 left" style="margin-bottom: 15px">-->
<!--                        <input type="text" placeholder="Nhập tên đường, phường xã ..." class="form-control">-->
<!--                        <a href="javascript:;" onclick="_postSubmit()" class="search_store">-->
<!--                            <i class="fa fa-search"></i>-->
<!--                        </a>-->
<!--                    </div>-->

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
            <div class="col-md-8 left">
                <div class="col-md-12 text-lg-left p-0">
                    <div class="maps-newsun" id="maps-newsun">

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();