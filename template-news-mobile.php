<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 9:54 AM
 * Template Name: Tin tức
 */

$paged = 1; //hoặc 0
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
}

$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'menu_order publish_date',
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
$posts = new WP_Query($args);

get_header('mobile');
?>
    <main>
        <?= do_shortcode('[ns_list_mobile_news_category]') ?>

        <div class="container p-md-0 bb-1">
            <div class="row">
                <!-- Bài viết nổi bật -->
                <div class="col-md-6 col-lg-7 col-12 pr-md-0">
                    <?php if ($posts->have_posts()): ?>
                        <?php while ($posts->have_posts()) : $posts->the_post() ?>
                            <?php if ($posts->current_post == 0): ?>
                                <section class="container-fluid py-3 px-0 feature-news">
                                    <div class="row px-3">
                                        <div class="col-12 px-0">
                                            <h6 class="news-section-title section-title-16">Tin tức nổi bật</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="amp-img" src="<?= get_the_post_thumbnail_url('', array(653, 383)) ?>" style="height: 214px"
                                                 alt="Red Status" />
                                        <div class="row px-3 pt-2">
                                            <div class="col-12 font-16 px-0">
                                                <a href="<?= the_permalink() ?>" class="d-block font-weight-bold text-2 text-justify">
                                                    <?= the_title() ?>
                                                </a>
                                            </div>
                                        </div>
                                        <?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag', array("fields" => "all")); ?>
                                        <?php if ($tags): ?>
                                            <div class="row px-3 mb-2">
                                                <div class="col-12 px-0">
                                                    <?php foreach ($tags as $tag): ?>
                                                        <a href="#" title="Tags" class="mb-1">
                                                            <span href="<?= get_term_link($tag->term_id) ?>" title="<?= $tag->name ?>" class="text-dark bg-2 p-2 rounded font-10"># <?= $tag->name ?></span>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </section>
                            <?php endif;
                            break ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <!-- Bài viết xem nhiều -->
                <?= do_shortcode('[ns_list_mobile_post_most_viewed]') ?>
            </div>
        </div>

        <?php
        get_template_part('mobile/template_parts/contents/post-video');
        ?>
        <section class="container mt-3 px-md-0 l-feature-news border-top">
            <?php while ($posts->have_posts()) : $posts->the_post() ?>
                <?php if ($posts->current_post != 0): ?>
                    <?php if ($posts->current_post > 3): ?>
                        <div class="py-3 border-bottom">
                            <div class="row">
                                <a href="<?= the_permalink() ?>" class="col-5 col-md-4" title="<?= the_title() ?>">
                                    <img src="<?= get_the_post_thumbnail_url() ?>" class="amp-img" alt="<?= the_title() ?>" />
                                </a>
                                <div class="col-7 col-md-8 font-14 pl-0">
                                    <div class="px-0 mt-md-0">
                                        <a href="<?= the_permalink() ?>"
                                           class="text-2"><?= the_title() ?></a>
                                    </div>
                                    <?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag', array("fields" => "all")); ?>
                                    <?php if ($tags): ?>
                                        <div class="px-md-0">
                                            <?php foreach ($tags as $tag): ?>
                                                <a href="<?= get_term_link($tag->term_id) ?>" title="Tags" class="mb-1">
                                                    <span title="Tư vấn"
                                                          class="text-dark bg-2 p-2 rounded font-10"># <?= $tag->name ?></span>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </section>
        <?php if (isset($posts->max_num_pages) && $posts->max_num_pages > 1): ?>
            <section class="d-flex justify-content-center">
                <a href="javascript:void(0)" onclick="loadNews(this)" data-pageindex="2"
                   data-url="<?= admin_url('admin-ajax.php') ?>" class="btn btn-outline-primary">
                    Xem thêm <i class="fas fa-angle-right ml-3"></i>
                </a>
            </section>
        <?php endif; ?>
    </main>


<?php
get_footer();
?>