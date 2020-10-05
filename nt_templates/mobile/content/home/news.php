<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 5:49 PM
 */
$query = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    's' => '',
    'post__in' => $news_ids,
    'orderby' => 'post_modified',
    'order' => 'DESC',
);
$list_post = new WP_Query($query);

?>

<div class="col-lg-3 col-md-4 col-12 pt-lg-0 pt-4 pr-lg-0 news">
    <div class="card">
        <h6 class="news-header m-1">
            <span class="text-uppercase font-weight-bold">TIN TỨC – VIDEO</span>
        </h6>
        <?php if ($list_post->have_posts()): ?>
            <?php while ($list_post->have_posts()): $list_post->the_post() ?>
                <a href="<?= get_permalink(get_the_ID()) ?>" class="media row m-1 pb-2 border-bottom">
                    <img class="col-4 pl-0 news-image img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="Generic placeholder image">
                    <div class="col-8 pl-0 media-body">
                        <h6 class="mt-0 news-title"><?= the_title() ?></h6>
                        <p class="news-time m-0"><i class="far fa-clock pr-md-1"></i> <span><?= get_post_time('d-m-Y', get_the_ID()) ?></span></p>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php if ($list_banner): ?>
        <?php foreach ($list_banner as $banner): ?>
            <div class="media pt-1">
                <a href="<?= $banner['banner_link'] ?>" title="" class="w-100">
                    <img class="img-fluid"
                         src="<?= wp_get_attachment_image_url($banner['banner_images'], array(400, 150)) ?>"
                         alt="Generic placeholder image">
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>