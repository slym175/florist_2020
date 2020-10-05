<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/6/2020
 * Time: 6:05 PM
 */

$paged = (isset($_POST['page']) && $_POST['page']) ? $_POST['page'] : '';
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 7,
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
            'operator' => 'NOT IN'
        )
    )
];
$posts_load_more = new WP_Query($args);

?>
<?php if ($paged): ?>

    <?php while ($posts_load_more->have_posts()) : $posts_load_more->the_post() ?>
        <div class="row py-3 border-top h-news">
            <a href="<?= the_permalink() ?>" class="col-4 pl-0">
                <img class="img-fluid hn-img" src="<?= get_the_post_thumbnail_url() ?>" alt="News & Video">
            </a>
            <div class="d-flex flex-column col-8 pl-0">
                <a href="<?= the_permalink() ?>"
                   class="nv-title pb-2 font-weight-bold text-dark font-18"><?= the_title() ?></a>
                <p class="nv-body text-justify"><?= get_the_excerpt() ?></p>
                <?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag', array("fields" => "all")); ?>
                <?php if ($tags): ?>
                    <div class="hash-tags">
                        <?php foreach ($tags as $tag): ?>
                            <a href="<?= get_term_link($tag->term_id) ?>" class="h-tag">
                                # <?= $tag->name ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>

    <?php if (isset($posts_load_more->max_num_pages) && $posts_load_more->max_num_pages > $paged): ?>
        <div class="row">
            <div class="col-12 text-center">
                <a href="javascript:void(0)" onclick="loadNews(this)" data-pageindex="<?= $paged+1 ?>"
                   data-url="<?= admin_url('admin-ajax.php') ?>" class="btn-more px-3 py-2 my-3">
                    <span class="mr-3">Xem thêm</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
