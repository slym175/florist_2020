<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 9:16 SA
 */
$params = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $limit,
    'tax_query'         => array(
        'relation'      => 'AND',
        array(
            'taxonomy'  => 'category',
            'field'     => 'term_id',
            'terms'     => $category->term_id,
        ),
    )
);

$posts = new WP_Query($params);
?>

<?php if($posts->have_posts()) : ?>
    <div id="category-<?= $category->slug ?>" class="<?= $class ?>">
        <div class="slider-post">
            <?php while ($posts->have_posts()) : $posts->the_post() ?>
                <div class="post-item">
                    <div class="post-box">
                        <div class="img">
                            <a href="<?= the_permalink() ?>" title=""><img src="<?= get_the_post_thumbnail_url(get_the_ID(), array()) ?>" alt=""></a>
                        </div>
                        <div class="content">
                            <h5> <a href="<?= the_permalink() ?>" title="<?= the_title() ?>"><?= the_title() ?></a> </h5>
                            <div class="timer">
                                <p> <span> <img src="<?= THEME_URL_URI ?>/assets/img/dh.png" alt=""> </span><?= the_date("H:i") ?></p>
                                <p> <span><?= the_date('d/m/Y')?></span> </p>
                            </div>
                            <div class="description">
                                <?= the_excerpt() ?>
                            </div>
                            <div class="detail">
                                <a href="<?= the_permalink() ?>" title=""> Xem chi tiết <span> <img src="<?= THEME_URL_URI ?>/assets/img/xct.png" alt=""> </span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>