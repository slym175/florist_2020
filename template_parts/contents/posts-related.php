<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 1:53 PM
 */
global $post;
?>
<div class="blogpost blogpost-reponsive">
    <div class="container px-0">
        <div class="row">
            <div class="col-md-12 text-lg-left pb-4 pt-3">
                <h3>Bài viết liên quan</h3>
            </div>

            <?php
            $category_ids = wp_get_post_categories($post->ID);
            $related = get_posts( array( 'category__in' => $category_ids, 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
            if( $related ) foreach( $related as $post ) {
                setup_postdata($post); ?>
                <div class="col-md-3 col-6">
                    <a href="<?= the_permalink() ?>" class="content-box text-center text-lg-left">
                        <img src="<?= get_the_post_thumbnail_url() ?>" class="mw-100" style="width: 100%;height: 188px;object-position: 50% 50%; object-fit: cover;">
                        <p class="font-weight-bold text-dark font-14 mt-2"><?= the_title() ?></p>
                    </a>
                </div>
            <?php }
            wp_reset_postdata(); ?>
            <div class="col-12 d-flex loadcmt pb-4" align="center">
                <a href="<?= get_category_link($category_ids[0]) ?>" class="mx-auto pl-5 pr-5 text-center btn mt-2">Xem tất cả bài viết liên quan
                    <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
