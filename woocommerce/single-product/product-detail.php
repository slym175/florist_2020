<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 11:21 AM
 */


?>
<section class="container py-md-4 px-0">
    <div class="row">
        <div class="col-lg-8 col-12">

            <!-- Nội dung sản phẩm -->
            <?php wc_get_template('single-product/product-content.php') ?>

            <!-- Sản phẩm mua kèm -->
            <?php wc_get_template('single-product/product-mua-kem.php') ?>


            <!-- Sản phẩm đã xem -->
            <?php get_template_part('template_parts/contents/product-viewed') ?>

            <!-- Từ khóa tìm kiếm -->
            <?php do_shortcode('[ns_list_tags]'); ?>

            <!-- Đánh giá sản phẩm -->
            <?php wc_get_template('single-product/product-rating.php') ?>

            <section class="container py-4 px-0">
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </section>
        </div>

        <!-- Thông số kỹ thuật -->
        <?php wc_get_template('single-product/thong-so-ky-thuat.php') ?>

    </div>
</section>
<script>
    jQuery('.technical-data').find('p').addClass('tr');
</script>
