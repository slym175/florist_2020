<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/6/2020
 * Time: 3:48 PM
 */


$post_video = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video'),
        )
    )
));

?>
<?php if ($post_video->have_posts()): ?>
    <section class="container py-2 border-bottom bg-3">
        <div class="row">
            <div class="col-12">
                <h6 class="text-white font-14">Video:</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12">   
                <div class="owl-carousel owl-theme video-carousel">
                    <?php while ($post_video->have_posts()) : $post_video->the_post() ?>
                        <div class="item" data-id-video="<?= get_the_ID() ?>" data-url="<?= admin_url('admin-ajax.php') ?>" data-post_id="<?= get_the_ID() ?>">
                            <img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" style="height: 200px;" alt="Red Status">
                            <a href="javascript:void(0)" title="<?= the_title() ?>">
                                <h6 class="mt-2 text-white font-14 lh-15"><?= the_title() ?></h6>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <button class="v-nav v-next">
                    <img src="/wp-content/themes/florist/assets/assets/mobile/next.svg" alt="next">
                </button>
                <button class="v-nav v-prev">
                    <img src="/wp-content/themes/florist/assets/assets/mobile/prev.svg" alt="prev">
                </button>
            </div>
        </div>
        <div id="v-dots-container"></div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="#" title="" class="yt-florist">
                    Xem thêm video tại kênh Youtube florist
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<div id="app-v-preview" class="overlay">
</div>