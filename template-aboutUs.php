<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 11:03 AM
 * Template Name: Giới thiệu
 */

get_header('aboutus');

?>
    <section id="section-bannergioithieu text-justify">
        <img src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>" style="width: 100%">
    </section>
    <section class="section-gioithieuflorist">
        <div class="container">
            <div class="row pt-md-4 pt-3">
                <div class="col-md-12">
                    <?php st_breadcrumbs_new() ?>
                </div>
            </div>
            <div class="row pb-2 all-about">
                <div class="col-md-9 left text-justify">
                    <?php
                    if (have_posts()) {
                        the_post();
                        the_content();
                    }
                    ?>

                    <!-- Comment -->
                    <?php
                    if(wp_is_mobile()){
                        if (comments_open() || get_comments_number()) :
                            comments_template('/mobile-comments.php');

                        endif;
                    }else{
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    }

                    ?>
                </div>

                <div class="col-md-3 right menu-right text-justify" id="menuright">
                    <?php get_sidebar('page'); ?>
                </div>
            </div>
            <hr>
        </div>
    </section>
<?php
do_shortcode('[ns_list_tags]');
get_footer();