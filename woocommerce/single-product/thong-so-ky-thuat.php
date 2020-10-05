<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 3:55 PM
 */
global $product;
$post_ids = get_post_meta($product->get_id(), 'post_related', true);
if ($post_ids) {
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__in' => $post_ids,
    ];
    $posts_related = new WP_Query($args);
}


$post_page_link = get_post_meta($product->get_id(), 'page_post_link', true);
?>
<div class="col-lg-4 col-12 tech-section">
    <h6 class="font-18 font-weight-bold">Thông số kỹ thuật</h6>
    <div class="font-14 w-100 d-flex flex-column technical-data ts-table">
        <?= wpautop(get_post_meta($product->get_id(), 'technical_data', true)) ?>
    </div>
    <?php if (get_post_meta($product->get_id(), 'technical_data', true)): ?>
        <div class="d-flex justify-content-center py-3">
            <a href="#" class="btn-more px-2 py-1" id="tech-show">
                Xem thêm <i class="fas fa-chevron-down font-12" style="margin-left: 1rem;"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if (isset($posts_related) && $posts_related): ?>
        <h6 class="font-18 border-top font-weight-bold py-4 m-0">Bài viết liên quan</h6>
        <?php while ($posts_related->have_posts()): $posts_related->the_post(); ?>
            <a class="row mb-3" href="<?= the_permalink() ?>">
                <div class="col-4 pr-0">
                    <img src="<?= get_the_post_thumbnail_url() ?>" class="img-fluid" alt="<?= the_title() ?>">
                </div>
                <h6 class="col-8 font-14 text-dark-2"><?= the_title() ?></h6>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($post_page_link): ?>
        <div class="d-flex justify-content-center">
            <a href="<?= $post_page_link['url'] ?>" class="btn-more text-center py-1 w-100">Xem tất cả bài viết
                liên quan <i
                    class="fas fa-chevron-right ml-3"></i></a>
        </div>
    <?php endif; ?>
</div>
