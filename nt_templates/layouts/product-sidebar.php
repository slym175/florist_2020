<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 2:55 CH
 */

$categories = get_terms('product_cat', array('hide_empty' => 1));

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
    <div class="cate-service">
        <?php foreach($categories as $category) : ?>
            <?php if(!$category->children || !isset($category->children)) : ?>
                <div class="cate-item">
                    <div class="title-service <?= $category->term_id == $cate ? 'active' : '' ?>"><a href="<?= get_term_link( $category->term_id, 'product_cat' ); ?>" title="<?= __($category->name, TEXTDOMAIN) ?>" class="btn"><?= __($category->name, TEXTDOMAIN) ?></a></div>
                </div>
            <?php else : ?>
                <div class="cate-item">
                    <div class="title-service <?= $category->term_id == $cate ? 'active' : '' ?>"><a href="<?= get_term_link( $category->term_id, 'product_cat' ); ?>" title="" class="btn"><?= __($category->name, TEXTDOMAIN) ?></a></div>
                    <ul class="service-submenu">
                        <?php foreach($category->children as $child) : ?>
                            <li class="<?= $child->term_id == $cate ? 'category-active' : '' ?>">
                                <span> 
                                    <img src="<?= THEME_URL_URI ?>/assets/img/listd.png" alt=""> 
                                    <img src="<?= THEME_URL_URI ?>/assets/img/listx.png" alt="" class="hover">
                                </span>    
                                <a href="<?= get_term_link( $child->term_id, 'product_cat' ); ?>" title="<?= __($child->name, TEXTDOMAIN) ?>"><?= __($child->name, TEXTDOMAIN) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
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
