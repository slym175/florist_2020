<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 2:55 CH
 */

$args = [
    'post_type'         => 'post',
    'posts_per_page'    => 4,
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'meta_query'        => array(
        'key'           => 'is_featured',
        'value'         => 1,
        'type'          => 'NUMERIC'
    )
];

$news = new WP_Query($args);
?>

<?php if($news->have_posts()) : ?>
    <div class="news-sidebar">
        <div class="title-news-sb">
            <h2><?= __('Bài viết nổi bật', TEXTDOMAIN) ?></h2>
        </div>
        <?php while($news->have_posts()) : $news->the_post(); ?>
            <div class="post-sb post-sb-s2">
                <div class="img">
                    <a href="<?= permalink_link() ?>" title="<?= the_title() ?>"> <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(112, 73)) ?>" alt="<?= the_title() ?>"> </a>
                </div>
                <div class="content">
                    <h4> <a href="<?= permalink_link() ?>" title="<?= the_title() ?>"><?= __(the_title(), TEXTDOMAIN) ?></a> </h4>
                </div>
            </div>
        <?php endwhile ?>
    </div>
<?php endif; ?>