<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<div class="media mt-3">
    <img src="<?= get_avatar_url($comment, $size = '50', ''); ?>" style="border-radius: 100%" height="50" width="50"
             class="mr-3 rounded-pill img-fluid" alt="Avatar" />
    <div class="media-body font-14">
        <div class="mt-0 d-flex align-items-center">
            <?php
            /**
             * The woocommerce_review_before_comment_meta hook.
             *
             * @hooked woocommerce_review_display_rating - 10
             * Tên tác giả
             */
            do_action('woocommerce_review_meta', $comment);

            /**
             * The woocommerce_review_before_comment_meta hook.
             *
             * @hooked woocommerce_review_display_rating - 10
             */
            do_action('woocommerce_review_before_comment_meta', $comment);

            ?>
        </div>
        <div class="font-14 my-2"><?= comment_text(); ?></div>
        <div>
            <span>
                <a href="#" class="text-dark">
                    <?php comment_reply_link(array_merge($args,array('respond_id' => 'respond','depth' => $depth, 'max_depth'=> $args['max_depth'])));?>
                    <i class="fas fa-comments text-primary"></i>
                </a>
            </span>
        </div>
    </div>
</div>


