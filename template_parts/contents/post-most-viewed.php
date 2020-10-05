<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 10:35 AM
 */

$post_most_viewed = new WP_Query(array(
    'post_type' => 'post',
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
            'operator' => 'NOT IN'
        )
    )
));


?>
<div class="col-lg-5 col-12 font-14">
    <h5 class="font-weight-bold pb-2">Bài viết xem nhiều:</h5>
    <?php while ($post_most_viewed->have_posts()) : $post_most_viewed->the_post() ?>
        <div class="row pb-2 ml-1 mt-2 h-news <?= ($post_most_viewed->current_post == count($post_most_viewed->posts) - 1) ? '' : 'border-bottom' ?>">
            <div class="h-flag"></div>
            <span class="h-index"><?= $post_most_viewed->current_post + 1 ?></span>
            <a href="<?= the_permalink() ?>" class="col-5 pl-0">
                <img class="img-fluid" src="<?= get_the_post_thumbnail_url('', array(653, 383)) ?>" alt="<?= the_title() ?>">
            </a>
            <div class="d-flex flex-column col-7 pl-0">
                <a href="<?= the_permalink() ?>"
                   class="nv-title line-1 mb-2 font-weight-bold text-dark"><?= the_title() ?></a>
                <div class="nv-body line-2"><?= the_excerpt() ?></div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
