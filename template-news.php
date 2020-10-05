<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 9:54 AM
 * Template Name: Tin tức
 */

if(wp_is_mobile()){
    return get_template_part('template-news-mobile');
}

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
get_header();
?>
    <main>
        <?= do_shortcode('[ns_list_news_category]') ?>

        <section class="container px-0 py-lg-4 py-3 fh-news">
            <div class="row">
                <?php while ($posts->have_posts()) : $posts->the_post() ?>
                    <?php if ($posts->current_post == 0): ?>
                        <div class="col-lg-7 col-12">
                            <h5 class="font-weight-bold pb-2">Tin tức nổi bật</h5>
                            <div class="d-flex flex-column">
                                <a  href="<?= the_permalink() ?>">
                                    <img class="img-fluid fh-news-img"
                                        src="<?= get_the_post_thumbnail_url() ?>" alt="News & Video">
                                    <h6 class="nv-title fh-news-title py-2 font-weight-bold text-dark font-18"><?= the_title() ?></h6>
                                </a>
                                <div class="nv-body fh-news-excerpt font-14 text-justify"> <?= get_the_excerpt() ?> </div>
                            </div>
                        </div>
                    <?php endif;
                    break ?>
                <?php endwhile; ?>

                <?= do_shortcode('[ns_list_post_most_viewed]') ?>
            </div>
        </section>


        <section class="container list-news">
            <?php while ($posts->have_posts()) : $posts->the_post() ?>
                <?php if ($posts->current_post <= 3): ?>
                    <div class="row py-3 border-top h-news">
                        <a href="<?= the_permalink() ?>" class="col-4 pl-0">
                            <img class="img-fluid hn-img" src="<?= get_the_post_thumbnail_url() ?>" alt="News & Video">
                        </a>
                        <div class="d-flex flex-column col-8 pl-0">
                            <a href="<?= the_permalink() ?>"
                               class="nv-title pb-2 font-weight-bold text-dark font-18"><?= the_title() ?></a>
                            <div class="nv-body text-justify"><?= get_the_excerpt() ?></div>
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
                <?php endif; ?>
            <?php endwhile; ?>

            <?php
            get_template_part('template_parts/contents/post-video')
            ?>

            <?php while ($posts->have_posts()) : $posts->the_post() ?>
                <?php if ($posts->current_post != 0): ?>
                    <?php if ($posts->current_post > 3): ?>
                        <div class="row py-3 border-top h-news">
                            <a href="<?= the_permalink() ?>" class="col-4 pl-0">
                                <img class="img-fluid hn-img" src="<?= get_the_post_thumbnail_url() ?>" alt="News & Video">
                            </a>
                            <div class="d-flex flex-column col-8 pl-0">
                                <a href="<?= the_permalink() ?>"
                                   class="nv-title pb-2 font-weight-bold text-dark font-18"><?= the_title() ?></a>
                                <div class="nv-body text-justify"><?= get_the_excerpt() ?></div>
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
                    <?php endif; ?>
                <?php endif; ?>
            <?php endwhile; ?>

            <?php if (isset($posts->max_num_pages) && $posts->max_num_pages > 1): ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="javascript:void(0)" onclick="loadNews(this)" data-pageindex="2"
                           data-url="<?= admin_url('admin-ajax.php') ?>" class="btn-more px-3 py-2 my-3">
                            <span class="mr-3">Xem thêm</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>

<?php
get_footer();
?>