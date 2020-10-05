<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 5:48 PM
 */
$args = [
    'post_type' => 'banner',
    'posts_per_page' => $limit,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'banner_group',
            'field' => 'term_id',
            'terms' => $banner_group, /// Where term_id of Term 1 is "1".
            'include_children' => false
        ),
    )
];
$banners = new WP_Query($args);
?>
<div class="h-slide">
    <div id="carousel-1" class="owl-carousel owl-theme">
        <?php while ($banners->have_posts()) : $banners->the_post() ?>
            <?php $link_to = get_post_meta(get_the_ID(), 'link_to', true); ?>
            <a href="<?= ($link_to && $link_to['url']) ? $link_to['url'] : '' ?>" target="<?= ($link_to && $link_to['target']) ? $link_to['target'] : '' ?>">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(600, 338)) ?>" alt="<?= the_title() ?>">
            </a>
        <?php endwhile; ?>
    </div>
    <div id="carousel-2" class="owl-carousel owl-theme">
        <?php while ($banners->have_posts()) : $banners->the_post() ?>
            <div class="item">
                <span class="font-10"><?= the_title() ?></span>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="dot-container" id="carousel-custom-dots"></div>
</div>