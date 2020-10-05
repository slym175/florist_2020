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
                    <?php
                        $re = '/embed\/([\w+\-+]+)[\"\?]/';
                        $str = get_post_meta(get_the_ID(), 'iframe', true);
                        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
                    ?>
                        <div class="item post_video"
                             data-name="<?= the_title() ?>"
                             data-iframe="<?= esc_html(get_post_meta(get_the_ID(), 'iframe', true)) ?>"
                             data-post_id="<?= get_the_ID() ?>">
                            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url() ?>"
                                     style="height: 200px" layout="responsive" alt="Red Status" />
                            <a href="#" title="">
                                <h6 class="mt-2 text-white font-14 lh-15"><?= the_title() ?></h6>
                            </a>
                            <div class="post_ct" style="display: none"><?= get_the_content() ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <button class="v-nav v-next">
                    <img src="/wp-content/themes/newsun/assets/assets/mobile/next.svg" alt="next">
                </button>
                <button class="v-nav v-prev">
                    <img src="/wp-content/themes/newsun/assets/assets/mobile/prev.svg" alt="prev">
                </button>
            </div>
        </div>
        <div id="v-dots-container"></div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="#" title="" class="yt-newsun text-white">
                    Xem thêm video tại kênh Youtube NEWSUN
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<style>
    #app-v-preview {
        background: #fff !important;
        /*width: 100%;*/
        /*display: none;*/
    }
</style>

<div id="app-v-preview" class="overlay">
    <a href="javascript:void(0)" class="close" onclick="closePopup()">╳</a>
    <div class="overlay-content">
        <div class="video_play embed-responsive embed-responsive-4by3" id="video_play">
        </div>
        <div class="text-left p-3">
            <h5 class="post_video_title" id="post_video_title"></h5>
            <div class="text-left" id="post_video_content">

            </div>
        </div>
    </div>
</div>
<style>
    .video_play iframe{
        width: 100%;
    }
</style>
<script>
    jQuery(document).ready(function () {
        jQuery('.video-carousel .item').on('click', function(event) {
            event.preventDefault();
            jQuery("#app-v-preview").css('width', '100%').addClass('show');
            jQuery(".top-up").addClass('d-none');
            var name = jQuery(this).data("name");
            var video = jQuery(this).data("iframe");

            var content = jQuery(this).find('.post_ct').html();
            document.getElementById('post_video_title').innerHTML = name;
            document.getElementById('video_play').innerHTML = video;
            document.getElementById('post_video_content').innerHTML = content;
        });
    })
</script>
