<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
get_header('mobile');
$categories = get_categories();
$category = get_the_terms(get_the_ID(), 'category');

global $wp_query;

$cat = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'meta_key' => 'menu_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
        'meta_value_num' => array(
            'key' => 'status',
            'type' => 'NUMERIC',
            'value' => 1,
        )
    )
]);

if ($category) {
    $cat_id = $category[0]->term_id;
}
if ($cat_id) {
    $cla_cat = new ClaCategory();
    $cats = [];
    foreach ($categories as $val) {
        $cats[$val->term_id] = (array)$val;
    }
    $parents = $cla_cat->get_parents($cats, $cat_id);

    if ($parents == 0) {
        $tree = $cla_cat->data_tree($cats, $cat_id);
    } else {
        $tree = $cla_cat->data_tree($cats, $parents);
    }
}
?>

<?php if ($cat) : ?>
    <section class="tabs-cat-news pt-2">
        <div class="tabs-cat-items">
            <a href="<?= home_url('tin-tuc') ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
            <?php foreach ($cat as $category) : ?>
                <?php if ($category->parent == 0) : ?>
                    <a href="<?= get_term_link($category->term_id) ?>" class="<?= ($category->term_id == $cat_id || $category->term_id == $parents) ? 'active' : '' ?>">
                        <?= $category->name ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
<section class="container border-bottom">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" class="m-breadcrumb">
                <ol class="breadcrumb m-0">
                    <?= florist_breadcrumbs(); ?>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container border-bottom py-3">
    <div class="row">
        <div class="col-12">
            <h2 class="font-16 text-2 font-weight-bold"><?= the_title() ?></h2>

            <div class="card card-body border-0 px-3 py-2 my-3 bg-1 muc_luc_header">
                <button class="btn btn-link btn-block text-left text-decoration-none p-0 mb-1" type="button"
                        data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                    <i class="fas fa-bars pr-3"></i><span class="font-14 font-weight-bold">Nội dung</span>
                </button>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordionExample">
                    <div class="card-body p-0 pt-0 muc_luc">
                    </div>
                </div>
            </div>
            <div class="font-14 text-justify m-0">
                <?= the_excerpt() ?>
            </div>
            <div class="detail-post-content">
                <?php while (have_posts()) : the_post(); ?>
                    <?php pp_setPostViews(get_the_ID()); ?>
                    <?php
                    the_content()
                    ?>
                <?php endwhile; ?>
            </div>

            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=525478714900201&autoLogAppEvents=1" nonce="qpJXaQhg"></script>

            <div class="d-flex justify-content-end btn-socials mt-3">
                <div class="fb-like" data-href="<?= the_permalink() ?>" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
            </div>
        </div>
    </div>
</section>

<!-- List Tag -->
<?= do_shortcode('[ns_list_tags]') ?>

<?php

if (comments_open() || get_comments_number()) :
    comments_template('/mobile-comments.php');

endif;

do_shortcode('[ns_posts_related]');

?>
<style>
    .detail-post-content img {
        width: 100%;
        height: auto;
    }
    .detail-post-content iframe {
        width: 100%;
    }

    .hashtags{
        border-top: none !important;
    }
</style>
<script>
    jQuery(document).ready(function () {
        var newLine, el, title;
        var ToC = '';

        jQuery(".detail-post-content h2, .detail-post-content h3, .detail-post-content h4, .detail-post-content h5").each(function (index) {

            el = jQuery(this);
            el.attr('id', 'step-' + (index + 1));
            el.addClass('py-4 font-18');
            title = el.text();
            newLine = '<div>\n' +
                '                                    <a href="#step-' + (index + 1) + '">' + (index + 1) + '. ' + title + '</a>\n' +
                '                                </div>';

            ToC += newLine;

        });
        if (ToC) {
            jQuery(".muc_luc").prepend(ToC);
        } else {
            jQuery('.muc_luc_header').css('display', 'none');
        }
    });
</script>
<?php
get_footer();
?>



