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
        <div class="py-3 border-bottom">
            <div class="row">
                <a href="<?= the_permalink() ?>" class="col-5 col-md-4" title="<?= the_title() ?>">
                    <img src="<?= get_the_post_thumbnail_url() ?>" class="amp-img" alt="<?= the_title() ?>" />
                </a>
                <div class="col-7 col-md-8 font-14 pl-0">
                    <div class="px-0 mt-md-0">
                        <a href="<?= the_permalink() ?>" class="text-2"><?= the_title() ?></a>
                    </div>
                    <?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag', array("fields" => "all")); ?>
                    <?php if ($tags): ?>
                        <div class="px-md-0">
                            <?php foreach ($tags as $tag): ?>
                                <a href="<?= get_term_link($tag->term_id) ?>" title="Tags" class="mb-1">
                                    <span title="Tư vấn" class="text-dark bg-2 p-2 rounded font-10"># <?= $tag->name ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <?php if (isset($posts_load_more->max_num_pages) && $posts_load_more->max_num_pages > $paged): ?>
        <div class="d-flex py-3 justify-content-center">
            <a href="javascript:void(0)" onclick="loadNews(this)" data-pageindex="<?= $paged+1 ?>"
                   data-url="<?= admin_url('admin-ajax.php') ?>" class="btn btn-outline-primary">
                    Xem thêm <i class="fas fa-angle-right ml-3"></i>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
