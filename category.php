<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
get_header('aboutus');
if (wp_is_mobile()) : get_template_part('category-mobile');
else :
    $category = get_category(get_query_var('cat'));

    $cat_id = $category->cat_ID;
    $cat_name = $category->name;

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
        $parent_name = $category->name;
    } else {
        $tree = $cla_cat->data_tree($cats, $parents);
        $parent_name = get_term($parents)->name;
    }


?>

    <?php if ($categories) : ?>
        <div class="tabs-product pt-3 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 tab-items text-lg-center d-flex justify-content-between flex-wrap font-12">
                        <?php foreach ($categories as $category) : ?>
                            <?php if ($category->parent == 0) : ?>
                                <a href="<?= get_term_link($category->term_id) ?>" class="text-dark <?= ($category->term_id == $cat_id || $category->term_id == $parents) ? 'active' : '' ?>">
                                    <?= $category->name ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="post-tabs">
        <div class="container px-0">
            <div class="row pt-3">
                <?php if ($cat_id) : ?>
                    <div class="col-md-3 menu-tab pr-0">
                        <p><strong><?= $parent_name ?></strong></p>
                        <ul id="menu-content" class="menu-content collapse show">
                            <?php if ($tree) : ?>
                                <?php foreach ($tree as $key => $value) : ?>
                                    <li data-toggle="collapse" data-target="#products<?= $value['term_id'] ?>" class="collapsed collap <?= ($value['term_id'] == $cat_id) ? 'active' : '' ?>">
                                        <a href="<?= get_category_link($value['term_id']) ?>"><?= $value['name'] ?>

                                        </a>
                                        <?php echo ($value['items']) ? '<i class="fas fa-chevron-down ml-auto"></i>' : '' ?>
                                    </li>
                                    <?php if ($value['items']) : ?>
                                        <ul class="sub-menu collapse <?= ($value['items'][$cat_id]) ? 'show' : '' ?>" id="products<?= $value['term_id'] ?>">
                                            <?php foreach ($value['items'] as $val) : ?>
                                                <li class="<?= ($val['term_id'] == $cat_id) ? 'active' : '' ?>"><a href="<?= get_category_link($val['term_id']) ?>"><?= $val['name'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="col-md-9 news">
                    <div class="col-md-12 p-0">
                        <ul class="ns-breadcrumb">
                            <li><a href="<?php echo get_page_link(get_page_by_path('tin-tuc')); ?>">Tin tức</a></li>
                            <li class="active"><?= $cat_name ?></li>
                        </ul>
                    </div>

                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php if ($wp_query->current_post == 0) : ?>
                                <div class="d-flex flex-column">
                                    <img class="img-fluid" src="<?= get_the_post_thumbnail_url() ?>" alt="News & Video" style="height:494px;object-fit:cover;object-position:50% 50%;">
                                    <a href="<?= the_permalink() ?>" class="nv-title py-2 font-weight-bold text-dark font-18"><?= the_title() ?></a>
                                    <div class="nv-body font-14 text-justify"><?= the_excerpt() ?></div>
                                </div>
                            <?php endif;
                            break; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <section class="container">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="row py-3 border-top h-news">
                                    <a href="<?= the_permalink() ?>" title="Anh" class="col-4 pl-0">
                                        <img class="img-fluid hn-img h-136" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
                                    </a>
                                    <div class="d-flex flex-column col-8 px-0">
                                        <a href="<?= the_permalink() ?>" class="nv-title pb-2 font-weight-bold text-dark font-18 line-1"><?= the_title() ?></a>
                                        <div class="nv-body text-justify ccp-body"><?= the_excerpt() ?></div>
                                        <?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag', array("fields" => "all")); ?>
                                        <?php if ($tags) : ?>
                                            <div class="hash-tags-2">
                                                <?php foreach ($tags as $tag) : ?>
                                                    <a href="<?= get_term_link($tag->term_id) ?>" class="h-tag">
                                                        # <?= $tag->name ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php if(posts_navigation()): ?>
                            <div class="row pt-3">
                                <div class="col-12 text-center">
                                    <?php
                                    echo posts_navigation();
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>
            </div>
            <hr>
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
<?php
endif;
get_footer();
