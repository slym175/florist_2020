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
<div class="col-md-6 col-lg-5 col-12">
    <section class="container-fluid px-0 news-video">
        <div class="row">
            <div class="col-12">
                <h2 class="news-section-title section-title-16">Bài viết xem nhiều</h2>
            </div>
        </div>
        <?php if ($post_most_viewed->have_posts()): ?>
            <?php while ($post_most_viewed->have_posts()) : $post_most_viewed->the_post() ?>
                <div class="row nv-normal">
                    <a class="col-5 col-md-5 img-container" href="<?= the_permalink() ?>">
                        <span class="nv-flag"></span>
                        <span class="nv-index"><?= $post_most_viewed->current_post + 1 ?></span>
                        <img data-amp-auto-lightbox-disable class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(653,383)) ?>" style="height: 81px" alt="<?= the_title() ?>">
                    </a>
                    <div class="col-7 col-md-7 pl-0">
                        <a href="<?= the_permalink() ?>" title="">
                            <h4 class="lh-125"><?= the_title() ?></h4>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</div>