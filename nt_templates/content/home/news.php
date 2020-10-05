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

<div class="news">
    <div class="card mb-1">
        <h6 class="news-header p-2 mb-1 border-bottom">
            <span class="text-uppercase font-weight-bold">TIN TỨC – VIDEO</span>
        </h6>
        <?php if ($list_post->have_posts()): ?>
            <?php while ($list_post->have_posts()): $list_post->the_post() ?>
                <a href="<?= get_permalink(get_the_ID()) ?>" class="media row m-1 ml-2 pb-2 border-bottom">
                    <img class="col-4 pl-0 news-image img-fluid" src="<?= get_the_post_thumbnail_url('',array(150,150)) ?>" alt="Generic placeholder image">
                    <div class="col-8 px-0 media-body">
                        <h6 class="mt-0 news-title"><?= the_title() ?></h6>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php if ($list_banner): ?>
        <?php foreach ($list_banner as $banner) : ?>
            <div class="media pt-1">
                <a href="<?= $banner['banner_link'] ?>" title="" class="w-100">
                    <img class="img-fluid w-100"
                         src="<?= wp_get_attachment_image_url($banner['banner_images'], array(400, 150)) ?>"
                         alt="Generic placeholder image">
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>