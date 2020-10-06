<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 5:48 PM
 */
$args = [
    'post_type' => 'banner',
    'posts_per_page' => $attr['limit'],
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'banner_group',
            'field' => 'term_id',
            'terms' => $attr['banner_group_id'], /// Where term_id of Term 1 is "1".
            'include_children' => false
        ),
    )
];
$banners = new WP_Query($args);

?>

<?php if($banners->have_posts()) : ?>
    <div class="slider-hompage">
        <div class="slider-pc">
            <?php while ($banners->have_posts()) : $banners->the_post(); ?>
                <div class="item">
                    <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array()) ?>" title="<?= the_title() ?>">
                    <div class="content">
                        <h2><?= the_title() ?></h2>
                        <div><?= the_excerpt() ?></div>
                        <a href="<?= get_post_meta(get_the_ID(), 'banner_link')[0] ?>" title="<?= the_title() ?>" class="btn-cc"><?= __('Tìm hiểu ngay', TEXTDOMAIN) ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>