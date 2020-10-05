<?php
/**
 * The template to display the reviewers meta data (name, verified owner, review date)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review-meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $comment;
$verified = wc_review_is_from_verified_owner($comment->comment_ID);
$rating = (int) get_comment_meta( $comment->comment_ID, 'rating', true );

if ('0' === $comment->comment_approved) { ?>

    <p class="meta">
        <em class="woocommerce-review__awaiting-approval">
            <?php esc_html_e('Your review is awaiting approval', 'woocommerce'); ?>
        </em>
    </p>

<?php } else { ?>

    <span class="font-weight-bold mr-4"><?php comment_author(); ?></span>
    <div class="star-rating" role="img" style="color: #ffc107;margin-right: 10px">
        <span style="width: <?= ($rating/5)*100 ?>%;"></span>
    </div>
    <?php
}
