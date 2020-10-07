<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 2:55 CH
 */

$args = [
    'post_type'         => 'banner',
    'posts_per_page'    => 4,
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'tax_query'         => array(
        array(
            'taxonomy'          => 'banner_group',
            'field'             => 'term_id',
            'terms'             => 47, /// Where term_id of Term 1 is "1".
            'include_children'  => false
        ),
    )
];

$banners = new WP_Query($args);
?>

<div class="siderbar-list">

    <?= nt()->load_template('content/news/news', 'featured', []) ?>

    <?php while($banners->have_posts()) : $banners->the_post(); ?>
        <div class="img-service">
            <a href="<?= get_post_meta( get_the_ID(), 'banner_link', true ) ?? home_url() ?>" title="<?= the_title() ?>"> <img src="<?= get_the_post_thumbnail_url( get_the_ID(), array(270, 225) ) ?>" alt="<?= the_title() ?>"> </a>
        </div>
    <?php break; endwhile ?>

    <?= nt()->load_template('content/product/products', 'featured', []) ?>

    <?php while ($banners->have_posts()) : $banners->the_post() ?>
        <div class="img-service">
            <a href="<?= get_post_meta( get_the_ID(), 'banner_link', true ) ?? home_url() ?>" title="<?= the_title() ?>"> <img src="<?= get_the_post_thumbnail_url( get_the_ID(), array(270, 225) ) ?>" alt="<?= the_title() ?>"> </a>
        </div>
    <?php endwhile ?>
</div>