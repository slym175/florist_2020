<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 10:02 AM
 */
$post_ids = ($attr['ids']) ? $attr['ids'] : '';
$video_ids = ($attr['video_ids']) ? $attr['video_ids'] : '';
$args = [
    'post_type' => 'post',
    'posts_per_page' => ($attr['limit']) ? $attr['limit'] : 6,
    'post_status' => 'publish',
];
if ($post_ids) {
    $args['post__in'] = explode(',', $post_ids);
}
$posts = new WP_Query($args);

$args_video = [
    'post_type' => 'post',
    'posts_per_page' => ($attr['limit']) ? $attr['limit'] : 3,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video'),
        )
    )
];
if ($video_ids) {
    $args_video['post__in'] = explode(',', $video_ids);
}
$videos = new WP_Query($args_video);
?>
<section class=" container news-video border-top">
    <h2>Tin tức & Video</h2>
    <div class="row">

        <?php if ($videos->have_posts()): ?>
            <?php while ($videos->have_posts()) : $videos->the_post() ?>
                <?php if ($videos->current_post == 0) : ?>
                    <div class="col-12 col-md-7 nv-main">
                        <a href="javascript:void(0)" class="post_video" title="" data-name="<?= the_title() ?>"
                           data-iframe="<?= esc_html(get_post_meta(get_the_ID(), 'iframe', true)) ?>"
                           data-post_id="<?= get_the_ID() ?>">
                            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(653,383)) ?>" style="height: 190px;width: 100%" alt="<?= the_title() ?>" />
                            <h4 class="text-justify"><?= the_title() ?></h4>
                        </a>
                        <div><?= the_excerpt() ?></div>
                        <div class="post_ct" style="display: none"><?= get_the_content() ?></div>
                    </div>
                    <?php break; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php elseif ($posts->have_posts()): ?>
            <?php while ($posts->have_posts()) : $posts->the_post() ?>
                <?php if ($posts->current_post == 0) : ?>
                    <div class="col-12 col-md-7 nv-main">
                        <a href="<?= the_permalink() ?>" title="">
                            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(653,383)) ?>" style="height: 190px;width: 100%" alt="<?= the_title() ?>" />
                            <h4 class="text-justify"><?= the_title() ?></h4>
                        </a>
                        <div><?= the_excerpt() ?></div>
                    </div>
                    <?php break; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="col-12 col-md-5">
            <?php if ($videos->have_posts()): ?>
                <?php while ($videos->have_posts()) : $videos->the_post() ?>
                    <?php if ($videos->current_post != 0) : ?>
                        <div class="nv-normal">
                            <div class="row post_video_pop" data-name="<?= the_title() ?>"
                                 data-iframe="<?= esc_html(get_post_meta(get_the_ID(), 'iframe', true)) ?>"
                                 data-post_id="<?= get_the_ID() ?>">
                                <a class="col-5" href="javascript:void(0)" title="<?= the_title() ?>">
                                    <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(143,81)) ?>" style="height: 81px;width: 164px" alt="<?= the_title() ?>" />
                                </a>
                                <div class="col-7 pl-0">
                                    <a href="javascript:void(0)" title="">
                                        <h4 class="m-0 font-14 lh-125"><?= the_title() ?></h4>
                                    </a>
                                </div>
                                <div class="post_ct" style="display: none"><?= get_the_content() ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; wp_reset_query();?>

            <?php if ($posts->have_posts()): ?>
                <?php while ($posts->have_posts()) : $posts->the_post() ?>
                    <?php if ($posts->current_post != 0) : ?>
                        <div class="nv-normal">
                            <div class="row">
                                <a class="col-5" href="<?= the_permalink() ?>" title="<?= the_title() ?>">
                                    <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(143,81)) ?>" style="height: 81px;width: 164px" alt="<?= the_title() ?>" />
                                </a>
                                <div class="col-7 pl-0">
                                    <a href="<?= the_permalink() ?>" title="">
                                        <h4 class="m-0 font-14 lh-125"><?= the_title() ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; wp_reset_query();?>

        </div>
    </div>
    <div class="row d-flex justify-content-center my-3">
        <a href="<?php echo get_page_link(get_page_by_path('tin-tuc')); ?>" title="Xem thêm" class="btn btn-outline-primary my-1 mx-2">Xem tất cả <i class="fas fa-angle-down ml-2"></i></a>
    </div>
</section>

<div id="app-v-preview" style="background: #fff !important;" class="overlay">
    <a href="javascript:void(0)" class="close" onclick="closePopup()">╳</a>
    <div class="overlay-content">
        <div class="video_play embed-responsive embed-responsive-4by3" id="video_play">
        </div>
        <div class="text-left p-3">
            <h5 class="post_video_title" id="post_video_title"></h5>
            <div class="text-left" id="post_video_content">

            </div>
        </div>
    </div>
</div>
<style>
    .video_play iframe{
        width: 100%;
    }
    #app-v-preview img{
        width: 100%;
        height: auto;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery('.post_video').on('click', function(event) {
            event.preventDefault();
            jQuery("#app-v-preview").css('width', '100%').addClass('show');
            jQuery(".top-up").addClass('d-none');
            var name = jQuery(this).data("name");
            var video = jQuery(this).data("iframe");

            var content = jQuery(this).parents().find('.post_ct').html();
            document.getElementById('post_video_title').innerHTML = name;
            document.getElementById('video_play').innerHTML = video;
            document.getElementById('post_video_content').innerHTML = content;
        });

        jQuery('.post_video_pop').on('click', function(event) {
            event.preventDefault();
            jQuery("#app-v-preview").css('width', '100%').addClass('show');
            jQuery(".top-up").addClass('d-none');
            var name = jQuery(this).data("name");
            var video = jQuery(this).data("iframe");

            var content = jQuery(this).find('.post_ct').html();
            document.getElementById('post_video_title').innerHTML = name;
            document.getElementById('video_play').innerHTML = video;
            document.getElementById('post_video_content').innerHTML = content;
        });
    })
</script>
