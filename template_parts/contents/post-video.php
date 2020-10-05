<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/6/2020
 * Time: 3:48 PM
 */


$post_video = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video'),
        )
    )
));

?>
<?php if ($post_video->have_posts()): ?>
    <div class="row p-3 mb-3 n-carousel">
        <div class="col-12">
            <h6 class="text-white">Video:</h6>
        </div>
        <div class="news-owl-carousel owl-carousel owl-theme">
            <?php while ($post_video->have_posts()) : $post_video->the_post() ?>
                <div class="h-news item post_video" data-id-video="<?= get_the_ID() ?>" data-url="<?= admin_url('admin-ajax.php') ?>" data-post_id="<?= get_the_ID() ?>">
                    <img class="img-fluid mb-4" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                    <a href="javascript:void(0)" class="nv-title font-weight-bold"><?= the_title() ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<div id="video-popup" class="overlay">
</div>
