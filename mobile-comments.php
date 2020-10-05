<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Comment Reply Script.
if (comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
}
?>
<section class="container py-3">
    <?php $comments_number = get_comments_number(); ?>
    <div class="row">
        <div class="col-12">
            <div class="ip-discuss">
                <?php
                comment_form();
                ?>
            </div>
        </div>
    </div>
    <?php if (have_comments()) : ?>
        <div class="row">
            <div class="col-12 mb-2">
                <h6 class="font-weight-bold font-14"><?= $comments_number ?> Bình luận</h6>
            </div>
        </div>
        <div>
            <?php the_comments_navigation(); ?>
            <?php wp_list_comments('type=comment&callback=devvn_comment'); ?>
            <?php the_comments_navigation(); ?>
            <!--            <div class="row mt-3">-->
            <!--                <div class="col-12 d-flex justify-content-center">-->
            <!--                    <a href="#" class="btn btn-outline-primary font-14 px-5 py-1 w-100">Xem thêm bình luận <i-->
            <!--                                class="font-12 ml-3 fas fa-chevron-right"></i></a>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    <?php endif; ?>

</section>
