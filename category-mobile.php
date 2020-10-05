<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
$current_cat = get_category(get_query_var('cat'));

$count = get_term_post_count( 'category', $current_cat->term_id );
$limit = get_option('posts_per_page');

$cat_id = $current_cat->cat_ID;
$cat_name = $current_cat->name;
global $wp_query;

$categories = get_terms([
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


$cla_cat = new ClaCategory();
$cats = [];
foreach ($categories as $val) {
    $cats[$val->term_id] = (array)$val;
}


$parents = $cla_cat->get_parents($cats, $cat_id);

if ($parents == 0) {
    $tree = $cla_cat->data_tree($cats, $cat_id);
    $parent_name = $current_cat->name;
} else {
    $tree = $cla_cat->data_tree($cats, $parents);
    $parent_name = get_term($parents)->name;
}

?>

<?php if ($categories) : ?>
    <section class="tabs-cat-news pt-2">
        <div class="tabs-cat-items">
            <a href="<?= home_url('tin-tuc') ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
            <?php foreach ($categories as $category) : ?>
                <?php if ($category->parent == 0) : ?>
                    <a href="<?= get_term_link($category->term_id) ?>" class="text-dark <?= ($category->term_id == $cat_id || $category->term_id == $parents) ? 'active' : '' ?>">
                    <?php  $avt = get_field('category_avatar', 'category_' . $category->term_id); ?>    
                    <?php if($avt) : ?>
                            <img src="<?= wp_get_attachment_image_url($avt['ID'], array(13, 13)) ?>" alt="Ảnh danh mục">
                        <?php endif; ?>
                        <?= $category->name ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php if ($cat_id) : ?>            
        <section class="menu-tab col-12 hide">
            <ul id="menu-content" class="menu-content collapse show">
                <?php if ($tree) : ?>
                    <?php foreach ($tree as $key => $value) : ?>
                        <li class="menu-item <?= ($value['term_id'] == $cat_id) ? 'active' : '' ?> <?= ($value['items']) ? 'collapsed' : ''?>" data-toggle="collapse" data-target="#products<?= $value['term_id'] ?>" class="collapsed collapcollapsed collap <?= ($value['term_id'] == $cat_id) ? 'active' : '' ?>">
                            <a href="<?= get_category_link($value['term_id']) ?>"><?= $value['name'] ?></a>
                            <?php echo ($value['items']) ? '<i class="fas fplus ml-auto" aria-hidden="true"></i>' : '' ?>
                        </li>
                        <?php if ($value['items']) : ?>
                            <ul class="sub-menu collapse <?= ($value['items'][$cat_id]) ? 'show' : '' ?>" id="products<?= $value['term_id'] ?>">
                                <?php foreach ($value['items'] as $val) : ?>
                                    <li class="menu-item <?= ($val['term_id'] == $cat_id) ? 'active' : '' ?>"><a href="<?= get_category_link($val['term_id']) ?>"><?= $val['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?php if ($tree) : ?>
                <a class="cat-more"><i class="fa fa-chevron-down mr-2" aria-hidden="true" style="font-size: 11px;"></i>Mở rộng</a>
            <?php endif; ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php get_view_widget('/mobile/breadcrumbs/news.php'); ?>
<div class="post-tabs">
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-9 news">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if ($wp_query->current_post == 0) : ?>
                            <div class="d-flex flex-column">
                                <a href="<?= the_permalink() ?>" title="<?= the_title() ?>">
                                    <img class="img-fluid fh-news-img" src="<?= get_the_post_thumbnail_url() ?>" style="width: 100%;height: auto;" alt="Red Status" />
                                </a>
                                <a href="<?= the_permalink() ?>" class="nv-title fh-news-title py-2 font-weight-bold text-dark font-16"><?= the_title() ?></a>
                            </div>
                        <?php endif;
                        break; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <section class="news-video pt-3">
                    <?php
                    if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="row nv-normal">
                                <a href="<?= the_permalink() ?>" class="col-5 col-md-4 img-container">
                                    <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(653,383)) ?>" style="height: 81px" alt="<?= the_title() ?>" />
                                </a>
                                <div class="col-7 col-md-8 pl-0">
                                    <a href="<?= the_permalink() ?>">
                                        <h4 class="lh-125"><?= the_title() ?></h4>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if(round($count / $limit) > 1 || ($count - $limit) > 0) :?>
                        <div class="col-12 d-flex justify-content-center more-posts">
                            <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="2" data-limit="<?= $limit ?>" data-slugg="<?= $current_cat->slug ?>" href="javascript:void(0)" onclick="loadPostsInCategory(this, true)" title="Xem thêm" class="btn btn-outline-primary py-1 px-2 mt-3">
                                Xem thêm <i class="fas fa-angle-down ml-2"></i>
                            </a>
                        </div>
                    <?php endif;?>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("tab2");
    var btns = jQuery(".menutab");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("menutab");
            current[0].className = current[0].className.replace(" menutab", "");
            /*  this.className += " menutab-block";*/
            jQuery(this).toggleClass("menutab").toggleClass("menutab-block");

        });
    }
</script>