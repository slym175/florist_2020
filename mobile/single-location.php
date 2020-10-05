<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */

get_header('mobile');

?>
    <section class="section-hethongdieuthi2">
        <div class="hethongdsieuthi2">
            <div class="container p-0">
                <div class="row pt-3 pb-2">
                    <div class="col-md-8 left">
                        <div class="col-md-12">
                            <div class="hidden-xs">
                                <ul class="ns-breadcrumb">
                                    <li><a href="<?= home_url('he-thong-5-cua-hang-800-2200') ?>">Hệ thống cửa hàng</a></li>
                                    <li class="active"><?= the_title() ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <h3 class="text-lg-left text-center"><?= the_title() ?></h3>
                            <div class="maps-newsun w-100">
                                <?= get_post_meta(get_the_ID(),'map',true) ?>
                            </div>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-md-4 right right-slogan">
                        <div class="col-md-12 hethong-items">
                            <p><?= the_title() ?></p>
                        </div>
                        <div class="col-md-12 info-items w-100">
                            <img src="<?= get_the_post_thumbnail_url() ?>" class="w-100 mb-2">
                            <div>
                                <?= the_excerpt() ?>
                            </div>
                            <p><strong>Địa chỉ: </strong><?= get_post_meta(get_the_ID(),'address',true) ?></p>
                            <p><strong>Email: </strong><?= get_post_meta(get_the_ID(),'email',true) ?></p>
                            <p><strong>SĐT: </strong><?= get_post_meta(get_the_ID(),'phone',true) ?></p>
                            <p><strong>Giờ làm việc: </strong><?= get_post_meta(get_the_ID(),'time_work',true) ?></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php
                            if (comments_open() || get_comments_number()) :
                                comments_template('/mobile-comments.php');
                            endif;
                        ?>
                    </div>
                </div>
                <?php do_shortcode('[ns_list_tags]'); ?>
            </div>
        </div>
    </section>
    <style>
        .w-100 iframe{
            width: 100%;
            height: 550px;
        }

        @media only screen and (max-width: 400px) {
            .w-100 iframe{
                width: 100%;
                height: 250px;
                margin-bottom: .5rem;
            }
        }
    </style>
<?php

get_footer('mobile');
