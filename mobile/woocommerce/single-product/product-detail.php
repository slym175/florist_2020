<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 11:21 AM
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
<style>
    .product-description img {
        max-width: 100%;
        height: auto !important;
    }

    .product-description * {
        font-size: max(15px);
    }

    .product-description {
        padding-top: 15px;
    }
</style>
<div class="box-product-detail">
    <!-- Thông số kỹ thuật -->
    <?php get_template_part('mobile/woocommerce/single-product/thong-so-ky-thuat') ?>

    <section class="container py-3 border-bottom">
        <div class="row">
            <div class="col-12 font-14 show-hide-text">
                <h6 class="font-weight-bold section-title-14">Đặc điểm nổi bật:</h6>
                <div class="text-2 lh-125 outstanding-features"><?= the_excerpt() ?></div>
                <div class="d-flex justify-content-center show-more">
                    <a class="btn btn-outline-primary font-14">Xem thêm <i class="fas fa-chevron-down font-12 ml-3"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Nội dung sản phẩm -->
    <?php get_template_part('mobile/woocommerce/single-product/product-content') ?>


    <?php get_template_part('mobile/woocommerce/single-product/product-mua-kem') ?>

    <?php get_template_part('mobile/template_parts/contents/product-viewed') ?>

    <?php do_shortcode('[ns_list_tags]'); ?>

    <!-- Đánh giá sản phẩm -->
    <?php get_template_part('mobile/woocommerce/single-product/product-rating') ?>

    <!-- <section class="container py-3 border-bottom">
        <?php
        // if (comments_open() || get_comments_number()) :
        //     comments_template();
        // endif;
        ?>
    </section> -->
    <?php if (isset($posts_related) && $posts_related) : ?>
        <section class="container pt-3">
            <div class="row">
                <div class="col-12 mb-2">
                    <h6 class="font-weight-bold font-14 section-title-14">Bài viết liên quan:</h6>
                </div>
            </div>
            <div class="row">
                <?php get_view_widget('mobile/news/view_1.php', ['news' => $posts_related]) ?>
            </div>
            <?php if ($post_page_link) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex btn btn-outline-primary justify-content-center align-items-center">
                            <a href="<?= $post_page_link['url'] ?>" class="font-14 w-100 align-items-center">
                                Xem tất cả bài viết liên quan
                            </a>
                            <i class="font-12 ml-3 fas fa-chevron-right float-right"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</div>
<script>
    jQuery(document).ready(function() {
        var newLine, el, title;
        var ToC = '';
        jQuery(".product-description h2, .product-description h3, .product-description h4, .product-description h5").each(function(index) {
            el = jQuery(this);
            el.attr('id', 'step-' + (index + 1));
            el.addClass('py-4 font-18');
            title = el.text();
            newLine = '<div>' + '<a class="ste-mucluc" href = "#step-' + (index + 1) + '">' + (index + 1) + '. ' + title + ' </a><br/>' + '</div >';
            ToC += newLine;
        });
        if (ToC) {
            jQuery(".muc_luc").prepend(ToC);
            $('.ste-mucluc').click(function() {
                $('.product-description').addClass('show');
            });
        } else {
            jQuery('.muc_luc_header').css('display', 'none');
        }
    });
</script>