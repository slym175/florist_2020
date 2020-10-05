<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 10:02 AM
 */
$post_ids = ($attr['ids']) ? $attr['ids'] : '';
$video_ids = ($attr['video_ids']) ? $attr['video_ids'] : '';
$args_post = [
    'post_type' => 'post',
    'posts_per_page' => ($attr['limit']) ? $attr['limit'] : 3,
    'post_status' => 'publish',
];

if ($post_ids) {
    $args_post['post__in'] = explode(',', $post_ids);
}
$posts = new WP_Query($args_post);

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

<section class="mt-md-4 mt-2 news-video">
    <div class="container border-bottom">
        <div class="row mb-md-4 mb-1">
            <h4 class="px-md-0 px-2">Tin tức & Video</h4>
        </div>
        <div class="row">
            <?php if ($videos->have_posts()): ?>
                <?php while ($videos->have_posts()) : $videos->the_post() ?>
                    <?php if ($videos->current_post == 0): ?>
                        <div class="col-md-7 col-12 p-md-0 p-2">
                            <a href="javascript:void(0)" class="d-flex flex-column video-pop post_video first"
                               data-id-video="<?= get_the_ID() ?>" data-url="<?= admin_url('admin-ajax.php') ?>"
                               data-post_id="<?= get_the_ID() ?>">
                                <img class="img-fluid" src="<?= get_the_post_thumbnail_url('', array(653, 383)) ?>"
                                     alt="<?= the_title() ?>"
                                     style="max-height:375px;width:100%;object-fit: cover;object-position: 50% 50%">
                                <h6 class="nv-title mt-2"><?= the_title() ?></h6>
                                <div class="nv-body"><?= the_excerpt() ?></div>
                            </a>
                        </div>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php elseif ($posts->have_posts()): ?>
                <?php while ($posts->have_posts()) : $posts->the_post() ?>
                    <?php if ($posts->current_post == 0): ?>
                        <div class="col-md-7 col-12 p-md-0 p-2">
                            <a href="<?= the_permalink() ?>" class="d-flex flex-column">
                                <img class="img-fluid" src="<?= get_the_post_thumbnail_url('', array(653, 383)) ?>"
                                     alt="<?= the_title() ?>"
                                     style="height:387px;width:678px;object-fit: cover;object-position: 50% 50%">
                                <h6 class="nv-title mt-2"><?= the_title() ?></h6>
                                <div class="nv-body"><?= the_excerpt() ?></div>
                            </a>
                        </div>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="col-md-5 col-12">
                <div class="d-flex flex-column">
                    <?php if ($videos->have_posts()): ?>
                        <?php while ($videos->have_posts()) : $videos->the_post() ?>
                            <?php if ($videos->current_post != 0): ?>
                                <a href="javascript:void(0)" class="row mb-md-3 mb-2 video-pop post_video" data-id-video="<?= get_the_ID() ?>" data-url="<?= admin_url('admin-ajax.php') ?>"
                                   data-post_id="<?= get_the_ID() ?>">
                                    <div class="col-4 pr-0 post_video_thumb">
                                        <img class="img-fluid" src="<?= get_the_post_thumbnail_url('', array(143, 81)) ?>"
                                             alt="News & Video"
                                             style="height:81px;width:145px;object-fit: cover;object-position: 50% 50%">
                                    </div>
                                    <div class="col-8 pr-0">
                                        <h6 class="nv-title-small"><?= the_title() ?></h6>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if ($posts->have_posts()): ?>
                        <?php while ($posts->have_posts()) : $posts->the_post() ?>
                            <?php if ($posts->current_post != 0): ?>
                                <a href="<?= the_permalink() ?>" class="row mb-md-3 mb-2">
                                    <div class="col-4 pr-0">
                                        <img class="img-fluid" src="<?= get_the_post_thumbnail_url('', array(143, 81)) ?>"
                                             alt="News & Video"
                                             style="height:81px;width:145px;object-fit: cover;object-position: 50% 50%">
                                    </div>
                                    <div class="col-8 pr-0">
                                        <h6 class="nv-title-small"><?= the_title() ?></h6>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 p-md-0 p-2 d-flex justify-content-end">
                <a href="<?php echo get_page_link(get_page_by_path('tin-tuc')); ?>" class="nv-more font-12 text-blue-2">Xem
                    tất cả >></a>
            </div>
        </div>
    </div>
</section>

<div id="video-popup" class="overlay">
</div>


