<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Sản phẩm đã xem
 */

get_header('aboutus');

?>
    <main>
        <section class="container">
            <div class="row">
                <div class="col-12 p-0 my-3">
                    <nav aria-label="breadcrumb" class="m-breadcrumb">
                        <ol class="breadcrumb breadcrumb-left p-0 m-0">
                            <li class="breadcrumb-item"><a href="<?= home_url() ?>">Trang chủ</a></li>
                            <li class="breadcrumb-item">Sản phẩm đã xem1</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row main-reverse">
                <?php get_template_part('template_parts/contents/product-viewed-mobile') ?>
            </div>
        </section>
    </main>
<?php
do_shortcode('[ns_list_tags]');
get_footer();