<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 1:53 PM
 */
global $post;
?>
<section class="container pt-3">
    <div class="row">
        <div class="col-12 mb-2">
            <h6 class="font-weight-bold font-14 section-title-14">Bài viết liên quan:</h6>
        </div>
    </div>
    <div class="row">
        <?php
        $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID)));
        $category_ids = wp_get_post_categories($post->ID);
        if ($related) foreach ($related as $post) { ?>
            <div class="col-12 col-md-3">
                <div class="row mb-md-3 mb-2">
                    <div class="col-5 col-md-12">
                        <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url() ?>" style="height: 81px" alt="<?= the_title() ?>" />
                    </div>
                    <div class="col-7 col-md-12 flex flex-column justify-content-between pl-0 pl-md-3 mt-md-2">
                        <a href="<?= the_permalink() ?>" title="">
                            <h6 class="font-14 text-dark mb-1 line-2"><?= the_title() ?></h6>
                        </a>
                        <div>
                            <?php $tags = wp_get_post_terms($post->ID, 'post_tag', array("fields" => "all")); ?>
                            <?php if ($tags) : ?>
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?= get_term_link($tag->term_id) ?>" title="Tags"><span class="m-0 bg-2 font-10 p-1 text-dark">#<?= $tag->name ?></span></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        wp_reset_postdata(); ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex btn btn-outline-primary justify-content-center align-items-center">
                <a href="<?= get_category_link($category_ids[0]) ?>" class="font-14 w-100 align-items-center">
                    Xem tất cả bài viết liên quan
                </a>
                <i class="font-12 ml-3 fas fa-chevron-right float-right"></i>
            </div>
        </div>
    </div>
</section>